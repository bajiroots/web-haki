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
        <h3 class="text-center">Permohonan Pencatatan Ciptaan Secara Elektronik</h3>
    </div>

<form method="POST" action="{{ route('permohonan_haki.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="main-wrapper container">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-right" id="text-biaya"></h2>
                        <h5 class="card-title">
                            Detail
                        </h5>
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
                                <select class="js-states form-control mb-3" name="jenis_ciptaan" required>
                                    <option value=""> Pilih Jenis Ciptaan </option>
                                    @foreach ($jenisCiptaan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_jenis_ciptaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Jenis Ciptaan <span class="required" style="color: red">*</span> </label>
                                <select class=" js-states form-control mb-3" name="sub_jenis_ciptaan" required>
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
                                <input type="text" name="kota_pertama_diumumkan" required class="form-control mb-3"
                                    placeholder="Contoh: Atlas, Biografi, Booklet..">
                            </div>
                            <div id="pencipta-wrapper">

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
                        <button type="button" id="btnModal" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#modalPencipta">
                            Tambah
                        </button>
                        <table id="" class="table table-responsive-sm mt-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kode Pos</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kota</th>
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
                                <label>Scan KTP Pemohon dan Pencipta <span class="required" style="color: red">* <i style="text-size:11px;">(Ekstensi : Pdf)</i> </span>
                                </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ktp" id="ktp" required>
                                    <label class="custom-file-label" id="label_ktp" for="ktp">Choose file</label>
                                </div>
                            </div>
                            <div class="col">
                                <label>Surat Pernyataan <span class="required" style="color: red">* <i style="text-size:11px;">(Ekstensi : Pdf)</i></span> </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="surat_pernyataan" id="surat_pernyataan" required>
                                    <label class="custom-file-label" id="label_surat_pernyataan" for="surat_pernyataan">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label>Contoh Ciptaan <span class="required" style="color: red">*</span> </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="contoh_ciptaan" id="contoh_ciptaan" required>
                                    <label class="custom-file-label" id="label_contoh_ciptaan" for="contoh_ciptaan">Choose file</label>
                                </div>
                            </div>
                            <div class="col" id='bukti'>
                                <label>Bukti Pengalihan Hak Cipta <i style="color: red; text-size:11px;">(Ekstensi : Pdf)</i></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="bukti_pengalihan" id="bukti_pengalihan">
                                    <label class="custom-file-label" id="label_bukti_pengalihan" for="bukti_pengalihan">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label>Bukti Bayar <span class="required" style="color: red">* <i style="text-size:11px;">(Ekstensi : Pdf, Gambar)</i></span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="bukti_bayar" id="bukti_bayar" required>
                                    <label class="custom-file-label" id="label_bukti_bayar" for="bukti_bayar">Choose file</label>
                                </div>
                                <span class="required" style="color: red">
                                    <i> <br> <b>*Pembayaran dilakukan via transfer BNI 0388820578 an. Reza Andrea</b>
                                    </i>
                                </span>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col">
                                <label>Berkas Pendukung <span class="required" style="color: red"><i style="text-size:11px;">(Optional)</i></span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="optional_file" id="optional_file">
                                    <label class="custom-file-label" id="label_optional_file" for="optional_file">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Contoh Ciptaan (Link)</label>
                            <textarea class="form-control" name="contoh_ciptaan_link" id="" cols="5" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal" id="modalPencipta" tabindex="-1" role="dialog" aria-labelledby="modalPenciptaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPenciptaLabel">Tambah Data Pencipta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div class="form-group">
                                <label for="namaPencipta">Nama <span class="required" style="color: red">*</span></label>
                                <input type="text" class="form-control" id="namaPencipta" placeholder="Masukkan Nama Lengkap Anda">
                            </div>
                            <div class="form-group">
                                <label for="emailPencipta">Email <span class="required" style="color: red">*</span></label>
                                <input type="email" class="form-control" id="emailPencipta" placeholder="Masukkan Email Anda">
                            </div>
                            <div class="form-group">
                                <label for="noTelpPencipta">No Telp <span class="required" style="color: red">*</span></label>
                                <input type="number" class="form-control" id="noTelpPencipta" placeholder="Masukkan Nomor Telp Anda">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div for="provinsi">Provinsi <span class="required" style="color: red;">*</span></div>
                                        <select class="form-control mb-3 js-states pasti" name="provinsi">
                                            <option value=""> Pilih Provinsi </option>
                                            @foreach ($provinsis as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_provinsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota <span class="required" style="color: red">*</span></label>
                                <select class="form-control mb-3" name="kota">
                                    <option value=""> Pilih Provinsi Terlebih Dahulu </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamatPencipta">Alamat <span class="required" style="color: red">*</span></label>
                                <textarea class="form-control" id="alamatPencipta" rows="3" placeholder="Masukkan Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kodePosPencipta">Kode Pos <span class="required" style="color: red">*</span></label>
                                <input type="number" class="form-control" id="kodePosPencipta" placeholder="Masukkan Kope Pos">
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeModal" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" id="tambah-pencipta" class="btn btn-primary">Simpan</button>
                    <button type="button" id="edit-pencipta" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
</div>
</form>
@endsection

@section('js')

{{-- select 2 js --}}
<script src="{{ asset('assets_admin/js/pages/select2.js') }}"></script>
{{-- end --}}

    <script>
        $(document).ready(function () {
            let idRow = 0;
            $('#edit-pencipta').hide();

            const money = (x) => {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            }

            const getSubJenisCiptaanAndPrice = () =>{
                let jenisPermohonanId = $("select[name=jenis_permohonan]").val();
                let jenisCiptaanId = $("select[name=jenis_ciptaan]").val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('api/sub-jenis-ciptaan') }}" + '/' + jenisPermohonanId + '/' + jenisCiptaanId ,
                    success: function (res) {
                        if (res.status == 'success') {
                            let opt = '<option>Pilih Sub Jenis Ciptaan</option>'
                            res.data.sub_jenis_ciptaan.forEach(element => {
                                opt += `
                                <option value='${element.id}'>${element.nama_sub_jenis_ciptaan}</option>
                                `
                            });

                            $("select[name=sub_jenis_ciptaan]").html(opt)
                            $("#text-biaya").html("Rp. " + money(res.data.biaya.biaya))
                        }
                    }, error: function(){
                        let opt = '<option>Pilih Jenis Ciptaan Terlebih Dahulu</option>'
                        $("select[name=sub_jenis_ciptaan]").html(opt)
                        $("#text-biaya").html("Rp. " + money(0))
                    }
                });
            }

            const getKota = (idKota = null) =>{
                let provinsiId = $("select[name=provinsi]").val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('api/kota') }}" + '/' + provinsiId ,
                    success: function (res) {
                        if (res.status == 'success') {
                            let opt = '<option value="">Pilih Kota</option>'
                            res.data.forEach(element => {
                                opt += `
                                <option value='${element.id}' ${idKota == element.id ? 'selected' : ''} >${element.nama_kota}</option>
                                `
                            });

                            $("select[name=kota]").html(opt)
                        }
                    }, error: function(){
                        let opt = '<option value="">Pilih Provinsi Terlebih Dahulu</option>'
                        $("select[name=kota]").html(opt)
                    }
                });
            }

            $('#btnModal').click(function (e) { 
                $('#namaPencipta').val('');
                $('#emailPencipta').val('');
                $('#noTelpPencipta').val('');
                $('#alamatPencipta').val('');
                $('#kodePosPencipta').val('');
                $('select[name=provinsi]').val("").trigger("change");
                $('select[name=kota]').empty();
            });

            let tmpEditId = 0;
            $('#tambah-pencipta').click(function (e) { 
                let namaPencipta = $('#namaPencipta').val();
                let emailPencipta = $('#emailPencipta').val();
                let noTelpPencipta = $('#noTelpPencipta').val();
                let alamatPencipta = $('#alamatPencipta').val();
                let kodePosPencipta = $('#kodePosPencipta').val();
                let provinsiId = $('select[name=provinsi]').val();
                let provinsiText = $('select[name=provinsi]').find(":selected").text();
                
                let kotaId = $('select[name=kota]').val();
                let kotaText = $('select[name=kota]').find(":selected").text();

                if(!namaPencipta || !emailPencipta || !noTelpPencipta || !alamatPencipta || !kodePosPencipta || !provinsiId || !kotaId){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Mohon untuk melengkapi field yang ada sebelum disimpan!',
                    })
                }else{
                    let tablePencipta = `
                        <tr id="tbl-${idRow}">
                            <td>
                                ${namaPencipta}
                            </td>
                            <td>
                                ${alamatPencipta}
                            </td>
                            <td>
                                ${kodePosPencipta}
                            </td>
                            <td>
                                ${provinsiText}
                            </td>
                            <td>
                                ${kotaText}
                            </td>
                            <td>
                                ${emailPencipta} / ${noTelpPencipta}</td>
                            <td class="text-center">
                                <input type"hidden" style="display: none !important;" class="idDelete" value="${idRow}">
                                <a href="javascript:void(0)" id="btn-edit-pencipta"  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPencipta" >Edit</a>
                                <a href="javascript:void(0)" id="btn-delete-pencipta"  class="btn btn-danger btn-sm">DELETE</a>
                            </td>
                        </tr>
                    `;
                    

                    let penciptaArr = `
                    <div id="${idRow}">
                        <input type"hidden" style="display: none !important;" value="${namaPencipta}" name="namaPencipta[]" class="namaPencipta">
                        <input type"hidden" style="display: none !important;" value="${alamatPencipta}" name="alamatPencipta[]" class="alamatPencipta">
                        <input type"hidden" style="display: none !important;" value="${kodePosPencipta}" name="kodePosPencipta[]" class="kodePosPencipta">
                        <input type"hidden" style="display: none !important;" value="${kotaId}" name="kotaPencipta[]" class="kotaPencipta">
                        <input type"hidden" style="display: none !important;" value="${emailPencipta}" name="emailPencipta[]" class="emailPencipta">
                        <input type"hidden" style="display: none !important;" value="${noTelpPencipta}" name="noTelpPencipta[]" class="noTelpPencipta">
                        <input type"hidden" style="display: none !important;" value="${provinsiId}" name="provinsiId[]" class="provinsiId">
                    </div>
                        `
                    $('#pencipta-wrapper').append(penciptaArr)
                    $('#wrapper').append(tablePencipta)
    
                    $('#namaPencipta').val('');
                    $('#emailPencipta').val('');
                    $('#noTelpPencipta').val('');
                    $('#alamatPencipta').val('');
                    $('#kodePosPencipta').val('');
                    $('select[name=provinsi]').val("").trigger("change");
                    $('select[name=kota]').empty();
    
                    //close modal
                    $('#closeModal').click();
                    idRow = idRow + 1;
                }
                

            });

            $("select[name=jenis_ciptaan]").change(function (e) { 
                getSubJenisCiptaanAndPrice();
            });

            $("select[name=jenis_permohonan]").change(function (e) { 
                getSubJenisCiptaanAndPrice();
                if($(this).find(":selected").text() == 'UMUM'){
                    $('#bukti').hide();
                }else{
                    $('#bukti').show();
                }
            });

            $("select[name=provinsi]").change(function (e) {
                getKota();
            });

            $("#ktp").change(function (e) { 
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '')
                if (filename.length > 60) {
                    filename = filename.substring(0, 60) + ' . . .';
                }
                $("#label_ktp").html(filename)
            });
            $("#contoh_ciptaan").change(function (e) { 
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '')
                if (filename.length > 60) {
                    filename = filename.substring(0, 60) + ' . . .';
                }
                $("#label_contoh_ciptaan").html(filename)
            });
            $("#bukti_bayar").change(function (e) { 
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '')
                if (filename.length > 160) {
                    filename = filename.substring(0, 160) + ' . . .';
                }
                $("#label_bukti_bayar").html(filename)
            });
            $("#surat_pernyataan").change(function (e) { 
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '')
                if (filename.length > 60) {
                    filename = filename.substring(0, 60) + ' . . .';
                }
                $("#label_surat_pernyataan").html(filename)
            });
            $("#bukti_pengalihan").change(function (e) { 
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '')
                if (filename.length > 60) {
                    filename = filename.substring(0, 60) + ' . . .';
                }
                $("#label_bukti_pengalihan").html(filename)
            });

            $("#optional_file").change(function (e) { 
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '')
                if (filename.length > 60) {
                    filename = filename.substring(0, 60) + ' . . .';
                }
                $("#label_optional_file").html(filename)
            });

            $.each($(".select2-container"), function (i, v) { 
                $(v).attr("style", "width:100%;")
            });

            $(document).on('click', '#btn-delete-pencipta', function () {
                $(this).parents('tr').remove();
                let rowD = $(this).siblings('.idDelete').val();
                $('#'+rowD).remove();
            });

            // ketika tombol edit diclick
            $(document).on('click', '#btn-edit-pencipta', function () {
                let row = $(this).siblings('.idDelete').val();
                tmpEditId = row;
                $('#edit-pencipta').show();
                $('#tambah-pencipta').hide();

                // ambil value inputan yg akan di edit
                let namaPencipta = $('#'+row).children('.namaPencipta').val();
                let alamatPencipta = $('#'+row).children('.alamatPencipta').val();
                let kodePosPencipta = $('#'+row).children('.kodePosPencipta').val();
                let kotaPencipta = $('#'+row).children('.kotaPencipta').val();
                let emailPencipta = $('#'+row).children('.emailPencipta').val();
                let noTelpPencipta = $('#'+row).children('.noTelpPencipta').val();
                let provinsiId = $('#'+row).children('.provinsiId').val();
                
                // tampilkan value inputan yg akan di edit
                $('#namaPencipta').val(namaPencipta);
                $('#emailPencipta').val(emailPencipta);
                $('#noTelpPencipta').val(noTelpPencipta);
                $('#alamatPencipta').val(alamatPencipta);
                $('#kodePosPencipta').val(kodePosPencipta);
                $('select[name=provinsi]').val(provinsiId).trigger("change");
                getKota(kotaPencipta);

            });

            // simpan data yang diedit
            $(document).on('click', '#edit-pencipta', function () {
                // ambil value inputan yg telah di edit
                let namaPencipta = $('#namaPencipta').val();
                let emailPencipta = $('#emailPencipta').val();
                let noTelpPencipta = $('#noTelpPencipta').val();
                let alamatPencipta = $('#alamatPencipta').val();
                let kodePosPencipta = $('#kodePosPencipta').val();
                let provinsiId = $('select[name=provinsi]').val();
                let provinsiText = $('select[name=provinsi]').find(":selected").text();
                
                let kotaId = $('select[name=kota]').val();
                let kotaText = $('select[name=kota]').find(":selected").text();

                //cek apakah form telah diisi semua
                if(!namaPencipta || !emailPencipta || !noTelpPencipta || !alamatPencipta || !kodePosPencipta || !provinsiId || !kotaId){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Mohon untuk melengkapi field yang ada sebelum disimpan!',
                    })
                }else{
                    let tablePencipta = `
                            <td>
                                ${namaPencipta}
                            </td>
                            <td>
                                ${alamatPencipta}
                            </td>
                            <td>
                                ${kodePosPencipta}
                            </td>
                            <td>
                                ${provinsiText}
                            </td>
                            <td>
                                ${kotaText}
                            </td>
                            <td>
                                ${emailPencipta} / ${noTelpPencipta}</td>
                            <td class="text-center">
                                <input type"hidden" style="display: none !important;" class="idDelete" value="${tmpEditId}">
                                <a href="javascript:void(0)" id="btn-edit-pencipta"  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPencipta" >Edit</a>
                                <a href="javascript:void(0)" id="btn-delete-pencipta"  class="btn btn-danger btn-sm">DELETE</a>
                            </td>
                    `;
                    

                    let penciptaArr = `
                        <input type"hidden" style="display: none !important;" value="${namaPencipta}" name="namaPencipta[]" class="namaPencipta">
                        <input type"hidden" style="display: none !important;" value="${alamatPencipta}" name="alamatPencipta[]" class="alamatPencipta">
                        <input type"hidden" style="display: none !important;" value="${kodePosPencipta}" name="kodePosPencipta[]" class="kodePosPencipta">
                        <input type"hidden" style="display: none !important;" value="${kotaId}" name="kotaPencipta[]" class="kotaPencipta">
                        <input type"hidden" style="display: none !important;" value="${emailPencipta}" name="emailPencipta[]" class="emailPencipta">
                        <input type"hidden" style="display: none !important;" value="${noTelpPencipta}" name="noTelpPencipta[]" class="noTelpPencipta">
                        <input type"hidden" style="display: none !important;" value="${provinsiId}" name="provinsiId[]" class="provinsiId">
                        `

                    $('#'+tmpEditId).empty()
                    $('#'+tmpEditId).append(penciptaArr)

                    $('#tbl-'+tmpEditId).empty()
                    $('#tbl-'+tmpEditId).append(tablePencipta)
    
                    $('#namaPencipta').val('');
                    $('#emailPencipta').val('');
                    $('#noTelpPencipta').val('');
                    $('#alamatPencipta').val('');
                    $('#kodePosPencipta').val('');
                    $('select[name=provinsi]').val("");
                    $('select[name=kota]').empty();

                    $('#edit-pencipta').hide();
                    $('#tambah-pencipta').show();
                    $('#closeModal').click();
                    
                }
            });
        }); 
    </script>
@endsection
