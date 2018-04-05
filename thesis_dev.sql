-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 09:18 AM
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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `in_id` int(10) UNSIGNED NOT NULL,
  `in_type` int(11) NOT NULL,
  `in_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_amount` int(11) NOT NULL,
  `in_date` date NOT NULL,
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
(3, 1, 'piutang toko sebrang', 500000, '2018-02-24', NULL, 1, '2018-02-22 08:51:36', '2018-02-22 08:51:36', 0, NULL, 2),
(4, 1, 'piutang percobaan', 50000, '2018-02-28', 'coba', 1, '2018-02-22 23:53:20', '2018-02-22 23:53:20', 0, NULL, 3),
(5, 1, 'coba2', 30000, '2018-02-25', 'asdfasdf', 1, '2018-02-22 23:54:41', '2018-02-22 23:54:41', 0, NULL, 4),
(6, 1, 'coba 3', 300000, '2018-02-24', 'co0ba', 1, '2018-02-22 23:57:00', '2018-02-23 21:12:58', 1, '2018-02-24 04:12:58', 5),
(7, 1, 'coba 4', 3000, '2018-02-28', NULL, 1, '2018-02-22 23:58:07', '2018-02-23 21:50:40', 1, '2018-02-24 04:50:40', 6),
(8, 1, 'coba 5', 11111111, '2018-02-27', NULL, 1, '2018-02-23 00:00:01', '2018-02-23 00:00:01', 0, NULL, 7),
(9, 1, 'toko tokoan', 20000, '2018-03-01', 'trial piutang create 1', 1, '2018-02-23 00:29:43', '2018-02-23 00:29:43', 0, NULL, 8),
(10, 1, 'piutang nyoba edited jd lunas', 5000000, '2018-03-01', 'piutang nyobain si edited jd tgl 1, jadi lunas', 1, '2018-02-23 21:13:54', '2018-02-23 21:16:09', 0, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `inv_id` int(10) UNSIGNED NOT NULL,
  `inv_number` int(11) NOT NULL,
  `inv_date` date NOT NULL,
  `inv_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `inv_totPrice` int(11) NOT NULL,
  `inv_type` int(11) NOT NULL,
  `inv_status` int(11) NOT NULL,
  `inv_discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(24, '2018_02_24_041859_drop_post_table', 12);

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
(3, 2, 'asdfasdf', 40000, '2017-12-21', 'asdfasdf', 1, '2018-02-13 03:36:38', '2018-03-12 04:32:10', 1, '2018-03-12 11:32:10', 8),
(4, 1, 'Utang ke toko sebelah', 5000000, '2018-02-28', 'test', 1, '2018-02-20 01:00:25', '2018-02-23 21:03:20', 1, '2018-02-24 04:03:20', 7),
(5, 1, 'utang ke toko sebelah juga', 3000000, '2018-02-28', 'ngutang uang bensin', 1, '2018-02-20 02:20:41', '2018-03-12 04:32:03', 1, '2018-03-12 11:32:03', 6),
(6, 1, 'toko seberang', 30000, '2018-02-26', NULL, 1, '2018-02-20 06:47:16', '2018-02-22 01:11:15', 1, '2018-02-22 08:11:15', 5),
(7, 1, 'Percobaan yang hqq edited', 5000, '2018-02-24', NULL, 1, '2018-02-21 07:10:34', '2018-02-22 01:04:49', 1, '2018-02-22 08:04:49', 11),
(8, 1, 'bang haji', 30000, '2018-03-01', NULL, 1, '2018-02-21 07:49:09', '2018-02-21 07:49:09', 0, NULL, 12),
(9, 2, 'Biaya perawatan niken', 15000, '2018-02-26', 'murah bener', 1, '2018-02-21 07:57:38', '2018-02-21 07:57:38', 0, NULL, NULL),
(10, 1, 'Toko mega besi', 20000000, '2018-02-26', 'Beli besi panjang', 1, '2018-02-22 01:29:36', '2018-02-22 01:29:36', 0, NULL, 13),
(11, 1, 'Utang ke toko luar kota', 50000000, '2018-02-28', 'utang', 1, '2018-02-23 20:43:43', '2018-02-23 20:43:43', 1, '2018-02-26 00:00:00', NULL),
(12, 1, 'utang baru diedit, jadi lunas', 5000, '2018-03-01', 'utang mulu edited, tannggalnya jg diedit jd tgl 1, jumlah jd 5000, jadi lunas', 1, '2018-02-23 20:50:03', '2018-02-23 21:02:52', 0, NULL, 15),
(13, 1, 'utang lagi utang lagi edited', 300000, '2018-03-03', 'utang makan siang edited jd lunas', 1, '2018-02-23 21:07:35', '2018-02-23 21:09:42', 0, NULL, 16);

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
  `piut_deletedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `piutangs`
--

INSERT INTO `piutangs` (`piut_id`, `piut_duedate`, `piut_paiddate`, `piut_paidamount`, `piut_payer`, `piut_status`, `user_id`, `created_at`, `updated_at`, `piut_deleteStat`, `piut_deletedAt`) VALUES
(1, '2018-03-01', NULL, NULL, NULL, 0, 1, NULL, NULL, 0, NULL),
(2, '2018-02-24', NULL, NULL, NULL, 0, 1, '2018-02-22 08:51:36', '2018-02-22 08:51:36', 0, NULL),
(3, '2018-02-28', NULL, NULL, NULL, 0, 1, '2018-02-22 23:53:20', '2018-02-22 23:53:20', 0, NULL),
(4, '2018-02-25', NULL, NULL, NULL, 0, 1, '2018-02-22 23:54:41', '2018-02-22 23:54:41', 0, NULL),
(5, '2018-02-24', NULL, NULL, NULL, 0, 1, '2018-02-22 23:57:00', '2018-02-22 23:57:00', 0, NULL),
(6, '2018-02-28', NULL, NULL, NULL, 0, 1, '2018-02-22 23:58:07', '2018-02-23 21:50:40', 1, '2018-02-24 04:50:40'),
(7, '2018-02-27', NULL, NULL, NULL, 0, 1, '2018-02-23 00:00:01', '2018-02-23 00:00:01', 0, NULL),
(8, '2018-03-01', NULL, NULL, NULL, 0, 1, '2018-02-23 00:29:43', '2018-02-23 00:29:43', 0, NULL),
(9, '2018-03-01', '2018-03-01', 500000, 'admin', 1, 1, '2018-02-23 21:13:54', '2018-02-23 21:16:09', 0, NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Caesar', 'caesarprady@gmail.com', '$2y$10$Vx0LthegydNWGRZB0Ncwjux8e9FMlGfJNx3nd5RgWsNMqatdfZqpa', 'obgOcJPSOnO9EzNo1i0CDO116YZYo72gokGdbk7xRVmhqAVr5YSdHFeOejQh', '2018-02-13 00:31:00', '2018-02-13 00:31:00');

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
  `utg_deletedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utangs`
--

INSERT INTO `utangs` (`utg_id`, `utg_duedate`, `utg_paiddate`, `utg_paidamount`, `utg_payer`, `utg_status`, `user_id`, `created_at`, `updated_at`, `utg_deleteStat`, `utg_deletedAt`) VALUES
(5, '2018-02-28', NULL, NULL, NULL, 0, 1, NULL, '2018-02-22 01:11:15', 1, '2018-02-22 08:11:15'),
(6, '2018-02-28', NULL, NULL, NULL, 0, 1, NULL, '2018-03-12 04:32:03', 1, '2018-03-12 11:32:03'),
(7, '2018-02-28', NULL, NULL, NULL, 0, 1, NULL, '2018-02-23 21:03:20', 1, '2018-02-24 04:03:20'),
(8, '2018-02-27', NULL, NULL, NULL, 0, 1, NULL, '2018-03-12 04:32:10', 1, '2018-03-12 11:32:10'),
(11, '2018-02-24', '2018-02-22', 5000, 'Caesar', 1, 1, '2018-02-21 07:10:34', '2018-02-22 01:04:49', 1, '2018-02-22 08:04:49'),
(12, '2018-03-01', NULL, NULL, NULL, 0, 1, '2018-02-21 07:49:09', '2018-02-21 07:49:09', 0, NULL),
(13, '2018-02-26', '2018-02-24', 20000000, 'Admin', 1, 1, '2018-02-22 01:29:36', '2018-02-22 01:31:46', 0, NULL),
(14, '2018-02-28', NULL, NULL, NULL, 0, 1, '2018-02-23 20:49:43', '2018-02-23 20:49:43', 0, NULL),
(15, '2018-03-01', '2018-02-28', 5000, 'mimin', 1, 1, '2018-02-23 20:50:03', '2018-02-23 21:02:52', 0, NULL),
(16, '2018-03-03', '2018-03-03', 300000, 'momod', 1, 1, '2018-02-23 21:07:35', '2018-02-23 21:09:42', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `incomes_user_id_foreign` (`user_id`),
  ADD KEY `incomes_piut_id_foreign` (`piut_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`inv_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `in_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `inv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `out_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `piutangs`
--
ALTER TABLE `piutangs`
  MODIFY `piut_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `utangs`
--
ALTER TABLE `utangs`
  MODIFY `utg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
