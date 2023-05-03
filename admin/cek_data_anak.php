<?php
  if (!isset($_GET['nomor_kartu_keluarga'])) {
    $nomor_kartu_keluarga = $_GET['nomor_kartu_keluarga'];
    $query_keluarga = mysqli_query($koneksi, "SELECT * FROM keluarga WHERE nomor_kartu_keluarga = '$nomor_kartu_keluarga'");
    $data_keluarga = mysqli_fetch_array($query_keluarga);
  }
  include_once "modul/koneksi.php";
  include_once "modul/fungsi_umum.php";
?>

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="enable">
  <head>
    <meta charset="utf-8" />
    <?php
      if ($_GET['halaman'] == "dasbor") {
        echo '<title>Dasbor | Admin ePOSYANDU</title>';
      }
    ?>
    <base href="<?php echo $alamat_website.'admin/'; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Aplikasi Posyandu Berbasis Website" name="description" />
    <meta content="Masgi" name="author" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <!-- Begin page -->
    <div id="layout-wrapper">
      <header id="page-topbar">
        <div class="layout-width">
          <div class="navbar-header">
            <div class="d-flex">
              <!-- Logo -->
              <div class="navbar-brand-box horizontal-logo">
                <a href="index.php" class="logo logo-dark">
                  <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="Logo" height="22">
                  </span>
                  <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="Logo" height="17">
                  </span>
                </a>
                <a href="index.php" class="logo logo-light">
                  <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="Logo" height="22">
                  </span>
                  <span class="logo-lg">
                    <img src="assets/images/logo-light.png" alt="Logo" height="17">
                  </span>
                </a>
              </div>
              <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                <span class="hamburger-icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
              </button>
              <!-- Search -->
              <form method="post" class="app-search d-none d-md-block">
                <div class="position-relative">
                  <input type="text" class="form-control" placeholder="Pencarian" autocomplete="off" id="search-options" value="">
                  <span class="mdi mdi-magnify search-widget-icon"></span>
                  <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                </div>
                <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                  <div data-simplebar style="max-height: 320px;">
                    <!-- item-->
                    <div class="dropdown-header">
                      <h6 class="text-overflow text-muted mb-0 text-uppercase">Pencarian Terakhir</h6>
                    </div>

                    <div class="dropdown-item bg-transparent text-wrap">
                      <div class="row g-2">
                        <?php
                          $query_riwayat_pencarian = mysqli_query($koneksi, "SELECT * FROM riwayat_pencarian ORDER BY id_riwayat_pencarian DESC LIMIT 10");
                          while ($data_riwayat_pencarian = mysqli_fetch_array($query_riwayat_pencarian)) {
                            $id_riwayat_pencarian = $data_riwayat_pencarian['id_riwayat_pencarian'];
                            $judul_riwayat_pencarian = $data_riwayat_pencarian['judul_riwayat_pencarian'];
                            echo '
                              <div class="col-auto">
                                <a href="hasil_pencarian.php?text='.$judul_riwayat_pencarian.'" class="btn btn-soft-primary btn-sm btn-rounded px-3">'.$judul_riwayat_pencarian.'<i class="mdi mdi-magnify ms-1"></i></a>
                              </div>
                            ';
                          }
                        ?>
                      </div>
                    </div>
                    <!-- item-->
                    <div class="dropdown-header mt-2">
                      <h6 class="text-overflow text-muted mb-1 text-uppercase">Menu</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                      <span>Analytics Dashboard</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                      <span>Help Center</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                      <span>My account settings</span>
                    </a>

                    <!-- item-->
                    <div class="dropdown-header mt-2">
                      <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                    </div>

                    <div class="notification-list">
                      <!-- item -->
                      <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                        <div class="d-flex">
                          <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                          <div class="flex-1">
                            <h6 class="m-0">Angela Bernier</h6>
                            <span class="fs-11 mb-0 text-muted">Manager</span>
                          </div>
                        </div>
                      </a>
                      <!-- item -->
                      <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                        <div class="d-flex">
                          <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                          <div class="flex-1">
                            <h6 class="m-0">David Grasso</h6>
                            <span class="fs-11 mb-0 text-muted">Web Designer</span>
                          </div>
                        </div>
                      </a>
                      <!-- item -->
                      <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                        <div class="d-flex">
                          <img src="assets/images/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                          <div class="flex-1">
                            <h6 class="m-0">Mike Bunch</h6>
                            <span class="fs-11 mb-0 text-muted">React Developer</span>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>

                  <div class="p-3">
                    <button type="submit" name="pencarian" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center ms-auto">
                      Tampilkan Semuanya
                      <i class="ri-arrow-right-line ms-2"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <div class="d-flex align-items-center">

              <div class="dropdown d-md-none topbar-head-dropdown header-item">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown-mobile" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-search fs-22"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown-mobile">
                  <form method="post" class="app-search p-3">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Pencarian" autocomplete="off" id="search-options-mobile" value="">
                      <span class="mdi mdi-magnify search-widget-icon"></span>
                      <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options-mobile"></span>
                    </div>
                    <div class="dropdown-menu mt-5" id="search-dropdown-mobile" style="width: calc(100% - 2rem);">
                      <div data-simplebar style="max-height: 320px;">
                        <!-- item-->
                        <div class="dropdown-header">
                          <h6 class="text-overflow text-muted mb-0 text-uppercase">Pencarian Terakhir</h6>
                        </div>

                        <div class="dropdown-item bg-transparent text-wrap">
                          <div class="row g-2">
                            <?php
                              $query_riwayat_pencarian = mysqli_query($koneksi, "SELECT * FROM riwayat_pencarian ORDER BY id_riwayat_pencarian DESC LIMIT 10");
                              while ($data_riwayat_pencarian = mysqli_fetch_array($query_riwayat_pencarian)) {
                                $id_riwayat_pencarian = $data_riwayat_pencarian['id_riwayat_pencarian'];
                                $judul_riwayat_pencarian = $data_riwayat_pencarian['judul_riwayat_pencarian'];
                                echo '
                                  <div class="col-auto">
                                    <a href="hasil_pencarian.php?text='.$judul_riwayat_pencarian.'" class="btn btn-soft-primary btn-sm btn-rounded px-3">'.$judul_riwayat_pencarian.'<i class="mdi mdi-magnify ms-1"></i></a>
                                  </div>
                                ';
                              }
                            ?>
                          </div>
                        </div>
                        <!-- item-->
                        <div class="dropdown-header mt-2">
                          <h6 class="text-overflow text-muted mb-1 text-uppercase">Menu</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                          <span>Analytics Dashboard</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                          <span>Help Center</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                          <span>My account settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header mt-2">
                          <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                        </div>

                        <div class="notification-list">
                          <!-- item -->
                          <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                            <div class="d-flex">
                              <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                              <div class="flex-1">
                                <h6 class="m-0">Angela Bernier</h6>
                                <span class="fs-11 mb-0 text-muted">Manager</span>
                              </div>
                            </div>
                          </a>
                          <!-- item -->
                          <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                            <div class="d-flex">
                              <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                              <div class="flex-1">
                                <h6 class="m-0">David Grasso</h6>
                                <span class="fs-11 mb-0 text-muted">Web Designer</span>
                              </div>
                            </div>
                          </a>
                          <!-- item -->
                          <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                            <div class="d-flex">
                              <img src="assets/images/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                              <div class="flex-1">
                                <h6 class="m-0">Mike Bunch</h6>
                                <span class="fs-11 mb-0 text-muted">React Developer</span>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>

                      <div class="p-3">
                        <button type="submit" name="pencarian" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center ms-auto">
                          Tampilkan Semuanya
                          <i class="ri-arrow-right-line ms-2"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="ms-1 header-item d-none d-sm-flex">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                  <i class='bx bx-fullscreen fs-22'></i>
                </button>
              </div>

              <div class="ms-1 header-item d-none d-sm-flex">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                  <i class='bx bx-moon fs-22'></i>
                </button>
              </div>

              <div class="dropdown ms-sm-3 header-item topbar-user">
                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="d-flex align-items-center">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="text-start ms-xl-2">
                      <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Anna Adame</span>
                      <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                    </span>
                  </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <h6 class="dropdown-header">Welcome Anna!</h6>
                  <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                  <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                  <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                  <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
                  <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-soft-success text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                  <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                  <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Logout</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- ========== App Menu ========== -->
      <?php
        include_once "modul/menu.php";
      ?>
      <!-- Left Sidebar End -->
      <!-- Vertical Overlay-->
      <div class="vertical-overlay"></div>

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">

        <div class="page-content">
          <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
              <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Starter</h4>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                      <li class="breadcrumb-item active">Starter</li>
                    </ol>
                  </div>

                </div>
              </div>
            </div>
            <!-- end page title -->

          </div>
          <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                Versi : 2.0 - <?php echo date("Y").' &copy; <a href="https://idmasgi.com/" target="_blank">idmasgi.com</a>'; ?>
              </div>
              <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                  Dikembangkan oleh : <a href="https://instagram.com/id.masgi" target="_blank">Masgi</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
      <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
    <!--preloader-->
    <div id="preloader">
      <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>
    <?php
      include_once "modul/pengaturan_tema.php";
    ?>
    <!-- JQuery 3.6.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <!-- Toastify -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Choices -->
    <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- Flatpickr -->
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <!-- Page JS -->
  </body>
</html>