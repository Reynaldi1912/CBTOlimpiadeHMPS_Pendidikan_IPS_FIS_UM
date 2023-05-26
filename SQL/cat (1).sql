-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Bulan Mei 2023 pada 17.26
-- Versi server: 8.0.30
-- Versi PHP: 7.4.3

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
  `nilai_benar` int NOT NULL,
  `nilai_salah` int NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_answers`
--

CREATE TABLE `exam_answers` (
  `id` int NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `exam_id` int NOT NULL,
  `id_exam_question` int NOT NULL,
  `answer_question_option_id` int DEFAULT NULL,
  `answer_right_option_id` int DEFAULT NULL,
  `answer_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `ragu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, 'matching', '2023-04-09 06:44:47', '2023-04-09 06:44:47'),
(5, 'long_desc', '2023-05-25 14:30:51', '2023-05-25 14:30:51'),
(6, 'short_desc', '2023-05-25 14:31:03', '2023-05-25 14:31:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'reynaldi ramadhani eka purnomo', 'reynaldi19', 'reynaldi@gmail.com', 'peserta', NULL, '$2y$10$Ky6a6kiVNoIuTOAdQJinXeNb6cMxikWDjt8I..FWeg6Jfg4P0hr9O', NULL, '2023-04-09 05:19:35', '2023-04-09 05:19:35'),
(2, 'Admin', 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$pgVkrnR78.jXnKIWxWGrwu05WiiDPIItiwQzx1s0N7MisScu0gnYS', NULL, '2023-04-21 05:52:18', '2023-04-21 05:52:18'),
(3, 'zidane', 'zidanesanjaya', 'zidane@gmail.com', 'peserta', NULL, '$2y$10$m1E1d2/Dnu.xN94pz24Lh.Oxub8zTayif7vRs4jAJHkGZHE0HiBy2', NULL, '2023-04-23 07:57:57', '2023-04-23 07:57:57'),
(5, 'Sifago Zettiar', 'SFG21', 'sfg@gmail.com', 'peserta', NULL, '$2y$10$hVT8ZAe57lJks.eM4i8oq.b4tR2QzHQhwke6gjwiAlaF/4/gx3aBG', NULL, '2023-05-26 10:55:42', '2023-05-26 10:55:42'),
(6, 'admin reynaldi', 'adminrey', 'adminrey@gmail.com', 'admin', NULL, '$2y$10$bmCU.xITLBg5c9w/CHBdIOrXtmee9g/HwiFs889Ub2El490Og4XX2', NULL, '2023-05-26 11:04:11', '2023-05-26 11:04:11');

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
,`id_user` bigint unsigned
,`name` varchar(255)
,`option_text` text
,`point` varchar(5)
,`question` text
,`question_type` varchar(50)
,`total_option` bigint
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
,`id_attemps` int
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
-- Stand-in struktur untuk tampilan `vw_list_soal_existing`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_list_soal_existing` (
`id_exam_question` int
,`id_user` bigint unsigned
,`status` varchar(8)
,`value_ragu` int
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_nilai_akhir_peserta`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_nilai_akhir_peserta` (
`exam_id` int
,`id` bigint unsigned
,`id_user` bigint unsigned
,`name` varchar(255)
,`nilai` decimal(65,1)
,`title` varchar(100)
,`total_nilai` bigint
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_nilai_peserta`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_nilai_peserta` (
`exam_id` int
,`id_question` int
,`id_user` bigint unsigned
,`nilai` decimal(44,1)
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
-- Struktur untuk view `vw_answer_question`
--
DROP TABLE IF EXISTS `vw_answer_question`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_answer_question`  AS SELECT `b`.`id` AS `id_user`, `b`.`name` AS `name`, `c`.`exam_id` AS `exam_id`, `c`.`id` AS `id_question`, `c`.`question` AS `question`, (select count(0) AS `total` from `question_options` where (`question_options`.`exam_question_id` = `c`.`id`)) AS `total_option`, `d`.`title` AS `question_type`, `a`.`answer_question_option_id` AS `answer_question_option_id`, `a`.`answer_right_option_id` AS `answer_right_option_id`, `e`.`option_text` AS `option_text`, (case when (`e`.`value` = 1) then 'BENAR' when (`e`.`value` = 0) then (case when (`e`.`var1` is not null) then (case when (`e`.`var1` = `a`.`answer_right_option_id`) then 'BENAR' when (`e`.`var1` <> `a`.`answer_right_option_id`) then 'SALAH' end) when (`e`.`var1` is null) then 'SALAH' end) end) AS `point` FROM ((((`exam_answers` `a` left join `users` `b` on((`a`.`id_user` = `b`.`id`))) left join `exam_questions` `c` on((`a`.`id_exam_question` = `c`.`id`))) left join `question_type` `d` on((`c`.`question_type_id` = `d`.`id`))) left join `question_options` `e` on((`a`.`answer_question_option_id` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_list_peserta_ujian`
--
DROP TABLE IF EXISTS `vw_list_peserta_ujian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_list_peserta_ujian`  AS SELECT `a`.`id` AS `id_attemps`, `c`.`id` AS `id`, `c`.`title` AS `title`, `c`.`description` AS `description`, `c`.`start_at` AS `start_at`, `c`.`duration` AS `duration`, `c`.`token` AS `token`, `b`.`id` AS `id_user`, `b`.`name` AS `name`, `c`.`created_at` AS `created_at`, `c`.`updated_at` AS `updated_at`, `a`.`total_attemp` AS `total_attemp`, `a`.`finish` AS `finish` FROM ((`exam_attemps` `a` left join `users` `b` on((`a`.`id_user` = `b`.`id`))) left join `exams` `c` on((`a`.`exam_id` = `c`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_list_soal_existing`
--
DROP TABLE IF EXISTS `vw_list_soal_existing`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_list_soal_existing`  AS SELECT `a`.`id_user` AS `id_user`, max(`a`.`ragu`) AS `value_ragu`, `a`.`id_exam_question` AS `id_exam_question`, (case when (((`a`.`answer_question_option_id` is not null) or (`a`.`answer_desc` is not null)) and (`a`.`ragu` = 1)) then 'ragu' when (((`a`.`answer_question_option_id` is not null) or (`a`.`answer_desc` is not null)) and (`a`.`ragu` = 0)) then 'terjawab' end) AS `status` FROM ((`exam_answers` `a` left join (select `question_options`.`exam_question_id` AS `exam_question_id`,count(`question_options`.`exam_question_id`) AS `total_option` from `question_options` group by `question_options`.`exam_question_id`) `b` on((`a`.`id_exam_question` = `b`.`exam_question_id`))) left join (select `a`.`id` AS `id`,`a`.`exam_id` AS `exam_id`,`a`.`question` AS `question`,`a`.`question_type_id` AS `question_type_id`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`title` AS `title` from (`exam_questions` `a` left join `question_type` `b` on((`a`.`question_type_id` = `b`.`id`)))) `c` on((`a`.`id_exam_question` = `c`.`id`))) GROUP BY `a`.`id_user`, `a`.`id_exam_question`, `status` ORDER BY `a`.`id_exam_question` ASC ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_nilai_akhir_peserta`
--
DROP TABLE IF EXISTS `vw_nilai_akhir_peserta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_nilai_akhir_peserta`  AS SELECT row_number() OVER (ORDER BY `a`.`id_user`,`a`.`exam_id` ) AS `id`, `b`.`name` AS `name`, `a`.`id_user` AS `id_user`, `a`.`exam_id` AS `exam_id`, `c`.`title` AS `title`, sum(`a`.`nilai`) AS `nilai`, (select (count(`f`.`id`) * `g`.`nilai_benar`) from (`exam_questions` `f` left join `exams` `g` on((`f`.`exam_id` = `g`.`id`))) where ((`f`.`exam_id` = `a`.`exam_id`) and (`f`.`question_type_id` <> 5) and (`f`.`question_type_id` <> 6)) group by `f`.`exam_id`) AS `total_nilai` FROM ((`vw_nilai_peserta` `a` left join `users` `b` on((`a`.`id_user` = `b`.`id`))) left join `exams` `c` on((`a`.`exam_id` = `c`.`id`))) GROUP BY `a`.`id_user`, `a`.`exam_id` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_nilai_peserta`
--
DROP TABLE IF EXISTS `vw_nilai_peserta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_nilai_peserta`  AS SELECT `c`.`id_user` AS `id_user`, max(`c`.`exam_id`) AS `exam_id`, `c`.`id_question` AS `id_question`, (case when (round(sum(`c`.`Nilai`),1) > 2) then 2 when (round(sum(`c`.`Nilai`),1) < -(1)) then -(1) else round(sum(`c`.`Nilai`),1) end) AS `nilai` FROM (select `a`.`id_user` AS `id_user`,`a`.`exam_id` AS `exam_id`,`a`.`id_question` AS `id_question`,(case when ((`a`.`question_type` = 'true_or_false') or (`a`.`question_type` = 'multiple_choice')) then (case when (`a`.`point` = 'benar') then `e`.`nilai_benar` when (`a`.`point` = 'salah') then `e`.`nilai_salah` end) when (`a`.`question_type` = 'complex_multiple_choice') then (case when (`a`.`point` = 'benar') then ((`e`.`nilai_benar` / `a`.`total_option`) * 2) when (`a`.`point` = 'salah') then ((`e`.`nilai_benar` / `a`.`total_option`) * -(`e`.`nilai_salah`)) end) when (`a`.`question_type` = 'matching') then (case when (`a`.`point` = 'benar') then ((`e`.`nilai_benar` / `a`.`total_option`) * 2) when (`a`.`point` = 'salah') then ((`e`.`nilai_benar` / `a`.`total_option`) * -(`e`.`nilai_salah`)) end) else 0 end) AS `Nilai` from (`vw_answer_question` `a` left join `exams` `e` on((`a`.`exam_id` = `e`.`id`)))) AS `c` GROUP BY `c`.`id_question`, `c`.`id_user` ;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `exam_attemps`
--
ALTER TABLE `exam_attemps`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
