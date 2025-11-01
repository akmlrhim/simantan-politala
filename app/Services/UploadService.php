<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class UploadService
{
	public function uploadFoto($file, $oldFile = null)
	{
		if (!$file) {
			return $oldFile;
		}

		if ($oldFile && $oldFile !== 'default.jpg' && Storage::disk('public')->exists('foto_profil/' . $oldFile)) {
			Storage::disk('public')->delete('foto_profil/' . $oldFile);
		}

		$filename = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('foto_profil/', $filename, 'public');

		return $filename;
	}

	public function uploadSignature($file, $oldFile = null)
	{
		if (!$file) {
			return $oldFile;
		}

		if ($oldFile && Storage::disk('public')->exists('ttd/' . $oldFile)) {
			Storage::disk('public')->delete('ttd/' . $oldFile);
		}

		$filename = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('ttd/', $filename, 'public');

		return $filename;
	}
}
