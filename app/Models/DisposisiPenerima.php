<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisposisiPenerima extends Model
{
    protected $table = 'disposisi_penerima';

    protected $fillable = [
        'disposisi_id',
        'kepada_jabatan_id',
        'diterima_tanggal',
        'status',
    ];

    public function disposisi()
    {
        return $this->belongsTo(Disposisi::class, 'disposisi_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'kepada_jabatan_id',);
    }
}
