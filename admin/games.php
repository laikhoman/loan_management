<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Games</h4>
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
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $games = mysqli_query($koneksi, "SELECT * FROM games");
                    while ($data_games = mysqli_fetch_array($games)) {
                      $id_games = $data_games['id_games'];
                      $id_sub_menu_games_games = $data_games['id_sub_menu_games_games'];
                      $gambar_games = $data_games['gambar_games'];
                      $nama_games = $data_games['nama_games'];
                      $link_games = $data_games['link_games'];
                      $link_asli_games = $data_games['link_asli_games'];
                      $link_demo_games = $data_games['link_demo_games'];

                      $sub_menu_games = mysqli_query($koneksi, "SELECT * FROM sub_menu_games WHERE id_sub_menu_games = '$id_sub_menu_games_games'");
                      $data_sub_menu_games = mysqli_fetch_array($sub_menu_games);
                      $id_menu_games_sub_menu_games = $data_sub_menu_games['id_menu_games_sub_menu_games'];
                      $gambar_sub_menu_games = $data_sub_menu_games['gambar_sub_menu_games'];
                      $judul_sub_menu_games = $data_sub_menu_games['judul_sub_menu_games'];
                      $link_sub_menu_games = $data_sub_menu_games['link_sub_menu_games'];
                  ?>
                  <tr>
                    <td><?php echo $judul_sub_menu_games; ?></td>
                    <td><?php echo $nama_games; ?></td>
                    <td>
                      <div class="dropdown d-inline-block dropstart">
                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ri-settings-3-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end me-2">
                          <li>
                            <a href="#ubah_data_<?php echo $id_games; ?>" class="dropdown-item edit-item-btn" data-bs-toggle="modal">
                              <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                              Ubah Data
                            </a>
                          </li>
                          <li>
                            <a href="#hapus_data_<?php echo $id_games; ?>" class="dropdown-item remove-item-btn" data-bs-toggle="modal">
                              <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                              Hapus Data
                            </a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div id="ubah_data_<?php echo $id_games; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post" enctype="multipart/form-data">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ubah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_games" value="<?php echo $id_games; ?>">
                            <div class="mb-2 text-center">
                              <img src="assets/images/games/<?php echo $gambar_games; ?>" class="img-fluid rounded">
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Kategori</label>
                              <select class="form-select mb-3" name="id_sub_menu_games_games" required>
                                <option value="<?php echo $id_sub_menu_games_games; ?>"><?php echo $judul_sub_menu_games; ?></option>
                                <?php
                                  $sub_menu_games = mysqli_query($koneksi, "SELECT * FROM sub_menu_games WHERE NOT id_sub_menu_games = '$id_sub_menu_games_games'");
                                  while ($data_sub_menu_games = mysqli_fetch_array($sub_menu_games)) {
                                    $id_sub_menu_games = $data_sub_menu_games['id_sub_menu_games'];
                                    $id_menu_games_sub_menu_games = $data_sub_menu_games['id_menu_games_sub_menu_games'];
                                    $gambar_sub_menu_games = $data_sub_menu_games['gambar_sub_menu_games'];
                                    $judul_sub_menu_games = $data_sub_menu_games['judul_sub_menu_games'];
                                    $link_sub_menu_games = $data_sub_menu_games['link_sub_menu_games'];
                                    echo '<option value="'.$id_sub_menu_games.'">'.$judul_sub_menu_games.'</option>';
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Gambar</label>
                              <input type="file" name="gambar_games" class="form-control">
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Nama</label>
                              <input type="text" name="nama_games" class="form-control" value="<?php echo $nama_games; ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Link Asli</label>
                              <input type="text" name="link_asli_games" class="form-control" value="<?php echo $link_asli_games; ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Link Demo</label>
                              <input type="text" name="link_demo_games" class="form-control" value="<?php echo $link_demo_games; ?>" autocomplete="off" required>
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
                  <div id="hapus_data_<?php echo $id_games; ?>" class="modal flip" tabindex="-1" aria-hidden="true" style="display: none;">
                    <form method="post">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="id_games" value="<?php echo $id_games; ?>">
                            <span class="text-muted">Yakin ingin menghapus data <span class="fw-bold text-danger"><?php echo $nama_games; ?></span>?</span>
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
  <form method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label class="form-label">Kategori</label>
            <select class="form-select mb-3" name="id_sub_menu_games_games" required>
              <option selected>Pilih Kategori</option>
              <?php
                $sub_menu_games = mysqli_query($koneksi, "SELECT * FROM sub_menu_games");
                while ($data_sub_menu_games = mysqli_fetch_array($sub_menu_games)) {
                  $id_sub_menu_games = $data_sub_menu_games['id_sub_menu_games'];
                  $id_menu_games_sub_menu_games = $data_sub_menu_games['id_menu_games_sub_menu_games'];
                  $gambar_sub_menu_games = $data_sub_menu_games['gambar_sub_menu_games'];
                  $judul_sub_menu_games = $data_sub_menu_games['judul_sub_menu_games'];
                  $link_sub_menu_games = $data_sub_menu_games['link_sub_menu_games'];
                  echo '<option value="'.$id_sub_menu_games.'">'.$judul_sub_menu_games.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="mb-2">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar_games" class="form-control" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Nama</label>
            <input type="text" name="nama_games" class="form-control" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Link Asli</label>
            <input type="text" name="link_asli_games" class="form-control" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Link Demo</label>
            <input type="text" name="link_demo_games" class="form-control" autocomplete="off" required>
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