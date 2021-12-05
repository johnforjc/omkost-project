<?php

namespace App\Http\Controllers;

use App\User;
use App\Blacklist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlacklistController extends Controller
{
    public function index()
    {
        return view('blacklist');
    }

    public function set(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'jenis'=>'required',
            'identitas'=>'required',
            'bukti' => 'image',
        ]);        
        /*
        $blacklist = new Contact([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'job_title' => $request->get('job_title'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact saved!');
        */
        Blacklist::create([
            'jenis' => $request['jenis'],
            'kota' => $request['kota'],
            'identitas' => $request['identitas'],
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'keterangan' => $request['keterangan'],
            'bukti' => $request['bukti'],
            'submit_by' => $user->email,
            'submit_at' => Carbon::now(),
        ]);

        //$imageName = time().'.'.$request->image->extension();  
        //$request->image->move(public_path('images'), $imageName);

        $response['status'] = true;
        $response['message'] = 'Data blacklist tersimpan';

        return response()->json($response, 200);
    }


    public function get(Request $request)
    {
        $blacklist = Blacklist::all();
        //Blacklist::select('*');
        if($request->filled('cari'))
        {
            $blacklist = Blacklist::where('identitas', 'like', '%'.request('cari').'%')
            ->orWhere('nama', 'like', '%'.request('cari').'%')
            ->get();
        }
        //$blacklist = Blacklist::get();
        //$blacklist = Blacklist::where('blacklistid', request('blacklistid'))->get(),200,[]);

        //$user = User::where('email', $request->email)->first();
        $response['status'] = true;
        $response['message'] = 'Data blacklist diterima';
        $response['data'] = $blacklist;

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

    public function delete(Blacklist $blacklist)
    {
        //
    }
}
