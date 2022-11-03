-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 07:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flovor_sweet`
--

-- --------------------------------------------------------

--
-- Table structure for table `AT`
--

CREATE TABLE `admin_table` (
  `admin_id` int(20) NOT NULL,
  `mail_id` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `CT`
--

CREATE TABLE `cart_table` (
  `cart_id` int(20) NOT NULL,
  `cust_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `pprice` int(150) NOT NULL,
  `quantity` int(20) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `CT1`
--

CREATE TABLE `category_table` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `C1`
--

CREATE TABLE `checkout` (
  `order_id` int(20) NOT NULL,
  `cust_id` int(20) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cust_name` varchar(128) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `C2`
--

CREATE TABLE `customer_table` (
  `cust_id` int(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `mail_id` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `OT`
--

CREATE TABLE `order_detail_table` (
  `order_detail_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `PT`
--

CREATE TABLE `payment_table` (
  `payment_id` int(20) NOT NULL,
  `cust_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `PT1`
--

CREATE TABLE `product_table` (
  `product_id` int(20) NOT NULL,
  `seller_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `weight` varchar(128) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ST`
--

CREATE TABLE `seller_table` (
  `seller_id` int(20) NOT NULL,
  `sname` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `company` varchar(128) NOT NULL,
  `mobile` int(20) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AT`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `CT`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `CT1`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `C1`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `C2`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `OT`
--
ALTER TABLE `order_detail_table`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `PT`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `PT1`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ST`
--
ALTER TABLE `seller_table`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AT`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CT`
--
ALTER TABLE `cart_table`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CT1`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `C1`
--
ALTER TABLE `checkout`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `C2`
--
ALTER TABLE `customer_table`
  MODIFY `cust_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `OT`
--
ALTER TABLE `order_detail_table`
  MODIFY `order_detail_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PT`
--
ALTER TABLE `payment_table`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PT1`
--
ALTER TABLE `product_table`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ST`
--
ALTER TABLE `seller_table`
  MODIFY `seller_id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
