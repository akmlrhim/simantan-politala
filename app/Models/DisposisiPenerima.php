<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisposisiPenerima extends Model
{
    protected $table = 'disposisi_penerima';

    protected $fillable = [
        'disposisi_id',
        'kepada_user_id',
        'diterima_tanggal',
        'status',
    ];
}
