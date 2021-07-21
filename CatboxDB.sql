-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 16 2021 г., 21:55
-- Версия сервера: 10.3.30-MariaDB
-- Версия PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mohooks_catbox`
--

-- --------------------------------------------------------

--
-- Структура таблицы `api_apps`
--

CREATE TABLE `api_apps` (
  `id` int(10) NOT NULL,
  `app_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `app_id_owner` int(10) NOT NULL,
  `app_callback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `app_access` tinyint(1) NOT NULL DEFAULT 1,
  `app_token` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `api_apps`
--

INSERT INTO `api_apps` (`id`, `app_name`, `app_id_owner`, `app_callback`, `app_access`, `app_token`) VALUES
(1, '1', 1, '1', 1, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `images_ftp_accounts`
--

CREATE TABLE `images_ftp_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `ftp_host` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ftp_username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ftp_password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ftp_port` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ftp_location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`) VALUES


-- --------------------------------------------------------

--
-- Структура таблицы `updates_tokens`
--

CREATE TABLE `updates_tokens` (
  `id` int(10) NOT NULL,
  `update_cbx` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `updates_tokens`
--

INSERT INTO `updates_tokens` (`id`, `update_cbx`, `user_id`) VALUES
(11, 'bigup', 149),
(12, 'bigup', 149);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ip` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `browser` text NOT NULL,
  `version_os` text NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `photourl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `flname_true` tinyint(1) NOT NULL DEFAULT 0,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `darkmode` tinyint(1) NOT NULL DEFAULT 0,
  `cbxme_email` tinyint(1) NOT NULL DEFAULT 0,
  `cbxme_id` tinyint(1) NOT NULL DEFAULT 1,
  `cbxme_img` tinyint(1) NOT NULL DEFAULT 0,
  `cbxme_flname` tinyint(1) NOT NULL DEFAULT 1,
  `2fa_code` varchar(64) NOT NULL DEFAULT '11111',
  `2fa_code_on` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `ip`, `browser`, `version_os`, `verified`, `about`, `photourl`, `flname_true`, `fname`, `lname`, `darkmode`, `cbxme_email`, `cbxme_id`, `cbxme_img`, `cbxme_flname`, `2fa_code`, `2fa_code_on`) VALUES

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `api_apps`
--
ALTER TABLE `api_apps`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `app_id_owner` (`app_id_owner`);

--
-- Индексы таблицы `images_ftp_accounts`
--
ALTER TABLE `images_ftp_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `updates_tokens`
--
ALTER TABLE `updates_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `api_apps`
--
ALTER TABLE `api_apps`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `images_ftp_accounts`
--
ALTER TABLE `images_ftp_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=531;

--
-- AUTO_INCREMENT для таблицы `updates_tokens`
--
ALTER TABLE `updates_tokens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
