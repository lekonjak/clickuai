CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL,
  `number` int(32) DEFAULT NULL,
  `cep` varchar(32) DEFAULT NULL,
  `city_id` int(5) DEFAULT NULL,
  `state_id` int(5) DEFAULT NULL,
  `country_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`p_id`) REFERENCES profiles(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `bdate` varchar(255) DEFAULT NULL,
  `rg` varchar(102) DEFAULT NULL,
  `cpf` varchar(102) DEFAULT NULL,
  `generated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`u_id`) REFERENCES users(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;


CREATE TABLE IF NOT EXISTS `phones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `profile_id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prefix` int DEFAULT NULL,
  `number` int DEFAULT NULL,
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`p_id`) REFERENCES profiles(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `address` varchar(102) DEFAULT NULL,
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`p_id`) REFERENCES profiles(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(102) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ordenation` int DEFAULT '0',
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`p_id`) REFERENCES profiles(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `incident` text(1024) DEFAULT NULL,
  `code` varchar(102) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `reported` boolean DEFAULT '0',
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`u_id`) REFERENCES profiles(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;