@extends('layouts.master')

@section('content')
<h2>Daftar Pengajuan Surat</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pemohon</th>
            <th>Tanggal</th>
            <th>Jenis Surat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengajuans as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->user->name }}</td>
            <td>{{ $p->created_at->format('d-m-Y') }}</td>
            <td>{{ $p->surat->jenis_surat ?? '-' }}</td>
            <td>{{ ucfirst($p->status) }}</td>
            <td>
                <a href="{{ route('admin.pengajuan.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
