@extends('index')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Kekayaan Intelektual</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>About</li>
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
                    <h3>Pengenalan Hak Cipta</h3>
                    <p>
                        <h5>Definisi Umum Hak Cipta</h5>
                        Hak Cipta merupakan salah satu bagian dari kekayaan intelektual yang memiliki ruang lingkup objek dilindungi paling luas, karena mencakup ilmu pengetahuan, seni dan sastra (art and literary) yang di dalamnya mencakup pula program komputer. Perkembangan ekonomi kreatif yang menjadi salah satu andalan Indonesia dan berbagai negara dan berkembang pesatnya teknologi informasi dan komunikasi mengharuskan adanya pembaruan Undang-Undang Hak Cipta, mengingat Hak Cipta menjadi basis terpenting dari ekonomi kreatif nasional. Dengan Undang-Undang Hak Cipta yang memenuhi unsur pelindungan dan pengembangan ekonomi kreatif ini maka diharapkan kontribusi sektor Hak Cipta dan Hak Terkait bagi perekonomian negara dapat lebih optimal.
                    </p>
                    <p>
                        <h5>Definisi Hak Cipta</h5>
                        Hak Cipta adalah hak eksklusif pencipta yang timbul secara otomatis berdasarkan prinsip deklaratif setelah suatu ciptaan diwujudkan dalam bentuk nyata tanpa mengurangi pembatasan sesuai dengan ketentuan peraturan perundang-undangan.
                        <p>Hak Terkait itu adalah hak yang berkaitan dengan Hak Cipta yang merupakan hak eksklusif bagi pelaku pertunjukan, produser fonogram, atau lembaga penyiaran.</p>
                    </p>
                    <p>
                        <h5>Ciptaan yang dapat dilindungi</h5>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Buku, program komputer, pamflet, perwajahan (layout) karya tulis yang diterbitkan, dan semua hasil karya tulis lain;</li>
                            <li class="list-group-item">Ceramah, kuliah, pidato, dan ciptaan lain yang sejenis dengan itu;</li>
                            <li class="list-group-item">Alat peraga yang dibuat untuk kepentingan pendidikan dan ilmu pengetahuan;</li>
                            <li class="list-group-item">Lagu atau musik dengan atau tanpa teks;</li>
                            <li class="list-group-item">Drama atau drama musikal, tari, koreografi, pewayangan, dan pantomim;</li>
                            <li class="list-group-item">Seni rupa dalam segala bentuk seperti seni lukis, gambar, seni ukir, seni kaligrafi, seni pahat, seni patung, kolase, dan seni terapan;</li>
                            <li class="list-group-item">Arsitektur;</li>
                            <li class="list-group-item">Peta;</li>
                            <li class="list-group-item">Seni Batik;</li>
                            <li class="list-group-item">Fotografi;</li>
                            <li class="list-group-item">Terjemahan, tafsir, saduran, bunga rampai, dan karya lain dari hasil pengalihwujudan.</li>
                        </ol>
                    </p>
                    <p>
                        <h5>Masa Pelindungan Ciptaan</h5>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Perlindungan Hak Cipta : Seumur Hidup Pencipta + 70 Tahun.</li>
                            <li class="list-group-item">Program Komputer : 50 tahun Sejak pertama kali dipublikasikan.</li>
                            <li class="list-group-item">Pelaku : 50 tahun sejak pertama kali di pertunjukkan.</li>
                            <li class="list-group-item">Produser Rekaman : 50 tahun sejak Ciptaan di fiksasikan.</li>
                            <li class="list-group-item">Lembaga Penyiaran : 20 tahun sejak pertama kali di siarkan.</li>
                        </ol>
                    </p>
                    <p>
                        <b>*Pembayaran dilakukan via transfer BNI 0388820578 an. Reza Andrea</b>
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    @endsection
