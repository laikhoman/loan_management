<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Deposit</h4>
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
          <div class="card">
            <div class="card-body">
              <table id="datatables" class="table table-hover table-striped nowrap align-middle" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Asal</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Nomor Referensi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $deposit = mysqli_query($koneksi, "SELECT * FROM deposit");
                    while ($data_deposit = mysqli_fetch_array($deposit)) {
                      $id_deposit = $data_deposit['id_deposit'];
                      $id_akun_deposit = $data_deposit['id_akun_deposit'];
                      $kode_deposit = $data_deposit['kode_deposit'];
                      $kategori_rekening_deposit = $data_deposit['kategori_rekening_deposit'];
                      $id_rekening_anggota_deposit = $data_deposit['id_rekening_anggota_deposit'];
                      $id_rekening_admin_deposit = $data_deposit['id_rekening_admin_deposit'];
                      $jumlah_deposit = $data_deposit['jumlah_deposit'];
                      $nomor_referensi_deposit = $data_deposit['nomor_referensi_deposit'];
                      $tanggal_deposit = $data_deposit['tanggal_deposit'];
                      $status_deposit = $data_deposit['status_deposit'];

                      $akun_deposit = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$id_akun_deposit'");
                      $data_akun_deposit = mysqli_fetch_array($akun_deposit);
                      $nama_lengkap_akun_deposit = $data_akun_deposit['nama_lengkap_akun'];

                      $rekening_anggota_deposit = mysqli_query($koneksi, "SELECT * FROM rekening_anggota WHERE id_rekening_anggota = '$id_rekening_anggota_deposit'");
                      $data_rekening_anggota_deposit = mysqli_fetch_array($rekening_anggota_deposit);
                      $kategori_rekening_anggota_deposit = $data_rekening_anggota_deposit['kategori_rekening_anggota'];
                      $id_rekening_rekening_anggota_deposit = $data_rekening_anggota_deposit['id_rekening_rekening_anggota'];
                      $nama_rekening_anggota_deposit = $data_rekening_anggota_deposit['nama_rekening_anggota'];
                      $nomor_rekening_anggota_deposit = $data_rekening_anggota_deposit['nomor_rekening_anggota'];
                      $rekening_anggota = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_anggota_deposit'");
                      $data_rekening_anggota = mysqli_fetch_array($rekening_anggota);
                      $jenis_rekening_anggota = $data_rekening_anggota['jenis_rekening'];

                      $rekening_admin_deposit = mysqli_query($koneksi, "SELECT * FROM rekening_admin WHERE id_rekening_admin = '$id_rekening_admin_deposit'");
                      $data_rekening_admin_deposit = mysqli_fetch_array($rekening_admin_deposit);
                      $kategori_rekening_admin_deposit = $data_rekening_admin_deposit['kategori_rekening_admin'];
                      $id_rekening_rekening_admin_deposit = $data_rekening_admin_deposit['id_rekening_rekening_admin'];
                      $nama_rekening_admin_deposit = $data_rekening_admin_deposit['nama_rekening_admin'];
                      $nomor_rekening_admin_deposit = $data_rekening_admin_deposit['nomor_rekening_admin'];
                      $rekening_admin = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_admin_deposit'");
                      $data_rekening_admin = mysqli_fetch_array($rekening_admin);
                      $jenis_rekening_admin = $data_rekening_admin['jenis_rekening'];
                  ?>
                  <tr>
                    <td><?php echo $kode_deposit; ?></td>
                    <td><?php echo $nama_lengkap_akun_deposit; ?></td>
                    <td>
                      <?php
                        if ($kategori_rekening_deposit == "bank") {
                          echo 'Bank';
                        } else if ($kategori_rekening_deposit == "emoney") {
                          echo 'E-Money';
                        } else {
                          echo 'Pulsa';
                        }
                      ?>
                    </td>
                    <td>
                      <a href="#data_asal_<?php echo $id_deposit; ?>" data-bs-toggle="modal">
                        <i class="ri-search-line fw-bold me-1"></i>
                        Lihat Data
                      </a>
                    </td>
                    <td>
                      <a href="#data_tujuan_<?php echo $id_deposit; ?>" data-bs-toggle="modal">
                        <i class="ri-search-line fw-bold me-1"></i>
                        Lihat Data
                      </a>
                    </td>
                    <td><?php echo number_format($jumlah_deposit); ?></td>
                    <td><?php echo $nomor_referensi_deposit; ?></td>
                    <td><?php echo jamTanggalIndonesia($tanggal_deposit, true); ?></td>
                    <td>
                      <?php
                        if ($status_deposit == "proses") {
                          echo '<span class="badge bg-warning">Proses</span>';
                        } else if ($status_deposit == "batal") {
                          echo '<span class="badge bg-danger">Batal</span>';
                        } else {
                          echo '<span class="badge bg-primary">Selesai</span>';
                        }
                      ?>
                    </td>
                    <td>
                      <div class="dropdown d-inline-block dropstart">
                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ri-settings-3-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end me-2">
                          <?php
                            if ($status_deposit == "proses") {
                          ?>
                          <li>
                            <a href="#batalkan_<?php echo $id_deposit; ?>" class="dropdown-item edit-item-btn" data-bs-toggle="modal">
                              <i class="ri-close-fill fw-bold align-bottom me-2 text-muted"></i>
                              Batalkan
                            </a>
                          </li>
                          <li>
                            <a href="#selesaikan_<?php echo $id_deposit; ?>" class="dropdown-item edit-item-btn" data-bs-toggle="modal">
                              <i class="ri-check-fill fw-bold align-bottom me-2 text-muted"></i>
                              Selesaikan
                            </a>
                          </li>
                          <?php
                            } else if ($status_deposit == "batal") {
                          ?>
                          <li>
                            <a href="#selesaikan_<?php echo $id_deposit; ?>" class="dropdown-item edit-item-btn" data-bs-toggle="modal">
                              <i class="ri-check-fill fw-bold align-bottom me-2 text-muted"></i>
                              Selesaikan
                            </a>
                          </li>
                          <?php
                            } else if ($status_deposit == "selesai") {
                          ?>
                          <li>
                            <a href="#batalkan_<?php echo $id_deposit; ?>" class="dropdown-item edit-item-btn" data-bs-toggle="modal">
                              <i class="ri-close-fill fw-bold align-bottom me-2 text-muted"></i>
                              Batalkan
                            </a>
                          </li>
                          <?php
                            }
                          ?>
                          <li>
                            <a href="#hapus_data_<?php echo $id_deposit; ?>" class="dropdown-item remove-item-btn" data-bs-toggle="modal">
                              <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                              Hapus Data
                            </a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Asal Data -->
                  <div id="data_asal_<?php echo $id_deposit; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Data Asal</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <div class="modal-body">
                          <span class="d-block text-muted">Jenis Rekening : <span class="fw-bold text-primary"><?php echo $jenis_rekening_anggota; ?></span></span>
                          <span class="d-block text-muted">Nama Rekening : <span class="fw-bold text-primary"><?php echo $nama_rekening_anggota_deposit; ?></span></span>
                          <span class="d-block text-muted">Nomor Rekening : <span class="fw-bold text-primary"><?php echo $nomor_rekening_anggota_deposit; ?></span></span>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  <!-- Modal Tujuan Data -->
                  <div id="data_tujuan_<?php echo $id_deposit; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Data Tujuan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <div class="modal-body">
                          <span class="d-block text-muted">Jenis Rekening : <span class="fw-bold text-primary"><?php echo $jenis_rekening_admin; ?></span></span>
                          <span class="d-block text-muted">Nama Rekening : <span class="fw-bold text-primary"><?php echo $nama_rekening_admin_deposit; ?></span></span>
                          <span class="d-block text-muted">Nomor Rekening : <span class="fw-bold text-primary"><?php echo $nomor_rekening_admin_deposit; ?></span></span>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  <!-- Modal Batalkan -->
                  <div id="batalkan_<?php echo $id_deposit; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ubah Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_deposit" value="<?php echo $id_deposit; ?>">
                            <input type="hidden" name="id_akun_deposit" value="<?php echo $id_akun_deposit; ?>">
                            <input type="hidden" name="jumlah_deposit" value="<?php echo $jumlah_deposit; ?>">
                            <input type="hidden" name="status_deposit" value="batal">
                            <span class="text-muted">Saldo <span class="fw-bold text-danger">Rp. <?php echo number_format($jumlah_deposit); ?>,-</span> akan ditarik dari <span class="fw-bold text-danger"><?php echo $nama_lengkap_akun_deposit; ?></span>, yakin?</span>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-light" data-bs-dismiss="modal">
                              <i class="ri-close-fill fw-bold me-1"></i>
                              Batal
                            </button>
                            <button type="submit" name="batalkan" class="d-flex justify-content-center align-items-center btn btn-danger">
                              <i class="ri-check-fill fw-bold me-1"></i>
                              Yakin
                            </button>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </form>
                  </div><!-- /.modal -->
                  <!-- Modal Selesaikan -->
                  <div id="selesaikan_<?php echo $id_deposit; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ubah Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_deposit" value="<?php echo $id_deposit; ?>">
                            <input type="hidden" name="id_akun_deposit" value="<?php echo $id_akun_deposit; ?>">
                            <input type="hidden" name="jumlah_deposit" value="<?php echo $jumlah_deposit; ?>">
                            <input type="hidden" name="status_deposit" value="selesai">
                            <span class="text-muted">Saldo <span class="fw-bold text-primary">Rp. <?php echo number_format($jumlah_deposit); ?>,-</span> akan diberikan kepada <span class="fw-bold text-primary"><?php echo $nama_lengkap_akun_deposit; ?></span>, yakin?</span>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-light" data-bs-dismiss="modal">
                              <i class="ri-close-fill fw-bold me-1"></i>
                              Batal
                            </button>
                            <button type="submit" name="selesaikan" class="d-flex justify-content-center align-items-center btn btn-primary">
                              <i class="ri-check-fill fw-bold me-1"></i>
                              Yakin
                            </button>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </form>
                  </div><!-- /.modal -->
                  <!-- Modal Hapus Data -->
                  <div id="hapus_data_<?php echo $id_deposit; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_deposit" value="<?php echo $id_deposit; ?>">
                            <span class="text-muted">Yakin ingin menghapus data <span class="fw-bold text-danger"><?php echo $kode_deposit; ?></span>?</span>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-light" data-bs-dismiss="modal">
                              <i class="ri-close-fill fw-bold me-1"></i>
                              Batal
                            </button>
                            <button type="submit" name="hapus_data" class="d-flex justify-content-center align-items-center btn btn-danger">
                              <i class="ri-check-fill fw-bold me-1"></i>
                              Yakin
                            </button>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </form>
                  </div><!-- /.modal -->
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- end card body -->
          </div><!-- end card -->
        </div><!-- end col -->
      </div>
    </div>
  </div>
</div>