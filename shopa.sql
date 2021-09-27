-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 06:02 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `acc_id` int(12) NOT NULL,
  `acc_username` varchar(20) DEFAULT NULL,
  `acc_password` varchar(128) DEFAULT NULL,
  `acc_email` varchar(64) DEFAULT NULL,
  `acc_address` varchar(64) DEFAULT NULL,
  `acc_contact` varchar(10) DEFAULT NULL,
  `acc_birthday` date DEFAULT NULL,
  `acc_name` varchar(128) DEFAULT NULL,
  `acc_gender` enum('male','female','other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_id`, `acc_username`, `acc_password`, `acc_email`, `acc_address`, `acc_contact`, `acc_birthday`, `acc_name`, `acc_gender`) VALUES
(1, 'JustinzDev', '304AAB12BE478019FC00F95D52EC82E8E5D0EA16A59A0588460A9C152CEDE403572303BEEFC926082B6F1DBFEC6F9EC79044ABCB9C9D39B02536F6D2D3720053', 'fullyz1532@gmail.com', NULL, '0616450118', '2000-12-01', 'คุณประหยัด ศรีประกันภัย', 'male'),
(2, 'JustinzDev1532', '304AAB12BE478019FC00F95D52EC82E8E5D0EA16A59A0588460A9C152CEDE403572303BEEFC926082B6F1DBFEC6F9EC79044ABCB9C9D39B02536F6D2D3720053', 'asdasd@gmail.com', NULL, '0932423423', '2021-08-04', 'นสตร.', 'female'),
(3, 'tmagcon', 'C3BB0CE5152AF14C700704FF94EF2C23D1D5E1CCEC3463B2B968B53696DD0F3A8C78C6C4D55693534C18411CBCB326D81F0E5E7B618D05196594BD1D7DEF512A', 'tmagconpt@gmail.com', NULL, '0970405212', '2000-06-03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(12) NOT NULL,
  `brand_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `item_id` int(12) NOT NULL,
  `acc_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `item_cost` double NOT NULL DEFAULT 0,
  `item_quantity` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(12) NOT NULL,
  `category_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_no` int(12) NOT NULL,
  `item_id` int(12) NOT NULL,
  `invoice_total` double NOT NULL DEFAULT 0,
  `invoice_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `listproducts`
--

CREATE TABLE `listproducts` (
  `list_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `acc_id` int(12) NOT NULL,
  `seller_id` int(12) NOT NULL,
  `list_counto` int(12) NOT NULL DEFAULT 0,
  `list_totalprice` double NOT NULL DEFAULT 0,
  `list_state` enum('wait','payment','finish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `listproducts`
--

INSERT INTO `listproducts` (`list_id`, `product_id`, `acc_id`, `seller_id`, `list_counto`, `list_totalprice`, `list_state`) VALUES
(2, 1, 1, 1, 5, 1500, 'finish'),
(3, 3, 1, 1, 3, 30000, 'wait'),
(4, 1, 1, 1, 5, 1500, 'payment');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(12) NOT NULL,
  `acc_id` int(12) NOT NULL,
  `product_name` varchar(128) DEFAULT NULL,
  `product_details` varchar(128) DEFAULT NULL,
  `product_price` double NOT NULL DEFAULT 0,
  `product_countsell` int(12) NOT NULL DEFAULT 0,
  `product_count` int(12) NOT NULL DEFAULT 0,
  `product_img` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `acc_id`, `product_name`, `product_details`, `product_price`, `product_countsell`, `product_count`, `product_img`) VALUES
(1, 1, 'กางเกงใน', 'กางเกงในขายได้ขายดีเล่เข้ามาทางนี้ ตัวละ 300 ใส่แล้วบินได้กันไปเลยทีเดียว ซื้อ 1 แถม 1 ให้ฟรี ของหมดอดนะจ๊ะ', 300, 10, 40, 'assets/img/products/กางเกงใน_1.jpeg'),
(3, 1, 'นาฬิกาคู่ใจ', 'นาฬินาเท่ใส่แล้วดูรวย มีชิ้นเดียว ช้าหมดอดนะครับ', 10000, 0, 5, 'assets/img/products/นาฬิการุ่น Limited No1_1.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `cus_email` (`acc_email`),
  ADD UNIQUE KEY `cus_contact` (`acc_contact`),
  ADD UNIQUE KEY `cus_username` (`acc_username`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE,
  ADD KEY `acc_id` (`acc_id`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `listproducts`
--
ALTER TABLE `listproducts`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `acc_id` (`acc_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acc_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_no` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listproducts`
--
ALTER TABLE `listproducts`
  MODIFY `list_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `foreign key cus_id` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`acc_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign key product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `foreign key item_id` FOREIGN KEY (`item_id`) REFERENCES `carts` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `foreign key accid` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`acc_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
