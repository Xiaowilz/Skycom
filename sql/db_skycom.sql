-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 08:53 AM
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
  `username` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `id` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `jabatan`, `id`, `password`) VALUES
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
('CST-00005', 'Setia Com', 'Jln. Setia Budi', '23432', '0'),
('CST-00006', 'Metro Com', 'Jln. Gajah Mada', '3434', '0'),
('CST-00007', 'Yuki-yuki', 'asjdj', '23455665', '0'),
('CST-00008', 'Bla Bla', 'sdas', 'asds', '0'),
('CST-00009', 'ASDsdsd', 'sdsad', '12432', '0'),
('CST-00010', 'asdsad', 'dsds', 'sdssd', '0'),
('CST-00011', 'MMMM', 'dsksad', '234324', '0'),
('CST-00012', 'KAKAK', 'AKAKAk', '2483', '0');

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
('TB00002', 'VGA_00001', 'Asus GTX 1080 TI', 1, 15000000, 15000000);

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
('TJ00001', 'VGA_00001', 'Asus GTX 1080 TI', 1, 15000000, 15000000);

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
  `hapus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`jns_barang`, `kd_barang`, `nm_barang`, `qty`, `hrg_beli`, `hrg_jual`, `hapus`) VALUES
('VGA', 'VGA_00001', 'Asus GTX 1080 TI', 2, 13000000, 15000000, 0),
('VGA', 'VGA_00002', 'Gigabyte GTX 1070T TI', 3, 9000000, 9550000, 0),
('', 'VGA_00003', 'dsa', 10, 1232, 123123, 0),
('1', 'VGA_00004', 'asda', 22, 124124, 4124, 0);

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
('TB00002', '0000-00-00', 'Innovation', 0, 0, 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `notrans` varchar(10) NOT NULL,
  `tgltrans` date NOT NULL,
  `customer` varchar(50) NOT NULL,
  `subtotal` double(255,0) NOT NULL,
  `diskon` double(255,0) NOT NULL,
  `total` double(255,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`notrans`, `tgltrans`, `customer`, `subtotal`, `diskon`, `total`) VALUES
('TJ00001', '0000-00-00', 'Divine', 0, 0, 15000000);

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
('SP-00001', 'Innovation', 'Jakarta', '220493', 0),
('SP-00002', 'ECS', 'Jakarta', '224455', 0);

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

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
