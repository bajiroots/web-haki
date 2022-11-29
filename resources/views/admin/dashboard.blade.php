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
            <div class="col-md-12">
                <h1>Selamat Datang di Aplikasi WEB HAKI, {{ Auth::user()->name }}</h1>
            </div>
        </div>

        @if(Auth::user()->level == 'admin')
        <div class="row stats-row">
            <div class="col-lg-4 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">$3,089.67
                                <span class="stats-change stats-change-danger">-8%</span>
                            </h5>
                            <p class="stats-text">Total Pendapatan Tahun Ini</p>
                        </div>
                        <div class="stats-icon change-danger">
                            <i class="material-icons">trending_down</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">168,047
                                <span class="stats-change stats-change-success">+16%</span>
                            </h5>
                            <p class="stats-text">Total Pendapatan Bulan Ini</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="material-icons">trending_up</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
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
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Doughnut Chart</h5>
                      <canvas id="chartjs4">Your browser does not support the canvas element.</canvas>
                  </div>
              </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Area Chart</h5>
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

<script>
    $(document).ready(function () {

        // APEX AREA CHART
        "use strict";

        var options2 = {
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
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'series2',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],

            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00",
                    "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00",
                    "2018-09-19T06:30:00"
                ],
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