-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2019 at 06:14 PM
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
(1, 'Phelps and Cannon Co', 'Eaque aut laboriosam', 'Gilmore and Sherman Traders', 'Allison and Sims Plc', 901, 'controller_1570270023_.png', 'error_1570270023_.png', 'goal_1570270023_.png', 21, 1, '2019-10-05 04:07:03', '2019-10-07 05:21:08'),
(2, 'Lopez and Russell LLC', 'Est harum culpa exer', 'Odonnell and Carey Trading', 'Kline Schneider Plc', 774, 'view_1570293620_.png', 'Screenshot from 2019-07-19 21-12-50_1570293620_.png', 'Screenshot from 2019-05-07 03-11-22_1570293620_.png', 21, 1, '2019-10-05 10:40:20', '2019-10-07 03:53:28'),
(3, 'Finch May Trading', 'Eum tempore libero', 'Macias and Landry Co', 'Rogers Travis Inc', 389, '72199077_586340558612303_1839474479298772992_n_1570298813_.jpg', 'Screenshot from 2019-07-27 23-28-33_1570298813_.png', 'Screenshot from 2019-07-31 03-12-47_1570298813_.png', 21, 2, '2019-10-05 12:06:53', '2019-10-07 04:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `company_transport`
--

CREATE TABLE `company_transport` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `registration_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_transport`
--

INSERT INTO `company_transport` (`id`, `company_id`, `transport_id`, `total_seats`, `registration_no`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 30, 'af345343r', '2019-10-11 09:01:45', '2019-10-11 09:01:45'),
(2, 1, 7, 26, 'af3245re', '2019-10-11 09:02:07', '2019-10-11 09:02:07'),
(3, 1, 1, 56, 'glh1243234', '2019-10-11 10:07:00', '2019-10-11 10:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_user`
--

CREATE TABLE `company_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0->pending, 1->active, 2->denied',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_user`
--

INSERT INTO `company_user` (`id`, `user_id`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, NULL, NULL),
(2, 3, 2, 1, NULL, NULL),
(3, 4, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) UNSIGNED NOT NULL,
  `division_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`) VALUES
(1, 3, 'Dhaka'),
(2, 3, 'Faridpur'),
(3, 3, 'Gazipur'),
(4, 3, 'Gopalganj'),
(5, 8, 'Jamalpur'),
(6, 3, 'Kishoreganj'),
(7, 3, 'Madaripur'),
(8, 3, 'Manikganj'),
(9, 3, 'Munshiganj'),
(10, 8, 'Mymensingh'),
(11, 3, 'Narayanganj'),
(12, 3, 'Narsingdi'),
(13, 8, 'Netrokona'),
(14, 3, 'Rajbari'),
(15, 3, 'Shariatpur'),
(16, 8, 'Sherpur'),
(17, 3, 'Tangail'),
(18, 5, 'Bogura'),
(19, 5, 'Joypurhat'),
(20, 5, 'Naogaon'),
(21, 5, 'Natore'),
(22, 5, 'Chapainawabganj'),
(23, 5, 'Pabna'),
(24, 5, 'Rajshahi'),
(25, 5, 'Sirajgonj'),
(26, 6, 'Dinajpur'),
(27, 6, 'Gaibandha'),
(28, 6, 'Kurigram'),
(29, 6, 'Lalmonirhat'),
(30, 6, 'Nilphamari'),
(31, 6, 'Panchagarh'),
(32, 6, 'Rangpur'),
(33, 6, 'Thakurgaon'),
(34, 1, 'Barguna'),
(35, 1, 'Barishal'),
(36, 1, 'Bhola'),
(37, 1, 'Jhalokati'),
(38, 1, 'Patuakhali'),
(39, 1, 'Pirojpur'),
(40, 2, 'Bandarban'),
(41, 2, 'Brahmanbaria'),
(42, 2, 'Chandpur'),
(43, 2, 'Chattogram'),
(44, 2, 'Cumilla'),
(45, 2, 'Cox\'s Bazar'),
(46, 2, 'Feni'),
(47, 2, 'Khagrachhari'),
(48, 2, 'Lakshmipur'),
(49, 2, 'Noakhali'),
(50, 2, 'Rangamati'),
(51, 7, 'Habiganj'),
(52, 7, 'Moulvibazar'),
(53, 7, 'Sunamganj'),
(54, 7, 'Sylhet'),
(55, 4, 'Bagerhat'),
(56, 4, 'Chuadanga'),
(57, 4, 'Jashore'),
(58, 4, 'Jhenaidah'),
(59, 4, 'Khulna'),
(60, 4, 'Kushtia'),
(61, 4, 'Magura'),
(62, 4, 'Meherpur'),
(63, 4, 'Narail'),
(64, 4, 'Satkhira');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`) VALUES
(1, 'Barishal', 'বরিশাল'),
(2, 'Chattogram', 'চট্টগ্রাম'),
(3, 'Dhaka', 'ঢাকা'),
(4, 'Khulna', 'খুলনা'),
(5, 'Rajshahi', 'রাজশাহী'),
(6, 'Rangpur', 'রংপুর'),
(7, 'Sylhet', 'সিলেট'),
(8, 'Mymensingh', 'ময়মনসিংহ');

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
(5, '2019_09_16_080609_create_companies_table', 1),
(6, '2019_09_24_053338_create_company_user_table', 1),
(7, '2019_09_24_053626_create_transport_table', 1),
(8, '2019_09_24_053643_create_company_transport_table', 1),
(9, '2019_10_05_183324_create_trips_table', 2);

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
(1, 'Super Admin', 'Super Admin has the full power of this application', '2019-10-05 03:49:30', '2019-10-05 03:49:30'),
(2, 'Admin', 'Admin has only access to his own company account', '2019-10-05 03:49:30', '2019-10-05 03:49:30'),
(3, 'Driver', 'Driver has only access to his own account through mobile application', '2019-10-05 03:49:30', '2019-10-05 03:49:30'),
(4, 'Customer', 'Customer has only access to his own account', '2019-10-05 03:49:30', '2019-10-05 03:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 4, NULL, NULL),
(6, 2, 2, NULL, NULL),
(7, 3, 4, NULL, NULL),
(9, 1, 2, NULL, NULL),
(10, 4, 4, NULL, NULL),
(11, 2, 2, NULL, NULL),
(12, 1, 2, NULL, NULL),
(13, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transport_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1->ac;2->non-ac',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `transport_type`, `ac_type`, `created_at`, `updated_at`) VALUES
(1, 'Bus', '1', '2019-10-11 05:40:24', '2019-10-11 07:11:58'),
(5, 'Launch', '1', '2019-10-11 06:22:38', '2019-10-11 06:22:38'),
(6, 'Launch', '2', '2019-10-11 06:22:57', '2019-10-11 06:22:57'),
(7, 'Bus', '2', '2019-10-11 07:24:29', '2019-10-11 07:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_id` int(11) NOT NULL,
  `start_point` int(11) NOT NULL,
  `end_point` int(11) NOT NULL,
  `fare` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `company_id`, `date`, `start_time`, `bus_id`, `start_point`, `end_point`, `fare`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-10-16', '08:00 AM', 7, 21, 6, 30, '2019-10-05 15:20:57', '2019-10-05 15:20:57'),
(2, 1, '2019-10-26', '10:00 AM', 1, 17, 8, 500, '2019-10-05 15:41:59', '2019-10-05 15:41:59'),
(3, 1, '2019-10-24', '09:00 AM', 1, 15, 19, 400, '2019-10-07 03:59:54', '2019-10-07 03:59:54'),
(4, 1, '2019-10-22', '11:00 AM', 7, 17, 28, 450, '2019-10-11 10:30:39', '2019-10-11 10:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `nid`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'system', 'admin', 'admin@tbs.com', NULL, '$2y$10$p.P9MdkTrot3T0d2E2aDK.B08ot157zRhCXlzG7pHdqC0Qfu4hmBa', '01799872659', 123456789, NULL, '2019-10-05 03:49:30', '2019-10-05 03:49:30'),
(2, 'Ag', 'Rabbee', 'a@b.com', NULL, '$2y$10$VbO51F7Y04wo457hKUYo/uqPW76x1MZQBj7xp6aW7J3cMuXHlxpay', '01799872659', 123456789, NULL, '2019-10-05 03:49:30', '2019-10-05 03:49:30'),
(3, 'Barrett', 'Durham', 'wimajokaze@mailinator.net', NULL, '$2y$10$q8P0nB1RpWc06d0ZgF4U5.QBsaior13BYrJxwTh5VQGXUN3.e04/e', '+1 (674) 807-5428', 124534784, NULL, '2019-10-05 09:53:58', '2019-10-05 09:53:58'),
(4, 'Portia', 'Cortez', 'hupiq@mailinator.net', NULL, '$2y$10$x44WxFnFgjYnqTph6LTwWuXAXyYKg8hF9PQ83.bFdJ/hLj/c9hde.', '+1 (495) 966-9105', 1321654654, NULL, '2019-10-05 10:41:07', '2019-10-05 10:41:07');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_user`
--
ALTER TABLE `company_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `company_transport`
--
ALTER TABLE `company_transport`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `company_user`
--
ALTER TABLE `company_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
