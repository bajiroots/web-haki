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
                    <li><a href="/">Home</a></li>
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
                <div class="col-md-3 mb-3 ">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <button class="btn btn-outline-secondary">Telusuri</button>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/a.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">FORMULIR PERMOHONAN PENCATATAN LISENSI</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/2. SURAT PERMOHONAN PERUBAHAN NAMA DAN ALAMAT HAK CIPTA.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN PERUBAHAN NAMA DAN ALAMAT HAK CIPTA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/3. Surat Keterangan UMK.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT KETERANGAN UMK</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/5. SURAT PERMOHONAN SALINAN HAK CIPTA.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN SALINAN HAK CIPTA</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/6. SURAT PERMOHONAN KETERANGAN TERTULIS.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN KETERANGAN TERTULIS</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/7. Surat Permohonan Perbaikan Data.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN PEERBAIKAN DATA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/8. Surat Permohonan Koreksi Surat Pencatatan.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN KOREKSI SURAT PENCATATAN</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/9. Surat Tanggapan Surat Kekurangan Formalitas.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT TANGGAPAN SURAT KEKURANGAN FORMALITAS</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/12. Surat Permohonan Pertanyaan Status.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN PERTANYAAN STATUS</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/13. Surat Permohonan Perbaikan Ciptaan.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN PERBAIKAN CIPTAAN</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/Surat Keterangan UMK.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN PETIKAN</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#">
                        <div class="card">
                            <img src="{{ asset('assets/unduhan/img/surat permohonan hak cipta.jpg') }}" alt="" class="card-img-top">    
                            <div class="card-body">
                                <p class="card-text">SURAT PERMOHONAN HAK CIPTA</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </section><!-- End About Us Section -->

    @endsection
