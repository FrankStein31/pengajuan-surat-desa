@extends('layouts.master')

@section('title', 'Daftar Dokumen Syarat')

@section('content')
<br>
<div class="container">
    <h2>Daftar Dokumen Syarat</h2>
    <a href="{{ route('dokumen.create') }}" class="btn btn-success">+ Tambah Dokumen</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped" id="tabel-dokumen">
        <thead>
            <tr>
                <th style="width:1%">No.</th>
                <th style="width:20%">Nama Dokumen</th>
                <th style="width:10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dokumens as $index => $dokumen)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dokumen->nama_dokumen ?? 'Tidak Ada Nama' }}</td>
                <td>
                    <form action="{{ route('dokumen.destroy', $dokumen->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('dokumen.edit', $dokumen->id) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada dokumen</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
