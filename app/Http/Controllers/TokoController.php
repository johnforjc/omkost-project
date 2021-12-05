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
            //'jenis'=>'required',
            //'identitas'=>'required',
            //'bukti' => 'image',
        ]);        
        
        Toko::create([
            'jenis' => $request['jenis'],
            'kota' => $request['kota'],
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'alamat' => $request['alamat'],
            'keterangan' => $request['keterangan'],
            'submit_by' => $user->email,
            'submit_at' => Carbon::now(),
        ]);

        //$imageName = time().'.'.$request->image->extension();  
        //$request->image->move(public_path('images'), $imageName);

        $response['status'] = true;
        $response['message'] = 'Data Toko tersimpan';

        return response()->json($response, 200);
    }


    public function get(Request $request)
    {
        $toko = Toko::all();
        //Toko::select('*');
        if($request->filled('cari'))
        {
            $toko = Toko::where('identitas', 'like', '%'.request('cari').'%')
            ->orWhere('nama', 'like', '%'.request('cari').'%')
            ->get();
        }
        //$toko = Toko::get();
        //$toko = Toko::where('Tokoid', request('Tokoid'))->get(),200,[]);

        //$user = User::where('email', $request->email)->first();
        $response['status'] = true;
        $response['message'] = 'Data Toko diterima';
        $response['data'] = $toko;

        return response()->json($response, 200);
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

        $toko = Toko::find($request->id);

        $toko->jenis =  $request->get('jenis');
        $toko->identitas = $request->get('identitas');
        $toko->nama = $request->get('nama');
        $toko->telp = $request->get('telp');
        $toko->keterangan = $request->get('keterangan');
        $toko->bukti = $request->get('bukti');
        $toko->save();

        $response['status'] = true;
        $response['message'] = 'Data Toko update';
        //$response['data'] = $toko;

        return response()->json($response, 200);
    }

    public function delete(Toko $toko)
    {
        //
    }
}
