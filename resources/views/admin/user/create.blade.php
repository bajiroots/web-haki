@extends('admin.include.index')

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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah User</h5>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email <span class="required" style="color: red">*</span> </label>
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Enter email" required>
                                        <span id="cEmail"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Username <span class="required" style="color: red">*</span> </label>
                                        <input id="username" type="text" class="form-control" name="username" placeholder="Username" required>
                                        <span id="cUsername"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap <span class="required" style="color: red">*</span> </label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label>No KTP <span class="required" style="color: red">*</span> </label>
                                <input type="number" class="form-control" name="no_ktp" placeholder="No KTP" required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tgl Lahir <span class="required" style="color: red">*</span> </label>
                                        <input type="date" class="form-control" name="tgl_lahir" placeholder="Tgl Lahir" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jenis Kelamin <span class="required" style="color: red">*</span> </label>
                                        <select class="form-control mb-3" name="jenis_Kelamin" required>
                                            <option value=""> Pilih Jenis Kelamin </option>
                                            <option value="laki-laki"> Laki Laki </option>
                                            <option value="perempuan"> Perempuan </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat <span class="required" style="color: red">*</span> </label>
                                <textarea required name="alamat" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kode POS <span class="required" style="color: red">*</span> </label>
                                <input type="number" class="form-control" name="kode_pos" placeholder="Kode POS" required>
                            </div>
                            <div class="form-group">
                                <div for="provinsi">Provinsi <span class="required" style="color: red;">*</span></div>
                                <select class="form-control mb-3 js-states pasti" name="provinsi" required>
                                    <option value=""> Pilih Provinsi </option>
                                    @foreach (\Helper::provinsi() as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota <span class="required" style="color: red">*</span></label>
                                <select class="form-control mb-3" name="kota" required>
                                    <option value=""> Pilih Provinsi Terlebih Dahulu </option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Password <span class="required" style="color: red">*</span> </label>
                                        <input id="password" type="password" class="form-control" name="password" minlength="8" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Confirm Password <span class="required" style="color: red">*</span> </label>
                                        <input id="cpassword" type="password" class="form-control" name="cpassword" minlength="8" required>
                                    </div>
                                </div>
                            </div>
                            <span id="pesan"></span>
                            <button type="submit" class="btn btn-primary btn-block btn-submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets_admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/pages/select2.js') }}"></script>

<script>
    $(document).ready(function () {
        const getKota = () =>{
            let provinsiId = $("select[name=provinsi]").val();
            $.ajax({
                type: "GET",
                url: "{{ url('api/kota') }}" + '/' + provinsiId ,
                success: function (res) {
                    if (res.status == 'success') {
                        let opt = '<option value="">Pilih Kota</option>'
                        res.data.forEach(element => {
                            opt += `
                            <option value='${element.id}'>${element.nama_kota}</option>
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

        $("select[name=provinsi]").change(function (e) {
            getKota();
        });

        $('#password, #cpassword').on('keyup', function () {
            if ($('#password').val() == $('#cpassword').val()) {
                $('#pesan').html('Matching').css('color', 'green');
            } else {
                $('#pesan').html('Not Matching').css('color', 'red');
            }
        });

        $('#email').keyup(function (e) { 
            let email = $(this).val()
            $.ajax({
                type: "GET",
                url: "{{ url('api/email') }}" + '/' + email ,
                success: function (response) {
                    if (response.status == 'success') {
                        $('#cEmail').html('Email belum terdaftar').css('color','green')
                    } else if(response.status == 'error'){
                        $('#cEmail').html('Email telah terdaftar').css('color','red')
                    }
                }
            });
        });

        $('#username').keyup(function (e) { 
            let username = $(this).val()
            $.ajax({
                type: "GET",
                url: "{{ url('api/username') }}" + '/' + username ,
                success: function (response) {
                    if (response.status == 'success') {
                        $('#cUsername').html('Username belum terdaftar').css('color','green')
                    } else if(response.status == 'error'){
                        $('#cUsername').html('Username telah terdaftar').css('color','red')
                    }
                }
            });
        });

    });
</script>
@endsection