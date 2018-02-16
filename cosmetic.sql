-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2018 at 05:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `merchant_service_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `membership_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `price` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `booking_type` int(11) NOT NULL DEFAULT '0',
  `booking_agent` varchar(250) NOT NULL,
  `note` text NOT NULL,
  `multiple_field` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` varchar(250) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `image`, `detail`, `slug`) VALUES
(1, 'Nivea', 'nivea.png', '<p>test</p>', 'good'),
(2, 'Lakme', 'Lakmelogofile.jpg', '<p>ahaha</p>', 'aad'),
(4, 'loreal', 's.jpg', '<p>aeda</p>', 'loreal'),
(6, 'Maybelline', 'may.png', '<p>ada</p>', 'maybelline'),
(7, 'Dove', 'do.png', '<p>ada</p>', 'dove');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `cat_type` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `cat_type`) VALUES
(1, 'Ladies', 'abc', 1),
(2, 'Gents', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `slug`) VALUES
(1, 'Kathmandu', 'abc'),
(2, 'Pokhara', 'pokhara'),
(3, 'Biratnagar', '');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1503557535),
('m130524_201442_init', 1503557547);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `user_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `user_order_id`, `product_id`, `user_id`, `price`, `discount`, `quantity`) VALUES
(1, 1, 17, 1, 300, 260, 2),
(2, 1, 16, 1, 400, 350, 2),
(3, 2, 17, 1, 300, 260, 2),
(4, 2, 16, 1, 400, 350, 2),
(5, 3, 6, 1, 450, 405, 1),
(6, 3, 7, 1, 600, 540, 2),
(7, 4, 7, 1, 600, 540, 3),
(8, 5, 6, 1, 450, 405, 1),
(9, 6, 6, 1, 450, 405, 1),
(10, 7, 6, 1, 450, 405, 1),
(11, 8, 16, 1, 400, 350, 6),
(15, 12, 17, 1, 300, 260, 4),
(16, 12, 16, 1, 400, 350, 1),
(17, 13, 17, 1, 300, 260, 1),
(18, 14, 7, 1, 600, 540, 1),
(19, 15, 6, 1, 450, 405, 1),
(20, 16, 6, 1, 450, 405, 4),
(21, 17, 7, 1, 600, 540, 16),
(22, 18, 6, 1, 450, 405, 1),
(23, 19, 7, 1, 600, 540, 1),
(24, 20, 16, 1, 400, 350, 2),
(25, 21, 7, 1, 600, 540, 5),
(26, 22, 6, 1, 450, 405, 2),
(27, 22, 7, 1, 600, 540, 1),
(28, 23, 7, 1, 600, 540, 5),
(29, 24, 7, 1, 600, 540, 6),
(30, 24, 16, 1, 400, 350, 5),
(31, 25, 7, 1, 600, 540, 5),
(32, 25, 18, 1, 350, 320, 1),
(33, 25, 6, 1, 450, 405, 1),
(34, 26, 7, 1, 600, 540, 5),
(35, 27, 7, 1, 600, 540, 1),
(36, 27, 16, 1, 400, 350, 4),
(37, 28, 8, 1, 350, 315, 4),
(38, 29, 6, 1, 450, 405, 6),
(39, 29, 16, 1, 400, 350, 1),
(40, 29, 18, 1, 350, 320, 1),
(41, 30, 7, 1, 600, 540, 5),
(42, 30, 16, 1, 400, 350, 1),
(43, 31, 6, 1, 450, 405, 5),
(44, 32, 7, 1, 600, 540, 5);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `short_detail` varchar(250) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock_count` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  `short_detail` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `discount` double NOT NULL,
  `discount_type` tinyint(4) NOT NULL DEFAULT '0',
  `brand_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `slug` varchar(200) NOT NULL,
  `alt_name` varchar(100) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `stock_count`, `price`, `short_detail`, `detail`, `image`, `discount`, `discount_type`, `brand_id`, `city_id`, `category_id`, `created_at`, `update_at`, `created_by`, `updated_by`, `status`, `slug`, `alt_name`, `subcategory_id`, `season_id`) VALUES
(6, 'Bobby Brown Long Wear Gel Eyeliner', 50, '450', 'Water proof', '<p>This award-winning long-wear eyeliner comes in a gel-based formula. And it is not only waterproof, but also sweat and humidity resistant. This product does not smudge or fade.</p>\r\n<p>It was listed as one of the &ldquo;<strong>Best Beauty Buys</strong>&ldquo; featured in the Instyle Magazine (April 2015).</p>\r\n<p><em>A user says,&rdquo;I would definitely recommend this product to all the eyeliner lovers out there. Really a versatile product.</em>&rdquo;</p>', 'bobby brown.jpg', 10, 0, 2, 1, 1, 0, 0, 0, 0, 1, '', 'Bobby Brown ', 12, 0),
(7, 'Maybelline Hyper Sharp Eyeliner', 25, '600', 'from USA', '<p>Say goodbye to your sharpener and still stay sharp! Maybelline hyper sharp eyeliner is a must-have in your makeup kit, according to experts.</p>\r\n<p>It is waterproof, smudge-free, and quick-drying. It is a long-lasting formula that comes with a precision tip foam applicator. This unique sweat-resistant formula adds instant drama to the eyes without any flaking or fading.</p>\r\n<p><em>A user reviewed this product as, &ldquo;Just love the intensity of the liner&rdquo;.</em></p>', 'may.jpg', 10, 0, 1, 2, 1, 0, 0, 0, 0, 1, '', 'liner', 12, 0),
(8, 'Fogg', 20, '350', 'Perfume', '<p>from india</p>', 'images.jpg', 10, 0, 1, 2, 2, 0, 0, 0, 0, 1, '', 'per', 8, 0),
(16, 'Dove Hair Therapy', 30, '400', 'Shampoo', '<p>Imported</p>', 'dove.png', 50, 1, 7, 3, 1, 1509003629, 1509004458, 1, 1, 1, 'dove-hair-therapy', 'Dove', 15, 0),
(17, 'Lakme Sun Expert', 22, '300', 'Sunscreen lotion', '<p>UV Protection</p>', 'Best-Sunscreens-In-India-For-Winters-Ingredients-Price-Buy-Online-5.jpg', 40, 1, 2, 2, 1, 1509004172, 1509004172, 1, 1, 1, 'lakme-sun-expert', 'Lakme', 14, 0),
(18, 'Maybelline Vivid Mate', 10, '350', 'maybelline', '<p>ddxdxgg</p>', 'Maybelline-New-Vivid-Lipsticks.jpg', 30, 1, 6, 2, 1, 1509004757, 1509346301, 1, 1, 1, 'vivid-mate', 'mate', 16, 0),
(19, 'Lakme Long Wear Nail Color', 30, '290', 'lakme', '<p>Long lasting</p>', 'lak.jpg', 30, 1, 2, 2, 1, 1509005690, 1509005866, 1, 1, 1, 'lakme-long-wear-nail-color', 'ss', 17, 0),
(20, 'Maybelline Eyeliner', 30, '230', 'afaf', '<p>afgzbrfh</p>', 'may.png', 30, 1, 6, 2, 1, 1509349402, 1509349402, 1, 1, 1, 'maybelline-eyeliner', 'asd', 12, 0),
(21, 'Lakme Eyeliner', 10, '300', 'liner', '<p>from lakme</p>', 'Lakmelogofile.jpg', 30, 1, 2, 2, 1, 1509350205, 1509350205, 1, 1, 0, 'lakme-eyeliner', 'asda', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE `site_config` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `googlemap` varchar(250) NOT NULL,
  `facebook` text NOT NULL,
  `delivery_charge` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `detail`, `slug`, `category_id`) VALUES
(8, 'Perfume', 'imported from US', 'as', 2),
(9, 'Fragrances', 'Imported', 'as', 1),
(10, 'Concealer', 'From india', 'as', 1),
(11, 'Lipbalm', 'lipbalm', 'ds', 2),
(12, 'Eyeliner', 'liner', 'lo', 1),
(14, 'Sunscreen', 'sunscreen lotion', 'lotion', 1),
(15, 'Shampoo', 'shampoo', 'sampoo', 2),
(16, 'Lipstick', 'Original', 'lipstick', 1),
(17, 'Nailpolish', 'assdad', 'nailpolish', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '0',
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `address`, `phone`, `mobile`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `type`, `password`, `image`, `gender`, `dob`) VALUES
(1, 'preetina', 'Preetina', 'Shakya', 'Sanepa', '8869864', 3827932, 'owhz5toBgql4ML76WxRusA5hvjk086dQ', '$2y$13$my1PWlENphDSzFBMk27Z2.omF4DYY/pyni.qx30zQue.b2cR2/QbO', NULL, 'aba@gmail.com', 1, 1503557847, 1513324146, 0, '123', 'IMG_20171102_012254_399.jpg', 1, '2051-08-20'),
(2, 'preeti', 'Preetina', 'Shakya', 'Sanepa', '5545544', 2147483647, '', '', NULL, 'sakyapreetina@gmail.com', 0, 1505198801, 1518351555, 0, '12345', '2017-02-12-10-13-39-251.jpg', 0, '0000-00-00'),
(3, 'Sebak', 'Sebak', 'Nepal', 'kalanki,Nepal', '88888888', 99999999, '', '', NULL, 'sebak@gmail.com', 1, 1505454633, 1511770444, 0, '123', 'IMG_20170919_215106_957.jpg', 0, '0000-00-00'),
(4, 'Durga', 'Durga', 'Rimal', 'kalanki', '2131', 323, '', '', NULL, 'abc@gmail.com', 1, 1511935629, 1511935629, 0, '12345', 'IMG_20170922_152400_599.jpg', 1, '2010-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `note` text NOT NULL,
  `subtotal` double NOT NULL,
  `discount_amount` double NOT NULL,
  `delivery` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `total_amount`, `note`, `subtotal`, `discount_amount`, `delivery`, `status`, `total_quantity`) VALUES
(22, 0, 1, 1511849581, 1511849581, 1, 1, 1410, 'test note', 1350, 150, '60', 2, 2),
(23, 0, 1, 1511850424, 1511850424, 1, 1, 2760, 'test note', 2700, 300, '60', 2, 1),
(24, 0, 1, 1511857988, 1511857988, 1, 1, 5050, 'test note', 4990, 610, '60', 2, 2),
(25, 0, 1, 1511858042, 1511858042, 1, 1, 3485, 'test note', 3425, 375, '60', 0, 3),
(26, 0, 1, 1512202007, 1512202007, 1, 1, 2760, 'test note', 2700, 300, '60', 1, 1),
(27, 0, 1, 1512468832, 1512468832, 1, 1, 2000, 'test note', 1940, 260, '60', 0, 2),
(28, 0, 1, 1512736171, 1512736171, 1, 1, 1320, 'test note', 1260, 140, '60', 0, 1),
(29, 0, 1, 1518351050, 1518351050, 1, 1, 3160, 'test note', 3100, 350, '60', 0, 3),
(30, 0, 1, 1518419244, 1518419244, 1, 1, 3110, 'test note', 3050, 350, '60', 0, 2),
(31, 0, 1, 1518419432, 1518419432, 1, 1, 2085, 'test note', 2025, 225, '60', 0, 1),
(32, 0, 1, 1518770050, 1518770050, 1, 1, 2760, 'test note', 2700, 300, '60', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(34, 1, 6),
(35, 1, 21),
(36, 1, 8),
(39, 1, 7),
(40, 1, 7),
(41, 1, 7),
(42, 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_config`
--
ALTER TABLE `site_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
