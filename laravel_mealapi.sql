-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 12:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_mealapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bazars`
--

CREATE TABLE `bazars` (
  `id` int(10) UNSIGNED NOT NULL,
  `period_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bazars`
--

INSERT INTO `bazars` (`id`, `period_id`, `member_id`, `amount`, `date`, `note`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 250, '12.2.17', NULL, '2017-07-20 03:04:02', '2017-07-20 03:04:02'),
(4, 2, 1, 600, '20/5/2017', NULL, '2017-07-20 03:58:27', '2017-07-20 03:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meal_count` int(10) UNSIGNED DEFAULT NULL,
  `deposit` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `meal_count`, `deposit`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'sakib', NULL, NULL, 1, '2017-07-19 06:12:08', '2017-07-26 05:27:34'),
(2, 'naime', NULL, NULL, 2, '2017-07-19 06:52:42', '2017-07-19 06:52:42');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2017_06_03_190621_create_periods_table', 1),
(14, '2017_06_03_190855_create_bazars_table', 1),
(15, '2017_06_07_100056_create_members_table', 1);

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
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'july 2017', 1, 2, '2017-07-19 06:56:50', '2017-07-19 06:56:50'),
(2, 'july', 0, 1, '2017-07-19 13:53:23', '2017-07-20 03:45:14'),
(4, 'june2017', 0, 1, '2017-07-20 04:13:14', '2017-07-26 10:37:19'),
(5, 'august', 1, 1, '2017-07-26 10:37:19', '2017-07-26 10:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@yahoo.com', '$2y$10$r7ryH2BtOFhTe9jNCQQRYuvgZXRzc.h128aPB24L55eFCrupcq8Oi', '2017-07-19 06:07:48', '2017-07-19 06:07:48'),
(2, 'admin2', 'admin2@yahoo.com', '$2y$10$jiszvfRgjSdnLgTUvGmQyu7hGNgWjRE973vIt38b18DpJP2VzekQa', '2017-07-19 06:52:08', '2017-07-19 06:52:08'),
(3, 'rafi', 'rafi@yahoo.com', '$2y$10$CR2yOKUUIfnCoZj.DJo2tOdN2D.XaoNSiL8eq5GMzz7KXWbSgp3pa', '2017-07-26 03:12:36', '2017-07-26 03:12:36'),
(4, 'rafi', 'rafi2@yahoo.com', '$2y$10$r0IRiNm7UWfSb86AARDVHeWvBFuOnKJ.SZWWHxMj.0KL3qNJOvhUO', '2017-07-26 03:16:54', '2017-07-26 03:16:54'),
(5, 'rafi', 'rafi3@yahoo.com', '$2y$10$oJrjqRo.ppf96HUVqjnSSeKGa9YoxnKQH2KHF93FvfnaXCSLwmQDO', '2017-07-26 03:22:16', '2017-07-26 03:22:16'),
(6, 'rafi', 'rafi4@yahoo.com', '$2y$10$y2ZRQFgJ7z6ybDN2yL8EoeMmagTijYfH/0bYWYi00tqqO0brFEJoe', '2017-07-26 03:25:45', '2017-07-26 03:25:45'),
(7, 'rafi', 'rafi5@yahoo.com', '$2y$10$N5vUeGqCjFTkaw6CKT1YzONg0T3OJdZf7zIkPblDmCbE8wjX3qBua', '2017-07-26 05:06:27', '2017-07-26 05:06:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bazars`
--
ALTER TABLE `bazars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bazars`
--
ALTER TABLE `bazars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
