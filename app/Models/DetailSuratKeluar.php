<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSuratKeluar extends Model
{
    protected $table = 'detail_surat_keluar';
    protected $fillable = ['surat_keluar_id', 'key', 'value'];

    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class, 'surat_keluar_id');
    }
}
