<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function set(Request $request)
    {
        $user = Auth::user();

        if(!$user->isAdmin){
            $response['status']     = false;
            $response['message']    = 'Anda tidak berhak melakukan operasi ini';
            return response()->json($response, 401);
        }
        
        $request->validate([
            'status'                => 'required',
            'jenis'                 => 'required',
            'keterangan'            => 'required',
            'userRekomendasi'       => 'required',
            'rekomendasiItem'       => 'required',
        ]);   

        Notifications::create([
            'jenis_validation'      => $request['jenis'],
            'validation_status'     => $request['status'],
            'id_rekomendasi'        => $request['rekomendasiItem'],
            'id_user_rekomendasi'   => $request['userRekomendasi'],
            'keterangan'            => $request['keterangan'],
        ]);
    }


    public function get()
    {
        $user = Auth::user();

        $notifikasi = Notifications::where('id_user_rekomendasi', '=', $user->id)
                                    ->get();

        $response['status'] = true;
        $response['data'] = $notifikasi;

        return response()->json($response, 200);
    }
}
