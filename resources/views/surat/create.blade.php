@extends('layouts.master')

@section('title', 'Pelayanan Pengajuan Persuratan Desa Maduretno')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Form Tambah Data</h4>
            <br>
            <form action="{{route('surat.store')}}" method="POST">
                @csrf
                <!-- <div class="form-group">
                    <label for="kode">Kode Surat<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="id" id="id">
                </div> -->
                <div class="form-group">
                    <label for="kode">Jenis Surat<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="jenis_surat" id="jenis_surat">
                </div>
                <div class="form-group">
                    <label for="nama">Deskripsi Surat<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="deskripsi_surat" id="deskripsi_surat">
                </div>
                <div class="form-group">
                <div class="form-group">
                    <label for="dokumen_id">Syarat Surat</label>
                    <select name="dokumen_id[]" id="dokumen_id" class="form-control" multiple required>
                        @foreach($dokumens as $dokumen)
                            <option value="{{ $dokumen->id }}">{{ $dokumen->nama_dokumen }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Gunakan Ctrl + Klik untuk memilih lebih dari satu syarat</small>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/tampil-surat" data-bs-dismiss="modal" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection