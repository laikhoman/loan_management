<div class="row gy-5 gx-0 justify-content-center align-items-center">
  <?php
    $query_promosi = mysqli_query($koneksi, "SELECT * FROM promosi ORDER BY id_promosi DESC");
    while ($data_promosi = mysqli_fetch_array($query_promosi)) {
      $id_promosi = $data_promosi['id_promosi'];
      $gambar_promosi = $data_promosi['gambar_promosi'];
      $judul_promosi = $data_promosi['judul_promosi'];
      $detail_promosi = $data_promosi['detail_promosi'];
  ?>
  <div class="col-10">
    <img src="admin/assets/images/promosi/<?php echo $gambar_promosi; ?>" alt="<?php echo strtoupper($judul_promosi); ?>" class="w-100 h-auto mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <span style="font-size: 14px; font-weight: 700;"><?php echo strtoupper($judul_promosi); ?></span>
      <button type="button" class="btn btn-danger text-dark" id="promosi_<?php echo $id_promosi; ?>" style="font-size: 10px;">Klik untuk info lebih lanjut</button>
    </div>
    <div id="expand_promosi_<?php echo $id_promosi; ?>">
      <?php echo $detail_promosi; ?>
    </div>
  </div>
  <?php
    }
  ?>
</div>