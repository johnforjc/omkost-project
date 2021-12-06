<?php

namespace App\Http\Controllers;

use App\User;
use App\Tukang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TukangController extends Controller
{
    public function index()
    {
        return view('tukang');
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
            'alamat'        => $request['alamat'],
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
        if(!$request->filled('jenis'))
        {
            $response['status'] = true;
            $response['message'] = 'Tolong masukkan jenis tukang yang dicari';
            return response()->json($response, 200);
        }

        $tukang = Tukang::where('nama', 'like', '%'.request('nama').'%')
                            ->where('kota', 'like', '%'.request('kota').'%')
                            ->where('jenis', 'like', '%'.request('jenis').'%')
                            ->get();

        $response['status'] = true;
        $response['message'] = 'Data Tukang diterima';
        $response['data'] = $tukang;

        return response()->json($response, 200);
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        
        $request->validate([
            'jenis'     =>'required',
            'kota'      =>'required',
            'nama'      =>'required',
        ]);        

        // Cari tukang yang akan diupdate
        $tukang = Tukang::find($request->id);

        // Simpan perubahan dari form
        $tukang->jenis      = $request['jenis'];
        $tukang->kota       = $request['kota'];
        $tukang->nama       = $request['nama'];
        $tukang->telp       = $request['telp'];
        $tukang->alamat     = $request['alamat'];
        $tukang->keterangan = $request['keterangan'];
        
        $tukang->save();

        $response['status'] = true;
        $response['message'] = 'Data Tukang berhasil diupdate';

        return response()->json($response, 201);
    }

    public function delete(Tukang $tukang)
    {
        //
    }
}
