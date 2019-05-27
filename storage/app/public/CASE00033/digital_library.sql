-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 07:55 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`id`, `username`, `password`, `admin_name`, `admin_phone`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'adminnice', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `annotationer`
--

CREATE TABLE `annotationer` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `quote` text COLLATE utf8mb4_unicode_ci,
  `ranges` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annotationer`
--

INSERT INTO `annotationer` (`id`, `page_id`, `text`, `quote`, `ranges`, `created_at`, `updated_at`) VALUES
(2, 1, 'saddam', 'Trace-based', '[{\"start\":\"\\/div[1]\\/div[1]\\/div[2]\\/div[1]\",\"startOffset\":0,\"end\":\"\\/div[1]\\/div[1]\\/div[2]\\/div[1]\",\"endOffset\":11}]', '2018-11-19 03:21:47', '2018-11-19 03:21:47'),
(3, 8, 'sa', 'untime cost, so minimiz', '[{\"start\":\"\\/div[1]\\/div[9]\\/div[2]\\/div[8]\",\"startOffset\":12,\"end\":\"\\/div[1]\\/div[9]\\/div[2]\\/div[8]\",\"endOffset\":35}]', '2018-11-19 05:47:26', '2018-11-19 05:47:26'),
(5, 1, 'saddam', 'ptions. This design trade off was chosen,because exceptions are usually rare in JavaScript. However, if aprogram opts to use exceptions intensively, we would suddenlyincur a punishing runtime overhead if we repea', '[{\"start\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[12]\",\"startOffset\":26,\"end\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[15]\",\"endOffset\":46}]', '2018-11-21 03:45:36', '2018-11-21 03:45:36'),
(6, 1, 'test', 'Sometimes', '[{\"start\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[9]\",\"startOffset\":0,\"end\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[9]\",\"endOffset\":9}]', '2018-11-21 03:47:37', '2018-11-21 03:47:37'),
(7, 1, 'test', 'into the trace monitor every time the inter-preter executes a loop header no-op. To blacklist a fragment, wesimply replace the loop header no-op with a regular no-op. Thus,the interpreter will never again even ca', '[{\"start\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[43]\",\"startOffset\":21,\"end\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[46]\",\"endOffset\":40}]', '2018-11-21 05:54:52', '2018-11-21 05:54:52'),
(8, 1, 'test', 'type-unstable loops by allowing traces tocompile that cannot loop back to themselves due to a type mis-match. As such traces accumulate, we attempt to connect their loopedges to form groups of trace trees that can execute without havingto side-exit to the interpreter t', '[{\"start\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[152]\",\"startOffset\":9,\"end\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[156]\",\"endOffset\":33}]', '2018-11-21 05:55:40', '2018-11-21 05:55:40'),
(9, 1, 'this is test', 'o be even slower than thebasic interpreter. So far, in this situation we have improved theimplementation so that the VM can complete the branch trace.But it is hard to guarantee that this situation will never happen.As future work, this situation could be avoided by', '[{\"start\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[59]\",\"startOffset\":39,\"end\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[63]\",\"endOffset\":50}]', '2018-11-21 06:35:25', '2018-11-21 06:35:25'),
(10, 1, 'sa', 'performance to be even slower than thebasic interpreter. So far, in this situation we have improved theimplementation so that the VM can complete the branch trace.But it is hard to guarantee tha', '[{\"start\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[59]\",\"startOffset\":26,\"end\":\"\\/div[1]\\/div[6]\\/div[2]\\/div[62]\",\"endOffset\":31}]', '2018-11-21 23:25:42', '2018-11-21 23:25:42'),
(12, 1, 'saddam', 'that there are no errors in the text', '[{\"start\":\"\\/div[1]\\/div[28]\\/div[2]\\/div[4]\",\"startOffset\":31,\"end\":\"\\/div[1]\\/div[28]\\/div[2]\\/div[4]\",\"endOffset\":67}]', '2018-11-23 07:45:27', '2018-11-23 07:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(36, 'Computer Science', 'CS', '2018-11-20 02:22:51', '2018-11-20 02:22:51'),
(37, 'History', 'HST', '2018-11-20 02:23:06', '2018-11-20 02:23:06'),
(38, 'Chemical Science', 'CSC', '2018-11-20 02:23:25', '2018-11-20 02:23:25'),
(39, 'Accounts', 'Accounts', '2018-11-23 04:28:47', '2018-11-23 04:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`) VALUES
(1, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_id` varchar(50) DEFAULT NULL,
  `board` varchar(50) NOT NULL,
  `class` int(11) NOT NULL,
  `stream` varchar(11) NOT NULL,
  `categoriesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_id`, `board`, `class`, `stream`, `categoriesID`) VALUES
(27, 'MBGEN08', 'mbose', 8, 'GEN', 0),
(28, 'MBART09', 'mbose', 9, 'ART', 0),
(29, 'MBGEN09', 'mbose', 9, 'GEN', 0),
(30, 'MBGEN09', 'mbose', 9, 'GEN', 37),
(31, 'MBART08', 'mbose', 8, 'ART', 36),
(32, 'MBGEN11', 'mbose', 11, 'GEN', 37),
(33, 'MBART10', 'mbose', 10, 'ART', 37);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `course_name`, `subject_name`, `category_name`, `pdf`, `created_at`, `updated_at`) VALUES
(1, 'MBGEN08', 'Biology', '36', 'C:\\xampp\\tmp\\php5F9C.tmp', NULL, NULL),
(2, 'MBGEN08', 'Biology', '36', 'C:\\xampp\\tmp\\php987F.tmp', NULL, NULL),
(3, 'MBGEN08', 'History', '37', 'C:\\xampp\\tmp\\php6282.tmp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `highlighter`
--

CREATE TABLE `highlighter` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `quote` text COLLATE utf8mb4_unicode_ci,
  `ranges` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'saddam', '202cb962ac59075b964b07152d234b70', NULL, NULL);

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
(1, '2018_10_23_125152_login_tbl', 1),
(2, '2018_10_23_132426_login_tbl', 2),
(3, '2018_10_31_102640_create_tbl_admin_tbl', 3),
(4, '2018_11_16_071312_create_admin_credentials', 4),
(5, '2018_11_16_124033_create_categories', 5),
(6, '2018_11_19_082521_create_annotation_table', 6),
(7, '2018_11_21_113137_create_highlight_table', 7),
(8, '2018_11_24_094048_create_files_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `id` int(11) NOT NULL,
  `clsStream` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`id`, `clsStream`) VALUES
(1, 'general'),
(2, 'arts'),
(3, 'science'),
(4, 'commerce');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subjectID` varchar(255) NOT NULL,
  `subjectName` varchar(355) NOT NULL,
  `courseID` varchar(255) NOT NULL,
  `categoriesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectID`, `subjectName`, `courseID`, `categoriesID`) VALUES
(1, '', 'sas', 'MBCOM10', 0),
(2, '', 'sas', 'MBCOM10', 0),
(3, 'MBGEN08PHY716', 'Physics', 'MBGEN08', 0),
(4, 'MBGEN08BIO777', 'Biology', 'MBGEN08', 0),
(5, 'MBGEN08MAT473', 'Maths', 'MBGEN08', 37),
(6, 'MBGEN08BIO433', 'Biology', 'MBGEN08', 36),
(7, 'MBGEN08HIS735', 'History', 'MBGEN08', 37),
(8, 'MBGEN11ACC625', 'Accountancy', 'MBGEN11', 39);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'saddam', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(2, 'jane', '202cb962ac59075b964b07152d234b70', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jane', 'jane@mail.com', NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annotationer`
--
ALTER TABLE `annotationer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annotationer_id_index` (`id`),
  ADD KEY `annotationer_page_id_index` (`page_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highlighter`
--
ALTER TABLE `highlighter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `highlighter_id_index` (`id`),
  ADD KEY `highlighter_page_id_index` (`page_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `annotationer`
--
ALTER TABLE `annotationer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `highlighter`
--
ALTER TABLE `highlighter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
