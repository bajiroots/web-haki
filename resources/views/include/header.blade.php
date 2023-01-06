<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>WEB HAKI</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('welcome') }}" class="active">Beranda</a></li>
                <li><a href="{{ route('penelusuran') }}">Penelusuran</a></li>
                <li><a href="{{ route('unduhan') }}">Unduhan</a></li>
                <li class="dropdown"><a href="#"><span>Tentang</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{ route('about') }}">Kekayaan Intelektual</a></li>
                    </ul>
                </li>
                <!-- <li><a href="contact.html">Contact</a></li> -->
                <li><a class="get-a-quote" href="{{ route('login') }}">Login</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<!-- End Header -->
