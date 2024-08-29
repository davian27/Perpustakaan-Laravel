@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Penulis</h1>
            <form action="{{ route('authors.update', $authors->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="nama" value="{{ old('nama', $authors->nama) }}" required>
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" name="bio">{{ old('bio', $authors->bio) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <button type="submit" class="btn btn-warning"><a href ="{{ route('authors.index') }}" class="text-decoration-none text-black">Kembali</a></button>
            </form>
        </div>
    </div>
</div>
@endsection
