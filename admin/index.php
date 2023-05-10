<?php
  session_start();
  include_once "modul/koneksi.php";
  include_once "modul/fungsi_umum.php";
  include_once "modul/query_pengaturan.php";
  if (isset($_GET['halaman'])) {
    $halaman_aktif = $_GET['halaman'];
  } else {
    echo '<script>window.location.replace("'.$alamat_website.'admin/dasbor");</script>';
  }
  if (isset($_SESSION['id_akun'])) {
    $id_akun_masuk = $_SESSION['id_akun'];
    $query_akun_masuk = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$id_akun_masuk'");
    $data_akun_masuk = mysqli_fetch_array($query_akun_masuk);
    $nama_lengkap_akun_masuk = $data_akun_masuk['nama_lengkap_akun'];
    $nama_pengguna_akun_masuk = $data_akun_masuk['nama_pengguna_akun'];
    $kata_sandi_akun_masuk = $data_akun_masuk['kata_sandi_akun'];
    $email_akun_masuk = $data_akun_masuk['email_akun'];
    $telepon_akun_masuk = $data_akun_masuk['telepon_akun'];
    $whatsapp_akun_masuk = $data_akun_masuk['whatsapp_akun'];
    $kode_referensi_akun_masuk = $data_akun_masuk['kode_referensi_akun'];
    $level_akun_masuk = $data_akun_masuk['level_akun'];
    $status_akun_masuk = $data_akun_masuk['status_akun'];
    if ($level_akun_masuk != "Admin") {
      echo '<script>window.location.replace("'.$alamat_website.'");</script>';
    }
  } else {
    echo '<script>window.location.replace("'.$alamat_website.'admin/masuk");</script>';
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
    <meta content="Andini" name="author" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/<?php echo $isi1_favicon; ?>">
    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Sweetalert -->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.1/css/fixedColumns.dataTables.min.css">
    <!-- Summernote CSS -->
    <link rel="stylesheet" href="assets/libs/summernote/summernote-bs4.css">
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
                <a href="<?php echo $alamat_website.'admin/dasbor'; ?>" class="logo logo-dark">
                  <span class="logo-sm">
                    <img src="assets/images/<?php echo $isi1_logo_admin_sm; ?>" alt="Logo" height="22">
                  </span>
                  <span class="logo-lg">
                    <img src="assets/images/<?php echo $isi1_logo_admin_dark; ?>" alt="Logo" height="17">
                  </span>
                </a>
                <a href="<?php echo $alamat_website.'admin/dasbor'; ?>" class="logo logo-light">
                  <span class="logo-sm">
                    <img src="assets/images/<?php echo $isi1_logo_admin_sm; ?>" alt="Logo" height="22">
                  </span>
                  <span class="logo-lg">
                    <img src="assets/images/<?php echo $isi1_logo_admin_light; ?>" alt="Logo" height="17">
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
            </div>
            <div class="d-flex align-items-center">
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
                    <img class="rounded-circle header-profile-user" src="assets/images/<?php echo $isi1_logo_admin_sm; ?>" alt="Header Avatar">
                    <span class="text-start ms-xl-2">
                      <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $nama_lengkap_akun_masuk; ?></span>
                      <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?php echo $level_akun_masuk; ?></span>
                    </span>
                  </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="pages-profile.html">
                    <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                    <span class="align-middle">Profil</span>
                  </a>
                  <a class="dropdown-item" href="#keluar" data-bs-toggle="modal">
                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                    <span class="align-middle">Keluar</span>
                  </a>
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
            <?php
              if ($halaman_aktif == "dasbor") {
                include_once "dasbor.php";
              } else if ($halaman_aktif == "anggota") {
                include_once "anggota.php";
              } else if ($halaman_aktif == "loan") {
                include_once "loan.php";
              } else if ($halaman_aktif == "deposit") {
                include_once "deposit.php";
              } else if ($halaman_aktif == "games") {
                include_once "games.php";
              } else if ($halaman_aktif == "promosi") {
                include_once "promosi.php";
              } else if ($halaman_aktif == "bank") {
                include_once "bank.php";
              } else if ($halaman_aktif == "rekening") {
                include_once "rekening.php";
              } else if ($halaman_aktif == "rekening_admin") {
                include_once "rekening_admin.php";
              } else if ($halaman_aktif == "rekening_anggota") {
                include_once "rekening_anggota.php";
              } else if ($halaman_aktif == "profil") {
                include_once "profil.php";
              } else if ($halaman_aktif == "pengaturan") {
                include_once "pengaturan.php";
              }
            ?>
            <!-- end page title -->

          </div>
          <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                Versi : 2.0 - <?php echo date("Y").' &copy; <a href="'.$alamat_website.'">'.$isi1_judul_website.'</a>'; ?>
              </div>
              <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                  Dikembangkan oleh : <a href="https://induk138.com/" target="_blank">Andini</a>
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
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top" style="bottom: 50px!important;">
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
    <div id="keluar" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Keluar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
          </div>
          <div class="modal-body">
            <span class="text-muted">Yakin ingin <span class="fw-bold text-danger">keluar</span>?</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="d-flex justify-content-center align-items-center btn btn-light" data-bs-dismiss="modal">
              <i class="ri-close-fill fw-bold me-1"></i>
              Batal
            </button>
            <a href="<?php echo $alamat_website.'admin/keluar.php'; ?>" class="d-flex justify-content-center align-items-center btn btn-danger">
              <i class="ri-check-fill fw-bold me-1"></i>
              Yakin
            </a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
    <!-- ChartJS -->
    <script src="assets/libs/chart.js/chart.min.js"></script>
    <!-- Sweetalert -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Datatables -->
    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
    <!-- Summernote JS -->
    <script src="assets/libs/summernote/summernote-bs4.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <!-- Page JS -->
    <?php
      if (isset($_GET['halaman'])) {
    ?>
    <script>
      $(document).ready(function () {
        $("#<?php echo $halaman_aktif; ?>").addClass("active");
        // Datatables
        $('#datatables').DataTable({
          scrollX: true,
          ordering: false,
          fixedColumns: {
            left: 0,
            right: 1
          },
        });
        // Summernote
        $('.summernote').summernote();
        // Live Time
        setInterval (function (){
          $("#waktu_sekarang").load(location.href + " #waktu_sekarang");
        }, 1000);
        // Tombol Generate Random String
        $(".tombol-random-string-10").click(function() {
          var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
          var randomString = "";
          for (var i = 0; i < 10; i++) {
            randomString += characters.charAt(Math.floor(Math.random() * characters.length));
          }
          $(".hasil-random-string-10").val(randomString);
        });
        // Huruf besar di awal kata
        function hurufBesarAwalKata(str) {
          return str.toLowerCase().replace(/\b(\w)/g, function(txt) {
            return txt.toUpperCase();
          });
        }
        $(".huruf-besar-awal-kata").keyup(function() {
          $(this).val(hurufBesarAwalKata($(this).val()));
        });
        // Hanya angka
        $(".hanya-angka").on("input", function() {
          this.value = this.value.replace(/[^0-9]/g, '');
        });
      });
    </script>
    <?php
        if ($halaman_aktif == "dasbor") {
    ?>
    <script>
      $(document).ready(function () {
        // Hanya Angka
        $("#input-tahun").on("input", function() {
          var inputValue = $(this).val();
          this.value = this.value.replace(/[^0-9]/g, '');
          if (inputValue > 4) {
            $(this).val(inputValue.substring(0, 4));
          }
        });
        // ChartJS
        <?php
          if (isset($_GET['bulan_ini']) || isset($_GET['tahun_ini'])) {
        ?>
        var date = new Date(),
          currentMonth = <?php echo $_GET['bulan_ini']; ?>,
          currentYear = <?php echo $_GET['tahun_ini']; ?>,
          daysInMonth = new Date(currentYear, currentMonth+1, 0).getDate();
        <?php
          } else {
        ?>
        var date = new Date(),
          currentMonth = date.getMonth(),
          currentYear = date.getFullYear(),
          daysInMonth = new Date(currentYear, currentMonth+1, 0).getDate();
        <?php
          }
        ?>

        var dateArray = [];
        for (var i = 1; i <= daysInMonth; i++) {
          var currentDate = new Date(currentYear, currentMonth, i);
          dateArray.push(currentDate.getDate());
        }
        var ctx = document.getElementById('chart_pengunjung').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: dateArray,
            datasets: [{
              label: 'Jumlah',
              data: [
                <?php
                  if (isset($_GET['bulan_ini']) || isset($_GET['tahun_ini'])) {
                    $bulan_ini = $_GET['bulan_ini'];
                    $tahun_ini = $_GET['tahun_ini'];
                  } else {
                    $bulan_ini = date("n");
                    $tahun_ini = date("Y");
                  }

                  $numOfDays = date("t");  // Mendapatkan jumlah hari dalam bulan ini
                  for ($i = 1; $i <= $numOfDays; $i++) {
                    $pengunjung = mysqli_query($koneksi, "SELECT *,COUNT(tanggal_pengunjung) AS total_tanggal_pengunjung FROM pengunjung WHERE tanggal_pengunjung = '$i' AND bulan_pengunjung = '$bulan_ini' AND tahun_pengunjung = '$tahun_ini'");
                    $data_pengunjung = mysqli_fetch_array($pengunjung);
                    $total_tanggal_pengunjung = $data_pengunjung['total_tanggal_pengunjung'];
                    if ($i == $numOfDays) {
                      echo $total_tanggal_pengunjung;
                    } else {
                      echo $total_tanggal_pengunjung.',';
                    }
                  }
                ?>
              ],
              backgroundColor: 'rgba(64, 81, 137, 0.2)',
              borderColor: 'rgba(64, 81, 137, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      });
    </script>
    <?php
          if (isset($_POST['filter_pengunjung'])) {
            $bulan_pengunjung = $_POST['bulan_pengunjung'];
            $tahun_pengunjung = $_POST['tahun_pengunjung'];
            $filter_pengunjung = mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE bulan_pengunjung = '$bulan_pengunjung' AND tahun_pengunjung = '$tahun_pengunjung'");
            $cek_pengunjung = mysqli_num_rows($filter_pengunjung);
            if ($cek_pengunjung > 0) {
              echo '<script>window.location.replace("'.$alamat_website.'admin/dasbor/filter/'.$bulan_pengunjung.'/'.$tahun_pengunjung.'");</script>';
            } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Data pengunjung <span class="fw-bold text-primary"><?php echo bulanIni($bulan_pengunjung).' '.$tahun_pengunjung; ?></span> tidak ada!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.replace("<?php echo $alamat_website; ?>admin/dasbor");
          }
        });
      });
    </script>
    <?php
            }
          }
        } else if ($halaman_aktif == "anggota") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE level_akun = 'Anggota'");
          while ($data_anggota = mysqli_fetch_array($anggota)) {
            $id_anggota = $data_anggota['id_akun'];
        ?>
        $("#ubah_data_<?php echo $id_anggota; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_anggota; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    <?php
          if (isset($_POST['tambah_data'])) {
            $nama_lengkap_anggota = $_POST['nama_lengkap_anggota'];
            $nama_pengguna_anggota = $_POST['nama_pengguna_anggota'];
            $kata_sandi_anggota = $_POST['kata_sandi_anggota'];
            $whatsapp_anggota = $_POST['whatsapp_anggota'];
            $nomor_rekening_anggota = $_POST['nomor_rekening_anggota'];
            $nama_rekening_anggota = $_POST['nama_rekening_anggota'];
            $jenis_rekening_anggota = $_POST['jenis_rekening_anggota'];
            $cek_nama_pengguna_anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_anggota'");
            $jumlah_nama_pengguna_anggota = mysqli_num_rows($cek_nama_pengguna_anggota);
            if ($jumlah_nama_pengguna_anggota > 0) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Nama Pengguna <span class="fw-bold text-primary"><?php echo $nama_pengguna_anggota; ?></span> sudah ada, gunakan Nama Pengguna lainnya!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.replace("<?php echo $alamat_website; ?>admin/anggota");
          }
        });
      });
    </script>
    <?php
            } else {
              $tambah_data = mysqli_query($koneksi, "INSERT INTO akun (nama_lengkap_akun, nama_pengguna_akun, kata_sandi_akun, telepon_akun, whatsapp_akun) VALUES ('$nama_lengkap_anggota', '$nama_pengguna_anggota', '$kata_sandi_anggota', '$whatsapp_anggota', '$whatsapp_anggota')");
              if ($tambah_data) {
                $akun_baru = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_anggota'");
                $data_akun_baru = mysqli_fetch_array($akun_baru);
                $id_akun_baru = $data_akun_baru['id_akun'];
                $tambah_saldo = mysqli_query($koneksi, "INSERT INTO saldo (id_akun_saldo, total_saldo) VALUES ('$id_akun_baru', '0')");
                if ($tambah_saldo) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil tambah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/anggota");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$tambah_saldo."<br>".mysqli_error($koneksi);
                }
              } else {
                echo "Proses Gagal<br>Error : ".$tambah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['ubah_data'])) {
            $id_anggota = $_POST['id_anggota'];
            $nama_lengkap_anggota = $_POST['nama_lengkap_anggota'];
            $nama_pengguna_anggota = $_POST['nama_pengguna_anggota'];
            $kata_sandi_anggota = $_POST['kata_sandi_anggota'];
            $whatsapp_anggota = $_POST['whatsapp_anggota'];
            $nomor_rekening_anggota = $_POST['nomor_rekening_anggota'];
            $nama_rekening_anggota = $_POST['nama_rekening_anggota'];
            $jenis_rekening_anggota = $_POST['jenis_rekening_anggota'];
            $total_saldo = $_POST['total_saldo'];
            $status_anggota = $_POST['status_anggota'];
            $cek_nama_pengguna_anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE NOT id_akun = '$id_anggota' AND nama_pengguna_akun = '$nama_pengguna_anggota'");
            $jumlah_nama_pengguna_anggota = mysqli_num_rows($cek_nama_pengguna_anggota);
            if ($jumlah_nama_pengguna_anggota > 0) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Nama Pengguna <span class="fw-bold text-primary"><?php echo $nama_pengguna_anggota; ?></span> sudah ada, gunakan Nama Pengguna lainnya!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.replace("<?php echo $alamat_website; ?>admin/anggota");
          }
        });
      });
    </script>
    <?php
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE akun SET nama_lengkap_akun = '$nama_lengkap_anggota', nama_pengguna_akun = '$nama_pengguna_anggota', kata_sandi_akun = '$kata_sandi_anggota', telepon_akun = '$whatsapp_anggota', whatsapp_akun = '$whatsapp_anggota', status_akun = '$status_anggota' WHERE id_akun = '$id_anggota'");
              if ($ubah_data) {
                $ubah_rekening = mysqli_query($koneksi, "UPDATE rekening_anggota SET jenis_rekening_anggota = '$jenis_rekening_anggota', nama_rekening_anggota = '$nama_rekening_anggota', nomor_rekening_anggota = '$nomor_rekening_anggota' WHERE id_akun_rekening_anggota = '$id_anggota'");
                if ($ubah_rekening) {
                  $ubah_saldo = mysqli_query($koneksi, "UPDATE saldo SET total_saldo = '$total_saldo' WHERE id_akun_saldo = '$id_anggota'");
                  if ($ubah_saldo) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/anggota");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_saldo."<br>".mysqli_error($koneksi);
                  }
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_rekening."<br>".mysqli_error($koneksi);
                }
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_anggota = $_POST['id_anggota'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM akun WHERE id_akun = '$id_anggota'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/anggota");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "loan") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $loan = mysqli_query($koneksi, "SELECT * FROM loan_applications ");
          while ($data_loan = mysqli_fetch_array($loan)) {
            $id_loan = $data_loan['id'];
        ?>
        $("#ubah_data_<?php echo $id_loan; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_loan; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    
    <?php
      if (isset($_POST['ubah_data'])) {
            $id_loan = $_POST['id'];
            $nama = $_POST['nama'];
            $loan_amount = $_POST['loan_amount'];
            $phone_number = $_POST['phone_number'];
            $card_number = $_POST['card_number'];
            $created_by_id = $_POST['created_by_id'];
            
            $cek_nama_pengguna_anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$created_by_id' ");
            $jumlah_nama_pengguna_anggota = mysqli_num_rows($cek_nama_pengguna_anggota);
            if ($jumlah_nama_pengguna_anggota > 0) {
              $ubah_saldo = mysqli_query($koneksi, "UPDATE saldo SET total_saldo = '$loan_amount' WHERE id_akun_saldo = '$created_by_id'");
                if ($ubah_saldo) {
    ?>
    
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil disetujui, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/anggota");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_saldo."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_loan = $_POST['id_loan'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM loan_applications WHERE id = '$id_loan'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/loan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "deposit") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $deposit = mysqli_query($koneksi, "SELECT * FROM deposit");
          while ($data_deposit = mysqli_fetch_array($deposit)) {
            $id_deposit = $data_deposit['id_deposit'];
        ?>
        $("#selesaikan_<?php echo $id_deposit; ?>").appendTo("body");
        $("#batalkan_<?php echo $id_deposit; ?>").appendTo("body");
        $("#data_asal_<?php echo $id_deposit; ?>").appendTo("body");
        $("#data_tujuan_<?php echo $id_deposit; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_deposit; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    <?php
          if (isset($_POST['batalkan'])) {
            $id_deposit = $_POST['id_deposit'];
            $id_akun_deposit = $_POST['id_akun_deposit'];
            $jumlah_deposit = $_POST['jumlah_deposit'];
            $status_deposit = $_POST['status_deposit'];
            $saldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_akun_saldo = '$id_akun_deposit'");
            $data_saldo = mysqli_fetch_array($saldo);
            $total_saldo = $data_saldo['total_saldo'] - $jumlah_deposit;
            $ubah_status_deposit = mysqli_query($koneksi, "UPDATE deposit SET status_deposit = '$status_deposit' WHERE id_deposit = '$id_deposit'");
            if ($ubah_status_deposit) {
              $ubah_total_saldo = mysqli_query($koneksi, "UPDATE saldo SET total_saldo = '$total_saldo' WHERE id_akun_saldo = '$id_akun_deposit'");
              if ($ubah_total_saldo) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/deposit");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_total_saldo."<br>".mysqli_error($koneksi);
              }
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_status_deposit."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['selesaikan'])) {
            $id_deposit = $_POST['id_deposit'];
            $id_akun_deposit = $_POST['id_akun_deposit'];
            $jumlah_deposit = $_POST['jumlah_deposit'];
            $status_deposit = $_POST['status_deposit'];
            $saldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_akun_saldo = '$id_akun_deposit'");
            $data_saldo = mysqli_fetch_array($saldo);
            $total_saldo = $data_saldo['total_saldo'] + $jumlah_deposit;
            $ubah_status_deposit = mysqli_query($koneksi, "UPDATE deposit SET status_deposit = '$status_deposit' WHERE id_deposit = '$id_deposit'");
            if ($ubah_status_deposit) {
              $ubah_total_saldo = mysqli_query($koneksi, "UPDATE saldo SET total_saldo = '$total_saldo' WHERE id_akun_saldo = '$id_akun_deposit'");
              if ($ubah_total_saldo) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/deposit");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_total_saldo."<br>".mysqli_error($koneksi);
              }
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_status_deposit."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_deposit = $_POST['id_deposit'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM deposit WHERE id_deposit = '$id_deposit'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/deposit");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "games") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $games = mysqli_query($koneksi, "SELECT * FROM games");
          while ($data_games = mysqli_fetch_array($games)) {
            $id_games = $data_games['id_games'];
        ?>
        $("#ubah_data_<?php echo $id_games; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_games; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    <?php
          if (isset($_POST['tambah_data'])) {
            $id_sub_menu_games_games = $_POST['id_sub_menu_games_games'];
            $nama_games = $_POST['nama_games'];
            $link_games = strtolower(str_replace(" ", "_", $nama_games));
            $link_asli_games = $_POST['link_asli_games'];
            $link_demo_games = $_POST['link_demo_games'];

            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_games']['tmp_name'];
            $nama_file = $_FILES['gambar_games']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/games/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $tambah_data = mysqli_query($koneksi, "INSERT INTO games (id_sub_menu_games_games, gambar_games, nama_games, link_games, link_asli_games, link_demo_games) VALUES ('$id_sub_menu_games_games', '$file_input', '$nama_games', '$link_games', '$link_asli_games', '$link_demo_games')");
                if ($tambah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil tambah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/games");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$tambah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_data'])) {
            $id_games = $_POST['id_games'];
            $id_sub_menu_games_games = $_POST['id_sub_menu_games_games'];
            $nama_games = $_POST['nama_games'];
            $link_games = strtolower(str_replace(" ", "_", $nama_games));
            $link_asli_games = $_POST['link_asli_games'];
            $link_demo_games = $_POST['link_demo_games'];

            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_games']['tmp_name'];
            $nama_file = $_FILES['gambar_games']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/games/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE games SET id_sub_menu_games_games = '$id_sub_menu_games_games', gambar_games = '$file_input', nama_games = '$nama_games', link_games = '$link_games', link_asli_games = '$link_asli_games', link_demo_games = '$link_demo_games' WHERE id_games = '$id_games'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/games");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE games SET id_sub_menu_games_games = '$id_sub_menu_games_games', nama_games = '$nama_games', link_games = '$link_games', link_asli_games = '$link_asli_games', link_demo_games = '$link_demo_games' WHERE id_games = '$id_games'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/games");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_games = $_POST['id_games'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM games WHERE id_games = '$id_games'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/games");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "promosi") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $promosi = mysqli_query($koneksi, "SELECT * FROM promosi");
          while ($data_promosi = mysqli_fetch_array($promosi)) {
            $id_promosi = $data_promosi['id_promosi'];
        ?>
        $("#ubah_data_<?php echo $id_promosi; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_promosi; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    <?php
          if (isset($_POST['tambah_data'])) {
            $judul_promosi = $_POST['judul_promosi'];
            $detail_promosi = $_POST['detail_promosi'];

            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_promosi']['tmp_name'];
            $nama_file = $_FILES['gambar_promosi']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/promosi/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $tambah_data = mysqli_query($koneksi, "INSERT INTO promosi (gambar_promosi, judul_promosi, detail_promosi) VALUES ('$file_input', '$judul_promosi', '$detail_promosi')");
                if ($tambah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil tambah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/promosi");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$tambah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_data'])) {
            $id_promosi = $_POST['id_promosi'];
            $judul_promosi = $_POST['judul_promosi'];
            $detail_promosi = $_POST['detail_promosi'];

            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_promosi']['tmp_name'];
            $nama_file = $_FILES['gambar_promosi']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/promosi/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE promosi SET gambar_promosi = '$file_input', judul_promosi = '$judul_promosi', detail_promosi = '$detail_promosi' WHERE id_promosi = '$id_promosi'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/promosi");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE promosi SET judul_promosi = '$judul_promosi', detail_promosi = '$detail_promosi' WHERE id_promosi = '$id_promosi'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/promosi");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_promosi = $_POST['id_promosi'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM promosi WHERE id_promosi = '$id_promosi'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/promosi");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "bank") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $bank = mysqli_query($koneksi, "SELECT * FROM bank");
          while ($data_bank = mysqli_fetch_array($bank)) {
            $id_bank = $data_bank['id_bank'];
        ?>
        $("#ubah_data_<?php echo $id_bank; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_bank; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    <?php
          if (isset($_POST['tambah_data'])) {
            $nama_bank = $_POST['nama_bank'];
            $status_bank = $_POST['status_bank'];
            $tambah_data = mysqli_query($koneksi, "INSERT INTO bank (nama_bank, status_bank) VALUES ('$nama_bank', '$status_bank')");
            if ($tambah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil tambah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/bank");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$tambah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_data'])) {
            $id_bank = $_POST['id_bank'];
            $nama_bank = $_POST['nama_bank'];
            $status_bank = $_POST['status_bank'];
            $ubah_data = mysqli_query($koneksi, "UPDATE bank SET nama_bank = '$nama_bank', status_bank = '$status_bank' WHERE id_bank = '$id_bank'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/bank");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_bank = $_POST['id_bank'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM bank WHERE id_bank = '$id_bank'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/bank");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "rekening") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $rekening = mysqli_query($koneksi, "SELECT * FROM rekening");
          while ($data_rekening = mysqli_fetch_array($rekening)) {
            $id_rekening = $data_rekening['id_rekening'];
        ?>
        $("#ubah_data_<?php echo $id_rekening; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_rekening; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    <?php
          if (isset($_POST['tambah_data'])) {
            $kategori_rekening = $_POST['kategori_rekening'];
            $jenis_rekening = $_POST['jenis_rekening'];
            $tambah_data = mysqli_query($koneksi, "INSERT INTO rekening (kategori_rekening, jenis_rekening) VALUES ('$kategori_rekening', '$jenis_rekening')");
            if ($tambah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil tambah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$tambah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_data'])) {
            $id_rekening = $_POST['id_rekening'];
            $kategori_rekening = $_POST['kategori_rekening'];
            $jenis_rekening = $_POST['jenis_rekening'];
            $ubah_data = mysqli_query($koneksi, "UPDATE rekening SET kategori_rekening = '$kategori_rekening', jenis_rekening = '$jenis_rekening' WHERE id_rekening = '$id_rekening'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_rekening = $_POST['id_rekening'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM rekening WHERE id_rekening = '$id_rekening'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "rekening_admin") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $rekening_admin = mysqli_query($koneksi, "SELECT * FROM rekening_admin");
          while ($data_rekening_admin = mysqli_fetch_array($rekening_admin)) {
            $id_rekening_admin = $data_rekening_admin['id_rekening_admin'];
        ?>
        $("#ubah_data_<?php echo $id_rekening_admin; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_rekening_admin; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    <?php
          if (isset($_POST['tambah_data'])) {
            $jenis_rekening_admin = $_POST['jenis_rekening_admin'];
            $nama_rekening_admin = $_POST['nama_rekening_admin'];
            $nomor_rekening_admin = $_POST['nomor_rekening_admin'];
            $tambah_data = mysqli_query($koneksi, "INSERT INTO rekening_admin (jenis_rekening_admin, nama_rekening_admin, nomor_rekening_admin) VALUES ('$jenis_rekening_admin', '$nama_rekening_admin', '$nomor_rekening_admin')");
            if ($tambah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil tambah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening_admin");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$tambah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_data'])) {
            $id_rekening_admin = $_POST['id_rekening_admin'];
            $jenis_rekening_admin = $_POST['jenis_rekening_admin'];
            $nama_rekening_admin = $_POST['nama_rekening_admin'];
            $nomor_rekening_admin = $_POST['nomor_rekening_admin'];
            $ubah_data = mysqli_query($koneksi, "UPDATE rekening_admin SET jenis_rekening_admin = '$jenis_rekening_admin', nama_rekening_admin = '$nama_rekening_admin', nomor_rekening_admin = '$nomor_rekening_admin' WHERE id_rekening_admin = '$id_rekening_admin'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening_admin");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_rekening_admin = $_POST['id_rekening_admin'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM rekening_admin WHERE id_rekening_admin = '$id_rekening_admin'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening_admin");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "rekening_anggota") {
    ?>
    <script>
      $(document).ready(function () {
        <?php
          $rekening_anggota = mysqli_query($koneksi, "SELECT * FROM rekening_anggota");
          while ($data_rekening_anggota = mysqli_fetch_array($rekening_anggota)) {
            $id_rekening_anggota = $data_rekening_anggota['id_rekening_anggota'];
        ?>
        $("#ubah_data_<?php echo $id_rekening_anggota; ?>").appendTo("body");
        $("#hapus_data_<?php echo $id_rekening_anggota; ?>").appendTo("body");
        <?php
          }
        ?>
      });
    </script>
    <?php
          if (isset($_POST['tambah_data'])) {
            $id_akun_rekening_anggota = $_POST['id_akun_rekening_anggota'];
            $kategori_rekening_anggota = $_POST['kategori_rekening_anggota'];
            $id_rekening_rekening_anggota = $_POST['id_rekening_rekening_anggota'];
            $nama_rekening_anggota = $_POST['nama_rekening_anggota'];
            $nomor_rekening_anggota = $_POST['nomor_rekening_anggota'];
            $tambah_data = mysqli_query($koneksi, "INSERT INTO rekening_anggota (id_akun_rekening_anggota, kategori_rekening_anggota, id_rekening_rekening_anggota, nama_rekening_anggota, nomor_rekening_anggota) VALUES ('$id_akun_rekening_anggota', '$kategori_rekening_anggota', '$id_rekening_rekening_anggota', '$nama_rekening_anggota', '$nomor_rekening_anggota')");
            if ($tambah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil tambah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening_anggota");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$tambah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_data'])) {
            $id_rekening_anggota = $_POST['id_rekening_anggota'];
            $id_akun_rekening_anggota = $_POST['id_akun_rekening_anggota'];
            $kategori_rekening_anggota = $_POST['kategori_rekening_anggota'];
            $id_rekening_rekening_anggota = $_POST['id_rekening_rekening_anggota'];
            $nama_rekening_anggota = $_POST['nama_rekening_anggota'];
            $nomor_rekening_anggota = $_POST['nomor_rekening_anggota'];
            $ubah_data = mysqli_query($koneksi, "UPDATE rekening_anggota SET id_akun_rekening_anggota = '$id_akun_rekening_anggota', kategori_rekening_anggota = '$kategori_rekening_anggota', id_rekening_rekening_anggota = '$id_rekening_rekening_anggota', nama_rekening_anggota = '$nama_rekening_anggota', nomor_rekening_anggota = '$nomor_rekening_anggota' WHERE id_rekening_anggota = '$id_rekening_anggota'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening_anggota");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['hapus_data'])) {
            $id_rekening_anggota = $_POST['id_rekening_anggota'];
            $hapus_data = mysqli_query($koneksi, "DELETE FROM rekening_anggota WHERE id_rekening_anggota = '$id_rekening_anggota'");
            if ($hapus_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil hapus data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/rekening_anggota");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$hapus_data."<br>".mysqli_error($koneksi);
            }
          }
        } else if ($halaman_aktif == "profil") {
          if (isset($_POST['ubah_profil'])) {
            $nama_lengkap_akun = $_POST['nama_lengkap_akun'];
            $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
            $kata_sandi_akun = $_POST['kata_sandi_akun'];
            $email_akun = $_POST['email_akun'];
            $telepon_akun = $_POST['telepon_akun'];
            $whatsapp_akun = $_POST['whatsapp_akun'];
            $cek_nama_pengguna_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE NOT id_akun = '$id_akun_masuk' AND nama_pengguna_akun = '$nama_pengguna_akun'");
            $jumlah_nama_pengguna_akun = mysqli_num_rows($cek_nama_pengguna_akun);
            if ($jumlah_nama_pengguna_akun > 0) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Nama Pengguna <span class="fw-bold text-primary"><?php echo $nama_pengguna_akun; ?></span> sudah ada, gunakan Nama Pengguna lainnya!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.replace("<?php echo $alamat_website; ?>admin/profil");
          }
        });
      });
    </script>
    <?php
            } else {
              $ubah_profil = mysqli_query($koneksi, "UPDATE akun SET nama_lengkap_akun = '$nama_lengkap_akun', nama_pengguna_akun = '$nama_pengguna_akun', kata_sandi_akun = '$kata_sandi_akun', email_akun = '$email_akun', telepon_akun = '$telepon_akun', whatsapp_akun = '$whatsapp_akun' WHERE id_akun = '$id_akun_masuk'");
              if ($ubah_profil) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/profil");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_profil."<br>".mysqli_error($koneksi);
              }
            }
          }
        } else if ($halaman_aktif == "pengaturan") {
          if (isset($_POST['ubah_judul_website'])) {
            $isi1_pengaturan = $_POST['judul_website'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan' WHERE nama_pengaturan = 'judul_website'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_warna_utama'])) {
            $isi1_pengaturan = $_POST['warna_utama'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan' WHERE nama_pengaturan = 'warna_utama'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_logo_admin_light'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_logo_admin_light']['tmp_name'];
            $nama_file = $_FILES['gambar_logo_admin_light']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'logo_admin_light'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_logo_admin_dark'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_logo_admin_dark']['tmp_name'];
            $nama_file = $_FILES['gambar_logo_admin_dark']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'logo_admin_dark'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_logo_admin_sm'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_logo_admin_sm']['tmp_name'];
            $nama_file = $_FILES['gambar_logo_admin_sm']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'logo_admin_sm'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_livechat'])) {
            $isi2_pengaturan = $_POST['judul_livechat'];
            $isi3_pengaturan = $_POST['link_livechat'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_livechat']['tmp_name'];
            $nama_file = $_FILES['gambar_livechat']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'svg', 'SVG');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan', isi3_pengaturan = '$isi3_pengaturan' WHERE nama_pengaturan = 'livechat'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi2_pengaturan = '$isi2_pengaturan', isi3_pengaturan = '$isi3_pengaturan' WHERE nama_pengaturan = 'livechat'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['ubah_whatsapp'])) {
            $isi2_pengaturan = $_POST['nomor_whatsapp'];
            $isi3_pengaturan = $_POST['text_whatsapp'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_whatsapp']['tmp_name'];
            $nama_file = $_FILES['gambar_whatsapp']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'svg', 'SVG');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan', isi3_pengaturan = '$isi3_pengaturan' WHERE nama_pengaturan = 'whatsapp'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi2_pengaturan = '$isi2_pengaturan', isi3_pengaturan = '$isi3_pengaturan' WHERE nama_pengaturan = 'whatsapp'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['ubah_twitter'])) {
            $isi1_pengaturan = $_POST['nama_twitter'];
            $isi2_pengaturan = $_POST['link_twitter'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'twitter'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_instagram'])) {
            $isi1_pengaturan = $_POST['nama_instagram'];
            $isi2_pengaturan = $_POST['link_instagram'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'instagram'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_facebook'])) {
            $isi1_pengaturan = $_POST['nama_facebook'];
            $isi2_pengaturan = $_POST['link_facebook'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'facebook'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_line'])) {
            $isi1_pengaturan = $_POST['nama_line'];
            $isi2_pengaturan = $_POST['link_line'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'line'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_livescore'])) {
            $isi2_pengaturan = $_POST['link_livescore'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_livescore']['tmp_name'];
            $nama_file = $_FILES['gambar_livescore']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'svg', 'SVG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'livescore'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_rtp_slot'])) {
            $isi2_pengaturan = $_POST['link_rtp_slot'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_rtp_slot']['tmp_name'];
            $nama_file = $_FILES['gambar_rtp_slot']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'svg', 'SVG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'rtp_slot'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_teks_berjalan'])) {
            $isi1_pengaturan = $_POST['detail_teks_berjalan'];
            $isi2_pengaturan = $_POST['warna_background'];
            $isi3_pengaturan = $_POST['warna_text'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan', isi2_pengaturan = '$isi2_pengaturan', isi3_pengaturan = '$isi3_pengaturan' WHERE nama_pengaturan = 'marquee_pengumuman'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_logo'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_logo']['tmp_name'];
            $nama_file = $_FILES['gambar_logo']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'logo'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_favicon'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_favicon']['tmp_name'];
            $nama_file = $_FILES['gambar_favicon']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'ico', 'ICO', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'favicon'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_popup_pengumuman'])) {
            $isi2_pengaturan = $_POST['link_gambar_popup_pengumuman'];
            $isi3_pengaturan = $_POST['detail_popup_pengumuman'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_popup_pengumuman']['tmp_name'];
            $nama_file = $_FILES['gambar_popup_pengumuman']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan', isi3_pengaturan = '$isi3_pengaturan' WHERE nama_pengaturan = 'popup_pengumuman'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi2_pengaturan = '$isi2_pengaturan', isi3_pengaturan = '$isi3_pengaturan' WHERE nama_pengaturan = 'popup_pengumuman'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['ubah_pusat_bantuan'])) {
            $isi1_pengaturan = $_POST['detail_pusat_bantuan'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan' WHERE nama_pengaturan = 'pusat_bantuan'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_syarat_dan_ketentuan'])) {
            $isi1_pengaturan = $_POST['detail_syarat_dan_ketentuan'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan' WHERE nama_pengaturan = 'syarat_dan_ketentuan'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_responsible_gaming'])) {
            $isi1_pengaturan = $_POST['detail_responsible_gaming'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan' WHERE nama_pengaturan = 'responsible_gaming'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_tentang'])) {
            $isi1_pengaturan = $_POST['detail_tentang'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan' WHERE nama_pengaturan = 'tentang'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_footer'])) {
            $isi1_pengaturan = $_POST['footer_panjang'];
            $isi2_pengaturan = $_POST['footer_pendek'];
            $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$isi1_pengaturan', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'footer'");
            if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
            } else {
              echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
            }
          } else if (isset($_POST['ubah_bg_body'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_bg_body']['tmp_name'];
            $nama_file = $_FILES['gambar_bg_body']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'bg_body'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_bg_jackpot'])) {
            $isi2_pengaturan = $_POST['warna_text_jackpot'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_jackpot']['tmp_name'];
            $nama_file = $_FILES['gambar_jackpot']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'bg_jackpot'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'bg_jackpot'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['ubah_tombol_masuk'])) {
            $isi2_pengaturan = $_POST['warna_text_tombol_masuk'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_tombol_masuk']['tmp_name'];
            $nama_file = $_FILES['gambar_tombol_masuk']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'tombol_masuk'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'tombol_masuk'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['ubah_tombol_daftar'])) {
            $isi2_pengaturan = $_POST['warna_text_tombol_daftar'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_tombol_daftar']['tmp_name'];
            $nama_file = $_FILES['gambar_tombol_daftar']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'tombol_daftar'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'tombol_daftar'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['ubah_bg_menu'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_bg_menu']['tmp_name'];
            $nama_file = $_FILES['gambar_bg_menu']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'bg_menu'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_bg_bank'])) {
            $isi2_pengaturan = $_POST['warna_text_bg_bank'];
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_bg_bank']['tmp_name'];
            $nama_file = $_FILES['gambar_bg_bank']['name'];
            if (!empty($nama_file)) {
              $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
              $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
              if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              } else {
                $file = strtolower(str_replace(" ", "_", $nama_file));
                $file_input = $random.'_'.$file;
                $lokasi_simpan = "assets/images/".$file_input;
                if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                  $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input', isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'bg_bank'");
                  if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                  } else {
                    echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                  }
                } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
                }
              }
            } else {
              $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi2_pengaturan = '$isi2_pengaturan' WHERE nama_pengaturan = 'bg_bank'");
              if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
              } else {
                echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
              }
            }
          } else if (isset($_POST['ubah_hot_games'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_hot_games']['tmp_name'];
            $nama_file = $_FILES['gambar_hot_games']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'hot_games'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_slots'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_slots']['tmp_name'];
            $nama_file = $_FILES['gambar_slots']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'slots'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_live_casino'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_live_casino']['tmp_name'];
            $nama_file = $_FILES['gambar_live_casino']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'live_casino'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_sports'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_sports']['tmp_name'];
            $nama_file = $_FILES['gambar_sports']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'sports'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_arcade'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_arcade']['tmp_name'];
            $nama_file = $_FILES['gambar_arcade']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'arcade'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_poker'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_poker']['tmp_name'];
            $nama_file = $_FILES['gambar_poker']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'poker'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          } else if (isset($_POST['ubah_togel'])) {
            $random = rand(1000000000, 9999999999);
            $tmp_file = $_FILES['gambar_togel']['tmp_name'];
            $nama_file = $_FILES['gambar_togel']['name'];
            $format =  array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            if (!in_array($extensi, $format)) {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Format gambar salah, format gambar harus <span class="fw-bold text-primary">PNG</span>, <span class="fw-bold text-primary">JPG</span> atau <span class="fw-bold text-primary">JPEG</span>!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
            } else {
              $file = strtolower(str_replace(" ", "_", $nama_file));
              $file_input = $random.'_'.$file;
              $lokasi_simpan = "assets/images/".$file_input;
              if (move_uploaded_file($tmp_file, $lokasi_simpan)) {
                $ubah_data = mysqli_query($koneksi, "UPDATE pengaturan SET isi1_pengaturan = '$file_input' WHERE nama_pengaturan = 'togel'");
                if ($ubah_data) {
    ?>
    <script>
      $(document).ready(function () {
        let timerInterval
        Swal.fire({
          icon: 'success',
          html: 'Berhasil ubah data, tunggu sebentar',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.replace("<?php echo $alamat_website; ?>admin/pengaturan");
          }
        });
      });
    </script>
    <?php
                } else {
                  echo "Proses Gagal<br>Error : ".$ubah_data."<br>".mysqli_error($koneksi);
                }
              } else {
    ?>
    <script>
      $(document).ready(function () {
        Swal.fire({
          icon: 'error',
          html: 'Ukuran gambar terlalu besar!',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#405189'
        });
      });
    </script>
    <?php
              }
            }
          }
        }
      }
    ?>
  </body>
</html>