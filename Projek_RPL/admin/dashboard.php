<?php

session_start();
include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$totalProyek = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM proyek")
);

$totalProgress = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM progress_fisik")
);

$totalAnggaran = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM anggaran")
);

$totalDokumentasi = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM dokumentasi")
);

$totalPengumuman = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM pengumuman")
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fa;
}

.header{
    background:linear-gradient(135deg,#198754,#146c43);
    color:white;
    padding:30px;
    border-radius:20px;
    margin-bottom:30px;
}

.card-box{
    border:none;
    border-radius:20px;
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
}

.menu-btn{
    border-radius:15px;
    padding:20px;
    font-size:18px;
    font-weight:bold;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="container py-4">

<div class="header">

<div class="d-flex justify-content-between">

<div>

<h2>Sistem Monitoring Proyek Desa</h2>

<p class="mb-0">
Dashboard Perangkat Desa
</p>

</div>

<div>

<a href="../logout.php" class="btn btn-light">
Logout
</a>

</div>

</div>

</div>

<div class="row">

<div class="col-md-4 mb-4">
<div class="card card-box">
<div class="card-body text-center">
<h5>Total Proyek</h5>
<h1><?php echo $totalProyek; ?></h1>
</div>
</div>
</div>

<div class="col-md-4 mb-4">
<div class="card card-box">
<div class="card-body text-center">
<h5>Progress</h5>
<h1><?php echo $totalProgress; ?></h1>
</div>
</div>
</div>

<div class="col-md-4 mb-4">
<div class="card card-box">
<div class="card-body text-center">
<h5>Anggaran</h5>
<h1><?php echo $totalAnggaran; ?></h1>
</div>
</div>
</div>

<div class="col-md-6 mb-4">
<div class="card card-box">
<div class="card-body text-center">
<h5>Dokumentasi</h5>
<h1><?php echo $totalDokumentasi; ?></h1>
</div>
</div>
</div>

<div class="col-md-6 mb-4">
<div class="card card-box">
<div class="card-body text-center">
<h5>Pengumuman</h5>
<h1><?php echo $totalPengumuman; ?></h1>
</div>
</div>
</div>

</div>

<h3 class="mb-4">
Menu Admin
</h3>

<div class="row">

<div class="col-md-4 mb-3">
<a href="../proyek/data.php"
class="btn btn-primary w-100 menu-btn">
 Kelola Proyek
</a>
</div>

<div class="col-md-4 mb-3">
<a href="../progress/data.php"
class="btn btn-success w-100 menu-btn">
 Progress Fisik
</a>
</div>

<div class="col-md-4 mb-3">
<a href="../anggaran/data.php"
class="btn btn-warning w-100 menu-btn">
 Anggaran
</a>
</div>

<div class="col-md-4 mb-3">
<a href="../dokumentasi/data.php"
class="btn btn-info w-100 menu-btn">
 Dokumentasi
</a>
</div>

<div class="col-md-4 mb-3">
<a href="../pengumuman/data.php"
class="btn btn-secondary w-100 menu-btn">
 Pengumuman
</a>
</div>


</div>

</div>

</body>
</html>