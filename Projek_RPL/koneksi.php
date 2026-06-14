<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "monitoring_desa";

$conn = mysqli_connect(
    $host,
    $user,
    $pass,
    $db
);

if(!$conn){
    die("Koneksi database gagal");
}

?>