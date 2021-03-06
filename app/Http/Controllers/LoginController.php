<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\VerifyUser;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;

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

            $arrBack['user']        = $user;
            $arrBack['token']       = $user->createToken('OmkostToken')->plainTextToken;
            
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

        $token = Str::random(40);
        
        $user = User::create([
            'name'      => $request['name'],
            'telp'      => $request['telp'],
            'email'     => $request['email'],
            'password'  => Hash::make($request['password']),
            'isAdmin'   => false,
            'verifToken'=> $token,
        ]);

        $data["token"]=$token;
        $data["id"]=$user->id;

        $response['status'] = true;
        $response['message'] = 'Registrasi Berhasil, Selamat bergabung di Omkost';
        $response['data']['token'] = $user->createToken('OmkostToken')->plainTextToken;

        Mail::to($request->email)->send(new VerifyUser($data));

        return response()->json($response, 200);
        
    }

    public function resetPassword(Request $request){
        $user = Auth::user();

        // validasi password apakah sama 
        $validate = Validator::make($request->all(),[
            'password'      => ['required', 'string'],
            'newPassword'   => ['required', 'string'],
        ]);

        if($validate->fails()){
            $response['status'] = false;
            $response['message'] = 'Reset Password Gagal';
            $response['error'] = $validate->errors();
            
            return response()->json($response, 422);
        }

        if(Hash::check($request->password, $user->password)){
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return response()->json([
                'status'    => true,
                'message'   => 'Reset Password Berhasil'
            ], 201);
        }
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

    public function verifyEmail($token, $id){
        $user = User::find($id);

        if($user->verifToken == $token){
            $user->email_verified_at = Carbon::now();
            $user->save();

            return redirect('/');
        }
    }
}
