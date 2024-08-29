@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Penulis</h1>
            <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Tambah Penulis</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Bio</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $index => $author)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $author->nama }}</td>
                        <td>{{ $author->bio }}</td>
                        <td>
                            
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display: inline" onsubmit="return confirmDelete()">
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
        return confirm ('Apakah Anda yakin ingin menghapus data ini ?')
    }
</script>
@endsection
