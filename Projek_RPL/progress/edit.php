<?php

include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM progress_fisik
WHERE id_progress='$id'"
));

if(isset($_POST['update'])){

mysqli_query(
$conn,
"UPDATE progress_fisik SET

persentase='$_POST[persentase]',
tanggal_update='$_POST[tanggal_update]',
keterangan='$_POST[keterangan]'

WHERE id_progress='$id'"
);

header("Location:data.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Progress</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<h2>Edit Progress</h2>

<form method="POST">

<input
type="number"
name="persentase"
value="<?php echo $data['persentase']; ?>"
class="form-control mb-3">

<input
type="date"
name="tanggal_update"
value="<?php echo $data['tanggal_update']; ?>"
class="form-control mb-3">

<textarea
name="keterangan"
class="form-control mb-3"><?php echo $data['keterangan']; ?></textarea>

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