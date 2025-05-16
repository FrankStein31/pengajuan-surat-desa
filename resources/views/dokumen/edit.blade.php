@extends('layouts.master')

@section('title', 'Edit Dokumen')

@section('content')
<div class="container">
    <h2>Edit Dokumen</h2>

    <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
            <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" value="{{ $dokumen->nama_dokumen }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
