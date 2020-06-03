-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2020 at 01:34 AM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jjdplant`
--

-- --------------------------------------------------------

--
-- Table structure for table `trampz_categorii`
--

CREATE TABLE `trampz_categorii` (
  `id` smallint(6) NOT NULL,
  `nume_en` text NOT NULL,
  `nume_de` int(11) NOT NULL,
  `nume` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trampz_fisiere`
--

CREATE TABLE `trampz_fisiere` (
  `id` int(4) NOT NULL,
  `tip` text NOT NULL,
  `numefisier` text NOT NULL,
  `descrierefisier` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trampz_fisiere`
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
(37, '1', '50abbd150a3d2Jellyfish.jpg', ''),
(38, '6', '5e616d86d822c1 (1).jpg', ''),
(39, '6', '5e616d86d82751 (2).jpg', ''),
(40, '6', '5e616d86d82ad1 (3).jpg', ''),
(41, '6', '5e616d86d82e41 (5).jpg', ''),
(42, '7', '5e61ec66e1631martin-shreder-349256-opt.jpg', ''),
(43, '8', '5e623016dbdb94.jpg', ''),
(44, '8', '5e623016dbe012.jpg', ''),
(45, '8', '5e623016dbe391.jpg', ''),
(46, '8', '5e623016dbe7013.jpg', ''),
(47, '9', '5e6246acc5c481.jpg', ''),
(48, '9', '5e6246acc5c912.jpg', ''),
(49, '9', '5e6246acc5cc93.jpg', ''),
(50, '9', '5e6246acc5d0111.jpg', ''),
(51, '10', '5e6247f97af1f1.jpg', ''),
(52, '10', '5e6247f97af683.jpg', ''),
(53, '10', '5e6247f97af9f10.jpg', ''),
(54, '10', '5e6247f97afd65.jpg', ''),
(55, '11', '5e624859b68daJBA00284.jpg', ''),
(56, '11', '5e624859b6909JBA00284_(4).jpg', ''),
(57, '11', '5e624859b6947JBA00284_(5).jpg', ''),
(58, '11', '5e624859b6983JBA00284_(12).jpg', ''),
(59, '12', '5e6249019b1021.jpg', ''),
(60, '12', '5e6249019b14c2.jpg', ''),
(61, '12', '5e6249019b1848.jpg', ''),
(62, '12', '5e6249019b1bb11.jpg', ''),
(63, '13', '5e6378cf1397f1.jpg', ''),
(64, '13', '5e6378cf139cb8.jpg', ''),
(65, '13', '5e6378cf13a044.jpg', ''),
(66, '13', '5e6378cf13a3d2.jpg', ''),
(67, '14', '5e63793bca83d3.jpg', ''),
(68, '14', '5e63793bca8852.jpg', ''),
(69, '14', '5e63793bca8bc5.jpg', ''),
(70, '14', '5e63793bca8f44.jpg', ''),
(71, '15', '5e63799031c151.jpeg', ''),
(72, '15', '5e63799031c5f2.jpeg', ''),
(73, '15', '5e63799031c964.jpeg', ''),
(74, '15', '5e63799031cce9.jpeg', ''),
(75, '16', '5e637a0e028a91 (5).jpg', ''),
(76, '16', '5e637a0e028f21 (7).jpg', ''),
(77, '16', '5e637a0e0292a1 (8).jpg', ''),
(78, '16', '5e637a0e029621 (9).jpg', ''),
(79, '16', '5e637a0e0299a1 (14).jpg', ''),
(80, '17', '5e637aa1813653.jpg', ''),
(81, '17', '5e637aa1813b04.jpg', ''),
(82, '17', '5e637aa1813e95.JPG', ''),
(83, '17', '5e637aa1814216.JPG', ''),
(84, '18', '5e637b5088abf1 (1).jpg', ''),
(85, '18', '5e637b5088b0d1 (17).jpg', ''),
(86, '18', '5e637b5088b461 (18).jpg', ''),
(87, '18', '5e637b5088b7e1 (14).jpg', ''),
(88, '19', '5e637c67243b61 (6).jpg', ''),
(89, '19', '5e637c67243ff1 (9).jpg', ''),
(90, '19', '5e637c67244371 (16).jpg', ''),
(91, '19', '5e637c672446e1 (23).jpg', ''),
(92, '20', '5e72019b7590fclass.jpg', ''),
(93, '21', '5e7201eb5184d15486_5369277224681.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `trampz_pagini`
--

CREATE TABLE `trampz_pagini` (
  `pagina_id` smallint(6) NOT NULL,
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
  `pagina_copyright` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trampz_pagini`
--

INSERT INTO `trampz_pagini` (`pagina_id`, `pagina_parent`, `nume_en`, `nume_de`, `nume_es`, `nume_fr`, `pagina_ordine`, `continut_en`, `continut_de`, `continut_es`, `continut_fr`, `pagina_title`, `pagina_keywords`, `pagina_subject`, `pagina_description`, `pagina_abstract`, `pagina_copyright`) VALUES
(11, 0, 'Home', 'Home', 'Home', 'Home', 0, '<p>ANT PLANT LTD is the leading independent provider of construction equipment in Durham and beyond.With contacts across the globe, we can source the machinery you need and ship it anywhere in the world. ANT PLANT LTD have many satisfied customers throughout more than 30 different countries.</p>\r\n<p>We are a team of highly motivated individuals working together to fulfil our mission for farmers &amp; constructors, \'to put what you need, within your reach\'.</p>\r\n<p>Call us to discuss !</p>', '<p>Gruw</p>', '<p>Testo</p>', '<p>Tezst</p>', 'ANT PLANT LTD.', 'ANT PLANT LTD.', 'ANT PLANT LTD.', 'ANT PLANT LTD.', '', 'ANT PLANT LTD.'),
(12, 0, 'Our Stock', 'Our Stock DE', 'Our Stock ES', 'Our Stock FR', 0, '', '', '', '', 'ANT PLANT LTD.', 'ANT PLANT LTD.', 'ANT PLANT LTD.', 'ANT PLANT LTD.', '', 'ANT PLANT LTD.'),
(14, 0, 'About Us', 'About Us DE', 'About Us ES', 'About Us FR', 0, '<p>ANT PLANT LTD is the leading independent provider of construction equipment in Durham and beyond.With contacts across the globe, we can source the machinery you need and ship it anywhere in the world. ANT PLANT LTD have many satisfied customers throughout more than 30 different countries.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '<p>about us de</p>', '<p>about us es</p>', '<p>about us fr</p>\r\n<p>hey this is fr added</p>', 'ANT PLANT LTD.', 'ANT PLANT LTD.', 'ANT PLANT LTD.', 'ANT PLANT LTD.', '', 'ANT PLANT LTD.'),
(21, 999, 'Tractors', 'Tractors', 'Tractors', 'Tractors', 0, '', '', '', '', '', '', '', '', '', ''),
(15, 0, 'Contact', 'Kontakt ', 'Contacto', 'Contacter', 0, '<p><strong>ANT PLANT LIMITED</strong><br />Office One Eco Tyres, Rosebay Road, <br />Littleburn Industrial Estate, <br />Langley Moor, Durham, DH7 8HJ<br />United Kingdom</p>\r\n<p>Phone : <strong>+44 191-249-9935</strong> / <strong>+44 191-249-8707</strong><br /><strong><a href=\"mailto:office@antplant.co.uk\">office@jjdplanthire.co.uk</a></strong></p>\r\n<p>Reg No: <strong>07845308</strong></p>\r\n<p>&nbsp;</p>', '', '', '', 'ANT PLANT LTD.', 'ANT PLANT LTD.', 'ANT PLANT LTD.', 'ANT PLANT LTD.', '', 'ANT PLANT LTD.'),
(16, 999, 'Backhoe Loaders', 'Backhoe Loaders DE', 'Backhoe Loaders ES', 'Backhoe Loaders FR', 0, '', '', '', '', '', '', '', '', '', ''),
(17, 999, 'Tracked Excavators', 'Tracked Excavators DE', 'Tracked Excavators ES', 'Tracked Excavators FR', 0, '', '', '', '', '', '', '', '', '', ''),
(18, 999, 'Wheeled Excavators', 'Wheeled Excavators DE', 'Wheeled Excavators ES', 'Wheeled Excavators FR', 0, '', '', '', '', '', '', '', '', '', ''),
(19, 999, 'Telescopic Loaders', 'Telescopic Loaders DE', 'Telescopic Loaders ES', 'Telescopic Loaders FR', 0, '', '', '', '', '', '', '', '', '', ''),
(20, 999, 'Mini Excavators', 'Mini Excavators', 'Mini Excavators', 'Mini Excavators', 0, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `trampz_produse`
--

CREATE TABLE `trampz_produse` (
  `id` smallint(6) NOT NULL,
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
  `featured` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trampz_produse`
--

INSERT INTO `trampz_produse` (`id`, `nume_en`, `stock`, `model`, `make`, `year`, `hours`, `price`, `location`, `specs_en`, `specs_de`, `specs_fr`, `specs_es`, `parinte`, `featured`) VALUES
(15, '2000 Caterpillar 325BL', '', '325BL', 'Caterpillar ', '2000 ', 8231, 'POA', 'Durham, UK', '', '', '', '', '17', 0),
(16, '2012 Atlas 160W ', '', '160W ', 'Atlas ', '2012 ', 7804, 'POA', 'Durham, UK', '', '', '', '', '18', 0),
(8, '2010 JCB 3CX Sitemaster', '', '3CX Sitemaster 4x4', 'JCB', '2010', 6963, 'POA', 'Durham, UK', '', '', '', '', '16', 1),
(9, '2011 VOLVO EC 55', '', ' EC 55', 'VOLVO', '2011', 3252, 'POA', 'Durham, UK', '', '', '', '', '20', 1),
(12, '2004 New Holland TS 125 A', '', 'TS 125 A', 'New Holland ', '2004 ', 6399, 'POA', 'Durham, UK', '', '', '', '', '21', 1),
(13, '2008 TAKEUCHI TB 235', '', 'TB 235', 'TAKEUCHI ', '2008', 1091, 'POA', 'Durham, UK', '', '', '', '', '20', 1),
(14, '2005 Caterpillar M318C', '', 'M318C', 'Caterpillar ', '2005 ', 9043, 'POA', 'Durham, UK', '', '', '', '', '18', 0),
(11, '2009 CAT 432E EVOLUTION', '', 'CAT ', '432E EVOLUTION', '2009', 2564, 'POA', 'Durham, UK', '', '', '', '', '16', 0),
(10, '2012 Hyundai Robex 145 LCR-9', '', 'Robex', 'Hyundai ', '2012 ', 6066, 'POA', 'Durham, UK', '', '', '', '', '17', 0),
(17, '2015 Bobcat E26 EM', '', 'E26 EM', 'Bobcat ', '2015', 1205, 'POA', 'Durham, UK', '', '', '', '', '20', 0),
(18, '2014 MASSEY FERGUSON 7626', '', '7626', 'MASSEY FERGUSON ', '2014 ', 2589, 'POA', 'Durham, UK', '', '', '', '', '21', 0),
(19, '2010 MANITOU MLT 627 TURBO', '', 'MLT 627 TURBO', 'MANITOU ', '2010', 1771, 'POA', 'Durham, UK', '', '', '', '', '19', 0),
(20, 'CLAAS Axion 830', '', 'Axion 830', 'CLAAS ', '2015', 0, 'POA', 'Durham, UK', '', '', '', '', '21', 0),
(21, '2012 Volvo EW180D ', '', 'EW180D', 'Volvo ', '2012 ', 0, 'POA', 'Durham, UK', '', '', '', '', '18', 0),
(22, '2015 CLAAS Axion 830 ', '', 'Axion 830 ', 'CLAAS ', '2015 ', 0, 'POA', 'Durham, UK', '', '', '', '', '21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trampz_utilizator`
--

CREATE TABLE `trampz_utilizator` (
  `nume` text NOT NULL,
  `parola` text NOT NULL,
  `email_contact` text NOT NULL,
  `firma_nume` text NOT NULL,
  `firma_slogan` text NOT NULL,
  `numar_contact` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trampz_utilizator`
--

INSERT INTO `trampz_utilizator` (`nume`, `parola`, `email_contact`, `firma_nume`, `firma_slogan`, `numar_contact`) VALUES
('admin', '458971e33575b4bffd4f4e2a946e7eb7', 'office@antplant.co.uk', 'ANT PLANT LTD.', 'ANT PLANT LTD.', '+44 (191) 249-9935');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trampz_fisiere`
--
ALTER TABLE `trampz_fisiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trampz_pagini`
--
ALTER TABLE `trampz_pagini`
  ADD PRIMARY KEY (`pagina_id`);

--
-- Indexes for table `trampz_produse`
--
ALTER TABLE `trampz_produse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trampz_fisiere`
--
ALTER TABLE `trampz_fisiere`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `trampz_pagini`
--
ALTER TABLE `trampz_pagini`
  MODIFY `pagina_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trampz_produse`
--
ALTER TABLE `trampz_produse`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
