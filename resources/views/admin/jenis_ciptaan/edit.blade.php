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
                        <h5 class="card-title">Jenis Ciptaan</h5>
                        <form method="POST" action="{{route('jenis_ciptaan.update', $data->id)}}">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="form-group">
                                <label>Nama Jenis Ciptaan</label>
                                <input type="text" value="{{$data->nama_jenis_ciptaan}}" name="jenis_ciptaan" required class="form-control mb-3" placeholder="Contoh: Karya Tulis">
                            </div>
                            
                            <div class="form-group">
                                <label>Pilih Jenis Permohonan</label>
                                <select name="jenis_permohonan_id" class="form-control">
                                    <option value="">Pilih Jenis Permohonan</option>
                                    @foreach ($jenis_permohonan as $jenis)
                                        <option value="{{ $jenis->id }}" @if($jenis->id == $data->jenis_permohonan_id) selected @endif >{{ $jenis->nama_jenis_permohonan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Biaya</label>
                                <input type="text" value="{{$data->biaya}}" name="biaya" required class="form-control mb-3" placeholder="Contoh: 200000">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection