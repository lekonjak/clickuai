CREATE TABLE `countries` (
  `countries_id` int(11) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `countries_iso_code_2` char(2) CHARACTER SET latin1 NOT NULL,
  `countries_iso_code_3` char(3) CHARACTER SET latin1 NOT NULL,
  `address_format_id` int(11) NOT NULL,
  PRIMARY KEY (`countries_id`),
  KEY `IDX_COUNTRIES_NAME` (`countries_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8