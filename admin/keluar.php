<?php
  include_once "modul/koneksi.php";
  session_start();
  unset($_SESSION['id_akun']);
  header("location: ".$alamat_website."admin/masuk");
  exit;
?>