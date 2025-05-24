@extends('layouts.master')

@section('title', 'Tambah Dokumen')

@section('content')


    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Tambah Dokumen</h3>
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
            <a href="#">Dokumen Pengajuan</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Tambah Dokumen</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Tambah Dokumen</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <form id="form-simpan" action="{{ route('dokumen.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Dokumen</label>
                        <input type="text" class="form-control" name="nama_dokumen" required placeholder="Contoh: Fotocopy KTP">
                    </div>
                </div>
            </div>
                <div class="card-action">
                    <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Batal</a>
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
