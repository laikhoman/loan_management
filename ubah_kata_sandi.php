<?php
  if (isset($_POST['ubah_kata_sandi'])) {
    $kata_sandi_baru = $_POST['kata_sandi_baru'];
    $ubah_kata_sandi = mysqli_query($koneksi, "UPDATE akun SET kata_sandi_akun = '$kata_sandi_baru' WHERE id_akun = '$id_akun_masuk'");
    if ($ubah_kata_sandi) {
      echo '
        <script>
          alert("Berhasil merubah kata sandi !");
          window.location.replace("'.$alamat_website.'akun_saya");
        </script>
      ';
    } else {
      echo "Proses Gagal<br>Error : ".$ubah_kata_sandi."<br>".mysqli_error($koneksi);
    }
  }
?>

<div class="row gy-2 gx-0 mb-3">
  <div class="col-4">
    <a href="<?php echo $alamat_website.'akun_saya'; ?>" class="d-flex justify-content-center align-items-center text-uppercase mx-3 p-2">
      <img src="admin/assets/images/svg/profile.svg" alt="Akun Saya" width="25" height="25" class="me-2">
      Akun Saya
    </a>
  </div>
  <div class="col-4">
    <a href="<?php echo $alamat_website.'ubah_kata_sandi'; ?>" class="d-flex justify-content-center align-items-center text-uppercase bg-utama mx-3 p-2">
      <img src="admin/assets/images/svg/password.svg" alt="Ubah Kata Sandi" width="25" height="25" class="me-2">
      Ubah Kata Sandi
    </a>
  </div>
  <div class="col-4">
    <a href="<?php echo $alamat_website.'profil_saya'; ?>" class="d-flex justify-content-center align-items-center text-uppercase mx-3 p-2">
      <img src="admin/assets/images/svg/edit.svg" alt="Profil Saya" width="25" height="25" class="me-2">
      Profil Saya
    </a>
  </div>
</div>
<form method="post">
  <div class="row gx-0 gy-3 justify-content-center align-items-center mb-3">
    <div class="col-10 text-center bg-utama p-2">
      <span style="font-size: 18px;">Ubah Kata Sandi</span>
    </div>
    <div class="col-10 px-4">
      <div class="mb-3">
        Catatan:<br>
        *Password harus terdiri dari 8-20 karakter.<br>
        *Password harus mengandung setidaknya satu huruf besar, satu huruf kecil, dan satu angka.<br>
        *Password tidak boleh mengandung username.
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Kata Sandi Baru <span style="color: #FF0000;">*</span></label>
        <div class="input-group input-group-sm">
          <input type="password" name="kata_sandi_baru" class="form-control rounded-0 border-end-0 syarat-kata-sandi" id="input-kata-sandi-daftar" placeholder="Kata Sandi Anda" required>
          <span class="input-group-text rounded-0 border-start-0" id="peralihan-kata-sandi-daftar" style="cursor: pointer; background-color: #FFFFFF!important;">
            <i id="kata-sandi-daftar" class="ri-eye-off-line"></i>
          </span>
        </div>
        <span id="notif-syarat-kata-sandi" style="color: #FF0000;"></span>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Ulangi Kata Sandi Baru <span style="color: #FF0000;">*</span></label>
        <div class="input-group input-group-sm">
          <input type="password" name="kata_sandi_akun_2" class="form-control rounded-0 border-end-0 syarat-kata-sandi-2" id="input-kata-sandi-daftar-2" placeholder="Ulangi Kata Sandi Anda" required>
          <span class="input-group-text rounded-0 border-start-0" id="peralihan-kata-sandi-daftar-2" style="cursor: pointer; background-color: #FFFFFF!important;">
            <i id="kata-sandi-daftar-2" class="ri-eye-off-line"></i>
          </span>
        </div>
        <span id="notif-syarat-kata-sandi-2" style="color: #FF0000;"></span>
      </div>
      <button type="submit" name="ubah_kata_sandi" class="btn btn-danger text-uppercase rounded-pill my-3 w-100">Ubah Kata Sandi</button>
    </div>
  </div>
</form>