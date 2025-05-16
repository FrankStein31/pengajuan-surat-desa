@extends('layouts.master')

@section('title', 'Pengajuan Surat')

@section('content')
<div class="mb-3">
    <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
    <input type="text" name="nama_pemohon" class="form-control" required>
</div>
<div class="mb-3">
    <label for="alasan" class="form-label">Alasan Permohonan</label>
    <textarea name="alasan" class="form-control" required></textarea>
</div>
@endsection
