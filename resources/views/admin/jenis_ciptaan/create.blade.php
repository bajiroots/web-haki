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
                <form method="POST" action="{{route('jenis_ciptaan.store')}}" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jenis Ciptaan</h5>
                            @csrf
                            <div class="form-group">
                                <label>Nama Jenis Ciptaan</label>
                                <input type="text" name="jenis_ciptaan" required class="form-control mb-3" placeholder="Contoh: Karya Tulis">
                            </div>   
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><label>Pilih Jenis Permohonan</label></th>
                                    <th><label>Biaya</label></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="dynamicAddRemove">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select name="jenis_permohonan_id[]" class="form-control">
                                                <option value="">Pilih Jenis Permohonan</option>
                                                @foreach ($jenis_permohonan as $jenis)
                                                    <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis_permohonan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="biaya[]" required class="form-control mb-3" placeholder="Contoh: 200000">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" name="add" id="dynamic-ar" class="btn btn-primary">Tambah Lagi</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('dataTable')
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(`
            <tr>
            <td>
                <div class="form-group">
                        <select name="jenis_permohonan_id[]" class="form-control">
                            <option value="">Pilih Jenis Permohonan</option>
                                @foreach ($jenis_permohonan as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis_permohonan }}</option>
                                @endforeach
                        </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" name="biaya[]" required class="form-control mb-3" placeholder="Contoh: 200000">
                </div>
            </td>
            <td>
                <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
            </td>
            </tr>
            `);
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endpush