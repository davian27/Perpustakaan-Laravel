<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGenreRequest extends FormRequest
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
            'nama' => 'required|string|max:255' 
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama genre wajib diisi.',
            'nama.string' => 'Nama genre harus berupa string.',
            'nama.max' => 'Nama genre tidak boleh lebih dari 255 karakter.'  
        ];
        
    }
}
