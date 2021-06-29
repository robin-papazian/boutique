-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 08 avr. 2021 à 15:50
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int UNSIGNED NOT NULL,
  `categories_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(1, 'Aspirateur'),
(2, 'Purificateur'),
(3, 'Robot_Cuisine'),
(4, 'Cuiseur_Vapeur');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`) VALUES
(1),
(42);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `factures_id` int NOT NULL,
  `factures_price` float NOT NULL,
  `factures_user` int NOT NULL,
  `factures_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`factures_id`, `factures_price`, `factures_user`, `factures_date`) VALUES
(13, 3998, 69, '2021-04-08 00:21:09'),
(14, 3998, 69, '2021-04-08 00:27:19'),
(15, 1499, 69, '2021-04-08 00:28:06'),
(16, 2049, 69, '2021-04-08 00:33:06'),
(17, 2049, 69, '2021-04-08 09:11:25'),
(18, 0, 69, '2021-04-08 09:16:14');

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `paniers_id` int UNSIGNED NOT NULL,
  `paniers_from` int UNSIGNED NOT NULL,
  `paniers_product` int UNSIGNED NOT NULL,
  `paniers_quantity` int NOT NULL,
  `paniers_ref` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paniers`
--

INSERT INTO `paniers` (`paniers_id`, `paniers_from`, `paniers_product`, `paniers_quantity`, `paniers_ref`) VALUES
(23, 69, 2, 2, 13),
(24, 69, 3, 1, 13),
(25, 69, 10, 1, 13),
(26, 69, 2, 2, 14),
(27, 69, 3, 1, 14),
(28, 69, 10, 1, 14),
(29, 69, 3, 1, 15),
(30, 69, 2, 1, 16),
(31, 69, 3, 1, 16),
(32, 69, 2, 1, 17),
(33, 69, 3, 1, 17),
(34, 69, 2, 1, 18);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `products_id` int UNSIGNED NOT NULL,
  `products_name` varchar(30) NOT NULL,
  `products_description` text,
  `products_price` float UNSIGNED NOT NULL,
  `products_categorie` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_description`, `products_price`, `products_categorie`) VALUES
(1, 'lux1', 'une gamme exceptionel', 1000, 1),
(2, 'D795', 'game emblématique de la marque lux avant le lux1', 550, 1),
(3, 'Lux S 115', 'Commercialisé depuis 2017. Aspirateur purificateur d\'air avec système Médiclean. Un monstre de technologie', 1499, 1),
(10, 'Purif 2000', 'Le meilleur', 1399, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int UNSIGNED NOT NULL,
  `users_login` varchar(30) NOT NULL,
  `users_password` varchar(200) DEFAULT NULL,
  `users_name` varchar(30) DEFAULT NULL,
  `users_familly_name` varchar(30) DEFAULT NULL,
  `users_town` varchar(30) DEFAULT NULL,
  `users_post_code` int DEFAULT NULL,
  `users_street` varchar(100) DEFAULT NULL,
  `users_email` varchar(100) DEFAULT NULL,
  `users_droit` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `users_login`, `users_password`, `users_name`, `users_familly_name`, `users_town`, `users_post_code`, `users_street`, `users_email`, `users_droit`) VALUES
(67, 'pa', '$2y$10$Ss954aW7vzV/aDlIO4nW2OcyyZJnkJl7bIXHinUK2sXeopBTCyc0u', 'pierro', 'malardier', NULL, 8, NULL, NULL, 1),
(69, 'phpmyadmin', '$2y$10$8omEKCsY/pHkavBDal7vf.IkoD9RH3rwNtDAe6hQzuTapjMPf91Gm', NULL, 'mysql', NULL, 5, NULL, 'robin.papazian@laplateforme.io', 42),
(75, 'baba', '$2y$10$ByC3DL6.fKMVvoLSad10COQmWn3S0.sLs8aO7JvO70Z.Roxgv0xwG', 'hilaire', 'marion', 'marseille', 13007, 'coteau', 'hilairema@gmail.com', 42),
(77, 'bbbbbbbb', '$2y$10$BeCDaNB3vwVBDUZgT.HoZOqruuhZ35Cp9upqXHVpgm7EgSANI5WOW', 'lslsdls', 'dkdkd', NULL, 5, NULL, NULL, NULL),
(78, 'fo', '$2y$10$qsGEr8CMA0tacHsga.jUxObpfPUCX/Dk6vBgqYabr/CkPgdOqRBzi', NULL, NULL, NULL, 2, NULL, NULL, 1),
(79, 'rob', '$2y$10$hb4uGXy3i.8UBTl.8fGbze95GRG28rXoBFtAmNrTjwxkSozEFUfAq', 'robin', 'papazian', NULL, 3, NULL, 'robin.papazian@laplateforme.io', 1),
(80, 'mmmm', '$2y$10$NbwLHk4lOlM9AfUfIxGOtevw56v8T1yyP2MjkVOiclCduMW4fgFcC', 'mmmm', 'mmmm', 'mmm', 2, 'mm', 'mmma@mail', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`factures_id`),
  ADD KEY `factures_user` (`factures_user`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`paniers_id`),
  ADD KEY `orders_from` (`paniers_from`),
  ADD KEY `orders_product` (`paniers_product`),
  ADD KEY `paniers_ref` (`paniers_ref`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `products_categorie` (`products_categorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_login` (`users_login`),
  ADD KEY `fk_users_droit` (`users_droit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `factures_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `paniers_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_ibfk_1` FOREIGN KEY (`paniers_from`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `paniers_ibfk_2` FOREIGN KEY (`paniers_product`) REFERENCES `products` (`products_id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`products_categorie`) REFERENCES `categories` (`categories_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_droit` FOREIGN KEY (`users_droit`) REFERENCES `droits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
