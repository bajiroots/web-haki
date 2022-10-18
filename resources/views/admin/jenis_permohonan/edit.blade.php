@extends('admin.include.index')

@section('content')
<div class="page-content">
    <div class="page-info container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jenis Permohonan</li>
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
                        <h5 class="card-title">Jenis Permohonan</h5>
                        <form method="POST" action="{{route('jenis_permohonan.update', $data->id)}}">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="form-group">
                                <label>Nama Jenis Permohonan</label>
                                <input type="text" value="{{$data->nama_jenis_permohonan}}" name="jenis_permohonan" required class="form-control" placeholder="Contoh: Lembaga Pendidikan">
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