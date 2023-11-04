-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 nov. 2023 à 18:00
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `contact`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuaire`
--

CREATE TABLE `annuaire` (
  `id_contact` int(10) NOT NULL,
  `nom_contact` varchar(100) NOT NULL,
  `prenom_contact` varchar(100) NOT NULL,
  `mail_contact` varchar(250) NOT NULL,
  `tel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Déchargement des données de la table `annuaire`
--

INSERT INTO `annuaire` (`id_contact`, `nom_contact`, `prenom_contact`, `mail_contact`, `tel`) VALUES
(1, 'DIEYE', 'Kadia', 'kadia5@gmail.com', '+221 77 142 17 30'),
(3, 'Annie Boyor', 'Thérèse', 'boyor@gmail.com', '+221 77 142 17 31'),
(4, 'Yama', 'WADE', 'yama@gmail.com', '+221 77 142 17 32'),
(5, 'CAMARA', 'Ciré', 'cirecamara@gmail.com', '+221 77 142 17 34'),
(6, 'FAYE', 'Mouhamed', 'mouhamed@gmail.com', '+221 77 142 17 36'),
(7, 'LEYE', 'Aboubacar', 'bacarleye@gmail.com', '+221 77 142 17 39'),
(8, 'NGOM', 'Bouram', 'ngomboura@gmail.com', '+221 77 142 17 40'),
(9, 'DIOUF', 'Aminata', 'aminata@gmail.com', '+221 77 142 17 41'),
(10, 'TOURE', 'Rokhaya', 'kiya@gmail.com', '+221 77 142 17 42'),
(12, 'è__çèçpà)à', '_çàààààà)=', 'boyor@gmail', '67890');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annuaire`
--
ALTER TABLE `annuaire`
  ADD PRIMARY KEY (`id_contact`),
  ADD UNIQUE KEY `ctc_mail` (`mail_contact`),
  ADD UNIQUE KEY `telephone` (`tel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annuaire`
--
ALTER TABLE `annuaire`
  MODIFY `id_contact` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
