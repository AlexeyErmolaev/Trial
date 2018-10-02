DROP TABLE IF EXISTS `data_host_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_host_location` (
  `data_id` int(11) NOT NULL,
  `host_location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`data_id`),
  CONSTRAINT `data_host_location_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;