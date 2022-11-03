-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2022 at 04:59 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `quantity` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn_number`, `status`, `quantity`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, '72', 1, 853, NULL, '2022-11-03 03:29:11', '2022-11-03 03:29:11'),
(2, '369', 1, 500, NULL, '2022-11-03 03:29:19', '2022-11-03 03:29:19'),
(3, '289', 1, 115, NULL, '2022-11-03 03:29:22', '2022-11-03 03:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `book_circulations`
--

CREATE TABLE `book_circulations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `issue_note` text COLLATE utf8mb4_unicode_ci,
  `return_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_circulations`
--

INSERT INTO `book_circulations` (`id`, `user_id`, `book_id`, `status`, `issue_date`, `return_date`, `issue_note`, `return_note`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 'Returned', '2022-11-03', '2022-11-03', NULL, NULL, NULL, '2022-11-03 07:46:28'),
(2, 7, 2, 'Issued', '2022-11-03', '2022-11-03', NULL, NULL, NULL, NULL),
(3, 7, 1, 'Issued', '2022-11-03', '2022-11-03', NULL, NULL, NULL, NULL),
(4, 7, 3, 'Issued', '2022-11-03', '2022-11-03', NULL, NULL, NULL, NULL),
(5, 7, 2, 'Issued', '2022-11-03', '2022-11-03', NULL, NULL, NULL, NULL),
(6, 3, 1, 'Issued', '2022-11-03', '2022-11-05', NULL, NULL, NULL, NULL),
(7, 3, 2, 'Issued', '2022-11-03', '2022-11-05', NULL, NULL, NULL, NULL),
(8, 5, 3, 'Issued', '2022-11-03', '2022-11-03', 'asdas', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_translations`
--

CREATE TABLE `book_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_translations`
--

INSERT INTO `book_translations` (`id`, `book_id`, `locale`, `title`, `description`, `author`, `genre`) VALUES
(1, 1, 'en', 'Ipsa est deserunt e', NULL, 'Nam id fugiat perspi', 'Doloribus molestiae'),
(2, 1, 'bn', 'বই ১', NULL, 'Nam id fugiat perspi', 'Doloribus molestiae'),
(3, 2, 'en', 'Veniam inventore im', NULL, 'Labore nesciunt asp', 'Atque vero debitis a'),
(4, 2, 'bn', 'বই ২', NULL, 'Labore nesciunt asp', 'Atque vero debitis a'),
(5, 3, 'en', 'Velit aliquam quia', NULL, 'In delectus quis od', 'Reprehenderit veniam'),
(6, 3, 'bn', 'বই ২', NULL, 'In delectus quis od', 'Reprehenderit veniam');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_10_29_105200_create_books_table', 1),
(11, '2022_11_02_041122_create_book_circulations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('433401d72d763da45232671a0ecc3b1e26e497ee2bd828156477c9fa351365402bb1e410be7795ba', 1, '97a7c15d-01e0-4e81-8c74-5a02647ecf89', 'authToken', '[]', 0, '2022-11-03 03:52:14', '2022-11-03 03:52:14', '2023-11-03 09:52:14'),
('793006772026b536e039d3c1e0d14d08af9193c6d2c43393d03f396db4f5d2572d5e4a9dea5d778f', 1, '97a7c15d-01e0-4e81-8c74-5a02647ecf89', 'authToken', '[]', 0, '2022-11-03 03:32:24', '2022-11-03 03:32:24', '2023-11-03 09:32:24'),
('b13478c680244d4ce9db4a8ada0e04e3d0015330c000fb0fd5325d0854a0ffa92e9c749fcf3e114e', 1, '97a7c15d-01e0-4e81-8c74-5a02647ecf89', 'authToken', '[]', 0, '2022-11-03 07:57:36', '2022-11-03 07:57:36', '2023-11-03 13:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('97a7c15d-01e0-4e81-8c74-5a02647ecf89', NULL, 'Library Management System Personal Access Client', 'a3sqYPY0Io8ZoBm6AFRS3OUAHTr4GgQ86S6ttZt6', NULL, 'http://localhost', 1, 0, 0, '2022-11-03 03:26:34', '2022-11-03 03:26:34'),
('97a7c15d-053a-47ce-94be-7fc509e0dc56', NULL, 'Library Management System Password Grant Client', '1wElX7hpMuRctugQ1WKApGAgZteHNDdwEgxqasu6', 'users', 'http://localhost', 0, 1, 0, '2022-11-03 03:26:34', '2022-11-03 03:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '97a7c15d-01e0-4e81-8c74-5a02647ecf89', '2022-11-03 03:26:34', '2022-11-03 03:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `status`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', 1, '2022-01-02 11:04:58', '$2y$10$Lj7M4v/kL5YPGmpGBJ8chOOFbiXSCUdBHd/RbWup3CiGyDQxopqDe', 'avatar-1.jpg', NULL, '2022-11-03 03:25:54', '2022-11-03 03:25:54'),
(3, NULL, 'ladov@mailinator.com', 1, NULL, NULL, NULL, NULL, '2022-11-03 03:28:03', '2022-11-03 10:56:23'),
(4, NULL, 'tofa@mail.com', 1, NULL, NULL, NULL, NULL, '2022-11-03 05:25:14', '2022-11-03 05:25:14'),
(5, NULL, 'tofa11@mail.com', 1, NULL, NULL, NULL, NULL, '2022-11-03 05:25:28', '2022-11-03 05:25:28'),
(6, NULL, 'tofa11000@mail.com', 1, NULL, NULL, NULL, NULL, '2022-11-03 05:28:38', '2022-11-03 05:28:38'),
(7, NULL, 'tofa1001@mail.com', 1, NULL, NULL, NULL, NULL, '2022-11-03 05:30:30', '2022-11-03 05:30:30'),
(8, NULL, 'qobuzed@mailinator.com', 1, NULL, NULL, NULL, NULL, '2022-11-03 10:56:02', '2022-11-03 10:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_translations`
--

CREATE TABLE `user_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_translations`
--

INSERT INTO `user_translations` (`id`, `user_id`, `locale`, `name`, `phone`) VALUES
(1, 1, 'en', 'Awlad Hossain', '01673641621'),
(2, 1, 'bn', 'আওলাদ হোসেন', '০১৬৭৩৬৪১৬২১'),
(5, 3, 'en', 'Mikayla Sullivan', '+1 (255) 321-2331'),
(6, 3, 'bn', 'আমির', '+1 (649) 908-7356'),
(7, 4, 'en', 'Tofa', '01714512365'),
(8, 4, 'bn', 'তোফা', '01714512365'),
(9, 5, 'en', 'Tofa', '01714512365'),
(10, 5, 'bn', 'তোফা', '01714512365'),
(11, 6, 'en', 'Tofa', '01714512365'),
(12, 6, 'bn', 'তোফা', '01714512365'),
(13, 7, 'en', 'Tofa', '01714512365'),
(14, 7, 'bn', 'তোফা', '01714512365'),
(15, 8, 'en', 'Hannah Green', '+1 (705) 644-9189'),
(16, 8, 'bn', 'Hannah Green', '+1 (705) 644-9189');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_number_unique` (`isbn_number`);

--
-- Indexes for table `book_circulations`
--
ALTER TABLE `book_circulations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_circulations_user_id_foreign` (`user_id`),
  ADD KEY `book_circulations_book_id_foreign` (`book_id`);

--
-- Indexes for table `book_translations`
--
ALTER TABLE `book_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_translations_book_id_locale_unique` (`book_id`,`locale`),
  ADD KEY `book_translations_locale_index` (`locale`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_translations`
--
ALTER TABLE `user_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_translations_user_id_locale_unique` (`user_id`,`locale`),
  ADD KEY `user_translations_locale_index` (`locale`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_circulations`
--
ALTER TABLE `book_circulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_translations`
--
ALTER TABLE `book_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_translations`
--
ALTER TABLE `user_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_circulations`
--
ALTER TABLE `book_circulations`
  ADD CONSTRAINT `book_circulations_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_circulations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `book_translations`
--
ALTER TABLE `book_translations`
  ADD CONSTRAINT `book_translations_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_translations`
--
ALTER TABLE `user_translations`
  ADD CONSTRAINT `user_translations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
