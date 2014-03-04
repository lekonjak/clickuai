CREATE TABLE `events` (
  `idEvent` int(10) NOT NULL AUTO_INCREMENT,
  `idUser` int(10) NOT NULL,
  `titleEvent` varchar(255) NOT NULL,
  `descriptionEvent` text NOT NULL,
  `startEvent` datetime NOT NULL,
  `endEvent` datetime NOT NULL,
  `addressEvent` varchar(255) NOT NULL,
  `creatorEvent` int(11) NOT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `events` (`idUser`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1