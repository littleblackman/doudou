-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 13 oct. 2019 à 11:08
-- Version du serveur :  10.2.25-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `doudou`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `person_id` int(11) NOT NULL,
  `time_slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`person_id`, `time_slot_id`) VALUES
(36, 125),
(38, 124);

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `firstname` varchar(90) DEFAULT NULL,
  `lastname` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `person`
--

INSERT INTO `person` (`person_id`, `firstname`, `lastname`, `email`) VALUES
(1, 'Sandy', 'Razafitrimo', 'sandyrazafitrimo@gmail.com'),
(14, 'cs', 'cs', 'cs@cs.fr'),
(15, 'ma', 'm', 'sds'),
(16, 'dsds', 'dsd', 'sdss'),
(18, 'Marine', 'Bayme', 'marine@bayle.com'),
(36, 'Sam', 'Sam', 'sandyrazafitrimo@gmail.com'),
(38, 'S', 'm', 'sandyrazafitrimo@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `id_planning` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `public_link` varchar(255) DEFAULT NULL,
  `is_multiple_users` int(2) DEFAULT NULL,
  `user_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`id_planning`, `name`, `description`, `public_link`, `is_multiple_users`, `user_id`) VALUES
(2, 'Semaine du 14/10', 'Merci d\'indiquer vos noms et prénoms', 'semaine-14-10', 0, 2),
(7, 'Semaine du 31/10', 'Noms et prénoms', 'semaine-du-31-10', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `time_slot`
--

CREATE TABLE `time_slot` (
  `id_time_slot` int(11) NOT NULL,
  `date_available` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `is_booked` int(2) DEFAULT 0,
  `planning_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `time_slot`
--

INSERT INTO `time_slot` (`id_time_slot`, `date_available`, `time_start`, `time_end`, `is_booked`, `planning_id`) VALUES
(103, '2019-10-14', '12:00:00', '12:45:00', 0, 2),
(104, '2019-10-14', '13:00:00', '13:45:00', 0, 2),
(105, '2019-10-14', '14:00:00', '14:45:00', 0, 2),
(106, '2019-10-14', '19:00:00', '19:45:00', 0, 2),
(107, '2019-10-15', '11:00:00', '11:45:00', 0, 2),
(108, '2019-10-15', '12:00:00', '12:45:00', 0, 2),
(111, '2019-10-17', '10:00:00', '10:45:00', 0, 2),
(112, '2019-10-17', '11:00:00', '11:45:00', 0, 2),
(113, '2019-10-17', '12:00:00', '12:45:00', 0, 2),
(114, '2019-10-17', '13:00:00', '13:45:00', 0, 2),
(115, '2019-10-17', '14:00:00', '14:45:00', 0, 2),
(116, '2019-10-17', '19:00:00', '19:45:00', 0, 2),
(117, '2019-10-19', '10:00:00', '10:45:00', 0, 2),
(119, '2019-10-20', '10:00:00', '10:45:00', 0, 2),
(120, '2019-10-20', '11:00:00', '11:45:00', 0, 2),
(121, '2019-10-19', '09:00:00', '09:45:00', 0, 2),
(122, '2019-10-16', '09:00:00', '09:45:00', 0, 2),
(124, '2019-10-16', '14:00:00', '14:45:00', 0, 2),
(125, '2019-10-16', '15:00:00', '15:45:00', 0, 2),
(126, '2019-10-18', '19:00:00', '19:45:00', 0, 2),
(127, '2019-10-18', '18:00:00', '18:45:00', 0, 2),
(129, '2019-10-14', '09:00:00', '09:45:00', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `login` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `login`, `password`, `role`, `person_id`) VALUES
(2, 'desperados', '$2y$10$Tff2zzvHRP7L2s.04ijZ7.S2d/oH0WCDpLkqE9K5acpfbkw9U1yNK', 'ADMIN', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`person_id`,`time_slot_id`),
  ADD KEY `fk_person_has_time_slot_time_slot1_idx` (`time_slot_id`),
  ADD KEY `fk_person_has_time_slot_person_idx` (`person_id`);

--
-- Index pour la table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id_planning`,`user_id`),
  ADD UNIQUE KEY `public_link` (`public_link`),
  ADD KEY `fk_planning_user1_idx` (`user_id`);

--
-- Index pour la table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id_time_slot`,`planning_id`),
  ADD KEY `fk_time_slot_planning1_idx` (`planning_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`person_id`),
  ADD KEY `fk_user_person1_idx` (`person_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id_planning` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id_time_slot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_person_has_time_slot_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_person_has_time_slot_time_slot1` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slot` (`id_time_slot`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `fk_planning_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `time_slot`
--
ALTER TABLE `time_slot`
  ADD CONSTRAINT `fk_time_slot_planning1` FOREIGN KEY (`planning_id`) REFERENCES `planning` (`id_planning`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
