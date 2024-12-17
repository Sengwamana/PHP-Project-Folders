-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 07:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `dept_details` varchar(255) NOT NULL,
  `added_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `password`, `role`, `dept_details`, `added_at`) VALUES
(1, 'Stock Administrator', '12345', 1, 'default stock department', '2018-03-27'),
(2, 'Department 2', '3875', 0, 'Dept 2', '2018-04-05'),
(10, 'Department 3', '12345', 0, 'Dept 3', '2018-04-04'),
(16, 'Department 4', '12345', 0, 'Dept 4', '2018-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_cat` varchar(30) NOT NULL,
  `item_detail` varchar(255) NOT NULL,
  `bill_no` varchar(30) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL DEFAULT '1',
  `supplied_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_cat`, `item_detail`, `bill_no`, `supplier_id`, `dept_id`, `supplied_at`) VALUES
(465, 'Item One', ' First Category', 'Demo Details 12345', '100', 3, 2, '2021-07-29'),
(466, 'Item Two', ' Second Category', 'Demo Details Demo', '101', 1, 1, '2021-07-29'),
(467, 'Item Three', ' Third Category', 'Demo Item Details', '103', 9, 1, '2021-08-01'),
(468, 'Item Four', ' Fourth Category', 'Demo Details', '104', 3, 1, '2021-08-01'),
(469, 'Item Five', ' Second Category', 'Demo Demo Demo', '105', 2, 1, '2021-08-01'),
(470, 'Item Six', ' Third Category', 'Demo Demo', '106', 2, 1, '2021-08-01'),
(471, 'Item Seven', ' First Category', 'Demo Demo', '107', 6, 1, '2021-08-01'),
(472, 'Item Eight', ' First Category', 'Demo Details', '108', 7, 1, '2021-08-01'),
(473, 'Item Nine', ' Fourth Category', 'Demo Details N', '109', 3, 1, '2021-08-01'),
(474, 'Item Ten', ' Fifth Category', 'This is a demo detail', '110', 5, 1, '2021-08-01'),
(475, 'Item Eleven', ' Fourth Category', 'Demo Details..', '111', 4, 1, '2021-08-01'),
(476, 'Item Twelve', ' Fifth Category', 'Demo Cntn', '112', 6, 1, '2021-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `supplier_details` varchar(255) NOT NULL,
  `added_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_details`, `added_at`) VALUES
(1, 'Fozzby', '984 Woodstock Drive', '2019-04-12'),
(2, 'Redsupplies', '4407 Jerry Toth Drive', '2019-02-01'),
(3, 'MegaGoods Supplies', '1908 Leo Street', '2020-01-17'),
(4, 'Mooszer Electronics', '1491 Shinn Avenue', '2019-12-06'),
(5, 'AEC Components', '1743 Washburn Street', '2019-12-13'),
(6, 'MG Foods', '2617 Happy Hollow Road', '2019-10-18'),
(7, 'Vista Suppliers', '2820 Sunset Drive', '2019-02-07'),
(8, 'Edens Collection', '4407 Jerry Toth Drive', '2019-03-01'),
(9, 'USPharma', '2781 Leverton Cove Road', '2019-05-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `dept_name` (`dept_name`),
  ADD KEY `dept_name_2` (`dept_name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_cat` (`item_cat`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `supplier_id_2` (`supplier_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `supplier_name` (`supplier_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=477;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
