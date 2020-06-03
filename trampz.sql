-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Gazda: localhost
-- Timp de generare: 21 Noi 2012 la 18:41
-- Versiune server: 5.1.65
-- Versiune PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza de date: `workallr_cms`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `trampz_categorii`
--

CREATE TABLE IF NOT EXISTS `trampz_categorii` (
  `id` smallint(6) NOT NULL,
  `nume_en` text NOT NULL,
  `nume_de` int(11) NOT NULL,
  `nume` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `trampz_fisiere`
--

CREATE TABLE IF NOT EXISTS `trampz_fisiere` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tip` text NOT NULL,
  `numefisier` text NOT NULL,
  `descrierefisier` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Salvarea datelor din tabel `trampz_fisiere`
--

INSERT INTO `trampz_fisiere` (`id`, `tip`, `numefisier`, `descrierefisier`) VALUES
(35, '5', '50a7955b4a86e5.jpg', ''),
(34, '5', '50a7955b4a4834.jpg', ''),
(32, '5', '50a7955b49cb81.jpg', ''),
(33, '5', '50a7955b4a09c2.jpg', ''),
(30, '4', '50a794e396f247.jpg', ''),
(31, '4', '50a794e39730f8.jpg', ''),
(27, '4', '50a794e3963771.jpg', ''),
(22, '3', '50a78efee2d681.jpg', ''),
(28, '4', '50a794e3967572.jpg', ''),
(29, '4', '50a794e396b4b3.jpg', ''),
(23, '3', '50a78efee314b2.jpg', ''),
(24, '3', '50a78efee35323.jpg', ''),
(25, '3', '50a78efee391c4.jpg', ''),
(26, '3', '50a78efee3d057.jpg', ''),
(36, '5', '50a7955b4ac537.jpg', ''),
(37, '1', '50abbd150a3d2Jellyfish.jpg', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `trampz_pagini`
--

CREATE TABLE IF NOT EXISTS `trampz_pagini` (
  `pagina_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pagina_parent` smallint(6) NOT NULL,
  `nume_en` varchar(255) NOT NULL,
  `nume_de` text NOT NULL,
  `nume_es` text NOT NULL,
  `nume_fr` text NOT NULL,
  `pagina_ordine` smallint(6) NOT NULL,
  `continut_en` text NOT NULL,
  `continut_de` text NOT NULL,
  `continut_es` text NOT NULL,
  `continut_fr` text NOT NULL,
  `pagina_title` text NOT NULL,
  `pagina_keywords` text NOT NULL,
  `pagina_subject` text NOT NULL,
  `pagina_description` text NOT NULL,
  `pagina_abstract` text NOT NULL,
  `pagina_copyright` text NOT NULL,
  PRIMARY KEY (`pagina_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Salvarea datelor din tabel `trampz_pagini`
--

INSERT INTO `trampz_pagini` (`pagina_id`, `pagina_parent`, `nume_en`, `nume_de`, `nume_es`, `nume_fr`, `pagina_ordine`, `continut_en`, `continut_de`, `continut_es`, `continut_fr`, `pagina_title`, `pagina_keywords`, `pagina_subject`, `pagina_description`, `pagina_abstract`, `pagina_copyright`) VALUES
(11, 0, 'Home', 'Home', 'Home', 'Home', 0, '<p>TEST</p>', '<p>Gruw</p>', '<p>Testo</p>', '<p>Tezst</p>', '', '', '', '', '', ''),
(12, 0, 'Stocklist', 'Stocklist DE', 'Stocklist ES', 'Stocklist FR', 0, '', '', '', '', '', '', '', '', '', ''),
(13, 0, 'Rental Services', 'Rental Services DE', 'Rental Services ES', 'Rental Services FR', 0, '', '', '', '', '', '', '', '', '', ''),
(14, 0, 'About Us', 'About Us DE', 'About Us ES', 'About Us FR', 0, '<h1>about us en.</h1>\r\n<p>what about us,about us en. what about us,.&nbsp;about us en. what about us,</p>\r\n<p>&nbsp;</p>\r\n<div style="color: #000000; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; margin-top: 8px; margin-right: 8px; margin-bottom: 8px; margin-left: 8px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: #ffffff; ">\r\n<p style="text-align: justify; ">about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,&nbsp;about us en. what about us,</p>\r\n</div>\r\n<p>&nbsp;</p>', '<p>about us de</p>', '<p>about us es</p>', '<p>about us fr</p>\r\n<p>&nbsp;</p>', '', '', '', '', '', ''),
(15, 0, 'Contact', 'Kontakt ', 'Contacto', 'Contacter', 0, '', '', '', '', '', '', '', '', '', ''),
(16, 999, 'Backhoe Loaders', 'Backhoe Loaders DE', 'Backhoe Loaders ES', 'Backhoe Loaders FR', 0, '', '', '', '', '', '', '', '', '', ''),
(17, 999, 'Tracked Excavators', 'Tracked Excavators DE', 'Tracked Excavators ES', 'Tracked Excavators FR', 0, '', '', '', '', '', '', '', '', '', ''),
(18, 999, 'Wheeled Excavators', 'Wheeled Excavators DE', 'Wheeled Excavators ES', 'Wheeled Excavators FR', 0, '', '', '', '', '', '', '', '', '', ''),
(19, 999, 'Telescopic Loaders', 'Telescopic Loaders DE', 'Telescopic Loaders ES', 'Telescopic Loaders FR', 0, '', '', '', '', '', '', '', '', '', ''),
(20, 999, 'Mini Excavators', 'Mini Excavators', 'Mini Excavators', 'Mini Excavators', 0, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `trampz_produse`
--

CREATE TABLE IF NOT EXISTS `trampz_produse` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nume_en` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `hours` smallint(6) NOT NULL,
  `price` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `specs_en` text NOT NULL,
  `specs_de` text NOT NULL,
  `specs_fr` text NOT NULL,
  `specs_es` text NOT NULL,
  `parinte` varchar(255) NOT NULL,
  `featured` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Salvarea datelor din tabel `trampz_produse`
--

INSERT INTO `trampz_produse` (`id`, `nume_en`, `stock`, `model`, `make`, `year`, `hours`, `price`, `location`, `specs_en`, `specs_de`, `specs_fr`, `specs_es`, `parinte`, `featured`) VALUES
(1, 'JCB 8025 TZS', '19241241824124', '8025 TZS', 'JCB', '2012', 8, '67800', 'London', '<p>jcb 8025 engleza</p>', '<p>jcb 8025 germana</p>\r\n<p>&nbsp;</p>', '<p>jcb 8025 franceza</p>', '<p>jcb 8025 spaniola</p>', '16', 1),
(3, '2004 VOLVO EC55B', '109009', 'EC55B', 'VOLVO ', '2004 ', 3333, 'POA', 'United KIngdom', '<p>\r\n<object width="325" height="250" data="http://www.youtube.com/v/R5mV3a8i7fs" type="application/x-shockwave-flash">\r\n<param name="src" value="http://www.youtube.com/v/R5mV3a8i7fs" />\r\n</object>\r\n</p>\r\n<p>Well Maintained, Serviced Regularly, Priced to Sell. Must See!!!<br />Twist o Wrist, 1'' bucket, 2'' bucket and Clean out bucket available!! Low Hours!</p>', '', '', '', '20', 0),
(2, '2004 BOBCAT 442', '109009', '442', 'BOBCAT ', '2004 ', 3221, 'POA', 'United Kingdom', '', '', '', '', '16', 0),
(4, '2008 JCB 4CX', '12201', '4CX', 'JCB ', '2008 ', 815, 'POA', 'United Kingdom', '', '', '', '', '16', 1),
(5, '2007 VOLVO BL70', '12202', 'BL70', 'VOLVO ', '2007 ', 1700, 'POA', 'United Kingdom', '', '', '', '', '16', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `trampz_utilizator`
--

CREATE TABLE IF NOT EXISTS `trampz_utilizator` (
  `nume` text NOT NULL,
  `parola` text NOT NULL,
  `email_contact` text NOT NULL,
  `firma_nume` text NOT NULL,
  `firma_slogan` text NOT NULL,
  `numar_contact` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `trampz_utilizator`
--

INSERT INTO `trampz_utilizator` (`nume`, `parola`, `email_contact`, `firma_nume`, `firma_slogan`, `numar_contact`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'gruasy@gmail.com', '', '', '098765232424');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
