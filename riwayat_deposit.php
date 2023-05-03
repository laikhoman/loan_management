<?php
  if (isset($_POST['cari_riwayat_deposit'])) {
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    echo '
      <script>
        window.location.replace("'.$alamat_website.'riwayat_deposit/filter/'.$tanggal_awal.'/'.$tanggal_akhir.'");
      </script>
    ';
  }
?>

<form method="post">
  <div class="row gy-3 gx-0 mb-3">
    <div class="col-6">
      <a href="<?php echo $alamat_website.'deposit'; ?>" class="d-flex justify-content-center align-items-center text-uppercase bg-utama mx-3 p-2">
        <img src="admin/assets/images/svg/deposit.svg" alt="Deposit" width="25" height="25" class="me-2">
        Riwayat Deposit
      </a>
    </div>
    <div class="col-6">
      <a href="<?php echo $alamat_website; ?>" class="d-flex justify-content-center align-items-center text-uppercase mx-3 p-2">
        <img src="admin/assets/images/svg/withdrawal.svg" alt="Deposit" width="25" height="25" class="me-2">
        Riwayat Penarikan
      </a>
    </div>
    <div class="col-6 ps-2 pe-1">
      <span class="d-block mb-2" style="font-size: 14px;">Tanggal Awal</span>
      <input type="text" name="tanggal_awal" class="form-control rounded-pill tanggal-awal" value="<?php echo date("Y-m-d"); ?>" style="font-size: 12px;">
    </div>
    <div class="col-6 ps-1 pe-2">
      <span class="d-block mb-2" style="font-size: 14px;">Tanggal Akhir</span>
      <input type="text" name="tanggal_akhir" class="form-control rounded-pill tanggal-awal" value="<?php echo date("Y-m-d"); ?>" style="font-size: 12px;">
    </div>
    <div class="col-12 px-2">
      <button type="submit" name="cari_riwayat_deposit" class="btn btn-danger rounded-pill text-uppercase py-2 w-100" style="font-size: 12px;">Cari</button>
    </div>
  </div>
</form>
<div class="table-responsive p-2">
  <table class="table table-dark table-bordered align-middle" id="riwayat" style="width:100%">
    <thead>
      <tr>
        <th scope="col">Kode</th>
        <th scope="col">Jenis Pembayaran</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Nomor Referensi</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if (isset($_GET['tanggal_awal']) || isset($_GET['tanggal_akhir'])) {
          $tanggal_awal = $_GET['tanggal_awal'];
          $tanggal_akhir = $_GET['tanggal_akhir'];
          $deposit = mysqli_query($koneksi, "SELECT * FROM deposit WHERE id_akun_deposit = '$id_akun_masuk' AND tanggal_deposit BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY id_deposit DESC");
        } else {
          $deposit = mysqli_query($koneksi, "SELECT * FROM deposit WHERE id_akun_deposit = '$id_akun_masuk' ORDER BY id_deposit DESC");
        }
        while ($data_deposit = mysqli_fetch_array($deposit)) {
          $id_deposit = $data_deposit['id_deposit'];
          $kode_deposit = $data_deposit['kode_deposit'];
          $kategori_rekening_deposit = $data_deposit['kategori_rekening_deposit'];
          $id_rekening_anggota_deposit = $data_deposit['id_rekening_anggota_deposit'];
          $id_rekening_admin_deposit = $data_deposit['id_rekening_admin_deposit'];
          $jumlah_deposit = $data_deposit['jumlah_deposit'];
          $nomor_referensi_deposit = $data_deposit['nomor_referensi_deposit'];
          $tanggal_deposit = $data_deposit['tanggal_deposit'];
          $status_deposit = $data_deposit['status_deposit'];

          $explode_tanggal = explode(" ", $tanggal_deposit);
          $tanggal_deposit_fix = $explode_tanggal[0];
          $jam_deposit_fix = $explode_tanggal[1];
      ?>
      <tr>
        <th scope="row"><?php echo $kode_deposit; ?></th>
        <td><?php echo strtoupper($kategori_rekening_deposit); ?></td>
        <td><?php echo number_format($jumlah_deposit); ?></td>
        <td><?php echo $nomor_referensi_deposit; ?></td>
        <td><?php echo jamTanggalIndonesia($tanggal_deposit, true); ?></td>
        <td>
          <?php
            if ($status_deposit == "proses") {
              echo '<span class="text-warning">Proses</span>';
            } else if ($status_deposit == "batal") {
              echo '<span class="text-danger">Batal</span>';
            } else if ($status_deposit == "selesai") {
              echo '<span class="text-success">Selesai</span>';
            }
          ?>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>