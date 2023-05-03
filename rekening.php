<?php
  if (isset($_GET['kategori_rekening'])) {
    $kategori_rekening_aktif = $_GET['kategori_rekening'];
  } else {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'rekening/bank");
      </script>
    ';
  }
  if (isset($_POST['tambah_rekening'])) {
    $kategori_rekening_anggota = $kategori_rekening_aktif;
    $id_rekening_rekening_anggota = $_POST['id_rekening_rekening_anggota'];
    $nama_rekening_anggota = $_POST['nama_rekening_anggota'];
    $nomor_rekening_anggota = $_POST['nomor_rekening_anggota'];
    $tambah_rekening = mysqli_query($koneksi, "INSERT INTO rekening_anggota (id_akun_rekening_anggota, kategori_rekening_anggota, id_rekening_rekening_anggota, nama_rekening_anggota, nomor_rekening_anggota) VALUES ('$id_akun_masuk', '$kategori_rekening_anggota', '$id_rekening_rekening_anggota', '$nama_rekening_anggota', '$nomor_rekening_anggota')");
    if ($tambah_rekening) {
      echo '
        <script>
          alert("Informasi rekening ('.$kategori_rekening_aktif.') berhasil ditambahkan !");
          window.location.replace("'.$alamat_website.'rekening/'.$kategori_rekening_aktif.'");
        </script>
      ';
    } else {
      echo "Proses Gagal<br>Error : ".$tambah_rekening."<br>".mysqli_error($koneksi);
    }
  }
?>

<form method="post">
  <div class="bg-dark rounded p-2 mb-3">
    <div class="row g-2">
      <div class="col-4">
        <a href="<?php echo $alamat_website.'rekening/bank'; ?>">
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
      <div class="col-4">
        <a href="<?php echo $alamat_website.'rekening/emoney'; ?>">
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
      <div class="col-4">
        <a href="<?php echo $alamat_website.'rekening/pulsa'; ?>">
          <?php
            if ($kategori_rekening_aktif == "pulsa") {
              echo '<div class="d-flex flex-column align-items-center kotak-pembayaran-aktif rounded p-2">';
            } else {
              echo '<div class="d-flex flex-column align-items-center kotak-pembayaran rounded p-2">';
            }
          ?>
            <img src="admin/assets/images/svg/pulsa.svg" alt="Bank" width="25" height="25">
            <span style="font-size: 14px;">Pulsa</span>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row gx-0 gy-3 justify-content-center align-items-center mb-3">
    <div class="col-10 text-center bg-utama p-2">
      <span style="font-size: 18px;">Informasi Rekening (<?php echo ucfirst($kategori_rekening_aktif); ?>)</span>
    </div>
    <div class="col-10 px-4">
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Pilih Jenis Rekening <span style="color: #FF0000;">*</span></label>
        <select class="form-select form-select-sm rounded-0" name="id_rekening_rekening_anggota" required style="font-size: 12px;">
          <option selected>-- Pilih Jenis Rekening --</option>
          <?php
            $query_rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE kategori_rekening = '$kategori_rekening_aktif'");
            while ($data_rekening = mysqli_fetch_array($query_rekening)) {
              $id_rekening = $data_rekening['id_rekening'];
              $jenis_rekening = $data_rekening['jenis_rekening'];
              echo '<option value="'.$id_rekening.'">'.$jenis_rekening.'</option>';
            }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Nama Rekening <span style="color: #FF0000;">*</span></label>
        <input type="text" name="nama_rekening_anggota" class="form-control form-control-sm rounded-0 syarat-nama-rekening" value="<?php echo $nama_lengkap_akun_masuk; ?>" required readonly>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Nomor Rekening <span style="color: #FF0000;">*</span></label>
        <input type="text" name="nomor_rekening_anggota" class="form-control form-control-sm rounded-0" id="hanya-angka-2" placeholder="Nomor rekening anda" required>
      </div>
    </div>
    <div class="col-10 px-4">
      <button type="submit" name="tambah_rekening" class="btn btn-danger rounded-pill text-uppercase py-3 w-100" style="font-size: 12px;">Tambah Akun</button>
    </div>
  </div>
  <div class="row gx-0 gy-3 justify-content-center align-items-center mb-3">
    <div class="col-10 text-center bg-utama p-2">
      <span style="font-size: 18px;">Akun Rekening (<?php echo ucfirst($kategori_rekening_aktif); ?>)</span>
    </div>
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

          $strlen_nomor_rekening_anggota = strlen($nomor_rekening_anggota);
          $pengurangan_strlen_nomor_rekening_anggota = $strlen_nomor_rekening_anggota - 4;
          $substr_belakang_nomor_rekening_anggota = substr($nomor_rekening_anggota, $pengurangan_strlen_nomor_rekening_anggota, 4);
          $substr_depan_nomor_rekening_anggota = substr($nomor_rekening_anggota, 0, $pengurangan_strlen_nomor_rekening_anggota);
          $sensor_angka = strlen($substr_depan_nomor_rekening_anggota);
          for ($i = 0; $i < $sensor_angka; $i++) {
            if (is_numeric($substr_depan_nomor_rekening_anggota[$i])) {
              $substr_depan_nomor_rekening_anggota[$i] = '*';
            }
          }
          $sensor_nomor_rekening_anggota = $substr_depan_nomor_rekening_anggota;
    ?>
    <div class="col-10 px-4">
      <div class="bg-utama p-2" style="font-size: 16px;">
        <span class="d-block">Jenis Rekening : <?php echo $jenis_rekening; ?></span>
        <span class="d-block">Nama Rekening : <?php echo $nama_rekening_anggota; ?></span>
        <span class="d-block">Nomor Rekening : <?php echo $sensor_nomor_rekening_anggota.$substr_belakang_nomor_rekening_anggota; ?></span>
      </div>
    </div>
    <?php
        }
      } else {
    ?>
    <div class="col-10 px-4">
      <div class="bg-utama text-center p-2" style="font-size: 16px;">
        Tidak ada data.
      </div>
    </div>
    <?php
      }
    ?>
  </div>
</form>