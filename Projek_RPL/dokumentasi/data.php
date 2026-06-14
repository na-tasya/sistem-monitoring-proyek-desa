<?php

session_start();
include '../koneksi.php';

$query = mysqli_query($conn,"
SELECT
dokumentasi.*,
proyek.nama_proyek

FROM dokumentasi

JOIN proyek
ON dokumentasi.id_proyek = proyek.id_proyek

ORDER BY id_dokumentasi DESC
");

?>

<!DOCTYPE html>
<html>
<head>

<title>Dokumentasi Proyek</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

<div class="d-flex justify-content-between mb-4">

<h2>Dokumentasi Proyek</h2>

<a
href="upload.php"
class="btn btn-success">

Upload Dokumentasi

</a>

</div>

<div class="row">

<?php while($data=mysqli_fetch_assoc($query)) : ?>

<div class="col-md-4 mb-4">

<div class="card shadow">

<img
src="../assets/upload/<?php echo $data['foto']; ?>"
height="250"
style="object-fit:cover;">

<div class="card-body">

<h5>
<?php echo $data['nama_proyek']; ?>
</h5>

<p>
<?php echo $data['keterangan']; ?>
</p>

<p>
<?php echo $data['tanggal_upload']; ?>
</p>

<a
href="hapus.php?id=<?php echo $data['id_dokumentasi']; ?>"
class="btn btn-danger btn-sm">

Hapus

</a>

</div>

</div>

</div>

<?php endwhile; ?>

</div>

</div>

</body>
</html>