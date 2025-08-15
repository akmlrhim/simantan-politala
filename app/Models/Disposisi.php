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

    protected $casts = [
        'instruksi_disposisi' => 'array'
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
        return $this->hasMany(DisposisiPenerima::class, 'disposisi_id');
    }
}
