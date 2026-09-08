<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTugasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'deadline' => ['required', 'date', 'after_or_equal:today'],
            'prioritas' => ['required', 'in:rendah,sedang,tinggi'],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul tugas wajib diisi.',
            'deadline.after_or_equal' => 'Deadline tidak boleh tanggal yang sudah lewat.',
        ];
    }
}