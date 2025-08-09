<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SuratMasuk extends Model
{
	protected $table = 'surat_masuk';

	protected $with = [
		'telahanStaf',
		'telahanStaf.suratDari',
		'telahanStaf.perihalSurat',
		'telahanStaf.user',
	];

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

	public function telahanStaf(): HasOne
	{
		return $this->hasOne(TelahanStaf::class, 'surat_masuk_id');
	}
}
