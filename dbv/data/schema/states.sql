CREATE TABLE `states` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_country_id` int(11) NOT NULL,
  `zone_code` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `zone_code_ibge` int(32) DEFAULT NULL,
  `zone_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `zone_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`zone_id`),
  KEY `fk_country` (`zone_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin