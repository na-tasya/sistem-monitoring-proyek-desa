<?php

session_start();

include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$query = mysqli_query(
$conn,
"SELECT * FROM proyek
WHERE nama_proyek LIKE '%$cari%'
ORDER BY id_proyek DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Proyek</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<div class="d-flex justify-content-between mb-4">

<h2>Data Proyek</h2>

<a
href="tambah.php"
class="btn btn-success">

Tambah Proyek

</a>

</div>

<form method="GET" class="mb-3">

<div class="row">

<div class="col-md-10">

<input
type="text"
name="cari"
class="form-control"
placeholder="Cari proyek..."
value="<?php echo $cari; ?>">

</div>

<div class="col-md-2">

<button
type="submit"
class="btn btn-success w-100">

Cari

</button>

</div>

</div>

</form>

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>No</th>
<th>Nama Proyek</th>
<th>Lokasi</th>
<th>Status</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($data=mysqli_fetch_assoc($query)) :

?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $data['nama_proyek']; ?></td>

<td><?php echo $data['lokasi']; ?></td>

<td><?php echo $data['status_proyek']; ?></td>

<td>

<a
href="detail.php?id=<?php echo $data['id_proyek']; ?>"
class="btn btn-info btn-sm">

Detail

</a>

<a
href="edit.php?id=<?php echo $data['id_proyek']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?php echo $data['id_proyek']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">

Hapus

</a>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

<a
href="../admin/dashboard.php"
class="btn btn-secondary">

Kembali Dashboard

</a>

</div>

</body>
</html>