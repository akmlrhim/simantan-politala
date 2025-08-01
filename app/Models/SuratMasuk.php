<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratMasuk extends Model
{
	protected $table = 'surat_masuk';

	protected $with = ['telahanStaf'];

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

	public function telahanStaf(): BelongsTo
	{
		return $this->belongsTo(SuratMasuk::class);
	}
}
