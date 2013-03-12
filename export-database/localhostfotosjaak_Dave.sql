-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 21 jan 2013 om 09:43
-- Serverversie: 5.5.16
-- PHP-Versie: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websitefotosjaak`
--
CREATE DATABASE `websitefotosjaak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `websitefotosjaak`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userrole` enum('root','sjaak','customer','developer') NOT NULL,
  `activated` enum('yes','no') NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

--
-- Gegevens worden uitgevoerd voor tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `userrole`, `activated`, `datetime`) VALUES
(171, 'adruijter@gmail.com', 'geheim', 'customer', 'yes', '2012-12-06 06:32:18'),
(173, 'bvanstraaten@gmail.com', 'geheim', 'customer', 'yes', '2012-12-17 10:09:06'),
(177, 'fotosjaak@gmail.com', 'geheim', 'sjaak', 'yes', '2012-12-17 11:02:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `order_short` varchar(250) NOT NULL,
  `order_long` text NOT NULL,
  `deliverydate` date NOT NULL,
  `eventdate` date NOT NULL,
  `color_pictures` enum('color','black-white') NOT NULL,
  `number_of_pictures` smallint(6) NOT NULL,
  `orderdate` datetime NOT NULL,
  `confirmed` enum('yes','no') NOT NULL DEFAULT 'no',
  `charge` decimal(7,2) NOT NULL,
  `confirm_charge` enum('yes','no') NOT NULL DEFAULT 'no',
  `paid` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Gegevens worden uitgevoerd voor tabel `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_short`, `order_long`, `deliverydate`, `eventdate`, `color_pictures`, `number_of_pictures`, `orderdate`, `confirmed`, `charge`, `confirm_charge`, `paid`) VALUES
(73, 171, 'Zuid-Afrika', 'Leeuwen in de serangeti woestijn', '2012-12-24', '2012-12-27', 'color', 900, '2012-12-17 11:11:48', 'yes', '3333.00', 'yes', 'yes'),
(74, 171, 'Zambia', 'Antilopen in het wild', '2012-12-28', '2013-01-08', 'color', 800, '2012-12-17 11:12:45', 'yes', '5000.00', 'yes', 'no'),
(75, 171, 'Eqypte', 'Piramides van Gizeh', '2013-01-09', '2012-12-03', 'color', 850, '2012-12-17 11:13:36', 'no', '6000.00', 'yes', 'no'),
(76, 171, 'Libie', 'Witte haai', '2012-12-05', '2012-12-02', 'black-white', 550, '2012-12-17 11:14:12', 'no', '3400.23', 'yes', 'no'),
(77, 173, 'Argentinie', 'Koeien en cowboys', '2012-12-19', '2012-12-12', 'color', 350, '2012-12-17 11:15:25', 'yes', '5698.23', 'no', 'no'),
(78, 173, 'Brazilie', 'de samba', '2012-12-28', '2012-12-26', 'color', 250, '2012-12-17 11:15:57', 'yes', '3456.00', 'no', 'no'),
(79, 173, 'Equador', 'Maya tempels', '2012-12-27', '2012-12-21', 'color', 150, '2012-12-17 11:17:08', 'yes', '12000.00', 'no', 'no'),
(80, 173, 'Fuerte Ventura', 'Strand en golven', '2012-12-27', '2012-12-20', 'color', 500, '2012-12-17 11:17:52', 'yes', '20000.00', 'no', 'no'),
(81, 171, 'Fotos van de tijger', 'De westbengaalse tijger', '2013-01-14', '2013-01-18', 'black-white', 900, '2013-01-07 06:48:58', 'yes', '1200.34', 'yes', 'no'),
(82, 171, 'Walvissen', 'Atlantische oceaan', '2013-01-23', '2013-01-29', 'black-white', 0, '2013-01-07 08:49:48', 'yes', '99999.99', 'no', 'no');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `photo_name` varchar(300) NOT NULL,
  `photo_text` text NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden uitgevoerd voor tabel `photo`
--

INSERT INTO `photo` (`photo_id`, `order_id`, `photo_name`, `photo_text`) VALUES
(1, 73, 'Desert.jpg', 'Dit is de woestijn in Arizona'),
(2, 74, 'Hydrangeas.jpg', 'Dit is een waterstruik'),
(3, 74, 'Koala.jpg', 'Dit is een koala'),
(4, 73, 'Lighthouse.jpg', 'dfg'),
(5, 73, 'Chrysanthemum.jpg', 'Chrysant'),
(6, 73, 'Hydrangeas.jpg', 'Waterstruik'),
(7, 73, 'Koala.jpg', 'Koala'),
(8, 73, 'Penguins.jpg', 'penquins'),
(9, 73, 'Tulips.jpg', 'Tulpen'),
(10, 73, 'Jellyfish.jpg', 'Kwal'),
(11, 73, 'Penguins.jpg', 'Nog meer penquins'),
(12, 73, 'Jellyfish.jpg', 'kwal');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `infix` varchar(10) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `addressnumber` varchar(10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `country` varchar(200) NOT NULL,
  `telephonenumber` varchar(13) NOT NULL,
  `mobilenumber` varchar(13) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `infix`, `surname`, `address`, `addressnumber`, `city`, `zipcode`, `country`, `telephonenumber`, `mobilenumber`) VALUES
(171, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '17', 'Castricum', '1901CB', 'Nederland', '0616161616161', '0616161616161'),
(173, 'Bert', 'van', 'Straaten', 'Prins Hendrikstraat', '17', 'Castricum', '1901CB', 'Nederland', '1023234249', '1939293949'),
(177, 'Sjaak', 'de', 'Vries', 'Prins Hendrikstraat', '17', 'Castricum', '1901CB', 'Nederland', '0123456789', '0123456789');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
