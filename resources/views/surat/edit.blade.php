@extends('layouts.master')
@section('title', 'Pelayanan Pengajuan Persuratan Desa Maduretno')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Edit Jenis Surat</h4>
            <br>
            <form action="{{route('surat.update', $data->id)}}" method="POST">
                @csrf
                @method('PUT') <!-- Penting untuk update, karena route mendukung PUT -->
                <div class="form-group">
                    <label for="kode">Kode Surat<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="id" id="id" value="{{$data->id}}">
                </div>
                <div class="form-group">
                    <label for="kode">Jenis Surat<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="jenis_surat" id="jenis_surat" value="{{$data->jenis_surat}}">
                </div>
                <div class="form-group">
                    <label for="kode">Deskripsi Surat<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="deskripsi_surat" id="deskripsi_surat" value="{{$data->deskripsi_surat}}">
                </div>   
                <div class="form-group">
                <label>Syarat Surat</label>
            <select name="syarat_surat" class="form-control">
                <option value="">Pilih Syarat Surat</option>
                @foreach($dokumens as $dokumen)
                    <option value="{{ $dokumen->nama_dokumen }}" 
                        {{ $surat->syarat_surat == $dokumen->nama_dokumen ? 'selected' : '' }}>
                        {{ $dokumen->nama_dokumen }}
                    </option>
                @endforeach
            </select>
                </div>    
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{url('tampil-surat')}}"data-bs-dismiss="modal" class="btn btn-success">Kembali</a>
                </div>                    
            </form>
        </div>
    </div>
</div>
@endsection
