<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Absensi Dashboard</title>
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
                    <li><a class="nav-link scrollto" href="#">Absensi</a></li>
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
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="/absensi/absen" method="POST" id="inputForm">
                            @csrf
                            <div class="mb-3">
                                <label for="no_pekerja" class="form-label">Nomor Pekerja</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->no_pekerja }}"
                                    name="no_pekerja" readonly required>
                            </div>
                            <div class="container-button">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Start Tables --}}
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Laporan Absensi</h4>
                            <hr />
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No. </th>
                                        <th scope="col">Nama </th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Keluar</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="dataBody">
                                    @if ($dataAbsensi->isEmpty())
                                        <tr>
                                            <td colspan="6">Tidak ada data absensi</td>
                                        </tr>
                                    @else
                                        @php
                                            $absensiHariIni = 0;
                                        @endphp
                                        @foreach ($dataAbsensi as $absensi)
                                            @if ($absensi->tanggal_masuk == date('Y-m-d'))
                                                @php
                                                    $absensiHariIni++;
                                                @endphp
                                            @endif
                                            <tr>
                                                <td>{{ $absensi->nama_pekerja }}</td>
                                                <td>{{ $absensi->tanggal_masuk }}</td>
                                                {{-- <td>
                                                <img src="{{ asset('storage/absensi/' . $absensi->foto_absensi) }}" alt="img" style="max-width: 100px;">
                                            </td> --}}
                                                <td>{{ $absensi->jam_masuk }}</td>
                                                <td>{{ $absensi->jam_keluar }}</td>
                                                <td>{{ $absensi->waktu_kerja }}</td>
                                            </tr>
                                        @endforeach

                                        @if ($absensiHariIni >= 7)
                                            @php
                                                $absensiHariIni = 0;
                                            @endphp
                                        @endif
                                    @endif



                                </tbody>
                            </table>

                            {{-- Pagination --}}
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            {{-- End Pagination --}}
                        </div>
                    </div>
                </div>
                {{-- End Tables --}}

            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('absensi.checkin') }}" method="POST" enctype="multipart/form-data"
                            id="checkinForm">
                            @csrf
                            @if (isset($dataPekerja))
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control"
                                        value="{{ $dataPekerja['nama_pekerja'] }}" name="nama_pekerja" disabled>
                                    <input type="text" class="form-control"
                                        value="{{ $dataPekerja['nama_pekerja'] }}" name="nama_pekerja" hidden>
                                </div>
                                <input type="text" class="form-control" value="{{ Auth::user()->no_pekerja }}"
                                    name="no_pekerja" readonly hidden>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Status</label>
                                    <input type="text" class="form-control" id="role"
                                        value="{{ $dataPekerja['role'] }}" disabled>
                                    <input type="text" class="form-control" value="{{ $dataPekerja['role'] }}"
                                        name="role" hidden>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="posisi" class="form-label">Upload Foto</label>
                                    <input type="file" class="form-control" name="foto_absensi" required>
                                </div> --}}
                                <div class="mb-3">
                                    <a href="#" class="btn btn-primary" onclick="bukaKamera()">Buka Kamera</a>
                                    <a href="#" class="btn btn-warning" onclick="ambilFoto()">Potret</a>

                                    <video id="video" class="mt-2" autoplay muted
                                        style="max-width: 450px; height: 200px; display: none; justify-content: center; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);"></video>
                                    <canvas id="canvas" style="display:none;"></canvas>
                                    <br>
                                    <img id="tampilFoto" class="mt-2" src="#" alt="img"
                                        style="max-width: 265px; height: 200px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);"
                                        name="foto_absensi">

                                </div>
                                <a id="unduhFoto" download="karyawan.jpg">
                                    <button type="button" class="mt-1
                                    ">Unduh
                                        Foto</button>
                                </a>
                                <div class="mb-3 mt-3">
                                    <label for="posisi" class="form-label">Upload Foto</label>
                                    <input type="file" class="form-control" name="foto_absensi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal_masuk"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="jam" class="form-label">Jam</label>
                                    <input type="time" class="form-control" id="jam" name="jam_masuk"
                                        readonly>
                                </div>
                                @if ($checkinDone)
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#checkoutModal" id="getDataBtn">Checkout</button>
                                @else
                                    <button type="submit" class="btn btn-success">Checkin</button>
                                @endif
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Checkout -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Anda
                        sudah Bekerja hari ini, istirahat lah dan kembali bekerja besok</span>
                    @if (isset($absensi))
                        @if ($absensi->jam_keluar === null)
                            <form action="{{ route('process.update', $absensi->id_absensi) }}" method="POST">
                                @csrf
                                <input type="time" class="form-control" id="time" name="jam_keluar"
                                    readonly>
                                <input type="text" class="form-control" hidden name="no_pekerja"
                                    value="{{ $absensi->no_pekerja }}" required>
                                <input type="text" class="form-control" hidden name="nama_pekerja"
                                    value="{{ $absensi->nama_pekerja }}" required>
                                <input type="text" class="form-control" hidden name="tanggal_masuk"
                                    value="{{ $absensi->tanggal_masuk }}" required>
                                <input type="text" class="form-control" hidden name="foto_absensi"
                                    value="{{ $absensi->foto_absensi }}" required>
                                <input type="text" class="form-control" hidden name="jam_masuk"
                                    value="{{ $absensi->jam_masuk }}" required>
                                <button type="submit" class="btn btn-sm btn-danger mt-2">Checkout</button>
                            </form>
                        @endif
                    @else
                        <form action="{{ route('process.update', 0) }}" method="POST">
                            @csrf
                            <input type="time" class="form-control" id="time" name="jam_keluar" readonly>
                            <input type="text" class="form-control" hidden name="no_pekerja" value=""
                                required>
                            <input type="text" class="form-control" hidden name="nama_pekerja" value=""
                                required>
                            <input type="text" class="form-control" hidden name="tanggal_masuk" value=""
                                required>
                            <input type="text" class="form-control" hidden name="foto_absensi" value=""
                                required>
                            <input type="text" class="form-control" hidden name="jam_masuk" value=""
                                required>
                            <input type="text" class="form-control" hidden name="waktu_kerja" value=""
                                required>
                            <button type="submit" class="btn btn-sm btn-danger mt-2">Checkout</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
    {{-- END MODAL CHECKOUT --}}
    <!-- End Hero Section -->
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

<script>
    let videoStream;
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');

    function bukaKamera() {
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function(stream) {
                videoStream = stream;
                video.srcObject = stream;
                document.getElementById('video').style.display = 'block'; // Tampilkan elemen video
            })
            .catch(function(err) {
                console.log('Tidak dapat mengakses kamera: ', err);
                document.getElementById('video').style.display = 'none'; // Sembunyikan elemen video
                document.getElementById('canvas').style.display = 'none'; // Sembunyikan elemen canvas
            });
    }

    function getFormattedDateTime() {
        let now = new Date();
        let options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        return now.toLocaleDateString('en-US', options);
    }

    function ambilFoto() {
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        let fotoDataUrl = canvas.toDataURL('image/png');
        let imgElement = document.getElementById('tampilFoto');
        imgElement.src = fotoDataUrl;
        let unduhLink = document.getElementById('unduhFoto');
        unduhLink.href = fotoDataUrl; // Set link unduhan ke data URL gambar
        if (videoStream) {
            videoStream.getTracks().forEach(track => track.stop());
            document.getElementById('video').style.display = 'none'; // Sembunyikan elemen video
            document.getElementById('canvas').style.display = 'none'; // Sembunyikan elemen canvas
        }
    }

    // Selalu pastikan untuk menghentikan akses ke kamera ketika halaman ditutup atau navigasi
    window.addEventListener('beforeunload', function() {
        if (videoStream) {
            videoStream.getTracks().forEach(track => track.stop());
        }
    });
</script>

<script>
    document.getElementById('ambilFoto').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function() {
            var imgElement = document.getElementById('tampilFoto');
            imgElement.src = reader.result;
        }

        reader.readAsDataURL(file);
    });
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
    function updateTime() {
        let now = new Date();
        let hours = now.getHours().toString().padStart(2, '0');
        let minutes = now.getMinutes().toString().padStart(2, '0');
        let seconds = now.getSeconds().toString().padStart(2, '0');
        let formattedTime = `${hours}:${minutes}:${seconds}`;

        document.getElementById('time').value = formattedTime;
    }

    setInterval(updateTime, 1000);
</script>

<script>
    document.getElementById('scanOption').addEventListener('change', function() {
        var selectedOption = this.value;

        if (selectedOption === 'camera') {
            document.getElementById('qrCodeScanner').style.display = 'block';
            document.getElementById('qrCodeUploader').style.display = 'none';

            startCameraScan();
        } else if (selectedOption === 'upload') {
            document.getElementById('qrCodeScanner').style.display = 'none';
            document.getElementById('qrCodeUploader').style.display = 'block';

            // Tambahkan event listener untuk memproses gambar yang diunggah
            document.getElementById('qrCodeFileInput').addEventListener('change', handleUploadedImage);
        }
    });

    function checkCameraAvailability() {
        // Memeriksa apakah browser mendukung navigator.mediaDevices
        if (navigator.mediaDevices && navigator.mediaDevices.enumerateDevices) {
            navigator.mediaDevices.enumerateDevices()
                .then(function(devices) {
                    var cameras = devices.filter(function(device) {
                        return device.kind === 'videoinput';
                    });

                    if (cameras.length > 0) {
                        // Ada setidaknya satu kamera yang tersedia
                        startCameraScan();
                    } else {
                        console.error('Tidak ada kamera yang ditemukan');
                    }
                })
                .catch(function(err) {
                    console.error('Kesalahan saat memeriksa kamera:', err);
                });
        } else {
            console.error('Navigator.mediaDevices tidak didukung di browser ini');
        }
    }

    function handleUploadedImage(event) {
        var file = event.target.files[0];
        var scanResult = document.getElementById('scanResult');
        var reader = new FileReader();

        reader.onload = function() {
            var img = new Image();
            img.onload = function() {
                scanResult.innerHTML = 'Gambar diunggah berhasil. Silakan periksa hasil scan.';
            }
            img.src = reader.result;
        }

        reader.readAsDataURL(file);
    }
</script>

<script>
    let timerInterval;
    let startTime = null;
    let workingTime = 0;

    document.getElementById('checkinBtn').addEventListener('click', function() {
        startTime = new Date();
        timerInterval = setInterval(updateTimer, 1000);
    });

    document.getElementById('checkoutBtn').addEventListener('click', function() {
        if (startTime !== null) {
            clearInterval(timerInterval);
            workingTime += (new Date() - startTime);
            updateTimer();
            startTime = null;
        }
    });

    function updateTimer() {
        let currentTime = new Date();
        let elapsedTime = workingTime + (startTime !== null ? (currentTime - startTime) : 0);

        let hours = Math.floor(elapsedTime / (1000 * 60 * 60));
        let minutes = Math.floor((elapsedTime % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((elapsedTime % (1000 * 60)) / 1000);

        let formattedTime = hours.toString().padStart(2, '0') + ':' +
            minutes.toString().padStart(2, '0') + ':' +
            seconds.toString().padStart(2, '0');

        document.getElementById('waktu_kerja').value = formattedTime;

        // Simpan waktu di Local Storage setiap kali diperbarui
        localStorage.setItem('workingTime', workingTime.toString());
    }

    // Memuat waktu dari Local Storage saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        const storedWorkingTime = localStorage.getItem('workingTime');
        if (storedWorkingTime !== null) {
            workingTime = parseInt(storedWorkingTime);
            updateTimer(); // Perbarui timer dengan waktu yang disimpan
        }
    });

    // Tambahkan event listener untuk logout
    document.getElementById('logoutBtn').addEventListener('click', function() {
        clearInterval(timerInterval);
        startTime = null;
    });
</script>

<script>
    document.getElementById('getLocationBtn').addEventListener('click', function() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                let latitude = position.coords.latitude;
                let longitude = position.coords.longitude;

                // Menggunakan API Google Maps Geocoding
                let apiKey = 'YOUR_API_KEY'; // Ganti dengan API key Anda
                let apiUrl =
                    `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${apiKey}`;

                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        let formattedAddress = data.results[0].formatted_address;

                        // Menampilkan hasil di form control
                        document.getElementById('lokasi').value = formattedAddress;
                    })
                    .catch(error => console.error('Error:', error));
            });
        } else {
            alert("Geolocation tidak didukung oleh browser ini.");
        }
    });
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
    // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
    let today = new Date().toISOString().split('T')[0];

    // Atur nilai default pada input date
    document.getElementById('tanggal').value = today;
</script>

<script>
    // Fungsi untuk mengatur nomor otomatis
    function setAutomaticNumber() {
        let table = document.querySelector('table');
        let rows = table.querySelectorAll('tbody tr');

        rows.forEach(function(row, index) {
            let numberCell = row.querySelector('#nomor');
            numberCell.textContent = index + 1;
        });
    }

    // Panggil fungsi saat halaman dimuat
    window.onload = setAutomaticNumber;
</script>

<script>
    document.getElementById('submitButton').addEventListener('click', function() {
        var noPekerja = document.getElementById('no_pekerja').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/input', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.setRequestHeader('X-CSRF-Token', '{{ csrf_token() }}');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                // Sukses
                var dataPekerja = JSON.parse(xhr.responseText);
                // Lakukan sesuatu dengan dataPekerja (jika diperlukan)
            } else {
                // Terjadi kesalahan
            }
        };
        xhr.onerror = function() {
            // Terjadi kesalahan koneksi
        };
        xhr.send('no_pekerja=' + encodeURIComponent(noPekerja));
    });
</script>
