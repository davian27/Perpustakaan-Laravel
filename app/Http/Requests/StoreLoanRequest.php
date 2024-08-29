<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
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
            'book_id' => 'required|exists:book,id',
            'members_id' => 'required|exists:members,id',
            'tanggal_peminjaman' => 'required|date|before_or_equal:today',
            'tanggal_pengembalian' => 'required|date|after_or_equal:today',
            'status' => 'required|in:Dipinjam'
        ];
    }

    public function messages(): array
    {
        return [
            'book_id.required' => 'Buku harus dipilih.',
            'book_id.exists' => 'Buku tidak ditemukan.',
            'members_id.required' => 'Anggota harus dipilih.',
            'members_id.exists' => 'Anggota tidak ditemukan.',
            'tanggal_peminjaman.required' => 'Tanggal peminjaman harus diisi.',
            'tanggal_peminjaman.date' => 'Tanggal peminjaman harus berupa tanggal yang valid.',
            'tanggal_peminjaman.before_or_equal' => 'Tanggal peminjaman harus sebelum atau sama dengan hari ini.',
            'tanggal_pengembalian.required' => 'Tanggal pengembalian harus diisi.',
            'tanggal_pengembalian.date' => 'Tanggal pengembalian harus berupa tanggal yang valid.',
            'tanggal_pengembalian.after_or_equal' => 'Tanggal pengembalian harus setelah atau sama dengan hari ini.',
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status harus salah satu dari: Dipinjam, Dikembalikan, Terlambat.',
        ];
    }
}
