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
            'telepon' => 'required|string|max:14',
            'alamat' => 'required|string|max:255',
            'tanggal_bergabung' => 'required|date|before_or_equal:today'
        ];
    }
}
