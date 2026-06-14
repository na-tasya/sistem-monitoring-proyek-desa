<?php

include '../koneksi.php';

$proyek = mysqli_query(
    $conn,
    "SELECT * FROM proyek"
);

if(isset($_POST['simpan'])){

    mysqli_query(
        $conn,
        "INSERT INTO progress_fisik
        (
        id_proyek,
        persentase,
        tanggal_update,
        keterangan
        )
        VALUES
        (
        '$_POST[id_proyek]',
        '$_POST[persentase]',
        '$_POST[tanggal_update]',
        '$_POST[keterangan]'
        )"
    );

    header("Location:data.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Progress</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<h2>Tambah Progress</h2>

<form method="POST">

<select
name="id_proyek"
class="form-control mb-3">

<?php while($p=mysqli_fetch_assoc($proyek)) : ?>

<option
value="<?php echo $p['id_proyek']; ?>">

<?php echo $p['nama_proyek']; ?>

</option>

<?php endwhile; ?>

</select>

<input
type="number"
name="persentase"
class="form-control mb-3"
placeholder="Persentase">

<input
type="date"
name="tanggal_update"
class="form-control mb-3">

<textarea
name="keterangan"
class="form-control mb-3"
placeholder="Keterangan"></textarea>

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