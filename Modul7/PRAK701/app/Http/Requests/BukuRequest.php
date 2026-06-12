<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array{
        return [
            'kategori_id' => 'required',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:150',
            'penerbit' => 'required|string|max:150',
            'tahun_terbit' => 'required|integer|between:1800,2026'
        ];
    }

    public function messages(): array {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'tahun_terbit.between' => 'Tahun terbit tidak valid (1800 - 2026).',
            'integer' => 'Kolom :attribute harus berupa angka.'
        ];
    }
}
