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

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `address_id` int NOT NULL,
  `doc_numeber` varchar(255) DEFAULT NULL,
  `razao_social` varchar(102) DEFAULT NULL,
  `description` text(1024) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `reported` boolean DEFAULT '0',
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`u_id`) REFERENCES profiles(`id`),
  FOREIGN KEY (`address_id`) REFERENCES addresses(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;


CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(102) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`parent_id`) REFERENCES categories(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `cli_id` int DEFAULT NULL,
  `description` varchar(102) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `state` boolean,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`u_id`) REFERENCES users(`id`),
  FOREIGN KEY (`cli_id`) REFERENCES clients(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `category_to_client` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cli_id` int NOT NULL,
  FOREIGN KEY (`cat_id`) REFERENCES categories(`id`),
  FOREIGN KEY (`cli_id`) REFERENCES clients(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `email_to_client` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `cli_id` int NOT NULL,
  FOREIGN KEY (`e_id`) REFERENCES emails(`id`),
  FOREIGN KEY (`cli_id`) REFERENCES clients(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `photos_to_client` (
  `ph_id` int NOT NULL AUTO_INCREMENT,
  `cli_id` int NOT NULL,
  FOREIGN KEY (`ph_id`) REFERENCES photos(`id`),
  FOREIGN KEY (`cli_id`) REFERENCES clients(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;