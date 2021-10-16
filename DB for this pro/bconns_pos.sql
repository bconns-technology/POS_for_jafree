-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 10:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bconns_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `updated_by`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', NULL, 1, 1, '2021-10-12 12:27:52', '2021-10-12 12:27:52'),
(2, 'Machinery', NULL, 1, 1, '2021-10-12 12:28:17', '2021-10-12 12:28:17'),
(3, 'Fasion', 1, 1, 1, '2021-10-12 12:29:33', '2021-10-12 12:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `updated_by`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Md. Zahidul Islam', 'zs.engineer1@gmail.com', '01754898514', 'Dhaka-1215', NULL, 1, 1, NULL, NULL),
(2, 'Md. Zahidul Islam', 'admin@gmail.com', '0175448459', 'Dhaka-1215', NULL, 1, 1, NULL, NULL),
(3, 'আবুল হোসেন', 'zahidulislamzahid96@gmail.com', '01642424646', 'House# 164/C, Road# 02, Kuril Mridha-bari, Vatara, Dhaka-1229.', 1, 1, 1, NULL, NULL);

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(2, '1', '2021-10-14', 'Nokia phone, Its a costly phone', 1, 1, 1, '2021-10-14 07:30:43', '2021-10-14 11:47:49'),
(4, '2', '2021-10-08', 'Nokia phone, Its a costly phone', 1, 1, 1, '2021-10-14 08:53:31', '2021-10-14 11:48:21'),
(5, '3', '2021-10-06', 'Apple phone, Its a costly phone', 0, 1, NULL, '2021-10-14 21:56:40', '2021-10-14 21:56:40'),
(6, '4', '2021-10-15', 'dfsd dfsd dsafsadfas gfdg dsfg dfsg dshgsdfhggjf jh gh', 1, 1, 1, '2021-10-14 22:09:04', '2021-10-14 22:09:14'),
(7, '5', '2021-10-15', 'Xiaomi Phone Reasion-Indian', 1, 1, 1, '2021-10-14 23:53:31', '2021-10-14 23:53:49'),
(8, '6', '2021-10-15', 'Xiaomi Phone Reasion Indian', 1, 2, 2, '2021-10-15 08:42:55', '2021-10-15 08:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `selling_quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `category_id`, `product_id`, `date`, `selling_quantity`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 1, '2021-10-14', 1, 222222, 222222, 1, '2021-10-14 07:30:43', '2021-10-14 07:30:43'),
(5, 4, 1, 1, '2021-10-08', 11, 5665, 62315, 1, '2021-10-14 08:53:31', '2021-10-14 08:53:31'),
(6, 5, 1, 2, '2021-10-06', 20, 120000, 2400000, 1, '2021-10-14 21:56:40', '2021-10-14 21:56:40'),
(7, 6, 1, 1, '2021-10-15', 9, 14000, 126000, 1, '2021-10-14 22:09:04', '2021-10-14 22:09:04'),
(8, 6, 1, 2, '2021-10-15', 3, 140000, 420000, 1, '2021-10-14 22:09:04', '2021-10-14 22:09:04'),
(9, 7, 1, 1, '2021-10-15', 4, 25000, 100000, 1, '2021-10-14 23:53:31', '2021-10-14 23:53:31'),
(10, 8, 1, 1, '2021-10-15', 10, 14000, 140000, 1, '2021-10-15 08:42:55', '2021-10-15 08:42:55');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_10_11_123542_create_suppliers_table', 2),
(7, '2021_10_12_110258_create_units_table', 3),
(8, '2021_10_12_120346_create_categories_table', 4),
(9, '2021_10_12_123225_create_products_table', 5),
(10, '2021_10_12_161852_create_customers_table', 6),
(11, '2021_10_12_172041_create_purchases_table', 7),
(12, '2021_10_14_041801_create_invoices_table', 8),
(13, '2021_10_14_042449_create_invoice_details_table', 8),
(14, '2021_10_14_042517_create_payments_table', 8),
(15, '2021_10_14_042538_create_payment_details_table', 8);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `total_amount`, `discount_amount`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'full_paid', 222102, 120, 222102, 0, '2021-10-14 07:30:43', '2021-10-14 07:30:43'),
(3, 4, 2, 'full_paid', 62250, 65, 62250, 0, '2021-10-14 08:53:31', '2021-10-14 08:53:31'),
(4, 5, 3, 'full_paid', 2397500, 2500, 2397500, 0, '2021-10-14 21:56:40', '2021-10-14 21:56:40'),
(5, 6, 3, 'full_paid', 541000, 5000, 541000, 0, '2021-10-14 22:09:04', '2021-10-14 22:09:04'),
(6, 7, 1, 'full_paid', 99880, 120, 99880, 0, '2021-10-14 23:53:31', '2021-10-14 23:53:31'),
(7, 8, 1, 'full_paid', 137500, 2500, 137500, 0, '2021-10-15 08:42:55', '2021-10-16 01:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `curent_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `curent_paid_amount`, `date`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 222102, '2021-10-14', NULL, NULL, '2021-10-14 07:30:43', '2021-10-14 07:30:43'),
(3, 4, 62250, '2021-10-08', NULL, NULL, '2021-10-14 08:53:31', '2021-10-14 08:53:31'),
(4, 5, 2397500, '2021-10-06', NULL, NULL, '2021-10-14 21:56:40', '2021-10-14 21:56:40'),
(5, 6, 541000, '2021-10-15', NULL, NULL, '2021-10-14 22:09:04', '2021-10-14 22:09:04'),
(6, 7, 99880, '2021-10-15', NULL, NULL, '2021-10-14 23:53:31', '2021-10-14 23:53:31'),
(7, 8, 0, '2021-10-15', NULL, NULL, '2021-10-15 08:42:55', '2021-10-15 08:42:55'),
(8, 8, 127500, NULL, 1, NULL, '2021-10-16 01:45:29', '2021-10-16 01:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `suplier_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `suplier_id`, `category_id`, `unit_id`, `updated_by`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Redmi S2', 116, 1, 1, 2, NULL, 1, 1, '2021-10-12 13:45:43', '2021-10-15 19:23:53'),
(2, 'Iphone 13', 19, 2, 1, 2, NULL, 1, 1, '2021-10-12 13:46:14', '2021-10-14 22:09:14'),
(3, 'Motor', 5, 3, 2, 2, NULL, 1, 1, '2021-10-12 13:47:14', '2021-10-13 13:45:31'),
(4, 'Shirt', 0, 2, 3, 2, NULL, 1, 1, '2021-10-12 13:47:38', '2021-10-12 13:47:38'),
(5, 'Denim', 0, 3, 3, 2, 1, 1, 1, '2021-10-12 14:03:39', '2021-10-12 15:42:50'),
(7, 'Fan', 0, 1, 2, 2, NULL, 1, 1, '2021-10-16 01:21:42', '2021-10-16 01:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `suplier_id`, `category_id`, `product_id`, `purchase_number`, `date`, `description`, `buying_quantity`, `unit_price`, `buying_price`, `status`, `updated_by`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'd12', '2021-09-28', 'Dummy', 1, 5000, 5000, 1, NULL, 1, '2021-10-13 11:56:38', '2021-10-15 04:05:15'),
(2, 3, 2, 3, 'm-16', '2021-10-14', 'Dummy', 5, 20000, 100000, 1, NULL, 1, '2021-10-13 12:26:23', '2021-10-13 19:45:31'),
(3, 1, 1, 1, '2222', '2021-10-12', 'Dummy', 10, 10000, 100000, 1, NULL, 1, '2021-10-14 11:47:28', '2021-10-14 17:47:39'),
(4, 1, 1, 1, '36', '2021-10-08', 'Dummy', 26, 12000, 312000, 1, NULL, 1, '2021-10-14 22:06:15', '2021-10-15 04:06:25'),
(5, 1, 1, 2, '36', '2021-10-08', 'Dummy', 15, 120000, 1800000, 1, NULL, 1, '2021-10-14 22:06:15', '2021-10-15 04:06:24'),
(6, 2, 1, 1, '555', '2021-10-16', 'Dummy', 25, 11500, 287500, 1, NULL, 1, '2021-10-15 18:23:14', '2021-10-16 00:27:30'),
(7, 2, 1, 1, '454', '2021-10-16', 'test', 20, 11500, 230000, 1, NULL, 1, '2021-10-15 19:23:49', '2021-10-16 01:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(191) DEFAULT NULL,
  `created_by` int(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `updated_by`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Md. Zahidul Islam', 'zs.engineer1@gmail.com', '01754898514', 'Kuril Mridha-bari, Vatara, Dhaka-1229.', 1, 1, 1, '2021-10-12 10:44:08', '2021-10-12 10:45:24'),
(2, 'Md. Zahid', 'admin@gmail.com', '0175448459', 'Dhaka-1200', NULL, 1, 1, '2021-10-12 10:44:40', '2021-10-12 10:44:40'),
(3, 'আবুল হোসেন', 'ashok@gmail.com', '01642424646', 'Dhaka-1215', NULL, 1, 1, '2021-10-12 10:45:02', '2021-10-12 10:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `updated_by`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KG', NULL, 1, 1, '2021-10-12 11:40:24', '2021-10-12 11:40:24'),
(2, 'Piece', 1, 1, 1, '2021-10-12 11:40:46', '2021-10-12 11:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `gender`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Zahidul Islam', 'zs.engineer1@gmail.com', '2021-10-08 03:25:54', '$2y$10$UQI5dmoJY/KrjImBiVpB0OHwcCmw7wzNwjSiusQhMRCvycdxXLaSC', NULL, NULL, NULL, NULL, 1, 'VMtkK94lWcUbWACpsjVo6MwwANfTxwlbOqbF3bytjtGgBQJxjzGUapaJ1enq', '2021-10-07 21:25:54', '2021-10-07 21:25:54'),
(2, 'JAFREE MACHINERY & TOOLS', 'jafree@gmail.com', '2021-10-15 09:12:49', '$2y$10$RN71jgfY8Hk8BQzT7qvxFuNkzx9WxmlcuiKRZI2wxFOdYlCqcrkm6', NULL, NULL, NULL, NULL, 1, NULL, '2021-10-15 03:12:49', '2021-10-15 03:12:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
