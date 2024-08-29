@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Kategori</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('genres.update', $genres->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $genres->nama) }}" >
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <button type="submit" class="btn btn-warning"><a href ="{{ route('genres.index') }}" class="text-decoration-none text-black">Kembali</a></button>
            </form>
        </div>
    </div>
</div>
@endsection
