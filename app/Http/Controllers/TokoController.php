<?php

namespace App\Http\Controllers;

use App\User;
use App\Toko;
use App\Notifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    public function admin()
    {
        return view('admintoko');
    }

    public function index(Request $request)
    {
        if ($request->cookie('admin')){
            return redirect('/admintoko');
        } else if($request->cookie('nama')){
            return view('toko');
        } else{
            return redirect('/');
        }
    }

    public function set(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'jenis'         => 'required',
            'kota'          => 'required',
            'nama'          => 'required',
            'telp'          => 'required',
            'alamat'        => 'required',
            'keterangan'    => 'required',
        ]);   

        Toko::create([
            'jenis'         => $request['jenis'],
            'kota'          => $request['kota'],
            'nama'          => $request['nama'],
            'telp'          => $request['telp'],
            'alamat'        => $request['alamat'],
            'keterangan'    => $request['keterangan'],
            'submit_by'     => $user->email,
            'submit_at'     => Carbon::now(),
        ]);

        $response['status'] = true;
        $response['message'] = 'Data Toko Tersimpan';

        return response()->json($response, 200);
    }


    public function get(Request $request)
    {
        if($request->filled('status')){
            if($request['status'] == "belum"){
                $toko = Toko::whereNull('validate_by')->paginate(5);
            } else {
                $toko = Toko::whereNotNull('validate_by')->paginate(5);
            }

            return response()->json([
                'status'        => true,
                'data'          => $toko
            ], 200);
        }
        else if($request->filled('email')){
            $toko = Toko::where('submit_by', 'like', '%'.request('email').'%')
                                    ->paginate(5);

            return response()->json([
                'status'        => true,
                'data'          => $toko
            ], 200);
        }
        else if(!$request->filled('jenis'))
        {
            $response['status'] = false;
            $response['message'] = 'Jenis Toko tidak ditemukan';
            return response()->json($response);
        }
        else{
            $toko = Toko::where('nama', 'like', '%'.request('nama').'%')
                    ->where('kota', 'like', '%'.request('kota').'%')
                    ->where('jenis', 'like', '%'.request('jenis').'%')
                    ->whereNotNull('validate_by')
                    ->paginate(5);

            $response['status'] = true;
            $response['message'] = 'Data Toko diterima';
            $response['data'] = $toko;

            return response()->json($response, 200);
        }
        
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'kota'          =>'required',
            'nama'          =>'required',
            'telp'          =>'required',
            'alamat'        =>'required',
            'keterangan'    =>'required',
        ]);   

        $toko = Toko::find($request->id);

        if($user->email != $toko->submit_by){
            return response()->json([
                "status"        => "Failed",
                "message"       => "Anda tidak berhak mengubah data ini"
            ], 401);
        }

        $toko->kota         = $request->get('kota');
        $toko->nama         = $request->get('nama');
        $toko->telp         = $request->get('telp');
        $toko->alamat       = $request->get('alamat');
        $toko->keterangan   = $request->get('keterangan');
        $toko->validate_by  = null;
        $toko->validate_at  = null;
        $toko->status_validasi = null;
        $toko->save();

        $response['status'] = true;
        $response['message'] = 'Data Toko update';

        return response()->json($response, 200);
    }

    public function validateToko(Request $request){
        // validasi toko oleh admin
                $user = Auth::user();
        
        if(!$user->isAdmin){
            $response["status"] = false;
            $response["message"] = 'Maaf, anda tidak berhak untuk melakukan validasi';
            return response()->json($response, 401);
        }

        $request->validate([
            'id' => 'required'
        ]); 

        $toko = Toko::find($request->id);
        $keterangan = '';
        $status = '';

        if($request->keterangan){
            $toko->status_validasi = 2;
            $keterangan = $request->keterangan;
            $status = "Ditolak";
        } else {
            $toko->validate_at = Carbon::now();
            $toko->validate_by = $user->email;
            $toko->status_validasi = 1;
            $keterangan = "Data sudah berhasil divalidasi";
            $status = "Diterima";
        }

        Notifications::create([
            'validation_status'     => $status,
            'jenis_validation'      => "Toko",
            'keterangan'            => $keterangan,
            'email_user_rekomendasi'=> $toko->submit_by,
            'id_item_rekomendasi'   => $request->id,
        ]);

        $toko->save();

        $response['status'] = true;
        $response["message"] = 'Perubahan telah disimpan';

        return response()->json($response, 201);
    }

    public function delete(Request $request)
    {
        //  validasi user adalah user yang merekomendasikan toko
        $user = Auth::user();

        $toko = Toko::find($request->id);
        
        if($user->email != $toko->submit_by){
            $response["status"] = false;
            $response["message"] = 'Maaf, anda tidak berhak untuk melakukan operasi ini.';
            return response()->json($response, 401);
        }

        $toko->delete();

        $response['status'] = true;
        $response["message"] = 'Data telah dihapus';

        return response()->json($response, 201);
    }
}
