<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
	protected $table = 'surat_masuk';
	protected $fillable = [
		'perihal',
		'asal_surat',
		'nomor_surat',
		'tanggal_diterima',
		'tanggal_surat',
		'file_surat',
		'status',
		'created_by',
	];
}
