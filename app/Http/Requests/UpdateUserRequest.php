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
			'jabatan_id' => 'required|string|max:255',
			'nip' => 'required|nullable|string|max:20',
			'role' => 'required|in:Ketua Jurusan,Admin,Sespim/Direktur,User',
		];
	}
}
