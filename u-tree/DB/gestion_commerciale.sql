-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2023 at 09:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_commerciale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `nomUtilisateur` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nomUtilisateur`, `motDePasse`) VALUES
(1, 'ben', 'ben'),
(2, 'sultane', 'sultane'),
(3, 'lesfar', 'lesfar');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `numCommande` int(11) NOT NULL,
  `numClient` int(11) NOT NULL,
  `dateCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`numCommande`, `numClient`, `dateCommande`) VALUES
(1, 2, '0654-05-04'),
(6, 9, '2023-01-01'),
(2, 5, '2023-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `numClient` int(100) NOT NULL,
  `nomClient` varchar(100) NOT NULL,
  `raisonSocial` varchar(100) NOT NULL,
  `adresseClient` varchar(100) NOT NULL,
  `villeClient` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`numClient`, `nomClient`, `raisonSocial`, `adresseClient`, `villeClient`, `pays`, `telephone`) VALUES
(6, 'sultane', 'student', 'temara', 'temara', 'maroc', '0777516907'),
(7, 'issam', 'student', 'temara', 'temara', 'maroc', '0661513131'),
(8, 'saadi', 'prof ', 'est sale', 'sale', 'maroc', '0661111112');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `numCommande` int(100) NOT NULL,
  `numClient` int(100) NOT NULL,
  `dateCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`numCommande`, `numClient`, `dateCommande`) VALUES
(3, 6, '2023-01-04'),
(4, 7, '2023-01-03'),
(5, 8, '2023-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `numCommande` int(100) NOT NULL,
  `numClient` int(11) NOT NULL,
  `refProduit` int(11) NOT NULL,
  `qteCommande` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ligne_commande`
--

INSERT INTO `ligne_commande` (`numCommande`, `numClient`, `refProduit`, `qteCommande`) VALUES
(3, 6, 2, 11),
(4, 7, 4, 1),
(5, 8, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `refProduit` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `prixUnitaire` int(100) NOT NULL,
  `qteStockee` int(100) NOT NULL,
  `indisponible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`refProduit`, `nomProduit`, `prixUnitaire`, `qteStockee`, `indisponible`) VALUES
(2, 'pc', 10000, 20, '1'),
(3, 'phone', 5699, 100, '1'),
(4, 'ipad', 9999, 0, '0'),
(5, 'tv', 6599, 6, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`numClient`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numCommande`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`refProduit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `numClient` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `numCommande` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `refProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
