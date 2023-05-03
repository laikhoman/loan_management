<?php
  $query_livechat = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'livechat'");
  $data_livechat = mysqli_fetch_array($query_livechat);
  $id_livechat = $data_livechat['id_pengaturan'];
  $isi1_livechat = $data_livechat['isi1_pengaturan'];
  $isi2_livechat = $data_livechat['isi2_pengaturan'];
  $isi3_livechat = $data_livechat['isi3_pengaturan'];

  $query_line = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'line'");
  $data_line = mysqli_fetch_array($query_line);
  $id_line = $data_line['id_pengaturan'];
  $isi1_line = $data_line['isi1_pengaturan'];
  $isi2_line = $data_line['isi2_pengaturan'];

  $query_twitter = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'twitter'");
  $data_twitter = mysqli_fetch_array($query_twitter);
  $id_twitter = $data_twitter['id_pengaturan'];
  $isi1_twitter = $data_twitter['isi1_pengaturan'];
  $isi2_twitter = $data_twitter['isi2_pengaturan'];

  $query_whatsapp = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'whatsapp'");
  $data_whatsapp = mysqli_fetch_array($query_whatsapp);
  $id_whatsapp = $data_whatsapp['id_pengaturan'];
  $isi1_whatsapp = $data_whatsapp['isi1_pengaturan'];
  $isi2_whatsapp = $data_whatsapp['isi2_pengaturan'];
  $isi3_whatsapp = $data_whatsapp['isi3_pengaturan'];

  $query_instagram = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'instagram'");
  $data_instagram = mysqli_fetch_array($query_instagram);
  $id_instagram = $data_instagram['id_pengaturan'];
  $isi1_instagram = $data_instagram['isi1_pengaturan'];
  $isi2_instagram = $data_instagram['isi2_pengaturan'];

  $query_facebook = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'facebook'");
  $data_facebook = mysqli_fetch_array($query_facebook);
  $id_facebook = $data_facebook['id_pengaturan'];
  $isi1_facebook = $data_facebook['isi1_pengaturan'];
  $isi2_facebook = $data_facebook['isi2_pengaturan'];
  
  $query_footer = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'footer'");
  $data_footer = mysqli_fetch_array($query_footer);
  $id_footer = $data_footer['id_pengaturan'];
  $isi1_footer = $data_footer['isi1_pengaturan'];
  $isi2_footer = $data_footer['isi2_pengaturan'];

  $query_livescore = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'livescore'");
  $data_livescore = mysqli_fetch_array($query_livescore);
  $id_livescore = $data_livescore['id_pengaturan'];
  $isi1_livescore = $data_livescore['isi1_pengaturan'];
  $isi2_livescore = $data_livescore['isi2_pengaturan'];

  $query_rtp_slot = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'rtp_slot'");
  $data_rtp_slot = mysqli_fetch_array($query_rtp_slot);
  $id_rtp_slot = $data_rtp_slot['id_pengaturan'];
  $isi1_rtp_slot = $data_rtp_slot['isi1_pengaturan'];
  $isi2_rtp_slot = $data_rtp_slot['isi2_pengaturan'];

  $query_popup_pengumuman = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'popup_pengumuman'");
  $data_popup_pengumuman = mysqli_fetch_array($query_popup_pengumuman);
  $id_popup_pengumuman = $data_popup_pengumuman['id_pengaturan'];
  $isi1_popup_pengumuman = $data_popup_pengumuman['isi1_pengaturan'];
  $isi2_popup_pengumuman = $data_popup_pengumuman['isi2_pengaturan'];
  $isi3_popup_pengumuman = $data_popup_pengumuman['isi3_pengaturan'];

  $query_pusat_bantuan = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'pusat_bantuan'");
  $data_pusat_bantuan = mysqli_fetch_array($query_pusat_bantuan);
  $id_pusat_bantuan = $data_pusat_bantuan['id_pengaturan'];
  $isi1_pusat_bantuan = $data_pusat_bantuan['isi1_pengaturan'];

  $query_syarat_dan_ketentuan = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'syarat_dan_ketentuan'");
  $data_syarat_dan_ketentuan = mysqli_fetch_array($query_syarat_dan_ketentuan);
  $id_syarat_dan_ketentuan = $data_syarat_dan_ketentuan['id_pengaturan'];
  $isi1_syarat_dan_ketentuan = $data_syarat_dan_ketentuan['isi1_pengaturan'];

  $query_responsible_gaming = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'responsible_gaming'");
  $data_responsible_gaming = mysqli_fetch_array($query_responsible_gaming);
  $id_responsible_gaming = $data_responsible_gaming['id_pengaturan'];
  $isi1_responsible_gaming = $data_responsible_gaming['isi1_pengaturan'];
  
  $query_tentang = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'tentang'");
  $data_tentang = mysqli_fetch_array($query_tentang);
  $id_tentang = $data_tentang['id_pengaturan'];
  $isi1_tentang = $data_tentang['isi1_pengaturan'];

  $query_marquee_pengumuman = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'marquee_pengumuman'");
  $data_marquee_pengumuman = mysqli_fetch_array($query_marquee_pengumuman);
  $id_marquee_pengumuman = $data_marquee_pengumuman['id_pengaturan'];
  $isi1_marquee_pengumuman = $data_marquee_pengumuman['isi1_pengaturan'];
  $isi2_marquee_pengumuman = $data_marquee_pengumuman['isi2_pengaturan'];
  $isi3_marquee_pengumuman = $data_marquee_pengumuman['isi3_pengaturan'];

  $query_logo = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo'");
  $data_logo = mysqli_fetch_array($query_logo);
  $id_logo = $data_logo['id_pengaturan'];
  $isi1_logo = $data_logo['isi1_pengaturan'];

  $query_favicon = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'favicon'");
  $data_favicon = mysqli_fetch_array($query_favicon);
  $id_favicon = $data_favicon['id_pengaturan'];
  $isi1_favicon = $data_favicon['isi1_pengaturan'];

  $query_judul_website = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'judul_website'");
  $data_judul_website = mysqli_fetch_array($query_judul_website);
  $id_judul_website = $data_judul_website['id_pengaturan'];
  $isi1_judul_website = $data_judul_website['isi1_pengaturan'];

  $query_warna_utama = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'warna_utama'");
  $data_warna_utama = mysqli_fetch_array($query_warna_utama);
  $id_warna_utama = $data_warna_utama['id_pengaturan'];
  $isi1_warna_utama = $data_warna_utama['isi1_pengaturan'];

  $query_logo_admin_light = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo_admin_light'");
  $data_logo_admin_light = mysqli_fetch_array($query_logo_admin_light);
  $id_logo_admin_light = $data_logo_admin_light['id_pengaturan'];
  $isi1_logo_admin_light = $data_logo_admin_light['isi1_pengaturan'];

  $query_logo_admin_dark = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo_admin_dark'");
  $data_logo_admin_dark = mysqli_fetch_array($query_logo_admin_dark);
  $id_logo_admin_dark = $data_logo_admin_dark['id_pengaturan'];
  $isi1_logo_admin_dark = $data_logo_admin_dark['isi1_pengaturan'];

  $query_logo_admin_sm = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo_admin_sm'");
  $data_logo_admin_sm = mysqli_fetch_array($query_logo_admin_sm);
  $id_logo_admin_sm = $data_logo_admin_sm['id_pengaturan'];
  $isi1_logo_admin_sm = $data_logo_admin_sm['isi1_pengaturan'];
  
  $query_bg_jackpot = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'bg_jackpot'");
  $data_bg_jackpot = mysqli_fetch_array($query_bg_jackpot);
  $id_bg_jackpot = $data_bg_jackpot['id_pengaturan'];
  $isi1_bg_jackpot = $data_bg_jackpot['isi1_pengaturan'];
  $isi2_bg_jackpot = $data_bg_jackpot['isi2_pengaturan'];

  $query_bg_body = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'bg_body'");
  $data_bg_body = mysqli_fetch_array($query_bg_body);
  $id_bg_body = $data_bg_body['id_pengaturan'];
  $isi1_bg_body = $data_bg_body['isi1_pengaturan'];

  $query_tombol_masuk = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'tombol_masuk'");
  $data_tombol_masuk = mysqli_fetch_array($query_tombol_masuk);
  $id_tombol_masuk = $data_tombol_masuk['id_pengaturan'];
  $isi1_tombol_masuk = $data_tombol_masuk['isi1_pengaturan'];
  $isi2_tombol_masuk = $data_tombol_masuk['isi2_pengaturan'];

  $query_tombol_daftar = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'tombol_daftar'");
  $data_tombol_daftar = mysqli_fetch_array($query_tombol_daftar);
  $id_tombol_daftar = $data_tombol_daftar['id_pengaturan'];
  $isi1_tombol_daftar = $data_tombol_daftar['isi1_pengaturan'];
  $isi2_tombol_daftar = $data_tombol_daftar['isi2_pengaturan'];

  $query_bg_menu = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'bg_menu'");
  $data_bg_menu = mysqli_fetch_array($query_bg_menu);
  $id_bg_menu = $data_bg_menu['id_pengaturan'];
  $isi1_bg_menu = $data_bg_menu['isi1_pengaturan'];

  $query_hot_games = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'hot_games'");
  $data_hot_games = mysqli_fetch_array($query_hot_games);
  $id_hot_games = $data_hot_games['id_pengaturan'];
  $isi1_hot_games = $data_hot_games['isi1_pengaturan'];

  $query_slots = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'slots'");
  $data_slots = mysqli_fetch_array($query_slots);
  $id_slots = $data_slots['id_pengaturan'];
  $isi1_slots = $data_slots['isi1_pengaturan'];

  $query_live_casino = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'live_casino'");
  $data_live_casino = mysqli_fetch_array($query_live_casino);
  $id_live_casino = $data_live_casino['id_pengaturan'];
  $isi1_live_casino = $data_live_casino['isi1_pengaturan'];

  $query_sports = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'sports'");
  $data_sports = mysqli_fetch_array($query_sports);
  $id_sports = $data_sports['id_pengaturan'];
  $isi1_sports = $data_sports['isi1_pengaturan'];

  $query_arcade = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'arcade'");
  $data_arcade = mysqli_fetch_array($query_arcade);
  $id_arcade = $data_arcade['id_pengaturan'];
  $isi1_arcade = $data_arcade['isi1_pengaturan'];

  $query_poker = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'poker'");
  $data_poker = mysqli_fetch_array($query_poker);
  $id_poker = $data_poker['id_pengaturan'];
  $isi1_poker = $data_poker['isi1_pengaturan'];

  $query_togel = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'togel'");
  $data_togel = mysqli_fetch_array($query_togel);
  $id_togel = $data_togel['id_pengaturan'];
  $isi1_togel = $data_togel['isi1_pengaturan'];

  $query_bg_bank = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'bg_bank'");
  $data_bg_bank = mysqli_fetch_array($query_bg_bank);
  $id_bg_bank = $data_bg_bank['id_pengaturan'];
  $isi1_bg_bank = $data_bg_bank['isi1_pengaturan'];
  $isi2_bg_bank = $data_bg_bank['isi2_pengaturan'];
?>