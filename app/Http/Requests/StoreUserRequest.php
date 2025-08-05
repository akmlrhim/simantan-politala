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
			'password' => 'required|min:8',
			'jabatan_id' => 'required|string|max:255',
			'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'role' => 'required|in:Ketua Jurusan,Admin,Sespim/Direktur',
		];
	}
}
