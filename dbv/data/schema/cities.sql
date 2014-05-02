CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) NOT NULL,
  `code_ibge` int(32) NOT NULL,
  `code` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`city_id`),
  KEY `fk_state` (`zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8