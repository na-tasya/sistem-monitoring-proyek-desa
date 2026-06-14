<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM anggaran
WHERE id_anggaran='$id'"
);

header("Location:data.php");

?>