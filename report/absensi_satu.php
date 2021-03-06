<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Absensi</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT absensi.*,pegawai.nama as namapegawai from absensi left join pegawai on absensi. nip = pegawai
        . nip where absensi. nip = pegawai. nip";
     
        //proses query ke database
        $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
        //Merubaha data hasil query kedalam bentuk array
        $data = mysqli_fetch_array($query);
        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Absensi PT PN1 </h2>
                        <h4>Jalan Jendral Ahmad Yani No. 33, Sei Renggas, Kisaran, Sendang Sari <br> Kisaran Barat, Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>DATA ABSENSI</h3>
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                            <tr>
                                    <td>Id Absensi</td> <td><?= $data['id_absensi'] ?></td>
                                </tr>
								<tr>
                                    <td>Nama      </td> <td><?= $data['namapegawai'] ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Masuk</td> <td><?= $data['waktu_masuk'] ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Keluar</td> <td><?= $data['waktu_keluar'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td> <td><?= $data['tgl_tahun'] ?></td>
                                </tr>
								<tr>
                                    <td>Jumlah Kehadiran</td> <td><?= $data['jumlah_kehadiran'] ?> </td>
                                </tr>
                                
									
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Kisaran  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>SURYA, S.T<strong></u><br>
                                        NIP.102871291416712
									</td>
								</tr>
							</tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>
