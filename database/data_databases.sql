SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Структура таблицы `data_databases`
--

CREATE TABLE IF NOT EXISTS `data_databases` (
  `database_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `database_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data_databases`
--

INSERT INTO `data_databases` (`database_name`, `database_id`) VALUES
('MSSQL', 1),
('PostgreSQL', 2),
('Amazon Redshift', 3),
('Amazon Aurora', 4),
('DB2', 5),
('MariaDB', 6),
('Greenplum', 7),
('Teradata', 8),
('MySQL', 9),
('Netezza', 10),
('Oracle', 11);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_databases`
--
ALTER TABLE `data_databases`
  ADD PRIMARY KEY (`database_name`),
  ADD UNIQUE KEY `database_id` (`database_id`);
