-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 09 Mars 2020 à 09:27
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `associationdeveloppeurcompetence`
--

CREATE TABLE `associationdeveloppeurcompetence` (
  `idCompetence` int(11) NOT NULL,
  `idDeveloppeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `associationprojetmodule`
--

CREATE TABLE `associationprojetmodule` (
  `idProjet` int(11) NOT NULL,
  `idModule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `associationprojetmodule`
--

INSERT INTO `associationprojetmodule` (`idProjet`, `idModule`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`nom`, `prenom`, `email`, `num`) VALUES
('Everdeen', 'Katniss ', 'Everdeen@gmail.com', '+53 6 07 08 09 12'),
('Mellark', 'Peeta ', 'Mellark@gmail.com', '+55 6 07 08 09 10');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `dureeContrat` varchar(255) NOT NULL,
  `budgetNegocie` varchar(255) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `DateSignature` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`id`, `libelle`, `dureeContrat`, `budgetNegocie`, `idEntreprise`, `DateSignature`) VALUES
(1, 'Application pour les chat', '5 Ans', '50 000', 1, '2019-11-07'),
(4, 'test contrat', '5000 ans', '5000000', 10, '2019-11-08'),
(5, 'imprimante', 'f', '8900', 1, '2019-11-09');

-- --------------------------------------------------------

--
-- Structure de la table `developpeur`
--

CREATE TABLE `developpeur` (
  `id` int(11) NOT NULL,
  `idEquipe` int(11) DEFAULT NULL,
  `emailUtilisateur` varchar(255) CHARACTER SET utf8 NOT NULL,
  `numDev` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adrDev` varchar(255) CHARACTER SET utf8 NOT NULL,
  `villeDev` varchar(255) CHARACTER SET utf8 NOT NULL,
  `paysDev` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cpDev` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `developpeur`
--

INSERT INTO `developpeur` (`id`, `idEquipe`, `emailUtilisateur`, `numDev`, `adrDev`, `villeDev`, `paysDev`, `cpDev`) VALUES
(1, 1, 'allon@gmail.com', '06 07 08 09 10', '1 rue de la paix', 'Paris', 'France', '60001'),
(2, 1, 'Bacard@gmail.com', '07 08 09 10 11', '2 rue de la paix', 'Paris', 'France', '60000'),
(5, 1, 'Kirk@gmail.com', '10 11 12 13 14', '5 rue de la paix', 'Paris', 'France', '60000'),
(6, 1, 'Lefebvre@gmail.com', '11 12 13 14 15', '6 rue de la paix', 'Paris', 'France', '60000'),
(7, NULL, 'Lemoin@gmail.com', '13 14 15 16 17', '7 rue de la paix', 'Paris', 'France', '60000'),
(8, NULL, 'Martin@gmail.com', '14 15 16 17 18', '8 rue de la paix', 'Paris', 'France', '60000'),
(9, NULL, 'McCoy@gmail.com', '15 16 17 18 19', '9 rue de la paix', 'Paris', 'France', '60000'),
(10, NULL, 'Mendes@gmail.com', '16 17 18 19 20', '10 rue de la paix', 'Paris', 'France', '60000'),
(11, NULL, 'Montgomery@gmail.com', '17 18 19 20 21', '11 rue de la paix', 'Paris', 'France', '60000'),
(12, NULL, 'Nisse@gmail.com', '18 19 20 21 22', '12 rue de la paix', 'Paris', 'France', '60000'),
(13, NULL, 'Skywalker@gmail.com', '19 20 21 22 23', '13 rue de la paix', 'Paris', 'France', '60000'),
(14, NULL, 'Solo@gmail.com', '20 21 22 23 24', '14 rue de la paix', 'Paris', 'France', '60000'),
(15, NULL, 'Spock@gmail.com', '21 22 23 24 25', '15 rue de la paix', 'Paris', 'France', '60000'),
(16, NULL, 'Sulu@gmail.com', '22 23 24 25 26', '16 rue de la paix', 'Paris', 'France', '60000'),
(17, 2, 'Émile@gmail.com', '23 24 25 26 27', '17 rue de la paix', 'Paris', 'France', '60000');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `libelleEnt` varchar(255) NOT NULL,
  `villeEnt` varchar(255) NOT NULL,
  `adrEnt` varchar(255) NOT NULL,
  `numEnt` varchar(255) NOT NULL,
  `faxEnt` varchar(255) NOT NULL,
  `cpEnt` varchar(255) NOT NULL,
  `paysEnt` varchar(255) NOT NULL,
  `emailContact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `libelleEnt`, `villeEnt`, `adrEnt`, `numEnt`, `faxEnt`, `cpEnt`, `paysEnt`, `emailContact`) VALUES
(1, 'TechnoV', 'arras', '123 rue la paix', ' 10 11 12 13 14', '03 21 22 23 24', '60000', 'allemagne', 'Everdeen@gmail.com'),
(10, 'tomtom', 'arras', '123 rue de culmulus', '12 23 45 67 89', '03 04 05 06 07', '60000', 'Chine', 'Mellark@gmail.com'),
(11, 'rue', 'henin beaumont', '123 rue la goutte d\'or', 'test', '126853', '156841538', 'france', 'Mellark@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idresponsable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id`, `libelle`, `idresponsable`) VALUES
(1, 'Alpha', 1),
(2, 'Bravo', NULL),
(3, 'Charlie', NULL),
(4, 'Delta', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `idTache` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`id`, `libelle`, `idTache`) VALUES
(1, 'Site CSS', 1);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `charge` text NOT NULL,
  `idEquipe` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `charge`, `idEquipe`, `idContrat`) VALUES
(1, 'Creation d\'un site internet d\'E-commerce', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `idDeveloppeur` int(11) NOT NULL,
  `gereDelais` varchar(255) CHARACTER SET utf8 NOT NULL,
  `besoinHumain` varchar(255) CHARACTER SET utf8 NOT NULL,
  `materiel` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `responsable`
--

INSERT INTO `responsable` (`idDeveloppeur`, `gereDelais`, `besoinHumain`, `materiel`) VALUES
(1, '5 Mois', '10 Développeur', 'Sale informatique'),
(2, '3 jours', '2 Développeur', '4 Imprimante');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'Administrateur'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `nbHeure` varchar(255) NOT NULL,
  `coutTache` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id`, `libelle`, `nbHeure`, `coutTache`) VALUES
(1, 'Code css', '1', '15'),
(4, 'tache', '5', '50'),
(6, 'test', '12', '12300');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `mdp`, `nom`, `prenom`, `idRole`) VALUES
('admin@gmail.com', '$2y$10$iFUyrrW89IP5iZvVkmQ3uOnhInDTRx.8sYl37ogv3fuGVuGu3NUxa', 'Admin', 'Admin', 1),
('allon@gmail.com', '$2y$10$WNqSBHCYJz81zPxK1xrByO7EnYkDxr8hpNwZ.HqRoMFHn0qNESF8i', 'Allonie', 'Levy', 2),
('Bacard@gmail.com', '$2y$10$zU3wEw1qNuuVAkWee0boRuv/GbmrjANayLNZpBuJI97RKu2PMgO7m', 'Bacard', 'Hugo', 2),
('Dark62@gmail.com', '$2y$10$G7/A0NmCjA73EszAZv3MzuHw7OxWidtEHdT9vHklKVnoOyI0OqXO2', 'Dark', 'Maul', 2),
('Dark@gmail.com', '$2y$10$psQMJlat9MwqewHzcz.uGOcIMaFH6xpjlz8WKGIyLq/IjgmKjOKr2', 'Dark', 'Vador', 2),
('Émile@gmail.com', '$2y$10$a2g0.d91Ht9tKzVztV3VQO4Zuc4E5UOEso3DusOb9JrvlcF8.JFiC', 'Émile', 'Zola', 2),
('Kirk@gmail.com', '$2y$10$UqdpqwJh5.bU3eMQtoXun.TiRxHVjzQoT7zFQ0CHxTZ5Pe6xMF48u', 'Kirk', 'James', 2),
('Lefebvre@gmail.com', '$2y$10$p3WpAUl9RMigi17VwHyYRe15hJWXSRthm0nTlTih.cqfHpCbn0fUe', 'Lefebvre', 'Theo', 2),
('Lemoin@gmail.com', '$2y$10$COBVA8azEAhOiI8g02sib.CK39K.0h1pTkVxnfUPgYh0Nh2cFZlC6', 'Lemoin', 'Thibeaut', 2),
('Martin@gmail.com', '$2y$10$pq9TM.uZHlEbstQK4adf8uVtanVHM53RfBx9z6tpQXXLoKoUqMsTK', 'Martin', 'Florent', 2),
('McCoy@gmail.com', '$2y$10$at53nLrw4xnQ.QZbIYXEEOvjix11J1nBcWnBkWWvFlaV0aihAly9.', 'McCoy', 'Leonard', 2),
('Mendes@gmail.com', '$2y$10$3ZfnRK3QpMSdMhh0wZ1Ov.pe2esRJDDzWujJ/aDPLgvJqqwocS3za', 'Mendes', 'Tom', 2),
('Montgomery@gmail.com', '$2y$10$levyEVGbGK71/Ri6Er6Gcub//nDO6PPdV/m4Rk0ikZkPe.QggCo66', 'Montgomery', 'Scott', 2),
('Nisse@gmail.com', '$2y$10$mECQThXYQkiHNtGzLolOk.y7AOwHy/yAiSjwrZJi4OnV6oEDqoeya', 'Nisse', 'Mounir', 2),
('Skywalker@gmail.com', '$2y$10$QvNIApN.951V51B4YsVeRuSnyHazKVSTAElkfBS6w3LwybWjwjJ8a', 'Skywalker', 'Anakin', 2),
('Solo@gmail.com', '$2y$10$x.jql5XszdVyHBN0V92Tt.FHil6v/68LE1ZDtjPSN08ublp2cXOEG', 'Solo', 'Yan', 2),
('Spock@gmail.com', '$2y$10$OC.DYLtyt5Saguu41c1H4e/XLhX2rs6tulKd0WZxGxH7r9oRSulsK', 'Spock', 'Spock', 2),
('Sulu@gmail.com', '$2y$10$iCsyTJy82RZtFrqhnmL8R.8KS8QQwJMy4RPzhHRn28wKSsfFzihSG', 'Sulu', 'Hikaru', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `associationdeveloppeurcompetence`
--
ALTER TABLE `associationdeveloppeurcompetence`
  ADD KEY `idCompetence` (`idCompetence`),
  ADD KEY `idDeveloppeur` (`idDeveloppeur`);

--
-- Index pour la table `associationprojetmodule`
--
ALTER TABLE `associationprojetmodule`
  ADD KEY `idProjet` (`idProjet`,`idModule`),
  ADD KEY `idModule` (`idModule`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEntreprise` (`idEntreprise`);

--
-- Index pour la table `developpeur`
--
ALTER TABLE `developpeur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emailUtilisateur` (`emailUtilisateur`),
  ADD KEY `idEquipe` (`idEquipe`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idContact` (`emailContact`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idresponsable` (`idresponsable`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTache` (`idTache`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEquipe` (`idEquipe`),
  ADD KEY `idContrat` (`idContrat`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`idDeveloppeur`),
  ADD KEY `idDeveloppeur` (`idDeveloppeur`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`email`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `developpeur`
--
ALTER TABLE `developpeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `associationdeveloppeurcompetence`
--
ALTER TABLE `associationdeveloppeurcompetence`
  ADD CONSTRAINT `associationdeveloppeurcompetence_ibfk_1` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `associationdeveloppeurcompetence_ibfk_2` FOREIGN KEY (`idDeveloppeur`) REFERENCES `developpeur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `associationprojetmodule`
--
ALTER TABLE `associationprojetmodule`
  ADD CONSTRAINT `associationprojetmodule_ibfk_1` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `associationprojetmodule_ibfk_2` FOREIGN KEY (`idProjet`) REFERENCES `projet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `developpeur`
--
ALTER TABLE `developpeur`
  ADD CONSTRAINT `developpeur_ibfk_1` FOREIGN KEY (`emailUtilisateur`) REFERENCES `utilisateur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `developpeur_ibfk_2` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`emailContact`) REFERENCES `contact` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`idresponsable`) REFERENCES `responsable` (`idDeveloppeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`idTache`) REFERENCES `tache` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_2` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projet_ibfk_3` FOREIGN KEY (`idContrat`) REFERENCES `contrat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `responsable_ibfk_1` FOREIGN KEY (`idDeveloppeur`) REFERENCES `developpeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
