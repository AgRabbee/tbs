-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2019 at 11:30 PM
-- Server version: 10.1.38-MariaDB-0ubuntu0.18.10.2
-- PHP Version: 7.2.19-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_no` int(11) NOT NULL,
  `company_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` int(11) NOT NULL,
  `company_status` int(11) NOT NULL COMMENT '0->pending, 1->active, 2->denied',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `description`, `address`, `reg_no`, `tin_no`, `company_image`, `trade`, `vat`, `fees`, `company_status`, `created_at`, `updated_at`) VALUES
(2, 'Davenport and Serrano Traders', 'Nostrum ullamco sunt', 'Marsh Thornton Associates', 'Buck and Clarke Co', 879, 'busOne_1573163447_.png', 'licenseOne_1573163447_.jpg', 'vatOne_1573163447_.png', 21, 1, '2019-11-07 15:50:47', '2019-11-07 16:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `company_transport`
--

CREATE TABLE `company_transport` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `transport_type_id` bigint(20) UNSIGNED NOT NULL,
  `total_seats` int(11) NOT NULL,
  `registration_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_transport`
--

INSERT INTO `company_transport` (`id`, `company_id`, `transport_type_id`, `total_seats`, `registration_no`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 36, 'rx2316523', '2019-11-08 05:37:51', '2019-11-08 05:37:51'),
(2, 2, 1, 36, 'bd26531', '2019-11-08 05:51:32', '2019-11-08 05:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `company_user`
--

CREATE TABLE `company_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL COMMENT '0->pending, 1->active, 2->denied',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_user`
--

INSERT INTO `company_user` (`id`, `user_id`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, NULL, NULL),
(3, 5, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Faridpur'),
(3, 'Gazipur'),
(4, 'Gopalganj'),
(5, 'Jamalpur'),
(6, 'Kishoreganj'),
(7, 'Madaripur'),
(8, 'Manikganj'),
(9, 'Munshiganj'),
(10, 'Mymensingh'),
(11, 'Narayanganj'),
(12, 'Narsingdi'),
(13, 'Netrokona'),
(14, 'Rajbari'),
(15, 'Shariatpur'),
(16, 'Sherpur'),
(17, 'Tangail'),
(18, 'Bogura'),
(19, 'Joypurhat'),
(20, 'Naogaon'),
(21, 'Natore'),
(22, 'Chapainawabganj'),
(23, 'Pabna'),
(24, 'Rajshahi'),
(25, 'Sirajgonj'),
(26, 'Dinajpur'),
(27, 'Gaibandha'),
(28, 'Kurigram'),
(29, 'Lalmonirhat'),
(30, 'Nilphamari'),
(31, 'Panchagarh'),
(32, 'Rangpur'),
(33, 'Thakurgaon'),
(34, 'Barguna'),
(35, 'Barishal'),
(36, 'Bhola'),
(37, 'Jhalokati'),
(38, 'Patuakhali'),
(39, 'Pirojpur'),
(40, 'Bandarban'),
(41, 'Brahmanbaria'),
(42, 'Chandpur'),
(43, 'Chattogram'),
(44, 'Cumilla'),
(45, 'Cox\'s Bazar'),
(46, 'Feni'),
(47, 'Khagrachhari'),
(48, 'Lakshmipur'),
(49, 'Noakhali'),
(50, 'Rangamati'),
(51, 'Habiganj'),
(52, 'Moulvibazar'),
(53, 'Sunamganj'),
(54, 'Sylhet'),
(55, 'Bagerhat'),
(56, 'Chuadanga'),
(57, 'Jashore'),
(58, 'Jhenaidah'),
(59, 'Khulna'),
(60, 'Kushtia'),
(61, 'Magura'),
(62, 'Meherpur'),
(63, 'Narail'),
(64, 'Satkhira');

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
(3, '2019_08_20_154513_create_roles_table', 1),
(4, '2019_08_20_154938_create_role_user_table', 1),
(5, '2019_08_20_161016_create_districts_table', 1),
(6, '2019_09_16_080609_create_companies_table', 1),
(7, '2019_09_24_053338_create_company_user_table', 1),
(8, '2019_09_24_053626_create_transports_table', 1),
(9, '2019_09_24_053643_create_company_transport_table', 1),
(10, '2019_10_05_183324_create_trips_table', 1),
(11, '2019_11_06_155716_create_payment_details_table', 1),
(12, '2019_11_08_111915_create_reservations_table', 2);

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
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0->pending;1->completed',
  `payment_type` int(11) NOT NULL COMMENT '0->stripe;1->cashOnDelivery',
  `stripe_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `user_id`, `payment_status`, `payment_type`, `stripe_token`, `user_address`, `created_at`, `updated_at`) VALUES
(4, 15, 1, 0, 'tok_1Fd3UMJocvQPOEuvDoQ8wW8B', NULL, '2019-11-09 17:37:08', '2019-11-09 17:37:08'),
(5, 16, 1, 0, 'tok_1Fd3iIJocvQPOEuvTZeCrezo', NULL, '2019-11-09 17:51:32', '2019-11-09 17:51:32'),
(6, 17, 1, 0, 'tok_1FdFjZJocvQPOEuvgo4B7aTs', NULL, '2019-11-10 06:41:40', '2019-11-10 06:41:40'),
(7, 18, 1, 0, 'tok_1FdFndJocvQPOEuvRg5Jc8Wl', NULL, '2019-11-10 06:45:51', '2019-11-10 06:45:51'),
(8, 20, 1, 0, 'tok_1FdFrTJocvQPOEuvPEK3lUqf', NULL, '2019-11-10 06:49:48', '2019-11-10 06:49:48'),
(9, 22, 1, 0, 'tok_1FdFsHJocvQPOEuvNY6D7Hmg', NULL, '2019-11-10 06:50:38', '2019-11-10 06:50:38'),
(10, 23, 1, 0, 'tok_1FdFt3JocvQPOEuvF7Fcj5xR', NULL, '2019-11-10 06:51:27', '2019-11-10 06:51:27'),
(11, 24, 1, 0, 'tok_1FdKOFJocvQPOEuvMVnSeZ1D', NULL, '2019-11-10 11:39:58', '2019-11-10 11:39:58'),
(12, 26, 1, 0, 'tok_1FdKQfJocvQPOEuv5SDHba85', NULL, '2019-11-10 11:42:27', '2019-11-10 11:42:27'),
(13, 27, 1, 0, 'tok_1FdKVXJocvQPOEuvMpICW1to', NULL, '2019-11-10 11:47:29', '2019-11-10 11:47:29'),
(14, 29, 1, 0, 'tok_1FdKWzJocvQPOEuvZlzquxcO', NULL, '2019-11-10 11:48:58', '2019-11-10 11:48:58'),
(15, 30, 1, 0, 'tok_1FdKXxJocvQPOEuvbKC3MekI', NULL, '2019-11-10 11:49:59', '2019-11-10 11:49:59'),
(16, 31, 1, 0, 'tok_1FdKYcJocvQPOEuvAHJhXHYh', NULL, '2019-11-10 11:50:42', '2019-11-10 11:50:42'),
(17, 32, 1, 0, 'tok_1FdKbUJocvQPOEuvanxp7MD1', NULL, '2019-11-10 11:53:40', '2019-11-10 11:53:40'),
(18, 33, 1, 0, 'tok_1FdZnLJocvQPOEuvm5eWPGMU', NULL, '2019-11-11 04:06:54', '2019-11-11 04:06:54'),
(19, 34, 1, 0, 'tok_1FdbEHJocvQPOEuvQrGMi34Z', NULL, '2019-11-11 05:38:48', '2019-11-11 05:38:48'),
(20, 36, 1, 0, 'tok_1FdbFFJocvQPOEuvf9wveKLg', NULL, '2019-11-11 05:39:47', '2019-11-11 05:39:47'),
(21, 37, 1, 0, 'tok_1FdbG7JocvQPOEuvXMoovolU', NULL, '2019-11-11 05:40:41', '2019-11-11 05:40:41'),
(22, 38, 1, 0, 'tok_1FdbGvJocvQPOEuvXsV2rxPS', NULL, '2019-11-11 05:41:31', '2019-11-11 05:41:31'),
(23, 40, 1, 0, 'tok_1FdbHJJocvQPOEuvg77rtiGQ', NULL, '2019-11-11 05:41:54', '2019-11-11 05:41:54'),
(24, 41, 1, 0, 'tok_1FdbPkJocvQPOEuv3jEWtQ8g', NULL, '2019-11-11 05:50:38', '2019-11-11 05:50:38'),
(25, 42, 1, 0, 'tok_1FdbQ6JocvQPOEuvB23AxxDp', NULL, '2019-11-11 05:51:00', '2019-11-11 05:51:00'),
(26, 43, 1, 0, 'tok_1FdbQjJocvQPOEuvZoadr8D5', NULL, '2019-11-11 05:51:38', '2019-11-11 05:51:38'),
(27, 44, 1, 0, 'tok_1FdbS4JocvQPOEuv2SHWJQqm', NULL, '2019-11-11 05:53:02', '2019-11-11 05:53:02'),
(28, 45, 1, 0, 'tok_1FdbSbJocvQPOEuvEqY6pjfv', NULL, '2019-11-11 05:53:34', '2019-11-11 05:53:34'),
(29, 46, 1, 0, 'tok_1FdbT9JocvQPOEuvgIoFQ0Og', NULL, '2019-11-11 05:54:09', '2019-11-11 05:54:09'),
(30, 47, 1, 0, 'tok_1FdbTcJocvQPOEuvYbHxxVAl', NULL, '2019-11-11 05:54:38', '2019-11-11 05:54:38'),
(31, 48, 1, 0, 'tok_1FdbUCJocvQPOEuvICZ6dEtI', NULL, '2019-11-11 05:55:13', '2019-11-11 05:55:13'),
(32, 49, 1, 0, 'tok_1FdbVKJocvQPOEuvOtJ8zr8e', NULL, '2019-11-11 05:56:24', '2019-11-11 05:56:24'),
(33, 50, 1, 0, 'tok_1FdbW5JocvQPOEuv1LGSjXqG', NULL, '2019-11-11 05:57:10', '2019-11-11 05:57:10'),
(34, 52, 1, 0, 'tok_1FdbWZJocvQPOEuvPjcQRSYP', NULL, '2019-11-11 05:57:41', '2019-11-11 05:57:41'),
(35, 53, 1, 0, 'tok_1FdbzdJocvQPOEuvSo5ApiiT', NULL, '2019-11-11 06:27:43', '2019-11-11 06:27:43'),
(36, 54, 1, 0, 'tok_1Fdc27JocvQPOEuv7S3kYrny', NULL, '2019-11-11 06:30:17', '2019-11-11 06:30:17'),
(37, 55, 1, 0, 'tok_1Fdc3YJocvQPOEuvGAssl2UL', NULL, '2019-11-11 06:31:45', '2019-11-11 06:31:45'),
(38, 56, 1, 0, 'tok_1FdcIsJocvQPOEuvVrsMvro7', NULL, '2019-11-11 06:47:35', '2019-11-11 06:47:35'),
(39, 57, 1, 0, 'tok_1FdcJVJocvQPOEuvUWF66wLk', NULL, '2019-11-11 06:48:15', '2019-11-11 06:48:15'),
(40, 58, 1, 0, 'tok_1FdcPQJocvQPOEuvPJUQM52j', NULL, '2019-11-11 06:54:22', '2019-11-11 06:54:22'),
(41, 59, 1, 0, 'tok_1FdcPnJocvQPOEuvYxwqFhEH', NULL, '2019-11-11 06:54:45', '2019-11-11 06:54:45'),
(42, 60, 1, 0, 'tok_1FdcRlJocvQPOEuvCqSvqXzv', NULL, '2019-11-11 06:56:47', '2019-11-11 06:56:47'),
(43, 61, 1, 0, 'tok_1FdcVMJocvQPOEuvtKMEV3zf', NULL, '2019-11-11 07:00:30', '2019-11-11 07:00:30'),
(44, 62, 1, 0, 'tok_1FgeegJocvQPOEuvuGzYPTfM', NULL, '2019-11-19 15:54:43', '2019-11-19 15:54:43'),
(45, 63, 1, 0, 'tok_1Fh1FsJocvQPOEuvxxerezCn', NULL, '2019-11-20 16:02:34', '2019-11-20 16:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `seat_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_status` int(11) NOT NULL COMMENT '0->empty;1->pending;2->complete',
  `trip_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `payment_id`, `seat_number`, `seat_status`, `trip_id`, `created_at`, `updated_at`) VALUES
(2, 5, 'A1', 2, 3, NULL, '2019-10-07 18:00:00'),
(3, 4, 'A2', 2, 3, NULL, '2019-10-09 17:37:08'),
(4, 6, 'A3', 2, 3, NULL, '2019-10-10 06:41:40'),
(5, 10, 'A4', 2, 3, NULL, '2019-11-10 06:51:27'),
(6, 12, 'B1', 2, 3, NULL, '2019-11-10 11:42:27'),
(7, 4, 'B2', 2, 3, NULL, '2019-11-09 17:37:08'),
(8, 5, 'B3', 2, 3, NULL, '2019-11-09 17:51:32'),
(9, 17, 'B4', 2, 3, NULL, '2019-11-10 11:53:40'),
(10, 18, 'C1', 2, 3, NULL, '2019-11-11 04:06:54'),
(11, 41, 'C2', 2, 3, NULL, '2019-11-11 06:54:45'),
(12, 5, 'C3', 2, 3, NULL, '2019-11-09 17:51:32'),
(13, NULL, 'C4', 0, 3, NULL, NULL),
(14, 43, 'D1', 2, 3, NULL, '2019-11-11 07:00:30'),
(15, 44, 'D2', 2, 3, NULL, '2019-11-19 15:54:43'),
(16, 45, 'D3', 2, 3, NULL, '2019-11-20 16:02:34'),
(17, NULL, 'D4', 0, 3, NULL, NULL),
(18, 43, 'E1', 2, 3, NULL, '2019-11-11 07:00:30'),
(19, 42, 'E2', 2, 3, NULL, '2019-11-11 06:56:47'),
(20, NULL, 'E3', 0, 3, NULL, NULL),
(21, NULL, 'E4', 0, 3, NULL, NULL),
(22, 42, 'F1', 2, 3, NULL, '2019-11-11 06:56:47'),
(23, NULL, 'F2', 0, 3, NULL, NULL),
(24, NULL, 'F3', 0, 3, NULL, NULL),
(25, NULL, 'F4', 0, 3, NULL, NULL),
(26, NULL, 'G1', 0, 3, NULL, NULL),
(27, NULL, 'G2', 0, 3, NULL, NULL),
(28, NULL, 'G3', 0, 3, NULL, NULL),
(29, NULL, 'G4', 0, 3, NULL, NULL),
(30, NULL, 'H1', 0, 3, NULL, NULL),
(31, NULL, 'H2', 0, 3, NULL, NULL),
(32, NULL, 'H3', 0, 3, NULL, NULL),
(33, NULL, 'H4', 0, 3, NULL, NULL),
(34, NULL, 'I1', 0, 3, NULL, NULL),
(35, NULL, 'I2', 0, 3, NULL, NULL),
(36, NULL, 'I3', 0, 3, NULL, NULL),
(37, NULL, 'I4', 0, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin has the full power of this application', '2019-11-07 13:21:57', '2019-11-07 13:21:57'),
(2, 'Admin', 'Admin has only access to his own company account', '2019-11-07 13:21:57', '2019-11-07 13:21:57'),
(3, 'Driver', 'Driver has only access to his own account through mobile application', '2019-11-07 13:21:57', '2019-11-07 13:21:57'),
(4, 'Customer', 'Customer has only access to his own account', '2019-11-07 13:21:57', '2019-11-07 13:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(7, 2, 4, NULL, NULL),
(8, 2, 2, NULL, NULL),
(9, 5, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transport_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1->ac; 2->non-ac',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `transport_type`, `ac_type`, `created_at`, `updated_at`) VALUES
(1, 'Bus', '1', '2019-11-08 05:35:06', '2019-11-08 05:35:06'),
(2, 'Bus', '2', '2019-11-08 05:35:21', '2019-11-08 05:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `start_point` bigint(20) UNSIGNED NOT NULL,
  `end_point` bigint(20) UNSIGNED NOT NULL,
  `fare` int(11) NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `company_id`, `date`, `start_time`, `bus_id`, `start_point`, `end_point`, `fare`, `driver_id`, `created_at`, `updated_at`) VALUES
(3, 2, '2019-11-30', '07:00 AM', 1, 1, 2, 80, 3, '2019-11-08 08:11:13', '2019-11-08 08:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(11) DEFAULT NULL,
  `user_status` int(11) NOT NULL COMMENT '0->pending,1->active,2->denied',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `nid`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'system', 'admin', 'admin@tbs.com', NULL, '$2y$10$dJXfMk5iQBGIXplEEnfJEezFXGdxGfDgSZBQs5FisNmdhWHwghWji', '01799872659', 123456789, 1, NULL, '2019-11-07 13:21:57', '2019-11-07 13:21:57'),
(2, 'Ag', 'Rabbee', 'a@b.com', NULL, '$2y$10$wz.1k1z8UFgBrazk4aB0QeUsqivbm58OfrFwzh95mdV5bETz60qti', '01799872659', 123456789, 1, NULL, '2019-11-07 13:21:57', '2019-11-07 16:02:37'),
(5, 'Lacota', 'Hood', 'fosojef@mailinator.net', NULL, '$2y$10$r6Hs57C3nEEr/Xkgrvb6WevTqKVw3z0xzlgW1GmT1q/oi0xomYrXK', '+1 (896) 609-8457', 21654531, 1, NULL, '2019-11-08 06:19:04', '2019-11-08 06:19:04'),
(15, 'Octavia', 'Jensen', NULL, NULL, NULL, '+1 (223) 627-2347', NULL, 0, NULL, '2019-11-09 17:37:07', '2019-11-09 17:37:07'),
(16, 'Darius', 'Morales', 'fezopufih@mailinator.net', NULL, NULL, '+1 (257) 731-7944', NULL, 0, NULL, '2019-11-09 17:51:31', '2019-11-09 17:51:31'),
(17, 'Gisela', 'Bernard', 'lifokulojo@mailinator.com', NULL, NULL, '+1 (514) 219-1432', NULL, 0, NULL, '2019-11-10 06:41:37', '2019-11-10 06:41:37'),
(18, 'Walker', 'Hurst', 'soxygikugi@mailinator.com', NULL, NULL, '+1 (302) 455-6179', NULL, 0, NULL, '2019-11-10 06:45:49', '2019-11-10 06:45:49'),
(20, 'Lana', 'Becker', 'jytymecu@mailinator.net', NULL, NULL, '+1 (982) 575-5158', NULL, 0, NULL, '2019-11-10 06:49:47', '2019-11-10 06:49:47'),
(22, 'Barbara', 'Lamb', 'savacigyb@mailinator.com', NULL, NULL, '+1 (719) 742-1727', NULL, 0, NULL, '2019-11-10 06:50:37', '2019-11-10 06:50:37'),
(23, 'Rina', 'Burton', 'cone@mailinator.net', NULL, NULL, '+1 (451) 502-4598', NULL, 0, NULL, '2019-11-10 06:51:25', '2019-11-10 06:51:25'),
(24, 'Isaiah', 'Melton', 'cegy@mailinator.com', NULL, NULL, '+1 (747) 988-2515', NULL, 0, NULL, '2019-11-10 11:39:55', '2019-11-10 11:39:55'),
(26, 'Buckminster', 'Mills', 'degyf@mailinator.net', NULL, NULL, '+1 (847) 452-6759', NULL, 0, NULL, '2019-11-10 11:42:25', '2019-11-10 11:42:25'),
(27, 'Katell', 'Dominguez', 'bejypiny@mailinator.com', NULL, NULL, '+1 (682) 542-1257', NULL, 0, NULL, '2019-11-10 11:47:27', '2019-11-10 11:47:27'),
(29, 'Darryl', 'Montgomery', 'synasyfexe@mailinator.net', NULL, NULL, '+1 (878) 591-8155', NULL, 0, NULL, '2019-11-10 11:48:57', '2019-11-10 11:48:57'),
(30, 'Linda', 'Pollard', 'berivivozy@mailinator.com', NULL, NULL, '+1 (939) 467-6266', NULL, 0, NULL, '2019-11-10 11:49:58', '2019-11-10 11:49:58'),
(31, 'Yvette', 'Bowers', 'juqype@mailinator.net', NULL, NULL, '+1 (422) 616-6869', NULL, 0, NULL, '2019-11-10 11:50:39', '2019-11-10 11:50:39'),
(32, 'Liberty', 'Guy', 'nalyqanope@mailinator.net', NULL, NULL, '+1 (912) 584-2472', NULL, 0, NULL, '2019-11-10 11:53:36', '2019-11-10 11:53:36'),
(33, 'Iliana', 'Ingram', 'fydyh@mailinator.net', NULL, NULL, '+1 (702) 988-7779', NULL, 0, NULL, '2019-11-11 04:06:51', '2019-11-11 04:06:51'),
(34, 'Neville', 'Douglas', 'zinysy@mailinator.com', NULL, NULL, '+1 (374) 578-8794', NULL, 0, NULL, '2019-11-11 05:38:46', '2019-11-11 05:38:46'),
(36, 'Germane', 'Lott', 'qysaze@mailinator.com', NULL, NULL, '+1 (578) 616-2524', NULL, 0, NULL, '2019-11-11 05:39:45', '2019-11-11 05:39:45'),
(37, 'Noah', 'Hart', 'luve@mailinator.net', NULL, NULL, '+1 (906) 559-1134', NULL, 0, NULL, '2019-11-11 05:40:39', '2019-11-11 05:40:39'),
(38, 'Althea', 'Marquez', 'padak@mailinator.net', NULL, NULL, '+1 (635) 226-4057', NULL, 0, NULL, '2019-11-11 05:41:29', '2019-11-11 05:41:29'),
(40, 'Kyra', 'Burch', 'kyfem@mailinator.net', NULL, NULL, '+1 (372) 906-8576', NULL, 0, NULL, '2019-11-11 05:41:53', '2019-11-11 05:41:53'),
(41, 'Katelyn', 'Harper', 'qavewiwym@mailinator.net', NULL, NULL, '+1 (901) 891-2975', NULL, 0, NULL, '2019-11-11 05:50:36', '2019-11-11 05:50:36'),
(42, 'Brennan', 'Tucker', 'soxujyky@mailinator.com', NULL, NULL, '+1 (583) 171-6837', NULL, 0, NULL, '2019-11-11 05:50:59', '2019-11-11 05:50:59'),
(43, 'Yuli', 'Bradford', 'jyxepivo@mailinator.com', NULL, NULL, '+1 (842) 634-7308', NULL, 0, NULL, '2019-11-11 05:51:37', '2019-11-11 05:51:37'),
(44, 'Martha', 'Hunt', 'halepawus@mailinator.net', NULL, NULL, '+1 (143) 463-2965', NULL, 0, NULL, '2019-11-11 05:53:00', '2019-11-11 05:53:00'),
(45, 'Maggy', 'Orr', 'kirer@mailinator.com', NULL, NULL, '+1 (494) 478-6401', NULL, 0, NULL, '2019-11-11 05:53:33', '2019-11-11 05:53:33'),
(46, 'Melissa', 'Bennett', 'qahiwycaq@mailinator.net', NULL, NULL, '+1 (507) 845-1969', NULL, 0, NULL, '2019-11-11 05:54:07', '2019-11-11 05:54:07'),
(47, 'Zephr', 'Romero', 'tujod@mailinator.com', NULL, NULL, '+1 (518) 969-7296', NULL, 0, NULL, '2019-11-11 05:54:36', '2019-11-11 05:54:36'),
(48, 'Denton', 'James', 'zorutimogu@mailinator.net', NULL, NULL, '+1 (662) 938-4565', NULL, 0, NULL, '2019-11-11 05:55:12', '2019-11-11 05:55:12'),
(49, 'Nicholas', 'Witt', 'wafoko@mailinator.com', NULL, NULL, '+1 (901) 713-8805', NULL, 0, NULL, '2019-11-11 05:56:22', '2019-11-11 05:56:22'),
(50, 'Rose', 'Britt', 'dohizono@mailinator.com', NULL, NULL, '+1 (579) 672-8643', NULL, 0, NULL, '2019-11-11 05:57:09', '2019-11-11 05:57:09'),
(52, 'Griffith', 'Baker', 'pukiqazico@mailinator.com', NULL, NULL, '+1 (397) 942-8226', NULL, 0, NULL, '2019-11-11 05:57:39', '2019-11-11 05:57:39'),
(53, 'Lucius', 'Castillo', 'xeryg@mailinator.com', NULL, NULL, '+1 (394) 784-8177', NULL, 0, NULL, '2019-11-11 06:27:41', '2019-11-11 06:27:41'),
(54, 'Rahim', 'Skinner', 'sipidyk@mailinator.com', NULL, NULL, '+1 (239) 884-8416', NULL, 0, NULL, '2019-11-11 06:30:15', '2019-11-11 06:30:15'),
(55, 'Bethany', 'Powers', 'typigexaj@mailinator.com', NULL, NULL, '+1 (902) 341-7257', NULL, 0, NULL, '2019-11-11 06:31:44', '2019-11-11 06:31:44'),
(56, 'Tad', 'Duncan', 'sulog@mailinator.com', NULL, NULL, '+1 (645) 673-5925', NULL, 0, NULL, '2019-11-11 06:47:34', '2019-11-11 06:47:34'),
(57, 'Sierra', 'Howard', 'netof@mailinator.com', NULL, NULL, '+1 (797) 397-2997', NULL, 0, NULL, '2019-11-11 06:48:13', '2019-11-11 06:48:13'),
(58, 'Dolan', 'Knowles', 'rapeqyfe@mailinator.com', NULL, NULL, '+1 (763) 991-4559', NULL, 0, NULL, '2019-11-11 06:54:20', '2019-11-11 06:54:20'),
(59, 'Wayne', 'Larson', 'kecyc@mailinator.com', NULL, NULL, '+1 (895) 277-3906', NULL, 0, NULL, '2019-11-11 06:54:43', '2019-11-11 06:54:43'),
(60, 'Hadley', 'Mccormick', 'zicafeg@mailinator.net', NULL, NULL, '+1 (162) 802-4372', NULL, 0, NULL, '2019-11-11 06:56:45', '2019-11-11 06:56:45'),
(61, 'Mara', 'Lynch', 'wicy@mailinator.com', NULL, NULL, '+1 (872) 505-9764', NULL, 0, NULL, '2019-11-11 07:00:29', '2019-11-11 07:00:29'),
(62, 'Ferdinand', 'Fletcher', 'lylomec@mailinator.com', NULL, NULL, '+1 (586) 716-2145', NULL, 0, NULL, '2019-11-19 15:54:39', '2019-11-19 15:54:39'),
(63, 'Xena', 'Vargas', 'suhazucovy@mailinator.com', NULL, NULL, '+1 (696) 671-2825', NULL, 0, NULL, '2019-11-20 16:02:32', '2019-11-20 16:02:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_company_name_unique` (`company_name`),
  ADD UNIQUE KEY `companies_reg_no_unique` (`reg_no`),
  ADD UNIQUE KEY `companies_tin_no_unique` (`tin_no`);

--
-- Indexes for table `company_transport`
--
ALTER TABLE `company_transport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_transport_registration_no_unique` (`registration_no`),
  ADD KEY `company_transport_transport_type_id_foreign` (`transport_type_id`),
  ADD KEY `company_transport_company_id_foreign` (`company_id`);

--
-- Indexes for table `company_user`
--
ALTER TABLE `company_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_user_user_id_foreign` (`user_id`),
  ADD KEY `company_user_company_id_foreign` (`company_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
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
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_payment_id_foreign` (`payment_id`),
  ADD KEY `reservations_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_company_id_foreign` (`company_id`),
  ADD KEY `trips_bus_id_foreign` (`bus_id`),
  ADD KEY `trips_start_point_foreign` (`start_point`),
  ADD KEY `trips_end_point_foreign` (`end_point`),
  ADD KEY `trips_driver_id_foreign` (`driver_id`);

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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company_transport`
--
ALTER TABLE `company_transport`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company_user`
--
ALTER TABLE `company_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_transport`
--
ALTER TABLE `company_transport`
  ADD CONSTRAINT `company_transport_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_transport_transport_type_id_foreign` FOREIGN KEY (`transport_type_id`) REFERENCES `transports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_user`
--
ALTER TABLE `company_user`
  ADD CONSTRAINT `company_user_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `company_transport` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `company_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_end_point_foreign` FOREIGN KEY (`end_point`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_start_point_foreign` FOREIGN KEY (`start_point`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
