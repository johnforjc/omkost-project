<?php

namespace App\Http\Controllers;

use App\User;
use App\Tukang;
use App\Notifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TukangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->cookie('admin')){
            return redirect('/admintukang');
        } else if($request->cookie('nama')){
            return view('tukang');
        } else{
            return redirect('/');
        }
    }

    public function admin()
    {
        return view('admintukang');
    }

    public function set(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'jenis'     =>'required',
            'kota'      =>'required',
            'nama'      =>'required',
        ]);        
        
        Tukang::create([
            'jenis'         => $request['jenis'],
            'kota'          => $request['kota'],
            'nama'          => $request['nama'],
            'telp'          => $request['telp'],
            'keterangan'    => $request['keterangan'],
            'submit_by'     => $user->email,
            'submit_at'     => Carbon::now(),
        ]);

        $response['status'] = true;
        $response['message'] = 'Data Tukang tersimpan';

        return response()->json($response, 201);
    }


    public function get(Request $request)
    {
        if($request->filled('status')){
            if($request['status'] == "belum"){
                $tukang = Tukang::whereNull('validate_by')->paginate(5);
            } else {
                $tukang = Tukang::whereNotNull('validate_by')->paginate(5);
            }

            return response()->json([
                'status'        => true,
                'data'          => $tukang
            ], 200);
        }
        else if($request->filled('email')){
            $tukang = Tukang::where('submit_by', 'like', '%'.request('email').'%')
                                    ->paginate(5);

            return response()->json([
                'status'        => true,
                'data'          => $tukang
            ], 200);
        }
        else if(!$request->filled('jenis'))
        {
            $response['status'] = true;
            $response['message'] = 'Tolong masukkan jenis tukang yang dicari';
            return response()->json($response, 200);
        } else {
            $tukang = Tukang::where('nama', 'like', '%'.request('nama').'%')
                                ->where('kota', 'like', '%'.request('kota').'%')
                                ->where('jenis', 'like', '%'.request('jenis').'%')
                                ->whereNotNull('validate_by')
                                ->paginate(5);

            $response['status'] = true;
            $response['message'] = 'Data Tukang diterima';
            $response['data'] = $tukang;

            return response()->json($response, 200);
        }

    }

    public function update(Request $request)
    {

        $user = Auth::user();
        
        $request->validate([
            'kota'      =>'required',
            'nama'      =>'required',
        ]);        

        // Cari tukang yang akan diupdate
        $tukang = Tukang::find($request->id);

        if($user->email != $tukang->submit_by){
            return response()->json([
                "status"        => "Failed",
                "message"       => "Anda tidak berhak mengubah data ini"
            ], 401);
        }

        // Simpan perubahan dari form
        $tukang->kota       = $request['kota'];
        $tukang->nama       = $request['nama'];
        $tukang->telp       = $request['telp'];
        $tukang->keterangan = $request['keterangan'];
        $tukang->validate_by  = null;
        $tukang->validate_at  = null;
        $tukang->status_validasi = null;
        
        $tukang->save();

        $response['status'] = true;
        $response['message'] = 'Data Tukang berhasil diupdate';

        return response()->json($response, 201);
    }

    public function validateTukang(Request $request){
        // validasi tukang oleh admin
        $user = Auth::user();
        
        if(!$user->isAdmin){
            $response["status"] = false;
            $response["message"] = 'Maaf, anda tidak berhak untuk melakukan validasi';
            return response()->json($response, 401);
        }

        $request->validate([
            'id' => 'required'
        ]); 

        $tukang = Tukang::find($request->id);
        $keterangan = '';
        $status = '';

        if($request->keterangan){
            $tukang->status_validasi = 2;
            $keterangan = $request->keterangan;
            $status = "Ditolak";
        } else {
            $tukang->validate_at = Carbon::now();
            $tukang->validate_by = $user->email;
            $tukang->status_validasi = 1;
            $keterangan = "Data sudah berhasil divalidasi";
            $status = "Diterima";
        }

        Notifications::create([
            'validation_status'     => $status,
            'jenis_validation'      => "Tukang",
            'keterangan'            => $keterangan,
            'email_user_rekomendasi'=> $tukang->submit_by,
            'id_item_rekomendasi'   => $request->id,
        ]);

        $tukang->save();

        $response['status'] = true;
        $response["message"] = 'Perubahan telah disimpan';

        return response()->json($response, 201);
    }

    public function delete(Request $request)
    {
        //  validasi user adalah user yang merekomendasikan tukang
        $user = Auth::user();

        $tukang = Tukang::find($request->id);
        
        if($user->email != $tukang->submit_by){
            $response["status"] = false;
            $response["message"] = 'Maaf, anda tidak berhak untuk melakukan operasi ini.';
            return response()->json($response, 401);
        }

        $tukang->delete();

        $response['status'] = true;
        $response["message"] = 'Data telah dihapus';

        return response()->json($response, 201);
    }
}
