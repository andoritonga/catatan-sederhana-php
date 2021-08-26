<?php
include 'koneksi.php';
session_start();
$id = $_GET['id'];
$judul = $_POST['judul5'];
$isi = $_POST['isi5'];
$tanggal =
$data = mysqli_query($koneksi,"select * from catatan where catatan_id='$id'");
while($x = mysqli_fetch_array($data)){
    mysqli_query($koneksi, "update catatan set catatan_judul='$judul', catatan_isi='$isi' where catatan_id='$id'");
}
header("location:index.php?alert=update");