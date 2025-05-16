@extends('layouts.master')

@section('title', 'Manajeman Pengguna')

@section('content')
<div class="container">
    <h2>Edit Pengguna</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>Role:</label>
            <select name="role" class="form-control" required>
                <option value="masyarakat" {{ $user->role == 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="kepala_desa" {{ $user->role == 'kepala_desa' ? 'selected' : '' }}>Kepala Desa</option>
                <option value="sekretaris_desa" {{ $user->role == 'sekretaris_desa' ? 'selected' : '' }}>Sekretaris Desa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
