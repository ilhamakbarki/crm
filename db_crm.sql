-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2017 at 08:48 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `id_u` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `nama`, `alamat`, `email`, `telp`, `id_u`) VALUES
(1, 'Ilham Akbar', 'Kacongan', 'ilhamakbarki@gmail.com', '087750002605', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `uid` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `beli` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`uid`, `kode`, `nama`, `satuan`, `stok`, `beli`) VALUES
(20, 'RD01', 'NFC Reader', 'Pack', 100, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `uid` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `pt` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `id_u` int(11) DEFAULT NULL,
  `grup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`uid`, `nama`, `pt`, `alamat`, `email`, `telp`, `id_u`, `grup`) VALUES
(4, 'Ilham Akbar New', 'coba coba', 'Alamat New', 'emailbaru@gmail.com', '087750002605', NULL, 2),
(7, 'Akbar', 'kabar', 'kacongan', 'ilhamakbarki@gmail.com', '087750002605', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `distributor_grup`
--

CREATE TABLE `distributor_grup` (
  `uid` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `persentasi_jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor_grup`
--

INSERT INTO `distributor_grup` (`uid`, `nama`, `persentasi_jual`) VALUES
(2, 'Level 2', 90),
(3, 'Level 3', 80),
(4, 'Level 1', 100),
(17, 'Level 4', 70),
(18, 'Level 5', 60);

-- --------------------------------------------------------

--
-- Table structure for table `harga_barang`
--

CREATE TABLE `harga_barang` (
  `uid_barang` int(11) NOT NULL,
  `uid_dgrup` int(11) NOT NULL,
  `harga` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_barang`
--

INSERT INTO `harga_barang` (`uid_barang`, `uid_dgrup`, `harga`) VALUES
(20, 2, 950000),
(20, 3, 900000),
(20, 4, 1000000),
(20, 17, 850000),
(20, 18, 800000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pwd` text NOT NULL,
  `level` int(11) NOT NULL,
  `token_api` text,
  `token_forgot` text,
  `forgot_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `user`, `pwd`, `level`, `token_api`, `token_forgot`, `forgot_time`) VALUES
(1, 'ilham', '$6$3h2aNvRm&shGWEsa$cyZdPZJVLtvWnjhx8a9bmYsHqDNCnAHFxJGWoEgr/W1gNOtGdSRC.Zjos62.Hhk5TVQjgxrsYgWwXMpXx6VPc0', 1, NULL, NULL, NULL),
(2, 'distributor', '$6$3h2aNvRm&shGWEsa$cyZdPZJVLtvWnjhx8a9bmYsHqDNCnAHFxJGWoEgr/W1gNOtGdSRC.Zjos62.Hhk5TVQjgxrsYgWwXMpXx6VPc0', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `uid` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`uid`, `nama`) VALUES
(1, 'admin'),
(2, 'distributor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `id_u_2` (`id_u`),
  ADD KEY `id_u` (`id_u`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `id_u_2` (`id_u`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `grup` (`grup`);

--
-- Indexes for table `distributor_grup`
--
ALTER TABLE `distributor_grup`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `harga_barang`
--
ALTER TABLE `harga_barang`
  ADD PRIMARY KEY (`uid_barang`,`uid_dgrup`),
  ADD UNIQUE KEY `uid_barang` (`uid_barang`,`uid_dgrup`),
  ADD KEY `uid_dgrup` (`uid_dgrup`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `distributor_grup`
--
ALTER TABLE `distributor_grup`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `user` (`uid`);

--
-- Constraints for table `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `distributor_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `distributor_ibfk_3` FOREIGN KEY (`grup`) REFERENCES `distributor_grup` (`uid`);

--
-- Constraints for table `harga_barang`
--
ALTER TABLE `harga_barang`
  ADD CONSTRAINT `harga_barang_ibfk_1` FOREIGN KEY (`uid_barang`) REFERENCES `barang` (`uid`),
  ADD CONSTRAINT `harga_barang_ibfk_2` FOREIGN KEY (`uid_dgrup`) REFERENCES `distributor_grup` (`uid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `user_level` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
