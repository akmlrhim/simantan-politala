<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelahanStaf extends Model
{
    protected $table = 'telahan_staf';

    protected $fillable = [
        'surat_masuk_id',
        'perihal',
        'dari',
        'isi_surat',
        'fakta_data',
        'saran_tindak',
        'created_by'
    ];
}
