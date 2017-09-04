-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3346
-- Généré le :  Lun 04 Septembre 2017 à 15:44
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `prix`) VALUES
(28, 'Découverte', 13),
(29, 'Marée basse', 16),
(30, 'Infidèle', 72),
(32, 'Fast food', 9);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `plat`
--

INSERT INTO `plat` (`id`, `nom`, `prix`, `image`) VALUES
(13, 'Cassoulet Toulousain', 30, 'assets/img/cassoulet toulousain.png'),
(15, 'tajine au jambon serano', 11.5, 'assets/img/tajine.png'),
(16, 'pates a la bolognaises', 11.5, 'assets/img/pates a la bolognaises.png'),
(17, 'Couscous aux lardon', 14.5, 'assets/img/Couscous aux lardon.jpg'),
(18, 'Poulet au curry', 13, 'assets/img/Poulet au curry.jpg'),
(19, 'Tartiflette aux babibel', 16, 'assets/img/Tartiflette aux babibel.jpg'),
(20, 'kebab', 5.5, 'assets/img/kebab.jpg'),
(24, 'poutine', 11.5, 'assets/img/poutine.jpeg'),
(25, 'Bouillabesse', 11, 'assets/img/Bouillabesse.jpg'),
(27, 'Soupe de Poisson', 11, 'assets/img/Soupe de Poisson.jpeg'),
(28, 'Burger', 7, 'assets/img/Burger.png');

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

CREATE TABLE `relation` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_plat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `relation`
--

INSERT INTO `relation` (`id`, `id_menu`, `id_plat`) VALUES
(28, 30, 15),
(29, 30, 17),
(61, 28, 13),
(62, 28, 17),
(63, 28, 18),
(64, 28, 27),
(65, 32, 20),
(66, 32, 28),
(67, 29, 25),
(68, 29, 27);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_plat` (`id_plat`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `link_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `link_id_plat` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
