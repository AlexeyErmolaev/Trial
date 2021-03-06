DROP TABLE IF EXISTS `data_license_has_new_version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_license_has_new_version` (
  `data_id` int(11) NOT NULL,
  `has_new_version` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`data_id`),
  CONSTRAINT `data_license_has_new_version_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;