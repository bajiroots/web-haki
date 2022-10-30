@extends('admin.include.index')

@section('content')
<div class="page-content">
    <div class="page-info container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jenis Ciptaan</li>
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
                        <h5 class="card-title-lg">Jenis Ciptaan</h5>
                        <a href="{{route("jenis_ciptaan.create")}}" class="btn btn-primary btn-sm text-white mb-3">Tambah</a>
                        <table id="myTable" class="table mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Jenis Ciptaan</th>
                                    <th scope="col">Biaya</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_jenis_ciptaan}}</td>
                                    <td>{{$data->biaya}}</td>
                                    <td>
                                        <a href="{{route('jenis_ciptaan.edit', $data->id)}}" class="btn btn-warning btn-sm float-left mr-2">Edit</a>

                                        <form method="POST" action="{{route('jenis_ciptaan.destroy', $data->id)}}">
                                            @csrf
                                            {{method_field("DELETE")}}
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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
</div>
@endsection

@push('dataTable')
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