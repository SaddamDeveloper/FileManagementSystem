-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 03:50 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `approvedcase`
--

CREATE TABLE `approvedcase` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `employee_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billedcase`
--

CREATE TABLE `billedcase` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `employee_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billedcase`
--

INSERT INTO `billedcase` (`id`, `caseid`, `employee_id`) VALUES
(10, 'CASE00002', 'EMP00001');

-- --------------------------------------------------------

--
-- Table structure for table `bycash`
--

CREATE TABLE `bycash` (
  `caseid` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bycash`
--

INSERT INTO `bycash` (`caseid`, `method`, `name`) VALUES
('CASE00002', '1', 'By Cash');

-- --------------------------------------------------------

--
-- Table structure for table `bycheque`
--

CREATE TABLE `bycheque` (
  `id` int(11) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `chequeNo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `byneft`
--

CREATE TABLE `byneft` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(151, 'CASE00001', '4', 'ATLInfosys', '2019-06-21', '12333', '4', '2019-06-11 06:04:53', '2019-06-11 06:04:53'),
(153, 'CASE00002', '2', 'Live', '2019-06-13', '1000', '2', '2019-06-11 06:39:17', '2019-06-11 06:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `chequenrtgs`
--

CREATE TABLE `chequenrtgs` (
  `id` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `caseid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chequenrtgs`
--

INSERT INTO `chequenrtgs` (`id`, `method`, `bankname`, `phoneno`, `caseid`) VALUES
(1, '23232', 'sbi', '23232', 'CASE00001');

-- --------------------------------------------------------

--
-- Table structure for table `clientdetails2`
--

CREATE TABLE `clientdetails2` (
  `id` int(11) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `contactPersonName` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `orgName` varchar(255) NOT NULL,
  `orgTel` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `clientType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientdetails2`
--

INSERT INTO `clientdetails2` (`id`, `clientid`, `contactPersonName`, `contactNo`, `orgName`, `orgTel`, `dept`, `address`, `caseid`, `clientType`) VALUES
(13, 'CL00001', 'Khalid', '34343', 'KRANS', '7656747456', 'IT', '343434', 'CASE00001', 4);

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
  `clientType` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `clientid`, `clientName`, `contactNo`, `altContactNo`, `email`, `address`, `caseid`, `clientType`, `created_at`, `updated_at`) VALUES
(70, 'CL00001', 'Huxxen', '7845321', '87858757', 's@m.c', 'Shillong', 'CASE00002', 2, '2019-06-11 06:39:17', '2019-06-11 06:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `completedcase`
--

CREATE TABLE `completedcase` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `employee_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paidamount` varchar(255) NOT NULL,
  `gstamount` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completedcase`
--

INSERT INTO `completedcase` (`id`, `caseid`, `employee_id`, `paidamount`, `gstamount`, `method`, `date`) VALUES
(55, 'CASE00002', 'EMP00001', '1168.00', '180.00', '1', '2019-06-11');

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
  `no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expertise` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `no`, `email`, `designation`, `expertise`, `address`, `created_at`, `updated_at`) VALUES
(14, 'EMP00001', '869676', 'medini@mail.com', 'Back office', 'it,banking', 'Dibrugarh', '2019-06-11 07:50:07', '2019-06-11 07:50:07');

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
(7, '2019_03_29_114448_create_send_to_employees_table', 3),
(8, '2019_05_14_065557_create_user_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `onprocess`
--

CREATE TABLE `onprocess` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `helper` varchar(255) NOT NULL,
  `docs` varchar(255) NOT NULL,
  `employee_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onprocess`
--

INSERT INTO `onprocess` (`id`, `caseid`, `helper`, `docs`, `employee_id`) VALUES
(18, 'CASE00002', 'Mohit,Rajesh,Raju', 'mailList.xlsx', 'EMP00001');

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `advamount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `paymentmode`, `clientid`, `caseid`, `amount`, `advamount`) VALUES
(24, '2', 'CL00001', 'CASE00002', '1000', '12');

-- --------------------------------------------------------

--
-- Table structure for table `receptions`
--

CREATE TABLE `receptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
-- Table structure for table `sendfiletoadmin`
--

CREATE TABLE `sendfiletoadmin` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `assignedEmployee` varchar(255) NOT NULL,
  `docs` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sendfiletoadmin`
--

INSERT INTO `sendfiletoadmin` (`id`, `caseid`, `assignedEmployee`, `docs`, `remarks`) VALUES
(4, 'CASE00002', 'medini', 'stdform_0.docx', 'Comment');

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

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `content`) VALUES
(1, 'Hello world'),
(2, 'Hello world'),
(3, 'This is hussain'),
(4, 'Hello Changed'),
(5, 'This is test content');

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
-- Table structure for table `transfercase`
--

CREATE TABLE `transfercase` (
  `id` int(11) NOT NULL,
  `caseid` varchar(255) NOT NULL,
  `helper` varchar(255) NOT NULL,
  `docs` varchar(255) NOT NULL,
  `employee_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `selected`) VALUES
(17, '', 'user', 'user@mail.com', NULL, '$2y$10$HSfM5csmys/tPrrqi62rXuKMgiyQ//4kYdGM5x5KxhCSB1Ds48rDa', NULL, NULL, NULL, 0),
(18, '', 'admin', 'admin@mail.com', NULL, '$2y$10$wzAIzoKpB6rZP0hNViyoXeBO/3TPrVSTAaArQvjNAYMMU1PcEW4ie', NULL, NULL, NULL, 1),
(19, 'EMP00001', 'medini', 'medini@mail.com', NULL, '$2y$10$1SwJUMdb4v/zjpmSXB.auuHvASI5sAgSNO44TFVQBSJ3dQYsgOw9S', NULL, NULL, NULL, 2);

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
-- Indexes for table `approvedcase`
--
ALTER TABLE `approvedcase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `completedcase_ibfk_1` (`caseid`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `billedcase`
--
ALTER TABLE `billedcase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseid` (`caseid`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `bycash`
--
ALTER TABLE `bycash`
  ADD PRIMARY KEY (`caseid`);

--
-- Indexes for table `bycheque`
--
ALTER TABLE `bycheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `byneft`
--
ALTER TABLE `byneft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`,`caseid`),
  ADD KEY `caseid` (`caseid`);

--
-- Indexes for table `chequenrtgs`
--
ALTER TABLE `chequenrtgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseid` (`caseid`);

--
-- Indexes for table `clientdetails2`
--
ALTER TABLE `clientdetails2`
  ADD PRIMARY KEY (`id`),
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
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `method` (`method`),
  ADD KEY `completedcase_ibfk_1` (`caseid`);

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
-- Indexes for table `onprocess`
--
ALTER TABLE `onprocess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseid` (`caseid`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseid` (`caseid`);

--
-- Indexes for table `receptions`
--
ALTER TABLE `receptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receptions_email_unique` (`email`);

--
-- Indexes for table `rejectcase`
--
ALTER TABLE `rejectcase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rejectcase_ibfk_1` (`caseid`),
  ADD KEY `rejectcase_ibfk_2` (`employee_id`);

--
-- Indexes for table `sendfiletoadmin`
--
ALTER TABLE `sendfiletoadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_to_employees`
--
ALTER TABLE `send_to_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseid` (`caseid`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toadmin`
--
ALTER TABLE `toadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `toadmin_ibfk_1` (`caseid`);

--
-- Indexes for table `transfercase`
--
ALTER TABLE `transfercase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `caseid` (`caseid`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `approvedcase`
--
ALTER TABLE `approvedcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billedcase`
--
ALTER TABLE `billedcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bycheque`
--
ALTER TABLE `bycheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `byneft`
--
ALTER TABLE `byneft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `chequenrtgs`
--
ALTER TABLE `chequenrtgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientdetails2`
--
ALTER TABLE `clientdetails2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `completedcase`
--
ALTER TABLE `completedcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `docfile`
--
ALTER TABLE `docfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `onprocess`
--
ALTER TABLE `onprocess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `receptions`
--
ALTER TABLE `receptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rejectcase`
--
ALTER TABLE `rejectcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sendfiletoadmin`
--
ALTER TABLE `sendfiletoadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `send_to_employees`
--
ALTER TABLE `send_to_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `toadmin`
--
ALTER TABLE `toadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transfercase`
--
ALTER TABLE `transfercase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvedcase`
--
ALTER TABLE `approvedcase`
  ADD CONSTRAINT `approvedcase_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `onprocess` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `approvedcase_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `onprocess` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billedcase`
--
ALTER TABLE `billedcase`
  ADD CONSTRAINT `billedcase_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `onprocess` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billedcase_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `onprocess` (`employee_id`);

--
-- Constraints for table `bycash`
--
ALTER TABLE `bycash`
  ADD CONSTRAINT `bycash_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `completedcase` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chequenrtgs`
--
ALTER TABLE `chequenrtgs`
  ADD CONSTRAINT `chequenrtgs_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clientdetails2`
--
ALTER TABLE `clientdetails2`
  ADD CONSTRAINT `clientdetails2_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_details`
--
ALTER TABLE `client_details`
  ADD CONSTRAINT `client_details` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `completedcase`
--
ALTER TABLE `completedcase`
  ADD CONSTRAINT `completedcase_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `client_details` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `completedcase_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `docfile`
--
ALTER TABLE `docfile`
  ADD CONSTRAINT `docfile_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `onprocess`
--
ALTER TABLE `onprocess`
  ADD CONSTRAINT `onprocess_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onprocess_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rejectcase`
--
ALTER TABLE `rejectcase`
  ADD CONSTRAINT `rejectcase_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `onprocess` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rejectcase_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `onprocess` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `toadmin_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `onprocess` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `toadmin_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfercase`
--
ALTER TABLE `transfercase`
  ADD CONSTRAINT `transfercase_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transfercase_ibfk_2` FOREIGN KEY (`caseid`) REFERENCES `cases` (`caseid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
