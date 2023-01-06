@extends('admin.include.index')

@section('content')
<div class="page-content">
    <div class="page-info container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Jenis Ciptaan Permohonan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="main-wrapper container">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title-lg">Laporan Jenis Ciptaan Permohonan</h5>
                        <form action="" method="GET" class="mb-3">
                            <div class="row">
                                <div class="col">

                        <select class="form-control" name="bulan">
                            <option value="">--Pilih Bulan--</option>
                            <option value="1" @if ($request->get('bulan') == "1" ) selected @endif >Januari</option>
                            <option value="2" @if ($request->get('bulan') == "2" ) selected @endif >Februari</option>
                            <option value="3" @if ($request->get('bulan') == "3" ) selected @endif >Maret</option>
                            <option value="4" @if ($request->get('bulan') == "4" ) selected @endif>April</option>
                            <option value="5" @if ($request->get('bulan') == "5" ) selected @endif>Mey</option>
                            <option value="6" @if ($request->get('bulan') == "6" ) selected @endif>Juni</option>
                            <option value="7" @if ($request->get('bulan') == "7" ) selected @endif>Juli</option>
                            <option value="8" @if ($request->get('bulan') == "8" ) selected @endif>Agustus</option>
                            <option value="9" @if ($request->get('bulan') == "9" ) selected @endif>September</option>
                            <option value="10" @if ($request->get('bulan') == "10" ) selected @endif>Oktober</option>
                            <option value="11" @if ($request->get('bulan') == "11" ) selected @endif>November</option>
                            <option value="12" @if ($request->get('bulan') == "12" ) selected @endif>Desember</option>
                        </select>
                    </div>
                    <div class="col">

                        <select class="form-control" name="tahun">
                            <option value="">--Pilih Tahun--</option>
                            <option value="2020"  @if ($request->get('tahun') == "2020" ) selected @endif>2020</option>
                            <option value="2021" @if ($request->get('tahun') == "2021" ) selected @endif>2021</option>
                            <option value="2022" @if ($request->get('tahun') == "2022" ) selected @endif>2022</option>
                            <option value="2023" @if ($request->get('tahun') == "2023" ) selected @endif>2023</option>
                        </select>
                    </div>
                    <div class="col">

                        <input class=" btn btn-primary" type="submit">    

                    </div>
                    </div>
                    </form>
                        <table id="myTable" class="table mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Jenis Ciptaan</th>
                                    <th scope="col">Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_jenis_ciptaan}}</td>
                                    <td>{{"Rp. ". number_format($ttl_biaya[$i], 0)}}</td>
                                </tr>

                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{url('/admin/downloadpdf_laporan_jenis_permohonan?bulan='.$request->get('bulan').'&tahun='.$request->get('tahun'))}}" target="_blank" class="btn btn-info ntn-md">DOWNLOAD PDF</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('dataTable')

            {{-- // JS untuk sweet alert sebelum menghapus --}}
            <script>
                $('.btnDelete').click(function(event) {
                    const form =  $(this).closest("form");
                    const name = $(this).data("name");
                    event.preventDefault();
                    swal.fire({
                        title: `Apakah Anda yakin ingin Menghapus Data ini?`,
                        text: "Data yang dihapus akan hilang selamanya.",
                        icon: "warning",
                        buttons: true,
                        showCancelButton: true,
                        dangerMode: true,
                        cancelButtonColor: '#d33',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    })
                    .then((result) => {
                        if (result.dismiss !== "cancel") {
                            form.submit();
                        }
                    });
                });
            </script>

            <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready( function () {
                    $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                } );
            </script>
@endpush

@push('dataTableStyles')
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush