-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 01:23 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_id`, `acc_username`, `acc_password`, `acc_email`, `acc_address`, `acc_contact`, `acc_birthday`, `acc_name`, `acc_gender`) VALUES
(1, 'JustinzDev', '304AAB12BE478019FC00F95D52EC82E8E5D0EA16A59A0588460A9C152CEDE403572303BEEFC926082B6F1DBFEC6F9EC79044ABCB9C9D39B02536F6D2D3720053', 'fullyz1532@gmail.com', NULL, '0616450118', '2000-12-01', 'Jesus อันดับ 1', 'male'),
(2, 'JustinzDev1532', '304AAB12BE478019FC00F95D52EC82E8E5D0EA16A59A0588460A9C152CEDE403572303BEEFC926082B6F1DBFEC6F9EC79044ABCB9C9D39B02536F6D2D3720053', 'asdasd@gmail.com', NULL, '0932423423', '2021-08-04', 'นสตร.', 'female'),
(3, 'tmagcon', 'C3BB0CE5152AF14C700704FF94EF2C23D1D5E1CCEC3463B2B968B53696DD0F3A8C78C6C4D55693534C18411CBCB326D81F0E5E7B618D05196594BD1D7DEF512A', 'tmagconpt@gmail.com', NULL, '0970405212', '2000-06-03', NULL, NULL),
(4, 'sitti', 'A5451952093F961F35C0718284798FA1E730783BB70FF312E6F5776B8D6382224E540D229BAD87DB83B16E99A63A427E488FAF2F8519B81BA68E4F5EC2AB625F', 'sittichoke0000@gmail.com', NULL, '0897973840', '2000-03-21', NULL, NULL),
(5, 'jesus', 'AC780E6A38CB490B040CD0A21611755E16E4D02F566E1B6D8D82AEA7D7AD6C1C7480B1B0CDC66418CE932388BB1940970F14DAA73560EBDD4C07C0187406F04F', 'jesus007@gmail.com', NULL, '0812345678', '2021-09-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(12) NOT NULL,
  `brand_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(12) NOT NULL,
  `category_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_no` int(12) NOT NULL,
  `item_id` int(12) NOT NULL,
  `invoice_total` double NOT NULL DEFAULT 0,
  `invoice_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_no`, `item_id`, `invoice_total`, `invoice_date`) VALUES
(2, 33, 3200, '2021-10-14'),
(3, 22, 4999995, '2021-10-14'),
(4, 23, 5000, '2021-10-14'),
(5, 26, 796, '2021-10-14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listproducts`
--

INSERT INTO `listproducts` (`list_id`, `product_id`, `acc_id`, `seller_id`, `list_counto`, `list_totalprice`, `list_state`) VALUES
(1, 33, 1, 3, 1, 3200, 'wait'),
(2, 22, 1, 3, 5, 4999995, 'wait'),
(4, 23, 1, 4, 1, 5000, 'wait'),
(5, 26, 1, 1, 4, 796, 'payment');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `acc_id`, `product_name`, `product_details`, `product_price`, `product_countsell`, `product_count`, `product_img`) VALUES
(1, 3, 'Glorious model o wireless', 'Glorious model o wireless White RGB\r\nถูกมากกกกกมายย แล้วก็อยากขายด้วยย', 3000, 0, 555, 'assets/img/products/Glorious model o wireless_1.jpeg'),
(2, 3, 'Glorious model o wireless', 'Glorious model o wireless ฺBlack RGB\r\nขายทุนน ไม่ขายละ', 3000, 0, 555, 'assets/img/products/Glorious model o wireless_2.jpeg'),
(3, 1, 'กางเกงใน 5 บาท', 'กางเกงใน 5 บาท 125 มิลลิลิตร ปริมาณคับตูดเต็มที่', 300, 0, 0, 'assets/img/products/กางเกงใน 5 บาท_3.jpeg'),
(4, 3, 'Royal Kludge RK68 RGB Hotswap', 'Royal Kludge RK68 White RGB Hotswap คีย์บอร์ด ที่ดีจัดดดด\r\n', 2000, 0, 300, 'assets/img/products/Royal Kludge RK68 RGB Hotswap_4.jpeg'),
(6, 3, 'Royal Kludge RK68 RGB Hotswap', 'Royal Kludge RK68 RGB Hotswap', 2000, 2, 298, 'assets/img/products/Royal Kludge RK68 RGB Hotswap_6.png'),
(7, 3, 'MSI G24C4 24นิ้ว144Hz 1Ms FHD', 'จอภาพเกม IPS แบบไม่สะท้อนแสงพร้อมกรอบแคบสุดๆ16:9 AMD Radeon FreeSync', 5370, 0, 299, 'assets/img/products/MSI G24C4 24นิ้ว144Hz 1Ms FHD_7.jpeg'),
(8, 1, 'เสื้อครอปสายเดี่ยว', 'เสื้อครอปสายเดี่ยว แขนกุด แบบเปิดหลัง สำหรับผู้หญิง', 299, 0, 134, 'assets/img/products/เสื้อครอปสายเดี่ยว_8.jpeg'),
(9, 3, 'MSI NVIDIA RTX 3090 GDDR6X', 'พร้อมการ์ดหน่วยความจำ GDDR6X ประสิทธิภาพสูงรองรับการสั่งซื้อล่วงหน้า 24gb DirectX 12', 90750, 3, 19, 'assets/img/products/MSI NVIDIA RTX 3090 GDDR6X_9.jpeg'),
(10, 1, 'เสื้อครอปแขนกุดเปิดไหล่ข้างเดียว', 'Pink-เสื้อครอปแขนกุดเปิดไหล่ข้างเดียวสีดํา/เขียว/ขาว/ม่วง/ชมพูสําหรับผู้หญิง', 399, 0, 50, 'assets/img/products/เสื้อครอปแขนกุดเปิดไหล่ข้างเดียว_10.jpeg'),
(11, 1, 'เครื่องขุดบิทคอยน์ (เอธิเรียม)', 'เครื่องขุดบิทคอยน์ (เอธิเรียม) 4 การ์ดจอกำลังไฟ 750 วัตต์', 14900, 0, 4, 'assets/img/products/เครื่องขุดบิทคอยน์ (เอธิเรียม)_11.jpeg'),
(12, 5, 'ฟิกเกอร์', 'เฮ้!! หนูเข้ามานี่สิ กดเข้ามาดูของดี!! ฟิกเกอร์ TOY STORY รุ่น [Limited Edition] ของแท้ 1000%', 699, 1, 100, 'assets/img/products/ฟิกเกอร์_12.png'),
(13, 3, 'AMD Radeon RX 6900 XT 16G,', 'Gpu GIGABYTE AMD RDNA2สถาปัตยกรรมรองรับ OverClock\r\nAMD FidelityFX\r\nRadeon? Anti-LAG\r\nโมเดิร์น Display Technologies\r\nPCI Express ', 85760, 0, 34, 'assets/img/products/AMD Radeon RX 6900 XT 16G,_13.jpeg'),
(14, 1, 'กำไล แม่เหล็กดึงดูดคู่รัก', 'กำไล ?แม่เหล็กดึงดูดคู่รักกำไลเชือกแฮนด์เมดคู่ของนักเรียนชายและหญิงของขวัญ', 20, 0, 35, 'assets/img/products/กำไล แม่เหล็กดึงดูดคู่รัก_14.jpeg'),
(16, 3, 'เก้าอี้ Gaming มีไฟ LED RGB', 'เก้าอี้เล่นเกมสำหรับนักเล่นเกมพีซีออกแบบได้ดีมี OEM ODM ดีไซน์ตามหลักสรีรศาสตร์', 3400, 0, 2000, 'assets/img/products/เก้าอี้ Gaming มีไฟ LED RGB_16.jpeg'),
(17, 1, 'โรตีใส่ไข่พิเศษ [!!!!!]', 'โรตีพิเศษใส่ไข่ไม่เว่อวังอลังการงานสร้าง แต่ลองกินบ้างจะติดใจ อะฮี่ๆ', 20, 0, 100, 'assets/img/products/โรตีใส่ไข่พิเศษ [!!!!!]_17.jpeg'),
(18, 5, 'ตุ๊กตา', 'ตุ๊กตากระต่ายน่าร๊ากโดนใจวัยโจ๋!! \r\nขนนุ่มฟูกอดสะบาย ผลิตจากผ้าไหมแท้100%จากเยอรมัน!!  ', 499, 0, 100, 'assets/img/products/ตุ๊กตา_18.jpeg'),
(19, 3, 'โซฟาชุดที่ทันสมัย Modular', 'การออกแบบใหม่ห้องนั่งเล่นโซฟาโซฟาชุดที่ทันสมัย Modular สีขาวส่วนเมฆมุมโซฟา\r\nขนาด 2+chaise:260*220*85 cm deep:95 cm\r\n', 15900, 0, 219, 'assets/img/products/โซฟาชุดที่ทันสมัย Modular_19.jpeg'),
(20, 1, 'หวยใต้ดินสนใจติดต่อข้อมูลในร้าน', 'ถูกแน่นอนรางวัลที่ 1 เล่เข้ามาๆ รางวัลที่ 1 ทางนี้เลย!!!', 80, 0, 60, 'assets/img/products/หวยใต้ดินสนใจติดต่อข้อมูลในร้าน_20.jpeg'),
(21, 1, 'มอไซต์รุ่น Limited ชื่อไม่รู้', 'มอไซต์รุ่น Limited ของแท้จากอินเดีย ของใหม่ ไม่ต้องกลัวโกงราคา เครื่องแรง.......!!!!!', 13800, 0, 1, 'assets/img/products/มอไซต์รุ่น Limited ชื่อไม่รู้_21.jpeg'),
(22, 3, 'Cat Cat & Cat', 'แมวจู๊สสสสสสสสสสสสสสสส', 999999, 1, 10, 'assets/img/products/Cat Cat & Cat_22.jpeg'),
(23, 4, 'Mind Stone', 'Mind Stone 1 ใน collection infinity stone\r\n#collection สำหรับนักสะสม', 5000, 0, 100, 'assets/img/products/Mind Stone_23.png'),
(24, 4, 'Time Stone', 'Time Stone 1 ใน collection infinity stone\r\n#collections สำหรับนักสะสม', 5000, 0, 100, 'assets/img/products/Time Stone_24.png'),
(25, 4, 'Power Stone', 'Power Stone 1 ใน collection infinity stone\r\n#collection สำหรับนักสะสม', 5000, 0, 100, 'assets/img/products/Power Stone_25.png'),
(26, 1, 'เสื้อครอปท็อปคอกลมแขนกุดพิมพ์ลายกะโหลกเซ็กซี่', 'Pink - Women เสื้อครอปท็อปคอกลมแขนกุดพิมพ์ลายกะโหลกเซ็กซี่!!!', 199, 4, 0, 'assets/img/products/เสื้อครอปท็อปคอกลมแขนกุดพิมพ์ลายกะโหลกเซ็กซี่_26.jpeg'),
(27, 4, 'Reality Stone', 'Reality Stone 1 ใน collection infinity stone\r\n#collection สำหรับนักสะสม', 5000, 0, 100, 'assets/img/products/Reality Stone_27.png'),
(28, 1, 'เสื้อ Oversize สีขาวสำหรับผู้หญิง', 'เสื้อ Oversize สีขาวสำหรับผู้หญิง !!!!!!!!!!@@@@@@', 199, 0, 45, 'assets/img/products/asd_28.jpeg'),
(30, 4, 'Space Stone', 'Space Stone 1 ใน collection infinity stone\r\n#collection สำหรับนักสะสม', 5000, 0, 100, 'assets/img/products/Space Stone_30.jpeg'),
(31, 4, 'Soul Stone', 'Soul Stone 1 ใน collection infinity stone\r\n#collection สำหรับนักสะสม', 5000, 0, 100, 'assets/img/products/Soul Stone_31.jpeg'),
(32, 3, 'iPhone 13 Pro', 'iPhone 13 Pro \'\'ของเเท้รึป่าววน่าาา\'\'', 38600, 0, 1, 'assets/img/products/iPhone 13 Pro_32.jpeg'),
(33, 3, 'Nike Air Force 1', 'Nike Air Force 1 \'07', 3200, 1, 33, 'assets/img/products/Nike Air Force 1_33.jpeg'),
(35, 3, 'Nike Air Force 12', 'Nike Air Force 12 ของเเท้', 3200, 0, 34, 'assets/img/products/Nike Air Force 12_35.png'),
(38, 3, 'เรือดำน้ำ', 'แก้ภัยน้ำท่วม', 30000.75, 0, 15, 'assets/img/products/เรือดำน้ำ_38.jpeg');

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
  ADD PRIMARY KEY (`invoice_no`);

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
  MODIFY `acc_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_no` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listproducts`
--
ALTER TABLE `listproducts`
  MODIFY `list_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `foreign key accid` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`acc_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
