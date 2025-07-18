<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratKeluar extends Model
{
	protected $table = 'surat_keluar';
	protected $with = ['user'];

	protected $fillable = [
		'nomor_surat',
		'hal',
		'tanggal_surat',
		'isi_surat',
		'created_by',
	];

	protected $casts = [
		'tanggal_surat' => 'date',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, 'created_by');
	}
}
