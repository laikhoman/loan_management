<?php
  if (isset($_GET['kategori_rekening'])) {
    $kategori_rekening_aktif = $_GET['kategori_rekening'];
  } else {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'penarikan/bank");
      </script>
    ';
  }
  if (isset($_POST['tarik'])) {
    echo '
      <script>
        alert("Berhasil melakukan penarikan !");
        window.location.replace("'.$alamat_website.'");
      </script>
    ';
  }
?>

<form method="post">
  <div class="row gy-2 gx-0">
    <div class="col-6">
      <a href="<?php echo $alamat_website.'deposit'; ?>" class="d-flex justify-content-center align-items-center text-uppercase mx-3 p-2">
        <img src="admin/assets/images/svg/deposit.svg" alt="Deposit" width="25" height="25" class="me-2">
        Deposit
      </a>
    </div>
    <div class="col-6">
      <a href="<?php echo $alamat_website.'penarikan'; ?>" class="d-flex justify-content-center align-items-center text-uppercase bg-utama mx-3 p-2">
        <img src="admin/assets/images/svg/withdrawal.svg" alt="Deposit" width="25" height="25" class="me-2">
        Penarikan
      </a>
    </div>
  </div>
  <div class="row gy-2 gx-0 d-flex justify-content-center align-items-center mt-5">
    <div class="col-10">
      <div class="deposit-note">
        <div class="deposit-note-icon">
          <img src="admin/assets/images/svg/deposit-note.svg" alt="Deposit Note">
        </div>
        <div class="deposit-note-content">
          <span>Catatan:</span>
          <ol>
            <li>Jika ada beberapa perubahan dalam jadwal offline bank ini bukan otoritas kami.</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="col-10">
      <a href="<?php echo $alamat_website; ?>" class="d-block text-center text-secondary text-decoration-underline" style="font-size: 14px;">Riwayat Penarikan</a>
    </div>
    <div class="col-10">
      <div class="d-flex justify-content-between align-items-center">
        <a href="<?php echo $alamat_website.'rekening/'.$kategori_rekening_aktif; ?>" class="d-flex align-items-center text-secondary" style="font-size: 16px;">
          <i class="ri-add-line fw-bold"></i>
          AKUN
        </a>
        <div class="d-flex flex-column align-items-end">
          <span class="text-secondary">TOTAL SALDO</span>
          <span style="color: #00FF00;"><?php echo number_format($total_saldo).'.00'; ?></span>
        </div>
      </div>
    </div>
    <div class="col-10">
      <div class="bg-dark rounded p-2">
        <span class="d-block mb-2" style="font-size: 14px;">Metode Pembayaran</span>
        <div class="row g-2">
          <div class="col-6">
            <a href="<?php echo $alamat_website.'penarikan/bank'; ?>">
              <?php
                if ($kategori_rekening_aktif == "bank") {
                  echo '<div class="d-flex flex-column align-items-center kotak-pembayaran-aktif rounded p-2">';
                } else {
                  echo '<div class="d-flex flex-column align-items-center kotak-pembayaran rounded p-2">';
                }
              ?>
                <img src="admin/assets/images/svg/bank.svg" alt="Bank" width="25" height="25">
                <span style="font-size: 14px;">Bank</span>
              </div>
            </a>
          </div>
          <div class="col-6">
            <a href="<?php echo $alamat_website.'penarikan/emoney'; ?>">
              <?php
                if ($kategori_rekening_aktif == "emoney") {
                  echo '<div class="d-flex flex-column align-items-center kotak-pembayaran-aktif rounded p-2">';
                } else {
                  echo '<div class="d-flex flex-column align-items-center kotak-pembayaran rounded p-2">';
                }
              ?>
                <img src="admin/assets/images/svg/emoney.svg" alt="Bank" width="25" height="25">
                <span style="font-size: 14px;">E-Money</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-10">
      <div class="bg-dark rounded p-2">
        <span class="d-block mb-2" style="font-size: 14px;">Jumlah</span>
        <input type="text" name="jumlah_deposit" class="form-control rounded-0 border-0 mb-2" id="hanya-angka" autocomplete="off" required>
        <span class="d-block" id="notif-nominal" style="color: #FF0000;">Silahkan masukan angka untuk jumlah penarikan.</span>
        <span class="d-block" id="nominal" style="font-size: 24px;">0 (IDR)</span>
      </div>
    </div>
    <div class="col-10">
      <div class="bg-dark rounded p-2">
        <span class="d-block mb-2" style="font-size: 14px;">Pilih <?php echo ucfirst($kategori_rekening_aktif); ?> Anda</span>
        <select class="form-select rounded-0 mb-3" id="rekening-admin" name="id_rekening_admin_deposit" style="font-size: 12px;" required>
          <option>-- Pilih <?php echo ucfirst($kategori_rekening_aktif); ?> Anda --</option>
          <?php
            $query_rekening_anggota = mysqli_query($koneksi, "SELECT * FROM rekening_anggota WHERE id_akun_rekening_anggota = '$id_akun_masuk' AND kategori_rekening_anggota = '$kategori_rekening_aktif'");
            $cek_rekening_anggota = mysqli_num_rows($query_rekening_anggota);
            if ($cek_rekening_anggota > 0) {
              while ($data_rekening_anggota = mysqli_fetch_array($query_rekening_anggota)) {
                $id_rekening_anggota = $data_rekening_anggota['id_rekening_anggota'];
                $id_rekening_rekening_anggota = $data_rekening_anggota['id_rekening_rekening_anggota'];
                $nama_rekening_anggota = $data_rekening_anggota['nama_rekening_anggota'];
                $nomor_rekening_anggota = $data_rekening_anggota['nomor_rekening_anggota'];

                $query_rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_anggota'");
                $data_rekening = mysqli_fetch_array($query_rekening);
                $kategori_rekening = $data_rekening['kategori_rekening'];
                $jenis_rekening = $data_rekening['jenis_rekening'];

                echo '<option value="'.$id_rekening_anggota.'">'.$jenis_rekening.' | '.$nomor_rekening_anggota.'</option>';
              }
            } else {
              echo '
                <script>
                  alert("Anda tidak memiliki akun rekening '.$kategori_rekening_aktif.', anda akan di alihkan ke halaman penambahan akun rekening '.$kategori_rekening_aktif.' !");
                  window.location.replace("'.$alamat_website.'rekening/'.$kategori_rekening_aktif.'");
                </script>
              ';
            }
          ?>
        </select>
        <?php
          $query_rekening_anggota = mysqli_query($koneksi, "SELECT * FROM rekening_anggota WHERE kategori_rekening_anggota = '$kategori_rekening_aktif'");
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
        <div class="bank-info rounded p-2" id="rekening-admin-<?php echo $id_rekening_anggota; ?>">
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
    <div class="col-10">
      <button type="submit" name="tarik" class="btn btn-danger w-100 text-uppercase py-3" style="font-size: 12px;">Tarik</button>
    </div>
  </div>
</form>