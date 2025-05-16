@extends('layouts.master')

@section('title', 'Pelayanan Pengajuan Persuratan Desa Maduretno')

@section('content')
<br>
<div class="container">
    <h2>Daftar Jenis Surat</h2>
    <a href="{{route('surat.create')}}" class="btn btn-success">+ Tambah Data</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table striped" id="tabel-surat">
        <thead>
            <tr>
                <th style="width:1%">No.</th>
                <th style="width:5%">Kode Surat</th>
                <th style="width:5%">Jenis Surat</th>
                <th style="width:5%">Deskripsi Surat</th>
                <th style="width:5%">Syarat Surat</th>
                <th style="width:5%">Aksi</th>
            </tr>
        </thead>
        <tbody>
             @foreach($dataSurat as $surat)          <!--perulangan array -->
            <tr>
                <td> {{ $loop->iteration }}</td>     <!--penomoran-->
                <td> {{ $surat->id }}</td>
                <td>{{ $surat->jenis_surat }}</td>
                <td>{{ $surat->deskripsi_surat }}</td>
                <!-- <td>{{ $surat->syarat_id }}</td> -->
                <td>
                    @if ($surat->dokumen)
                        @foreach ($surat->dokumen as $dokumen)
                            {{ $dokumen->nama_dokumen }}<br>
                        @endforeach
                    @else
                        Tidak ada syarat
                    @endif
                </td>
                <td>
                    <form action="{{route('surat.destroy', $surat->id)}}" method="POST">@csrf
                        @method('DELETE')
                        <a href="{{route('surat.edit', $surat->id)}}" class = "btn btn-warning">Edit</a>
                        <button class = "btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection