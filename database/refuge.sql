-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2023 at 12:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `refuge`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
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
  `id_Breed` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `date_of_birth`, `tatoo`, `chip`, `sex`, `name`, `weight`, `arrival_date`, `reserved`, `adoption_date`, `id_Specie`, `id_Color`, `id_Breed`) VALUES
(8, '1985-08-30', 1, 1, 'female', 'intrue', '7kg', '1996-01-01', 1, '1996-02-01', 1, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_Specie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `breed`
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
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `color`
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
-- Table structure for table `specie`
--

CREATE TABLE `specie` (
  `id` int NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `specie`
--

INSERT INTO `specie` (`id`, `name`) VALUES
(1, 'chat'),
(2, 'chien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_Specie_FK` (`id_Specie`),
  ADD KEY `animal_Breed1_FK` (`id_Breed`),
  ADD KEY `animal_Color1_FK` (`id_Color`) USING BTREE;

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Breed_Specie_FK` (`id_Specie`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specie`
--
ALTER TABLE `specie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `specie`
--
ALTER TABLE `specie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_Breed1_FK` FOREIGN KEY (`id_Breed`) REFERENCES `breed` (`id`),
  ADD CONSTRAINT `animal_Color0_FK` FOREIGN KEY (`id_Color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `animal_Specie_FK` FOREIGN KEY (`id_Specie`) REFERENCES `specie` (`id`);

--
-- Constraints for table `breed`
--
ALTER TABLE `breed`
  ADD CONSTRAINT `Breed_Specie_FK` FOREIGN KEY (`id_Specie`) REFERENCES `specie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
