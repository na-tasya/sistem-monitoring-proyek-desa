<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM progress_fisik
WHERE id_progress='$id'"
);

header("Location:data.php");

?>