<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratKeluarRequest extends FormRequest
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
			'nomor_surat' => 'required|unique:surat_keluar,nomor_surat,except,id|string|max:120',
			'hal' => 'required|string|max:120',
			'tanggal_surat' => 'required|date',
			'isi_surat' => 'required|string',

			'details' => 'array',
			'details.*.key' => 'nullable|string|max:100|required_with:details.*.value',
			'details.*.value' => 'nullable|string|required_with:details.*.key',
		];
	}

	public function messages(): array
	{
		return [
			'details.*.key.required_with' => 'Nama detail wajib diisi jika isi detail ada.',
			'details.*.value.required_with' => 'Isi detail wajib diisi jika nama detail ada.',
			'details.*.key.max' => 'Nama detail tidak boleh lebih dari 100 karakter.',
		];
	}
}
