<?php
  if (isset($_SESSION['id_akun'])) {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'");
      </script>
    ';
  }
?>

<div class="row g-0 justify-content-center align-items-center my-5">
  <div class="col-10">
    <form method="post">
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Nama Pengguna</label>
        <input type="text" name="nama_pengguna_akun" class="form-control form-control-sm rounded-0" placeholder="Nama Pengguna" required>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Kata Sandi</label>
        <div class="input-group input-group-sm">
          <input type="password" name="kata_sandi_akun" class="form-control rounded-0 border-end-0" id="input-kata-sandi-masuk-daftar" placeholder="Kata Sandi" required>
          <span class="input-group-text rounded-0 border-start-0" id="peralihan-kata-sandi-masuk-daftar" style="cursor: pointer; background-color: #FFFFFF!important;">
            <i id="kata-sandi-masuk-daftar" class="ri-eye-off-line"></i>
          </span>
        </div>
      </div>
      <button type="submit" name="masuk" class="btn my-3 w-100 sidebar-masuk">Masuk</button>
    </form>
    <div class="text-center">
      <span class="d-block">Belum Punya Akun?</span>
      <a href="<?php echo $alamat_website.'daftar'; ?>" class="btn my-3 w-100 sidebar-daftar">Daftar Sekarang</a>
    </div>
  </div>
</div>