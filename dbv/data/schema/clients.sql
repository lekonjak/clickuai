CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `doc_numeber` varchar(255) DEFAULT NULL,
  `razao_social` varchar(102) DEFAULT NULL,
  `description` text,
  `website` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `reported` tinyint(1) DEFAULT '0',
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  KEY `address_id` (`address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8