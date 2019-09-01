-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 06:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `media_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'action', '2019-08-27 10:04:21', '2019-08-27 10:04:21'),
(2, 'horror', '2019-08-27 10:04:25', '2019-08-27 10:04:25'),
(3, 'thriller', '2019-08-27 10:04:33', '2019-08-27 10:04:33'),
(4, 'drama', '2019-08-27 10:04:38', '2019-08-27 10:04:38'),
(5, 'funny', '2019-08-27 10:04:43', '2019-08-27 10:04:43'),
(6, 'love', '2019-08-27 10:07:42', '2019-08-27 10:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `category__movies`
--

CREATE TABLE `category__movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category__movies`
--

INSERT INTO `category__movies` (`id`, `category_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2019-08-27 10:14:51', '2019-08-27 10:14:51'),
(2, 6, 1, '2019-08-27 10:14:52', '2019-08-27 10:14:52'),
(3, 4, 2, '2019-08-28 07:55:12', '2019-08-28 07:55:12'),
(4, 6, 2, '2019-08-28 07:55:12', '2019-08-28 07:55:12'),
(5, 4, 1, '2019-08-29 22:58:34', '2019-08-29 22:58:34'),
(6, 6, 1, '2019-08-29 22:58:34', '2019-08-29 22:58:34'),
(7, 4, 2, '2019-08-31 21:47:06', '2019-08-31 21:47:06'),
(8, 6, 2, '2019-08-31 21:47:08', '2019-08-31 21:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Net Scriper', '2019-08-27 10:09:43', '2019-08-27 10:09:43'),
(2, 'Green Hackers', '2019-08-27 10:09:52', '2019-08-27 10:09:52'),
(3, 'Power Phoenix', '2019-08-27 10:09:58', '2019-08-27 10:09:58');

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
(3, '2019_08_12_135417_create_categories_table', 1),
(4, '2019_08_12_155947_create_companies_table', 1),
(5, '2019_08_12_160529_create_playlists_table', 1),
(6, '2019_08_12_160615_create_photos_table', 1),
(7, '2019_08_12_160710_create_starlists_table', 1),
(8, '2019_08_12_160806_create_stars_table', 1),
(9, '2019_08_12_160840_create_positions_table', 1),
(10, '2019_08_12_160907_create_star_positions_table', 1),
(11, '2019_08_13_115852_create_movies_table', 1),
(12, '2019_08_27_162859_create_category_movies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `running_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `released_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `movie`, `actor`, `actress`, `director`, `running_time`, `released_year`, `company_id`, `created_at`, `updated_at`) VALUES
(2, 'Friend Zone', '5d6b4641325b6_HTML Lesson-19 iFrame and attributes.mp4', 'Taung Taung (taung gyi)', 'Phyo Thazin', 'Nawphaw Moonlay', '2hr 30min', '2019', 2, '2019-08-31 21:47:05', '2019-08-31 21:47:05');

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `image`, `movie_id`, `created_at`, `updated_at`) VALUES
(4, '5d6b4644ce6ae_Friend-Zone1.jpg', 2, '2019-08-31 21:47:08', '2019-08-31 21:47:08'),
(5, '5d6b4644ead41_Friend-Zone2.jpg', 2, '2019-08-31 21:47:08', '2019-08-31 21:47:08'),
(6, '5d6b464529cb8_Friend-Zone3.jpg', 2, '2019-08-31 21:47:09', '2019-08-31 21:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Actor', '2019-08-26 17:30:00', '2019-08-26 17:30:00'),
(2, 'Actress', '2019-08-26 17:30:00', '2019-08-26 17:30:00'),
(3, 'Director', '2019-08-26 17:30:00', '2019-08-26 17:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `starlists`
--

CREATE TABLE `starlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Taung Taung (taung gyi)', '2019-08-27 10:33:59', '2019-08-27 10:33:59'),
(4, 'Chit Min Thu', '2019-08-27 10:34:14', '2019-08-27 10:34:14'),
(5, 'Phyo Thazin', '2019-08-27 10:34:30', '2019-08-27 10:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `star_positions`
--

CREATE TABLE `star_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` int(11) NOT NULL,
  `star_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `star_positions`
--

INSERT INTO `star_positions` (`id`, `position_id`, `star_id`, `created_at`, `updated_at`) VALUES
(3, 3, 3, '2019-08-27 10:33:59', '2019-08-27 10:33:59'),
(4, 1, 4, '2019-08-27 10:34:14', '2019-08-27 10:34:14'),
(5, 2, 5, '2019-08-27 10:34:31', '2019-08-27 10:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category__movies`
--
ALTER TABLE `category__movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starlists`
--
ALTER TABLE `starlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `star_positions`
--
ALTER TABLE `star_positions`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category__movies`
--
ALTER TABLE `category__movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `starlists`
--
ALTER TABLE `starlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `star_positions`
--
ALTER TABLE `star_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
