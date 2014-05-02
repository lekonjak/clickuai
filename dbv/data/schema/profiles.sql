CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `bdate` varchar(255) DEFAULT NULL,
  `rg` varchar(102) DEFAULT NULL,
  `cpf` varchar(102) DEFAULT NULL,
  `generated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8