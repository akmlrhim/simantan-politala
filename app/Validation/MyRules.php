<?php

namespace App\Validation;

class MyRules
{
	public function check_isi(string $str, ?string $fields = null, array $data = []): bool
	{
		// Menghapus tag HTML dan spasi
		$cleanedValue = trim(strip_tags($str));
		return !empty($cleanedValue);
	}
}
