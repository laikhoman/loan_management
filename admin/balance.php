<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Saldo</h4>
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
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Total Saldo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $anggota = mysqli_query($koneksi, "SELECT * FROM saldo");
                    while ($data_anggota = mysqli_fetch_array($anggota)) {
                      $id = $data_anggota['id_saldo'];
                      $id_akun_saldo = $data_anggota['id_akun_saldo'];
                      $total_saldo = $data_anggota['total_saldo'];
                      $nama = "";
                      $cek_nama_pengguna_anggota = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$id_akun_saldo' ");
                      $jumlah_nama_pengguna_anggota = mysqli_num_rows($cek_nama_pengguna_anggota);
                      $data_by_id = mysqli_fetch_array($cek_nama_pengguna_anggota);
                      if ($jumlah_nama_pengguna_anggota > 0) {
                        $nama = $data_by_id['nama_pengguna_akun'];
                      }
                  ?>
                  <tr>
                    
                    <td><?php echo $id_akun_saldo; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $total_saldo; ?></td>
                    
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
