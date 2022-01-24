<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Absensi Karyawan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                 
						 <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <select name="nama" class="form-control">
                                <option value="">Pilih Nama
                                    <?php 
                                    $tampil=mysqli_query($koneksi," select * from pegawai order by nama");
                                    while ($rtampil=mysqli_fetch_array($tampil)) {
                                        echo "<option value=\"$rtampil[nip]\">$rtampil[nama]</option>";
                                        }
                                     ?>
                                    
                                </option>
                                    

                                </select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="waktu_masuk" class="col-sm-3 control-label">Waktu Masuk</label>
                            <div class="col-sm-9">
                            <input type="time" name="waktu_masuk" class="form-control" id="inputEmail3" placeholder="Waktu Masuk" required>
                            </div>
                            </div>
                         <div class="form-group">
                            <label for="waktu_keluar" class="col-sm-3 control-label">Waktu keluar</label>
                            <div class="col-sm-9">
                            <input type="time" name="waktu_keluar" class="form-control" id="inputEmail3" placeholder="Waktu keluar" required>
                            </div>
                            </div>
						
					<div class="form-group">
                            <label for="tgl_tahun" class="col-sm-3 control-label">Tanggal/Tahun</label>
                            <div class="col-sm-9">
                            <input type="date" name="tgl_tahun" class="form-control" id="inputEmail3" placeholder="Tgl Tahun" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kehadiran" class="col-sm-3 control-label">Jumlah Kehadiran</label>
                            <div class="col-sm-9">
                            <input type="text" name="jumlah_kehadiran" class="form-control"  id="inputEmail3" placeholder="Jumlah Kehadiran" required>
                            </div>
                        </div>
                        <input type="hidden" name="id_absensi" >
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data</button>
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
    
	$nama=$_POST['nama'];
	$waktu_masuk=$_POST['waktu_masuk'];
	$waktu_keluar=$_POST['waktu_keluar'];
  $tgl_tahun=$_POST['tgl_tahun'];
	$jumlah_kehadiran=$_POST['jumlah_kehadiran'];
 
    //buat sql
    $sql="INSERT INTO absensi VALUES ('','$nama','$waktu_masuk','$waktu_keluar','$tgl_tahun','$jumlah_kehadiran')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Data Error");
    if ($query){
        echo "<script>window.location.assign('?page=absensi&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
