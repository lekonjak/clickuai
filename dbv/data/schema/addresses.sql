CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL,
  `number` int(32) DEFAULT NULL,
  `cep` varchar(32) DEFAULT NULL,
  `city_id` int(5) DEFAULT NULL,
  `state_id` int(5) DEFAULT NULL,
  `country_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8