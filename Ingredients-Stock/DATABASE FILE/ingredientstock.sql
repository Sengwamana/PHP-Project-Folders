-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 06:59 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ingredientstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_registration`
--

CREATE TABLE `account_registration` (
  `Fullname` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_registration`
--

INSERT INTO `account_registration` (`Fullname`, `Age`, `Address`, `Position`, `Username`, `Password`) VALUES
('Derek Moore', 25, '4840 Southside Lane', 'USER', 'moore', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Luis L McHugh', 28, '1029 Elk Creek Road', 'USER', 'luis', '827CCB0EEA8A706C4C34A16891F84E7B'),
('Nicholas P Perrault', 31, '3675 Sharon Lane', 'ADMIN', 'nicholas', 'e10adc3949ba59abbe56e057f20f883e'),
('Stephen K Franco', 29, '4076 Havanna Street', 'ADMIN', 'stephen', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `stock_ingredients`
--

CREATE TABLE `stock_ingredients` (
  `Id` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_ingredients`
--

INSERT INTO `stock_ingredients` (`Id`, `ItemName`, `Category`, `Quantity`, `Date`) VALUES
(4, 'Egg', 'Others', 38, '2018-04-12'),
(6, 'Cabbage', 'Vegetables', 17, '2018-04-12'),
(8, 'Lettuce', 'Vegetables', 15, '2021-07-15'),
(9, 'Ham', 'Meat', 15, '2021-07-15'),
(10, 'Kiwi', 'Fruits', 17, '2021-07-15'),
(11, 'Shrimp', 'Sea Food', 48, '2021-07-16'),
(12, 'Yeast', 'Others', 21, '2021-07-17'),
(16, 'Mozzarella', 'DairyProducts', 21, '2021-07-18'),
(17, 'Beef', 'Meat', 36, '2021-07-19'),
(18, 'Broccoli', 'Vegetables', 27, '2021-07-19'),
(19, 'Blueberries', 'Fruits', 11, '2021-07-19'),
(20, 'Cream', 'DairyProducts', 18, '2021-07-19'),
(21, 'Squids', 'Sea Food', 51, '2021-07-19'),
(22, 'Quinoa', 'Others', 27, '2021-07-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_registration`
--
ALTER TABLE `account_registration`
  ADD UNIQUE KEY `Fullname` (`Fullname`);

--
-- Indexes for table `stock_ingredients`
--
ALTER TABLE `stock_ingredients`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `ItemName` (`ItemName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock_ingredients`
--
ALTER TABLE `stock_ingredients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
