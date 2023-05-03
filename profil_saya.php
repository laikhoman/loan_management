<?php
  if (isset($_POST['profil_saya'])) {
    $nama_lengkap_akun = $_POST['nama_lengkap_akun'];
    $email_akun = $_POST['email_akun'];
    $telepon_akun = $_POST['telepon_akun'];
    $whatsapp_akun = $_POST['whatsapp_akun'];
    $profil_saya = mysqli_query($koneksi, "UPDATE akun SET nama_lengkap_akun = '$nama_lengkap_akun', email_akun = '$email_akun', telepon_akun = '$telepon_akun', whatsapp_akun = '$whatsapp_akun' WHERE id_akun = '$id_akun_masuk'");
    if ($profil_saya) {
      echo '
        <script>
          alert("Berhasil merubah kata sandi !");
          window.location.replace("'.$alamat_website.'akun_saya");
        </script>
      ';
    } else {
      echo "Proses Gagal<br>Error : ".$profil_saya."<br>".mysqli_error($koneksi);
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
    <a href="<?php echo $alamat_website.'ubah_kata_sandi'; ?>" class="d-flex justify-content-center align-items-center text-uppercase mx-3 p-2">
      <img src="admin/assets/images/svg/password.svg" alt="Ubah Kata Sandi" width="25" height="25" class="me-2">
      Ubah Kata Sandi
    </a>
  </div>
  <div class="col-4">
    <a href="<?php echo $alamat_website.'profil_saya'; ?>" class="d-flex justify-content-center align-items-center text-uppercase bg-utama mx-3 p-2">
      <img src="admin/assets/images/svg/edit.svg" alt="Profil Saya" width="25" height="25" class="me-2">
      Profil Saya
    </a>
  </div>
</div>
<form method="post">
  <div class="row gx-0 gy-3 justify-content-center align-items-center mb-3">
    <div class="col-10 text-center bg-utama p-2">
      <span style="font-size: 18px;">Profil Saya</span>
    </div>
    <div class="col-10 px-4">
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Nama Lengkap</label>
        <input type="text" name="nama_pengguna_akun" class="form-control form-control-sm rounded-0 syarat-nama-lengkap" value="<?php echo $nama_lengkap_akun_masuk; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Email</label>
        <input type="email" name="email_akun" class="form-control form-control-sm rounded-0" value="<?php echo $email_akun_masuk; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">No. Kontak <span style="color: #FF0000;">*</span></label>
        <input type="text" name="telepon_akun" class="form-control form-control-sm rounded-0" value="<?php echo $telepon_akun_masuk; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">WhatsApp <span style="color: #FF0000;">*</span></label>
        <input type="text" name="whatsapp_akun" class="form-control form-control-sm rounded-0" value="<?php echo $whatsapp_akun_masuk; ?>" required>
      </div>
      <button type="submit" name="profil_saya" class="btn btn-danger text-uppercase rounded-pill my-3 w-100">Simpan Data Profil Saya</button>
    </div>
  </div>
</form>