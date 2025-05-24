@extends('layouts.master')
@section('title', 'Edit Jenis Surat')
@section('content')

    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Jenis Surat</h3>
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
                    <a href="#">Edit Jenis Surat</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Jenis Surat</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form id="form-simpan" action="{{ route('surat.update', $surat->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="kode">Jenis Surat<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="jenis_surat" id="jenis_surat"
                                        value="{{ $surat->jenis_surat }}">
                                </div>
                                <div class="form-group">
                                    <label for="kode">Deskripsi Surat<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="deskripsi_surat" id="deskripsi_surat"
                                        value="{{ $surat->deskripsi_surat }}">
                                </div>
                                <div class="form-group">
                                    <label>Kategori Surat</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="Kepala Desa" {{ (old('kategori', $surat->kategori ?? '') == 'Kepala Desa') ? 'selected' : '' }}>Kepala Desa</option>
                                    <option value="Sekretaris Desa" {{ (old('kategori', $surat->kategori ?? '') == 'Sekretaris Desa') ? 'selected' : '' }}>Sekretaris Desa</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="dokumen_id">Syarat Surat</label>
                                    <select name="dokumen_id[]" id="dokumen_id" class="form-control" multiple required>
                                        @foreach ($dokumens as $dokumen)
                                            <option value="{{ $dokumen->id }}"
                                                {{ $surat->dokumen->pluck('id')->contains($dokumen->id) ? 'selected' : '' }}>
                                                {{ $dokumen->nama_dokumen }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Gunakan Ctrl + Klik untuk memilih lebih dari satu syarat</small>
                                </div>



                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="{{ url('tampil-surat') }}" class="btn btn-secondary">Batal</a>
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
