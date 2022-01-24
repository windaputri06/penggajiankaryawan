<?php
$id_absensi=$_GET['id_absensi'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM absensi WHERE id_absensi ='$id_absensi'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Absensi</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                   
                     <div class="form-group">
                            <label for="Waktu_masuk" class="col-sm-3 control-label">Waktu Masuk</label>
                            <div class="col-sm-9">
                            <input type="time" name="Waktu_masuk"value="<?=$data['waktu_masuk']?>" class="form-control" id="inputEmail3" placeholder="Waktu Masuk" required>
                            </div>
                            </div>
                     <div class="form-group">
                            <label for="waktukeluar" class="col-sm-3 control-label">Waktu keluar</label>
                            <div class="col-sm-9">
                            <input type="time" name="waktukeluar"value="<?=$data['waktu_keluar']?>" class="form-control" id="inputEmail3" placeholder="Waktu keluar" required>
                            </div>
                            </div>
						
					<div class="form-group">
                            <label for="tgltahun" class="col-sm-3 control-label">Tanggal/Tahun</label>
                            <div class="col-sm-9">
                            <input type="date" name="tgltahun" value="<?=$data['tgl_tahun']?>" class="form-control" id="inputEmail3" placeholder="Tgl Tahun" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlahkehadiran" class="col-sm-3 control-label">Jumlah Kehadiran</label>
                            <div class="col-sm-9">
                            <input type="text" name="jumlahkehadiran"value="<?=$data['jumlah_kehadiran']?>" class="form-control"  id="inputEmail3" placeholder="Jumlah Kehadiran" required>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Absensi</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=absensi&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Absensi
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
    
    $Waktu_masuk=$_POST['Waktu_masuk'];
    $waktukeluar=$_POST['waktukeluar'];
	$tgltahun=$_POST['tgltahun'];
    $jumlahkehadiran=$_POST['jumlahkehadiran'];
	
    //buat sql
    $sql="UPDATE absensi SET waktu_masuk='$Waktu_masuk',waktu_keluar='$waktukeluar',tgl_tahun='$tgltahun',jumlah_kehadiran='$jumlahkehadiran' WHERE id_absensi ='$id_absensi'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=absensi&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



