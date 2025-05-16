@extends('layouts.master')

@section('title', 'Pengajuan Surat')

@section('content')
<div class="container">
    <h2>Form Pengajuan Surat</h2>

    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="jenis_surat">Jenis Surat</label>
            <select name="jenis_surat" id="jenis_surat" class="form-control" required>
                <option value="">Pilih Jenis Surat</option>
                @foreach ($surat as $s)
                    <option value="{{ $s->id }}">{{ $s->jenis_surat }}</option>
                @endforeach
            </select>
        </div>

        <div id="form-dinamis" class="mt-3"></div>

        <div class="form-group mt-4">
            <label>Upload Dokumen</label>
            <div id="file-wrapper">
                <div class="mb-2 input-group">
                    <input type="file" name="lampiran[]" class="form-control" required>
                    <button type="button" class="btn btn-danger remove-btn">Hapus</button>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mt-2" id="add-file">Tambah Dokumen</button>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ajukan</button>
    </form>
</div>

{{-- AJAX dan Dynamic File Upload --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // AJAX untuk memuat form berdasarkan jenis surat
    $(document).ready(function() {
        $('#jenis_surat').change(function() {
            let jenisSuratId = $(this).val();
            if (jenisSuratId) {
                $.ajax({
                    url: '/get-form-surat/' + jenisSuratId,
                    type: 'GET',
                    success: function(response) {
                        $('#form-dinamis').html(response.html);
                    },
                    error: function(xhr) {
                        $('#form-dinamis').html('<p class="text-danger">Gagal memuat form.</p>');
                    }
                });
            } else {
                $('#form-dinamis').html('');
            }
        });

        // Tambah input file baru
        $('#add-file').click(function() {
            const fileInput = `
                <div class="mb-2 input-group">
                    <input type="file" name="lampiran[]" class="form-control" required>
                    <button type="button" class="btn btn-danger remove-btn">Hapus</button>
                </div>`;
            $('#file-wrapper').append(fileInput);
        });

        // Hapus input file
        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.input-group').remove();
        });
    });
</script>
@endsection
