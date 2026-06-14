<?php

include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM anggaran
WHERE id_anggaran='$id'"
));

if(isset($_POST['update'])){

mysqli_query(
$conn,
"UPDATE anggaran SET

alokasi='$_POST[alokasi]',
realisasi='$_POST[realisasi]'

WHERE id_anggaran='$id'"
);

header("Location:data.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Anggaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

<h2>Edit Anggaran</h2>

<form method="POST">

<input
type="number"
name="alokasi"
value="<?php echo $data['alokasi']; ?>"
class="form-control mb-3">

<input
type="number"
name="realisasi"
value="<?php echo $data['realisasi']; ?>"
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