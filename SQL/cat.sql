-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Apr 2023 pada 15.00
-- Versi server: 8.0.30
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `exams`
--

CREATE TABLE `exams` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `start_at` datetime NOT NULL,
  `duration` int NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `exams`
--

INSERT INTO `exams` (`id`, `title`, `description`, `start_at`, `duration`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Babak Kualifikasi', 'uji coba ujian oline model CAT', '2023-04-23 17:57:00', 500, 'QO5hiP7d', '2023-04-09 06:58:18', '2023-04-21 05:45:30'),
(5, 'Babak Kualifikasi', 'Babak Kualifikasi Adalah Babak Seleksi', '2023-04-30 12:00:00', 120, NULL, '2023-04-21 04:28:39', '2023-04-21 05:49:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_answers`
--

CREATE TABLE `exam_answers` (
  `id` int NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `exam_id` int NOT NULL,
  `id_exam_question` int NOT NULL,
  `answer_question_option_id` int NOT NULL,
  `answer_right_option_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `exam_answers`
--

INSERT INTO `exam_answers` (`id`, `id_user`, `exam_id`, `id_exam_question`, `answer_question_option_id`, `answer_right_option_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(15, 1, 1, 4, 11, 17, '2023-04-23 07:17:49', '2023-04-23 07:17:49', 1, NULL),
(16, 1, 1, 4, 12, 15, '2023-04-23 07:17:49', '2023-04-23 07:17:49', 1, NULL),
(17, 1, 1, 4, 13, 16, '2023-04-23 07:17:49', '2023-04-23 07:17:49', 1, NULL),
(18, 1, 1, 4, 14, 15, '2023-04-23 07:17:49', '2023-04-23 07:17:49', 1, NULL),
(19, 3, 1, 1, 1, NULL, '2023-04-23 07:59:20', '2023-04-23 07:59:20', 3, NULL),
(20, 3, 1, 2, 3, NULL, '2023-04-23 07:59:27', '2023-04-23 07:59:27', 3, NULL),
(21, 3, 1, 2, 5, NULL, '2023-04-23 07:59:27', '2023-04-23 07:59:27', 3, NULL),
(22, 3, 1, 3, 8, NULL, '2023-04-23 07:59:34', '2023-04-23 07:59:34', 3, NULL),
(23, 3, 1, 4, 11, 15, '2023-04-23 07:59:38', '2023-04-23 07:59:38', 3, NULL),
(24, 3, 1, 4, 12, 15, '2023-04-23 07:59:38', '2023-04-23 07:59:38', 3, NULL),
(25, 3, 1, 4, 13, 15, '2023-04-23 07:59:38', '2023-04-23 07:59:38', 3, NULL),
(26, 3, 1, 4, 14, 15, '2023-04-23 07:59:38', '2023-04-23 07:59:38', 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_attemps`
--

CREATE TABLE `exam_attemps` (
  `id` int NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `exam_id` int NOT NULL,
  `total_attemp` int NOT NULL,
  `finish` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `exam_attemps`
--

INSERT INTO `exam_attemps` (`id`, `id_user`, `exam_id`, `total_attemp`, `finish`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 2, 1, '2023-04-21 05:53:03', '2023-04-23 14:59:16'),
(4, 3, 1, 0, 0, '2023-04-23 14:59:05', '2023-04-23 14:59:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `question` text NOT NULL,
  `question_type_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `exam_id`, `question`, `question_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'apakah benar bumi itu bulat ?', 3, '2023-04-09 07:01:39', '2023-04-09 07:01:39'),
(2, 1, 'manakah yang termasuk komponen pc ?', 2, '2023-04-09 07:02:16', '2023-04-09 07:02:16'),
(3, 1, 'berikut komponen yang digunakan untuk menambahkan kapasitas penyimpanan komputer ?', 1, '2023-04-09 07:03:04', '2023-04-09 07:03:04'),
(4, 1, 'jodohkan merk laptop berikut ini dengan series gaming nya ?', 4, '2023-04-09 07:03:58', '2023-04-09 07:03:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `question_options`
--

CREATE TABLE `question_options` (
  `id` int NOT NULL,
  `exam_question_id` int NOT NULL,
  `option_text` text NOT NULL,
  `value` tinyint(1) NOT NULL,
  `type_matching` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `var1` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `question_options`
--

INSERT INTO `question_options` (`id`, `exam_question_id`, `option_text`, `value`, `type_matching`, `var1`, `created_at`, `updated_at`) VALUES
(1, 1, 'benar', 0, NULL, NULL, '2023-04-09 07:06:09', '2023-04-09 07:06:09'),
(2, 1, 'salah', 1, NULL, NULL, '2023-04-09 07:06:09', '2023-04-09 07:06:09'),
(3, 2, 'SSD', 1, NULL, NULL, '2023-04-09 07:08:56', '2023-04-09 07:08:56'),
(4, 2, 'Professor', 0, NULL, NULL, '2023-04-09 07:08:56', '2023-04-09 07:08:56'),
(5, 2, 'RAM', 1, NULL, NULL, '2023-04-09 07:08:56', '2023-04-09 07:08:56'),
(6, 2, 'Pipa', 0, NULL, NULL, '2023-04-09 07:08:56', '2023-04-09 07:08:56'),
(7, 3, 'HDDS', 0, NULL, NULL, '2023-04-09 07:10:59', '2023-04-09 07:10:59'),
(8, 3, 'SSD', 1, NULL, NULL, '2023-04-09 07:10:59', '2023-04-09 07:10:59'),
(9, 3, 'SHD', 0, NULL, NULL, '2023-04-09 07:10:59', '2023-04-09 07:10:59'),
(10, 3, 'DDS', 0, NULL, NULL, '2023-04-09 07:10:59', '2023-04-09 07:10:59'),
(11, 4, 'Asus', 0, 'left', 17, '2023-04-09 07:15:03', '2023-04-09 07:15:03'),
(12, 4, 'Lenovo', 0, 'left', 15, '2023-04-09 07:15:03', '2023-04-09 07:15:03'),
(13, 4, 'Acer', 0, 'left', 18, '2023-04-09 07:15:03', '2023-04-09 07:15:03'),
(14, 4, 'Dell', 0, 'left', 16, '2023-04-09 07:15:03', '2023-04-09 07:15:03'),
(15, 4, 'LEGION', 0, 'right', NULL, '2023-04-09 07:15:03', '2023-04-09 07:15:03'),
(16, 4, 'Alienware', 0, 'right', NULL, '2023-04-09 07:15:03', '2023-04-09 07:15:03'),
(17, 4, 'ROG / TUF', 0, 'right', NULL, '2023-04-09 07:15:03', '2023-04-09 07:15:03'),
(18, 4, 'Predator', 0, 'right', NULL, '2023-04-09 07:15:03', '2023-04-09 07:15:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `question_type`
--

CREATE TABLE `question_type` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `question_type`
--

INSERT INTO `question_type` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'multiple_choice', '2023-04-09 06:44:47', '2023-04-09 06:44:47'),
(2, 'complex_multiple_choice', '2023-04-09 06:44:47', '2023-04-09 06:44:47'),
(3, 'true_or_false', '2023-04-09 06:44:47', '2023-04-09 06:44:47'),
(4, 'matching', '2023-04-09 06:44:47', '2023-04-09 06:44:47');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `test_view`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `test_view` (
`answer_question_option_id` int
,`created_at` timestamp
,`created_by` bigint unsigned
,`id` int
,`id_exam_question` int
,`id_user` bigint unsigned
,`question_type` varchar(50)
,`total_option` bigint
,`updated_at` timestamp
,`updated_by` bigint unsigned
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'reynaldi ramadhani eka purnomo', 'reynaldi19', 'reynaldi@gmail.com', 'peserta', NULL, '$2y$10$Ky6a6kiVNoIuTOAdQJinXeNb6cMxikWDjt8I..FWeg6Jfg4P0hr9O', NULL, '2023-04-09 05:19:35', '2023-04-09 05:19:35'),
(2, 'Admin', 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$pgVkrnR78.jXnKIWxWGrwu05WiiDPIItiwQzx1s0N7MisScu0gnYS', NULL, '2023-04-21 05:52:18', '2023-04-21 05:52:18'),
(3, 'zidane', 'zidanesanjaya', 'zidane@gmail.com', 'peserta', NULL, '$2y$10$m1E1d2/Dnu.xN94pz24Lh.Oxub8zTayif7vRs4jAJHkGZHE0HiBy2', NULL, '2023-04-23 07:57:57', '2023-04-23 07:57:57');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_answer_question`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_answer_question` (
`answer_question_option_id` int
,`answer_right_option_id` int
,`exam_id` int
,`id_question` int
,`name` varchar(255)
,`option_text` text
,`point` varchar(5)
,`question` text
,`question_type` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_list_peserta_ujian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_list_peserta_ujian` (
`created_at` timestamp
,`description` text
,`duration` int
,`finish` tinyint(1)
,`id` int
,`id_user` bigint unsigned
,`name` varchar(255)
,`start_at` datetime
,`title` varchar(100)
,`token` text
,`total_attemp` int
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_question_exam`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_question_exam` (
`created_at` timestamp
,`description` text
,`duration` int
,`id` int
,`question` text
,`question_id` int
,`question_type` varchar(50)
,`start_at` datetime
,`title` varchar(100)
,`token` text
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Struktur untuk view `test_view`
--
DROP TABLE IF EXISTS `test_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test_view`  AS SELECT `a`.`id` AS `id`, `a`.`id_user` AS `id_user`, `a`.`id_exam_question` AS `id_exam_question`, `a`.`answer_question_option_id` AS `answer_question_option_id`, `a`.`created_at` AS `created_at`, `a`.`updated_at` AS `updated_at`, `a`.`created_by` AS `created_by`, `a`.`updated_by` AS `updated_by`, `b`.`total_option` AS `total_option`, `c`.`title` AS `question_type` FROM ((`exam_answers` `a` left join (select `question_options`.`exam_question_id` AS `exam_question_id`,count(`question_options`.`exam_question_id`) AS `total_option` from `question_options` group by `question_options`.`exam_question_id`) `b` on((`a`.`id_exam_question` = `b`.`exam_question_id`))) left join (select `a`.`id` AS `id`,`a`.`exam_id` AS `exam_id`,`a`.`question` AS `question`,`a`.`question_type_id` AS `question_type_id`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`title` AS `title` from (`exam_questions` `a` left join `question_type` `b` on((`a`.`question_type_id` = `b`.`id`)))) `c` on((`a`.`id_exam_question` = `c`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_answer_question`
--
DROP TABLE IF EXISTS `vw_answer_question`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_answer_question`  AS SELECT `b`.`name` AS `name`, `c`.`exam_id` AS `exam_id`, `c`.`id` AS `id_question`, `c`.`question` AS `question`, `d`.`title` AS `question_type`, `a`.`answer_question_option_id` AS `answer_question_option_id`, `a`.`answer_right_option_id` AS `answer_right_option_id`, `e`.`option_text` AS `option_text`, (case when (`e`.`value` = 1) then 'BENAR' when (`e`.`value` = 0) then (case when (`e`.`var1` is not null) then (case when (`e`.`var1` = `a`.`answer_right_option_id`) then 'BENAR' when (`e`.`var1` <> `a`.`answer_right_option_id`) then 'SALAH' end) when (`e`.`var1` is null) then 'SALAH' end) end) AS `point` FROM ((((`exam_answers` `a` left join `users` `b` on((`a`.`id_user` = `b`.`id`))) left join `exam_questions` `c` on((`a`.`id_exam_question` = `c`.`id`))) left join `question_type` `d` on((`c`.`question_type_id` = `d`.`id`))) left join `question_options` `e` on((`a`.`answer_question_option_id` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_list_peserta_ujian`
--
DROP TABLE IF EXISTS `vw_list_peserta_ujian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_list_peserta_ujian`  AS SELECT `c`.`id` AS `id`, `c`.`title` AS `title`, `c`.`description` AS `description`, `c`.`start_at` AS `start_at`, `c`.`duration` AS `duration`, `c`.`token` AS `token`, `b`.`id` AS `id_user`, `b`.`name` AS `name`, `c`.`created_at` AS `created_at`, `c`.`updated_at` AS `updated_at`, `a`.`total_attemp` AS `total_attemp`, `a`.`finish` AS `finish` FROM ((`exam_attemps` `a` left join `users` `b` on((`a`.`id_user` = `b`.`id`))) left join `exams` `c` on((`a`.`exam_id` = `c`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_question_exam`
--
DROP TABLE IF EXISTS `vw_question_exam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_question_exam`  AS SELECT `a`.`id` AS `id`, `a`.`title` AS `title`, `a`.`description` AS `description`, `a`.`start_at` AS `start_at`, `a`.`duration` AS `duration`, `a`.`token` AS `token`, `a`.`created_at` AS `created_at`, `a`.`updated_at` AS `updated_at`, `b`.`id` AS `question_id`, `b`.`question` AS `question`, `c`.`title` AS `question_type` FROM ((`exams` `a` join `exam_questions` `b` on((`a`.`id` = `b`.`exam_id`))) join `question_type` `c` on((`b`.`question_type_id` = `c`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `exam_attemps`
--
ALTER TABLE `exam_attemps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `exam_attemps`
--
ALTER TABLE `exam_attemps`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
