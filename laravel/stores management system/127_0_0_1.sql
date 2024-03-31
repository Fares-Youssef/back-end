-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 08:12 PM
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
-- Database: `hend`
--
CREATE DATABASE IF NOT EXISTS `hend` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hend`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cabinreport`
-- (See below for the actual view)
--
CREATE TABLE `cabinreport` (
`store_name` varchar(255)
,`cabin_name` varchar(255)
,`product_name` varchar(255)
,`sum` double
);

-- --------------------------------------------------------

--
-- Table structure for table `cabins`
--

CREATE TABLE `cabins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabins`
--

INSERT INTO `cabins` (`id`, `store_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'فوق', '2024-03-31 10:31:09', '2024-03-31 10:31:09');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cabinview`
-- (See below for the actual view)
--
CREATE TABLE `cabinview` (
`id` bigint(20) unsigned
,`name` varchar(255)
,`store_name` varchar(255)
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
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `cabin_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ins`
--

INSERT INTO `ins` (`id`, `store_id`, `cabin_id`, `product_id`, `value`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '50', '2024-03-31', '2024-03-31 10:32:48', '2024-03-31 10:32:48');

-- --------------------------------------------------------

--
-- Stand-in structure for view `insview`
-- (See below for the actual view)
--
CREATE TABLE `insview` (
`id` bigint(20) unsigned
,`store_name` varchar(255)
,`cabin_name` varchar(255)
,`product_id` bigint(20) unsigned
,`product_name` varchar(255)
,`value` varchar(255)
,`date` varchar(255)
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
(40, '2014_10_12_000000_create_users_table', 1),
(41, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(45, '2024_03_27_182514_create_stores_table', 1),
(46, '2024_03_27_193925_create_cabins_table', 1),
(47, '2024_03_27_215454_create_products_table', 1),
(48, '2024_03_27_230108_create_ins_table', 1),
(49, '2024_03_29_122936_create_outs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outs`
--

CREATE TABLE `outs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `cabin_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `attach` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outs`
--

INSERT INTO `outs` (`id`, `store_id`, `cabin_id`, `product_id`, `value`, `date`, `attach`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '5', '2024-03-31', '', '2024-03-31 10:33:22', '2024-03-31 10:33:22'),
(2, 1, 1, 1, '10', '2024-03-31', '', '2024-03-31 10:34:59', '2024-03-31 10:34:59'),
(3, 1, 1, 1, '14', '2024-03-31', 'fares', '2024-03-31 10:50:27', '2024-03-31 10:50:27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `outview`
-- (See below for the actual view)
--
CREATE TABLE `outview` (
`id` bigint(20) unsigned
,`store_name` varchar(255)
,`cabin_name` varchar(255)
,`product_id` bigint(20) unsigned
,`product_name` varchar(255)
,`value` varchar(255)
,`date` varchar(255)
,`attach` varchar(255)
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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'تعاون هايدروليك 16 لتر', '2024-03-31 10:31:32', '2024-03-31 10:31:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `productsreport`
-- (See below for the actual view)
--
CREATE TABLE `productsreport` (
`id` bigint(20) unsigned
,`name` varchar(255)
,`sum` double
);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الادارة', '2024-03-31 10:27:07', '2024-03-31 10:27:07');

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalins`
-- (See below for the actual view)
--
CREATE TABLE `totalins` (
`store_id` bigint(20) unsigned
,`cabin_id` bigint(20) unsigned
,`product_id` bigint(20) unsigned
,`total_value` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalouts`
-- (See below for the actual view)
--
CREATE TABLE `totalouts` (
`store_id` bigint(20) unsigned
,`cabin_id` bigint(20) unsigned
,`product_id` bigint(20) unsigned
,`total_value` double
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userName`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'heba', 'heba', NULL, '$2y$10$NRjOl/Sw4OOsTFHL1E/TwuRY9WV6Vm22nzMyHz5F6wMZMDPPaWdD2', NULL, '2024-03-31 10:26:24', '2024-03-31 10:26:24');

-- --------------------------------------------------------

--
-- Structure for view `cabinreport`
--
DROP TABLE IF EXISTS `cabinreport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cabinreport`  AS SELECT `stores`.`name` AS `store_name`, `cabins`.`name` AS `cabin_name`, `products`.`name` AS `product_name`, `totalins`.`total_value`- `totalouts`.`total_value` AS `sum` FROM ((((`totalins` join `totalouts` on(`totalins`.`store_id` = `totalouts`.`store_id` and `totalins`.`cabin_id` = `totalouts`.`cabin_id` and `totalins`.`product_id` = `totalouts`.`product_id`)) join `stores` on(`stores`.`id` = `totalouts`.`store_id`)) join `cabins` on(`cabins`.`id` = `totalouts`.`cabin_id`)) join `products` on(`products`.`id` = `totalouts`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `cabinview`
--
DROP TABLE IF EXISTS `cabinview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cabinview`  AS SELECT `cabins`.`id` AS `id`, `cabins`.`name` AS `name`, `stores`.`name` AS `store_name` FROM (`cabins` join `stores` on(`cabins`.`store_id` = `stores`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `insview`
--
DROP TABLE IF EXISTS `insview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insview`  AS SELECT `ins`.`id` AS `id`, `stores`.`name` AS `store_name`, `cabins`.`name` AS `cabin_name`, `products`.`id` AS `product_id`, `products`.`name` AS `product_name`, `ins`.`value` AS `value`, `ins`.`date` AS `date` FROM (((`ins` join `stores` on(`stores`.`id` = `ins`.`store_id`)) join `cabins` on(`cabins`.`id` = `ins`.`cabin_id`)) join `products` on(`products`.`id` = `ins`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `outview`
--
DROP TABLE IF EXISTS `outview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `outview`  AS SELECT `outs`.`id` AS `id`, `stores`.`name` AS `store_name`, `cabins`.`name` AS `cabin_name`, `products`.`id` AS `product_id`, `products`.`name` AS `product_name`, `outs`.`value` AS `value`, `outs`.`date` AS `date`, `outs`.`attach` AS `attach` FROM (((`outs` join `stores` on(`stores`.`id` = `outs`.`store_id`)) join `cabins` on(`cabins`.`id` = `outs`.`cabin_id`)) join `products` on(`products`.`id` = `outs`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `productsreport`
--
DROP TABLE IF EXISTS `productsreport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productsreport`  AS SELECT `products`.`id` AS `id`, `products`.`name` AS `name`, coalesce(`ins`.`ins_sum` - `outs`.`outs_sum`,0) AS `sum` FROM ((`products` left join (select `outs`.`product_id` AS `product_id`,sum(`outs`.`value`) AS `outs_sum` from `outs` group by `outs`.`product_id`) `outs` on(`products`.`id` = `outs`.`product_id`)) left join (select `ins`.`product_id` AS `product_id`,sum(`ins`.`value`) AS `ins_sum` from `ins` group by `ins`.`product_id`) `ins` on(`products`.`id` = `ins`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `totalins`
--
DROP TABLE IF EXISTS `totalins`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalins`  AS SELECT `ins`.`store_id` AS `store_id`, `ins`.`cabin_id` AS `cabin_id`, `ins`.`product_id` AS `product_id`, sum(`ins`.`value`) AS `total_value` FROM `ins` GROUP BY `ins`.`store_id`, `ins`.`cabin_id`, `ins`.`product_id` ;

-- --------------------------------------------------------

--
-- Structure for view `totalouts`
--
DROP TABLE IF EXISTS `totalouts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalouts`  AS SELECT `outs`.`store_id` AS `store_id`, `outs`.`cabin_id` AS `cabin_id`, `outs`.`product_id` AS `product_id`, sum(`outs`.`value`) AS `total_value` FROM `outs` GROUP BY `outs`.`store_id`, `outs`.`cabin_id`, `outs`.`product_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabins`
--
ALTER TABLE `cabins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cabins_store_id_foreign` (`store_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `ins_store_id_foreign` (`store_id`),
  ADD KEY `ins_cabin_id_foreign` (`cabin_id`),
  ADD KEY `ins_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outs`
--
ALTER TABLE `outs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outs_store_id_foreign` (`store_id`),
  ADD KEY `outs_cabin_id_foreign` (`cabin_id`),
  ADD KEY `outs_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabins`
--
ALTER TABLE `cabins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ins`
--
ALTER TABLE `ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `outs`
--
ALTER TABLE `outs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabins`
--
ALTER TABLE `cabins`
  ADD CONSTRAINT `cabins_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);

--
-- Constraints for table `ins`
--
ALTER TABLE `ins`
  ADD CONSTRAINT `ins_cabin_id_foreign` FOREIGN KEY (`cabin_id`) REFERENCES `cabins` (`id`),
  ADD CONSTRAINT `ins_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ins_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);

--
-- Constraints for table `outs`
--
ALTER TABLE `outs`
  ADD CONSTRAINT `outs_cabin_id_foreign` FOREIGN KEY (`cabin_id`) REFERENCES `cabins` (`id`),
  ADD CONSTRAINT `outs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `outs_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
