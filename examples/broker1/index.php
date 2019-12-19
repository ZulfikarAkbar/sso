<?php
use Jasny\SSO\NotAttachedException;
use Jasny\SSO\Exception as SsoException;
require_once __DIR__ . '/../../vendor/autoload.php';

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

<!doctype html>


<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Siakad UNJ SSO - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "sidebar.php" ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "nav.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
            </div>

    <!-- frontend ucapan selamat datang -->
          <!-- <pre><?= json_encode($user, JSON_PRETTY_PRINT); ?></pre> -->
          <h5>
          <i class="fa fa-check" style="color:green"></i>
            Selamat datang
              <strong>
                
                <?php
                  $js_ec = json_encode($user, JSON_PRETTY_PRINT);
                  print_r($user);
                  $js_dc = json_decode($js_ec);
                ?>

                <?php
                  echo $js_dc->fullname;
                ?>
              </strong>
              <span style="color:green"><a style="color:green" href="index.php">di Siakad (Sistem Informasi Akademik)</a></span>
                kamu login sebagai 
                <strong>
                <?php
                  echo $js_dc->role;
                ?>
              </strong>
            </h5>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; TIM PKL SSO 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php?logout=1">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="sbadmin2/vendor/jquery/jquery.min.js"></script>
  <script src="sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="sbadmin2/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="sbadmin2/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="sbadmin2/js/demo/chart-area-demo.js"></script>
  <script src="sbadmin2/js/demo/chart-pie-demo.js"></script>

</body>

</html>