-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2022 at 02:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PointOfSale`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_title` varchar(250) NOT NULL,
  `item_price` int(11) NOT NULL,
  `secondary_images` varchar(50) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_title`, `item_price`, `secondary_images`, `item_quantity`, `item_description`) VALUES
(1, 'Nike red', 9999, '2', 56, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.'),
(2, 'Some item name', 77777, '2', 88, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.');

-- --------------------------------------------------------

--
-- Table structure for table `on-delivery`
--

CREATE TABLE `on-delivery` (
  `id` int(11) NOT NULL,
  `delivery-id` int(11) NOT NULL,
  `delivery-start` datetime NOT NULL,
  `delivery-end` datetime NOT NULL,
  `buyer-id` int(11) NOT NULL,
  `date-order` datetime NOT NULL,
  `buyer-name` varchar(120) NOT NULL,
  `buyer-number` varchar(60) NOT NULL,
  `product-name` varchar(250) NOT NULL,
  `product-quantity` int(11) NOT NULL,
  `product-price` int(11) NOT NULL,
  `buyer-address` varchar(250) NOT NULL,
  `buyer-note` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendingbuyer`
--

CREATE TABLE `pendingbuyer` (
  `id` int(11) NOT NULL,
  `buyer-id` int(11) NOT NULL,
  `date-order` datetime NOT NULL,
  `buyer-name` varchar(120) NOT NULL,
  `buyer-number` varchar(60) NOT NULL,
  `product-name` varchar(120) NOT NULL,
  `product-quantity` int(11) NOT NULL,
  `product-price` int(11) NOT NULL,
  `buyer-address` varchar(500) NOT NULL,
  `buyer-note` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller-account`
--

CREATE TABLE `seller-account` (
  `id` int(11) NOT NULL,
  `login_name` varchar(120) NOT NULL,
  `login_pass` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller-account`
--

INSERT INTO `seller-account` (`id`, `login_name`, `login_pass`) VALUES
(1, 'seller', 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on-delivery`
--
ALTER TABLE `on-delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendingbuyer`
--
ALTER TABLE `pendingbuyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller-account`
--
ALTER TABLE `seller-account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `on-delivery`
--
ALTER TABLE `on-delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendingbuyer`
--
ALTER TABLE `pendingbuyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller-account`
--
ALTER TABLE `seller-account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
