-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 21 jan. 2024 à 20:34
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jimel`
--

-- --------------------------------------------------------

--
-- Structure de la table `eauipment`
--

CREATE TABLE `eauipment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `eauipment`
--

INSERT INTO `eauipment` (`id`, `name`, `details`, `quantity`) VALUES
(2, 'Halteres', 'halteres noirs Gymshark 10kg', 50),
(4, 'Barres', 'Barres', 400);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `plan` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone` int(20) NOT NULL,
  `joindate` date NOT NULL DEFAULT current_timestamp(),
  `relationship` varchar(30) NOT NULL,
  `eco` varchar(20) NOT NULL,
  `ephone` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `plan`, `name`, `nic`, `gender`, `dob`, `phone`, `joindate`, `relationship`, `eco`, `ephone`, `status`) VALUES
(6, '3', 'Hoppy', 'Hop88', 'Feminin', '2000-12-25', 993562756, '2024-01-13', 'Marié', 'David Craig', 976723456, 0),
(7, '5', 'Hoppy', 'Hop11', 'Feminin', '2000-12-25', 993562756, '2024-01-13', 'Marié', 'David Craig', 976723456, 0),
(8, '5', 'Arsene Bakanja', 'Ars56', 'Masculin', '2004-11-14', 2147483647, '2024-01-13', 'Célibataire', 'Sophie Barabuka', 976719826, 0);

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

CREATE TABLE `plan` (
  `pid` int(11) NOT NULL,
  `planname` varchar(255) NOT NULL,
  `validity` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plan`
--

INSERT INTO `plan` (`pid`, `planname`, `validity`, `amount`) VALUES
(5, 'Entraînement cardio', 2, 45),
(6, 'Entraînement dos', 6, 25);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Hoppy', 'hoppy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'yehosh', 'yeh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eauipment`
--
ALTER TABLE `eauipment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eauipment`
--
ALTER TABLE `eauipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `plan`
--
ALTER TABLE `plan`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
