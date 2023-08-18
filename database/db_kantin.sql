-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2023 pada 09.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kantin`
--
CREATE DATABASE IF NOT EXISTS `db_kantin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_kantin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_detail_transaksi` (
  `iddetailtransaksi` int(5) NOT NULL AUTO_INCREMENT,
  `idtransaksi` int(5) NOT NULL,
  `idmenu` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `hargasatuan` double NOT NULL,
  `totalharga` double NOT NULL,
  PRIMARY KEY (`iddetailtransaksi`),
  KEY `idtransaksi` (`idtransaksi`),
  KEY `idobat` (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`iddetailtransaksi`, `idtransaksi`, `idmenu`, `jumlah`, `hargasatuan`, `totalharga`) VALUES
(9, 1875, 1, 3, 4000, 12000),
(10, 1875, 3, 1, 5000, 5000),
(11, 1875, 7, 1, 15000, 15000),
(12, 1875, 2, 5, 10000, 50000),
(13, 1876, 6, 1, 980000, 980000),
(14, 1876, 7, 5, 15000, 75000),
(16, 1877, 4, 7, 28000, 196000),
(17, 1877, 1, 1, 4000, 4000),
(18, 1877, 3, 1, 5000, 5000),
(19, 1877, 2, 2, 10000, 20000),
(20, 1877, 7, 1, 15000, 15000),
(21, 1878, 6, 2, 980000, 1960000),
(22, 1878, 7, 3, 15000, 45000),
(35, 2, 1, 3, 4000, 12000),
(36, 2, 5, 1, 15000, 15000),
(37, 2, 7, 2, 15000, 30000),
(38, 1877, 3, 3, 5000, 15000),
(39, 3, 1, 3, 4000, 12000),
(40, 3, 5, 2, 15000, 30000),
(43, 1, 1, 1, 4000, 4000),
(57, 1, 5, 12, 15000, 180000),
(76, 15, 4, 1, 28000, 28000),
(80, 1884, 5, 9, 15000, 135000),
(90, 1900, 5, 3, 15000, 45000),
(91, 1900, 5, 3, 15000, 45000),
(92, 1900, 3, 7, 5000, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE IF NOT EXISTS `tb_karyawan` (
  `idkaryawan` int(4) NOT NULL AUTO_INCREMENT,
  `namakaryawan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  PRIMARY KEY (`idkaryawan`)
) ENGINE=InnoDB AUTO_INCREMENT=10003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`idkaryawan`, `namakaryawan`, `alamat`, `telpon`) VALUES
(1, 'panda ichi', 'denpasar', '081249824909'),
(2, 'panda ni', 'denpasar', '082204820481'),
(3, 'panda san', 'denpasar', '088724929492'),
(4, 'andi yon', 'denpasar', '072635143648'),
(5, 'panda go', 'denpasar', '086735302483'),
(6, 'panda roku', 'denpasar', '086402490648'),
(7, 'panda tujuh', 'denpasar', '081483904971');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(5) NOT NULL,
  `leveluser` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `leveluser`) VALUES
('admin', 'admin', 'admin'),
('asd', '123', 'admin'),
('bob', 'bob12', 'user'),
('pewd', '123', 'admin'),
('pog boy', 'pog64', 'user'),
('qwe', '123', 'user'),
('sean', 'jacks', 'admin'),
('user', 'user', 'user'),
('wira', 'pswrd', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `idmenu` int(4) NOT NULL,
  `idsupplier` int(4) NOT NULL,
  `namamenu` varchar(100) NOT NULL,
  `kategorimenu` varchar(10) NOT NULL,
  `hargajual` double NOT NULL,
  `hargabeli` double NOT NULL,
  `stok_menu` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`idmenu`),
  KEY `idsupplier` (`idsupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`idmenu`, `idsupplier`, `namamenu`, `kategorimenu`, `hargajual`, `hargabeli`, `stok_menu`, `keterangan`) VALUES
(1, 4, 'teh gelas', 'minuman', 4000, 1000, 9957, '-'),
(2, 5, 'mie gelas', 'makanan', 10000, 6500, 9984, '-'),
(3, 3, 'permen karet', 'makanan', 5000, 4000, 9966, '-'),
(4, 1, 'krupuk udaang', 'makanan', 28000, 18000, 9986, '-'),
(5, 2, 'aqua', 'minuman', 15000, 5000, 9844, '-'),
(6, 6, 'kripik', 'Keras', 980000, 502500, 9975, '-'),
(7, 1, 'Green Tea', 'minuman', 15000, 10000, 9936, '-'),
(8, 7, 'pop mie ayam', 'makanan', 100000, 1200, 7976, '-'),
(9, 7, 'pop mie bakso', 'makanan', 5000, 2000, 9989, '-'),
(10, 7, 'pop mie pedas', 'makanan', 3500, 1500, 11, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `idpelanggan` int(4) NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `usia` int(2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`idpelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=1244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`idpelanggan`, `namalengkap`, `alamat`, `telpon`, `usia`, `picture`) VALUES
(0, 'Pelanggan Umum', 'Pelanggan Umum', 'Pelanggan Umum', 0, ''),
(1, 'Pudidi Kelberg', 'Jalan Inisaya 15, Denpasar', '087543243874', 23, 'download (1).jpg'),
(2, 'Piter Parker', 'Jalan Itukamu 16, Denpasar', '089465430001', 40, '316.jpg'),
(3, 'Rikaldo Milos', 'Jalan Tidak Terlihat 22, Denpasar', '085240824778', 19, 'download (2).jpg'),
(4, 'Obama ', 'Jalan Ihwibu 6, Denpasar', '081777860045', 21, 'pexels-photo-1252983.jpg'),
(5, 'Reza Putra', 'Jalan Mapano 7, Denpasar', '081232388012', 25, '00000.png'),
(6, 'Sussy Amogus', 'Jalan Imposter 99, Denpasar', '081009994567', 26, 'reseprahasia.jpg'),
(9, 'test', 'test', '0978070', 97, 'download (3).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `idsupplier` int(4) NOT NULL AUTO_INCREMENT,
  `perusahaan` varchar(100) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`idsupplier`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`idsupplier`, `perusahaan`, `telpon`, `alamat`, `keterangan`) VALUES
(1, 'PT. Garena', '579375', 'denpasar', 'perusahaan obat herbal'),
(2, 'PT. Mikrosoft', '131425', 'denpasar', 'pengembang biokimia'),
(3, 'PT. Supreme', '879314', 'denpasar', 'perusahaan obat terlarang'),
(4, 'Sony', '424801', 'denpasar', 'perusahaan obat umum'),
(5, 'Bandai Namco', '654812', 'tokyo', '-'),
(6, 'PT. Adidas', '924821', 'denpasar', 'perusahaan obat masa depan'),
(7, 'PT. Herobrine', '702424', 'Denpasar', 'Perusahaan Obat Murah'),
(259, 'test', '000000', 'test', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testing`
--

CREATE TABLE IF NOT EXISTS `tb_testing` (
  `bibub` int(4) NOT NULL,
  `crab` varchar(50) NOT NULL,
  `game` varchar(100) NOT NULL,
  `better` varchar(15) NOT NULL,
  PRIMARY KEY (`bibub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `idtransaksi` int(5) NOT NULL AUTO_INCREMENT,
  `tgltransaksi` date NOT NULL,
  `idpelanggan` int(4) NOT NULL,
  `kategoripelanggan` varchar(15) NOT NULL,
  `totalbayar` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `kembali` double DEFAULT NULL,
  PRIMARY KEY (`idtransaksi`),
  KEY `idpelanggan` (`idpelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=1902 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`idtransaksi`, `tgltransaksi`, `idpelanggan`, `kategoripelanggan`, `totalbayar`, `bayar`, `kembali`) VALUES
(1, '2021-09-02', 1, 'Umum', 184000, 200000, 16000),
(2, '2021-09-06', 5, 'Khusus', 57000, 60000, 3000),
(3, '2021-09-13', 3, 'Khusus', 42000, 100000, 58000),
(15, '2021-09-24', 6, 'Khusus', 28000, 30000, 2000),
(1875, '2021-09-02', 5, 'Umum', 82000, 100000, 18000),
(1876, '2021-09-02', 5, 'Khusus', 1055000, 2000000, 945000),
(1877, '2021-09-02', 3, 'Umum', 255000, 300000, 45000),
(1878, '2021-09-02', 4, 'Khusus', 2005000, 3000000, 995000),
(1884, '2021-09-24', 3, 'Khusus', 135000, 2000000000, 1999865000),
(1900, '2023-08-17', 0, 'Khusus', 125000, 300000, 175000);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `tb_transaksi` (`idtransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`idmenu`) REFERENCES `tb_menu` (`idmenu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `tb_menu_ibfk_1` FOREIGN KEY (`idsupplier`) REFERENCES `tb_supplier` (`idsupplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`idpelanggan`) REFERENCES `tb_pelanggan` (`idpelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
