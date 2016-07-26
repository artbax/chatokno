-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: 192.168.101.142
-- Czas wygenerowania: 03 Wrz 2015, 20:01
-- Wersja serwera: 5.5.43-37.2-log
-- Wersja PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `priv789_czatokno`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chatbot`
--

CREATE TABLE IF NOT EXISTS `chatbot` (
  `chatbot_id` int(50) NOT NULL AUTO_INCREMENT,
  `chatbot_word` varchar(50) NOT NULL,
  `chatbot_sentence` varchar(200) NOT NULL,
  PRIMARY KEY (`chatbot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `chatbot`
--

INSERT INTO `chatbot` (`chatbot_id`, `chatbot_word`, `chatbot_sentence`) VALUES
(1, 'tak', 'tez tak sadze, jak zawsze warto pomyslec o tym'),
(2, 'nie', 'nie, nie..chociaz trudno tak jednoznacznie stwierdzic..');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chat_user`
--

CREATE TABLE IF NOT EXISTS `chat_user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_date` varchar(100) NOT NULL,
  `user_nick` varchar(100) NOT NULL,
  `user_imie` varchar(100) NOT NULL,
  `user_nazwisko` varchar(100) NOT NULL,
  `user_sex` int(10) NOT NULL DEFAULT '1',
  `user_description` text NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_small_avatar` varchar(200) NOT NULL,
  `user_big_avatar` varchar(100) NOT NULL,
  `user_status` int(10) NOT NULL,
  `user_permission` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`user_id`),
  KEY `user_sex` (`user_sex`),
  KEY `user_status` (`user_status`),
  KEY `user_permission` (`user_permission`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Zrzut danych tabeli `chat_user`
--

INSERT INTO `chat_user` (`user_id`, `user_date`, `user_nick`, `user_imie`, `user_nazwisko`, `user_sex`, `user_description`, `user_pass`, `user_email`, `user_small_avatar`, `user_big_avatar`, `user_status`, `user_permission`) VALUES
(15, '2015-08-17 23:36:31', 'artbax', 'Artur', 'Borkowski', 1, 'a jutro Ĺroda i ukĹady kombinacyjne', 'd6ae8697ab480df9a5455d19dacf46ae', 'artbaxcpp@gmail.com', 'avatars/artbax/42x42/phpYc89Kf', 'avatars/artbax/phpYc89Kf', 1, 3),
(16, '2015-08-18 13:03:53', 'maribiel', 'Mariusz', 'Bielawski', 1, 'Uzytkownik jeszcze nic o sobie nie napisal..', 'a8d470d3e6e8ebf8fffafeb7834ed192', 'bielawski.mariusz@gmail.com', 'avatars/maribiel/42x42/phpNMruwK', 'avatars/maribiel/phpNMruwK', 0, 3),
(18, '2015-08-26 09:16:02', 'elmo', 'Elmo', 'Sezamowy', 1, 'Uzytkownik jeszcze nic o sobie nie napisal..', '252c4bd114207c32d1afd805147871b6', 'elmo@wp.pl', 'img/he38x38.jpg', 'img/he.jpg', 1, 3),
(19, '2015-08-26 11:30:30', 'ola', 'Aleksandra', 'Zielonka', 2, 'hello boys!', '1306c0593ce21be923edfe1521f39bc4', 'ola@wp.pl', 'img/she38x38.jpg', 'img/she.jpg', 1, 3),
(20, '2015-08-26 12:11:19', 'amanda', 'Amanda', 'Szklarska', 2, 'Uzytkownik jeszcze nic o sobie nie napisal..', '5204f574824e42473b8f54a53e359972', 'amanda@wp.pl', 'img/she38x38.jpg', 'img/she.jpg', 0, 3),
(21, '2015-08-26 12:24:18', 'maja ', 'Maja', 'Szaficka', 2, 'Uzytkownik jeszcze nic o sobie nie napisal..', '599a613580507e376f4b97ee0e827c27', 'maja@wp.pl', 'img/she38x38.jpg', 'img/she.jpg', 1, 3),
(22, '2015-08-26 16:26:02', 'miki', 'MikoĹaj', 'Manaj', 1, 'Uzytkownik jeszcze nic o sobie nie napisal..', '222a00b671ad1a10013ee86c70e4527f', 'miki@wp.pl', 'img/he38x38.jpg', 'img/he.jpg', 1, 3),
(23, '2015-08-26 16:27:37', 'koko', 'Kasia', 'Kokowska', 2, 'Uzytkownik jeszcze nic o sobie nie napisal..', '2ac1d1b5a22bfa0116e0b98f186c8009', 'koko@wp.pl', 'img/she38x38.jpg', 'img/she.jpg', 1, 3),
(24, '2015-08-30 10:42:03', 'wawa', 'Warszawa', 'Polska', 2, 'Wawa jest cool', '0266e950e27123c9ea244c0c44f23038', 'wawa@gmail.com', 'img/she38x38.jpg', 'img/she.jpg', 0, 3),
(25, '2015-08-30 11:51:17', 'cyryl', 'Cyryl', 'Test', 1, 'Uzytkownik jeszcze nic o sobie nie napisal..', '5ce45e12bd976d50b4a5971f036a7ca9', 'cyryl@o2.pl', 'img/he38x38.jpg', 'img/he.jpg', 0, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_room`
--

CREATE TABLE IF NOT EXISTS `main_room` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `user_room` text NOT NULL,
  `message_room` text NOT NULL,
  `date_room` datetime NOT NULL,
  `bold_room` varchar(30) NOT NULL,
  `italic_room` varchar(30) NOT NULL,
  `underline_room` varchar(30) NOT NULL,
  `color_room` varchar(30) NOT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- Zrzut danych tabeli `main_room`
--

INSERT INTO `main_room` (`id_room`, `user_room`, `message_room`, `date_room`, `bold_room`, `italic_room`, `underline_room`, `color_room`) VALUES
(76, 'artbax', 'POKĂJ GĹĂWNY po restarcie', '2015-08-26 08:54:29', 'bold', '0', '0', 'rgb(32, 18, 77)'),
(77, 'artbax', 'jestem wylogowany <img src=\\''emoticon/neutral.png\\''/>', '2015-08-26 11:33:33', '0', '0', '0', 'rgb(0, 0, 0)'),
(78, 'ola', '<script>alert(\\"jestem ola\\");</script>', '2015-08-26 11:54:05', '0', '0', '0', 'rgb(0, 0, 0)'),
(79, 'elmo', 'ja tez uzyje szkodliwego kodu i wywale strone ', '2015-08-26 11:55:24', '0', '0', '0', 'rgb(254, 153, 3)'),
(81, 'elmo', 'nie udaĹo siÄ...i will try again..<img src=\\''emoticon/cool.png\\''/>', '2015-08-26 11:58:16', '0', '0', '0', 'rgb(0, 0, 0)'),
(82, 'ala', 'nie, nie..chociaz trudno tak jednoznacznie stwierdzic..', '2015-08-26 11:58:27', 'bold', 'italic', '0', '#0d333e'),
(83, 'ola', '<img src=\\''emoticon/smile2.png\\''/>', '2015-08-26 11:58:35', '0', '0', '0', 'rgb(0, 0, 0)'),
(85, 'ola', 'a teraz dodam Ĺadny link<a href=http://www.wp.pl target=\\''_blank\\''>www.wp.pl</a>', '2015-08-26 12:01:56', '0', '0', '0', 'rgb(106, 169, 80)'),
(86, 'maja ', 'jestem maja z Safari <img src=\\''emoticon/eee.png\\''/>', '2015-08-26 12:25:32', '0', '0', '0', 'rgb(213, 0, 6)'),
(87, 'artbax', 'witam w warszawie! <img src=\\''emoticon/twink.png\\''/>', '2015-08-28 20:34:31', 'bold', '0', '0', 'rgb(40, 78, 19)'),
(88, 'wawa', 'czesc rejestracja w wawie z ubuntu <img src=\\''emoticon/tongue.png\\''/>', '2015-08-30 10:43:00', '0', '0', 'underline', 'rgb(40, 78, 19)'),
(89, 'wawa', '<img src=\\''emoticon/cool.png\\''/>', '2015-08-30 10:43:09', '0', '0', 'underline', 'rgb(40, 78, 19)'),
(90, 'cyryl', 'czesc! zarejestrowaĹem  siÄ z kawiarni NERO', '2015-08-30 11:52:58', '0', 'italic', '0', 'rgb(76, 17, 49)'),
(91, 'cyryl', '<img src=\\''emoticon/smile2.png\\''/>', '2015-08-30 11:54:17', '0', '0', '0', 'rgb(76, 17, 49)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `permission_id` int(10) NOT NULL,
  `permission_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  UNIQUE KEY `permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `permission`
--

INSERT INTO `permission` (`permission_id`, `permission_name`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `room_four`
--

CREATE TABLE IF NOT EXISTS `room_four` (
  `id_room` int(11) NOT NULL,
  `user_room` text NOT NULL,
  `message_room` text NOT NULL,
  `date_room` datetime NOT NULL,
  `bold_room` varchar(30) NOT NULL,
  `italic_room` varchar(30) NOT NULL,
  `underline_room` varchar(30) NOT NULL,
  `color_room` varchar(30) NOT NULL DEFAULT 'rgb(0, 0, 0)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `room_four`
--

INSERT INTO `room_four` (`id_room`, `user_room`, `message_room`, `date_room`, `bold_room`, `italic_room`, `underline_room`, `color_room`) VALUES
(0, 'artbax', 'POKĂJ DLA CZWARTEGO ROKU', '2015-08-26 08:56:49', 'bold', 'italic', '0', 'rgb(32, 18, 77)'),
(0, 'ola', 'wywale strone szkodliwym kodem...', '2015-08-26 11:51:47', '0', '0', '0', 'rgb(0, 0, 0)'),
(0, 'ola', '<?php $user = \\"amanda\\"; ?>', '2015-08-26 11:52:36', '0', '0', '0', 'rgb(0, 0, 0)'),
(0, 'elmo', 'chyba sie nie udaĹo ? <img src=\\''emoticon/twink.png\\''/>', '2015-08-26 12:06:05', '0', '0', 'underline', 'rgb(230, 144, 59)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `room_one`
--

CREATE TABLE IF NOT EXISTS `room_one` (
  `id_room` int(11) NOT NULL,
  `user_room` text NOT NULL,
  `message_room` text NOT NULL,
  `date_room` datetime NOT NULL,
  `bold_room` varchar(30) NOT NULL,
  `italic_room` varchar(30) NOT NULL,
  `underline_room` varchar(30) NOT NULL,
  `color_room` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `room_one`
--

INSERT INTO `room_one` (`id_room`, `user_room`, `message_room`, `date_room`, `bold_room`, `italic_room`, `underline_room`, `color_room`) VALUES
(0, 'artbax', 'POKĂJ DLA PIERWSZEGO ROKU', '2015-08-26 08:55:04', 'bold', 'italic', '0', 'rgb(122, 63, 5)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `room_three`
--

CREATE TABLE IF NOT EXISTS `room_three` (
  `id_room` int(11) NOT NULL,
  `user_room` text NOT NULL,
  `message_room` text NOT NULL,
  `date_room` datetime NOT NULL,
  `bold_room` varchar(30) NOT NULL,
  `italic_room` varchar(30) NOT NULL,
  `underline_room` varchar(30) NOT NULL,
  `color_room` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `room_three`
--

INSERT INTO `room_three` (`id_room`, `user_room`, `message_room`, `date_room`, `bold_room`, `italic_room`, `underline_room`, `color_room`) VALUES
(0, 'artbax', 'POKĂJ DLA TRZECIEGO ROKU', '2015-08-26 08:55:45', 'bold', 'italic', '0', 'rgb(213, 0, 6)'),
(0, 'artbax', 'zaawansowane laboratorium kierunkowe ', '2015-09-03 07:18:50', 'bold', '0', '0', 'rgb(40, 78, 19)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `room_two`
--

CREATE TABLE IF NOT EXISTS `room_two` (
  `id_room` int(11) NOT NULL,
  `user_room` text NOT NULL,
  `message_room` text NOT NULL,
  `date_room` datetime NOT NULL,
  `bold_room` varchar(30) NOT NULL,
  `italic_room` varchar(30) NOT NULL,
  `underline_room` varchar(30) NOT NULL,
  `color_room` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `room_two`
--

INSERT INTO `room_two` (`id_room`, `user_room`, `message_room`, `date_room`, `bold_room`, `italic_room`, `underline_room`, `color_room`) VALUES
(0, 'artbax', 'POKĂJ DLA DRUGIEGO ROKU', '2015-08-26 08:55:23', 'bold', 'italic', '0', 'rgb(106, 169, 80)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sex`
--

CREATE TABLE IF NOT EXISTS `sex` (
  `sex_id` int(10) NOT NULL,
  `sex_name` varchar(40) NOT NULL,
  UNIQUE KEY `sex_id` (`sex_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `sex`
--

INSERT INTO `sex` (`sex_id`, `sex_name`) VALUES
(1, 'mezczyzna'),
(2, 'kobieta');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(10) NOT NULL,
  `status_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  UNIQUE KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(0, 'offline'),
(1, 'online');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `chat_user`
--
ALTER TABLE `chat_user`
  ADD CONSTRAINT `chat_user_ibfk_1` FOREIGN KEY (`user_sex`) REFERENCES `sex` (`sex_id`),
  ADD CONSTRAINT `chat_user_ibfk_2` FOREIGN KEY (`user_status`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `chat_user_ibfk_3` FOREIGN KEY (`user_permission`) REFERENCES `permission` (`permission_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
