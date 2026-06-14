<?php

session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query(
        $conn,
        "SELECT * FROM user
        WHERE username='$username'
        AND password='$password'"
    );

    if(mysqli_num_rows($cek) > 0){

        $_SESSION['login'] = true;

        header("Location: admin/dashboard.php");
        exit;
    }

    else{

        echo "<script>alert('Login Gagal');</script>";

    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:#198754;
}

</style>

</head>

<body>

<div class="card shadow p-4" style="width:400px;">

<h2 class="text-center mb-4">
Login Admin
</h2>

<form method="POST">

<input
type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button
type="submit"
name="login"
class="btn btn-success w-100">

Login

</button>

</form>

</div>

</body>
</html>