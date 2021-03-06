<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis', 'kota', 'nama', 'telp', 'alamat', 'keterangan', 'submit_by', 'validate_by', 'validate_at', 'status_validasi'
    ];
}
