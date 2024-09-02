<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
        $id = $this->route('member');
        return [


            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $id,
            'telepon' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'tanggal_bergabung' => 'required|date|before_or_equal:today'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute tidak boleh lebih dari :max karakter',
            'email' => ':attribute harus berupa email',
            'unique' => ':attribute sudah ada',
            'before_or_equal' => ':attribute harus kurang dari atau sama dengan :date',
            'numeric' => ':attribute harus berupa angka',
            'date' => ':attribute harus berupa tanggal',

        ];
    }
}
