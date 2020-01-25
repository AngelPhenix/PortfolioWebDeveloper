-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 25 jan. 2020 à 01:37
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
-- Base de données :  `siteangel`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `image_titre` varchar(255) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `article`, `auteur`, `date`, `categorie`, `image_titre`, `hits`) VALUES
(1, 'A Girl Adrift', '<b>A Girl Adrift</b> est un jeu qui testera votre patience bien plus que vos capacités d\'adaptation à un gameplay éclectique. En effet dans ce jeu vous n\'aurez pas à faire grand chose, si ce n\'est appuyer à répétition sur l\'écran afin de capturer les poissons ou leur prendre leur trésor.<br>\r\nNe vous fiez cependant pas à son aspect minimaliste et simple. <b>A Girl Adrift</b> n\'en est pas moins addictif et pour cause : Il y a même un reddit dédié à ce \"petit\" jeu. Laissez moi donc vous faire entrer dans cet univers étonnant.<br>\r\n\r\n<img class=\"image_darticle\" src=\"https://i.imgur.com/eMzW5ZT.png\" title=\"AGirlAdrift01\">\r\n<span class=\"legende\">Pleins d\'objets, d\'expérience et de style à récolter !</span><br>\r\n\r\nPlus étonnant encore : Le fait que le jeu soit possible à compléter à 100% sans même y mettre un seul centime de votre poche. Certes vous devrez y mettre énormément de votre temps mais au moins, les développeurs ont pensé à mettre des pubs (Que vous choisirez d\'afficher ou non) afin d\'avoir un avantage considérable. Évitez donc de les ignorer si vous ne voulez pas que le jeu vous prenne trois ans à terminer !<br>\r\nRentrons un peu plus dans le sujet. Il faut savoir que vous aurez non seulement des points d\'expérience à gérer mais aussi des objets à collectionner. En ce qui concerne l\'expérience : Ceux-ci vous permettront de monter de niveaux et d\'accéder non seulement à des quêtes supplémentaires mais aussi à des bonus qui vous faciliterons grandement la vie.<br>Enfin, les objets à collectionner ne seront autre que des \"costumes\" pour votre pêcheuse et vos accessoires de pêches. Sachez d\'ailleurs que non seulement le jeu possède un grand nombre d\'objet mais qu\'en plus, vous aurez la chance de pouvoir les améliorer (1, 2 ou 3 étoiles chacun) afin qu\'ils vous apportent de meilleurs stats. Car oui, les objets sont des costumes mais en plus ils vous apportent de bonnes choses : Ils améliorent les capacités de votre personnage et de son équipement !<br>\r\n\r\n<img class=\"image_darticle\" src=\"https://i.imgur.com/eF6XC7h.png\" title=\"AGirlAdrift02\">\r\n<span class=\"legende\">Des quêtes primaires et secondaires afin de ne jamais s\'ennuyer et d\'obtenir pleins de bonus !</span><br>\r\n\r\n\r\nAttention cependant : Vous aurez beau être le meilleur joueur du monde, le jeu vous demandera beaucoup de patience afin de le compléter à 100% car même avec les pubs à votre disposition, vos avantages ne seront que mineurs et vous n\'aurez pas de possibilité réelles, de toute façon, d\'utiliser de l\'argent réel afin de venir à bout de ce petit bijou du Gaming. \r\n', 'Jérémy Mattausch', '2018-09-26', 'review', '5baab1de2398e2.37882930.jpg', 38),
(2, 'Lords Mobile', 'Lords Mobile est un jeu de stratégie très similaire à certains compère tel que \"Mylands\". Le but du jeu est plutôt simple : Prenez possession des terres et asseyez votre domination sur les joueurs alentours en vous aidant d\'une guilde puissante. <br/>\r\nLe jeu est plutôt simple et l\'évolution en jeu est extrêmement rapide. Il est possible d\'atteindre un très bon niveau et d\'entrer en compétition même avec les meilleurs sans avoir besoin de dépenser quoi que ce soit de votre propre argent.\r\n\r\n<img class=\"image_darticle\" src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1yq-rx2s9PzwscxwBVNyAsdsLKadTBeKDIVdffzlKpnriYqC7\"> \r\n<span class=\"legende\">Le jeu offre bien plus que ce qu\'il montre au premier abord..</span>\r\n\r\nLe jeu est sorti courant 2016 si je ne me trompe pas et est très populaire auprès des joueurs mobiles comptabilisant une énorme population InGame et un follower count de plus d\'un million sur Twitter. Des guides ont été fait en vidéos youtube, en site perso et ce jeu possède également un wikia permettant de regrouper toutes les informations importantes.<br/>\r\nPour en revenir un peu plus au jeu, vous aurez la possibilité de pouvoir gérer non seulement votre royaume (Placer les bâtiments, faire des quêtes, monter les niveaux de vos constructions, etc) mais aussi votre armée et vos héros. Vous aurez un contrôle quasi-total sur tout ce qui touche à votre royaume et pourrez donc adopter la stratégie que vous souhaitez et quand vous le souhaitez.\r\n\r\n<img class=\"image_darticle\" src=\"https://vignette.wikia.nocookie.net/lordsmobile/images/4/46/LM_FbAd_042_1200x628.jpg/revision/latest/scale-to-width-down/700?cb=20160919061540\"> \r\n<span class=\"legende\">Bien préparer sa stratégie ne pourra vous être que bénéfique..</span>\r\n\r\nVous allez devoir gérer non seulement votre armée et vos héros, comme dit précédement, mais également l\'équipement que ceux-ci vont porter. En effet, le jeu possède un système de \"loot\" permettant de trouver des objets sur les missions héros mais aussi de forger des armes et armures encore meilleures si vous y mettez le temps et l\'énergie necessaire.<br/>\r\nEn parlant d\'énergie : Lords Mobile n\'est pas un jeu dépendant d\'une certaine énergie quotidienne afin d\'avancer. Vous pourrez jouer des heures sans vous arrêtez et n\'aurez pas à attendre qu\'une jauge quelconque se remplisse à nouveau afin de toucher à votre jeu. Un bon point pour ce jeu de stratégie qui s\'est montré très prometteur depuis l\'année dernière.', 'Jérémy Mattausch', '2018-08-26', 'review', 'azer.jpg', 12),
(3, 'Dragon Saga', 'Dragon Saga, aussi connu sous le nom de \"Dragonica\" surtout en France, est un MMORPG en 3 dimensions utilisant du scrolling horizontal en tant que gameplay principal. Celui-ci est free to play et n\'est plus pay 2 win. (car il l\'était autrefois) <br/>\r\nSorti en 2009 par Gravity il a rapidement connu énormément de popularité auprès des pays du monde entier. Après avoir connu quelques déboirs financier, Gravity a décidé de couper les serveurs européens et de ne laisser uniquement les serveurs américains en ligne pour ne plus avoir à payer tant. Renommé alors sous le nom \"Dragon Saga\", celui-ci reprends petit à petit son envol avec une envolée phénoménale de joueur courant décembre 2017.\r\n\r\n<img src=\"http://jolstatic.fr/www/captures/870/7/18827-800.jpg\">\r\n<span class=\"legende\">Le jeu contient maintenant d\'autres classes, pour un total de 6 classes de base différentes et donc 12 classes \"finales\".</span>\r\n\r\nSi j\'ai parlé du système de P2W (Pay 2 Win) c\'est uniquement parce-qu\'à l\'époque, l\'équipe de Dragonica profitait bien des joueurs afin de vendre des points \"IM\" permettant d\'acheter du stuff premium ayant des caractéristiques bien plus évolués que les stuffs basique. Il était toujours possible d\'obtenir ces objets si d\'autres joueurs les achetaient pour les revendre contre de l\'argent IG. Cependant il était quand même très difficile de les obtenir de cette façon avec les prix très élevés.<br/>\r\nIl y a maintenant un système de \"Pièce d\'argent\" attrapable sur n\'importe quel monstre dans votre tranche de niveau et vous permettant d\'échanger ces dites pièces contre des objets normalement obtenable uniquement avec des points premium. Vous avez donc accès, tout comme les autres joueurs, à toute un panel de possibilité en ce qui concerne votre nouvel équipement et devriez y trouver votre bonheur.\r\n\r\n<img src=\"https://i.ytimg.com/vi/wKYFJ-9DiA4/maxresdefault.jpg\">\r\n<span class=\"legende\">De nouveaux équipements pour encore plus de dégats et de stats overpowered.</span>\r\n\r\nVenez faire un tour sur Steam et vous joindre à moi si la curiosité est en vous !', 'Jérémy Mattausch', '2018-08-26', 'review', 'azert.jpg', 27),
(4, 'Mecha Illaoi: Conception (Partie 1)', 'Avec la fin des votes et l’annonce du skin gagnant, il est désormais temps de valider le concept final pour Mecha Illaoi, le prochain skin de la Prêtresse du kraken (le nom n’est pas encore définitif). Mais avant de pouvoir passer à l’étape suivante, nous devons travailler sur quelques détails autour du thème.<br><br>\r\n\r\nRETOUR SUR L’UNIVERS ALTERNATIF MECHA <br>\r\nL’univers Mecha est un mélange de métal et de technologie, mais qui reste assez grossier et bourré de défauts. On pourrait par exemple l’opposer à l’univers de PROJET, qui est plutôt lisse et épuré, ou encore à Programme, qui nous plonge davantage dans un univers digital et cybernétique. Mecha est certes un univers futuriste, mais la technologie n’y est pas aussi avancée ou élaborée que celle de ces autres univers. Il y a dans Mecha un côté rétro et science-fiction brute de décoffrage.<br><br>\r\n\r\nLorsque nous pensons à Illaoi, nous devons aussi savoir ce qui la rend spéciale dans ce monde. Elle n’est pas elle-même une machine : c’est une humaine qui se rebelle contre les machines. Comment cet aspect modifie-t-il notre approche du skin ?<br><br>\r\n\r\nTRAME DE FOND D’ILLAOI<br>\r\nLorsque nous commençons à travailler sur un skin, nous voulons éviter de simplement copier/coller un thème sur un champion et dire « Ok, on a fait notre boulot, on peut rentrer chez nous ». Nous réfléchissons longuement au thème et au champion, et nous essayons de trouver une place adéquate pour chacun dans un Runeterra alternatif. Pour Mecha Illaoi, nous avons créé une petite trame de fond qui explique qui elle est, pourquoi elle est là et l’origine de l’énorme tête de robot qu’elle porte avec elle :<br><br>\r\n\r\n<i>Les machines créée par Viktor créateur traquent et déciment les humains dans un monde déchiré par la guerre. Ses plans se heurtent rapidement à un problème.<br><br>\r\n\r\nViktor capture et tente de transformer Illaoi, mais cette dernière est plus forte qu’il ne le pensait. Illaoi se libère de ses chaînes et, armée de son nouveau bras robotique, elle arrache la tête du garde mécanique géant qui la retenait prisonnière. Depuis, elle garde sa tête avec elle. Rapidement, elle comprend que les composants qui lui ont été implantés lui permettent de communiquer avec les machines de Viktor et le système informatique central. Grâce à ses découvertes, elle parvient à se mettre en sécurité tandis qu’elle commence à organiser la résistance.</i>\r\n\r\n<img src=\"https://nexus.leagueoflegends.com/wp-content/uploads/2017/12/LOL_CMS_168_Article_01_xgeymyjidky97j3zwf5m.jpg\">\r\n<span class=\"legende\">La tenue d\'Illaoi a été source de nombreux débats. Finalement, nous avons essayé de trouver le juste milieu entre la proposition élue par les joueurs et celle qui correspondait le mieux au personnage d\'Illaoi.</span>\r\n\r\nLe premier objectif d’un skin est de communiquer un thème précis et de raconter une histoire générale en quelques secondes, lorsque les joueurs le croisent sur leur voie. Inventer ce genre d’histoires avant de commencer à poser nos idées sur le papier nous aide à choisir une direction artistique. Tous les éléments (ses vêtements, son maquillage de guerre à l’huile de machine ou encore la tête de robot géante) ont tous été crées dans le but de refléter cette histoire.*<br><br>\r\n\r\nC’est désormais à nous d’utiliser ce modèle pour créer les effets visuels, les animations et la bande-son qui feront d’Illaoi la guerrière la plus impitoyable de la résistance. Les machines n’ont qu’à bien se tenir !<br><br>\r\n\r\n* Notons tout de même que la plupart du temps, ces histoires griffonnées sur un bout de papier servent plus d’inspiration pour créer le skin que pour l’histoire du champion elle-même. Ils s’agit de notes non-officielles que nous pouvons modifier au gré de l’évolution du skin.<br><br>\r\n\r\nLES TENTACULES<br>\r\nLes tentacules d’Illaoi font partie de ses caractéristiques les plus notoires et le succès du skin en dépend largement.<br><br>\r\n\r\nDans nos premières explorations, nous avons pensé à une main Mecha, mais l’équipe du gameplay nous a fait savoir que l’idée d’une « main tentacule » allait être problématique.<br><br>\r\n\r\nNous étions nombreux à aimer l’idée de cette main, et effectuer un changement de cette ampleur n’est pas quelque chose que nous prenons à la légère. Malheureusement, il arrive régulièrement qu’une bonne idée passe à la trappe, cela fait partie du processus de développement (même si c’est une idée qu’on adore tous). L’équipe du gameplay nous a toutefois expliqué sa position : pendant le développement d’Illaoi, l’équipe des champions a essayé différents types de tentacules et s’est aperçue que des tentacules solides ou opaques rendaient les combats d’équipes cauchemardesques. Lorsqu’Illaoi utilisait son ultime et que les tentacules se mettaient à frapper le sol, on n’y voyait vraiment plus rien. Il est parfois déjà assez difficile de savoir ce qu’il se passe pendant un combat d’équipes, et des mains robotiques transparentes n’auraient aucun sens. Le verdict étant tombé, nous avons continué à explorer les différentes possibilités que nous avions.\r\n\r\n<img src=\"https://nexus.leagueoflegends.com/wp-content/uploads/2017/12/LOL_CMS_168_Article_02_8v72x9skietn0z33z2po.jpg\">\r\n<span class=\"legende\">Grâce à un sympathique Rioter, nous avons tous appris ce qu\'était la « trypophobie » en regardant la proposition B. Les tentacules plus solides souffraient du même problème que les mains robotiques, à savoir le manque de transparence.</span>\r\n\r\nContenu venant de : <a href=\"https://nexus.leagueoflegends.com/fr-fr/2017/12/battlecast-illaoi-concepting/\">Nexus</a>', 'Jérémy Mattausch', '2017-12-28', 'lol', 'azertyu.jpg', 25),
(5, 'Mecha Illaoi: Conception (Partie 2)', '« J\'adore les différentes idées que nous avons là. Pour le moment, j\'ai plus l\'impression de voir l\'univers \'\'eternum\'\' que Mecha. La proposition C se rapproche le plus de ce que nous attendons. Les câbles rattachés au sol rendent vraiment bien. Je pense que si on durcit un peu les bord et qu\'on remplace le titane trop brillant par un fer plus épais, nous pourrons en faire quelque chose. Les skins Mecha doivent avoir un côté \'\'chars russes\'\' ou véhicules blindés. Pour le moment, ces propositions sont un peu trop épurées » - MechaHawk, responsable artistique<br><br>\r\n\r\nNous avons pensé à rendre les tentacules plus solides lorsqu’ils sont immobiles et plus transparents lorsqu’ils attaquent, afin de leur donner cet aspect blindé que nous recherchions sans pour autant obstruer la vision pendant les combats. Quand nous avons regardé comment procéder, nous nous sommes rendu compte que cela nécessiterait de recréer toute l’animation des tentacules. Nous aimions bien l’idée, mais nous avons dû l’abandonner à cause de ces problèmes.\r\n\r\n<img src=\"https://nexus.leagueoflegends.com/wp-content/uploads/2017/12/LOL_CMS_168_Article_03_xco9mv8f0nxuh885mvlc.png\">\r\n<span class=\"legende\">Un aperçu dans le jeu de ce qu\'auraient pu donner des tentacules solides devenant plus transparents pendant les combats.</span>\r\n\r\nNous avons finalement opté pour quelque chose qui se rapproche plus de ceux-ci :\r\n\r\n<img src=\"https://nexus.leagueoflegends.com/wp-content/uploads/2017/12/LOL_CMS_168_Article_04_ffwl29cwripl9wd7hfzj.jpg\">\r\n<span class=\"legende\">Nouveau concept</span>\r\n\r\nLe fluide rougeoyant fait partie intégrante de la technologie Mecha, et ces nouveaux tentacules le représentent parfaitement. Ils permettent aussi d’éliminer les problèmes de visibilité car ils sont beaucoup plus transparents. Ils donnent toutefois bien la sensation de solidité que l’on attendait d’un tentacule mecha. Le skin tout entier repose sur les tentacules, et nous devions passer beaucoup de temps dessus (savoir d’où viennent les tentacules est notre plus grand défi quand nous créons un skin pour Illaoi).\r\n\r\n<img src=\"https://nexus.leagueoflegends.com/wp-content/uploads/2017/12/LOL_CMS_168_Article_05_9s0zmn73ydowqnzdf1uy.jpg\">\r\n<span class=\"legende\">Tentacule Mecha</span>\r\n\r\nIl s’agit à 90 % du design final pour Mecha Illaoi. Bien sûr, nous allons devoir effectuer quelques ajustements pendant le développement, mais elle devrait ressembler à ça.<br><br>\r\n\r\nMaintenant que la conception est presque terminée, nous allons réfléchir à la façon dont nous pourrons transposer son kit dans l’univers Mecha.<br><br>\r\n\r\nContenu venant de : <a href=\"https://nexus.leagueoflegends.com/fr-fr/2017/12/battlecast-illaoi-concepting/\">Nexus</a>', 'Jérémy Mattausch', '2017-12-28', 'lol', 'azerty.jpg', 67);

-- --------------------------------------------------------

--
-- Structure de la table `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article_tag`
--

INSERT INTO `article_tag` (`id`, `articles_id`, `tags_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 4),
(4, 2, 5),
(5, 3, 6),
(6, 3, 7),
(8, 4, 3),
(9, 4, 6),
(11, 5, 3),
(12, 5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `phrases_presentation`
--

CREATE TABLE `phrases_presentation` (
  `id` int(255) NOT NULL,
  `phrase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `phrases_presentation`
--

INSERT INTO `phrases_presentation` (`id`, `phrase`) VALUES
(1, 'We all make choices in life, but in the end our choices make us.'),
(2, 'Get over here!'),
(3, 'What is better? To be born good or to overcome your evil nature through great effort?'),
(4, 'The right man in the wrong place can make all the difference in the world.'),
(5, 'Stand in the ashes of a trillion dead souls, and asks the ghosts if honor matters. The silence is your answer.'),
(6, 'Bring me a bucket, and I\'ll show you a bucket!'),
(7, 'Wanting something does not give you the right to have it.'),
(8, 'Even in dark times, we cannot relinquish the things that make us human.'),
(9, 'A hero need not speak. When he is gone, the world will speak for him.'),
(10, 'No gods or kings. Only man.'),
(11, 'You can’t break a man the way you break a dog, or a horse. The harder you beat a man, the taller he stands.'),
(12, 'It\'s time to kick ass and chew bubblegum... and I\'m all outta gum.'),
(13, 'If our lives are already written, it would take a courageous man to change the script.'),
(14, 'It\'s easy to forget what a sin is in the middle of a battlefield.'),
(15, 'The courage to walk into the Darkness, but strength to return to the Light.'),
(16, 'Who are you, that do not know your history?'),
(17, 'Don\'t wish it were easier, wish you were better.'),
(18, 'Nothing is true, everything is permitted.'),
(19, 'NOTHING IS MORE BADASS THAN TREATING A WOMAN WITH RESPECT!'),
(20, 'Good men mean well. We just don\'t always end up doing well.'),
(21, 'It’s dangerous to go alone, take this!'),
(22, 'War. War never changes.'),
(23, 'Often when we guess at others\' motives, we reveal only our own.'),
(24, 'Endure and survive.'),
(25, 'You are here, and it’s beautiful, and escaping isn’t always something bad.'),
(26, 'You can’t undo what you’ve already done, but you can face up to it.'),
(27, 'Life is all about resolve. Outcome is secondary.'),
(28, 'Stay awhile, and listen!'),
(29, 'Thank you Mario! But our Princess is in another castle!'),
(30, 'What is a man? A miserable little pile of secrets.'),
(31, 'My brothers and sisters... I will see you again. Someday. You\'ve given them back to me.'),
(32, 'A man chooses; a slave obeys.');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `nom`, `description`) VALUES
(1, 'Clicker', 'Désignant un jeu ayant pour but principal de cliquer à répétition.'),
(3, 'MOBA', 'Moba'),
(4, 'Mobile', 'None'),
(5, 'Strategie', 'None'),
(6, 'PC', 'None'),
(7, 'MMORPG', 'None');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `rank` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `birthdate`, `mail`, `rank`) VALUES
(1, 'AngelPhenix', '$2y$10$ff3SY31hX7lF.9kKXE.20uwfk3MZ5hNYObvif2E/1Pd.2e/LmUOtK', '1991-07-08', 'breathstylebro@gmail.com', 90);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phrases_presentation`
--
ALTER TABLE `phrases_presentation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `phrases_presentation`
--
ALTER TABLE `phrases_presentation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
