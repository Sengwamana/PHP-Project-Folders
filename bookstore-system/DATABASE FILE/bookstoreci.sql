-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 07:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoreci`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `harga` int(25) NOT NULL,
  `gambar_buku` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `tahun`, `kode_kategori`, `harga`, `gambar_buku`, `penerbit`, `penulis`, `stok`) VALUES
(9, 'A Game of Thrones', 1996, 101, 46, 'gotbook.jpg', 'Bantam Spectra', 'George R. R. Martin', 174),
(10, 'The Hobbit or There and Back Again', 1937, 303, 22, 'thbbook.jpg', 'Allen & Unwin', 'J. R. R. Tolkien', 200),
(11, 'A Promised Land', 2020, 202, 19, 'plbo.jpg', 'Crown Publishing Group', 'Barack Obama', 186),
(12, 'X-Men: God Loves Man Kills', 1982, 505, 21, 'xmcom.jpg', 'Marvel Comics', 'Chris Claremont', 116),
(13, 'Dune', 1965, 606, 23, 'dnbk.jpg', 'Chilton Company', 'Frank Herbert', 166),
(14, 'The Exorcist', 1971, 707, 18, 'tebook.jpg', 'Harper', 'William Peter Blatty', 101),
(16, 'Invisible Man', 1980, 101, 19, 'invim.jpg', 'Penguin Random House', 'Ralph Ellison', 113),
(17, 'The Nightingale', 2015, 110, 17, 'tnightnvl.jpg', 'St Martin\'s Press', 'Kristin Hannah', 124);

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`kode_transaksi`, `kode_buku`, `jumlah`) VALUES
(11, 16, 2),
(12, 16, 1),
(13, 13, 2),
(14, 14, 1),
(15, 9, 1),
(16, 11, 2),
(17, 12, 1),
(18, 10, 1),
(19, 17, 2),
(20, 13, 1),
(21, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`kode_kategori`, `nama_kategori`) VALUES
(101, 'Novel'),
(110, 'Historical Fiction'),
(202, 'Biography'),
(303, 'Fantasy'),
(404, 'Health & FItness'),
(505, 'Comics'),
(606, 'Sci-Fi'),
(707, 'Horror'),
(808, 'Technology'),
(909, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_user` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `book_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_user`, `nama_pembeli`, `total`, `tgl`, `bookname`, `book_qty`) VALUES
(11, 1, 'Danny Lebowski', 19, '2021-06-11', 'Invisible Man', 1),
(12, 1, 'Ralph Cooper', 19, '2021-06-13', 'Invisible Man', 1),
(13, 1, 'James E Vaught', 46, '2021-06-13', 'Dune', 2),
(14, 1, 'Jeff Roberts', 18, '2021-06-21', 'The Exorcist', 1),
(15, 3, 'Colin Stwart', 46, '2021-06-26', 'A Game of Thrones', 1),
(16, 1, 'Victoria Wilkins', 38, '2021-06-26', 'A Promised Land', 2),
(17, 4, 'Alex Hayes', 21, '2021-06-26', 'X-Men: God Loves Man Kills', 1),
(18, 2, 'William Wright', 22, '2021-06-26', 'The Hobbit or There and Back Again', 1),
(19, 1, 'Diane Campbell', 34, '2021-06-26', 'The Nightingale', 2),
(20, 1, 'Alyn Williams', 23, '2021-06-26', 'Dune', 1),
(21, 3, 'Will Williams', 19, '2021-06-26', 'A Promised Land', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Liam Moore', 'admin', 'D00F5D5217896FB7FD601412CB890830', 'admin'),
(2, 'Emily Smith', 'emily', '6AC2470ED8CCF204FD5FF89B32A355CF', 'cashier'),
(3, 'Christine Moore', 'christine', '5F4DCC3B5AA765D61D8327DEB882CF99', 'cashier'),
(4, 'John L Wardlow', 'wardlow', '8B7193BE6BAC8968850EFE06D8907DA2', 'cashier'),
(5, 'Curtis Garcia', 'curtis', 'C85A6A3B872CCDC150BB766A4FD64AD2', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_user` (`kode_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori_buku` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `detil_transaksi_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_transaksi_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`kode_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
