DROP TABLE IF EXISTS `data_license_database`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_license_database` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `license_id` int(11) NOT NULL,
  `database_id` int(11) NOT NULL,
  `database_host` varchar(255) DEFAULT NULL,
  `database_port` int(11) DEFAULT NULL,
  `database_has_cluster` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;