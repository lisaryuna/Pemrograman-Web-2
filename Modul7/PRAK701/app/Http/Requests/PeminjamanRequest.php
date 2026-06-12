<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'user_id' => 'required',
            'eksemplar_id' => 'required', 
            'tanggal_pinjam' => 'required|date',
            'batas_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ];
    }

    public function messages(): array {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'date' => 'Kolom :attribute harus berupa format tanggal yang valid.',
            'batas_kembali.after_or_equal' => 'Batas kembali tidak boleh mendahului tanggal pinjam.'
        ];
    }
}
