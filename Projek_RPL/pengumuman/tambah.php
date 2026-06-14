<?php

include '../koneksi.php';

if(isset($_POST['simpan'])){

mysqli_query(
$conn,
"INSERT INTO pengumuman
(
judul,
isi,
tanggal
)
VALUES
(
'$_POST[judul]',
'$_POST[isi]',
'$_POST[tanggal]'
)"
);

header("Location:data.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Pengumuman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

<h2>Tambah Pengumuman</h2>

<form method="POST">

<input
type="text"
name="judul"
class="form-control mb-3"
placeholder="Judul Pengumuman"
required>

<textarea
name="isi"
class="form-control mb-3"
placeholder="Isi Pengumuman"
required></textarea>

<input
type="date"
name="tanggal"
class="form-control mb-3"
required>

<button
type="submit"
name="simpan"
class="btn btn-success">

Simpan

</button>

</form>

</div>

</body>
</html>