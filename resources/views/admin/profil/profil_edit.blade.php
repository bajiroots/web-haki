@extends('admin.include.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    
                    @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                      
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{auth::user()->id}}">
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama Lengkap') }}</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                    <div class="col-md-8">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autocomplete="username">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="provinsi" class="col-md-4 col-form-label text-md-end">{{ __('Provinsi') }}</label>

                                    <div class="col-md-8">
                                        <select class="form-control mb-3" name="provinsi" required>
                                          @foreach ($prov as $item)
                                              <option value="{{$item->id}}" @if ($item->id == $user->kota->Provinsi->id)
                                                  {{ 'selected' }}
                                              @endif > {{$item->nama_provinsi}} </option>
                                          @endforeach
                                        </select>
                            
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="kota" class="col-md-4 col-form-label text-md-end">{{ __('Kota') }}</label>

                                    <div class="col-md-8">
                                        <select class="form-control mb-3" name="kota" required>
                                          @foreach ($kota as $item)
                                              <option value="{{$item->id}}" @if ($user->kota_id == $item->id)
                                                  {{'selected'}}
                                              @endif  > {{$item->nama_kota}} </option>
                                          @endforeach
                                         
                                        </select>
                            
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="no_ktp" class="col-md-4 col-form-label text-md-end">{{ __('Nomor KTP') }}</label>

                                    <div class="col-md-8">
                                        <input id="no_ktp" type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" value="{{ old('no_ktp', $user->no_ktp) }}" required autocomplete="no_ktp">

                                        @error('no_ktp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                                    <div class="col-md-8">
                                        <textarea id="alamat"  class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat">{{ old('alamat', $user->alamat) }}</textarea>

                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="kode_pos" class="col-md-4 col-form-label text-md-end">{{ __('Kode Pos') }}</label>

                                    <div class="col-md-8">
                                        <input id="kode_pos" type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ old('kode_pos', $user->kode_pos) }}" required autocomplete="kode_pos">

                                        @error('kode_pos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tgl_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>

                                    <div class="col-md-8">
                                        <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir', $user->tgl_lahir) }}" required autocomplete="tgl_lahir">

                                        @error('tgl_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>

                                    <div class="col-md-8">
                                        <select class="form-control mb-3" name="jenis_Kelamin" required>
                                            <option value="perempuan" @if($user->jenis_kelamin == 'perempuan') selected @endif> Perempuan </option>
                                            <option value="laki-laki" @if($user->jenis_kelamin == 'laki-laki') selected @endif> Laki Laki </option>
                                        </select>
                            
                                    </div>
                                </div>

                                

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                                    <div class="col-md-8">
                                        <input placeholder="KOSONGKAN JIKA TIDAK INGIN MENGGANTI PASSWORD" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-8">
                                        <input placeholder="KOSONGKAN JIKA TIDAK INGIN MENGGANTI PASSWORD" id="password-confirm" type="password" class="form-control" name="cpassword" autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update Profile') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('dataTable')
<script>
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
</script>
@endpush