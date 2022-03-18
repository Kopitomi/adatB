-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Nov 29. 18:33
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `családfa`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `anyja`
--

CREATE TABLE `anyja` (
  `név` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `anyja_szig_szám` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `anyja`
--

INSERT INTO `anyja` (`név`, `anyja_szig_szám`) VALUES
('Lőw Edit', '123456AS'),
('Kis Virág', '164834AD'),
('Oláh Anna', '168256AT'),
('Kalapos Enikő', '168523AF'),
('Csillag Virág', '462597AM'),
('Szerencsi Viola', '546825AB'),
('Stiller Marianna', '694200AS');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `apja`
--

CREATE TABLE `apja` (
  `apja_szig_szám` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `név` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `apja`
--

INSERT INTO `apja` (`apja_szig_szám`, `név`) VALUES
('111111SS', 'Kopanecz Gábor'),
('135790SR', 'Soros György'),
('235684SZ', 'Hegyes Balázs'),
('528631SM', 'Hajnal Árpád'),
('587512SS', 'Kiss Máté'),
('615287SQ', 'Kalmár Jenő'),
('625398SY', 'Fejes Arnold');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `esemény`
--

CREATE TABLE `esemény` (
  `dátum` date DEFAULT NULL,
  `alkalom_neve` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `esemény`
--

INSERT INTO `esemény` (`dátum`, `alkalom_neve`) VALUES
('2020-08-20', 'Augusztus-20 tűzijáték pótló'),
('2019-04-01', 'Húsvét'),
('2019-12-24', 'Karácsony-19'),
('2020-12-24', 'Karácsony-20'),
('2019-10-15', 'Születésnap-Ákos'),
('2019-07-30', 'Születésnap-Anna'),
('2019-05-22', 'Születésnap-Bence'),
('2019-06-19', 'Születésnap-Erika'),
('2019-08-27', 'Születésnap-Tomi-Marci'),
('1998-11-29', 'Szülinap'),
('2020-08-21', 'Valhalla Találka');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `házasság`
--

CREATE TABLE `házasság` (
  `dátum` date DEFAULT NULL,
  `férj_szig_szám` varchar(20) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `feleség_szig_szam` varchar(10) COLLATE utf8mb4_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `házasság`
--

INSERT INTO `házasság` (`dátum`, `férj_szig_szám`, `feleség_szig_szam`) VALUES
('2015-12-01', '234589SE', '862459AJ'),
('2018-02-25', '615287SG', '854762AM'),
('2020-05-11', '425631SN', '845126AC'),
('2020-09-15', '587512SA', '654987AS'),
('2020-03-18', '987654SB', '523419AL');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `lakik`
--

CREATE TABLE `lakik` (
  `lako_szig_szám` varchar(10) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `lid` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `lakik`
--

INSERT INTO `lakik` (`lako_szig_szám`, `lid`) VALUES
('987654SB', 12341),
('654987AS', 55555),
('587512SA', 55555),
('615287SG', 79562),
('425631SN', 15963),
('246813AC', 64258),
('523419AL', 12312),
('854762AM', 98742),
('862459AJ', 65412),
('845126AC', 65412),
('234589SE', 12341);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `lakás`
--

CREATE TABLE `lakás` (
  `ir_szám` int(10) DEFAULT NULL,
  `város` varchar(50) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `utca` varchar(100) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `házszám` int(10) DEFAULT NULL,
  `lid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `lakás`
--

INSERT INTO `lakás` (`ir_szám`, `város`, `utca`, `házszám`, `lid`) VALUES
(5112, 'Kecskemét', 'Kiss József utca', 11, 12312),
(2092, 'Budakeszi', 'Tiefenweg út', 21, 12341),
(5067, 'Algyő', 'Alsó fa sor', 15, 15963),
(2084, 'Páty', 'Lehel utca', 54, 54621),
(6726, 'Szeged', 'Vértói út', 4, 55555),
(5324, 'Sándorfalva', 'katona József utca', 53, 64258),
(6724, 'Szeged', 'Csemegei út', 20, 65412),
(8520, 'Algyő', 'Csapó utca', 56, 79562),
(2048, 'Budapest', 'Szekeres utca', 32, 98742);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `részt_vesz`
--

CREATE TABLE `részt_vesz` (
  `alkalom_neve` varchar(50) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `személy_szig_szám` varchar(10) COLLATE utf8mb4_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `részt_vesz`
--

INSERT INTO `részt_vesz` (`alkalom_neve`, `személy_szig_szám`) VALUES
('Karácsony-20', '587512SA'),
('Karácsony-20', '654987AS'),
(NULL, '654987AS'),
(NULL, '587512SA'),
('Húsvét', '654987AS'),
('Szülinap', '654987AS'),
('Szülinap', '987654SB'),
('Augusztus-20 tűzijáték pótló', '615287SG'),
('Húsvét', '587512SA'),
('Karácsony-19', '654987AS'),
('Karácsony-19', '587512SA'),
('Karácsony-19', '987654SB'),
('Valhalla Találka', '425631SN'),
('Valhalla Találka', '862459AJ'),
('Valhalla Találka', '587512SA'),
('Valhalla Találka', '987654SB'),
('Születésnap-Tomi-Marci', '587512SA'),
('Születésnap-Tomi-Marci', NULL),
('Születésnap-Tomi-Marci', '987654SB'),
('Születésnap-Anna', '523419AL'),
('Születésnap-Erika', '246813AC'),
('Születésnap-Tomi-Marci', '654987AS'),
('Születésnap-Tomi-Marci', '234589SE');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `személy`
--

CREATE TABLE `személy` (
  `név` varchar(50) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `szig_szám` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `anyja_szig_szama` varchar(10) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `apja_szig_szama` varchar(10) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `szuletesi_datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `személy`
--

INSERT INTO `személy` (`név`, `szig_szám`, `anyja_szig_szama`, `apja_szig_szama`, `szuletesi_datum`) VALUES
('Faragó Ákos', '234589SE', '164834AD', '135790SR', '1999-10-15'),
('Oroszlányi Erika', '246813AC', '168523AF', '615287SQ', '1980-06-19'),
('Hoffmann Bence', '425631SN', '546825AB', '528631SM', '1996-05-20'),
('Szabó Anna', '523419AL', '546825AB', '587512SS', '1999-07-30'),
('Kopanecz Tamás', '587512SA', '123456AS', '111111SS', '1999-08-27'),
('Sárossy Bence', '615287SG', '694200AS', '135790SR', '1999-05-25'),
('Bakó Csenge', '654987AS', '123456AS', '111111SS', '1967-01-12'),
('Bódis Anikó', '845126AC', '462597AM', '615287SQ', '1975-01-20'),
('Löffler Fanni', '854762AM', '462597AM', '587512SS', '2000-05-24'),
('Lakos Barbara', '862459AJ', '168256AT', '587512SS', '1998-11-20'),
('Kopanecz Márton', '987654SB', '123456AS', '587512SS', '1999-08-27');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `anyja`
--
ALTER TABLE `anyja`
  ADD PRIMARY KEY (`anyja_szig_szám`);

--
-- A tábla indexei `apja`
--
ALTER TABLE `apja`
  ADD PRIMARY KEY (`apja_szig_szám`);

--
-- A tábla indexei `esemény`
--
ALTER TABLE `esemény`
  ADD PRIMARY KEY (`alkalom_neve`);

--
-- A tábla indexei `házasság`
--
ALTER TABLE `házasság`
  ADD UNIQUE KEY `férj.szig_szám` (`férj_szig_szám`),
  ADD UNIQUE KEY `feleség.szig_szam` (`feleség_szig_szam`);

--
-- A tábla indexei `lakik`
--
ALTER TABLE `lakik`
  ADD UNIQUE KEY `lako_szig_szám` (`lako_szig_szám`) USING BTREE,
  ADD KEY `lid` (`lid`) USING BTREE;

--
-- A tábla indexei `lakás`
--
ALTER TABLE `lakás`
  ADD PRIMARY KEY (`lid`);

--
-- A tábla indexei `részt_vesz`
--
ALTER TABLE `részt_vesz`
  ADD KEY `személy.szig_szám` (`személy_szig_szám`) USING BTREE,
  ADD KEY `alkalom_neve` (`alkalom_neve`) USING BTREE;

--
-- A tábla indexei `személy`
--
ALTER TABLE `személy`
  ADD PRIMARY KEY (`szig_szám`),
  ADD KEY `anyja_szig_szama` (`anyja_szig_szama`),
  ADD KEY `apja_szig_szama` (`apja_szig_szama`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `házasság`
--
ALTER TABLE `házasság`
  ADD CONSTRAINT `házasság_ibfk_1` FOREIGN KEY (`férj_szig_szám`) REFERENCES `személy` (`szig_szám`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `házasság_ibfk_2` FOREIGN KEY (`feleség_szig_szam`) REFERENCES `személy` (`szig_szám`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `lakik`
--
ALTER TABLE `lakik`
  ADD CONSTRAINT `lakik` FOREIGN KEY (`lako_szig_szám`) REFERENCES `személy` (`szig_szám`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lakik_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `lakás` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `részt_vesz`
--
ALTER TABLE `részt_vesz`
  ADD CONSTRAINT `részt_vesz_ibfk_1` FOREIGN KEY (`személy_szig_szám`) REFERENCES `személy` (`szig_szám`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `részt_vesz_ibfk_2` FOREIGN KEY (`alkalom_neve`) REFERENCES `esemény` (`alkalom_neve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `személy`
--
ALTER TABLE `személy`
  ADD CONSTRAINT `apja_szig_szam` FOREIGN KEY (`apja_szig_szama`) REFERENCES `apja` (`apja_szig_szám`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `személy_ibfk_1` FOREIGN KEY (`anyja_szig_szama`) REFERENCES `anyja` (`anyja_szig_szám`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
