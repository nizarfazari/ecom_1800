-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2022 at 06:00 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_1800`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(2) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `userName`, `password`) VALUES
(1, 'nizar', 'nizar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_kirim`
--

CREATE TABLE `tbl_biaya_kirim` (
  `idBiayaKirim` int(5) NOT NULL,
  `idKurir` int(3) NOT NULL,
  `idKotaAsal` int(4) NOT NULL,
  `idKotaTujuan` int(4) NOT NULL,
  `biaya` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`idBiayaKirim`, `idKurir`, `idKotaAsal`, `idKotaTujuan`, `biaya`) VALUES
(2, 2, 2, 1, 200002),
(3, 2, 1, 2, 200001);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `idDetailOrder` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idkat` int(5) NOT NULL,
  `namakat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idkat`, `namakat`) VALUES
(1, 'Pakaian'),
(4, 'Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `idKonfirmasi` int(5) NOT NULL,
  `idOrder` int(5) NOT NULL,
  `buktiTransfer` varchar(100) NOT NULL,
  `validasi` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `idKota` int(4) NOT NULL,
  `namaKota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`idKota`, `namaKota`) VALUES
(1, 'Muntilan'),
(2, 'Mungkid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `idKurir` int(2) NOT NULL,
  `namaKurir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`idKurir`, `namaKurir`) VALUES
(2, 'JNT'),
(3, 'JNE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `idKonsumen` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namaKonsumen` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `idKota` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlpn` int(20) NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`idKonsumen`, `username`, `password`, `namaKonsumen`, `alamat`, `idKota`, `email`, `tlpn`, `statusAktif`) VALUES
(1, 'nizar', '12345', 'nizarf', 'muntilan', 1, 'nizar@gmail.com', 1234, 'Y'),
(2, 'asdasd', 'asdasd', 'fazarin', 'mungkid', 2, 'fazari@gmail.com', 213, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `idOrder` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `tglOrder` date NOT NULL,
  `statusOrder` enum('Belum Bayar','Dikemas','Dikirim','Diterima','Selesai','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `idProduk` int(5) NOT NULL,
  `idKat` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` int(5) NOT NULL,
  `deskripsiProduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `idSaldo` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `idToko` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `namaToko` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD PRIMARY KEY (`idBiayaKirim`),
  ADD KEY `idKurir` (`idKurir`),
  ADD KEY `idKotaAsal` (`idKotaAsal`),
  ADD KEY `idKotaTujuan` (`idKotaTujuan`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`idDetailOrder`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idkat`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`idKonfirmasi`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`idKota`);

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`idKurir`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`idKonsumen`),
  ADD KEY `idKota` (`idKota`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idKonsumen` (`idKonsumen`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `idKat` (`idKat`),
  ADD KEY `idToko` (`idToko`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`idSaldo`),
  ADD KEY `idToko` (`idToko`);

--
-- Indexes for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD PRIMARY KEY (`idToko`),
  ADD KEY `idKonsumen` (`idKonsumen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  MODIFY `idBiayaKirim` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `idDetailOrder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `idkat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `idKonfirmasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `idKota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  MODIFY `idKurir` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `idKonsumen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `idOrder` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `idProduk` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  MODIFY `idSaldo` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  MODIFY `idToko` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_1` FOREIGN KEY (`idKurir`) REFERENCES `tbl_kurir` (`idKurir`),
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_2` FOREIGN KEY (`idKotaAsal`) REFERENCES `tbl_kota` (`idKota`),
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_3` FOREIGN KEY (`idKotaTujuan`) REFERENCES `tbl_kota` (`idKota`);

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`);

--
-- Constraints for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD CONSTRAINT `tbl_konfirmasi_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`);

--
-- Constraints for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD CONSTRAINT `tbl_member_ibfk_1` FOREIGN KEY (`idKota`) REFERENCES `tbl_kota` (`idKota`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`);

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`idKat`) REFERENCES `tbl_kategori` (`idkat`),
  ADD CONSTRAINT `tbl_produk_ibfk_2` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`);

--
-- Constraints for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD CONSTRAINT `tbl_saldo_ibfk_1` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`);

--
-- Constraints for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD CONSTRAINT `tbl_toko_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
