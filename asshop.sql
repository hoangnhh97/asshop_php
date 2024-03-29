-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 12:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `cate_name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `description` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `cate_name`, `description`, `image`) VALUES
(1, 'Áo', '<p>abc</p>', 'cate-1_1577186031.jpg'),
(2, 'Áo Sơ Mi', '', 'cate-2_1577186089.jpg'),
(3, 'Áo Thun', '', 'cat-3_1577186102.jpg'),
(4, 'Áo Khoác', '', 'cat-4_1577186135.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `message` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hot_deal`
--

CREATE TABLE `hot_deal` (
  `hot_deal_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type_num` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `mins` int(11) DEFAULT NULL,
  `secs` int(11) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hot_deal`
--

INSERT INTO `hot_deal` (`hot_deal_id`, `product_id`, `type_num`, `days`, `hours`, `mins`, `secs`, `status`) VALUES
(1, 1, 0, 1, 24, 60, 60, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_phone` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_address` text COLLATE utf8_vietnamese_ci NOT NULL,
  `order_notes` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `shipping_date` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `shipping_status` int(11) DEFAULT 0,
  `payment_method` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `full_name`, `order_email`, `order_phone`, `order_address`, `order_notes`, `shipping_date`, `shipping_status`, `payment_method`, `created_at`) VALUES
(17, 1, 'Hoang Nguyen', 'hoangnhh140697@gmail.com', '0944114697', '965/16/181A Quang Trung, Phường 14, Quận Gò Vấp, TP. Hồ Chí Minh, Việt Nam', '', 'abc', 1, 1, '2019-03-12'),
(18, 0, 'Hoang Nguyen', 'hoangnhh140697@gmail.com', '0944114697', '965/16/181A Quang Trung, Phường 14, Quận Gò Vấp, TP. Hồ Chí Minh, Việt Nam', '', 'Thời gian: từ 2019-15-05 đến 2019-13-05', 0, 1, '2019-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `total`) VALUES
(15, 17, 1, 1, 200000),
(21, 18, 1, 4, 400000),
(22, 18, 2, 1, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `description` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `price` float DEFAULT 0,
  `new_price` float DEFAULT 0,
  `brand` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `short_desc`, `price`, `new_price`, `brand`, `model`, `image`, `type`, `created_at`, `status`) VALUES
(1, 'Áo Thun 1', '', 'This is short desc', 200000, 100000, 'abc', 'Việt Nam', 'ao-thun-1.jpg', 2, '2019-11-26', b'1'),
(2, 'Áo Sơ Mi 1', 'Áo Sơ Mi 1', 'This is short desc', 400000, 0, 'Jackie', 'Mỹ', 'ao-so-mi-1.jpg', 1, '2019-11-26', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `product_with_cate`
--

CREATE TABLE `product_with_cate` (
  `productwithcateid` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `product_with_cate`
--

INSERT INTO `product_with_cate` (`productwithcateid`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `role_desc` text COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'admin', NULL),
(2, 'Thành viên', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `tag_name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `product_id`, `tag_name`) VALUES
(1, 1, 'áo thun kiểu'),
(2, 2, 'áo sơ mi vải tốt'),
(3, 1, 'áo sơ mi pro');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `user_address` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `user_address`, `phone_number`, `user_type`, `role_id`, `created_at`) VALUES
(1, 'Hoang', 'Nguyen', 'admin', '123', 'a', '0944114697', 1, 1, NULL),
(23, 'Hoang', 'Nguyen', 'hoangnhh140697@gmail.com', '123', '', '0944114697', 1, 2, '2019-05-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `hot_deal`
--
ALTER TABLE `hot_deal`
  ADD PRIMARY KEY (`hot_deal_id`),
  ADD UNIQUE KEY `FOREIGN KEY` (`product_id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_with_cate`
--
ALTER TABLE `product_with_cate`
  ADD PRIMARY KEY (`productwithcateid`),
  ADD UNIQUE KEY `product_and_cate` (`product_id`,`category_id`),
  ADD KEY `pwc_fkid_cateid` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FOREIGNKEY` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hot_deal`
--
ALTER TABLE `hot_deal`
  MODIFY `hot_deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_with_cate`
--
ALTER TABLE `product_with_cate`
  MODIFY `productwithcateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hot_deal`
--
ALTER TABLE `hot_deal`
  ADD CONSTRAINT `hotdeal_fkid_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `orderdetail_fkid_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetail_fkid_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_with_cate`
--
ALTER TABLE `product_with_cate`
  ADD CONSTRAINT `pwc_fkid_cateid` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `pwc_fkid_productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tag_fkid_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_fkid_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
