-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 30. srp 2024, 12:25
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `to-do-list`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `todo`
--

DROP TABLE IF EXISTS `todo`;
CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `todo`
--

INSERT INTO `todo` (`id`, `task`) VALUES
(138, '🦾🤖'),
(144, 'Nahrát tenhle projekt na internet 🥳'),
(145, '🥳'),
(146, '🦾'),
(147, '😁'),
(148, '🤖'),
(149, '😈');

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `name`, `nickname`, `email`, `password`) VALUES
(1, 'Jan Němeček', 'Paul', 'paul@seznam.cz', 'čau'),
(2, 'Bob', 'Blonďatý', 'blondaty@email.cz', 'bondaty123'),
(3, 'Jin Mori', 'Original', 'original@gmail.com', '$2y$10$k.8j9q4C3ohBZYgExWfl5Ol2kZkuxHOql3dFmvOR3V2kUB4zjCjRm'),
(4, 'Ben Affleck', 'Batman', 'batman@seznam.cz', '$2y$10$EbsPq7pFE7fd.Gb1W2KeUOzZqT2u839n3MjkL9rvS1g1OtrOWOn8u'),
(5, 'Billy Hobby', 'Trhač', 'trhac@seznam.cz', '$2y$10$jfDEEeEHDjAhcNu42x0VnevsgQShv0OPyqPaI9yD6il.gJ2GAd2DC'),
(6, 'Jan Železný', 'Palcát', 'zelezny@email.com', '$2y$10$OMBXbRmeks0VHycnpb9Y7eX.0R8G5ArEIhl64BiuTvGAEJonKuJle'),
(7, 'Billy Monroe', 'Rocker', 'monroe@gmail.com', '$2y$10$kVaEVQ.Y9XKSh8VZqeWjvu5S0chzw0dOEhrJ2wZFXCjRNaoI3JMiO'),
(8, 'Gin Tonic', 'Alkoholik', 'tonic@seznam.cz', '$2y$10$raklazF7CiRv3mpSC55XD.WE.9sC/zlF85h6UjAq.504gdPeTUfC2'),
(9, 'Hana Mony', 'Zpěvačka', 'mony@gmail.com', '$2y$10$NyjgErPrJijYKiAIMNoGfOa1pn02/YPOJ1G7Lp4WzgKhzmLpwvSau'),
(10, 'Bob 🦾', 'Stavitel', 'stavitel@seznam.cz', '$2y$10$r9nax3dmoHc8nDnjJdT4J.I6I/o46bnBjdh34Os9Rp.1sP2DPVcj6'),
(11, 'Maty Generický', 'Generál', 'genericky@seznam.cz', '$2y$10$xmKuBFTO.H4xsR8s/C7TOeamSmn5zoohYqvr4azBBzvuWqCOFPbbq'),
(12, 'Gecko Moria', 'Shadow master', 'moria@email.cz', '$2y$10$R8YVCVQFFFGKfi26LmuGguyX5m1atbaPwQQYlzUG86l/fnttWvm8.'),
(13, 'Bára Kratochvílová', 'Badass', 'kratochvilova@seznam.cz', '$2y$10$O0mzodvd2aea2.K4d1bbPOAFkDisOWJsIUaLsUbkSAbUKoOhBCuOS'),
(14, 'Barbora Strakonická', 'Sadistka', 'strakonicka@gmail.com', '$2y$10$HT.RRbsJYb0dpSt0QLvize6bhu3rdsixZWnGv.gQnuITW/jUZ3x5i'),
(16, 'Dobře', 'Zaregistruju se', 'zaregistruju@seznam.cz', '$2y$10$wrt.WAD2/kvFA5jkrB1QT.gQz4PnPgjI2MmEaF42XSKQz6RT5/SD.'),
(17, 'Joe Taslim', 'herec', 'taslim@gmail.com', '$2y$10$mXK0oEwYzRl95dnfVk08lu80ci65tG7DUDxADA0wb6xBz/k9cNxB2'),
(18, 'David', 'Kůr', 'kur@seznam.cz', '$2y$10$woElfhfMUoCB9v.QTIa9julS.0QtaRieD3rxvjCTOhSmJbvXnqBV.');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
