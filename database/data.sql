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

