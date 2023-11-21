-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 04:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myresources`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `NomCategorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `NomCategorie`) VALUES
(13, 'categorie1'),
(40, 'categorie2');

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `ProjectID` int(11) NOT NULL,
  `NomProjet` varchar(50) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `DateDebut` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`ProjectID`, `NomProjet`, `Description`, `DateDebut`, `DateFin`) VALUES
(66, 'ECOMMERCE', 'Un site web e-commerce est une plateforme en ligne qui permet aux entreprises de vendre', '2023-11-12', '2023-11-30'),
(77, 'ERP', 'Un ERP est un système informatisé qui permet à une entreprise de gérer et d\'intégrer l\'ensemble de s', '2023-12-25', '2023-12-30'),
(90, 'AMAZON', 'Amazon est une entreprise multinationale américaine spécialisée dans le commerce électronique', '2023-12-01', '2023-12-15'),
(123, 'SCRUM BOARD', 'Scrum Board pour la gestion des projets', '2023-11-01', '2023-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `ressources`
--

CREATE TABLE `ressources` (
  `ResourceID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `SubcategoryID` int(11) DEFAULT NULL,
  `SquadID` int(11) DEFAULT NULL,
  `ProjectID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ressources`
--

INSERT INTO `ressources` (`ResourceID`, `CategoryID`, `SubcategoryID`, `SquadID`, `ProjectID`) VALUES
(234, 13, 66, 221, 77),
(846, 40, 87, 11, 123);

-- --------------------------------------------------------

--
-- Table structure for table `souscategories`
--

CREATE TABLE `souscategories` (
  `SubcategoryID` int(11) NOT NULL,
  `NomSousCategorie` varchar(255) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `souscategories`
--

INSERT INTO `souscategories` (`SubcategoryID`, `NomSousCategorie`, `CategoryID`) VALUES
(66, 'sousCategorie1', 13),
(87, 'sousCategorie2', 40);

-- --------------------------------------------------------

--
-- Table structure for table `squads`
--

CREATE TABLE `squads` (
  `SquadID` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `squads`
--

INSERT INTO `squads` (`SquadID`, `ProjectID`, `UserID`) VALUES
(11, 123, 2),
(14, 90, 3),
(221, 123, 3),
(300, 66, 1),
(343, 90, 4);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `UserID` int(11) NOT NULL,
  `NomUtilisateur` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Roles` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`UserID`, `NomUtilisateur`, `Email`, `Roles`) VALUES
(1, 'aicha', 'aichaettabet@gmail.com', 'leaderSquad'),
(2, 'soumiyaAyouch', 'souma@gmail.com', 'member1'),
(3, 'najwaElahanfi', 'najwa@gmail.com', 'member2'),
(4, 'nouhailamalal', 'noha@gmail.com', 'member3'),
(5, 'samira', 'samira@email.com', 'member4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`ProjectID`);

--
-- Indexes for table `ressources`
--
ALTER TABLE `ressources`
  ADD PRIMARY KEY (`ResourceID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `SubcategoryID` (`SubcategoryID`),
  ADD KEY `SquadID` (`SquadID`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`SubcategoryID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `squads`
--
ALTER TABLE `squads`
  ADD PRIMARY KEY (`SquadID`),
  ADD KEY `ProjectID` (`ProjectID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `ressources_ibfk_2` FOREIGN KEY (`SubcategoryID`) REFERENCES `souscategories` (`SubcategoryID`),
  ADD CONSTRAINT `ressources_ibfk_3` FOREIGN KEY (`SquadID`) REFERENCES `squads` (`SquadID`),
  ADD CONSTRAINT `ressources_ibfk_4` FOREIGN KEY (`ProjectID`) REFERENCES `projets` (`ProjectID`);

--
-- Constraints for table `souscategories`
--
ALTER TABLE `souscategories`
  ADD CONSTRAINT `souscategories_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `squads`
--
ALTER TABLE `squads`
  ADD CONSTRAINT `squads_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `projets` (`ProjectID`),
  ADD CONSTRAINT `squads_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `utilisateurs` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
