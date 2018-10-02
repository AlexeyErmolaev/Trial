SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Структура таблицы `data_list_types`
--

CREATE TABLE IF NOT EXISTS `data_list_types` (
  `type_name` varchar(50) NOT NULL,
  `type_ip` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data_list_types`
--

INSERT INTO `data_list_types` (`type_name`, `type_ip`) VALUES
('Download', 1),
('errors', 8),
('Feedback', 3),
('Getting key', 2),
('logs', 7),
('Purchase', 6),
('Request', 4),
('Support', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_list_types`
--
ALTER TABLE `data_list_types`
  ADD PRIMARY KEY (`type_ip`),
  ADD UNIQUE KEY `type_name` (`type_name`);
