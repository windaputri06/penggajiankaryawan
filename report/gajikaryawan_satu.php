<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Gaji</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT gaji.*,pegawai.nama as namapegawai,absensi.jumlah_kehadiran as jmh from gaji left join pegawai on gaji.nip = pegawai.nip 
                            inner join absensi on pegawai.nip = absensi.nip where gaji.nip = pegawai.nip ";
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
                        <h2>Sistem Informasi Gaji PT PN1 </h2>
                        <h4>Jalan Jendral Ahmad Yani No. 33, Sei Renggas, Kisaran, Sendang Sari <br> Kisaran Barat, Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>DATA GAJI</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                            <tbody>
                            <tr>
                                <td>ID gaji</td><td><?= $data['idgaji'] ?></td>
                                </tr>
                                <tr>
                                <td>Nama</td><td><?= $data['namapegawai'] ?></td>
                                </tr>
                                <tr>
                                <?php $tot = $data['jmh'] * $data['gaji'] + $data['tunjangan'] - $data['potongan'] ?>
                                </tr>
                                <tr>
                                <td>Jumlah HK</td><td><?= $data['jmh'] ?></td>
                                </tr>
                                <tr>
                                <td>Tanggal </td><td><?= $data['tgl_gaji'] ?></td>
                                </tr><tr>
                                <td>Gaji</td><td><?= $data['gaji'] ?></td>
                                </tr><tr>
                                <td>Tunjangan</td><td><?= $data['tunjangan'] ?></td>
                                </tr><tr>
                                <td>Potongan</td><td><?= $data['potongan'] ?></td>
                                </tr>
                                <td>Total Gaji</td><td><?= $tot ?></td>
                                    

                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Kisaran  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Kabag Hukum, S.Hum<strong></u><br>
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