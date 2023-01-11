@extends('admin.include.index')

@section('content')
<div class="page-content">
    <div class="page-info container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Apps</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="main-wrapper container">
        <div class="row my-2">
            <div class="col-md-12 mb-3">
                <h1>Selamat Datang di Aplikasi WEB HAKI, {{ Auth::user()->name }}</h1>
            </div>
        </div>

        @if(Auth::user()->level == 'admin')
        <div class="row stats-row">
            <div class="col-lg-6 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title"><span class="money">{{ $pendapatanTahun }}</span>
                                <span class="stats-change @if ($perbandinganTahun < 0) stats-change-danger @else stats-change-success @endif ">{{ $perbandinganTahun }}%</span>
                            </h5>
                            <p class="stats-text">Total Pendapatan Tahun Ini</p>
                        </div>
                        <div class="stats-icon @if ($perbandinganTahun < 0) change-danger @else change-success @endif ">
                            <i class="material-icons"> @if ($perbandinganTahun < 0) trending_down @else trending_up @endif </i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title"><span class="money">{{ $pendapatanBulan }}</span>
                                <span class="stats-change @if ($perbandinganBulan < 0) stats-change-danger @else stats-change-success @endif">{{ $perbandinganBulan }}%</span>
                            </h5>
                            <p class="stats-text">Total Pendapatan Bulan Ini</p>
                        </div>
                        <div class="stats-icon @if ($perbandinganBulan < 0) change-danger @else change-success @endif">
                            <i class="material-icons">@if ($perbandinganBulan < 0) trending_down @else trending_up @endif</i>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">47,350
                                <span class="stats-change stats-change-success">+12%</span>
                            </h5>
                            <p class="stats-text">Total Pendapatan Hari Ini</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="material-icons">trending_up</i>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pilih Tahun</h5>
                        <form action="" method="GET">
                        <div class="row">
                            <div class="col-10">
                                <select name="tahun" class="form-control form-control-lg mb-3" aria-label=".form-control-lg example">
                                    @for ($i = 0; $i <= 5; $i++)
                                        <option @if ($tahunIni == date('Y') - $i) selected @endif>{{ date('Y') - $i }}</option>
                                    @endfor
                                        <option @if ($tahunIni == date('Y') + 1) selected @endif>{{ date('Y')+1 }}</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Jumlah Status Pengajuan HAKI</h5>
                      <canvas id="chartjs4">Your browser does not support the canvas element.</canvas>
                  </div>
              </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Frequensi Pengajuan HAKI</h5>
                        <div id="apex2"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-transactions">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Pengajuan Hak Cipta<a href="#" class="card-title-helper blockui-transactions"><i
                                    class="material-icons">refresh</i></a></h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No Permohonan</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $item)
                                    <tr>
                                        <td>{{ $item->nomor_permohonan }}</td>
                                        <td>{{ $item->judul_ciptaan }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                        
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="4">Data Tidak Ditemukan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script src=" {{ asset('assets_admin/plugins/apexcharts/dist/apexcharts.min.js') }} "></script>
<script src=" {{ asset('assets_admin/plugins/chartjs/chart.min.js') }} "></script>
<script src="{{ asset('assets_admin/js/pages/dashboard.js') }}"></script>
{{-- jquery mask cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
    $(document).ready(function () {

        $('.money').mask('000.000.000', {reverse: true});

    });

</script>
<script>
    $(document).ready(function () {

        // APEX AREA CHART
        "use strict";

        var options2 = {
            colors : ["rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(255, 99, 132)"],
            chart: {
                height: 350,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Terima',
                data: {{ json_encode($arrBulanDiterima) }}
            }, {
                name: 'Proses',
                data: {{ json_encode($arrBulanDiproses) }}
            }, {
                name: 'Tolak',
                data: {{ json_encode($arrBulanDitolak) }}
            }],

            xaxis: {
                categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
                labels: {
                    style: {
                        colors: 'rgba(94, 96, 110, .5)'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
            grid: {
                borderColor: 'rgba(94, 96, 110, .5)',
                strokeDashArray: 4
            }
        }

        var chart2 = new ApexCharts(
            document.querySelector("#apex2"),
            options2
        );

        chart2.render();
    });

    // DOUGHNUT CHART
    new Chart(document.getElementById("chartjs4"), {
        "type": "doughnut",
        "data": {
            "labels": ["Ditolak", "Diterima", "Diproses"],
            "datasets": [{
                "label": "My First Dataset",
                "data": [
                    {{ $count["tolak"] }}, 
                    {{ $count["terima"] }}, 
                    {{ $count["proses"] }}],
                "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
            }]
        }
    });
</script>

@endsection