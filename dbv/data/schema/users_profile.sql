CREATE TABLE `users_profile` (
  `idProfile` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `birthdateProfile` datetime NOT NULL,
  `cityProfile` varchar(255) NOT NULL,
  `genderProfile` varchar(255) NOT NULL,
  `relashionshipProfile` varchar(255) NOT NULL,
  `descriptionProfile` text,
  PRIMARY KEY (`idProfile`),
  KEY `users_profile` (`idUser`),
  CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1