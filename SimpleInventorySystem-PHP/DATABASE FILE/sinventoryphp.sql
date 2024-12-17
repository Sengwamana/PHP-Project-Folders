-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 04:36 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinventoryphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Vans', 1, 1),
(2, 'Adidas', 1, 1),
(3, 'Calvin Klein', 1, 1),
(4, 'WYZE', 1, 1),
(5, 'Apple', 1, 1),
(6, 'Samsung', 1, 1),
(7, 'TP-Link', 1, 1),
(8, 'Amazon', 1, 1),
(9, 'Sony', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Shoes', 1, 1),
(2, 'T-Shirts and Tops', 1, 1),
(3, 'Hoodies & Sweatshirts', 1, 1),
(4, 'Shorts', 1, 1),
(5, 'Jackets', 1, 1),
(6, 'Security Camera', 1, 1),
(7, 'Routers', 1, 1),
(8, 'Smart Phones', 1, 1),
(9, 'Headphones', 1, 1),
(10, 'Alexa Voice Remote', 1, 1),
(11, 'Chargers', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_place` int(11) NOT NULL,
  `gstn` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `payment_place`, `gstn`, `order_status`, `user_id`) VALUES
(1, '2021-06-02', 'James Rusell', '7014444410', '49.00', '8.82', '57.82', '0', '57.82', '60', '-2.18', 2, 1, 1, '8.82', 1, 1),
(2, '2021-06-02', 'Thomas', '7014445400', '45.00', '8.10', '53.10', '0', '53.10', '55', '-1.90', 3, 1, 1, '8.10', 1, 1),
(3, '2021-06-02', 'Colin', '7896500020', '45.00', '8.10', '53.10', '0', '53.10', '100', '-46.90', 2, 2, 2, '8.10', 1, 1),
(4, '2022-01-18', 'Jack', '8547854444', '264.00', '47.52', '311.52', '0', '311.52', '311.52', '0.00', 2, 1, 1, '47.52', 1, 1),
(5, '2022-01-26', 'Thomas Stuart', '8540001014', '106.00', '19.08', '125.08', '0', '125.08', '125', '0.08', 1, 1, 1, '19.08', 1, 1),
(6, '2022-01-31', 'James Greenwood', '5214440120', '742.00', '133.56', '875.56', '0', '875.56', '875.56', '0.00', 2, 1, 1, '133.56', 1, 1),
(7, '2022-01-31', 'Annie Gillespie', '7450126690', '90.00', '16.20', '106.20', '0', '106.20', '106.20', '0.00', 3, 1, 1, '16.20', 1, 2),
(8, '2022-01-30', 'Kristen Stiger', '8540001250', '348.00', '62.64', '410.64', '0', '410.64', '410.64', '0.00', 2, 1, 1, '62.64', 1, 2),
(9, '2022-02-02', 'Jamie ', '7401114536', '1284.00', '231.12', '1515.12', '0', '1515.12', '1515.12', '0.00', 2, 1, 1, '231.12', 1, 1),
(10, '2022-02-02', 'William Moore', '7410000069', '274.00', '49.32', '323.32', '10', '313.32', '313.32', '0.00', 3, 1, 1, '49.32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '2', '49', '49.00', 1),
(2, 2, 13, '2', '45', '45.00', 1),
(3, 3, 15, '31', '45', '45.00', 1),
(4, 0, 16, '12', '22', '264.00', 1),
(5, 0, 16, '13', '22', '264.00', 1),
(6, 0, 16, '12', '22', '286.00', 1),
(7, 4, 16, '12', '22', '264.00', 1),
(8, 5, 3, '2', '53', '106.00', 1),
(9, 6, 3, '14', '53', '742.00', 1),
(10, 7, 15, '2', '45', '90.00', 1),
(11, 8, 9, '4', '87', '348.00', 1),
(12, 9, 14, '4', '321', '1284.00', 1),
(13, 10, 6, '1', '70', '70.00', 1),
(14, 10, 7, '1', '29', '29.00', 1),
(15, 10, 10, '1', '35', '35.00', 1),
(16, 10, 4, '1', '140', '140.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(1, 'Custom Paisley Patchwork Era', '../assests/images/stock/2120760b75c9237837.png', 1, 1, '0', '69', 1, 1),
(2, 'asd', '../assests/images/stock/2628560b75d3561d09.jpg', 1, 1, '22', '2', 2, 2),
(3, 'Wyze Cam v3 1080p HD Indoor/Outdoor Video Camera', '../assests/images/stock/2943460b7937a267ed.jpg', 4, 6, '105', '53', 1, 1),
(4, 'Ultraboost 21 Primeblue Shoes', '../assests/images/stock/2926160b77b0e925b8.jpg', 2, 1, '118', '140', 1, 1),
(5, 'Garment-Dyed Canvas Denim Jacket', '../assests/images/stock/2951160b792ba3020b.jpg', 3, 5, '97', '210', 1, 1),
(6, 'VansXPark Project Classic Slip-On', '../assests/images/stock/2856060b77ea550ccf.png', 1, 1, '244', '70', 1, 1),
(7, 'TechFit Fitted Tee', '../assests/images/stock/165960b7909513f6d.jpg', 2, 2, '368', '29', 1, 1),
(8, 'Love Unites Tank Top (Gender Neutral)', '../assests/images/stock/2780060b790de5f64a.jpg', 2, 2, '512', '28', 1, 1),
(9, 'R.T.V. Hoodie', '../assests/images/stock/1560160b79132ef6be.jpg', 2, 3, '216', '87', 1, 1),
(10, 'Adicolor Classics 3-Stripes Shorts', '../assests/images/stock/431060b791b32026d.jpg', 2, 4, '151', '35', 1, 1),
(11, 'TP-Link AC1750 Smart WiFi Router (Archer A7)', '../assests/images/stock/2065160b794843f641.jpg', 7, 7, '256', '60', 1, 1),
(12, 'Wyze Cam 1080p HD Indoor WiFi Smart Home Camera with Night Vision', '../assests/images/stock/814660b794ffda66f.jpg', 4, 6, '126', '45', 1, 1),
(13, 'Fire TV Stick 4K streaming device with Alexa Voice Remote', '../assests/images/stock/1946160b79a7472484.jpg', 8, 10, '257', '45', 1, 1),
(14, 'Sony WH-1000XM4 Wireless Industry Leading Noise Canceling Overhead Headphones', '../assests/images/stock/392760b7a38b1e2d8.jpg', 9, 9, '254', '321', 1, 1),
(15, 'Apple MagSafe Charger', '../assests/images/stock/1491660b7a42f42152.jpg', 5, 11, '332', '45', 1, 1),
(16, 'Sample Product', '../assests/images/stock/2254161f94e484d31a.jpg', 1, 1, '15', '22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'd00f5d5217896fb7fd601412cb890830', ''),
(2, 'staff', '5f4dcc3b5aa765d61d8327deb882cf99', 'staff@stockmg.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
