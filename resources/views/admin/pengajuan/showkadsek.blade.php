@extends('layouts.master')

@section('title', 'Detail Pengajuan Surat')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Detail Pengajuan Surat</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Pengajuan Surat</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Pengajuan Surat</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title">Informasi Umum</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th class="bg-light">Nama Pemohon</th>
                                        <td>{{ $pengajuan->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Jenis Surat</th>
                                        <td>{{ $pengajuan->surat->jenis_surat ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Tanggal Pengajuan</th>
                                        <td>{{ $pengajuan->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Status</th>
                                        <td>
                                            <span
                                                class="badge
                                                @if ($pengajuan->status === 'selesai') bg-success
                                                @elseif($pengajuan->status === 'ditolak') bg-danger
                                                @else bg-primary @endif">
                                                {{ ucfirst($pengajuan->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title">Lampiran Dokumen</div>
                    </div>
                    <div class="card-body">
                        @if ($pengajuan->lampiran->count())
                            <ul class="list-group list-group-flush">
                                @foreach ($pengajuan->lampiran as $lampiran)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $lampiran->nama_lampiran }}
                                        <a href="{{ asset('storage/' . $lampiran->file) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title">Verifikasi Dokumen</div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2 align-items-center">
                        <form action="{{ route('admin.pengajuan.verifikasi', $pengajuan->id) }}" method="POST"
                            class="d-flex gap-2">
                            @csrf
                            <!-- @method('PUT') -->
                            @php
                                $userRole = Auth::user()->role; // Ambil peran pengguna yang sedang login
                            @endphp
                            @if ($userRole === 'kepala_desa')
                            @if ($pengajuan->surat->kategori === 'Kepala Desa')
                                <button type="submit" name="status" value="selesai" class="btn btn-success">
                                    Verifikasi (Selesai)
                                </button>
                            @else
                                <div class="alert alert-warning mb-0">
                                    Surat ini hanya dapat diverifikasi oleh Sekretaris Desa.
                                </div>
                            @endif
                        @elseif ($userRole === 'sekretaris_desa')
                            @if ($pengajuan->surat->kategori === 'Sekretaris Desa')
                                <button type="submit" name="status" value="selesai" class="btn btn-success">
                                    Verifikasi (Selesai)
                                </button>
                            @else
                                <div class="alert alert-warning mb-0">
                                    Surat ini hanya dapat diverifikasi oleh Kepala Desa.
                                </div>
                            @endif
                        @endif
                        </form>
                        <form action="{{ route('pengajuan.updateStatus', $pengajuan->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- atau 'POST' jika tidak memakai resource -->
                                <button type="submit" name="status" value="ditolak" class="btn btn-danger">Tolak</button>
                        </form>
                        <a href="{{ route('admin.pengajuan.kadsek') }}" class="btn btn-outline-secondary">Kembali</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
