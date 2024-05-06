-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2024 at 02:21 AM
-- Server version: 10.3.39-MariaDB-log
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `admin_type` varchar(255) NOT NULL DEFAULT 'Super Admin',
  `remember_token` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `avatar`, `phone_no`, `admin_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abu Saeed Sabuj', 'sabujsaeed@gmail.com', '$2a$04$d79v2HXr4h.Z7S/mOuBcSeopTtHLZtN7MpV4KA.MTQ/wM053L1JnS', NULL, '01710121630', 'Super Admin', 'xAqdmL1UClwpC1L7HcIPK4qUX5HLP9QV7c75pLqql4wyZe2iLYZza6hZGfCz', '2022-02-27 12:49:39', '2022-02-27 08:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `type`, `position`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(4, 'Banner Title', 'Vertical', 'top', '1645618069.jpg', 'ok', 'http://127.0.0.1:8000/admin/sliders', 4, '2022-02-23 06:06:24', '2022-02-23 06:07:49'),
(5, 'New Banner', 'Vertical', 'top', '1645618392.jpg', 'ok', 'http://127.0.0.1:8000/admin/sliders', 4, '2022-02-23 06:12:49', '2022-02-23 06:13:12'),
(6, 'Left Banner', 'Vertical', 'left', '1645619850.jpg', 'ok', 'http://127.0.0.1:8000/admin/sliders', 4, '2022-02-23 06:36:24', '2022-02-23 06:37:30'),
(7, 'Banner hori', 'Horizantal', 'left', '1647062674.jpg', 'Open', 'http://localhost/ecomfinal/public/admin/banners', 4, '2022-03-11 23:24:34', '2022-03-11 23:24:34'),
(8, 'Banner hori Right', 'Horizantal', 'Right', '1647062741.jpg', 'open', 'http://127.0.0.1:8000/admin/sliders', 1, '2022-03-11 23:25:41', '2022-03-11 23:25:41'),
(9, 'Offer shoe', 'Vertical', 'top', '1649750806.jpg', 'Explore now', 'http://localhost/ecomfinal/public/subcategory/36', 10, '2022-04-12 02:06:46', '2022-04-12 02:18:21'),
(10, 'Perfume', 'Vertical', 'left', '1649752124.jpg', 'Explore now', 'http://localhost/ecomfinal/public/subcategory/36', 10, '2022-04-12 02:28:44', '2022-04-12 02:29:20'),
(11, 'Green shoe', 'Horizantal', 'left', '1649769399.jpg', 'Explore now', 'http://localhost/ecomfinal/public/subcategory/36', 10, '2022-04-12 07:16:39', '2022-04-12 07:17:10'),
(12, 'Gromming', 'Horizantal', 'Right', '1649769540.jpg', 'Explore now', 'http://localhost/ecomfinal/public/subcategory/36', 10, '2022-04-12 07:19:00', '2022-04-12 07:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `country`, `created_at`, `updated_at`) VALUES
(4, 'Samsung ok', '<p>Sumsung Brand</p>', '1644990376.jpg', 'Bangladesh', '2022-02-15 23:33:55', '2022-03-20 23:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `product_id`, `created_at`, `updated_at`) VALUES
(59, NULL, NULL, '::1', 1, 29, '2022-06-24 01:57:39', '2022-06-24 01:57:39'),
(60, NULL, NULL, '103.165.93.210', 3, 30, '2022-06-24 02:40:28', '2022-07-01 05:32:59'),
(61, NULL, NULL, '103.155.219.206', 2, 29, '2022-06-27 12:32:46', '2022-06-27 12:32:50'),
(62, NULL, NULL, '144.48.115.26', 1, 28, '2022-06-28 00:55:19', '2022-06-28 00:55:19'),
(65, NULL, NULL, '103.49.201.66', 1, 29, '2022-07-27 00:18:15', '2022-07-27 00:18:15'),
(67, NULL, NULL, '115.127.97.50', 1, 30, '2022-08-03 04:39:42', '2022-08-03 04:39:42'),
(68, NULL, NULL, '72.230.67.168', 1, 29, '2022-08-10 02:31:34', '2022-08-10 02:31:34'),
(69, NULL, NULL, '203.89.127.82', 1, 30, '2022-10-11 23:19:47', '2022-10-11 23:19:47'),
(71, NULL, NULL, '103.165.93.210', 2, 28, '2022-10-20 00:59:55', '2022-10-21 21:57:52'),
(73, NULL, NULL, '5.188.0.58', 1, 30, '2022-10-21 21:58:59', '2022-10-21 21:58:59'),
(74, NULL, NULL, '180.148.211.49', 1, 30, '2022-12-03 05:56:18', '2022-12-03 05:56:18'),
(75, NULL, NULL, '103.165.93.79', 1, 30, '2022-12-07 05:13:03', '2022-12-07 05:13:03'),
(76, NULL, NULL, '103.165.93.79', 1, 29, '2022-12-07 05:13:06', '2022-12-07 05:13:06'),
(77, NULL, NULL, '37.111.200.29', 1, 29, '2023-01-13 23:45:04', '2023-01-13 23:45:04'),
(78, NULL, NULL, '203.76.222.53', 2, 30, '2023-01-14 01:05:03', '2023-04-30 07:56:31'),
(79, NULL, NULL, '202.134.14.146', 1, 28, '2023-01-17 11:03:04', '2023-01-17 11:03:04'),
(80, NULL, NULL, '103.217.110.243', 1, 30, '2023-03-19 23:34:52', '2023-03-19 23:34:52'),
(81, NULL, NULL, '103.88.140.66', 1, 30, '2023-04-11 13:35:54', '2023-04-11 13:35:54'),
(83, 4, NULL, '103.165.93.132', 1, 28, '2023-05-14 01:04:36', '2023-05-14 01:04:36'),
(84, NULL, NULL, '103.148.179.5', 1, 30, '2023-08-25 09:43:53', '2023-08-25 09:43:53'),
(85, NULL, NULL, '27.147.190.227', 1, 30, '2023-11-01 01:34:58', '2023-11-01 01:34:58'),
(86, NULL, NULL, '103.87.215.66', 7, 28, '2023-11-06 09:56:13', '2023-11-06 09:56:35'),
(87, 4, NULL, '103.120.6.104', 1, 31, '2024-01-21 07:26:14', '2024-01-21 07:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `show_homepage` tinyint(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `show_homepage`, `created_at`, `updated_at`) VALUES
(37, 'Fashion', NULL, '1651472267.jpg', NULL, 1, '2022-05-02 00:17:47', '2022-05-02 00:17:47'),
(38, 'Electronics', NULL, '1651472552.png', NULL, 0, '2022-05-02 00:22:32', '2022-05-02 00:22:32'),
(39, 'Beauty', NULL, '1651473053.png', NULL, 0, '2022-05-02 00:30:53', '2022-05-02 00:30:53'),
(40, 'Groceries', NULL, '1651473222.png', NULL, 1, '2022-05-02 00:33:42', '2022-05-02 00:33:42'),
(41, 'Sports', NULL, '1651473677.png', NULL, 1, '2022-05-02 00:41:17', '2022-05-02 00:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_12_142922_create_products_table', 2),
(6, '2022_02_12_145704_create_product_images_table', 3),
(7, '2022_02_14_131800_create_categories_table', 4),
(8, '2022_02_16_042423_create_brands_table', 5),
(9, '2022_02_16_113339_create_sellers_table', 6),
(10, '2022_02_21_051126_create_sliders_table', 7),
(12, '2022_02_22_131911_create_banners_table', 8),
(13, '2022_02_27_115025_create_admins_table', 9),
(14, '2022_03_02_122123_create_carts_table', 10),
(15, '2022_03_05_054129_create_payments_table', 11),
(16, '2022_03_05_055812_create_settings_table', 12),
(18, '2022_03_06_131052_create_orders_table', 13),
(19, '2022_03_21_134500_create_statistics_table', 14),
(20, '2022_04_08_104426_create_reviews_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `shipping_charge` int(100) NOT NULL,
  `custom_discount` int(11) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `phone_no`, `name`, `shipping_address`, `email`, `message`, `shipping_charge`, `custom_discount`, `transaction_id`, `is_paid`, `is_completed`, `is_seen_by_admin`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '::1', '01710121630', 'Abu Saeed', 'Fakirhat,Bagerhat Fakirhat', 'sabujsaeed@gmail.com', 'New Message', 45, 1227, NULL, 0, 1, 1, '2022-03-06 23:19:23', '2022-10-21 21:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sabujsaeed@gmail.com', '$2y$10$o8YZOZhFEH7ThfjthOjoduQRBCqrspYWI57ydAQZxy.O0o73a/X/C', '2022-02-27 06:15:57'),
('sabujsaeeda@gmail.com', '$2y$10$N6RXRfqEUFd7TNs4evwuTuP6MvSD.wJs4IwuscDp1IPcOIm8LT5Ny', '2022-02-27 08:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `no` varchar(255) DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `short_name`, `no`, `priority`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In', 'cash_in', NULL, 1, 'cash_in.jpg', NULL, '2022-03-05 05:51:16', '2022-03-05 05:51:16'),
(2, 'BKash', 'bkash', '01832675081', 2, 'bkash.jpg', 'personal', '2022-03-05 05:53:43', '2022-03-05 05:53:43'),
(3, 'Roket', 'roket', '01832675081', 1, 'roket.jpg', 'personal', '2022-03-05 05:54:59', '2022-03-05 05:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `place` varchar(100) DEFAULT NULL,
  `offer` tinyint(4) NOT NULL DEFAULT 0,
  `offerprice` int(11) DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `seller_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `category_id`, `place`, `offer`, `offerprice`, `brand_id`, `seller_id`, `description`, `slug`, `status`, `admin_id`, `created_at`, `updated_at`) VALUES
(28, 'Piles Relief', 233, 39, 'trandy', 0, NULL, NULL, NULL, 'Piles Relief', 'Piles Relief', 0, 1, '2022-05-02 00:58:57', '2022-05-02 00:58:57'),
(29, 'Nail Cream', 344, 39, 'popular', 0, NULL, NULL, NULL, 'Nail Cream', 'Nail Cream', 0, 1, '2022-05-02 01:04:57', '2022-05-02 01:04:57'),
(30, 'serter', 233232, 39, 'trandy', 0, NULL, 4, NULL, '<p>ddadasd</p>', 'sdasdadasd', 0, 1, '2022-06-24 01:59:27', '2022-06-24 01:59:27'),
(31, 'Hello Test product', 23, 39, 'popular', 1, 23, 4, 2, '<p>fwrere</p>', 'rerere', 0, 1, '2022-10-31 00:54:23', '2022-10-31 00:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(34, 28, '16514747370.jpg', '2022-05-02 00:58:57', '2022-05-02 00:58:57'),
(35, 29, '16514750970.jpg', '2022-05-02 01:04:57', '2022-05-02 01:04:57'),
(36, 30, '16560575670.png', '2022-06-24 01:59:27', '2022-06-24 01:59:27'),
(37, 31, '16671992630.webp', '2022-10-31 00:54:24', '2022-10-31 00:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `description`, `image`, `address`, `created_at`, `updated_at`) VALUES
(2, 'seller 3u ol', '<p>seller is &nbsp;a good person k</p>', '1645014166.jpg', 'Dhaka', '2022-02-16 06:01:47', '2022-02-16 06:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'sabujsaeed@gmail.com', '01710121630', 'Fakirhat,Bagerhat', 100, '2022-03-05 06:05:19', '2022-03-05 06:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(10, 'Headphone sell', '1649740922.jpg', 'Explore now', 'http://localhost/ecomfinal/public/subcategory/36', 10, '2022-04-11 23:22:02', '2022-04-11 23:22:02'),
(11, 'Special shoe', '1649741005.jpg', 'Explore now', 'http://localhost/ecomfinal/public/subcategory/36', 10, '2022-04-11 23:23:25', '2022-04-11 23:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `totalsell` varchar(255) NOT NULL,
  `totalprofit` varchar(255) NOT NULL,
  `visitors` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `shipping_address` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `avater` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `phone_no`, `email_verified_at`, `password`, `street_address`, `division_id`, `district_id`, `status`, `shipping_address`, `ip_address`, `avater`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Abu Saeed', 'Sabuj', 'sabujsaeed@gmail.com', 'Abu Saeed', '01710121630', NULL, '$2y$10$jNoxBIn7.5sz58W0fQk0KeVg2RYh2SvU5ctPaNP3LLif.SQdl8rT2', 'Fakirhat,Bagerhat', 1, 1, 1, NULL, '::1', NULL, NULL, '2022-02-26 07:43:02', '2022-02-26 07:48:08'),
(3, 'rterttrt', 'rtete', 'sabujsaeed55@gmail.com', 'rterttrt', '454545', NULL, '$2y$10$8RRprhe8Tkmfp78gCW.sxuJTTCoyG.ADfAbiuVUNEF8UtcK2y4ul.', '45ghghg', 1, 1, 0, NULL, '180.148.211.49', NULL, 'Cco63T4p1DkgKRS3Idm9IseSSkie9IP9dJwztM6N', '2022-12-01 03:00:18', '2022-12-01 03:00:18'),
(4, 'Choto Lok', 'Tui', 'demo@admin.com', 'Choto Lok', '01976453776', NULL, '$2y$10$8F9R79ywB.q62Dy/60wzoO7gLG/Hbs8zVHenB8BTuIFb7/QXaD4f6', 'xxx', 1, 1, 0, NULL, '103.165.93.132', NULL, 'zQElv2tKL9YAxMSeSZEnNiaTlvZyVNqgzo5oeD7getU9BahZJFX8QcnKZFrw', '2023-05-14 01:03:53', '2023-05-14 01:03:53'),
(5, 'Ursula', 'Barnes', 'fudihyd@mailinator.com', 'Ursula', '0122258822', NULL, '$2y$10$F.EovBs05f8iM0eREypTcuyyi/Zlpo7.a8PBJNrEA3kMaMqEayNTy', 'Impedit eu et tempo', 1, 1, 0, NULL, '103.87.215.66', NULL, 'XCBh5MOFoILDV2xgNbUaaVZuwcYBAXk6R7RPFwAD', '2023-11-06 09:58:04', '2023-11-06 09:58:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
