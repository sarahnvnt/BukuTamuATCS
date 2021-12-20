<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM ttamu where id='$id'");

//query hapus
$data = mysqli_query($koneksi, "delete from ttamu where id ='$id'") or die(mysqli_error($koneksi));

//alert dan redirect ke index.php
echo "<script>alert('Data Berhasil dihapus');window.location='data.php';</script>";
?>


header("location:index.php");