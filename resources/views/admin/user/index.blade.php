@extends('admin.include.index')

@push('css')
<link href="{{ asset('assets_admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">  
@endpush

@section('content')
<div class="page-content">
    <div class="page-info container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
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
                        <h5 class="card-title-lg">User</h5>
                        <a href="{{route("user.create")}}" class="btn btn-primary btn-sm text-white mb-g">Tambah</a>
                        <div class="table-responsive">
                            <table id="myTable" class="table mt-3">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">No KTP</th>
                                        <th scope="col">Tgl Lahir</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Kode Pos</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->username}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->no_ktp}}</td>
                                        <td>{{$data->tgl_lahir}}</td>
                                        <td>{{$data->jenis_kelamin}}</td>
                                        <td>{{$data->kode_pos}}</td>
                                        <td>{{$data->kota->nama_kota}}</td>
                                        <td>{{$data->kota->provinsi->nama_provinsi}}</td>
                                        <td>{{$data->alamat}}</td>
                                        <td>
                                            <a href="{{route('user.edit', $data->id)}}" class="btn btn-warning btn-sm float-left mr-2">Edit</a>
    
                                            @if ($data->nama_user != 'UMUM' AND $data->nama_user != 'POLITANI') 
                                                <form method="POST" action="{{route('user.destroy', $data->id)}}">
                                                    @csrf
                                                    {{method_field("DELETE")}}
                                                    <button class="btn btn-danger btn-sm btnDelete">Delete</button>
                                                </form>
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