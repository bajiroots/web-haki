@extends('admin.include.index')

@section('content')
<div class="page-content">
    <div class="page-info container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Hak Cipta</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('permohonan_haki.index') }}"> Daftar Ciptaan </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Permohonan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="caption">
        <h3 class="text-center">Permohonan Pencatatan Ciptaan Secara Elektronik</h3>
    </div>

    <form method="POST" action="{{ route('permohonan_haki.update', $data->id) }}" enctype="multipart/form-data">
        @csrf
        {{ method_field("PUT") }}
        <div class="main-wrapper container">
            <div class="card-header">
                <nav>
                    <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Detail</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Pencipta</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Lampiran</button>
                    </div>
                </nav>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="row tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                    tabindex="0">
                    <div class="col-xl">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-right" id="text-biaya"></h2>
                                <h5 class="card-title">
                                    Permohonan
                                    <button class="btn btn-success float-right">Sertifikat</button>
                                </h5>
                                <div class="form-group">
                                    <label>Nomor Aplikasi <span class="required" style="color: red">*</span> </label>
                                    <input type="text" name="judul" required class="form-control mb-3"
                                        placeholder="Contoh: Atlas, Biografi, Booklet.."
                                        value="{{ $data->nomor_permohonan }} " readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Sertifikat <span class="required" style="color: red">*</span> </label>
                                    <input type="text" name="judul" required 
                                        @if($data->nomor_sertifikat === null)
                                        class="form-control mb-3 border-warning bg-warning text-light"
                                        value="{{ 'Sedang dalam Proses' }}"
                                        @else
                                        class="form-control mb-3"
                                        value="{{ $data->nomor_sertifikat }}"
                                        @endif
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Judul Ciptaan <span class="required" style="color: red">*</span> </label>
                                    <input type="text" name="judul" required class="form-control mb-3"
                                        placeholder="Contoh: Atlas, Biografi, Booklet.."
                                        value="{{ $data->judul_ciptaan }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Uraian Singkat Ciptaan <span class="required" style="color: red">*</span>
                                    </label>
                                    <textarea class="form-control" name="uraian" id="" cols="10"
                                        rows="5" readonly> {{ $data->deskripsi }} </textarea>
                                </div>


                                <div class="row my-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Pengguna <span class="required" style="color: red">*</span> </label>
                                            <input type="text" name="judul" required class="form-control mb-3"
                                            placeholder="Contoh: Atlas, Biografi, Booklet.."
                                            value="{{ $data->user->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tanggal Pengajuan <span class="required"
                                                    style="color: red">*</span>
                                            </label>
                                            <input type="text" name="tanggal" required class="form-control mb-3"
                                                placeholder="Contoh: Atlas, Biografi, Booklet.."
                                                value="{{ substr($data->created_at, 0, 11) }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Jenis Permohonan <span class="required" style="color: red">*</span> </label>
                                            <input type="text" name="judul" required class="form-control mb-3"
                                            placeholder="Contoh: Atlas, Biografi, Booklet.."
                                            value="{{ $data->jenisPermohonan->nama_jenis_permohonan }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Jenis Ciptaan <span class="required" style="color: red">*</span> </label>
                                            <input type="text" name="judul" required class="form-control mb-3"
                                            placeholder="Contoh: Atlas, Biografi, Booklet.."
                                            value="{{ $data->SubJenisCiptaan->nama_sub_jenis_ciptaan }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tanggal Diumumkan <span class="required" style="color: red">*</span> </label>
                                            <input type="text" name="judul" required class="form-control mb-3"
                                            placeholder="Contoh: Atlas, Biografi, Booklet.."
                                            value="{{ $data->tgl_pengajuan }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Kota <span class="required" style="color: red">*</span> </label>
                                            <input type="text" name="judul" required class="form-control mb-3"
                                            placeholder="Contoh: Atlas, Biografi, Booklet.."
                                            value="{{ $data->kota_pertama_diumumkan }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Biaya <span class="required" style="color: red">*</span> </label>
                                            <input type="text" name="judul" required class="form-control mb-3 money"
                                            placeholder="Contoh: Atlas, Biografi, Booklet.."
                                            value="{{ $data->SubJenisCiptaan->jenisCiptaan->biayaJenisCiptaan->where('jenis_permohonan_id', $data->jenisPermohonan->id)->first()->biaya }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Status <span class="required" style="color: red">*</span> </label>
                                            <input type="text" name="judul" required 
                                            @if($data->status === 'proses')
                                            class="form-control mb-3 border-warning bg-warning text-light"
                                            value="{{ strtoupper($data->status) }}"
                                            @elseif($data->status === 'terima')
                                            class="form-control mb-3 border-success bg-success text-light"
                                            value="{{ strtoupper($data->status) }}"
                                            @else
                                            class="form-control mb-3 border-danger bg-danger text-light"
                                            value="{{ strtoupper($data->status) }}"
                                            @endif
                                            readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                    tabindex="0">
                    <div class="col-xl">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title float-left">Data Pencipta <span class="required"
                                        style="color: red">*</span> </h5>
                                <table id="" class="table table-responsive-sm mt-5">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Kode Pos</th>
                                            <th scope="col">Provinsi</th>
                                            <th scope="col">Kota</th>
                                            <th scope="col">Email/No.Hp</th>
                                        </tr>
                                    </thead>
                                    <tbody id="wrapper">
                                        @foreach ($data->pencipta as $pencipta)
                                        <tr>
                                            <td>{{ $pencipta->nama }}</td>
                                            <td>{{ $pencipta->alamat }}</td>
                                            <td>{{ $pencipta->kode_pos }}</td>
                                            <td>{{ $pencipta->kota->provinsi->nama_provinsi }}</td>
                                            <td>{{ $pencipta->kota->nama_kota }}</td>
                                            <td>{{ $pencipta->email }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                    tabindex="0">
                    <div class="col-xl">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lampiran</h5>

                                <table id="" class="table table-responsive-sm mt-5">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Kategori</th>
                                            <th>File Tersimpan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><p><a href="{{ asset('storage/'.$data->foto_ktp_wajib) }}"
                                                target="_blank">KTP</a></p></td>
                                            <td>
                                                {{ $data->foto_ktp_wajib }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p><a href="{{ asset('storage/'.$data->foto_bukti_bayar_wajib) }}"
                                                target="_blank">Foto Bukti Bayar</a></p></td>
                                            <td>
                                                {{ $data->foto_bukti_bayar_wajib }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p><a href="{{ asset('storage/'.$data->surat_pernyataan_wajib) }}"
                                                target="_blank">Surat Pernyataan</a></p></td>
                                            <td>
                                                {{ $data->surat_pernyataan_wajib }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p><a href="{{ asset('storage/'.$data->contoh_ciptaan_wajib) }}"
                                                target="_blank">Contoh Ciptaan</a></p></td>
                                            <td>
                                                {{ $data->contoh_ciptaan_wajib }}
                                            </td>
                                        </tr>
                                        @if($data->bukti_pengalihan_hak_cipta !== null)
                                            <tr>
                                                <td><p><a href="{{ asset('storage/'.$data->bukti_pengalihan_hak_cipta) }}"
                                                    target="_blank">Bukti Pengalihan</a></p></td>
                                                <td>
                                                    {{ $data->bukti_pengalihan_hak_cipta }}
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</form>
@endsection

@section('js')
{{-- jquery mask cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
    $(document).ready(function () {

        $('.money').mask('000.000.000', {reverse: true});

    });

</script>
@endsection
