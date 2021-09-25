-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 05:11 PM
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
(2, 'JustinzDev1532', '304AAB12BE478019FC00F95D52EC82E8E5D0EA16A59A0588460A9C152CEDE403572303BEEFC926082B6F1DBFEC6F9EC79044ABCB9C9D39B02536F6D2D3720053', 'asdasd@gmail.com', NULL, '0932423423', '2021-08-04', 'นสตร.', 'female');

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
(1, 1, 'เก้าอี้สำนักงาน', '[รับประกัน1ปี]เก้าอี้สำนักงาน เก้าอี้ เบาะกว้าง ปรับสูง-ต่ำได้ มี เก้าอี้คอม เก้าอี้เกม เก้าอี้ทำงาน พนักพิงสูงผ้าตาข่าย', 734, 25, 2, 'assets/img/shop/shop1.jpg'),
(2, 1, 'โต๊ะไม้', 'A150 โต๊ะทำงานไม้ โต๊ะคอมพิวเตอร์ โต๊ะทํางาน พร้อมชั้นวางของ โต๊ะสำนักงาน ขนาด 120*45', 1456, 67, 4, 'assets/img/shop/shop2.jpg'),
(3, 1, 'เก้าอี้ทำงาน', 'เก้าอี้ เก้าอี้ออฟฟิศ เก้าอี้ทำงาน เก้าอี้สำนักงาน ปรับระดับได้ หลังตาข่าย สูง 97 ซม. Office Chair GOC01 ( Black )', 485, 32, 6, 'assets/img/shop/shop3.jpg'),
(4, 1, 'คีย์แคป', 'Kiki. คีย์แคป PBT มีไฟแบ็คไลท์ สำหรับคีย์บอร์ด Mechanical', 199, 44, 1300, 'assets/img/shop/shop4.jpg'),
(5, 1, 'Gameing Desk', 'Gaming Desk โต๊ะเกมมิ่ง120cm DJDโต๊ะเล่นเกม โต๊ะคอมพิวเตอร์เกมมิ่ง โต๊ะคอมพิวเตอร์ โต๊ะสำหรับอีสปอร์ต โต๊ะทำงาน table', 1657, 34, 23, 'assets/img/shop/shop5.jpg'),
(6, 1, 'สินค้า 1', 'สินค้า 1', 10000, 0, 34, 'assets/img/shop/shop6.jpg'),
(7, 1, 'สินค้า 2', 'สินค้า 2', 0, 0, 454, 'assets/img/shop/shop7.png'),
(8, 1, 'สินค้า 3', 'สินค้า 3', 0, 0, 123, 'assets/img/shop/shop8.png'),
(9, 1, 'Test', 'Test', 2000, 0, 0, NULL);

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
  MODIFY `acc_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
