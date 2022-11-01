@extends('index')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Formulir dan Format Surat</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li>Formulir dan Format Surat</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                {{-- <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
                    <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                </div> --}}
                <div class="col-lg-12 content order-last  order-lg-first">
                    <h3>Formulir dan Format Surat</h3>
                </div>
                <div class="col-lg-5 mb-3 content order-last  order-lg-first">
                    <div class="input-group">
                        <input type="text" id="filter" class="form-control" placeholder="Telusuri Surat dan Formulir">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <?php
                    $dataUnduhan = [
                        [
                            "judul" => "FORMULIR PERMOHONAN PENCATATAN LISENSI",
                            "img" => "a.jpg",
                            "link" => "https://www.dgip.go.id/unduhan/download/formulir-permohonan-pencatatan-lisensi-44-2020"
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN PERUBAHAN NAMA DAN ALAMAT HAK CIPTA",
                            "img" => "2. SURAT PERMOHONAN PERUBAHAN NAMA DAN ALAMAT HAK CIPTA.jpg",
                            "link" => "#"
                        ],
                        [
                            "judul" => "SURAT KETERANGAN UMK",
                            "img" => "3. Surat Keterangan UMK.jpg",
                            "link" => "#"
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN SALINAN HAK CIPTA",
                            "img" => "5. SURAT PERMOHONAN SALINAN HAK CIPTA.jpg",
                            "link" => "#"
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN KETERANGAN TERTULIS",
                            "img" => "6. SURAT PERMOHONAN KETERANGAN TERTULIS.jpg",
                            "link" => ""
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN PERBAIKAN DATA",
                            "img" => "7. Surat Permohonan Perbaikan Data.jpg",
                            "link" => "#"
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN KOREKSI SURAT PENCATATAN",
                            "img" => "8. Surat Permohonan Koreksi Surat Pencatatan.jpg",
                            "link" => "#"
                        ],
                        [
                            "judul" => "SURAT TANGGAPAN SURAT KEKURANGAN FORMALITAS",
                            "img" => "9. Surat Tanggapan Surat Kekurangan Formalitas.jpg",
                            "link" => "#"
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN PERTANYAAN STATUS",
                            "img" => "12. Surat Permohonan Pertanyaan Status.jpg",
                            "link" => ""
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN PERBAIKAN CIPTAAN",
                            "img" => "13. Surat Permohonan Perbaikan Ciptaan.jpg",
                            "link" => "#"
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN PETIKAN",
                            "img" => "SURAT PERMOHONAN PETIKAN.jpg",
                            "link" => "#"
                        ],
                        [
                            "judul" => "SURAT PERMOHONAN HAK CIPTA",
                            "img" => "surat permohonan hak cipta.jpg",
                            "link" => "#"
                        ],
                    ]
                ?>

                @foreach ($dataUnduhan as $datas)
                    <div class="col-md-3 mb-3"> 
                        <a href="{{ $datas['link'] }}">
                            <div class="card">
                                <img src="{{ asset('assets/unduhan/img/'. $datas["img"]) }}" alt="img here" class="card-img-top">    
                                <div class="card-body">
                                    <p class="card-text" >{{ $datas['judul'] }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
