-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table cat.exams
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `start_at` datetime NOT NULL,
  `duration` int NOT NULL,
  `nilai_benar` int NOT NULL,
  `nilai_salah` int NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tampil` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cat.exams: ~3 rows (approximately)
INSERT INTO `exams` (`id`, `title`, `description`, `start_at`, `duration`, `nilai_benar`, `nilai_salah`, `token`, `tampil`, `created_at`, `updated_at`) VALUES
	(1, 'TES C2imbG7z', 'TES', '2023-06-11 12:00:00', 1440, 2, 0, NULL, 0, '2023-06-11 07:43:34', '2023-06-11 07:51:14'),
	(2, 'TES C9fq3OzK', 'TEWS', '2023-06-11 12:00:00', 1440, 2, 0, 'C9fq3OzK', 0, '2023-06-11 07:51:33', '2023-06-11 07:51:43'),
	(3, 'TES cC10ImeT', 'TES', '2023-06-11 12:00:00', 1440, 2, 0, 'cC10ImeT', 0, '2023-06-11 11:23:15', '2023-06-11 11:23:35');

-- Dumping structure for table cat.exam_answers
CREATE TABLE IF NOT EXISTS `exam_answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `exam_id` int NOT NULL,
  `id_exam_question` int NOT NULL,
  `answer_question_option_id` int DEFAULT NULL,
  `answer_right_option_id` int DEFAULT NULL,
  `answer_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `ragu` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cat.exam_answers: ~3 rows (approximately)
INSERT INTO `exam_answers` (`id`, `id_user`, `exam_id`, `id_exam_question`, `answer_question_option_id`, `answer_right_option_id`, `answer_desc`, `created_at`, `updated_at`, `created_by`, `updated_by`, `ragu`) VALUES
	(1, 1, 1, 1, 2, 1, NULL, '2023-06-11 07:45:11', '2023-06-11 07:45:11', 1, NULL, 0),
	(2, 1, 1, 2, 3, NULL, NULL, '2023-06-11 07:45:23', '2023-06-11 07:45:23', 1, NULL, 0),
	(3, 1, 2, 4, 13, 12, NULL, '2023-06-11 07:52:33', '2023-06-11 07:52:33', 1, NULL, 0);

-- Dumping structure for table cat.exam_attemps
CREATE TABLE IF NOT EXISTS `exam_attemps` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `exam_id` int NOT NULL,
  `total_attemp` int NOT NULL,
  `finish` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cat.exam_attemps: ~2 rows (approximately)
INSERT INTO `exam_attemps` (`id`, `id_user`, `exam_id`, `total_attemp`, `finish`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, '2023-06-11 07:44:03', '2023-06-11 07:45:26'),
	(2, 1, 2, 1, 0, '2023-06-11 07:51:50', '2023-06-11 07:52:25');

-- Dumping structure for table cat.exam_questions
CREATE TABLE IF NOT EXISTS `exam_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exam_id` int NOT NULL,
  `question` text NOT NULL,
  `question_type_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cat.exam_questions: ~6 rows (approximately)
INSERT INTO `exam_questions` (`id`, `exam_id`, `question`, `question_type_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '<p><font color="#7b8898" face="Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif"><span style="font-size: 26px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font><br></p>', 4, '2023-06-11 07:44:47', '2023-06-11 07:44:47'),
	(2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 1, '2023-06-11 07:45:03', '2023-06-11 07:45:03'),
	(3, 1, '<p><img src="http://4.bp.blogspot.com/-qS_AZe4QKDY/VOwdnGwoy2I/AAAAAAAA1zI/WeUeH8Qslqw/s1600/Bali-Indonesia-Hindu%2Btemple.jpg" style="width: 1204.4px;"><br></p>', 4, '2023-06-11 07:50:00', '2023-06-11 07:50:00'),
	(4, 2, '<p><img src="http://4.bp.blogspot.com/-qS_AZe4QKDY/VOwdnGwoy2I/AAAAAAAA1zI/WeUeH8Qslqw/s1600/Bali-Indonesia-Hindu%2Btemple.jpg" style="width: 1187.6px;"><br></p>', 4, '2023-06-11 07:52:21', '2023-06-11 07:52:21'),
	(5, 3, '<p>1 + 1 =</p>', 1, '2023-06-11 11:23:52', '2023-06-11 11:23:52'),
	(6, 2, '<p><img src="http://4.bp.blogspot.com/-qS_AZe4QKDY/VOwdnGwoy2I/AAAAAAAA1zI/WeUeH8Qslqw/s1600/Bali-Indonesia-Hindu%2Btemple.jpg" style="width: 364.667px; height: 273.5px;"><br></p>', 1, '2023-06-11 11:30:27', '2023-06-11 11:30:27');

-- Dumping structure for table cat.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cat.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table cat.hasil_akhir_ujian
CREATE TABLE IF NOT EXISTS `hasil_akhir_ujian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `exam_id` int NOT NULL,
  `nilai_akhir` float NOT NULL,
  `nilai_max` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cat.hasil_akhir_ujian: ~0 rows (approximately)

-- Dumping structure for table cat.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cat.migrations: ~3 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- Dumping structure for table cat.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cat.password_resets: ~0 rows (approximately)

-- Dumping structure for table cat.question_options
CREATE TABLE IF NOT EXISTS `question_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exam_question_id` int NOT NULL,
  `option_text` text NOT NULL,
  `value` tinyint(1) NOT NULL,
  `type_matching` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `var1` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cat.question_options: ~17 rows (approximately)
INSERT INTO `question_options` (`id`, `exam_question_id`, `option_text`, `value`, `type_matching`, `var1`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'right', NULL, '2023-06-11 07:44:47', '2023-06-11 07:44:47'),
	(2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 0, 'left', 1, '2023-06-11 07:44:47', '2023-06-11 07:44:47'),
	(3, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 1, NULL, NULL, '2023-06-11 07:45:03', '2023-06-11 07:45:03'),
	(4, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 0, NULL, NULL, '2023-06-11 07:45:03', '2023-06-11 07:45:03'),
	(5, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 0, NULL, NULL, '2023-06-11 07:45:03', '2023-06-11 07:45:03'),
	(6, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'right', NULL, '2023-06-11 07:50:00', '2023-06-11 07:50:00'),
	(7, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'right', NULL, '2023-06-11 07:50:00', '2023-06-11 07:50:00'),
	(8, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'right', NULL, '2023-06-11 07:50:00', '2023-06-11 07:50:00'),
	(9, 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 0, 'left', 6, '2023-06-11 07:50:00', '2023-06-11 07:50:00'),
	(10, 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 0, 'left', 7, '2023-06-11 07:50:00', '2023-06-11 07:50:00'),
	(11, 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 0, 'left', 8, '2023-06-11 07:50:00', '2023-06-11 07:50:00'),
	(12, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'right', NULL, '2023-06-11 07:52:21', '2023-06-11 07:52:21'),
	(13, 4, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 0, 'left', 12, '2023-06-11 07:52:21', '2023-06-11 07:52:21'),
	(14, 5, '<p>2</p>', 1, NULL, NULL, '2023-06-11 11:23:52', '2023-06-11 11:23:52'),
	(15, 5, '<p>lorem</p>', 0, NULL, NULL, '2023-06-11 11:23:52', '2023-06-11 11:23:52'),
	(16, 6, '<p>asd</p>', 1, NULL, NULL, '2023-06-11 11:30:27', '2023-06-11 11:30:27'),
	(17, 6, '<p>eqw</p>', 0, NULL, NULL, '2023-06-11 11:30:27', '2023-06-11 11:30:27');

-- Dumping structure for table cat.question_type
CREATE TABLE IF NOT EXISTS `question_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cat.question_type: ~6 rows (approximately)
INSERT INTO `question_type` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(1, 'multiple_choice', '2023-04-09 06:44:47', '2023-04-09 06:44:47'),
	(2, 'complex_multiple_choice', '2023-04-09 06:44:47', '2023-04-09 06:44:47'),
	(3, 'true_or_false', '2023-04-09 06:44:47', '2023-04-09 06:44:47'),
	(4, 'matching', '2023-04-09 06:44:47', '2023-04-09 06:44:47'),
	(5, 'long_desc', '2023-05-25 14:30:51', '2023-05-25 14:30:51'),
	(6, 'short_desc', '2023-05-25 14:31:03', '2023-05-25 14:31:03');

-- Dumping structure for table cat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cat.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'reynaldi ramadhani eka purnomo', 'reynaldi19', 'reynaldi@gmail.com', 'peserta', NULL, '$2y$10$Ky6a6kiVNoIuTOAdQJinXeNb6cMxikWDjt8I..FWeg6Jfg4P0hr9O', NULL, '2023-04-09 05:19:35', '2023-04-09 05:19:35'),
	(2, 'Admin', 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$pgVkrnR78.jXnKIWxWGrwu05WiiDPIItiwQzx1s0N7MisScu0gnYS', NULL, '2023-04-21 05:52:18', '2023-04-21 05:52:18'),
	(3, 'zidane', 'zidanesanjaya', 'zidane@gmail.com', 'peserta', NULL, '$2y$10$m1E1d2/Dnu.xN94pz24Lh.Oxub8zTayif7vRs4jAJHkGZHE0HiBy2', NULL, '2023-04-23 07:57:57', '2023-04-23 07:57:57');

-- Dumping structure for view cat.vw_answer_question
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_answer_question` (
	`id_user` BIGINT(20) UNSIGNED NULL,
	`name` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`exam_id` INT(10) NULL,
	`id_question` INT(10) NULL,
	`question` TEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`total_option` BIGINT(19) NULL,
	`question_type` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`answer_question_option_id` INT(10) NULL,
	`answer_right_option_id` INT(10) NULL,
	`option_text` TEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`point` VARCHAR(5) NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Dumping structure for view cat.vw_list_peserta_ujian
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_list_peserta_ujian` (
	`id_attemps` INT(10) NOT NULL,
	`id` INT(10) NULL,
	`title` VARCHAR(100) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`description` TEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`start_at` DATETIME NULL,
	`duration` INT(10) NULL,
	`token` TEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`id_user` BIGINT(20) UNSIGNED NULL,
	`name` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`created_at` TIMESTAMP NULL,
	`updated_at` TIMESTAMP NULL,
	`total_attemp` INT(10) NOT NULL,
	`finish` TINYINT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view cat.vw_list_soal_existing
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_list_soal_existing` (
	`id_user` BIGINT(20) UNSIGNED NOT NULL,
	`value_ragu` INT(10) NULL,
	`id_exam_question` INT(10) NOT NULL,
	`status` VARCHAR(8) NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Dumping structure for view cat.vw_nilai_akhir_peserta
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_nilai_akhir_peserta` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`name` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_user` BIGINT(20) UNSIGNED NULL,
	`exam_id` INT(10) NULL,
	`title` VARCHAR(100) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`nilai` DECIMAL(65,1) NULL,
	`total_nilai` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view cat.vw_nilai_peserta
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_nilai_peserta` (
	`id_user` BIGINT(20) UNSIGNED NULL,
	`exam_id` INT(10) NULL,
	`id_question` INT(10) NULL,
	`nilai` DECIMAL(44,1) NULL
) ENGINE=MyISAM;

-- Dumping structure for view cat.vw_question_exam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_question_exam` (
	`id` INT(10) NOT NULL,
	`title` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`description` TEXT NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`start_at` DATETIME NOT NULL,
	`duration` INT(10) NOT NULL,
	`token` TEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	`question_id` INT(10) NOT NULL,
	`question` TEXT NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`question_type` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Dumping structure for view cat.vw_answer_question
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_answer_question`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_answer_question` AS select `b`.`id` AS `id_user`,`b`.`name` AS `name`,`c`.`exam_id` AS `exam_id`,`c`.`id` AS `id_question`,`c`.`question` AS `question`,(select count(0) AS `total` from `question_options` where (`question_options`.`exam_question_id` = `c`.`id`)) AS `total_option`,`d`.`title` AS `question_type`,`a`.`answer_question_option_id` AS `answer_question_option_id`,`a`.`answer_right_option_id` AS `answer_right_option_id`,`e`.`option_text` AS `option_text`,(case when (`e`.`value` = 1) then 'BENAR' when (`e`.`value` = 0) then (case when (`e`.`var1` is not null) then (case when (`e`.`var1` = `a`.`answer_right_option_id`) then 'BENAR' when (`e`.`var1` <> `a`.`answer_right_option_id`) then 'SALAH' end) when (`e`.`var1` is null) then 'SALAH' end) end) AS `point` from ((((`exam_answers` `a` left join `users` `b` on((`a`.`id_user` = `b`.`id`))) left join `exam_questions` `c` on((`a`.`id_exam_question` = `c`.`id`))) left join `question_type` `d` on((`c`.`question_type_id` = `d`.`id`))) left join `question_options` `e` on((`a`.`answer_question_option_id` = `e`.`id`)));

-- Dumping structure for view cat.vw_list_peserta_ujian
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_list_peserta_ujian`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_list_peserta_ujian` AS select `a`.`id` AS `id_attemps`,`c`.`id` AS `id`,`c`.`title` AS `title`,`c`.`description` AS `description`,`c`.`start_at` AS `start_at`,`c`.`duration` AS `duration`,`c`.`token` AS `token`,`b`.`id` AS `id_user`,`b`.`name` AS `name`,`c`.`created_at` AS `created_at`,`c`.`updated_at` AS `updated_at`,`a`.`total_attemp` AS `total_attemp`,`a`.`finish` AS `finish` from ((`exam_attemps` `a` left join `users` `b` on((`a`.`id_user` = `b`.`id`))) left join `exams` `c` on((`a`.`exam_id` = `c`.`id`)));

-- Dumping structure for view cat.vw_list_soal_existing
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_list_soal_existing`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_list_soal_existing` AS select `a`.`id_user` AS `id_user`,max(`a`.`ragu`) AS `value_ragu`,`a`.`id_exam_question` AS `id_exam_question`,(case when (((`a`.`answer_question_option_id` is not null) or (`a`.`answer_desc` is not null)) and (`a`.`ragu` = 1)) then 'ragu' when (((`a`.`answer_question_option_id` is not null) or (`a`.`answer_desc` is not null)) and (`a`.`ragu` = 0)) then 'terjawab' end) AS `status` from ((`exam_answers` `a` left join (select `question_options`.`exam_question_id` AS `exam_question_id`,count(`question_options`.`exam_question_id`) AS `total_option` from `question_options` group by `question_options`.`exam_question_id`) `b` on((`a`.`id_exam_question` = `b`.`exam_question_id`))) left join (select `a`.`id` AS `id`,`a`.`exam_id` AS `exam_id`,`a`.`question` AS `question`,`a`.`question_type_id` AS `question_type_id`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`title` AS `title` from (`exam_questions` `a` left join `question_type` `b` on((`a`.`question_type_id` = `b`.`id`)))) `c` on((`a`.`id_exam_question` = `c`.`id`))) group by `a`.`id_user`,`a`.`id_exam_question`,`status` order by `a`.`id_exam_question`;

-- Dumping structure for view cat.vw_nilai_akhir_peserta
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_nilai_akhir_peserta`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_nilai_akhir_peserta` AS select row_number() OVER (ORDER BY `a`.`id_user`,`a`.`exam_id` )  AS `id`,`b`.`name` AS `name`,`a`.`id_user` AS `id_user`,`a`.`exam_id` AS `exam_id`,`c`.`title` AS `title`,sum(`a`.`nilai`) AS `nilai`,(select (count(`f`.`id`) * `g`.`nilai_benar`) from (`exam_questions` `f` left join `exams` `g` on((`f`.`exam_id` = `g`.`id`))) where ((`f`.`exam_id` = `a`.`exam_id`) and (`f`.`question_type_id` <> 5) and (`f`.`question_type_id` <> 6)) group by `f`.`exam_id`) AS `total_nilai` from ((`vw_nilai_peserta` `a` left join `users` `b` on((`a`.`id_user` = `b`.`id`))) left join `exams` `c` on((`a`.`exam_id` = `c`.`id`))) group by `a`.`id_user`,`a`.`exam_id`;

-- Dumping structure for view cat.vw_nilai_peserta
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_nilai_peserta`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_nilai_peserta` AS select `c`.`id_user` AS `id_user`,max(`c`.`exam_id`) AS `exam_id`,`c`.`id_question` AS `id_question`,(case when (round(sum(`c`.`Nilai`),1) > `c`.`nilai_benar`) then `c`.`nilai_benar` when (round(sum(`c`.`Nilai`),1) < `c`.`nilai_salah`) then -(`c`.`nilai_salah`) else round(sum(`c`.`Nilai`),1) end) AS `nilai` from (select `a`.`id_user` AS `id_user`,`a`.`exam_id` AS `exam_id`,`e`.`nilai_benar` AS `nilai_benar`,`e`.`nilai_salah` AS `nilai_salah`,`a`.`id_question` AS `id_question`,(case when ((`a`.`question_type` = 'true_or_false') or (`a`.`question_type` = 'multiple_choice')) then (case when (`a`.`point` = 'benar') then `e`.`nilai_benar` when (`a`.`point` = 'salah') then `e`.`nilai_salah` end) when (`a`.`question_type` = 'complex_multiple_choice') then (case when (`a`.`point` = 'benar') then ((`e`.`nilai_benar` / `a`.`total_option`) * 2) when (`a`.`point` = 'salah') then ((`e`.`nilai_benar` / `a`.`total_option`) * -(`e`.`nilai_salah`)) end) when (`a`.`question_type` = 'matching') then (case when (`a`.`point` = 'benar') then ((`e`.`nilai_benar` / `a`.`total_option`) * 2) when (`a`.`point` = 'salah') then ((`e`.`nilai_benar` / `a`.`total_option`) * -(`e`.`nilai_salah`)) end) else 0 end) AS `Nilai` from (`vw_answer_question` `a` left join `exams` `e` on((`a`.`exam_id` = `e`.`id`)))) `c` group by `c`.`id_question`,`c`.`id_user`;

-- Dumping structure for view cat.vw_question_exam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_question_exam`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_question_exam` AS select `a`.`id` AS `id`,`a`.`title` AS `title`,`a`.`description` AS `description`,`a`.`start_at` AS `start_at`,`a`.`duration` AS `duration`,`a`.`token` AS `token`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`id` AS `question_id`,`b`.`question` AS `question`,`c`.`title` AS `question_type` from ((`exams` `a` join `exam_questions` `b` on((`a`.`id` = `b`.`exam_id`))) join `question_type` `c` on((`b`.`question_type_id` = `c`.`id`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
