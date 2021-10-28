-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 28 oct. 2021 à 15:40
-- Version du serveur :  8.0.27-0ubuntu0.20.04.1
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP DATABASE IF EXISTS my_shop;
CREATE DATABASE my_shop;

USE my_shop;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `categorie` text,
  `size` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `color` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sexe` text CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `categorie`, `size`, `color`, `sexe`) VALUES
(1, 'T Shirt Blanc original', 17, 'manche courte\r\n', 'S', 'Blanc', 'Homme'),
(2, 'T Shirt Blanc original', 17, 'manche courte', 'M', 'Blanc', 'Homme'),
(3, 'T Shirt Blanc original', 17, 'Manche courte', 'L', 'Blanc ', 'Homme\r\n'),
(4, 'T Shirt Bleu original', 69, 'Manche longue', 'S', 'Bleu', 'Homme'),
(5, 'T Shirt Bleu original', 69, 'Manche longue', 'M', 'Bleu', 'Homme'),
(6, 'T Shirt Bleu original', 70, 'Manche longue', 'L', 'Bleu', 'Homme'),
(7, 'T Shirt Sunshine', 76, 'Manche courte', 'S', 'Noir', 'Femme'),
(8, 'T Shirt Sunshine', 75, 'Manche courte', 'M', 'Noir', 'Femme'),
(9, 'T Shirt Sunshine', 80, 'Manche courte', 'L', 'Noir', 'Femme'),
(10, 'Mister Tee', 75, 'Manche courte', 'S', 'Gris', 'Homme'),
(11, 'Mister Tee', 75, 'Manche courte', 'M', 'Gris', 'Homme'),
(12, 'Mister Tee', 75, 'Manche courte', 'L', 'Gris', 'Homme'),
(13, 'Mister Tee', 75, 'Manche courte', 'Xl', 'Gris', 'Homme'),
(14, 'Superdry', 25, 'Manche longue', 'S', 'Rouge', 'Femme'),
(15, 'Superdry', 25, 'Manche longue', 'M', 'Rouge', 'Femme'),
(16, 'Superdry', 25, 'Manche longue', 'L', 'Rouge', 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `postcode` varchar(5) DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `admin` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `name`, `password`, `email`, `postcode`, `ville`, `address`, `phone`, `admin`) VALUES
(1, 'Dominique ', ' Auger', 'arthur', 'DominiqueAuger@rhyta.com ', '93800', 'ÉPINAY-SUR-SEINE', '11, Rue du Palais', '01.35.76.60.41', NULL),
(2, 'Matthieu', 'Legendre', '~[ysSeOw\\$eY^BB', 'alain05@anesorensen.me', '59000', 'Paris ', '81, avenue du Marechal Juin', '07 13 96 55 41', NULL),
(3, 'Juliette ', 'Deschateau', 'xeiWu5EiJ', 'juliette@gmail.com', '75013', 'PARIS', '28 rue La Boétie', '01.17.26.63.97', NULL),
(4, 'Chnadonnet', 'Chnadonnet', 'Xei2touciul', 'LaureneChnadonnet@rhyta.com ', '97500', 'SAINT-PIERRE-ET-MIQUELON ', '43, rue de la Hulotais', '771109875', NULL),
(5, 'Trépanier', 'Trépanier', NULL, 'christophetrepanier@rhyta.com', '21000', 'Dijon', '84 rue des lieutemants Thomazo', '0387224551', NULL),
(6, 'Camille', 'Lagueux', NULL, 'CammileLagueux@rhyta.com ', '06100', 'Nice', '4, rue des Chaligny', '04 07 58 52 27', NULL),
(7, 'Ilio', 'Jonhson', NULL, 'iliojohnson@derty.fr', '51234', 'ETRY', '14 rue de la montée', '06 56 78 90 54', NULL),
(9, 'Luc ', 'Dupont', NULL, 'luc.dupont@gmail.com', '51000', 'Reims', '18 rue de Vesle', '06 75 45 34 09', NULL),
(10, 'Luc ', 'Dupont', NULL, 'luc.dupont@gmail.com', '51000', 'Reims', '18 rue de Vesle', '06 75 45 34 09', NULL),
(11, 'Luc ', 'Dupont', NULL, 'luc.dupont@gmail.com', '51000', 'Reims', '18 rue de Vesle', '06 75 45 34 09', NULL),
(12, 'Sacha ', 'Blin Zwertvaegher', 'arthur', 'sacha.blin@epitech.eu', '59000', 'Lille', 'Place Rihour', '0771100075', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
