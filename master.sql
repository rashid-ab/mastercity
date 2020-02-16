-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 12:25 AM
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
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dates` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense`, `amount`, `dates`, `created_at`, `updated_at`) VALUES
(1, 'Rait', '1,600', '2019-09-01', '2019-09-28 02:55:54', '2019-09-28 02:56:16'),
(2, 'Rait', '15000', '2019-10-01', '2019-10-02 02:38:01', '2019-10-02 02:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `Items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `PlotNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2018_05_01_061506_create_perdays_table', 1),
(4, '2018_05_01_061529_create_items_table', 1),
(5, '2018_05_01_061546_create_plots_table', 1),
(6, '2018_05_01_113610_create_masters_table', 1),
(8, '2018_09_19_035707_create_thekedars_table', 1),
(9, '2019_06_22_120810_create_expenses_table', 1),
(11, '2018_09_08_075754_create_parties_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` int(10) UNSIGNED NOT NULL,
  `plot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_recieve` int(11) DEFAULT NULL,
  `total_payment` int(11) DEFAULT NULL,
  `donation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `plot`, `client_name`, `payment_recieve`, `total_payment`, `donation`, `reason`, `feedback`, `date`, `created_at`, `updated_at`) VALUES
(4, '10/Commercial/x', 'ras', 500, NULL, '1000', 'Lo Poan G tuadi manni gai', 'asd', '2019-10-08', '2019-10-09 08:02:19', '2019-10-09 03:24:22'),
(6, '10/Commercial/x', 'Rass', 20000, 100000, '1000', 'asd', 'asd', '2019-10-08', '2019-10-09 08:32:43', '2019-10-09 08:32:43'),
(7, '10/Commercial/x', 'Rasd', 20000, 100000, '1000', 'asd', 'asd', '2019-10-08', '2019-10-09 08:33:25', '2019-10-09 08:33:25'),
(8, '10/Commercial/x', 'Rasd', 20000, 100000, '1000', 'asd', 'asd', '2019-10-08', '2019-10-09 08:34:19', '2019-10-09 08:34:19'),
(9, '10/Commercial/x', 'asd', 122, 1000, '6', 'sad', 'asd', '2019-10-08', '2019-10-09 08:41:06', '2019-10-09 08:41:06');

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
-- Table structure for table `perdays`
--

CREATE TABLE `perdays` (
  `id` int(10) UNSIGNED NOT NULL,
  `PlotNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perdays`
--

INSERT INTO `perdays` (`id`, `PlotNo`, `Items`, `Quantity`, `Date`, `Price`, `created_at`, `updated_at`) VALUES
(1000, '10/Commercial/z', 'Sariya', '100', '28-09-19', 100000, '2019-09-28 08:00:41', '2019-09-28 03:00:54'),
(1001, '10/Commercial/z', 'Sariya', '100', '29-09-19', 10000, '2019-09-30 06:10:24', '2019-09-30 06:10:24'),
(1002, '10/Commercial/z', 'Sariya', '100', '2019-09-01', 10000, '2019-09-30 06:11:52', '2019-09-30 06:11:52'),
(1003, '10/Commercial/x', 'Sariya', '100', '2019-10-01', 10000, '2019-10-02 07:35:21', '2019-10-08 00:30:44'),
(1004, '10/Commercial/x', 'Sariya', '100', '2019-10-08', 10000, '2019-10-09 08:34:43', '2019-10-09 08:34:43'),
(1005, '10/Commercial/x', 'Sariya', '100', '2019-10-08', 10000, '2019-10-09 08:34:55', '2019-10-09 08:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `plots`
--

CREATE TABLE `plots` (
  `id` int(10) UNSIGNED NOT NULL,
  `Plot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plots`
--

INSERT INTO `plots` (`id`, `Plot`, `Name`, `created_at`, `updated_at`) VALUES
(2, '10/Commercial/x', 'Anas', '2019-10-02 02:32:09', '2019-10-02 02:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `thekedars`
--

CREATE TABLE `thekedars` (
  `id` int(10) UNSIGNED NOT NULL,
  `plots` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thekedar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payments_recieve` int(11) DEFAULT NULL,
  `totals_payment` int(11) DEFAULT NULL,
  `dates` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thekedars`
--

INSERT INTO `thekedars` (`id`, `plots`, `thekedar_name`, `payments_recieve`, `totals_payment`, `dates`, `created_at`, `updated_at`) VALUES
(3, '10/Commercial/x', 'Ras', 100000, NULL, '2019-10-01', '2019-10-08 05:35:02', '2019-10-08 04:10:47');

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
(1, 'Admin', 'admin@gmail.com', '$2y$10$b7.rr2x7aUFt6OLjbf1Km.iIkvw1ofe0IvA.cejk5NPICbUr1Z.Oe', NULL, '2019-09-28 02:55:15', '2019-09-28 02:55:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perdays`
--
ALTER TABLE `perdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plots`
--
ALTER TABLE `plots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thekedars`
--
ALTER TABLE `thekedars`
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
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perdays`
--
ALTER TABLE `perdays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `plots`
--
ALTER TABLE `plots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thekedars`
--
ALTER TABLE `thekedars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
