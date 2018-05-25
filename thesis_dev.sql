-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 08:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `atd_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `atd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `created_at`, `updated_at`, `atd_ids`, `atd_date`) VALUES
(4, '2018-05-12 03:55:02', '2018-05-12 03:55:02', '1', '2018-05-12'),
(5, '2018-05-12 03:55:02', '2018-05-12 03:55:02', '2', '2018-05-12'),
(6, '2018-05-12 03:55:02', '2018-05-12 03:55:02', '3', '2018-05-12'),
(7, '2018-05-13 02:57:37', '2018-05-13 02:57:37', '1', '2018-05-13'),
(8, '2018-05-13 02:57:38', '2018-05-13 02:57:38', '3', '2018-05-13'),
(9, '2018-05-14 03:34:56', '2018-05-14 03:34:56', '1', '2018-05-14'),
(10, '2018-05-14 03:34:56', '2018-05-14 03:34:56', '3', '2018-05-14'),
(15, '2018-05-14 07:40:27', '2018-05-14 07:40:27', '2', '2018-05-14'),
(22, '2018-05-14 20:43:50', '2018-05-14 20:43:50', '1', '2018-05-15'),
(23, '2018-05-14 20:44:01', '2018-05-14 20:44:01', '2', '2018-05-15'),
(24, '2018-05-14 20:44:01', '2018-05-14 20:44:01', '3', '2018-05-15'),
(25, '2018-05-18 22:17:13', '2018-05-18 22:17:13', '1', '2018-05-19'),
(26, '2018-05-18 22:17:13', '2018-05-18 22:17:13', '3', '2018-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cst_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cst_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cst_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cst_name`, `cst_company`, `cst_contact`, `user_id`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, NULL, NULL, '2018-04-30 22:57:04', '2018-04-30 22:57:04'),
(3, 'test2', 'test2', NULL, NULL, '2018-04-30 22:57:46', '2018-04-30 22:57:46'),
(4, 'test3', 'test3', NULL, NULL, '2018-04-30 22:59:18', '2018-04-30 22:59:18'),
(5, 'test4', 'test4', NULL, NULL, '2018-04-30 22:59:43', '2018-04-30 22:59:43'),
(6, 'test6', 'test6', NULL, NULL, '2018-04-30 23:02:08', '2018-04-30 23:02:08'),
(7, 'test7', 'test7', NULL, NULL, '2018-04-30 23:02:47', '2018-04-30 23:02:47'),
(8, 'test8', 'test8', NULL, NULL, '2018-04-30 23:16:46', '2018-04-30 23:16:46'),
(9, 'test9', 'test9', NULL, NULL, '2018-04-30 23:22:02', '2018-04-30 23:22:02'),
(10, 'baru', 'baru', NULL, NULL, '2018-05-03 04:05:29', '2018-05-03 04:05:29'),
(11, 'baru2', 'baru2', NULL, NULL, '2018-05-03 04:07:22', '2018-05-03 04:07:22'),
(12, 'wakwaw', 'wakwaw', NULL, NULL, '2018-05-03 23:33:35', '2018-05-03 23:33:35'),
(13, 'akhirnya', 'akhirnya', NULL, NULL, '2018-05-04 04:48:27', '2018-05-04 04:48:27'),
(14, 'akhirnya2', 'akhirnya2', NULL, NULL, '2018-05-04 04:52:46', '2018-05-04 04:52:46'),
(15, 'akhirnya3', 'akhirnya3', NULL, NULL, '2018-05-04 04:56:06', '2018-05-04 04:56:06'),
(16, 'wew', 'wew', NULL, NULL, '2018-05-04 05:21:38', '2018-05-04 05:21:38'),
(17, 'ehem', 'ehem', NULL, NULL, '2018-05-08 01:32:23', '2018-05-08 01:32:23'),
(18, 'weww', 'weww', NULL, NULL, '2018-05-08 01:33:41', '2018-05-08 01:33:41'),
(19, 'hmmmm', 'hmmmm', NULL, NULL, '2018-05-08 01:34:51', '2018-05-08 01:34:51'),
(20, 'tetot', 'tetot', NULL, NULL, '2018-05-08 01:36:22', '2018-05-08 01:36:22'),
(21, 'cihuy', 'cihuy', NULL, NULL, '2018-05-08 01:37:10', '2018-05-08 01:37:10'),
(22, 'asuw', 'asuw', NULL, NULL, '2018-05-08 20:32:44', '2018-05-08 20:32:44'),
(23, 'heeh', 'retail', NULL, NULL, '2018-05-08 21:18:59', '2018-05-08 21:18:59'),
(24, 'wadidaw', 'wadidaw', NULL, NULL, '2018-05-19 03:05:58', '2018-05-19 03:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_age` int(11) DEFAULT NULL,
  `emp_type` int(11) DEFAULT NULL,
  `emp_gender` int(11) DEFAULT NULL,
  `emp_contact` int(11) DEFAULT NULL,
  `emp_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_deletedAt` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `atd_counter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `emp_age`, `emp_type`, `emp_gender`, `emp_contact`, `emp_address`, `emp_education`, `emp_deletedAt`, `user_id`, `created_at`, `updated_at`, `atd_counter`) VALUES
(1, 'budi', 30, NULL, 1, 14045, 'Depok', 'SMA', NULL, 2, '2018-04-22 02:41:18', '2018-04-22 02:41:18', NULL),
(2, 'asep', 25, NULL, 1, 14022, 'sebrang gang', 'SD', NULL, 2, '2018-04-22 02:45:52', '2018-04-22 02:45:52', NULL),
(3, 'Farhan', 23, NULL, 1, 88880, 'Bintaro', 'S1', NULL, 2, '2018-04-25 05:47:14', '2018-04-25 05:47:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `in_id` int(10) UNSIGNED NOT NULL,
  `in_type` int(11) DEFAULT NULL,
  `in_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_amount` int(11) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `in_desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `in_deleteStat` int(11) NOT NULL DEFAULT '0',
  `in_deletedAt` datetime DEFAULT NULL,
  `piut_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`in_id`, `in_type`, `in_name`, `in_amount`, `in_date`, `in_desc`, `user_id`, `created_at`, `updated_at`, `in_deleteStat`, `in_deletedAt`, `piut_id`) VALUES
(1, 1, 'piutang edited', 50000, '2018-02-28', 'edited', 1, NULL, '2018-02-22 08:22:12', 0, NULL, NULL),
(2, 2, 'test', 30000000, '2018-02-28', NULL, 1, '2018-02-22 08:23:09', '2018-02-22 08:23:21', 0, '2018-02-22 15:23:21', NULL),
(12, 3, 'test coy tablenya habis defaultnya null semua', 5000000, '2018-04-07', 'test', 1, '2018-04-06 20:22:48', '2018-04-06 20:22:48', 0, NULL, NULL),
(16, 2, 'cobain pake postman2', 6000000, '2018-04-07', 'cobain pake postman cuy', 1, '2018-04-07 01:05:19', '2018-04-07 01:05:19', 0, NULL, NULL),
(17, 2, 'biji', 3000000, '2018-04-11', 'test', 1, '2018-04-07 01:18:04', '2018-04-11 01:58:34', 0, NULL, NULL),
(19, 2, 'cobain pake postman3', 9000000, '2018-04-12', 'postman brow', 1, '2018-04-11 22:43:31', '2018-04-11 22:43:31', 0, NULL, NULL),
(20, 1, 'pribadi baru', 500000, '2018-05-19', NULL, 2, '2018-05-19 01:59:41', '2018-05-19 01:59:41', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventorylists`
--

CREATE TABLE `inventorylists` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type` mediumtext COLLATE utf8mb4_unicode_ci,
  `personal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_measurement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_price` int(11) DEFAULT NULL,
  `item_minimum` int(11) DEFAULT NULL,
  `item_status` int(11) DEFAULT NULL,
  `item_delete` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventorylists`
--

INSERT INTO `inventorylists` (`id`, `item_name`, `item_type`, `personal_code`, `sku_code`, `item_quantity`, `item_measurement`, `item_price`, `item_minimum`, `item_status`, `item_delete`, `created_at`, `updated_at`) VALUES
(1, 'Batu Bata', 'Batu', 'B4T4', 'B4T4BRO', 50000, 'Batang', 15000, 20000, 0, NULL, NULL, NULL),
(2, 'Paralon', 'pipa', 'P1PA', 'P1PABRO', 5000, 'Batang', 20000, 1000, 0, NULL, NULL, NULL),
(3, 'BAJA RINGAN', 'BAJA', 'B4J4', 'B4J4BRO', 2000, 'Keping', 500000, 500, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `inv_id` int(10) UNSIGNED NOT NULL,
  `inv_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cst_id` int(10) UNSIGNED DEFAULT NULL,
  `inv_totPrice` int(11) DEFAULT NULL,
  `inv_type` int(11) DEFAULT NULL,
  `inv_status` int(11) DEFAULT NULL,
  `inv_discount` int(11) DEFAULT NULL,
  `inv_products` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` date DEFAULT NULL,
  `piut_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`inv_id`, `inv_date`, `created_at`, `updated_at`, `cst_id`, `inv_totPrice`, `inv_type`, `inv_status`, `inv_discount`, `inv_products`, `deleted_at`, `piut_id`) VALUES
(9, '2018-05-04', '2018-05-04 05:08:05', '2018-05-04 05:08:05', 13, 400000, 1, 1, NULL, '{\"items\":{\"2\":{\"id\":2,\"order_quantity\":\"10\",\"item_price\":200000,\"item\":{\"id\":2,\"item_name\":\"Paralon\",\"item_type\":\"pipa\",\"personal_code\":\"P1PA\",\"sku_code\":\"P1PABRO\",\"item_quantity\":5000,\"item_measurement\":\"Batang\",\"item_price\":20000,\"item_minimum\":1000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":20,\"totPrice\":400000}', NULL, NULL),
(10, '2018-05-04', '2018-05-04 05:08:45', '2018-05-04 05:08:45', 13, 600000, 1, 1, NULL, '{\"items\":{\"2\":{\"id\":2,\"order_quantity\":\"30\",\"item_price\":600000,\"item\":{\"id\":2,\"item_name\":\"Paralon\",\"item_type\":\"pipa\",\"personal_code\":\"P1PA\",\"sku_code\":\"P1PABRO\",\"item_quantity\":5000,\"item_measurement\":\"Batang\",\"item_price\":20000,\"item_minimum\":1000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":30,\"totPrice\":600000}', NULL, NULL),
(11, '2018-05-04', '2018-05-04 05:21:38', '2018-05-04 05:21:38', NULL, 150000000, 1, 1, NULL, '{\"items\":{\"3\":{\"id\":3,\"order_quantity\":\"300\",\"item_price\":150000000,\"item\":{\"id\":3,\"item_name\":\"BAJA RINGAN\",\"item_type\":\"BAJA\",\"personal_code\":\"B4J4\",\"sku_code\":\"B4J4BRO\",\"item_quantity\":2000,\"item_measurement\":\"Keping\",\"item_price\":500000,\"item_minimum\":500,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":300,\"totPrice\":150000000}', NULL, NULL),
(12, '2018-05-05', '2018-05-05 07:44:45', '2018-05-05 07:44:45', 13, 2620000, 1, 1, NULL, '{\"items\":{\"2\":{\"id\":2,\"order_quantity\":\"3\",\"item_price\":60000,\"item\":{\"id\":2,\"item_name\":\"Paralon\",\"item_type\":\"pipa\",\"personal_code\":\"P1PA\",\"sku_code\":\"P1PABRO\",\"item_quantity\":5000,\"item_measurement\":\"Batang\",\"item_price\":20000,\"item_minimum\":1000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}},\"1\":{\"id\":1,\"order_quantity\":\"4\",\"item_price\":60000,\"item\":{\"id\":1,\"item_name\":\"Batu Bata\",\"item_type\":\"Batu\",\"personal_code\":\"B4T4\",\"sku_code\":\"B4T4BRO\",\"item_quantity\":50000,\"item_measurement\":\"Batang\",\"item_price\":15000,\"item_minimum\":20000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}},\"3\":{\"id\":3,\"order_quantity\":\"5\",\"item_price\":2500000,\"item\":{\"id\":3,\"item_name\":\"BAJA RINGAN\",\"item_type\":\"BAJA\",\"personal_code\":\"B4J4\",\"sku_code\":\"B4J4BRO\",\"item_quantity\":2000,\"item_measurement\":\"Keping\",\"item_price\":500000,\"item_minimum\":500,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":12,\"totPrice\":2620000}', NULL, NULL),
(13, '2018-05-07', '2018-05-07 01:49:49', '2018-05-07 01:49:49', 13, 85000, 1, 1, NULL, '{\"items\":{\"2\":{\"id\":2,\"order_quantity\":\"2\",\"item_price\":40000,\"item\":{\"id\":2,\"item_name\":\"Paralon\",\"item_type\":\"pipa\",\"personal_code\":\"P1PA\",\"sku_code\":\"P1PABRO\",\"item_quantity\":5000,\"item_measurement\":\"Batang\",\"item_price\":20000,\"item_minimum\":1000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}},\"1\":{\"id\":1,\"order_quantity\":\"3\",\"item_price\":45000,\"item\":{\"id\":1,\"item_name\":\"Batu Bata\",\"item_type\":\"Batu\",\"personal_code\":\"B4T4\",\"sku_code\":\"B4T4BRO\",\"item_quantity\":50000,\"item_measurement\":\"Batang\",\"item_price\":15000,\"item_minimum\":20000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":5,\"totPrice\":85000}', NULL, NULL),
(14, '2018-05-08', '2018-05-08 01:33:41', '2018-05-08 01:33:41', NULL, 80000, 1, 1, NULL, '{\"items\":{\"2\":{\"id\":2,\"order_quantity\":\"4\",\"item_price\":80000,\"item\":{\"id\":2,\"item_name\":\"Paralon\",\"item_type\":\"pipa\",\"personal_code\":\"P1PA\",\"sku_code\":\"P1PABRO\",\"item_quantity\":5000,\"item_measurement\":\"Batang\",\"item_price\":20000,\"item_minimum\":1000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":4,\"totPrice\":80000}', NULL, NULL),
(15, '2018-05-08', '2018-05-08 01:36:41', '2018-05-08 01:36:41', 20, 1530000, 1, 1, NULL, '{\"items\":{\"1\":{\"id\":1,\"order_quantity\":\"2\",\"item_price\":30000,\"item\":{\"id\":1,\"item_name\":\"Batu Bata\",\"item_type\":\"Batu\",\"personal_code\":\"B4T4\",\"sku_code\":\"B4T4BRO\",\"item_quantity\":50000,\"item_measurement\":\"Batang\",\"item_price\":15000,\"item_minimum\":20000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}},\"3\":{\"id\":3,\"order_quantity\":\"3\",\"item_price\":1500000,\"item\":{\"id\":3,\"item_name\":\"BAJA RINGAN\",\"item_type\":\"BAJA\",\"personal_code\":\"B4J4\",\"sku_code\":\"B4J4BRO\",\"item_quantity\":2000,\"item_measurement\":\"Keping\",\"item_price\":500000,\"item_minimum\":500,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":5,\"totPrice\":1530000}', NULL, NULL),
(16, '2018-05-08', '2018-05-08 01:37:10', '2018-05-08 01:37:10', 21, 75000, 1, 1, NULL, '{\"items\":{\"1\":{\"id\":1,\"order_quantity\":\"5\",\"item_price\":75000,\"item\":{\"id\":1,\"item_name\":\"Batu Bata\",\"item_type\":\"Batu\",\"personal_code\":\"B4T4\",\"sku_code\":\"B4T4BRO\",\"item_quantity\":50000,\"item_measurement\":\"Batang\",\"item_price\":15000,\"item_minimum\":20000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":5,\"totPrice\":75000}', NULL, NULL),
(17, '2018-05-09', '2018-05-08 20:32:44', '2018-05-08 20:32:44', 22, 1735000, 1, 1, NULL, '{\"items\":{\"2\":{\"id\":2,\"order_quantity\":6,\"item_price\":120000,\"item\":{\"id\":2,\"item_name\":\"Paralon\",\"item_type\":\"pipa\",\"personal_code\":\"P1PA\",\"sku_code\":\"P1PABRO\",\"item_quantity\":5000,\"item_measurement\":\"Batang\",\"item_price\":20000,\"item_minimum\":1000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}},\"3\":{\"id\":3,\"order_quantity\":\"3\",\"item_price\":1500000,\"item\":{\"id\":3,\"item_name\":\"BAJA RINGAN\",\"item_type\":\"BAJA\",\"personal_code\":\"B4J4\",\"sku_code\":\"B4J4BRO\",\"item_quantity\":2000,\"item_measurement\":\"Keping\",\"item_price\":500000,\"item_minimum\":500,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}},\"1\":{\"id\":1,\"order_quantity\":\"5\",\"item_price\":75000,\"item\":{\"id\":1,\"item_name\":\"Batu Bata\",\"item_type\":\"Batu\",\"personal_code\":\"B4T4\",\"sku_code\":\"B4T4BRO\",\"item_quantity\":50000,\"item_measurement\":\"Batang\",\"item_price\":15000,\"item_minimum\":20000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":16,\"totPrice\":1735000}', NULL, NULL),
(18, '2018-05-16', '2018-05-08 21:18:59', '2018-05-08 21:18:59', 23, 345000, 1, 1, NULL, '{\"items\":{\"1\":{\"id\":1,\"order_quantity\":\"3\",\"item_price\":45000,\"item\":{\"id\":1,\"item_name\":\"Batu Bata\",\"item_type\":\"Batu\",\"personal_code\":\"B4T4\",\"sku_code\":\"B4T4BRO\",\"item_quantity\":50000,\"item_measurement\":\"Batang\",\"item_price\":15000,\"item_minimum\":20000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}},\"2\":{\"id\":2,\"order_quantity\":10,\"item_price\":200000,\"item\":{\"id\":2,\"item_name\":\"Paralon\",\"item_type\":\"pipa\",\"personal_code\":\"P1PA\",\"sku_code\":\"P1PABRO\",\"item_quantity\":5000,\"item_measurement\":\"Batang\",\"item_price\":20000,\"item_minimum\":1000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":18,\"totPrice\":345000}', NULL, NULL),
(29, '2018-05-20', '2018-05-19 03:05:17', '2018-05-19 03:05:17', 13, 1500000, 3, 0, NULL, '{\"items\":{\"3\":{\"id\":3,\"order_quantity\":\"3\",\"item_price\":1500000,\"item\":{\"id\":3,\"item_name\":\"BAJA RINGAN\",\"item_type\":\"BAJA\",\"personal_code\":\"B4J4\",\"sku_code\":\"B4J4BRO\",\"item_quantity\":2000,\"item_measurement\":\"Keping\",\"item_price\":500000,\"item_minimum\":500,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":3,\"totPrice\":1500000}', NULL, 14),
(30, '2018-05-19', '2018-05-19 03:05:58', '2018-05-19 03:05:58', 24, 15000, 3, 0, NULL, '{\"items\":{\"1\":{\"id\":1,\"order_quantity\":\"1\",\"item_price\":15000,\"item\":{\"id\":1,\"item_name\":\"Batu Bata\",\"item_type\":\"Batu\",\"personal_code\":\"B4T4\",\"sku_code\":\"B4T4BRO\",\"item_quantity\":50000,\"item_measurement\":\"Batang\",\"item_price\":15000,\"item_minimum\":20000,\"item_status\":0,\"item_delete\":null,\"created_at\":null,\"updated_at\":null}}},\"totQty\":1,\"totPrice\":15000}', NULL, 15);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_11_153835_create_posts_table', 1),
(4, '2018_02_12_113156_create_invoices_table', 2),
(5, '2018_02_12_121911_create_finance_incomes_table', 2),
(8, '2018_02_13_061834_add_financeincome_deletestatus', 3),
(10, '2018_02_13_093816_create_outcomes_table', 4),
(16, '2018_02_20_053835_create_utangs_table', 5),
(17, '2018_02_21_132015_add_utgid_to_outcomes', 6),
(19, '2018_02_22_133214_create_piutangs_table', 7),
(20, '2018_02_22_140509_add_foreignkey_to_financeincomes', 8),
(21, '2018_02_22_143232_drop_finance_incomes_table', 9),
(22, '2018_02_22_143322_create_incomes_table', 10),
(23, '2018_02_22_144412_add_foreignkeys_to_incomes', 11),
(24, '2018_02_24_041859_drop_post_table', 12),
(25, '2018_04_18_130459_add_api_token_to_users_table', 13),
(26, '2018_04_22_052934_create_inventorylists_table', 14),
(27, '2018_04_22_054539_create_purchasings_table', 15),
(28, '2018_04_22_055525_create_employees_table', 16),
(33, '2018_04_22_114907_create_attendance_lists_table', 17),
(34, '2018_04_22_154911_add_attendance_counter_to_employees_table', 17),
(35, '2018_04_25_122332_create_attendances_table', 18),
(36, '2018_04_25_123844_drop_attendance_lists_table', 19),
(37, '2018_04_27_091346_create_customers_table', 20),
(38, '2018_04_27_093358_drop_inventorylists_table', 21),
(39, '2018_04_27_094211_create_inventorylists_table_bener', 22),
(40, '2018_04_28_140821_modify_invoices_table', 23),
(42, '2018_04_28_141405_add_customer_name_column_to_invoices', 24),
(43, '2018_05_01_043902_add_date_to_customers_table', 25),
(44, '2018_05_01_045240_drop_date_in_customers_table', 26),
(45, '2018_05_01_060522_modify_invoices_table_default_value', 27),
(47, '2018_05_01_061333_add_many_columns_to_invoices', 28),
(48, '2018_05_01_061935_drop_inv_products_column_in_invoices', 29),
(49, '2018_05_01_062040_add_inv_products_column_in_invoices', 30),
(51, '2018_05_01_073739_add_deleted_at_column_to_invoices', 31),
(52, '2018_05_01_080608_add_foreign_key_to_invoices', 32),
(53, '2018_05_10_071008_drop_atd_ids_from_attendances_table', 33),
(54, '2018_05_10_071151_add_atd_ids_to_attendances_table', 34),
(55, '2018_05_10_072226_add_atd_date_to_attendances', 35),
(58, '2018_05_19_075047_add_description_and_inv_id_to_piutangs_table', 36),
(59, '2018_05_19_090653_add_name_description_amount_to_utangs', 37),
(60, '2018_05_19_095413_add_piut_id_to_invoices', 38);

-- --------------------------------------------------------

--
-- Table structure for table `outcomes`
--

CREATE TABLE `outcomes` (
  `out_id` int(10) UNSIGNED NOT NULL,
  `out_type` int(11) NOT NULL,
  `out_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `out_amount` int(11) NOT NULL,
  `out_date` date NOT NULL,
  `out_desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `out_deleteStat` int(11) NOT NULL,
  `out_deletedAt` datetime DEFAULT NULL,
  `utg_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outcomes`
--

INSERT INTO `outcomes` (`out_id`, `out_type`, `out_name`, `out_amount`, `out_date`, `out_desc`, `user_id`, `created_at`, `updated_at`, `out_deleteStat`, `out_deletedAt`, `utg_id`) VALUES
(9, 2, 'Biaya perawatan', 1500000, '2018-02-26', 'murah bener', 1, '2018-02-21 07:57:38', '2018-04-20 21:00:05', 0, NULL, NULL),
(14, 2, 'listrik', 30000000, '2018-04-22', 'test', 1, '2018-04-21 22:44:38', '2018-04-21 22:44:38', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `piutangs`
--

CREATE TABLE `piutangs` (
  `piut_id` int(10) UNSIGNED NOT NULL,
  `piut_duedate` date NOT NULL,
  `piut_paiddate` date DEFAULT NULL,
  `piut_paidamount` int(11) DEFAULT NULL,
  `piut_payer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piut_status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `piut_deleteStat` int(11) NOT NULL DEFAULT '0',
  `piut_deletedAt` datetime DEFAULT NULL,
  `piut_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piut_amount` int(11) DEFAULT NULL,
  `piut_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `piutangs`
--

INSERT INTO `piutangs` (`piut_id`, `piut_duedate`, `piut_paiddate`, `piut_paidamount`, `piut_payer`, `piut_status`, `user_id`, `created_at`, `updated_at`, `piut_deleteStat`, `piut_deletedAt`, `piut_name`, `piut_amount`, `piut_desc`, `inv_id`) VALUES
(11, '2018-05-31', '2018-05-19', 50000000, 'baru juga', 1, 2, '2018-05-19 01:55:46', '2018-05-19 01:56:20', 0, NULL, 'baru', 50000000, 'piutang re-worked', NULL),
(14, '2018-06-18', NULL, NULL, NULL, 0, NULL, '2018-05-19 03:05:17', '2018-05-19 03:05:17', 0, NULL, 'akhirnya', 1500000, 'Piutang penjualan', NULL),
(15, '2018-06-18', '2018-05-20', 15000, 'lunaser', 1, NULL, '2018-05-19 03:05:58', '2018-05-19 05:52:04', 0, NULL, 'wadidaw', 15000, 'Piutang penjualan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchasings`
--

CREATE TABLE `purchasings` (
  `id` int(10) UNSIGNED NOT NULL,
  `pch_vendorname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pch_itemname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pch_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pch_measurement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pch_quantity` int(11) DEFAULT NULL,
  `pch_paytype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pch_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pch_arivalstat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pch_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pch_delete` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `api_token`) VALUES
(1, 'Caesar', 'caesarprady@gmail.com', '$2y$10$Vx0LthegydNWGRZB0Ncwjux8e9FMlGfJNx3nd5RgWsNMqatdfZqpa', 'tapAfzcgFnMisRgAiwaBaRZo8oIR3FuIYefY6ZX0m2uzz8vJUxwG2tJ0OTMX', '2018-02-13 00:31:00', '2018-02-13 00:31:00', NULL),
(2, 'Admin', 'admin@admin.com', '$2y$10$zkvdJJgjBNjvVfKToPD4oeCQvJUuO3Vceso0/a4C4TSun9j7uXnxO', 'YkvJEe5U2dH3wRW2YFNgDzRIZz3XIK1RlCRI8MvJjh75MK4f61mnwDSPafNG', '2018-04-18 06:19:27', '2018-04-18 06:19:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utangs`
--

CREATE TABLE `utangs` (
  `utg_id` int(10) UNSIGNED NOT NULL,
  `utg_duedate` date NOT NULL,
  `utg_paiddate` date DEFAULT NULL,
  `utg_paidamount` int(11) DEFAULT NULL,
  `utg_payer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utg_status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `utg_deleteStat` int(11) NOT NULL DEFAULT '0',
  `utg_deletedAt` datetime DEFAULT NULL,
  `utg_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utg_amount` int(11) DEFAULT NULL,
  `utg_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utangs`
--

INSERT INTO `utangs` (`utg_id`, `utg_duedate`, `utg_paiddate`, `utg_paidamount`, `utg_payer`, `utg_status`, `user_id`, `created_at`, `updated_at`, `utg_deleteStat`, `utg_deletedAt`, `utg_name`, `utg_amount`, `utg_desc`) VALUES
(17, '2018-05-19', '2018-05-19', 5000000, 'barujuga', 1, 2, '2018-05-19 02:22:02', '2018-05-19 02:29:47', 0, NULL, 'barudong', 5000000, 'barudong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `incomes_user_id_foreign` (`user_id`),
  ADD KEY `incomes_piut_id_foreign` (`piut_id`);

--
-- Indexes for table `inventorylists`
--
ALTER TABLE `inventorylists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `invoices_cst_id_foreign` (`cst_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outcomes`
--
ALTER TABLE `outcomes`
  ADD PRIMARY KEY (`out_id`),
  ADD KEY `outcomes_utg_id_foreign` (`utg_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `piutangs`
--
ALTER TABLE `piutangs`
  ADD PRIMARY KEY (`piut_id`),
  ADD KEY `piutangs_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchasings`
--
ALTER TABLE `purchasings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `utangs`
--
ALTER TABLE `utangs`
  ADD PRIMARY KEY (`utg_id`),
  ADD KEY `utangs_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `in_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `inventorylists`
--
ALTER TABLE `inventorylists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `inv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `out_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `piutangs`
--
ALTER TABLE `piutangs`
  MODIFY `piut_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `purchasings`
--
ALTER TABLE `purchasings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `utangs`
--
ALTER TABLE `utangs`
  MODIFY `utg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_piut_id_foreign` FOREIGN KEY (`piut_id`) REFERENCES `piutangs` (`piut_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_cst_id_foreign` FOREIGN KEY (`cst_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `outcomes`
--
ALTER TABLE `outcomes`
  ADD CONSTRAINT `outcomes_utg_id_foreign` FOREIGN KEY (`utg_id`) REFERENCES `utangs` (`utg_id`);

--
-- Constraints for table `piutangs`
--
ALTER TABLE `piutangs`
  ADD CONSTRAINT `piutangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `utangs`
--
ALTER TABLE `utangs`
  ADD CONSTRAINT `utangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
