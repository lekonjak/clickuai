-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 06/02/2013 às 17h41min
-- Versão do Servidor: 5.5.28
-- Versão do PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `nano`
--

--
-- Estrutura da tabela `ssm_users_to_letivo`
--

CREATE TABLE IF NOT EXISTS `ssm_users_to_letivo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `gid` int(11) NOT NULL,
  `plid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 06/03/2013 - Adição do campo status em ssm_disciplinas
ALTER TABLE  `ssm_disciplinas` ADD  `status` BOOLEAN NOT NULL DEFAULT  '1' AFTER  `regra`

--03/04/2013 - Adição do campo "base" em ssm_disciplinas apara fazer a verificação se a disciplina pertence a base comum de ensino ou diversificada
ALTER TABLE  `ssm_disciplinas` ADD  `base` ENUM(  'NACIONAL',  'DIVERSIFICADA' ) NOT NULL DEFAULT  'NACIONAL' AFTER  `regra`

--
-- Estrutura da tabela `ssm_quadro_curricular`
--

CREATE TABLE IF NOT EXISTS `ssm_quadro_curricular` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `did` int(5) NOT NULL,
  `gid` int(5) NOT NULL,
  `plid` int(5) NOT NULL,
  `carga` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

 --

-- Servidor: localhost
-- Tempo de Geração: 22/04/2013 às 17h29min
-- Versão do Servidor: 5.5.28
-- Versão do PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de Dados: `nano`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_attempt`
--

CREATE TABLE IF NOT EXISTS `users_attempt` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Estrutura da tabela `ssm_estruturas_attempt`
--

CREATE TABLE IF NOT EXISTS `ssm_estruturas_attempt` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `eid` int(5) NOT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Drop do campo uid da tablea `users_more`
--
ALTER TABLE  `users_more` DROP  `uid` ;

--
-- Updating Estrutura data Obsolet
--
UPDATE  `ssm_estruturas` SET  `flag_status` =  '0' WHERE  `plid` =  '1'

--
-- Alter table "ssm_periodos"
--
ALTER TABLE  `ssm_periodos` ADD  `peso` INT NOT NULL DEFAULT  '1' AFTER  `titulo`

--
-- Estrutura da tabela `ssm_disciplina_to_group`
--

CREATE TABLE IF NOT EXISTS `ssm_disciplina_to_group` (
  `did` int(5) NOT NULL,
  `gid` int(5) NOT NULL,
  `plid` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;