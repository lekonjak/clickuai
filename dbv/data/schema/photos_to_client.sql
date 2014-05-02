CREATE TABLE `photos_to_client` (
  `ph_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_id` int(11) NOT NULL,
  KEY `ph_id` (`ph_id`),
  KEY `cli_id` (`cli_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8