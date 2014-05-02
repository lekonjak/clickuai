CREATE TABLE `category_to_client` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_id` int(11) NOT NULL,
  KEY `cat_id` (`cat_id`),
  KEY `cli_id` (`cli_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8