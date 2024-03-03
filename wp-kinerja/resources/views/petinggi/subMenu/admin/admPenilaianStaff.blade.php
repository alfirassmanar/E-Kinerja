<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/sneat/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>{{ $title }}</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" href="/sneat/assets/img/favicon/favicon.ico" /> --}}
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/sneat/assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="/sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/sneat/assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/sneat/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="/sneat/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/sneat/assets/js/config.js"></script>
  </head>

    <style>
        .form-group {
            position: relative;
        }

        .small-text {
            position: absolute;
            top: -15px; /* Sesuaikan jarak sesuai kebutuhan */
            left: 10px; /* Sesuaikan jarak sesuai kebutuhan */
            font-size: 0.875rem; /* Sesuaikan ukuran font sesuai kebutuhan */
            color: #6c757d; /* Sesuaikan warna sesuai kebutuhan */
            background-color: #fff; /* Sesuaikan warna latar sesuai kebutuhan */
            padding: 0 5px; /* Sesuaikan padding sesuai kebutuhan */
        }

    </style>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 300px;
            border-radius: 10px;
            /* overflow: hidden; */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.2s;
            cursor: pointer;
            margin-top: 50px;
            margin-left: 50px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-image {
            height: 150px;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-description span {
            display: block;
            margin-bottom: 10px;
        }

        .card-description span:first-child {
            color: #3498db;
            font-weight: bold;
        }
    </style>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 800px;
            margin: 50px auto;
        } */

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: -120px;
        }

        .card h2 {
            color: #333;
        }

        .card p {
            color: #666;
        }
    </style>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        {{-- Menu --}}
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <!-- Menu -->
              <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">

                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
                <h2 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">ClarTech_</h2>
              </div>

              <div class="menu-inner-shadow"></div>

              <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active">
                    <a href="{{ route('petinggi.superHome') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
  
                <!-- Layouts -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Pages</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings">Karyawan</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('petinggi.subMenu.admin.admStaff') }}" class="menu-link">
                                <div data-i18n="Account">Pekerja Staff</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('petinggi.subMenu.admin.admTugasStaff') }}" class="menu-link">
                                <div data-i18n="Notifications">Tugas Team</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('petinggi.subMenu.admin.admAbsensiStaff') }}" class="menu-link">
                                <div data-i18n="Connections">Absensi Karyawan</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                        <div data-i18n="Authentications">Laporan Karyawan</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('petinggi.subMenu.admin.admLaporanMingguan') }}" class="menu-link">
                                <div data-i18n="Basic">Laporan Mingguan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Basic">Laporan Bulanan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Basic">Laporan Tahunan & Stastistik</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                        <div data-i18n="Misc">Coming Soon</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="pages-misc-error.html" class="menu-link">
                                <div data-i18n="Error">Error</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="pages-misc-under-maintenance.html" class="menu-link">
                                <div data-i18n="Under Maintenance">Under Maintenance</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Components -->
                {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li> --}}
  
                <!-- Extended components -->
  
                <!-- Forms & Tables -->
                {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li> --}}
  
                <!-- Misc -->
                {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li> --}}
              </ul>
              <!-- / Menu -->

          </aside>
          {{-- End Menu --}}

        </aside>
        {{-- End Menu --}}
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                 
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="/sneat/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="/sneat/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Auth::user()->nama_pekerja }}</span>
                            <small class="text-muted">{{ Auth::user()->role }}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout_proses') }}">
                          <i class="bx bx-power-off me-2"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->

    {{-- Form Penilaian Menggunakan Checkbox --}}
        <div class="container">
            <form action="{{ route('proses_submit_admPenilaianMingguan') }}" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-6" style="margin-left: 150px;">
                    <div class="card" style="width: 350px;">
                        <a href="{{ route('petinggi.subMenu.admin.admLaporanMingguan') }}">
                            <i class="bx bx-arrow-back me-1">Kembali</i>
                        </a><br>
                        <h5 class="card-title">Form Identitas Karyawan</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="no_pekerja" value="{{ $user->no_pekerja }}" readonly>
                            </div><br/>
                            <div class="form-group">
                                <input type="text" class="form-control" name="role" value="{{ $user->role }}" hidden>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="small-text"><strong>Tanggal</strong></label>
                                <input type="text" class="form-control" name="tanggal_penilaian" value="{{ now()->toDateString() }}">
                            </div><br/>
                             <!-- Nama Pekerja -->
                            <div class="form-group">
                                <label for="nama_pekerja" class="small-text"><strong>Nama Pekerja</strong></label>
                                <input type="text" class="form-control" name="nama_pekerja" value="{{ $user->nama_pekerja }}">
                            </div>
                            <!-- Form group lainnya jika diperlukan -->
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6" style="margin-left: -150px;">
                    <div class="card" style="width: 630px;">
                        <h5 class="card-title">Form Penilaian Karyawan</h5>
                        <div class="form-group shadow p-3 mb-3 bg-white rounded overflow-auto" style="max-height: 300px;">
                            <i><p>Keaktifan :</p></i>
                            <p>1. Bagaimana ke aktifan karyawan dalam berkontribusi kepada tim kerja dan bagaimana karyawan menyikapi permasalahan yang ada di tim kerjanya</p>
                            <ul class="list-unstyled">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan1a" value="Baik" id="setuju1a">
                                        <label class="form-check-label" for="setuju1a">Baik</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan2a" value="Cukup Baik" id="setuju2a">
                                        <label class="form-check-label" for="setuju2a">Cukup Baik</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan3a" value="Telat" id="setuju3a">
                                        <label class="form-check-label" for="setuju3a">Telat</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan4a" value="Kurang" id="setuju4a">
                                        <label class="form-check-label" for="setuju4a">Kurang</label>
                                    </div>
                                </li><br/>
                                <!-- Pilihan lainnya -->
                                {{-- <p>2. Bagaimana ke aktifan karyawan dalam berkontribusi kepada rekan tim kerja yang berbeda divisi dan bagaimana karyawan menyikapi permasalahan nya dengan rekan tim kerja divisi lain</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan1b" id="setuju1b">
                                            <label class="form-check-label" for="setuju">Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan2b" id="setuju2b">
                                            <label class="form-check-label" for="setuju">Cukup Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan3b" id="setuju3b">
                                            <label class="form-check-label" for="setuju">Telat</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan4b" id="setuju4b">
                                            <label class="form-check-label" for="setuju">Kurang</label>
                                        </div>
                                    </li><br/>
                            </ul> --}}
                        </div>
                        <div class="form-group shadow p-3 mb-3 bg-white rounded overflow-auto" style="max-height: 300px;">
                            <i><p>Laporan Kerja :</p></i>
                            {{-- <p>1. Bagaimana keaktifan karyawan dalam pengumpulan laporan kerja mingguan dan seberapa sering revisi tugasnya</p>
                            <ul class="list-unstyled">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan1c" id="setuju">
                                        <label class="form-check-label" for="setuju">Baik</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan2c" id="setuju">
                                        <label class="form-check-label" for="setuju">Cukup Baik</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan3c" id="setuju">
                                        <label class="form-check-label" for="setuju">Telat</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan4c" id="setuju">
                                        <label class="form-check-label" for="setuju">Kurang</label>
                                    </div>
                                </li><br/> --}}
                                <!-- Pilihan lainnya -->
                                {{-- <p>2. Apakah karyawan sudah mengerjakan tugasnya dengan baik dan seberapa sering tidak mengumpulkan laporan mingguan</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan1d" id="setuju">
                                            <label class="form-check-label" for="setuju">Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan2d" id="setuju">
                                            <label class="form-check-label" for="setuju">Cukup Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan3d" id="setuju">
                                            <label class="form-check-label" for="setuju">Telat</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan4d" id="setuju">
                                            <label class="form-check-label" for="setuju">Kurang</label>
                                        </div>
                                    </li>
                            </ul> --}}
                        </div>
                        <button class="btn btn-primary" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
        </div>
        
          {{-- END Form --}}


        <!-- / Layout page -->
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


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

  
  </body>
</html>
