<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
			'nama' => 'required|string|max:255',
			'email' => 'required|email|max:255',
			'jabatan_id' => 'required|exists:jabatan,id',
			'nip' => 'required|nullable|string|max:20',
			'role' => 'required|in:Ketua Jurusan,Admin,Sespim/Direktur',
		];
	}

	public function messages(): array
	{
		return [
			'nama.required' => 'Nama lengkap harus diisi.',
			'nama.unique' => 'Nama lengkap sudah terdaftar.',
			'email.required' => 'Email harus diisi.',
			'email.unique' => 'Email sudah terdaftar.',
			'nip.required' => 'NIP harus diisi.',
			'nip.unique' => 'NIP sudah terdaftar.',
			'nip.max' => 'NIP tidak boleh lebih dari 20 karakter.',
			'jabatan_id.required' => 'Jabatan harus dipilih.',
			'role.required' => 'Role harus dipilih.',
			'role.in' => 'Role yang dipilih tidak valid.',
		];
	}
}
