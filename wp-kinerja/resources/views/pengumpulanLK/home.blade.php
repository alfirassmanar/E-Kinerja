<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title }}</title>
    <meta content="" name="descr    iption">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="template/assets/img/favicon.png" rel="icon">
    <link href="template/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div id="logo">
                <h1><a href="{{ route('dashboard') }}"><span>e</span>Kinerja</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" title="" /></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('absensi.absen') }}">Absensi</a></li>
                    <li class="dropdown"><a href="#"><span>Penilaian Pekerja</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Pengumpulan Laporan Kerja</a></li>
                    </li>
                    <li><a href="#">Rekap Hasil Penilaian</a></li>
                    <li><a href="#">Laporan Harian Pekerja</a></li>
                </ul>
                </li>
                @if (auth()->check())
                    <li><a href="{{ route('logout_proses') }}">Logout</a></li>
                @else
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                @endif
                @if (auth()->check())
                    <li style="margin-left: 20px;">{{ Auth::user()->nama_pekerja }} ({{ Auth::user()->role }}) </li>
                @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="padd-section text-center" style="margin-top: 100px;">

        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="section-title text-center">

                    <h2>Pengumpulan Laporan Tugas Kerja</h2>
                    <p class="separator">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab reprehenderit error exercitationem
                        vero repellat blanditiis.
                    </p>
                    <input type="text" class="form-control text-center" placeholder="search"
                        style="width: 100%; margin-top: 50px;">
                </div>


                <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="team-block bottom">
                        <img src="assets/img/gambar1.jpg" class="img-responsive" alt="img"
                            style="margin-top: 50px;">
                        <div class="team-content">
                            @if (Auth::user()->role === 'admin')
                                <h5>Admin</h5>
                                <h4><a href="{{ route('pengumpulanLK.admin.admHome') }}">Masuk</a></h4>
                            @else
                                <h5 class="disabled">Admin</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-block bottom">
                        <img src="assets/img/gambar2.svg" class="img-responsive" alt="img">
                        <div class="team-content">
                            @if (Auth::user()->role === 'hrd')
                                <h5>HRD</h5>
                                <h4><a href="#">Masuk</a></h4>
                            @else
                                <h5 class="disabled">HRD</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="team-block bottom">
                        <img src="assets/img/gambar3.svg" class="img-responsive" alt="img" style="width: 70%;">
                        <div class="team-content">
                            @if (Auth::user()->role === 'staff marketing')
                                <h5>Staff Marketing</h5>
                                <h4><a href="{{ route('pengumpulanLK.marketing.markHome') }}">Masuk</a></h4>
                            @else
                                <h5 class="disabled">Staff Marketing</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="team-block bottom">
                        <img src="assets/img/gambar4.svg" class="img-responsive" alt="img"
                            style="margin-top: -20px;">
                        <div class="team-content">
                            @if (Auth::user()->role === 'staff pemasaran')
                                <h5>Staff Pemasaran</h5>
                                <h4><a href="{{ route('pengumpulanLK.pemasaran.pemaHome') }}">Masuk</a></h4>
                            @else
                                <h5 class="disabled">Staff Pemasaran</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="400"
                    style="margin-top: 25px;">
                    <div class="team-block bottom">
                        <img src="assets/img/gambar7.svg" class="img-responsive" alt="img"
                            style="margin-top: 20px; width: 70%;">
                        <div class="team-content">
                            @if (Auth::user()->role === 'staff inventory')
                                <h5>Staff Inventory</h5>
                                <h4><a href="{{ route('pengumpulanLK.inventory.invenHome') }}">Masuk</a></h4>
                            @else
                                <h5 class="disabled">Staff Inventory</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="400"
                    style="margin-top: 25px;">
                    <div class="team-block bottom">
                        <img src="assets/img/gambar6.svg" class="img-responsive" alt="img"
                            style="margin-top: 20px; width: 85%;">
                        <div class="team-content">
                            @if (Auth::user()->role === 'staff qc')
                                <h5>Staff Quality Control</h5>
                                <h4><a href="{{ route('pengumpulanLK.qualityControl.qcHome') }}">Masuk</a></h4>
                            @else
                                <h5 class="disabled">Staff Quality Control</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="400"
                    style="margin-top: 25px;">
                    <div class="team-block bottom">
                        <img src="assets/img/gambar8.svg" class="img-responsive" alt="img"
                            style="margin-top: -20px;">
                        <div class="team-content">
                            @if (Auth::user()->role === 'staff logistik')
                                <h5>Staff Logistik</h5>
                                <h4><a href="{{ route('pengumpulanLK.logistik.logHome') }}">Masuk</a></h4>
                            @else
                                <h5 class="disabled">Staff Logistik</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="400"
                    style="margin-top: 25px;">
                    <div class="team-block bottom">
                        <img src="assets/img/gambar5.svg" class="img-responsive" alt="img"
                            style="margin-top: 20px; width: 80%;">
                        <div class="team-content">
                            @if (Auth::user()->role === 'staff checker')
                                <h5>Checker</h5>
                                <h4><a href="{{ route('pengumpulanLK.checker.checHome') }}">Masuk</a></h4>
                            @else
                                <h5 class="disabled">Checker</h5>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Team Section -->


    <main id="main">
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End  Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>

@if ($message = Session::get('success-checkout'))
    <script>
        Swal.fire({
            icon: 'success',
            // title: 'Email atau Password anda Salah!',
            text: '{{ $message }}',
        })
    </script>
@endif

@if ($message = Session::get('success-checkin'))
    <script>
        Swal.fire({
            icon: 'success',
            // title: 'Email atau Password anda Salah!',
            text: '{{ $message }}',
        })
    </script>
@endif
