-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 01 avr. 2024 à 20:33
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `actualités`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(250) NOT NULL,
  `tel` int NOT NULL,
  `entreprise` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `prenom`, `email`, `tel`, `entreprise`) VALUES
(1, 'test', 'test', 'test@test', 0, 'test'),
(2, 'test', 'test', 'test@test', 225, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `id_actualités`
--

DROP TABLE IF EXISTS `id_actualités`;
CREATE TABLE IF NOT EXISTS `id_actualités` (
  `titre` varchar(250) NOT NULL,
  `corps` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` int NOT NULL,
  `date_publication` varchar(250) NOT NULL,
  `date_revision` varchar(250) NOT NULL,
  `auteur` varchar(250) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `sources` varchar(250) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `id_actualités`
--

INSERT INTO `id_actualités` (`titre`, `corps`, `image`, `date_publication`, `date_revision`, `auteur`, `tags`, `sources`, `id`) VALUES
('Révolution dans le monde du surf : Des planches écologiques en algues marines gagnent en popularité', 'Une récente innovation dans le monde du surf attire l\'attention des amateurs et des professionnels : l\'utilisation d\'algues marines pour fabriquer des planches de surf écologiques. Cette révolution environnementale dans l\'industrie du surf pourrait b', 0, '', '2 avril 2024', 'Jeanne Leclerc', 'Surf, Planche de surf écologique, Algue marine, Durabilité, Innovation environnementale', 'SurfWorld Magazine\r\n\r\n\r\n\r\n\r\n\r\n', 1),
('Le Muay Thaï moderne : Entre tradition et adaptation', 'Le Muay Thaï, également connu sous le nom de boxe thaïlandaise, est un art martial ancien imprégné de tradition et de culture. Cependant, dans le paysage du sport moderne, cette discipline millénaire subit des transformations et des adaptations qui r', 0, '', ' 2 avril 2024', 'Ahmed Ben Youssef', 'Muay Thaï, Boxe thaïlandaise, Arts martiaux, Adaptation, Tradition, Conditionnement physique', 'Martial Arts Today Magazine', 2),
(' L\'Art Perdu de la Forge de Katana en Damascus : Résurgence d\'une Tradition Ancienne', 'Dans le monde des arts martiaux et de la culture japonaise, le katana est bien plus qu\'une simple arme ; c\'est un symbole de tradition, d\'honneur et de perfection artisanale. Parmi les diverses techniques de forge de katana, l\'une des plus prestigieu', 0, '', '2 avril 2024', 'Takeshi Yamamoto', 'Katana, Forge, Damascus, Artisanat, Tradition, Japon, Héritage culturel', 'Swordsmith Quarterly', 3),
('Le Développement PHP Orienté Objet : Vers une Programmation Plus Structurée et Évolutive', 'Le PHP, l\'un des langages de programmation web les plus populaires, a considérablement évolué au fil des ans, passant d\'une approche procédurale à une approche orientée objet (OO). Cette transition vers le développement PHP orienté objet a apporté de', 0, '', '2 avril 2024', 'Marie Dubois', 'PHP, Programmation Orientée Objet, Développement Web, Modularité, Réutilisabilité, Structuration du Code', 'PHP Developer\'s Journal', 4),
('Stratégies Avancées et Psychologie du Texas Hold\'em Poker : Maîtrisez le Jeu de Cartes le Plus Populaire au Monde', 'Le Texas Hold\'em Poker est bien plus qu\'un simple jeu de cartes ; c\'est un véritable défi mental qui combine habileté stratégique, calcul des probabilités et lecture subtile des adversaires. Alors que des millions de joueurs à travers le monde s\'adon', 0, '', '2 avril 2024', 'David Martin', 'Texas Hold\'em, Poker, Stratégie de Poker, Psychologie du Poker, Jeu de Cartes, Compétence', 'Poker Mastermind Magazine', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
