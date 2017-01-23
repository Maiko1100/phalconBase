-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Machine: localhost:3306
-- Gegenereerd op: 23 jan 2017 om 18:01
-- Serverversie: 5.5.41-log
-- PHP-versie: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `phalconbase`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `app_user`
--

CREATE TABLE IF NOT EXISTS `app_user` (
`app_user_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Gegevens worden geëxporteerd voor tabel `app_user`
--

INSERT INTO `app_user` (`app_user_id`, `first_name`, `last_name`, `email_address`, `password`, `role_id`) VALUES
(10, NULL, NULL, 'ezra@test.nl', '$2a$08$Q3WHCTQ2L6rlZKDZIWY73eOUDl1nkSSERQVNadJkxbJf3e8iZXx2S', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `app_user_token`
--

CREATE TABLE IF NOT EXISTS `app_user_token` (
  `app_user_id` int(11) NOT NULL,
  `token` varchar(45) NOT NULL,
  `token_expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `app_user_token`
--

INSERT INTO `app_user_token` (`app_user_id`, `token`, `token_expire_date`) VALUES
(10, '8hZdqWD8ajh6d9P', '2017-01-30 17:48:30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`role_id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `role`
--

INSERT INTO `role` (`role_id`, `title`) VALUES
(1, 'user_app'),
(2, 'user_banned');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `app_user`
--
ALTER TABLE `app_user`
 ADD PRIMARY KEY (`app_user_id`), ADD KEY `fk_app_user_role_idx` (`role_id`);

--
-- Indexen voor tabel `app_user_token`
--
ALTER TABLE `app_user_token`
 ADD PRIMARY KEY (`app_user_id`), ADD KEY `fk_app_user_token_app_user1_idx` (`app_user_id`);

--
-- Indexen voor tabel `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `app_user`
--
ALTER TABLE `app_user`
MODIFY `app_user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `role`
--
ALTER TABLE `role`
MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `app_user`
--
ALTER TABLE `app_user`
ADD CONSTRAINT `fk_app_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `app_user_token`
--
ALTER TABLE `app_user_token`
ADD CONSTRAINT `fk_app_user_token_app_user1` FOREIGN KEY (`app_user_id`) REFERENCES `app_user` (`app_user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
