@extends('layouts.master')

@section('title', 'Pengajuan Surat')

@section('content')
<div class="mb-3">
    <label for="nama_usaha" class="form-label">Nama Usaha</label>
    <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" required>
</div>

<div class="mb-3">
    <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
    <input type="text" name="alamat_usaha" id="alamat_usaha" class="form-control" required>
</div>
@endsection
