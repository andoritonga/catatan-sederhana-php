<?php
include 'koneksi.php';
session_start();
$id = $_GET['id'];
$data = mysqli_query($koneksi,"select * from catatan where catatan_id='$id'");
while($x = mysqli_fetch_array($data)){
    mysqli_query($koneksi, "delete from catatan where catatan_id='$id'");
}
header("location:index.php?alert=hapus");