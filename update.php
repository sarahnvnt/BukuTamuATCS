<?php

include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nope = $_POST['nope'];
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "UPDATE ttamu SET nama='$nama', alamat='$alamat', nope='$nope' , tanggal='$tanggal', keterangan='$keterangan' WHERE id='$id'");

header("location:index.php?pesan=update");
