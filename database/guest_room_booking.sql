-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 11:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guest_room_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `email`, `email_verified_at`, `gender`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', '8734877805', 'john@gmail.com', NULL, 'Male', 'coimbatore', '$2y$10$01sIPeZXZwdPMglln2l4hOA5Qw3hm6WTVtWHljxNUoCWeSmLh5rQS', NULL, '2022-12-21 22:52:58', '2022-12-21 22:52:58'),
(2, 'Andrew', '7845968975', 'andrew@gmail.com', NULL, 'Male', 'namakkal', '$2y$10$.Las.8eE3s76XS9dxMyC4edUSZWkCidgM17f3DOIFd35dOE0XCACm', NULL, '2022-12-22 00:43:41', '2022-12-22 00:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adults` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `children` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `books_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `room_id`, `user_id`, `admin_id`, `start_date`, `end_date`, `type`, `requirement`, `adults`, `children`, `books_status`, `rent`, `payment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-12-22', '2022-12-29', 'single', 'null', '1', '0', 'CHECK_OUT', '500 / ₹', 'PENDING', '2022-12-22 00:39:18', '2022-12-22 00:40:30'),
(2, 2, 1, 1, '2022-12-22', '2022-12-29', 'king', 'null', '1', '0', 'CHECK_OUT', '1000 / ₹', 'PENDING', '2022-12-22 00:39:45', '2022-12-22 00:40:44'),
(3, 7, 1, 2, '2022-12-22', '2023-01-05', 'king', 'null', '2', '0', 'CONFIRM', '1000 / ₹', 'PENDING', '2022-12-22 02:25:30', '2022-12-22 02:31:23'),
(4, 6, 1, 2, '2022-12-22', '2022-12-27', 'king', 'null', '1', '0', 'PENDING', '1000 / ₹', 'PENDING', '2022-12-22 02:27:08', '2022-12-22 02:27:08'),
(5, 1, 1, 1, '2022-12-22', '2022-12-30', 'single', 'null', '2', '0', 'PENDING', '500 / ₹', 'PENDING', '2022-12-22 04:30:33', '2022-12-22 04:30:33'),
(6, 2, 1, 1, '2022-12-22', '2022-12-30', 'king', 'null', '2', '0', 'CONFIRM', '1000 / ₹', 'PENDING', '2022-12-22 04:31:50', '2022-12-22 04:35:13');

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
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2022_12_17_085928_create__house__owner_table', 1),
(27, '2022_12_18_174328_create_rooms_table', 1),
(29, '2022_12_19_054238_create_books_table', 2),
(31, '2022_12_18_024152_create_admins_table', 4),
(32, '2014_10_12_000000_create_users_table', 5);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `admin_id`, `status`, `address`, `owner`, `telephone`, `facility`, `floor`, `bed`, `rent`, `min`, `max`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 'PENDING', 'Coimbatore', 'John\'s House', '8734877805', 'TV, Fridge,washing machine', '1st floor - A2', 'single', '500', '1', '30', '[\"2a7bf3e27aac11eca8a00a58a9feac02.webp\",\"7eec938aa3f911eb8e3b0242ac110004.webp\",\"086a77f67aac11ecb4090a58a9feac02.webp\",\"250964393.jpg\"]', '2022-12-21 03:24:21', '2022-12-22 04:30:33'),
(2, 1, 'BOOKED', 'coimbatore', 'John\'s House', '8734877805', 'tv, av,fridge', '1st floor - A3', 'king', '1000', '1', '30', '[\"255550848.jpg\",\"255551434.jpg\",\"255551456.jpg\",\"255550825.jpg\"]', '2022-12-21 23:15:51', '2022-12-22 04:35:13'),
(3, 2, 'AVAILABLE', 'namakkal', 'Andrew\'s House', '7845968975', 'TV, AV, FRIDGE', 'ground floor', 'double', '600', '1', '14', '[\"208158121.jpg\",\"208166154.jpg\",\"208166159.jpg\",\"208167629.jpg\"]', '2022-12-22 00:50:27', '2022-12-22 03:10:45'),
(4, 2, 'AVAILABLE', 'namakkal', 'Andrew\'s House', '7845968975', 'TV, AV, FRIDGE', '1st floor', 'king', '100', '1', '14', '[\"208166154.jpg\",\"208166159.jpg\",\"208167629.jpg\",\"208158093.jpg\"]', '2022-12-22 00:51:55', '2022-12-22 00:51:55'),
(5, 2, 'AVAILABLE', 'Salem', 'Andrew\'s House', '7845968975', 'TV, AV, PARKING', 'ground floor - A1', 'single', '700', '1', '14', '[\"237093733.jpg\",\"119292272.jpg\",\"201682275.jpg\",\"119290431.jpg\"]', '2022-12-22 00:55:26', '2022-12-22 00:55:26'),
(6, 2, 'PENDING', 'Salem', 'Andrew\'s House', '7845968975', 'TV, AV', 'ground floor - A2', 'king', '1000', '1', '14', '[\"124365098.jpg\",\"124365114.jpg\",\"124365102.jpg\",\"124365007.jpg\"]', '2022-12-22 01:03:31', '2022-12-22 02:27:08'),
(7, 2, 'BOOKED', 'Salem', 'Andrew\'s House', '7845968975', 'TV, AC', '1st floor', 'king', '1000', '1', '14', '[\"359423566.jpg\",\"359423567.jpg\",\"359423572.jpg\",\"359423737.jpg\"]', '2022-12-22 01:45:59', '2022-12-22 02:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `email_verified_at`, `gender`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dhivakar S', '9750877805', 'sundardhivakar@gmail.com', NULL, 'Male', '3/21 Vaithiya Kaaran Kaadu, Puthur Post', '$2y$10$hnv/3.io0379g/ZQDHRij.EchppzIbSg8De5ENLGA3iN5Fisbefw6', NULL, '2022-12-21 22:47:23', '2022-12-21 22:47:23'),
(2, 'safiya begum', '9732877405', 'safiya1@gmail.com', NULL, 'Female', 'salem', '$2y$10$zd.Cy4RnA0/cN5xe7ONm6OZ2RIW8XaO3jz5Lgmi6Md7LcHazv2LYG', NULL, '2022-12-21 23:00:46', '2022-12-21 23:00:46');

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
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `books_room_id_foreign` (`room_id`),
  ADD KEY `books_user_id_foreign` (`user_id`),
  ADD KEY `books_admin_id_foreign` (`admin_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_admin_id_foreign` (`admin_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `books_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
