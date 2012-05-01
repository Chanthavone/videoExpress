-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 01 Mai 2012 à 10:32
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `video82`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnes`
--

CREATE TABLE IF NOT EXISTS `abonnes` (
  `Code` varchar(8) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Nom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Prenom` varchar(20) CHARACTER SET latin1 NOT NULL,
  `NoRue` varchar(50) CHARACTER SET latin1 NOT NULL,
  `CodePostal` varchar(5) CHARACTER SET latin1 NOT NULL,
  `Ville` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Batiment` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `Etage` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Digicode` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `Telephone` varchar(14) CHARACTER SET latin1 DEFAULT NULL,
  `Email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Banque` smallint(6) NOT NULL,
  `Guichet` smallint(6) NOT NULL,
  `Compte` varchar(15) CHARACTER SET latin1 NOT NULL,
  `NbCassettes` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `abonnes`
--

INSERT INTO `abonnes` (`Code`, `Nom`, `Prenom`, `NoRue`, `CodePostal`, `Ville`, `Batiment`, `Etage`, `Digicode`, `Telephone`, `Email`, `Banque`, `Guichet`, `Compte`, `NbCassettes`) VALUES
('1Xu123', 'Duval', 'Jean', '27, rue Jacques Amyot', '75011', 'PARIS', 'sur rue', '4', '132B3', '01.23.67.12.21', 'jduval@wanadoo.fr', 3004, 1452, '000045154', 3),
('25y13p', 'de Prees', 'Beatrice', '11bis, Bd Beaumarchais', '75004', 'PARIS', 'Figaro', NULL, '4590A', '01.47.12.98.82', 'beatrice.deprees@aol.com', 1245, 784, '562 27 P', 4),
('365AL8', 'Miriel', 'Paul', '38, rue Beaugrenelle', '75015', 'PARIS', NULL, NULL, '92B63', '01.56.14.87.71', 'Paul.Miriel@libertysurf.fr', 2035, 451, '802452107', 5),
('4367Xs', 'Belmi', 'Valerie', '191, rue Pierre Larousse', '75014', 'PARIS', 'C', '7', '4A569', '01.28.16.52.44', 'vbelmi@free.fr', 1245, 1053, '0052178', 3);

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE IF NOT EXISTS `acteurs` (
  `NoFilm` smallint(6) NOT NULL,
  `Acteur` varchar(40) NOT NULL,
  PRIMARY KEY (`NoFilm`,`Acteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `acteurs`
--

INSERT INTO `acteurs` (`NoFilm`, `Acteur`) VALUES
(1, 'André Dussollier'),
(1, 'Eric Caravaca'),
(1, 'Sabine Azéma'),
(2, 'Bulle Ogier'),
(2, 'Claude Piéplu'),
(2, 'Fernando Rey'),
(2, 'François Maistre'),
(2, 'Jean-Pierre Cassel'),
(2, 'Julien Bertheau'),
(2, 'Michel Piccoli'),
(2, 'Paul Frankeur'),
(2, 'Stéphane Audran'),
(3, 'Benoît Régent'),
(3, 'Elisabeth Commelin'),
(3, 'Jean-Jacques Vanier'),
(3, 'Judith Henry'),
(4, 'Catherine Deneuve'),
(4, 'Francis Blanche'),
(4, 'Françoise Fabian'),
(4, 'Geneviève Page'),
(4, 'Jean Sorel'),
(4, 'Macha Méril'),
(4, 'Michel Piccoli'),
(5, 'Franciszek Pieczka'),
(5, 'Halina Winiarska'),
(5, 'Jerzy Stuhr'),
(5, 'Joanna Orzechowska'),
(5, 'Mariusz Dmochowski'),
(6, 'Caroline Ducey'),
(6, 'Guillaume Saurrel'),
(6, 'Lou Doillon'),
(6, 'Xavier Villeneuve'),
(7, 'Charles Vanel'),
(7, 'Madeleine Renaud'),
(7, 'Pierre Blanchar'),
(8, 'Alain Cuny'),
(8, 'Anouk Aimée'),
(8, 'Marcello Mastroianni'),
(9, 'Barbara Jefford'),
(9, 'Freddie Jones'),
(9, 'Victor Poletti'),
(10, 'Jean-Claude Brialy'),
(10, 'Julien Bertheau'),
(10, 'Michael Lonsdale'),
(10, 'Michel Piccoli'),
(10, 'Monica Vitti'),
(10, 'Paul Frankeur'),
(11, 'Gabrielle Dorziat'),
(11, 'Louis Jouvet'),
(11, 'Michel Simon'),
(11, 'Sylvie'),
(12, 'Grzegorz Warchol'),
(12, 'Jerzy Nowak'),
(12, 'Jerzy Stuhr'),
(12, 'Julie Delpy'),
(12, 'Zbigniew Zamachowski'),
(13, 'Benoît Régent'),
(13, 'Claude Duneton'),
(13, 'Florence Pernel'),
(13, 'Juliette Binoche'),
(14, 'Irène Jacob'),
(14, 'Jean-Louis Trintignant'),
(14, 'Jean-Pierre Lorit'),
(15, 'Catherine Deneuve'),
(15, 'John Malkovich'),
(15, 'Michel Piccoli'),
(16, 'Claude Jade'),
(16, 'Delphyne Seyrig'),
(16, 'Jean-Pierre Léaud'),
(16, 'Michael Lonsdale'),
(17, 'Alfred Molina'),
(17, 'Johnny Depp'),
(17, 'Juliette Binoche'),
(17, 'Lena Olin'),
(18, 'Jean-Paul Roussillon'),
(18, 'Mathilde Seigner'),
(18, 'Michel Serrault');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Code` varchar(8) COLLATE utf8_bin NOT NULL,
  `Nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `NoRue` varchar(50) COLLATE utf8_bin NOT NULL,
  `CodePostal` varchar(5) COLLATE utf8_bin NOT NULL,
  `Ville` varchar(20) COLLATE utf8_bin NOT NULL,
  `Telephone` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`Code`, `Nom`, `Prenom`, `NoRue`, `CodePostal`, `Ville`, `Telephone`, `Email`) VALUES
('AZERT12', 'Diallo', 'Abdoul', '125 rue Jean Blot', '92400', 'Courbevoie', '0123456987', 'diallo.abdoul@videoe.fr'),
('AZERTY13', 'Chanthavone', 'Cedric', '60 avenue president kennedy', '94190', 'Villeneuve-Saint-Geo', '0147895623', 'chanthavone.cedric@videoe.fr');

-- --------------------------------------------------------

--
-- Structure de la table `cassettes`
--

CREATE TABLE IF NOT EXISTS `cassettes` (
  `NoFilm` smallint(6) NOT NULL,
  `NoExemplaire` smallint(6) NOT NULL,
  `Support` enum('DVD','VHS') CHARACTER SET latin1 DEFAULT NULL,
  `Statut` enum('disponible','empruntee','reservee') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`NoFilm`,`NoExemplaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `cassettes`
--

INSERT INTO `cassettes` (`NoFilm`, `NoExemplaire`, `Support`, `Statut`) VALUES
(1, 1, 'VHS', 'disponible'),
(1, 2, 'VHS', 'disponible'),
(1, 3, 'DVD', 'empruntee'),
(2, 1, 'VHS', 'empruntee'),
(2, 2, 'DVD', 'disponible'),
(3, 1, 'VHS', 'disponible'),
(3, 2, 'DVD', 'disponible'),
(4, 1, 'VHS', 'disponible'),
(4, 2, 'DVD', 'disponible'),
(5, 1, 'VHS', 'disponible'),
(5, 2, 'VHS', 'disponible'),
(5, 3, 'DVD', 'disponible'),
(6, 1, 'VHS', 'empruntee'),
(6, 2, 'DVD', 'disponible'),
(7, 1, 'VHS', 'empruntee'),
(7, 2, 'DVD', 'disponible'),
(8, 1, 'VHS', 'empruntee'),
(8, 2, 'VHS', 'disponible'),
(8, 3, 'DVD', 'disponible'),
(9, 1, 'VHS', 'empruntee'),
(9, 2, 'DVD', 'disponible'),
(10, 1, 'VHS', 'empruntee'),
(10, 2, 'DVD', 'disponible'),
(11, 1, 'VHS', 'empruntee'),
(11, 2, 'DVD', 'disponible'),
(12, 1, 'VHS', 'empruntee'),
(12, 2, 'VHS', 'disponible'),
(12, 3, 'DVD', 'disponible'),
(13, 1, 'VHS', 'empruntee'),
(13, 2, 'VHS', 'disponible'),
(13, 3, 'DVD', 'empruntee'),
(14, 1, 'VHS', 'empruntee'),
(14, 2, 'VHS', 'disponible'),
(14, 3, 'DVD', 'empruntee'),
(15, 1, 'VHS', 'disponible'),
(15, 2, 'DVD', 'disponible'),
(16, 1, 'DVD', 'disponible'),
(16, 2, 'VHS', 'disponible'),
(17, 1, 'VHS', 'disponible'),
(17, 2, 'VHS', 'disponible'),
(17, 3, 'DVD', 'disponible'),
(18, 1, 'VHS', 'empruntee');

-- --------------------------------------------------------

--
-- Structure de la table `empres`
--

CREATE TABLE IF NOT EXISTS `empres` (
  `NoFilm` smallint(6) NOT NULL,
  `NoExemplaire` smallint(6) NOT NULL,
  `CodeAbonne` varchar(8) CHARACTER SET latin1 NOT NULL,
  `DateEmpRes` datetime DEFAULT NULL,
  PRIMARY KEY (`NoFilm`,`NoExemplaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `empres`
--

INSERT INTO `empres` (`NoFilm`, `NoExemplaire`, `CodeAbonne`, `DateEmpRes`) VALUES
(1, 3, '1Xu123', '2012-04-17 11:01:37'),
(2, 1, '1Xu123', '2012-04-17 10:41:53'),
(6, 1, '25y13p', '2012-04-12 09:00:00'),
(7, 1, '25y13p', '2012-04-12 09:00:00'),
(8, 1, '25y13p', '2012-04-12 09:00:00'),
(10, 1, '365AL8', '2012-04-11 15:19:00'),
(11, 1, '365AL8', '2012-04-11 15:19:00'),
(12, 1, '365AL8', '2012-04-11 15:19:00'),
(13, 3, '4367Xs', '2012-04-25 14:06:11'),
(14, 3, '4367Xs', '2012-04-25 14:06:58'),
(18, 1, '4367Xs', '2012-04-23 14:51:58');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `NoFilm` smallint(6) NOT NULL,
  `Titre` varchar(80) CHARACTER SET latin1 NOT NULL,
  `Nationalite` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `Realisateur` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `Couleur` enum('Couleurs','Noir et Blanc') CHARACTER SET latin1 NOT NULL,
  `Annee` year(4) DEFAULT NULL,
  `Genre` enum('Comédie','Comédie dramatique','Drame','Aventure','Documentaire') CHARACTER SET utf8 DEFAULT NULL,
  `Duree` smallint(6) DEFAULT NULL,
  `Synopsis` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`NoFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`NoFilm`, `Titre`, `Nationalite`, `Realisateur`, `Couleur`, `Annee`, `Genre`, `Duree`, `Synopsis`) VALUES
(1, 'La Chambre des officiers', 'français', 'François Dupeyron', 'Couleurs', 2001, 'Drame', 135, 'Août 1914. Adrien, jeune et séduisant lieutenant, part à cheval en reconnaisance. Un obus éclate. La guerre, c''est au Val-de-Grâce qu''il la passe, dans la chambre des officiers. Une pièce sans miroir, où chacun se voit dans le regard de l''autre.'),
(2, 'Le Charme discret de la bourgeoisie', 'français', 'Luis Bunuel', 'Couleurs', 1972, 'Comédie dramatique', 100, 'Une étude cynique et sans complaisance de l''hypocrisie bourgeoise.'),
(3, 'A la campagne', 'français', 'Manuel Poirier', 'Couleurs', 1994, 'Comédie dramatique', 108, 'Une jeune femme, sortie de prison et venue rejoindre sa soeur dans une petite ville de l''Eure, se lie quelque temps avec Benoît, qui a choisi de vivre à la campagne.'),
(4, 'Belle de jour', 'français', 'Luis Bunuel', 'Couleurs', 1966, 'Comédie dramatique', 102, 'Séverine n''a jamais trouvé de véritable plaisir auprès de son mari, Pierre. Un des amis du ménage lui glisse un jour l''adresse d''un maison clandestine. Troublée, Séverine ne résiste pas à l''envie de s''y rendre.'),
(5, 'La Cicatrice', 'polonais', 'Krzysztof Kieslowski', 'Couleurs', 1976, 'Comédie dramatique', 104, 'Bednarz se résoud à accepter de mener la construction d''un grand complexe chimique, dans une petite ville qui fut le théâtre d''une période malheureuse de sa vie. Il se promet de construire un site où les gens vivront dans le bonheur.'),
(6, 'Carrément à l''Ouest', 'français', 'Jacques Doillon', 'Couleurs', 2000, 'Comédie dramatique', 97, 'A Paris où l''entraînent ses petites magouilles, Alex va faire une drôle de rencontre avec deux filles: Fred et Sylvia. Fred organise un bizarre jeu de séduction, pour éprouver Alex.'),
(7, 'Le ciel est à vous', 'français', 'Jean Grémillon', 'Noir et Blanc', 1943, 'Comédie dramatique', 105, 'Transposition de la vie de Mme Dupeyron, qui devint l''une des premières aviatrices légendaires (elle détint longtemps le record de distance en ligne droite).'),
(8, 'La Dolce Vita', 'italien', 'Federico Fellini', 'Noir et Blanc', 1960, 'Comédie dramatique', 160, 'Le chroniqueur Marcello fait le tour des lieux à scandale pour alimenter les potins d''un journal à fort tirage.'),
(9, 'Et vogue le navire', 'franco-italien', 'Federico Fellini', 'Couleurs', 1983, 'Comédie dramatique', 135, '1914. La haute société européenne, artistes et politiciens de renom, s''apprête à disperser, au cours d''une croisière, les cendres de leur diva adulée. La guerre va frapper de plein fouet les insouciants passagers... '),
(10, 'Le Fantôme de la liberté', 'français', 'Luis Bunuel', 'Couleurs', 1974, 'Comédie dramatique', 105, 'Film à sketches insolites et farfelus ponctués par des scènes de répression où l''on entend le cri «A bas la liberté».'),
(11, 'La Fin du jour', 'français', 'Julien Duvivier', 'Noir et Blanc', 1939, 'Comédie dramatique', 108, 'L''abbaye de Saint-Jean-la-Rivière menace de fermer ses portes. Ce qui serait une véritable catastrophe pour ses pensionnaires, tous de vieux comédiens sans ressource. Saint-Clair, comédien autrefois adulé, vient justement d''y arriver.'),
(12, 'Trois couleurs - Blanc', 'franco-polonais', 'Krzysztof Kieslowski', 'Couleurs', 1993, 'Comédie dramatique', 91, 'Dans ce deuxième volet de ses «Trois couleurs», Krzysztof Kieslowski conte l''histoire de Karol, polonais, et de Dominique, française. Nous faisons leur connaissance au moment de leur divorce et où en quelque sorte leur histoire commence.'),
(13, 'Trois couleurs - Bleu', 'franco-helvético-polonais', 'Krzysztof Kieslowski', 'Couleurs', 1992, 'Comédie dramatique', 100, 'Julie, la femme d''un grand compositeur qui a trouvé la mort avec leur enfant lors d''un accident d''automobile, va tenter de retrouver la liberté contre les pressions et les pièges de son entourage.'),
(14, 'Trois couleurs - Rouge', 'franco-helvético-polonais', 'Krzysztof Kieslowski', 'Couleurs', 1993, 'Comédie dramatique', 96, 'Dans ce troisième volet qui conclut les trois couleurs, Valentine, étudiante de l''université de Genève, écrase un chien. L''animal est juste blessé. Sur une plaque, attachée à son collier, Valentine trouve l''adresse du propriétaire. C''est un juge.'),
(15, 'Je rentre à la maison', 'français', 'Manuel de Oliveira', 'Couleurs', 2001, 'Drame', 90, 'Sur scène, Gilbert Valence, grand comédien reconnu, joue les vieillards indignes ou magnifiques.Un soir après la représentation, on lui annonce la mort accidentelle des siens. Ne reste qu''un petit-fils.'),
(16, 'Baisers volés', 'français', 'François Truffaut', 'Couleurs', 1968, 'Comédie', 90, 'La suite des aventures d''Antoine Doinel après son service militaire. Ses rencontres et aventures amoureuses.'),
(17, 'Le Chocolat', 'américain', 'Lasse Hallström', 'Couleurs', 2000, 'Comédie', 122, 'A Lansquenet, dans la France profonde de 1959,sous le regard impitoyable du comte, tout le monde va à la messe. Sauf deux nouvelles venues, une mère et sa fillette, qui s''installent pour vendre des chocolats.'),
(18, 'Une hirondelle a fait le printemps', 'français', 'Christian Carion', 'Couleurs', 2001, 'Comédie dramatique', 103, 'A trente ans, Sandrine en a assez de Paris. Décidée à devenir agricultrice, son rêve depuis toujours, elle achète une ferme dans le Vercors. Mais la cohabitation avec l''ex-propriétaire, Adrien, resté sur les lieux, n''est pas de tout repos.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
