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
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item active">
                  <a href="{{ route('petinggi.subMenu.hrd.hrdHome') }}" class="menu-link">
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
                          <a href="{{ route('petinggi.subMenu.hrd.hrdStaff') }}" class="menu-link">
                              <div data-i18n="Account">Menu Pegawai</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="pages-account-settings-notifications.html" class="menu-link">
                              <div data-i18n="Notifications">Coming Soon</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="pages-account-settings-connections.html" class="menu-link">
                              <div data-i18n="Connections">Coming Soon</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                      <div data-i18n="Authentications">Authentications</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item">
                          <a href="auth-login-basic.html" class="menu-link" target="_blank">
                              <div data-i18n="Basic">Login</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="auth-register-basic.html" class="menu-link" target="_blank">
                              <div data-i18n="Basic">Register</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                              <div data-i18n="Basic">Forgot Password</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                      <div data-i18n="Misc">Misc</div>
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

           <!-- Horizontal -->
           <div class="container mt-5">
           <div class="row mb-2">
             <div class="col-md">
               <div class="card mb-3">
                 <div class="row g-0">
                   <div class="col-md-4">
                     <img class="card-img card-img-left" src="/assets/img/gambar1.jpg" alt="Card image" style="margin-top: 30px;"/>
                   </div>
                   <div class="col-md-8">
                     <div class="card-body">
                       <h5 class="card-title">Staff Admin</h5>
                       <p class="card-text" hidden>
                         This is a wider card with supporting text below as a natural lead-in to additional content.
                         This content is a little bit longer.
                       </p>
                       <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                       <a href="#">
                        <button class="btn btn-primary">Masuk</button>
                       </a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md">
               <div class="card mb-3">
                 <div class="row g-0">
                   <div class="col-md-8">
                     <div class="card-body">
                       <h5 class="card-title">Staff Marketing</h5>
                       <p class="card-text" hidden>
                         This is a wider card with supporting text below as a natural lead-in to additional content.
                         This content is a little bit longer.
                       </p>
                       <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                       <a href="#">
                        <button class="btn btn-primary">Masuk</button>
                       </a>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <img class="card-img card-img-right" src="/assets/img/gambar2.svg" alt="Card image" style="margin-top: 15px; margin-left: -20px;"/>
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <div class="row mb-2">
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="/assets/img/gambar5.svg" alt="Card image" style="margin-top: 30px; width: 75%;"/>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Staff Qc</h5>
                      <p class="card-text" hidden>
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <a href="#">
                       <button class="btn btn-primary">Masuk</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Staff Logistik</h5>
                      <p class="card-text" hidden>
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <a href="#">
                       <button class="btn btn-primary">Masuk</button>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <img class="card-img card-img-right" src="/assets/img/gambar6.svg" alt="Card image" style="margin-top: 15px; margin-left: -20px;"/>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="/assets/img/gambar7.svg" alt="Card image" style="margin-top: 30px; width: 75%; margin-left: 10px;"/>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Staff Checker</h5>
                      <p class="card-text" hidden>
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <a href="#">
                       <button class="btn btn-primary">Masuk</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Coming Soon</h5>
                      <p class="card-text" hidden>
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                      <p class="card-text"><small class="text-muted">Disabled</small></p>
                      <a href="{{ route('petinggi.subMenu.hrd.controlAllStaff') }}">
                        <p>Masuk</p>
                       {{-- <button class="btn btn-outline-primary">Masuk</button> --}}
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    {{-- <img class="card-img card-img-right" src="/assets/img/gambar8.svg" alt="Card image" style="margin-left: -20px;"/> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>

           <div class="row mb-3">
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="/assets/img/gambar3.svg" alt="Card image" style="margin-top: 10px; width: 80%; margin-left: 20px;"/>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Staff Pemasaran</h5>
                      <p class="card-text" hidden>
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <a href="#">
                       <button class="btn btn-primary">Masuk</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Staff Inventory</h5>
                      <p class="card-text" hidden>
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <a href="#">
                       <button class="btn btn-primary">Masuk</button>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <img class="card-img card-img-right" src="/assets/img/gambar4.svg" alt="Card image" style="margin-left: -20px; width: 90%;"/>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          
          </div>
           <!--/ Horizontal -->

           
          
        <!-- / Layout page -->
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <script src="/sneat/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/sneat/assets/vendor/libs/popper/popper.js"></script>
    <script src="/sneat/assets/vendor/js/bootstrap.js"></script>
    <script src="/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/sneat/assets/vendor/js/menu.js"></script>
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
  
  </body>
</html>
