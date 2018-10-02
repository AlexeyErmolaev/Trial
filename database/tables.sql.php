-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 06 2016 г., 10:24
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `promo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data_basic`
--

CREATE TABLE IF NOT EXISTS `data_basic` (
  `id` int(5) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_agent` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `data_comments`
--

CREATE TABLE IF NOT EXISTS `data_comments` (
  `data_id` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `data_feedback`
--

CREATE TABLE IF NOT EXISTS `data_feedback` (
  `data_id` int(10) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `data_info`
--

CREATE TABLE IF NOT EXISTS `data_info` (
  `data_id` int(10) NOT NULL,
  `company` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `data_trial`
--

CREATE TABLE IF NOT EXISTS `data_trial` (
  `data_id` int(10) NOT NULL,
  `operating_system` enum('Linux','Windows') NOT NULL,
  `database_name` enum('MSSQL','PostgreSQL','Amazon Redshift','Amazon Aurora','DB2','MariaDB','Greenplum','Teradata','MySQL','Netezza','Oracle') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `data_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_basic`
--
ALTER TABLE `data_basic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `data_comments`
--
ALTER TABLE `data_comments`
  ADD UNIQUE KEY `id_data` (`data_id`);

--
-- Индексы таблицы `data_feedback`
--
ALTER TABLE `data_feedback`
  ADD UNIQUE KEY `data_id` (`data_id`);

--
-- Индексы таблицы `data_info`
--
ALTER TABLE `data_info`
  ADD UNIQUE KEY `data_id` (`data_id`);

--
-- Индексы таблицы `data_trial`
--
ALTER TABLE `data_trial`
  ADD UNIQUE KEY `data_id` (`data_id`);

--
-- Индексы таблицы `data_user`
--
ALTER TABLE `data_user`
  ADD UNIQUE KEY `id_data` (`data_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `data_basic`
--
ALTER TABLE `data_basic`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `data_comments`
--
ALTER TABLE `data_comments`
  ADD CONSTRAINT `data_comments_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `data_feedback`
--
ALTER TABLE `data_feedback`
  ADD CONSTRAINT `feedback_update_user` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `data_info`
--
ALTER TABLE `data_info`
  ADD CONSTRAINT `info_update_user` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `data_trial`
--
ALTER TABLE `data_trial`
  ADD CONSTRAINT `trial_update_trial` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
