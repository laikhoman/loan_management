<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Pinjaman</h4>
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
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Jumlah Pinjaman</th>
                    <th scope="col">Nomor Kartu </th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Tenor</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $anggota = mysqli_query($koneksi, "SELECT * FROM loan_applications");
                    while ($data_anggota = mysqli_fetch_array($anggota)) {
                      $id_loan = $data_anggota['id'];
                      $nama_pengguna = $data_anggota['nama_pengguna'];
                      $loan_amount = $data_anggota['loan_amount'];
                      $card_number = $data_anggota['card_number'];
                      $phone_number = $data_anggota['phone_number'];
                      $durasi = $data_anggota['durasi'];
                      $status_loan = $data_anggota['status_loan'];
                  ?>
                  <tr>
                    <td><?php echo $nama_pengguna; ?></td>
                    <td><?php echo $loan_amount; ?></td>
                    <td><?php echo $card_number; ?></td>
                    <td><?php echo $phone_number; ?></td>
                    <td><?php echo $durasi; ?></td>
                    <td>
                      <?php
                        if ($status_loan == "Aktif") {
                          echo '<span class="badge bg-primary">Aktif</span>';
                        } else {
                          echo '<span class="badge bg-danger">Tidak Aktif</span>';
                        }
                      ?>
                    </td>
                    <td>
                      <div class="dropdown d-inline-block dropstart">
                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ri-settings-3-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end me-2">
                          <li>
                            <a href="#ubah_data_<?php echo $id_loan; ?>" class="dropdown-item edit-item-btn" data-bs-toggle="modal">
                              <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                              Ubah Data
                            </a>
                          </li>
                          <li>
                            <a href="#hapus_data_<?php echo $id_loan; ?>" class="dropdown-item remove-item-btn" data-bs-toggle="modal">
                              <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                              Hapus Data
                            </a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  
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
