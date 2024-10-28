-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 09:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `authid` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `special_requests` text DEFAULT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` time DEFAULT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `room_category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `payment_status` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `authid`, `full_name`, `email`, `phone_number`, `special_requests`, `arrival_date`, `arrival_time`, `departure_date`, `departure_time`, `city`, `hotel`, `room_category`, `price`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Ahmad', 'customer@webexcels.com', '920000000', 'nothing', '2024-09-10', NULL, '2024-09-04', NULL, 'Lahore', 'PC Hotel', 'Deluxe twin', 100.00, 'No', '2024-09-08 13:22:18', '2024-09-08 13:22:18'),
(2, 3, 'Raza', 'raza@gmail.com', '11111111111111', 'No', '2024-09-03', NULL, '2024-09-09', NULL, 'Lahore', 'PC Hotel', 'Deluxe twin', 100.00, 'No', '2024-09-08 13:31:26', '2024-09-08 13:31:26'),
(3, 3, 'malik', 'customer@webexcels.com', '920000000', 'njn', '2024-09-11', NULL, '2024-09-04', NULL, 'Lahore', 'PC Hotel', 'Deluxe twin', 100.00, 'No', '2024-09-08 13:35:48', '2024-09-08 13:35:48'),
(4, 3, 'Now', 'WEBEXCELs@webexcels.com', '1212121121', 'sdasdasdas', '2024-09-11', NULL, '2024-09-04', NULL, 'Lahore', 'PC Hotel', 'Deluxe twin', 100.00, 'No', '2024-09-08 13:42:51', '2024-09-08 13:42:51'),
(5, 3, 'New Entery', 'NewEntery@gmail.com', '1122334455', 'Demo', '2024-09-11', NULL, '2024-09-04', NULL, 'Lahore', 'PC Hotel', 'Deluxe twin', 100.00, 'No', '2024-09-08 14:27:08', '2024-09-08 14:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lahore', '2024-09-05 13:39:43', '2024-09-05 13:39:43'),
(2, 'Karachi', '2024-09-05 13:39:54', '2024-09-05 13:39:54'),
(3, 'Multan', '2024-09-05 13:40:12', '2024-09-05 13:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `authid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `authid`, `created_at`, `updated_at`) VALUES
(1, 'malik', 'customer@webexcels.com', 'Testing2', 'Testinggg', 3, '2024-09-09 09:23:05', '2024-09-09 09:23:05'),
(2, 'malik', 'customer@webexcels.com', 'testing', 'new user', 3, '2024-09-09 09:26:40', '2024-09-09 09:26:40');

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
-- Table structure for table `hotel_categories`
--

CREATE TABLE `hotel_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_categories`
--

INSERT INTO `hotel_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, '5 start', '2024-09-05 13:40:37', '2024-09-05 13:40:37'),
(2, '4 Star', '2024-09-05 13:40:52', '2024-09-05 13:40:52'),
(3, '3 Star', '2024-09-05 13:41:04', '2024-09-05 13:41:04'),
(4, '2 Star', '2024-09-05 13:41:15', '2024-09-05 13:41:15'),
(5, '1 Star', '2024-09-05 13:41:27', '2024-09-05 13:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_names`
--

CREATE TABLE `hotel_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `hotel_cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_names`
--

INSERT INTO `hotel_names` (`id`, `name`, `city_id`, `hotel_cat_id`, `created_at`, `updated_at`) VALUES
(1, 'PC Hotel', 1, 1, '2024-09-05 13:42:36', '2024-09-05 13:42:36'),
(2, 'The Residency Hotel', 1, 1, '2024-09-05 13:50:46', '2024-09-05 13:50:46'),
(3, 'Faletti\'s Hotel Lahore', 1, 1, '2024-09-05 13:51:01', '2024-09-05 13:51:01'),
(4, 'Avari Hotel Lahore', 1, 1, '2024-09-05 13:51:12', '2024-09-05 13:51:12'),
(5, 'The Nishat Hotel', 1, 1, '2024-09-05 13:51:31', '2024-09-05 13:51:31');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_29_054959_create_cities_table', 1),
(6, '2024_08_29_062750_create_hotel_categories_table', 1),
(7, '2024_08_29_062816_create_hotel_names_table', 1),
(8, '2024_08_31_064655_create_room_categories_table', 1),
(9, '2024_08_31_065522_create_rooms_table', 1),
(10, '2024_09_06_040013_add_image_to_room_categories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_category_id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_category_id`, `hotel_id`, `city_id`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 1, 10000.00, 'Modern and elegant, with essential amenities.', '2024-09-05 13:52:49', '2024-09-06 00:14:42'),
(2, 8, 1, 1, 8000.00, 'More spacious, ideal for business travelers', '2024-09-05 14:48:21', '2024-09-06 00:14:54'),
(3, 10, 1, 1, 6000.00, 'Features a separate seating area with premium amenities.', '2024-09-05 14:49:09', '2024-09-06 00:15:05'),
(4, 9, 1, 1, 4000.00, 'Luxurious suite with a living area and a more spacious design.', '2024-09-05 14:49:32', '2024-09-06 00:15:37'),
(5, 11, 1, 1, 2000.00, 'Ultimate luxury, with multiple rooms, private dining, and lavish decor.', '2024-09-05 14:49:51', '2024-09-06 00:15:50'),
(6, 12, 4, 1, 12000.00, 'High-end furnishings, offering extra comfort.', '2024-09-05 14:50:20', '2024-09-06 00:15:58'),
(7, 12, 1, 1, 90000.00, 'testing', '2024-09-07 14:18:11', '2024-09-07 14:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `category`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Executive Room', '2024-09-05 13:48:09', '2024-09-05 13:48:09', NULL),
(3, 'Junior Suite', '2024-09-05 13:48:22', '2024-09-05 13:48:22', NULL),
(4, 'Royal Suite', '2024-09-05 13:48:48', '2024-09-05 13:48:48', NULL),
(5, 'Presidential Suite', '2024-09-05 13:49:12', '2024-09-05 13:49:12', NULL),
(6, 'Superior Room', '2024-09-05 13:49:24', '2024-09-05 13:49:24', NULL),
(7, 'Deluxe king', '2024-09-05 22:54:00', '2024-09-05 23:02:51', '1725595371.jpg'),
(8, 'Deluxe twin', '2024-09-05 23:06:18', '2024-09-05 23:06:18', '1725595578.jpg'),
(9, 'Excutive twin', '2024-09-05 23:07:12', '2024-09-05 23:07:12', '1725595632.jpg'),
(10, 'Executive king', '2024-09-05 23:08:02', '2024-09-05 23:08:02', '1725595682.jpg'),
(11, 'Standard king', '2024-09-05 23:08:28', '2024-09-05 23:08:28', '1725595708.jpg'),
(12, 'Standard Twin', '2024-09-05 23:09:00', '2024-09-05 23:09:00', '1725595740.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fahad Bin Khalid', 'fahadrajpoot537@gmail.com', NULL, '$2y$12$w3fzg8sQDbIhtQid8DKy7OdaC67APtYxJokQSR9vijQTCm3qTR88a', 'admin', NULL, '2024-08-31 02:07:23', '2024-08-31 02:07:23'),
(2, 'Muhammad Habib Ahmad', 'Admin@gmail.com', NULL, '$2y$12$RUPfo7ZeziNkQMFWfp.c3.J11hVAQSMAij2W75uEmsGnH5NRR0fHS', 'admin', NULL, '2024-09-05 13:36:27', '2024-09-05 13:36:27'),
(3, 'raza', 'raza@gmail.com', NULL, '$2y$12$8QoqociBmXH3.4orkwK6FOOUB6vEls2ES9UIe4MdP2OrhT3Tx53QG', 'user', NULL, '2024-09-08 01:34:25', '2024-09-08 01:34:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_names`
--
ALTER TABLE `hotel_names`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_names_city_id_foreign` (`city_id`),
  ADD KEY `hotel_names_hotel_cat_id_foreign` (`hotel_cat_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `rooms_room_category_id_foreign` (`room_category_id`),
  ADD KEY `rooms_hotel_id_foreign` (`hotel_id`),
  ADD KEY `rooms_city_id_foreign` (`city_id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_names`
--
ALTER TABLE `hotel_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_names`
--
ALTER TABLE `hotel_names`
  ADD CONSTRAINT `hotel_names_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_names_hotel_cat_id_foreign` FOREIGN KEY (`hotel_cat_id`) REFERENCES `hotel_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_names` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_room_category_id_foreign` FOREIGN KEY (`room_category_id`) REFERENCES `room_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
