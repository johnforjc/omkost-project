<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'validation_status', 'jenis_validation', 'keterangan', 'email_user_rekomendasi', 'id_item_rekomendasi'
    ];


}
