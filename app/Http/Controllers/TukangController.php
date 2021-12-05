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
            //'jenis'=>'required',
            //'identitas'=>'required',
            //'bukti' => 'image',
        ]);        
        
        Tukang::create([
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
        $response['message'] = 'Data Tukang tersimpan';

        return response()->json($response, 200);
    }


    public function get(Request $request)
    {
        $tukang = Tukang::all();
        //Tukang::select('*');
        if($request->filled('cari'))
        {
            $tukang = Tukang::where('identitas', 'like', '%'.request('cari').'%')
            ->orWhere('nama', 'like', '%'.request('cari').'%')
            ->get();
        }
        //$tukang = Tukang::get();
        //$tukang = Tukang::where('Tukangid', request('Tukangid'))->get(),200,[]);

        //$user = User::where('email', $request->email)->first();
        $response['status'] = true;
        $response['message'] = 'Data Tukang diterima';
        $response['data'] = $tukang;

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

        $tukang = Tukang::find($request->id);

        $tukang->jenis =  $request->get('jenis');
        $tukang->identitas = $request->get('identitas');
        $tukang->nama = $request->get('nama');
        $tukang->telp = $request->get('telp');
        $tukang->keterangan = $request->get('keterangan');
        $tukang->bukti = $request->get('bukti');
        $tukang->save();

        $response['status'] = true;
        $response['message'] = 'Data Tukang update';
        //$response['data'] = $tukang;

        return response()->json($response, 200);
    }

    public function delete(Tukang $tukang)
    {
        //
    }
}
