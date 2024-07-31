-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 7 月 31 日 06:39
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `esupport01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ai_sessions`
--

CREATE TABLE `ai_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `age` enum('teens','20s','30s','40s','50s','60s','70s','80s','90s') NOT NULL,
  `occupation` enum('student','company_employee','housewife','part_time','self_employed','freelancer','other') NOT NULL,
  `discussion_about` varchar(255) NOT NULL,
  `discussion_details` text NOT NULL,
  `type` enum('soft','normal','hard','hot','cool') NOT NULL,
  `topic` enum('stress','mental_health','life_events','relationships','self_growth','family_issues') NOT NULL,
  `specialty` enum('clinical_psychology','educational_counseling','family_therapy','rehabilitation') NOT NULL,
  `time` int(11) NOT NULL,
  `counselor` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `is_admin`) VALUES
(1, 'test1', 'test1@example.com', '$2y$10$zuRtLufz/QDMW.O1pydj7ugdSBiU1o8T65s85NsSjICUFEMu2hVeC', '2024-07-30 14:09:41', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ai_sessions`
--
ALTER TABLE `ai_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `ai_sessions`
--
ALTER TABLE `ai_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `ai_sessions`
--
ALTER TABLE `ai_sessions`
  ADD CONSTRAINT `ai_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
