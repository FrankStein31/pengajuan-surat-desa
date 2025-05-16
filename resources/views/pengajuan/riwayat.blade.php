@extends('layouts.master')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Riwayat Pengajuan Surat</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Dokumen</th>
                    <th>Status</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
