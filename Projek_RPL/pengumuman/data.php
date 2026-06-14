<?php

include '../koneksi.php';

$query = mysqli_query(
$conn,
"SELECT * FROM pengumuman
ORDER BY id_pengumuman DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Pengumuman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

<div class="d-flex justify-content-between mb-4">

<h2>Pengumuman</h2>

<a
href="tambah.php"
class="btn btn-success">

Tambah Pengumuman

</a>

</div>

<table class="table table-bordered">

<tr>
<th>No</th>
<th>Judul</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>

<?php

$no=1;

while($data=mysqli_fetch_assoc($query)) :

?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $data['judul']; ?></td>

<td><?php echo $data['tanggal']; ?></td>

<td>

<a
href="edit.php?id=<?php echo $data['id_pengumuman']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?php echo $data['id_pengumuman']; ?>"
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