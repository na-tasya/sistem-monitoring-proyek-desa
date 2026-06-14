<?php

include '../koneksi.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM proyek
    WHERE id_proyek='$id'"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Detail Proyek</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<div class="card shadow">

<div class="card-body">

<h2>
<?php echo $data['nama_proyek']; ?>
</h2>

<hr>

<p>
<b>Lokasi :</b>
<?php echo $data['lokasi']; ?>
</p>

<p>
<b>Deskripsi :</b><br>
<?php echo $data['deskripsi']; ?>
</p>

<p>
<b>Tanggal Mulai :</b>
<?php echo $data['tanggal_mulai']; ?>
</p>

<p>
<b>Tanggal Selesai :</b>
<?php echo $data['tanggal_selesai']; ?>
</p>

<p>
<b>Status :</b>
<?php echo $data['status_proyek']; ?>
</p>

<a
href="data.php"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</div>

</body>
</html>