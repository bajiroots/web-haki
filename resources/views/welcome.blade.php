@extends('index')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h2 data-aos="fade-up">Website#1 untuk Mendaftarkan Hak Kekayaan Intelektual</h2>
                <!-- <p data-aos="fade-up" data-aos-delay="100">Facere distinctio molestiae nisi fugit tenetur repellat non praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum voluptatem eum maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p> -->

                <form action="{{ route('penelusuran') }}" method="GET" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                    data-aos-delay="200">
                    <input type="text" class="form-control" name="search" placeholder="Telusuri Hak Cipta">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>

                <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jmlhUser }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>User</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jmlhPermohonan }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hak Cipta</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
            </div>

        </div>
    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= Featured Services Section ======= -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about pt-5">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
                    <img src="{{ asset('assets/img/haki.jpg') }}" class="img-fluid" alt="">
                    <a href="https://www.youtube.com/watch?v=ggEN1absf3s" class="glightbox play-btn"></a>
                </div>
                <div class="col-lg-6 content order-last  order-lg-first">
                    <h3>Tentang HAK CIPTA</h3>
                    <p>
                        Hak Cipta merupakan salah satu bagian dari kekayaan intelektual yang memiliki ruang lingkup objek dilindungi paling luas, karena mencakup ilmu pengetahuan, seni dan sastra (art and literary) yang di dalamnya mencakup pula program komputer. Perkembangan ekonomi kreatif yang menjadi salah satu andalan Indonesia dan berbagai negara dan berkembang pesatnya teknologi informasi dan komunikasi mengharuskan adanya pembaruan Undang-Undang Hak Cipta, mengingat Hak Cipta menjadi basis terpenting dari ekonomi kreatif nasional. Dengan Undang-Undang Hak Cipta yang memenuhi unsur pelindungan dan pengembangan ekonomi kreatif ini maka diharapkan kontribusi sektor Hak Cipta dan Hak Terkait bagi perekonomian negara dapat lebih optimal.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">

            <div class="slides-1 swiper" data-aos="fade-up">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Hamka. S. TP., MP., M. Sca</h3>
                            <h4>PENANGGUNG JAWAB</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Dr. Andi Lisnawati, SP., M. Si</h3>
                            <h4>KETUA</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Reza Andrea</h3>
                            <h4>Project Manager</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Adelia Juli Kardika, S. Hut., M. Si</h3>
                            <h4>ANGGOTA</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Arief Rahman, SP., M. Sc</h3>
                            <h4>ANGGOTA</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Dr. Heriad Daud Salusu, S. Hut., MP</h3>
                            <h4>REVIEWER</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Dr. Budi Winarni, M. Si</h3>
                            <h4>REVIEWER</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Dr. Abdul Rasyid Zarta, S. Hut., MP</h3>
                            <h4>REVIEWER</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Rudito. S. TP., MP</h3>
                            <h4>REVIEWER</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Rusmini, SP., MP</h3>
                            <h4>REVIEWER</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                                    
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Ferdian Ardhana</h3>
                            <h4>Backend & Frontend Developer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                First, solve the problem. Then, write the code.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Dicky Armansyah</h3>
                            <h4>Backend & Frontend Developer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Experience is the name everyone gives to their mistakes
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Ryan Rait</h3>
                            <h4>Backend Developer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Knowledge is power
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Yopi</h3>
                            <h4>Backend Developer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Sometimes it pays to stay in bed on Monday, rather than spending the rest of the week debugging Monday’s code.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Nur Asikin Rindiyani</h3>
                            <h4>Backend Developer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Stay positive. Attitude is everything                                
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Fairuz Alifah</h3>
                            <h4>Backend Developer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                If it was easy, everybody could do it!
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Firman Pratama</h3>
                            <h4>Backend Developer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Tomorrow is a day that never arrives.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                    
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/img/politani.png') }}" class="testimonial-img" alt="">
                            <h3>Hermawati</h3>
                            <h4>Backend Developer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Only you can change your life. Nobody else can do it for you.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->

@endsection
