DROP TABLE IF EXISTS `data_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_author` (
  `data_id` int(11) NOT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`data_id`),
  CONSTRAINT `data_author_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
