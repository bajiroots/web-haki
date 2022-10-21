@extends('admin.include.index')

@section('content')
<div class="page-content">
    <div class="page-info container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub-Jenis Ciptaan</li>
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
                        <h5 class="card-title">Sub-Jenis Ciptaan</h5>
                        <form method="POST" action="{{route('sub_jenis_ciptaan.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Pilih Jenis Ciptaan</label>
                                {{-- <input type="text" name="sub_jenis_ciptaan" required class="form-control mb-3" placeholder="Contoh: Atlas, Biografi, Booklet.."> --}}
                                <select class="form-control mb-3" name="jenis_ciptaan" required>
                                    @foreach ($dataCiptaans as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jenis_ciptaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Sub-Jenis Ciptaan</label>
                                <input type="text" name="sub_jenis_ciptaan" required class="form-control mb-3" placeholder="Contoh: Atlas, Biografi, Booklet..">
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