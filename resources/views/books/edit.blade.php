@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Buku</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('books.update', $books->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_buku" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="{{ old('nama_buku', $books->nama_buku) }}">
                </div>
                <div class="mb-3">
                    <label for="author_id" class="form-label">Penulis</label>
                    <select class="form-control" id="author_id" name="author_id" >
                        <option value="">Pilih Penulis</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $author->id == $books->author_id ? 'selected' : '' }}>{{ $author->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>
                    <select class="form-control" id="genre_id" name="genre_id">
                        <option value="">Pilih Genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ $genre->id == $books->genre_id ? 'selected' : '' }}>{{ $genre->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="published_year" class="form-label">Tahun Terbit</label>
                    <input type="date" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $books->tahun_terbit) }}">
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $books->isbn) }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" >
                        <option value="Tersedia" {{ $books->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Dipinjam" {{ $books->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning"><a href ="{{ route('books.index') }}" class="text-decoration-none text-black">Kembali</a></button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
