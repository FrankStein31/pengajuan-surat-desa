@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Selamat datang, <strong>{{ auth()->user()->name }}</strong>!
                </h6>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Masyarakat</p>
                                    <h4 class="card-title">{{ $jumlahMasyarakat }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-file-upload"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Dokumen</p>
                                    <h4 class="card-title">{{ $jumlahDokumen }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="fas fa-file-download"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Pengajuan Surat</p>
                                    <h4 class="card-title">{{ $total }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 ">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="card-title">Status Pengajuan</div>
                        <div class="card-category">Progres pengajuan surat</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circle-pending"></div>
                                <h6 class="fw-bold mt-3 mb-0">Pending</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circle-proses"></div>
                                <h6 class="fw-bold mt-3 mb-0">Proses</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circle-selesai"></div>
                                <h6 class="fw-bold mt-3 mb-0">Selesai</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6 ">
                <div class="card card-stats card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                          <div class="card-title">Pengajuan Masuk</div>

                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <!-- Projects table -->
                          <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Pemohon</th>
                                <th scope="col" class="text-end">Jenis Surat</th>
                                <th scope="col" class="text-end">Tanggal</th>
                                <th scope="col" class="text-end">Status</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach($pengajuans as $p)
                                    <tr>
                                        <td>{{ $p->user->name }}</td>
                                        <td>{{ $p->surat->jenis_surat ?? '-' }}</td>
                                        <td>{{ $p->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            @if($p->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif($p->status == 'diproses')
                                                <span class="badge badge-primary">Proses</span>

                                            @elseif($p->status == 'ditolak')
                                                <span class="badge badge-danger">Ditolak</span>
                                            @elseif($p->status == 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Statistik Pengajuan Surat per Bulan</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 375px">
                            <canvas id="chartPengajuan"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
@push('js');
<!-- Script Circles.js -->
<script src="https://cdn.jsdelivr.net/npm/circles.js@0.0.6/circles.min.js"></script>
<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Circles Statistik
    Circles.create({
        id: 'circle-pending',
        radius: 45,
        value: {{ json_encode($pending) }},
        maxValue: {{ json_encode($total) }},
        width: 7,
        text: '{{ $pending }}',
        colors: ['#f1f1f1', '#f3545d'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
    });

    Circles.create({
        id: 'circle-proses',
        radius: 45,
        value: {{ json_encode($proses) }},
        maxValue: {{ json_encode($total) }},
        width: 7,
        text: '{{ $proses }}',
        colors: ['#f1f1f1', '#fdaf4b'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
    });

    Circles.create({
        id: 'circle-selesai',
        radius: 45,
        value: {{ json_encode($selesai) }},
        maxValue: {{ json_encode($total) }},
        width: 7,
        text: '{{ $selesai }}',
        colors: ['#f1f1f1', '#1dce6c'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
    });

    document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.getElementById('chartPengajuan');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    const dataChart = @json($dataChart);
    const warna = [
        '#f3545d', '#fdaf4b', '#1d7af3', '#00cae3', '#2BB930',
        '#9C27B0', '#FFC107', '#3F51B5', '#FF5722', '#009688'
    ];

    const datasets = [];
    let i = 0;

    for (const jenis in dataChart) {
        datasets.push({
            label: jenis,
            data: Object.values(dataChart[jenis]),
            backgroundColor: warna[i % warna.length] + '88',
            borderColor: warna[i % warna.length],
            borderWidth: 2,
            fill: true,
            tension: 0.4
        });
        i++;
    }

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: bulanLabels,
            datasets: datasets
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            }
        }
    });
});
</script>


@endpush
@endsection
