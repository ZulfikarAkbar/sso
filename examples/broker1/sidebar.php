<?php

use Jasny\SSO\NotAttachedException;
use Jasny\SSO\Exception as SsoException;

require_once __DIR__ . '/../../vendor/autoload.php';
// $dotenv = new Dotenv\Dotenv(__DIR__);
// $dotenv->load();
// require_once "koneksi_broker.php";
// $table_1 = mysqli_query($koneksi, "SELECT * from TB_BROKER");
// $count_1 = mysqli_num_rows($table_1);
// if($count_1>0){
//   while($row = mysqli_fetch_assoc($table_1)){
//     for($i = 0;$i>=$row;$i++){
//       $SSO_BROKER_ID = $row['broker_id'][$i];
//       $SSO_BROKER_SECRET = $row['secret'][$i];
//       $SSO_SERVER = $row['server'][$i];
//       $Broker = new Jasny\SSO\Broker(getenv($SSO_SERVER ), getenv($SSO_BROKER_ID ), getenv($SSO_BROKER_SECRET ));
//       $Broker->attach(true);
//       $user_info = $Broker->getUserInfo();
//       if (!$user_info) {
//         header("Location: login.php", true, 307);
//         exit;
//       }
//     }
//   }
// }
$sso_server = getenv('SSO_SERVER');
$sso_broker_id = getenv('SSO_BROKER_ID');
$sso_broker_secret = getenv('SSO_BROKER_SECRET');

$broker = new Jasny\SSO\Broker($sso_server, $sso_broker_id, $sso_broker_secret);
$broker->attach(true);
$user = $broker->getUserInfo();
if (!$user) {
    header("Location: login.php", true, 307);
    exit;
}
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Siakad UNJ <sup>Single Sign On</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
       
            <?php
                $js_ec = json_encode($user, JSON_PRETTY_PRINT);
                $js_dc = json_decode($js_ec);
                $role = $js_dc->role;
                if($role=="Dosen"){
                  echo '
                  <a class="nav-link" href="nilai_mahasiswa.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Daftar Nilai Mahasiswa</span>
                  </a>
                  ';
                }elseif($role=="Mahasiswa"){
                  echo '
                  <a class="nav-link" href="list_krs.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Daftar KRS</span>
                  </a>

                  <a class="nav-link" href="list_khs.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Daftar KHS</span>
                  </a>

                  <a class="nav-link" href="list_pembayaran.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Status Pembayaran</span>
                  </a>
                  ';
                }
            ?>
        
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

    </ul>
