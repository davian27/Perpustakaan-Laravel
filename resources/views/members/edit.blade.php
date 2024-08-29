@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Anggota</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('members.update', $members->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $members->nama) }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $members->email) }}">
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $members->telepon) }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $members->alamat) }}">
                </div>
                <div class="mb-3">
                    <label for=tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                    <input type="date" class="form-control" id=tanggal_bergabung" name="tanggal_bergabung" value="{{ old('tanggal_bergabung', $members->tanggal_bergabung) }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <button type="submit" class="btn btn-warning"><a href ="{{ route('members.index') }}" class="text-decoration-none text-black">Kembali</a></button>
            </form>
        </div>
    </div>
</div>
@endsection
