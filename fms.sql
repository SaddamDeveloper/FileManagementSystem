-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 03:39 PM
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
(1, 'Isabel Erdman DDS', 'admin@mail.com', '2019-03-28 02:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vLqMZU6gxF', '2019-03-28 02:48:41', '2019-03-28 02:48:41'),
(4, 'admin', 'admin1@mail.com', NULL, '$2y$10$e55BhhlYT7qyghEkUzicc.bIrxaenDE0L8BqGm3U6v3HpudyRToga', NULL, NULL, NULL);

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
(14, 'CASE00003', '2', NULL, '2019-04-25', '123', NULL, '2019-05-11 11:57:59', '2019-04-18 07:04:39'),
(15, 'CASE00004', '2', '3121', '2019-04-25', '23213', NULL, '2019-05-11 11:58:03', '2019-04-18 07:05:17'),
(16, 'CASE00005', '2', 'Project Automation', '2019-05-15', '100000', NULL, '2019-05-11 11:58:07', '2019-05-04 03:29:57'),
(17, 'CASE00006', NULL, 'Live', '2019-05-15', '2000', NULL, '2019-05-11 11:58:11', '2019-05-04 04:31:02'),
(18, 'CASE00007', '2', 'Data Collection', '2019-08-28', '120000', NULL, '2019-05-11 11:58:13', '2019-05-08 23:43:39'),
(19, 'CASE00008', '2', 'Public', '2019-05-30', '120000', NULL, '2019-05-11 11:58:16', '2019-05-09 23:32:16'),
(20, 'CASE00009', '2', 'Data Collection', '2019-05-24', '1237676', NULL, '2019-05-11 11:58:19', '2019-05-10 00:27:22'),
(21, 'CASE00010', '2', 'Digital Library', '2019-05-23', '123', NULL, '2019-05-11 11:58:22', '2019-05-10 02:39:09'),
(26, 'CASE00013', '3', 'Public', '2015-09-25', '123232', NULL, '2019-05-11 11:58:36', '2019-05-11 01:48:48'),
(28, 'CASE00014', '2', 'Digital Library', '2019-04-29', '12121212', NULL, '2019-05-11 11:58:39', '2019-05-11 03:23:28'),
(29, 'CASE00015', '2', 'Public', '2019-05-22', '121', NULL, '2019-05-11 11:58:43', '2019-05-11 03:43:38'),
(30, 'CASE00016', '2', 'sasa', '2019-05-23', '123', NULL, '2019-05-11 11:58:46', '2019-05-11 04:05:43'),
(31, 'CASE00017', '3', 'Digital Library', '2019-05-23', '32323', NULL, '2019-05-11 11:58:50', '2019-05-11 04:15:30'),
(32, 'CASE00018', '2', 'Data Collection', '2019-05-16', '4546', NULL, '2019-05-11 11:58:53', '2019-05-11 06:20:04'),
(33, 'CASE00019', '2', 'How', '2019-05-30', '123', NULL, '2019-05-11 06:26:56', '2019-05-11 06:26:56'),
(35, 'CASE00020', '3', '23232', '2019-05-16', '123', NULL, '2019-05-13 02:38:13', '2019-05-13 02:38:13'),
(36, 'CASE00021', '3', '23232', '2019-05-16', '123', NULL, '2019-05-13 02:38:52', '2019-05-13 02:38:52'),
(38, 'CASE00023', '2', 'How', '2019-05-14', '123', NULL, '2019-05-13 03:02:00', '2019-05-13 03:02:00'),
(39, 'CASE00024', '2', 'ss', '2019-05-15', '123', NULL, '2019-05-13 05:43:34', '2019-05-13 05:43:34'),
(41, 'CASE00026', '4', 'Data Collection', '2019-05-30', '123', NULL, '2019-05-13 06:19:19', '2019-05-13 06:19:19'),
(43, 'CASE00028', '2', 'Demo Project', '2019-05-14', '12345', NULL, '2019-05-13 06:54:24', '2019-05-13 06:54:24'),
(44, 'CASE00029', '2', 'Return', '2019-05-16', '2500', NULL, '2019-05-13 07:48:18', '2019-05-13 07:48:18'),
(45, 'CASE00030', '3', 'Data', '', NULL, NULL, '2019-05-16 01:57:09', '2019-05-16 01:57:09'),
(46, 'CASE00031', NULL, NULL, '', NULL, NULL, '2019-05-17 02:58:48', '2019-05-17 02:58:48'),
(47, 'CASE00032', NULL, NULL, '', NULL, NULL, '2019-05-17 02:58:51', '2019-05-17 02:58:51'),
(48, 'CASE00033', '2', 'Digital Library', '2019-05-30', '123', NULL, '2019-05-17 03:00:26', '2019-05-17 03:00:26'),
(49, 'CASE00034', '2', 'How', '2019-05-30', '123', NULL, '2019-05-17 03:02:06', '2019-05-17 03:02:06'),
(50, 'CASE00035', NULL, NULL, '', NULL, NULL, '2019-05-17 03:04:26', '2019-05-17 03:04:26'),
(51, 'CASE00036', NULL, NULL, '', NULL, NULL, '2019-05-17 03:07:23', '2019-05-17 03:07:23'),
(52, 'CASE00037', '2', 'Data Collection', '2019-05-23', '123', NULL, '2019-05-25 10:17:20', '2019-05-17 03:07:58'),
(53, 'CASE00038', NULL, NULL, '', NULL, NULL, '2019-05-17 03:09:07', '2019-05-17 03:09:07'),
(54, 'CASE00039', '1', NULL, '', NULL, NULL, '2019-05-17 03:14:45', '2019-05-17 03:14:45'),
(55, 'CASE00040', NULL, NULL, '', NULL, NULL, '2019-05-17 03:21:04', '2019-05-17 03:21:04'),
(57, 'CASE00042', NULL, NULL, '', NULL, NULL, '2019-05-17 03:59:18', '2019-05-17 03:59:18'),
(59, 'CASE00043', NULL, NULL, '', NULL, NULL, '2019-05-17 06:58:55', '2019-05-17 06:58:55'),
(60, 'CASE00044', NULL, NULL, '', NULL, NULL, '2019-05-17 07:34:21', '2019-05-17 07:34:21'),
(61, 'CASE00045', NULL, NULL, '', NULL, NULL, '2019-05-17 07:34:23', '2019-05-17 07:34:23'),
(62, 'CASE00046', NULL, NULL, '', NULL, NULL, '2019-05-17 07:34:23', '2019-05-17 07:34:23'),
(63, 'CASE00047', NULL, NULL, '', NULL, NULL, '2019-05-17 07:40:09', '2019-05-17 07:40:09'),
(64, 'CASE00048', '2', 'Data Live Collection', '2019-05-23', '12000', NULL, '2019-05-27 10:28:14', '2019-05-18 08:06:47'),
(65, 'CASE00049', '2', 'Dummy', '2019-05-31', '100000', NULL, '2019-05-25 10:17:46', '2019-05-20 05:43:52');

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
(1, 'CL00010', 'sasa', 'dsds', 'sdas', 'sdsd@m.com', 'asas', 'dsdsd', 'CASE00021', 0);

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
(10, NULL, 'Saddam', '564564', '647454', 'm@m.com', 'Barpeta', 'CASE00001', 0, '2019-04-15 05:09:26', '2019-04-15 05:09:26'),
(11, NULL, 'Hussain2', '867567', '76875', 'admin@mail.com', 'Shillong', 'CASE00002', 0, '2019-04-15 05:10:07', '2019-04-15 05:10:07'),
(12, NULL, 'Alim', '86767', '7567856', 'alim@mail.com', 'RYTRTYre', 'CASE00003', 0, '2019-04-18 07:04:39', '2019-04-18 07:04:39'),
(13, NULL, 'sas', 'dsd', 'adasd', 'd@mail.com', 'adsda', 'CASE00004', 0, '2019-04-18 07:05:17', '2019-04-18 07:05:17'),
(14, NULL, 'Ravi Kr Singh', '7856785', '75764567', 'ravi@mail.com', 'Bihar', 'CASE00005', 0, '2019-05-04 03:29:57', '2019-05-04 03:29:57'),
(15, NULL, NULL, NULL, NULL, 'm@m.com', 'sdasds', 'CASE00006', 0, '2019-05-04 04:31:02', '2019-05-04 04:31:02'),
(16, NULL, 'Dannieal', '78756857', '758679756', 'daniel@mail.com', 'Shillong', 'CASE00007', 0, '2019-05-08 23:43:39', '2019-05-08 23:43:39'),
(17, NULL, 'Dannieal', '78756857', '758679756', 'daniel@mail.com', 'Shillong', 'CASE00008', 0, '2019-05-09 23:32:16', '2019-05-09 23:32:16'),
(18, NULL, 'Sda', '6785', '5745', 'medini@mail.com', 'Shillong', 'CASE00009', 0, '2019-05-10 00:27:23', '2019-05-10 00:27:23'),
(19, 'CL00001', 'as', '1232', '323', 'shubhendu@m.com', 'sasas', 'CASE00010', 0, '2019-05-10 02:39:09', '2019-05-10 02:39:09'),
(24, 'CL00004', NULL, NULL, NULL, NULL, NULL, 'CASE00013', 0, '2019-05-11 01:48:48', '2019-05-11 01:48:48'),
(26, 'CL00005', 'Saddam', '86767', '758567', 'sis@m.com', 'Barpeta', 'CASE00014', 0, '2019-05-11 03:23:28', '2019-05-11 03:23:28'),
(27, 'CL00006', 'Saddam', '86767', '758567', 'sis@m.com', 'Barpeta', 'CASE00016', 0, '2019-05-11 04:05:43', '2019-05-11 04:05:43'),
(28, 'CL00007', 'Harry', '866', NULL, NULL, NULL, 'CASE00017', 0, '2019-05-11 04:15:30', '2019-05-11 04:15:30'),
(29, 'CL00008', 'as', '1232', '323', 'shubhendu@m.com', 'sasas', 'CASE00018', 0, '2019-05-11 06:20:04', '2019-05-11 06:20:04'),
(30, 'CL00009', '4343', 'rwr', 'sasasa', 'user@mail.com', 'sdsdsd', 'CASE00019', 0, '2019-05-11 06:26:56', '2019-05-11 06:26:56'),
(32, 'CL00010', 'asas', '12243', '43421', 'iamsaddamhussain99@gmail.com', 'asaddsds', 'CASE00023', 0, '2019-05-13 03:02:00', '2019-05-13 03:02:00'),
(33, 'CL00011', 'sasa', 'sds', 'eqewew', 'shubhendu@m.com', 'adaa', 'CASE00024', 2, '2019-05-13 05:43:34', '2019-05-13 05:43:34'),
(34, 'CL00012', 'Saddam', '6785', '43421', 'nishi@mail.com', 'Shillong', 'CASE00028', 2, '2019-05-13 06:54:24', '2019-05-13 06:54:24'),
(35, 'CL00013', 'Nishi1', '908755544', NULL, 'konsam.nishi@gmail.com', 'Polo', 'CASE00029', 2, '2019-05-13 07:48:18', '2019-05-13 07:48:18'),
(36, 'CL00014', 'Saddam', '6785', '43421', 'huxx@mail.com', 'Shillong', 'CASE00033', 2, '2019-05-17 03:00:26', '2019-05-17 03:00:26'),
(37, 'CL00015', '23232', '4343', '24', 'iamsaddamhussain99@gmail.com', 'dsdsd', 'CASE00034', 2, '2019-05-17 03:02:06', '2019-05-17 03:02:06'),
(38, 'CL00016', 'asas', '86767', '43421', 'user@mail.com', 'dsds', 'CASE00037', 2, '2019-05-17 03:07:58', '2019-05-17 03:07:58'),
(40, 'CL00017', 'Saddam', '6785', '43421', 'user@mail.com', 'asasasa', 'CASE00048', 2, '2019-05-18 08:06:47', '2019-05-18 08:06:47'),
(41, 'CL00018', 'Dummy', '454454545', '1212121212', 'dummy@mail.com', 'Mawlai Iewrynghep', 'CASE00049', 2, '2019-05-20 05:43:53', '2019-05-20 05:43:53');

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
(3, 'CASE00033', 'EMP00001'),
(4, 'CASE00048', 'EMP00003');

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
(10, 'EMP00001', '869676', 'medini@mail.com', 'Back office', 'it,banking', 'Dibrugarh', '2019-05-18 07:08:02', '2019-05-18 07:08:02'),
(11, 'EMP00002', '7586585', 'shubhendu@mail.com', 'IT', 'it', 'Nagaon', '2019-05-20 03:37:16', '2019-05-20 03:37:16'),
(12, 'EMP00003', '12121212', 'bakorkharkongor@hotmail.com', 'Web Developer', 'it', 'Mawlai Iewrynghep', '2019-05-20 05:45:00', '2019-05-20 05:45:00');

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `receptions`
--

INSERT INTO `receptions` (`id`, `created_at`, `updated_at`, `name`, `email`, `password`, `remember_token`) VALUES
(12, '2019-05-15 07:31:07', '2019-05-15 07:31:07', 'Saddam', 'sishack@mail.com', '$2y$10$4m1hCJW7ixxSm8vO.JTrlOz.1.VhFDCbr0xcjUVPuTPDqDwJ0/RyO', NULL);

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
(5, 'CASE00048', 'Raju', 'mailList.xlsx', 'EMP00003'),
(6, 'CASE00037', 'Rajesh', 'DEE_REGISTRATION.txt', 'EMP00002'),
(7, 'CASE00049', 'Mohit', '1.JPG', 'EMP00001'),
(9, 'CASE00016', 'Rajesh', 'mailList.xlsx', 'EMP00002'),
(11, 'CASE00024', 'Rajesh', 'DEE_REGISTRATION.txt', 'EMP00001'),
(12, 'CASE00034', 'Rajesh', 'DEE_REGISTRATION.txt', 'EMP00002'),
(13, 'CASE00018', 'Rajesh', 'DEE_REGISTRATION.txt', 'EMP00002'),
(14, 'CASE00033', 'Raju,Rajesh,Mohit', 'digital_library.sql', 'EMP00001');

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

--
-- Dumping data for table `transfercase`
--

INSERT INTO `transfercase` (`id`, `caseid`, `helper`, `docs`, `employee_id`) VALUES
(1, 'CASE00049', 'Mohit', '1.JPG', 'EMP00001'),
(4, 'CASE00037', 'Rajesh', 'DEE_REGISTRATION.txt', 'EMP00002');

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
(7, '', 'user', 'user@mail.com', NULL, '$2y$10$sfWOprHfg.b9iRjqIxR2i.j.5pR8mo7GA1GdQ/MHUbjXJcRaJfWTy', NULL, NULL, NULL, 0),
(8, '', 'admin', 'admin@mail.com', NULL, '$2y$10$hAsYEQu7unZsPOLdouu18O6Zk/t4as9RseBtA3xPKq7mQUeK8wm6y', NULL, NULL, NULL, 1),
(13, 'EMP00001', 'medini', 'medini@mail.com', NULL, '$2y$10$BE.0vhuKM3HV58oPf0lf9uThPk0hn.HsepLn5PUBoCnqlmylWwWpa', NULL, NULL, NULL, 2),
(14, 'EMP00002', 'shubhendu', 'shubhendu@mail.com', NULL, '$2y$10$FW0Pc7TpGzCVV6Zx2pDR8e0Eex0bYCMNHxuiWnKs5b2WH.dUBMXyO', NULL, NULL, NULL, 2),
(15, 'EMP00003', 'Bakorshisha Kharkongor', 'bakorkharkongor@hotmail.com', NULL, '$2y$10$XBTUe801GZxy300vCJnthOo1BCu2dSh7gDPItOlOytKmpDMfTa.my', NULL, NULL, NULL, 2);

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
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toadmin`
--
ALTER TABLE `toadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toadmin_ibfk_1` (`caseid`),
  ADD KEY `employee_id` (`employee_id`);

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
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `clientdetails2`
--
ALTER TABLE `clientdetails2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receptions`
--
ALTER TABLE `receptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rejectcase`
--
ALTER TABLE `rejectcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `send_to_employees`
--
ALTER TABLE `send_to_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

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
