<?php
include 'koneksi.php';

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

$sql = "
SELECT
p.id_proyek,
p.nama_proyek,
p.lokasi,
p.deskripsi,
p.status_proyek,
IFNULL(pf.persentase,0) AS persentase,
IFNULL(a.alokasi,0) AS alokasi,
IFNULL(a.realisasi,0) AS realisasi

FROM proyek p

LEFT JOIN progress_fisik pf
ON p.id_proyek = pf.id_proyek

LEFT JOIN anggaran a
ON p.id_proyek = a.id_proyek

WHERE 1=1
";

if($cari != ''){
    $sql .= " AND p.nama_proyek LIKE '%$cari%'";
}

if($status != ''){
    $sql .= " AND p.status_proyek='$status'";
}

$sql .= " ORDER BY p.id_proyek DESC";

$query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Sistem Monitoring Proyek Desa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

.hero{
    background:#198754;
    color:white;
    padding:70px 0;
}

.card{
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">

<div class="container">

<a class="navbar-brand fw-bold">
Monitoring Proyek Desa
</a>

<a href="login.php" class="btn btn-light">
Login Admin
</a>

</div>

</nav>

<section class="hero text-center">

<div class="container">

<h1>Sistem Monitoring Proyek Desa</h1>

<p>
Masyarakat dapat melihat perkembangan pembangunan desa secara transparan
</p>

</div>

</section>

<div class="container py-5">

<h2 class="mb-4">
Daftar Proyek
</h2>

<form method="GET" class="row mb-4">

<div class="col-md-5">

<input
type="text"
name="cari"
class="form-control"
placeholder="Cari proyek..."
value="<?php echo $cari; ?>">

</div>

<div class="col-md-4">

<select
name="status"
class="form-control">

<option value="">
Semua Status
</option>

<option value="Perencanaan">
Perencanaan
</option>

<option value="Berjalan">
Berjalan
</option>

<option value="Selesai">
Selesai
</option>

</select>

</div>

<div class="col-md-3">

<button
type="submit"
class="btn btn-success w-100">

Cari

</button>

</div>

</form>

<div class="row">

<?php while($data=mysqli_fetch_assoc($query)) : ?>

<div class="col-md-6 mb-4">

<div class="card shadow">

<div class="card-body">

<h4>
<?php echo $data['nama_proyek']; ?>
</h4>

<p>
<?php echo $data['lokasi']; ?>
</p>

<p>
<?php echo $data['deskripsi']; ?>
</p>

<p>

Status :

<span class="badge bg-success">

<?php echo $data['status_proyek']; ?>

</span>

</p>

<p>

Progress :

<?php echo $data['persentase']; ?>%

</p>

<div class="progress mb-3">

<div
class="progress-bar bg-success"
style="width:<?php echo $data['persentase']; ?>%;">

<?php echo $data['persentase']; ?>%

</div>

</div>

<p>

<b>Alokasi :</b>

Rp <?php echo number_format($data['alokasi']); ?>

</p>

<p>

<b>Realisasi :</b>

Rp <?php echo number_format($data['realisasi']); ?>

</p>

<a
href="proyek/detail.php?id=<?php echo $data['id_proyek']; ?>"
class="btn btn-success">

Detail

</a>

</div>

</div>

</div>

<?php endwhile; ?>

</div>

</div>

</body>
</html>