@extends('layouts.master')

@section('title', 'Pengajuan Surat')

@section('content')
<div class="mb-3">
    <label for="alamat" class="form-label">Alamat Lengkap</label>
    <input type="text" name="alamat" class="form-control" required>
</div>
<div class="mb-3">
    <label for="lama_tinggal" class="form-label">Lama Tinggal (Tahun)</label>
    <input type="number" name="lama_tinggal" class="form-control" required>
</div>
@endsection
