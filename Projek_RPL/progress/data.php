<?php

session_start();
include '../koneksi.php';

$query = mysqli_query($conn,"
SELECT
progress_fisik.*,
proyek.nama_proyek

FROM progress_fisik

JOIN proyek
ON progress_fisik.id_proyek = proyek.id_proyek
");

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Progress</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<div class="d-flex justify-content-between mb-4">

<h2>Progress Fisik</h2>

<a
href="tambah.php"
class="btn btn-success">

Tambah Progress

</a>

</div>

<table class="table table-bordered">

<tr>
<th>No</th>
<th>Proyek</th>
<th>Progress</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>

<?php

$no=1;

while($data=mysqli_fetch_assoc($query)):

?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $data['nama_proyek']; ?></td>

<td><?php echo $data['persentase']; ?>%</td>

<td><?php echo $data['tanggal_update']; ?></td>

<td>

<a
href="edit.php?id=<?php echo $data['id_progress']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?php echo $data['id_progress']; ?>"
class="btn btn-danger btn-sm">

Hapus

</a>

</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>