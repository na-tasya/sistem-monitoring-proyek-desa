<?php

include '../koneksi.php';

$proyek = mysqli_query(
$conn,
"SELECT * FROM proyek"
);

if(isset($_POST['simpan'])){

mysqli_query(
$conn,
"INSERT INTO anggaran
(
id_proyek,
alokasi,
realisasi
)
VALUES
(
'$_POST[id_proyek]',
'$_POST[alokasi]',
'$_POST[realisasi]'
)"
);

header("Location:data.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Anggaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

<h2>Tambah Anggaran</h2>

<form method="POST">

<select
name="id_proyek"
class="form-control mb-3">

<?php while($p=mysqli_fetch_assoc($proyek)) : ?>

<option value="<?php echo $p['id_proyek']; ?>">
<?php echo $p['nama_proyek']; ?>
</option>

<?php endwhile; ?>

</select>

<input
type="number"
name="alokasi"
class="form-control mb-3"
placeholder="Alokasi Dana">

<input
type="number"
name="realisasi"
class="form-control mb-3"
placeholder="Realisasi Dana">

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