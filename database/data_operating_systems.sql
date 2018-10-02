SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Структура таблицы `data_operating_systems`
--

CREATE TABLE IF NOT EXISTS `data_operating_systems` (
  `os_name` varchar(50) NOT NULL,
  `os_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data_operating_systems`
--

INSERT INTO `data_operating_systems` (`os_name`, `os_id`) VALUES
('Linux', 1),
('Windows', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_operating_systems`
--
ALTER TABLE `data_operating_systems`
  ADD PRIMARY KEY (`os_name`),
  ADD UNIQUE KEY `os_id` (`os_id`);