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
                        <h5 class="card-title-lg">Daftar Ciptaan</h5>
                        <a href="{{route("permohonan_haki.create")}}" class="btn btn-primary btn-sm text-white mb-3">Tambah</a>
                        <table id="myTable" class="table mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Permohonan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Judul Ciptaan</th>
                                    <th scope="col">Deksripsi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{route('permohonan_haki.show', $data->id)}}">
                                            {{ $data->nomor_permohonan }}
                                        </a>
                                    </td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->judul_ciptaan }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>
                                        @if($data->status === 'proses')
                                            <span class="badge badge-warning">
                                        @elseif($data->status === 'terima')
                                            <span class="badge badge-success">
                                        @else
                                            <span class="badge badge-danger">
                                        @endif
                                            {{ strtoupper($data->status) }}</span>
                                    </td>
                                    <td>
                                        <a href="{{route('permohonan_haki.edit', $data->id)}}" class="btn btn-warning btn-sm float-left mr-2 mb-2">Edit</a>

                                        <form method="POST" action="{{route('permohonan_haki.destroy', $data->id)}}">
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