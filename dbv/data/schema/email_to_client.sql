CREATE TABLE `email_to_client` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_id` int(11) NOT NULL,
  KEY `e_id` (`e_id`),
  KEY `cli_id` (`cli_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8