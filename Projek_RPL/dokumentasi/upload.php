<?php

include '../koneksi.php';

$proyek = mysqli_query(
$conn,
"SELECT * FROM proyek"
);

if(isset($_POST['upload'])){

$namaFile = $_FILES['foto']['name'];
$tmpFile = $_FILES['foto']['tmp_name'];

move_uploaded_file(
$tmpFile,
"../assets/upload/".$namaFile
);

mysqli_query(
$conn,
"INSERT INTO dokumentasi
(
id_proyek,
foto,
tanggal_upload,
keterangan
)
VALUES
(
'$_POST[id_proyek]',
'$namaFile',
CURDATE(),
'$_POST[keterangan]'
)"
);

header("Location:data.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Upload Dokumentasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

<h2>Upload Dokumentasi</h2>

<form
method="POST"
enctype="multipart/form-data">

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
type="file"
name="foto"
class="form-control mb-3"
required>

<textarea
name="keterangan"
class="form-control mb-3"
placeholder="Keterangan"></textarea>

<button
type="submit"
name="upload"
class="btn btn-success">

Upload

</button>

</form>

</div>

</body>
</html>