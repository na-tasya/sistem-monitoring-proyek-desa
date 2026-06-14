<?php

session_start();
include '../koneksi.php';

$query = mysqli_query($conn,"
SELECT
anggaran.*,
proyek.nama_proyek

FROM anggaran

JOIN proyek
ON anggaran.id_proyek = proyek.id_proyek
");

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Anggaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

<div class="d-flex justify-content-between mb-4">

<h2>Data Anggaran</h2>

<a href="tambah.php" class="btn btn-success">
Tambah Anggaran
</a>

</div>

<table class="table table-bordered">

<tr>
<th>No</th>
<th>Proyek</th>
<th>Alokasi</th>
<th>Realisasi</th>
<th>Aksi</th>
</tr>

<?php

$no=1;

while($data=mysqli_fetch_assoc($query)):

?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $data['nama_proyek']; ?></td>

<td>
Rp <?php echo number_format($data['alokasi']); ?>
</td>

<td>
Rp <?php echo number_format($data['realisasi']); ?>
</td>

<td>

<a
href="edit.php?id=<?php echo $data['id_anggaran']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?php echo $data['id_anggaran']; ?>"
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