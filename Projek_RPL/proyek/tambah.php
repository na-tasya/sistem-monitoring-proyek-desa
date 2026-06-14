<?php

include '../koneksi.php';

if(isset($_POST['simpan'])){

    mysqli_query(
        $conn,
        "INSERT INTO proyek
        (
        nama_proyek,
        lokasi,
        deskripsi,
        tanggal_mulai,
        tanggal_selesai,
        status_proyek
        )
        VALUES
        (
        '$_POST[nama_proyek]',
        '$_POST[lokasi]',
        '$_POST[deskripsi]',
        '$_POST[tanggal_mulai]',
        '$_POST[tanggal_selesai]',
        '$_POST[status]'
        )"
    );

    header("Location:data.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Proyek</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<h2>Tambah Proyek</h2>

<form method="POST">

<input
type="text"
name="nama_proyek"
class="form-control mb-3"
placeholder="Nama Proyek"
required>

<input
type="text"
name="lokasi"
class="form-control mb-3"
placeholder="Lokasi"
required>

<textarea
name="deskripsi"
class="form-control mb-3"
placeholder="Deskripsi"></textarea>

<input
type="date"
name="tanggal_mulai"
class="form-control mb-3">

<input
type="date"
name="tanggal_selesai"
class="form-control mb-3">

<select
name="status"
class="form-control mb-3">

<option>Perencanaan</option>
<option>Berjalan</option>
<option>Selesai</option>

</select>

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