@extends('layouts.master')

@section('title', 'Edit Dokumen')

@section('content')

<div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Edit Dokumen</h3>
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
          <a href="#">Edit Dokumen</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Edit Dokumen</div>
          </div>
          <div class="card-body">
              <div class="row">
                <form id="form-simpan" action="{{ route('dokumen.update', $dokumen->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" value="{{ $dokumen->nama_dokumen }}" required>
                    </div>
              </div>
          </div>
              <div class="card-action">
                  <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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

          swal("Berhasil!", "Data berhasil diubah!", {
              icon: "success",
              buttons: {
                  confirm: {
                      className: "btn btn-success",
                  },
              },
          }).then(() => {
              this.submit();
          });
      });


      </script>
  @endpush
@endsection
