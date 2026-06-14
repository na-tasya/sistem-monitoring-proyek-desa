<?php

include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM proyek
        WHERE id_proyek='$id'"
    )
);

if(isset($_POST['update'])){

    mysqli_query(
        $conn,
        "UPDATE proyek SET

        nama_proyek='$_POST[nama_proyek]',
        lokasi='$_POST[lokasi]',
        deskripsi='$_POST[deskripsi]',
        tanggal_mulai='$_POST[tanggal_mulai]',
        tanggal_selesai='$_POST[tanggal_selesai]',
        status_proyek='$_POST[status]'

        WHERE id_proyek='$id'"
    );

    header("Location:data.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Proyek</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<h2>Edit Proyek</h2>

<form method="POST">

<input
type="text"
name="nama_proyek"
value="<?php echo $data['nama_proyek']; ?>"
class="form-control mb-3">

<input
type="text"
name="lokasi"
value="<?php echo $data['lokasi']; ?>"
class="form-control mb-3">

<textarea
name="deskripsi"
class="form-control mb-3"><?php echo $data['deskripsi']; ?></textarea>

<input
type="date"
name="tanggal_mulai"
value="<?php echo $data['tanggal_mulai']; ?>"
class="form-control mb-3">

<input
type="date"
name="tanggal_selesai"
value="<?php echo $data['tanggal_selesai']; ?>"
class="form-control mb-3">

<select
name="status"
class="form-control mb-3">

<option <?php if($data['status_proyek']=="Perencanaan") echo "selected"; ?>>
Perencanaan
</option>

<option <?php if($data['status_proyek']=="Berjalan") echo "selected"; ?>>
Berjalan
</option>

<option <?php if($data['status_proyek']=="Selesai") echo "selected"; ?>>
Selesai
</option>

</select>

<button
type="submit"
name="update"
class="btn btn-success">

Update

</button>

</form>

</div>

</body>
</html>