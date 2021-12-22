<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function set($status, $keterangan, $jenis, $email, $id)
    {
        $user = Auth::user();

        if(!$user->isAdmin){
            $response['status']     = false;
            $response['message']    = 'Anda tidak berhak melakukan operasi ini';
            return response()->json($response, 401);
        } 

        Notifications::create([
            'validation_status'     => $id,
            'jenis_validation'      => $jenis,
            'keterangan'            => $keterangan,
            'email_user_rekomendasi'=> $email,
            'id_item_rekomendasi'   => $id,
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
