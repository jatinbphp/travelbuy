-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: dedi907.jnb2.host-h.net
-- Generation Time: Feb 14, 2025 at 07:53 AM
-- Server version: 10.5.27-MariaDB-deb11
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelbuy_db48`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'IAS423817281777', 39, 1, '2025-02-10 12:32:24', '2025-02-10 12:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_redemptions`
--

CREATE TABLE `coupon_redemptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MerchantID` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `coupon_code` varchar(255) DEFAULT NULL,
  `nappy_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_redemptions`
--

INSERT INTO `coupon_redemptions` (`id`, `MerchantID`, `product_id`, `product_name`, `product_price`, `coupon_code`, `nappy_code`, `created_at`, `updated_at`) VALUES
(1, 'TBUY64665380465', 39, 'Xtandi 40mg Tablets', 99999.00, '6789012470721357', NULL, '2024-07-24 07:23:22', '2024-07-24 07:23:22'),
(2, 'TBUY64665380465', 39, 'Xtandi 40mg Tablets', 30061.00, '6789014472049928', '721978001', '2024-07-29 10:13:58', '2024-07-29 10:13:58'),
(3, 'TBUY64665380465', 39, 'Xtandi 40mg Tablets', 30061.00, '6789014472049928', '721978001', '2024-07-29 10:14:14', '2024-07-29 10:14:14'),
(4, 'TBUY64665380465', 39, 'Xtandi 40mg Tablets', 30061.00, '6789019269440685', '721978001', '2024-07-29 10:47:14', '2024-07-29 10:47:14'),
(5, 'TBUY64665380465', 39, 'Xtandi 40mg Tablets', 30061.00, '6789014472049928', '721978001', '2024-07-29 11:16:55', '2024-07-29 11:16:55'),
(6, 'IAS423817281802', 39, 'Xtandi 40mg Tablets', 30061.00, '6789014472049928', '721978001', '2024-07-29 11:32:34', '2024-07-29 11:32:34'),
(7, 'IAS423817281802', 39, 'Xtandi 40mg Tablets', 30061.00, '6789014472049928', '721978001', '2024-07-29 11:52:37', '2024-07-29 11:52:37'),
(8, 'IAS423817281802', 39, 'Xtandi 40mg Tablets', 30061.00, '6789018170764944', '721978001', '2024-10-17 10:37:36', '2024-10-17 10:37:36'),
(9, 'IAS423817281802', 39, 'Xtandi 40mg Tablets', 30061.00, '6789018170764944', '721978001', '2024-10-17 10:48:49', '2024-10-17 10:48:49'),
(10, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 30061.00, '6789015258565219', '721978001', '2024-11-19 03:25:13', '2024-11-19 03:25:13'),
(11, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 30061.00, '6789017380226751', '721978001', '2024-11-19 04:12:55', '2024-11-19 04:12:55'),
(12, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 30061.00, '6789013077871108', '721978001', '2024-11-19 04:13:58', '2024-11-19 04:13:58'),
(13, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 30061.00, '6789013077871108', '721978001', '2024-11-19 04:15:05', '2024-11-19 04:15:05'),
(14, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 30061.00, '6789013077871108', '721978001', '2024-11-19 04:16:23', '2024-11-19 04:16:23'),
(15, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 30061.00, '6789015258565219', '721978001', '2024-11-19 05:01:06', '2024-11-19 05:01:06'),
(16, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 30061.00, '6789015258565219', '721978001', '2024-11-20 00:50:30', '2024-11-20 00:50:30'),
(17, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789017592664526', '721978001', '2024-11-21 11:07:07', '2024-11-21 11:07:07'),
(18, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016166743138', '721978001', '2024-11-21 11:38:29', '2024-11-21 11:38:29'),
(19, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016894885326', '721978001', '2024-11-21 11:49:05', '2024-11-21 11:49:05'),
(20, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016894885326', '721978001', '2024-11-21 11:49:47', '2024-11-21 11:49:47'),
(21, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016894885326', '721978001', '2024-11-21 11:50:36', '2024-11-21 11:50:36'),
(22, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016894885326', '721978001', '2024-11-21 13:10:07', '2024-11-21 13:10:07'),
(23, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016894885326', '721978001', '2024-11-21 13:10:55', '2024-11-21 13:10:55'),
(24, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789014245511642', '721978001', '2024-11-22 06:02:51', '2024-11-22 06:02:51'),
(25, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789015594306146', '721978001', '2024-11-22 06:18:58', '2024-11-22 06:18:58'),
(26, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789015594306146', '721978001', '2024-11-22 06:23:01', '2024-11-22 06:23:01'),
(27, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016665343091', '721978001', '2024-11-22 07:10:07', '2024-11-22 07:10:07'),
(28, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789013727266790', '721978001', '2024-11-22 07:14:50', '2024-11-22 07:14:50'),
(29, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789013727266790', '721978001', '2024-11-22 07:18:16', '2024-11-22 07:18:16'),
(30, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789015456969221', '721978001', '2024-11-22 07:25:14', '2024-11-22 07:25:14'),
(31, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789017863488506', '721978001', '2024-11-22 07:27:20', '2024-11-22 07:27:20'),
(32, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789017863488506', '721978001', '2024-11-22 07:28:07', '2024-11-22 07:28:07'),
(33, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789011682737888', '721978001', '2024-11-22 07:31:52', '2024-11-22 07:31:52'),
(34, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789018913064156', '721978001', '2024-11-22 07:32:56', '2024-11-22 07:32:56'),
(35, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789018913064156', '721978001', '2024-11-22 07:34:14', '2024-11-22 07:34:14'),
(36, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016065063695', '721978001', '2024-11-25 05:25:30', '2024-11-25 05:25:30'),
(37, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789016065063695', '721978001', '2024-11-25 08:36:21', '2024-11-25 08:36:21'),
(38, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789018627564673', '721978001', '2024-11-25 08:38:44', '2024-11-25 08:38:44'),
(39, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, '6789013090648699', '721978001', '2024-11-25 08:46:55', '2024-11-25 08:46:55'),
(40, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, NULL, '721978001', '2024-11-28 05:04:22', '2024-11-28 05:04:22'),
(41, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 100.00, NULL, '721978001', '2024-11-28 06:02:30', '2024-11-28 06:02:30'),
(42, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 1000.00, NULL, '721978001', '2025-01-06 06:51:19', '2025-01-06 06:51:19'),
(43, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 1000.00, NULL, '721978001', '2025-02-07 07:48:24', '2025-02-07 07:48:24'),
(44, 'IAS423817281777', 39, 'Xtandi 40mg Tablets', 1000.00, NULL, '721978001', '2025-02-10 11:51:32', '2025-02-10 11:51:32');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_01_135541_create_products_table', 1),
(6, '2024_07_02_080728_create_carts_table', 1),
(9, '2024_07_24_070010_create_coupon_redemptions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `image` varchar(255) DEFAULT NULL,
  `nappy_code` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `status`, `image`, `nappy_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Apple MacBook Pro', 5000.00, 'active', 'uploads/products/7JMiFOLrJm5PmpJCDpbc.jpeg', NULL, '2024-07-05 11:08:35', '2024-07-05 11:03:14', '2024-07-05 11:08:35'),
(2, 'Samsung Galaxy S21 FE', 8000.00, 'active', 'uploads/products/CvMTFFYoXvQTvCxpVkSc.jpeg', NULL, '2024-07-08 07:37:19', '2024-07-05 11:04:22', '2024-07-08 07:37:19'),
(3, 'Nikon D3500 DSLR Camera', 3000.00, 'active', 'uploads/products/kO8phaVTl0f4jKsYbsJI.jpeg', NULL, '2024-07-08 07:37:24', '2024-07-05 11:05:18', '2024-07-08 07:37:24'),
(4, 'Sony WH-1000XM4 Headphones', 1000.00, 'active', NULL, NULL, '2024-07-08 07:37:14', '2024-07-05 11:07:33', '2024-07-08 07:37:14'),
(5, 'Venclexta', 24418.07, 'inactive', NULL, NULL, NULL, '2024-07-08 07:37:10', '2024-12-12 09:18:12'),
(6, 'Forcid Solutab 875/125', 15.57, 'inactive', NULL, NULL, NULL, '2024-07-08 07:39:25', '2024-12-12 09:18:12'),
(7, 'Tagrisso 40 mg', 2777.75, 'inactive', NULL, NULL, NULL, '2024-07-08 07:39:35', '2024-12-12 09:18:12'),
(8, 'Imfinzi 120 mg', 4171.05, 'inactive', NULL, NULL, NULL, '2024-07-08 07:40:07', '2024-12-12 09:18:12'),
(9, 'Lynparza', 708.48, 'inactive', NULL, NULL, NULL, '2024-07-08 07:40:15', '2024-12-12 09:18:12'),
(10, 'Nexavar', 239.78, 'inactive', NULL, NULL, NULL, '2024-07-08 07:40:31', '2024-12-12 09:18:12'),
(11, 'Stivarga 40 mg', 657.20, 'inactive', NULL, NULL, NULL, '2024-07-08 07:40:39', '2024-12-12 09:18:12'),
(12, 'Halaven', 2900.82, 'inactive', NULL, NULL, NULL, '2024-07-08 07:40:47', '2024-12-12 09:18:12'),
(13, 'LENVIMA 4', 429.33, 'inactive', NULL, NULL, NULL, '2024-07-08 07:40:56', '2024-12-12 09:18:12'),
(14, 'LENVIMA 10', 1073.33, 'inactive', NULL, NULL, NULL, '2024-07-08 07:41:04', '2024-12-12 09:18:12'),
(15, 'IMBRUVICA® 140 mg', 923.67, 'inactive', NULL, NULL, NULL, '2024-07-08 07:41:15', '2024-12-12 09:18:12'),
(16, 'IMBRUVICA® 420 mg', 2771.00, 'inactive', NULL, NULL, NULL, '2024-07-08 07:41:48', '2024-12-12 09:18:12'),
(17, 'IMBRUVICA® 560 mg', 3694.66, 'inactive', NULL, NULL, NULL, '2024-07-08 07:41:57', '2024-12-12 09:18:12'),
(18, 'ZYTIGA 500 MG', 318.21, 'inactive', NULL, NULL, NULL, '2024-07-08 07:42:06', '2024-12-12 09:18:12'),
(19, 'ZYTIGA 250 MG', 159.11, 'inactive', NULL, NULL, NULL, '2024-07-08 07:42:14', '2024-12-12 09:18:12'),
(20, 'ERLEADA', 268.75, 'inactive', NULL, NULL, NULL, '2024-07-08 07:42:22', '2024-12-12 09:18:12'),
(21, 'Palbociclib Pfizer 125 mg', 847.17, 'inactive', NULL, NULL, NULL, '2024-07-08 07:42:50', '2024-12-12 09:18:12'),
(22, 'DARZALEX', 1209.40, 'inactive', NULL, NULL, NULL, '2024-07-08 07:42:56', '2024-12-12 09:18:12'),
(23, 'Palbociclib Pfizer 100 mg', 847.17, 'inactive', NULL, NULL, NULL, '2024-07-08 07:43:18', '2024-12-12 09:18:12'),
(24, 'Palbociclib Pfizer 75 mg', 847.17, 'inactive', NULL, NULL, NULL, '2024-07-08 07:43:20', '2024-12-12 09:18:12'),
(25, 'Sutent 12.5mg Capsule', 366.52, 'inactive', NULL, NULL, NULL, '2024-07-08 07:43:40', '2024-12-12 09:18:12'),
(26, 'Sutent 25mg Capsule', 733.04, 'inactive', NULL, NULL, NULL, '2024-07-08 07:44:39', '2024-12-12 09:18:12'),
(27, 'Sutent 50mg Capsule', 1466.09, 'inactive', NULL, NULL, NULL, '2024-07-08 07:44:49', '2024-12-12 09:18:12'),
(28, 'Xalkori 200mg', 1120.99, 'inactive', NULL, NULL, NULL, '2024-07-08 07:45:04', '2024-12-12 09:18:12'),
(29, 'Xalkori 250mg', 1120.99, 'inactive', NULL, NULL, NULL, '2024-07-08 07:45:14', '2024-12-12 09:18:12'),
(30, 'INLYTA 1mg', 73.92, 'inactive', NULL, NULL, NULL, '2024-07-08 07:45:23', '2024-12-12 09:18:12'),
(31, 'INLYTA 5mg', 369.61, 'inactive', NULL, NULL, NULL, '2024-07-08 07:45:33', '2024-12-12 09:18:12'),
(32, 'Avastin 100Mg 4Ml', 1158.89, 'inactive', NULL, NULL, NULL, '2024-07-08 07:45:52', '2024-12-12 09:18:12'),
(33, 'Avastin 400Mg 16Ml', 1158.89, 'inactive', NULL, NULL, NULL, '2024-07-08 07:45:54', '2024-12-12 09:18:12'),
(34, 'Perjeta', 1428.57, 'inactive', NULL, NULL, NULL, '2024-07-08 07:46:12', '2024-12-12 09:18:12'),
(35, 'Herceptin SC 600mg', 1820.00, 'inactive', NULL, NULL, NULL, '2024-07-08 07:46:21', '2024-12-12 09:18:12'),
(36, 'Herceptin 21 mg/ml IV', 404.76, 'inactive', NULL, NULL, NULL, '2024-07-08 07:46:32', '2024-12-12 09:18:12'),
(37, 'MABTHERA SC 1400mg', 1852.48, 'inactive', NULL, NULL, NULL, '2024-07-08 07:46:42', '2024-12-12 09:18:12'),
(38, 'TECENTRIQ 840 MG', 1437.63, 'inactive', NULL, NULL, NULL, '2024-07-08 07:46:55', '2024-12-12 09:18:12'),
(39, 'Xtandi 40mg Tablets', 1000.00, 'active', 'uploads/products/LgGO9XwVOt9M4NHG3eyn.png', '721978001', NULL, '2024-07-24 06:21:04', '2024-12-12 09:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `upload_csvs`
--

CREATE TABLE `upload_csvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_csvs`
--

INSERT INTO `upload_csvs` (`id`, `user_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'TBUY64665380465', 'public/uploads/csvFile/csvFile-1723809487-TBUY64665380465.csv', '2024-08-16 09:58:08', '2024-08-16 09:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, '$2y$12$NR6rvnEz3Nsp4m02Qo18F.fiPfzOjbFFg6.vXf0x0MoVJ.UuiriMe', NULL, '2024-10-16 05:48:01', '2024-10-16 05:48:01'),
(2, 'Jesse', 'jesse@travelbuy.co.za', NULL, '$2y$12$nvRF1mF9Uylho9.jsfNUeeJ/hpkxeji19EmNBY8WooGxVuKgkOGJ.', NULL, '2024-10-16 05:48:01', '2024-10-16 05:48:01'),
(3, 'Fran', 'fran@travelbuy.co.za', NULL, '$2y$12$7SFYRnbGEwseqUxuVgwFceooscHclR1.r1wpY9O2.K5WOkLCzR65i', NULL, '2024-10-16 05:48:02', '2024-10-16 05:48:02'),
(4, 'Tshego', 'tshego@travelbuy.co.za', NULL, '$2y$12$IY.CLQqD48O6tpipJphgMuzH0EcZU3S2nObZpy6awlwzhQTEH6BR2', NULL, '2024-10-16 05:48:02', '2024-10-16 05:48:02'),
(5, 'Jaylen', 'jaylen@travelbuy.co.za', NULL, '$2y$12$CpOTV/34nbarXrfTkJ0DUu0sf4KHsZrifsL7nZJaGyvBcEaZIQ4S6', NULL, '2024-10-16 05:48:02', '2024-10-16 05:48:02'),
(6, 'Zubair', 'zubair@travelbuy.co.za', NULL, '$2y$12$l3DRWA2mffia14GMUNKGy.POoeQ9LisxxVYRoeen2Z9kZsjiuA0bS', NULL, '2024-10-16 05:48:03', '2024-10-16 05:48:03'),
(7, 'Nyeleti Hlungwani', 'info@asknow.co.za', NULL, '$2y$12$gD7BcKYS7lZRFtC26IDpoeKiw/pxWK2YRrCWJwJkI7UIhyBCP8mlK', NULL, '2024-11-21 04:25:49', '2024-11-21 04:25:49'),
(8, 'Lindani Dube', 'lindani@asknow.co.za', NULL, '$2y$12$6MwAiHN3A15Z1QEMVq9QeO6F9X8YxB7apmi1jyqbEyR4F5cBH.cIC', NULL, '2024-11-21 04:25:50', '2024-11-21 04:25:50'),
(9, 'Comfort Maluleke', 'comfort@asknow.co.za', NULL, '$2y$12$G.fsJxutKlvpELgmUGOG4uNiRddsWyGw6wruHUYPyHM5wwPC6Atne', NULL, '2024-11-21 04:25:50', '2024-11-21 04:25:50'),
(10, 'Nomsa Mtshali', 'nomsa@asknow.co.za', NULL, '$2y$12$.fMyhmrIr8MXayfMeGmSbekydxGAU0umF048jQEPUZjoQOyvap5u2', NULL, '2024-11-21 04:25:50', '2024-11-21 04:25:50'),
(11, 'Lauren Pretorius', 'lauren@ias.org.za', NULL, '$2y$12$XRDxYtG61PnFP1T6rLnGHuD0Ns0BLvJiJqX4N5lKHWs7bUimthtj2', NULL, '2024-11-21 04:25:51', '2024-11-21 04:25:51'),
(12, 'Sibusiso Nkosi', 'sibusiso@ias.org.za', NULL, '$2y$12$mgty4svgjd4KJ.OfkVzvpOa50pqNLRL.R6ELQZ.jFF0rLtRYlAZda', NULL, '2024-11-21 04:25:51', '2024-11-21 04:25:51'),
(13, 'Lynda Woods', 'lynda@ias.org.za', NULL, '$2y$12$e3NDZuy8Vntq01lFdPYMZuoz.Ls5iDLBU5Fho4AMrtNKOArtQgQbq', NULL, '2024-11-21 04:25:51', '2024-11-21 04:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_procurements`
--

CREATE TABLE `voucher_procurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `form_data` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_procurements`
--

INSERT INTO `voucher_procurements` (`id`, `user_id`, `form_data`, `created_at`, `updated_at`) VALUES
(1, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"hv\"],\"quantity\":[\"10\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"Test@gmail.com\"],\"additionalData\":[{\"patient_name\":\"Raj\",\"patient_surname\":\"Nens\",\"patient_id_number\":\"123645\",\"ICD10\":\"123654\",\"CPT4\":\"14543232\",\"molecule\":\"1548822\",\"nappi_code\":\"NAPPY1\"}]}', '2024-09-02 12:08:44', '2024-09-02 12:08:44'),
(2, 'TBUY64665380465', '{\"merchantId\":{\"0\":\"TBUY64665380465\",\"2\":\"TBUY64665380465\"},\"pluCode\":{\"0\":\"hvoucher\",\"2\":\"2\"},\"quantity\":{\"0\":\"2\",\"2\":\"1\"},\"voucherAmount\":{\"0\":\"200\",\"2\":\"1250\"},\"notificationMethod\":{\"0\":\"Email\",\"2\":\"Email\"},\"notificationAddress\":{\"0\":\"Test@gmail.com\",\"2\":\"testt@gmail.com\"},\"additionalData\":{\"0\":{\"patient_name\":\"Raj\",\"patient_surname\":\"Testttt\",\"patient_id_number\":\"3232323\",\"ICD10\":\"1597536428\",\"CPT4\":\"456987123\",\"molecule\":\"147852369\",\"nappi_code\":\"NAPPI123\"},\"2\":{\"patient_name\":\"Test\",\"patient_surname\":\"Testing\",\"patient_id_number\":\"1574823\",\"ICD10\":\"147852369\",\"CPT4\":\"1256478\",\"molecule\":\"23153\",\"nappi_code\":\"N12233\"}}}', '2024-09-02 12:13:34', '2024-09-02 12:13:34'),
(3, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"hvoucher\"],\"quantity\":[\"3\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"SMS\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"efg9082561561464\",\"ICD10\":\"asthma\",\"CPT4\":\".\",\"molecule\":\"0\",\"nappi_code\":\"1\"}]}', '2024-09-03 10:58:17', '2024-09-03 10:58:17'),
(4, 'IAS423817281777', '{\"merchantId\":[\"IAS423817281777\"],\"pluCode\":[\"hvoucher\"],\"quantity\":[\"8\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"efg9082561561464\",\"ICD10\":\"asthma\",\"CPT4\":\".\",\"molecule\":\"0\",\"nappi_code\":\"1\"}]}', '2024-09-03 11:29:13', '2024-09-03 11:29:13'),
(5, 'IAS423817281777', '{\"merchantId\":[\"IAS423817281777\"],\"pluCode\":[\"2\"],\"quantity\":[\"3\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"efg9082561561464\",\"ICD10\":\"asthma\",\"CPT4\":\".\",\"molecule\":\"0\",\"nappi_code\":\"1\"}]}', '2024-09-03 11:44:08', '2024-09-03 11:44:08'),
(6, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"123\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"Test@gmail.com\"],\"additionalData\":[{\"patient_name\":\"Test\",\"patient_surname\":\"Testttt\",\"patient_id_number\":\"3232323\",\"ICD10\":\"123\",\"CPT4\":\"234\",\"molecule\":\"234\",\"nappi_code\":\"NAPPI123\"}]}', '2024-09-04 02:25:39', '2024-09-04 02:25:39'),
(7, 'IAS423817281777', '{\"merchantId\":{\"2\":\"IAS423817281777\"},\"pluCode\":{\"2\":\"2\"},\"quantity\":{\"2\":\"1\"},\"voucherAmount\":{\"2\":\"600\"},\"notificationMethod\":{\"2\":\"Email\"},\"notificationAddress\":{\"2\":\"tshegofatso.moeng@travelbuy.co.za\"},\"additionalData\":{\"2\":{\"patient_name\":\"tshego\",\"patient_surname\":\"moeng\",\"patient_id_number\":\"0799689336\",\"ICD10\":\"1\",\"CPT4\":\"0\",\"molecule\":\"panado\",\"nappi_code\":\"1\"}}}', '2024-09-04 08:23:43', '2024-09-04 08:23:43'),
(8, 'IAS423817281777', '{\"merchantId\":[\"IAS423817281777\"],\"pluCode\":[\"2\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"efg9082561561464\",\"ICD10\":\"asthma\",\"CPT4\":\".\",\"molecule\":\"0\",\"nappi_code\":\"1\",\"patient_delivery_address\":\"1st Floor, Waterford House, Century Blvd, Century City, Cape Town, 7441\"}]}', '2024-09-05 05:41:36', '2024-09-05 05:41:36'),
(9, 'IAS423817281777', '{\"merchantId\":[\"IAS423817281777\"],\"pluCode\":[\"2\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"efg9082561561464\",\"ICD10\":\"asthma\",\"CPT4\":\"Xtandi 40mg\",\"molecule\":\"0\",\"nappi_code\":\"1\",\"patient_delivery_address\":\"1st Floor, Waterford House, Century Blvd, Century City, Cape Town, 7441\"}]}', '2024-09-05 05:42:29', '2024-09-05 05:42:29'),
(10, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"123456789\",\"ICD10\":\"asthma\",\"CPT4\":\"1\",\"molecule\":\"1\",\"nappi_code\":\"1\",\"patient_delivery_address\":\"7441 Century City, Cape Town Goodwood\"}]}', '2024-09-05 05:51:53', '2024-09-05 05:51:53'),
(11, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"123456789\",\"ICD10\":\"asthma\",\"CPT4\":\"1\",\"molecule\":\"1\",\"nappi_code\":\"1\",\"patient_delivery_address\":\"7441 Century City, Cape Town Goodwood\"}]}', '2024-09-05 05:53:10', '2024-09-05 05:53:10'),
(12, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"Test@gmail.com\"],\"additionalData\":[{\"patient_name\":\"Test\",\"patient_surname\":\"Testttt\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"111\",\"CPT4\":\"1111\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-05 08:21:02', '2024-09-05 08:21:02'),
(13, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"2\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"gert@gsdm.co.za, info@gsdm.co.za\"],\"additionalData\":[{\"patient_name\":\"John\",\"patient_surname\":\"Doe\",\"patient_id_number\":\"1234567890123\",\"ICD10\":\"987\",\"CPT4\":\"654\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"123 Test Street, Highveld, Centurion\"}]}', '2024-09-05 08:21:10', '2024-09-05 08:21:10'),
(14, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"Test@gmail.com\"],\"additionalData\":[{\"patient_name\":\"Test\",\"patient_surname\":\"Testttt\",\"patient_id_number\":\"3232323323232\",\"ICD10\":\"232\",\"CPT4\":\"23423\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-05 09:24:30', '2024-09-05 09:24:30'),
(15, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9008260319086\",\"ICD10\":\"asthma\",\"CPT4\":\"1\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"7441 Century City, Cape Town Goodwood\"}]}', '2024-09-05 10:23:27', '2024-09-05 10:23:27'),
(16, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9034567893459\",\"ICD10\":\"asthma\",\"CPT4\":\"1\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"7441 Century City, Cape Town Goodwood\"}]}', '2024-09-05 10:36:12', '2024-09-05 10:36:12'),
(17, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9034567893456\",\"ICD10\":\"asthma\",\"CPT4\":\"1\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"7441 Century City, Cape Town Goodwood\"}]}', '2024-09-05 10:42:38', '2024-09-05 10:42:38'),
(18, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9034567893456\",\"ICD10\":\"asthma\",\"CPT4\":\"1\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"7441 Century City, Cape Town Goodwood\"}]}', '2024-09-05 10:44:15', '2024-09-05 10:44:15'),
(19, 'IAS423817281777', '{\"merchantId\":[\"IAS423817281777\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"5\"],\"voucherAmount\":[\"456.00\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"thalaine.mirfin@traderoot.com,michael.bosman@traderoot.com\"],\"additionalData\":[{\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"9210060085647\",\"ICD10\":\"20\",\"CPT4\":\"000\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"Work, Century City\"}]}', '2024-09-05 10:50:17', '2024-09-05 10:50:17'),
(20, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9034567893456\",\"ICD10\":\"asthma\",\"CPT4\":\"1\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"7441 Century City, Cape Town Goodwood\"}]}', '2024-09-05 11:04:03', '2024-09-05 11:04:03'),
(21, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"jatin@info.com,thalaine@info.in\"],\"additionalData\":[{\"patient_name\":\"Raj\",\"patient_surname\":\"Testttt\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"234\",\"CPT4\":\"123\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-05 11:14:19', '2024-09-05 11:14:19'),
(22, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"jatin@info.com,thalaine@info.in\"],\"additionalData\":[{\"patient_name\":\"Test\",\"patient_surname\":\"Testttt\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"123654\",\"CPT4\":\"14543232\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-05 11:31:00', '2024-09-05 11:31:00'),
(23, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"Email\"],\"notificationAddress\":[\"jatin@info.com,thalaine@info.in\"],\"additionalData\":[{\"patient_name\":\"Test\",\"patient_surname\":\"Testttt\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"232\",\"CPT4\":\"23423\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-05 11:32:17', '2024-09-05 11:32:17'),
(24, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"14\"],\"voucherAmount\":[\"20000\"],\"notificationMethod\":[\"02\"],\"notificationAddress\":[\"1234567890\"],\"additionalData\":[{\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-06 04:07:38', '2024-09-06 04:07:38'),
(25, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"15\"],\"voucherAmount\":[\"200\"],\"notificationMethod\":[\"02\"],\"notificationAddress\":[\"1231231212\"],\"additionalData\":[{\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-06 08:04:42', '2024-09-06 08:04:42'),
(26, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"02\"],\"notificationAddress\":[\"1231231212\"],\"additionalData\":[{\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-06 11:26:56', '2024-09-06 11:26:56'),
(27, 'IAS423817281801', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"12\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"02\"],\"notificationAddress\":[\"1231231212\"],\"additionalData\":[{\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"}]}', '2024-09-06 11:32:43', '2024-09-06 11:32:43'),
(28, 'IAS423817281801', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"10\",\"2\":\"15\"},\"voucherAmount\":{\"0\":\"12000\",\"2\":\"15000\"},\"notificationMethod\":{\"0\":\"02\",\"2\":\"02\"},\"notificationAddress\":{\"0\":\"1231231212\",\"2\":\"2222222222\"},\"additionalData\":{\"0\":{\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"},\"2\":{\"patient_name\":\"David\",\"patient_surname\":\"Kane\",\"patient_id_number\":\"1597536482012\",\"ICD10\":\"iCD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"United Kingdom\"}}}', '2024-09-06 11:42:31', '2024-09-06 11:42:31'),
(29, 'IAS423817281801', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"10\",\"2\":\"5\"},\"voucherAmount\":{\"0\":\"100\",\"2\":\"1250\"},\"notificationMethod\":{\"0\":\"02\",\"2\":\"02\"},\"notificationAddress\":{\"0\":\"1231231212\",\"2\":\"2222222222\"},\"additionalData\":{\"0\":{\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"},\"2\":{\"patient_name\":\"David\",\"patient_surname\":\"Kane\",\"patient_id_number\":\"1597536482012\",\"ICD10\":\"iCD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"United Kingdom\"}}}', '2024-09-06 12:28:47', '2024-09-06 12:28:47'),
(30, 'IAS423817281801', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"10\",\"2\":\"5\"},\"voucherAmount\":{\"0\":\"200\",\"2\":\"1250\"},\"notificationMethod\":{\"0\":\"02\",\"2\":\"02\"},\"notificationAddress\":{\"0\":\"1231231212\",\"2\":\"2222222222\"},\"additionalData\":{\"0\":{\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"},\"2\":{\"patient_name\":\"David\",\"patient_surname\":\"Kane\",\"patient_id_number\":\"1597536482012\",\"ICD10\":\"iCD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"United Kingdom\"}}}', '2024-09-10 05:09:23', '2024-09-10 05:09:23'),
(31, 'IAS423817281801', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"10\",\"2\":\"5\"},\"voucherAmount\":{\"0\":\"200\",\"2\":\"15000\"},\"notificationMethod\":{\"0\":\"02\",\"2\":\"02\"},\"notificationAddress\":{\"0\":\"1231231212\",\"2\":\"2222222222\"},\"additionalData\":{\"0\":{\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"South Africa\"},\"2\":{\"patient_name\":\"David\",\"patient_surname\":\"Kane\",\"patient_id_number\":\"1597536482012\",\"ICD10\":\"iCD10\",\"CPT4\":\"CPT4\",\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_delivery_address\":\"United Kingdom\"}}}', '2024-09-12 07:05:43', '2024-09-12 07:05:43'),
(32, 'IAS423817281801', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"10\"],\"voucherAmount\":[\"1250\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"Test@gmail.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Lance\",\"patient_medical_scheme\":\"1236547890\",\"pharmacy_name\":\"TENEXUS\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"ABC Complex\",\"address_2\":\"13th Street\",\"suburb\":\"47 W 13th St\",\"city\":\"New York\",\"region\":\"NY\",\"country_code\":\"USA\",\"postal_code\":\"10011\"}]}', '2024-10-08 08:15:21', '2024-10-08 08:15:21'),
(33, 'IAS423817281801', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"15\"],\"voucherAmount\":[\"1250\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"Test@gmail.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"patient_name\":\"James\",\"patient_surname\":\"Testttt\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Lance\",\"patient_medical_scheme\":\"1236547890\",\"pharmacy_name\":\"TENEXUS\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"ABC Complex\",\"address_2\":\"13th Street\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7440\"}]}', '2024-10-08 12:23:42', '2024-10-08 12:23:42'),
(34, 'IAS423817281801', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"7\",\"2\":\"3\"},\"voucherAmount\":{\"0\":\"12500\",\"2\":\"15000\"},\"notificationMethod\":{\"0\":\"01\",\"2\":\"01\"},\"notificationAddress\":{\"0\":\"Test@gmail.com\",\"2\":\"testt@gmail.com\"},\"additionalData\":{\"0\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"500mg\",\"patient_name\":\"James\",\"patient_surname\":\"Nicolas\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Lance\",\"patient_medical_scheme\":\"1236547890\",\"pharmacy_name\":\"TENEXUS\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"ABC Complex\",\"address_2\":\"13th Street\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"10011\"},\"2\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"250mg\",\"patient_name\":\"David\",\"patient_surname\":\"Kane\",\"patient_id_number\":\"1597536482012\",\"patient_medical_scheme_name\":\"nxsol\",\"patient_medical_scheme\":\"1597536482\",\"pharmacy_name\":\"ABCDEFGHIJKL\",\"ICD10\":\"iCD10\",\"CPT4\":\"CPT4\",\"address_1\":\"XYZ Plaza\",\"address_2\":\"Ring Road\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7440\"}}}', '2024-10-11 03:53:05', '2024-10-11 03:53:05'),
(35, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80\",\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9008260319086\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"12345678765\",\"pharmacy_name\":\"clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"1\",\"address_1\":\"192 BUSH STREET\",\"address_2\":\"WATERFORD HOUSE\",\"suburb\":\"Century City\",\"city\":\"CAPE TOWN\",\"region\":\"WESTERN CAPE\",\"country_code\":\"South Africa\",\"postal_code\":\"7441\"}]}', '2024-10-14 06:37:12', '2024-10-14 06:37:12'),
(36, 'TBUY64665380465', '{\"merchantId\":[\"TBUY64665380465\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"600.50\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80\",\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9008260319086\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"12345678765\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"Asthma\",\"CPT4\":\"1\",\"address_1\":\"Century City\",\"address_2\":\"WATERFORD HOUSE\",\"suburb\":\"Century City\",\"city\":\"CAPE TOWN\",\"region\":\"WESTERN CAPE\",\"country_code\":\"South Africa\",\"postal_code\":\"7441\"}]}', '2024-10-14 07:13:28', '2024-10-14 07:13:28'),
(37, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"123456\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"200mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"Xtandi 40mg\",\"address_1\":\"1234 Oak\",\"address_2\":\"Randburg\",\"suburb\":\"Johannesburg\",\"city\":\"randburg\",\"region\":\"gauteng\",\"country_code\":\"2196\",\"postal_code\":\"1236\"}]}', '2024-10-24 11:17:12', '2024-10-24 11:17:12'),
(38, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"123456\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"200mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"Chemo\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-10-29 04:22:11', '2024-10-29 04:22:11'),
(39, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"123456\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"200mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"Chemotherapy\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-11-04 08:30:45', '2024-11-04 08:30:45'),
(40, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"123456\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"200mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"Chemotherapy\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-11-04 10:13:55', '2024-11-04 10:13:55'),
(41, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"123456\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"200mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"15826394127\",\"pharmacy_name\":\"Clicks Ce\",\"ICD10\":\"Asthma\",\"CPT4\":\"Pathology and Laboratory Procedures\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-11-12 07:40:44', '2024-11-12 07:40:44'),
(42, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"134679\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"2\"],\"voucherAmount\":[\"750\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"jaylen@gmail.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80\",\"patient_name\":\"Jaylen\",\"patient_surname\":\"Juries\",\"patient_id_number\":\"0125469836458\",\"patient_medical_scheme_name\":\"Bonitas\",\"patient_medical_scheme\":\"226589348\",\"pharmacy_name\":\"Dischem Centurion\",\"ICD10\":\"Typhoid fever\",\"CPT4\":\"Surgery\",\"address_1\":\"45 Maple Crescent\",\"address_2\":\"Highveld Road\",\"suburb\":\"Centurion\",\"city\":\"Pretoria\",\"region\":\"Gauteng\",\"country_code\":\"27\",\"postal_code\":\"0157\"}]}', '2024-11-12 08:10:23', '2024-11-12 08:10:23'),
(43, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"569587662\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"5\"],\"voucherAmount\":[\"6008.50\"],\"notificationMethod\":[\"02\"],\"notificationAddress\":[\"0786913644\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"40\",\"patient_name\":\"Jesse\",\"patient_surname\":\"Azzouni-Kreusch\",\"patient_id_number\":\"9265486792264\",\"patient_medical_scheme_name\":\"KeyHealth\",\"patient_medical_scheme\":\"66693548\",\"pharmacy_name\":\"MediRite  Blouberg\",\"ICD10\":\"Flu\",\"CPT4\":\"Anesthesia\",\"address_1\":\"12 Beach Road\",\"address_2\":\"Blouberg Lifestyle Estate\",\"suburb\":\"Bloubergstrand\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7441\"}]}', '2024-11-12 08:27:07', '2024-11-12 08:27:07'),
(44, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"753951\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"3\"],\"voucherAmount\":[\"10300\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"fran88@yahoo.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"160mg\",\"patient_name\":\"Fran\",\"patient_surname\":\"Botha\",\"patient_id_number\":\"8812623549963\",\"patient_medical_scheme_name\":\"Fedhealth\",\"patient_medical_scheme\":\"96854712\",\"pharmacy_name\":\"M-Kem  Plattekloof\",\"ICD10\":\"Hypertension\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Oak Avenue\",\"address_2\":\"Burgundy Estate\",\"suburb\":\"Plattekloof\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-12 08:42:42', '2024-11-12 08:42:42'),
(45, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"8695473\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"10\"],\"voucherAmount\":[\"1000\"],\"notificationMethod\":[\"02\"],\"notificationAddress\":[\"0654589678\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"40mg\",\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"7856123486123\",\"patient_medical_scheme_name\":\"Momentum Health\",\"patient_medical_scheme\":\"665864779\",\"pharmacy_name\":\"Clicks  Waverley\",\"ICD10\":\"Gastro\",\"CPT4\":\"Critical Care Services\",\"address_1\":\"78 Springbok Street\",\"address_2\":\"Apartment  66\",\"suburb\":\"Waverley\",\"city\":\"Pretoria\",\"region\":\"Gauteng\",\"country_code\":\"27\",\"postal_code\":\"1086\"}]}', '2024-11-12 08:49:11', '2024-11-12 08:49:11'),
(46, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"1458632\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"9\"],\"voucherAmount\":[\"550\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"lee@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"100mg\",\"patient_name\":\"Lee\",\"patient_surname\":\"Martins\",\"patient_id_number\":\"6531479865455\",\"patient_medical_scheme_name\":\"Genesis Medical Scheme\",\"patient_medical_scheme\":\"6548332147\",\"pharmacy_name\":\"Dischem Rivonia\",\"ICD10\":\"Cholera\",\"CPT4\":\"Emergency Department Services\",\"address_1\":\"15 Rosewood Lane\",\"address_2\":\"Block 111\",\"suburb\":\"Rivonia\",\"city\":\"Sandton\",\"region\":\"Gauteng\",\"country_code\":\"ZA\",\"postal_code\":\"2128\"}]}', '2024-11-12 08:54:39', '2024-11-12 08:54:39'),
(47, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"02\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"010103013\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7440\"}]}', '2024-11-13 07:40:42', '2024-11-13 07:40:42'),
(48, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"65412398\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"13\"],\"voucherAmount\":[\"8600\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"michael.bosman@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"0125469836458\",\"patient_medical_scheme_name\":\"Momentum Health\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks  Century City\",\"ICD10\":\"Hypertension\",\"CPT4\":\"Consultations\",\"address_1\":\"1st Floor\",\"address_2\":\"Century Blvd\",\"suburb\":\"Century City\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"7441\"}]}', '2024-11-13 08:37:59', '2024-11-13 08:37:59'),
(49, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"5000\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"michael.bosman@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-14 12:14:18', '2024-11-14 12:14:18'),
(50, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"5000\"],\"notificationMethod\":[\"02\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-14 12:29:02', '2024-11-14 12:29:02'),
(51, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"50.00\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-15 06:05:11', '2024-11-15 06:05:11'),
(52, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"50\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michaelmbosman@gmail.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-15 06:14:05', '2024-11-15 06:14:05'),
(53, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"1\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michaelmbosman@gmail.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-15 06:19:59', '2024-11-15 06:19:59'),
(54, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"20\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michaelmbosman@gmail.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-15 07:43:33', '2024-11-15 07:43:33'),
(55, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"5\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-18 07:22:03', '2024-11-18 07:22:03'),
(56, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"2\"],\"voucherAmount\":[\"10\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"Thalaine.Mirfin@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"24mg\",\"patient_name\":\"Thalaine\",\"patient_surname\":\"Mirfin\",\"patient_id_number\":\"1111111111112\",\"patient_medical_scheme_name\":\"Medical Aid\",\"patient_medical_scheme\":\"01101010103\",\"pharmacy_name\":\"M-KEM 23 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"53 Greenwood way\",\"address_2\":\"Pinehurst\",\"suburb\":\"Durbanville\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7570\"}]}', '2024-11-18 07:30:01', '2024-11-18 07:30:01'),
(57, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"15.00\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"10mg\",\"patient_name\":\"Justin\",\"patient_surname\":\"Leigh\",\"patient_id_number\":\"1111111111113\",\"patient_medical_scheme_name\":\"Life insurance\",\"patient_medical_scheme\":\"01101010104\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"11 Street Av\",\"address_2\":\"Pinehurst\",\"suburb\":\"Parrow\",\"city\":\"Pretoria\",\"region\":\"Gauteng\",\"country_code\":\"ZA\",\"postal_code\":\"4817\"}]}', '2024-11-18 07:32:00', '2024-11-18 07:32:00'),
(58, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michael.bosman@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"100mg\",\"patient_name\":\"Marco\",\"patient_surname\":\"Matthee\",\"patient_id_number\":\"1111111111141\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010105\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"52 Greenwood way\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7570\"}]}', '2024-11-18 07:57:18', '2024-11-18 07:57:18'),
(59, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS4238172819902\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"60070\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9265486792033\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks  Century City\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Century City\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"7441\"}]}', '2024-11-18 08:01:43', '2024-11-18 08:01:43'),
(60, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS4238172818012\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"50\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"5311111111111111111111mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-18 09:35:45', '2024-11-18 09:35:45'),
(61, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS42381728180\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"5000\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-18 09:37:38', '2024-11-18 09:37:38'),
(62, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"10\"],\"voucherAmount\":[\"25.69\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"Kehnyn.vanderspuy@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53MG\",\"patient_name\":\"Kehnyn\",\"patient_surname\":\"van der Spuy\",\"patient_id_number\":\"8945612370429\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"1045369\",\"pharmacy_name\":\"Dischem century city\",\"ICD10\":\"1052\",\"CPT4\":\"89564\",\"address_1\":\"4 waterford house\",\"address_2\":\"Century city boulevard\",\"suburb\":\"Century City\",\"city\":\"Cape Town\",\"region\":\"Western cape\",\"country_code\":\"South Africa\",\"postal_code\":\"1683\"}]}', '2024-11-19 06:42:36', '2024-11-19 06:42:36'),
(63, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"11\"],\"voucherAmount\":[\"12.33\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0794418818\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"25mg\",\"patient_name\":\"Kehnyn\",\"patient_surname\":\"van der Spuy\",\"patient_id_number\":\"9945612370401\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"1045370\",\"pharmacy_name\":\"Clicks Century city\",\"ICD10\":\"1187\",\"CPT4\":\"654789\",\"address_1\":\"10 waterford house\",\"address_2\":\"Century city boulevard\",\"suburb\":\"Century City\",\"city\":\"Cape Town\",\"region\":\"Western cape\",\"country_code\":\"South Africa\",\"postal_code\":\"1683\"}]}', '2024-11-19 06:59:02', '2024-11-19 06:59:02'),
(64, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"15\"],\"voucherAmount\":[\"26.99\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"Kehnyn.vanderspuy@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"25mg\",\"patient_name\":\"Rushin\",\"patient_surname\":\"Bester\",\"patient_id_number\":\"9604150423657\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"1045370\",\"pharmacy_name\":\"Clicks Century city\",\"ICD10\":\"15894\",\"CPT4\":\"89564\",\"address_1\":\"6 rocktree close\",\"address_2\":\"Pinehurst\",\"suburb\":\"Durbanville\",\"city\":\"Cape Town\",\"region\":\"Western cape\",\"country_code\":\"South Africa\",\"postal_code\":\"1683\"}]}', '2024-11-19 07:19:18', '2024-11-19 07:19:18'),
(65, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"50\"],\"voucherAmount\":[\"125.84\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"Kehnyn.vanderspuy@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"36mg\",\"patient_name\":\"Brett\",\"patient_surname\":\"Pienaar\",\"patient_id_number\":\"0104158469753\",\"patient_medical_scheme_name\":\"Momentum\",\"patient_medical_scheme\":\"2569874\",\"pharmacy_name\":\"Dischem century city\",\"ICD10\":\"98745\",\"CPT4\":\"6546658\",\"address_1\":\"27 long street\",\"address_2\":\"City centre\",\"suburb\":\"Gardens\",\"city\":\"Cape Town\",\"region\":\"Western cape\",\"country_code\":\"South Africa\",\"postal_code\":\"1683\"}]}', '2024-11-19 07:27:54', '2024-11-19 07:27:54'),
(66, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"100\"],\"voucherAmount\":[\"256.99\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0794418818\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"40mg\",\"patient_name\":\"Lutho\",\"patient_surname\":\"Ndzamela\",\"patient_id_number\":\"0112254569874\",\"patient_medical_scheme_name\":\"Dis-chem Health\",\"patient_medical_scheme\":\"25896347\",\"pharmacy_name\":\"24H MChem\",\"ICD10\":\"951753684\",\"CPT4\":\"32158749\",\"address_1\":\"65 Durban road\",\"address_2\":\"Oakdale\",\"suburb\":\"Durbanville\",\"city\":\"Cape Town\",\"region\":\"Western cape\",\"country_code\":\"ZA\",\"postal_code\":\"1683\"}]}', '2024-11-19 07:35:13', '2024-11-19 07:35:13');
INSERT INTO `voucher_procurements` (`id`, `user_id`, `form_data`, `created_at`, `updated_at`) VALUES
(67, 'tshego@travelbuy.co.za', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"3\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"3\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"6\",\"3\":\"10\"},\"voucherAmount\":{\"0\":\"125.84\",\"3\":\"10.25\"},\"notificationMethod\":{\"0\":\"03\",\"3\":\"03\"},\"notificationAddress\":{\"0\":\"kehnyn01@gmail.com\",\"3\":\"kehnyn01@gmail.com\"},\"additionalData\":{\"0\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53MG\",\"patient_name\":\"Kehnyn\",\"patient_surname\":\"van der Spuy\",\"patient_id_number\":\"9604150423657\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"1045369\",\"pharmacy_name\":\"Dischem century city\",\"ICD10\":\"15894\",\"CPT4\":\"89564\",\"address_1\":\"3 Mount Alverstone Crescent\",\"address_2\":\"Pinehurst\",\"suburb\":\"Olifantsfontein\",\"city\":\"Olifantsfontein\",\"region\":\"Western cape\",\"country_code\":\"South Africa\",\"postal_code\":\"1683\"},\"3\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"54mg\",\"patient_name\":\"Tester\",\"patient_surname\":\"testing\",\"patient_id_number\":\"5469875123659\",\"patient_medical_scheme_name\":\"Meditest\",\"patient_medical_scheme\":\"854612374\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"54678952\",\"CPT4\":\"365687465123\",\"address_1\":\"3 Mount Alverstone Crescent\",\"address_2\":\"Test\",\"suburb\":\"Olifantsfontein\",\"city\":\"Olifantsfontein\",\"region\":\"Test\",\"country_code\":\"South Africa\",\"postal_code\":\"1683\"}}}', '2024-11-19 07:46:35', '2024-11-19 07:46:35'),
(68, 'tshego@travelbuy.co.za', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"10\",\"2\":\"15\"},\"voucherAmount\":{\"0\":\"125.84\",\"2\":\"96.38\"},\"notificationMethod\":{\"0\":\"03\",\"2\":\"03\"},\"notificationAddress\":{\"0\":\"kehnyn.vanderspuy@traderoot.com\",\"2\":\"Michael.bosman@traderoot.com\"},\"additionalData\":{\"0\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"25mg\",\"patient_name\":\"Kehnyn\",\"patient_surname\":\"van der Spuy\",\"patient_id_number\":\"9945612370401\",\"patient_medical_scheme_name\":\"Momentum\",\"patient_medical_scheme\":\"25896347\",\"pharmacy_name\":\"24H MChem\",\"ICD10\":\"951753684\",\"CPT4\":\"89564\",\"address_1\":\"3 Mount Alverstone Crescent\",\"address_2\":\"Century city boulevard\",\"suburb\":\"Olifantsfontein\",\"city\":\"Cape Town\",\"region\":\"Western cape\",\"country_code\":\"South Africa\",\"postal_code\":\"1683\"},\"2\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"50mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"0106034569871\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"9874561\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"9874563\",\"CPT4\":\"8546127\",\"address_1\":\"34 waterford house\",\"address_2\":\"Century city boulavard\",\"suburb\":\"Century city\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"9564\"}}}', '2024-11-19 08:06:41', '2024-11-19 08:06:41'),
(69, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"50\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michael.bosman@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-19 08:50:13', '2024-11-19 08:50:13'),
(70, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"7500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Jaylen\",\"patient_surname\":\"Juries\",\"patient_id_number\":\"9265486792033\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"15826394127\",\"pharmacy_name\":\"MediRite  Blouberg\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Blouberg Lifestyle Estate\",\"suburb\":\"Bloubergstrand\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"7550\"}]}', '2024-11-19 10:25:40', '2024-11-19 10:25:40'),
(71, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"50\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michael.bosman@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-19 13:46:46', '2024-11-19 13:46:46'),
(72, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-11-21 10:38:41', '2024-11-21 10:38:41'),
(73, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"Tshegofatso.Moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"MediRite  Blouberg\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-11-21 10:42:38', '2024-11-21 10:42:38'),
(74, 'jaylen@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500000000\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"Jaylen.Juries@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80\",\"patient_name\":\"Tshego\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"1234567891911\",\"patient_medical_scheme_name\":\"Samwu\",\"patient_medical_scheme\":\"12345678765\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"Asthma\",\"CPT4\":\"1\",\"address_1\":\"Century City\",\"address_2\":\"WATERFORD HOUSE\",\"suburb\":\"Century City\",\"city\":\"CAPE TOWN\",\"region\":\"WESTERN CAPE\",\"country_code\":\"South Africa\",\"postal_code\":\"7441\"}]}', '2024-11-21 11:31:18', '2024-11-21 11:31:18'),
(75, 'lynda@ias.org.za', '{\"merchantId\":[\"IAS42381728180\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"3\"],\"voucherAmount\":[\"600\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0824415007\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"40 mg - 4 daily\",\"patient_name\":\"Joe\",\"patient_surname\":\"Soap\",\"patient_id_number\":\"1234567891234\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"135792\",\"pharmacy_name\":\"Dischem\",\"ICD10\":\"c61\",\"CPT4\":\"111\",\"address_1\":\"1 fird\",\"address_2\":\"xxx\",\"suburb\":\"xxx\",\"city\":\"jhb\",\"region\":\"gp\",\"country_code\":\"4\",\"postal_code\":\"4\"}]}', '2024-11-22 05:26:12', '2024-11-22 05:26:12'),
(76, 'lynda@ias.org.za', '{\"merchantId\":[\"IAS42381728180\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"3\"],\"voucherAmount\":[\"8000\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"lynda@ias.org.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"40 mg - 4 daily\",\"patient_name\":\"Jim\",\"patient_surname\":\"Soap\",\"patient_id_number\":\"1234567891234\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"135792\",\"pharmacy_name\":\"Dischem\",\"ICD10\":\"c61\",\"CPT4\":\"111\",\"address_1\":\"1 fird\",\"address_2\":\"xxx\",\"suburb\":\"Oxford\",\"city\":\"Oxford\",\"region\":\"gp\",\"country_code\":\"South Africa\",\"postal_code\":\"2199\"}]}', '2024-11-22 05:36:52', '2024-11-22 05:36:52'),
(77, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michael.bosman@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Pinehurst\",\"suburb\":\"Durbanville\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-22 05:47:59', '2024-11-22 05:47:59'),
(78, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michael.bosman@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"100mg\",\"patient_name\":\"Thalaine\",\"patient_surname\":\"Mirfin\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Medical Aid\",\"patient_medical_scheme\":\"01101010105\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"52 Greenwood way\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-22 05:56:31', '2024-11-22 05:56:31'),
(79, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"200\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"michael.bosman@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"100mg\",\"patient_name\":\"Thalaine\",\"patient_surname\":\"Mirfin\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Medical Aid\",\"patient_medical_scheme\":\"01101010105\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"52 Greenwood way\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-22 06:14:58', '2024-11-22 06:14:58'),
(80, 'tshego@travelbuy.co.za', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"1\",\"2\":\"1\"},\"voucherAmount\":{\"0\":\"100\",\"2\":\"200\"},\"notificationMethod\":{\"0\":\"03\",\"2\":\"03\"},\"notificationAddress\":{\"0\":\"michael.bosman@traderoot.com\",\"2\":\"michael.bosman@traderoot.com\"},\"additionalData\":{\"0\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"24mg\",\"patient_name\":\"Justin\",\"patient_surname\":\"Leigh\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Life insurance\",\"patient_medical_scheme\":\"01101010105\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"52 Greenwood way\",\"address_2\":\"Pinehurst\",\"suburb\":\"Parrow\",\"city\":\"Pretoria\",\"region\":\"Gauteng\",\"country_code\":\"ZA\",\"postal_code\":\"7570\"},\"2\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"250mg\",\"patient_name\":\"Marco\",\"patient_surname\":\"Chan\",\"patient_id_number\":\"1111111111112\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010106\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"50 Blue av\",\"address_2\":\"Century City\",\"suburb\":\"Parrow\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7670\"}}}', '2024-11-22 06:44:33', '2024-11-22 06:44:33'),
(81, 'tshego@travelbuy.co.za', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"1\",\"2\":\"1\"},\"voucherAmount\":{\"0\":\"100\",\"2\":\"200\"},\"notificationMethod\":{\"0\":\"03\",\"2\":\"03\"},\"notificationAddress\":{\"0\":\"michael.bosman@traderoot.com\",\"2\":\"michael.bosman@traderoot.com\"},\"additionalData\":{\"0\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"120mg\",\"patient_name\":\"Brett\",\"patient_surname\":\"Pienaar\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Medical Aid\",\"patient_medical_scheme\":\"01101010103\",\"pharmacy_name\":\"M-KEM 23 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Pinehurst\",\"suburb\":\"Parrow\",\"city\":\"Pretoria\",\"region\":\"Gauteng\",\"country_code\":\"ZA\",\"postal_code\":\"4817\"},\"2\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"30mg\",\"patient_name\":\"Deon\",\"patient_surname\":\"Smith\",\"patient_id_number\":\"1111111111112\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010106\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"50 Green av\",\"address_2\":\"Avalon\",\"suburb\":\"Kraaifontien\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7671\"}}}', '2024-11-22 06:53:18', '2024-11-22 06:53:18'),
(82, 'tshego@travelbuy.co.za', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"1\",\"2\":\"1\"},\"voucherAmount\":{\"0\":\"100\",\"2\":\"200\"},\"notificationMethod\":{\"0\":\"03\",\"2\":\"03\"},\"notificationAddress\":{\"0\":\"michael.bosman@traderoot.com\",\"2\":\"michael.bosman@traderoot.com\"},\"additionalData\":{\"0\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"45mg\",\"patient_name\":\"Lutho\",\"patient_surname\":\"John\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Medical Aid\",\"patient_medical_scheme\":\"01101010103\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"11 Street Av\",\"address_2\":\"Gold\",\"suburb\":\"Parrow\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7570\"},\"2\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"30mg\",\"patient_name\":\"Rushin\",\"patient_surname\":\"Bester\",\"patient_id_number\":\"1111111111112\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010106\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"50 Purple av\",\"address_2\":\"Avalon\",\"suburb\":\"Bellville\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7671\"}}}', '2024-11-22 07:03:37', '2024-11-22 07:03:37'),
(83, 'tshego@travelbuy.co.za', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS423817281801\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"1\",\"2\":\"1\"},\"voucherAmount\":{\"0\":\"100\",\"2\":\"200\"},\"notificationMethod\":{\"0\":\"01\",\"2\":\"03\"},\"notificationAddress\":{\"0\":\"0614470174\",\"2\":\"michael.bosman@traderoot.com\"},\"additionalData\":{\"0\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"10mg\",\"patient_name\":\"Justin\",\"patient_surname\":\"Leigh\",\"patient_id_number\":\"1111111111113\",\"patient_medical_scheme_name\":\"Life insurance\",\"patient_medical_scheme\":\"01101010104\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"11 Street Av\",\"address_2\":\"Pinehurst\",\"suburb\":\"Parrow\",\"city\":\"Pretoria\",\"region\":\"Gauteng\",\"country_code\":\"ZA\",\"postal_code\":\"4817\"},\"2\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"50mg\",\"patient_name\":\"Lutho\",\"patient_surname\":\"John\",\"patient_id_number\":\"1111111111117\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010105\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"11 Street Av\",\"address_2\":\"Pinehurst\",\"suburb\":\"Parrow\",\"city\":\"Pretoria\",\"region\":\"Gauteng\",\"country_code\":\"ZA\",\"postal_code\":\"4817\"}}}', '2024-11-22 07:53:24', '2024-11-22 07:53:24'),
(84, 'nomsa@asknow.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"200\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"nomsa@asknow.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"10 ml\",\"patient_name\":\"Nomsa\",\"patient_surname\":\"Mtshali\",\"patient_id_number\":\"9203100862086\",\"patient_medical_scheme_name\":\"GEMS\",\"patient_medical_scheme\":\"123445\",\"pharmacy_name\":\"Discheme\",\"ICD10\":\"Q12.9\",\"CPT4\":\"0110\",\"address_1\":\"Randburg\",\"address_2\":\"31 Princesses Ave\",\"suburb\":\"Randburg\",\"city\":\"Randburg\",\"region\":\"Johannesburg\",\"country_code\":\"2194\",\"postal_code\":\"2194\"}]}', '2024-11-22 07:59:21', '2024-11-22 07:59:21'),
(85, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"5\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-22 09:47:49', '2024-11-22 09:47:49'),
(86, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"2\"],\"voucherAmount\":[\"10\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"Thalaine.Mirfin@traderoot.com\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"24mg\",\"patient_name\":\"Thalaine\",\"patient_surname\":\"Mirfin\",\"patient_id_number\":\"1111111111112\",\"patient_medical_scheme_name\":\"Medical Aid\",\"patient_medical_scheme\":\"01101010103\",\"pharmacy_name\":\"M-KEM 23 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"53 Greenwood way\",\"address_2\":\"Pinehurst\",\"suburb\":\"Durbanville\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7570\"}]}', '2024-11-22 09:54:14', '2024-11-22 09:54:14'),
(87, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"15\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"10mg\",\"patient_name\":\"Justin\",\"patient_surname\":\"Leigh\",\"patient_id_number\":\"1111111111113\",\"patient_medical_scheme_name\":\"Life insurance\",\"patient_medical_scheme\":\"01101010104\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"11 Street Av\",\"address_2\":\"Pinehurst\",\"suburb\":\"Parrow\",\"city\":\"Pretoria\",\"region\":\"Gauteng\",\"country_code\":\"ZA\",\"postal_code\":\"4817\"}]}', '2024-11-22 10:01:26', '2024-11-22 10:01:26'),
(88, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS42381728180\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"5\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2024-11-22 10:05:00', '2024-11-22 10:05:00'),
(89, 'tshego@travelbuy.co.za', '{\"merchantId\":{\"0\":\"IAS423817281801\",\"2\":\"IAS42381728180\"},\"pluCode\":{\"0\":\"2\\/hv\\/hvoucher\",\"2\":\"2\\/hv\\/hvoucher\"},\"quantity\":{\"0\":\"1\",\"2\":\"1\"},\"voucherAmount\":{\"0\":\"5\",\"2\":\"50\"},\"notificationMethod\":{\"0\":\"01\",\"2\":\"02\"},\"notificationAddress\":{\"0\":\"0614470174\",\"2\":\"0614470174\"},\"additionalData\":{\"0\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"},\"2\":{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}}}', '2024-11-22 10:16:26', '2024-11-22 10:16:26'),
(90, 'lynda@ias.org.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"lynda@ias.org.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"40 mg - 4 daily\",\"patient_name\":\"Jim\",\"patient_surname\":\"Soap\",\"patient_id_number\":\"1234567891234\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"135792\",\"pharmacy_name\":\"Dischem\",\"ICD10\":\"c61\",\"CPT4\":\"111\",\"address_1\":\"1 First Road\",\"address_2\":\"Apartment 3\",\"suburb\":\"Craighall\",\"city\":\"Johannesburg\",\"region\":\"Gauteng\",\"country_code\":\"South Africa\",\"postal_code\":\"2196\"}]}', '2024-11-25 05:15:18', '2024-11-25 05:15:18'),
(91, 'sibusiso@ias.org.za', '{\"merchantId\":[\"IAS423817281804\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"6\"],\"voucherAmount\":[\"30000\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"sibusiso@campaign4cancer.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"400gm\",\"patient_name\":\"Sibusiso\",\"patient_surname\":\"Nkosi\",\"patient_id_number\":\"9305285318089\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"489246507\",\"pharmacy_name\":\"Dischem\",\"ICD10\":\"C61\",\"CPT4\":\"4428\",\"address_1\":\"20B Rothesay Avenue\",\"address_2\":\"Craighall Park\",\"suburb\":\"Craighall Park\",\"city\":\"Craighall Park\",\"region\":\"Gauteng\",\"country_code\":\"South Africa\",\"postal_code\":\"2196\"}]}', '2024-11-25 08:33:24', '2024-11-25 08:33:24'),
(92, 'sibusiso@ias.org.za', '{\"merchantId\":[\"IAS423817281804\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"6\"],\"voucherAmount\":[\"30000\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0659618804\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"400g\",\"patient_name\":\"Sibusiso\",\"patient_surname\":\"Nkosi\",\"patient_id_number\":\"9305285318089\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"468464598\",\"pharmacy_name\":\"Dischem\",\"ICD10\":\"C61\",\"CPT4\":\"4428\",\"address_1\":\"20B Rothesay Avenue\",\"address_2\":\"Craighall Park\",\"suburb\":\"Craighall Park\",\"city\":\"Craighall Park\",\"region\":\"Gauteng\",\"country_code\":\"South Africa\",\"postal_code\":\"2196\"}]}', '2024-11-25 08:43:10', '2024-11-25 08:43:10'),
(93, 'lynda@ias.org.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"lynda@ias.org.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"40 mg - 4 daily\",\"patient_name\":\"Jim\",\"patient_surname\":\"Soap\",\"patient_id_number\":\"1234567891234\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"135792\",\"pharmacy_name\":\"Dischem\",\"ICD10\":\"c61\",\"CPT4\":\"111\",\"address_1\":\"1 First Road\",\"address_2\":\"Apartment 3\",\"suburb\":\"Craighall\",\"city\":\"Johannesburg\",\"region\":\"Gauteng\",\"country_code\":\"South Africa\",\"postal_code\":\"2196\"}]}', '2024-12-09 08:43:17', '2024-12-09 08:43:17'),
(94, 'TBUY64665380465', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Jaylen\",\"patient_surname\":\"Juries\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"MediRite  Blouberg\",\"ICD10\":\"asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Blouberg Lifestyle Estate\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"1236\"}]}', '2024-12-12 09:12:09', '2024-12-12 09:12:09'),
(95, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"15826394127\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-12-12 09:13:33', '2024-12-12 09:13:33'),
(96, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-12-13 04:58:11', '2024-12-13 04:58:11'),
(97, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"10000\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-12-13 05:04:05', '2024-12-13 05:04:05'),
(98, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"60000\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"160mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks  Century City\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-12-17 07:39:45', '2024-12-17 07:39:45'),
(99, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"10000\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks  Century City\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Century City\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2024-12-20 07:56:28', '2024-12-20 07:56:28'),
(100, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"10000\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng12345678\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2025-01-06 05:04:57', '2025-01-06 05:04:57'),
(101, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"5\"],\"notificationMethod\":[\"01\"],\"notificationAddress\":[\"0614470174\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"53mg\",\"patient_name\":\"Michael\",\"patient_surname\":\"Bosman\",\"patient_id_number\":\"1111111111111\",\"patient_medical_scheme_name\":\"Dental\",\"patient_medical_scheme\":\"01101010102\",\"pharmacy_name\":\"M-KEM 24 HOUR PHARMACY\",\"ICD10\":\"ICD10\",\"CPT4\":\"CPT4\",\"address_1\":\"10 Street Av\",\"address_2\":\"Century City\",\"suburb\":\"Milerton\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"ZA\",\"postal_code\":\"7550\"}]}', '2025-01-06 06:10:31', '2025-01-06 06:10:31'),
(102, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"randburg\",\"region\":\"Gauteng\",\"country_code\":\"27\",\"postal_code\":\"7441\"}]}', '2025-02-06 11:29:48', '2025-02-06 11:29:48'),
(103, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"1200\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2025-02-07 07:44:00', '2025-02-07 07:44:00'),
(104, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281801\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"tshegofatso.moeng@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Tshegofatso\",\"patient_surname\":\"Moeng\",\"patient_id_number\":\"9002623652664\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"123456\",\"pharmacy_name\":\"Clicks  Century City\",\"ICD10\":\"Asthma\",\"CPT4\":\"Consultations\",\"address_1\":\"123 Main Street\",\"address_2\":\"Apartment 4\",\"suburb\":\"Claremont\",\"city\":\"Cape Town\",\"region\":\"Western Cape\",\"country_code\":\"27\",\"postal_code\":\"8001\"}]}', '2025-02-10 05:44:10', '2025-02-10 05:44:10'),
(105, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"1234567890\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"ryan.cooper@travel.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"1\",\"patient_name\":\"Ryan\",\"patient_surname\":\"Cooper\",\"patient_id_number\":\"0212115101082\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"1234567\",\"pharmacy_name\":\"Clicks Fourways\",\"ICD10\":\"Asthma\",\"CPT4\":\"asthma\",\"address_1\":\"1 Knox Road\",\"address_2\":\"Lonehill\",\"suburb\":\"Sandton\",\"city\":\"Sandton\",\"region\":\"Gauteng\",\"country_code\":\"South Africa\",\"postal_code\":\"2062\"}]}', '2025-02-10 10:31:39', '2025-02-10 10:31:39'),
(106, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281777\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"100\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"ryan.cooper@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Ryan\",\"patient_surname\":\"Cooper\",\"patient_id_number\":\"0212115101082\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"1234567\",\"pharmacy_name\":\"Clicks Fourways\",\"ICD10\":\"Asthma\",\"CPT4\":\"asthma\",\"address_1\":\"1 Knox Road\",\"address_2\":\"Lonehill\",\"suburb\":\"Sandton\",\"city\":\"Sandton\",\"region\":\"Gauteng\",\"country_code\":\"South Africa\",\"postal_code\":\"2062\"}]}', '2025-02-10 11:23:30', '2025-02-10 11:23:30'),
(107, 'tshego@travelbuy.co.za', '{\"merchantId\":[\"IAS423817281777\"],\"pluCode\":[\"2\\/hv\\/hvoucher\"],\"quantity\":[\"1\"],\"voucherAmount\":[\"1500\"],\"notificationMethod\":[\"03\"],\"notificationAddress\":[\"ryan.cooper@travelbuy.co.za\"],\"additionalData\":[{\"molecule\":\"Xtandi 40mg Tablets\",\"nappi_code\":\"721978001\",\"dosage\":\"80mg\",\"patient_name\":\"Ryan\",\"patient_surname\":\"Cooper\",\"patient_id_number\":\"0212115101082\",\"patient_medical_scheme_name\":\"Discovery\",\"patient_medical_scheme\":\"1234567\",\"pharmacy_name\":\"Clicks Fourways\",\"ICD10\":\"Asthma\",\"CPT4\":\"asthma\",\"address_1\":\"1 Knox Road\",\"address_2\":\"Lonehill\",\"suburb\":\"Sandton\",\"city\":\"Sandton\",\"region\":\"Gauteng\",\"country_code\":\"South Africa\",\"postal_code\":\"2062\"}]}', '2025-02-10 11:49:04', '2025-02-10 11:49:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_redemptions`
--
ALTER TABLE `coupon_redemptions`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `upload_csvs`
--
ALTER TABLE `upload_csvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voucher_procurements`
--
ALTER TABLE `voucher_procurements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon_redemptions`
--
ALTER TABLE `coupon_redemptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `upload_csvs`
--
ALTER TABLE `upload_csvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `voucher_procurements`
--
ALTER TABLE `voucher_procurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
