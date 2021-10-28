-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 27 oct. 2021 à 16:56
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
-- Base de données : `my_shop`
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
(18, 'Titre', 2, NULL, '0', 'bleu', NULL),
(19, 'Titre', 6, NULL, '0', 'bleu', NULL),
(20, 'Titre', 6, NULL, '0', 'bleu', NULL),
(21, 'Titre', 11, NULL, '0', 'bleu', NULL),
(22, 'Titre', 13, NULL, '0', 'blanc', NULL),
(23, 'Titre', 13, NULL, '0', 'blanc', NULL),
(24, 'Titre', 13, NULL, 'S', 'blanc', NULL),
(25, 'Tee-shirt Clotaire ', 10, NULL, 'S', 'bleu', NULL),
(26, 'Tee-shirt Clotaire soleil', 54, NULL, 'XL', 'noir', 'Homme'),
(27, 'Tee-shirt Clotaire pluie', 123, 'manche longue', 'L', 'noir', 'Homme'),
(28, 'Tee-shirt Sacha', 76, 'manche courte', 'M', 'blanc', 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `name` varchar(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `postcode` varchar(5) DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `admin` tinyint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `name`, `password`, `email`, `postcode`, `ville`, `address`, `phone`, `admin`) VALUES
(1, 'Jim', 'Titre', '0', 'arthur.noizet@gmail.com', '59000', NULL, NULL, '771109875', NULL),
(2, 'Jim', 'Titre', 'arthur', 'arthur.noizet@gmail.com', '59000', NULL, '', '771109875', NULL),
(3, 'Jim', 'Andeson', 'arthur', 'arthur.noizet@gmail.com', '59000', NULL, NULL, '771109875', NULL),
(4, 'Jim', 'Andeson', 'arthur', 'arthur.noizet@gmail.com', '59000', NULL, NULL, '771109875', NULL),
(5, 'Jim', 'Andeson', 'arthur', 'arthur.noizet@gmail.com', '59000', NULL, 'Place Rihour', '771109875', NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
