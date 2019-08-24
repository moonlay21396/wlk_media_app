-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 07:27 PM
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
(3, 'horror', '2019-08-13 04:21:31', '2019-08-13 04:21:31'),
(4, 'action', '2019-08-13 04:21:36', '2019-08-13 04:21:36'),
(5, 'drama', '2019-08-13 04:21:41', '2019-08-13 04:21:41'),
(6, 'thriller', '2019-08-13 04:21:49', '2019-08-13 04:21:49'),
(7, 'story', '2019-08-13 04:21:53', '2019-08-13 04:21:53'),
(8, 'funny', '2019-08-13 04:22:01', '2019-08-13 04:22:01');

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
(1, 'Net Scriper', '2019-08-13 03:21:22', '2019-08-13 05:52:41'),
(3, 'myanmar web designer', '2019-08-13 04:59:38', '2019-08-13 05:09:18'),
(5, 'Cyber Market', '2019-08-13 05:52:31', '2019-08-13 05:52:31');

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
(11, '2019_08_13_115852_create_movies_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Pitch Black', '5d5af0f2f3801_HTML Lesson-9 Order list and Unorder List.mp4', 'Riddick', 'Radha Mitchell', 'David Twohy', '1hr 20min', '2000', 1, '2019-08-19 12:26:51', '2019-08-19 12:26:51'),
(2, 'Hobbs & Shaw (2019)', '5d5af6daca62a_HTML Lesson-3 img and exercises.mp4', 'Luke Hobbs,Deckard Shaw', 'Hattie Shaw', 'David Leitch', '2hr 30min', '2019', 1, '2019-08-19 12:52:02', '2019-08-19 12:52:02'),
(3, 'Once Upon a Time in Hollywood', '5d5af86a3d5d3_HTML Lesson-20 audio and video element.mp4', 'Margot Robbie,Leonardo DiCaprio', 'Brad Pitt', 'Quentin Tarantino', '3hr', '2019', 3, '2019-08-19 12:58:42', '2019-08-19 12:58:42'),
(4, 'Aladdin', '5d5afa9239bf4_HTML Lesson-6 Font tag and Attributes.mp4', 'Aladdin', 'princess jasmine', 'Guy Ritchie', '3hr', '2019', 5, '2019-08-19 13:07:54', '2019-08-19 13:07:54'),
(5, 'Spider-Man: Far from Home', '5d5afe5b9e655_HTML Lesson-16 Table and Attributes.mp4', 'Tom Holland, Mysterio', 'Michelle \"MJ\" Jones', 'Jon Watts', '2hr 30min', '2019', 3, '2019-08-19 13:24:03', '2019-08-19 13:24:03'),
(6, 'Mission: Impossible – Fallout', '5d5b015495201_HTML Lesson-8 Hyper link and Image link.mp4', 'Ethan Hunt, Henry Cavill', 'Ilsa Faust', 'Christopher McQuarrie', '2hr 30min', '2018', 5, '2019-08-19 13:36:44', '2019-08-19 13:36:44'),
(22, 'Friend Zone', '5d5f9c4c6be5f_HTML Lesson-19 iFrame and attributes.mp4', 'Phyo Thazin', 'Taung Taung (taung gyi)', 'Nawphaw Moonlay', '2hr', '2019', 3, '2019-08-23 01:27:00', '2019-08-23 01:27:00'),
(23, 'Power Phoenix Myanmar', '5d5f9ce44c2e7_HTML Lesson-19 iFrame and attributes.mp4', 'Nawphaw Moonlay', 'Zayy', 'David Twohy', '1hr 45min', '2019', 5, '2019-08-23 01:29:32', '2019-08-23 01:29:32'),
(24, 'Moon Lay', '5d5f9d1df21ea_HTML Lesson-17 Marquee and Meta tag.mp4', 'Chit Min Thu', 'ko zay', 'Nawphaw Moonlay', '3hr', '2018', 3, '2019-08-23 01:30:30', '2019-08-23 01:30:30');

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
(62, '5d5af0f310f2c_pitchblack.jpg', 1, '2019-08-19 12:26:51', '2019-08-19 12:26:51'),
(63, '5d5af0f317d65_pitchblack2.jpg', 1, '2019-08-19 12:26:51', '2019-08-19 12:26:51'),
(64, '5d5af0f323e8b_pitchblack3.jpg', 1, '2019-08-19 12:26:51', '2019-08-19 12:26:51'),
(65, '5d5af0f32ef85_pitchblack4.jpg', 1, '2019-08-19 12:26:51', '2019-08-19 12:26:51'),
(66, '5d5af6dad8273_Hobbs-Shaw.jpg', 2, '2019-08-19 12:52:02', '2019-08-19 12:52:02'),
(67, '5d5af6daef4bd_Hobbs-Shaw1.jpg', 2, '2019-08-19 12:52:02', '2019-08-19 12:52:02'),
(68, '5d5af6db0487e_Hobbs-Shaw2.jpg', 2, '2019-08-19 12:52:03', '2019-08-19 12:52:03'),
(69, '5d5af6db164e6_Hobbs-Shaw3.jpg', 2, '2019-08-19 12:52:03', '2019-08-19 12:52:03'),
(70, '5d5af86a45a80_maxresdefault1.jpg', 3, '2019-08-19 12:58:42', '2019-08-19 12:58:42'),
(71, '5d5af86a51eed_maxresdefault2.jpg', 3, '2019-08-19 12:58:42', '2019-08-19 12:58:42'),
(72, '5d5af86a5b321_maxresdefault3.jpg', 3, '2019-08-19 12:58:42', '2019-08-19 12:58:42'),
(73, '5d5afa92512e4_hqdefault1.jpg', 4, '2019-08-19 13:07:54', '2019-08-19 13:07:54'),
(74, '5d5afa925c0d6_hqdefault2.jpg', 4, '2019-08-19 13:07:54', '2019-08-19 13:07:54'),
(75, '5d5afa9269a40_hqdefault3.jpg', 4, '2019-08-19 13:07:54', '2019-08-19 13:07:54'),
(76, '5d5afe5ba7b69_spider1.jpg', 5, '2019-08-19 13:24:03', '2019-08-19 13:24:03'),
(77, '5d5afe5bafead_spider2.jpg', 5, '2019-08-19 13:24:03', '2019-08-19 13:24:03'),
(78, '5d5afe5bb985e_spider3.jpg', 5, '2019-08-19 13:24:03', '2019-08-19 13:24:03'),
(79, '5d5b0154a1c95_impossible1.jpg', 6, '2019-08-19 13:36:44', '2019-08-19 13:36:44'),
(80, '5d5b0154af85e_impossible2.jpg', 6, '2019-08-19 13:36:44', '2019-08-19 13:36:44'),
(81, '5d5b0154b7754_impossible3.jpg', 6, '2019-08-19 13:36:44', '2019-08-19 13:36:44'),
(120, '5d5f9c4c7fd4b_Friend-Zone1.jpg', 22, '2019-08-23 01:27:00', '2019-08-23 01:27:00'),
(121, '5d5f9ce45e7ae_deadpool3.jpg', 23, '2019-08-23 01:29:32', '2019-08-23 01:29:32'),
(122, '5d5f9ce4711d6_Friend-Zone1.jpg', 23, '2019-08-23 01:29:32', '2019-08-23 01:29:32'),
(123, '5d5f9ce4815fb_Friend-Zone2.jpg', 23, '2019-08-23 01:29:32', '2019-08-23 01:29:32'),
(124, '5d5f9ce48d66c_Friend-Zone3.jpg', 23, '2019-08-23 01:29:32', '2019-08-23 01:29:32'),
(125, '5d5f9ce4a8623_Hobbs-Shaw.jpg', 23, '2019-08-23 01:29:32', '2019-08-23 01:29:32'),
(126, '5d5f9d1e0e9e1_1_7icngF5L1VjB-5JSBsTtzw1.jpeg', 24, '2019-08-23 01:30:30', '2019-08-23 01:30:30'),
(127, '5d5f9d1e1ffb3_aquaman1.jpg', 24, '2019-08-23 01:30:30', '2019-08-23 01:30:30'),
(128, '5d5f9d1e2ed17_aquaman2.jpg', 24, '2019-08-23 01:30:30', '2019-08-23 01:30:30'),
(129, '5d5f9d1e447c5_aquaman3.jpg', 24, '2019-08-23 01:30:30', '2019-08-23 01:30:30'),
(130, '5d5f9d1e4ca36_deadpool1.jpg', 24, '2019-08-23 01:30:30', '2019-08-23 01:30:30'),
(131, '5d5f9d1e5b7ef_deadpool2.jpg', 24, '2019-08-23 01:30:30', '2019-08-23 01:30:30'),
(132, '5d5f9d1e6bb04_deadpool3.jpg', 24, '2019-08-23 01:30:30', '2019-08-23 01:30:30'),
(133, 's:21:\"5d5fa875cedc7_ww1.jpg\";', 25, '2019-08-23 02:18:53', '2019-08-23 02:18:53'),
(134, 's:21:\"5d5fa876164f2_ww2.jpg\";', 25, '2019-08-23 02:18:54', '2019-08-23 02:18:54'),
(135, 's:21:\"5d5fa87624fcf_ww3.jpg\";', 25, '2019-08-23 02:18:54', '2019-08-23 02:18:54'),
(136, 's:25:\"5d5fa8fd0a70e_spider1.jpg\";', 26, '2019-08-23 02:21:09', '2019-08-23 02:21:09'),
(137, 's:25:\"5d5fa8fd1f720_spider2.jpg\";', 26, '2019-08-23 02:21:09', '2019-08-23 02:21:09'),
(138, 's:25:\"5d5fa8fd2fce7_spider3.jpg\";', 26, '2019-08-23 02:21:09', '2019-08-23 02:21:09');

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
(1, 'Actor', NULL, NULL),
(2, 'Actress', NULL, NULL),
(3, 'Director', NULL, NULL),
(4, 'Script Writer', NULL, NULL);

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
(2, 'Phyo Thazin', '2019-08-13 21:38:30', '2019-08-13 21:38:30'),
(3, 'Nawphaw Moonlay', '2019-08-13 00:56:25', '2019-08-13 00:56:25'),
(5, 'Taung Taung (taung gyi)', '2019-08-13 00:57:12', '2019-08-13 00:57:12'),
(6, 'Chit Min Thi', '2019-08-13 00:57:33', '2019-08-13 00:57:33'),
(7, 'ko zay', '2019-08-13 03:50:45', '2019-08-13 03:50:45'),
(8, 'Nawphaw Moonlay', '2019-08-13 21:41:04', '2019-08-13 21:41:04');

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
(3, 2, 3, '2019-08-13 00:56:26', '2019-08-13 00:56:26'),
(4, 3, 3, '2019-08-13 00:56:26', '2019-08-13 00:56:26'),
(6, 1, 5, '2019-08-13 00:57:12', '2019-08-13 00:57:12'),
(7, 3, 5, '2019-08-13 00:57:12', '2019-08-13 00:57:12'),
(8, 3, 6, '2019-08-13 00:57:33', '2019-08-13 00:57:33'),
(9, 4, 6, '2019-08-13 00:57:33', '2019-08-13 00:57:33'),
(10, 1, 7, '2019-08-13 03:50:45', '2019-08-13 03:50:45'),
(11, 2, 7, '2019-08-13 03:50:45', '2019-08-13 03:50:45'),
(12, 3, 7, '2019-08-13 03:50:45', '2019-08-13 03:50:45'),
(13, 4, 7, '2019-08-13 03:50:45', '2019-08-13 03:50:45');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$9y5wC6acKySDZF1YP5txN.A79xZwf2zO/1gk7TH8wA/SpObr5o8/G', NULL, '2019-08-12 22:26:05', '2019-08-12 22:26:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `starlists`
--
ALTER TABLE `starlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `star_positions`
--
ALTER TABLE `star_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
