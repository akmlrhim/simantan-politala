<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
			'nama' => 'required|unique:users,nama,except,id|string|max:255',
			'email' => 'required|unique:users,email,except,id|email|max:255',
			'nip' => 'required|unique:users,nip,except,id|string|max:20',
			'password' => 'required|string|min:8',
			'jabatan_id' => 'required|exists:jabatan,id',
			'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
			'password.required' => 'Password harus diisi.',
			'password.min' => 'Password harus memiliki panjang minimal 8 karakter',
			'jabatan_id.required' => 'Jabatan harus dipilih.',
			'foto.image' => 'File yang diunggah harus berupa gambar.',
			'role.required' => 'Role harus dipilih.',
			'role.in' => 'Role yang dipilih tidak valid.',
		];
	}
}
