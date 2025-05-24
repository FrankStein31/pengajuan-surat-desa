@extends('layouts.master')
@section('title', 'Pengajuan Surat Terkirim')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Daftar Pengajuan Surat Terkirim</h3>
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
                <a href="#">Pengajuan Surat Terkirim</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Daftar Pengajuan Surat Terkirim</h4>

                    </div>
                </div>
                <div class="card-body"> <!-- Modal -->
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th>Cetak</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuans as $index => $pengajuan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pengajuan->surat->jenis_surat ?? '-' }}</td>
                    <td>{{ $pengajuan->created_at->format('d-m-Y') }}</td>
                    <td>
                        <ul class="mb-2">
                            @forelse ($pengajuan->lampiran as $lampiran)
                                <li>
                                    <a href="{{ asset('storage/' . $lampiran->file) }}" target="_blank">
                                        📎 {{ $lampiran->nama_lampiran }}
                                    </a>
                                </li>
                            @empty
                                <li class="text-muted">Belum ada dokumen</li>
                            @endforelse
                        </ul>
                    </td>
                    <td>
                        <span class="badge
                            @if ($pengajuan->status == 'diproses') bg-warning
                            @elseif ($pengajuan->status == 'selesai') bg-success
                            @elseif ($pengajuan->status == 'ditolak') bg-danger
                            @else bg-secondary @endif">
                            {{ ucfirst($pengajuan->status) }}
                        </span>
                    </td>
                    <td>
                        @if ($pengajuan->status === 'selesai')
                        <a href="{{ route('pengajuan.cetak', $pengajuan->id) }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-file-pdf"></i> Download PDF
                        </a>
                        @else
                            <span class="text-muted">Belum Tersedia</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
        <script>
            $(document).ready(function() {


                // Add Row
                $("#add-row").DataTable({
                    pageLength: 5,
                });


            });
        </script>
    @endpush
@endsection
