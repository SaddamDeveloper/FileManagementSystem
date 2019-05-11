-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 03:38 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Isabel Erdman DDS', 'admin@mail.com', '2019-03-28 02:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vLqMZU6gxF', '2019-03-28 02:48:41', '2019-03-28 02:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `clientType` varchar(255) DEFAULT NULL,
  `typeofwork` varchar(255) DEFAULT NULL,
  `time2` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `paymentmode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `caseid`, `clientType`, `typeofwork`, `time2`, `amount`, `paymentmode`, `created_at`, `updated_at`) VALUES
(12, 'CASE00001', '2', 'Live', '2019-04-26', '123', NULL, '2019-04-16 05:45:56', '2019-04-15 05:09:26'),
(13, 'CASE00002', '2', 'Live 2', '2019-04-19', '34555', NULL, '2019-04-16 05:46:00', '2019-04-15 05:10:07'),
(14, 'CASE00003', '2', NULL, '2019-04-25T18:30:00.000Z', '123', NULL, '2019-04-18 07:04:39', '2019-04-18 07:04:39'),
(15, 'CASE00004', '2', '3121', '2019-04-25T18:30:00.000Z', '23213', NULL, '2019-04-18 07:05:17', '2019-04-18 07:05:17'),
(16, 'CASE00005', '2', 'Project Automation', '2019-05-15T18:30:00.000Z', '100000', NULL, '2019-05-04 03:29:57', '2019-05-04 03:29:57'),
(17, 'CASE00006', NULL, 'Live', '2019-05-15T18:30:00.000Z', '2000', NULL, '2019-05-04 04:31:02', '2019-05-04 04:31:02'),
(18, 'CASE00007', '2', 'Data Collection', '2019-08-28T18:30:00.000Z', '120000', NULL, '2019-05-08 23:43:39', '2019-05-08 23:43:39'),
(19, 'CASE00008', '2', 'Public', '2019-05-30T18:30:00.000Z', '120000', NULL, '2019-05-09 23:32:16', '2019-05-09 23:32:16'),
(20, 'CASE00009', '2', 'Data Collection', '2019-05-24T18:30:00.000Z', '1237676', NULL, '2019-05-10 00:27:22', '2019-05-10 00:27:22'),
(21, 'CASE00010', '2', 'Digital Library', '2019-05-23T18:30:00.000Z', '123', NULL, '2019-05-10 02:39:09', '2019-05-10 02:39:09'),
(22, 'CASE00011', '2', 'Light', '2019-05-15T18:30:00.000Z', '12334', NULL, '2019-05-10 06:28:48', '2019-05-10 06:28:48'),
(23, 'CASE00012', '2', 'Dark', '2019-05-29T18:30:00.000Z', '123233434', NULL, '2019-05-10 06:29:35', '2019-05-10 06:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `id` int(11) NOT NULL,
  `clientid` varchar(255) DEFAULT NULL,
  `clientName` varchar(255) DEFAULT NULL,
  `contactNo` varchar(255) DEFAULT NULL,
  `altContactNo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `caseid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `clientid`, `clientName`, `contactNo`, `altContactNo`, `email`, `address`, `caseid`, `created_at`, `updated_at`) VALUES
(10, NULL, 'Saddam', '564564', '647454', 'm@m.com', 'Barpeta', 'CASE00001', '2019-04-15 05:09:26', '2019-04-15 05:09:26'),
(11, NULL, 'Hussain2', '867567', '76875', 'admin@mail.com', 'Shillong', 'CASE00002', '2019-04-15 05:10:07', '2019-04-15 05:10:07'),
(12, NULL, 'Alim', '86767', '7567856', 'alim@mail.com', 'RYTRTYre', 'CASE00003', '2019-04-18 07:04:39', '2019-04-18 07:04:39'),
(13, NULL, 'sas', 'dsd', 'adasd', 'd@mail.com', 'adsda', 'CASE00004', '2019-04-18 07:05:17', '2019-04-18 07:05:17'),
(14, NULL, 'Ravi Kr Singh', '7856785', '75764567', 'ravi@mail.com', 'Bihar', 'CASE00005', '2019-05-04 03:29:57', '2019-05-04 03:29:57'),
(15, NULL, NULL, NULL, NULL, 'm@m.com', 'sdasds', 'CASE00006', '2019-05-04 04:31:02', '2019-05-04 04:31:02'),
(16, NULL, 'Dannieal', '78756857', '758679756', 'daniel@mail.com', 'Shillong', 'CASE00007', '2019-05-08 23:43:39', '2019-05-08 23:43:39'),
(17, NULL, 'Dannieal', '78756857', '758679756', 'daniel@mail.com', 'Shillong', 'CASE00008', '2019-05-09 23:32:16', '2019-05-09 23:32:16'),
(18, NULL, 'Sda', '6785', '5745', 'medini@mail.com', 'Shillong', 'CASE00009', '2019-05-10 00:27:23', '2019-05-10 00:27:23'),
(19, 'CL00001', 'as', '1232', '323', 'shubhendu@m.com', 'sasas', 'CASE00010', '2019-05-10 02:39:09', '2019-05-10 02:39:09'),
(20, 'CL00002', 'Saddam', '86767', '758567', 'sis@m.com', 'Barpeta', 'CASE00011', '2019-05-10 06:28:48', '2019-05-10 06:28:48'),
(21, 'CL00003', 'Ravi', '87675785', '8685785', 'ravi@ma.com', 'Ravi', 'CASE00012', '2019-05-10 06:29:35', '2019-05-10 06:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `completedcase`
--

CREATE TABLE `completedcase` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `employee_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completedcase`
--

INSERT INTO `completedcase` (`id`, `caseid`, `employee_id`) VALUES
(4, 'CASE00007', 'EMP00003');

-- --------------------------------------------------------

--
-- Table structure for table `docfile`
--

CREATE TABLE `docfile` (
  `id` int(11) NOT NULL,
  `docs` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `caseid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expertise` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `name`, `no`, `email`, `password`, `designation`, `expertise`, `address`, `created_at`, `updated_at`) VALUES
(1, 'EMP00001', 'Sheendu Das', '67486796', 'shubhendu@m.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Engineer', 'accounting', 'adada', '2019-05-04 04:40:09', '2019-05-04 04:40:09'),
(2, 'EMP00002', 'Medini Sonowal', '7565674563', 'medini@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Project manager', '6', 'Dibrugarh', '2019-05-07 01:49:00', '2019-05-07 01:49:00'),
(3, 'EMP00003', 'Nishi Konsam', '45685685', 'nishi@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Network Enigneer', 'it,7', 'Manipur', '2019-05-08 23:45:19', '2019-05-08 23:45:19');

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
(3, '2019_03_22_092043_create_reg_cases_table', 1),
(4, '2019_03_26_062424_create_admins_table', 1),
(5, '2019_03_27_130521_create_employees_table', 2),
(7, '2019_03_29_114448_create_send_to_employees_table', 3);

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
-- Table structure for table `rejectcase`
--

CREATE TABLE `rejectcase` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `employee_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `send_to_employees`
--

CREATE TABLE `send_to_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caseid` varchar(191) CHARACTER SET latin1 NOT NULL,
  `helper` varchar(191) CHARACTER SET latin1 NOT NULL,
  `docs` varchar(191) CHARACTER SET latin1 NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `send_to_employees`
--

INSERT INTO `send_to_employees` (`id`, `caseid`, `helper`, `docs`, `employee_id`) VALUES
(15, 'CASE00005', 'Rajesh,Raju', 'mailList.xlsx', 'EMP00001'),
(16, 'CASE00004', 'Rajesh,Raju', 'mailList.xlsx', 'EMP00001'),
(17, 'CASE00007', 'Rajesh,Raju', 'sous.xlsx', 'EMP00003'),
(22, 'CASE00001', 'Rajesh', 'cover letter for data entry.txt', 'EMP00002'),
(23, 'CASE00008', 'Rajesh', 'mailList.xlsx', 'EMP00001');

-- --------------------------------------------------------

--
-- Table structure for table `toadmin`
--

CREATE TABLE `toadmin` (
  `id` int(11) NOT NULL,
  `docs` varchar(255) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `employee_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Margaretta Donnelly', 'user@mail.com', '2019-03-28 02:49:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'anhdvk58mS0CbdaQ5zuNliRkRXDpiqLqSAoRjtr5C2GU9MNBjzX8BNdKan2C', '2019-03-28 02:49:27', '2019-03-28 02:49:27');

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
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`,`caseid`),
  ADD KEY `caseid` (`caseid`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_details` (`caseid`);

--
-- Indexes for table `completedcase`
--
ALTER TABLE `completedcase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `completedcase_ibfk_1` (`caseid`),
  ADD KEY `completedcase_ibfk_2` (`employee_id`);

--
-- Indexes for table `docfile`
--
ALTER TABLE `docfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseid` (`caseid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`,`employee_id`) USING BTREE,
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

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
-- Indexes for table `rejectcase`
--
ALTER TABLE `rejectcase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeid` (`employee_id`),
  ADD KEY `rejectcase_ibfk_1` (`caseid`);

--
-- Indexes for table `send_to_employees`
--
ALTER TABLE `send_to_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseid` (`caseid`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `toadmin`
--
ALTER TABLE `toadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toadmin_ibfk_1` (`caseid`),
  ADD KEY `employee_id` (`employee_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `completedcase`
--
ALTER TABLE `completedcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `docfile`
--
ALTER TABLE `docfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rejectcase`
--
ALTER TABLE `rejectcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `send_to_employees`
--
ALTER TABLE `send_to_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `toadmin`
--
ALTER TABLE `toadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_details`
--
ALTER TABLE `client_details`
  ADD CONSTRAINT `client_details` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `completedcase`
--
ALTER TABLE `completedcase`
  ADD CONSTRAINT `completedcase_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `send_to_employees` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `completedcase_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `send_to_employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `docfile`
--
ALTER TABLE `docfile`
  ADD CONSTRAINT `docfile_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rejectcase`
--
ALTER TABLE `rejectcase`
  ADD CONSTRAINT `rejectcase_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `send_to_employees` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rejectcase_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `send_to_employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `send_to_employees`
--
ALTER TABLE `send_to_employees`
  ADD CONSTRAINT `send_to_employees_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `send_to_employees_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toadmin`
--
ALTER TABLE `toadmin`
  ADD CONSTRAINT `toadmin_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `send_to_employees` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `toadmin_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
