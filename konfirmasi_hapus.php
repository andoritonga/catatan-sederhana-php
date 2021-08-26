<?php
$id = $_GET['id'];
?>
<?php include 'header.php'?>
<center>
    <div class="container">
    <div class="modal-body">
        <h5>Yakin Ingin Menghapus Catatan?</h5>
    </div>
    <div class="modal-footer" method="get">
        <a href="index.php" class="btn btn-secondary">Batal</a>
        <a href="hapus.php?id=<?php echo $id; ?>" class="btn btn-danger">Hapus</a>
    </div>
    </div>    
</center>
                