CREATE TABLE `settings` (
  `type` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1