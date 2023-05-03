<?php

  // Generator Rangkaian Acak (Maksimal 255)
  // Cara pakai : echo generatorRangkaianAcak(#jumlah yang di inginkan, kosong = 255);
  function generatorRangkaianAcak($jumlah_rangkaian = 255) {
    $karakter_rangkaian = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $jumlah_karakter_rangkaian = strlen($karakter_rangkaian);
    $hasil_rangkaian = '';
    for ($i = 0; $i < $jumlah_rangkaian; $i++) {
      $hasil_rangkaian .= $karakter_rangkaian[rand(0, $jumlah_karakter_rangkaian - 1)];
    }
    return $hasil_rangkaian;
  }

  // Ucapan
  // Cara pakai : echo ucapan();
  function ucapan() {
    $jam_sekarang = time();
    $angka_jam = date("G", $jam_sekarang);
    if ($angka_jam >= 0 && $angka_jam <= 11) {
      $ucapan = "Selamat Pagi";
    } else if ($angka_jam >= 12 && $angka_jam <= 14) {
      $ucapan = "Selamat Siang";
    } else if ($angka_jam >= 15 && $angka_jam <= 17) {
      $ucapan = "Selamat Sore";
    } else if ($angka_jam >= 18 && $angka_jam <= 23) {
      $ucapan = "Selamat Malam";
    }
    return $ucapan;
  }

  // Tanggal Indonesia
  // Cara pakai : tanggalIndonesia(#tanggal);
  function tanggalIndonesia($kalender, $cetak_hari = false) {
    $nama_hari = array (1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $nama_bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $pemisah = explode('-', $kalender);
    $tanggal = $pemisah[2];
    $bulan = $pemisah[1];
    $tahun = $pemisah[0];
    $hasil = $tanggal.' '.$nama_bulan[(int)$bulan].' '.$tahun;
    if ($cetak_hari) {
      $format_hari = date('N', strtotime($kalender));
      return $nama_hari[$format_hari].', '.$hasil;
    }
    return $hasil;
  }

  // Jam dan Tanggal Indonesia
  // Cara pakai : tanggalIndonesia(#tanggal dan waktu);
  function jamTanggalIndonesia($kalender, $cetak_hari = false) {
    $nama_hari = array (1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $nama_bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $pemisah_jam_tanggal = explode(' ', $kalender);
    $jam = $pemisah_jam_tanggal[1];
    $tanggal = $pemisah_jam_tanggal[0];
    $pemisah_tanggal = explode('-', $tanggal);
    $tanggal = $pemisah_tanggal[2];
    $bulan = $pemisah_tanggal[1];
    $tahun = $pemisah_tanggal[0];
    $hasil = $tanggal.' '.$nama_bulan[(int)$bulan].' '.$tahun.', Jam '.$jam;
    if ($cetak_hari) {
      $format_hari = date('N', strtotime($kalender));
      return $nama_hari[$format_hari].', '.$tanggal.' '.$nama_bulan[(int)$bulan].' '.$tahun.', Jam '.$jam;
    }
    return $hasil;
  }

  // Bulan Ini Indonesia
  // Cara pakai : echo waktuYangLalu(strtotime(#bulan tanpa 0));
  function bulanIni($bulan_ini) {
    $bulan_ini = date("n");
    if ($bulan_ini == 1) {
      $indo_bulan_ini = "Januari";
    } else if ($bulan_ini == 2) {
      $indo_bulan_ini = "Februari";
    } else if ($bulan_ini == 3) {
      $indo_bulan_ini = "Maret";
    } else if ($bulan_ini == 4) {
      $indo_bulan_ini = "April";
    } else if ($bulan_ini == 5) {
      $indo_bulan_ini = "Mei";
    } else if ($bulan_ini == 6) {
      $indo_bulan_ini = "Juni";
    } else if ($bulan_ini == 7) {
      $indo_bulan_ini = "Juli";
    } else if ($bulan_ini == 8) {
      $indo_bulan_ini = "Agustus";
    } else if ($bulan_ini == 9) {
      $indo_bulan_ini = "September";
    } else if ($bulan_ini == 10) {
      $indo_bulan_ini = "Oktober";
    } else if ($bulan_ini == 11) {
      $indo_bulan_ini = "November";
    } else if ($bulan_ini == 12) {
      $indo_bulan_ini = "Desember";
    }
    return $indo_bulan_ini;
  }

  // Waktu yang lalu (time ago)
  // Cara pakai : echo waktuYangLalu(strtotime(#tanggal dan waktu));
  function waktuYangLalu($waktu_awal) {
    $waktu_akhir = time();
    $selisih_waktu = $waktu_akhir - $waktu_awal;
    if ($selisih_waktu < 60) {
      $waktu_yang_lalu = $selisih_waktu.' detik yang lalu';
    } else if ($selisih_waktu < 3600) {
      $waktu_yang_lalu = round($selisih_waktu / 60).' menit yang lalu';
    } else if ($selisih_waktu < 86400) {
      $waktu_yang_lalu = round($selisih_waktu / 3600).' jam yang lalu';
    } else if ($selisih_waktu < 604800) {
      $waktu_yang_lalu = round($selisih_waktu / 86400).' hari yang lalu';
    } else if ($selisih_waktu < 2628000) {
      $waktu_yang_lalu = round($selisih_waktu / 604800).' minggu yang lalu';
    } else if ($selisih_waktu < 31536000) {
      $waktu_yang_lalu = round($selisih_waktu / 2628000).' bulan yang lalu';
    } else {
      $waktu_yang_lalu = round($selisih_waktu / 31536000).' tahun yang lalu';
    }
    return $waktu_yang_lalu;
  }

  // HitungUmur
  // Cara pakai : echo waktuYangLalu(strtotime(#tanggal dan waktu));
  function hitungUmur($tanggal_lahir) {
    $tanggal_sekarang = time();
    $selisih_tanggal = $tanggal_sekarang - $tanggal_lahir;
    if ($selisih_tanggal < 2628000) {
      $umur = 'Kurang dari 1 Bulan';
    } else if ($selisih_tanggal < 31536000) {
      $umur = round($selisih_tanggal / 2628000);
    } else {
      $jumlah_tahun = $selisih_tanggal / 31536000;
      $pemisah_jumlah_tahun = explode('.', $jumlah_tahun);
      $umur_tahun = $pemisah_jumlah_tahun[0];
      $jumlah_bulan = round($selisih_tanggal / 2628000);
      $umur_bulan = $jumlah_bulan - ($umur_tahun * 12);
      $umur = $umur_tahun.' Tahun '.$umur_bulan.' Bulan';
    }
    return $umur;
  }

  // IP Address Pengunjung
  // Cara Pakai : echo ipPengunjung();
  function ipPengunjung() {
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
      $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
      $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if (filter_var($client, FILTER_VALIDATE_IP)) {
      $ip = $client;
    } else if (filter_var($forward, FILTER_VALIDATE_IP)) {
      $ip = $forward;
    } else {
      $ip = $remote;
    }

    return $ip;
  }
 
?>