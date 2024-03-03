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
                    <p class="separator mb-2">
                        Dashboard pengumpulan tugas, Staff dan Pekerja Lainnya. Harap diperhatikan sebelum Submit atau
                        Kirim Tugas!
                    </p>

                    <!-- ======= Hero Section ======= -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <form action="{{ route('qualityControl.proses_inputLK_Qc') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control text-center"
                                                        style="width: 100%;" value="{{ Auth::user()->no_pekerja }}"
                                                        name="no_pekerja" readonly>
                                                    <input type="text" value="{{ Auth::user()->role }}"
                                                        name="role" hidden>
                                                    <input type="date" id="tanggal" name="tanggal_pengumpulan"
                                                        hidden>
                                                    <input type="time" class="form-control" id="jam"
                                                        name="waktu_pengumpulan" readonly hidden>

                                                </div>
                                                <div class="col">
                                                    <select class="form-select" aria-label="Select option"
                                                        name="kategori">
                                                        <option selected>Pilih Kategori</option>
                                                        @if ($kategori->isEmpty())
                                                            <tr>
                                                                <td colspan="6">Tidak ada data Kategori</td>
                                                            </tr>
                                                        @else
                                                            @foreach ($kategori as $rowKat)
                                                                <option value="{{ $rowKat->no_kategori }}">
                                                                    {{ $rowKat->nama_kategori }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <input type="text" class="form-control" name="kategori_laporan"
                                                    hidden>

                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        value="{{ Auth::user()->nama_pekerja }}" name="nama_pekerja"
                                                        readonly required>
                                                </div>
                                                <div class="col">
                                                    <input type="file" class="form-control" name="tugas_kerja"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mt-3 d-flex align-items-center">
                                                @php
                                                    $lastSubmission = $dataTugas->sortByDesc('tanggal_pengumpulan')->first();
                                                @endphp

                                                @if ($dataTugas->isEmpty())
                                                    <button type="submit" class="btn btn-success">Kirim</button>
                                                @else
                                                    @if ($lastSubmission->acc_tugas == null || $lastSubmission->acc_tugas == 0)
                                                        <button type="button" class="btn btn-danger"
                                                            id="kirimButton">Kirim</button>
                                                    @else
                                                        <button type="submit" class="btn btn-success">Kirim</button>
                                                    @endif
                                                @endif

                                                <div class="ms-3">
                                                    <a href="#" id="docxLink">
                                                        <img src="assets/img/docx.png" alt="img"
                                                            style="width: 25px;">
                                                    </a>
                                                </div>
                                                <div class="ms-3">
                                                    <a href="#" id="excelLink">
                                                        <img src="assets/img/excel.png" alt="img"
                                                            style="width: 25px;">
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Hero Section --}}

                <!-- ======= Hero Section 2 ======= -->
                <div class="container" style="margin-top: -65px; margin-bottom: -50px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Data Tugas Submit</h4>
                                    <hr>
                                    {{-- Start Table --}}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">No Pekerja</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Tugas</th>
                                                <th scope="col">Waktu Pengumpulan</th>
                                                <th scope="col">Revisi</th>
                                                {{-- <th scope="col">Acc</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody id="dataBody">
                                            @if ($dataTugas->isEmpty())
                                                <tr>
                                                    <td colspan="6">Tidak ada data absensi</td>
                                                </tr>
                                            @else
                                                @foreach ($dataTugas as $tugas)
                                                    <tr>
                                                        <td>{{ $tugas->no_pekerja }}</td>
                                                        <td>{{ $tugas->kategori_laporan }}</td>
                                                        <td>
                                                            <a href="{{ url('/download-tugas-qc/' . $tugas->id_lk) }}"
                                                                style="color: rgb(77, 131, 247)">
                                                                {{ $tugas->tugas_kerja }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $tugas->tanggal_pengumpulan }}</td>

                                                        @if ($tugas->acc_tugas == 0)
                                                            <td>
                                                                <a type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editModal{{ $tugas->id_lk }}">
                                                                    <img src="assets/img/remove.png" width="20"
                                                                        alt="">
                                                                </a>
                                                                <!-- Button trigger modal -->
                                                                {{-- <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModal{{ $tugas->id_lk }}">
                                                                    x
                                                                </button> --}}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <img src="assets/img/checklist.png" width="20"
                                                                    alt="">
                                                            </td>
                                                        @endif

                                                        {{-- <td>{{ $tugas->acc_tugas }}</td> --}}
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                    {{-- End Table --}}
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


    {{-- Modal Revisi --}}
    @foreach ($dataTugas as $tugas)
        <div class="modal fade" id="editModal{{ $tugas->id_lk }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Revisi Tugas</h5>
                    </div>
                    <form action="{{ route('proses_edit_tugas_qc', ['id_lk' => $tugas->id_lk]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" class="form-control" name="tugas_kerja" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- End Modal Revisi --}}

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

@if ($message = Session::get('success-upload-tugas'))
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

<script>
    document.querySelector('select[name="kategori"]').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var kategoriLaporanInput = document.querySelector('input[name="kategori_laporan"]');
        kategoriLaporanInput.value = selectedOption.text;
    });
</script>

<script>
    // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
    let today = new Date().toISOString().split('T')[0];

    // Atur nilai default pada input date
    document.getElementById('tanggal').value = today;
</script>

<script>
    function updateTime() {
        let now = new Date();
        let hours = now.getHours().toString().padStart(2, '0');
        let minutes = now.getMinutes().toString().padStart(2, '0');
        let seconds = now.getSeconds().toString().padStart(2, '0');
        let formattedTime = `${hours}:${minutes}:${seconds}`;

        document.getElementById('jam').value = formattedTime;
    }

    setInterval(updateTime, 1000);
</script>

<script>
    // JavaScript untuk menambahkan nomor urut
    var table = document.getElementById('dataBody');
    var rows = table.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var cell = document.createElement('td');
        cell.appendChild(document.createTextNode(i + 1));
        rows[i].insertBefore(cell, rows[i].firstChild);
    }
</script>

<script>
    document.getElementById('docxLink').addEventListener('click', function() {
        window.location.href = '/download-docx-qc';
    });

    document.getElementById('excelLink').addEventListener('click', function() {
        window.location.href = '/download-excel-qc';
    });
</script>

<script>
    document.getElementById('kirimButton').addEventListener('click', function() {
        alert('Selesaikan atau Revisi Tugas Sebelumnya!');
    });
</script>
