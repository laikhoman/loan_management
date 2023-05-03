<?php
  if (isset($_POST['tambah_bank'])) {
    $jenis_rekening_anggota = $_POST['jenis_rekening_anggota'];
    $nomor_rekening_anggota = $_POST['nomor_rekening_anggota'];
    $nama_rekening_anggota = $_POST['nama_rekening_anggota'];
    $tambah_data = mysqli_query($koneksi, "INSERT INTO rekening_anggota (id_akun_rekening_anggota, jenis_rekening_anggota, nomor_rekening_anggota, nama_rekening_anggota) VALUES ('$id_akun_masuk', '$jenis_rekening_anggota', '$nomor_rekening_anggota', '$nama_rekening_anggota')");
    if ($tambah_data) {
      echo '
        <script>
          alert("Berhasil tambah rekening");
          window.location.replace("'.$alamat_website.'bank");
        </script>
      ';
    }
  }
?>

<div class="page-header-title">
  <span class="fs-6">Bank</span>
</div>
<div class="bg-light text-dark p-2">
  <div class="mt-3">
    <div class="row g-0 rounded border border-dark">
      <div class="col-3 text-center border-end border-dark py-2">
        <a href="<?php echo $alamat_website.'bank'; ?>" class="d-block text-dark">Akun Saya</a>
      </div>
      <div class="col-3 text-center border-end border-dark py-2">
        <a href="<?php echo $alamat_website.'deposit'; ?>" class="d-block text-dark">Deposit</a>
      </div>
      <div class="col-3 text-center border-end border-dark py-2">
        <a href="<?php echo $alamat_website.'transfer'; ?>" class="d-block text-dark">Transfer</a>
      </div>
      <div class="col-3 text-center py-2" style="background: #e6bc44;">
        <a href="<?php echo $alamat_website.'withdraw'; ?>" class="d-block text-dark">Withdraw</a>
      </div>
    </div>
  </div>
</div>
<div class="m-3 p-3 bg-light text-dark">
  <?php
    $rekening_anggota = mysqli_query($koneksi, "SELECT * FROM rekening_anggota WHERE id_akun_rekening_anggota = '$id_akun_masuk'");
    $jumlah_rekening_anggota = mysqli_num_rows($rekening_anggota);
    if ($jumlah_rekening_anggota > 0) {
      $data_rekening_anggota = mysqli_fetch_array($rekening_anggota);
      $id_rekening_anggota = $data_rekening_anggota['id_rekening_anggota'];
      $jenis_rekening_anggota = $data_rekening_anggota['jenis_rekening_anggota'];
      $nama_rekening_anggota = $data_rekening_anggota['nama_rekening_anggota'];
      $nomor_rekening_anggota = $data_rekening_anggota['nomor_rekening_anggota'];

      $sensor_nomor_rekening = str_repeat("x", strlen(substr($nomor_rekening_anggota, 0, strlen($nomor_rekening_anggota) - 4))).substr($nomor_rekening_anggota, -4);
      $sensor_nama_rekening = str_repeat("x", strlen(substr($nama_rekening_anggota, 0, strlen($nama_rekening_anggota) - 4))).substr($nama_rekening_anggota, -4);
  ?>
  <div class="mb-3">
    <label class="form-label">Saldo Saat Ini</label>
    <input type="text" class="form-control text-bg-secondary" value="<?php echo $total_saldo; ?>" disabled>
  </div>
  <div class="mb-3">
    <label class="form-label">Nominal Transfer <span style="color: #FF0000;">*</span></label>
    <input type="text" class="form-control" autocomplete="off" required>
    <small class="d-block text-secondary">Min : 10 / Max : 100,000</small>
    <small class="d-block text-secondary">IDR 1 = 1,000</small>
  </div>
  <div class="mb-3">
    <label class="form-label">Nama Bank</label>
    <input type="text" class="form-control text-bg-secondary" value="<?php echo $jenis_rekening_anggota; ?>" disabled>
  </div>
  <div class="mb-3">
    <label class="form-label">Nomor Rekening Bank</label>
    <input type="text" class="form-control text-bg-secondary" value="<?php echo $sensor_nomor_rekening; ?>" disabled>
  </div>
  <div class="mb-3">
    <label class="form-label">Nama Rekening Bank</label>
    <input type="text" class="form-control text-bg-secondary" value="<?php echo $sensor_nama_rekening; ?>" disabled>
  </div>
  <button type="button" class="btn w-100" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">KIRIM</button>
  <?php
    } else {
      echo '<script>window.location.replace("'.$alamat_website.'bank");</script>';
    }
  ?>
</div>