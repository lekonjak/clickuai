CREATE TABLE `users` (
  `idUser` int(10) NOT NULL AUTO_INCREMENT,
  `nameUser` varchar(255) NOT NULL,
  `passUser` varchar(255) NOT NULL,
  `mailUser` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `IPadress` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `nameUser` (`nameUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1