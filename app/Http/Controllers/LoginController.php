<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            //'device_name' => 'required',
        ]);
    
        //$user = User::where('email', $request->email)->first();
        $credentials = $request->only('email', 'password');
        //if($user)
        //{
            //if(Hash::check($request->password, $user->password))
        if (Auth::attempt($credentials))
        {
            $user = Auth::user();

            $arrBack['nama']        = $user->name;
            $arrBack['email']       = $user->email;
            $arrBack['token']       = $user->createToken('OmkostToken')->plainTextToken;
            // $arrBack['isAdmin']     = $user->isAdmin;
            
            $response['status'] = true;
            $response['message'] = 'Login Sukses';
            $response['data'] = $arrBack;
            //$response['data']['token'] = $user->createToken('OmkostToken')->plainTextToken;
            return response()->json($response, 200);
            //->withCookie(cookie()->forever('name', $user->name))
            //->withCookie(cookie()->forever('email', $user->email))
            //->withCookie(cookie()->forever('access_token', $response['data']['token']));
        }
        else
        {
            $response['status'] = false;
            $response['message'] = 'Login Gagal';
            return response()->json($response, 401);
        }
    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => ['string', 'required'],
            'telp' => ['string', 'required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string']
        ]);

        if($validate->fails()){
            $response['status'] = false;
            $response['message'] = 'Registrasi Gagal';
            $response['error'] = $validate->errors();
            
            return response()->json($response, 422);
        }
        
        $user = User::create([
            'name'      => $request['name'],
            'telp'      => $request['telp'],
            'email'     => $request['email'],
            'password'  => Hash::make($request['password']),
            'isAdmin'   => false,
        ]);

        $response['status'] = true;
        $response['message'] = 'Registrasi Berhasil, Selamat bergabung di Omkost';
        $response['data']['token'] = $user->createToken('OmkostToken')->plainTextToken;

        return response()->json($response, 200);
        
    }
    
    public function profile(Request $request)
    {
        //$user = User::where('email', $request->email)->first();
        if(Auth::check())
        {
            $user = Auth::user();

            //$user = User::where('email', $request->email)->first();
            $user = $user->makeHidden(['email_verified_at','password','remember_token']);
            
            $response['status'] = true;
            $response['message'] = 'Profile view';
            $response['data'] = $user;

            return response()->json($response, 200);
        }
    }
    
    public function logout(Request $request)
    {
        //$request->user()->token()->revoke();
        // Revoke all tokens...
        //$user->tokens()->delete();

        // Revoke the user's current token...
        $request->user()->currentAccessToken()->delete();   

        $response['status'] = true;
        $response['message'] = 'Berhasil logout';

        return response()->json($response, 200);
    }
}
