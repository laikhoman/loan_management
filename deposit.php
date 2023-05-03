<?php
  if (isset($_POST['deposit'])) {
    $kode_deposit = generatorRangkaianAcak(10);
    $id_rekening_anggota = $_POST['id_rekening_anggota'];
    $id_rekening_admin = $_POST['id_rekening_admin'];
    $jumlah_deposit = $_POST['jumlah_deposit'];
    $tanggal_deposit = date("Y-m-d H:i:s");
    $tambah_data = mysqli_query($koneksi, "INSERT INTO deposit (id_akun_deposit, kode_deposit, id_rekening_anggota_deposit, id_rekening_admin_deposit, jumlah_deposit, tanggal_deposit) VALUES ('$id_akun_masuk', '$kode_deposit', '$id_rekening_anggota', '$id_rekening_admin', '$jumlah_deposit', '$tanggal_deposit')");
    if ($tambah_data) {
      echo '
        <script>
          alert("Berhasil melakukan deposit");
          window.location.replace("'.$alamat_website.'");
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
      <div class="col-3 text-center border-end border-dark py-2" style="background: #e6bc44;">
        <a href="<?php echo $alamat_website.'deposit'; ?>" class="d-block text-dark">Deposit</a>
      </div>
      <div class="col-3 text-center border-end border-dark py-2">
        <a href="<?php echo $alamat_website.'transfer'; ?>" class="d-block text-dark">Transfer</a>
      </div>
      <div class="col-3 text-center py-2">
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
  <form method="post">
    <div class="mb-3">
      <input type="hidden" name="id_rekening_anggota" value="<?php echo $id_rekening_anggota; ?>">
      <label class="form-label">Tujuan <span style="color: #FF0000;">*</span></label>
      <select class="form-select" name="id_rekening_admin">
        <?php
          $rekening_admin = mysqli_query($koneksi, "SELECT * FROM rekening_admin");
          while ($data_rekening_admin = mysqli_fetch_array($rekening_admin)) {
            $id_rekening_admin = $data_rekening_admin['id_rekening_admin'];
            $jenis_rekening_admin = $data_rekening_admin['jenis_rekening_admin'];
            $nama_rekening_admin = $data_rekening_admin['nama_rekening_admin'];
            $nomor_rekening_admin = $data_rekening_admin['nomor_rekening_admin'];
            echo '<option value="'.$id_rekening_admin.'">'.$jenis_rekening_admin.' - '.$nama_rekening_admin.' - '.$nomor_rekening_admin.'</option>';
          }
        ?>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Nominal Transfer <span style="color: #FF0000;">*</span></label>
      <small class="d-block">(Silahkan pilih nominal dari tombol atau masukkan secara manual)</small>
      <div class="row g-1 my-1">
        <div class="col-4">
          <button type="button" class="btn w-100" id="50" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">50</button>
        </div>
        <div class="col-4">
          <button type="button" class="btn w-100" id="200" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">200</button>
        </div>
        <div class="col-4">
          <button type="button" class="btn w-100" id="1000" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">1000</button>
        </div>
      </div>
      <input type="text" name="jumlah_deposit" id="hanya-angka" class="form-control" autocomplete="off" required>
      <small class="d-block text-secondary">Min : 10 / Max : 100,000</small>
      <small class="d-block text-secondary">IDR 1 = 1,000</small>
    </div>
    <div class="mb-3">
      <label class="form-label">Nominal Asli</label>
      <input type="text" id="nominal" class="form-control text-bg-secondary" value="0" autocomplete="off" disabled required>
    </div>
    <div class="mb-3">
      <label class="form-label">Berita</label>
      <textarea class="form-control text-secondary" rows="5" readonly>Tambahkan 3 digit kode unik dibelakang nominal deposit. Contoh: 10,573</textarea>
    </div>
    <button type="button" class="btn w-100 mb-3" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">ULANGI</button>
    <button type="submit" name="deposit" class="btn w-100" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">KIRIM</button>
  </form>
  <?php
    } else {
      echo '<script>window.location.replace("'.$alamat_website.'bank");</script>';
    }
  ?>
</div>