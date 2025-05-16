@extends('layouts.master')

@section('title', 'Manajeman Pengguna')

@section('content')
<div class="container">
    <h2>Tambah Pengguna</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Role:</label>
            <select name="role" class="form-control" required>
                <option value="masyarakat">Masyarakat</option>
                <option value="petugas">Petugas</option>
                <option value="kepala_desa">Kepala Desa</option>
                <option value="sekretaris_desa">Sekretaris Desa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
