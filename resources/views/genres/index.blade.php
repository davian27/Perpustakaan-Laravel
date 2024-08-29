@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Kategori</h1>
            <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genres as $index =>  $genre)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $genre->nama }}</td>
                            <td>
                                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
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
