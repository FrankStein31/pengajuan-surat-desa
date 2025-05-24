@extends('layouts.master')

@section('title', 'Tambah Jenis Surat')

@section('content')


    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tambah Jenis Surat</h3>
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
                    <a href="#">Jenis Surat</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Jenis Surat</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Jenis Surat</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form id="form-simpan" action="{{ route('surat.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="jenis_surat">Jenis Surat<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jenis_surat" id="jenis_surat">
                                    @error('jenis_surat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_surat">Deskripsi Surat<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="deskripsi_surat" id="deskripsi_surat">
                                    @error('deskripsi_surat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori Surat</label>
                            <select name="kategori" id="kategori"class="form-control" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Kepala Desa" >Kepala Desa</option>
                                <option value="Sekretaris Desa" >Sekretaris Desa</option>
                            </select>
                        </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="dokumen_id">Syarat Surat</label>
                                        <select name="dokumen_id[]" id="dokumen_id" class="form-control" multiple required>
                                            @foreach ($dokumens as $dokumen)
                                                <option value="{{ $dokumen->id }}">{{ $dokumen->nama_dokumen }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Gunakan Ctrl + Klik untuk memilih lebih dari satu
                                            syarat</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Simpan</button>
                            <a href="/tampil-surat" class="btn btn-secondary">Batal</a>
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
