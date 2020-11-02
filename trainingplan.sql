-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Nov 2020 um 12:19
-- Server-Version: 10.1.37-MariaDB
-- PHP-Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `trainingplan`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `date`) VALUES
(1, 'My title', 'You guys realize you live in a sewer, right? WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! No! The kind with looting and maybe starting a few fires! And when we woke up, we had these bodies. Now what? Fry! Stay back! He\'s too powerful!\r\n\r\nDoes anybody else feel jealous and aroused and worried? That\'s the ONLY thing about being a slave. We\'ll go deliver this crate like professionals, and then we\'ll go home. As an interesting side note, as a head without a body, I envy the dead.\r\n\r\nHey, guess what you\'re accessories to. Yes, I saw. You were doing well, until everyone died. Say what? OK, this has gotta stop. I\'m going to remind Fry of his humanity the way only a woman can. Yes, if you make it look like an electrical fire. When you do things right, people won\'t be sure you\'ve done anything at all.', '2020-10-31 16:01:09'),
(2, 'My title', 'You guys realize you live in a sewer, right? WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! No! The kind with looting and maybe starting a few fires! And when we woke up, we had these bodies. Now what? Fry! Stay back! He\'s too powerful!\r\n\r\nDoes anybody else feel jealous and aroused and worried? That\'s the ONLY thing about being a slave. We\'ll go deliver this crate like professionals, and then we\'ll go home. As an interesting side note, as a head without a body, I envy the dead.\r\n\r\nHey, guess what you\'re accessories to. Yes, I saw. You were doing well, until everyone died. Say what? OK, this has gotta stop. I\'m going to remind Fry of his humanity the way only a woman can. Yes, if you make it look like an electrical fire. When you do things right, people won\'t be sure you\'ve done anything at all.\r\n', '2020-10-31 21:44:24'),
(3, 'My title', 'You guys realize you live in a sewer, right? WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! No! The kind with looting and maybe starting a few fires! And when we woke up, we had these bodies. Now what? Fry! Stay back! He\'s too powerful!\r\n\r\nDoes anybody else feel jealous and aroused and worried? That\'s the ONLY thing about being a slave. We\'ll go deliver this crate like professionals, and then we\'ll go home. As an interesting side note, as a head without a body, I envy the dead.\r\n\r\nHey, guess what you\'re accessories to. Yes, I saw. You were doing well, until everyone died. Say what? OK, this has gotta stop. I\'m going to remind Fry of his humanity the way only a woman can. Yes, if you make it look like an electrical fire. When you do things right, people won\'t be sure you\'ve done anything at all.', '2020-10-31 21:47:43');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
