CREATE TABLE `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prefix` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8