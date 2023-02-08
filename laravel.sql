-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 12:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'adasd', '24324234', NULL, '$2y$10$4KrnEoHLFzLHR5kaXfNYTO7kWE.ZONfNnBRARFZ8K9vZpYNvJiowS', NULL, '2023-02-07 18:51:27', '2023-02-07 18:51:27'),
(5, 'adasdas', '234234', NULL, '$2y$10$KvFnKEsYrPv3A0D9wPBMQOl2p.nBrGTqX5TgNTdVNwmAw5/s27uxO', NULL, '2023-02-07 18:53:30', '2023-02-07 18:53:30'),
(10, 'sdfdsf', 'y', NULL, '$2y$10$hMc5KzrtxhfRJv2C1Vwvuec0JluMP7CHC7.V4GvnQyN5Se9u95vze', NULL, '2023-02-07 21:08:37', '2023-02-08 05:22:55'),
(12, 'dfsfsdfds', '4324324', NULL, '$2y$10$G1X3t.dj2rj58BjT.lXNQOH45Del4Qq8xiNOZI061tGETSGdOQRAS', NULL, '2023-02-07 22:05:12', '2023-02-07 22:05:12'),
(18, 'adsasd', 'uuu', NULL, '$2y$10$v8diLOMxxtNjQiD/wTaYk.sJKDe/yM8Cd0o2heZnn2VlDERRNnFGq', NULL, '2023-02-08 01:09:03', '2023-02-08 05:18:59'),
(20, 'asdasd', 'asdasdasdsad', NULL, '$2y$10$lyR4vi3QvLsCAZqP.NLny.9wbojt6cmHyxQfRidqKi1nZErILyyOC', NULL, '2023-02-08 01:09:20', '2023-02-08 01:09:20'),
(21, 'adsasdsad', 'asdasdasdasdsadasdagfdsd', NULL, '$2y$10$lJHLHYe/YctaDCC0bBA1v.lBQn0S2gPjUuTN32UdqD8Nsoc3kFLYC', NULL, '2023-02-08 01:09:32', '2023-02-08 01:09:32'),
(23, 'wsgsdgsdfg', 'dfdsffffffffffff', NULL, '$2y$10$vHBZGUGpozKK/D0vaB72IOm5HlZFzJsEl0Y8oOF0yfkqzCIlsnf3i', NULL, '2023-02-08 01:45:26', '2023-02-08 01:45:26'),
(24, 'jgvjgfuyf', 'kjkln,n', NULL, '$2y$10$7zIUwCu2MVQQFef/6DIdJuSm0CD71lid8FkYe8xdrFj6cAttEPwHu', NULL, '2023-02-08 04:51:13', '2023-02-08 04:51:13'),
(25, 'czxczx', 'czxczxc', NULL, '$2y$10$oRL2Go.n4WxletydocDkBe4r2xrvNgJvbvYrjc88JU1k74kCtWFEG', NULL, '2023-02-08 05:06:22', '2023-02-08 05:06:22'),
(26, 'hbmn', 'hghjgj', NULL, '$2y$10$E0k.56LPHoyRNAQljhf6d.ra2JcVRiXyXBf1PlnUXYERRGePMXAjy', NULL, '2023-02-08 05:16:45', '2023-02-08 05:18:48');

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
