@extends('layouts.master')

@section('title', 'Manajeman Pengguna')

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
                            <a class="btn btn-primary btn-round ms-auto" href="{{ route('users.create') }}">
                                <i class="fa fa-plus"></i>
                                Tambah Pengguna
                            </a>
                        </div>

                    </div>
                    <div class="card-body"> <!-- Modal -->
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
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
                                    <!--perulangan array -->
                                    <tr>
                                        @foreach ($users as $user)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">@csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btn-delete">Hapus</button>
                                                </form>
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
