<?php
// konfigurasi database
$servername =   "127.0.0.1";
$username   =   "root";
$password   =   "";
$database   =   "DB_SIDOS";
// perintah php untuk akses ke database
$koneksi = mysqli_connect($servername, $username, $password, $database);
if (!$koneksi){
    die("Connection Failed:".mysqli_connect_error());
}
?>