@extends('layouts.master')

@section('title', 'Pengajuan Surat')

@section('content')

    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Pengajuan Surat</h3>
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
                    <a href="#">Pengajuan Surat</a>
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
                            @php
                                $dataMasyarakatLengkap =
                                    !empty(trim($masyarakat->jenis_kelamin)) &&
                                    !empty(trim($masyarakat->umur)) &&
                                    !empty(trim($masyarakat->nik)) &&
                                    !empty(trim($masyarakat->tempat_lahir)) &&
                                    !empty($masyarakat->tanggal_lahir) &&
                                    !empty(trim($masyarakat->sekolah)) &&
                                    !empty(trim($masyarakat->nis)) &&
                                    !empty(trim($masyarakat->nim)) &&
                                    !empty(trim($masyarakat->semester)) &&
                                    !empty(trim($masyarakat->no_hp)) &&
                                    !empty(trim($masyarakat->kewarganegaraan)) &&
                                    !empty(trim($masyarakat->status_perkawinan)) &&
                                    !empty(trim($masyarakat->agama)) &&
                                    !empty(trim($masyarakat->pekerjaan)) &&
                                    !empty(trim($masyarakat->alamat)) &&
                                    !empty(trim($masyarakat->pendidikan));
                                $dataOrangTuaLengkap =
                                    !empty(trim($orangtua->nama)) &&
                                    !empty(trim($orangtua->jenis_kelamin)) &&
                                    !empty(trim($orangtua->tempat_lahir)) &&
                                    !empty($orangtua->tanggal_lahir) &&
                                    !empty(trim($orangtua->pendidikan)) &&
                                    !empty(trim($orangtua->agama)) &&
                                    !empty(trim($orangtua->kewarganegaraan)) &&
                                    !empty(trim($orangtua->status_perkawinan)) &&
                                    !empty(trim($orangtua->pekerjaan)) &&
                                    !empty(trim($orangtua->penghasilan)) &&
                                    !empty(trim($orangtua->nomor_ktp)) &&
                                    !empty(trim($orangtua->alamat));
                                $biodataLengkap = $dataMasyarakatLengkap && $dataOrangTuaLengkap;
                            @endphp
                            @if (!$dataMasyarakatLengkap || !$dataOrangTuaLengkap)
                                <div class="alert alert-warning">
                                    <strong>Perhatian!</strong> Data biodata belum lengkap. Silakan lengkapi biodata
                                    terlebih dahulu.
                                </div>
                            @endif
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th class="bg-light text-center" colspan="2">Biodata Masyarakat</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Nama Pemohon</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Jenis Kelamin</th>
                                        <td
                                            class="{{ empty(trim($masyarakat->jenis_kelamin)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->jenis_kelamin)) ? 'Belum diisi' : ($masyarakat->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Umur</th>
                                        <td class="{{ empty(trim($masyarakat->umur)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->umur)) ? 'Belum diisi' : $masyarakat->umur }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">NIK</th>
                                        <td class="{{ empty(trim($masyarakat->nik)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->nik)) ? 'Belum diisi' : $masyarakat->nik }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Tempat & Tanggal Lahir</th>
                                        <td
                                            class="{{ empty(trim($masyarakat->tempat_lahir)) || empty($masyarakat->tanggal_lahir) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->tempat_lahir)) || empty($masyarakat->tanggal_lahir) ? 'Belum diisi' : $masyarakat->tempat_lahir . ', ' . \Carbon\Carbon::parse($masyarakat->tanggal_lahir)->format('d-m-Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Sekolah/Institusi</th>
                                        <td class="{{ empty(trim($masyarakat->sekolah)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->sekolah)) ? 'Belum diisi' : $masyarakat->sekolah }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">NIS</th>
                                        <td class="{{ empty(trim($masyarakat->nis)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->nis)) ? 'Belum diisi' : $masyarakat->nis }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">NIM</th>
                                        <td class="{{ empty(trim($masyarakat->nim)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->nim)) ? 'Belum diisi' : $masyarakat->nim }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Semester</th>
                                        <td class="{{ empty(trim($masyarakat->semester)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->semester)) ? 'Belum diisi' : $masyarakat->semester }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Nomor WhatsApp</th>
                                        <td class="{{ empty(trim($masyarakat->no_hp)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->no_hp)) ? 'Belum diisi' : $masyarakat->no_hp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Kewarganegaraan</th>
                                        <td
                                            class="{{ empty(trim($masyarakat->kewarganegaraan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->kewarganegaraan)) ? 'Belum diisi' : $masyarakat->kewarganegaraan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Status Perkawinan</th>
                                        <td
                                            class="{{ empty(trim($masyarakat->status_perkawinan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->status_perkawinan)) ? 'Belum diisi' : $masyarakat->status_perkawinan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Agama</th>
                                        <td class="{{ empty(trim($masyarakat->agama)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->agama)) ? 'Belum diisi' : $masyarakat->agama }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Pekerjaan</th>
                                        <td class="{{ empty(trim($masyarakat->pekerjaan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->pekerjaan)) ? 'Belum diisi' : $masyarakat->pekerjaan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Alamat</th>
                                        <td class="{{ empty(trim($masyarakat->alamat)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->alamat)) ? 'Belum diisi' : $masyarakat->alamat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Pendidikan</th>
                                        <td
                                            class="{{ empty(trim($masyarakat->pendidikan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($masyarakat->pendidikan)) ? 'Belum diisi' : $masyarakat->pendidikan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-center" colspan="2">Biodata Orang Tua</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Nama Orang Tua</th>
                                        <td class="{{ empty(trim($orangtua->nama)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->nama)) ? 'Belum diisi' : $orangtua->nama }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Jenis Kelamin</th>
                                        <td
                                            class="{{ empty(trim($orangtua->jenis_kelamin)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->jenis_kelamin)) ? 'Belum diisi' : ($orangtua->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Tempat & Tanggal Lahir</th>
                                        <td
                                            class="{{ empty(trim($orangtua->tempat_lahir)) || empty($orangtua->tanggal_lahir) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->tempat_lahir)) || empty($orangtua->tanggal_lahir) ? 'Belum diisi' : $orangtua->tempat_lahir . ', ' . \Carbon\Carbon::parse($orangtua->tanggal_lahir)->format('d-m-Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Pendidikan Terakhir</th>
                                        <td class="{{ empty(trim($orangtua->pendidikan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->pendidikan)) ? 'Belum diisi' : $orangtua->pendidikan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Agama</th>
                                        <td class="{{ empty(trim($orangtua->agama)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->agama)) ? 'Belum diisi' : $orangtua->agama }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Kewarganegaraan</th>
                                        <td
                                            class="{{ empty(trim($orangtua->kewarganegaraan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->kewarganegaraan)) ? 'Belum diisi' : $orangtua->kewarganegaraan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Status Perkawinan</th>
                                        <td
                                            class="{{ empty(trim($orangtua->status_perkawinan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->status_perkawinan)) ? 'Belum diisi' : $orangtua->status_perkawinan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Pekerjaan</th>
                                        <td class="{{ empty(trim($orangtua->pekerjaan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->pekerjaan)) ? 'Belum diisi' : $orangtua->pekerjaan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Penghasilan</th>
                                        <td class="{{ empty(trim($orangtua->penghasilan)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->penghasilan)) ? 'Belum diisi' : $orangtua->penghasilan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Nomor KTP</th>
                                        <td class="{{ empty(trim($orangtua->nomor_ktp)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->nomor_ktp)) ? 'Belum diisi' : $orangtua->nomor_ktp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Alamat</th>
                                        <td class="{{ empty(trim($orangtua->alamat)) ? 'text-danger fw-bold' : '' }}">
                                            {{ empty(trim($orangtua->alamat)) ? 'Belum diisi' : $orangtua->alamat }}
                                        </td>
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


        <form id="form-simpan" action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-primary mt-3" {{ !$biodataLengkap ? 'disabled' : '' }}>
                            Ajukan
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    @push('js')
        ;

        {{-- AJAX dan Dynamic File Upload --}}
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script>
            $("#form-simpan").on("submit", function(e) {
                e.preventDefault();

                swal("Berhasil!", "Pengajuan berhasil terkirim!", {
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
