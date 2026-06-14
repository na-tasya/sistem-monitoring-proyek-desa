<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM proyek
    WHERE id_proyek='$id'"
);

header("Location:data.php");

?>