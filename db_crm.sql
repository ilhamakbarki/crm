-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Nov 2017 pada 08.23
-- Versi server: 10.1.28-MariaDB
-- Versi PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`uid`, `nama`, `alamat`, `email`, `telp`, `id_u`) VALUES
(1, 'Ilham Akbar', 'Kacongan', 'ilhamakbarki@gmail.com', '087750002605', 1),
(2, 'Tri Rahmawatiningsih', 'Ponorogo', 'trirahmawat@gmail.com', '087758018257', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`uid`, `kode`, `nama`, `satuan`, `stok`, `beli`) VALUES
(20, 'RD01', 'NFC Reader', 'Pack', 100, 500000),
(21, 'AQ01', 'Aqua 250ML', 'KARDUS', 1000, 2500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
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
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`uid`, `nama`, `pt`, `alamat`, `email`, `telp`, `id_u`, `grup`) VALUES
(7, 'Distributor Laptop', 'Distributor', 'Kacongan', 'ilhamakbarki@gmail.com', '087750002605', 2, 18),
(8, 'Aqua', 'Danone', 'pandaan', 'trirahmawat@gmail.com', '08775002605', 11, 3),
(9, 'Bayu Indra Wicaksono', 'UMM', 'malang', 'bayugames69@gmail.com', '0819337733836', 12, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor_grup`
--

CREATE TABLE `distributor_grup` (
  `uid` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `persentasi_jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor_grup`
--

INSERT INTO `distributor_grup` (`uid`, `nama`, `persentasi_jual`) VALUES
(2, 'Level 2', 90),
(3, 'Level 3', 80),
(4, 'Level 1', 100),
(17, 'Level 4', 70),
(18, 'Level 5', 65);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_barang`
--

CREATE TABLE `harga_barang` (
  `uid_barang` int(11) NOT NULL,
  `uid_dgrup` int(11) NOT NULL,
  `harga` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_barang`
--

INSERT INTO `harga_barang` (`uid_barang`, `uid_dgrup`, `harga`) VALUES
(20, 2, 950000),
(20, 3, 900000),
(20, 4, 1000000),
(20, 17, 850000),
(20, 18, 825000),
(21, 2, 4750),
(21, 3, 4500),
(21, 4, 5000),
(21, 17, 4250),
(21, 18, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `user`, `pwd`, `level`, `token_api`, `token_forgot`, `forgot_time`) VALUES
(1, 'ilham', '$6$3h2aNvRm&shGWEsa$XhC59ZvO7Ra6g/8GtNrEU5IwZe433emqAq/EoJJbx1CAjsgKfI8f1rKB1O4x84wEH5yIgDJdP4rsK52reFVgb/', 1, NULL, NULL, NULL),
(2, 'distributorlaptop', '$6$3h2aNvRm&shGWEsa$0qmZmSaijEY7WrHQMmZxwtWNhP8qgSOuLuqp4RxJ0AH0/UJfMz6CBZpC4bjTDCfdn6mxI0Bo1Z3smvbPjeXxs0', 2, NULL, NULL, NULL),
(10, 'rahma', '$6$3h2aNvRm&shGWEsa$cyZdPZJVLtvWnjhx8a9bmYsHqDNCnAHFxJGWoEgr/W1gNOtGdSRC.Zjos62.Hhk5TVQjgxrsYgWwXMpXx6VPc0', 1, 'r1zlHI0Lm1p1LUTyDW49', NULL, NULL),
(11, 'distributoraqua', '$6$3h2aNvRm&shGWEsa$5j0MzVAg4PK8jMvpAAZx51ffgeAUVL1h21JjfF.M9KqjDj1Zd8XK7zS/5Myi4JdK6WRV8PvZvz6L779f84gW3.', 2, 'bWihjNkKyn6i8sYrVmeA', NULL, NULL),
(12, 'kusumaagro', '$6$3h2aNvRm&shGWEsa$eA3IIkVHVYWfa4VPxI/E./LsfFMv9gMKCihvgRMZoRlcSN4ZzLZHlHAT.NyDxomRerlY/8dSl0q85jiT9zEKg/', 2, 'G419LmEFuVvJ01xrivZ1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `uid` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`uid`, `nama`) VALUES
(1, 'admin'),
(2, 'distributor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `id_u_2` (`id_u`),
  ADD KEY `id_u` (`id_u`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `id_u_2` (`id_u`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `grup` (`grup`);

--
-- Indeks untuk tabel `distributor_grup`
--
ALTER TABLE `distributor_grup`
  ADD PRIMARY KEY (`uid`);

--
-- Indeks untuk tabel `harga_barang`
--
ALTER TABLE `harga_barang`
  ADD PRIMARY KEY (`uid_barang`,`uid_dgrup`),
  ADD UNIQUE KEY `uid_barang` (`uid_barang`,`uid_dgrup`),
  ADD KEY `uid_dgrup` (`uid_dgrup`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `level` (`level`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `distributor_grup`
--
ALTER TABLE `distributor_grup`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `user` (`uid`);

--
-- Ketidakleluasaan untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `distributor_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `distributor_ibfk_3` FOREIGN KEY (`grup`) REFERENCES `distributor_grup` (`uid`);

--
-- Ketidakleluasaan untuk tabel `harga_barang`
--
ALTER TABLE `harga_barang`
  ADD CONSTRAINT `harga_barang_ibfk_1` FOREIGN KEY (`uid_barang`) REFERENCES `barang` (`uid`),
  ADD CONSTRAINT `harga_barang_ibfk_2` FOREIGN KEY (`uid_dgrup`) REFERENCES `distributor_grup` (`uid`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `user_level` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
