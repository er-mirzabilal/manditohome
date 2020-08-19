-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 01:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegstore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_price` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `shipping_price`, `available`, `created_at`, `updated_at`) VALUES
(1, 'Garden Town', 50, 1, '2020-07-06 20:27:37', '2020-07-06 20:27:37'),
(2, 'Wapda Town', 50, 1, '2020-07-06 20:27:37', '2020-07-06 20:27:37'),
(3, 'Model Town', 50, 1, '2020-07-06 20:27:37', '2020-07-06 20:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vegetables', 1, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(2, 'Fruits', 1, '2020-07-06 20:27:36', '2020-07-06 20:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(65, '2014_10_12_000000_create_users_table', 1),
(66, '2014_10_12_100000_create_password_resets_table', 1),
(67, '2019_08_19_000000_create_failed_jobs_table', 1),
(68, '2020_05_08_102340_create_areas_table', 1),
(69, '2020_05_08_102432_create_categories_table', 1),
(70, '2020_05_08_102534_create_products_table', 1),
(71, '2020_05_08_102553_create_orders_table', 1),
(72, '2020_05_08_102607_create_order_details_table', 1),
(73, '2020_07_07_011933_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_price` double(8,2) NOT NULL,
  `order_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loyalty_earned` int(11) DEFAULT NULL,
  `loyalty_spent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_contact`, `customer_address`, `delivery_area`, `delivery_fee`, `order_status`, `order_price`, `order_comment`, `loyalty_earned`, `loyalty_spent`, `created_at`, `updated_at`) VALUES
(1, 'Ali', '03011234567', 'i dont know', 'Garden Town', 50, 'pending', 943.00, 'I need small potatoes', 10, 2, '2020-07-07 02:29:09', '2020-07-07 02:29:09'),
(2, 'Ali', '03011234567', 'i dont know', 'Garden Town', 50, 'pending', 840.00, 'Apple not be green', 9, NULL, '2020-07-07 04:08:04', '2020-07-07 04:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quant_step` double(8,2) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `name`, `picture`, `sell_type`, `quant_step`, `quantity`, `price`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'Cauli Flower', 'cauli-flower.png', 'kg', 0.25, 1.25, 25.00, 1, '2020-07-07 02:29:09', '2020-07-07 02:29:09'),
(2, 'Cabbage', 'cabbage.png', 'kg', 0.25, 1.25, 30.00, 1, '2020-07-07 02:29:09', '2020-07-07 02:29:09'),
(3, 'Onions', 'onions.png', 'kg', 0.25, 1.25, 45.00, 1, '2020-07-07 02:29:09', '2020-07-07 02:29:09'),
(4, 'Tomato', 'tomato.png', 'kg', 0.25, 1.25, 50.00, 1, '2020-07-07 02:29:09', '2020-07-07 02:29:09'),
(5, 'Bell Pepper', 'bell-pepper.png', 'kg', 0.25, 1.25, 40.00, 1, '2020-07-07 02:29:09', '2020-07-07 02:29:09'),
(6, 'Potatoes', 'potatoes.png', 'kg', 0.50, 2.50, 20.00, 1, '2020-07-07 02:29:09', '2020-07-07 02:29:09'),
(7, 'Strawberry', 'strawberry.png', 'kg', 0.25, 1.50, 80.00, 2, '2020-07-07 04:08:04', '2020-07-07 04:08:04'),
(8, 'Orange', 'orange.png', 'dozen', 1.00, 5.00, 12.00, 2, '2020-07-07 04:08:04', '2020-07-07 04:08:04'),
(9, 'Red Apple', 'red-apple.png', 'kg', 0.25, 1.25, 50.00, 2, '2020-07-07 04:08:04', '2020-07-07 04:08:04'),
(10, 'Banana', 'banana.png', 'dozen', 1.00, 5.00, 10.00, 2, '2020-07-07 04:08:04', '2020-07-07 04:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quant_step` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `picture`, `sell_type`, `quant_step`, `price`, `status`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 'Potatoes', 'potatoes.png', 'kg', 0.50, 20.00, 1, 1, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(2, 'Bell Pepper', 'bell-pepper.png', 'kg', 0.25, 40.00, 1, 1, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(3, 'Cabbage', 'cabbage.png', 'kg', 0.25, 30.00, 1, 1, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(4, 'Cauli Flower', 'cauli-flower.png', 'kg', 0.25, 25.00, 1, 1, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(5, 'Onions', 'onions.png', 'kg', 0.25, 45.00, 1, 1, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(6, 'Tomato', 'tomato.png', 'kg', 0.25, 50.00, 1, 1, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(7, 'Banana', 'banana.png', 'dozen', 1.00, 10.00, 1, 2, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(8, 'Red Apple', 'red-apple.png', 'kg', 0.25, 50.00, 1, 2, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(9, 'Orange', 'orange.png', 'dozen', 1.00, 12.00, 1, 2, '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(10, 'Strawberry', 'strawberry.png', 'kg', 0.25, 80.00, 1, 2, '2020-07-06 20:27:37', '2020-07-06 20:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_name`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'Discount', 10, '2020-07-06 20:27:37', '2020-07-07 05:39:54'),
(2, 'Order Limit', 20, '2020-07-06 20:27:37', '2020-07-07 06:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loyalty_points` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `loyalty_points`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Waqas', '03001234567', NULL, '$2y$10$rI7PdDEXV/HOlX4q4PmImOfTaf2Dp1IMNRqYFzvS6yak8ezDF8SP6', 'i dont know', 0, 1, '2huGOKKeU0WFZkfMRuuJF03OyNnVwOydydRRFrXUXAD6ioPAu8Tqls7WP9YN', '2020-07-06 20:27:36', '2020-07-06 20:27:36'),
(2, 'Ali', '03011234567', NULL, '$2y$10$88Uc17S9lQi1gDWZeGtS3.cxiiuRf/ZB6OVcH1.GZPscof5UT1nuG', 'i dont know', 29, 0, 'HnuAg4le7cCkoidO9vOeDXEM17RBD92hRpHHDFLv502hnRJ9jIUVOWdtE8EN', '2020-07-06 20:27:36', '2020-07-07 04:08:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
