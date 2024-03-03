<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- Core CSS -->
    <link rel="stylesheet" href="/sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/sneat/assets/css/demo.css" />
</head>

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat');

    * {
        box-sizing: border-box;
    }

    body {
        background-color: #28223F;
        font-family: Montserrat, sans-serif;

        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

        min-height: 100vh;
        margin: 0;
    }

    h3 {
        margin: 10px 0;
    }

    h6 {
        margin: 5px 0;
        text-transform: uppercase;
    }

    p {
        font-size: 14px;
        line-height: 21px;
    }

    .card-container {
        background-color: #231E39;
        border-radius: 5px;
        box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.75);
        color: #B3B8CD;
        padding-top: 30px;
        position: relative;
        width: 350px;
        max-width: 100%;
        text-align: center;
    }

    .card-container .pro {
        color: #231E39;
        background-color: #FEBB0B;
        border-radius: 3px;
        font-size: 14px;
        font-weight: bold;
        padding: 3px 7px;
        position: absolute;
        top: 30px;
        left: 30px;
    }

    .card-container .round {
        border: 1px solid #03BFCB;
        border-radius: 50%;
        padding: 7px;
    }

    button.primary {
        background-color: #03BFCB;
        border: 1px solid #03BFCB;
        border-radius: 3px;
        color: #231E39;
        font-family: Montserrat, sans-serif;
        font-weight: 500;
        padding: 10px 25px;
    }

    button.primary.ghost {
        background-color: transparent;
        color: #02899C;
    }

    .skills {
        background-color: #1F1A36;
        text-align: left;
        padding: 15px;
        margin-top: 30px;
    }

    .skills ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .skills ul li {
        border: 1px solid #2D2747;
        border-radius: 2px;
        display: inline-block;
        font-size: 12px;
        margin: 0 7px 7px 0;
        padding: 7px;
    }

    footer {
        background-color: #222;
        color: #fff;
        font-size: 14px;
        bottom: 0;
        position: fixed;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 999;
    }

    footer p {
        margin: 10px 0;
    }

    footer i {
        color: red;
    }

    footer a {
        color: #3c97bf;
        text-decoration: none;
    }
</style>

<style>
    .form-group {
        position: relative;
    }

    .small-text {
        position: absolute;
        top: -15px;
        /* Sesuaikan jarak sesuai kebutuhan */
        left: 10px;
        /* Sesuaikan jarak sesuai kebutuhan */
        font-size: 0.875rem;
        /* Sesuaikan ukuran font sesuai kebutuhan */
        color: #6c757d;
        /* Sesuaikan warna sesuai kebutuhan */
        background-color: #fff;
        /* Sesuaikan warna latar sesuai kebutuhan */
        padding: 0 5px;
        /* Sesuaikan padding sesuai kebutuhan */
    }
</style>

<body>
    <div class="card-container mb-4">
        <span class="pro">Clar.Tech_</span>
        <img class="round" src="/sneat/assets/img/avatars/5.png" alt="user" />
        <h3>{{ Auth::user()->nama_pekerja }}</h3>
        <h6>{{ Auth::user()->no_pekerja }}</h6>
        <p>{{ Auth::user()->alamat_pekerja }}</p>
        <div class="container">
            <div class="row">
                <div class="col">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ Auth::user()->id }}">
                        <button type="button" class="primary"
                            style="margin-top: -8px; margin-left: 15px;">Update</button>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <button type="button" class="primary ghost" style="margin-left: -50px;">Dashboard</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="skills">
            <h6>Skills</h6>
            <ul>
                <li>{{ Auth::user()->pendidikan }}</li>
                <li>{{ Auth::user()->jobdesk_pekerja }}</li>
                <li>{{ Auth::user()->role }}</li>
                <li>{{ Auth::user()->email }}</li>
            </ul>
        </div>
    </div>

    <div class="modal fade" id="editModal{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Update Staff</h5> --}}
                </div>
                <form action="{{ route('updateMyProfile', ['id' => Auth::user()->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="small-text"><strong>Nama Pekerja</strong></label>
                            <input type="text" class="form-control" name="nama_pekerja"
                                value="{{ Auth::user()->nama_pekerja }}" required>
                        </div><br>

                        <div class="form-group">
                            <label for="" class="small-text"><strong>Email</strong></label>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                required>
                        </div><br>

                        <div class="form-group">
                            <label for="" class="small-text"><strong>Password</strong></label>
                            <input type="text" class="form-control" name="password"
                                value="{{ Auth::user()->password }}" required>
                        </div><br>

                        <div class="form-group">
                            <label for="" class="small-text"><strong>Alamat</strong></label>
                            <input type="text" class="form-control" name="alamat_pekerja"
                                value="{{ Auth::user()->alamat_pekerja }}" required>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Design <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://www.instagram.com/clar.tech_/">Clar.tech_</a>
            - Pesan Pembuatan Website
            <a target="_blank" href="https://wa.me/+6282331016638">klik</a>
            - Design pro by
            <a target="_blank" href="https://www.instagram.com/clar.tech_/">Clar.tech_</a>
        </p>
    </footer>
</body>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="/sneat/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/sneat/assets/vendor/libs/popper/popper.js"></script>
<script src="/sneat/assets/vendor/js/bootstrap.js"></script>
<script src="/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="/sneat/assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<script src="/sneat/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="/sneat/assets/js/main.js"></script>
<script src="/sneat/assets/js/dashboards-analytics.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
    // Menangkap klik tombol Edit
    $('.edit-btn').on('click', function() {
        var userId = $(this).data('id');

        // Isi input hidden dengan ID pengguna
        $('#user_id').val(userId);

        // Gantilah dengan cara yang sesuai untuk mengisi formulir modal dengan data pengguna
        // Contoh: $('#editModal input[name="nama_pekerja"]').val('data yang diambil dari database');

        // Tampilkan modal
        $('#editModal').modal('show');
    });
</script>

</html>
