-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 25 Kwi 2020, 17:33
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ClubDB`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Clients`
--

CREATE TABLE `Clients` (
  `client_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `user_login` text NOT NULL,
  `user_password` text NOT NULL,
  `create_date` date DEFAULT NULL,
  `privileges` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Clients`
--

INSERT INTO `Clients` (`client_id`, `first_name`, `last_name`, `email`, `date_of_birth`, `user_login`, `user_password`, `create_date`, `privileges`) VALUES
(1, 'Janusz', 'Biernat', 'ferferferf', '2020-04-07', 'erferfref', 'eferferf', '2020-04-06', 'erfreferf'),
(2, 'Dawid', 'Marczak', 'to', '2020-04-07', 'menda', 'pazdzioch', '2020-04-06', 'jajco'),
(3, 'Dawid', 'Marczak', 'to', '2020-04-07', 'menda', 'pazdzioch', '2020-04-06', 'nicNieMozeszGnojku');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Clubs`
--

CREATE TABLE `Clubs` (
  `club_ID` int(11) NOT NULL,
  `clubname` text NOT NULL,
  `city` text NOT NULL,
  `stadium` text NOT NULL,
  `club_address` text NOT NULL,
  `path_img_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Clubs`
--

INSERT INTO `Clubs` (`club_ID`, `clubname`, `city`, `stadium`, `club_address`, `path_img_logo`) VALUES
(1, 'Slask Wroclaw', 'Wroclaw', 'Stadion Wroclaw', 'aleja slaska', 'asdasdasd'),
(2, 'Lechia', 'Gdansk', 'PGE Arena', 'adasd', 'adasd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Matches`
--

CREATE TABLE `Matches` (
  `match_ID` int(11) NOT NULL,
  `club_home_ID` int(11) NOT NULL,
  `club_away_ID` int(11) NOT NULL,
  `stadium` text NOT NULL,
  `match_address` text NOT NULL,
  `amount_of_spectators` int(11) DEFAULT NULL,
  `earnings` double DEFAULT NULL,
  `date_of_match` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Matches`
--

INSERT INTO `Matches` (`match_ID`, `club_home_ID`, `club_away_ID`, `stadium`, `match_address`, `amount_of_spectators`, `earnings`, `date_of_match`) VALUES
(1, 1, 2, 'adasd', 'asdasd', NULL, NULL, '2020-04-13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `News`
--

CREATE TABLE `News` (
  `news_ID` int(11) NOT NULL,
  `title` text NOT NULL,
  `content_path` text NOT NULL,
  `news_img_path` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `client_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `News`
--

INSERT INTO `News` (`news_ID`, `title`, `content_path`, `news_img_path`, `tags`, `client_ID`) VALUES
(1, 'dasdasdasd', 'adsasdasd', 'asdasdasd', 'asdsadsad', 1),
(2, 'dasdasdaSassASasdadasdasd', 'xxxx', 'asdasdasd', 'asdsadsad', 1),
(3, 'dasdasdaSassASasdadasdasd', 'xxxx', 'asdasdasd', 'asdsadsad', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Players`
--

CREATE TABLE `Players` (
  `player_ID` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `nationality` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` text NOT NULL,
  `position` text NOT NULL,
  `player_value` int(11) NOT NULL,
  `player_img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Players`
--

INSERT INTO `Players` (`player_ID`, `first_name`, `last_name`, `age`, `height`, `nationality`, `date_of_birth`, `place_of_birth`, `position`, `player_value`, `player_img_path`) VALUES
(1, 'Marco', 'Paixao', 35, 185, 'Portugalia', '1984-10-19', 'Sesimbra', 'Napastnik', 1000000, 'sadsd'),
(2, 'Dino', 'JAJAJ', 28, 193, 'Polska', '1987-05-23', 'Krakow', 'Pomocnik', 600000, 'svsdv'),
(4, 'Dino', 'Stiglec', 28, 193, 'Polska', '1987-05-23', 'Krakow', 'Pomocnik', 600000, 'svsdv');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Seats`
--

CREATE TABLE `Seats` (
  `seat_ID` int(11) NOT NULL,
  `sector` text NOT NULL,
  `seat_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Seats`
--

INSERT INTO `Seats` (`seat_ID`, `sector`, `seat_value`) VALUES
(1, 'C', 25),
(2, 'B', 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Stadium`
--

CREATE TABLE `Stadium` (
  `ticket_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tickets`
--

CREATE TABLE `Tickets` (
  `ticket_ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `seat_ID` int(11) NOT NULL,
  `match_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Workers`
--

CREATE TABLE `Workers` (
  `worker_ID` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `age` int(11) NOT NULL,
  `nationality` text NOT NULL,
  `worker_role` text NOT NULL,
  `worker_img_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Workers`
--

INSERT INTO `Workers` (`worker_ID`, `first_name`, `last_name`, `age`, `nationality`, `worker_role`, `worker_img_path`) VALUES
(1, 'Viteslav', 'Lavicka', 67, 'Czechy', 'Trener', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indeksy dla tabeli `Clubs`
--
ALTER TABLE `Clubs`
  ADD PRIMARY KEY (`club_ID`);

--
-- Indeksy dla tabeli `Matches`
--
ALTER TABLE `Matches`
  ADD PRIMARY KEY (`match_ID`),
  ADD KEY `club_home_ID` (`club_home_ID`),
  ADD KEY `club_away_ID` (`club_away_ID`);

--
-- Indeksy dla tabeli `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`news_ID`),
  ADD KEY `author` (`client_ID`);

--
-- Indeksy dla tabeli `Players`
--
ALTER TABLE `Players`
  ADD PRIMARY KEY (`player_ID`);

--
-- Indeksy dla tabeli `Seats`
--
ALTER TABLE `Seats`
  ADD PRIMARY KEY (`seat_ID`);

--
-- Indeksy dla tabeli `Stadium`
--
ALTER TABLE `Stadium`
  ADD KEY `ticket_ID` (`ticket_ID`);

--
-- Indeksy dla tabeli `Tickets`
--
ALTER TABLE `Tickets`
  ADD PRIMARY KEY (`ticket_ID`),
  ADD KEY `client_ID` (`client_ID`),
  ADD KEY `match_ID` (`match_ID`),
  ADD KEY `seat_ID` (`seat_ID`);

--
-- Indeksy dla tabeli `Workers`
--
ALTER TABLE `Workers`
  ADD PRIMARY KEY (`worker_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Clients`
--
ALTER TABLE `Clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `Clubs`
--
ALTER TABLE `Clubs`
  MODIFY `club_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `News`
--
ALTER TABLE `News`
  MODIFY `news_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `Players`
--
ALTER TABLE `Players`
  MODIFY `player_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `Seats`
--
ALTER TABLE `Seats`
  MODIFY `seat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `Tickets`
--
ALTER TABLE `Tickets`
  MODIFY `ticket_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Workers`
--
ALTER TABLE `Workers`
  MODIFY `worker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Matches`
--
ALTER TABLE `Matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`club_home_ID`) REFERENCES `Clubs` (`club_ID`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`club_away_ID`) REFERENCES `Clubs` (`club_ID`);

--
-- Ograniczenia dla tabeli `News`
--
ALTER TABLE `News`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`client_ID`) REFERENCES `Clients` (`client_id`);

--
-- Ograniczenia dla tabeli `Stadium`
--
ALTER TABLE `Stadium`
  ADD CONSTRAINT `stadium_ibfk_1` FOREIGN KEY (`ticket_ID`) REFERENCES `Tickets` (`ticket_ID`);

--
-- Ograniczenia dla tabeli `Tickets`
--
ALTER TABLE `Tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`client_ID`) REFERENCES `Clients` (`client_id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`match_ID`) REFERENCES `Matches` (`match_ID`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`seat_ID`) REFERENCES `Seats` (`seat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
