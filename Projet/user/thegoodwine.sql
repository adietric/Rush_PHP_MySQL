-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 20 oct. 2019 à 10:22
-- Version du serveur :  8.0.17
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thegoodwine`
--

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

CREATE TABLE `basket` (
  `users` varchar(50) DEFAULT NULL,
  `quantite` int(3) DEFAULT NULL,
  `product` int(3) DEFAULT NULL,
  `subtotal` bigint(6) DEFAULT NULL,
  `total` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`users`, `quantite`, `product`, `subtotal`, `total`) VALUES
('root', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tgw`
--

CREATE TABLE `tgw` (
  `name` varchar(150) DEFAULT NULL,
  `color` varchar(5) DEFAULT NULL,
  `spark` varchar(3) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `stock` int(4) DEFAULT NULL,
  `ordered` int(4) DEFAULT NULL,
  `id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tgw`
--

INSERT INTO `tgw` (`name`, `color`, `spark`, `region`, `price`, `year`, `img`, `stock`, `ordered`, `id`) VALUES
('CUVEE YL BLANC 2018 - DOMAINE YVES LECCIA', 'Blanc', 'Non', 'Corse', 18, 2018, 'https://www.vinatis.com/39565-detail_default/cuvee-yl-blanc-2018-domaine-yves-leccia.png', 100, 0, 1),
('DOMAINE CASANOVA BLANC', 'Blanc', 'Non', 'Corse', 5, 2017, 'https://www.vinatis.com/21540-detail_default/domaine-casanova-blanc.png', 100, 0, 2),
('PATRIMONIO BLANC 2016 - DOMAINE YVES LECCIA', 'Blanc', 'Non', 'Corse', 24, 2016, 'https://www.vinatis.com/34025-detail_default/patrimonio-blanc-2016-domaine-yves-leccia.png', 100, 0, 3),
('FIGARI ROSE 2018 - CLOS CANARELLI', 'Rose', 'Non', 'Corse', 22, 2018, 'https://www.vinatis.com/40533-detail_default/figari-rose-2018-clos-canarelli.png', 100, 0, 4),
('PATRIMONIO E CROCE ROSE 2018 - DOMAINE YVES LECCIA', 'Rose', 'Non', 'Corse', 16, 2018, 'https://www.vinatis.com/39563-detail_default/patrimonio-e-croce-rose-2018-domaine-yves-leccia.png', 100, 0, 5),
('PATRIMONIO E CROCE ROUGE 2015 - DOMAINE YVES LECCIA', 'Rouge', 'Non', 'Corse', 22, 2015, 'https://www.vinatis.com/36080-detail_default/patrimonio-e-croce-rouge-2015-domaine-yves-leccia.png', 100, 0, 6),
('DUNE GRIS DE GRIS 2018', 'Rose', 'Non', 'Languedoc-Roussilon', 7, 2018, 'https://www.vinatis.com/38474-detail_default/dune-gris-de-gris-2018.png', 100, 0, 7),
('GRIS BLANC 2018 - GERARD BERTRAND', 'Rose', 'Non', 'Languedoc-Roussilon', 10, 2018, 'https://www.vinatis.com/39094-detail_default/gris-blanc-2018-gerard-bertrand.png', 100, 0, 8),
('MIRAFLORS 2018 - DOMAINE LAFAGE', 'Rose', 'Non', 'Languedoc-Roussilon', 8, 2018, 'https://www.vinatis.com/38074-detail_default/miraflors-2018-domaine-lafage.png', 100, 0, 9),
('PRIMA PERLA ROSE - SAINT HILAIRE - DOMAINES PAUL MAS', 'Rose', 'Oui', 'Languedoc-Roussilon', 11, 2017, 'https://www.vinatis.com/41403-detail_default/prima-perla-rose-saint-hilaire-domaines-paul-mas.png', 100, 0, 10),
('DOMAINE DE VAUGONDY - VOUVRAY METHODE TRADITIONNELLE BRUT', 'Blanc', 'Oui', 'Loire', 10, 2019, 'https://www.vinatis.com/21218-detail_default/domaine-de-vaugondy-vouvray-methode-traditionnelle-brut.png', 100, 0, 11),
('SAUMUR BRUT - DIAMANT DE LOIRE', 'Blanc', 'Oui', 'Loire', 10, 2019, 'https://www.vinatis.com/42355-detail_default/saumur-brut-diamant-de-loire.png', 100, 0, 12),
('CREMANT DE LOIRE ROSE - DOMAINE LANGLOIS-CHATEAU', 'Rose', 'Oui', 'Loire', 14, 2019, 'https://www.vinatis.com/28635-detail_default/cremant-de-loire-rose-domaine-langlois-chateau.png', 100, 0, 13),
('LE CLOS DU CHÂTEAU DE PARNAY 2016 - CHÂTEAU DE PARNAY', 'Rouge', 'Non', 'Loire', 16, 2016, 'https://www.vinatis.com/36097-detail_default/le-clos-du-chateau-de-parnay-2016-chateau-de-parnay.png', 100, 0, 14),
('M DE MULONNIERE ANJOU ROUGE 2017 - CHATEAU DE LA MULONNIERE', 'Rouge', 'Non', 'Loire', 10, 2017, 'https://www.vinatis.com/42748-detail_default/m-de-mulonniere-anjou-rouge-2017-chateau-de-la-mulonniere.png', 100, 0, 15),
('CLAIRETTE DE DIE TRADITION - CUVEE LA COLOMBE - DOMAINE DES MUTTES', 'Blanc', 'Oui', 'Rhône', 12, 2017, 'https://www.vinatis.com/41894-detail_default/clairette-de-die-tradition-cuvee-la-colombe-domaine-des-muttes.png', 100, 0, 16),
('CUVEE CHAMBERAN - CLAIRETTE DE DIE TRADITION - UJVR', 'Blanc', 'Oui', 'Rhône', 11, 2016, 'https://www.vinatis.com/25655-detail_default/cuvee-chamberan-clairette-de-die-tradition-ujvr.png', 100, 0, 17),
('CROIX DE BOIS 2007 - LES PARCELLAIRES MICHEL CHAPOUTIER', 'Rouge', 'Non', 'Rhône', 85, 2007, 'https://www.vinatis.com/37916-detail_default/croix-de-bois-2007-les-parcellaires-michel-chapoutier.png', 100, 0, 18),
('ARCANE V LE PAPE 2010 - XAVIER VIGNON', 'Rouge', 'Non', 'Rhône', 100, 2010, 'https://www.vinatis.com/38982-detail_default/arcane-v-le-pape-2010-xavier-vignon.png', 100, 0, 19);

-- --------------------------------------------------------

--
-- Structure de la table `user_data`
--

CREATE TABLE `user_data` (
  `users` varchar(20) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `god_mode` int(1) DEFAULT NULL,
  `connected` int(1) DEFAULT NULL,
  `cart` int(1) DEFAULT NULL,
  `ban` int(1) DEFAULT NULL,
  `attempt` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_data`
--

INSERT INTO `user_data` (`users`, `password`, `god_mode`, `connected`, `cart`, `ban`, `attempt`) VALUES
('root', '74dfc2b27acfa364da55f93a5caee29ccad3557247eda238831b3e9bd931b01d77fe994e4f12b9d4cfa92a124461d2065197d8cf7f33fc88566da2db2a4d6eae', 1, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
