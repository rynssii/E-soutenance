-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 16:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `auth_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`id`, `name`) VALUES
(1, 'Licence'),
(2, 'Master');

-- --------------------------------------------------------

--
-- Structure de la table `groupp`
--

CREATE TABLE `groupp` (
  `id` int(50) NOT NULL,
  `nomgroup` varchar(255) NOT NULL,
  `student1` varchar(255) NOT NULL,
  `student2` varchar(255) NOT NULL,
  `student3` varchar(255) NOT NULL,
  `theme` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rdvprof`
--

CREATE TABLE `rdvprof` (
  `id` int(50) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `nmgroup` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

CREATE TABLE `soutenance` (
  `id` int(50) NOT NULL,
  `date` date NOT NULL,
  `salle` varchar(50) NOT NULL,
  `theme` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `name`) VALUES
(1, 'SI'),
(2, 'GADM'),
(3, 'IATI'),
(4, 'RSI'),
(5, 'SEM'),
(6, 'SID');

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE `suivi` (
  `id` int(11) NOT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `filiere` varchar(255) DEFAULT NULL,
  `specialite` varchar(255) DEFAULT NULL,
  `intitule_memoire` text DEFAULT NULL,
  `student1` varchar(255) DEFAULT NULL,
  `student2` varchar(255) DEFAULT NULL,
  `student3` varchar(255) DEFAULT NULL,
  `encadrant` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `date_seance` date DEFAULT NULL,
  `contenu_seance` text DEFAULT NULL,
  `taux_avancement` varchar(255) DEFAULT NULL,
  `autorisation_depot` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `themeprof`
--

CREATE TABLE `themeprof` (
  `id` int(50) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `cyclet` int(11) NOT NULL,
  `prof` int(50) NOT NULL,
  `specialt` int(11) NOT NULL,
  `autoris` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `fac` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.jpeg',
  `typeuser` varchar(255) NOT NULL,
  `depa` varchar(255) NOT NULL,
  `cycle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `pname`, `fac`, `special`, `email`, `username`, `password`, `pp`, `typeuser`, `depa`, `cycle`) VALUES
(1, 'boucherit', 'wissal', 'siences', 'SI', 'meriemsb22@gmail.com', '004', '$2y$10$ilFkD03EqhB01NQYledgV.r5cBFBtJ/ptNWpgDOAguXnfIP5znQIK', 'uname66546426bcf392.75056558.jpg', 'etudiant', 'informatique', 'Licence'),
(2, 'yakoubi', 'karim', 'siences', '', '', '001', '$2y$10$DMf7mjgJOOEVRCuUS62o2OThLe6edcdlB3c4JHcRe2lPuZPCX1hhy', 'uname6654645f3a11e7.51583754.jpg', 'enseignant', 'informatique', 'none'),
(3, 'hayahom', 'walid', 'siences', '', '', '002', '$2y$10$46qTAGyCqs8ot.zAJAa.2.9EXY1nEslMD/NHjp1WT3jBQZPIAD9iC', 'uname6654648df26a13.15969121.jpg', 'administrateur', 'informatique', 'none'),
(42, 'allalga', 'anis', 'siences', '', '', '007', '$2y$10$97K7VZZ3mGHz/wUKdTlFJ.sgdPcuH72/B2cfXlP2esqKvRbfpBFJG', 'uname66549220e01557.91835141.jpg', 'enseignant', 'informatique', 'none'),
(43, 'hamdache', 'nawel', '', 'gadm', '', '009', '$2y$10$H4lU4YbVyiWUAazWf1hlQutDypXx7yECAx8zyn.y4ADVHqR.Z.V3C', 'uname66576911bc85e6.28220428.jpg', 'etudiant', '', 'Master'),
(44, 'bouhala', 'syrine', '', 'gadm', '', 'syrine', '$2y$10$VNP8ROu1F6szADfPEqd.Se/.6iFiWrWrddES4Kcif154H8P7y/nfu', 'default-pp.jpeg', 'etudiant', '', 'Master'),
(46, 'allalga', 'salim', '', '', '', '003', '$2y$10$hPdAntJYLD1GV038ZRzvUuXLtKX.ROcFQHBET3rqGaq/F/Njo5VR2', 'default-pp.jpeg', 'enseignant', '', 'none');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupp`
--
ALTER TABLE `groupp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student1_2` (`student1`,`student2`,`student3`),
  ADD KEY `fk_theme_groupe` (`theme`),
  ADD KEY `nomgroup` (`nomgroup`),
  ADD KEY `nomgroup_2` (`nomgroup`),
  ADD KEY `student1` (`student1`,`student2`,`student3`);

--
-- Index pour la table `rdvprof`
--
ALTER TABLE `rdvprof`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nmgroup` (`nmgroup`);

--
-- Index pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_theme_sout` (`theme`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `themeprof`
--
ALTER TABLE `themeprof`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prof` (`prof`),
  ADD KEY `theme` (`theme`),
  ADD KEY `fk_cycle` (`cyclet`),
  ADD KEY `fk_specialite` (`specialt`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fname` (`fname`,`pname`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cycle`
--
ALTER TABLE `cycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `groupp`
--
ALTER TABLE `groupp`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `rdvprof`
--
ALTER TABLE `rdvprof`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `suivi`
--
ALTER TABLE `suivi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `themeprof`
--
ALTER TABLE `themeprof`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `groupp`
--
ALTER TABLE `groupp`
  ADD CONSTRAINT `fk_theme_groupe` FOREIGN KEY (`theme`) REFERENCES `themeprof` (`id`);

--
-- Contraintes pour la table `rdvprof`
--
ALTER TABLE `rdvprof`
  ADD CONSTRAINT `fk_rdv_groupe` FOREIGN KEY (`nmgroup`) REFERENCES `groupp` (`id`);

--
-- Contraintes pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD CONSTRAINT `fk_theme_sout` FOREIGN KEY (`theme`) REFERENCES `themeprof` (`id`);

--
-- Contraintes pour la table `themeprof`
--
ALTER TABLE `themeprof`
  ADD CONSTRAINT `fk_cycle` FOREIGN KEY (`cyclet`) REFERENCES `cycle` (`id`),
  ADD CONSTRAINT `fk_prof_theme` FOREIGN KEY (`prof`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_specialite` FOREIGN KEY (`specialt`) REFERENCES `specialite` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
