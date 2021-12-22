<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis', 'kota', 'identitas', 'nama', 'telp', 'keterangan', 'bukti', 'submit_by', 'validate_by', 'validate_at', 'status_validasi'
    ];
}
