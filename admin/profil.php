<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Profil</h4>

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
          <div class="card">
            <div class="card-body">
              <form method="post">
                <div class="row g-2">
                  <div class="col-md-4">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap_akun" class="form-control" value="<?php echo $nama_lengkap_akun_masuk; ?>" autocomplete="off" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Nama Pengguna</label>
                    <input type="text" name="nama_pengguna_akun" class="form-control" value="<?php echo $nama_pengguna_akun_masuk; ?>" autocomplete="off" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Kata Sandi</label>
                    <input type="text" name="kata_sandi_akun" class="form-control" value="<?php echo $kata_sandi_akun_masuk; ?>" autocomplete="off" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email_akun" class="form-control" value="<?php echo $email_akun_masuk; ?>" autocomplete="off" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon_akun" class="form-control" value="<?php echo $telepon_akun_masuk; ?>" autocomplete="off" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">WhatsApp</label>
                    <input type="text" name="whatsapp_akun" class="form-control" value="<?php echo $whatsapp_akun_masuk; ?>" autocomplete="off" required>
                  </div>
                  <div class="col-12">
                    <button type="submit" name="ubah_profil" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                      <i class="ri-save-3-line me-1"></i>
                      Simpan
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>