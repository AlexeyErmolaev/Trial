SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `data_trial` (
  `data_id` int(10) NOT NULL,
  `operating_system` varchar(50) NOT NULL,
  `database_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `data_trial`
  ADD UNIQUE KEY `data_id` (`data_id`);


ALTER TABLE `data_trial`
  ADD CONSTRAINT `trial_update_trial` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
