-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 05:23 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skycom`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`nama`, `jabatan`, `username`, `password`) VALUES
('Willy', 'Admin', 'admin', 'admin'),
('Ass', 'Ass', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `kd_customer` varchar(10) NOT NULL,
  `nm_customer` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `hapus` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`kd_customer`, `nm_customer`, `alamat`, `kontak`, `hapus`) VALUES
('CST-00001', 'Smart Com', 'Jln. Setia Budi', '124', '0'),
('CST-00002', 'Divine', 'Jln. Setia Budi', '1243', '0'),
('CST-00003', 'Avimedia', 'Jln. Setia Budi', '123423', '0'),
('CST-00004', 'Central Pontianak', 'Jln. Setia Budi', '12332', '0'),
('CST-00005', 'Setia Com', 'Jln. Setia Budi', '23431', '0'),
('CST-00006', 'Metro Com', 'Jln. Gajah Mada', '3431', '0'),
('CST-00007', 'Yuki-yuki', 'asjdj', '23455665', '0'),
('CST-00008', 'Bla Bla', 'sdas', 'asds', '0'),
('CST-00009', 'ASDsdsd', 'sdsad', '12432', '1'),
('CST-00010', 'asdsad', 'dsds', 'sdssd', '1'),
('CST-00011', 'MMMM', 'dsksad', '234324', '1'),
('CST-00012', 'KAKAK', 'AKAKAk', '2483', '0'),
('CST-00013', 'Akhiang', 'Meranti', '0811111', '0'),
('CST-00014', 'asfkhskjh', 'ajhdjkh', 'akshdkjas', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftarbarang`
--

CREATE TABLE `tb_daftarbarang` (
  `kdbarang` char(10) NOT NULL,
  `nmbarang` varchar(50) NOT NULL,
  `jnsbarang` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `hrg_modal` double NOT NULL,
  `hrg_jual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftarbarang`
--

INSERT INTO `tb_daftarbarang` (`kdbarang`, `nmbarang`, `jnsbarang`, `stok`, `hrg_modal`, `hrg_jual`) VALUES
('VGA-00001', 'VGA Asus GTX 1080 TI', 'VGA', 5, 10000000, 11000000),
('VGA-00002', 'VGA Gigabyte Nvidia 1070', 'VGA', 3, 7000000, 7500000),
('VGA-00003', 'VGA Inno3D GTX 1050TI', 'VGA', 2, 2500000, 3000000),
('VGA-00004', 'VGA Inno3D GTX 1050', 'VGA', 6, 1500000, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hd_pembelian`
--

CREATE TABLE `tb_hd_pembelian` (
  `notrans` varchar(10) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hd_pembelian`
--

INSERT INTO `tb_hd_pembelian` (`notrans`, `kd_barang`, `nm_barang`, `qty`, `harga`, `jumlah`) VALUES
('TB00001', 'VGA_00001', 'Asus GTX 1080 TI', 1, 15000000, 15000000),
('TB00001', 'VGA_00002', 'Gigabyte GTX 1070T TI', 1, 9550000, 9550000),
('TB00002', 'VGA_00001', 'Asus GTX 1080 TI', 1, 15000000, 15000000),
('TB00003', 'VGA_00001', 'Asus GTX 1080 TI', 1, 15000000, 15000000),
('TB00003', 'VGA_00002', 'Gigabyte GTX 1070T TI', 1, 9550000, 9550000),
('TB00004', 'VGA_00002', 'Gigabyte GTX 1070T TI', 1, 9550000, 9550000),
('TB00004', 'VGA_00001', 'Asus GTX 1080 TI', 1, 15000000, 15000000),
('TB00005', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 14500000, 29000000),
('TB00006', 'RAM-00002', 'Avexir 4GB', 100, 222, 22200),
('TB00007', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 20, 800000, 16000000),
('TB00008', 'RAM-00002', 'Avexir 4GB', 1, 222, 222),
('TB00009', 'VGA_00002', 'Gigabyte GTX 1070T TI', 1, 9000000, 9000000),
('TB00010', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 100, 800000, 80000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hd_penjualan`
--

CREATE TABLE `tb_hd_penjualan` (
  `no_trans` varchar(20) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hd_penjualan`
--

INSERT INTO `tb_hd_penjualan` (`no_trans`, `kd_barang`, `nm_barang`, `qty`, `harga`, `jumlah`) VALUES
('TJ00001', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00002', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00002', 'VGA_00002', 'Gigabyte GTX 1070T TI', 3, 9550000, 28650000),
('TJ00003', 'VGA_00001', 'Asus Strix GTX 1080 TI', 12, 16000000, 192000000),
('TJ00004', 'VGA_00002', 'Gigabyte GTX 1070T TI', 10, 9550000, 95500000),
('TJ00005', 'VGA_00002', 'Gigabyte GTX 1070T TI', 1, 9550000, 9550000),
('TJ00005', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 4, 900000, 3600000),
('TJ00006', 'VGA_00001', 'Asus Strix GTX 1080 TI', 0, 16000000, 0),
('TJ00006', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 0, 900000, 0),
('TJ00007', 'RAM-00002', 'Avexir 4GB', 2, 2224, 4448),
('TJ00008', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00008', 'RAM-00002', 'Avexir 4GB', 2, 2224, 4448),
('TJ00009', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00010', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00011', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00012', 'RAM-00002', 'Avexir 4GB', 2, 2224, 4448),
('TJ00012', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00013', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 2, 900000, 1800000),
('TJ00014', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00015', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00016', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00017', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00018', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00019', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00020', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00021', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00022', 'RAM-00002', 'Avexir 4GB', 1, 2224, 2224),
('TJ00023', 'RAM-00002', 'Avexir 4GB', 1, 2224, 2224),
('TJ00024', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00025', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 2, 900000, 1800000),
('TJ00026', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00027', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00028', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00029', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00030', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00031', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00032', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00033', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00034', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00035', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00036', 'VGA_00002', 'Gigabyte GTX 1070T TI', 1, 9550000, 9550000),
('TJ00037', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00037', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00038', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 2, 900000, 1800000),
('TJ00039', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00039', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 2, 900000, 1800000),
('TJ00040', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 3, 900000, 2700000),
('TJ00041', 'VGA_00001', 'Asus Strix GTX 1080 TI', 2, 16000000, 32000000),
('TJ00042', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 2, 900000, 1800000),
('TJ00043', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00044', 'RAM-00002', 'Avexir 4GB', 10, 2224, 22240),
('TJ00045', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00046', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00047', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00048', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00049', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00050', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00051', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00052', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00053', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00054', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00055', 'VGA_00001', 'Asus Strix GTX 1080 TI', 1, 16000000, 16000000),
('TJ00056', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00057', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00058', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00059', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00060', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 2, 900000, 1800000),
('TJ00061', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00062', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 3, 900000, 2700000),
('TJ00063', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 1, 900000, 900000),
('TJ00064', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 5, 900000, 4500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `jns_barang` varchar(20) NOT NULL,
  `kd_barang` varchar(11) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `qty` int(4) NOT NULL,
  `hrg_beli` double NOT NULL,
  `hrg_jual` double NOT NULL,
  `hapus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`jns_barang`, `kd_barang`, `nm_barang`, `qty`, `hrg_beli`, `hrg_jual`, `hapus`) VALUES
('MB', 'MB-00001', 'Mobo Asus Z360', 20, 4000000, 4100000, 0),
('RAM', 'RAM-00001', 'Corsair 2400MHz 8GB DDR4', 85, 800000, 900000, 0),
('RAM', 'RAM-00002', 'Avexir 4GB', 76, 222, 2224, 1),
('VGA', 'VGA-00003', 'Asus Gtx 1050', 5, 2000000, 2400000, 0),
('VGA', 'VGA_00001', 'Asus Strix GTX 1080 TI', 0, 15000000, 16000000, 0),
('VGA', 'VGA_00002', 'Gigabyte GTX 1070T TI', 0, 9000000, 9550000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `notrans` varchar(10) NOT NULL,
  `tgltrans` date NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `subtotal` double NOT NULL,
  `diskon` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`notrans`, `tgltrans`, `supplier`, `subtotal`, `diskon`, `total`) VALUES
('TB00001', '0000-00-00', 'ECS', 0, 0, 24550000),
('TB00002', '0000-00-00', 'Innovation', 0, 0, 15000000),
('TB00003', '0000-00-00', 'Innovation', 0, 0, 24550000),
('TB00004', '0000-00-00', 'Innovation', 0, 0, 24550000),
('TB00005', '0000-00-00', 'Innovation', 0, 0, 29000000),
('TB00006', '0000-00-00', 'Innovation', 0, 0, 22200),
('TB00007', '0000-00-00', 'Innovation', 0, 0, 16000000),
('TB00008', '0000-00-00', 'ECS', 0, 0, 222),
('TB00009', '2018-06-09', 'Metro', 0, 0, 9000000),
('TB00010', '2018-06-26', 'ECS', 0, 0, 80000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `notrans` varchar(10) NOT NULL,
  `tgltrans` date NOT NULL,
  `kredit` tinyint(4) NOT NULL,
  `tglJatuhTempo` date NOT NULL,
  `customer` varchar(50) NOT NULL,
  `subtotal` double(255,0) NOT NULL,
  `ppn` double NOT NULL,
  `subTotalSetelahPpn` double NOT NULL,
  `diskon` double(255,0) NOT NULL,
  `total` double(255,0) NOT NULL,
  `sales` varchar(25) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`notrans`, `tgltrans`, `kredit`, `tglJatuhTempo`, `customer`, `subtotal`, `ppn`, `subTotalSetelahPpn`, `diskon`, `total`, `sales`, `catatan`) VALUES
('TJ00001', '2018-05-27', 0, '0000-00-00', 'Smart Com', 16000000, 0, 0, 20000, 15980000, '', ''),
('TJ00002', '2018-05-28', 0, '0000-00-00', 'Central Pontianak', 60650000, 0, 0, 100000, 60550000, '', ''),
('TJ00003', '2018-05-28', 0, '0000-00-00', 'Setia Com', 192000000, 0, 0, 100000, 60550000, '', ''),
('TJ00004', '2018-06-07', 0, '0000-00-00', 'Smart Com', 95500000, 0, 0, 0, 0, '', ''),
('TJ00005', '2018-06-07', 0, '0000-00-00', 'Setia Com', 13150000, 0, 0, 0, 0, '', ''),
('TJ00006', '2018-06-07', 0, '0000-00-00', 'Yuki-yuki', 0, 0, 0, 0, 0, '', ''),
('TJ00007', '2018-06-09', 0, '0000-00-00', 'Smart Com', 4448, 0, 0, 0, 0, '', ''),
('TJ00008', '2018-06-09', 0, '0000-00-00', 'Central Pontianak', 16004448, 0, 0, 4448, 16000000, '', ''),
('TJ00009', '2018-06-09', 0, '0000-00-00', 'Metro Com', 32000000, 0, 0, 4448, 16000000, '', ''),
('TJ00010', '2018-06-09', 0, '0000-00-00', 'Setia Com', 32000000, 0, 0, 4448, 16000000, '', ''),
('TJ00011', '2018-06-10', 0, '0000-00-00', 'Setia Com', 900000, 0, 0, 20000, 880000, '', 'Cash'),
('TJ00012', '2018-06-10', 0, '0000-00-00', 'Divine', 904448, 0, 0, 20000, 880000, '', ''),
('TJ00013', '2018-06-10', 0, '0000-00-00', 'Avimedia', 1800000, 0, 0, 20000, 880000, '', ''),
('TJ00014', '2018-06-10', 0, '0000-00-00', 'Smart Com', 16000000, 0, 0, 20000, 880000, '', ''),
('TJ00015', '2018-06-10', 0, '0000-00-00', 'Setia Com', 16000000, 0, 0, 20000, 880000, '', ''),
('TJ00016', '2018-06-10', 1, '0000-00-00', 'Metro Com', 16000000, 0, 0, 20000, 880000, '', ''),
('TJ00017', '2018-06-10', 0, '0000-00-00', 'Divine', 16000000, 0, 0, 20000, 880000, '', ''),
('TJ00018', '2018-06-10', 1, '0000-00-00', 'Setia Com', 16000000, 0, 0, 20000, 880000, '', ''),
('TJ00019', '2018-06-10', 1, '0000-00-00', 'Divine', 16000000, 0, 0, 20000, 880000, '', ''),
('TJ00020', '2018-06-10', 1, '2018-06-10', 'Divine', 16000000, 0, 0, 20000, 880000, '', ''),
('TJ00021', '2018-06-10', 1, '0000-00-00', 'Setia Com', 16000000, 0, 0, 20000, 880000, '', ''),
('TJ00022', '2018-06-10', 1, '2018-06-24', 'Central Pontianak', 2224, 0, 0, 20000, 880000, '', ''),
('TJ00023', '2018-06-10', 0, '0000-00-00', 'Divine', 2224, 0, 0, 20000, 880000, '', ''),
('TJ00024', '2018-06-10', 0, '2018-06-10', 'Divine', 900000, 0, 0, 20000, 880000, '', ''),
('TJ00025', '2018-06-10', 1, '2018-06-24', 'Divine', 1800000, 0, 0, 0, 0, '', ''),
('TJ00026', '2018-06-10', 1, '2018-06-24', 'Smart Com', 32000000, 0, 0, 0, 0, '', ''),
('TJ00027', '2018-06-10', 1, '2018-06-24', 'Setia Com', 32000000, 0, 0, 0, 0, '', ''),
('TJ00028', '2018-06-10', 1, '2018-06-24', 'Setia Com', 32000000, 0, 0, 0, 0, '', ''),
('TJ00029', '2018-06-10', 1, '2018-06-24', 'Avimedia', 32000000, 0, 0, 20000, 31980000, '', ''),
('TJ00030', '2018-06-10', 1, '2018-06-24', 'Smart Com', 16000000, 0, 0, 0, 16000000, '', ''),
('TJ00031', '2018-06-10', 1, '2018-06-24', 'Smart Com', 16000000, 0, 0, 20000, 15980000, '', ''),
('TJ00032', '2018-06-11', 1, '2018-06-25', 'Avimedia', 16000000, 0, 0, 20000, 17580000, '', ''),
('TJ00033', '2018-06-11', 1, '2018-06-25', 'Central Pontianak', 16000000, 0, 0, 600000, 17000000, '', ''),
('TJ00034', '2018-06-11', 1, '2018-06-25', 'Central Pontianak', 16000000, 0, 0, 600000, 17000000, '', ''),
('TJ00035', '2018-06-11', 1, '2018-06-25', 'Central Pontianak', 32000000, 0, 35200000, 50000, 35150000, '', ''),
('TJ00036', '2018-06-11', 1, '2018-06-25', 'Avimedia', 9550000, 0, 0, 50000, 9500000, '', ''),
('TJ00037', '2018-06-26', 1, '2018-07-10', 'Smart Com', 16900000, 0, 0, 0, 16900000, '', ''),
('TJ00038', '2018-06-26', 1, '2018-07-10', 'Divine', 1800000, 0, 1980000, 80000, 1900000, '', ''),
('TJ00039', '2018-06-26', 1, '2018-07-10', 'Central Pontianak', 17800000, 0, 19580000, 80000, 19500000, '', ''),
('TJ00040', '2018-06-26', 1, '2018-07-10', 'Metro Com', 2700000, 0, 19580000, 80000, 19500000, '', ''),
('TJ00041', '2018-06-26', 1, '2018-07-10', 'Divine', 32000000, 0, 35200000, 50000, 35150000, '', ''),
('TJ00042', '2018-06-26', 1, '2018-07-10', 'Avimedia', 1800000, 0, 0, 0, 1800000, '', ''),
('TJ00043', '2018-06-26', 1, '2018-07-10', 'Central Pontianak', 900000, 0, 0, 0, 900000, '', ''),
('TJ00044', '2018-06-26', 1, '2018-07-10', 'Divine', 22240, 0, 24464, 4, 24460, '', ''),
('TJ00045', '2018-06-26', 1, '2018-07-10', 'Setia Com', 16000000, 0, 0, 0, 16000000, '', ''),
('TJ00046', '2018-06-26', 1, '2018-07-10', 'Yuki-yuki', 16000000, 0, 0, 0, 16000000, '', ''),
('TJ00047', '2018-06-26', 1, '2018-07-10', 'KAKAK', 900000, 0, 0, 0, 900000, '', ''),
('TJ00048', '2018-06-26', 1, '2018-07-10', 'Divine', 16000000, 0, 17600000, 0, 16000000, '', ''),
('TJ00049', '2018-06-26', 1, '2018-07-10', 'Central Pontianak', 16000000, 0, 17600000, 0, 17600000, '', ''),
('TJ00050', '2018-06-26', 1, '2018-07-10', 'Smart Com', 16000000, 0, 17600000, 50000, 17550000, '', ''),
('TJ00051', '2018-06-26', 1, '2018-07-10', 'Avimedia', 16000000, 0, 0, 0, 0, '', ''),
('TJ00052', '2018-06-26', 1, '2018-07-10', 'Setia Com', 16000000, 0, 0, 0, 0, '', ''),
('TJ00053', '2018-06-26', 1, '2018-07-10', 'Metro Com', 16000000, 0, 0, 0, 0, '', ''),
('TJ00054', '2018-06-26', 1, '2018-07-10', 'Central Pontianak', 16000000, 0, 0, 0, 16000000, '', ''),
('TJ00055', '2018-06-26', 1, '2018-07-10', 'Setia Com', 16000000, 0, 0, 500000, 16000000, '', 'asd'),
('TJ00056', '2018-06-26', 1, '2018-07-10', 'Smart Com', 900000, 0, 0, 20000, 880000, '', ''),
('TJ00057', '2018-06-26', 1, '2018-07-10', 'Divine', 900000, 0, 990000, 0, 990000, '', ''),
('TJ00058', '2018-06-26', 1, '2018-07-10', 'Avimedia', 900000, 0, 990000, 50000, 940000, '', ''),
('TJ00059', '2018-06-26', 1, '2018-07-10', 'Central Pontianak', 900000, 0, 0, 0, 900000, '', ''),
('TJ00060', '2018-06-27', 1, '2018-07-11', 'Avimedia', 1800000, 0, 1980000, 0, 1980000, 'Willy', ''),
('TJ00061', '2018-06-27', 1, '2018-07-11', 'Smart Com', 900000, 0, 990000, 10, 989990, 'Willy', ''),
('TJ00062', '2018-06-27', 1, '2018-07-11', 'Divine', 2700000, 0, 2970000, 10, 2969990, 'Willy', ''),
('TJ00063', '2018-06-27', 1, '2018-07-11', 'Central Pontianak', 900000, 0, 0, 0, 900000, 'Willy', 'Lanciau'),
('TJ00064', '2018-06-27', 1, '2018-07-11', 'Metro Com', 4500000, 450000, 4950000, 500, 4949500, 'Willy', 'Dsa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kd_supplier` varchar(11) NOT NULL,
  `nm_supplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `hapus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `kontak`, `hapus`) VALUES
('SP-00001', 'Innovation', 'Jakarta', '220492', 0),
('SP-00002', 'ECS', 'Jakarta', '224454', 0),
('SP-00003', 'Metro', 'Gajahmada', '74937', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_temp_pembelian`
--

CREATE TABLE `tb_temp_pembelian` (
  `notrans` varchar(20) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_temp_penjualan`
--

CREATE TABLE `tb_temp_penjualan` (
  `no_trans` varchar(20) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipebarang`
--

CREATE TABLE `tb_tipebarang` (
  `tipebarang` varchar(10) NOT NULL,
  `namatipebarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tipebarang`
--

INSERT INTO `tb_tipebarang` (`tipebarang`, `namatipebarang`) VALUES
('HDD', 'Hardisk Drive'),
('RAM', 'Random Access Memory'),
('VGA', 'Visual Graphic Card'),
('MBO', 'Motherboard'),
('CSG', 'Casing'),
('MB', 'Motherboard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`kd_customer`);

--
-- Indexes for table `tb_daftarbarang`
--
ALTER TABLE `tb_daftarbarang`
  ADD PRIMARY KEY (`kdbarang`);

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`notrans`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`notrans`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kd_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
