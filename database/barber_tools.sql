-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 30 août 2020 à 20:36
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `barber_tools`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`catId`, `catName`, `description`) VALUES
(1, 'Les Tendeusse', 'bbbbbbbbbbbbbbbbbb'),
(2, 'Ciseaux de rasage', ''),
(10, 'SOUHAIL', 'DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION '),
(13, 'Himmmm', ''),
(14, 'brah', ''),
(15, 'Himmmm', ''),
(16, 'brah', ''),
(17, 'Himmmm', ''),
(30, 'yyyyyyyy', 'yyyyyyyy');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `phone` int(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `prodId` int(11) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `descriptionGeneral` varchar(1000) NOT NULL,
  `price` double NOT NULL,
  `oldP` double NOT NULL,
  `statusProd` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`prodId`, `prodName`, `catId`, `description`, `descriptionGeneral`, `price`, `oldP`, `statusProd`, `image`, `image1`, `image2`, `image3`) VALUES
(1, 'WHAL', 0, 'Tendeuse Whal 1919 ', 'description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general Wahl 1919 description general ', 200, 250, 0, 'goldWhal1.jpg', 'goldWhal2.jpg', 'goldWhal3.jpg', 'goldWhal4.jpg'),
(2, 'ANDIS', 0, 'Andis Tendeuse 2002', '', 87.7667, 109, 1, 'IMG_4530-1.jpeg', '', '', ''),
(23, 'Chair', 0, 'Nouveau chair de coiffure avec tout option (clénie)\r\n-Chair 2020 \r\n- Barber Tools', '', 1800, 2000, 1, 'ch4.jpg', '', '', ''),
(27, 'new products', 0, 'new prodeucts images', '', 99, 989, 1, 'goldWhal2.jpg', '', '', ''),
(28, 'BNB', 0, 'BNBN BNB NEW ', '', 209, 220, 1, '', '', '', ''),
(29, 'BNB', 0, 'BNBN BNB NEW ', '', 209, 220, 1, 'goldWhal4.jpg', '', '', ''),
(30, 'Creme Gell', 0, 'Creme Gell Creme Gell Creme Gell Creme Gell Creme Gell ', '', 900, 990, 1, 'goldWhal1.jpg', 'goldWhal2.jpg', 'goldWhal4.jpg', 'goldWhal3.jpg'),
(31, 'MOUISSI BRAHIM', 0, 'klk', '099', 989, 0, 1, 'fd6468e54b30348f4f1fefe8340ba7bf.jpg', 'IMG_4530-1.jpeg', 'rBVaSFse8TOAQ2JTAAC9Rcn-tLE469.jpg', 'kkkkkskdjdjdjdjd\r\n-gtgtgttvtvtvvbbv\r\n-gtvtvf'),
(32, 'MOUISSI BRAHIM', 0, 'rfrfrfr', '099', 989, 0, 1, '', '', '', '-frfrrfrfrfvr.\r\n-frfrfrvvtrfrrfrrfrffffffffffff.'),
(33, 'MOUISSI BRAHIM', 0, 'rfrfrfr', '-frfrrfrfrfvr.\r\n-frfrfrvvtrfrrfrrfrffffffffffff.', 99, 989, 1, 'ch4.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `groupID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `Password`, `email`, `groupID`) VALUES
(1, 'himbra', 'BHBH', 'brahim7khalil@gmail.com', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `prodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
