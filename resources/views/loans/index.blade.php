@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Peminjaman</h1>
            <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Buku</th>
                        <th>Anggota</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $index => $loan)
                    <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $loan->books->nama_buku}}</td>
                        
                        <td>{{ $loan->members->nama}}</td>
                        <td>{{ $loan->tanggal_peminjaman }}</td>
                        <td>{{ $loan->tanggal_pengembalian }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>
                            <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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