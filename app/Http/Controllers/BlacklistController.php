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

        $path = $file->storeAs('/public', $filename);

        Blacklist::create([
            'jenis' => $request['jenis'],
            'kota' => $request['kota'],
            'identitas' => $request['identitas'],
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'keterangan' => $request['keterangan'],
            'bukti' => $filename,
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
                $blacklist = Blacklist::whereNull('validate_by')->pagination(5);
            } else {
                $blacklist = Blacklist::whereNotNull('validate_by')->pagination(5);
            }

            return response()->json([
                'status'        => true,
                'data'          => $blacklist
            ], 200);
        }

        if($request->filled('email')){
            $blacklist = Blacklist::where('submit_by', 'like', '%'.request('email').'%')
                                    ->paginate(5);

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
                                ->paginate(5);

            $response['status'] = true;
            $response['message'] = 'Data blacklist diterima';
            $response['data'] = $blacklist;

            return response()->json($response, 200);
        }
    }

    public function updateBlacklist(Request $request)
    {
        $user = Auth::user();      

        $blacklist = Blacklist::find($request->id);

        if($user->email != $blacklist->submit_by){
            return response()->json([
                "status"        => "Failed",
                "message"       => "Anda tidak berhak mengubah data ini"
            ], 401);
        }

        $filename = '';
        
        if($request->file( 'bukti' )){
            $file = $request->file('bukti');
            $filename = $file->getClientOriginalName();
            $filename = $user->id . time() . $filename;

            $path = $file->storeAs('/public', $filename);
        } else {
            $filename = $blacklist->bukti;
        }

        $blacklist->identitas = $request['identitas'];
        $blacklist->nama = $request['nama'];
        $blacklist->telp = $request['telp'];
        $blacklist->keterangan = $request['keterangan'];
        $blacklist->bukti = $filename;
        $blacklist->validate_by  = null;
        $blacklist->validate_at  = null;
        $blacklist->save();

        $response['status'] = true;
        $response['message'] = 'Data blacklist update';
        //$response['data'] = $blacklist;

        return response()->json($response, 200);
    }

    public function validateBlacklist(Request $request){
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
