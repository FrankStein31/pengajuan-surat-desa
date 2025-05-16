@extends('layouts.master')

@section('title', 'Pelayanan Pengajuan Persuratan Desa Maduretno')

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
                            <h4 class="card-title">Daftar Jenis Surat</h4>
                            @if (auth()->user()->role == 'admin')
                                <a class="btn btn-primary btn-round ms-auto" href="{{ route('surat.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Tambah Jenis Surat
                                </a>
                            @endif
                        </div>

                    </div>
                    <div class="card-body"> <!-- Modal -->
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width:5%">No.</th>
                                        <th style="width:5%">Kode Surat</th>
                                        <th style="width:15%">Jenis Surat</th>
                                        <th style="width:40%">Deskripsi Surat</th>
                                        <th style="width:15%">Syarat Surat</th>
                                        @if (auth()->user()->role == 'admin')
                                            <th style="width:20%">Aksi</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataSurat as $surat)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
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
                                            @if (auth()->user()->role == 'admin')
                                                <td>
                                                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('surat.edit', $surat->id) }}"
                                                            class = "btn btn-warning btn-sm">Edit</a>
                                                        <button type="button"
                                                            class = "btn btn-danger btn-sm btn-delete">Hapus</button>
                                                    </form>

                                                </td>
                                            @endif
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
            document.addEventListener('DOMContentLoaded', function() {
                const deleteButtons = document.querySelectorAll('.btn-delete');

                deleteButtons.forEach(function(button) {
                    button.addEventListener('click', function(e) {
                        const form = this.closest('form');

                        swal({
                            title: "Apakah Anda yakin?",
                            text: "Data yang dihapus tidak dapat dikembalikan!",
                            icon: "warning",
                            buttons: {
                                cancel: {
                                    text: "Batal",
                                    visible: true,
                                    className: "btn btn-danger"
                                },
                                confirm: {
                                    text: "Ya, hapus!",
                                    className: "btn btn-success"
                                }
                            },
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                form.submit(); // Submit form jika dikonfirmasi
                            }
                        });
                    });
                });
            });
            $(document).ready(function() {
                // Add Row
                $("#add-row").DataTable({
                    pageLength: 5,
                });
            });
        </script>
    @endpush
@endsection
