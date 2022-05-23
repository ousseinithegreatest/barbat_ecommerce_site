-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 07 mars 2020 à 15:55
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db-barbat`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Accueil'),
(2, 'Téléphones'),
(3, 'Ordinateurs'),
(4, 'Jeux Vidéo'),
(5, 'Sports'),
(6, 'Chaussures');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `idProduit` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`idProduit`, `name`, `description`, `price`, `image`, `category`) VALUES
(37, 'PUMA RS-CUBE', 'NOIR/BLEU/ROUGE', 15000, 'footkorner-chaussures-puma-rs-cube-bmw-306498-02-noir-blanc-bleu....._1.png', 6),
(38, 'VESTE PSG X JORDAN', 'NOIR/BLEU/BLANC', 10000, 'footkorner-veste-psg-jordan-noir-bleu-blanc-bq8369-.jpeg', 5),
(39, 'Maillot Footbal PSG', 'Couleur: Blanc| Taille :XL', 10000, 'maillot-psg-away-blanc.jpg', 5),
(40, 'Sacoche Banane', 'Couleur: Jaune', 70000, 'bumbumbag-sundae-m3604gac-yell_3_-2.jpg', 5),
(43, 'Huawei P20', '6 Go. RAM | 128 GB', 165000, 'huawei-p20-pro-6gb-128gb-dual-sim-clt-l29c-twilight.jpg', 2),
(44, 'Iphone X', '(RAM) 3 Go | Capacité 64 Go', 650000, 'apple-iphone-x-argent-64-go.jpg', 2),
(45, 'Doudoune Footkorner', 'Couleur: Rouge | Taille :XL', 20000, 'footkorner-doudoune-chauffante-viso-rouge.jpg', 1),
(46, 'Iphone 11', '250 GB | Couleur bleu clair', 850000, 'iphone-11-the-core-1-big.jpg', 2),
(47, 'MSI Pc Portable Gamer', '500 GB SSD | 16GB DDR 4', 550000, 'msi-pc-portable-gamer-ge62-7re-026xfr-15-6-full-h.jpg', 3),
(48, 'Mac Book Pro Retina', '500 GB SSD | 32GB DDR 4 | I7', 1200000, 'product03.png', 3),
(49, 'Hp Elite Book', '4GB Ram | 500 GB HDD | I3', 70000, 'product08.png', 3),
(50, 'Casque Ordinateur', 'Couleur: Noir', 12500, 'product02.png', 1),
(51, 'Maillot FC Barcelone', 'Couleur: Bleu, Rouge | Taille :XL', 10000, 'footkorner-maillot-nike-658794-bleu-front.png', 1),
(52, 'Nike Air Huarache', 'Couleur: Marron desert', 22000, 'nike-air-huarache-run-premium-black-desert-moss-704830-010.jpg', 6),
(53, 'Nike Lebron 15', 'Couleur: Blanc', 30000, 'img01.jpg', 6),
(54, 'Sony Playstation 4', 'Couleur: Noir', 225000, 'ps4.jpg', 4),
(55, 'Microsoft Xbox One', 'Couleur: Blanc', 275000, '2894538-microsoft-xbox-one-s-blanc-500-go-1-manette.png', 4),
(56, 'Nitento Switch', 'Couleur: Noir', 200000, '1.jpg', 4),
(57, 'CD Fifa 20 Ps4', 'CD Fifa 20 Ps4', 40000, 'fifa-20-jaquette-cover-star-eden-hazard_0190000000930667.jpg', 4),
(58, 'CD Nba 2k20', 'Xbox one | Ps4', 45000, 'NBA_2K20.jpg', 4),
(59, 'Super Mario Bros', 'Nitendo Switch', 20000, 'New_Super_Mario_Bros_U_Deluxe.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `idOrders` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idPanier` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idPanier`, `client`, `libelle`, `prix`, `date`, `idUser`) VALUES
(62, 'nanani', 'Doudoune Footkorner', 20000, '2020-03-04 15:42:28', 1),
(63, 'nanani', 'Maillot FC Barcelone', 10000, '2020-03-04 15:42:42', 1),
(64, 'nanani', 'Casque Ordinateur', 12500, '2020-03-04 15:48:50', 1),
(65, 'nanani', 'Maillot Footbal PSG', 10000, '2020-03-04 15:51:44', 1),
(66, 'nanani', 'Maillot FC Barcelone', 10000, '2020-03-04 15:52:19', 1),
(67, 'nanani', 'Sacoche Banane', 70000, '2020-03-04 15:52:30', 1),
(68, 'nanani', 'Casque Ordinateur', 12500, '2020-03-04 19:13:42', 1),
(69, 'ousseb', 'Doudoune Footkorner', 20000, '2020-03-05 14:46:29', 6),
(70, 'ousseb', 'Casque Ordinateur', 12500, '2020-03-05 14:58:02', 6),
(71, 'ousseb', 'Maillot FC Barcelone', 10000, '2020-03-05 14:58:03', 6),
(72, 'ousseb', 'Doudoune Footkorner', 20000, '2020-03-05 14:58:07', 6),
(75, 'DZ', 'Doudoune Footkorner', 20000, '2020-03-05 15:03:07', 7),
(76, 'DZ', 'Casque Ordinateur', 12500, '2020-03-05 15:03:10', 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `email`) VALUES
(1, 'ousseb', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ajik@gg.gg'),
(2, 'nanani', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jiko@mo.fr'),
(3, 'Ousseb', '8cb2237d0679ca88db6464eac60da96345513964', 'adnanejiko@gmail.com'),
(4, 'nanani', '8cb2237d0679ca88db6464eac60da96345513964', 'adnanejik@gmail.com'),
(5, 'papa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kio@fr.fr'),
(6, 'ousseb', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'jiko@jiko.fr'),
(7, 'DZ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'gmail@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrders`),
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrders` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `idPanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `items` (`idProduit`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
