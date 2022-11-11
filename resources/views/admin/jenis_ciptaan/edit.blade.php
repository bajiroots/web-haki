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
                <form method="POST" action="{{route('jenis_ciptaan.update', $data->id)}}">
                    {{method_field('PUT')}}
                    @csrf
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jenis Ciptaan</h5>
                            <div class="form-group">
                                <label>Nama Jenis Ciptaan</label>
                                <input type="text" value="{{$data->nama_jenis_ciptaan}}" name="jenis_ciptaan" required class="form-control mb-3" placeholder="Contoh: Karya Tulis">
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
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data->biayaJenisCiptaan as $biaya)
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <select name="jenis_permohonan_id[]" class="form-control">
                                                    <option value="">Pilih Jenis Permohonan</option>
                                                    @foreach ($jenis_permohonan as $jenis)
                                                        <option value="{{ $jenis->id }}" @if($jenis->id == $biaya->jenis_permohonan_id) selected @endif>{{ $jenis->nama_jenis_permohonan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="biaya[]" required class="form-control mb-3" placeholder="Contoh: 200000" value="{{ $biaya->biaya }}">
                                            </div>
                                        </td>
                                        <td>
                                            @if($i == 1)
                                            <button type="button" name="add" id="dynamic-ar" class="btn btn-primary">Tambah Lagi</button>
                                            @else
                                            <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                @if (count($data->biayaJenisCiptaan) <= 0)
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
                                @endif
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