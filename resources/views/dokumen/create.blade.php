@extends('layouts.master')

@section('title', 'Tambah Dokumen')

@section('content')
<div class="container">
    <h4>Tambah Syarat Dokumen</h4>
    <form action="{{ route('dokumen.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Dokumen</label>
            <input type="text" class="form-control" name="nama_dokumen" required placeholder="Contoh: Fotocopy KTP">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
