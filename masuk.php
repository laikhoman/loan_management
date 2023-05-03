<?php
  if (isset($_SESSION['id_akun'])) {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'");
      </script>
    ';
  }
?>

<div class="container-fluid py-3">
  <h6>Silahkan masuk</h6>
  <form method="post">
    <div class="input-group mb-3">
      <input type="text" name="nama_pengguna_akun" class="form-control border-end-0 rounded-0" placeholder="Nama Pengguna">
      <span class="input-group-text bg-white border-start-0 rounded-0">
        <i class="ri-user-line"></i>
      </span>
    </div>
    <div class="input-group mb-3">
      <input type="password" name="kata_sandi_akun" class="form-control border-end-0 rounded-0" id="input-kata-sandi" placeholder="Kata Sandi">
      <span class="input-group-text bg-white border-start-0 rounded-0" id="peralihan-kata-sandi" style="cursor: pointer;">
        <i id="kata-sandi" class="ri-eye-off-line"></i>
      </span>
    </div>
    <button type="submit" name="masuk" class="btn mb-3 w-100" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">MASUK</button>
    <hr class="mb-3" style="height: 2px; background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%); opacity: 1!important;">
    <h6>Klik disini untuk menjadi anggota</h6>
    <a href="<?php echo $alamat_website.'daftar'; ?>" class="btn mb-3 w-100" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">GABUNG SEKARANG</a>
  </form>
</div>