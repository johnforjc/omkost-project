<?php

namespace App\Http\Controllers;

use App\User;
use App\Toko;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    public function index()
    {
        return view('toko');
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
        if(!$request->filled('jenis'))
        {
            $response['status'] = false;
            $response['message'] = 'Jenis Toko tidak ditemukan';
            return response()->json($response);
        }

        $toko = Toko::where('nama', 'like', '%'.request('nama').'%')
                    ->where('kota', 'like', '%'.request('kota').'%')
                    ->where('jenis', 'like', '%'.request('jenis').'%')
                    ->get();

        $response['status'] = true;
        $response['message'] = 'Data Toko diterima';
        $response['data'] = $toko;

        return response()->json($response, 200);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'jenis'         =>'required',
            'kota'          =>'required',
            'nama'          =>'required',
            'telp'          =>'required',
            'alamat'        =>'required',
            'keterangan'    =>'required',
        ]);   

        $toko = Toko::find($request->id);

        $toko->jenis        = $request->get('jenis');
        $toko->kota         = $request->get('kota');
        $toko->nama         = $request->get('nama');
        $toko->telp         = $request->get('telp');
        $toko->alamat       = $request->get('alamat');
        $toko->keterangan   = $request->get('keterangan');
        $toko->save();

        $response['status'] = true;
        $response['message'] = 'Data Toko update';

        return response()->json($response, 200);
    }

    public function delete(Toko $toko)
    {
        //
    }
}
