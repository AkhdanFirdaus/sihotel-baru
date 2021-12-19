/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - sihotel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sihotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sihotel`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `hotels` */

DROP TABLE IF EXISTS `hotels`;

CREATE TABLE `hotels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotels_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hotels` */

insert  into `hotels`(`id`,`location_id`,`name`,`slug`,`hotel_image`,`address`,`email`,`credit_card`,`credit_number`,`tagline`,`created_at`,`updated_at`) values 
(1,3,'Samsul Sitompul','samsul_sitompul','https://picsum.photos/200','Ki. Sutami No. 635, Tanjungbalai 91193, Malut','cornelia.ramadan@putra.asia','MasterCard','4485916533656800','Sint ut et blanditiis et necessitatibus odit.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(2,1,'Banara Prakasa','banara_prakasa','https://picsum.photos/200','Ds. Ters. Kiaracondong No. 663, Batu 58471, Sumbar','mangunsong.maya@yahoo.co.id','Visa','2379640157776966','Error assumenda et totam velit consequatur aut.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(3,3,'Titi Siti Novitasari','titi_siti_novitasari','https://picsum.photos/200','Jr. Gambang No. 352, Surakarta 10774, Sulbar','tami.kurniawan@yahoo.com','MasterCard','4532241497161','Voluptatem deleniti ratione nihil quidem.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(4,4,'Almira Andriani','almira_andriani','https://picsum.photos/200','Ds. Ters. Jakarta No. 793, Bontang 27766, NTB','ahandayani@yahoo.com','Visa','5550016221394694','Facilis eum est sit veniam qui architecto sit.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(5,4,'Atma Gunarto','atma_gunarto','https://picsum.photos/200','Kpg. Kalimalang No. 327, Tegal 40505, Jatim','jwacana@yahoo.co.id','MasterCard','5106558009030387','Laudantium libero quia excepturi error commodi necessitatibus pariatur.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(6,4,'Widya Yolanda S.Sos','widya_yolanda_s._sos','https://picsum.photos/200','Gg. Dago No. 11, Bandar Lampung 78155, Jambi','siregar.lamar@halimah.web.id','Visa','2378236679185322','Velit temporibus cumque sunt ab quae excepturi non.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(7,5,'Zulaikha Rahmawati M.Ak','zulaikha_rahmawati_m._ak','https://picsum.photos/200','Gg. Yos No. 546, Langsa 33708, Jatim','zpalastri@sitorus.co','Visa','4556237608782031','Culpa dolor voluptas esse recusandae nobis quis accusantium.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(8,4,'Jail Empluk Siregar S.IP','jail_empluk_siregar_s._i_p','https://picsum.photos/200','Jr. Peta No. 24, Bitung 84751, Babel','saiful.maryati@lestari.tv','Visa Retired','4485429660880219','Tempora vel quae quas fugiat et modi.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(9,2,'Yosef Zulkarnain','yosef_zulkarnain','https://picsum.photos/200','Ds. Dewi Sartika No. 758, Denpasar 50423, Jambi','mulyani.victoria@yahoo.co.id','Visa','3528424277091244','Inventore qui voluptate animi enim eos.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(10,4,'Cornelia Yolanda','cornelia_yolanda','https://picsum.photos/200','Psr. Supomo No. 919, Administrasi Jakarta Barat 35064, Sumsel','rachel88@yahoo.com','Visa','4532549417416794','Exercitationem corrupti dignissimos facere aliquid quasi dolorem.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(11,1,'Julia Rahmawati','julia_rahmawati','https://picsum.photos/200','Dk. Pelajar Pejuang 45 No. 932, Probolinggo 87407, Sulbar','jwahyuni@gmail.co.id','MasterCard','5369425084040388','Soluta et adipisci nemo enim.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(12,6,'Diah Agustina','diah_agustina','https://picsum.photos/200','Jln. Sudirman No. 766, Sawahlunto 34902, Sulteng','gunarto.tari@fujiati.or.id','MasterCard','4716382199559757','Enim culpa fugiat inventore aperiam eius totam.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(13,7,'Tedi Hardana Lazuardi S.Kom','tedi_hardana_lazuardi_s._kom','https://picsum.photos/200','Gg. Bakau Griya Utama No. 908, Kediri 53689, Kaltim','utama.ibrani@haryanti.in','MasterCard','342971170207665','Deserunt repellendus ipsum quasi culpa quaerat aspernatur.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(14,4,'Ajiono Iswahyudi S.E.I','ajiono_iswahyudi_s._e._i','https://picsum.photos/200','Kpg. Baranang Siang No. 465, Medan 72926, Bali','ira.sinaga@wibisono.id','Visa Retired','4539259327089151','Officia blanditiis facilis provident tempora et officia.','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(15,5,'Yuni Pertiwi S.Farm','yuni_pertiwi_s._farm','https://picsum.photos/200','Jln. Bayam No. 393, Bekasi 98545, DIY','gina77@yahoo.com','JCB','2221943907979413','Consectetur nihil praesentium sit ut quia sed.','2021-12-19 04:28:52','2021-12-19 04:28:52');

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `locations` */

insert  into `locations`(`id`,`location_name`,`created_at`,`updated_at`) values 
(1,'Bontang','2021-12-19 04:28:51','2021-12-19 04:28:51'),
(2,'Padang','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(3,'Balikpapan','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(4,'Balikpapan','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(5,'Bengkulu','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(6,'Serang','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(7,'Batam','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(8,'Medan','2021-12-19 04:28:52','2021-12-19 04:28:52');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2021_12_18_165821_create_roles_table',1),
(6,'2021_12_18_170045_create_rooms_table',1),
(7,'2021_12_18_170303_create_reservations_table',1),
(8,'2021_12_18_170322_create_payments_table',1),
(9,'2021_12_18_170338_create_reviews_table',1),
(10,'2021_12_18_170405_create_hotels_table',1),
(11,'2021_12_18_170418_create_locations_table',1),
(12,'2021_12_19_000726_add_role_id_to_user_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_verification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payments_pin_unique` (`pin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payments` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `reservations` */

DROP TABLE IF EXISTS `reservations`;

CREATE TABLE `reservations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `room_id` bigint(20) unsigned NOT NULL,
  `payment_id` bigint(20) unsigned NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `number_people` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reservations` */

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role_name`,`created_at`,`updated_at`) values 
(1,'Member','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(2,'Admin','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(3,'Resepsionis','2021-12-19 04:28:52','2021-12-19 04:28:52'),
(4,'Manajer','2021-12-19 04:28:52','2021-12-19 04:28:52');

/*Table structure for table `rooms` */

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` bigint(20) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rooms` */

insert  into `rooms`(`id`,`hotel_id`,`code`,`price`,`status`,`created_at`,`updated_at`) values 
(1,13,'ut',564849.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(2,14,'placeat',505320.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(3,4,'cupiditate',328100.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(4,6,'quisquam',346609.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(5,13,'aut',358175.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(6,13,'incidunt',164757.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(7,8,'molestiae',116541.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(8,11,'doloremque',297201.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(9,11,'et',574919.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(10,3,'et',2519.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(11,11,'amet',743517.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(12,13,'illum',240117.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(13,13,'sed',919196.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(14,10,'molestias',542875.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(15,8,'dignissimos',387627.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(16,10,'qui',766453.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(17,14,'eum',398604.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(18,7,'qui',523017.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(19,11,'molestias',172106.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(20,14,'adipisci',667.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(21,10,'debitis',71117.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(22,12,'dignissimos',376320.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(23,1,'inventore',166204.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(24,12,'consequatur',864261.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(25,5,'dolorem',639285.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(26,3,'dolorem',643251.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(27,9,'facere',52269.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(28,2,'eos',174257.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(29,7,'eum',931307.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(30,5,'voluptas',161284.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(31,15,'ut',525526.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(32,2,'quo',339694.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(33,4,'et',943176.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(34,5,'dolores',567857.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(35,2,'quod',769821.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(36,13,'ut',267144.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(37,8,'similique',6478.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(38,6,'aut',896095.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(39,14,'similique',861447.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(40,3,'est',634554.00,0,'2021-12-19 04:28:52','2021-12-19 04:28:52');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`name`,`email`,`email_verified_at`,`password`,`phone_number`,`remember_token`,`created_at`,`updated_at`) values 
(1,0,'Akhdan Musyaffa Firdaus','akhdan@email.com',NULL,'$2y$10$sXb0NkeZqlfaSmwi4Gf/eumtaULJnwcVTZh.yaVzNvF6g8qTN/Uay','089624289097',NULL,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(2,1,'Nurul Aulia Dewi','nurul@email.com',NULL,'$2y$10$p.BaGI2rnBOBzD480/xxquUF1yCOGXjHFWTyiO2CAR1QN9mWvacPa','08219831273',NULL,'2021-12-19 04:28:52','2021-12-19 04:28:52'),
(3,2,'Zulfa Dwi Audina','audi@email.com',NULL,'$2y$10$lYVCHzi/dibRr.uKr7.M4eOh2tD0toTC08l3Le.qQ1EJRhOaZjcRe','08237192',NULL,'2021-12-19 04:28:52','2021-12-19 04:28:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
