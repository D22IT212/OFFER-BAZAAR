-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 02:46 PM
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
-- Database: `flovor_sweet`
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
(1, 'Sweet'),
(2, 'Namkeen'),
(3, 'Farsan');

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
(1, 1, 720, ' 2021-04-25 10:30:55', 'delivered', 'zankhana amin', 8347321291, '16 raspan enclave nikol'),
(2, 1, 215, '2021-04-25 11:36:59', 'delivered', 'Riya', 9824252898, 'C-601 Rudra reidency B/H new india colony nikol'),
(3, 1, 875, '2021-04-25 11:42:27', 'pending', 'Renuka', 78789852536, '23 shantiniketan society chandkheda ahmedabad'),
(4, 1, 720, '2021-04-25 18:09:15', 'pending', 'Rekha', 7878452536, '23 shiv ganesh res nikol ahmedabad');

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
(1, 1, 1, 250, 2, 500),
(2, 1, 4, 55, 4, 220),
(3, 2, 2, 25, 2, 50),
(4, 2, 4, 55, 3, 165),
(5, 3, 2, 25, 5, 125),
(6, 3, 1, 250, 3, 750),
(7, 4, 4, 55, 4, 220),
(8, 4, 1, 250, 2, 500);

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
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`product_id`, `seller_id`, `category_id`, `name`, `image`, `description`, `weight`, `price`) VALUES
(1, 1, 1, 'gulab jamun', '1.jpg', 'brown color with sugar added ', '500gm', 250),
(2, 1, 2, 'Wafers', '2.jpg', 'potato wafers', '50gm', 25),
(4, 1, 3, 'Samosa', 'samosa-recipe.jpg', 'Spicy with Chatani', '250gm', 55);

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
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `cust_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_detail_table`
--
ALTER TABLE `order_detail_table`
  MODIFY `order_detail_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
