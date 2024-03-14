-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 01:01 PM
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
(16, '787878', '2023-12-13', '4234234', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contractNum` (`contractNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dues`
--
ALTER TABLE `dues`
  ADD CONSTRAINT `dues_ibfk_1` FOREIGN KEY (`contractNum`) REFERENCES `contracts` (`buildingNum`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
