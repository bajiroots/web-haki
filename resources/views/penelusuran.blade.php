@extends('index')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Penelusuran HKI</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li>Penelusuran HKI</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <div class="container" data-aos="fade-up">
        <form action="" method="GET">
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <h3>Filter Penelusuran</h3>
                </div>
                
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $getSearch }}" name="search" placeholder="Penelusuran HKI" aria-label="Penelusuran HKI">
                    </div>
                    
                    <div class="input-group">
                        <input class="form-check-input" type="checkbox" name="status[]" value="terima" id="terima" @if( in_array('terima', $getStatus) ) checked @endif >
                        <label class="form-check-label mx-2" for="terima">
                            Diterima
                        </label>

                        <input class="form-check-input" type="checkbox" name="status[]" value="tolak" id="tolak" @if( in_array('tolak', $getStatus) ) checked @endif >
                        <label class="form-check-label mx-2" for="tolak">
                            Ditolak
                        </label>

                        <input class="form-check-input" type="checkbox" name="status[]" value="proses" id="proses" @if( in_array('proses', $getStatus) ) checked @endif >
                        <label class="form-check-label mx-2" for="proses">
                            Diproses
                        </label>
                    </div>
                </div>


            </div>
            <input type="submit" class="btn btn-primary btn-sm mt-3" value="Submit">
            <a class="btn btn-secondary btn-sm mt-3" href="{{ route('penelusuran') }}">Refresh <i class="fa fa-refresh"></i> </a>
        </form>
    </div>

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-12 content order-last  order-lg-first">
                    <h3>Hasil Penelusuran</h3>
                </div>

                @foreach ($datas as $data)
                    <div class="row">
                        <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-md-12">
                                <div class="card-body">
                                    @if ($data->status == 'terima')
                                    <a href=" @if($data->foto_sertifikat === null) #! @else {{ asset('storage/'.$data->foto_sertifikat) }} @endif" target="_blank" class="btn @if($data->foto_sertifikat === null) disabled btn-success @else btn-success bg-success text-light @endif float-right" @if($data->foto_sertifikat === null) disabled @endif> <i class="fa fa-download"></i></a>
                                    <button class="btn btn-success btn-sm text-white">Diterima</button>
                                    @endif

                                    @if ($data->status == 'tolak')
                                    <button class="btn btn-danger btn-sm text-white">Ditolak</button>
                                    @endif

                                    @if ($data->status == 'proses')
                                    <button class="btn btn-warning   btn-sm text-white">Diproses</button>
                                    @endif

                                    <small class="text-muted">{{ $data->nomor_permohonan }}</small>

                                    <h5 class="card-title mt-3">{{ $data->judul_ciptaan }}</h5>
                                    <p class="card-text">{{ $data->deskripsi }}</p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="d-felx justify-content-center">

                        {{ $datas->links() }}

                    </div>
            </div>
        </div>
        </div>
    </section><!-- End About Us Section -->

    @endsection
    
    @push('searchbar')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
        $("#filter").keyup(function(){
    
            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(), count = 0;
    
            // Loop through the comment list
            $(".col-md-3").each(function(){
    
                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).fadeOut();
    
                // Show the list item if the phrase matches and increase the count by 1
                } else {
                    $(this).show();
                    count++;
                }
            });
        });
    });
    </script>
    @endpush
