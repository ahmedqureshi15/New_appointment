/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.11-MariaDB : Database - aros_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aros_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `aros_db`;

/*Table structure for table `ar_objects` */

DROP TABLE IF EXISTS `ar_objects`;

CREATE TABLE `ar_objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ar_objects` */

insert  into `ar_objects`(`id`,`object`) values (1,'a:3:{s:4:\"name\";s:4:\"car1\";s:5:\"image\";s:31:\"https://i.imgur.com/jPZ6jyO.jpg\";s:5:\"model\";a:3:{s:4:\"file\";s:102:\"https://poly.googleusercontent.com/downloads/c/fp/1592645144411132/0-j0ksmXXtz/0KvdetqNalj/archive.zip\";s:4:\"meta\";a:2:{s:4:\"text\";a:4:{s:5:\"value\";s:12:\"Hello World!\";s:1:\"x\";s:3:\"0.0\";s:1:\"y\";s:3:\"0.0\";s:1:\"z\";s:3:\"0.0\";}s:5:\"scale\";a:3:{s:1:\"x\";s:3:\"1.0\";s:1:\"y\";s:3:\"1.0\";s:1:\"z\";s:3:\"1.0\";}}s:8:\"location\";a:2:{s:3:\"lat\";s:5:\"0.333\";s:3:\"lng\";s:5:\"0.333\";}}}'),(2,'a:3:{s:4:\"name\";s:4:\"car2\";s:5:\"image\";s:31:\"https://i.imgur.com/jPZ6jyO.jpg\";s:5:\"model\";a:3:{s:4:\"file\";s:102:\"https://poly.googleusercontent.com/downloads/c/fp/1592645144411132/0-j0ksmXXtz/0KvdetqNalj/archive.zip\";s:4:\"meta\";a:2:{s:4:\"text\";a:4:{s:5:\"value\";s:12:\"Hello World!\";s:1:\"x\";s:3:\"0.0\";s:1:\"y\";s:3:\"0.0\";s:1:\"z\";s:3:\"0.0\";}s:5:\"scale\";a:3:{s:1:\"x\";s:3:\"1.0\";s:1:\"y\";s:3:\"1.0\";s:1:\"z\";s:3:\"1.0\";}}s:8:\"location\";a:2:{s:3:\"lat\";s:5:\"0.333\";s:3:\"lng\";s:5:\"0.333\";}}}'),(3,'a:3:{s:4:\"name\";s:4:\"car3\";s:5:\"image\";s:31:\"https://i.imgur.com/jPZ6jyO.jpg\";s:5:\"model\";a:3:{s:4:\"file\";s:102:\"https://poly.googleusercontent.com/downloads/c/fp/1592645144411132/0-j0ksmXXtz/0KvdetqNalj/archive.zip\";s:4:\"meta\";a:2:{s:4:\"text\";a:4:{s:5:\"value\";s:12:\"Hello World!\";s:1:\"x\";s:3:\"0.0\";s:1:\"y\";s:3:\"0.0\";s:1:\"z\";s:3:\"0.0\";}s:5:\"scale\";a:3:{s:1:\"x\";s:3:\"1.0\";s:1:\"y\";s:3:\"1.0\";s:1:\"z\";s:3:\"1.0\";}}s:8:\"location\";a:2:{s:3:\"lat\";s:5:\"0.333\";s:3:\"lng\";s:5:\"0.333\";}}}'),(4,'a:3:{s:4:\"name\";s:4:\"car4\";s:5:\"image\";s:31:\"https://i.imgur.com/jPZ6jyO.jpg\";s:5:\"model\";a:3:{s:4:\"file\";s:102:\"https://poly.googleusercontent.com/downloads/c/fp/1592645144411132/0-j0ksmXXtz/0KvdetqNalj/archive.zip\";s:4:\"meta\";a:2:{s:4:\"text\";a:4:{s:5:\"value\";s:12:\"Hello World!\";s:1:\"x\";s:3:\"0.0\";s:1:\"y\";s:3:\"0.0\";s:1:\"z\";s:3:\"0.0\";}s:5:\"scale\";a:3:{s:1:\"x\";s:3:\"1.0\";s:1:\"y\";s:3:\"1.0\";s:1:\"z\";s:3:\"1.0\";}}s:8:\"location\";a:2:{s:3:\"lat\";s:5:\"0.333\";s:3:\"lng\";s:5:\"0.333\";}}}'),(5,'a:3:{s:4:\"name\";s:4:\"car5\";s:5:\"image\";s:31:\"https://i.imgur.com/jPZ6jyO.jpg\";s:5:\"model\";a:3:{s:4:\"file\";s:102:\"https://poly.googleusercontent.com/downloads/c/fp/1592645144411132/0-j0ksmXXtz/0KvdetqNalj/archive.zip\";s:4:\"meta\";a:2:{s:4:\"text\";a:4:{s:5:\"value\";s:12:\"Hello World!\";s:1:\"x\";s:3:\"0.0\";s:1:\"y\";s:3:\"0.0\";s:1:\"z\";s:3:\"0.0\";}s:5:\"scale\";a:3:{s:1:\"x\";s:3:\"1.0\";s:1:\"y\";s:3:\"1.0\";s:1:\"z\";s:3:\"1.0\";}}s:8:\"location\";a:2:{s:3:\"lat\";s:5:\"0.333\";s:3:\"lng\";s:5:\"0.333\";}}}');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `user_ar_objects` */

DROP TABLE IF EXISTS `user_ar_objects`;

CREATE TABLE `user_ar_objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ar_object_id` int(11) DEFAULT NULL,
  `user_ar_object_key` varchar(255) DEFAULT NULL,
  `share_status` enum('not_shared','pending','shared') DEFAULT 'not_shared',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_ar_objects` */

insert  into `user_ar_objects`(`id`,`user_id`,`ar_object_id`,`user_ar_object_key`,`share_status`,`created_at`,`updated_at`) values (1,2,1,'21_1_20200622080016','not_shared','2020-06-23 01:00:16','2020-06-23 01:00:16'),(2,2,2,'21_2_20200622080016','not_shared','2020-06-23 01:00:16','2020-06-23 01:00:16'),(3,2,3,'21_3_20200622080016','not_shared','2020-06-23 01:00:16','2020-06-23 01:00:16'),(4,2,4,'21_4_20200622080016','not_shared','2020-06-23 01:00:16','2020-06-23 01:00:16'),(5,2,5,'21_5_20200622080016','not_shared','2020-06-23 01:00:16','2020-06-23 01:00:16'),(6,3,1,'3_1_20200623120857','not_shared','2020-06-23 17:08:57','2020-06-23 17:08:57'),(7,3,2,'3_2_20200623120857','not_shared','2020-06-23 17:08:57','2020-06-23 17:08:57'),(8,3,3,'3_3_20200623120857','not_shared','2020-06-23 17:08:57','2020-06-23 17:08:57'),(9,3,4,'3_4_20200623120857','not_shared','2020-06-23 17:08:57','2020-06-23 17:08:57'),(10,3,5,'3_5_20200623120857','not_shared','2020-06-23 17:08:57','2020-06-23 17:08:57');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`is_admin`,`created_at`,`updated_at`) values (1,'Admin','admin@aros.pk',NULL,'$2y$10$fVzSdLCsRAbNLoLHxEmA9OXnhF3gRPuV2PmpNRuo/SYsUaGFQL72u',NULL,1,'2020-06-23 16:58:49','2020-06-23 16:58:49'),(2,'Mobile User','mobileapp@aros.pk',NULL,'$2y$10$U34WeY/o77A/hnwgHisTLOy8ut/ziGoj06F5sq4yLaKLiCjRQc7GW',NULL,0,'2020-06-23 16:58:49','2020-06-23 16:58:49'),(3,'Testing User','mobileuser2@aros.pk',NULL,'$2y$10$U34WeY/o77A/hnwgHisTLOy8ut/ziGoj06F5sq4yLaKLiCjRQc7GW',NULL,0,'2020-06-23 12:08:57','2020-06-23 12:08:57');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
