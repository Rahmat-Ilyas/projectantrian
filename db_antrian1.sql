-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 10:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_antrian1`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_antrian`
--

CREATE TABLE `tb_antrian` (
  `id` int(11) NOT NULL,
  `loket_id` int(11) NOT NULL,
  `no_antrian` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_antrian`
--

INSERT INTO `tb_antrian` (`id`, `loket_id`, `no_antrian`, `status`, `created_at`, `updated_at`) VALUES
(96, 1, 'B-003', 'finish', '2020-08-05 04:31:20', '2020-08-06 00:01:11'),
(97, 3, 'B-001', 'finish', '2020-08-05 05:01:16', '2020-08-05 05:55:35'),
(106, 4, 'D-001', 'finish', '2020-08-06 01:12:53', '2020-08-06 01:12:55'),
(108, 4, 'D-002', 'finish', '2020-08-06 09:50:28', '2020-08-06 09:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_antrian` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `loket_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `no_urut`, `no_antrian`, `kategori`, `loket_id`, `status`, `created_at`, `updated_at`) VALUES
(89, 9, 'A-001', 'umum', 2, 'finish', '2020-08-06 19:57:56', '2020-08-06 11:57:56'),
(90, 13, 'A-002', 'umum', 2, 'finish', '2020-08-06 19:57:57', '2020-08-06 11:57:57'),
(91, 10, 'A-003', 'umum', 2, 'finish', '2020-08-06 19:57:56', '2020-08-06 11:57:56'),
(92, 2, 'B-001', 'prioritas', 3, 'calling', '2020-08-06 09:09:30', '2020-08-06 01:09:30'),
(93, 4, 'B-002', 'prioritas', 2, 'finish', '2020-08-06 18:48:55', '2020-08-06 10:48:55'),
(94, 1, 'C-001', 'bap', NULL, 'waiting', '2020-08-04 05:48:56', '2020-08-04 05:48:56'),
(95, 2, 'C-002', 'bap', NULL, 'waiting', '2020-08-04 05:48:59', '2020-08-04 05:48:59'),
(96, 1, 'B-003', 'prioritas', 1, 'calling', '2020-08-06 09:09:30', '2020-08-06 01:09:30'),
(97, 11, 'A-004', 'umum', 2, 'finish', '2020-08-06 19:57:56', '2020-08-06 11:57:56'),
(98, 3, 'C-003', 'bap', NULL, 'waiting', '2020-08-04 09:06:16', '2020-08-04 09:06:16'),
(99, 4, 'C-004', 'bap', NULL, 'waiting', '2020-08-04 09:06:45', '2020-08-04 09:06:45'),
(100, 5, 'B-004', 'prioritas', 2, 'finish', '2020-08-06 18:49:24', '2020-08-06 10:49:24'),
(101, 12, 'A-005', 'umum', 2, 'finish', '2020-08-06 19:57:56', '2020-08-06 11:57:56'),
(102, 1, 'D-001', 'wna', 4, 'finish', '2020-08-06 17:47:58', '2020-08-06 09:47:58'),
(103, 5, 'C-005', 'bap', NULL, 'waiting', '2020-08-05 05:02:48', '2020-08-05 05:02:48'),
(104, 3, 'D-002', 'wna', 4, 'finish', '2020-08-06 17:51:11', '2020-08-06 09:51:11'),
(105, 6, 'C-006', 'bap', NULL, 'waiting', '2020-08-05 05:09:30', '2020-08-05 05:09:30'),
(106, 3, 'B-005', 'prioritas', 2, 'finish', '2020-08-06 18:47:49', '2020-08-06 10:47:49'),
(107, 2, 'D-003', 'wna', 4, 'finish', '2020-08-06 17:50:19', '2020-08-06 09:50:19'),
(108, 4, 'D-004', 'wna', 4, 'finish', '2020-08-06 18:18:28', '2020-08-06 10:18:28'),
(109, 5, 'D-005', 'wna', 4, 'finish', '2020-08-06 18:39:10', '2020-08-06 10:39:10'),
(110, 6, 'D-006', 'wna', 4, 'finish', '2020-08-06 18:40:14', '2020-08-06 10:40:14'),
(111, 7, 'D-007', 'wna', 4, 'finish', '2020-08-06 19:44:03', '2020-08-06 11:44:03'),
(112, 14, 'A-006', 'umum', 2, 'finish', '2020-08-06 19:57:57', '2020-08-06 11:57:57'),
(113, 6, 'B-006', 'prioritas', 2, 'finish', '2020-08-06 19:48:48', '2020-08-06 11:48:48'),
(114, 15, 'A-007', 'umum', 2, 'finish', '2020-08-06 19:57:57', '2020-08-06 11:57:57'),
(115, 16, 'A-008', 'umum', 2, 'finish', '2020-08-06 19:57:57', '2020-08-06 11:57:57'),
(116, 7, 'B-007', 'prioritas', 2, 'finish', '2020-08-06 19:54:19', '2020-08-06 11:54:19'),
(117, 17, 'A-009', 'umum', 2, 'finish', '2020-08-06 19:57:57', '2020-08-06 11:57:57'),
(118, 8, 'B-008', 'prioritas', 2, 'finish', '2020-08-06 19:58:23', '2020-08-06 11:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_loket`
--

CREATE TABLE `tb_loket` (
  `id` int(11) NOT NULL,
  `gets` varchar(100) NOT NULL,
  `nama_loket` varchar(100) NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_loket`
--

INSERT INTO `tb_loket` (`id`, `gets`, `nama_loket`, `layanan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fw-wni1', 'Foto Wawancara 1', 'WNI', 'off', '2020-07-21 19:26:14', '0000-00-00 00:00:00'),
(2, 'fw-wni2', 'Foto Wawacara 2', 'WNI', 'off', '2020-07-30 03:59:22', '0000-00-00 00:00:00'),
(3, 'fw-wni3', 'Foto Wawancara 3', 'WNI', 'on', '2020-07-30 03:59:27', '0000-00-00 00:00:00'),
(4, 'fw-wna1', 'Foto Wawancara 1', 'WNA', 'off', '2020-07-30 03:59:31', '0000-00-00 00:00:00'),
(5, 'fw-wna2', 'Foto Wawancara 2', 'WNA', 'on', '2020-07-30 03:59:35', '0000-00-00 00:00:00'),
(6, 'BAP', 'BAP', 'BAP', 'on', '2020-07-30 03:59:49', '2020-07-21 15:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_monitor`
--

CREATE TABLE `tb_monitor` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_monitor`
--

INSERT INTO `tb_monitor` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pause', '2020-07-27 11:19:15', '2020-07-27 04:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teks`
--

CREATE TABLE `tb_teks` (
  `id` int(11) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_teks`
--

INSERT INTO `tb_teks` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang di kantor Imigrasi Palopo. Kepuasan anda adalah Prioritas kami', '2020-07-28 18:52:20', '2020-07-28 11:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_userloket`
--

CREATE TABLE `tb_userloket` (
  `id` int(11) NOT NULL,
  `loket_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_userloket`
--

INSERT INTO `tb_userloket` (`id`, `loket_id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ahmad Ariadi', 'adminLoket', NULL, 'admin123', 'Cafe 2d Property.png', '', '2020-07-22 08:35:10', '2020-07-22 08:35:10'),
(3, 4, 'Andi Abdillah', 'cafe2d@gmail.com', NULL, '$2y$10$0HuQSkF.pijAR8sN7GPaQ.tL6fHwNcaahJ8rmgIRfJBP.AU3sMXKq', 'Cafe 2d Property.png', NULL, '2020-07-22 10:45:16', '2020-07-22 10:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

CREATE TABLE `tb_video` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'imigrasix.mp4', '2020-07-28 19:22:07', '2020-07-28 12:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loket_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `loket_id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin@admin.com', NULL, '$2y$10$2TgxIwTnSTq/0/Q8CkqC8.9euwYlDYCsEc535GO3nX3B6oK1IaXs.', 'admin.jpg', 'admin', NULL, '2020-07-29 16:00:00', '2020-07-29 16:00:00'),
(4, 'fw-wni1', 'Andi Abdillah', 'andiabdillah004@gmail.com', NULL, '$2y$10$GKTP.9yDEXt/AxIU9fwvk.TcstnP3Ed4KS68icr3QVxaEAPF83flW', 'user1.png', 'user', NULL, '2020-07-23 07:18:34', '2020-07-23 09:10:38'),
(6, 'BAP', 'Rahmat Ilyas', 'rahmat@gmail.com', NULL, '$2y$10$2TgxIwTnSTq/0/Q8CkqC8.9euwYlDYCsEc535GO3nX3B6oK1IaXs.', 'IMG-20200720-WA0024.png', 'user', NULL, '2020-07-23 09:18:09', '2020-07-29 20:02:09'),
(8, 'fw-wni2', 'Muhammad Ilham', 'muh.ilham@gmail.com', NULL, '$2y$10$VQNhoUf7/rJeUvT.XNlgh.qcBEbCtxl1r8WTr9V5xei3NRqhMtkvu', 'IMG-20200720-WA0024.png', 'user', NULL, '2020-07-29 19:52:50', '2020-07-29 19:52:50'),
(9, 'fw-wna1', 'Ishak Tom', 'ishak.tom@tes.com', NULL, '$2y$10$xI.hkehrpxiJiTKdSnlVCe9d8Z3zuwDHybRVpT3Wdv.Pt1m.iYSDS', 'anthony.jpg', 'user', NULL, '2020-07-30 01:10:51', '2020-07-30 01:11:38'),
(10, 'fw-wna2', 'Azwar Bahar', 'azwar@tes.com', NULL, '$2y$10$CYnkLFzJW8tHnWyqfcm/AugAidzXrWk75D1PKpxEBWEVB9Uul4NVG', 'reference-image-2.jpg', 'user', NULL, '2020-07-30 01:17:06', '2020-07-30 01:26:06'),
(11, 'fw-wni3', 'Lulu Azwar', 'lulu@gmail.com', NULL, '$2y$10$jQwkfAW.9ifIMZN9T6n4p.nqh/cTTmTI8WUht.A4cidR5wJ49nueC', '1.png', 'user', NULL, '2020-08-01 01:57:13', '2020-08-01 01:57:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_antrian`
--
ALTER TABLE `tb_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_loket`
--
ALTER TABLE `tb_loket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_monitor`
--
ALTER TABLE `tb_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_teks`
--
ALTER TABLE `tb_teks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_userloket`
--
ALTER TABLE `tb_userloket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_antrian`
--
ALTER TABLE `tb_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tb_loket`
--
ALTER TABLE `tb_loket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_monitor`
--
ALTER TABLE `tb_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_teks`
--
ALTER TABLE `tb_teks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_userloket`
--
ALTER TABLE `tb_userloket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
