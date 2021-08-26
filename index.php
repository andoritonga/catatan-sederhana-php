<?php include 'koneksi.php'?>
<html>
<?php include 'header.php'?>
    <style type="text/css">
            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
            }
            .preloader .loading {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                font: 14px arial;
            }
            .spinner {
                display: none;
            }
            .act-btn{
                background:black;
                display: block;
                line-height: 50px;
                text-align: center;
                color: white;
                font-size: 20px;
                font-weight: bold;
                text-decoration: none;
                transition: ease all 0.3s;
                position: fixed;
                right: 30px;
                bottom:30px;
                border-radius: 10px
            }
    </style>    
    <script>
        $(window).load(function() {
            $(".preloader").fadeOut("slow");
        });
    </script>
    <body>
        <<div class="preloader">
            <div class="loading">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header">
                <h1>Aplikasi Catatan Sederhana</h1>
            </div>
            <?php
            if(isset($_GET['alert'])){
                if($_GET['alert'] == "update"){
                    echo "<div class='alert alert-warning'>Catatan Berhasil Diperbaharui!</div>";
                }elseif($_GET['alert'] == "sukses"){
                    echo "<div class='alert alert-success'>Catatan Berhasil Dibuat!</div>";
                }elseif($_GET['alert'] == "hapus"){
                    echo "<div class='alert alert-danger'>Catatan Berhasil Dihapus!</div>";
                }                               
            }
            $data = mysqli_query($koneksi, "select * from catatan");
            while($d = mysqli_fetch_array($data)) {
            ?>
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $d['catatan_judul'];?></h4>
                    <p><?php echo DateToIndo($d['catatan_tanggal']);?></p>
                </div>
                <div class="card-body">
                    <h5><?php echo $d['catatan_isi'];?></h5>
                </div>
                <div class="card-footer">
                    <a href="edit.php?id=<?php echo $d['catatan_id'];?>" class="btn btn-primary">Edit Catatan</a>
                    <a href="konfirmasi_hapus.php?id=<?php echo $d['catatan_id'];?>" class="btn btn-danger ">Hapus</a>
                </div>
            </div>
            <br>
            <?php } ?>
            <br>
                <button type="button" class="btn btn-dark act-btn" data-toggle="modal" data-target="#exampleModal3">
                    + Buat Catatan
                </button>
                    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="tambah.php" method="post">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tulis Catatan Baru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" id="exampleModalLabel" placeholder="Masukkan Judul" name="judul1" value=""></input>
                                    <br>
                                    <textarea class="form-control" placeholder="Tulis Isi Catatan" name="isi1" required="required" autocomplete="off" style="resize: none" rows="10"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary" value="simpan">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>    
                    </div>
            <script src="styles/js/bootstrap.min.js"></script>
        </div>
    </body>
    <footer>
        <center>
            <p>Copyright &#169; 2021, Yohannes Christiando Ritonga</p>
        </center>        
    </footer>     
</html>

<?php
function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
    $BulanIndo = array("Januari", "Februari", "Maret",
               "April", "Mei", "Juni",
               "Juli", "Agustus", "September",
               "Oktober", "November", "Desember");
  
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
}

?>