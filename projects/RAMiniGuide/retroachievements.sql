-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 24 jan. 2020 à 06:46
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `retroachievements`
--

-- --------------------------------------------------------

--
-- Structure de la table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `game_id` int(11) NOT NULL,
  `achievement_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `guide` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `game_id`, `achievement_id`, `description`, `icon`, `guide`) VALUES
(1, 'Playing with Balls', 12, 1708, 'Get a Golf Ball', 'https://retroachievements.org/Badge/02020.png', 'Aucun guide pour le moment! PAWA !'),
(2, 'Money for Life', 12, 1710, 'Collect 99$ ', 'https://retroachievements.org/Badge/02022.png', 'Aucun guide pour le moment!'),
(3, 'Jogging with Ghosts', 12, 1709, 'Get Training Shoes', 'https://retroachievements.org/Badge/02019.png', 'Aucun guide pour le moment!'),
(4, 'Fezi-Copter', 12, 2160, 'Get a Fezi-Copter', 'https://retroachievements.org/Badge/02644.png', 'Aucun guide pour le moment!'),
(5, 'Fencing Lesson', 12, 1711, 'Get a Sword', 'https://retroachievements.org/Badge/02021.png', 'Aucun guide pour le moment!'),
(6, 'Easy Money', 12, 84, 'Earn 10000 Points', 'https://retroachievements.org/Badge/00102.png', 'Aucun guide pour le moment!'),
(7, 'Hard Money', 12, 1753, 'Earn 200000 Points', 'https://retroachievements.org/Badge/02104.png', 'Aucun guide pour le moment!'),
(8, 'Life\'s High', 12, 1712, 'Collect Extra Lifes and Reach the 25 Lifes', 'https://retroachievements.org/Badge/02025.png', 'Aucun guide pour le moment!'),
(9, 'Granny', 12, 1713, 'Rescue Granny', 'https://retroachievements.org/Badge/02068.png', 'Aucun guide pour le moment!'),
(10, 'Wednesday', 12, 1714, 'Rescue Wednesday', 'https://retroachievements.org/Badge/02026.png', 'Aucun guide pour le moment!'),
(11, 'Pugsley', 12, 1715, 'Rescue Pugsley', 'https://retroachievements.org/Badge/02027.png', 'Aucun guide pour le moment!'),
(12, 'Uncle Fester', 12, 1726, 'Rescue Uncle Fester', 'https://retroachievements.org/Badge/02070.png', 'Aucun guide pour le moment!'),
(13, 'Morticia and Gomez', 12, 1751, 'Rescue Morticia and Finish the Game', 'https://retroachievements.org/Badge/02098.png', 'Aucun guide pour le moment!'),
(14, 'Big Heart', 12, 1725, 'Rise Your Maximum Health to 5', 'https://retroachievements.org/Badge/02067.png', 'Aucun guide pour le moment!'),
(15, 'Life\'s Too Short', 12, 1752, 'Finish the game without raising your default health.', 'https://retroachievements.org/Badge/02100.png', 'Aucun guide pour le moment!');

-- --------------------------------------------------------

--
-- Structure de la table `consoles`
--

CREATE TABLE `consoles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `console_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `consoles`
--

INSERT INTO `consoles` (`id`, `title`, `console_id`) VALUES
(1, 'Mega Drive', 1),
(2, 'Nintendo 64', 2),
(3, 'SNES', 3),
(4, 'Game Boy', 4),
(5, 'Game Boy Advance', 5),
(6, 'Game Boy Color', 6),
(7, 'NES', 7),
(8, 'PC Engine', 8),
(9, 'Sega CD', 9),
(10, '32X', 10),
(11, 'Master System', 11),
(12, 'PlayStation', 12),
(13, 'Atari Lynx', 13),
(14, 'Neo Geo Pocket', 14),
(15, 'Game Gear', 15),
(16, 'GameCube', 16),
(17, 'Atari Jaguar', 17),
(18, 'Nintendo DS', 18),
(19, 'Wii', 19),
(20, 'Wii U', 20),
(21, 'PlayStation 2', 21),
(22, 'Xbox', 22),
(24, 'Pokemon Mini', 24),
(25, 'Atari 2600', 25),
(26, 'DOS', 26),
(27, 'Arcade', 27),
(28, 'Virtual Boy', 28),
(29, 'MSX', 29),
(30, 'Commodore 64', 30),
(31, 'ZX81', 31),
(32, 'Oric', 32),
(33, 'SG-1000', 33),
(34, 'VIC-20', 34),
(35, 'Amiga', 35),
(36, 'Atari ST', 36),
(37, 'Amstrad CPC', 37),
(38, 'Apple II', 38),
(39, 'Saturn', 39),
(40, 'Dreamcast', 40),
(41, 'PlayStation Portable', 41),
(42, 'Philips CD-i', 42),
(43, '3DO Interactive Multiplayer', 43),
(44, 'ColecoVision', 44),
(45, 'Intellivision', 45),
(46, 'Vectrex', 46),
(47, 'PC-8000/8800', 47),
(48, 'PC-9800', 48),
(49, 'PC-FX', 49),
(50, 'Atari 5200', 50),
(51, 'Atari 7800', 51),
(52, 'X68K', 52),
(53, 'WonderSwan', 53),
(54, 'Cassette Vision', 54),
(55, 'Super Cassette Vision', 55);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `console` varchar(255) NOT NULL,
  `game_id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `title`, `console`, `game_id`, `icon`) VALUES
(1, 'Addams Family, The', 'Mega Drive', 12, 'https://retroachievements.org/Images/001727.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(1, 'AngelPhenix', '$2y$10$da.Z0tE0sirh/sLRFjf.DOHomNMSuHoXEXsVaSGPKDbVZJMPiwBfq', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `consoles`
--
ALTER TABLE `consoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
