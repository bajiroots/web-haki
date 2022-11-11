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
                        <form method="POST" action="" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="form-group">
                                <label>Jenis Permohonan <span class="required" style="color: red">*</span> </label>
                                <select class="form-control mb-3" name="jenis_permohonan" required>
                                    <option value=""> Pilih Jenis Permohonan </option>
                                    @foreach ($jenisPermohonan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_jenis_permohonan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Ciptaan <span class="required" style="color: red">*</span> </label>
                                <select class="form-control mb-3" name="jenis_ciptaan" required>
                                    <option value=""> Pilih Jenis Ciptaan </option>
                                    @foreach ($jenisCiptaan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_jenis_ciptaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Jenis Ciptaan <span class="required" style="color: red">*</span> </label>
                                <select class="form-control mb-3" name="sub_jenis_ciptaan" required>
                                    <option value=""> Pilih Jenis Ciptaan Dahulu </option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judul <span class="required" style="color: red">*</span> </label>
                                <input type="text" name="judul" required class="form-control mb-3"
                                    placeholder="Contoh: Atlas, Biografi, Booklet..">
                            </div>
                            <div class="form-group">
                                <label>Uraian Singkat Ciptaan <span class="required" style="color: red">*</span>
                                </label>
                                <textarea class="form-control" name="uraian" id="" cols="10" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pertama Kali Diumumkan <span class="required" style="color: red">*</span>
                                </label>
                                <input type="date" name="tanggal" required class="form-control mb-3"
                                    placeholder="Contoh: Atlas, Biografi, Booklet..">
                            </div>
                            <div class="form-group">
                                <label>Kota Pertama Kali Diumumkan <span class="required" style="color: red">*</span>
                                </label>
                                <input type="text" name="sub_jenis_ciptaan" required class="form-control mb-3"
                                    placeholder="Contoh: Atlas, Biografi, Booklet..">
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title float-left">Data Pencipta <span class="required"
                                style="color: red">*</span> </h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#modalPencipta">
                            Tambah
                        </button>
                        <table id="" class="table table-responsive-sm mt-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kode Pos</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Email/No.Hp</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="wrapper">

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
                        <div class="row my-3">
                            <div class="col">
                                <label>Scan KTP Pemohon dan Pencipta <span class="required" style="color: red">*</span>
                                </label>
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
                        <div class="row my-3">
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
                        <div class="row my-3">
                            <div class="col">
                                <label>Bukti Bayar </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                                <span class="required" style="color: red">
                                    <i> <br> <b>*Pembayaran dilakukan via transfer BNI 0388820578 an. Reza Andrea</b>
                                    </i>
                                </span>
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
                        
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalPencipta" tabindex="-1" role="dialog" aria-labelledby="modalPenciptaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPenciptaLabel">Tambah Data Pencipta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div class="form-group">
                                <label for="namaPencipta">Nama</label>
                                <input type="text" class="form-control" id="namaPencipta" required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="emailPencipta">Email</label>
                                <input type="email" class="form-control" id="emailPencipta" required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="noTelpPencipta">No Telp</label>
                                <input type="number" class="form-control" id="noTelpPencipta" required placeholder="">
                            </div>
                            <div class="form-group">
                            <label for="alamatPencipta">Alamat</label>
                            <textarea class="form-control" id="alamatPencipta" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kodePosPencipta">Kode Pos</label>
                                <input type="number" class="form-control" id="kodePosPencipta" required placeholder="">
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" id="tambah-pencipta" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#tambah-pencipta').click(function (e) { 
                let namaPencipta = $('#namaPencipta').val();
                let emailPencipta = $('#emailPencipta').val();
                let noTelpPencipta = $('#noTelpPencipta').val();
                let alamatPencipta = $('#alamatPencipta').val();
                let kodePosPencipta = $('#kodePosPencipta').val();
                
                let tablePencipta = `
                    <tr>
                        <td>${namaPencipta}</td>
                        <td>${alamatPencipta}</td>
                        <td>${kodePosPencipta}</td>
                        <td></td>
                        <td>${emailPencipta} / ${noTelpPencipta}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post"  class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post"  class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                $('#wrapper').append(tablePencipta)

                $('#namaPencipta').val('');
                $('#emailPencipta').val('');
                $('#noTelpPencipta').val('');
                $('#alamatPencipta').val('');
                $('#kodePosPencipta').val('');

                //close modal
                $('#modalPencipta').modal('hide');

            });


            $("select[name=jenis_ciptaan]").change(function (e) { 
                let id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('api/sub-jenis-ciptaan') }}" + '/' + id ,
                    success: function (response) {
                        console.log(response)
                        if (response.status == 'success') {
                            let opt = '<option>Pilih Sub Jenis Ciptaan</option>'
                            response.data.forEach(element => {
                                opt += `
                                <option value='${element.id}'>${element.nama_sub_jenis_ciptaan}</option>
                                `
                            });

                            $("select[name=sub_jenis_ciptaan]").html(opt)
                        }
                    }
                });
            });

        });
    </script>
@endsection
