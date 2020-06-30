-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 30 juin 2020 à 19:19
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comment_date` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_billets_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `comment_date`, `post_id`) VALUES
(1, 'Mat', 'Alors dis quelque chose !!!', '2020-06-16 23:22:13', 1),
(2, 'Lilou85260', 'Coucou papa !!!', '2020-06-16 23:22:38', 1),
(3, 'lilou85260', 'Bah alors dis moi bonjour', '2020-06-16 23:23:21', 2),
(4, 'Anna', 'Commentaire 23', '2020-06-16 23:23:50', 2),
(5, 'Mat', 'wyksegcrfbygxdvbcgc lcsgfbcyt!!!!!!!!!!!', '2020-06-16 23:24:09', 2),
(6, 'Goldorak', 'GO !!!!!!!!\r\nYoupii!!!!', '2020-06-16 23:24:59', 3),
(7, 'Dexter', 'Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou Miaou ', '2020-06-16 23:25:31', 3),
(9, 'Mathieu', 'Test d\'un insert et d\'un affichage', '0000-00-00 00:00:00', 3),
(10, 'Mathieu', 'Test d\'un insert et d\'un affichage', '0000-00-00 00:00:00', 3),
(11, 'Mathieu', 'Test d\'un insert et d\'un affichage', '0000-00-00 00:00:00', 3),
(12, 'Mathieu', 'Test d\'un insert et d\'un affichage', '0000-00-00 00:00:00', 3),
(13, 'Mathieu', 'bonjour', '0000-00-00 00:00:00', 2),
(14, 'Mathieu', 'Salut a tous', '0000-00-00 00:00:00', 2),
(15, 'Mathieu', 'Salut a tous', '0000-00-00 00:00:00', 2),
(16, 'Mathieu', 'Test d\'un insert et d\'un affichage', '0000-00-00 00:00:00', 2),
(17, 'Mathieu', 'je tente ce test', '2020-06-17 21:47:50', 1),
(18, 'Lilou', 'Ca marche ou ca marche pas', '2020-06-24 23:26:11', 2),
(19, 'pkuck', 'sctgssretxzqs', '2020-06-28 14:09:38', 3),
(20, 'anais', 'coucou', '2020-06-28 14:09:45', 3),
(21, 'phuck', 'Je m\'appelle Phuck !!!', '2020-06-28 14:10:26', 1),
(22, 'phuck', 'Je m\'appelle Phuck !!!', '2020-06-28 14:10:39', 1),
(23, 'phuck', 'Je m\'appelle Phuck !!!', '2020-06-28 14:12:52', 1),
(24, 'pkuck', 'dhdvgcdvgdcwv', '2020-06-28 14:13:01', 1),
(25, 'dwvfghscvg', 'vdgwcdvcwc', '2020-06-28 14:13:05', 1),
(26, 'dwvfghscvg', 'vdgwcdvcwc', '2020-06-28 14:26:37', 1),
(27, 'ggerard', 'il faut que je te parle', '2020-06-28 14:26:54', 1),
(28, '', 'ghghhh', '2020-06-28 14:27:12', 1),
(29, '', 'ghghhh', '2020-06-28 14:29:10', 1),
(30, 'grgs', 'tghy', '2020-06-28 14:36:25', 1),
(31, 'fdwgwddg', 'ttgghhyy', '2020-06-28 15:08:09', 2),
(32, 'fgsd', 'nnbbvv', '2020-06-28 15:08:15', 2),
(33, 'phuck', 'fghsdhd', '2020-06-28 17:33:49', 2),
(34, 'pkuck', 'tentative !!!', '2020-06-28 18:47:36', 4),
(35, 'pkuck', 'je sais toujours pas quoi dire<br />\r\n', '2020-06-29 20:01:22', 6);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'mon premier post', 'Ceci est mon premier post et je n\'ai pas grand chose a dire pour l\'instant', '2020-06-16 23:18:14'),
(2, '2eme article', 'Voici mon 2eme post et je ne sais toujours pas quoi dire. décidement.....', '2020-06-16 23:19:41'),
(3, 'Sujet php', 'Voici le 3eme post, on va parler de php que je commence tout juste a apprendre.qsd sgsfqc sdfddfqs sdfdvdfhy gydggj , rdtfygg efegy sefygry (b(ygfeg esvyfysg ', '2020-06-16 23:21:03'),
(4, 'Ajout d\'un nouvel article', 'lorem ipsum hhggftyrgh', '2020-06-28 18:46:18'),
(5, '', '', '2020-06-28 18:48:13'),
(6, 'PHP C\'est la vie !!!', 'PHP PHP PHP PHP PHP PHPPHP PHPPHPPHPPHPPHP v PHP', '2020-06-29 20:00:58');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_billets_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
