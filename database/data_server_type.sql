SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Структура таблицы `data_server_type`
--

CREATE TABLE IF NOT EXISTS `data_server_type` (
  `data_id` int(11) NOT NULL,
  `server_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_server_type`
--
ALTER TABLE `data_server_type`
  ADD PRIMARY KEY (`data_id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `data_server_type`
--
ALTER TABLE `data_server_type`
  ADD CONSTRAINT `data_server_type_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
