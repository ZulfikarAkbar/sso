<?php
use Jasny\SSO\NotAttachedException;
require_once __DIR__ . '/../../vendor/autoload.php';

$sso_server = getenv('SSO_SERVER');
$sso_broker_id = getenv('SSO_BROKER_ID');
$sso_broker_secret = getenv('SSO_BROKER_SECRET');

$broker = new Jasny\SSO\Broker($sso_server, $sso_broker_id, $sso_broker_secret);
$broker->attach(true);
if (isset($_GET['logout'])) {
	$broker->logout();
} elseif ($broker->getUserInfo() || ($_SERVER['REQUEST_METHOD'] == 'POST' && $broker->login($_POST['username'], $_POST['password']))) {
	header("Location: index.php", true, 303);
	exit;
}


?>
<!doctype html>

<html lang="en">
<head>
	<title>Sidos UNJ - SSO</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<!-- <link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="Login/css/main.css">


<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" >

        <!-- <h1><?= $broker->broker ?> <small>(Single Sign-On demo)</small></h1> -->

            

			<div class="wrap-login100" >
				<div class="login100-pic"  data-tilt>
					<img src="Login/images/logo-unj.png" alt="IMG">
					<h5 style="text-align:center">
						<strong>Single Sign On - Sidos UNJ</strong>
					</h5>
					<div class="container-login100-form-btn">
						<a class="btn btn-primary" href="cari_dosen.php" style="background-color:#006f45"><i class="fa fa-search"> Cari Dosen</i></a>
                    </div>
				</div>
				<form class="login100-form" method="POST" action="login.php">
                    
					<span class="login100-form-title">
						Masuk Akun
                    </span>

					<div class="wrap-input100  ">
						<input class="input100 form-control"  placeholder="username" id="username" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>

					<div class="wrap-input100  ">
                        <input class="input100 form-control" type="password" placeholder="password" id="password" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
                    <br>
                    


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
                            Masuk
                        </button>
                    </div>

					<br>

					
                  

					<div class="text-center p-t-12">

					</div>

					<div class="text-center p-t-140">
                    <footer class="sticky-footer">
                        <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span style="color:#e25555"><i class="fa fa-heart" aria-hidden="true"></i></span> Development by TIM PKL SSO
                        </div>
                        </div>
                    </footer>
					</div>

				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="Login/js/main.js"></script>


</body>
</html>
