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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<style>
    html,
    body,
    .intro {
        height: 100%;
    }

    table td,
    table th {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    thead th {
        color: #fff;
    }

    .card {
        border-radius: .5rem;
    }

    .table-scroll {
        border-radius: .5rem;
    }

    .table-scroll table thead th {
        font-size: 1.25rem;
    }

    thead {
        top: 0;
        position: sticky;
    }
</style>

<style>
    /* CSS untuk modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        max-width: 400px;
        text-align: center;
    }

    /* CSS untuk tombol modal close */
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
</style>

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
                    <li>
                        <a href="{{ route('rekapPenilaian.rekapHome') }}">Rekap Hasil Penilaian
                            ( <span id="currentMonth"></span> )
                        </a>
                    </li>
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

                    <h2>Rekap Hasil Penilaian Kinerja</h2>
                    <p class="separator mb-2">
                        Dashboard Rekap Kinerja Karyawan, Staff dan Pekerja Lainnya. Harap diperhatikan sebelum Submit
                        atau
                        Kirim Tugas!
                    </p>

                    <!-- ======= Hero Section ======= -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <input type="text" class="form-control text-center mb-3" style="width: 100%;"
                                            value="{{ Auth::user()->no_pekerja }} - {{ Auth::user()->nama_pekerja }} ({{ Auth::user()->role }})"
                                            name="no_pekerja" disabled>
                                        {{-- Start Table --}}
                                        <section class="intro">
                                            <div class="bg-image h-100">
                                                <div class="mask d-flex align-items-center h-100">
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-body p-0">
                                                                        <div class="table-responsive table-scroll"
                                                                            data-mdb-perfect-scrollbar="true"
                                                                            style="position: relative; height: 350px">
                                                                            <table class="table table-striped mb-0">
                                                                                <thead
                                                                                    style="background-color: #002d72;">
                                                                                    <tr>
                                                                                        <th>No.</th>
                                                                                        <th>Tanggal</th>
                                                                                        <th>Masuk</th>
                                                                                        <th>Keluar</th>
                                                                                        <th>Jam Kerja</th>
                                                                                        <th>Foto Absensi</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    <?php
                                                                                    $nomor = 1;
                                                                                    ?>
                                                                                    @foreach ($RekapPenilaian as $item)
                                                                                        <tr>
                                                                                            <td>{{ $nomor++ }}.
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $item->tanggal_masuk }}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $item->jam_masuk }}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $item->jam_keluar }}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $item->waktu_kerja }}
                                                                                            </td>
                                                                                            <td>
                                                                                                <img src="{{ asset('storage/absensi/' . $item->foto_absensi) }}"
                                                                                                    alt="img"
                                                                                                    style="max-width: 100px;">

                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        {{-- End Table --}}
                                        @php
                                            $totalTugasSelesai = $RekapPenilaianLK->where('acc_tugas', 1)->count();
                                        @endphp

                                        <a href="#" id="downloadLink" style="color: #002d72;">
                                            <span>Download Kinerja</span>
                                        </a>
                                        <h4 class="mt-3" style="margin-left: 750px;">Total
                                            Tugas Selesai :
                                            ({{ $totalTugasSelesai }}) <a href="#" id="openModal">Klik</a>
                                        </h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Hero Section --}}
            </div>
    </section>
    <!-- End Team Section -->

    <!-- Modal -->
    <div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="bulanDropdown">Pilih Bulan:</label>
                    <select class="form-select" id="bulanDropdown">
                        <!-- Opsi bulan akan ditambahkan melalui JavaScript -->
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="downloadLaporan()">Download</button>
                </div>
            </div>
        </div>
    </div>

    {{-- End Modal --}}

    <!-- Modal Klik-->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            Laporan Bulan : <span>{{ \Carbon\Carbon::now()->format('F') }}</span>
            <hr />
            @foreach ($RekapPenilaianLK as $rekapPenilaian)
                @if (\Carbon\Carbon::parse($rekapPenilaian->tanggal_pengumpulan)->format('m') == '12')
                    <div class="btn {{ $rekapPenilaian->acc_tugas == 0 ? 'btn-danger' : 'btn-primary' }}">
                        {{ $rekapPenilaian->tugas_kerja }} / Revisi {{ $rekapPenilaian->tanggal_pengumpulan }}
                    </div>
                @endif
            @endforeach

        </div>
    </div>
    {{-- End Modal Klik --}}


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
    // JavaScript untuk menangani tautan dan modal
    const openModalLink = document.getElementById('openModal');
    const modal = document.getElementById('myModal');
    const closeModalBtn = document.getElementById('closeModal');

    openModalLink.addEventListener('click', () => {
        modal.style.display = 'flex';
    });

    closeModalBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Menutup modal jika area di luar modal diklik
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>

<script>
    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
        "November", "Desember"
    ];
    const currentDate = new Date();

    const currentMonth = months[currentDate.getMonth()];
    document.getElementById('currentMonth').textContent = currentMonth;
</script>

<script>
    document.getElementById('downloadLink').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('downloadModal'));
        myModal.show();
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var bulanDropdown = document.getElementById('bulanDropdown');

        var namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ];

        for (var i = 0; i < namaBulan.length; i++) {
            var option = document.createElement('option');
            option.value = i + 1;
            option.text = namaBulan[i];
            bulanDropdown.appendChild(option);
        }
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tambahkan opsi bulan ke dropdown saat halaman dimuat
        populateMonthOptions();

        // Panggil fungsi ini saat tombol "Download" ditekan
        window.downloadLaporan = function() {
            // Dapatkan nilai bulan dari dropdown
            var selectedMonth = document.getElementById('bulanDropdown').value;

            // Kirim permintaan download sesuai bulan
            window.location.href = '/download-laporan?bulan=' + selectedMonth;
        };

        function populateMonthOptions() {
            var bulanDropdown = document.getElementById('bulanDropdown');
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                'September', 'Oktober', 'November', 'Desember'
            ];

            for (var i = 0; i < months.length; i++) {
                var option = document.createElement('option');
                option.value = i + 1; // Nilai bulan dimulai dari 1 (Januari)
                option.text = months[i];
                bulanDropdown.add(option);
            }
        }
    });
</script>
