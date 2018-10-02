-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 26 2017 г., 14:06
-- Версия сервера: 5.7.20-0ubuntu0.16.04.1
-- Версия PHP: 7.1.8-2+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `datasunrise`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access_to_exclusive_files`
--

CREATE TABLE `access_to_exclusive_files` (
  `data_id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access_to_exclusive_files`
--
ALTER TABLE `access_to_exclusive_files`
  ADD PRIMARY KEY (`data_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access_to_exclusive_files`
--
ALTER TABLE `access_to_exclusive_files`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `access_to_exclusive_files`
--
ALTER TABLE `access_to_exclusive_files`
  ADD CONSTRAINT `access_to_exclusive_files_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
