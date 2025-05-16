@extends('layouts.master')
@section('title', 'Daftar Pengajuan Surat')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">DataTables.Net</h3>
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
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Pengajuan Surat</h4>

                        </div>
                    </div>
                    <div class="card-body"> <!-- Modal -->


                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->user->name }}</td>
                                        <td>{{ $p->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $p->surat->jenis_surat ?? '-' }}</td>
                                        <td>
                                            @if($p->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif($p->status == 'diproses')
                                                <span class="badge badge-primary">Proses</span>

                                            @elseif($p->status == 'ditolak')
                                                <span class="badge badge-danger">Ditolak</span>
                                            @elseif($p->status == 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.pengajuan.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
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
