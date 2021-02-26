-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2021 at 12:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gana`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_11_231309_tabla_rol', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_02_18_014531_tabla_servicio', 1),
(6, '2021_02_18_014640_tabla_pxp', 1),
(7, '2021_02_18_015014_tabla_correo', 1),
(8, '2021_02_18_015614_tabla_cliente', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `cliente_creador_id` bigint(20) UNSIGNED NOT NULL,
  `cliente_pxp_id` bigint(20) UNSIGNED NOT NULL,
  `cliente_correo_id` bigint(20) UNSIGNED NOT NULL,
  `cliente_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_cliente`
--

INSERT INTO `tb_cliente` (`cliente_id`, `cliente_creador_id`, `cliente_pxp_id`, `cliente_correo_id`, `cliente_nombre`, `cliente_telefono`, `created_at`, `updated_at`) VALUES
(12, 5, 3, 2, 'kevin prueba', '593968720680', '2021-02-25 23:36:43', '2021-02-25 23:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_correo`
--

CREATE TABLE `tb_correo` (
  `correo_id` bigint(20) UNSIGNED NOT NULL,
  `correo_creador_id` bigint(20) UNSIGNED NOT NULL,
  `correo_servicio_id` bigint(20) UNSIGNED NOT NULL,
  `correo_correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil` int(11) NOT NULL,
  `fecha_finaliza` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_correo`
--

INSERT INTO `tb_correo` (`correo_id`, `correo_creador_id`, `correo_servicio_id`, `correo_correo`, `correo_password`, `perfil`, `fecha_finaliza`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 'pazortiz@gmail.com', '125g4s10', 4, '2021-02-28', '2021-02-21 05:32:50', '2021-02-25 23:24:06'),
(2, 5, 4, 'ebros@gmail.com', 'g40d4gs', 3, '2019-09-04', '2021-02-21 05:39:17', '2021-02-25 23:37:04'),
(5, 5, 2, 'empi@gmail.com', '22h2d', 4, '2021-02-21', '2021-02-21 22:38:05', '2021-02-21 22:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pxp`
--

CREATE TABLE `tb_pxp` (
  `pxp_id` bigint(20) UNSIGNED NOT NULL,
  `pxp_servicio_id` bigint(20) UNSIGNED NOT NULL,
  `pxp_perfil` int(11) NOT NULL,
  `pxp_precio` double(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pxp`
--

INSERT INTO `tb_pxp` (`pxp_id`, `pxp_servicio_id`, `pxp_perfil`, `pxp_precio`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 2.00, '2021-02-21 04:24:42', '2021-02-21 04:38:57'),
(3, 4, 2, 4.00, '2021-02-22 05:47:24', '2021-02-22 05:47:24'),
(4, 2, 1, 2.00, '2021-02-22 06:29:39', '2021-02-22 06:29:39'),
(5, 2, 2, 4.00, '2021-02-22 06:29:46', '2021-02-22 06:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rol`
--

CREATE TABLE `tb_rol` (
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `rol_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_rol`
--

INSERT INTO `tb_rol` (`rol_id`, `rol_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Administrador\r\n', NULL, NULL),
(2, 'Distribuidor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_servicio`
--

CREATE TABLE `tb_servicio` (
  `servicio_id` bigint(20) UNSIGNED NOT NULL,
  `servicio_nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_servicio`
--

INSERT INTO `tb_servicio` (`servicio_id`, `servicio_nombre`, `created_at`, `updated_at`) VALUES
(2, 'Amazon Prime', '2021-02-19 02:20:01', '2021-02-21 03:44:25'),
(4, 'Netflix', '2021-02-21 03:27:41', '2021-02-21 03:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_rol_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caja` double(5,2) NOT NULL DEFAULT '0.00',
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

INSERT INTO `users` (`id`, `user_rol_id`, `name`, `telefono`, `caja`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 1, 'Kevin Daniel', '593963282309', 40.00, 'pazortizkevindaniel@gmail.com', NULL, '$2y$10$NZPa08evEMGbTtfURG0P2.2uiq7K8vz8DpC.4nTFF1KE7dFd/fV2W', NULL, '2021-02-18 19:45:21', '2021-02-25 23:36:57'),
(7, 2, 'Perrito', '593963670237', 15.50, 'perros@hotmail.com', NULL, '$2y$10$P7zW5RkqbIQ9wDuiNcKgveB6Tv/O7C4CfGa4/CfjXjngPq2X39ZHW', NULL, '2021-02-19 00:20:54', '2021-02-19 00:26:09'),
(8, 2, 'Amanda', '593963272826', 20.00, 'amanda@gmail.com', NULL, '$2y$10$NH/PiC1auE3yWVvilA0nZO75hWaUKfImfWZ/0HbiRZJs0wQ.tty5.', NULL, '2021-02-19 05:41:52', '2021-02-19 05:42:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `tb_cliente_cliente_creador_id_foreign` (`cliente_creador_id`),
  ADD KEY `tb_cliente_cliente_pxp_id_foreign` (`cliente_pxp_id`),
  ADD KEY `tb_cliente_cliente_correo_id_foreign` (`cliente_correo_id`);

--
-- Indexes for table `tb_correo`
--
ALTER TABLE `tb_correo`
  ADD PRIMARY KEY (`correo_id`),
  ADD KEY `tb_correo_correo_creador_id_foreign` (`correo_creador_id`),
  ADD KEY `tb_correo_correo_servicio_id_foreign` (`correo_servicio_id`);

--
-- Indexes for table `tb_pxp`
--
ALTER TABLE `tb_pxp`
  ADD PRIMARY KEY (`pxp_id`),
  ADD KEY `tb_pxp_pxp_servicio_id_foreign` (`pxp_servicio_id`);

--
-- Indexes for table `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indexes for table `tb_servicio`
--
ALTER TABLE `tb_servicio`
  ADD PRIMARY KEY (`servicio_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_rol_id_foreign` (`user_rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `cliente_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_correo`
--
ALTER TABLE `tb_correo`
  MODIFY `correo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pxp`
--
ALTER TABLE `tb_pxp`
  MODIFY `pxp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `rol_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_servicio`
--
ALTER TABLE `tb_servicio`
  MODIFY `servicio_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD CONSTRAINT `tb_cliente_cliente_correo_id_foreign` FOREIGN KEY (`cliente_correo_id`) REFERENCES `tb_correo` (`correo_id`),
  ADD CONSTRAINT `tb_cliente_cliente_creador_id_foreign` FOREIGN KEY (`cliente_creador_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tb_cliente_cliente_pxp_id_foreign` FOREIGN KEY (`cliente_pxp_id`) REFERENCES `tb_pxp` (`pxp_id`);

--
-- Constraints for table `tb_correo`
--
ALTER TABLE `tb_correo`
  ADD CONSTRAINT `tb_correo_correo_creador_id_foreign` FOREIGN KEY (`correo_creador_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tb_correo_correo_servicio_id_foreign` FOREIGN KEY (`correo_servicio_id`) REFERENCES `tb_servicio` (`servicio_id`);

--
-- Constraints for table `tb_pxp`
--
ALTER TABLE `tb_pxp`
  ADD CONSTRAINT `tb_pxp_pxp_servicio_id_foreign` FOREIGN KEY (`pxp_servicio_id`) REFERENCES `tb_servicio` (`servicio_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_rol_id_foreign` FOREIGN KEY (`user_rol_id`) REFERENCES `tb_rol` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
