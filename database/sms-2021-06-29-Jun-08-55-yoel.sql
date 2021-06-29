-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 08:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_25_095026_add_is_admin_to_users_table', 1),
(5, '2021_06_25_102414_create_warehouses_table', 1),
(6, '2021_06_25_102433_create_products_table', 1),
(8, '2021_06_25_102522_create_stocks_table', 2);

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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `quantity`, `price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'wai wai quicks', 'wai wai quicks', 10, 200, 1, '2021-06-27 00:42:41', '2021-06-27 11:09:29', '2021-06-27 11:09:29'),
(2, 'potato cracker', 'potato cracker is my best', 10, 100, 1, '2021-06-27 00:43:57', '2021-06-27 00:43:57', NULL),
(3, 'goldstar', 'goldstar jutta and chappal', 150, 100000000000000, 1, '2021-06-27 10:50:32', '2021-06-27 11:02:47', '2021-06-27 11:02:47'),
(4, 'wai wai', 'product is tasty', 100, 2000, 1, '2021-06-27 11:13:47', '2021-06-27 11:13:47', NULL),
(5, 'Hattichhap', 'Lorem ex perspiciati', 176, 586, 1, '2021-06-27 11:14:09', '2021-06-27 11:14:09', NULL),
(6, 'Snickers', 'Non voluptate aliqua', 454, 908, 0, '2021-06-27 11:14:29', '2021-06-27 11:14:29', NULL),
(7, 'chockofun', 'chockofun is fun', 23, 5, 1, '2021-06-29 11:51:47', '2021-06-29 11:51:47', NULL),
(8, 'coke', 'coke coke', 50, 5000, 1, '2021-06-29 11:52:11', '2021-06-29 11:52:11', NULL),
(9, 'birla cement', 'birla cement majbuti', 500, 759, 1, '2021-06-29 11:52:55', '2021-06-29 11:52:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in',
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `batch_id`, `type`, `warehouse_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, '372756', 'in', 1, 1, 10, 200, '2019-06-17 19:21:44', '2021-06-27 11:08:54'),
(2, '372756', 'in', 1, 2, 10, 100, '2019-06-12 19:45:41', '2021-06-27 11:08:54'),
(3, '894124', 'in', 3, 2, 10, 100, '2020-06-12 05:56:20', '2021-06-27 11:16:13'),
(4, '894124', 'in', 3, 5, 176, 586, '2020-05-08 19:43:41', '2021-06-27 11:16:13'),
(5, '266714', 'in', 1, 5, 176, 586, '2021-06-29 10:17:35', '2021-06-29 10:17:35'),
(6, '271778', 'in', 1, 2, 10, 100, '2021-06-29 10:23:51', '2021-06-29 10:23:51'),
(7, '271778', 'in', 1, 4, 100, 2000, '2021-06-29 10:23:51', '2021-06-29 10:23:51'),
(8, '271778', 'out', 1, 5, 176, 586, '2021-06-29 10:23:51', '2021-06-29 10:24:01'),
(9, '271778', 'in', 3, 5, 176, 586, '2021-06-29 10:24:01', '2021-06-29 10:24:01'),
(10, '184998', 'in', 6, 7, 23, 5, '2021-06-29 11:54:04', '2021-06-29 11:54:04'),
(11, '184998', 'in', 6, 9, 500, 759, '2021-06-29 11:54:04', '2021-06-29 11:54:04'),
(12, '375046', 'out', 2, 4, 100, 2000, '2021-06-29 11:54:17', '2021-06-29 11:54:40'),
(13, '375046', 'out', 2, 8, 50, 5000, '2021-06-29 11:54:17', '2021-06-29 11:54:35'),
(14, '375046', 'in', 5, 8, 50, 5000, '2021-06-29 11:54:35', '2021-06-29 11:54:35'),
(15, '375046', 'in', 5, 4, 100, 2000, '2021-06-29 11:54:40', '2021-06-29 11:54:40');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$Xz6adaurJjEyAqoF//Z8tO/ml.q8aX2r7jEQABB3J1RZfRDGZqvWi', 'ApA1QI9k7Q5hJOwmg81ay75QPqFgFMpn3N4gt28VK9l75209e3twWUIXs9ll', '2021-06-27 00:40:58', '2021-06-27 00:40:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `description`, `location`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'warehouse 1', NULL, 'kapan', 1, '2021-06-27 00:41:40', '2021-06-27 00:42:07', NULL),
(2, 'warehouse 2', NULL, 'chabahil', 1, '2021-06-27 00:42:16', '2021-06-27 00:42:16', NULL),
(3, 'sukedhara warehouse', NULL, 'sukedhara', 1, '2021-06-27 11:15:38', '2021-06-27 11:15:38', NULL),
(4, 'Naksal warehouse', 'naksal warehouse', 'naksal', 1, '2021-06-27 11:15:54', '2021-06-27 11:15:54', NULL),
(5, 'Kalanki Warehouse', NULL, 'Kalanki', 0, '2021-06-29 11:46:13', '2021-06-29 11:46:13', NULL),
(6, 'jhapa warehouse', 'new jhapa warehpuse', 'jhapa', 1, '2021-06-29 11:53:28', '2021-06-29 11:53:28', NULL),
(7, 'random wareouse', 'random data', 'random', 1, '2021-06-29 11:53:45', '2021-06-29 11:53:45', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
