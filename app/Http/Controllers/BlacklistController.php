<?php

namespace App\Http\Controllers;

use App\User;
use App\Blacklist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlacklistController extends Controller
{
    public function admin()
    {
        return view('adminblacklist');
    }

    public function index(Request $request)
    {
        if ($request->cookie('admin')){
            return redirect('/adminblacklist');
        } else if($request->cookie('nama')){
            return view('blacklist');
        } else{
            return redirect('/');
        }
    }

    public function set(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'jenis'=>'required',
            'identitas'=>'required',
            // 'bukti' => 'required|mimes:jpeg,jpg,png',
        ]);

        if(!$request->file( 'bukti' )){
            return response()->json([
                'message' => 'image not found',
            ]);
        }

        $file = $request->file('bukti');
        $filename = $file->getClientOriginalName();
        $filename = $user->id . time() . $filename;

        $path = $file->storeAs('/', $filename);

        Blacklist::create([
            'jenis' => $request['jenis'],
            'kota' => $request['kota'],
            'identitas' => $request['identitas'],
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'keterangan' => $request['keterangan'],
            'bukti' => $path,
            'submit_by' => $user->email,
            'submit_at' => Carbon::now(),
        ]);

        $response['status'] = true;
        $response['message'] = 'Data blacklist tersimpan';
        $response['data'] = $filename;

        return response()->json($response, 200);
    }


    public function get(Request $request)
    {
        if($request->filled('status')){
            if($request['status'] == "belum"){
                $blacklist = Blacklist::whereNull('validate_by')->get();
            } else {
                $blacklist = Blacklist::whereNotNull('validate_by')->get();
            }

            return response()->json([
                'status'        => true,
                'data'          => $blacklist
            ], 200);
        }

        if($request->filled('email')){
            $blacklist = Blacklist::where('submit_by', 'like', '%'.request('email').'%')
                                    ->get();

            return response()->json([
                'status'        => true,
                'data'          => $blacklist
            ], 200);
        }

        if($request->filled('cari'))
        {
            $error = $request->validate([
                'jenis'=>'required',
                'cari'=>'required',
            ]);

            $blacklist = Blacklist::where('identitas', 'like', '%'.request('cari').'%')
                                ->orWhere('nama', 'like', '%'.request('cari').'%')->where('jenis', 'like', request('jenis'))
                                ->whereNotNull('validate_by')
                                ->get();

            $response['status'] = true;
            $response['message'] = 'Data blacklist diterima';
            $response['data'] = $blacklist;

            return response()->json($response, 200);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'jenis'=>'required',
            'kota'=>'required',
            'identitas'=>'required',
            'nama'=>'required',
            'telp'=>'required',
            'keterangan'=>'required',
            'bukti'=>'required',
        ]);   

        $blacklist = Blacklist::find($request->id);

        $blacklist->jenis =  $request->get('jenis');
        $blacklist->identitas = $request->get('identitas');
        $blacklist->nama = $request->get('nama');
        $blacklist->telp = $request->get('telp');
        $blacklist->keterangan = $request->get('keterangan');
        $blacklist->bukti = $request->get('bukti');
        $blacklist->save();

        $response['status'] = true;
        $response['message'] = 'Data blacklist update';
        //$response['data'] = $blacklist;

        return response()->json($response, 200);
    }

    public function validateBacklist(Request $request){
        // validasi blacklist oleh admin
        $user = Auth::user();
        
        if(!$user->isAdmin){
            $response["status"] = false;
            $response["message"] = 'Maaf, anda tidak berhak untuk melakukan validasi';
            return response()->json($response, 401);
        }

        $request->validate([
            'id' => 'required'
        ]); 

        $blacklist = Blacklist::find($request->id);

        $blacklist->validate_at = Carbon::now();
        $blacklist->validate_by = $user->email;
        $blacklist->save();

        $response['status'] = true;
        $response["message"] = 'Data telah divalidasi';

        return response()->json($response, 201);
    }

    public function delete(Request $request)
    {
        //  validasi user adalah pembuatan blacklist
        $user = Auth::user();

        $blacklist = Blacklist::find($request->id);
        
        if($user->email != $blacklist->submit_by){
            $response["status"] = false;
            $response["message"] = 'Maaf, anda tidak berhak untuk melakukan operasi ini.';
            return response()->json($response, 401);
        }

        $blacklist->delete();

        $response['status'] = true;
        $response["message"] = 'Data telah dihapus';

        return response()->json($response, 201);
    }
}
