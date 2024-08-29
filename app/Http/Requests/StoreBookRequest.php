<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'nama_buku' => 'required|string|max:255|unique:book',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|digits_between:0,13|max:13|unique:book',
            'status' =>'required|in:Tersedia,Dipinjam'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Field :attribute harus diisi.',
            'string' => 'Field :attribute harus berupa teks.',
            'max' => 'Field :attribute maksimal :max karakter.',
            'isbn' => 'Field :attribute harus berupa angka',
            'unique' => 'Field :attribute sudah ada.',
            'date' => 'Field :attribute harus berupa tanggal.',
            'in' => 'Field :attribute harus dipilih.'
        ];
    }
}
