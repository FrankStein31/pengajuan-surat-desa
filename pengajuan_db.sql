/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - pengajuan_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pengajuan_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `pengajuan_db`;

/*Table structure for table `dokumen` */

DROP TABLE IF EXISTS `dokumen`;

CREATE TABLE `dokumen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dokumen_nama_dokumen_unique` (`nama_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dokumen` */

insert  into `dokumen`(`id`,`nama_dokumen`,`created_at`,`updated_at`) values 
(2,'Fotocopy KK','2025-03-20 18:21:47','2025-03-20 18:21:47'),
(3,'Fotocopy Akta Kelahiran','2025-03-20 18:22:01','2025-03-20 18:22:01'),
(4,'Surat Pengantar RT/RW','2025-03-20 18:22:18','2025-03-20 18:22:18'),
(6,'Fotocopy KTP','2025-05-03 18:05:17','2025-05-03 18:05:17');

/*Table structure for table `dokumens` */

DROP TABLE IF EXISTS `dokumens`;

CREATE TABLE `dokumens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengajuan_id` bigint unsigned DEFAULT NULL,
  `nama_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `syarat_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dokumens_pengajuan_id_foreign` (`pengajuan_id`),
  KEY `dokumens_syarat_id_foreign` (`syarat_id`),
  CONSTRAINT `dokumens_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dokumens_syarat_id_foreign` FOREIGN KEY (`syarat_id`) REFERENCES `dokumens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dokumens` */

insert  into `dokumens`(`id`,`nama_dokumen`,`pengajuan_id`,`nama_file`,`syarat_id`,`created_at`,`updated_at`) values 
(2,'Fotocopy KTP',NULL,NULL,NULL,'2025-03-13 21:35:53','2025-03-13 21:36:05'),
(3,'Fotocopy KK',NULL,NULL,NULL,'2025-03-13 21:41:17','2025-03-13 21:41:29'),
(4,'Fotocopy Akta Kelahiran',NULL,NULL,NULL,'2025-03-13 21:43:50','2025-03-13 21:44:00');

/*Table structure for table `jenis_surat_dokumen` */

DROP TABLE IF EXISTS `jenis_surat_dokumen`;

CREATE TABLE `jenis_surat_dokumen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_surat_id` bigint unsigned NOT NULL,
  `dokumen_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jenis_surat_dokumen_jenis_surat_id_foreign` (`jenis_surat_id`),
  KEY `jenis_surat_dokumen_dokumen_id_foreign` (`dokumen_id`),
  CONSTRAINT `jenis_surat_dokumen_dokumen_id_foreign` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumen` (`id`) ON DELETE CASCADE,
  CONSTRAINT `jenis_surat_dokumen_jenis_surat_id_foreign` FOREIGN KEY (`jenis_surat_id`) REFERENCES `surat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_surat_dokumen` */

insert  into `jenis_surat_dokumen`(`id`,`jenis_surat_id`,`dokumen_id`) values 
(33,177,2),
(34,177,4),
(36,178,2),
(37,178,4),
(39,179,2),
(40,180,2),
(41,180,3),
(42,180,4),
(44,181,2),
(45,181,4),
(47,182,2),
(48,182,4),
(50,183,2),
(51,183,4);

/*Table structure for table `lampiran` */

DROP TABLE IF EXISTS `lampiran`;

CREATE TABLE `lampiran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengajuan_id` bigint unsigned NOT NULL,
  `nama_lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lampiran_pengajuan_id_foreign` (`pengajuan_id`),
  CONSTRAINT `lampiran_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lampiran` */

insert  into `lampiran`(`id`,`pengajuan_id`,`nama_lampiran`,`file`,`created_at`,`updated_at`) values 
(1,11,'25+artikel_Dony+20182-20190.pdf','lampiran/OdWb6n9olzXzOduYCSVJQ9pCLZPHowcUbuD8Vt2d.pdf','2025-04-12 08:06:09','2025-04-12 08:06:09'),
(2,11,'5+Artikel-Krisno+To+Suli.pdf','lampiran/ROtI8fJPVLDBSsZbGD1wlk9tTtfAgv3YkKkwcrM1.pdf','2025-04-12 08:06:09','2025-04-12 08:06:09'),
(3,11,'yayaaziz,+12.+Siti+Marfu’ah,+Ana+Kumalasari,+Ida+swasanti.pdf','lampiran/HvW3vjPOPQj0RLSCVb2hBStHtzX89qqhwxCHSdNp.pdf','2025-04-12 08:06:09','2025-04-12 08:06:09'),
(4,12,'25+artikel_Dony+20182-20190.pdf','lampiran/Jg6xCUeoIlT4B0sYGk3F6v0h1UyaPbgxbFW6B3Wf.pdf','2025-04-16 17:41:50','2025-04-16 17:41:50'),
(5,12,'document (4).pdf','lampiran/x61zFB1U1uaWzYIb9XgcsnjpgUZhhutYIyi9ypHd.pdf','2025-04-16 17:41:50','2025-04-16 17:41:50'),
(6,13,'Paper+3+(25-44)+14+02+2023.pdf','lampiran/MDCbBjXbRA99SZq7dKZEkgpzIbIJr2881Nk0wJ3Y.pdf','2025-04-16 21:21:20','2025-04-16 21:21:20'),
(7,13,'1336-1439-2-PB.pdf','lampiran/qKXXHgQZb2J6NUehjyUr1T3gXBuatCoWh8l7y4a0.pdf','2025-04-16 21:21:20','2025-04-16 21:21:20'),
(8,14,'yayaaziz,+12.+Siti+Marfu’ah,+Ana+Kumalasari,+Ida+swasanti.pdf','lampiran/R8DodZXSiexhNkgiQS6ZVZPNSOmpwN0MEqQd5Faa.pdf','2025-04-17 03:24:09','2025-04-17 03:24:09'),
(10,24,'24880-91793-2-PB.pdf','lampiran/pengajuan_24public/zldBAJRXsGD3Hbdlc9SqBALQadywkP3CVdUuZpf7.pdf','2025-05-02 16:09:58','2025-05-02 16:09:58'),
(11,24,'Jurnal+Silviany+Nante.pdf','lampiran/pengajuan_24public/MXpZYAzZ0y9tX0GWsNB0q8AY4kD5cqa1uVKmxXhw.pdf','2025-05-02 16:09:58','2025-05-02 16:09:58');

/*Table structure for table `masyarakat_profiles` */

DROP TABLE IF EXISTS `masyarakat_profiles`;

CREATE TABLE `masyarakat_profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `sekolah` varchar(100) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `status_perkawinan` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `umur` int DEFAULT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `masyarakat_profiles` */

insert  into `masyarakat_profiles`(`id`,`user_id`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`nik`,`sekolah`,`semester`,`status_perkawinan`,`pendidikan`,`pekerjaan`,`kewarganegaraan`,`agama`,`nim`,`umur`,`nis`,`alamat`,`no_hp`,`created_at`,`updated_at`) values 
(1,10,'P','Pasuruan','2002-03-16','123456789','SMAN 1 Kandat','4','Lajang','SLTA/Sederajat','Pelajar/Mahasiswa','Indonesia','Islam','123456789',23,'234568','Kediri','6289612684096','2025-05-02 14:11:21','2025-05-23 20:52:10'),
(2,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-23 19:15:44','2025-05-23 19:15:44');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2025_02_27_162129_buat_tabel_surat',2),
(4,'2025_03_06_155335_add_role_to_users_table',3),
(5,'2025_03_06_214422_create_pengajuans_table',4),
(6,'2025_03_06_214030_create_dokumens_table',5),
(7,'2025_03_13_183534_add_syarat_id_to_dokumens_table',6),
(9,'2025_03_13_195640_add_nama_dokumen_to_dokumens_table',7),
(10,'2025_03_13_200918_modify_syarat_id_in_dokumens_tables',8),
(11,'2025_03_13_212308_update_dokumens_table',9),
(12,'2025_03_13_213152_update_dokumens_table',10),
(13,'2025_03_13_223604_update_syarat_surat_nullable',11),
(14,'2025_03_14_004015_add_syarat_id_to_surat_table',12),
(15,'2025_03_20_175517_create_dokumen_table',13),
(16,'2025_03_21_023246_update_jenis_surat_id_in_pengajuans',14),
(17,'2025_04_12_062115_create_lampiran_table',15);

/*Table structure for table `orangtua_profiles` */

DROP TABLE IF EXISTS `orangtua_profiles`;

CREATE TABLE `orangtua_profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `masyarakat_user_id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `status_perkawinan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nomor_ktp` varchar(30) DEFAULT NULL,
  `alamat` text,
  `pendidikan` varchar(100) DEFAULT NULL,
  `penghasilan` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `orangtua_profiles` */

insert  into `orangtua_profiles`(`id`,`masyarakat_user_id`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`kewarganegaraan`,`agama`,`status_perkawinan`,`pekerjaan`,`nomor_ktp`,`alamat`,`pendidikan`,`penghasilan`,`created_at`,`updated_at`) values 
(1,10,'asdfgh','P','sdfgh','1998-06-09','Indonesia','Kristen Protestan','Menikah','Pensiunan','123456789','Kras','Diploma IV',8000000.00,'2025-05-02 14:16:02','2025-05-18 10:25:30'),
(2,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-23 19:15:44','2025-05-23 19:15:44');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `pengajuans` */

DROP TABLE IF EXISTS `pengajuans`;

CREATE TABLE `pengajuans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `jenis_surat_id` bigint unsigned DEFAULT NULL,
  `keperluan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','diproses','selesai','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengajuans_user_id_foreign` (`user_id`),
  CONSTRAINT `pengajuans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pengajuans` */

insert  into `pengajuans`(`id`,`user_id`,`jenis_surat_id`,`keperluan`,`keterangan`,`status`,`created_at`,`updated_at`) values 
(11,13,177,NULL,NULL,'ditolak','2025-04-12 08:06:08','2025-04-16 21:15:44'),
(12,13,182,NULL,NULL,'diproses','2025-04-16 17:41:49','2025-04-16 20:10:00'),
(13,13,177,NULL,NULL,'pending','2025-04-16 21:21:19','2025-04-16 21:21:19'),
(14,13,182,NULL,NULL,'selesai','2025-04-17 03:24:09','2025-05-22 16:40:27'),
(16,14,177,NULL,NULL,'selesai','2025-04-17 07:20:11','2025-05-21 07:25:58'),
(17,14,182,NULL,NULL,'pending','2025-04-17 07:24:11','2025-04-17 07:24:11'),
(18,10,177,NULL,NULL,'selesai','2025-05-02 15:29:34','2025-05-21 07:25:11'),
(19,10,179,NULL,NULL,'ditolak','2025-05-02 15:49:39','2025-05-21 18:49:16'),
(20,10,179,NULL,NULL,'diproses','2025-05-02 15:52:58','2025-05-21 18:50:41'),
(21,10,179,NULL,NULL,'selesai','2025-05-02 15:55:53','2025-05-22 16:46:28'),
(22,10,179,NULL,NULL,'pending','2025-05-02 15:56:42','2025-05-02 15:56:42'),
(23,10,179,NULL,NULL,'selesai','2025-05-02 15:59:26','2025-05-21 18:18:17'),
(24,10,179,NULL,NULL,'selesai','2025-05-02 16:09:57','2025-05-02 16:34:34');

/*Table structure for table `surat` */

DROP TABLE IF EXISTS `surat`;

CREATE TABLE `surat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_id` bigint unsigned DEFAULT NULL,
  `kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_syarat_id_foreign` (`syarat_id`),
  CONSTRAINT `surat_syarat_id_foreign` FOREIGN KEY (`syarat_id`) REFERENCES `dokumens` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `surat` */

insert  into `surat`(`id`,`jenis_surat`,`deskripsi_surat`,`syarat_id`,`kategori`,`created_at`,`updated_at`) values 
(177,'SKTM Sekolah','Surat yang diberikan kepada keluarga kurang mampu untuk mendapat keringanan biaya sekolah',NULL,'Kepala Desa','2025-03-20 19:10:36','2025-03-20 19:10:36'),
(178,'SKTM Kuliah','Surat yang diberikan kepada keluarga kurang mampu untuk mendapat keringanan biaya kuliah',NULL,'Kepala Desa','2025-03-20 19:11:08','2025-03-20 19:11:08'),
(179,'Surat Kelahiran','surat resmi yang dikeluarkan oleh pihak berwenang, seperti Kepala Desa, untuk memberikan informasi tentang kelahiran seseorang.',NULL,'Sekretaris Desa','2025-03-20 19:11:51','2025-03-20 19:11:51'),
(180,'Surat Pengajuan Permohonan KTP','Surat pengantar pembuatan KTP Elektronik',NULL,'Sekretaris Desa','2025-03-20 19:12:38','2025-03-20 19:12:38'),
(181,'Surat Perubahan KK','Dokumen tertulis untuk memberitahukan kepada pihak berwenang (Dinas Kependudukan dan Pencatatan Sipil) tentang adanya perubahan data dalam Kartu Keluarga',NULL,'Sekretaris Desa','2025-03-20 19:14:32','2025-03-20 19:14:32'),
(182,'Surat Pindah Domisili','Surat yang dibuat oleh penduduk yang akan pindah ke tempat tinggal baru.',NULL,'Sekretaris Desa','2025-03-20 19:15:17','2025-03-20 19:15:17'),
(183,'Surat keterangan kehilangan','-',NULL,'Sekretaris Desa','2025-03-21 04:32:21','2025-03-21 04:32:21');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','masyarakat','kepala_desa','sekretaris_desa') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'masyarakat',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`role`) values 
(8,'Bella','bella@gmail.com',NULL,'$2y$10$klinHpQzFEr3agmZ2EnktOcKoOzayiZXP3V3XH48OU5Et/dvLrjUO',NULL,'2025-03-06 17:51:06','2025-03-06 17:51:06','masyarakat'),
(9,'Mimin','admin@gmail.com',NULL,'$2y$10$2EG8.44q.dBPA/z4bQj6I.FWZhlibD2.wo3CbCkPGsOamYF71vipq',NULL,'2025-03-06 18:59:23','2025-05-04 09:35:09','admin'),
(10,'Nimas','nimas@gmail.com',NULL,'$2y$10$QsmAcUZ8SslyqqhGRSpkcu9n3sPkmpgGkTGbny0MghhK.YqTB.bZK',NULL,'2025-03-06 19:16:10','2025-03-06 19:16:10','masyarakat'),
(11,'Sekretaris Desa','sekdes@gmail.com',NULL,'$2y$10$Ak/sgMUIQr2.h85X5nYWF.C6MiA0yxMHC8MAyoHrNgUi38C2rTUXG',NULL,'2025-03-06 19:16:50','2025-03-06 19:16:50','sekretaris_desa'),
(12,'Kepala Desa','kades@gmail.com',NULL,'$2y$10$e4mD10iivp9YrM.WW.IHLeeIfRy5g2zR/r5R.zsDviEWxZbqgeDk6',NULL,'2025-03-06 19:17:27','2025-03-06 19:17:27','kepala_desa'),
(13,'Citra O','citra@gmail.com',NULL,'$2y$10$phg5Wnxy2a7gSPD/apyPDOr.WU/m5oER0zxc/dpt1hA8NhBbGpcV.',NULL,'2025-03-07 03:23:39','2025-03-07 03:24:19','masyarakat'),
(14,'izza','izza@gmai.com',NULL,'$2y$10$SWn4ir3ZHDX1cVn83KVUUebfM6Fnr43WDbT/e8V86uvpLXygdnSDK',NULL,'2025-04-17 07:17:27','2025-04-17 07:17:27','masyarakat'),
(15,'Halo','koko0@gmail.com',NULL,'$2y$10$sKbbkh/TgdWA2gBg9Kx5levauC/nMkQmdJ./dpPVL/3AEO78cNy36',NULL,'2025-05-04 09:52:13','2025-05-04 10:40:18','masyarakat'),
(16,'qwuyuio','tono@gmail.com',NULL,'$2y$10$LdwaqaJqfCnNJpEYz2rpYujC2Y/8HlDPSIIiSrTx9NEmcINd2UDci',NULL,'2025-05-14 11:31:07','2025-05-14 11:31:07','masyarakat'),
(17,'ppppppppppppppppppppppp','pppp@gmail.com',NULL,'$2y$10$PupvhYzQFUa6T1nAz9TGqeYNNRCNsKGHgwc5/e.b4wdsA7SG8xwH.',NULL,'2025-05-14 11:59:53','2025-05-14 11:59:53','masyarakat'),
(18,'aaaaaaaaaaa','aaaa@gmail.com',NULL,'$2y$10$52lyyEZAA9WHghGHd6CmH.H1jgsw5jNCjuvr2EfiWnp.O1uwk/Qnm',NULL,'2025-05-15 15:18:18','2025-05-15 15:18:18','masyarakat');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
