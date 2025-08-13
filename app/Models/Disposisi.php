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
        'kepada_jabatan_id',
        'catatan',
        'created_by'
    ];

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_masuk_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function disposisiPenerima()
    {
        return $this->hasOne(DisposisiPenerima::class, 'disposisi_id');
    }
}
