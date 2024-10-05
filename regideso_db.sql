-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 05 oct. 2024 à 04:45
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `regideso_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `username`, `password`) VALUES
(1, 'LiobaIT', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adr` int(5) NOT NULL,
  `pays` varchar(25) DEFAULT NULL,
  `province` varchar(25) DEFAULT NULL,
  `commune` varchar(25) DEFAULT NULL,
  `quartier` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adr`, `pays`, `province`, `commune`, `quartier`) VALUES
(1, 'Burundi', 'Bujumbura Mairie', 'Ntahangwa', 'Kigobe'),
(2, 'Burundi', 'Makamba', 'Muha', 'Kanyosha'),
(3, 'Burundi', 'Gitega', 'Gitega', 'Nyabututsi'),
(4, 'Burundi', 'Bururi', 'Matana', 'Buganda'),
(5, 'Burundi', 'Cibitoke', 'Mabayi', 'Rugombo');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(5) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `adresse` int(5) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse`, `telephone`, `email`, `username`, `password`) VALUES
(1, 'Ndayishimiye', 'Évariste', 1, '+257 22 22 22 22', 'endayishimiye@gmail.com', 'evariste', '123'),
(3, 'Uwimana', 'Marie', 3, '+257 69 876 543', 'muwimana@hotmail.com', 'marie', '123'),
(4, 'Hakizimana', 'Jean Pierre', 4, '+257 72 123 456', 'phakizimana@yahoo.fr', 'pierre', '123'),
(5, 'Ndayisenga', 'Sylvie', 5, '+257 68 901 234', 'snzayisenga@outlook.com', 'sylvie', '123'),
(6, 'Ndayizeye', 'Venuste', 1, '68144939', 'liobabancako@gmail.com', 'LioIT', '123'),
(7, 'Unknown', 'Venuste', 1, '65435432', 'liobabancako@gmail.com', 'appolon', '123'),
(8, 'NDAYIZEYE', 'Venuste', 1, '+25768144939', 'liobabancako@gmail.com', 'LioIT', '123'),
(10, 'MUGISHA', 'Samandarii', 1, '+52468334260', 'gvhb@kk.com', 'Incognito', '98465');

-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE `compteur` (
  `id_compt` int(5) NOT NULL,
  `client` int(5) DEFAULT NULL,
  `num_compteur` int(50) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compteur`
--

INSERT INTO `compteur` (`id_compt`, `client`, `num_compteur`, `type`) VALUES
(1, 1, 12345, 'Electricité'),
(3, 3, 54321, 'Electricité'),
(4, 4, 98765, 'Eau'),
(5, 5, 23456, 'Electricité'),
(6, 1, 123455, 'eau');

-- --------------------------------------------------------

--
-- Structure de la table `contactez_nous`
--

CREATE TABLE `contactez_nous` (
  `id_cont` int(5) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `objet` varchar(25) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contactez_nous`
--

INSERT INTO `contactez_nous` (`id_cont`, `nom`, `prenom`, `adresse`, `telephone`, `objet`, `message`) VALUES
(1, 'Ndayisenga Jules ccc', 'Samandarii', '8e Avenuegg', '+25477568903', 'Reclamations de Mardi', 'sdygvibjk');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_fact` int(5) NOT NULL,
  `compteur` int(5) DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `date_pay` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id_fact`, `compteur`, `montant`, `date_pay`, `etat`) VALUES
(1, 1, 12000, '2024-10-03 06:26:40', '0'),
(3, 3, 15000, '2024-10-03 06:26:40', '0'),
(4, 4, 9500, '2024-10-03 06:26:40', '0'),
(5, 6, 11000222222, '2024-10-03 06:26:40', '0'),
(9, 4, 2300089, '2024-10-03 07:31:43', '0');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_pub` int(5) NOT NULL,
  `objectif` varchar(25) DEFAULT NULL,
  `publicite` varchar(200) DEFAULT NULL,
  `date_pub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_pub`, `objectif`, `publicite`, `date_pub`) VALUES
(1, 'examen', 'l examen commencera a midi', '2024-10-04 11:39:13'),
(2, 'notification', 'tcyvubyiubuonljn', '2024-10-04 11:39:24');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_recl` int(5) NOT NULL,
  `num_fact` int(5) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date_recl` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` enum('0','1') DEFAULT '0',
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id_recl`, `num_fact`, `description`, `date_recl`, `etat`, `image_path`) VALUES
(1, 1, 'Surfacturation', '2024-10-03 07:37:04', '0', NULL),
(2, 4, 'Surfacturation de haut niveau', '2024-10-03 07:38:53', '0', NULL),
(3, 3, 'Test numero 1', '2024-10-04 09:30:53', '0', '05b28e3041467d383c021dd9bd3a95ba.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adr`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `fk_adr_to_cl` (`adresse`);

--
-- Index pour la table `compteur`
--
ALTER TABLE `compteur`
  ADD PRIMARY KEY (`id_compt`),
  ADD KEY `fk_cl_to_compt` (`client`);

--
-- Index pour la table `contactez_nous`
--
ALTER TABLE `contactez_nous`
  ADD PRIMARY KEY (`id_cont`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_fact`),
  ADD KEY `fk_compt_to_fact` (`compteur`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_pub`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_recl`),
  ADD KEY `fk_fact_to_recl` (`num_fact`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `compteur`
--
ALTER TABLE `compteur`
  MODIFY `id_compt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `contactez_nous`
--
ALTER TABLE `contactez_nous`
  MODIFY `id_cont` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_fact` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_pub` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_recl` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_adr_to_cl` FOREIGN KEY (`adresse`) REFERENCES `adresse` (`id_adr`) ON DELETE CASCADE;

--
-- Contraintes pour la table `compteur`
--
ALTER TABLE `compteur`
  ADD CONSTRAINT `fk_cl_to_compt` FOREIGN KEY (`client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_compt_to_fact` FOREIGN KEY (`compteur`) REFERENCES `compteur` (`id_compt`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `fk_fact_to_recl` FOREIGN KEY (`num_fact`) REFERENCES `facture` (`id_fact`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
