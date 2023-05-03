<div class="offcanvas offcanvas-end text-bg-dark w-75" data-bs-backdrop="static" tabindex="-1" id="menunya" aria-labelledby="menunyaLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="menunyaLabel">
      <img src="admin/assets/images/<?php echo $isi1_logo; ?>" alt="Logo" height="35">
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php
      if (isset($_SESSION['id_akun'])) {
    ?>
    <div class="border border-secondary p-2" style="font-size: 16px;">
      <span class="me-1">IDR</span>
      <span style="color: #FF1300;"><?php echo number_format($total_saldo).'.00'; ?></span>
    </div>
    <div class="user-menu">
      <div class="user-menu-item">
        <a href="<?php echo $alamat_website.'deposit'; ?>">
          <img src="admin/assets/images/svg/deposit.svg" alt="Deposit">
          DEPOSIT
        </a>
      </div>
      <div class="user-menu-item border border-top-0 border-bottom-0">
        <a href="<?php echo $alamat_website.'penarikan'; ?>">
          <img src="admin/assets/images/svg/withdrawal.svg" alt="Deposit">
          PENARIKAN
        </a>
      </div>
      <div class="user-menu-item">
        <a href="<?php echo $alamat_website.'akun_saya'; ?>">
          <img src="admin/assets/images/svg/profile.svg" alt="Deposit">
          AKUN SAYA
        </a>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center text-white my-3" id="menu" style="cursor: pointer;">
      <div class="d-flex align-items-center"><img src="admin/assets/images/svg/hot-games.svg" class="me-2" width="18" height="18"> Games</div>
      <i class="ri-arrow-right-s-line" id="panah"></i>
    </div>
    <div class="text-white ps-4" id="expand_menu">
      <?php
        $query_menu_games = mysqli_query($koneksi, "SELECT * FROM menu_games");
        while ($data_menu_games = mysqli_fetch_array($query_menu_games)) {
          $id_menu_games = $data_menu_games['id_menu_games'];
          $judul_menu_games = $data_menu_games['judul_menu_games'];
          $link_menu_games = $data_menu_games['link_menu_games'];
      ?>
      <div class="d-flex justify-content-between align-items-center text-white my-3" id="menu_<?php echo $id_menu_games; ?>" style="cursor: pointer;">
        <?php echo $judul_menu_games; ?>
        <i class="ri-arrow-right-s-line" id="panah_<?php echo $id_menu_games; ?>"></i>
      </div>
      <div class="text-white ps-4" id="expand_menu_<?php echo $id_menu_games; ?>">
        <?php
          $query_sub_menu_games = mysqli_query($koneksi, "SELECT * FROM sub_menu_games WHERE id_menu_games_sub_menu_games = '$id_menu_games'");
          while ($data_sub_menu_games = mysqli_fetch_array($query_sub_menu_games)) {
            $id_sub_menu_games = $data_sub_menu_games['id_sub_menu_games'];
            $judul_sub_menu_games = $data_sub_menu_games['judul_sub_menu_games'];
            $link_sub_menu_games = $data_sub_menu_games['link_sub_menu_games'];
        ?>
        <a href="<?php echo $alamat_website.$link_menu_games.'/'.$link_sub_menu_games; ?>" class="d-block text-white text-decoration-none mb-3"><?php echo $judul_sub_menu_games; ?></a>
        <?php
          }
        ?>
      </div>
      <?php
        }
      ?>
    </div>
    <div class="d-flex justify-content-between align-items-center text-white my-3" id="beranda1" style="cursor: pointer;">
      <div class="d-flex align-items-center"><img src="admin/assets/images/svg/message.svg" class="me-2" width="18" height="18"> Pesan</div>
    </div>
    <div class="d-flex justify-content-between align-items-center text-white my-3" id="beranda2" style="cursor: pointer;">
      <div class="d-flex align-items-center"><img src="admin/assets/images/svg/reporting.svg" class="me-2" width="18" height="18"> Riwayat Taruhan</div>
    </div>
    <div class="d-flex justify-content-between align-items-center text-white my-3" id="beranda3" style="cursor: pointer;">
      <div class="d-flex align-items-center"><img src="admin/assets/images/svg/referral.svg" class="me-2" width="18" height="18"> Referensi</div>
    </div>
    <div class="d-flex justify-content-between align-items-center text-white my-3" id="beranda4" style="cursor: pointer;">
      <div class="d-flex align-items-center"><img src="admin/assets/images/svg/download.svg" class="me-2" width="18" height="18"> Download Game APK</div>
    </div>
    <div class="d-flex justify-content-between align-items-center text-white my-3" id="keluar" style="cursor: pointer;">
      <div class="d-flex align-items-center"><img src="admin/assets/images/svg/logout.svg" class="me-2" width="18" height="18"> Keluar</div>
    </div>
    <?php
      } else {
    ?>
    <form method="post">
      <div class="input-group mb-3">
        <span class="input-group-text text-bg-dark border-end-0 rounded-0">
          <i class="ri-user-line"></i>
        </span>
        <input type="text" name="nama_pengguna_akun" class="form-control text-bg-dark border-start-0 rounded-0" placeholder="Nama Pengguna">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text text-bg-dark border-end-0 rounded-0">
          <i class="ri-lock-line"></i>
        </span>
        <input type="password" name="kata_sandi_akun" class="form-control text-bg-dark border-start-0 border-end-0 rounded-0" id="input-kata-sandi" placeholder="Kata Sandi">
        <span class="input-group-text text-bg-dark border-start-0 rounded-0" id="peralihan-kata-sandi" style="cursor: pointer;">
          <i id="kata-sandi" class="ri-eye-off-line"></i>
        </span>
      </div>
      <div class="row g-2 mb-3">
        <div class="col">
          <a href="<?php echo $alamat_website.'daftar'; ?>" class="btn btn-sm rounded-0 w-100 sidebar-daftar">Daftar</a>
        </div>
        <div class="col">
          <button type="submit" name="masuk" class="btn btn-sm rounded-0 w-100 sidebar-masuk">Masuk</button>
        </div>
      </div>
    </form>
    <?php
      }
    ?>
  </div>
</div>