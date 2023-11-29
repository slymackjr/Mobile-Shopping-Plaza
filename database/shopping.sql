-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 04:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(8, 1, 10),
(9, 1, 3),
(10, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `error_logs`
--

CREATE TABLE `error_logs` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `error_message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `availability` varchar(15) DEFAULT NULL,
  `shipping_charge` varchar(15) DEFAULT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `quantity`, `availability`, `shipping_charge`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy 10', 152.00, 30, 'in stock', 'free', './assets/products/1.png', '2020-03-28 11:08:57'),
(2, 'Redmi', 'Redmi Note 7', 122.00, 30, 'in stock', 'free', './assets/products/2.png', '2020-03-28 11:08:57'),
(3, 'Redmi', 'Redmi Note 6', 122.00, 30, 'in stock', 'free', './assets/products/3.png', '2020-03-28 11:08:57'),
(4, 'Redmi', 'Redmi Note 5', 122.00, 30, 'in stock', 'free', './assets/products/4.png', '2020-03-28 11:08:57'),
(5, 'Redmi', 'Redmi Note 4', 122.00, 30, 'in stock', 'free', './assets/products/5.png', '2020-03-28 11:08:57'),
(6, 'Redmi', 'Redmi Note 8', 122.00, 30, 'in stock', 'free', './assets/products/6.png', '2020-03-28 11:08:57'),
(7, 'Redmi', 'Redmi Note 9', 122.00, 30, 'in stock', 'free', './assets/products/8.png', '2020-03-28 11:08:57'),
(8, 'Redmi', 'Redmi Note', 122.00, 30, 'in stock', 'free', './assets/products/10.png', '2020-03-28 11:08:57'),
(9, 'Samsung', 'Samsung Galaxy S6', 152.00, 30, 'in stock', 'free', './assets/products/11.png', '2020-03-28 11:08:57'),
(10, 'Samsung', 'Samsung Galaxy S7', 152.00, 30, 'in stock', 'free', './assets/products/12.png', '2020-03-28 11:08:57'),
(11, 'Apple', 'Apple iPhone 5', 152.00, 30, 'in stock', 'free', './assets/products/13.png', '2020-03-28 11:08:57'),
(12, 'Apple', 'Apple iPhone 6', 152.00, 30, 'in stock', 'free', './assets/products/14.png', '2020-03-28 11:08:57'),
(13, 'Apple', 'Apple iPhone 7', 152.00, 30, 'in stock', 'free', './assets/products/15.png', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

CREATE TABLE `product_description` (
  `item_id` int(11) NOT NULL,
  `item_memory` varchar(150) DEFAULT NULL,
  `item_storage` varchar(150) DEFAULT NULL,
  `item_resolution` varchar(150) DEFAULT NULL,
  `item_camera` varchar(150) DEFAULT NULL,
  `item_processor` varchar(150) DEFAULT NULL,
  `item_battery` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_description`
--

INSERT INTO `product_description` (`item_id`, `item_memory`, `item_storage`, `item_resolution`, `item_camera`, `item_processor`, `item_battery`) VALUES
(1, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM', '4.7 inch Retina HD display', '13MP primary Camera | 5MP Front', 'A8 CHip with 64-bit Architecture and M8 motion Co-processor Processor', '4100 mAh Li-Polymer Battery'),
(2, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(3, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(4, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(5, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(6, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(7, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(8, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(9, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(10, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(11, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(12, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery'),
(13, '1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM', '16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB', '5.5 inch Full HD display', '5MP primary Camera | 1.2MP Front', 'Qualcomm Snapdragon 625 64-bit Processor', 'Li-Ion Battery');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(2, 3, 4, 5, 5, 'Anuj Kumar', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2017-02-26 17:43:57'),
(3, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 17:52:46'),
(4, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 17:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_remarks`
--

CREATE TABLE `tbl_admin_remarks` (
  `id` int(11) NOT NULL,
  `contactFormId` int(11) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `remarkDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_remarks`
--

INSERT INTO `tbl_admin_remarks` (`id`, `contactFormId`, `adminRemark`, `remarkDate`) VALUES
(1, 1, 'This is for testing remark by admin.', '2021-04-24 10:39:41'),
(2, 1, 'Test by admin part 2', '2021-04-24 10:39:59'),
(3, 1, 'Test by admin part 2', '2021-04-24 10:41:53'),
(4, 1, 'Test by admin part 2', '2021-04-24 10:42:15'),
(18, 0, '1', '2023-09-21 23:02:54'),
(19, 0, '1', '2023-09-21 23:03:29'),
(20, 1, 'good work', '2023-09-21 23:21:31'),
(21, 1, 'we are back', '2023-09-21 23:32:44'),
(22, 1, 'they are all clean sir.', '2023-09-21 23:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_data`
--

CREATE TABLE `tbl_contact_data` (
  `id` int(11) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `PhoneNumber` char(12) DEFAULT NULL,
  `EmailId` varchar(200) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `UserIp` varbinary(16) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Is_Read` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_data`
--

INSERT INTO `tbl_contact_data` (`id`, `FullName`, `PhoneNumber`, `EmailId`, `Subject`, `Message`, `UserIp`, `PostingDate`, `Is_Read`) VALUES
(1, 'Anuj kumar', '1234567890', 'anuj@gmail.com', 'Test purpose', 'This is for Testing only.', 0x3a3a31, '2021-04-24 10:07:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `id` int(11) NOT NULL,
  `emailId` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`id`, `emailId`, `UpdationDate`) VALUES
(1, 'jbnyamasheki@gmail.com', '2023-09-18 18:51:03');

--
-- Triggers `tbl_email`
--
DELIMITER $$
CREATE TRIGGER `prevent_insert` BEFORE INSERT ON `tbl_email` FOR EACH ROW BEGIN 
    DECLARE row_count INT;
    SELECT COUNT(*) INTO row_count FROM `tbl_email`;
    IF row_count > 0 THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Only one row is allowed in this tables.';
    END IF;  
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `id`, `password`, `type`, `name`, `username`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
('admin@admin.com', 1, '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Jofrey', 'Jerry', '', '', 'thanos1.jpg', 1, '', '', '2018-05-01'),
('christine@gmail.com', 3, '$2y$10$ozW4c8r313YiBsf7HD7m6egZwpvoE983IHfZsPRxrO1hWXfPRpxHO', 0, 'Christine', 'becker', 'demo', '7542214500', 'female3.jpg', 1, '', '', '2018-07-09'),
('harry@den.com', 2, '$2y$10$Oongyx.Rv0Y/vbHGOxywl.qf18bXFiZOcEaI4ZpRRLzFNGKAhObSC', 0, 'Harry', 'Den', 'Silay City, Negros Occidental', '09092735719', 'male2.png', 1, 'k8FBpynQfqsv', 'wzPGkX5IODlTYHg', '2018-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `action_type` enum('Login','Logout') NOT NULL,
  `ip_address` varchar(250) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `user_id`, `action`, `action_type`, `ip_address`, `timestamp`) VALUES
(1, '0', 'User logged in', 'Login', '::1', '2023-09-25 07:26:24'),
(2, '', 'User logged out', 'Logout', '::1', '2023-10-08 12:11:32'),
(3, '', 'User logged out', 'Logout', '::1', '2023-10-08 12:11:35'),
(4, '', 'User logged out', 'Logout', '::1', '2023-10-08 12:11:37'),
(5, '', 'User logged out', 'Logout', '::1', '2023-10-08 12:17:46'),
(6, 'harry@den.com', 'User logged in', 'Login', '::1', '2023-10-10 11:28:06'),
(7, 'admin@admin.com', 'User logged in', 'Login', '::1', '2023-11-28 15:08:23'),
(8, '', 'User logged out', 'Logout', '::1', '2023-11-29 01:07:34'),
(9, 'harry@den.com', 'User logged in', 'Login', '::1', '2023-11-29 01:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `error_logs`
--
ALTER TABLE `error_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `product_description`
--
ALTER TABLE `product_description`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_remarks`
--
ALTER TABLE `tbl_admin_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_data`
--
ALTER TABLE `tbl_contact_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `error_logs`
--
ALTER TABLE `error_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_description`
--
ALTER TABLE `product_description`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin_remarks`
--
ALTER TABLE `tbl_admin_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_contact_data`
--
ALTER TABLE `tbl_contact_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
