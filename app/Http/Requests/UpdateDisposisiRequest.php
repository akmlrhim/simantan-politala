<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDisposisiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nomor_agenda' => 'required',
            'tingkat_surat' => 'required',
            'instruksi_disposisi' => 'required|array|min:1',
            'kepada_jabatan_id'   => 'required|array|min:1',
            'kepada_jabatan_id.*' => 'exists:jabatan,id',
        ];
    }
}
