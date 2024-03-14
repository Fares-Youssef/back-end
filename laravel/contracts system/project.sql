-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 06:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', '2023-12-10 13:43:34', '2023-12-10 13:43:34'),
(2, 'الدمام', '2023-12-10 14:32:02', '2023-12-10 14:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buildingNum` varchar(255) DEFAULT NULL,
  `buildingName` varchar(255) DEFAULT NULL,
  `buildingType` varchar(255) DEFAULT NULL,
  `projectName` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `buildingIn` varchar(255) DEFAULT NULL,
  `ownerName` varchar(255) DEFAULT NULL,
  `ownerPhone` varchar(255) DEFAULT NULL,
  `agentName` varchar(255) DEFAULT NULL,
  `agentPhone` varchar(255) DEFAULT NULL,
  `agencyNum` varchar(255) DEFAULT NULL,
  `agencyDate` varchar(255) DEFAULT NULL,
  `mediatorName` varchar(255) DEFAULT NULL,
  `mediatorPhone` varchar(255) DEFAULT NULL,
  `Administrator` varchar(255) DEFAULT NULL,
  `AdministratorPhone` varchar(255) DEFAULT NULL,
  `contractType` varchar(255) DEFAULT NULL,
  `contractTime` varchar(255) DEFAULT NULL,
  `contractDetails` varchar(255) DEFAULT NULL,
  `contractValue` varchar(255) DEFAULT NULL,
  `contractStart` varchar(255) DEFAULT NULL,
  `contractEnd` varchar(255) DEFAULT NULL,
  `rentStart` varchar(255) DEFAULT NULL,
  `rentEnd` varchar(255) DEFAULT NULL,
  `rentValue` varchar(255) DEFAULT NULL,
  `rentTime` varchar(255) DEFAULT NULL,
  `contractPDF` varchar(255) DEFAULT NULL,
  `checkbox` varchar(255) DEFAULT NULL,
  `checkboxPDF` varchar(255) DEFAULT NULL,
  `textArea` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `buildingNum`, `buildingName`, `buildingType`, `projectName`, `city`, `buildingIn`, `ownerName`, `ownerPhone`, `agentName`, `agentPhone`, `agencyNum`, `agencyDate`, `mediatorName`, `mediatorPhone`, `Administrator`, `AdministratorPhone`, `contractType`, `contractTime`, `contractDetails`, `contractValue`, `contractStart`, `contractEnd`, `rentStart`, `rentEnd`, `rentValue`, `rentTime`, `contractPDF`, `checkbox`, `checkboxPDF`, `textArea`, `created_at`, `updated_at`) VALUES
(1, '123456', 'المبني المشترك', NULL, 'مشروع سفلته شوارع جنوب الرياض', 'الرياض', 'عشر شقق', 'احمد محمد', '01025488548', 'حسام منصور', '0185255885555', '12356', '2023-12-01', 'حسين محمد', '4444', 'احمد محمود', '6510515156', 'تجاري', 'سنه', 'دفعة كل ستة اشهر', '120000', '2023-12-10', '2024-12-10', NULL, NULL, NULL, NULL, '1702296142151515.png', NULL, NULL, NULL, '2023-12-10 13:44:41', '2023-12-11 10:02:22'),
(2, '101010', 'المبدي الفلان', NULL, 'مشروع سفلته شوارع جنوب الرياض', 'الدمام', 'عشر شقق', 'حسين', '5555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'مدني', NULL, 'دفعة كل ستة اشهر', NULL, '2023-12-10', NULL, NULL, NULL, NULL, NULL, '1702225952scrnli_12_10_2023_12-26-03 AM.png', 'نعم', NULL, NULL, '2023-12-10 14:32:32', '2023-12-13 14:14:17'),
(5, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 09:49:47', '2023-12-11 09:49:47'),
(6, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 09:50:23', '2023-12-11 09:50:23'),
(7, '17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 09:53:03', '2023-12-11 09:53:03'),
(8, '88', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 10:03:58', '2023-12-11 10:03:58'),
(9, '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 10:23:55', '2023-12-11 10:23:55'),
(10, '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 10:24:01', '2023-12-11 10:24:01'),
(11, '99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 10:24:09', '2023-12-11 10:24:09'),
(12, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 10:24:13', '2023-12-11 10:24:13'),
(14, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 12:49:36', '2023-12-11 12:49:36'),
(15, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2023-12-11 12:49:42', '2023-12-11 12:49:42'),
(16, '1515', NULL, 'ارض', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 12:55:22', '2023-12-11 13:32:56'),
(18, '787878', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 17:30:30', '2023-12-11 17:30:30'),
(19, '879798', 'حماده', 'ارض', 'حماده', 'الرياض', 'عشر شقق', 'احمد محمد', '01025488548', 'حسام منصور', '0185255885555', '12356', '2023-12-13', 'حسين محمد', '4444', 'احمد محمود', '6510515156', 'تجاري', 'سنه', 'دفعة كل ستة اشهر', '120000', '2023-12-13', '2023-12-28', NULL, NULL, NULL, NULL, '1702478656fares666.pdf', '1', '1702478656dues.sql', NULL, '2023-12-13 12:42:51', '2023-12-13 12:44:16'),
(20, '498984', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-13', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2023-12-13 13:07:45', '2023-12-13 13:07:45'),
(21, '51565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-13', NULL, NULL, NULL, NULL, NULL, NULL, 'نعم', NULL, NULL, '2023-12-13 13:09:00', '2023-12-13 13:09:00'),
(22, '15115', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'مدني', NULL, NULL, NULL, '2023-12-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-13 14:12:32', '2023-12-13 14:12:32'),
(24, '5611556', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-14', NULL, '2023-12-13', '2023-12-13', 'dasdas', 'dasdasd', NULL, NULL, NULL, '156651611', '2023-12-14 14:25:36', '2023-12-14 14:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'تجاري', '2023-12-10 13:43:41', '2023-12-10 13:43:41'),
(2, 'مدني', '2023-12-10 14:55:32', '2023-12-10 14:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contractNum` varchar(20) DEFAULT NULL,
  `dueDate` varchar(250) DEFAULT NULL,
  `dueInstallment` varchar(250) DEFAULT NULL,
  `pay` bigint(20) DEFAULT NULL,
  `dueData` varchar(250) DEFAULT NULL,
  `duePdf` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`id`, `contractNum`, `dueDate`, `dueInstallment`, `pay`, `dueData`, `duePdf`, `created_at`, `updated_at`) VALUES
(1, '123456', '2023-12-10', '10000', 10000, NULL, '1702414543fares666.pdf', NULL, '2023-12-12 18:55:51'),
(2, '123456', '2024-01-10', '10000', 10000, NULL, NULL, NULL, '2023-12-10 15:41:51'),
(3, '123456', '2024-01-10', '10000', 10000, NULL, NULL, NULL, '2023-12-12 20:25:15'),
(4, '123456', '2024-03-10', '10000', NULL, NULL, NULL, '2023-12-10 13:45:38', '2023-12-10 13:45:38'),
(5, '101010', '2023-12-11', '10000', NULL, NULL, NULL, NULL, NULL),
(9, '787878', '2023-12-06', '13123', NULL, NULL, NULL, NULL, NULL),
(10, '787878', '2023-12-13', '313123', NULL, NULL, NULL, NULL, NULL),
(11, '787878', '2023-12-07', '42342', NULL, NULL, NULL, NULL, NULL),
(12, '787878', '2023-12-07', '4234234', 4234234, NULL, NULL, NULL, '2023-12-12 18:07:09'),
(13, '787878', '2023-12-29', '234234', NULL, NULL, NULL, NULL, NULL),
(14, '787878', '2023-12-07', '234234234', NULL, NULL, NULL, NULL, NULL),
(15, '787878', '2023-12-07', '4234234', NULL, NULL, NULL, NULL, NULL),
(16, '787878', '2023-12-13', '4234234', NULL, NULL, NULL, NULL, NULL),
(17, '879798', '2023-12-01', '1500', NULL, NULL, NULL, NULL, NULL),
(18, '879798', '2024-01-01', '1500', NULL, NULL, NULL, NULL, NULL),
(19, '879798', '2024-02-01', '1500', NULL, NULL, NULL, NULL, NULL),
(20, '498984', '2023-12-21', '15515115', NULL, NULL, NULL, '2023-12-13 13:08:16', '2023-12-13 13:08:16'),
(21, '51565', '2023-12-07', '51151', NULL, NULL, NULL, NULL, NULL),
(22, '15115', '2023-12-07', '151515', NULL, NULL, NULL, NULL, NULL),
(23, '15115', '2023-12-14', '1151', NULL, NULL, NULL, NULL, NULL),
(24, '15115', '2023-12-23', '15151', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `duesjoincontracts`
-- (See below for the actual view)
--
CREATE TABLE `duesjoincontracts` (
`id` bigint(20) unsigned
,`contractNum` varchar(20)
,`dueDate` varchar(250)
,`dueInstallment` varchar(250)
,`pay` bigint(20)
,`dueData` varchar(250)
,`duePdf` varchar(250)
,`buildingName` varchar(255)
,`buildingType` varchar(255)
,`projectName` varchar(255)
,`city` varchar(255)
,`buildingIn` varchar(255)
,`ownerName` varchar(255)
,`ownerPhone` varchar(255)
,`agentName` varchar(255)
,`agentPhone` varchar(255)
,`agencyNum` varchar(255)
,`agencyDate` varchar(255)
,`mediatorName` varchar(255)
,`mediatorPhone` varchar(255)
,`Administrator` varchar(255)
,`AdministratorPhone` varchar(255)
,`contractType` varchar(255)
,`contractTime` varchar(255)
,`contractDetails` varchar(255)
,`contractValue` varchar(255)
,`contractStart` varchar(255)
,`contractEnd` varchar(255)
,`contractPDF` varchar(255)
,`checkbox` varchar(255)
,`checkboxPDF` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `electics`
--

CREATE TABLE `electics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contractNum` varchar(250) DEFAULT NULL,
  `start` varchar(250) DEFAULT NULL,
  `end` varchar(250) DEFAULT NULL,
  `value` varchar(250) DEFAULT NULL,
  `PDF` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `electics`
--

INSERT INTO `electics` (`id`, `contractNum`, `start`, `end`, `value`, `PDF`, `created_at`, `updated_at`) VALUES
(2, '101010', '2023-12-21', '2023-12-07', '155115', '170264571617025936261702414543fares666.pdf', '2023-12-15 11:08:36', '2023-12-15 11:08:36');

-- --------------------------------------------------------

--
-- Stand-in structure for view `electricjoincontract`
-- (See below for the actual view)
--
CREATE TABLE `electricjoincontract` (
`id` bigint(20) unsigned
,`contractNum` varchar(250)
,`start` varchar(250)
,`end` varchar(250)
,`value` varchar(250)
,`PDF` varchar(250)
,`buildingName` varchar(255)
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
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2019_08_19_000000_create_failed_jobs_table', 1),
(31, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(32, '2023_12_04_174956_create_contracts_table', 1),
(33, '2023_12_05_121342_create_cities_table', 1),
(34, '2023_12_05_122627_create_times_table', 1),
(35, '2023_12_05_122720_create_details_table', 1),
(36, '2023_12_06_183206_create_dues_table', 1),
(37, '2023_12_11_134654_create_types_table', 2),
(38, '2023_12_14_162653_create_waters_table', 3),
(39, '2023_12_15_122952_create_electics_table', 4);

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
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'دفعة كل ستة اشهر', '2023-12-10 13:43:47', '2023-12-10 13:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'ارض', '2023-12-11 12:09:32', '2023-12-11 12:09:32');

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
(1, 'fares', 'fares', NULL, '$2y$10$ou3pB89zC7hSGvxrdW/YruVaHFOy0xPB3y/rioWLfSmQWKymerp0G', NULL, '2023-12-10 13:40:03', '2023-12-10 13:40:03'),
(2, 'ahmed', 'ahmed', NULL, '$2y$10$trzSqa0aNhB2AyFaNSlDgeLoPwtmCwujb2PdByH.Aw3T9KI33jFja', NULL, '2023-12-10 13:40:45', '2023-12-10 13:40:45');

-- --------------------------------------------------------

--
-- Stand-in structure for view `waterjoincontract`
-- (See below for the actual view)
--
CREATE TABLE `waterjoincontract` (
`id` bigint(20) unsigned
,`contractNum` varchar(255)
,`start` varchar(255)
,`end` varchar(255)
,`value` varchar(255)
,`PDF` varchar(255)
,`buildingName` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `waters`
--

CREATE TABLE `waters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contractNum` varchar(255) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `PDF` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waters`
--

INSERT INTO `waters` (`id`, `contractNum`, `start`, `end`, `value`, `PDF`, `created_at`, `updated_at`) VALUES
(1, '101010', '2023-12-16', '2024-01-16', '1500', '17025936261702414543fares666.pdf', '2023-12-14 20:40:26', '2023-12-14 20:40:26');

-- --------------------------------------------------------

--
-- Structure for view `duesjoincontracts`
--
DROP TABLE IF EXISTS `duesjoincontracts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `duesjoincontracts`  AS SELECT `dues`.`id` AS `id`, `dues`.`contractNum` AS `contractNum`, `dues`.`dueDate` AS `dueDate`, `dues`.`dueInstallment` AS `dueInstallment`, `dues`.`pay` AS `pay`, `dues`.`dueData` AS `dueData`, `dues`.`duePdf` AS `duePdf`, `contracts`.`buildingName` AS `buildingName`, `contracts`.`buildingType` AS `buildingType`, `contracts`.`projectName` AS `projectName`, `contracts`.`city` AS `city`, `contracts`.`buildingIn` AS `buildingIn`, `contracts`.`ownerName` AS `ownerName`, `contracts`.`ownerPhone` AS `ownerPhone`, `contracts`.`agentName` AS `agentName`, `contracts`.`agentPhone` AS `agentPhone`, `contracts`.`agencyNum` AS `agencyNum`, `contracts`.`agencyDate` AS `agencyDate`, `contracts`.`mediatorName` AS `mediatorName`, `contracts`.`mediatorPhone` AS `mediatorPhone`, `contracts`.`Administrator` AS `Administrator`, `contracts`.`AdministratorPhone` AS `AdministratorPhone`, `contracts`.`contractType` AS `contractType`, `contracts`.`contractTime` AS `contractTime`, `contracts`.`contractDetails` AS `contractDetails`, `contracts`.`contractValue` AS `contractValue`, `contracts`.`contractStart` AS `contractStart`, `contracts`.`contractEnd` AS `contractEnd`, `contracts`.`contractPDF` AS `contractPDF`, `contracts`.`checkbox` AS `checkbox`, `contracts`.`checkboxPDF` AS `checkboxPDF` FROM (`dues` join `contracts` on(`dues`.`contractNum` = `contracts`.`buildingNum`)) ;

-- --------------------------------------------------------

--
-- Structure for view `electricjoincontract`
--
DROP TABLE IF EXISTS `electricjoincontract`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `electricjoincontract`  AS SELECT `electics`.`id` AS `id`, `electics`.`contractNum` AS `contractNum`, `electics`.`start` AS `start`, `electics`.`end` AS `end`, `electics`.`value` AS `value`, `electics`.`PDF` AS `PDF`, `contracts`.`buildingName` AS `buildingName` FROM (`electics` join `contracts` on(`electics`.`contractNum` = `contracts`.`buildingNum`)) ;

-- --------------------------------------------------------

--
-- Structure for view `waterjoincontract`
--
DROP TABLE IF EXISTS `waterjoincontract`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `waterjoincontract`  AS SELECT `waters`.`id` AS `id`, `waters`.`contractNum` AS `contractNum`, `waters`.`start` AS `start`, `waters`.`end` AS `end`, `waters`.`value` AS `value`, `waters`.`PDF` AS `PDF`, `contracts`.`buildingName` AS `buildingName` FROM (`waters` join `contracts` on(`waters`.`contractNum` = `contracts`.`buildingNum`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buildingNum` (`buildingNum`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contractNum` (`contractNum`);

--
-- Indexes for table `electics`
--
ALTER TABLE `electics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contractNum` (`contractNum`);

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
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `waters`
--
ALTER TABLE `waters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contractNum` (`contractNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `electics`
--
ALTER TABLE `electics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `waters`
--
ALTER TABLE `waters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dues`
--
ALTER TABLE `dues`
  ADD CONSTRAINT `dues_ibfk_1` FOREIGN KEY (`contractNum`) REFERENCES `contracts` (`buildingNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electics`
--
ALTER TABLE `electics`
  ADD CONSTRAINT `electics_ibfk_1` FOREIGN KEY (`contractNum`) REFERENCES `contracts` (`buildingNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waters`
--
ALTER TABLE `waters`
  ADD CONSTRAINT `waters_ibfk_1` FOREIGN KEY (`contractNum`) REFERENCES `contracts` (`buildingNum`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
