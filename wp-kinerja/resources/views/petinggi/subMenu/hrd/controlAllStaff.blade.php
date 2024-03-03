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
                        id="searchInput"
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
                      <a class="dropdown-item" href="{{ route('myProfile') }}">
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
          
          {{-- Tables Karyawan --}}
          <div class="card mt-4 mb-4" style="width: 95%; margin-left: 26px;">
            <h5 class="card-header bg-primary text-white">Data Tabel Staff</h5>
            <div class="table-responsive text-nowrap">
              <div id="usersContainer">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No Pekerja</th>
                            <th style="text-align:center;">Nama</th>
                            <th style="text-align:center;">Pendidikan</th>
                            <th style="text-align:center;">Role</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
<tr>
                                <td colspan="6" class="text-center">Tidak ada data absensi</td>
                            </tr>
@else
@foreach ($users as $user)
<tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->no_pekerja }}</strong></td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="{{ $user->nama_pekerja }}"
                                            >
                                                <img src="/sneat/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                {{-- <img src="{{ asset('storage/fotoUsers/' . $user->foto_user) }}" alt="img" class="rounded-circle" /> --}}
                                            </li>
                                        </ul>
                                    </td>
                                    <td>{{ $user->pendidikan }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        @if ($user->status == 1)
<span class="badge bg-success">Aktif</span>
@else
<span class="badge bg-danger">Non Aktif</span>
@endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-dark p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                </a>
                                                <a href="{{ route('deleteHrd', ['id' => $user->id]) }}" class="btn btn-transparent" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </a>
                                                <form id="delete-form-{{ $user->id }}" action="{{ route('deleteStaff', ['id' => $user->id]) }}" method="post" style="display: none;">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
@endforeach
@endif
                    </tbody>
                </table>
              </div>
                 <!-- Pagination Links -->
                 <div class="mt-3" style="margin-left: 15px;">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
          {{-- End tables Karyawan --}}

        <!-- / Layout page -->
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @foreach ($users as $tugas)
<div class="modal fade" id="editModal{{ $tugas->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Staff</h5>
                        </div>
                        <form action="{{ route('proses_edit_hrd', ['id' => $tugas->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                <label for="" class="small-text"><strong>No Pekerja</strong></label>
                                <input type="text" class="form-control" name="no_pekerja" value="{{ $tugas->no_pekerja }}" required>
                                </div><br>

                                <div class="form-group">
                                <label for="" class="small-text"><strong>Nama Pekerja</strong></label>
                                    <input type="text" class="form-control" name="nama_pekerja" value="{{ $tugas->nama_pekerja }}" required>
                                </div><br>

                                <div class="form-group">
                                <label for="" class="small-text"><strong>Email</strong></label>
                                    <input type="email" class="form-control" name="email" value="{{ $tugas->email }}" required>
                                </div><br>

                                <div class="form-group">
                                <label for="" class="small-text"><strong>Password</strong></label>
                                    <input type="text" class="form-control" name="password"  value="{{ $tugas->password }}" required>
                                </div><br>

                                <div class="form-group">
                                <label for="" class="small-text"><strong>Foto</strong></label>
                                    <input type="file" class="form-control" name="foto_user">
                                    <input type="text" class="form-control" value="{{ $tugas->foto_user }}">
                                </div><br>

                                <div class="form-group">
                                <label for="" class="small-text"><strong>Alamat</strong></label>
                                    <input type="text" class="form-control" name="alamat_pekerja" value="{{ $tugas->alamat_pekerja }}" required>
                                </div><br>

                                <div class="form-group">
                                <label for="" class="small-text"><strong>Jobdesk</strong></label>
                                    <input type="text" class="form-control" name="jobdesk_pekerja" value="{{ $tugas->jobdesk_pekerja }}">
                                </div><br>

                                <div class="form-group">
                                <label for="" class="small-text"><strong>Role</strong></label>
                                 <select class="form-control" name="role" id="roleDropdown">
                                  <option value="">Pilih</option>
                                  @foreach ($roles as $rowRole)
<option value="{{ $rowRole->nama_role }}" {{ $user->role == $rowRole->nama_role ? 'selected' : '' }}>
                                          {{ $rowRole->nama_role }}
                                      </option>
@endforeach
                              </select>
                              <input type="text" class="form-control" name="role" id="roleInput" value="{{ $tugas->role }}">
                              </div><br>

                            <div class="form-group">
                                <label for="" class="small-text"><strong>Status</strong></label>
                                <input type="text" class="form-control" name="status" value="{{ $tugas->status }}">
                            </div><br>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endforeach

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

    <script>
        $(document).ready(function() {
            $('select[name="role"]').on('change', function() {
                var selectedRole = $(this).val();
                $('input[name="role"]').val(selectedRole);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Add an input event listener to the search input
            $('#searchInput').on('input', function() {
                var searchText = $(this).val().toLowerCase();

                // Loop through each row in the table
                $('#usersContainer tbody tr').each(function() {
                    var rowData = $(this).text().toLowerCase();

                    // Show or hide the row based on the search text
                    $(this).toggle(rowData.includes(searchText));
                });
            });
        });
    </script>

  
  </body>
</html>
