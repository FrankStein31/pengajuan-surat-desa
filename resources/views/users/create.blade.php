@extends('layouts.master')

@section('title', 'Manajeman Pengguna')

@section('content')

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Forms</h3>
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
                <a href="#">Forms</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Basic Form</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Elements</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form id="form-simpan" action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Nama:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Role:</label>
                                <select name="role" class="form-control" required>
                                    <option value="masyarakat">Masyarakat</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="kepala_desa">Kepala Desa</option>
                                    <option value="sekretaris_desa">Sekretaris Desa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success">Simpan</button>
                        <a href="/users" class="btn btn-secondary">Batal</a>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@push('js');

<script>

    $("#form-simpan").on("submit", function (e) {
        e.preventDefault();

        swal("Berhasil!", "Data berhasil disimpan!", {
            icon: "success",
            buttons: {
                confirm: {
                    className: "btn btn-success",
                },
            },
        }).then(() => {
            this.submit(); // submit form setelah klik OK
        });
    });


    </script>
@endpush
@endsection
