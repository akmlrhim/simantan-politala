<?php

namespace App\Validation;

class MyRules
{
	public function check_isi(string $str, ?string $fields = null, array $data = []): bool
	{
		$cleanedValue = trim(strip_tags($str));
		return !empty($cleanedValue);
	}
}
