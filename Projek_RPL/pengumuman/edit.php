<?php

include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM pengumuman
WHERE id_pengumuman='$id'"
));

if(isset($_POST['update'])){

mysqli_query(
$conn,
"UPDATE pengumuman SET

judul='$_POST[judul]',
isi='$_POST[isi]',
tanggal='$_POST[tanggal]'

WHERE id_pengumuman='$id'"
);

header("Location:data.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Pengumuman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

<h2>Edit Pengumuman</h2>

<form method="POST">

<input
type="text"
name="judul"
value="<?php echo $data['judul']; ?>"
class="form-control mb-3">

<textarea
name="isi"
class="form-control mb-3"><?php echo $data['isi']; ?></textarea>

<input
type="date"
name="tanggal"
value="<?php echo $data['tanggal']; ?>"
class="form-control mb-3">

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