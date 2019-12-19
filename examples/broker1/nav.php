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
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
<!--
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-angle-double-down fa-fw"></i>
                
                <span class="badge badge-danger badge-counter"></span>
              </a>
           


              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Other Apps
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="http://localhost:9001">
                  <div class="mr-3">
                    <div class="icon-circle" style="background-color:green">
                        <img src="Login/images/logo-unj.png"></img>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Siakad (Sistem Informasi Akademik)</span>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#"></a>
              </div>


            </li>
-->
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <i class="fa fa-user"></i>
                  Selamat datang, 
                  <?php
                    $js_ec = json_encode($user, JSON_PRETTY_PRINT);
                    $js_dc = json_decode($js_ec);
                    echo $js_dc->fullname;
                  ?>  (<?php echo $js_dc->role; ?>)
                </span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
