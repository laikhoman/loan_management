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
  <h6>Registrasi Anggota</h6>
  <form method="post">
    <div class="mb-3">
      <label class="form-label mb-0">Nama Pengguna <span style="color: #FF0000;">*</span></label>
      <input type="text" name="nama_pengguna_akun" class="form-control rounded-0" placeholder="Antara 5 dan 16 karakter" required>
    </div>
    <div class="mb-3">
      <label class="form-label mb-0">Kata Sandi <span style="color: #FF0000;">*</span></label>
      <div class="input-group">
        <input type="password" name="kata_sandi_akun" class="form-control border-end-0 rounded-0" id="input-kata-sandi" placeholder="Antara 6 dan 16 karakter" required>
        <span class="input-group-text bg-white border-start-0 rounded-0" id="peralihan-kata-sandi" style="cursor: pointer;">
          <i id="kata-sandi" class="ri-eye-off-line"></i>
        </span>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label mb-0">Konfirmasi Sandi <span style="color: #FF0000;">*</span></label>
      <input type="password" name="kata_sandi_akun_2" class="form-control rounded-0" placeholder="Antara 6 dan 16 karakter" required>
    </div>
    <div class="mb-3">
      <label class="form-label mb-0">Nama Lengkap <span style="color: #FF0000;">*</span></label>
      <input type="text" name="nama_lengkap_akun" class="form-control rounded-0" required>
    </div>
    <div class="mb-3">
      <label class="form-label mb-0">Nomor Telepon <span style="color: #FF0000;">*</span></label>
      <input type="text" name="telepon_akun" class="form-control rounded-0" placeholder="08123xxxxxx" required>
    </div>
    <div class="mb-3">
      <label class="form-label mb-0">Kode Referral</label>
      <input type="text" name="kode_referensi_akun" class="form-control rounded-0" placeholder="Kosongkan jika tidak punya">
    </div>
    <button type="submit" name="daftar" class="btn mt-3 w-100" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">DAFTAR</button>
  </form>
</div>