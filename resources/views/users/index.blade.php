@extends('layouts.master')

@section('title', 'Manajeman Pengguna')

@section('content')
<br>
<div class="container">
    <h2>Daftar Pengguna</h2>
    <a href="{{ route('users.create') }}" class="btn btn-success">+Tambah User</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped" id="tabel-users">
        <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th style="width:20%">Nama</th>
                <th style="width:25%">Email</th>
                <th style="width:15%">Role</th>
                <th style="width:15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">@csrf
                        @method('DELETE')
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
