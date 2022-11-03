@extends('admin.include.index')

@section('content')
<div class="page-content">
    <div class="page-info container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Hak Cipta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permohonan Baru</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="caption">
        <h1 class="text-center">Permohonan Pencatatan Ciptaan Secara Elektronik</h1>
    </div>

    <div class="main-wrapper container">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail</h5>
                        <form method="POST" action="">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="form-group">
                                <label>Jenis Permohonan <span class="required" style="color: red">*</span> </label>
                                <select class="form-control mb-3" name="jenis_ciptaan" required>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Ciptaan <span class="required" style="color: red">*</span> </label>
                                <select class="form-control mb-3" name="jenis_ciptaan" required>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Jenis Ciptaan <span class="required" style="color: red">*</span> </label>
                                <select class="form-control mb-3" name="jenis_ciptaan" required>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judul <span class="required" style="color: red">*</span> </label>
                                <input type="text" name="sub_jenis_ciptaan" required class="form-control mb-3" placeholder="Contoh: Atlas, Biografi, Booklet..">
                            </div>
                            <div class="form-group">
                                <label>Uraian Singkat Ciptaan <span class="required" style="color: red">*</span> </label>
                                <textarea class="form-control" name="" id="" cols="10" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pertama Kali Diumumkan <span class="required" style="color: red">*</span> </label>
                                <input type="date" name="sub_jenis_ciptaan" required class="form-control mb-3" placeholder="Contoh: Atlas, Biografi, Booklet..">
                            </div>
                            <div class="form-group">
                                <label>Kota Pertama Kali Diumumkan <span class="required" style="color: red">*</span> </label>
                                <input type="text" name="sub_jenis_ciptaan" required class="form-control mb-3" placeholder="Contoh: Atlas, Biografi, Booklet..">
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kuasa</h5>
                            <div class="form-group">
                                <label>Melalui Kuasa</label>   
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>                                  
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title float-left">Data Pencipta <span class="required" style="color: red">*</span> </h5>
                        <a href="" class="btn btn-primary btn-sm text-white mb-3 float-right">Tambah</a>
                        <table id="" class="table table-responsive-sm mt-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kewarganegaraan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kode Pos</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Email/No.Hp</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title float-left">Data Pemegang Hak Cipta <span class="required" style="color: red">*</span> </h5>
                        <a href="" class="btn btn-primary btn-sm text-white mb-3 float-right">Tambah</a>
                        <table id="" class="table table-responsive-sm mt-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kewarganegaraan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kode Pos</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Email/No.Hp</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lampiran</h5>
                        <div class="row">
                            <div class="col">
                                <label>Salinan Resmi Akta Pendirian Badan Hukum</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>    
                                </div>
                            </div>
                            <div class="col">
                                <label>Scan KTP Pemohon dan Pencipta <span class="required" style="color: red">*</span> </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Scan NPWP perorangan / perusahaan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>    
                                </div>
                            </div>
                            <div class="col">
                                <label>Surat Pernyataan <span class="required" style="color: red">*</span> </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Contoh Ciptaan <span class="required" style="color: red">*</span> </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>    
                                </div>
                            </div>
                            <div class="col">
                                <label>Bukti Pengalihan Hak Cipta</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contoh Ciptaan (Link)</label>
                            <textarea class="form-control" name="" id="" cols="5" rows="2"></textarea>
                        </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <button type="submit" class="btn btn-warning btn-sm float-right">Reset</button>
                            </div>
                        </form>
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