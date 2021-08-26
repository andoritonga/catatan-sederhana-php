<?php
$id3 = $_GET['id'];
?>
<?php include 'header.php'?>
<?php include 'koneksi.php'?>
<div class="container">
    <div class="header">
        <h1>Edit Catatan</h1>
    </div>
    <?php
        $data1 = mysqli_query($koneksi, "select * from catatan where catatan_id='$id3'");
            while($d1 = mysqli_fetch_array($data1)) {
    ?>
    <form action="update.php?id=<?php echo $d1['catatan_id'];?>" method="post">
        <div class="card">
            <div class="card-header">
                <input class="form-control" type="text" placeholder="Masukkan Judul" name="judul5" required="required" value="<?php echo $d1['catatan_judul'];?>"></input>
            </div>
            <div class="card-body">
            <textarea class="form-control" name="isi5" placeholder="Tulis isi Catatan..." id="exampleFormControlTextarea1" rows="10"><?php echo $d1['catatan_isi'];?></textarea>
            </div>
            <div class="card-footer">
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary" value="simpan">Simpan</button>
            </div>
        </div>           
    </form>
    <?php } ?>
</div>