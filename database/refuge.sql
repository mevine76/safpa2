-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 17 juil. 2023 à 07:56
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `refuge`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id` int NOT NULL,
  `date_of_birth` date NOT NULL,
  `tatoo` tinyint(1) NOT NULL,
  `chip` tinyint(1) NOT NULL,
  `sex` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(25) NOT NULL,
  `weight` varchar(25) NOT NULL,
  `arrival_date` date NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `adoption_date` date NOT NULL,
  `id_Specie` int NOT NULL,
  `id_Color` int NOT NULL,
  `id_Breed` int NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `date_of_birth`, `tatoo`, `chip`, `sex`, `name`, `weight`, `arrival_date`, `reserved`, `adoption_date`, `id_Specie`, `id_Color`, `id_Breed`, `img`, `description`) VALUES
(9, '2023-01-01', 1, 0, 'female', 'Syrac', '2kg', '2023-07-06', 1, '2023-07-09', 1, 8, 9, 'siamese.jpg', 'Avec leur instinct de chasseur et leur capacité à bondir avec grâce, les chats sont des prédateurs naturels qui apportent une touche d\'aventure à votre foyer.'),
(10, '2023-06-27', 1, 1, 'male', 'gogo', '1kg', '2023-07-05', 0, '2023-07-08', 1, 1, 12, 'snow.jpg', 'Les chats sont des compagnons silencieux et observateurs, capables de se faufiler dans les endroits les plus étroits et de vous surprendre avec leur agilité.'),
(11, '2023-06-27', 1, 0, 'male', 'bol', '1kg', '2023-07-06', 0, '2023-07-07', 1, 7, 10, 'bengal.jpg', 'Les chats sont des animaux domestiques intelligents qui savent exprimer leurs besoins et leurs émotions de manière subtile et captivante.'),
(12, '2023-06-28', 0, 0, 'male', 'menu', '1kg', '2023-07-04', 0, '2023-07-07', 1, 1, 7, 'birman.jpg', 'Ces créatures mystérieuses possèdent un charme unique, et leur ronronnement apaisant est un véritable baume pour l\'âme.'),
(13, '2023-06-28', 0, 1, 'male', 'djk', '1kg', '2023-06-29', 0, '2023-07-09', 1, 1, 7, 'norvegien.jpg', 'Les chats sont des animaux domestiques à la fois indépendants et affectueux, connus pour leur élégance et leur grâce.'),
(17, '2023-05-01', 0, 0, 'female', 'SnowShoe', '4kg', '2023-07-09', 1, '2023-07-10', 1, 4, 7, 'sphynx.jpg', 'Les chats sont des compagnons curieux et joueurs, capables de passer des heures à chasser des jouets et à explorer leur environnement.'),
(21, '2023-07-05', 1, 0, 'male', 'sag', '1kg', '2023-07-06', 0, '2023-07-10', 2, 5, 16, 'amstaff.jpg', 'L\'American Staffordshire Terrier est un chien robuste et musclé, connu pour sa loyauté inébranlable envers sa famille et son tempérament amical, faisant de lui un compagnon protecteur et aimant.'),
(22, '2023-06-26', 0, 1, 'male', 'sci', '1kg', '2023-06-29', 0, '2023-07-06', 2, 1, 17, 'dogar.jpg', 'L\'Akita est un chien de grande taille, noble et courageux, qui se distingue par sa fidélité inconditionnelle envers ses proches et son attitude calme et réservée, en faisant un compagnon loyal et protecteur.'),
(23, '2022-03-01', 1, 1, 'femelle', 'Mara', '13kg', '2022-04-01', 0, '2023-07-01', 2, 2, 14, 'matin.jpg', 'Le chien de race Spitz est un chien de petite taille au pelage dense et ébouriffé, doté d\'une personnalité vive et alerte, ainsi que d\'une grande affection envers sa famille.'),
(24, '2023-06-28', 0, 1, 'male', 'Mors', '3kg', '2023-07-06', 0, '2023-07-11', 2, 4, 18, 'doberman.jpg', 'Le Doberman est un chien de taille moyenne à grande, connu pour sa silhouette élégante et sa nature protectrice. Intelligent et loyal, il est souvent apprécié pour sa capacité à être un excellent chien de garde et de compagnie.');

-- --------------------------------------------------------

--
-- Structure de la table `breed`
--

CREATE TABLE `breed` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_Specie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `breed`
--

INSERT INTO `breed` (`id`, `name`, `id_Specie`) VALUES
(7, 'Sacré de Birmanie', 1),
(8, 'Nu de Chine', 1),
(9, 'Norvégien', 1),
(10, 'SnowShoe', 1),
(12, 'Chat du Bengale', 1),
(13, 'Sphinx Canadien', 1),
(14, 'American Stafford Terrier', 2),
(15, 'Dogue de Bordeaux', 2),
(16, 'Rottweiler', 2),
(17, 'Mâtin de Naples', 2),
(18, 'Doberman', 2),
(19, 'Dogue Argentin', 2);

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'marron clair'),
(2, 'marron'),
(3, 'beige'),
(4, 'blanc'),
(5, 'feu'),
(6, 'rose'),
(7, 'marron fonce'),
(8, 'roux'),
(9, 'noir'),
(10, 'bleu'),
(11, 'noir'),
(12, 'blanc');

-- --------------------------------------------------------

--
-- Structure de la table `specie`
--

CREATE TABLE `specie` (
  `id` int NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `specie`
--

INSERT INTO `specie` (`id`, `name`) VALUES
(1, 'chat'),
(2, 'chien');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_Specie_FK` (`id_Specie`),
  ADD KEY `animal_Breed1_FK` (`id_Breed`),
  ADD KEY `animal_Color1_FK` (`id_Color`) USING BTREE;

--
-- Index pour la table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Breed_Specie_FK` (`id_Specie`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specie`
--
ALTER TABLE `specie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `specie`
--
ALTER TABLE `specie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_Breed1_FK` FOREIGN KEY (`id_Breed`) REFERENCES `breed` (`id`),
  ADD CONSTRAINT `animal_Color0_FK` FOREIGN KEY (`id_Color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `animal_Specie_FK` FOREIGN KEY (`id_Specie`) REFERENCES `specie` (`id`);

--
-- Contraintes pour la table `breed`
--
ALTER TABLE `breed`
  ADD CONSTRAINT `Breed_Specie_FK` FOREIGN KEY (`id_Specie`) REFERENCES `specie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
