<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Domisili</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            line-height: 1.5;
        }

        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            align-items: center;
            padding-bottom: 10px;
            justify-content: space-between; /* Memberikan jarak antara logo dan teks */
        }
        @page {
            margin-top: 0;
        margin-bottom: 0;
        margin-left: 20px;
        margin-right: 20px;
}

        .logo {
            width: 80px;
            margin-right: 20px;
        }

        .header-text {
            text-align: center;
            flex: 1;
        }

        .header-text h1 {
            font-size: 14pt;
            margin: 0;
            line-height: 1.2;
        }

        .header-text h2 {
            font-size: 12pt;
            margin: 5px 0;
        }

        .header-text p {
            font-size: 10pt;
            margin: 0;
        }
        .header .logo {
        width: 700px; /* Atur ukuran logo */
        height: 125px; /* Atur ukuran logo */
        margin-right: 20px; /* Jarak antara logo dan teks */
    }

        .title {
            text-align: center;
            margin: 0px 0;
        }

        .title h3 {
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 0;
        }

        .content {
            margin-bottom: 30px;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
        }

        table.data td {
            padding: 0;
            vertical-align: top;
        }

        .dotted-line {
            border-bottom: 1px dotted #000;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .signature {
            float: right;
            width: 40%;
            text-align: center;
            margin-top: 0px;
        }

        .signature-name {
            margin-top: 70px;
            text-decoration: underline;
            font-weight: bold;
        }
        .signature-image {
            width: 100px;
            height: auto;
            margin: 0 0 0;
        }

        .qr-code {
            position: absolute;
            bottom: 50px;
            right: 20px;
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('assets/img/kop.png') }}" alt="Logo" class="logo">

            {{-- <div class="header-text">
                <h1>PEMERINTAH KABUPATEN KEDIRI</h1>
                <h1>KECAMATAN PAPAR</h1>
                <h1>KANTOR DESA MADURETNO</h1>
                <p>Jl. Raya Ngadirejo No. 01 Kode Pos 64153 Telp. (0354) 442631</p>
                <p>Email: desangadirejo@gmail.com</p>
            </div> --}}
        </div>

        <div class="title">
            <h3>SURAT KETERANGAN TIDAK MAMPU</h3>
            <p>Nomor : 145/0{{$pengajuan->id}}/418.73.11/2025</p>
        </div>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini kami Kepala Desa Maduretno Kecamatan Papar Kabupaten Kediri dengan Verifikasi RT & RW menerangkan bahwa :</p>

            <table class="data">
                <tr>
                    <td width="30%">Nama</td>
                    <td width="5%">:</td>
                    <td>{{ $orangtua->nama }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $orangtua->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $orangtua->tempat_lahir }}, {{ \Carbon\Carbon::parse($orangtua->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>{{ $orangtua->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $orangtua->agama }}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td>:</td>
                    <td>{{ $orangtua->status_perkawinan }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $orangtua->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Nomor KTP</td>
                    <td>:</td>
                    <td>{{ $orangtua->nomor_ktp }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $orangtua->alamat }}</td>
                </tr>
            </table>
            <p style="margin-top: 20px;">Adalah benar-benar Orang Tua / Wali dari :</p>
            <table class="data">
                <tr>
                    <td width="30%">Nama</td>
                    <td width="5%">:</td>
                    <td>{{ $user->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $masyarakat->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $masyarakat->tempat_lahir }}, {{ \Carbon\Carbon::parse($masyarakat->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>N.I.K</td>
                    <td>:</td>
                    <td>{{ $masyarakat->nik }}</td>
                </tr>
                <tr>
                    <td>SEKOLAH</td>
                    <td>:</td>
                    <td>{{ $masyarakat->sekolah }}</td>
                </tr>
                <tr>
                    <td>SEMESTER</td>
                    <td>:</td>
                    <td>{{ $masyarakat->semester }}</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{ $masyarakat->nim }}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{ $pengajuan->keterangan }}</td>
                </tr>
                <tr>
                    <td>keperluan</td>
                    <td>:</td>
                    <td>{{ $pengajuan->keperluan }}</td>
                </tr>
            </table>
            <p style="margin-top: 20px;">Demikian keterangan ini kami buat dengan sebenarnya untuk dipergunakan sebagimana perlunya.</p>

            <div class="signature">
                <p>Maduretno, {{ \Carbon\Carbon::parse($pengajuan->updated_at)->locale('id')->translatedFormat('d F Y') }} </p>
                <p>Kepala Desa Maduretno</p>
                <img src="{{ public_path('assets/img/Tanda_tangan_bapak.png') }}" alt="Tanda Tangan" class="signature-image">
                <div class="signature-name">SISWANTO</div>
            </div>
        </div>

        <div class="qr-code">
            {{-- <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(80)->generate(url('/verify/' . md5($nomorSurat)))) }}"> --}}
        </div>
    </div>
</body>
</html>