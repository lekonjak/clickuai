CREATE TABLE `emails` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `address` varchar(102) DEFAULT NULL,
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8