<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi';

    protected $fillable = [
        'surat_masuk_id',
        'nomor_agenda',
        'tingkat_surat',
        'instruksi_disposisi',
        'catatan',
        'created_by'
    ];
}
