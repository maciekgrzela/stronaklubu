-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Kwi 2020, 14:39
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `clubdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `user_login` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `user_password` varchar(500) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `email`, `date_of_birth`, `user_login`, `user_password`, `create_date`) VALUES
(1, 'Grzegorz', 'Krawczyk', 'gkrawczyk@stronaklubu.pl', '1987-07-19', 'gkrawczyk', '0ecdd847e27f7b9fd5942b983c3afa42', '2020-04-06 00:00:00'),
(2, 'Dawid', 'Marczak', 'to', '2020-04-07', 'menda', 'pazdzioch', '2020-04-06 00:00:00'),
(3, 'Dawid', 'Marczak', 'to', '2020-04-07', 'menda', 'pazdzioch', '2020-04-06 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clubs`
--

CREATE TABLE `clubs` (
  `club_ID` int(11) NOT NULL,
  `clubname` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `stadium` varchar(500) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `club_address` varchar(500) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `path_img_logo` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `clubs`
--

INSERT INTO `clubs` (`club_ID`, `clubname`, `city`, `stadium`, `club_address`, `path_img_logo`) VALUES
(1, 'Slask Wroclaw', 'Wroclaw', 'Stadion Wroclaw', 'aleja slaska', 'asdasdasd'),
(2, 'Lechia', 'Gdansk', 'PGE Arena', 'adasd', 'adasd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `matches`
--

CREATE TABLE `matches` (
  `match_ID` int(11) NOT NULL,
  `club_home_ID` int(11) NOT NULL,
  `club_away_ID` int(11) NOT NULL,
  `stadium` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `match_address` varchar(500) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `amount_of_spectators` int(11) DEFAULT NULL,
  `earnings` double DEFAULT NULL,
  `date_of_match` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `matches`
--

INSERT INTO `matches` (`match_ID`, `club_home_ID`, `club_away_ID`, `stadium`, `match_address`, `amount_of_spectators`, `earnings`, `date_of_match`) VALUES
(1, 1, 2, 'adasd', 'asdasd', NULL, NULL, '2020-04-13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `news_ID` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `content_path` longtext CHARACTER SET utf8 NOT NULL,
  `news_img_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tags` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `last_commented` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewers` int(11) NOT NULL DEFAULT '0',
  `worker_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`news_ID`, `title`, `content_path`, `news_img_path`, `created_at`, `tags`, `last_commented`, `viewers`, `worker_ID`) VALUES
(2, 'Piłkarze Śląska w jedynastkach kolejki!', 'Dino Stiglec i Michał Chrapek znaleźli się w najlepszych jedenastkach 23. kolejki PKO Ekstraklasy! Obaj zostali wyróżnieni za mecz z Górnikiem Zabrze.{hl}\r\nStiglec zdobył bramkę już w 3. minucie spotkania z Górnikiem Zabrze i pomógł drużynie odnieść niezwykle ważne zwycięstwo. Jego występ został doceniony i Chorwat znalazł się w jedenastce kolejki PKO Ekstraklasy, a także w drużynie kolejki wybieranej przez Canal+ i tygodnik \"Piłka Nożna\". Asystę przy bramce Dino{st} zaliczył Michał Chrapek, który również został doceniony przez tygodnik \"Piłka Nożna\".\r\n\r\nJedenastka 23. kolejki PKO Ekstraklasy: \r\n\r\nKuciak (Lechia Gdańsk) - Stiglec (Śląsk Wrocław), Wieteska (Legia Warszawa), Rymaniak (Piast Gliwice), Niepsuj (Wisła Kraków), Jóżwiak (Lech Poznań), Szczepański (Raków Częstochowa), Błaszczykowski (Wisła Kraków), Młyński (Arka Gdynia), Buksa (Wisła Kraków), Kante (Legia Warszawa)\r\n\r\nJedenastka tygodnika \"Piłka Nożna\":\r\n\r\nKuciak (Lechia Gdańsk) - Stiglec (Śląsk Wrocław), Rymaniak (Piast Gliwice), Czerwiński (Zagłębie Lubin) - Karbownik (Legia Warszawa), Tiba (Lech Poznań), Chrapek (Śląsk Wrocław), Błaszczykowski (Wisła Kraków) - Novikovas (Legia Warszawa), Młyński (Arka Gdynia), Kante (Legia Warszawa)', 'article5', '2020-04-27 18:03:14', 'Stiglec, Chrapek, Zabrze, PKO Ekstraklasa, Piłka Nożna, Canal+', '2020-04-28 12:18:53', 180, 2),
(3, 'Kadra Śląska na obóz na Cyprze', '27 zawodników zabierze na obóz w Ayia Napie trener Vitezslav Lavicka. Wrocławianie będą trenować na Cyprze od 19 do 29 stycznia.{hl}\r\nDrużyna wyruszy na obóz w sobotnią noc, a około godziny 6 wejdzie na pokład samolotu do cypryjskiej Larnak, skąd autokarem dojedzie do miejsca docelowego - Ayia Napy. Sztab WKS-u będzie miał do dyspozycji 27 zawodników.\r\n\r\nKadra Śląska na obóz na Cyprze (19-29 stycznia):\r\n\r\nBramkarze:\r\nMatus Putnocky, Dariusz Szczerbal, Bartosz Frasik, Daniel Kajzer{st}\r\n\r\nObrońcy:\r\nPiotr Celeban, Dino Stiglec, Israel Puerto, Wojciech Golla, Mariusz Pawelec, Kamil Dankowski, Konrad Poprawa\r\n\r\nPomocnicy:\r\nMichał Chrapek, Robert Pich, Przemysław Płacheta, Grzegorz Kotowicz, Marcin Szpakowski, Lubambo Musonda, Filip Marković, Jakub Łabojko, Diego Żivulić, Damian Gąska, Przemysław Bargiel, Krzysztof Mączyński, Bartosz Boruń\r\n\r\nNapastnicy:\r\nErik Exposito, Piotr Samiec-Talar, Sebastian Bergier', 'article6', '2020-04-27 18:03:14', 'Obóz treningowy, Cypr, Ayia Napa', '2020-04-28 12:18:53', 560, 2),
(8, 'Mecz o wysoką stawkę', 'W 24. kolejce PKO Ekstraklasy Śląsk Wrocław uda się do Lubina, gdzie zmierzy się z miejscowym Zagłębiem. Wygrana w derbach może znacznie przybliżyć wrocławian do miejsca w górnej ósemce na koniec rundy zasadniczej.{hl}Początek rundy wiosennej wygląda obiecująco dla Śląska. Pięć punktów w trzech meczach to solidny start, jednak jeśli wrocławianie chcą być pewni miejsca w grupie mistrzowskiej na koniec rundy zasadniczej, to muszą wygrywać. Każde punkty są cenne, ale te zdobyte w derbowej rywalizacji, mają podwójne znaczenie.Zagłębie również bardzo potrzebuje punktów. Lubinianie nie rozpoczęli rundy wiosennej w najlepszym stylu. Dwie porażki i remis sprawiły, że zespół Martina Seveli z dorobkiem 29 punktów znajduje się dopiero na dwunastym miejscu w ligowej tabeli{st} tracąc w tej chwili do ósmej Wisły Płock cztery punkty. Czasu do końca rundy zostało coraz mniej i każde kolejne potknięcie może sprawić, że Zagłębie, zamiast grać z czołowymi zespołami, znajdzie się w dolnej ósemce. Wrocławianie nie wspominają najlepiej ostatnich wizyt na stadionie w Lubinie. Trzy ostatnie mecze zakończyły się porażką WKS-u i Śląsk nie zdobył w nich ani jednej bramki. Dodatkowo, Trójkolorowi nie wygrali w Lubinie od 6 listopada 2011 roku. Wówczas zwyciężyli aż 5:1, jednak od tamtego meczu ich bilans w Lubinie to trzy remisy i cztery porażki. Coraz lepiej wygląda sytuacja kadrowa Śląska. Po trzech meczach zawieszenia do składu wraca Filip Marković. - Filip walczy o miejsce w składzie. Jesienią brakowało mu trochę przygotowania fizycznego, ale przed tą rundą dobrze przepracował okres przygotowawczy. W trzech ostatnich meczach był zawieszony, teraz jest przygotowany i widać na treningach, że jest głodny gry. - mówił Vitezslav Lavička na przedmeczowej konferencji prasowej. Ubiegły tydzień w Lubinie stał pod znakiem transferów. Bartosz Slisz odszedł do Legii Warszawa, bijąc tym samym rekord, jeśli chodzi o transakcje wewnątrz ligi (1,5 mln euro). Zagłębie szybko znalazło jednak zastępstwo. - Analizowaliśmy przeciwnika. Slisz odszedł do Legii Warszawa, ale zastąpi go bardzo doświadczony pomocnik z Rosji - Baszkirow. Myślę, że Zagłębie nie będzie zmieniać swojego stylu gry. Mają bardzo niebezpieczne skrzydła, kreatywną dziesiątkę w postaci Filipa Starzyńskiego, więc wiemy, że czeka nas spore wyzwanie - mówił Vitezslav Lavička na przedmeczowej konferencji prasowej. Poprzednie spotkanie Śląska z Zagłębiem na długo zapadnie w pamięci kibiców. Po szalonym meczu padł remis 4:4. Bramkę na wagę punktu w doliczonym czasie gry zdobył wówczas Erik Exposito, który skompletował wtedy hat-tricka. Początek meczu Zagłębie - Śląsk o godzinie 17:30. Na naszej stronie internetowej przeprowadzimy relację live. ', 'article4', '2020-04-27 19:22:21', 'Zagłębie, Exposito, Lavička, Marković', '2020-04-28 12:18:53', 320, 3),
(9, '27. kolejka odkodowana w Canal+', 'Nadawca telewizyjny meczów PKO BP Ekstraklasy, Canal+ Sport, zdecydował się odkodować wszystkie mecze 27. kolejki dla abonentów Platformy CANAL+.{hl} Decyzja związana jest z postanowieniem o rozgrywaniu meczów PKO Ekstraklasy bez udziału kibiców ze względu na z ryzyko rozprzestrzeniania się koronawirusa (Covid-19).\r\nO tym, że mecze Ekstraklasy do odwołania będą odbywać się bez udziału publiczności wiemy od wtorkowego przedpołudnia. TUTAJ informowaliśmy o zwrocie biletów zakupionych na piątkowe spotkanie Śląska Wrocław z Rakowem Częstochowa.{st}\r\n\r\nTym razem kibice nie będą mogli wspomóc swoich drużyn z trybun, jednak dzięki decyzji CANAL+, większa ich grupa obejrzy spotkanie swojego klubu w domu. Nadawca telewizyjne zdecydował o odkodowaniu całej 27. kolejki dla wszystkich abonentów Platformy CANAL+.\r\n\r\nPoniżej treść całego komunikatu telewizji Canal+ Sport:\r\n\r\n\"Wszystkie mecze 27. kolejki PKO BP Ekstraklasy odkodowane dla abonentów CANAL+! W hicie tej serii gier Lech Poznań podejmie Legię Warszawa.\r\n \r\nAbonenci i Kibice! Sytuacja jest wyjątkowa, wymaga więc od nas wyjątkowych działań. Z duchem sportu i z myślą o Was – kibicach, najbliższą kolejkę PKO BP Ekstraklasy odkodujemy dla wszystkich abonentów Platformy CANAL+. To znaczy, że nawet jeśli nie macie CANAL+ w swojej ofercie, to będziecie mogli przeżywać sportowe emocje razem ze swoimi drużynami - pomimo zamkniętych stadionów. Pracujemy równocześnie dla Was nad specjalnymi ofertami, które pozwolą śledzić rozgrywki PKO BP Ekstraklasy w kolejnych kolejkach. Zachęcamy również innych operatorów którzy mają w ofercie CANAL+ do podobnych działań. Ze sportowymi pozdrowieniami! CANAL+ dla kibiców!\".', 'article8', '2020-04-28 12:00:04', 'Canal+, Mecze, PKO Ekstraklasa', '2020-04-28 12:18:53', 811, 2),
(10, 'Trenerzy Śląska Wrocław na stażu w Slavii Praga', 'Krystian Rubajczyk, Dawid Gomola, Paweł Mucha i Józef Klepak w dniach 25-28 lutego przebywali na stażu szkoleniowym w akademii Slavii Praga, obserwując pracę jednego z najlepszych czeskich klubów.{hl}\r\nSlavia Praga to pięciokrotny mistrz Czech, a także obecny lider Fortuna Ligi.  W klubie występowali między innymi Jii Pavlenka (obecnie Werder Brema), Tomas Soucek (West Ham United), a we wcześniejszych latach choćby Karel Poborsky i Vladimir Smicer.{st}\r\n\r\nZgodnie z długofalową strategią rozwoju działalności klubu przyjętą przez Śląsk Wrocław, kolejna grupa trenerów odbyła staż trenerski. - Jednym z najważniejszych elementów rozwoju klubu jest dalsze kształcenie i rozwój trenerów Akademii. Podjęliśmy szerokie działania w zakresie nawiązania współpracy i wyjazdów na staże zagraniczne z klubami, które specjalizują się w przygotowaniu młodzieży do grania na najwyższym poziomie. Staże takie odbyły się już w Benfice Lizbona, Dinamo Zagrzeb, MSK Żylina, a kolejnymi klubami są: Slavia Praga, FC Liverpool, RB Lipsk i Red Bull Salzburg. Jesteśmy na etapie unowocześniania naszego systemu szkolenia w Akademii i dostosowywania do najbardziej nowoczesnych tendencji europejskich i z tego powodu takie wyjazdy dają nam wiele ciekawych spostrzeżeń - mówi Krzysztof Paluszek, dyrektor do spraw rozwoju sportowego Śląska Wrocław.\r\n\r\nZaplecze Akademii Slavii, choć wizualnie skromne, to robi ogromne wrażenie i posiada wszystko, czego młodzi piłkarze potrzebują do odpowiedniego rozwoju. Każdy zespół należący do Akademii posiada swoją własną szatnię, a trenerzy mają przydzielone swoje pokoje. - Jest tam wszystko, co potrzebne do profesjonalnego treningu. Jest odpowiednia liczba boisk, każda drużyna ma swoją szatnie i wszystko jest zorganizowane w jednym miejscu - mówi Krystian Rubajczyk. ', 'article1', '2020-04-28 12:11:47', 'Slavia Praga, Rubajczyk, Gomola, Mucha, Klepak', '2020-04-28 12:18:53', 730, 2),
(11, 'Żółta kartka dla Márka Tamása anulowana!', 'Komisja Ligi po zapoznaniu się z opinią Kolegium Sędziów PZPN uwzględniła protest klubu i anulowała żółtą kartkę, którą napomniany został Márk Tamás w meczu z Jagiellonią Białystok.{hl}\r\nW spotkaniu 26. kolejki PKO Ekstraklasy obrońca Śląska Wrocław ukarany został żółtą kartką po interwencji w polu karnym, gdzie zdaniem arbitra nieprzepisowo zatrzymywał Przemysława Mystkowskiego. Sędzia Piotr Lasyk, nie oglądając sytuacji na powtórce, podyktował „jedenastkę” dla gospodarzy, którą na gola zamienił Martin Pospíšil.{st}\r\n\r\nWrocławski klub odwołał się od kary napomnienia dla Tamása, wskazując, że Węgier w tej sytuacji nie popełnił przewinienia na zawodniku Jagiellonii. Komisja Ligi w środę uwzględniła protest Śląska, uznając karę żółtej kartki za niebyłą.', 'article7', '2020-04-28 12:14:42', 'Márk Tamás, Martin Pospíšil, Kartka ', '2020-04-28 12:18:53', 310, 2),
(12, 'Marković strzelcem gola w derbach', 'Dla Serba spotkanie w Lubinie było pierwszym po prawie dwóch miesiącach. Poprzednio wystąpił 20 grudnia w Krakowie. Przeciwko Cracovii otrzymał czerwoną kartkę{hl}, a później karę trzech meczów zawieszenia. Po jej odcierpieniu Marković pojawił się na murawie w 66. minucie spotkania z Zagłębiem. - Cieszę się, że wróciłem. Bardzo czekałem na to, by móc zagrać i pomóc drużynie. Mam nadzieję, że teraz będę mógł to robić regularnie - mówił po meczu 28-latek.{st}\r\nMarković w 83. min brał udział w akcji bramkowej, po której WKS strzelił gola na 1:3. Początkowo trafienie zaliczono jako bramkę samobójczą Guldana, jednak ostatecznie gol trafia na konto pomocnika Śląska. Dla Filipa jest to więc premierowe trafienie w zielono-biało-czerwonych barwach. Czekamy na kolejne!', 'article2', '2020-04-25 12:23:23', 'Marković, Bramka, Cracovia', '2020-04-28 12:23:23', 1378, 3),
(13, 'Wrócić na właściwy tor', 'Zaledwie trzy dni po przegranym meczu derbowym, Śląsk Wrocław ma szansę na rehabilitacje. W 25. kolejce PKO Ekstraklasy Trójkolorowi podejmą Koronę Kielce{hl}.\r\nZwycięstwo w derbach mogło dać Śląskowi awans na trzecie miejsce w tabeli PKO Ekstraklasy. Wrocławianie przegrali jednak z Zagłębiem Lubin (1:3) i nie poprawili swojego dorobku punktowego. Porażki Pogoni Szczecin i Cracovii sprawiają jednak, że ponownie pojawia się szansa na poprawę pozycji względem rywali. - Po porażce każdy jest zły, jest wiele emocji. Dziś mieliśmy spotkanie w szatni na Oporowskiej przed treningiem.{st} Postawiliśmy sprawę jasno - nie daliśmy rady, wygrała drużyna lepiej przygotowana i cały nasz zespół oraz sztab ma tego świadomość. Nikt nie chce przegrywać, wiemy jednak, że jest to wpisane w futbol. To nasza piąta porażka w sezonie, nie jest tego wiele, ale każda boli i powoduje złość. Najważniejsza będzie teraz reakcja drużyny. Żeby fizycznie i mentalnie pokazać się w środę z dużo lepszej strony. - mówił Vitezslav Lavička na przedmeczowej konferencji prasowej. \r\n\r\nWczorajsza wygrana Lecha Poznań sprawiła, że Śląsk znajduje się obecnie na piątym miejscu w tabeli. Trzy punkty w meczu z Koroną pozwolą wrocławianom awansować na podium. W składzie zielono-biało-czerwonych może dojść do kilku zmian w porównaniu z niedzielnym meczem w Lubinie. Na debiut wciąż czekają zimowe nabytki Śląska - Guillermo Cotugno i Márk Tamás. - Trzeba zobaczyć jak poszczególni gracze wyglądają również w treningach, jak mentalnie. Psychologiczny aspekt jest bardzo ważny po takiej porażce. Zmiany w drużynie muszą być przemyślane i jak najlepsze, by ich efektem była wygrana - mówił trener Lavička na przedmeczowej konferencji prasowej. \r\n \r\nGuillerme Cotugno? On idzie krok po kroku w górę. Pracujemy z nim taktycznie, fizycznie, dużo rozmawiamy. Ma swoją jakość i mądrość, ale w drużynie jest rywalizacja i od niej zależy, kto i kiedy dostanie swoje szanse.\r\n\r\nSytuacja dzisiejszego rywala Śląska jest bardzo trudna. Kielczanie zgromadzili do tej pory 23 punkty i zajmują dopiero 15. miejsce w tabeli. Nie wygrali jeszcze ani jednego spotkania w rundzie wiosennej, zaliczając dwa remisy i dwie porażki. Do bezpiecznego miejsca tracą w tej chwili siedem punktów, więc każde zwycięstwo jest dla nich na wagę złota. \r\n\r\nBilans bezpośrednich meczów Śląska z Koroną pokazuje, że kielczanie nie są wygodnym rywalem dla WKS-u. Trójkolorowi nie wygrali z tym przeciwnikiem od sześcu spotkań. Nieco lepiej wygląda bilans meczów na Stadionie Wrocław, gdzie Śląsk nie przegrał z Koroną od trzech meczów. \r\n\r\nPierwsze spotkanie tych zespołów w obecnym sezonie zakończyło się zwycięstwem Korony 1:0. Bramkę na wagę zwycięstwa zdobył wówczas Milan Radin. Kielczanie byli pierwszym zespołem, który pokonał Śląsk w tym sezonie ligowym. Początek dzisiejszego meczu o godzinie 18:00.', 'article3', '2020-04-27 12:27:04', 'Korona Kielce, Cracovia Kraków, Lavička, Cotugno', '2020-04-28 12:27:04', 340, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `players`
--

CREATE TABLE `players` (
  `player_ID` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `nationality` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `position` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `player_value` int(11) NOT NULL,
  `player_img_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `players`
--

INSERT INTO `players` (`player_ID`, `first_name`, `last_name`, `age`, `height`, `nationality`, `date_of_birth`, `place_of_birth`, `position`, `player_value`, `player_img_path`) VALUES
(1, 'Marco', 'Paixao', 35, 185, 'Portugalia', '1984-10-19', 'Sesimbra', 'Napastnik', 1000000, 'sadsd'),
(2, 'Dino', 'JAJAJ', 28, 193, 'Polska', '1987-05-23', 'Krakow', 'Pomocnik', 600000, 'svsdv'),
(4, 'Dino', 'Stiglec', 28, 193, 'Polska', '1987-05-23', 'Krakow', 'Pomocnik', 600000, 'svsdv');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seats`
--

CREATE TABLE `seats` (
  `seat_ID` int(11) NOT NULL,
  `sector` varchar(5) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `seat_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `seats`
--

INSERT INTO `seats` (`seat_ID`, `sector`, `seat_value`) VALUES
(1, 'C', 25),
(2, 'B', 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stadium`
--

CREATE TABLE `stadium` (
  `ticket_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tickets`
--

CREATE TABLE `tickets` (
  `ticket_ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `seat_ID` int(11) NOT NULL,
  `match_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workers`
--

CREATE TABLE `workers` (
  `worker_ID` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `nationality` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `mail` varchar(500) DEFAULT NULL,
  `is_journalist` tinyint(1) NOT NULL DEFAULT '0',
  `is_executive` tinyint(1) NOT NULL DEFAULT '0',
  `is_staff` tinyint(1) NOT NULL DEFAULT '0',
  `worker_login` varchar(100) NOT NULL,
  `worker_password` varchar(500) NOT NULL,
  `worker_img_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `worker_date_of_birth` date DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `workers`
--

INSERT INTO `workers` (`worker_ID`, `first_name`, `last_name`, `age`, `nationality`, `mail`, `is_journalist`, `is_executive`, `is_staff`, `worker_login`, `worker_password`, `worker_img_path`, `worker_date_of_birth`, `create_date`) VALUES
(1, 'Viteslav', 'Lavicka', 67, 'Czechy', 'vlavicka@stronaklubu.pl', 0, 0, 1, 'vlavicka', 'dfb5cee111b9b65f0be13dd2aa713a9c', NULL, '1963-04-30', '2020-04-28 13:39:31'),
(2, 'Jan', 'Kowalski', 34, 'Polska', 'jkowalski@stronaklubu.pl', 1, 0, 0, 'jkowalski', 'e8edfe7797be6a4290f7f4f2c7d44fbb', NULL, '1986-04-13', '2020-04-28 13:44:03'),
(3, 'Mateusz', 'Nowak', 26, 'Polska', 'mnowak@stronaklubu.pl', 1, 0, 0, 'mnowak', '7dd4371a995ef5cb43ec30782625de2f', NULL, '1996-04-07', '2020-04-28 13:48:42');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indeksy dla tabeli `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_ID`);

--
-- Indeksy dla tabeli `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_ID`),
  ADD KEY `club_home_ID` (`club_home_ID`),
  ADD KEY `club_away_ID` (`club_away_ID`);

--
-- Indeksy dla tabeli `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_ID`),
  ADD KEY `author` (`worker_ID`);

--
-- Indeksy dla tabeli `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_ID`);

--
-- Indeksy dla tabeli `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_ID`);

--
-- Indeksy dla tabeli `stadium`
--
ALTER TABLE `stadium`
  ADD KEY `ticket_ID` (`ticket_ID`);

--
-- Indeksy dla tabeli `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_ID`),
  ADD KEY `client_ID` (`client_ID`),
  ADD KEY `match_ID` (`match_ID`),
  ADD KEY `seat_ID` (`seat_ID`);

--
-- Indeksy dla tabeli `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `news_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `players`
--
ALTER TABLE `players`
  MODIFY `player_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`club_home_ID`) REFERENCES `clubs` (`club_ID`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`club_away_ID`) REFERENCES `clubs` (`club_ID`);

--
-- Ograniczenia dla tabeli `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`worker_ID`) REFERENCES `workers` (`worker_ID`);

--
-- Ograniczenia dla tabeli `stadium`
--
ALTER TABLE `stadium`
  ADD CONSTRAINT `stadium_ibfk_1` FOREIGN KEY (`ticket_ID`) REFERENCES `tickets` (`ticket_ID`);

--
-- Ograniczenia dla tabeli `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`client_ID`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`match_ID`) REFERENCES `matches` (`match_ID`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`seat_ID`) REFERENCES `seats` (`seat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
