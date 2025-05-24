@extends('layouts.master')

@section('title', 'Edit Profil')

@section('content')

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Edit Profil</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#"><i class="icon-home"></i></a>
            </li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="#">Edit Profil</a></li>
        </ul>
    </div>

    <form id="form-simpan" action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Profil</div>
            </div>

            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Password Baru (Opsional)</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                    </div>

                </div>
            </div>

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success mt-3">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@push('js')
<script>
    $("#form-simpan").on("submit", function (e) {
        e.preventDefault();
        let form = $(this);
// buatkan
        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function (response) {
                swal("Berhasil!", "Profil berhasil diperbarui.", {
                    icon: "success",
                    buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                    },
                }).then(() => {
                    window.location.reload(); // atau redirect ke halaman profil
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let message = "";
                    $.each(errors, function (key, value) {
                        message += value[0] + "\n";
                    });
                    swal("Gagal!", message, {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: "btn btn-danger",
                            },
                        },
                    });
                } else {
                    swal("Terjadi kesalahan!", "Silakan coba lagi nanti.", {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: "btn btn-danger",
                            },
                        },
                    });
                }
            }
        });
    });
</script>
@endpush


@endsection
