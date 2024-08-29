<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'nama_buku' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|digits_between:0,13|max:13',
            'status' =>'required|in:Tersedia,Dipinjam'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi.',
            'isbn' => 'Field :attribute harus berupa angka',
            'string' => ':attribute harus berupa string.',
            'max' => ':attribute tidak boleh lebih dari :max karakter.',
            'unique' => ':attribute sudah ada.'
        ];
    }
}
