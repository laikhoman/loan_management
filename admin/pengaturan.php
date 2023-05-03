<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Pengaturan</h4>

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
        <div class="col-md-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Judul Website</h5>
              <form method="post">
                <div class="mb-2">
                  <label class="form-label">Judul</label>
                  <input type="text" name="judul_website" class="form-control" value="<?php echo $isi1_judul_website; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_judul_website" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Warna Utama</h5>
              <form method="post">
                <div class="mb-2">
                  <label class="form-label">Warna</label>
                  <input type="color" name="warna_utama" class="form-control form-control-color w-100" value="<?php echo $isi1_warna_utama; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_warna_utama" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Logo Admin (Light)</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_logo_admin_light; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_logo_admin_light" class="form-control">
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_logo_admin_light" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Logo Admin (dark)</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_logo_admin_dark; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_logo_admin_dark" class="form-control">
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_logo_admin_dark" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Logo Admin (small)</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_logo_admin_sm; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_logo_admin_sm" class="form-control">
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_logo_admin_sm" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hub Kami (LiveChat)</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_livechat; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_livechat" class="form-control">
                </div>
                <div class="mb-2">
                  <label class="form-label">Judul</label>
                  <input type="text" name="judul_livechat" class="form-control" value="<?php echo $isi2_livechat; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <label class="form-label">Link</label>
                  <input type="text" name="link_livechat" class="form-control" value="<?php echo $isi3_livechat; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_livechat" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hub Kami (WhatsApp)</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_whatsapp; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_whatsapp" class="form-control">
                </div>
                <div class="mb-2">
                  <label class="form-label">Nomor</label>
                  <input type="text" name="nomor_whatsapp" class="form-control" value="<?php echo $isi2_whatsapp; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <label class="form-label">Text</label>
                  <input type="text" name="text_whatsapp" class="form-control" value="<?php echo $isi3_whatsapp; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_whatsapp" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Teks Berjalan</h5>
              <form method="post">
                <div class="mb-2">
                  <div class="row g-3">
                    <div class="col-md-8">
                      <label class="form-label">Detail</label>
                      <input type="text" name="detail_teks_berjalan" class="form-control" value="<?php echo $isi1_marquee_pengumuman; ?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-2">
                      <label class="form-label">Warna Background</label>
                      <input type="color" name="warna_background" class="form-control form-control-color w-100" value="<?php echo $isi2_marquee_pengumuman; ?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-2">
                      <label class="form-label">Warna Text</label>
                      <input type="color" name="warna_text" class="form-control form-control-color w-100" value="<?php echo $isi3_marquee_pengumuman; ?>" autocomplete="off" required>
                    </div>
                  </div>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_teks_berjalan" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Iklan (LiveScore)</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_livescore; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_livescore" class="form-control">
                </div>
                <div class="mb-2">
                  <label class="form-label">Link</label>
                  <input type="text" name="link_livescore" class="form-control" value="<?php echo $isi2_livescore; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_livescore" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Iklan (RTP Slot)</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_rtp_slot; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_rtp_slot" class="form-control">
                </div>
                <div class="mb-2">
                  <label class="form-label">Link</label>
                  <input type="text" name="link_rtp_slot" class="form-control" value="<?php echo $isi2_rtp_slot; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_rtp_slot" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Logo</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_logo; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_logo" class="form-control">
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_logo" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Favicon</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_favicon; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_favicon" class="form-control">
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_favicon" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Jackpot</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_bg_jackpot; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Background</label>
                      <input type="file" name="gambar_jackpot" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Warna Text</label>
                      <input type="color" name="warna_text_jackpot" class="form-control form-control-color w-100" value="<?php echo $isi2_bg_jackpot; ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_bg_jackpot" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tombol Masuk</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_tombol_masuk; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Background</label>
                      <input type="file" name="gambar_tombol_masuk" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Warna Text</label>
                      <input type="color" name="warna_text_tombol_masuk" class="form-control form-control-color w-100" value="<?php echo $isi2_tombol_masuk; ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_tombol_masuk" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tombol Daftar</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_tombol_daftar; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Background</label>
                      <input type="file" name="gambar_tombol_daftar" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Warna Text</label>
                      <input type="color" name="warna_text_tombol_daftar" class="form-control form-control-color w-100" value="<?php echo $isi2_tombol_daftar; ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_tombol_daftar" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Background Menu</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_bg_menu; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_bg_menu" class="form-control">
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_bg_menu" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Background Bank</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_bg_bank; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_bg_bank" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Warna Text</label>
                      <input type="color" name="warna_text_bg_bank" class="form-control form-control-color w-100" value="<?php echo $isi2_bg_bank; ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_bg_bank" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Hot Games</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_hot_games; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_hot_games" class="form-control">
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_hot_games" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Slots</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_slots; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_slots" class="form-control">
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_slots" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Live Casino</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_live_casino; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_live_casino" class="form-control">
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_live_casino" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Sports</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_sports; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_sports" class="form-control">
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_sports" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Arcade</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_arcade; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_arcade" class="form-control">
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_arcade" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Poker</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_poker; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_poker" class="form-control">
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_poker" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Togel</h5>
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-2 text-center">
                      <img src="assets/images/<?php echo $isi1_togel; ?>" class="img-fluid">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="gambar_togel" class="form-control">
                    </div>
                    <div class="mb-2">
                      <button type="submit" name="ubah_togel" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                        <i class="ri-save-3-line me-1"></i>
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pop-Up Pengumuman</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_popup_pengumuman; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_popup_pengumuman" class="form-control">
                </div>
                <div class="mb-2">
                  <label class="form-label">Link Gambar</label>
                  <input type="text" name="link_gambar_popup_pengumuman" class="form-control" value="<?php echo $isi2_popup_pengumuman; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <label class="form-label">Detail</label>
                  <textarea class="summernote" name="detail_popup_pengumuman" rows="10" required><?php echo $isi3_popup_pengumuman; ?></textarea>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_popup_pengumuman" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Background Body</h5>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-2 text-center">
                  <img src="assets/images/<?php echo $isi1_bg_body; ?>" class="img-fluid">
                </div>
                <div class="mb-2">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar_bg_body" class="form-control">
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_bg_body" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Footer</h5>
              <form method="post">
                <div class="mb-2">
                  <label class="form-label">Footer Pendek</label>
                  <input type="text" name="footer_pendek" class="form-control" value="<?php echo $isi2_footer; ?>" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <label class="form-label">Footer Panjang</label>
                  <textarea class="summernote" name="footer_panjang" rows="10" required><?php echo $isi1_footer; ?></textarea>
                </div>
                <div class="mb-2">
                  <button type="submit" name="ubah_footer" class="d-flex justify-content-center align-items-center btn btn-primary ms-auto">
                    <i class="ri-save-3-line me-1"></i>
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>