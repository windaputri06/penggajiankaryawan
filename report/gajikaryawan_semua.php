<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Seluruh  Gaji Karyawan</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Gaji Karyawan PTPN1 </h2>
                        <h4>Jalan Jendral Ahmad Yani No. 33, Sei Renggas, Kisaran, Sendang Sari <br> Kisaran Barat, Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>DATA SELURUH GAJI KARYAWAN</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                        <tbody>
                                <thead>
                                <tr>
                                <th>No.</th><th>ID GAJI</th><th>NAMA</th><th>JMH</th><th>TANGGAL GAJI</th><th>GAJI</th><th>TUNJANGAN</th><th>POTONGAN</th><th>TOTAL GAJI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT gaji.*,pegawai.nama as namapegawai,absensi.jumlah_kehadiran as jmh from gaji left join pegawai on gaji.nip = pegawai.nip 
                                    inner join absensi on pegawai.nip = absensi.nip where gaji.nip = pegawai.nip ";
                            //$sql = "SELECT * FROM gaji";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['idgaji'] ?></td>
                                    <td><?= $data['namapegawai'] ?></td>
                                    <?php $tot = $data['jmh'] * $data['gaji'] + $data['tunjangan'] - $data['potongan'] ?>
                                    <td><?= $data['jmh'] ?></td>
									<td><?= $data['tgl_gaji'] ?></td>
                                    <td><?= $data['gaji'] ?></td>
                                    <td><?= $data['tunjangan'] ?></td>
                                    <td><?= $data['potongan'] ?></td>
                                    <td><?= $tot ?></td>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
							</tbody>
                        </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="8" class="text-right">
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