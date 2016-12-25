-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Pon 12. zář 2016, 12:27
-- Verze serveru: 5.7.9
-- Verze PHP: 5.5.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `stepan`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `name`, `detail`, `price`, `category`, `added`, `picture`) VALUES
(3, 'novÃ©', 'novÃ©', 1000, 'NovÃ¡', '2016-09-11 19:11:19', ''),
(4, 'Skateboard Darkstar Ultimate', 'ProfesionÃ¡lnÃ­ skateboardovÃ½ komplet od svÄ›tovÃ© firmy Darkstar. Deska je slepenÃ¡ ze 7 vrstev ze 100% kanadskÃ©ho javoru o Å¡Ã­Å™ce 7,7. Komplet je plnÄ› sestaven a pÅ™ipraven k jÃ­zdÄ› hned po rozbalenÃ­ z krabice. VhodnÃ½ pro dÄ›ti od 13 let', 1000, 'Skateboard komplety', '2016-09-11 19:16:27', 'http://www.boardmania.cz/imgs/products/Darkstar/1193956_Skateboard_Darkstar_Ultimate_Complete__blue_7_7__main.jpg'),
(8, 'Skateboard Baby Miller Original fluor blue', 'Baby Miller Original je plastovÃ½ mini longboard,cruiser Äi skateboard, opravdu nabÃ­dne vÅ¡e v jednom balenÃ­ od Å¡panÄ›lskÃ© znaÄky Miller Division. Deska Baby je vhodnÃ¡ jak pro dÄ›ti, tak pro dospÄ›lÃ©. Tento prakticky nezniÄitelnÃ½ cruiser s malÃ½mi rozmÄ›ry ocenÃ­te pÅ™edevÅ¡Ã­m pÅ™i jÃ­zdÄ› mÄ›stem a jeho pÅ™enÃ¡Å¡enÃ­, je ale ideÃ¡lnÃ­ i na rampy, carving, cruising a slamom. UÅ¾ijte si skateboarding jako nikdy pÅ™edtÃ­m', 2000, 'DÄ›tskÃ© skaty', '2016-09-12 13:57:42', 'http://www.boardmania.cz/imgs/products/Miller/1195031_Skateboard_Baby_Miller_Original_fluor_blue_2015_main.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `item_id`, `tag`) VALUES
(5, 8, 'skateboard'),
(6, 8, 'complet'),
(7, 8, 'top'),
(8, 8, 'mega'),
(9, 8, 'super');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pro tabulku `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
