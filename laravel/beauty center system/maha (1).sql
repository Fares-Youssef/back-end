-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 12:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maha`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `advancealldata`
-- (See below for the actual view)
--
CREATE TABLE `advancealldata` (
`id` bigint(20) unsigned
,`name` varchar(250)
,`count` varchar(250)
,`date` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `advances`
--

CREATE TABLE `advances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(250) NOT NULL,
  `empId` varchar(250) NOT NULL,
  `count` varchar(250) NOT NULL,
  `date` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advances`
--

INSERT INTO `advances` (`id`, `userName`, `empId`, `count`, `date`, `created_at`, `updated_at`) VALUES
(4, '', 'fares', '4444', '2023-09-12', '2023-09-12 12:58:51', '2023-09-12 12:58:51'),
(5, 'fares youssef', 'fares', '500', '2023-09-12', '2023-09-12 13:03:32', '2023-09-12 13:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `userName` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `userName`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'fares', 'fares youssef', '23353', '2023-08-01 20:04:10', '2023-08-01 20:04:10'),
(3, 'rana', 'fares youssef', '01066040578', '2023-08-02 09:54:35', '2023-08-02 09:54:35'),
(5, 'احمد', 'fares youssef', '152222', '2023-08-02 10:36:06', '2023-08-02 10:36:06'),
(6, 'حماده', 'fares youssef', '11111111111', '2023-08-26 13:13:08', '2023-08-26 13:13:08'),
(7, 'jksdf', 'fares youssef', '315653', '2023-08-26 13:14:21', '2023-08-26 13:14:21'),
(8, 'klfhio', 'fares youssef', '6546', '2023-08-26 13:14:59', '2023-08-26 13:14:59'),
(9, 'dasda', 'fares youssef', '156456', '2023-08-26 15:09:55', '2023-08-26 15:09:55'),
(10, 'احمد 01066040578', 'fares youssef', '01066040578', '2023-08-26 15:11:30', '2023-08-26 15:11:30'),
(11, 'xzxzxzxz5', 'fares youssef', '65645', '2023-09-12 13:05:35', '2023-09-12 13:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `draws`
--

CREATE TABLE `draws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(250) NOT NULL,
  `empId` varchar(250) NOT NULL,
  `count` varchar(250) NOT NULL,
  `date` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draws`
--

INSERT INTO `draws` (`id`, `userName`, `empId`, `count`, `date`, `created_at`, `updated_at`) VALUES
(9, '', 'fares', '200', '2023-09-12', '2023-09-12 12:47:36', '2023-09-12 12:47:36'),
(10, '', 'rana', '200', '2023-09-12', '2023-09-12 12:56:59', '2023-09-12 12:56:59'),
(11, 'fares youssef', 'fares', '100', '2023-09-12', '2023-09-12 13:10:32', '2023-09-12 13:10:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `drawsalldata`
-- (See below for the actual view)
--
CREATE TABLE `drawsalldata` (
`id` bigint(20) unsigned
,`name` varchar(250)
,`count` varchar(250)
,`date` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `userId` varchar(200) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `salary` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `userId`, `phone`, `salary`, `created_at`, `updated_at`) VALUES
(6, 'fares', '1', '01066040578', '3000', '2023-08-17 20:02:16', '2023-08-17 20:02:16'),
(7, 'rana', '12', '5156135', '56546', '2023-08-17 20:03:04', '2023-08-17 20:03:04'),
(8, 'حسين', '1', '01025492', '3000', '2023-09-12 13:00:11', '2023-09-12 13:00:11');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeesalldata`
-- (See below for the actual view)
--
CREATE TABLE `employeesalldata` (
`id` bigint(20) unsigned
,`name` varchar(250)
,`userName` varchar(255)
,`phone` varchar(250)
,`salary` varchar(250)
);

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
-- Table structure for table `ins`
--

CREATE TABLE `ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empId` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ins`
--

INSERT INTO `ins` (`id`, `empId`, `time`, `date`, `created_at`, `updated_at`) VALUES
(6, '3', '17:38', '2023-08-16', '2023-08-16 11:38:20', '2023-08-16 11:38:20'),
(7, '6', '19:10', '2023-09-12', '2023-09-12 13:10:56', '2023-09-12 13:10:56'),
(8, 'fares', '19:12', '2023-09-12', '2023-09-12 13:12:40', '2023-09-12 13:12:40'),
(9, 'fares', '19:13', '2023-09-12', '2023-09-12 13:13:05', '2023-09-12 13:13:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `insalldate`
-- (See below for the actual view)
--
CREATE TABLE `insalldate` (
`id` bigint(20) unsigned
,`name` varchar(250)
,`time` varchar(250)
,`date` varchar(250)
);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_23_175945_create_receipts_table', 2),
(6, '2023_07_24_173203_create_products_table', 2),
(7, '2023_07_25_160856_create_employees_table', 2),
(8, '2023_07_25_173711_create_accounts_table', 2),
(9, '2023_07_25_182628_create_shops_table', 2),
(10, '2023_07_28_173403_create_clients_table', 3),
(11, '2023_08_01_223104_create_clients_table', 4),
(12, '2023_08_15_163245_create_ins_table', 5),
(13, '2023_08_15_164658_create_outs_table', 6),
(14, '2023_08_15_164658_create_draws_table', 7),
(15, '2023_08_15_164658_create_advances_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `outs`
--

CREATE TABLE `outs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empId` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outs`
--

INSERT INTO `outs` (`id`, `empId`, `time`, `date`, `created_at`, `updated_at`) VALUES
(4, 'fares', '19:13', '2023-09-12', '2023-09-12 13:13:52', '2023-09-12 13:13:52');

-- --------------------------------------------------------

--
-- Stand-in structure for view `outsalldate`
-- (See below for the actual view)
--
CREATE TABLE `outsalldate` (
`id` bigint(20) unsigned
,`name` varchar(250)
,`time` varchar(250)
,`date` varchar(250)
);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `userName` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `userName`, `created_at`, `updated_at`) VALUES
(6, 'خدمه 1', 'fares youusef', '2023-08-10 13:01:25', '2023-08-10 13:01:25'),
(7, 'خدمه 2', 'fares youusef', '2023-08-10 13:01:32', '2023-08-10 13:01:32'),
(8, 'خدمه 3', 'fares youusef', '2023-08-10 13:01:38', '2023-08-10 13:01:38'),
(9, 'خدمه 4', 'fares youusef', '2023-08-10 13:01:45', '2023-08-10 13:01:45'),
(15, '15', 'fares youssef', '2023-09-12 13:04:29', '2023-09-12 13:04:29'),
(16, '5465', 'fares youssef', '2023-09-12 13:05:42', '2023-09-12 13:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(250) NOT NULL,
  `clientName` varchar(250) NOT NULL,
  `empName` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `product` text NOT NULL,
  `total` varchar(250) NOT NULL,
  `paid` varchar(250) NOT NULL,
  `totalTotal` varchar(250) NOT NULL,
  `futureDate` varchar(250) DEFAULT NULL,
  `futurePrice` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `userName`, `clientName`, `empName`, `date`, `product`, `total`, `paid`, `totalTotal`, `futureDate`, `futurePrice`, `created_at`, `updated_at`) VALUES
(2, 'fares youssef', 'fares', 'fares', '2023-08-26', '[{\"name\":\"خدمه 2\",\"price\":\"10\",\"count\":\"1\",\"total\":\"10.00\"}]', '10.00', '200', '190', NULL, NULL, '2023-08-26 13:09:31', '2023-08-26 13:09:31'),
(3, 'fares youssef', 'fares', 'fares', '2023-08-26', '[{\"name\":\"خدمة 5\",\"price\":\"10\",\"count\":\"1\",\"total\":\"10.00\"}]', '10.00', '10', '0', NULL, NULL, '2023-08-26 13:10:20', '2023-08-26 13:10:20'),
(6, 'fares youssef', 'احمد', 'rana', '2023-09-08', '[{\"name\":\"خدمه 2\",\"price\":\"3\",\"count\":\"1\",\"total\":\"3.00\"}]', '3.00', '5564', '5561.00', NULL, NULL, '2023-09-08 12:50:41', '2023-09-08 12:50:41'),
(7, 'fares youssef', 'احمد', 'rana', '2023-09-08', '[{\"name\":\"خدمه 2\",\"price\":\"64646\",\"count\":\"1\",\"total\":\"64646.00\"},{\"name\":\"خدمه 3\",\"price\":\"65464\",\"count\":\"1\",\"total\":\"65464.00\"}]', '130110.00', '456', '-129654.00', NULL, NULL, '2023-09-08 12:51:06', '2023-09-08 12:51:06'),
(8, 'fares youssef', 'rana', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"456\",\"count\":\"1\",\"total\":\"456.00\"}]', '456.00', '5465', '5009.00', NULL, NULL, '2023-09-12 10:51:37', '2023-09-12 10:51:37'),
(9, 'fares youssef', 'احمد', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 10:53:07', '2023-09-12 10:53:07'),
(10, 'fares youssef', 'احمد', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 10:58:54', '2023-09-12 10:58:54'),
(11, 'fares youssef', 'fares', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 10:59:11', '2023-09-12 10:59:11'),
(12, 'fares youssef', 'fares', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 10:59:44', '2023-09-12 10:59:44'),
(13, 'fares youssef', 'fares', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 11:00:15', '2023-09-12 11:00:15'),
(14, 'fares youssef', 'fares', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 11:04:01', '2023-09-12 11:04:01'),
(15, 'fares youssef', 'fares', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 11:07:28', '2023-09-12 11:07:28'),
(16, 'fares youssef', 'fares', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 11:08:50', '2023-09-12 11:08:50'),
(17, 'fares youssef', 'fares', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5646\",\"count\":\"1\",\"total\":\"5646.00\"}]', '5646.00', '46546', '40900.00', NULL, NULL, '2023-09-12 11:11:40', '2023-09-12 11:11:40'),
(18, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:12:13', '2023-09-12 11:12:13'),
(19, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:12:38', '2023-09-12 11:12:38'),
(20, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:16:05', '2023-09-12 11:16:05'),
(21, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:16:53', '2023-09-12 11:16:53'),
(22, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:17:07', '2023-09-12 11:17:07'),
(23, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:17:41', '2023-09-12 11:17:41'),
(24, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:17:47', '2023-09-12 11:17:47'),
(25, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:20:56', '2023-09-12 11:20:56'),
(26, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:23:14', '2023-09-12 11:23:14'),
(27, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:23:58', '2023-09-12 11:23:58'),
(28, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:23:59', '2023-09-12 11:23:59'),
(29, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:24:23', '2023-09-12 11:24:23'),
(30, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:27:49', '2023-09-12 11:27:49'),
(31, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:28:15', '2023-09-12 11:28:15'),
(32, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:28:46', '2023-09-12 11:28:46'),
(33, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:29:49', '2023-09-12 11:29:49'),
(34, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:30:19', '2023-09-12 11:30:19'),
(35, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:31:19', '2023-09-12 11:31:19'),
(36, 'fares youssef', 'rana', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"12\",\"count\":\"1\",\"total\":\"12.00\"}]', '12.00', '15', '3.00', NULL, NULL, '2023-09-12 11:34:56', '2023-09-12 11:34:56'),
(37, 'fares youssef', 'حماده', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"150\",\"count\":\"1\",\"total\":\"150.00\"},{\"name\":\"خدمه 3\",\"price\":\"300\",\"count\":\"2\",\"total\":\"600.00\"},{\"name\":\"خدمه 4\",\"price\":\"400\",\"count\":\"1\",\"total\":\"400.00\"},{\"name\":\"خدمه 1\",\"price\":\"100\",\"count\":\"1\",\"total\":\"100.00\"}]', '1250.00', '1500', '250.00', NULL, NULL, '2023-09-12 11:35:28', '2023-09-12 11:35:28'),
(38, 'fares youssef', 'حماده', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"150\",\"count\":\"1\",\"total\":\"150.00\"},{\"name\":\"خدمه 3\",\"price\":\"300\",\"count\":\"2\",\"total\":\"600.00\"},{\"name\":\"خدمه 4\",\"price\":\"400\",\"count\":\"1\",\"total\":\"400.00\"},{\"name\":\"خدمه 1\",\"price\":\"100\",\"count\":\"1\",\"total\":\"100.00\"}]', '1250.00', '1500', '250.00', NULL, NULL, '2023-09-12 11:36:11', '2023-09-12 11:36:11'),
(39, 'fares youssef', 'حماده', 'fares', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"150\",\"count\":\"1\",\"total\":\"150.00\"},{\"name\":\"خدمه 3\",\"price\":\"300\",\"count\":\"2\",\"total\":\"600.00\"},{\"name\":\"خدمه 4\",\"price\":\"400\",\"count\":\"1\",\"total\":\"400.00\"},{\"name\":\"خدمه 1\",\"price\":\"100\",\"count\":\"1\",\"total\":\"100.00\"}]', '1250.00', '1500', '250.00', NULL, NULL, '2023-09-12 11:36:16', '2023-09-12 11:36:16'),
(40, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:49:13', '2023-09-12 11:49:13'),
(41, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:49:37', '2023-09-12 11:49:37'),
(42, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:50:31', '2023-09-12 11:50:31'),
(43, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:51:07', '2023-09-12 11:51:07'),
(44, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:53:06', '2023-09-12 11:53:06'),
(45, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:57:35', '2023-09-12 11:57:35'),
(46, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:58:17', '2023-09-12 11:58:17'),
(47, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:58:28', '2023-09-12 11:58:28'),
(48, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:59:05', '2023-09-12 11:59:05'),
(49, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:59:28', '2023-09-12 11:59:28'),
(50, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:59:34', '2023-09-12 11:59:34'),
(51, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:59:48', '2023-09-12 11:59:48'),
(52, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 11:59:53', '2023-09-12 11:59:53'),
(53, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 12:00:08', '2023-09-12 12:00:08'),
(54, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 12:01:14', '2023-09-12 12:01:14'),
(55, 'fares youssef', 'fares', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"1\",\"count\":\"1\",\"total\":\"1.00\"},{\"name\":\"خدمه 3\",\"price\":\"58\",\"count\":\"1\",\"total\":\"58.00\"}]', '59.00', '100', '41.00', NULL, NULL, '2023-09-12 12:01:46', '2023-09-12 12:01:46'),
(56, 'fares youssef', 'rana', 'rana', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"10\",\"count\":\"1\",\"total\":\"10.00\"}]', '10.00', '15', '5.00', NULL, NULL, '2023-09-12 12:02:38', '2023-09-12 12:02:38'),
(57, 'fares youssef', 'احمد', 'حسين', '2023-09-12', '[{\"name\":\"خدمه 2\",\"price\":\"5568\",\"count\":\"1\",\"total\":\"5568.00\"}]', '5568.00', '1516', '-4052.00', NULL, NULL, '2023-09-12 13:04:52', '2023-09-12 13:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fares youssef', 'fares', NULL, '$2y$10$OvHc5B/y9jiQS74qTGGQcu8aNHVgaJWnBDx1oqMq10CfcisKxg47y', NULL, '2023-07-23 13:25:16', '2023-07-23 13:25:16'),
(12, 'الهرم', 'admin', NULL, '$2y$10$oFWXdOre412x8ZfTr3QM1.8F/y/NQaJqf9BWuDLe1mBlXJr//aRB2', NULL, '2023-08-10 13:04:45', '2023-08-10 13:04:45');

-- --------------------------------------------------------

--
-- Structure for view `advancealldata`
--
DROP TABLE IF EXISTS `advancealldata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `advancealldata`  AS SELECT `advances`.`id` AS `id`, `employees`.`name` AS `name`, `advances`.`count` AS `count`, `advances`.`date` AS `date` FROM (`advances` join `employees` on(`advances`.`empId` = `employees`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `drawsalldata`
--
DROP TABLE IF EXISTS `drawsalldata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `drawsalldata`  AS SELECT `draws`.`id` AS `id`, `employees`.`name` AS `name`, `draws`.`count` AS `count`, `draws`.`date` AS `date` FROM (`draws` join `employees` on(`draws`.`empId` = `employees`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `employeesalldata`
--
DROP TABLE IF EXISTS `employeesalldata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeesalldata`  AS SELECT `employees`.`id` AS `id`, `employees`.`name` AS `name`, `users`.`name` AS `userName`, `employees`.`phone` AS `phone`, `employees`.`salary` AS `salary` FROM (`employees` join `users` on(`employees`.`userId` = `users`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `insalldate`
--
DROP TABLE IF EXISTS `insalldate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insalldate`  AS SELECT `ins`.`id` AS `id`, `employees`.`name` AS `name`, `ins`.`time` AS `time`, `ins`.`date` AS `date` FROM (`ins` join `employees` on(`ins`.`empId` = `employees`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `outsalldate`
--
DROP TABLE IF EXISTS `outsalldate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `outsalldate`  AS SELECT `outs`.`id` AS `id`, `employees`.`name` AS `name`, `outs`.`time` AS `time`, `outs`.`date` AS `date` FROM (`outs` join `employees` on(`outs`.`empId` = `employees`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advances`
--
ALTER TABLE `advances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draws`
--
ALTER TABLE `draws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ins`
--
ALTER TABLE `ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outs`
--
ALTER TABLE `outs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advances`
--
ALTER TABLE `advances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `draws`
--
ALTER TABLE `draws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ins`
--
ALTER TABLE `ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `outs`
--
ALTER TABLE `outs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
