@extends('layouts.master')

@section('title', 'Pengajuan Surat')

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
                        <div class="card-title">Biodata</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th class="bg-light" colspan="2">Biodata Masyarakat</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Nama Pemohon</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Jenis Kelamin</th>
                                        <td>{{ $masyarakat->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Umur</th>
                                        <td>{{ $masyarakat->umur }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">NIK</th>
                                        <td>{{ $masyarakat->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Tempat & Tanggal Lahir</th>
                                        <td>{{ $masyarakat->tempat_lahir }}, {{ \Carbon\Carbon::parse($masyarakat->tanggal_lahir)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Sekolah/Institusi</th>
                                        <td>{{ $masyarakat->sekolah }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">NIS</th>
                                        <td>{{ $masyarakat->nis }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">NIM</th>
                                        <td>{{ $masyarakat->nim }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Semester</th>
                                        <td>{{ $masyarakat->semester }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light" colspan="2">Biodata Orang Tua</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Nama Orang Tua</th>
                                        <td>{{ $orangtua->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Jenis Kelamin</th>
                                        <td>{{ $orangtua->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Tempat & Tanggal Lahir</th>
                                        <td>{{ $orangtua->tempat_lahir }}, {{ \Carbon\Carbon::parse($orangtua->tanggal_lahir)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Pendidikan Terakhir</th>
                                        <td>{{ $orangtua->pendidikan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Agama</th>
                                        <td>{{ $orangtua->agama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Kewarganegaraan</th>
                                        <td>{{ $orangtua->kewarganegaraan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Status Perkawinan</th>
                                        <td>{{ $orangtua->status_perkawinan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Pekerjaan</th>
                                        <td>{{ $orangtua->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Penghasilan</th>
                                        <td>{{ $orangtua->penghasilan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Nomor KTP</th>
                                        <td>{{ $orangtua->nomor_ktp }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Alamat</th>
                                        <td>{{ $orangtua->alamat }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer text-center">

                        <a href="" class="btn btn-primary mb-3">
                            <i class="fas fa-edit"></i> Lengkapi Biodata
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Pengajuan Surat</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="jenis_surat">Jenis Surat</label>
                                <select name="jenis_surat" id="jenis_surat" class="form-control" required>
                                    <option value="">Pilih Jenis Surat</option>
                                    @foreach ($surat as $s)
                                        <option value="{{ $s->id }}">{{ $s->jenis_surat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <label class="form-label">Upload Dokumen</label>
                                <small class="form-text text-muted d-block mb-2">
                                    Format file: <strong>pdf, jpg, jpeg, png</strong> | Max: <strong>2MB</strong>
                                </small>

                                <div id="file-wrapper" class="row g-2 mt-2">
                                    <!-- Akan diisi via JavaScript -->
                                </div>
                            </div>


                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Keperluan</label>
                                {{-- <input type="text" name="keperluan" class="form-control" > --}}
                                <textarea class="form-control"name="keperluan" rows="3">
                                </textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label>Keterangan</label>
                                {{-- <input type="text" name="keterangan" class="form-control" > --}}
                                <textarea class="form-control"name="keterangan" rows="3">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">

                        <button type="submit" class="btn btn-primary mt-3">Ajukan</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    @push('js');

        {{-- AJAX dan Dynamic File Upload --}}
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script>
            $('#jenis_surat').on('change', function() {
                var suratId = $(this).val();

                if (suratId) {
                    $.ajax({
                        url: '/get-dokumen/' + suratId,
                        type: 'GET',
                        success: function(data) {
                            var wrapper = $('#file-wrapper');
                            wrapper.empty(); // kosongkan dulu

                            if (data.length > 0) {
                                data.forEach(function(dok) {
                                    var input = `
                        <div class="mb-2 input-group">
                            <label class="form-label me-2">${dok.nama_dokumen}</label>
                            <input type="file" name="lampiran[${dok.id}]" class="form-control" required>
                            </div>
                            `;
                                    wrapper.append(input);
                                });
                            } else {
                                wrapper.html(
                                '<p class="text-muted">Tidak ada dokumen yang dibutuhkan.</p>');
                            }
                        }
                    });
                } else {
                    $('#file-wrapper').empty();
                }
            });
        </script>
    @endpush

@endsection
