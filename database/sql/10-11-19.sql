-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2019 at 11:52 PM
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
(5, 16, 1, 0, 'tok_1Fd3iIJocvQPOEuvTZeCrezo', NULL, '2019-11-09 17:51:32', '2019-11-09 17:51:32');

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
(2, NULL, 'A1', 2, 3, NULL, NULL),
(3, 4, 'A2', 2, 3, NULL, '2019-11-09 17:37:08'),
(4, NULL, 'A3', 0, 3, NULL, '2019-11-09 17:31:47'),
(5, NULL, 'A4', 0, 3, NULL, NULL),
(6, NULL, 'B1', 0, 3, NULL, NULL),
(7, 4, 'B2', 2, 3, NULL, '2019-11-09 17:37:08'),
(8, 5, 'B3', 2, 3, NULL, '2019-11-09 17:51:32'),
(9, NULL, 'B4', 0, 3, NULL, NULL),
(10, NULL, 'C1', 0, 3, NULL, NULL),
(11, NULL, 'C2', 0, 3, NULL, NULL),
(12, 5, 'C3', 2, 3, NULL, '2019-11-09 17:51:32'),
(13, NULL, 'C4', 0, 3, NULL, NULL),
(14, NULL, 'D1', 0, 3, NULL, NULL),
(15, NULL, 'D2', 0, 3, NULL, NULL),
(16, NULL, 'D3', 0, 3, NULL, NULL),
(17, NULL, 'D4', 0, 3, NULL, NULL),
(18, NULL, 'E1', 0, 3, NULL, NULL),
(19, NULL, 'E2', 0, 3, NULL, NULL),
(20, NULL, 'E3', 0, 3, NULL, NULL),
(21, NULL, 'E4', 0, 3, NULL, NULL),
(22, NULL, 'F1', 0, 3, NULL, NULL),
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
(3, 2, '2019-11-13', '07:00 AM', 1, 1, 2, 80, 3, '2019-11-08 08:11:13', '2019-11-08 08:11:13');

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
(16, 'Darius', 'Morales', 'fezopufih@mailinator.net', NULL, NULL, '+1 (257) 731-7944', NULL, 0, NULL, '2019-11-09 17:51:31', '2019-11-09 17:51:31');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
