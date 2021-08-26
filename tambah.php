<?php
include 'koneksi.php';
$judul1 = $_POST['judul1'];
$isi1 = $_POST['isi1'];
$tanggal = date("Y-m-d");
mysqli_query($koneksi,"insert into catatan values(NULL,'$judul1','$tanggal','$isi1')");

header("location:index.php?alert=sukses");