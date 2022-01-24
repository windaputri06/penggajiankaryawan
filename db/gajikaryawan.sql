-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2022 pada 17.20
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gajikaryawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(20) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time NOT NULL,
  `tgl_tahun` date NOT NULL,
  `jumlah_kehadiran` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nip`, `waktu_masuk`, `waktu_keluar`, `tgl_tahun`, `jumlah_kehadiran`) VALUES
(14, '1234567891', '05:32:00', '05:38:00', '2021-12-21', 4),
(17, '12094576', '15:16:00', '18:19:00', '2022-01-24', 15),
(18, '1234567887', '01:11:00', '03:11:00', '2022-01-24', 7),
(19, '18220646', '01:37:00', '04:38:00', '2022-01-24', 10),
(20, '18220682', '03:38:00', '06:38:00', '2022-01-25', 10),
(21, '18220658', '08:38:00', '22:39:00', '2022-01-26', 15),
(22, '18220676', '00:39:00', '02:39:00', '2022-01-26', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `idgaji` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `gaji` double NOT NULL,
  `tunjangan` double NOT NULL,
  `potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`idgaji`, `nip`, `tgl_gaji`, `gaji`, `tunjangan`, `potongan`) VALUES
(5, '1234567887', '2022-01-24', 1000, 100, 500),
(6, '12094576', '2022-01-24', 1000, 100, 500),
(7, '18220646', '2022-01-24', 10000, 5000, 4000),
(8, '18220682', '2022-02-27', 20000, 10000, 5000),
(9, '18220658', '2022-03-17', 5000, 2000, 1000),
(10, '18220676', '2022-01-31', 60000, 30000, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status_kerja` enum('Kontrak','Tetap','Training') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `jenis_kelamin`, `nohp`, `alamat`, `jabatan`, `status_kerja`) VALUES
('18220646', 'Anjas Yudistira', 'Pria', '09876543298', 'Kisaran', 'Manager', 'Kontrak'),
('18220658', 'Nur Madani Putri ', 'Wanita', '09876509871', 'Tanjung Balai', 'Seketaris', 'Tetap'),
('18220676', 'Winda Putri Marpaung', 'Wanita', '0987654329', 'Hessa', 'Seketaris', 'Kontrak'),
('18220682', 'Muhammad surya baskara pohan', 'Pria', '0987654389', 'Kisaran', 'Ceo', 'Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `paswd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'devk@gmail.com', 'Sebut saja surya ', 1, 'Staff Kepaniteraan Hukum'),
('Manager', '81dc9bdb52d04dc20036dbd8313ed055', 'tim@gmail.com', 'Panggil saja surya', 2, 'Maanager');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`idgaji`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `idgaji` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
