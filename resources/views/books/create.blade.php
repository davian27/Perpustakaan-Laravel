@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Tambah Buku</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_buku" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="{{ old('nama_buku') }}" >
                </div>
                <div class="mb-3">
                    <label for="author_id" class="form-label">Penulis</label>
                    <select class="form-control" id="author_id" name="author_id">
                        <option value="">Pilih Penulis</option>
                        @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>
                    <select class="form-control" id="genre_id" name="genre_id">
                        <option value="">Pilih Genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : ''}}>{{ $genre->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="date" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="number" class="form-control" id="isbn" name="isbn" value="{{ old('isbn') }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" >
                        <option value="Tersedia">Tersedia</option>
                        <option value="Dipinjam">Dipinjam</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
