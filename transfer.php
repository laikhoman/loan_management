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
      <div class="col-3 text-center border-end border-dark py-2">
        <a href="<?php echo $alamat_website.'deposit'; ?>" class="d-block text-dark">Deposit</a>
      </div>
      <div class="col-3 text-center border-end border-dark py-2" style="background: #e6bc44;">
        <a href="<?php echo $alamat_website.'transfer'; ?>" class="d-block text-dark">Transfer</a>
      </div>
      <div class="col-3 text-center py-2">
        <a href="<?php echo $alamat_website.'withdraw'; ?>" class="d-block text-dark">Withdraw</a>
      </div>
    </div>
  </div>
</div>
<div class="m-3 p-3 bg-light text-dark">
  <div class="mb-3">
    <label class="form-label">Dari</label>
    <select class="form-select">
      <option selected>- PILIH -</option>
      <?php
        $sub_menu_games = mysqli_query($koneksi, "SELECT * FROM sub_menu_games");
        while ($data_sub_menu_games = mysqli_fetch_array($sub_menu_games)) {
          $judul_sub_menu_games = $data_sub_menu_games['judul_sub_menu_games'];
          echo '<option>'.$judul_sub_menu_games.'</option>';
        }
      ?>
    </select>
    <div class="text-bg-secondary rounded mt-1 p-1">0.00</div>
  </div>
  <div class="mx-auto" style="width: fit-content; transform: rotate(-0.25turn);"><i class="ri-repeat-line text-secondary fs-1"></i></div>
  <div class="mb-3">
    <label class="form-label">Tujuan</label>
    <select class="form-select">
      <option selected>- PILIH -</option>
      <?php
        $sub_menu_games = mysqli_query($koneksi, "SELECT * FROM sub_menu_games");
        while ($data_sub_menu_games = mysqli_fetch_array($sub_menu_games)) {
          $judul_sub_menu_games = $data_sub_menu_games['judul_sub_menu_games'];
          echo '<option>'.$judul_sub_menu_games.'</option>';
        }
      ?>
    </select>
    <div class="text-bg-secondary rounded mt-1 p-1">0.00</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Nominal Transfer</label>
    <input type="text" class="form-control" value="0" autocomplete="off" required>
  </div>
  <button type="button" class="btn w-100 mb-3" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">ULANGI</button>
  <button type="button" class="btn w-100" style="background: linear-gradient(to bottom, #e7eff1 0%, #bfbfbf 99%);">KIRIM</button>
</div>