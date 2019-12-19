<?php
// konfigurasi database
$servername =   "127.0.0.1";
$username   =   "root";
$password   =   "";
$database2   =   "BROKER_DB";
// perintah php untuk akses ke database
$koneksi2 = mysqli_connect($servername, $username, $password, $database2);
if (!$koneksi2){
    die("Connection Failed:".mysqli_connect_error());
}
?>
