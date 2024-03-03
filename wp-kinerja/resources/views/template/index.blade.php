<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>wp-Kinerja</title>
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
                    @if (auth()->check())
                        <li><a class="nav-link scrollto" href="{{ route('absensi.absen') }}">Absensi</a></li>
                        {{-- <li><a class="nav-link scrollto" href="#features">Features</a></li>
                    <li><a class="nav-link scrollto" href="#screenshots">Screenshots</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> --}}
                        <li class="dropdown"><a href="#"><span>Penilaian Pekerja</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('pengumpulanLK.home') }}">Pengumpulan Laporan Kerja</a></li>
                                {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a> --}}
                                {{-- <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul> --}}
                        </li>
                        <li><a href="{{ route('rekapPenilaian.rekapHome') }}">Rekap Hasil Penilaian</a></li>
                        <li><a href="#">Laporan Harian Pekerja</a></li>

                </ul>
                @endif
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

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="fade-in">
            <h1>Selamat Datang ke eKinerja</h1>
            <h2>Halaman proses kinerja karyawan &amp;<a href="#"> selengkapnya...</a> </h2>
            <img src="assets/img/hero-img.png" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
            <a href="#" class="btn-get-started scrollto" data-bs-toggle="modal"
                data-bs-target="#barcodeModal">Scan
                Barcode</a>
            {{-- <div class="btns">
                <a href="#"><i class="fa fa-apple fa-3x"></i> App Store</a>
                <a href="#"><i class="fa fa-play fa-3x"></i> Google Play</a>
                <a href="#"><i class="fa fa-windows fa-3x"></i> windows</a>
            </div> --}}
        </div>
    </section><!-- End Hero Section -->

    <!-- Modal Barcode -->
    <div class="modal fade" id="barcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Barcode Scanner</h5>
                </div>
                <div class="modal-body">
                    {{-- <img id="barcodeImage" src="storage/barcode/BarcodeHome.svg" alt="Barcode"> --}}
                    <img src="assets/img/barcode/BarcodeHome.svg" alt="Barcode"
                        style="width: 300px; display: block; margin: 0 auto;">

                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Barcode --}}

    <main id="main">

        <!-- ======= Get Started Section ======= -->
        {{-- <section id="get-started" class="padd-section text-center">
            <div class="container" data-aos="fade-up">
                @yield('get-started')
            </div>
        </section> --}}
        <!-- End Get Started Section -->

        <!-- ======= About Us Section ======= -->
        <!-- End About Us Section -->

        <!-- ======= Features Section ======= -->
        @if (auth()->check())
            <section id="features" class="padd-section text-center">
                <div class="container" data-aos="fade-up">
                    @yield('features')
                </div>
            </section>
        @endif
        <!-- End Features Section -->

        <!-- ======= Screenshots Section ======= -->
        <!-- End Screenshots Section -->

        <!-- ======= Team Section ======= -->
        <!-- End Team Section -->

    </main><!-- End #main -->

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

<script>
    document.getElementById('logoutBtn').addEventListener('click', function() {
        clearInterval(timerInterval);
        startTime = null;
    });
</script>

<script>
    $(document).ready(function() {
        // Daftar barcode yang berbeda
        var barcodes = [
            'BarcodeHome.svg',
            // 'barcode2.jpg',
            // 'barcode3.jpg'
            // Tambahkan barcode lainnya di sini
        ];

        var barcodeIndex = 0;

        // Fungsi untuk mengubah gambar barcode
        function changeBarcode() {
            $('#barcodeImage').attr('src', 'storage/app/barcode/' + barcodes[barcodeIndex]);
            barcodeIndex = (barcodeIndex + 1) % barcodes.length; // Loop ke barcode pertama setelah selesai
        }

        // Panggil fungsi untuk pertama kalinya
        changeBarcode();

        // Set interval untuk mengubah gambar barcode setiap 20 detik
        setInterval(changeBarcode, 20000);
    });
</script>
