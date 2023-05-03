<?php
  session_start();
	include_once "modul/koneksi.php";
	include_once "modul/fungsi_umum.php";
  include_once "modul/query_pengaturan.php";
  if (isset($_SESSION['id_akun'])) {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'admin/");
      </script>
    ';
  } else if (isset($_POST['masuk'])) {
    $nama_pengguna_akun = addslashes($_POST['nama_pengguna_akun']);
    $kata_sandi_akun = addslashes($_POST['kata_sandi_akun']);
    if (preg_match('/^[a-zA-Z0-9]+$/', $nama_pengguna_akun)) {
      $query_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
      $cek_akun = mysqli_num_rows($query_akun);
      if ($cek_akun > 0) {
        $data_akun = mysqli_fetch_array($query_akun);
        $id_akun = $data_akun['id_akun'];
        $status_akun = $data_akun['status_akun'];
        if ($status_akun == "Aktif") {
          $_SESSION['id_akun'] = $id_akun;
          echo '
            <script>
              window.location.replace("'.$alamat_website.'admin/");
            </script>
          ';
        } else {
          echo '
            <script>
              alert("Akun anda tidak aktif silahkan hubungi admin!");
              window.location.replace("'.$alamat_website.'admin/admin");
            </script>
          ';
        }
      } else {
        echo '
          <script>
            alert("Akun tidak ditemukan, periksa lagi!");
            window.location.replace("'.$alamat_website.'admin/masuk");
          </script>
        ';
      }
    } else {
      echo '
        <script>
          alert("Akun tidak ditemukan, periksa lagi!");
          window.location.replace("'.$alamat_website.'admin/masuk");
        </script>
      ';
    }
  }
?>

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
  <head>
    <meta charset="utf-8" />
    <title>Admin Panel - <?php echo $isi1_judul_website; ?></title>
    <base href="<?php echo $alamat_website.'admin/'; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Aplikasi Posyandu Berbasis Website" name="description" />
    <meta content="andini" name="author" />
    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/<?php echo $isi1_favicon; ?>">
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
    <div class="auth-page-wrapper pt-5">
      <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>
        <div class="shape">
          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
            <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
          </svg>
        </div>
      </div>
      <div class="auth-page-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-center mt-sm-5 mb-4 text-white-50">
                <div>
                  <a href="index.html" class="d-inline-block auth-logo">
                    <img src="assets/images/<?php echo $isi1_logo_admin_light; ?>" alt="Logo Admin" height="20">
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
              <div class="card mt-4">
                <div class="card-body p-4">
                  <div class="text-center mt-2">
                    <h5 class="text-primary">Halo, <?php echo ucapan(); ?></h5>
                    <p class="text-muted">Silahkan masuk untuk memulai sesi anda.</p>
                  </div>
                  <div class="p-2 mt-4">
                    <form method="post">
                      <div class="mb-3">
                        <label class="form-label">Nama Pengguna</label>
                        <input type="text" name="nama_pengguna_akun" class="form-control" placeholder="Masukkan Nama Pengguna Anda" autocomplete="off" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="password-input">Kata Sandi</label>
                        <div class="position-relative auth-pass-inputgroup mb-3">
                          <input type="password" name="kata_sandi_akun" class="form-control pe-5 password-input" placeholder="Masukkan Kata Sandi Anda" id="password-input" autocomplete="off" required>
                          <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        </div>
                      </div>
                      <div class="mt-4">
                        <button type="submit" name="masuk" class="btn btn-primary w-100">Masuk</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-center">
                <p class="mb-0 text-muted">
                  <?php echo date("Y"); ?> &copy; <a href="<?php echo $alamat_website; ?>"><?php echo $isi1_judul_website; ?></a> - Dikembangkan oleh : <a href="https://induk138.com/" target="_blank">Andini</a> - Versi : 2.0
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
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
    <!-- particles js -->
    <script src="assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="assets/js/pages/password-addon.init.js"></script>
    <!-- Page JS -->
  </body>
</html>