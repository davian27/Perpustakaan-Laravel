<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'email' => 'required|email|unique:members',
            'telepon' => 'required|string|max:14|unique:members',
            'alamat' => 'required|string|max:255',
            'tanggal_bergabung' => 'required|date|before_or_equal:today'
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Email harus berupa email',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.unique' => 'Telepon sudah terdaftar',
            'alamat.required' => 'Alamat harus diisi',
            'tanggal_bergabung.required' => 'Tgl Bergabung harus diisi',
            'tanggal_bergabung.before_or_equal' => 'Tgl Bergabung harus sebelum atau sama dengan hari ini',
            'tanggal_bergabung.date' => 'Tgl Bergabung harus berupa tanggal',
            
        ];
    }
}
