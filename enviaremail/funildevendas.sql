-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 03:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `funildevendas`
--

-- --------------------------------------------------------

--
-- Table structure for table `leados`
--

CREATE TABLE IF NOT EXISTS `leados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(520) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `leados`
--

INSERT INTO `leados` (`id`, `email`) VALUES
(1, 'cesar@celke.com.br'),
(2, 'celkeadm@gmail.com'),
(3, 'celkeadm@gmail.com'),
(4, 'celkeadm@gmail.com'),
(5, ''),
(6, 'celkeadm@gmail.com'),
(7, 'celkeadm1@gmail.com'),
(8, 'celkeadm@gmail.com'),
(9, 'cesar@celke.com.br'),
(10, 'cesar@celke.com.br'),
(11, 'cesar@celke.com.br'),
(12, 'cesar@celke.com.br'),
(13, 'cesar@celke.com.br'),
(14, 'cesar@celke.com.br'),
(15, 'cesar@celke.com.br'),
(16, 'cesar@celke.com.br'),
(17, 'cesar@celke.com.br'),
(18, 'cesar@celke.com.br');

-- --------------------------------------------------------

--
-- Table structure for table `links_emaos`
--

CREATE TABLE IF NOT EXISTS `links_emaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(520) NOT NULL,
  `leado_id` int(11) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `links_emaos`
--

INSERT INTO `links_emaos` (`id`, `link`, `leado_id`, `situacao`) VALUES
(1, '48yrd', 17, 1),
(2, '2eb8fe87da58ca9b90a8205ba7f26897', 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT '0',
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `situacoe_id`, `niveis_acesso_id`, `created`, `modified`) VALUES
(1, 'Cesar Szpak', 'cesar@celke.com.br', '202cb962ac59075b964b07152d234b70', 1, 1, '2016-02-14 00:00:01', '2016-02-20 21:58:01'),
(2, 'Kelly', 'kelly@celke.com.br', '202cb962ac59075b964b07152d234b70', 1, 2, '2016-02-14 00:00:04', '2016-02-20 21:58:12'),
(3, 'Jessica', 'jessica@celke.com.br', '202cb962ac59075b964b07152d234b70', 1, 3, '2016-02-14 00:00:03', '2016-02-20 21:58:25'),
(5, 'Marcia', 'marcia@celke.com.br', '831efa4c96023f4e602ebf86ca27a1d1', 1, 1, '2016-01-01 10:10:01', '2016-02-20 21:58:57'),
(9, 'Celke', 'cesar@celke.com.br', '123', 2, 3, '2016-02-20 20:48:44', NULL),
(10, 'Celke', 'cesar@celke.com.br', '123', 2, 3, '2016-02-20 20:49:02', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
