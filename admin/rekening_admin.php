<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Rekening Admin</h4>
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
                    <th scope="col">Jenis</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $rekening_admin = mysqli_query($koneksi, "SELECT * FROM rekening_admin");
                    while ($data_rekening_admin = mysqli_fetch_array($rekening_admin)) {
                      $id_rekening_admin = $data_rekening_admin['id_rekening_admin'];
                      $jenis_rekening_admin = $data_rekening_admin['jenis_rekening_admin'];
                      $nama_rekening_admin = $data_rekening_admin['nama_rekening_admin'];
                      $nomor_rekening_admin = $data_rekening_admin['nomor_rekening_admin'];
                  ?>
                  <tr>
                    <td><?php echo $jenis_rekening_admin; ?></td>
                    <td><?php echo $nama_rekening_admin; ?></td>
                    <td><?php echo $nomor_rekening_admin; ?></td>
                    <td>
                      <div class="dropdown d-inline-block dropstart">
                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ri-settings-3-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end me-2">
                          <li>
                            <a href="#ubah_data_<?php echo $id_rekening_admin; ?>" class="dropdown-item edit-item-btn" data-bs-toggle="modal">
                              <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                              Ubah Data
                            </a>
                          </li>
                          <li>
                            <a href="#hapus_data_<?php echo $id_rekening_admin; ?>" class="dropdown-item remove-item-btn" data-bs-toggle="modal">
                              <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                              Hapus Data
                            </a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div id="ubah_data_<?php echo $id_rekening_admin; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post">
                      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ubah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_rekening_admin" value="<?php echo $id_rekening_admin; ?>">
                            <div class="mb-2">
                              <label class="form-label">Jenis</label>
                              <select class="form-select" name="jenis_rekening_admin" required>
                                <option value="<?php echo $jenis_rekening_admin; ?>"><?php echo $jenis_rekening_admin; ?></option>
                                <?php
                                  $bank = mysqli_query($koneksi, "SELECT * FROM bank");
                                  while ($data_bank = mysqli_fetch_array($bank)) {
                                    $id_bank = $data_bank['id_bank'];
                                    $nama_bank = $data_bank['nama_bank'];
                                    $status_bank = $data_bank['status_bank'];
                                    echo '<option value="'.$nama_bank.'">'.$nama_bank.'</option>';
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Nama</label>
                              <input type="text" name="nama_rekening_admin" class="form-control" value="<?php echo $nama_rekening_admin; ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Nomor</label>
                              <input type="text" name="nomor_rekening_admin" class="form-control" value="<?php echo $nomor_rekening_admin; ?>" autocomplete="off" required>
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
                  <div id="hapus_data_<?php echo $id_rekening_admin; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_rekening_admin" value="<?php echo $id_rekening_admin; ?>">
                            <span class="text-muted">Yakin ingin menghapus data <span class="fw-bold text-danger"><?php echo $nama_rekening_admin.' - '.$nomor_rekening_admin; ?></span>?</span>
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
            <label class="form-label">Jenis</label>
            <select class="form-select" name="jenis_rekening_admin" required>
              <option selected>Pilih Jenis</option>
              <?php
                $bank = mysqli_query($koneksi, "SELECT * FROM bank");
                while ($data_bank = mysqli_fetch_array($bank)) {
                  $id_bank = $data_bank['id_bank'];
                  $nama_bank = $data_bank['nama_bank'];
                  $status_bank = $data_bank['status_bank'];
                  echo '<option value="'.$nama_bank.'">'.$nama_bank.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="mb-2">
            <label class="form-label">Nama</label>
            <input type="text" name="nama_rekening_admin" class="form-control" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Nomor</label>
            <input type="text" name="nomor_rekening_admin" class="form-control" autocomplete="off" required>
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