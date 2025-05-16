-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Generation Time: Apr 23, 2025 at 08:34 AM
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
-- Database: `pengajuan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pengajuan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama_dokumen`, `created_at`, `updated_at`, `pengajuan_id`) VALUES
(1, 'Fotocopy KTP', '2025-03-20 11:21:26', '2025-03-20 11:21:26', 0),
(2, 'Fotocopy KK', '2025-03-20 11:21:47', '2025-03-20 11:21:47', 0),
(3, 'Fotocopy Akta Kelahiran', '2025-03-20 11:22:01', '2025-03-20 11:22:01', 0),
(4, 'Surat Pengantar RT/RW', '2025-03-20 11:22:18', '2025-03-20 11:22:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `pengajuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `syarat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumens`
--

INSERT INTO `dokumens` (`id`, `nama_dokumen`, `pengajuan_id`, `nama_file`, `syarat_id`, `created_at`, `updated_at`) VALUES
(2, 'Fotocopy KTP', NULL, NULL, NULL, '2025-03-13 14:35:53', '2025-03-13 14:36:05'),
(3, 'Fotocopy KK', NULL, NULL, NULL, '2025-03-13 14:41:17', '2025-03-13 14:41:29'),
(4, 'Fotocopy Akta Kelahiran', NULL, NULL, NULL, '2025-03-13 14:43:50', '2025-03-13 14:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat_dokumen`
--

CREATE TABLE `jenis_surat_dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_surat_id` bigint(20) UNSIGNED NOT NULL,
  `dokumen_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_surat_dokumen`
--

INSERT INTO `jenis_surat_dokumen` (`id`, `jenis_surat_id`, `dokumen_id`) VALUES
(32, 177, 1),
(33, 177, 2),
(34, 177, 4),
(35, 178, 1),
(36, 178, 2),
(37, 178, 4),
(38, 179, 1),
(39, 179, 2),
(40, 180, 2),
(41, 180, 3),
(42, 180, 4),
(43, 181, 1),
(44, 181, 2),
(45, 181, 4),
(46, 182, 1),
(47, 182, 2),
(48, 182, 4),
(49, 183, 1),
(50, 183, 2),
(51, 183, 4);

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_lampiran` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id`, `pengajuan_id`, `nama_lampiran`, `file`, `created_at`, `updated_at`) VALUES
(1, 11, '25+artikel_Dony+20182-20190.pdf', 'lampiran/OdWb6n9olzXzOduYCSVJQ9pCLZPHowcUbuD8Vt2d.pdf', '2025-04-12 01:06:09', '2025-04-12 01:06:09'),
(2, 11, '5+Artikel-Krisno+To+Suli.pdf', 'lampiran/ROtI8fJPVLDBSsZbGD1wlk9tTtfAgv3YkKkwcrM1.pdf', '2025-04-12 01:06:09', '2025-04-12 01:06:09'),
(3, 11, 'yayaaziz,+12.+Siti+Marfu’ah,+Ana+Kumalasari,+Ida+swasanti.pdf', 'lampiran/HvW3vjPOPQj0RLSCVb2hBStHtzX89qqhwxCHSdNp.pdf', '2025-04-12 01:06:09', '2025-04-12 01:06:09'),
(4, 12, '25+artikel_Dony+20182-20190.pdf', 'lampiran/Jg6xCUeoIlT4B0sYGk3F6v0h1UyaPbgxbFW6B3Wf.pdf', '2025-04-16 10:41:50', '2025-04-16 10:41:50'),
(5, 12, 'document (4).pdf', 'lampiran/x61zFB1U1uaWzYIb9XgcsnjpgUZhhutYIyi9ypHd.pdf', '2025-04-16 10:41:50', '2025-04-16 10:41:50'),
(6, 13, 'Paper+3+(25-44)+14+02+2023.pdf', 'lampiran/MDCbBjXbRA99SZq7dKZEkgpzIbIJr2881Nk0wJ3Y.pdf', '2025-04-16 14:21:20', '2025-04-16 14:21:20'),
(7, 13, '1336-1439-2-PB.pdf', 'lampiran/qKXXHgQZb2J6NUehjyUr1T3gXBuatCoWh8l7y4a0.pdf', '2025-04-16 14:21:20', '2025-04-16 14:21:20'),
(8, 14, 'yayaaziz,+12.+Siti+Marfu’ah,+Ana+Kumalasari,+Ida+swasanti.pdf', 'lampiran/R8DodZXSiexhNkgiQS6ZVZPNSOmpwN0MEqQd5Faa.pdf', '2025-04-16 20:24:09', '2025-04-16 20:24:09');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2025_02_27_162129_buat_tabel_surat', 2),
(4, '2025_03_06_155335_add_role_to_users_table', 3),
(5, '2025_03_06_214422_create_pengajuans_table', 4),
(6, '2025_03_06_214030_create_dokumens_table', 5),
(7, '2025_03_13_183534_add_syarat_id_to_dokumens_table', 6),
(9, '2025_03_13_195640_add_nama_dokumen_to_dokumens_table', 7),
(10, '2025_03_13_200918_modify_syarat_id_in_dokumens_tables', 8),
(11, '2025_03_13_212308_update_dokumens_table', 9),
(12, '2025_03_13_213152_update_dokumens_table', 10),
(13, '2025_03_13_223604_update_syarat_surat_nullable', 11),
(14, '2025_03_14_004015_add_syarat_id_to_surat_table', 12),
(15, '2025_03_20_175517_create_dokumen_table', 13),
(16, '2025_03_21_023246_update_jenis_surat_id_in_pengajuans', 14),
(17, '2025_04_12_062115_create_lampiran_table', 15);

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
-- Table structure for table `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_surat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','diproses','selesai','ditolak') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuans`
--

INSERT INTO `pengajuans` (`id`, `user_id`, `jenis_surat_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 13, 177, 'ditolak', '2025-04-12 01:06:08', '2025-04-16 14:15:44'),
(12, 13, 182, 'diproses', '2025-04-16 10:41:49', '2025-04-16 13:10:00'),
(13, 13, 177, 'pending', '2025-04-16 14:21:19', '2025-04-16 14:21:19'),
(14, 13, 182, 'diproses', '2025-04-16 20:24:09', '2025-04-16 20:25:29'),
(16, 14, 177, 'diproses', '2025-04-17 00:20:11', '2025-04-17 00:26:39'),
(17, 14, 182, 'pending', '2025-04-17 00:24:11', '2025-04-17 00:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `deskripsi_surat` text NOT NULL,
  `syarat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `syarat_surat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `jenis_surat`, `deskripsi_surat`, `syarat_id`, `syarat_surat`, `created_at`, `updated_at`) VALUES
(177, 'SKTM Sekolah', 'Surat yang diberikan kepada keluarga kurang mampu untuk mendapat keringanan biaya sekolah', NULL, NULL, '2025-03-20 12:10:36', '2025-03-20 12:10:36'),
(178, 'SKTM Kuliah', 'Surat yang diberikan kepada keluarga kurang mampu untuk mendapat keringanan biaya kuliah', NULL, NULL, '2025-03-20 12:11:08', '2025-03-20 12:11:08'),
(179, 'Surat Kelahiran', 'surat resmi yang dikeluarkan oleh pihak berwenang, seperti Kepala Desa, untuk memberikan informasi tentang kelahiran seseorang.', NULL, NULL, '2025-03-20 12:11:51', '2025-03-20 12:11:51'),
(180, 'Surat Pengajuan Permohonan KTP', 'Surat pengantar pembuatan KTP Elektronik', NULL, NULL, '2025-03-20 12:12:38', '2025-03-20 12:12:38'),
(181, 'Surat Perubahan KK', 'Dokumen tertulis untuk memberitahukan kepada pihak berwenang (Dinas Kependudukan dan Pencatatan Sipil) tentang adanya perubahan data dalam Kartu Keluarga', NULL, NULL, '2025-03-20 12:14:32', '2025-03-20 12:14:32'),
(182, 'Surat Pindah Domisili', 'Surat yang dibuat oleh penduduk yang akan pindah ke tempat tinggal baru.', NULL, NULL, '2025-03-20 12:15:17', '2025-03-20 12:15:17'),
(183, 'Surat keterangan kehilangan', '-', NULL, NULL, '2025-03-20 21:32:21', '2025-03-20 21:32:21');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','masyarakat','kepala_desa','sekretaris_desa') NOT NULL DEFAULT 'masyarakat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(8, 'Bella', 'bella@gmail.com', NULL, '$2y$10$klinHpQzFEr3agmZ2EnktOcKoOzayiZXP3V3XH48OU5Et/dvLrjUO', NULL, '2025-03-06 10:51:06', '2025-03-06 10:51:06', 'masyarakat'),
(9, 'Admin', 'admin@gmail.com', NULL, '$2y$10$2EG8.44q.dBPA/z4bQj6I.FWZhlibD2.wo3CbCkPGsOamYF71vipq', NULL, '2025-03-06 11:59:23', '2025-03-06 11:59:23', 'admin'),
(10, 'Nimas', 'nimas@gmail.com', NULL, '$2y$10$QsmAcUZ8SslyqqhGRSpkcu9n3sPkmpgGkTGbny0MghhK.YqTB.bZK', NULL, '2025-03-06 12:16:10', '2025-03-06 12:16:10', 'masyarakat'),
(11, 'Sekretaris Desa', 'sekdes@gmail.com', NULL, '$2y$10$Ak/sgMUIQr2.h85X5nYWF.C6MiA0yxMHC8MAyoHrNgUi38C2rTUXG', NULL, '2025-03-06 12:16:50', '2025-03-06 12:16:50', 'sekretaris_desa'),
(12, 'Kepala Desa', 'kades@gmail.com', NULL, '$2y$10$e4mD10iivp9YrM.WW.IHLeeIfRy5g2zR/r5R.zsDviEWxZbqgeDk6', NULL, '2025-03-06 12:17:27', '2025-03-06 12:17:27', 'kepala_desa'),
(13, 'Citra O', 'citra@gmail.com', NULL, '$2y$10$phg5Wnxy2a7gSPD/apyPDOr.WU/m5oER0zxc/dpt1hA8NhBbGpcV.', NULL, '2025-03-06 20:23:39', '2025-03-06 20:24:19', 'masyarakat'),
(14, 'izza', 'izza@gmai.com', NULL, '$2y$10$SWn4ir3ZHDX1cVn83KVUUebfM6Fnr43WDbT/e8V86uvpLXygdnSDK', NULL, '2025-04-17 00:17:27', '2025-04-17 00:17:27', 'masyarakat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dokumen_nama_dokumen_unique` (`nama_dokumen`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumens_pengajuan_id_foreign` (`pengajuan_id`),
  ADD KEY `dokumens_syarat_id_foreign` (`syarat_id`);

--
-- Indexes for table `jenis_surat_dokumen`
--
ALTER TABLE `jenis_surat_dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_surat_dokumen_jenis_surat_id_foreign` (`jenis_surat_id`),
  ADD KEY `jenis_surat_dokumen_dokumen_id_foreign` (`dokumen_id`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lampiran_pengajuan_id_foreign` (`pengajuan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuans_user_id_foreign` (`user_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_syarat_id_foreign` (`syarat_id`);

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
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_surat_dokumen`
--
ALTER TABLE `jenis_surat_dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengajuans`
--
ALTER TABLE `pengajuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD CONSTRAINT `dokumens_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokumens_syarat_id_foreign` FOREIGN KEY (`syarat_id`) REFERENCES `dokumens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jenis_surat_dokumen`
--
ALTER TABLE `jenis_surat_dokumen`
  ADD CONSTRAINT `jenis_surat_dokumen_dokumen_id_foreign` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jenis_surat_dokumen_jenis_surat_id_foreign` FOREIGN KEY (`jenis_surat_id`) REFERENCES `surat` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD CONSTRAINT `lampiran_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD CONSTRAINT `pengajuans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_syarat_id_foreign` FOREIGN KEY (`syarat_id`) REFERENCES `dokumens` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
