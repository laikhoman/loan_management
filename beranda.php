<div class="d-flex align-items-center p-2" style="background: <?php echo $isi2_marquee_pengumuman; ?>; color: <?php echo $isi3_marquee_pengumuman; ?>;">
  <i class="ri-volume-up-line me-2"></i>
  <marquee behavior="scroll" direction="left"><?php echo $isi1_marquee_pengumuman; ?></marquee>
</div>
<!-- Slideshow -->
<div class="owl-carousel owl-theme">
  <?php
    $query_promosi = mysqli_query($koneksi, "SELECT * FROM promosi ORDER BY id_promosi DESC");
    while ($data_promosi = mysqli_fetch_array($query_promosi)) {
      $id_promosi = $data_promosi['id_promosi'];
      $gambar_promosi = $data_promosi['gambar_promosi'];
      $judul_promosi = $data_promosi['judul_promosi'];
      $detail_promosi = $data_promosi['detail_promosi'];
  ?>
  <div class="item">
    <img src="admin/assets/images/promosi/<?php echo $gambar_promosi; ?>" alt="<?php echo $judul_promosi; ?>" class="img-fluid">
  </div>
  <?php
    }
  ?>
</div>
<?php
  if (isset($_SESSION['id_akun'])) {
?>
<div class="user-menu">
  <div class="user-menu-item">
    <a href="<?php echo $alamat_website.'deposit'; ?>" class="btn tombol-masuk">Deposit</a>
  </div>
  <div class="user-menu-item">
    <a href="<?php echo $alamat_website.'transfer'; ?>" class="btn tombol-masuk">Transfer</a>
  </div>
  <div class="user-menu-item">
    <a href="<?php echo $alamat_website.'withdraw'; ?>" class="btn tombol-masuk">Withdraw</a>
  </div>
</div>
<?php
  } else {
?>
<div class="container-masuk-daftar">
  <a href="<?php echo $alamat_website.'masuk'; ?>" class="masuk">MASUK</a>
  <a href="<?php echo $alamat_website.'daftar'; ?>" class="daftar">DAFTAR</a>
</div>
<?php
  }
?>
<div class="row g-0">
  <div class="col-12">
    <div class="d-flex bg-menu">
      <i class="ri-arrow-left-s-line text-black fs-4 fw-bold d-flex align-items-center top-0 px-2" id="scroll-kiri"></i>
      <div class="d-flex flex-grow-1 overflow-auto m-0" id="scroll-kategori">
        <?php
          if (isset($_SESSION['id_akun'])) {
            echo '<a href="'.$alamat_website.'games/kategori/slots" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3 ms-auto">';
          } else {
            echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3 ms-auto">';
          }
        ?>
          <img src="admin/assets/images/<?php echo $isi1_hot_games; ?>" alt="Hot Games" class="d-block my-2 mx-auto" width="25" height="25" style="filter: invert(100%);">
          Hot Games
        </a>
        <?php
          if (isset($_SESSION['id_akun'])) {
            echo '<a href="'.$alamat_website.'games/kategori/slots" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          } else {
            echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          }
        ?>
          <img src="admin/assets/images/<?php echo $isi1_slots; ?>" alt="Slots" class="d-block my-2 mx-auto" width="25" height="25" style="filter: invert(100%);">
          Slots
        </a>
        <?php
          if (isset($_SESSION['id_akun'])) {
            echo '<a href="'.$alamat_website.'games/kategori/live_casino" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          } else {
            echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          }
        ?>
          <img src="admin/assets/images/<?php echo $isi1_live_casino; ?>" alt="Casino" class="d-block my-2 mx-auto" width="25" height="25" style="filter: invert(100%);">
          Live Casino
        </a>
        <?php
          if (isset($_SESSION['id_akun'])) {
            echo '<a href="'.$alamat_website.'games/kategori/sports" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          } else {
            echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          }
        ?>
          <img src="admin/assets/images/<?php echo $isi1_sports; ?>" alt="Sports" class="d-block my-2 mx-auto" width="25" height="25" style="filter: invert(100%);">
          Sports
        </a>
        <?php
          if (isset($_SESSION['id_akun'])) {
            echo '<a href="'.$alamat_website.'games/kategori/arcade" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          } else {
            echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          }
        ?>
          <img src="admin/assets/images/<?php echo $isi1_arcade; ?>" alt="Arcade" class="d-block my-2 mx-auto" width="25" height="25" style="filter: invert(100%);">
          Arcade
        </a>
        <?php
          if (isset($_SESSION['id_akun'])) {
            echo '<a href="'.$alamat_website.'games/kategori/poker" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          } else {
            echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3">';
          }
        ?>
          <img src="admin/assets/images/<?php echo $isi1_poker; ?>" alt="Poker" class="d-block my-2 mx-auto" width="25" height="25" style="filter: invert(100%);">
          Poker
        </a>
        <?php
          if (isset($_SESSION['id_akun'])) {
            echo '<a href="'.$alamat_website.'games/kategori/togel" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3 me-auto">';
          } else {
            echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-black text-decoration-none text-center text-uppercase p-3 me-auto">';
          }
        ?>
          <img src="admin/assets/images/<?php echo $isi1_togel; ?>" alt="Togel" class="d-block my-2 mx-auto" width="25" height="25" style="filter: invert(100%);">
          Togel
        </a>
      </div>
      <i class="ri-arrow-right-s-line text-black fs-4 fw-bold d-flex align-items-center top-0 px-2" id="scroll-kanan"></i>
    </div>
  </div>
</div>
<div class="jackpot my-3">
  <div class="jackpot-title">
    PROGRESSIVE JACKPOT
  </div>
  <div class="jackpot-value-image">
    <span id="counter"></span>
    <img src="admin/assets/images/<?php echo $isi1_bg_jackpot; ?>" alt="">
  </div>
</div>
<div class="p-3">
  <div class="row g-3 justify-content-center align-items-center">
    <?php
      $bank = mysqli_query($koneksi, "SELECT * FROM bank");
      while ($data_bank = mysqli_fetch_array($bank)) {
        $id_bank = $data_bank['id_bank'];
        $nama_bank = $data_bank['nama_bank'];
        $status_bank = $data_bank['status_bank'];
    ?>
    <div class="col-lg-2 col-md-3 col-sm-4 col-4">
      <div class="bg-bank d-flex justify-content-center align-items-center p-2 fw-bold" style="border: 1px solid #e6bc44; border-radius: 8px;">
        <?php
          if ($status_bank == "on") {
            echo '<i class="ri-checkbox-blank-circle-fill text-success me-2"></i>';
          } else {
            echo '<i class="ri-checkbox-blank-circle-fill text-danger me-2"></i>';
          }
        ?>
        <span><?php echo $nama_bank; ?></span>
      </div>
    </div>
    <?php
      }
    ?>
    <div class="col-12"></div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
      <img src="admin/assets/images/infini88.png" alt="Logo" class="img-fluid">
    </div>
  </div>
</div>
<div class="row g-0 justify-content-center align-items-center mt-3">
  <div class="col-10">
    <div class="text-center">
      <?php echo $isi1_footer; ?>
    </div>
  </div>
  <div class="col-10">
    <p class="mt-3" style="font-size: 14.4px;"><?php echo $isi2_footer; ?></p>
  </div>
</div>
