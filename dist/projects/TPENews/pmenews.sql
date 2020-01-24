-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 24 jan. 2020 à 22:34
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
-- Base de données :  `pmenews`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `media` varchar(255) NOT NULL,
  `resume` varchar(250) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(255) NOT NULL,
  `territory` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `weblink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `media`, `resume`, `author`, `date`, `type`, `territory`, `activity`, `sector`, `weblink`) VALUES
(1, 'La cryptographie : Est-ce vraiment utile en 2018 ?', 'https://www.youtube.com/embed/GqzqGGqEorU', 'Une vidéo expliquant la cryptographie dans sa totalité.', 'AngelPhenix', '2018-09-27 02:05:55', 'video', 'outre_mer', 'artisants', 'digital', 'https://icecreamparadise.tumblr.com/'),
(2, 'Le nouvel agencement du site PMENEWS.TV', '5bac3cc432f342.27080125.pdf', 'De simple maquette désignant la position voulue des blocs pour le site web pmenews.tv. Le projet est encore en construction.', 'AngelPhenix', '2018-09-28 18:27:05', 'com_press', 'france', 'commercants', 'commercial', ''),
(3, 'Ancienne maquette TPENEWS.tv', '5b4d1e3ce37110.91154523.pdf', 'Il n\'y a pas grand chose à dire sur ces maquettes. Concises et pratiques, elles sont placées de manière à ce que l\'user expérience soit maxi', 'AngelPhenix', '2018-08-10 17:25:17', 'com_press', 'francophonie', 'tpe', 'formation', ''),
(4, 'Petit Test', 'https://www.youtube.com/embed/qDbsiVWA2Ag', 'Encore un petit test !', 'aze', '2018-08-10 17:30:26', 'video', 'outre_mer', 'artisants', 'digital', 'https://icecreamparadise.tumblr.com/'),
(5, 'Petit test n°2 pour essayer de voir ce que le NO PDF donne ! Sans bouton suite !', '', 'Petit résumé qui sera donc la seule choses d\'inscrite avec aucune possibilité d\'utiliser un bouton suite.', 'aze', '2018-08-17 23:35:09', 'com_press', 'outre_mer', 'microentreprises', 'commercial', '');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  `adress1` varchar(255) NOT NULL,
  `adress2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `object` text NOT NULL,
  `rgpd01` int(11) NOT NULL,
  `rgpd02` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `date`, `prefix`, `name`, `surname`, `mail`, `phone`, `mobile`, `function`, `adress1`, `adress2`, `city`, `region`, `postal`, `country`, `url`, `object`, `rgpd01`, `rgpd02`) VALUES
(1, '2018-06-13', 'Prof.', 'azeaze', 'sdazeaze', 'azeaze@aze.fr', '', '', 'azeazeez', '', '', '', '', '', '', '', 'azeaze', 1, 1),
(2, '8955-04-25', 'Mlle', 'aze', 'eza', 'aze@aze.fr', '', '', 'aze', '', '', '', '', '', '', '', 'azeazeaze', 1, 1),
(3, '8955-04-25', 'Mlle', 'aze', 'eza', 'aze@aze.fr', '', '', 'aze', '', '', '', '', '', '', '', 'azeazeaze', 1, 1),
(4, '8955-04-25', 'Mlle', 'aze', 'eza', 'aze@aze.fr', '', '', 'aze', '', '', '', '', '', '', '', 'azeazeaze', 1, 1),
(5, '2020-01-15', 'M.', 'Jérémy Mattausch', 'Mattausch', 'breathstylebro@gmail.com', '0630334475', '', 'aze', '21 rue de Saint-Chéron', '', 'Saint-Prest', '', '28300', 'FRA', '', 'Petit test de message de contact !', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  `society` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `project` text NOT NULL,
  `adress1` varchar(255) NOT NULL,
  `adress2` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mail`, `password`, `name`, `surname`, `rank`, `function`, `society`, `phone`, `mobile`, `bio`, `project`, `adress1`, `adress2`, `region`, `postal`, `city`, `country`) VALUES
(1, 'aze', 'aze@aze.fr', '$2y$10$0V88lTojm.qIWSyZ5sUwl.eVdcdMznE7ShN64au2oHrKKyQD2DGwW', 'aze', 'aze', 'Editeur', 'RE-test', '', '', '', 'Petit Biographie écrite après avoir édité un membre !', '', 'aze', '', '', 'aze', 'aze', 'CZE'),
(4, 'AngelPhenix', 'breathstylebro@gmail.com', '$2y$10$yvNHJtwyFBBv6NkNgMBZXe99xNSI2ZbZu8MJoPcLE4UWZ3A4q7rrK', 'Jérémy', 'Mattausch', 'Administrateur', 'Développeur Web', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Un simple développeur web essayant d\'obtenir son diplôme CP09 Webmaster. Je voudrais être développeur fullstack afin de pouvoir toucher à tout.', 'Faire des sites webs afin de faire de la pubs aux très petites entreprises et petites entreprises.', '21 rue de Saint-Chéron', '', 'Centre', '28300', 'Saint-Prest', 'FRA'),
(7, 'comptetest', 'comptetest@comptetest.fr', '$2y$10$bUHQEGQmDPnwJM0v8MXBc.qZ10A2duswuCVNhmq5jgVTALe2CrDPu', 'comptetest', 'comptetest', 'Editeur', '', '', '', '', '', '', 'comptetest', '', '', 'comptetest', 'comptetest', 'FRA');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
