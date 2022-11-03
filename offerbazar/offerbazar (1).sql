-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 11:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offerbazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(20) NOT NULL,
  `mail_id` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `mail_id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `cart_id` int(20) NOT NULL,
  `cust_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `pprice` int(150) NOT NULL,
  `quantity` int(20) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`cart_id`, `cust_id`, `product_id`, `pprice`, `quantity`, `subtotal`) VALUES
(12, 1, 1, 16000, 2, 32000),
(13, 1, 2, 350, 4, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`) VALUES
(1, 'Mobile'),
(2, 'Computer'),
(3, 'Kurti');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
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

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`order_id`, `cust_id`, `total_amount`, `order_date`, `status`, `cust_name`, `mobile`, `address`) VALUES
(5, 1, 58000, '2022-03-16 23:03:14', 'delivered', 'Riya', 9998678998, '16 rasraj society nikol');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `cust_id` int(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `mail_id` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`cust_id`, `username`, `password`, `mobile`, `mail_id`, `address`) VALUES
(1, 'riya', 'riya123', 8866253652, 'riya@gmail.com', '45 nilakanth dham nikol ahmedabad'),
(2, 'riya', 'riya123', 8866253652, 'riya@gmail.com', '45 nilakanth dham nikol ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail_table`
--

CREATE TABLE `order_detail_table` (
  `order_detail_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail_table`
--

INSERT INTO `order_detail_table` (`order_detail_id`, `order_id`, `product_id`, `price`, `quantity`, `subtotal`) VALUES
(9, 5, 1, 16000, 1, 16000),
(10, 5, 4, 42000, 1, 42000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
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
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `product_id` int(20) NOT NULL,
  `seller_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `weight` varchar(128) NOT NULL,
  `Mrp_price` int(250) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`product_id`, `seller_id`, `category_id`, `name`, `image`, `description`, `weight`, `Mrp_price`, `price`) VALUES
(1, 1, 1, 'OPPO A74 5G', '1.jpg', 'Fantastic Purple 6GB RAM 128GB Storage', 'Additional Exchange Offers', 18000, 16000),
(2, 1, 3, 'Pop Mantra Women Kurta', '2.jpg', 'Crepe with three quarter sleeve and round neck', '100% American crepe with digital print', 700, 350),
(4, 1, 2, 'HP 15s 11th Gen Intel Core i3', '3.jpg', '15.6 inches Laptop', '8GB RAM 512GB SSD UHD Graphics', 52000, 42000);

-- --------------------------------------------------------

--
-- Table structure for table `seller_table`
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
-- Dumping data for table `seller_table`
--

INSERT INTO `seller_table` (`seller_id`, `sname`, `address`, `company`, `mobile`, `email`) VALUES
(1, 'Hetal', '23 tri murti complex bapunagar ahmedabad', 'food stock', 999874526, 'hetal@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `order_detail_table`
--
ALTER TABLE `order_detail_table`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`),
  ADD UNIQUE KEY `payment_id_2` (`payment_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `seller_table`
--
ALTER TABLE `seller_table`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `cust_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_detail_table`
--
ALTER TABLE `order_detail_table`
  MODIFY `order_detail_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller_table`
--
ALTER TABLE `seller_table`
  MODIFY `seller_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
