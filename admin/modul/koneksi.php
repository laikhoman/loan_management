<?php
  date_default_timezone_set("Asia/Jakarta");
  $alamat_website = 'https://hislot.info/';
  $host = "localhost";
  $username = "ashoxvoy_hislot";
  $password = "I?U0}r3FFGmA";
  $database = "ashoxvoy_hislot";
  $koneksi = mysqli_connect($host, $username, $password, $database);
  if (!$koneksi) {
    echo "Kesalahan : Tidak dapat terhubung ke database." . PHP_EOL;
    echo "Kode Kesalahan : " . mysqli_connect_errno() . PHP_EOL;
    echo "Pesan Kesalahan : " . mysqli_connect_error() . PHP_EOL;
    exit;
  }
?>