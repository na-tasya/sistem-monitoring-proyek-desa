<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM pengumuman
WHERE id_pengumuman='$id'"
);

header("Location:data.php");

?>