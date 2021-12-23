<?php

namespace App\Http\Controllers;

use App\User;
use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function index(){
        return view('notification');
    }

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


    public function get(Request $request)
    {
        $user = Auth::user();

        $notifikasi = Notifications::where('email_user_rekomendasi', 'like' , '%'.$user->email.'%')
                                    ->paginate(10);

        $response['status'] = true;
        $response["data"] = $notifikasi;

        return response()->json($response, 201);
    }
}
