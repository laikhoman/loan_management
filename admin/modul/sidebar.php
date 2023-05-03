<div class="offcanvas offcanvas-end bg-light w-75" data-bs-backdrop="static" tabindex="-1" id="menunya" aria-labelledby="menunyaLabel">
  <div class="offcanvas-header bg-black">
    <?php
      if (isset($_SESSION['id_akun'])) {
    ?>
    <span class="offcanvas-title" id="menunyaLabel">
      <a href="<?php echo $alamat_website.'deposit'; ?>" style="padding: 2px 14px; border-radius: 3px; border: 1px solid #0fd700; color: #0fd700; margin-right: 5px;">Deposit</a>
      <a href="<?php echo $alamat_website.'deposit'; ?>" style="padding: 2px 14px; border-radius: 3px; border: 1px solid #d70000; color: #d70000; margin-right: 5px;">Withdraw</a>
    </span>
    <?php
      } else {
    ?>
    <span class="offcanvas-title" id="menunyaLabel">Selamat datang</span>
    <?php
      }
    ?>
    <button type="button" class="btn btn-sm btn-light rounded-circle" data-bs-dismiss="offcanvas">
      <i class="ri-close-fill fw-bold"></i>
    </button>
    <!-- <button type="button" class="btn-close btn-close-white"  aria-label="Close"></button> -->
  </div>
  <div class="offcanvas-body p-0">
    <?php
      if (isset($_SESSION['id_akun'])) {
    ?>
    <div class="bg-black p-3 pt-0">
      <span class="d-block text-center mb-3">Hai, <?php echo $nama_pengguna_akun_masuk; ?></span>
      <div class="d-flex justify-content-between align-items-center bg-light text-black rounded p-2">
        <i class="ri-coin-fill"></i>
        <span><?php echo $total_saldo.',00'; ?></span>
        <i class="ri-refresh-line"></i>
      </div>
    </div>
    <div class="text-muted m-3">
      <a href="<?php echo $alamat_website.'beranda'; ?>" class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-home-4-line fs-3 me-3"></i>Beranda
      </a>
      <a href="<?php echo $alamat_website.'hubungi_kami'; ?>" class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-phone-fill fs-3 me-3"></i>Hubungi Kami
      </a>
      <div class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-translate fs-3 me-3"></i>
        <select class="form-select form-select-sm my-2">
          <option selected>Bahasa Indonesia</option>
          <option>English</option>
          <option>Bahasa Indonesia</option>
          <option>简体中文</option>
        </select>
      </div>
      <a href="#" class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-arrow-down-circle-fill fs-3 me-3"></i>Unduh Aplikasi
      </a>
      <a href="<?php echo $alamat_website.'keluar.php'; ?>" class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-logout-box-r-line fs-3 me-3"></i>Keluar
      </a>
    </div>
    <?php
      } else {
    ?>
    <div class="bg-black p-3 pt-0">
      <span class="d-block text-center mb-3">Silahkan masuk atau daftar</span>
      <div class="row g-2">
        <div class="col-6">
          <a href="<?php echo $alamat_website.'masuk'; ?>" class="btn tombol-masuk w-100">Masuk</a>
        </div>
        <div class="col-6">
          <a href="<?php echo $alamat_website.'daftar'; ?>" class="btn tombol-daftar w-100">Daftar</a>
        </div>
      </div>
    </div>
    <div class="text-muted m-3">
      <a href="<?php echo $alamat_website.'beranda'; ?>" class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-home-4-line fs-3 me-3"></i>Beranda
      </a>
      <a href="<?php echo $alamat_website.'hubungi_kami'; ?>" class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-phone-fill fs-3 me-3"></i>Hubungi Kami
      </a>
      <div class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-translate fs-3 me-3"></i>
        <select class="form-select form-select-sm my-2">
          <option selected>Bahasa Indonesia</option>
          <option>English</option>
          <option>Bahasa Indonesia</option>
          <option>简体中文</option>
        </select>
      </div>
      <a href="#" class="d-flex align-items-center text-muted border-bottom border-secondary">
        <i class="ri-arrow-down-circle-fill fs-3 me-3"></i>Unduh Aplikasi
      </a>
    </div>
    <?php
      }
    ?>
  </div>
</div>