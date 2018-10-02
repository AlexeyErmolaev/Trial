SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Структура таблицы `data_list_servers`
--

CREATE TABLE IF NOT EXISTS `data_list_servers` (
  `server_name` varchar(50) NOT NULL,
  `server_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data_list_servers`
--

INSERT INTO `data_list_servers` (`server_name`, `server_id`) VALUES
('GENERAL', 0),
('AWS', 1),
('AZURE', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_list_servers`
--
ALTER TABLE `data_list_servers`
  ADD PRIMARY KEY (`server_name`),
  ADD UNIQUE KEY `server_id` (`server_id`);
