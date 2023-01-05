<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>WEB HAKI</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href=" {{ asset('assets_admin/plugins/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
        <link href=" {{ asset('assets_admin/plugins/font-awesome/css/all.min.css') }} " rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href=" {{ asset('assets_admin/css/connect.min.css') }} " rel="stylesheet">
        <link href=" {{ asset('assets_admin/css/admin2.css') }} " rel="stylesheet">
        <link href=" {{ asset('assets_admin/css/dark_theme.css') }} " rel="stylesheet">
        <link href=" {{ asset('assets_admin/css/custom.css') }} " rel="stylesheet">
        <link href="{{ asset('assets_admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">  

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="auth-page sign-in">
        
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="auth-form">
                            <div class="row">
                                <div class="col">
                                    <div class="logo-box"><a href="#" class="logo-text">Register</a></div>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email <span class="required" style="color: red">*</span> </label>
                                                    <input id="email" type="email" class="form-control" name="email" required placeholder="Enter email">
                                                    <span id="cEmail"></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Username <span class="required" style="color: red">*</span> </label>
                                                    <input id="username" type="text" class="form-control" name="username" required placeholder="Username">
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
                                                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Tgl required Lahir">
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
                                            <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea required>
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
                                                    <input id="password" type="password" class="form-control" name="password" required minlength="8">
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
                                        <button type="submit" class="btn btn-primary btn-block btn-submit">Sign Up</button>
                                        
                                        <div class="auth-options">
                                            <a href="{{ route('login') }}" class="forgot-link">Already have an account?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascripts -->
        <script src=" {{ asset('assets_admin/plugins/jquery/jquery-3.4.1.min.js') }} "></script>
        <script src=" {{ asset('assets_admin/plugins/bootstrap/popper.min.js') }} "></script>
        <script src=" {{ asset('assets_admin/plugins/bootstrap/js/bootstrap.min.js') }} "></script>
        <script src=" {{ asset('assets_admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }} "></script>
        <script src=" {{ asset('assets_admin/js/connect.min.js') }} "></script>
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

    </body>
</html>