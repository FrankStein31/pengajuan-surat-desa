@extends('layouts.master')

@section('title', 'Biodata')

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
    <!-- Form Update Biodata (gabungan orang tua dan masyarakat) -->
    <form id="form-simpan" action="{{ route('biodata.update') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="card-title">Form Biodata Terpadu</div>
            </div>
            <div class="card-body">
                {{-- Section 1: Data Umum --}}
                <div class="row mb-3">
                    <div class="col-12">
                        <h5>Data Umum</h5><hr>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin_m" class="form-select form-control">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L" {{ (old('jenis_kelamin_m', $masyarakat->jenis_kelamin ?? '') == 'L') ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ (old('jenis_kelamin_m', $masyarakat->jenis_kelamin ?? '') == 'P') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label>Umur</label>
                            <input type="number" name="umur" class="form-control" value="{{ old('umur', $masyarakat->umur ?? '') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Pekerjaan</label>
                            <select name="pekerjaan_m" class="form-select form-control">
                                <option value="" disabled selected>Pilih Pekerjaan</option>
                                <option value="Belum/Tidak Bekerja" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Belum/Tidak Bekerja' ? 'selected' : '' }}>Belum/Tidak Bekerja</option>
                                <option value="Mengurus Rumah Tangga" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Mengurus Rumah Tangga' ? 'selected' : '' }}>Mengurus Rumah Tangga</option>
                                <option value="Pelajar/Mahasiswa" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                <option value="Pensiunan" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                <option value="Pegawai Negeri Sipil (PNS)" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Pegawai Negeri Sipil (PNS)' ? 'selected' : '' }}>Pegawai Negeri Sipil (PNS)</option>
                                <option value="Karyawan Swasta" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                                <option value="Wiraswasta" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                <option value="Buruh/Tenaga Kerja" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Buruh/Tenaga Kerja' ? 'selected' : '' }}>Buruh/Tenaga Kerja</option>
                                <option value="Karyawan BUMN/BUMD" {{ old('pendidikan_m', $masyarakat->pekerjaan ?? '') == 'Karyawan BUMN/BUMD' ? 'selected' : '' }}>Karyawan BUMN/BUMD</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik', $masyarakat->nik ?? '') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Tempat & Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat_lahir_m" class="form-control" placeholder="Tempat Lahir" value="{{ old('tempat_lahir_m', $masyarakat->tempat_lahir ?? '') }}">
                                <input type="date" name="tanggal_lahir_m" class="form-control" value="{{ old('tanggal_lahir_m', $masyarakat->tanggal_lahir ?? '') }}">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Status Perkawinan</label>
                            <select name="status_perkawinan_m" class="form-select form-control">
                                <option value="" disabled selected>Pilih Status Perkawinan</option>
                                <option value="Lajang" {{ old('status_perkawinan_m', $masyarakat->status_perkawinan ?? '') == 'Lajang' ? 'selected' : '' }}>Lajang</option>
                                <option value="Menikah" {{ old('status_perkawinan_m', $masyarakat->status_perkawinan ?? '') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                <option value="Janda/Duda" {{ old('status_perkawinan_m', $masyarakat->status_perkawinan ?? '') == 'Janda/Duda' ? 'selected' : '' }}>Janda/Duda</option>
                                <option value="Bercerai" {{ old('status_perkawinan_m', $masyarakat->status_perkawinan ?? '') == 'Bercerai' ? 'selected' : '' }}>Bercerai</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Alamat</label>
                            <textarea name="alamat_m" class="form-control" rows="2">{{ old('alamat_m', $masyarakat->alamat ?? '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label>Nomor WhatsApp</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $masyarakat->no_hp ?? '') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Kewarganegaraan</label>
                            <input type="text" name="kewarganegaraan_m" class="form-control" value="{{ old('kewarganegaraan_m', $masyarakat->kewarganegaraan ?? '') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Agama</label>
                            <select name="agama_m" class="form-select form-control">
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam" {{ old('agama_m', $masyarakat->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen Protestan" {{ old('agama_m', $masyarakat->agama ?? '') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                <option value="Kristen Katolik" {{ old('agama_m', $masyarakat->agama ?? '') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                <option value="Hindu" {{ old('agama_m', $masyarakat->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama_m', $masyarakat->agama ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama_m', $masyarakat->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>

                    </div>
                </div>

                {{-- Section 2: Data Pendidikan --}}
                <div class="row mb-3">
                    <div class="col-12"><h5>Data Pendidikan</h5><hr></div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label>Sekolah/Institusi</label>
                            <input type="text" name="sekolah" class="form-control" value="{{ old('sekolah', $masyarakat->sekolah ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" value="{{ old('nis', $masyarakat->nis ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" value="{{ old('nim', $masyarakat->nim ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label>Semester (jika kuliah)</label>
                            <input type="text" name="semester" class="form-control" value="{{ old('semester', $masyarakat->semester ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label>Pendidikan Terakhir</label>
                            <select name="pendidikan_m" class="form-select form-control">
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="Tidak/Belum Sekolah" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                                <option value="Belum Tamat SD/Sederajat" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Belum Tamat SD/Sederajat' ? 'selected' : '' }}>Belum Tamat SD/Sederajat</option>
                                <option value="Tamat SD/Sederajat" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Tamat SD/Sederajat' ? 'selected' : '' }}>Tamat SD/Sederajat</option>
                                <option value="SLTP/Sederajat" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'SLTP/Sederajat' ? 'selected' : '' }}>SLTP/Sederajat</option>
                                <option value="SLTA/Sederajat" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'SLTA/Sederajat' ? 'selected' : '' }}>SLTA/Sederajat</option>
                                <option value="Diploma I" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Diploma I' ? 'selected' : '' }}>Diploma I</option>
                                <option value="Diploma II" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Diploma II' ? 'selected' : '' }}>Diploma II</option>
                                <option value="Diploma III" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Diploma III' ? 'selected' : '' }}>Diploma III</option>
                                <option value="Diploma IV" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Diploma IV' ? 'selected' : '' }}>Diploma IV</option>
                                <option value="Sarjana (S1)" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Sarjana (S1)' ? 'selected' : '' }}>Sarjana (S1)</option>
                                <option value="Magister (S2)" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Magister (S2)' ? 'selected' : '' }}>Magister (S2)</option>
                                <option value="Doktor (S3)" {{ old('pendidikan_m', $masyarakat->pendidikan ?? '') == 'Doktor (S3)' ? 'selected' : '' }}>Doktor (S3)</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Section 3: Data Orang Tua --}}
                <div class="row mb-3">
                    <div class="col-12"><h5>Data Orang Tua</h5><hr></div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Nama Orang Tua</label>
                            <input type="text" name="nama_ortu" class="form-control" value="{{ old('nama_ortu', $orangtua->nama ?? '') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin_o" class="form-select form-control">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L" {{ (old('jenis_kelamin_o', $orangtua->jenis_kelamin ?? '') == 'L') ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ (old('jenis_kelamin_o', $orangtua->jenis_kelamin ?? '') == 'P') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Tempat & Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat_lahir_o" class="form-control" value="{{ old('tempat_lahir_o', $orangtua->tempat_lahir ?? '') }}">
                                <input type="date" name="tanggal_lahir_o" class="form-control" value="{{ old('tanggal_lahir_o', $orangtua->tanggal_lahir ?? '') }}">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Pendidikan Terakhir</label>
                            <select name="pendidikan" class="form-select form-control">
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="Tidak/Belum Sekolah" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                                <option value="Belum Tamat SD/Sederajat" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Belum Tamat SD/Sederajat' ? 'selected' : '' }}>Belum Tamat SD/Sederajat</option>
                                <option value="Tamat SD/Sederajat" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Tamat SD/Sederajat' ? 'selected' : '' }}>Tamat SD/Sederajat</option>
                                <option value="SLTP/Sederajat" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'SLTP/Sederajat' ? 'selected' : '' }}>SLTP/Sederajat</option>
                                <option value="SLTA/Sederajat" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'SLTA/Sederajat' ? 'selected' : '' }}>SLTA/Sederajat</option>
                                <option value="Diploma I" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Diploma I' ? 'selected' : '' }}>Diploma I</option>
                                <option value="Diploma II" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Diploma II' ? 'selected' : '' }}>Diploma II</option>
                                <option value="Diploma III" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Diploma III' ? 'selected' : '' }}>Diploma III</option>
                                <option value="Diploma IV" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Diploma IV' ? 'selected' : '' }}>Diploma IV</option>
                                <option value="Sarjana (S1)" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Sarjana (S1)' ? 'selected' : '' }}>Sarjana (S1)</option>
                                <option value="Magister (S2)" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Magister (S2)' ? 'selected' : '' }}>Magister (S2)</option>
                                <option value="Doktor (S3)" {{ old('pendidikan', $orangtua->pendidikan ?? '') == 'Doktor (S3)' ? 'selected' : '' }}>Doktor (S3)</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label>Agama</label>
                            <select name="agama" class="form-select form-control">
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam" {{ old('agama', $orangtua->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen Protestan" {{ old('agama', $orangtua->agama ?? '') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                <option value="Kristen Katolik" {{ old('agama', $orangtua->agama ?? '') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                <option value="Hindu" {{ old('agama', $orangtua->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama', $orangtua->agama ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama', $orangtua->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label>Kewarganegaraan</label>
                            <input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan', $orangtua->kewarganegaraan ?? '') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Status Perkawinan</label>
                            <select name="status_perkawinan" class="form-select form-control">
                                <option value="" disabled selected>Pilih Status Perkawinan</option>
                                <option value="Lajang" {{ old('status_perkawinan', $orangtua->status_perkawinan ?? '') == 'Lajang' ? 'selected' : '' }}>Lajang</option>
                                <option value="Menikah" {{ old('status_perkawinan', $orangtua->status_perkawinan ?? '') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                <option value="Janda/Duda" {{ old('status_perkawinan', $orangtua->status_perkawinan ?? '') == 'Janda/Duda' ? 'selected' : '' }}>Janda/Duda</option>
                                <option value="Bercerai" {{ old('status_perkawinan', $orangtua->status_perkawinan ?? '') == 'Bercerai' ? 'selected' : '' }}>Bercerai</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label>Pekerjaan</label>
                            <select name="pekerjaan" class="form-select form-control">
                                <option value="" disabled selected>Pilih Pekerjaan</option>
                                <option value="Belum/Tidak Bekerja" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Belum/Tidak Bekerja' ? 'selected' : '' }}>Belum/Tidak Bekerja</option>
                                <option value="Mengurus Rumah Tangga" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Mengurus Rumah Tangga' ? 'selected' : '' }}>Mengurus Rumah Tangga</option>
                                <option value="Pelajar/Mahasiswa" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                <option value="Pensiunan" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                <option value="Pegawai Negeri Sipil (PNS)" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Pegawai Negeri Sipil (PNS)' ? 'selected' : '' }}>Pegawai Negeri Sipil (PNS)</option>
                                <option value="Karyawan Swasta" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                                <option value="Wiraswasta" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                <option value="Buruh/Tenaga Kerja" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Buruh/Tenaga Kerja' ? 'selected' : '' }}>Buruh/Tenaga Kerja</option>
                                <option value="Karyawan BUMN/BUMD" {{ old('pekerjaan', $orangtua->pekerjaan ?? '') == 'Karyawan BUMN/BUMD' ? 'selected' : '' }}>Karyawan BUMN/BUMD</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Penghasilan</label>
                            <input type="text" name="penghasilan" class="form-control" value="{{ old('penghasilan', $orangtua->penghasilan ?? '') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>NIK</label>
                            <input type="text" name="nomor_ktp" class="form-control" value="{{ old('nomor_ktp', $orangtua->nomor_ktp ?? '') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $orangtua->alamat ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol Submit --}}
            <div class="card-footer text-center">

                <button type="submit" class="btn btn-success" id="alert_demo_3_3">Simpan</button>
                <a href="{{ route('biodata.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </div>
    </form>
</div>



    @push('js')
        <script>
            //== Class definition
            $("#form-simpan").on("submit", function (e) {
        e.preventDefault();

        swal("Berhasil!", "Data berhasil diperbarui!", {
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
