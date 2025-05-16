@extends('layouts.master')

@section('title', 'Detail Pengajuan Surat')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h4 class="mb-3">📝 Detail Pengajuan Surat</h4>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            Informasi Umum
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6"><strong>ID Pengajuan:</strong></div>
                <div class="col-md-6">{{ $pengajuan->id }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><strong>Nama Pemohon:</strong></div>
                <div class="col-md-6">{{ $pengajuan->user->name }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><strong>Jenis Surat:</strong></div>
                <div class="col-md-6">{{ $pengajuan->surat->jenis_surat ?? '-' }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><strong>Tanggal Pengajuan:</strong></div>
                <div class="col-md-6">{{ $pengajuan->created_at->format('d-m-Y') }}</div>
            </div>
            <div class="row">
                <div class="col-md-6"><strong>Status:</strong></div>
                <div class="col-md-6">
                    <span class="badge 
                        @if($pengajuan->status === 'selesai') bg-success
                        @elseif($pengajuan->status === 'ditolak') bg-danger
                        @else bg-warning @endif">
                        {{ ucfirst($pengajuan->status) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white">
            Lampiran Dokumen
        </div>
        <div class="card-body">
            @if ($pengajuan->lampiran->count())
                <ul class="list-group list-group-flush">
                    @foreach ($pengajuan->lampiran as $lampiran)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $lampiran->nama_lampiran }}
                            <a href="{{ asset('storage/' . $lampiran->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                Lihat File
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Tidak ada lampiran yang tersedia.</p>
            @endif
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            Verifikasi Pengajuan
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pengajuan.verifikasi', $pengajuan->id) }}" method="POST" class="d-flex gap-2">
                @csrf
                <!-- @method('PUT') -->

                <button type="submit" name="status" value="diproses" class="btn btn-warning">Diproses</button>
                <button type="submit" name="status" value="selesai" class="btn btn-success">Verifikasi (Selesai)</button>
                <button type="submit" name="status" value="ditolak" class="btn btn-danger">Tolak</button>
                <a href="{{ route('admin.pengajuan.index') }}" class="btn btn-outline-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
