-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2021 at 08:59 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_tubes_lagi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga_barang`, `tipe_barang`, `merk_barang`, `deskripsi_barang`, `gambar_barang`, `created_at`, `updated_at`) VALUES
(24, 'GeForce® GTX 1660 GAMING OC 6G', '8500000', 'VGA', 'NVIDIA', 'The GeForce GTX 1660 is a performance-segment graphics card by NVIDIA, launched on March 14th, 2019. Built on the 12 nm process, and based on the TU116 graphics processor, in its TU116-300-A1 variant, the card supports DirectX 12.', 'gtx1660.png', '2021-06-21 19:49:39', '2021-06-21 21:17:39'),
(25, 'MSI H310M PRO-VH PLUS', '890000', 'Motherboard', 'MSI', 'Supports 9th / 8th Gen Intel® Core™ / Pentium® Gold / Celeron® processors for LGA 1151 socket, DDR4 Memory, up to 2666MHz. Audio Boost: Reward your ears with studio grade sound quality.  EZ Debug LED: Easiest way to troubleshoot.', 'msi h310m.png', '2021-06-21 20:51:55', '2021-06-21 21:17:44'),
(26, 'KINGSTON HYPER X FURY GAMING LONGDIMM DDR3 8GB', '430000', 'Motherboard', 'Hyper X', 'Memiliki kecepatan 1280/1600 MHZ dan memiliki chipset original', 'hyperx.jpg', '2021-06-21 20:53:57', '2021-06-21 23:33:52'),
(27, 'EYOTA 128GB SATA III 2.5\"', '285000', 'Motherboard', 'Eyota', '10X Lebih Cepat dari HDD. 3D NAND TLC; Booting lebih cepat dari HDD. Read Speed: up to 500Mbps Write Speed: up to 500Mbps', 'eyotaa.jpg', '2021-06-21 21:10:02', '2021-06-21 21:50:40'),
(28, 'Simbada sim V', '300000', 'Motherboard', 'Simbada', 'Support Mobo ukuran Atx dan Mikro Atx, slot dvd, dan Fan 8 cm 3 buah', 'simbada-sim.jpg', '2021-06-21 21:11:15', '2021-06-21 21:50:30'),
(29, 'Hardisk 1TB HDD', '690000', 'Motherboard', 'Seagate', '1TB, SATA 6Gb/s with NCQ, 5400Rpm , Read/Write: 156MB/s , Cache: 64MB', 'hardisk-seagate.jpg', '2021-06-21 21:13:23', '2021-06-21 21:50:21'),
(30, 'INTEL Core i5 10100F 3.6 GHz ', '2100000', 'Processor', 'Intel', '10th Generation Intel® Core™ i5 Processors. Processor - 4-core, 8 threads, 3.6GHz (TDP 65W), Boost 4.3 GHz, 6MB L3 cache, 1100MHz, socket Intel 1200.', 'i3-gen-10.jpg', '2021-06-21 21:15:19', '2021-06-22 06:13:53'),
(34, 'Contoh Nama', '10000000', 'Motherboard', 'Contoh merk', 'Contoh', '507379.jpg', '2021-06-22 06:15:53', '2021-06-22 06:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_06_09_060610_create_barang_table', 1),
(13, '2021_06_20_142321_create_akuns_table', 2),
(14, '2021_06_20_142612_create_visitors_table', 3);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Mikhael Aditha', 'adithamikhael@gmail.com', NULL, '$2y$10$nSNUh59BavGk/wDX9w/vx.JnEgRWE0BYn/CFChPcoIszI8MdCwWz.', '1624333178674.jpg', 'LA8OrBC4EuyGGHdJYQUYkjMPwVBKVrnj5ejTxdIACrTwuWxKdiWOipOBNfz1', '2021-06-16 03:15:30', '2021-06-23 05:48:16'),
(20, 'admin', 'Diah Paramitha', 'diahparamitha@gmail.com', NULL, '$2y$10$.lQ6wonLVqOJZ8AM6UbSHeU0wLU1MItmF0XcEUguPLMdo9NKKaY.u', NULL, NULL, '2021-06-21 22:26:35', '2021-06-21 23:38:39'),
(21, 'pengguna', 'Logi Sanjaya', 'logisanjaya@gmail.com', NULL, '$2y$10$8mns6LP8V/N/DH6WwSk.A.UOZWdIdYivqsdvZjrLDT.mmMASXdunm', NULL, NULL, '2021-06-21 23:38:28', '2021-06-21 23:38:28'),
(22, 'pengguna', 'Dara Fadilah', 'darafadilah@gmail.com', NULL, '$2y$10$6k63xg4z.XvwQp1G5AxCwOKuBmJd1CtoBGK/sjKwf0vFSZ36FwAze', NULL, NULL, '2021-06-21 23:39:02', '2021-06-21 23:39:02'),
(23, 'pengguna', 'Kemal Ghazi', 'kemalghazi@gmail.com', NULL, '$2y$10$P6ysW4a2ZCm0UjYIuy/REedN3LgXL958c3xx8pPGqackC8MjOoDc6', NULL, NULL, '2021-06-21 23:39:28', '2021-06-21 23:39:28'),
(25, 'user', 'Kak Fildzah', 'kak@gmail.com', NULL, '$2y$10$XHHeQj5IUX6xbxA//bN5xeHmNarK7QExooXzIfD/BkrEQW1wUDeu2', '507379.jpg', NULL, '2021-06-22 06:08:03', '2021-06-22 06:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_visitor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
