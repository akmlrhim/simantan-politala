<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

	protected $casts = [
		'tanggal_surat' => 'date',
		'tanggal_diterima' => 'date'
	];

	public function telahanStaf()
	{
		return $this->hasOne(TelahanStaf::class, 'surat_masuk_id');
	}

	public function disposisi()
	{
		return $this->hasOne(Disposisi::class, 'surat_masuk_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}
}
