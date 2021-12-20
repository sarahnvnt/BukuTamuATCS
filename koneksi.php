<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "dbbuku_tamu";

$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

// jika tombol simpan di klik
if (isset($_POST['simpan'])) {
    //persiapan simpan data ke database
    $simpan = mysqli_query($koneksi, "INSERT into ttamu (nama, alamat, nope, keterangan)
                VALUES ('$_POST[nama]','$_POST[alamat]','$_POST[nope]','$_POST[keterangan]')");
    if ($simpan) {
        //jika simpan berhasil maka akan ada pesan 
        echo "<script>
                    alert('Penyimpanan Data Sukses!! Terimakasih Sdr/i $_POST[nama] atas kunjungannya!!');
                    document.location='index.php';
                    </script>";
    }
}
