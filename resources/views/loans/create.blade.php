@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Tambah Peminjaman</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="book_id" class="form-label">Buku</label>
                    <select class="form-control" id="book_id" name="book_id" >
                        <option value="">Pilih Buku</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>{{ $book->nama_buku }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="members_id" class="form-label">Anggota</label>
                    <select class="form-control" id="members_id" name="members_id" >
                        <option value="">Pilih Anggota</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ old('members_id') == $member->id ? 'selected' : '' }}>{{ $member->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="loan_date" class="form-label">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="loan_date" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}" >
                </div>
                <div class="mb-3">
                    <label for="return_date" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="return_date" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian') }}" >
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" >
                        <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="Dikembalikan" {{ old('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="Terlambat" {{ old('status') == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning"><a href ="{{ route('loans.index') }}" class="text-decoration-none text-black">Kembali</a></button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
