<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Rekening Anggota</h4>
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="#tambah_data" class="d-flex justify-content-center align-items-center btn btn-sm btn-primary text-white" data-bs-toggle="modal">
              <i class="ri-add-fill fw-bold me-1"></i>
              Tambah Data
            </a>
          </li>
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
                    <th scope="col">Anggota</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $rekening_anggota = mysqli_query($koneksi, "SELECT * FROM rekening_anggota");
                    while ($data_rekening_anggota = mysqli_fetch_array($rekening_anggota)) {
                      $id_rekening_anggota = $data_rekening_anggota['id_rekening_anggota'];
                      $id_akun_rekening_anggota = $data_rekening_anggota['id_akun_rekening_anggota'];
                      $kategori_rekening_anggota = $data_rekening_anggota['kategori_rekening_anggota'];
                      $id_rekening_rekening_anggota = $data_rekening_anggota['id_rekening_rekening_anggota'];
                      $nama_rekening_anggota = $data_rekening_anggota['nama_rekening_anggota'];
                      $nomor_rekening_anggota = $data_rekening_anggota['nomor_rekening_anggota'];

                      $anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$id_akun_rekening_anggota' AND level_akun = 'Anggota'");
                      $data_anggota = mysqli_fetch_array($anggota);
                      $nama_lengkap_anggota = $data_anggota['nama_lengkap_akun'];
                      $nama_pengguna_anggota = $data_anggota['nama_pengguna_akun'];
                      $kata_sandi_anggota = $data_anggota['kata_sandi_akun'];
                      $email_anggota = $data_anggota['email_akun'];
                      $telepon_anggota = $data_anggota['telepon_akun'];
                      $whatsapp_anggota = $data_anggota['whatsapp_akun'];
                      $kode_referensi_anggota = $data_anggota['kode_referensi_akun'];
                      $status_anggota = $data_anggota['status_akun'];

                      $rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_anggota'");
                      $data_rekening = mysqli_fetch_array($rekening);
                      $kategori_rekening = $data_rekening['kategori_rekening'];
                      $jenis_rekening = $data_rekening['jenis_rekening'];
                  ?>
                  <tr>
                    <td><?php echo $nama_lengkap_anggota; ?></td>
                    <td>
                      <?php
                        if ($kategori_rekening_anggota == "bank") {
                          echo 'Bank';
                        } else if ($kategori_rekening_anggota == "emoney") {
                          echo 'E-Money';
                        } else if ($kategori_rekening_anggota == "pulsa") {
                          echo 'Pulsa';
                        }
                      ?>
                    </td>
                    <td><?php echo $jenis_rekening; ?></td>
                    <td><?php echo $nama_rekening_anggota; ?></td>
                    <td><?php echo $nomor_rekening_anggota; ?></td>
                    <td>
                      <div class="dropdown d-inline-block dropstart">
                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ri-settings-3-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end me-2">
                          <li>
                            <a href="#ubah_data_<?php echo $id_rekening_anggota; ?>" class="dropdown-item edit-item-btn" data-bs-toggle="modal">
                              <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                              Ubah Data
                            </a>
                          </li>
                          <li>
                            <a href="#hapus_data_<?php echo $id_rekening_anggota; ?>" class="dropdown-item remove-item-btn" data-bs-toggle="modal">
                              <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                              Hapus Data
                            </a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div id="ubah_data_<?php echo $id_rekening_anggota; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post">
                      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ubah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_rekening_anggota" value="<?php echo $id_rekening_anggota; ?>">
                            <div class="mb-2">
                              <label class="form-label">Anggota</label>
                              <select class="form-select" name="id_akun_rekening_anggota" required>
                                <option value="<?php echo $id_akun_rekening_anggota; ?>"><?php echo $nama_lengkap_anggota; ?></option>
                                <?php
                                  $anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE NOT id_akun = '$id_akun_rekening_anggota' AND level_akun = 'Anggota'");
                                  while ($data_anggota = mysqli_fetch_array($anggota)) {
                                    $id_anggota = $data_anggota['id_akun'];
                                    $nama_lengkap_anggota = $data_anggota['nama_lengkap_akun'];
                                    $nama_pengguna_anggota = $data_anggota['nama_pengguna_akun'];
                                    $kata_sandi_anggota = $data_anggota['kata_sandi_akun'];
                                    $email_anggota = $data_anggota['email_akun'];
                                    $telepon_anggota = $data_anggota['telepon_akun'];
                                    $whatsapp_anggota = $data_anggota['whatsapp_akun'];
                                    $kode_referensi_anggota = $data_anggota['kode_referensi_akun'];
                                    $status_anggota = $data_anggota['status_akun'];
                                    echo '<option value="'.$id_anggota.'">'.$nama_lengkap_anggota.'</option>';
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Kategori</label>
                              <select class="form-select" name="kategori_rekening_anggota">
                                <?php
                                  if ($kategori_rekening_anggota == "bank") {
                                    echo '
                                      <option value="bank">Bank</option>
                                      <option value="emoney">E-Money</option>
                                      <option value="pulsa">Pulsa</option>
                                    ';
                                  } else if ($kategori_rekening_anggota == "emoney") {
                                    echo '
                                      <option value="emoney">E-Money</option>
                                      <option value="bank">Bank</option>
                                      <option value="pulsa">Pulsa</option>
                                    ';
                                  } else if ($kategori_rekening_anggota == "pulsa") {
                                    echo '
                                      <option value="pulsa">Pulsa</option>
                                      <option value="bank">Bank</option>
                                      <option value="emoney">E-Money</option>
                                    ';
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Jenis</label>
                              <select class="form-select" name="id_rekening_rekening_anggota" required>
                                <option value="<?php echo $id_rekening_rekening_anggota; ?>"><?php echo $jenis_rekening; ?></option>
                                <?php
                                  $rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE NOT id_rekening = '$id_rekening_rekening_anggota'");
                                  while ($data_rekening = mysqli_fetch_array($rekening)) {
                                    $id_rekening = $data_rekening['id_rekening'];
                                    $kategori_rekening = $data_rekening['kategori_rekening'];
                                    $jenis_rekening = $data_rekening['jenis_rekening'];
                                    echo '
                                      <option value="'.$id_rekening.'">'.$jenis_rekening.'</option>
                                    ';
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Nama</label>
                              <input type="text" name="nama_rekening_anggota" class="form-control" value="<?php echo $nama_rekening_anggota; ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Nomor</label>
                              <input type="text" name="nomor_rekening_anggota" class="form-control" value="<?php echo $nomor_rekening_anggota; ?>" autocomplete="off" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-light" data-bs-dismiss="modal">
                              <i class="ri-close-fill fw-bold me-1"></i>
                              Batal
                            </button>
                            <button type="submit" name="ubah_data" class="d-flex justify-content-center align-items-center btn btn-primary">
                              <i class="ri-save-3-line me-1"></i>
                              Simpan
                            </button>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </form>
                  </div><!-- /.modal -->
                  <!-- Modal Hapus Data -->
                  <div id="hapus_data_<?php echo $id_rekening_anggota; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_rekening_anggota" value="<?php echo $id_rekening_anggota; ?>">
                            <span class="text-muted">Yakin ingin menghapus data <span class="fw-bold text-danger"><?php echo $nama_rekening_anggota.' - '.$nomor_rekening_anggota; ?></span>?</span>
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

<!-- Modal Tambah Data -->
<div id="tambah_data" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
  <form method="post">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label class="form-label">Anggota</label>
            <select class="form-select" name="id_akun_rekening_anggota" required>
              <option selected>Pilih Anggota</option>
              <?php
                $anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE level_akun = 'Anggota'");
                while ($data_anggota = mysqli_fetch_array($anggota)) {
                  $id_anggota = $data_anggota['id_akun'];
                  $nama_lengkap_anggota = $data_anggota['nama_lengkap_akun'];
                  $nama_pengguna_anggota = $data_anggota['nama_pengguna_akun'];
                  $kata_sandi_anggota = $data_anggota['kata_sandi_akun'];
                  $email_anggota = $data_anggota['email_akun'];
                  $telepon_anggota = $data_anggota['telepon_akun'];
                  $whatsapp_anggota = $data_anggota['whatsapp_akun'];
                  $kode_referensi_anggota = $data_anggota['kode_referensi_akun'];
                  $status_anggota = $data_anggota['status_akun'];
                  echo '<option value="'.$id_anggota.'">'.$nama_lengkap_anggota.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="mb-2">
            <label class="form-label">Kategori</label>
            <select class="form-select" name="kategori_rekening_anggota" required>
              <option selected>Pilih Kategori</option>
              <option value="bank">Bank</option>
              <option value="emoney">E-Money</option>
              <option value="pulsa">Pulsa</option>
            </select>
          </div>
          <div class="mb-2">
            <label class="form-label">Jenis</label>
            <select class="form-select" name="id_rekening_rekening_anggota" required>
              <option selected>Pilih Jenis</option>
              <?php
                $rekening = mysqli_query($koneksi, "SELECT * FROM rekening");
                while ($data_rekening = mysqli_fetch_array($rekening)) {
                  $id_rekening = $data_rekening['id_rekening'];
                  $kategori_rekening = $data_rekening['kategori_rekening'];
                  $jenis_rekening = $data_rekening['jenis_rekening'];
                  echo '
                    <option value="'.$id_rekening.'">'.$jenis_rekening.'</option>
                  ';
                }
              ?>
            </select>
          </div>
          <div class="mb-2">
            <label class="form-label">Nama</label>
            <input type="text" name="nama_rekening_anggota" class="form-control" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Nomor</label>
            <input type="text" name="nomor_rekening_anggota" class="form-control" autocomplete="off" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="d-flex justify-content-center align-items-center btn btn-light" data-bs-dismiss="modal">
            <i class="ri-close-fill fw-bold me-1"></i>
            Batal
          </button>
          <button type="submit" name="tambah_data" class="d-flex justify-content-center align-items-center btn btn-primary">
            <i class="ri-save-3-line me-1"></i>
            Simpan
          </button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </form>
</div><!-- /.modal -->