<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Dasbor</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item active" id="waktu_sekarang"><?php echo jamTanggalIndonesia(date("Y-m-d H:i:s"), true); ?></li>
        </ol>
      </div>

    </div>
  </div>
  <div class="col">
    <div class="h-100">
      <div class="row">
        <div class="col-12">
          <!-- card -->
          <div class="card card-animate">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                  <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Deposit</p>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                  <?php
                    $deposit = mysqli_query($koneksi, "SELECT *,SUM(jumlah_deposit) AS total_deposit FROM deposit");
                    $data_deposit = mysqli_fetch_array($deposit);
                    $total_deposit = $data_deposit['total_deposit'];
                  ?>
                  <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp. <span class="counter-value" data-target="<?php echo $total_deposit; ?>">0</span>,-</h4>
                  <a href="<?php echo $alamat_website.'admin/deposit'; ?>" class="text-decoration-underline">Lihat detail data</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                  <span class="avatar-title bg-soft-primary rounded fs-3">
                    <i class="ri-money-dollar-circle-fill text-primary"></i>
                  </span>
                </div>
              </div>
            </div><!-- end card body -->
          </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-lg-3 col-md-6">
          <!-- card -->
          <div class="card card-animate">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                  <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Anggota</p>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                  <?php
                    $anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE level_akun = 'Anggota'");
                    $jumlah_anggota = mysqli_num_rows($anggota);
                  ?>
                  <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $jumlah_anggota; ?>">0</span></h4>
                  <a href="<?php echo $alamat_website.'admin/anggota'; ?>" class="text-decoration-underline">Lihat detail data</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                  <span class="avatar-title bg-soft-primary rounded fs-3">
                    <i class="ri-user-fill text-primary"></i>
                  </span>
                </div>
              </div>
            </div><!-- end card body -->
          </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-lg-3 col-md-6">
          <!-- card -->
          <div class="card card-animate">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                  <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Games</p>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                  <?php
                    $games = mysqli_query($koneksi, "SELECT * FROM games");
                    $jumlah_games = mysqli_num_rows($games);
                  ?>
                  <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $jumlah_games; ?>">0</span></h4>
                  <a href="<?php echo $alamat_website.'admin/games'; ?>" class="text-decoration-underline">Lihat detail data</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                  <span class="avatar-title bg-soft-primary rounded fs-3">
                    <i class="ri-gamepad-fill text-primary"></i>
                  </span>
                </div>
              </div>
            </div><!-- end card body -->
          </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-lg-3 col-md-6">
          <!-- card -->
          <div class="card card-animate">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                  <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Promosi</p>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                  <?php
                    $promosi = mysqli_query($koneksi, "SELECT * FROM promosi");
                    $jumlah_promosi = mysqli_num_rows($promosi);
                  ?>
                  <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $jumlah_promosi; ?>">0</span></h4>
                  <a href="<?php echo $alamat_website.'admin/promosi'; ?>" class="text-decoration-underline">Lihat detail data</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                  <span class="avatar-title bg-soft-primary rounded fs-3">
                    <i class="ri-fire-fill text-primary"></i>
                  </span>
                </div>
              </div>
            </div><!-- end card body -->
          </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-lg-3 col-md-6">
          <!-- card -->
          <div class="card card-animate">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                  <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Pengunjung</p>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                  <?php
                    $pengunjung = mysqli_query($koneksi, "SELECT * FROM pengunjung");
                    $jumlah_pengunjung = mysqli_num_rows($pengunjung);
                  ?>
                  <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $jumlah_pengunjung; ?>">0</span></h4>
                  <a href="<?php echo $alamat_website.'admin/pengunjung'; ?>" class="text-decoration-underline" style="visibility: hidden;">Lihat detail data</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                  <span class="avatar-title bg-soft-primary rounded fs-3">
                    <i class="ri-fire-fill text-primary"></i>
                  </span>
                </div>
              </div>
            </div><!-- end card body -->
          </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-12">
          <!-- card -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="text-uppercase fw-medium text-muted text-truncate mb-2 mb-md-0">
                  <?php
                    if (isset($_GET['bulan_ini']) || isset($_GET['tahun_ini'])) {
                      $bulan_ini = $_GET['bulan_ini'];
                      $tahun_ini = $_GET['tahun_ini'];
                      echo 'Statistik Pengunjung ('.bulanIni($bulan_ini).' '.$tahun_ini.')';
                    } else {
                      echo 'Statistik Pengunjung ('.bulanIni(date("n")).' '.date("Y").')';
                    }
                  ?>
                </div>
                <form method="post">
                  <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
                    <div class="me-2 mb-2 mb-md-0 text-nowrap">Filter : </div>
                    <div class="me-2 mb-2 mb-md-0 w-100">
                      <select class="form-select" name="bulan_pengunjung" required>
                        <option selected>Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                    </div>
                    <div class="me-2 mb-2 mb-md-0 w-100">
                      <input type="text" name="tahun_pengunjung" class="form-control" id="input-tahun" placeholder="Tahun" autocomplete="off" required>
                    </div>
                    <button type="submit" name="filter_pengunjung" class="btn btn-primary">Terapkan</button>
                  </div>
                </form>
              </div>
              <div class="mt-4">
                <canvas id="chart_pengunjung" class="chartjs-chart"></canvas>
              </div>
            </div><!-- end card body -->
          </div><!-- end card -->
        </div><!-- end col -->
      </div>
    </div>
  </div>
</div>