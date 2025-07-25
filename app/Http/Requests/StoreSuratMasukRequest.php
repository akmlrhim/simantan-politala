<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratMasukRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'perihal' => 'required|string|max:100',
			'asal_surat' => 'required|string|max:100',
			'nomor_surat' => 'required|unique:surat_masuk,nomor_surat|string|max:50',
			'tanggal_diterima' => 'required|date',
			'tanggal_surat' => 'required|date',
			'file_surat' => 'required|file|mimes:pdf',
		];
	}
}
