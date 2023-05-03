<div class="row gy-2 gx-0 mb-3">
  <div class="col-4">
    <a href="<?php echo $alamat_website.'akun_saya'; ?>" class="d-flex justify-content-center align-items-center text-uppercase bg-utama mx-3 p-2">
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
    <a href="<?php echo $alamat_website.'profil_saya'; ?>" class="d-flex justify-content-center align-items-center text-uppercase mx-3 p-2">
      <img src="admin/assets/images/svg/edit.svg" alt="Profil Saya" width="25" height="25" class="me-2">
      Profil Saya
    </a>
  </div>
</div>
<div class="row gx-0 gy-3 justify-content-center align-items-center mb-3">
    <div class="col-10 text-center bg-utama p-2">
      <span style="font-size: 18px;">Informasi Akun</span>
    </div>
    <div class="col-10 px-4" style="font-size: 16px;">
      <div class="row gx-0 gy-3">
        <div class="col-6 text-end pe-1">Nama Lengkap :</div>
        <div class="col-6"><?php echo $nama_lengkap_akun_masuk; ?></div>
        <div class="col-6 text-end pe-1">Email :</div>
        <div class="col-6"><?php echo $email_akun_masuk; ?></div>
        <div class="col-6 text-end pe-1">Nama Pengguna :</div>
        <div class="col-6"><?php echo $nama_pengguna_akun_masuk; ?></div>
      </div>
    </div>
    <div class="col-10 text-center bg-utama p-2">
      <span style="font-size: 18px;">Informasi Akun</span>
    </div>
    <div class="col-10 px-4">
      <?php
        $query_rekening_anggota = mysqli_query($koneksi, "SELECT * FROM rekening_anggota WHERE id_akun_rekening_anggota = '$id_akun_masuk'");
        while ($data_rekening_anggota = mysqli_fetch_array($query_rekening_anggota)) {
          $id_rekening_anggota = $data_rekening_anggota['id_rekening_anggota'];
          $id_rekening_rekening_anggota = $data_rekening_anggota['id_rekening_rekening_anggota'];
          $nama_rekening_anggota = $data_rekening_anggota['nama_rekening_anggota'];
          $nomor_rekening_anggota = $data_rekening_anggota['nomor_rekening_anggota'];

          $query_rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_anggota'");
          $data_rekening = mysqli_fetch_array($query_rekening);
          $kategori_rekening = $data_rekening['kategori_rekening'];
          $jenis_rekening = $data_rekening['jenis_rekening'];
      ?>
      <div class="bank-info d-block rounded p-2 mb-3">
        <div class="d-flex justify-content-between align-items-center" style="font-size: 16px;">
          <span class="text-uppercase"><?php echo $nama_rekening_anggota; ?></span>
          <span class="text-uppercase"><?php echo $jenis_rekening; ?></span>
        </div>
        <div class="mt-1" id="target-salin-<?php echo $id_rekening_anggota; ?>" style="font-size: 20px; letter-spacing: 5px;"><?php echo $nomor_rekening_anggota; ?></div>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
          <span style="color: #D0B300; visibility: hidden;">Biaya Admin: 0</span>
          <div class="d-flex justify-content-center align-items-center" id="tombol-salin-<?php echo $id_rekening_anggota; ?>" style="cursor: pointer;">
            <span class="ri-file-fill me-1" id="ikon-salin-<?php echo $id_rekening_anggota; ?>"></span>
            <span id="text-tombol-salin-<?php echo $id_rekening_anggota; ?>">SALIN</span>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
</div>