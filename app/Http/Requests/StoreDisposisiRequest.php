<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDisposisiRequest extends FormRequest
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
            'surat_masuk_id' => 'required',
            'nomor_agenda' => 'required',
            'tingkat_surat' => 'required',
            'kepada_jabatan_id' => 'required',
            'instruksi_disposisi' => 'required'
        ];
    }
}
