DROP TABLE IF EXISTS `data_license_check_by_server`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_license_check_by_server` (
  `data_id` int(11) NOT NULL,
  `has_checking_database` tinyint(1) DEFAULT NULL,
  `has_checking_host` tinyint(1) DEFAULT NULL,
  `has_checking_port` tinyint(1) DEFAULT NULL,
  `has_checking_cluster` tinyint(1) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;