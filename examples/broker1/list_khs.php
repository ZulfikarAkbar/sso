
<!doctype html>


<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Siakad UNJ SSO - List KHS</title>

  <!-- Custom fonts for this template-->
  <link href="sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "sidebar.php" ?>
    <!-- End of Sidebar -->

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
          

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar KHS</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                    <tr>
                      <th>No</th>
                      <th>Kelas</th>
                      <th>Kode Mata Kuliah</th>
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Nilai</th>
                      <th>Bobot</th>
                    </tr>
                  </thead>
                  
                 
                  <tbody>

                  
                  <?php
                    include "koneksi.php";
                    $khs = mysqli_query($koneksi, "SELECT * from TB_KHS");
                  ?>


                  <?php while($m = mysqli_fetch_array($khs)){ ?>
                    <tr>
                      <td><?php echo $m[no];?></td>
                      <td><?php echo $m[kelas];?></td>
                      <td><?php echo $m[kode_mk];?></td>
                      <td><?php echo $m[nama_mk];?></td>
                      <td><?php echo $m[sks];?></td>
                      <td><?php echo $m[nilai];?></td>
                      <td><?php echo $m[bobot];?></td>
                    </tr>
                    
                  <?php } ?>
                  
                  </tbody>
                  <?php
                    include "koneksi.php";
                    $sum = mysqli_query($koneksi, "SELECT SUM(sks), SUM(bobot) from TB_KHS");
                  ?>
                  <?php while($s = mysqli_fetch_array($sum)){ 
                      $sum_sks = $s['SUM(sks)'];
                      $sum_bobot = $s['SUM(bobot)'];
                  ?>
                    <tr >
                        <td colspan=4><strong>Total</strong></td>
                        <td><?php echo $sum_sks; ?></td>
                        <td></td>
                        <td><?php echo $sum_bobot; ?></td>
                    </tr>
                    <tr>
                        <td colspan=7>
                            <strong>Jumlah SKS = <?php echo $sum_sks; ?></strong>
                            <br>
                            <strong>Indeks Prestasi = <?php echo $sum_bobot/$sum_sks; ?></strong>
                        </td>
                    </tr>
                  <?php } ?>


                  
                  
                </table>
              </div>
            </div>

          
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

  <script src="sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="sbadmin2/js/demo/datatables-demo.js"></script>

</body>

</html>
