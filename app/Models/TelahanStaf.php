<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TelahanStaf extends Model
{
    protected $table = 'telahan_staf';

    protected $fillable = [
        'surat_masuk_id',
        'perihal',
        'dari',
        'isi',
        'fakta_data',
        'saran_tindak',
        'created_by'
    ];

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_masuk_id');
    }

    public function suratDari()
    {
        return $this->belongsTo(Jabatan::class, 'dari');
    }

    public function perihalSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'perihal');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
