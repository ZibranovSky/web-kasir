-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 12:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_zibran`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `kasir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`id`, `kdproduk`, `nm_produk`, `kategori`, `jumlah_beli`, `total`, `tanggal`, `jam`, `kasir`) VALUES
(28, 'KD003', 'Ayam Goreng', 'Makanan', 1, 5000, '2020-11-22', '06:24 pm', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat`
--

CREATE TABLE `tb_kat` (
  `id` int(11) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kat`
--

INSERT INTO `tb_kat` (`id`, `kategori`) VALUES
(1, 'Pakaian'),
(2, 'Minuman'),
(4, 'Makanan'),
(5, 'Alat Kebersihan'),
(6, 'Alat Masak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `stok` int(11) NOT NULL,
  `rak` text NOT NULL,
  `supplier` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `kdproduk`, `nm_produk`, `kategori`, `stok`, `rak`, `supplier`, `harga`) VALUES
(10, 'KD003', 'Ayam Goreng', 'Makanan', 7, 'RAK 1', 'CV Abadi', 5000),
(11, 'KD004', 'Ayam Bakar', 'Makanan', 26, 'RAK 1', 'CV Abadi', 20000),
(12, 'KD001', 'Jaket XY', 'Pakaian', 47, 'RAK 1', 'CV Abadi', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prod_masuk`
--

CREATE TABLE `tb_prod_masuk` (
  `id` int(11) NOT NULL,
  `noinv` text NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `rak` text NOT NULL,
  `supplier` text NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prod_masuk`
--

INSERT INTO `tb_prod_masuk` (`id`, `noinv`, `tanggal`, `jam`, `kdproduk`, `nm_produk`, `kategori`, `rak`, `supplier`, `stok`, `jml_masuk`, `admin`) VALUES
(27, 'INV001', '2020-11-18', '07:47 pm', 'KD003', 'Ayam Goreng', 'Makanan', 'RAK 1', 'CV Abadi', 31, 2, 'Admin Kasir Kita'),
(28, 'INV003', '2020-11-22', '05:57 pm', 'KD003', 'Ayam Goreng', 'Makanan', 'RAK 1', 'CV Abadi', 7, 2, 'Admin Kasir ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id` int(11) NOT NULL,
  `kdrak` text NOT NULL,
  `namarak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id`, `kdrak`, `namarak`) VALUES
(1, 'RAK001', 'RAK 1'),
(3, 'KD002', 'Rak 02'),
(4, 'KD003', 'Rak 3'),
(5, 'KD004', 'Rak 4'),
(6, 'KD005', 'Rak 07'),
(7, 'KD006', 'Rak 06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id` int(11) NOT NULL,
  `kdspl` text NOT NULL,
  `namaspl` text NOT NULL,
  `alamatspl` text NOT NULL,
  `kontakspl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id`, `kdspl`, `namaspl`, `alamatspl`, `kontakspl`) VALUES
(1, 'SPL01', 'CV Abadi ', 'kp cikuda', '081298013281'),
(3, 'SPL02', 'PT Peternakan', 'jl kebun ijo', '081282839220');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `level` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Kasir ', 'admin', '522-admin logoZ.jpg'),
(13, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'kasir', '967-kasir logoZ.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_temp`
--

CREATE TABLE `transaksi_temp` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_temp`
--

INSERT INTO `transaksi_temp` (`id`, `kdproduk`, `nm_produk`, `kategori`, `jumlah_beli`, `total`) VALUES
(140, 'KD003', 'Ayam Goreng', 'Makanan', 1, 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kat`
--
ALTER TABLE `tb_kat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prod_masuk`
--
ALTER TABLE `tb_prod_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_kat`
--
ALTER TABLE `tb_kat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_prod_masuk`
--
ALTER TABLE `tb_prod_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
