@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Buku</h1>
            <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Ketegori</th>
                        <th>Tahun Terbit</th>
                        <th>ISBN</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->nama_buku }}</td>
                            <td>{{ $book->author->nama }}</td>
                            <td>{{ $book->genre->nama }}</td>
                            <td>{{ $book->tahun_terbit }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->status }}</td>
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function confirmDelete ()
    {
        return confirm('Apakah Anda yakin ingin menghapus data ini ?')
    }
</script>
@endsection
