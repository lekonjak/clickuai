CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(102) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ordenation` int(11) DEFAULT '0',
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8