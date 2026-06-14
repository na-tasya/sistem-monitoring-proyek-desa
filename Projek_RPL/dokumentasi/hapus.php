<?php

include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM dokumentasi
WHERE id_dokumentasi='$id'"
));

unlink(
"../assets/upload/".$data['foto']
);

mysqli_query(
$conn,
"DELETE FROM dokumentasi
WHERE id_dokumentasi='$id'"
);

header("Location:data.php");

?>