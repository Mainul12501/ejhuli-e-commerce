-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 06:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ejhuli`
--

-- --------------------------------------------------------

--
-- Table structure for table `e_admins`
--

CREATE TABLE `e_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_admins`
--

INSERT INTO `e_admins` (`id`, `user_id`, `name`, `email`) VALUES
(1, 1, 'Admin', 'cs.ankitprajapati@gmail.com'),
(2, 32, 'Admin', 'mainul125011@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `e_brands`
--

CREATE TABLE `e_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active,2=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_brands`
--

INSERT INTO `e_brands` (`id`, `name`, `slug`, `logo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AccChandon Wine', 'accchandon-wine', 'accchandon-wine-Vector-Smart-Object111-copy-3.png', 'null', 1, '2020-11-05 05:22:39', '2020-12-03 13:50:39'),
(2, 'HiDesign', 'hidesign', 'hidesign-durga.jpg', 'null', 1, '2020-11-05 05:22:39', '2020-12-03 12:47:42'),
(3, 'Allen Solly', 'allen-solly', 'allen-solly-watch_1.png', 'null', 1, '2020-11-05 05:22:39', '2020-12-03 12:47:25'),
(4, 'East India Company', 'east-india-company', 'east-india-company-logo.png', 'null', 1, '2020-11-05 05:22:39', '2020-12-03 12:47:07'),
(5, 'Allen Cooper India', 'allen-cooper-india', 'allen-cooper-india-round-error-symbol.png', 'null', 1, '2020-11-05 05:22:39', '2020-12-03 12:46:47'),
(6, 'Bata', 'bata', 'bata-cubersindia_logo.png', 'Jusdt uir', 1, '2020-11-23 08:14:16', '2020-12-03 12:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `e_brand_products`
--

CREATE TABLE `e_brand_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_brand_products`
--

INSERT INTO `e_brand_products` (`id`, `product_id`, `brand_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 4),
(4, 3, 5),
(5, 4, 3),
(6, 4, 4),
(7, 5, 4),
(8, 6, 4),
(9, 7, 1),
(10, 7, 2),
(11, 7, 3),
(12, 8, 1),
(13, 8, 2),
(14, 8, 3),
(15, 9, 4),
(16, 9, 5),
(17, 9, 2),
(18, 10, 1),
(19, 10, 2),
(20, 11, 1),
(21, 11, 2),
(22, 11, 3),
(23, 12, 4),
(24, 12, 3),
(25, 13, 1),
(26, 13, 2),
(27, 14, 4),
(28, 15, 1),
(29, 16, 6);

-- --------------------------------------------------------

--
-- Table structure for table `e_categories`
--

CREATE TABLE `e_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Font awesom icon class',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active,2=>Inactive,3=>Deleted',
  `navigation` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Show in navigation menu,2=>Don''t show',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_categories`
--

INSERT INTO `e_categories` (`id`, `category`, `category_slug`, `description`, `icon_class`, `status`, `navigation`, `created_at`, `updated_at`) VALUES
(1, 'Health & Fitness', 'health-fitness', 'null', 'icon-heart', 1, 1, '2020-11-05 05:22:39', '2020-11-19 11:31:36'),
(2, 'Home & Kitchen', 'home-kitchen', 'null', 'linearicons-dinner', 1, 1, '2020-11-05 05:22:39', '2020-11-21 23:15:17'),
(3, 'Daily Essentials', 'daily-essentials', NULL, 'linearicons-leaf', 1, 1, '2020-11-05 05:22:39', '2020-11-05 05:22:39'),
(4, 'Electornics & Accessories', 'electornics-accessories', 'null', 'icon-earphones', 1, 2, '2020-11-05 05:22:39', '2020-11-20 10:27:46'),
(5, 'Cloths', 'cloths', 'null22', 'linearicons-pointer-right', 1, 1, '2020-11-05 05:22:39', '2020-11-19 10:37:48'),
(6, 'Furniture', 'furniture', 'dfgdgdg', 'flaticon-necklace', 1, 2, '2020-11-19 10:38:33', '2020-11-19 10:38:33'),
(7, 'Videos Games', 'videos-games', 'fgfgfgg', 'icon-social-youtube', 1, 1, '2020-11-20 10:26:46', '2020-11-20 10:29:00'),
(8, 'Books & Stationary', 'books-stationary', 'Books & Stationary', 'ti ti-palette', 1, 2, '2020-11-21 11:34:21', '2020-11-21 11:34:21'),
(9, 'DYZ', 'dyz', 'Musical product', 'ti ti-music', 1, 2, '2020-11-22 06:22:00', '2020-11-23 08:26:50'),
(10, 'Motor Parts', 'motor-parts', 'Biker', 'ti ti-shopping-cart', 1, 2, '2020-11-23 08:26:28', '2020-11-23 08:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `e_category_products`
--

CREATE TABLE `e_category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_category_products`
--

INSERT INTO `e_category_products` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 3, 3),
(5, 4, 3),
(6, 4, 4),
(7, 5, 4),
(8, 6, 4),
(9, 7, 5),
(10, 7, 1),
(11, 8, 5),
(12, 8, 1),
(13, 9, 3),
(14, 9, 4),
(15, 9, 5),
(16, 10, 1),
(17, 10, 2),
(18, 11, 1),
(19, 11, 5),
(20, 11, 3),
(21, 12, 2),
(22, 12, 5),
(24, 14, 2),
(25, 14, 3),
(26, 14, 5),
(27, 15, 1),
(28, 15, 2),
(29, 15, 3),
(30, 16, 1),
(31, 16, 4),
(33, 17, 5),
(34, 13, 1),
(35, 18, 2),
(36, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `e_compose_newsletters`
--

CREATE TABLE `e_compose_newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_at` date NOT NULL,
  `composed` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>No,2=>Yes',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active,2=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_compose_newsletters`
--

INSERT INTO `e_compose_newsletters` (`id`, `title`, `description`, `image`, `link`, `scheduled_at`, `composed`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cron Test title', '/usr/local/bin/php /home/codingbi/public_html/work/shopzenv2/artisan schedule:run >> /dev/null 2>&1', '1617950464-sf.jpg', 'https://codingbirdsonline.com/', '2021-04-09', 2, 1, '2021-04-09 04:11:04', '2021-04-09 14:09:07'),
(2, 'Cron final test', 'Compose newsletter command has been executed successfully', '1618072544-462c02fa49d3a9db3778c2cc7fabafc9.jpg', 'https://codingbirdsonline.com/', '2021-04-10', 1, 1, '2021-04-10 14:05:44', '2021-04-10 14:05:44'),
(3, 'Hello', 'xyzryyyyye', '1618483360-profile.jpg', 'xyz.com', '2021-04-15', 1, 1, '2021-04-15 08:12:40', '2021-04-15 08:12:40'),
(4, 'Student’s Intoxicating Abuse Prediction By Using Association Rule Mining Techniques', 'Student’s Intoxicating Abuse Prediction By Using Association Rule Mining Techniques', '1619196881-1618404547185.jpg', 'https://vimeo.com/51589652', '2021-04-23', 1, 1, '2021-04-23 14:24:41', '2021-04-23 14:24:41'),
(5, 'Student’s Intoxicating Abuse Prediction By Using Association Rule Mining Techniques', 'sfaggeawaes', '1619251336-vbd-png-300x168.png', 'www.arket.com/en_nok/women/sale.html', '2021-04-27', 1, 1, '2021-04-24 05:32:16', '2021-04-27 15:55:06'),
(6, 'LARX WORDPRESS THEME', 'Hello!!!!!!!@', '1621932103-download.jpg', 'https://vimeo.com/51589652', '2021-05-25', 1, 1, '2021-05-25 06:11:43', '2021-05-25 06:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `e_countries`
--

CREATE TABLE `e_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_customers`
--

CREATE TABLE `e_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` tinyint(4) NOT NULL DEFAULT 0,
  `wallet_balance` decimal(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `newsletter` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_customers`
--

INSERT INTO `e_customers` (`id`, `user_id`, `first_name`, `last_name`, `email`, `email_verified`, `wallet_balance`, `newsletter`) VALUES
(1, 2, 'Md.', 'Hassan', 'mh_ashiq@yahoo.com', 1, '913.40', 1),
(2, 3, 'aniket', NULL, 'aniket@gmail.com', 1, '0.00', 1),
(3, 4, 'Ankti', 'Prajapati', 'ankitprajapati123456@gmail.com', 1, '10.00', 1),
(12, 13, 'testingmale', NULL, 'testingmale@gmail.com', 0, '0.00', 1),
(13, 14, 'feliciaevensen6834', NULL, 'feliciaevensen6834@gmail.com', 0, '0.00', 1),
(14, 15, 'mh_ashiq', NULL, 'mh_ashiq@yahoo.com', 0, '0.00', 1),
(15, 16, 'mhashiq.cse', NULL, 'mhashiq.cse@gmail.com', 0, '0.00', 1),
(16, 17, 'a', NULL, 'a@a.com', 1, '3999.00', 1),
(17, 18, 'dummy222', NULL, 'dummy222@gmail.com', 1, '0.00', 1),
(18, 19, 'uttamaniket', NULL, 'uttamaniket@gmail.com', 1, '0.00', 1),
(19, 20, 'contact', NULL, 'contact@thevirtualbd.com', 1, '0.00', 1),
(20, 21, 'contact', NULL, 'contact@mehedihassan.info', 1, '454.00', 1),
(21, 22, 'X', NULL, 'X@x.x', 0, '0.00', 1),
(22, 23, 'admin', NULL, 'admin@mehedihassan.info', 1, '9999.00', 1),
(23, 24, 'Asaf', 'Kakon', 'kakon53212@gmail.com', 1, '0.00', 1),
(24, 25, 'swe', NULL, 'swe@yahoo.com', 1, '0.00', 1),
(25, 26, 'something', NULL, 'something@yahoo.com', 0, '0.00', 1),
(26, 27, 'hadaxa4822', NULL, 'hadaxa4822@itwbuy.com', 0, '0.00', 1),
(27, 28, 'shiv', NULL, 'shiv@gmail.com', 0, '0.00', 1),
(28, 29, 'Mehedi', 'Hassan', 'waybest57@gmail.com', 0, '0.00', 1),
(29, 30, 'Khanmahbub70000', NULL, 'Khanmahbub70000@gmai.com', 0, '0.00', 1),
(30, 31, 'mainul125011', 'ffff', 'mainul125011@gmail.com', 0, '0.00', 1),
(31, 33, 'y5qv4wg1id', NULL, 'y5qv4wg1id@eposta.buzz', 0, '0.00', 1),
(32, 34, 'yjp2kkvofs', NULL, 'yjp2kkvofs@eposta.buzz', 0, '0.00', 1),
(34, 36, 'dkt4crypi9', '222', 'dkt4crypi9@eposta.com', 0, '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `e_customer_addresses`
--

CREATE TABLE `e_customer_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` tinyint(4) DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Home,2=>Office,3=>Others',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_customer_addresses`
--

INSERT INTO `e_customer_addresses` (`id`, `user_id`, `first_name`, `last_name`, `email`, `contact`, `country`, `street_address`, `state`, `town_city`, `postal_code`, `address_type`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ankit', 'Kumar', 'cs.ankitprajapati@gmail.com', '6555554455', NULL, '40D Dayalpuram Hanspuram Naubasta Kanpur, Uttar Pradesh India', 'Uttar Pradesh', 'Kanpur Nagar', '208021', 1, '2020-11-08 07:52:58', '2020-11-08 07:52:58'),
(2, 4, 'Ankit', 'Prajapati', 'cs.ankitprajapati@gmail.com', '4364646456', NULL, '40D Dayalpuram Hanspuram Naubasta Kanpur, Uttar Pradesh India', 'Uttar Pradesh', 'Kanpur Nagar', '208021', 1, '2020-12-03 18:34:32', '2020-12-03 18:34:32'),
(3, 17, 'Md.Mehedi', 'Hassan', 'waybest57@gmail.com', '1001100111', NULL, 'Benapole, Jashire', 'Benapole', 'Khulna', '743111', 1, '2021-03-28 14:45:08', '2021-03-28 14:45:08'),
(4, 19, 'uttam', 'dfdf', 'uttamaniket@gmail.com', '5666666666', NULL, '40D Dayalpuram Hanspuram Naubasta Kanpur, Uttar Pradesh India', 'Uttar Pradesh', 'Kanpur Nagar', '208021', 1, '2021-04-09 06:46:42', '2021-04-09 06:46:42'),
(5, 20, 'zsg', 'zgzg', 'zg@zg.fhh', '9902624501', NULL, 'Patbari Mor, Benapole', 'fgd', 'Jessore', '7431', 1, '2021-04-09 07:16:24', '2021-04-09 07:16:24'),
(6, 23, 'Md.Mehedi', 'Hassan', 'waybest57@gmail.com', '9902624501', NULL, 'Benapole, Benapole,Jessore', 'Benapole', 'Khulna', '7431', 1, '2021-04-23 16:28:42', '2021-04-23 16:28:42'),
(7, 2, 'Md.Mehedi', 'Hassan', 'mh_ashiq@yahoo.com', '01902624501', NULL, 'Benapole, Benapole,Jessore', 'Benapole', 'Khulna', '7431', 2, '2021-05-21 18:58:05', '2021-05-21 18:58:05'),
(8, 2, 'Md.Mehedi', 'Hassan', 'mh_ashiq@yahoo.com', '01902624501', NULL, 'Benapole, Benapole,Jessore', 'Jessore', 'Jessore', '7431', 3, '2021-05-21 18:58:20', '2021-05-21 18:58:20'),
(9, 2, 'Md.Mehedi', 'Hassan', 'mh_ashiq@yahoo.com', '01902624501', NULL, 'Benapole, Benapole,Jessore', 'Jessore', 'Jessore', '7431', 2, '2021-05-21 18:58:37', '2021-05-21 18:58:37'),
(10, 24, 'Asaf', 'ud Doulla', 'kakon53212@gmail.com', '01876546434', NULL, 'Sonadangav egegeg', 'Khulna', 'Khulna', '9100', 1, '2021-05-25 10:53:19', '2021-05-25 10:53:19'),
(11, 24, 'Asaf', 'ud Doulla', 'kakon53212@gmail.com', '0142424244', NULL, 'Sonadangawwrwrwrw', 'Khulna', 'Khulna', '9100', 1, '2021-05-25 10:53:53', '2021-05-25 10:53:53'),
(12, 27, 'for testing', 'for testing', 'hadaxa4822@itwbuy.com', '01932974266', NULL, 'for testing', 'for testing', 'for testing', '1414', 1, '2021-05-27 12:39:22', '2021-05-27 12:39:22'),
(13, 29, 'Md.Mehedi', 'Hassan', 'waybest57@gmail.com', '01902624501', NULL, 'Benapole, Benapole,Jessore', 'Benapole', 'Khulna', '7431', 1, '2021-05-28 17:36:01', '2021-05-28 17:36:01'),
(14, 30, 'Hhunb', 'Hhujj', 'Gg@gmail.com', '01902624571', NULL, 'Benapole-Petrapole', 'Hcv', 'Bnjjjgc', '11220', 1, '2021-06-02 14:46:36', '2021-06-02 14:46:36'),
(15, 31, 'asd', 'ssd', 's@d.com', '01234567890', NULL, 'xzxczxczxczxczxczxczx', 's', 'dzxc', '3600', 1, '2021-06-25 11:22:32', '2021-06-25 11:22:32'),
(17, 33, 'first name', 'last name', 'email@add.com', '12345678908', NULL, 'koroiya kachua', 'chandput', 'Bangladesh', '1200', 2, '2021-06-27 18:42:51', '2021-06-27 18:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `e_discounts`
--

CREATE TABLE `e_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'category ids on which coupon code is can be applied',
  `start_date` datetime NOT NULL,
  `validity_date` datetime NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active,2=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_discounts`
--

INSERT INTO `e_discounts` (`id`, `coupon_name`, `discount`, `description`, `categories`, `start_date`, `validity_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DIWALI', '2', 'gfggdgg', '4', '2020-11-22 00:00:00', '2020-11-25 00:00:00', 1, '2020-11-21 22:44:34', '2020-11-21 22:44:34'),
(2, 'ABC', '3', 'FFF', '3', '2020-11-22 00:00:00', '2020-11-26 00:00:00', 1, '2020-11-22 06:32:43', '2020-11-22 06:32:43'),
(3, 'ZARIF', '10', '10%', '1', '2020-11-23 00:00:00', '2020-11-25 00:00:00', 1, '2020-11-23 02:20:59', '2020-11-23 02:20:59'),
(4, 'KAKON', '50', 'wINTER OFF!', '1', '2020-11-23 03:00:00', '2020-11-24 19:00:00', 1, '2020-11-23 07:51:44', '2020-12-03 13:03:36'),
(5, 'EID', '5', '5% for eid ceremony', '1,2,3,4,5,6,7,8,9,10', '2020-12-04 15:58:00', '2020-12-12 22:58:00', 1, '2020-12-04 04:29:17', '2020-12-04 16:54:50'),
(6, 'TEST10', '2', 'rgdfgfdg', '1,5', '2020-12-05 17:06:00', '2020-12-05 17:14:00', 1, '2020-12-04 19:41:24', '2020-12-05 11:36:31'),
(7, 'SUKX', '20', 'Something', NULL, '2020-12-05 17:32:00', '2020-12-05 18:32:00', 1, '2020-12-05 11:33:07', '2020-12-05 11:33:07'),
(8, 'ABZ', '50', 'Gghh', '4', '2020-12-26 01:05:00', '2020-12-28 01:05:00', 1, '2020-12-26 19:05:40', '2020-12-26 19:05:40'),
(9, 'ABC', '40', 'Opening year', '1,2,3,4,5,6,7,8,9,10', '2021-03-14 07:15:00', '2021-03-14 18:06:00', 1, '2021-03-14 04:11:23', '2021-03-14 04:11:23'),
(10, 'SOME', '30', 'Something', '1,2,3,4,5,6,7,8,9,10', '2021-05-28 20:54:00', '2021-05-31 20:54:00', 1, '2021-03-28 14:55:05', '2021-05-29 08:20:28'),
(11, 'DOI', '50', 'yes', '3', '2021-04-09 10:10:00', '2021-04-29 13:10:00', 1, '2021-04-09 04:40:36', '2021-04-09 04:44:07'),
(12, 'TRYC', '90', 'Yes, trying', '2', '2021-04-19 14:13:00', '2021-05-26 17:13:00', 1, '2021-04-19 08:44:24', '2021-04-19 08:44:24'),
(13, 'TRYC', '90', 'Yes, trying', '2', '2021-04-19 14:13:00', '2021-05-26 17:13:00', 1, '2021-04-19 08:44:35', '2021-04-19 08:44:35'),
(14, 'AVC', '30', 'Something,', '2', '2021-04-23 20:34:00', '2021-04-24 22:35:00', 1, '2021-04-23 14:05:11', '2021-04-23 14:07:19'),
(15, 'FOOL', '50', 'We are being fool.', '3', '2021-04-24 11:28:00', '2021-04-29 12:28:00', 1, '2021-04-24 03:59:11', '2021-04-24 03:59:11'),
(16, 'XXX', '20', 'xyz yes', '2', '2021-05-21 23:20:00', '2021-05-29 23:51:00', 1, '2021-05-21 15:21:25', '2021-05-24 06:17:46'),
(17, 'OOO', '10', 'How can I going on!', '5', '2021-05-25 12:10:00', '2021-05-28 13:11:00', 1, '2021-05-25 04:42:04', '2021-05-25 04:42:04'),
(18, 'ZAA', '30', 'Yes, Testing', '2', '2021-05-05 00:32:00', '2021-06-29 00:32:00', 1, '2021-05-28 16:02:42', '2021-05-28 16:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `e_failed_jobs`
--

CREATE TABLE `e_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_jobs`
--

CREATE TABLE `e_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_media`
--

CREATE TABLE `e_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=>Banner',
  `status` int(2) NOT NULL DEFAULT 1,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_media`
--

INSERT INTO `e_media` (`id`, `file`, `type`, `status`, `data`, `created_at`, `updated_at`) VALUES
(1, '1608140661-banner13.jpg', 'banner', 1, '{\"title\":\"Highcharts Demo\",\"sub_title\":\"Testing\",\"button_label\":\"Shop Now\",\"button_link\":\"https:\\/\\/cubersindia.com\"}', '2020-12-16 17:44:21', '2021-06-23 11:44:35'),
(2, '1621847152-186482725_306535534284312_7143673354899380990_n.jpg', 'banner', 1, '{\"title\":\"Robotx\",\"sub_title\":\"Cleaner\",\"button_label\":\"Yahoo!\",\"button_link\":\"https:\\/\\/thevirtualbd.com\\/\"}', '2020-12-16 17:44:32', '2021-05-28 16:56:41'),
(4, '1622229836-download (1).jpg', 'other_img1', 1, '{\"link\":\"https:\\/\\/ejhuli.com\\/product\\/sandle\"}', '2021-05-28 14:40:23', '2021-05-28 16:54:12'),
(5, '1622221855-other_img2.png', 'other_img2', 1, '{\"link\":\"http:\\/\\/ejhuli.com\\/\"}', '2021-05-28 14:40:55', '2021-05-28 14:40:55'),
(6, '1622221864-other_img3.jpg', 'other_img3', 1, '{\"link\":\"http:\\/\\/ejhuli.com\\/\"}', '2021-05-28 14:41:04', '2021-05-28 14:41:04'),
(7, '1622221875-other_img4.jpg', 'other_img4', 1, '{\"link\":\"http:\\/\\/ejhuli.com\\/\"}', '2021-05-28 14:41:15', '2021-05-28 14:41:15'),
(8, '1622221885-other_img5.jpg', 'other_img5', 1, '{\"link\":\"http:\\/\\/ejhuli.com\\/\"}', '2021-05-28 14:41:25', '2021-05-28 14:41:25'),
(9, '1622221896-other_img6.jpg', 'other_img6', 1, '{\"link\":\"http:\\/\\/ejhuli.com\\/\"}', '2021-05-28 14:41:36', '2021-05-28 14:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `e_migrations`
--

CREATE TABLE `e_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_migrations`
--

INSERT INTO `e_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_09_034525_create_admins_table', 1),
(5, '2020_05_09_103254_create_categories_table', 1),
(6, '2020_05_10_103121_create_sub_categories_table', 1),
(7, '2020_05_14_034416_create_products_table', 1),
(8, '2020_05_14_035208_create_category_products_table', 1),
(9, '2020_05_15_050806_create_sub_category_products_table', 1),
(10, '2020_05_16_075719_create_discounts_table', 1),
(11, '2020_05_27_064710_create_customers_table', 1),
(12, '2020_05_29_103513_create_brands_table', 1),
(13, '2020_05_29_120444_create_brand_products_table', 1),
(14, '2020_06_09_080904_create_countries_table', 1),
(15, '2020_06_09_081804_create_customer_addresses_table', 1),
(16, '2020_06_10_153816_create_recent_transactions_table', 1),
(17, '2020_06_12_124520_create_orders_table', 1),
(18, '2020_06_12_135150_create_order_products_table', 1),
(19, '2020_06_29_121626_create_order_processings_table', 1),
(20, '2020_07_04_155547_create_reviews_table', 1),
(21, '2020_07_14_074152_create_tags_table', 1),
(22, '2020_07_14_083559_create_product_tags_table', 1),
(23, '2020_07_19_105228_create_newsletters_table', 1),
(24, '2020_11_25_151547_create_wallet_requests_table', 2),
(25, '2020_12_06_132325_create_notifications_table', 3),
(26, '2020_12_07_222753_create_settings_table', 4),
(27, '2020_12_16_213331_create_media_table', 5),
(28, '2021_04_07_213811_create_compose_newsletters_table', 6),
(29, '2021_04_08_123146_create_process_logs_table', 7),
(30, '2021_04_24_154811_create_queries_table', 8),
(31, '2021_05_22_180049_create_stories_table', 9),
(32, '2021_04_08_191023_create_jobs_table', 10),
(33, '2021_06_27_202749_create_shurjo_pay_payments_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `e_newsletters`
--

CREATE TABLE `e_newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL COMMENT '1=>Active,2=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_newsletters`
--

INSERT INTO `e_newsletters` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cs.ankitprajapati@gmail.com', 1, '2020-11-08 02:13:12', '2020-11-18 09:37:50'),
(5, 'ankitprajapati123456@gmail.com', 1, '2020-11-22 10:52:04', '2020-11-22 10:52:04'),
(7, 'kakon@kakon.com', 1, '2020-11-23 08:01:28', '2020-11-23 08:01:28'),
(17, 'feliciaevensen6834@gmail.com', 1, '2020-12-04 19:48:35', '2020-12-04 19:48:35'),
(18, 'mh_ashiq@yahoo.com', 1, '2020-12-04 20:18:37', '2020-12-04 20:18:37'),
(19, 'mhashiq.cse@gmail.com', 1, '2020-12-13 16:51:58', '2020-12-13 16:51:58'),
(22, 'uttamaniket@gmail.com', 1, '2021-04-09 04:15:37', '2021-04-09 04:15:37'),
(23, 'contact@thevirtualbd.com', 1, '2021-04-09 04:31:22', '2021-04-09 04:31:22'),
(24, 'contact@mehedihassan.info', 1, '2021-04-19 08:17:37', '2021-04-19 08:17:37'),
(25, 'tommy@abbi.ai', 1, '2021-04-19 08:34:55', '2021-04-19 08:34:55'),
(26, 'X@x.x', 1, '2021-04-20 07:08:56', '2021-04-20 07:08:56'),
(27, 'xx@xx.com', 1, '2021-04-23 13:44:03', '2021-04-23 13:44:03'),
(28, 'waybest57@gmail.com', 1, '2021-04-23 13:44:28', '2021-04-23 13:44:28'),
(29, 'admin@mehedihassan.info', 1, '2021-04-23 13:49:16', '2021-04-23 13:49:16'),
(30, 'support@24.se', 1, '2021-05-02 05:26:38', '2021-05-02 05:26:38'),
(31, 'cs.ankitprajapati@gmail.com', 1, '2021-05-02 14:06:44', '2021-05-02 14:06:44'),
(32, 'ceo@thevirtualbd.com', 1, '2021-05-21 15:38:29', '2021-05-21 15:38:29'),
(33, 'ceo@thevirtualbd.com', 1, '2021-05-21 15:38:35', '2021-05-21 15:38:35'),
(34, 'supponrt@24.se', 1, '2021-05-21 17:06:12', '2021-05-21 17:06:12'),
(35, 'kakon53212@gmail.com', 1, '2021-05-25 08:02:36', '2021-05-25 08:02:36'),
(36, 'swe@yahoo.com', 1, '2021-05-25 13:32:41', '2021-05-25 13:32:41'),
(37, 'something@yahoo.com', 1, '2021-05-25 13:33:52', '2021-05-25 13:33:52'),
(38, 'hadaxa4822@itwbuy.com', 1, '2021-05-27 10:08:18', '2021-05-27 10:08:18'),
(39, 'shiv@gmail.com', 1, '2021-05-28 14:45:23', '2021-05-28 14:45:23'),
(40, 'waybest57@gmail.com', 1, '2021-05-28 14:49:58', '2021-05-28 14:49:58'),
(41, 'y@tay.com', 1, '2021-05-28 15:09:02', '2021-05-28 15:09:02'),
(42, 'Khanmahbub70000@gmai.com', 1, '2021-06-02 12:12:54', '2021-06-02 12:12:54'),
(43, 'Prince_Mayer@yahoo.com', 1, '2021-06-18 07:20:20', '2021-06-18 07:20:20'),
(44, 'cefo@thevirtualbd.com', 1, '2021-06-20 19:12:52', '2021-06-20 19:12:52'),
(45, 'cefo@thevirtualbd.com', 1, '2021-06-20 19:12:59', '2021-06-20 19:12:59'),
(46, 'waybest574@gmail.com', 1, '2021-06-23 11:39:54', '2021-06-23 11:39:54'),
(47, 'angonzarif@gmail.com', 1, '2021-06-23 12:15:21', '2021-06-23 12:15:21'),
(48, 'chun@gmail.com', 1, '2021-06-24 08:34:00', '2021-06-24 08:34:00'),
(49, 'waybest57@gmail.com', 1, '2021-06-24 08:34:48', '2021-06-24 08:34:48'),
(50, 'mainul125011@gmail.com', 1, '2021-06-24 18:18:35', '2021-06-24 18:18:35'),
(51, 'y5qv4wg1id@eposta.buzz', 1, '2021-06-25 13:52:58', '2021-06-25 13:52:58'),
(52, 'yjp2kkvofs@eposta.buzz', 1, '2021-06-25 14:42:40', '2021-06-25 14:42:40'),
(53, 'mainul12501@gmail.com', 1, '2021-07-19 05:35:11', '2021-07-19 05:35:11'),
(54, 'dkt4crypi9@eposta.buzz', 1, '2021-07-19 12:09:13', '2021-07-19 12:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `e_notifications`
--

CREATE TABLE `e_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_notifications`
--

INSERT INTO `e_notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('012b8815-5310-41f2-9f0d-fc79752104f7', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI17520 has been confirmed successfully\"}', '2021-05-21 16:05:23', '2021-05-21 16:03:55', '2021-05-21 16:05:23'),
('01b5dab9-1e55-4ed4-a026-eed037226e1f', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI11540 has been placed\"}', NULL, '2021-06-27 17:02:58', '2021-06-27 17:02:58'),
('05167d6e-0d70-42fd-9441-8e9ade88b93b', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN13564 has been placed successfully\"}', '2020-12-08 05:51:17', '2020-12-06 16:01:31', '2020-12-08 05:51:17'),
('054394ed-0dc1-4c80-94c7-ef0e50acb497', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI75670 has been placed\"}', NULL, '2021-07-11 13:10:47', '2021-07-11 13:10:47'),
('097b7dc1-30c4-4fe7-9bc3-d996f63dd7b4', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI65792 has been placed\"}', NULL, '2021-06-27 18:35:51', '2021-06-27 18:35:51'),
('0af7849f-16dd-402a-bfd3-467d362ae7f5', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN66945 has been delivered successfully\"}', '2021-04-15 08:28:28', '2021-02-10 17:02:57', '2021-04-15 08:28:28'),
('0f017696-6b70-4188-be3d-5e642dc1c1a2', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI18307 has been placed\"}', NULL, '2021-06-26 15:20:33', '2021-06-26 15:20:33'),
('10d0a118-cc38-4b26-9971-0e38508f6294', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI12356 has been placed\"}', NULL, '2021-06-27 09:36:00', '2021-06-27 09:36:00'),
('14dfa0cb-3803-4670-91ac-6fc8b48efb07', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN15774 has been placed successfully\"}', '2020-12-10 16:32:51', '2020-12-10 16:29:05', '2020-12-10 16:32:51'),
('16082fdc-e65c-492d-b5e5-10a532873899', 'App\\Notifications\\UserNotification', 'App\\User', 21, '{\"message\":\"wallet request confirmed successfully\"}', '2021-04-19 08:42:47', '2021-04-19 08:42:28', '2021-04-19 08:42:47'),
('17c76627-a0b8-497d-ae98-a04e7db237ea', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI10579 has been placed\"}', NULL, '2021-07-11 13:38:37', '2021-07-11 13:38:37'),
('18a74f04-f050-48ea-bd80-37d564616e5c', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI31166 has been placed\"}', NULL, '2021-07-11 17:45:06', '2021-07-11 17:45:06'),
('1a7a4fd4-99be-4e31-ac99-ccbdd85c8366', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI19003 has been placed\"}', NULL, '2021-06-27 17:39:56', '2021-06-27 17:39:56'),
('1af3aa9c-7a75-4d47-a653-9a0ee7d9ba2e', 'App\\Notifications\\UserNotification', 'App\\User', 23, '{\"message\":\"Your order #SHOPZEN24660 has been placed successfully\"}', '2021-04-23 14:35:49', '2021-04-23 13:58:53', '2021-04-23 14:35:49'),
('1af4d4f0-1829-4e5a-b680-733f002a6e26', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN78332 has been placed successfully\"}', '2020-12-11 15:49:14', '2020-12-10 16:50:23', '2020-12-11 15:49:14'),
('1b06a15d-adf4-4eb1-8a37-25eec468f489', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI89957 has been canceled\"}', '2021-05-28 17:32:32', '2021-05-28 15:10:52', '2021-05-28 17:32:32'),
('1d97668f-75ca-4582-bdb5-2b579739d81e', 'App\\Notifications\\UserNotification', 'App\\User', 21, '{\"message\":\"Your add money request has been sent\"}', '2021-04-19 08:27:54', '2021-04-19 08:27:15', '2021-04-19 08:27:54'),
('20b1a13b-1c53-437c-908a-5116f6bf1aba', 'App\\Notifications\\UserNotification', 'App\\User', 23, '{\"message\":\"Your order #SHOPZEN24660 has been confirmed successfully\"}', '2021-04-23 14:35:41', '2021-04-23 14:29:46', '2021-04-23 14:35:41'),
('238dfa6a-ceb8-452f-b31d-50f942d67369', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN13876 has been confirmed successfully\"}', '2020-12-06 17:32:43', '2020-12-06 12:07:17', '2020-12-06 17:32:43'),
('26718d7d-a346-4077-a581-ad8c4e30d12c', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI43827 has been placed\"}', NULL, '2021-06-27 18:25:19', '2021-06-27 18:25:19'),
('2c17738f-ea48-492b-b720-422913ec8e1b', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your add money request has been sent\"}', '2021-05-22 18:17:29', '2021-05-22 08:06:57', '2021-05-22 18:17:29'),
('2cef520b-3e36-41cc-9aaa-29984c6ffef5', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN19094 has been placed successfully\"}', '2021-04-03 16:03:25', '2021-01-03 12:22:33', '2021-04-03 16:03:25'),
('2fe0e393-9831-44ce-9ed1-233adfa720c4', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI18725 has been placed\"}', NULL, '2021-06-27 18:33:43', '2021-06-27 18:33:43'),
('3138771e-d2aa-4e97-a6b3-1482ade046ed', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN66645 has been confirmed successfully\"}', '2020-12-06 16:00:29', '2020-12-06 12:23:21', '2020-12-06 16:00:29'),
('31f2745c-6cbd-4753-97cb-85c7d0c36ed4', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN12730 has been placed successfully\"}', '2020-12-10 16:08:56', '2020-12-10 16:06:07', '2020-12-10 16:08:56'),
('3ca424e2-cb49-48e6-a438-0c37d6716b72', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI31132 has been placed\"}', NULL, '2021-07-11 20:44:30', '2021-07-11 20:44:30'),
('3ee32207-a4aa-47ff-85f1-d6639b8de4bd', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN95217 has been delivered successfully\"}', '2021-04-24 04:10:31', '2021-04-24 04:10:10', '2021-04-24 04:10:31'),
('408c0102-acb9-4f4c-ae55-236d37bc8f0e', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN16422 has been confirmed successfully\"}', '2020-12-06 17:32:39', '2020-12-06 12:05:44', '2020-12-06 17:32:39'),
('40955c3f-d93f-4720-8eaf-1a13f5f2231d', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN51288 has been placed successfully\"}', '2021-04-04 16:47:10', '2021-04-04 16:46:29', '2021-04-04 16:47:10'),
('495072a4-913d-487a-b901-ef9eb14c2d6e', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN19902 has been placed successfully\"}', '2021-03-09 09:04:52', '2021-03-09 09:04:01', '2021-03-09 09:04:52'),
('4a57c7be-00ee-4647-986f-74da7435f790', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN57138 has been placed successfully\"}', '2020-12-10 16:08:59', '2020-12-10 16:07:14', '2020-12-10 16:08:59'),
('4bc9834a-4de8-42ae-8ce4-6a0ef03774bb', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI15009 has been placed\"}', NULL, '2021-06-27 17:06:03', '2021-06-27 17:06:03'),
('4c6ac43f-940b-476e-a5f8-75ea4d913da1', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN99839 has been delivered successfully\"}', '2021-04-15 08:28:28', '2021-04-15 08:05:50', '2021-04-15 08:28:28'),
('4de9ab6d-5335-4da0-849a-698102ef068f', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI17520 has been delivered successfully\"}', '2021-05-21 16:05:23', '2021-05-21 16:04:27', '2021-05-21 16:05:23'),
('50430e0f-8417-4459-a38b-417fb0e9b9ab', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI17127 has been delivered successfully\"}', '2021-05-21 15:39:24', '2021-05-21 15:36:52', '2021-05-21 15:39:24'),
('56679e40-70d9-4aa3-8c72-89161f0ce595', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI20981 has been placed\"}', NULL, '2021-06-27 18:23:13', '2021-06-27 18:23:13'),
('5cc77c99-56ee-4587-a0e5-c5d665992e5d', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI21161 has been placed\"}', NULL, '2021-06-27 17:07:42', '2021-06-27 17:07:42'),
('5d5b0a4e-a34d-4fa0-a788-88104f255236', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN16422 has been confirmed successfully\"}', '2020-12-06 17:32:43', '2020-12-06 12:05:57', '2020-12-06 17:32:43'),
('61407b4d-7d42-4d8d-a7b0-58431123d883', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN12530 has been placed successfully\"}', '2021-04-15 08:28:28', '2021-04-15 06:53:30', '2021-04-15 08:28:28'),
('6170960f-c99f-456f-b920-61ab3e038ed6', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI17127 has been placed successfully\"}', '2021-05-21 15:35:33', '2021-05-21 15:34:13', '2021-05-21 15:35:33'),
('61ed38e3-e875-4bfe-9d87-055095347fe4', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI11750 has been placed successfully\"}', '2021-05-22 18:17:29', '2021-05-22 07:17:14', '2021-05-22 18:17:29'),
('6208836d-c995-4405-967e-7c621a832256', 'App\\Notifications\\UserNotification', 'App\\User', 24, '{\"message\":\"Your order #EJHULI10630 has been delivered successfully\"}', NULL, '2021-05-25 08:26:10', '2021-05-25 08:26:10'),
('634c8817-1e1b-474b-aafd-465b9c740aba', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI18827 has been placed\"}', NULL, '2021-07-11 16:08:07', '2021-07-11 16:08:07'),
('66a30fa7-dcb0-4aa5-8a14-21ae7a273abe', 'App\\Notifications\\UserNotification', 'App\\User', 24, '{\"message\":\"Your order #EJHULI10630 has been confirmed successfully\"}', NULL, '2021-05-25 08:24:41', '2021-05-25 08:24:41'),
('6826a48c-e52e-43fb-b878-88328d3cb52d', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN29991 has been placed successfully\"}', NULL, '2021-04-22 17:11:46', '2021-04-22 17:11:46'),
('68a6e6f0-d691-4d0e-9b18-0f31f3ea008e', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI15730 has been placed\"}', NULL, '2021-06-27 13:48:50', '2021-06-27 13:48:50'),
('6c98658d-a1d4-4fc1-bfeb-d6aa816b48e2', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI12662 has been placed\"}', NULL, '2021-07-11 13:39:32', '2021-07-11 13:39:32'),
('6cae2494-9053-4919-a72d-5728238f587c', 'App\\Notifications\\UserNotification', 'App\\User', 19, '{\"message\":\"Your order #SHOPZEN16744 has been placed successfully\"}', '2021-04-09 04:17:23', '2021-04-09 04:16:55', '2021-04-09 04:17:23'),
('723f4515-a9c8-418e-9d16-1de82feefd92', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN70744 has been confirmed successfully\"}', '2020-12-06 16:00:29', '2020-12-06 12:20:12', '2020-12-06 16:00:29'),
('727851d7-eca4-47e8-9066-a56acbfba7e3', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN18340 has been placed successfully\"}', '2021-05-04 19:35:00', '2021-05-02 09:16:44', '2021-05-04 19:35:00'),
('72debbb7-3cdf-4c80-b2a8-b8423097855b', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN17757 has been placed successfully\"}', '2020-12-26 19:04:12', '2020-12-26 18:57:08', '2020-12-26 19:04:12'),
('7442b763-3ad9-4581-abb3-8b4f3d2df97a', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"wallet request confirmed successfully\"}', NULL, '2021-05-02 14:12:36', '2021-05-02 14:12:36'),
('767fcd6d-92d2-4c8e-923d-898c783cfd48', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI64173 has been placed successfully\"}', '2021-05-21 15:43:44', '2021-05-21 15:40:43', '2021-05-21 15:43:44'),
('76b1bc77-49e4-4793-b53d-9921d9d0fe27', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI62607 has been delivered\"}', '2021-05-28 17:32:32', '2021-05-28 16:24:03', '2021-05-28 17:32:32'),
('788d271c-0b53-4541-8880-7f0bb8ea28ca', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN15321 has been placed successfully\"}', '2020-12-17 07:42:42', '2020-12-13 15:39:00', '2020-12-17 07:42:42'),
('7bfa9018-127d-4c86-8555-d043b75bb28d', 'App\\Notifications\\UserNotification', 'App\\User', 23, '{\"message\":\"Your order #SHOPZEN24660 has been delivered successfully\"}', '2021-04-23 14:34:18', '2021-04-23 14:29:53', '2021-04-23 14:34:18'),
('7d64a3d0-2a58-4a46-abc9-37c10ccfea36', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN20447 has been placed successfully\"}', '2021-04-15 08:33:38', '2021-04-15 08:33:28', '2021-04-15 08:33:38'),
('7eb7ea63-a12a-4114-989b-074ddd2bdde9', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI14404 has been placed successfully\"}', '2021-05-22 18:17:29', '2021-05-22 07:28:26', '2021-05-22 18:17:29'),
('8066ba5a-dded-47f1-ba6a-fac93318c1ad', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN66945 has been confirmed successfully\"}', '2021-04-03 16:03:22', '2021-02-10 17:02:17', '2021-04-03 16:03:22'),
('812573a8-0018-43b2-8ce3-ad25deb8098e', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI21679 has been placed\"}', NULL, '2021-06-27 18:28:36', '2021-06-27 18:28:36'),
('8198864e-a516-45fb-b203-dbc0179ef45b', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN12530 has been delivered successfully\"}', '2021-04-15 08:28:28', '2021-04-15 07:31:05', '2021-04-15 08:28:28'),
('836ca2a2-3054-4576-8e0e-08277b5bf251', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI20141 has been placed\"}', NULL, '2021-06-27 18:00:32', '2021-06-27 18:00:32'),
('84e4c865-8773-4996-a821-2f445c33d154', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI17520 has been placed successfully\"}', '2021-05-21 15:17:35', '2021-05-21 06:17:41', '2021-05-21 15:17:35'),
('86ca67a4-8d17-46b1-be0f-8e98a097b9a5', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN70744 has been confirmed successfully\"}', '2020-12-06 16:00:29', '2020-12-06 12:19:43', '2020-12-06 16:00:29'),
('8a4310b8-3fff-4eb4-af43-8a56e96e462f', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI18005 has been placed successfully\"}', '2021-05-21 16:38:26', '2021-05-21 16:35:05', '2021-05-21 16:38:26'),
('8efa06f2-baca-461b-89af-edc48163c1bf', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI63330 has been placed successfully\"}', '2021-05-21 16:38:26', '2021-05-21 16:18:39', '2021-05-21 16:38:26'),
('8f296433-afaa-4124-a47d-435435a16b09', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI17127 has been confirmed successfully\"}', '2021-05-21 15:39:24', '2021-05-21 15:35:47', '2021-05-21 15:39:24'),
('901f9e50-bde8-4c9a-a89c-23559d483a98', 'App\\Notifications\\UserNotification', 'App\\User', 17, '{\"message\":\"Your order #SHOPZEN10010 has been placed successfully\"}', '2021-03-28 14:59:28', '2021-03-28 14:56:59', '2021-03-28 14:59:28'),
('912a8cab-2970-4961-b755-b13f956784fd', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI39301 has been placed\"}', NULL, '2021-06-28 13:03:37', '2021-06-28 13:03:37'),
('9145dfdd-a046-4651-9c5f-91ce5db10a23', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI62607 has been confirmed\"}', '2021-05-28 17:32:32', '2021-05-28 16:23:52', '2021-05-28 17:32:32'),
('921c6099-8007-4892-aecb-a92f0db72f4b', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN20166 has been placed successfully\"}', '2021-04-03 16:03:17', '2020-12-31 15:38:17', '2021-04-03 16:03:17'),
('9447cfd3-0d85-4b23-8170-ed213f28653d', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI40340 has been placed\"}', NULL, '2021-06-27 16:35:45', '2021-06-27 16:35:45'),
('956785f0-d51a-409c-b719-b7582b595d9d', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN70744 has been placed successfully\"}', '2020-12-06 16:00:29', '2020-12-06 12:14:18', '2020-12-06 16:00:29'),
('9d2e21e3-3e81-41c5-87ec-f1da5f06a786', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN18340 has been confirmed successfully\"}', '2021-05-04 19:35:00', '2021-05-02 09:17:47', '2021-05-04 19:35:00'),
('a1a5430d-1143-4182-83c7-1c96be520032', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN70744 has been delivered successfully\"}', '2020-12-06 16:00:29', '2020-12-06 12:20:51', '2020-12-06 16:00:29'),
('a1a92b73-e0ac-473d-b428-0498739e6ba4', 'App\\Notifications\\UserNotification', 'App\\User', 17, '{\"message\":\"Your order #SHOPZEN10666 has been placed successfully\"}', NULL, '2021-03-28 15:03:55', '2021-03-28 15:03:55'),
('a343851d-baeb-48c8-ad0e-195010cc5d7f', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN17447 has been placed successfully\"}', '2021-04-02 06:35:49', '2021-03-14 04:21:45', '2021-04-02 06:35:49'),
('a355db7e-8c90-4608-a7a3-66ae1de89d96', 'App\\Notifications\\UserNotification', 'App\\User', 24, '{\"message\":\"Your order #EJHULI10630 has been placed successfully\"}', NULL, '2021-05-25 08:23:59', '2021-05-25 08:23:59'),
('a4a66622-e9cc-4443-95ba-3ba0069dfd81', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI10051 has been placed\"}', NULL, '2021-06-27 16:44:18', '2021-06-27 16:44:18'),
('aa310d85-7b8e-4ebe-aec8-77876ff709a5', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN12530 has been confirmed successfully\"}', '2021-04-15 08:28:28', '2021-04-15 07:30:10', '2021-04-15 08:28:28'),
('aa381f5d-abbd-4e36-bcae-b60927e7e1fc', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI17492 has been placed\"}', NULL, '2021-07-11 20:45:42', '2021-07-11 20:45:42'),
('aa507a52-0938-4eb0-8b78-1116ccc1efe7', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI63330 has been confirmed successfully\"}', '2021-05-21 16:38:26', '2021-05-21 16:19:18', '2021-05-21 16:38:26'),
('ad0675a6-009e-49ea-8b1d-d1b1f6fdb8df', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN10450 has been placed successfully\"}', '2021-04-15 08:33:38', '2021-04-15 08:32:02', '2021-04-15 08:33:38'),
('ad570d41-a6fd-4a93-aa40-59dc66afa1a1', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN13876 has been placed successfully\"}', '2020-12-06 12:04:46', '2020-12-06 12:04:04', '2020-12-06 12:04:46'),
('b1f451ea-29ff-4ab1-ba17-480298d098c3', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI18007 has been placed\"}', '2021-05-28 17:32:32', '2021-05-28 16:19:31', '2021-05-28 17:32:32'),
('b3afee25-0f06-4f81-a07c-f81c9c8b05df', 'App\\Notifications\\UserNotification', 'App\\User', 23, '{\"message\":\"Your add money request has been sent\"}', '2021-04-23 14:35:30', '2021-04-23 14:32:21', '2021-04-23 14:35:30'),
('b431dc61-a09b-4f72-ba8e-83a0e84a51b2', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI35554 has been placed\"}', NULL, '2021-06-27 18:20:25', '2021-06-27 18:20:25'),
('b6a17e2f-2309-4906-8441-4182cc11b933', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN63108 has been placed successfully\"}', '2021-04-03 16:03:17', '2020-12-27 16:39:36', '2021-04-03 16:03:17'),
('b6aefe1c-c620-4a10-b885-3075e9d0c020', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI16384 has been placed\"}', '2021-06-24 08:24:14', '2021-06-24 08:07:22', '2021-06-24 08:24:14'),
('b899b2cb-0c81-49c8-87fb-ec8b4baa2dc2', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN16422 has been placed successfully\"}', '2020-12-06 12:13:53', '2020-12-06 12:03:42', '2020-12-06 12:13:53'),
('b8dded4b-443b-4a13-945b-c101edf7f325', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI20556 has been placed\"}', NULL, '2021-06-27 18:15:16', '2021-06-27 18:15:16'),
('bbb817ce-084c-408c-9c41-df87d6a0a642', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI10432 has been placed\"}', NULL, '2021-06-27 13:46:03', '2021-06-27 13:46:03'),
('c18ae7f8-541b-4c6d-9ede-d2cf691c9a99', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN16100 has been confirmed successfully\"}', '2020-12-10 17:01:49', '2020-12-10 16:53:01', '2020-12-10 17:01:49'),
('c5b24e61-4cdd-412d-afc9-fcc8de6171b1', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN99839 has been confirmed successfully\"}', '2021-04-10 03:44:10', '2021-04-03 16:04:06', '2021-04-10 03:44:10'),
('c6310701-7905-4e23-9f84-2ac0b611630b', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #EJHULI12724 has been placed\"}', '2021-06-22 08:33:19', '2021-05-29 08:21:57', '2021-06-22 08:33:19'),
('cc286079-8d7b-4be0-bd3f-d3c247965005', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN99839 has been placed successfully\"}', '2021-04-15 08:28:28', '2021-04-03 15:59:07', '2021-04-15 08:28:28'),
('cd8a7d76-7002-464a-91f0-683cfbd7c545', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI18007 has been canceled\"}', '2021-05-28 17:32:32', '2021-05-28 16:24:17', '2021-05-28 17:32:32'),
('cda925af-68d4-4665-a50a-9df64aad7f35', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN95217 has been placed successfully\"}', '2021-04-24 04:09:56', '2021-04-24 04:01:03', '2021-04-24 04:09:56'),
('d0849261-3f2a-4c54-ba02-4e992a13efe7', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI10093 has been placed successfully\"}', '2021-05-25 07:51:29', '2021-05-25 04:19:21', '2021-05-25 07:51:29'),
('d0f2bd3f-0f96-4c84-8212-9c6477c51300', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI66496 has been placed\"}', NULL, '2021-06-27 18:27:00', '2021-06-27 18:27:00'),
('d113a307-0ed7-4a6e-adab-8d2915c3bd37', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your add money request has been sent\"}', NULL, '2021-05-02 14:12:10', '2021-05-02 14:12:10'),
('d13b12ea-279d-4658-9801-50ebef385cfa', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI89957 has been placed\"}', '2021-05-28 17:32:32', '2021-05-28 15:06:09', '2021-05-28 17:32:32'),
('d1475a6d-02b9-4e5d-bac3-c3021451971d', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN95217 has been confirmed successfully\"}', '2021-04-24 04:09:51', '2021-04-24 04:09:25', '2021-04-24 04:09:51'),
('d1d8667b-67b9-4918-8916-1fd01ba9775a', 'App\\Notifications\\UserNotification', 'App\\User', 23, '{\"message\":\"wallet request confirmed successfully\"}', '2021-04-23 14:33:20', '2021-04-23 14:33:09', '2021-04-23 14:33:20'),
('d48f56d1-89b2-4464-989e-b1c5156a70d3', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN20280 has been placed successfully\"}', '2020-12-10 16:09:04', '2020-12-10 16:07:45', '2020-12-10 16:09:04'),
('d58789c4-012b-4a6a-8d8d-7ef5d24d7025', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI17216 has been placed\"}', NULL, '2021-07-11 13:52:30', '2021-07-11 13:52:30'),
('d6003b32-fe08-451b-9a4d-6aa1527dcc71', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI31645 has been placed successfully\"}', '2021-05-24 06:37:49', '2021-05-23 17:37:13', '2021-05-24 06:37:49'),
('d915534a-5ac2-46c0-affc-1ad1ade18869', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN54383 has been placed successfully\"}', '2021-04-02 06:36:56', '2021-04-02 06:36:31', '2021-04-02 06:36:56'),
('de3e4889-c9bd-4444-91bd-b188202e7c6d', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI17956 has been placed successfully\"}', '2021-05-21 15:43:44', '2021-05-21 15:39:52', '2021-05-21 15:43:44'),
('dfb42b29-a4d5-4340-980f-cec04b609afd', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN66945 has been placed successfully\"}', '2021-04-03 16:03:23', '2021-01-27 19:03:22', '2021-04-03 16:03:23'),
('e0122ad9-afb1-4907-b466-05d093da2e26', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI16384 has been confirmed\"}', '2021-06-24 08:24:14', '2021-06-24 08:08:08', '2021-06-24 08:24:14'),
('e04c37ee-fea6-4b3d-9854-19f153c4f61a', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN18340 has been delivered successfully\"}', '2021-05-04 19:35:00', '2021-05-02 09:18:10', '2021-05-04 19:35:00'),
('e3d2a3a7-ab9d-4265-a7fe-392477de416d', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI25748 has been placed\"}', NULL, '2021-06-27 17:15:22', '2021-06-27 17:15:22'),
('e6644d82-c947-4640-8f47-40fdfb218dc3', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #EJHULI15327 has been placed successfully\"}', NULL, '2021-05-25 03:37:11', '2021-05-25 03:37:11'),
('e772e3c8-a1ce-4902-8c70-94d0db50b2ad', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI71048 has been placed successfully\"}', '2021-05-21 16:05:23', '2021-05-21 15:48:54', '2021-05-21 16:05:23'),
('e88ab522-ef51-4e01-94ae-3350bba587a9', 'App\\Notifications\\UserNotification', 'App\\User', 31, '{\"message\":\"Your order #EJHULI10613 has been placed\"}', NULL, '2021-06-25 10:52:43', '2021-06-25 10:52:43'),
('ec7898dd-9d6b-4b1d-b18d-bc11e051c92a', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI13227 has been placed\"}', '2021-05-28 17:32:32', '2021-05-28 16:14:02', '2021-05-28 17:32:32'),
('ee51e23e-e712-465c-b4f6-9fb3c9194b07', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI62607 has been placed\"}', '2021-05-28 17:32:32', '2021-05-28 16:23:08', '2021-05-28 17:32:32'),
('f15f73e1-b84a-4631-af05-ed6b905f5db1', 'App\\Notifications\\UserNotification', 'App\\User', 33, '{\"message\":\"Your order #EJHULI96228 has been placed\"}', NULL, '2021-06-27 18:12:55', '2021-06-27 18:12:55'),
('f1d5c939-9087-41dc-b387-f950dc064307', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #EJHULI63330 has been delivered successfully\"}', '2021-05-21 16:38:26', '2021-05-21 16:19:46', '2021-05-21 16:38:26'),
('f3cd7da2-6786-49c8-8e14-403002e0ec47', 'App\\Notifications\\UserNotification', 'App\\User', 29, '{\"message\":\"Your order #EJHULI21321 has been placed\"}', '2021-06-24 08:24:14', '2021-06-23 12:13:52', '2021-06-24 08:24:14'),
('f6bb3270-cee9-44b8-9203-2ecc1626fa84', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN78332 has been confirmed successfully\"}', '2021-04-03 16:03:24', '2021-01-03 12:35:58', '2021-04-03 16:03:24'),
('f9c974d7-482f-44e6-a5ad-2f0297e805a9', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN19094 has been confirmed successfully\"}', '2021-04-15 08:28:28', '2021-02-10 17:03:15', '2021-04-15 08:28:28'),
('fe9f67d0-d51d-4e97-986a-b15150e0c06c', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN16100 has been placed successfully\"}', '2020-12-10 17:01:52', '2020-12-10 16:51:36', '2020-12-10 17:01:52'),
('ff61f698-3c07-4869-9963-5895132d5b50', 'App\\Notifications\\UserNotification', 'App\\User', 4, '{\"message\":\"Your order #SHOPZEN10844 has been placed successfully\"}', '2021-04-03 16:03:16', '2020-12-21 09:23:00', '2021-04-03 16:03:16'),
('fffb97b7-c1cd-4932-8439-73fce67fd285', 'App\\Notifications\\UserNotification', 'App\\User', 2, '{\"message\":\"Your order #SHOPZEN17874 has been placed successfully\"}', '2021-04-04 17:01:51', '2021-04-04 17:01:30', '2021-04-04 17:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `e_orders`
--

CREATE TABLE `e_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address_id` int(10) UNSIGNED NOT NULL,
  `payment_method` tinyint(3) UNSIGNED NOT NULL COMMENT '0=>spay,1=>Wallet,2=>COD',
  `payment_amount` decimal(8,2) UNSIGNED NOT NULL,
  `delivery_charge` decimal(8,2) DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Pending,2=>Confirmed,3=>Delivered,4=>Canceled',
  `shurjopay_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_orders`
--

INSERT INTO `e_orders` (`id`, `user_id`, `order_no`, `customer_address_id`, `payment_method`, `payment_amount`, `delivery_charge`, `additional_info`, `discounts`, `status`, `shurjopay_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'SHOPZEN19230', 1, 2, '499.00', NULL, NULL, '', 3, NULL, '2020-11-08 02:43:28', '2020-11-18 07:16:26'),
(3, 2, 'SHOPZEN59353', 1, 1, '576.00', NULL, 'sdfghjk', '', 2, NULL, '2020-11-18 09:09:42', '2020-11-18 09:50:22'),
(4, 2, 'SHOPZEN40195', 1, 1, '139.00', NULL, NULL, '', 2, NULL, '2020-11-18 09:19:41', '2020-11-18 09:43:50'),
(5, 2, 'SHOPZEN92313', 1, 2, '12000.00', NULL, NULL, '', 3, NULL, '2020-11-20 10:40:36', '2020-11-20 10:48:06'),
(6, 2, 'SHOPZEN49696', 1, 1, '139.00', NULL, 'dgfdgdfgdg', '', 1, NULL, '2020-11-21 10:46:59', '2020-11-21 10:46:59'),
(7, 2, 'SHOPZEN33769', 1, 1, '139.00', NULL, 'dgfdgdfgdg', '', 1, NULL, '2020-11-21 10:48:01', '2020-11-21 10:48:01'),
(8, 2, 'SHOPZEN14316', 1, 2, '139.00', NULL, 'dgddgdgd', '', 1, NULL, '2020-11-21 10:48:48', '2020-11-21 10:48:48'),
(9, 2, 'SHOPZEN54738', 1, 2, '139.00', NULL, 'dgddgdgd', '', 1, NULL, '2020-11-21 10:52:17', '2020-11-21 10:52:17'),
(10, 2, 'SHOPZEN87509', 1, 2, '139.00', NULL, 'dgddgdgd', '', 1, NULL, '2020-11-21 10:54:17', '2020-11-21 10:54:17'),
(11, 2, 'SHOPZEN20168', 1, 1, '139.00', NULL, NULL, '', 1, NULL, '2020-11-21 10:54:51', '2020-11-21 10:54:51'),
(12, 2, 'SHOPZEN17539', 1, 2, '663.00', NULL, 'dfgdggdg', '', 1, NULL, '2020-11-21 10:55:32', '2020-11-21 10:55:32'),
(13, 2, 'SHOPZEN63825', 1, 1, '663.00', NULL, NULL, '', 1, NULL, '2020-11-21 11:00:31', '2020-11-21 11:00:31'),
(14, 2, 'SHOPZEN66179', 1, 1, '663.00', NULL, NULL, '', 1, NULL, '2020-11-21 11:03:20', '2020-11-21 11:03:20'),
(15, 2, 'SHOPZEN17131', 1, 1, '663.00', NULL, NULL, '', 1, NULL, '2020-11-21 11:05:07', '2020-11-21 11:05:07'),
(16, 2, 'SHOPZEN11877', 1, 1, '663.00', NULL, NULL, '', 1, NULL, '2020-11-21 11:06:25', '2020-11-21 11:06:25'),
(17, 2, 'SHOPZEN18957', 1, 1, '663.00', NULL, NULL, '', 1, NULL, '2020-11-21 11:08:23', '2020-11-21 11:08:23'),
(18, 2, 'SHOPZEN14928', 1, 2, '663.00', NULL, NULL, '', 3, NULL, '2020-11-21 11:09:38', '2020-11-21 11:10:35'),
(19, 2, 'SHOPZEN15899', 1, 1, '149.00', NULL, 'fgdgfdgfg', '', 1, NULL, '2020-11-21 11:18:46', '2020-11-21 11:18:46'),
(20, 2, 'SHOPZEN23821', 1, 1, '499.00', NULL, 'fgdgdg', '', 1, NULL, '2020-11-21 22:42:44', '2020-11-21 22:42:44'),
(21, 2, 'SHOPZEN43951', 1, 1, '149.00', NULL, NULL, '', 2, NULL, '2020-11-22 05:43:59', '2020-11-23 02:12:41'),
(22, 2, 'SHOPZEN18000', 1, 2, '524.00', NULL, NULL, '', 2, NULL, '2020-11-22 06:08:49', '2020-11-22 06:41:47'),
(23, 2, 'SHOPZEN18814', 1, 2, '139.00', NULL, 'something', '', 3, NULL, '2020-11-22 06:16:53', '2020-11-22 06:17:50'),
(24, 2, 'SHOPZEN17136', 1, 2, '180.00', NULL, NULL, '', 3, NULL, '2020-11-22 06:33:05', '2020-11-22 06:33:54'),
(25, 2, 'SHOPZEN20777', 1, 2, '400.00', NULL, 'I need more !', '', 3, NULL, '2020-11-23 01:29:16', '2020-11-23 01:36:58'),
(26, 2, 'SHOPZEN16153', 1, 1, '150.00', NULL, NULL, '', 1, NULL, '2020-11-23 02:22:50', '2020-11-23 02:22:50'),
(27, 2, 'SHOPZEN11945', 1, 1, '134.10', NULL, NULL, 'ZARIF', 3, NULL, '2020-11-23 02:26:07', '2020-11-23 02:28:17'),
(28, 2, 'SHOPZEN20478', 1, 1, '139.00', NULL, NULL, '', 3, NULL, '2020-11-23 04:35:07', '2020-12-03 12:57:26'),
(29, 2, 'SHOPZEN11194', 1, 2, '40.50', NULL, NULL, 'ZARIF', 3, NULL, '2020-11-23 04:57:42', '2020-11-23 05:00:07'),
(30, 2, 'SHOPZEN76691', 1, 1, '45.00', NULL, NULL, '', 3, NULL, '2020-11-23 05:01:13', '2020-11-23 05:01:46'),
(31, 2, 'SHOPZEN39503', 1, 1, '150.00', NULL, NULL, 'KAKON', 3, NULL, '2020-11-23 07:52:47', '2020-11-23 07:53:49'),
(32, 4, 'SHOPZEN82148', 2, 2, '45.00', NULL, 'dgdfgfdg', '', 2, NULL, '2020-12-03 13:04:39', '2020-12-03 13:05:19'),
(33, 4, 'SHOPZEN43148', 2, 2, '150.00', NULL, NULL, '', 1, NULL, '2020-12-03 13:06:29', '2020-12-03 13:06:29'),
(34, 2, 'SHOPZEN97729', 1, 2, '190.00', NULL, NULL, '', 1, NULL, '2020-12-04 02:37:26', '2020-12-04 02:37:26'),
(35, 2, 'SHOPZEN16077', 1, 1, '589.00', NULL, NULL, '', 1, NULL, '2020-12-04 04:43:18', '2020-12-04 04:43:18'),
(36, 2, 'SHOPZEN13946', 1, 1, '589.00', NULL, NULL, '', 1, NULL, '2020-12-04 04:43:29', '2020-12-04 04:43:29'),
(37, 2, 'SHOPZEN79852', 1, 1, '589.00', NULL, NULL, '', 1, NULL, '2020-12-04 04:43:41', '2020-12-04 04:43:41'),
(38, 2, 'SHOPZEN17925', 1, 2, '45.00', NULL, 'dfdgdggvghf', '', 1, NULL, '2020-12-04 09:55:22', '2020-12-04 09:55:22'),
(39, 2, 'SHOPZEN18366', 1, 2, '45.00', NULL, NULL, '', 1, NULL, '2020-12-04 09:58:25', '2020-12-04 09:58:25'),
(40, 2, 'SHOPZEN96419', 1, 2, '45.00', NULL, NULL, '', 1, NULL, '2020-12-04 10:00:41', '2020-12-04 10:00:41'),
(41, 2, 'SHOPZEN16076', 1, 2, '45.00', NULL, NULL, '', 1, NULL, '2020-12-04 10:01:09', '2020-12-04 10:01:09'),
(42, 2, 'SHOPZEN55873', 1, 2, '45.00', NULL, NULL, '', 1, NULL, '2020-12-04 10:03:33', '2020-12-04 10:03:33'),
(43, 4, 'SHOPZEN98607', 2, 2, '146.02', NULL, NULL, 'TEST10', 1, NULL, '2020-12-04 19:44:11', '2020-12-04 19:44:11'),
(44, 2, 'SHOPZEN38847', 1, 1, '180.50', NULL, NULL, 'EID', 3, NULL, '2020-12-04 20:27:48', '2020-12-05 11:39:16'),
(45, 2, 'SHOPZEN66645', 1, 1, '6150.00', NULL, NULL, '', 2, NULL, '2020-12-05 11:43:40', '2020-12-06 12:23:21'),
(48, 4, 'SHOPZEN16422', 2, 1, '190.00', NULL, NULL, '', 2, NULL, '2020-12-06 12:03:42', '2020-12-06 12:05:57'),
(49, 4, 'SHOPZEN13876', 2, 2, '190.00', NULL, NULL, '', 2, NULL, '2020-12-06 12:04:04', '2020-12-06 12:07:17'),
(50, 2, 'SHOPZEN70744', 1, 1, '45.00', NULL, NULL, '', 3, NULL, '2020-12-06 12:14:18', '2020-12-06 12:20:51'),
(51, 2, 'SHOPZEN13564', 1, 2, '5700.00', NULL, NULL, 'EID', 1, NULL, '2020-12-06 16:01:30', '2020-12-06 16:01:30'),
(52, 4, 'SHOPZEN12730', 2, 2, '95.00', NULL, NULL, '', 1, NULL, '2020-12-10 16:06:06', '2020-12-10 16:06:06'),
(53, 4, 'SHOPZEN57138', 2, 2, '95.00', NULL, NULL, '', 1, NULL, '2020-12-10 16:07:14', '2020-12-10 16:07:14'),
(54, 4, 'SHOPZEN20280', 2, 2, '95.00', NULL, NULL, '', 1, NULL, '2020-12-10 16:07:45', '2020-12-10 16:07:45'),
(55, 2, 'SHOPZEN15774', 1, 1, '979.00', NULL, NULL, '', 1, NULL, '2020-12-10 16:29:05', '2020-12-10 16:29:05'),
(56, 4, 'SHOPZEN78332', 2, 2, '335.00', NULL, NULL, '', 2, NULL, '2020-12-10 16:50:23', '2021-01-03 12:35:58'),
(57, 4, 'SHOPZEN16100', 2, 2, '335.00', NULL, NULL, '', 2, NULL, '2020-12-10 16:51:36', '2020-12-10 16:53:01'),
(58, 2, 'SHOPZEN15321', 1, 1, '200.00', NULL, NULL, '', 1, NULL, '2020-12-13 15:38:58', '2020-12-13 15:38:58'),
(59, 4, 'SHOPZEN10844', 2, 2, '6010.00', NULL, NULL, '', 1, NULL, '2020-12-21 09:22:59', '2020-12-21 09:22:59'),
(60, 2, 'SHOPZEN17757', 1, 2, '509.00', NULL, NULL, '', 1, NULL, '2020-12-26 18:57:06', '2020-12-26 18:57:06'),
(61, 4, 'SHOPZEN63108', 2, 2, '6010.00', NULL, NULL, '', 1, NULL, '2020-12-27 16:39:35', '2020-12-27 16:39:35'),
(62, 4, 'SHOPZEN20166', 2, 2, '55.00', NULL, NULL, '', 1, NULL, '2020-12-31 15:38:17', '2020-12-31 15:38:17'),
(63, 4, 'SHOPZEN19094', 2, 2, '160.00', NULL, 'dsfsfsfs', '', 2, NULL, '2021-01-03 12:22:32', '2021-02-10 17:03:15'),
(64, 4, 'SHOPZEN66945', 2, 2, '149.00', NULL, NULL, '', 3, NULL, '2021-01-27 19:03:21', '2021-02-10 17:02:57'),
(65, 4, 'SHOPZEN19902', 2, 2, '6204.00', '10.00', 'fgbvbb', '', 1, NULL, '2021-03-09 09:04:01', '2021-03-09 09:04:01'),
(66, 2, 'SHOPZEN17447', 1, 2, '189.00', '100.00', NULL, 'ABC', 1, NULL, '2021-03-14 04:21:42', '2021-03-14 04:21:42'),
(67, 17, 'SHOPZEN10010', 3, 2, '95.00', NULL, NULL, 'SOME', 1, NULL, '2021-03-28 14:56:58', '2021-03-28 14:56:58'),
(68, 17, 'SHOPZEN10666', 3, 1, '6000.00', NULL, NULL, '', 1, NULL, '2021-03-28 15:03:55', '2021-03-28 15:03:55'),
(69, 2, 'SHOPZEN54383', 1, 1, '190.00', NULL, NULL, '', 1, NULL, '2021-04-02 06:36:30', '2021-04-02 06:36:30'),
(70, 4, 'SHOPZEN99839', 2, 2, '190.00', NULL, NULL, '', 3, NULL, '2021-04-03 15:59:07', '2021-04-15 08:05:50'),
(71, 2, 'SHOPZEN51288', 1, 1, '180.00', NULL, NULL, '', 1, NULL, '2021-04-04 16:46:28', '2021-04-04 16:46:28'),
(72, 2, 'SHOPZEN17874', 1, 2, '235.00', NULL, NULL, '', 1, NULL, '2021-04-04 17:01:30', '2021-04-04 17:01:30'),
(73, 19, 'SHOPZEN16744', 4, 2, '45.00', NULL, NULL, '', 1, NULL, '2021-04-09 04:16:55', '2021-04-09 04:16:55'),
(74, 4, 'SHOPZEN12530', 2, 1, '313.00', '200.00', NULL, 'DOI', 3, NULL, '2021-04-15 06:53:30', '2021-04-15 07:31:05'),
(75, 4, 'SHOPZEN10450', 2, 1, '230.00', '40.00', NULL, '', 1, NULL, '2021-04-15 08:32:02', '2021-04-15 08:32:02'),
(76, 4, 'SHOPZEN20447', 2, 2, '6040.00', '40.00', NULL, '', 1, NULL, '2021-04-15 08:33:28', '2021-04-15 08:33:28'),
(77, 4, 'SHOPZEN29991', 2, 1, '85.00', '40.00', NULL, '', 1, NULL, '2021-04-22 17:11:46', '2021-04-22 17:11:46'),
(78, 23, 'SHOPZEN24660', 6, 2, '45.00', '40.00', NULL, 'TRYC', 3, NULL, '2021-04-23 13:58:53', '2021-04-23 14:29:53'),
(79, 2, 'SHOPZEN95217', 1, 2, '325.00', NULL, NULL, 'FOOL', 3, NULL, '2021-04-24 04:01:03', '2021-04-24 04:10:10'),
(80, 2, 'SHOPZEN18340', 1, 1, '190.00', NULL, NULL, '', 3, NULL, '2021-05-02 09:16:44', '2021-05-02 09:18:10'),
(81, 2, 'EJHULI17520', 1, 2, '190.00', NULL, NULL, '', 3, NULL, '2021-05-21 06:17:41', '2021-05-21 16:04:27'),
(82, 2, 'EJHULI17127', 1, 1, '399.00', NULL, NULL, '', 3, NULL, '2021-05-21 15:34:13', '2021-05-21 15:36:52'),
(83, 2, 'EJHULI17956', 1, 2, '190.00', NULL, NULL, '', 1, NULL, '2021-05-21 15:39:52', '2021-05-21 15:39:52'),
(84, 2, 'EJHULI64173', 1, 2, '45.00', NULL, NULL, '', 1, NULL, '2021-05-21 15:40:43', '2021-05-21 15:40:43'),
(85, 2, 'EJHULI71048', 1, 1, '150.00', NULL, NULL, '', 1, NULL, '2021-05-21 15:48:54', '2021-05-21 15:48:54'),
(86, 2, 'EJHULI63330', 1, 1, '6190.00', NULL, NULL, '', 3, NULL, '2021-05-21 16:18:39', '2021-05-21 16:19:46'),
(90, 2, 'EJHULI18005', 9, 1, '45.00', NULL, NULL, '', 1, NULL, '2021-05-21 16:35:05', '2021-05-21 16:35:05'),
(91, 2, 'EJHULI11750', 7, 2, '559.00', '200.00', NULL, 'XXX', 1, NULL, '2021-05-22 07:17:14', '2021-05-22 07:17:14'),
(92, 2, 'EJHULI14404', 9, 1, '1720.00', '200.00', NULL, '', 1, NULL, '2021-05-22 07:28:26', '2021-05-22 07:28:26'),
(93, 2, 'EJHULI31645', 9, 1, '245.00', '200.00', NULL, '', 1, NULL, '2021-05-23 17:37:13', '2021-05-23 17:37:13'),
(94, 4, 'EJHULI15327', 2, 1, '1511.00', '200.00', NULL, '', 1, NULL, '2021-05-25 03:37:11', '2021-05-25 03:37:11'),
(95, 2, 'EJHULI10093', 9, 1, '559.00', '200.00', NULL, 'XXX', 1, NULL, '2021-05-25 04:19:21', '2021-05-25 04:19:21'),
(96, 24, 'EJHULI10630', 11, 2, '6350.00', '200.00', NULL, '', 3, NULL, '2021-05-25 08:23:59', '2021-05-25 08:26:10'),
(97, 29, 'EJHULI89957', 13, 2, '390.00', '200.00', NULL, '', 4, NULL, '2021-05-28 15:06:09', '2021-05-28 15:10:52'),
(98, 29, 'EJHULI13227', 13, 2, '69.00', '50.00', NULL, 'ZAA', 1, NULL, '2021-05-28 16:14:01', '2021-05-28 16:14:01'),
(99, 29, 'EJHULI18007', 13, 2, '240.00', '50.00', NULL, '', 4, NULL, '2021-05-28 16:19:31', '2021-05-28 16:24:17'),
(100, 29, 'EJHULI62607', 13, 2, '437.00', '50.00', NULL, 'ZAA', 3, NULL, '2021-05-28 16:23:08', '2021-05-28 16:24:03'),
(101, 4, 'EJHULI12724', 2, 1, '183.00', '50.00', 'gghfghfghf', 'SOME', 1, NULL, '2021-05-29 08:21:57', '2021-05-29 08:21:57'),
(102, 29, 'EJHULI21321', 13, 2, '199.00', '50.00', NULL, '', 1, NULL, '2021-06-23 12:13:52', '2021-06-23 12:13:52'),
(103, 29, 'EJHULI16384', 13, 2, '285.00', '50.00', NULL, '', 2, NULL, '2021-06-24 08:07:22', '2021-06-24 08:08:08'),
(104, 31, 'EJHULI10613', 15, 2, '240.00', '50.00', NULL, '', 1, NULL, '2021-06-25 10:52:42', '2021-06-25 10:52:42'),
(105, 31, 'EJHULI18307', 15, 2, '95.00', '50.00', NULL, '', 1, NULL, '2021-06-26 15:20:33', '2021-06-26 15:20:33'),
(106, 31, 'EJHULI12356', 15, 2, '240.00', '50.00', NULL, '', 1, NULL, '2021-06-27 09:36:00', '2021-06-27 09:36:00'),
(107, 31, 'EJHULI10432', 15, 2, '430.00', '50.00', NULL, '', 1, NULL, '2021-06-27 13:46:03', '2021-06-27 13:46:03'),
(108, 31, 'EJHULI15730', 15, 2, '6050.00', '50.00', NULL, '', 1, NULL, '2021-06-27 13:48:50', '2021-06-27 13:48:50'),
(109, 31, 'EJHULI40340', 15, 2, '350.00', '50.00', NULL, '', 1, NULL, '2021-06-27 16:35:45', '2021-06-27 16:35:45'),
(110, 31, 'EJHULI10051', 15, 2, '6050.00', '50.00', NULL, '', 1, NULL, '2021-06-27 16:44:18', '2021-06-27 16:44:18'),
(111, 31, 'EJHULI11540', 15, 2, '95.00', '50.00', NULL, '', 1, NULL, '2021-06-27 17:02:58', '2021-06-27 17:02:58'),
(112, 31, 'EJHULI15009', 15, 2, '240.00', '50.00', NULL, '', 1, NULL, '2021-06-27 17:06:03', '2021-06-27 17:06:03'),
(113, 31, 'EJHULI21161', 15, 2, '6050.00', '50.00', NULL, '', 1, NULL, '2021-06-27 17:07:42', '2021-06-27 17:07:42'),
(114, 31, 'EJHULI25748', 15, 2, '189.00', '50.00', NULL, '', 1, NULL, '2021-06-27 17:15:22', '2021-06-27 17:15:22'),
(115, 31, 'EJHULI19003', 15, 2, '240.00', '50.00', NULL, '', 1, NULL, '2021-06-27 17:39:56', '2021-06-27 17:39:56'),
(116, 31, 'EJHULI20141', 15, 2, '200.00', '50.00', NULL, '', 1, NULL, '2021-06-27 18:00:32', '2021-06-27 18:00:32'),
(117, 33, 'EJHULI96228', 17, 2, '6240.00', '50.00', NULL, '', 1, NULL, '2021-06-27 18:12:55', '2021-06-27 18:12:55'),
(118, 33, 'EJHULI20556', 17, 2, '6050.00', '50.00', NULL, '', 1, NULL, '2021-06-27 18:15:16', '2021-06-27 18:15:16'),
(119, 33, 'EJHULI35554', 17, 2, '240.00', '50.00', NULL, '', 1, NULL, '2021-06-27 18:20:25', '2021-06-27 18:20:25'),
(120, 33, 'EJHULI20981', 17, 2, '189.00', '50.00', NULL, '', 1, NULL, '2021-06-27 18:23:13', '2021-06-27 18:23:13'),
(121, 33, 'EJHULI43827', 17, 2, '6050.00', '50.00', NULL, '', 1, NULL, '2021-06-27 18:25:19', '2021-06-27 18:25:19'),
(122, 33, 'EJHULI66496', 17, 0, '200.00', '50.00', NULL, '', 1, NULL, '2021-06-27 18:27:00', '2021-06-27 18:27:00'),
(123, 33, 'EJHULI21679', 17, 0, '240.00', '50.00', NULL, '', 1, 240, '2021-06-27 18:28:36', '2021-06-27 18:28:36'),
(124, 33, 'EJHULI18725', 17, 0, '7563.00', '50.00', NULL, '', 1, 23, '2021-06-27 18:33:43', '2021-06-27 18:33:43'),
(125, 33, 'EJHULI65792', 17, 0, '864.00', '50.00', NULL, '', 1, 24, '2021-06-27 18:35:51', '2021-06-27 18:35:51'),
(126, 33, 'EJHULI39301', 17, 0, '449.00', '50.00', NULL, '', 1, 25, '2021-06-28 13:03:35', '2021-06-28 13:03:35'),
(127, 31, 'EJHULI75670', 15, 0, '51.00', '50.00', NULL, '', 1, 26, '2021-07-11 13:10:45', '2021-07-11 13:10:45'),
(128, 31, 'EJHULI10579', 15, 0, '95.00', '50.00', NULL, '', 1, 27, '2021-07-11 13:38:37', '2021-07-11 13:38:37'),
(129, 31, 'EJHULI12662', 15, 0, '200.00', '50.00', NULL, '', 1, 28, '2021-07-11 13:39:32', '2021-07-11 13:39:32'),
(130, 31, 'EJHULI17216', 15, 0, '6350.00', '50.00', NULL, '', 1, 29, '2021-07-11 13:52:30', '2021-07-11 13:52:30'),
(131, 31, 'EJHULI18827', 15, 0, '200.00', '50.00', NULL, '', 1, 30, '2021-07-11 16:08:06', '2021-07-11 16:08:06'),
(132, 31, 'EJHULI31166', 15, 0, '6200.00', '50.00', NULL, '', 1, 31, '2021-07-11 17:45:06', '2021-07-11 17:45:06'),
(133, 31, 'EJHULI31132', 15, 2, '51.00', '50.00', NULL, '', 1, 32, '2021-07-11 20:44:29', '2021-07-11 20:44:29'),
(134, 31, 'EJHULI17492', 15, 0, '95.00', '50.00', NULL, '', 1, 33, '2021-07-11 20:45:42', '2021-07-11 20:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `e_order_processings`
--

CREATE TABLE `e_order_processings` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL COMMENT '1=>Ordered,2=>Confirmed,3=>Delivered',
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_order_processings`
--

INSERT INTO `e_order_processings` (`id`, `order_id`, `status`, `remark`, `processing_date`) VALUES
(1, 2, 1, '', '2020-11-08 08:13:28'),
(2, 2, 2, '', '2020-11-18 12:46:03'),
(3, 2, 3, '', '2020-11-18 12:46:26'),
(4, 3, 1, '', '2020-11-18 14:39:42'),
(5, 4, 1, '', '2020-11-18 14:49:41'),
(6, 4, 2, '', '2020-11-18 15:13:50'),
(7, 3, 2, '', '2020-11-18 15:20:22'),
(8, 5, 1, '', '2020-11-20 16:10:36'),
(9, 5, 2, '', '2020-11-20 16:12:58'),
(10, 5, 3, '', '2020-11-20 16:18:06'),
(11, 6, 1, '', '2020-11-21 16:16:59'),
(12, 7, 1, '', '2020-11-21 16:18:01'),
(13, 8, 1, '', '2020-11-21 16:18:48'),
(14, 9, 1, '', '2020-11-21 16:22:17'),
(15, 10, 1, '', '2020-11-21 16:24:17'),
(16, 11, 1, '', '2020-11-21 16:24:51'),
(17, 12, 1, '', '2020-11-21 16:25:32'),
(18, 13, 1, '', '2020-11-21 16:30:31'),
(19, 14, 1, '', '2020-11-21 16:33:20'),
(20, 15, 1, '', '2020-11-21 16:35:07'),
(21, 16, 1, '', '2020-11-21 16:36:25'),
(22, 17, 1, '', '2020-11-21 16:38:23'),
(23, 18, 1, '', '2020-11-21 16:39:38'),
(24, 18, 2, '', '2020-11-21 16:40:14'),
(25, 18, 3, '', '2020-11-21 16:40:35'),
(26, 19, 1, '', '2020-11-21 16:48:46'),
(27, 20, 1, '', '2020-11-22 04:12:44'),
(28, 21, 1, '', '2020-11-22 11:13:59'),
(29, 22, 1, '', '2020-11-22 11:38:49'),
(30, 23, 1, '', '2020-11-22 11:46:53'),
(31, 23, 2, '', '2020-11-22 11:47:40'),
(32, 23, 3, '', '2020-11-22 11:47:50'),
(33, 24, 1, '', '2020-11-22 12:03:05'),
(34, 24, 2, '', '2020-11-22 12:03:34'),
(35, 24, 3, '', '2020-11-22 12:03:54'),
(36, 22, 2, '', '2020-11-22 12:11:47'),
(37, 25, 1, '', '2020-11-23 06:59:16'),
(38, 25, 2, '', '2020-11-23 07:03:50'),
(39, 25, 3, '', '2020-11-23 07:06:59'),
(40, 21, 2, '', '2020-11-23 07:42:41'),
(41, 26, 1, '', '2020-11-23 07:52:50'),
(42, 27, 1, '', '2020-11-23 07:56:07'),
(43, 27, 2, '', '2020-11-23 07:58:00'),
(44, 27, 3, '', '2020-11-23 07:58:17'),
(45, 28, 1, '', '2020-11-23 10:05:07'),
(46, 28, 2, '', '2020-11-23 10:05:33'),
(47, 29, 1, '', '2020-11-23 10:27:42'),
(48, 29, 2, '', '2020-11-23 10:29:38'),
(49, 29, 3, '', '2020-11-23 10:30:07'),
(50, 30, 1, '', '2020-11-23 10:31:13'),
(51, 30, 2, '', '2020-11-23 10:31:40'),
(52, 30, 3, '', '2020-11-23 10:31:46'),
(53, 31, 1, '', '2020-11-23 13:22:47'),
(54, 31, 2, '', '2020-11-23 13:23:29'),
(55, 31, 3, '', '2020-11-23 13:23:49'),
(56, 28, 3, 'Order confirmed', '2020-12-03 18:27:26'),
(57, 32, 1, 'Order placed', '2020-12-03 18:34:39'),
(58, 32, 2, 'Order is being confirmed', '2020-12-03 18:35:19'),
(59, 33, 1, 'Order placed', '2020-12-03 18:36:29'),
(60, 34, 1, 'Order placed', '2020-12-04 08:07:26'),
(61, 35, 1, 'Order placed', '2020-12-04 10:13:18'),
(62, 36, 1, 'Order placed', '2020-12-04 10:13:29'),
(63, 37, 1, 'Order placed', '2020-12-04 10:13:41'),
(64, 38, 1, 'Order placed', '2020-12-04 15:25:22'),
(65, 39, 1, 'Order placed', '2020-12-04 15:28:25'),
(66, 40, 1, 'Order placed', '2020-12-04 15:30:41'),
(67, 41, 1, 'Order placed', '2020-12-04 15:31:09'),
(68, 42, 1, 'Order placed', '2020-12-04 15:33:33'),
(69, 43, 1, 'Order placed', '2020-12-05 01:14:11'),
(70, 44, 1, 'Order placed', '2020-12-05 01:57:48'),
(71, 44, 2, 'It\'s okay!', '2020-12-05 17:08:31'),
(72, 44, 3, 'Delivered', '2020-12-05 17:09:16'),
(73, 45, 1, 'Order placed', '2020-12-05 17:13:40'),
(76, 48, 1, 'Order placed', '2020-12-06 17:33:42'),
(77, 49, 1, 'Order placed', '2020-12-06 17:34:04'),
(78, 48, 2, 'Order is being confirmed', '2020-12-06 17:35:44'),
(79, 48, 2, 'Order is being confirmed', '2020-12-06 17:35:57'),
(80, 49, 2, 'Order is being confirmed', '2020-12-06 17:37:17'),
(81, 50, 1, 'Order placed', '2020-12-06 17:44:18'),
(82, 50, 2, 'Order is being confirmed', '2020-12-06 17:49:43'),
(83, 50, 2, 'Order is being confirmed', '2020-12-06 17:50:12'),
(84, 50, 3, 'Order is being delivered', '2020-12-06 17:50:51'),
(85, 45, 2, 'Order is being confirmed', '2020-12-06 17:53:21'),
(86, 51, 1, 'Order placed', '2020-12-06 21:31:30'),
(87, 52, 1, 'Order placed', '2020-12-10 21:36:06'),
(88, 53, 1, 'Order placed', '2020-12-10 21:37:14'),
(89, 54, 1, 'Order placed', '2020-12-10 21:37:45'),
(90, 55, 1, 'Order placed', '2020-12-10 21:59:05'),
(91, 56, 1, 'Order placed', '2020-12-10 22:20:23'),
(92, 57, 1, 'Order placed', '2020-12-10 22:21:36'),
(93, 57, 2, 'Order is being confirmed', '2020-12-10 22:23:01'),
(94, 58, 1, 'Order placed', '2020-12-13 21:08:58'),
(95, 59, 1, 'Order placed', '2020-12-21 14:52:59'),
(96, 60, 1, 'Order placed', '2020-12-27 00:27:06'),
(97, 61, 1, 'Order placed', '2020-12-27 22:09:35'),
(98, 62, 1, 'Order placed', '2020-12-31 21:08:17'),
(99, 63, 1, 'Order placed', '2021-01-03 17:52:32'),
(100, 56, 2, 'Order is being confirmed', '2021-01-03 18:05:58'),
(101, 64, 1, 'Order placed', '2021-01-28 00:33:21'),
(102, 64, 2, 'Order is being confirmed', '2021-02-10 22:32:16'),
(103, 64, 3, 'Order is being delivered', '2021-02-10 22:32:57'),
(104, 63, 2, 'Order is being confirmed', '2021-02-10 22:33:15'),
(105, 65, 1, 'Order placed', '2021-03-09 14:34:01'),
(106, 66, 1, 'Order placed', '2021-03-14 09:51:42'),
(107, 67, 1, 'Order placed', '2021-03-28 20:26:58'),
(108, 68, 1, 'Order placed', '2021-03-28 20:33:55'),
(109, 69, 1, 'Order placed', '2021-04-02 12:06:30'),
(110, 70, 1, 'Order placed', '2021-04-03 23:59:07'),
(111, 70, 2, 'Order is being confirmed', '2021-04-04 00:04:06'),
(112, 71, 1, 'Order placed', '2021-04-05 00:46:28'),
(113, 72, 1, 'Order placed', '2021-04-05 01:01:30'),
(114, 73, 1, 'Order placed', '2021-04-09 12:16:55'),
(115, 74, 1, 'Order placed', '2021-04-15 14:53:30'),
(116, 74, 2, 'Order is being confirmed', '2021-04-15 15:30:10'),
(117, 74, 3, 'Order is being delivered. XYXkhgorhgkhkl', '2021-04-15 15:31:05'),
(118, 70, 3, 'Order is being delivered', '2021-04-15 16:05:50'),
(119, 75, 1, 'Order placed', '2021-04-15 16:32:02'),
(120, 76, 1, 'Order placed', '2021-04-15 16:33:28'),
(121, 77, 1, 'Order placed', '2021-04-23 01:11:46'),
(122, 78, 1, 'Order placed', '2021-04-23 21:58:53'),
(123, 78, 2, 'Order is being confirmed', '2021-04-23 22:29:46'),
(124, 78, 3, 'Order is being delivered', '2021-04-23 22:29:53'),
(125, 79, 1, 'Order placed', '2021-04-24 12:01:03'),
(126, 79, 2, 'Order is being confirmed', '2021-04-24 12:09:25'),
(127, 79, 3, 'Order is being delivered -XYZZ', '2021-04-24 12:10:10'),
(128, 80, 1, 'Order placed', '2021-05-02 17:16:44'),
(129, 80, 2, 'Order is being confirmed', '2021-05-02 17:17:47'),
(130, 80, 3, 'Order is being delivered', '2021-05-02 17:18:10'),
(131, 81, 1, 'Order placed', '2021-05-21 14:17:41'),
(132, 82, 1, 'Order placed', '2021-05-21 23:34:13'),
(133, 82, 2, 'Order is being confirmed', '2021-05-21 23:35:47'),
(134, 82, 3, 'Order is being delivered', '2021-05-21 23:36:52'),
(135, 83, 1, 'Order placed', '2021-05-21 23:39:52'),
(136, 84, 1, 'Order placed', '2021-05-21 23:40:43'),
(137, 85, 1, 'Order placed', '2021-05-21 23:48:54'),
(138, 81, 2, 'Order is being confirmed by Jarif', '2021-05-22 00:03:54'),
(139, 81, 3, 'Order is being delivered.....', '2021-05-22 00:04:27'),
(140, 86, 1, 'Order placed', '2021-05-22 00:18:39'),
(141, 86, 2, 'Order is being confirmed', '2021-05-22 00:19:18'),
(142, 86, 3, 'Order is being delivered', '2021-05-22 00:19:46'),
(143, 90, 1, 'Order placed', '2021-05-22 00:35:05'),
(144, 91, 1, 'Order placed', '2021-05-22 15:17:14'),
(145, 92, 1, 'Order placed', '2021-05-22 15:28:26'),
(146, 93, 1, 'Order placed', '2021-05-24 01:37:13'),
(147, 94, 1, 'Order placed', '2021-05-25 11:37:11'),
(148, 95, 1, 'Order placed', '2021-05-25 12:19:21'),
(149, 96, 1, 'Order placed', '2021-05-25 16:23:59'),
(150, 96, 2, 'Order is being confirmed', '2021-05-25 16:24:41'),
(151, 96, 3, 'Order is being delivered', '2021-05-25 16:26:10'),
(152, 97, 1, 'Order placed', '2021-05-28 23:06:09'),
(153, 97, 4, 'Order has been canceled', '2021-05-28 23:10:52'),
(154, 98, 1, 'Order placed', '2021-05-29 00:14:01'),
(155, 99, 1, 'Order placed', '2021-05-29 00:19:31'),
(156, 100, 1, 'Order placed', '2021-05-29 00:23:08'),
(157, 100, 2, 'Order is being confirmed', '2021-05-29 00:23:52'),
(158, 100, 3, 'Order is being delivered', '2021-05-29 00:24:03'),
(159, 99, 4, 'Order has been canceled', '2021-05-29 00:24:17'),
(160, 101, 1, 'Order placed', '2021-05-29 16:21:57'),
(161, 102, 1, 'Order placed', '2021-06-23 20:13:52'),
(162, 103, 1, 'Order placed', '2021-06-24 16:07:22'),
(163, 103, 2, 'Order is being confirmed, Yes', '2021-06-24 16:08:08'),
(164, 104, 1, 'Order placed', '2021-06-25 16:52:42'),
(165, 105, 1, 'Order placed', '2021-06-26 21:20:33'),
(166, 106, 1, 'Order placed', '2021-06-27 15:36:00'),
(167, 107, 1, 'Order placed', '2021-06-27 19:46:03'),
(168, 108, 1, 'Order placed', '2021-06-27 19:48:50'),
(169, 109, 1, 'Order placed', '2021-06-27 22:35:45'),
(170, 110, 1, 'Order placed', '2021-06-27 22:44:18'),
(171, 111, 1, 'Order placed', '2021-06-27 23:02:58'),
(172, 112, 1, 'Order placed', '2021-06-27 23:06:03'),
(173, 113, 1, 'Order placed', '2021-06-27 23:07:42'),
(174, 114, 1, 'Order placed', '2021-06-27 23:15:22'),
(175, 115, 1, 'Order placed', '2021-06-27 23:39:56'),
(176, 116, 1, 'Order placed', '2021-06-28 00:00:32'),
(177, 117, 1, 'Order placed', '2021-06-28 00:12:55'),
(178, 118, 1, 'Order placed', '2021-06-28 00:15:16'),
(179, 119, 1, 'Order placed', '2021-06-28 00:20:25'),
(180, 120, 1, 'Order placed', '2021-06-28 00:23:13'),
(181, 121, 1, 'Order placed', '2021-06-28 00:25:19'),
(182, 122, 1, 'Order placed', '2021-06-28 00:27:00'),
(183, 123, 1, 'Order placed', '2021-06-28 00:28:36'),
(184, 124, 1, 'Order placed', '2021-06-28 00:33:43'),
(185, 125, 1, 'Order placed', '2021-06-28 00:35:51'),
(186, 126, 1, 'Order placed', '2021-06-28 19:03:35'),
(187, 127, 1, 'Order placed', '2021-07-11 19:10:45'),
(188, 128, 1, 'Order placed', '2021-07-11 19:38:37'),
(189, 129, 1, 'Order placed', '2021-07-11 19:39:32'),
(190, 130, 1, 'Order placed', '2021-07-11 19:52:30'),
(191, 131, 1, 'Order placed', '2021-07-11 22:08:06'),
(192, 132, 1, 'Order placed', '2021-07-11 23:45:06'),
(193, 133, 1, 'Order placed', '2021-07-12 02:44:29'),
(194, 134, 1, 'Order placed', '2021-07-12 02:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `e_order_products`
--

CREATE TABLE `e_order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_order_products`
--

INSERT INTO `e_order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 3, 1, '499.00'),
(2, 2, 3, 1, '499.00'),
(3, 3, 2, 2, '139.00'),
(4, 3, 1, 2, '149.00'),
(5, 4, 2, 1, '139.00'),
(6, 5, 13, 2, '6000.00'),
(7, 6, 2, 1, '139.00'),
(8, 7, 2, 1, '139.00'),
(9, 8, 2, 1, '139.00'),
(10, 9, 2, 1, '139.00'),
(11, 10, 2, 1, '139.00'),
(12, 11, 2, 1, '139.00'),
(13, 12, 2, 1, '139.00'),
(14, 12, 4, 1, '524.00'),
(15, 13, 2, 1, '139.00'),
(16, 13, 4, 1, '524.00'),
(17, 14, 2, 1, '139.00'),
(18, 14, 4, 1, '524.00'),
(19, 15, 2, 1, '139.00'),
(20, 15, 4, 1, '524.00'),
(21, 16, 2, 1, '139.00'),
(22, 16, 4, 1, '524.00'),
(23, 17, 2, 1, '139.00'),
(24, 17, 4, 1, '524.00'),
(25, 18, 2, 1, '139.00'),
(26, 18, 4, 1, '524.00'),
(27, 19, 1, 1, '149.00'),
(28, 20, 3, 1, '499.00'),
(29, 21, 1, 1, '149.00'),
(30, 22, 4, 1, '524.00'),
(31, 23, 2, 1, '139.00'),
(32, 24, 14, 1, '180.00'),
(33, 25, 10, 1, '250.00'),
(34, 25, 7, 1, '150.00'),
(35, 26, 7, 1, '150.00'),
(36, 27, 1, 1, '149.00'),
(37, 28, 2, 1, '139.00'),
(38, 29, 15, 1, '45.00'),
(39, 30, 15, 1, '45.00'),
(40, 31, 8, 2, '150.00'),
(41, 32, 15, 1, '45.00'),
(42, 33, 8, 1, '150.00'),
(43, 34, 16, 1, '190.00'),
(44, 35, 8, 3, '150.00'),
(45, 35, 2, 1, '139.00'),
(46, 36, 8, 3, '150.00'),
(47, 36, 2, 1, '139.00'),
(48, 37, 8, 3, '150.00'),
(49, 37, 2, 1, '139.00'),
(50, 38, 15, 1, '45.00'),
(51, 39, 15, 1, '45.00'),
(52, 40, 15, 1, '45.00'),
(53, 41, 15, 1, '45.00'),
(54, 42, 15, 1, '45.00'),
(55, 43, 1, 1, '149.00'),
(56, 44, 16, 1, '190.00'),
(57, 45, 13, 1, '6000.00'),
(58, 45, 7, 1, '150.00'),
(61, 48, 16, 1, '190.00'),
(62, 49, 16, 1, '190.00'),
(63, 50, 15, 1, '45.00'),
(64, 51, 13, 1, '6000.00'),
(65, 52, 15, 1, '45.00'),
(66, 53, 15, 1, '45.00'),
(67, 54, 15, 1, '45.00'),
(68, 55, 3, 1, '499.00'),
(69, 55, 16, 2, '190.00'),
(70, 56, 16, 1, '190.00'),
(71, 56, 15, 1, '45.00'),
(72, 57, 16, 1, '190.00'),
(73, 57, 15, 1, '45.00'),
(74, 58, 16, 1, '190.00'),
(75, 59, 13, 1, '6000.00'),
(76, 60, 3, 1, '499.00'),
(77, 61, 13, 1, '6000.00'),
(78, 62, 15, 1, '45.00'),
(79, 63, 9, 1, '150.00'),
(80, 64, 2, 1, '139.00'),
(81, 65, 15, 1, '45.00'),
(82, 65, 13, 1, '6000.00'),
(83, 65, 1, 1, '149.00'),
(84, 66, 1, 1, '149.00'),
(85, 67, 16, 1, '190.00'),
(86, 68, 13, 1, '6000.00'),
(87, 69, 16, 1, '190.00'),
(88, 70, 16, 1, '190.00'),
(89, 71, 15, 4, '45.00'),
(90, 72, 16, 1, '190.00'),
(91, 72, 15, 1, '45.00'),
(92, 73, 15, 1, '45.00'),
(93, 74, 15, 5, '45.00'),
(94, 75, 16, 1, '190.00'),
(95, 76, 13, 1, '6000.00'),
(96, 77, 15, 1, '45.00'),
(97, 78, 15, 1, '45.00'),
(98, 79, 7, 1, '150.00'),
(99, 79, 3, 1, '499.00'),
(100, 80, 16, 1, '190.00'),
(101, 81, 16, 1, '190.00'),
(102, 82, 11, 1, '399.00'),
(103, 83, 16, 1, '190.00'),
(104, 84, 15, 1, '45.00'),
(105, 85, 6, 1, '150.00'),
(106, 86, 13, 1, '6000.00'),
(107, 86, 16, 1, '190.00'),
(108, 90, 15, 1, '45.00'),
(109, 91, 12, 1, '300.00'),
(110, 91, 1, 1, '149.00'),
(111, 92, 16, 8, '190.00'),
(112, 93, 15, 1, '45.00'),
(113, 94, 3, 1, '499.00'),
(114, 94, 2, 1, '139.00'),
(115, 94, 1, 1, '149.00'),
(116, 94, 4, 1, '524.00'),
(117, 95, 1, 1, '149.00'),
(118, 95, 12, 1, '300.00'),
(119, 96, 9, 1, '150.00'),
(120, 96, 13, 1, '6000.00'),
(121, 97, 16, 1, '190.00'),
(122, 98, 18, 3, '9.00'),
(123, 99, 16, 1, '190.00'),
(124, 100, 15, 1, '45.00'),
(125, 100, 3, 1, '499.00'),
(126, 100, 18, 1, '9.00'),
(127, 101, 16, 1, '190.00'),
(128, 102, 1, 1, '149.00'),
(129, 103, 15, 1, '45.00'),
(130, 103, 16, 1, '190.00'),
(131, 104, 16, 1, '190.00'),
(132, 105, 15, 1, '45.00'),
(133, 106, 16, 1, '190.00'),
(134, 107, 16, 2, '190.00'),
(135, 108, 13, 1, '6000.00'),
(136, 109, 7, 2, '150.00'),
(137, 110, 13, 1, '6000.00'),
(138, 111, 15, 1, '45.00'),
(139, 112, 16, 1, '190.00'),
(140, 113, 13, 1, '6000.00'),
(141, 114, 2, 1, '139.00'),
(142, 115, 16, 1, '190.00'),
(143, 116, 7, 1, '150.00'),
(144, 117, 16, 1, '190.00'),
(145, 117, 13, 1, '6000.00'),
(146, 118, 13, 1, '6000.00'),
(147, 119, 16, 1, '190.00'),
(148, 120, 2, 1, '139.00'),
(149, 121, 13, 1, '6000.00'),
(150, 122, 7, 1, '150.00'),
(151, 123, 16, 1, '190.00'),
(152, 124, 13, 1, '6000.00'),
(153, 124, 8, 1, '150.00'),
(154, 124, 2, 1, '139.00'),
(155, 124, 14, 1, '180.00'),
(156, 124, 15, 1, '45.00'),
(157, 124, 3, 1, '499.00'),
(158, 124, 10, 2, '250.00'),
(159, 125, 2, 1, '139.00'),
(160, 125, 8, 1, '150.00'),
(161, 125, 12, 1, '300.00'),
(162, 125, 14, 1, '180.00'),
(163, 125, 15, 1, '45.00'),
(164, 126, 10, 1, '250.00'),
(165, 126, 1, 1, '149.00'),
(166, 127, 16, 1, '1.00'),
(167, 128, 15, 1, '45.00'),
(168, 129, 7, 1, '150.00'),
(169, 130, 13, 1, '6000.00'),
(170, 130, 7, 2, '150.00'),
(171, 131, 7, 1, '150.00'),
(172, 132, 13, 1, '6000.00'),
(173, 132, 7, 1, '150.00'),
(174, 133, 16, 1, '1.00'),
(175, 134, 15, 1, '45.00');

-- --------------------------------------------------------

--
-- Table structure for table `e_password_resets`
--

CREATE TABLE `e_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_process_logs`
--

CREATE TABLE `e_process_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_process_logs`
--

INSERT INTO `e_process_logs` (`id`, `subject`, `log_message`, `created_at`, `updated_at`) VALUES
(1, 'Compose Newsletter', 'Compose newsletter command has been executed successfully', '2021-04-09 14:09:07', '2021-04-09 14:09:07'),
(2, 'Compose Newsletter', 'Compose newsletter command has been executed but no records found', '2021-04-09 14:10:08', '2021-04-09 14:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `e_products`
--

CREATE TABLE `e_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) UNSIGNED NOT NULL,
  `sale_price` decimal(8,2) UNSIGNED DEFAULT NULL,
  `stock` int(11) NOT NULL COMMENT 'Stock quantity',
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Pcs,kgs etc..',
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_display` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=>New Arrival,2=>Featured',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_rating` decimal(3,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `total_reviews` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active,2=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_products`
--

INSERT INTO `e_products` (`id`, `product_name`, `product_slug`, `sku`, `regular_price`, `sale_price`, `stock`, `unit`, `product_image`, `product_image_1`, `product_image_2`, `product_display`, `description`, `additional_info`, `average_rating`, `total_reviews`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KSJ USB Optical Wired Mouse Black', 'ksj-usb-optical-wired-mouse-black', '127779866', '499.00', '149.00', 100, 'Pcs', 'ksj-usb-optical-wired-mouse-black-usb-optical-wired-mouse-black.jpg', NULL, NULL, '1', 'some description', NULL, '5.00', 1, 1, '2020-11-06 15:25:18', '2020-12-03 18:10:55'),
(2, 'USB Optical Wired Mouse - Black', 'usb-optical-wired-mouse-black', '56456565', '399.00', '139.00', 100, 'Pcs', 'usb-optical-wired-mouse-black-sandisk-ultra-usb-30-flash-drive-64gb.jpg', 'usb-optical-wired-mouse-black-img-1-ksj-usb-optical-wired-mouse-black.jpg', NULL, '1', 'some description', NULL, '5.00', 2, 1, '2020-11-06 15:25:18', '2020-12-03 18:11:51'),
(3, 'HP 15.6 inch Polyester Water Proof Laptop Backpack', 'hp-156-inch-polyester-water-proof-laptop-backpack', '56565', '699.00', '499.00', 100, 'Pcs', 'hp-156-inch-polyester-water-proof-laptop-backpack-download.jpg', 'hp-156-inch-polyester-water-proof-laptop-backpack-img-1-download (1).jpg', NULL, '1', 'some description', NULL, '5.00', 0, 1, '2020-11-06 15:25:18', '2021-06-01 23:10:50'),
(4, 'Lenovo Original Laptop Backpack', 'lenovo-original-laptop-backpack', '44654656', '999.00', '524.00', 100, 'Pcs', 'lenovo-original-laptop-backpack-download (1).jpg', 'lenovo-original-laptop-backpack-img-1-download (2).jpg', NULL, '1', 'some description', NULL, '0.00', 0, 1, '2020-11-06 15:25:18', '2020-12-03 18:09:57'),
(5, 'SanDisk Ultra USB 3.0 16 GB Pen Drive(Black)', 'sandisk-ultra-usb-30-16-gb-pen-driveblack', '124339022', '1710.00', '849.00', 100, 'Pcs', 'sandisk-ultra-usb-30-16-gb-pen-driveblack-sandisk-ultra-usb-30-flash-drive-64gb.jpg', NULL, NULL, '1', 'some description', NULL, '0.00', 0, 1, '2020-11-06 15:25:18', '2020-12-03 18:12:54'),
(6, 'SanDisk Ultra USB 3.0 Flash Drive 64GB', 'sandisk-ultra-usb-30-flash-drive-64gb', '45656', '500.00', '150.00', 100, 'Pcs', 'sandisk-ultra-usb-30-flash-drive-64gb-sandisk-ultra-usb-30-flash-drive-64gb.jpg', NULL, NULL, '1', 'some description', NULL, '0.00', 0, 1, '2020-11-06 15:25:18', '2020-12-03 18:13:07'),
(7, 'Amino Blue And Silver And White Quartz Couple Watch', 'amino-blue-and-silver-and-white-quartz-couple-watch', '76576', '500.00', '150.00', 100, 'Pcs', 'amino-blue-and-silver-and-white-quartz-couple-watch-amino-blue-and-silver-and-white-quartz-couple-watch.jpg', 'amino-blue-and-silver-and-white-quartz-couple-watch-img-1-mens-analog-quartz-multicolor-dial-round-watch.jpg', NULL, '1', 'some description', NULL, '4.00', 1, 1, '2020-11-06 15:25:18', '2021-04-24 06:43:16'),
(8, 'Men\'s Analog Quartz Multicolor Dial Round Watch', 'mens-analog-quartz-multicolor-dial-round-watch', 'gfg5656', '500.00', '150.00', 100, 'Pcs', 'mens-analog-quartz-multicolor-dial-round-watch-amino-blue-and-silver-and-white-quartz-couple-watch.jpg', 'mens-analog-quartz-multicolor-dial-round-watch-img-1-amino-blue-and-silver-and-white-quartz-couple-watch.jpg', NULL, '2', 'some description', NULL, '5.00', 1, 1, '2020-11-06 15:25:18', '2020-12-03 18:15:14'),
(9, 'Weldone Beige Slip on Canvas Air Mix Sneakers/Casual Shoes For Men', 'weldone-beige-slip-on-canvas-air-mix-sneakerscasual-shoes-for-men', '46566', '500.00', '150.00', 100, 'Pcs', 'weldone-beige-slip-on-canvas-air-mix-sneakerscasual-shoes-for-men-firstclub-mens-synthetic-party-formal-derby-shoes.jpg', 'weldone-beige-slip-on-canvas-air-mix-sneakerscasual-shoes-for-men-img-1-clymb-black-brown-canvas-pvc-lace-up-smart-casual-shoes-for-men.jpg', NULL, '2', 'some description', NULL, '0.00', 0, 1, '2020-11-06 15:25:18', '2020-12-03 18:13:49'),
(10, 'Clymb Black Brown Canvas PVC Lace-up Smart Casual Shoes For Men', 'clymb-black-brown-canvas-pvc-lace-up-smart-casual-shoes-for-men', '3444', '349.00', '250.00', 100, 'Pcs', 'clymb-black-brown-canvas-pvc-lace-up-smart-casual-shoes-for-men-weldone-beige-slip-on-canvas-air-mix-sneakerscasual-shoes-for-men.jpg', 'clymb-black-brown-canvas-pvc-lace-up-smart-casual-shoes-for-men-img-1-weldone-beige-slip-on-canvas-air-mix-sneakerscasual-shoes-for-men.jpg', NULL, '2', 'some description', '<p><br></p><p><br></p>', '0.00', 0, 1, '2020-11-06 15:25:18', '2021-06-29 18:19:00'),
(11, 'Smoky Black Loafer for Men', 'smoky-black-loafer-for-men', '143418007', '499.00', '399.00', 100, 'Pcs', 'smoky-black-loafer-for-men-lenovo-original-laptop-backpack.jpg', 'smoky-black-loafer-for-men-img-1-hp-156-inch-polyester-water-proof-laptop-backpack.jpg', NULL, '2', 'some description', NULL, '0.00', 0, 1, '2020-11-06 15:25:18', '2020-12-03 18:05:38'),
(12, 'FIRSTCLUB Men\'s Synthetic Party Formal Derby Shoes', 'firstclub-mens-synthetic-party-formal-derby-shoes', '65665656', '525.00', '300.00', 100, 'Pcs', 'firstclub-mens-synthetic-party-formal-derby-shoes-sandisk-ultra-usb-30-flash-drive-64gb.jpg', 'firstclub-mens-synthetic-party-formal-derby-shoes-img-1-sandisk-ultra-usb-30-flash-drive-64gb.jpg', NULL, '2', 'some description', NULL, '0.00', 0, 1, '2020-11-06 15:25:18', '2020-12-03 18:05:10'),
(13, 'Redmi 9A 2GB,32', 'redmi-9a-2gb32', '564654', '10000.00', '6000.00', 20, 'Pcs', 'redmi-9a-2gb32-usb-optical-wired-mouse-black.jpg', 'redmi-9a-2gb32-img-1-usb-optical-wired-mouse-black.jpg', NULL, '1,2', 'dgdfgfgdg', 'dgfdgfdgffgfgg', '5.00', 1, 1, '2020-11-20 16:05:09', '2020-12-03 18:04:07'),
(14, 'Something rggrr sfhj', 'something-rggrr-sfhj', 'HUM1218', '200.00', '180.00', 34, '5', 'something-rggrr-sfhj-weldone-beige-slip-on-canvas-air-mix-sneakerscasual-shoes-for-men.jpg', NULL, NULL, '2', 'Something', 'Something', '5.00', 1, 1, '2020-11-22 12:00:23', '2020-12-03 18:03:28'),
(15, 'Lipstick Red', 'lipstick-red', 'AK123', '50.00', '45.00', 15, '1', 'lipstick-red-sevadaan-logo.png', NULL, NULL, '1', 'About this products!', 'About this products!', '4.67', 3, 1, '2020-11-23 10:24:43', '2021-06-02 10:02:32'),
(16, 'Sandle', 'sandle', 'BATA2341', '200.00', '1.00', 200, '2', 'sandle-coding-birds-online-favicon.png', NULL, NULL, '1', '<p>prodcut descripsadf product des</p><p><br></p><p><br></p>', '<p>addtotsldf; this is just a test</p><p><br></p><p><br></p>', '5.00', 1, 1, '2020-11-23 13:48:00', '2021-07-11 12:06:52'),
(17, 'Testing', 'testing', 'DDF0980', '300.00', '200.00', 5, '3', 'testing-179551853_4094466633952849_5480018138327055672_n.jpg', NULL, NULL, '2', 'Something is going on wrong, Just testing.', NULL, '0.00', 0, 1, '2021-05-25 07:10:41', '2021-05-25 07:10:41'),
(18, 'Egg', 'egg', 'ZARIF980', '10.00', '9.00', 20, '3', 'egg-BleuGrens T5.jpg', NULL, NULL, '2', 'Hello, Test egg by make it omlate', '<p>Hello, Test Test my make it&nbsp;</p>', '0.00', 0, 1, '2021-05-28 17:59:01', '2021-06-29 18:18:28'),
(19, 'test', 'test', 'test123', '1.00', '1.00', 1, 'Kg', 'test-89676193_116736863271493_4330795062779707392_o.jpg', NULL, NULL, '1,2', '<p>asd</p>', '<p>asd<gwmw style=\"display:none;\"></gwmw></p>', '0.00', 0, 1, '2021-08-12 11:40:14', '2021-08-12 11:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `e_product_tags`
--

CREATE TABLE `e_product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_product_tags`
--

INSERT INTO `e_product_tags` (`id`, `product_id`, `tag_ids`) VALUES
(1, 1, '3,4'),
(2, 7, '3,4'),
(3, 13, '2,4'),
(4, 14, '2,3,4'),
(5, 15, '2,3'),
(6, 16, '2,3,5'),
(7, 12, '1,3,5'),
(8, 11, '3'),
(9, 3, '1,3,5'),
(10, 4, '1,3,4'),
(11, 2, '3'),
(12, 5, '1,2,3'),
(13, 6, '1'),
(14, 9, '5,13'),
(15, 10, '2,4'),
(16, 8, '2,9'),
(17, 17, '2'),
(18, 18, '2,3,4'),
(19, 19, '1');

-- --------------------------------------------------------

--
-- Table structure for table `e_queries`
--

CREATE TABLE `e_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_queries`
--

INSERT INTO `e_queries` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Md.Mehedi Hassan', 'waybest57@gmail.com', 'dshhs', 'sdhhsehh', '2021-05-21 05:48:56', '2021-05-21 05:48:56'),
(3, 'Md.Mehedi Hassan', 'waybest57@gmail.com', 'This client ordered me directly for Instagram marketing.', 'turiidiii', '2021-05-21 15:41:17', '2021-05-21 15:41:17'),
(4, 'Md. Mehedi Hassan', 'mh_ashiq@yahoo.com', 'This buyer ordered me and suddenly he wants to cancel this order.', 'This buyer ordered me and suddenly he wants to cancel this order.', '2021-05-21 17:06:27', '2021-05-21 17:06:27'),
(5, 'sexual', 'mh_ashiq@yahoo.com', 'My Account is temporary hold.  [Action Required]', 'My Account is on temporary hold.  [Action Required]', '2021-05-21 17:07:24', '2021-05-21 17:07:24'),
(6, 'Md.Mehedi Hassan', 'waybest57@gmail.com', 'This client ordered me directly for Instagram marketing.', 'hygcj', '2021-05-22 07:20:23', '2021-05-22 07:20:23'),
(7, 'Md. Mehedi Hassan', 'mh_ashiq@yahoo.com', 'This client ordered me directly for Instagram marketing.', 'This client ordered me directly for Instagram marketing.', '2021-05-25 04:36:05', '2021-05-25 04:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `e_recent_transactions`
--

CREATE TABLE `e_recent_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Credited,2=>Debited',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_recent_transactions`
--

INSERT INTO `e_recent_transactions` (`id`, `user_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '10000.00', 1, '2020-11-18 07:24:58', '2020-11-18 07:24:58'),
(2, 2, '576.00', 2, '2020-11-18 09:09:42', '2020-11-18 09:09:42'),
(3, 2, '139.00', 2, '2020-11-18 09:19:41', '2020-11-18 09:19:41'),
(4, 2, '139.00', 2, '2020-11-21 10:46:59', '2020-11-21 10:46:59'),
(5, 2, '139.00', 2, '2020-11-21 10:48:01', '2020-11-21 10:48:01'),
(6, 2, '139.00', 2, '2020-11-21 10:54:51', '2020-11-21 10:54:51'),
(7, 2, '663.00', 2, '2020-11-21 11:00:31', '2020-11-21 11:00:31'),
(8, 2, '663.00', 2, '2020-11-21 11:03:20', '2020-11-21 11:03:20'),
(9, 2, '663.00', 2, '2020-11-21 11:05:07', '2020-11-21 11:05:07'),
(10, 2, '663.00', 2, '2020-11-21 11:06:25', '2020-11-21 11:06:25'),
(11, 2, '663.00', 2, '2020-11-21 11:08:23', '2020-11-21 11:08:23'),
(12, 2, '149.00', 2, '2020-11-21 11:18:46', '2020-11-21 11:18:46'),
(13, 2, '499.00', 2, '2020-11-21 22:42:44', '2020-11-21 22:42:44'),
(14, 2, '149.00', 2, '2020-11-22 05:43:59', '2020-11-22 05:43:59'),
(15, 2, '1000.00', 1, '2020-11-22 06:40:44', '2020-11-22 06:40:44'),
(16, 2, '40.00', 1, '2020-11-22 06:41:16', '2020-11-22 06:41:16'),
(17, 2, '150.00', 2, '2020-11-23 02:22:50', '2020-11-23 02:22:50'),
(18, 2, '134.10', 2, '2020-11-23 02:26:07', '2020-11-23 02:26:07'),
(19, 2, '139.00', 2, '2020-11-23 04:35:07', '2020-11-23 04:35:07'),
(20, 2, '99.00', 1, '2020-11-23 04:39:56', '2020-11-23 04:39:56'),
(21, 2, '45.00', 2, '2020-11-23 05:01:13', '2020-11-23 05:01:13'),
(22, 2, '150.00', 2, '2020-11-23 07:52:47', '2020-11-23 07:52:47'),
(23, 2, '10000.00', 1, '2020-11-23 08:10:15', '2020-11-23 08:10:15'),
(24, 2, '50.00', 1, '2020-11-23 10:30:00', '2020-11-23 10:30:00'),
(25, 2, '589.00', 2, '2020-12-04 04:43:18', '2020-12-04 04:43:18'),
(26, 2, '589.00', 2, '2020-12-04 04:43:29', '2020-12-04 04:43:29'),
(27, 2, '589.00', 2, '2020-12-04 04:43:41', '2020-12-04 04:43:41'),
(28, 2, '180.50', 2, '2020-12-04 20:27:48', '2020-12-04 20:27:48'),
(29, 2, '6150.00', 2, '2020-12-05 11:43:40', '2020-12-05 11:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `e_reviews`
--

CREATE TABLE `e_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_pictures` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` datetime NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=>Active,2=>Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_reviews`
--

INSERT INTO `e_reviews` (`id`, `order_id`, `product_id`, `user_id`, `rating`, `remark`, `review_pictures`, `review_date`, `status`) VALUES
(1, 2, 3, 2, 3, 'amazing product', NULL, '2020-11-18 12:46:41', '2'),
(2, 5, 13, 2, 5, 'nice items', NULL, '2020-11-20 16:21:54', '1'),
(3, 18, 2, 2, 5, 'Its really good !', NULL, '2020-11-22 11:05:41', '1'),
(4, 23, 2, 2, 5, 'good product!', NULL, '2020-11-22 11:48:20', '1'),
(5, 24, 14, 2, 5, 'Cool!', NULL, '2020-11-22 12:04:35', '1'),
(6, 27, 1, 2, 5, 'OUTSTANDING !', NULL, '2020-11-23 07:59:19', '1'),
(7, 29, 15, 2, 5, 'Good !', NULL, '2020-11-23 10:30:40', '1'),
(8, 30, 15, 2, 1, 'Not good!', NULL, '2020-11-23 10:32:24', '2'),
(9, 31, 8, 2, 5, 'Good product!!!!!!!!', NULL, '2020-11-23 13:24:39', '1'),
(10, 50, 15, 2, 5, 'Good one!!!!', 'khyuk.png', '2020-12-13 18:21:13', '2'),
(11, 74, 15, 4, 5, 'Great', 'qz15s.jpeg,dlk9k.jpeg,t9ngl.jpeg,3umte.jpeg,gp7it.jpeg,cgrki.jpeg', '2021-04-18 12:00:07', '2'),
(12, 78, 15, 23, 4, 'yfuylj', '9ko1u.jpg,owr9w.jpg,lkodz.jpg', '2021-04-23 22:41:58', '1'),
(13, 79, 7, 2, 4, 'Amazing but minimal', 'dw6d0.png,36wby.jpg,0p8tj.jpg', '2021-04-24 12:13:16', '1'),
(14, 79, 3, 2, 5, 'Great !', '', '2021-04-24 12:16:56', '1'),
(15, 80, 16, 2, 5, 'Amazing', 'ripyh.jpg,1wphm.jpg', '2021-05-02 17:19:17', '1'),
(16, 100, 15, 29, 5, 'Good and best', '06psx.jpg,3n93j.jpg,eacj6.jpg,knsur.jpg,nw6r0.jpg,2hz1z.jpg', '2021-05-29 01:08:37', '1');

-- --------------------------------------------------------

--
-- Table structure for table `e_settings`
--

CREATE TABLE `e_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active,2=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_settings`
--

INSERT INTO `e_settings` (`id`, `setting_name`, `setting_value`, `setting_status`, `created_at`, `updated_at`) VALUES
(1, 'delivery_charge', '50', 1, '2020-12-07 17:04:58', '2021-05-28 16:11:50'),
(2, 'offer_text', 'CHOCOHUB 90%', 1, '2020-12-21 09:01:16', '2021-05-28 16:12:10'),
(3, 'cash_on_delivery', 'Yes', 1, '2021-03-29 10:30:15', '2021-06-22 08:32:33'),
(4, 'website_logo', '1617535467-website_logo.png', 1, '2021-04-04 11:20:54', '2021-04-04 08:54:27'),
(5, 'popup', '{\"title\":\"Subscribe\",\"link\":\"http:\\/\\/thevirtualbd.com\\/\",\"popup_image\":\"1621933093-download.jpg\",\"description\":\"Subscribe to the newsletter to receive updates about new products.\"}', 1, '2021-05-02 16:22:56', '2021-05-25 06:28:13'),
(6, 'seo', '{\"meta_description\":\"Ejhuli is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fasion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.\",\"meta_keywords\":\"ecommerce, electronics store, Fasion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store\"}', 1, '2021-05-02 16:23:09', '2021-05-02 16:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `e_shurjo_pay_payments`
--

CREATE TABLE `e_shurjo_pay_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_tx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `bank_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_code` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_code_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_payment_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user_name',
  `custom2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_shurjo_pay_payments`
--

INSERT INTO `e_shurjo_pay_payments` (`id`, `status`, `msg`, `tx_id`, `bank_tx_id`, `amount`, `bank_status`, `sp_code`, `sp_code_des`, `sp_payment_option`, `custom1`, `custom2`, `custom3`, `custom4`, `created_at`, `updated_at`) VALUES
(1, 'Success', 'Action Successful', 'NOK60d8afb7781e5', '60d8b00a977b3', 350, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 16:35:45', '2021-06-27 16:35:45'),
(2, 'Success', 'Action Successful', 'NOK60d8b1c04664f', '60d8b2025cbf9', 6050, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 16:44:18', '2021-06-27 16:44:18'),
(3, 'Success', 'Action Successful', 'NOK60d8b2e27b595', '60d8b329ed5f6', 95, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 16:49:03', '2021-06-27 16:49:03'),
(4, 'Success', 'Action Successful', 'NOK60d8b3f94bb4a', '60d8b43c9f587', 95, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 16:53:37', '2021-06-27 16:53:37'),
(5, 'Success', 'Action Successful', 'NOK60d8b3f94bb4a', '60d8b43c9f587', 95, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:00:36', '2021-06-27 17:00:36'),
(6, 'Success', 'Action Successful', 'NOK60d8b5cb7a982', '60d8b608d1f8e', 95, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:01:18', '2021-06-27 17:01:18'),
(7, 'Success', 'Action Successful', 'NOK60d8b5cb7a982', '60d8b608d1f8e', 95, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:02:58', '2021-06-27 17:02:58'),
(8, 'Success', 'Action Successful', 'NOK60d8b6e942772', '60d8b72516764', 240, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:06:03', '2021-06-27 17:06:03'),
(9, 'Success', 'Action Successful', 'NOK60d8b7429c199', '60d8b78238540', 6050, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:07:42', '2021-06-27 17:07:42'),
(10, 'Success', 'Action Successful', 'NOK60d8b8dfd98e4', '60d8b9561641e', 189, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:15:22', '2021-06-27 17:15:22'),
(11, 'Success', 'Action Successful', 'NOK60d8b8dfd98e4', '60d8b9561641e', 189, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:16:32', '2021-06-27 17:16:32'),
(12, 'Success', 'Action Successful', 'NOK60d8b8dfd98e4', '60d8b9561641e', 189, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:24:37', '2021-06-27 17:24:37'),
(13, 'Success', 'Action Successful', 'NOK60d8b8dfd98e4', '60d8b9561641e', 189, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:24:41', '2021-06-27 17:24:41'),
(14, 'Success', 'Action Successful', 'NOK60d8bedfa7fbc', '60d8bf1ab498c', 240, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 17:39:56', '2021-06-27 17:39:56'),
(15, 'Success', 'Action Successful', 'NOK60d8c3ad6c41e', '60d8c3ef93161', 200, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 18:00:32', '2021-06-27 18:00:32'),
(16, 'Success', 'Action Successful', 'NOK60d8c67ef1939', '60d8c6b8b596e', 6240, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 18:12:55', '2021-06-27 18:12:55'),
(17, 'Success', 'Action Successful', 'NOK60d8c72e4064e', '60d8c7641fda6', 6050, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 18:15:16', '2021-06-27 18:15:16'),
(18, 'Success', 'Action Successful', 'NOK60d8c839b69a4', '60d8c8989fb23', 240, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 18:20:25', '2021-06-27 18:20:25'),
(19, 'Success', 'Action Successful', 'NOK60d8c90384bee', '60d8c93f96e00', 189, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 18:23:12', '2021-06-27 18:23:12'),
(20, 'Success', 'Action Successful', 'NOK60d8c98033b99', '60d8c9bc2e77a', 6050, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 18:25:19', '2021-06-27 18:25:19'),
(21, 'Success', 'Action Successful', 'NOK60d8c9ea8cf62', '60d8ca2030513', 200, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 18:26:59', '2021-06-27 18:26:59'),
(22, 'Success', 'Action Successful', 'NOK60d8ca45a0dd8', '60d8ca8206da0', 240, 'SUCCESS', '0', 'Successful', 'Card', NULL, NULL, NULL, NULL, '2021-06-27 18:28:36', '2021-06-27 18:28:36'),
(23, 'Success', 'Action Successful', 'NOK60d8cb7cc5028', '60d8cbb4ecbcf', 7563, 'SUCCESS', '000', 'Successful', 'Card', 'username-12345678901', NULL, NULL, NULL, '2021-06-27 18:33:43', '2021-06-27 18:33:43'),
(24, 'Success', 'Action Successful', 'NOK60d8cbffa73b9', '60d8cc351fbed', 864, 'SUCCESS', '000', 'Successful', 'Card', 'username-12345678901', NULL, NULL, NULL, '2021-06-27 18:35:51', '2021-06-27 18:35:51'),
(25, 'Success', 'Action Successful', 'NOK60d9cf93c7d97', '60d9cfd64f600', 449, 'SUCCESS', '000', 'Successful', 'Card', 'username-12345678901', NULL, NULL, NULL, '2021-06-28 13:03:35', '2021-06-28 13:03:35'),
(26, 'Success', 'Action Successful', 'NOK60eaf4b572506', '60eaf4dc27a12', 51, 'SUCCESS', '000', 'Successful', 'Card', 'username-01646688970', NULL, NULL, NULL, '2021-07-11 13:10:45', '2021-07-11 13:10:45'),
(27, 'Success', 'Action Successful', 'NOK60eafb3dec6e8', '60eafb5f0fcfd', 95, 'SUCCESS', '000', 'Successful', 'Card', 'username-01646688970', NULL, NULL, NULL, '2021-07-11 13:38:37', '2021-07-11 13:38:37'),
(28, 'Success', 'Action Successful', 'NOK60eafb83d906d', '60eafb9a6bde6', 200, 'SUCCESS', '000', 'Successful', 'Card', 'username-01646688970', NULL, NULL, NULL, '2021-07-11 13:39:32', '2021-07-11 13:39:32'),
(29, 'Success', 'Action Successful', 'NOK60eafe8012e32', '60eafea4df121', 6350, 'SUCCESS', '000', 'Successful', 'Card', 'username-01646688970', NULL, NULL, NULL, '2021-07-11 13:52:30', '2021-07-11 13:52:30'),
(30, 'Success', 'Action Successful', 'NOK60eb1e5ba3ccd', '60eb1e6c3aff2', 200, 'SUCCESS', '000', 'Successful', 'Card', 'username-01646688970', NULL, NULL, NULL, '2021-07-11 16:08:06', '2021-07-11 16:08:06'),
(31, 'Success', 'Action Successful', 'NOK60eb350e5cd28', '60eb352a01485', 6200, 'SUCCESS', '000', 'Successful', 'Card', 'username-01646688970', NULL, NULL, NULL, '2021-07-11 17:45:06', '2021-07-11 17:45:06'),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'username-01646688970', NULL, NULL, NULL, '2021-07-11 20:44:29', '2021-07-11 20:44:29'),
(33, 'Success', 'Action Successful', 'NOK60eb5f6256656', '60eb5f7d4d18e', 95, 'SUCCESS', '000', 'Successful', 'Card', 'username-01646688970', NULL, NULL, NULL, '2021-07-11 20:45:42', '2021-07-11 20:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `e_stories`
--

CREATE TABLE `e_stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=>Active,2=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_stories`
--

INSERT INTO `e_stories` (`id`, `title`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MOTTO', 'https://www.thevirtualbd.com', '1621930102-download.jpg', '1', '2021-05-25 05:33:06', '2021-05-25 05:38:22'),
(2, 'Story image 2', 'http://ejhuli.com/', 'insta_img2.jpg', '1', '2021-05-25 05:33:06', '2021-05-25 05:33:06'),
(3, 'Story image 3', 'http://ejhuli.com/', 'insta_img3.jpg', '1', '2021-05-25 05:33:06', '2021-05-25 05:33:06'),
(4, 'Story image 4', 'http://ejhuli.com/', 'insta_img4.jpg', '1', '2021-05-25 05:33:06', '2021-05-25 05:33:06'),
(5, 'Story image 5', 'http://ejhuli.com/', 'insta_img5.jpg', '1', '2021-05-25 05:33:06', '2021-05-25 05:33:06'),
(6, 'Story image 6', 'http://ejhuli.com/', 'insta_img6.jpg', '1', '2021-05-25 05:33:06', '2021-05-25 05:33:06'),
(7, 'Story image 7', 'http://ejhuli.com/', 'insta_img7.jpg', '1', '2021-05-25 05:33:06', '2021-05-25 05:33:06'),
(8, 'Story image 8', 'http://ejhuli.com/', 'insta_img8.jpg', '1', '2021-05-25 05:33:06', '2021-05-25 05:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `e_sub_categories`
--

CREATE TABLE `e_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_sub_categories`
--

INSERT INTO `e_sub_categories` (`id`, `category_id`, `subcategory`, `slug`, `description`) VALUES
(1, 1, 'Mens', 'mens', 'null'),
(2, 1, 'Pets', 'pets', NULL),
(3, 2, 'Home Appliance', 'home-appliance', NULL),
(4, 4, 'Smart Phones', 'smart-phones', 'null'),
(5, 5, 'Womens', 'womens', 'null'),
(6, 4, 'Key Pad Phones', 'key-pad-phones', 'dgdfgdfg'),
(7, 9, 'Behala', 'behala', 'Behala');

-- --------------------------------------------------------

--
-- Table structure for table `e_sub_category_products`
--

CREATE TABLE `e_sub_category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_sub_category_products`
--

INSERT INTO `e_sub_category_products` (`id`, `sub_category_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 4, 4),
(7, 4, 5),
(8, 4, 6),
(9, 1, 7),
(10, 2, 7),
(12, 1, 8),
(13, 2, 8),
(15, 4, 9),
(16, 5, 9),
(18, 1, 10),
(19, 2, 10),
(20, 1, 11),
(21, 2, 11),
(24, 3, 12),
(27, 5, 14),
(28, 3, 15),
(29, 1, 16),
(30, 2, 16),
(31, 4, 16),
(33, 6, 16),
(34, 3, 3),
(35, 5, 17),
(36, 1, 13),
(37, 2, 13),
(38, 3, 18),
(39, 1, 19),
(40, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `e_tags`
--

CREATE TABLE `e_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_tags`
--

INSERT INTO `e_tags` (`id`, `tag`, `slug`) VALUES
(1, 'Health Products', 'health-products'),
(2, 'Bags', 'bags'),
(3, 'Laptops', 'laptops'),
(4, 'Mobiles', 'mobiles'),
(5, 'Cloths', 'cloths'),
(6, 'Books', 'books'),
(7, 'Phones', 'phones'),
(8, 'Beauty Products', 'beauty-products'),
(9, 'Health Products', 'health-products'),
(10, 'Laptops', 'laptops'),
(11, 'Games', 'games'),
(12, 'Music', 'music'),
(13, 'CCC', 'ccc'),
(14, 'Bra', 'bra');

-- --------------------------------------------------------

--
-- Table structure for table `e_users`
--

CREATE TABLE `e_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=>Admin,2=>Customer',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active,2=>InActive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_users`
--

INSERT INTO `e_users` (`id`, `username`, `password`, `profile_pic`, `user_type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '7905266028', '$2y$10$d1..4g8YAeugTt5hnYn2Mui7r3e2Kmjmqw0LnuI6NjHlZaVRVYjry', 'profile.jpg', 1, 1, NULL, '2020-11-05 05:22:38', '2021-05-21 17:13:15'),
(2, '9936546197', '$2y$10$6dBDhJMnRIUxlbapNUlsTOtuOGVSNqYr9.2o1KnTAoVjPlKPmJSay', 'IMG20210525022538.jpg', 2, 1, '41abd9159d63230dfee376e509ec8cfaa67d2243', '2020-11-08 02:13:12', '2021-06-07 08:05:56'),
(3, '8601480783', '$2y$10$vo7oQ7QRhW/S9ikATsnfn.DPPA10KWc5JO66M9oSA21Nu6nsGmpOG', NULL, 2, 1, NULL, '2020-11-21 08:06:35', '2020-11-21 08:06:35'),
(4, '09936546198', '$2y$10$96if4GTHd5paI5vMQyAsOeuQ0jX5PQxNBodJ8lgf3avLK.1nQOln.', '1612607472-default_user.png', 2, 1, NULL, '2020-11-22 10:52:03', '2021-05-29 10:44:27'),
(13, '4536464645', '$2y$10$3RAyyKvvjx7nfwzba7ldIe7WV8M36P9bePRdVT9qkb/FUU0cP3D12', NULL, 2, 1, '03c288a04c316dbe15b8cde3471edb9a5fd8f414', '2020-12-04 19:46:42', '2020-12-04 19:46:42'),
(14, '1902624501', '$2y$10$.4VRpfUF8fNq61wQ.UOfNuNin0FYj6oNPGhZQJMaJJSBSWfy3NIZ6', NULL, 2, 1, 'neEnxO8SKsNHQzKA2EghkDHnXadPpJUzsa7mhJALn1xvo1cTqEeJehAk6qxp', '2020-12-04 19:48:35', '2020-12-04 20:16:24'),
(15, '1902624552', '$2y$10$11t/kpMDdHiSCgU.OTgLieTwMJh2p2rhbMboX3MsECO4YILv7S82S', NULL, 2, 1, 'c9d0b22affce39f6b1435b3b88e16795618bf6bf', '2020-12-04 20:18:37', '2021-05-21 15:38:19'),
(16, '1932974266', '$2y$10$YGeXmy2mU/fFsYDonnEjWearN2aXSsp0QN34Vkpka6LWTSDm.OgTa', NULL, 2, 1, 'W60RNVWmI4zxxCrF3e0Xub066TZIRpHpxEmuKjA4OSoi7UXECao4kx8Tj6Pw', '2020-12-13 16:51:58', '2020-12-13 16:53:42'),
(17, '1100110011', '$2y$10$J8JKK158geNaTKfNJlibouZFphpLVu2myVyo/cPOCYCvCUSZaiuu2', NULL, 2, 1, '509f26d6a82036c494aac7cab685e144598a7dc5', '2021-03-28 14:41:57', '2021-03-28 14:43:17'),
(18, '7867768675', '$2y$10$pP/C2grK1oaaz0ugUtSd/.jRYRZ.zLO/VQnVf9F9bSlm2nNh8SkSq', NULL, 2, 1, 'lkGsfmWFzWhfQz6Vj3oTvbVjeDVX9cEuh6gp1Rs9xLf0gNeY1CuWBYRpgN7K', '2021-03-29 10:34:43', '2021-03-29 10:35:23'),
(19, '01790526602', '$2y$10$oAc.aWd2XwXgdIitv4TDEehLvSQ8Rpi1zXUtt4AMrllpITDW9ABPu', NULL, 2, 1, '2FQr6Xi4v7rINo2PjQJEhDSfiYaDLG8m864NFqtDQWqOKiQgr6ZtM7G24ClH', '2021-04-09 04:15:37', '2021-04-09 06:49:52'),
(20, '01920723213', '$2y$10$11/ncir4AcQ7VZTN/c/C/.lCzsJiFgbZQVVJnFgpssbtB0fqlkAZm', NULL, 2, 1, '58a93d47e98d46ca049cc2a42dd26b042cc8fae6', '2021-04-09 04:31:22', '2021-04-09 04:31:22'),
(21, '01993982839', '$2y$10$es5rS90jzEzKITWoitG6xuSMNXLM2JZD4l7lel.twdzDil6YQHucK', NULL, 2, 1, 'f7b49d585ca53cbf6501d92d71f3924482ee06dd', '2021-04-19 08:17:37', '2021-04-19 08:17:37'),
(22, '01223344556', '$2y$10$orX2mfW2EvKeBEZ0BuLn3uyQcJuRYh/OM2aTUvI2g9LLETZbF7yAu', NULL, 2, 1, 'cf57af9f3c9cbc61ed5b791c4b1dabe99115e417', '2021-04-20 07:08:56', '2021-04-20 07:08:56'),
(23, '01401409820', '$2y$10$jaTGPT.cEejFKJp9uBRRxu8sTDNOpPlVYi3WMkXJmRnAS0Zh4nCMG', NULL, 2, 1, '2969ae2ff1a76961ca6dd57438fb4e0b7c7bd3cf', '2021-04-23 13:49:16', '2021-04-23 13:49:16'),
(24, '01817882666', '$2y$10$xWlgkak6DWVP1pEvH01fTuWhetxRg56klKuYAfvtsrpgT9j16UNMm', 'my.jpg', 2, 1, 'fd047cc8c7ba930cbcc37d05b49a51be0e5538c6', '2021-05-25 08:02:36', '2021-05-25 08:06:22'),
(25, '01993675654', '$2y$10$EPmHaYN57I6c/goWIDbxMeGxcCZubswa6TEli3A0x2Q3ZQ5GVinJy', NULL, 2, 1, '0c9f7089d668065a1bb33c172919c9d966402a54', '2021-05-25 13:32:41', '2021-05-25 13:32:41'),
(26, '01908765432', '$2y$10$kOe9T2yo0q4zLsu5ltvrquhlAAfulKtzYED2LknSlgTfBDUG6xqRq', NULL, 2, 1, 'A9ncbfiglnA1DLPoXsBpZcabpHWlgD6sGPXQ9pCviGzUfjqBeB45GPrlviEf', '2021-05-25 13:33:52', '2021-05-25 16:09:21'),
(27, '01932974266', '$2y$10$zM6s6mw2rGMfY6T/Yrn6N.kxldrjiaEGhWxupMG3WcbdJgJ3R/rwy', NULL, 2, 1, '83a3a14f0bd1999ffeb914dd89a9c61a5731c4d6', '2021-05-27 10:08:18', '2021-05-27 10:08:18'),
(28, '09198473412', '$2y$10$IpMnPDc9bQhxLuZ3cRxQkeCTdklBfAruntikxsnI3Rdtw/a5P7EpK', NULL, 2, 1, 'Iud12JSGXpvKUCNI1ZWWO4QEY58Cf5LAW0FOkGreLVef8Hy8AxHITeralSy9', '2021-05-28 14:45:22', '2021-05-28 17:15:50'),
(29, '01902624501', '$2y$10$4/0Kiefhvmd6sIyc5RqrOe.ePVjqe3bZ8IrkqoLTxjzu/1fwBsROG', 'download (1).jpg', 2, 1, 'ZcigTvIuuEMzHwSwKrEiDzWCCoLTqjYcJ7ekmNL2Kye2f2hZ0I9jpNMUSZqZ', '2021-05-28 14:49:58', '2021-06-24 10:39:48'),
(30, '01920319700', '$2y$10$2KmzrrtZad51Fkarmq.NlOhuPuB6SDQ0.MF6ZW.BbuQ8JgQr5H3EK', NULL, 2, 1, '5ea5891cb08eb89c421c7be100bc504438a5633c', '2021-06-02 12:12:54', '2021-06-02 12:12:54'),
(31, '01646688970', '$2y$10$gliu31EWrzuslUCQIGgW1uK.WTJ4QxMFV05DoZIdkuIv7zps7N86q', 'saidul-image-mini.jpg', 2, 1, 'wjqxzmiRPDeiTjHib51Qi9nRrcLPgngMTpwvcwMtq20zM3xuAyGLVBvCKd7C', '2021-06-24 18:18:35', '2021-07-19 06:34:05'),
(32, '12345678', '$2y$10$oeI9nLRWRAUj4i8FO1mko.r/ecYuHT8vDh8NDhOhob6m8n8wu0HK2', 'profile.jpg', 1, 1, NULL, '2020-11-05 05:22:38', '2021-05-21 17:13:15'),
(33, '12345678901', '$2y$10$HZHCom6fDzighHhRsBa03.PGbUyn0oLXU23r45ZAWEukIQhDFk5U.', NULL, 2, 1, 'vxpTEWF4QIaP1TaL7Fz0XwLykKC0QcjtTqDu0gQ1r2UpOv1f0spABlvV3O9l', '2021-06-25 13:52:58', '2021-07-19 12:38:30'),
(34, '98765432101', '$2y$10$U5J8603YhjHQBvbJbAHBe.1PAUP0IsrR.TPVq4jM8ze/jZgVvYPTm', NULL, 2, 1, 'wTPUdlDugLWSpVBQm3zFMJxQEoBgUs3D1Lzqi3tW7O7bDPuDv9fhDDgTNZQU', '2021-06-25 14:42:40', '2021-06-25 15:31:12'),
(36, '01623457890', '$2y$10$Z2baKeuidO89CAALg95nmOvkHsw5t1ItfGMDsWdK9wzahdvR62poy', 'saidul-image-mini.jpg', 2, 1, '5314978947c08c4e8c6756c34081fb63e961bb04', '2021-07-19 12:09:13', '2021-07-19 14:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `e_wallet_requests`
--

CREATE TABLE `e_wallet_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `request_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) UNSIGNED NOT NULL,
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1->Pending,2->Approved,3->Archived',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_wallet_requests`
--

INSERT INTO `e_wallet_requests` (`id`, `user_id`, `request_id`, `mobile`, `amount`, `txn_id`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'fgfd', '4464565465', '100.00', 'ffgdf565zxxzxe45', 'B-Cash', 2, '2020-12-03 12:54:22', '2020-12-04 19:08:19'),
(2, 2, '4fdfdfg', '4353534464', '4566.00', 'dfg56fhrr757', 'GooglePay', 2, '2020-12-03 12:54:50', '2020-12-04 19:08:24'),
(3, 4, 'dfdf', '4645654666', '200.00', 'fgf4565', 'GooglePay', 2, '2020-12-03 13:07:29', '2020-12-04 19:08:26'),
(4, 2, '565', '2352525215', '33.00', 'Tcyvyvyyv', 'B-Cash', 1, '2020-12-04 07:20:43', '2020-12-04 19:08:29'),
(5, 4, 'WLR20387', '4646464645', '675.00', 'dfdfgfd', 'B-Cash', 1, '2020-12-20 09:40:51', '2020-12-20 09:40:51'),
(6, 4, 'WLR73419', '3464666436', '565.00', 'dgdf46dfg464', 'GooglePay', 1, '2020-12-31 15:39:05', '2020-12-31 15:39:05'),
(7, 17, 'WLR18903', '7371358163', '9999.00', 'dggdfhdh', 'Bkash', 2, '2021-03-28 14:51:14', '2021-03-28 14:51:50'),
(8, 2, 'WLR20468', '3475483468', '500.00', 'Bjgdhdg', 'Bkash', 1, '2021-04-04 17:12:16', '2021-04-04 17:12:16'),
(9, 4, 'WLR10888', '3475483468', '3300.00', 'zsdhzhhz', 'Rocket', 3, '2021-04-15 06:39:27', '2021-04-15 06:42:02'),
(10, 4, 'WLR13258', '3475483468', '2222.00', 'zsdhzhhzw', 'Bkash', 2, '2021-04-15 06:42:32', '2021-04-15 06:42:44'),
(11, 21, 'WLR20477', '0193245678', '454.00', 'zsdhzhhza', 'Bkash', 2, '2021-04-19 08:27:15', '2021-04-19 08:42:28'),
(12, 23, 'WLR17396', '3475483468', '9999.00', 'zsdhzhhzfasg', 'Bkash', 2, '2021-04-23 14:32:21', '2021-04-23 14:33:09'),
(13, 4, 'WLR14263', '2564565475', '100.00', 'fgfdgfdg', 'Rocket', 2, '2021-05-02 14:12:10', '2021-05-02 14:12:35'),
(14, 2, 'WLR71898', '3475483468', '9999.00', 'zsdhzhhz1', 'Bkash', 1, '2021-05-22 08:06:57', '2021-05-22 08:06:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_admins`
--
ALTER TABLE `e_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `e_brands`
--
ALTER TABLE `e_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_brand_products`
--
ALTER TABLE `e_brand_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_brand_products_product_id_foreign` (`product_id`),
  ADD KEY `e_brand_products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `e_categories`
--
ALTER TABLE `e_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_category_products`
--
ALTER TABLE `e_category_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_category_products_product_id_foreign` (`product_id`),
  ADD KEY `e_category_products_category_id_foreign` (`category_id`);

--
-- Indexes for table `e_compose_newsletters`
--
ALTER TABLE `e_compose_newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_countries`
--
ALTER TABLE `e_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_countries_code_index` (`code`);

--
-- Indexes for table `e_customers`
--
ALTER TABLE `e_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `e_customer_addresses`
--
ALTER TABLE `e_customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_customer_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `e_discounts`
--
ALTER TABLE `e_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_failed_jobs`
--
ALTER TABLE `e_failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_jobs`
--
ALTER TABLE `e_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_jobs_queue_index` (`queue`);

--
-- Indexes for table `e_media`
--
ALTER TABLE `e_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_migrations`
--
ALTER TABLE `e_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_newsletters`
--
ALTER TABLE `e_newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_notifications`
--
ALTER TABLE `e_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `e_orders`
--
ALTER TABLE `e_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_orders_user_id_foreign` (`user_id`),
  ADD KEY `e_orders_customer_address_id_foreign` (`customer_address_id`);

--
-- Indexes for table `e_order_processings`
--
ALTER TABLE `e_order_processings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_order_processings_order_id_foreign` (`order_id`);

--
-- Indexes for table `e_order_products`
--
ALTER TABLE `e_order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_order_products_order_id_foreign` (`order_id`),
  ADD KEY `e_order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `e_password_resets`
--
ALTER TABLE `e_password_resets`
  ADD KEY `e_password_resets_email_index` (`email`);

--
-- Indexes for table `e_process_logs`
--
ALTER TABLE `e_process_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_products`
--
ALTER TABLE `e_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_product_tags`
--
ALTER TABLE `e_product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_product_tags_product_id_foreign` (`product_id`);

--
-- Indexes for table `e_queries`
--
ALTER TABLE `e_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_recent_transactions`
--
ALTER TABLE `e_recent_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_recent_transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `e_reviews`
--
ALTER TABLE `e_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_reviews_order_id_foreign` (`order_id`),
  ADD KEY `e_reviews_product_id_foreign` (`product_id`),
  ADD KEY `e_reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `e_settings`
--
ALTER TABLE `e_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_shurjo_pay_payments`
--
ALTER TABLE `e_shurjo_pay_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_stories`
--
ALTER TABLE `e_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_sub_categories`
--
ALTER TABLE `e_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `e_sub_category_products`
--
ALTER TABLE `e_sub_category_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_sub_category_products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `e_sub_category_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `e_tags`
--
ALTER TABLE `e_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_users`
--
ALTER TABLE `e_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_wallet_requests`
--
ALTER TABLE `e_wallet_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_wallet_requests_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_admins`
--
ALTER TABLE `e_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_brands`
--
ALTER TABLE `e_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `e_brand_products`
--
ALTER TABLE `e_brand_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `e_categories`
--
ALTER TABLE `e_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `e_category_products`
--
ALTER TABLE `e_category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `e_compose_newsletters`
--
ALTER TABLE `e_compose_newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `e_countries`
--
ALTER TABLE `e_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_customers`
--
ALTER TABLE `e_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `e_customer_addresses`
--
ALTER TABLE `e_customer_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `e_discounts`
--
ALTER TABLE `e_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `e_failed_jobs`
--
ALTER TABLE `e_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_jobs`
--
ALTER TABLE `e_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_media`
--
ALTER TABLE `e_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `e_migrations`
--
ALTER TABLE `e_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `e_newsletters`
--
ALTER TABLE `e_newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `e_orders`
--
ALTER TABLE `e_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `e_order_processings`
--
ALTER TABLE `e_order_processings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `e_order_products`
--
ALTER TABLE `e_order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `e_process_logs`
--
ALTER TABLE `e_process_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_products`
--
ALTER TABLE `e_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `e_product_tags`
--
ALTER TABLE `e_product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `e_queries`
--
ALTER TABLE `e_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `e_recent_transactions`
--
ALTER TABLE `e_recent_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `e_reviews`
--
ALTER TABLE `e_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `e_settings`
--
ALTER TABLE `e_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `e_shurjo_pay_payments`
--
ALTER TABLE `e_shurjo_pay_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `e_stories`
--
ALTER TABLE `e_stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `e_sub_categories`
--
ALTER TABLE `e_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `e_sub_category_products`
--
ALTER TABLE `e_sub_category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `e_tags`
--
ALTER TABLE `e_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `e_users`
--
ALTER TABLE `e_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `e_wallet_requests`
--
ALTER TABLE `e_wallet_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `e_admins`
--
ALTER TABLE `e_admins`
  ADD CONSTRAINT `e_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `e_users` (`id`);

--
-- Constraints for table `e_brand_products`
--
ALTER TABLE `e_brand_products`
  ADD CONSTRAINT `e_brand_products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `e_brands` (`id`),
  ADD CONSTRAINT `e_brand_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `e_products` (`id`);

--
-- Constraints for table `e_category_products`
--
ALTER TABLE `e_category_products`
  ADD CONSTRAINT `e_category_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `e_categories` (`id`),
  ADD CONSTRAINT `e_category_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `e_products` (`id`);

--
-- Constraints for table `e_customers`
--
ALTER TABLE `e_customers`
  ADD CONSTRAINT `e_customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `e_users` (`id`);

--
-- Constraints for table `e_customer_addresses`
--
ALTER TABLE `e_customer_addresses`
  ADD CONSTRAINT `e_customer_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `e_users` (`id`);

--
-- Constraints for table `e_orders`
--
ALTER TABLE `e_orders`
  ADD CONSTRAINT `e_orders_customer_address_id_foreign` FOREIGN KEY (`customer_address_id`) REFERENCES `e_customer_addresses` (`id`),
  ADD CONSTRAINT `e_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `e_users` (`id`);

--
-- Constraints for table `e_order_processings`
--
ALTER TABLE `e_order_processings`
  ADD CONSTRAINT `e_order_processings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `e_orders` (`id`);

--
-- Constraints for table `e_product_tags`
--
ALTER TABLE `e_product_tags`
  ADD CONSTRAINT `e_product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `e_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
