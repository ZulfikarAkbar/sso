<?php
    $host="127.0.0.1";
    $username="root";
    $password="";
    $database="BROKER_DB";
    $koneksi=mysqli_connect($host, $username, $password, $database);
    if (!$koneksi) die("Connection Failed: ".mysqli_connect_error());
?>
