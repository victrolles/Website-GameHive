-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 03:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamehive`
--

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE `badge` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id_game` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `badge`
--

INSERT INTO `badge` (`id`, `image`, `description`, `id_game`) VALUES
(36, 'images/badges/IMG-642eca7301e9e9.97308931.png', 'Reach SSL in Ranked', 1),
(37, 'images/badges/IMG-642eca92064022.80604155.png', 'Reach Grand Champion III in Ranked', 1),
(38, 'images/badges/IMG-642ecab3e5e319.57446292.png', 'Reach Grand Champion II in Ranked', 1),
(39, 'images/badges/IMG-642ecad4da9ab7.90999915.png', 'Reach Grand Champion I in Ranked', 1),
(40, 'images/badges/IMG-642ed0302ab2d3.48385903.png', 'Default', 3);

-- --------------------------------------------------------

--
-- Table structure for table `classement`
--

CREATE TABLE `classement` (
  `id` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_gamemode` int(11) NOT NULL,
  `score` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classement`
--

INSERT INTO `classement` (`id`, `id_profil`, `id_gamemode`, `score`) VALUES
(7, 1, 1, '2235'),
(8, 1, 2, '1567'),
(9, 1, 3, '2894'),
(10, 1, 4, '3214'),
(11, 1, 5, '4176'),
(12, 2, 1, '3209'),
(13, 2, 2, '4387'),
(14, 2, 3, '1050'),
(15, 2, 4, '2718'),
(16, 2, 5, '491'),
(17, 3, 1, '2919'),
(18, 3, 2, '1556'),
(19, 3, 3, '4168'),
(20, 3, 4, '2423'),
(21, 3, 5, '1975'),
(22, 4, 1, '3999'),
(23, 4, 2, '452'),
(24, 4, 3, '3038'),
(25, 4, 4, '1123'),
(26, 4, 5, '3097'),
(27, 5, 1, '2129'),
(28, 5, 2, '4996'),
(29, 5, 3, '3990'),
(30, 5, 4, '495'),
(31, 5, 5, '4884'),
(32, 6, 1, '2365'),
(33, 6, 2, '3287'),
(34, 6, 3, '1745'),
(35, 6, 4, '3981'),
(36, 6, 5, '2889'),
(37, 7, 1, '4160'),
(38, 7, 2, '2538'),
(39, 7, 3, '4690'),
(40, 7, 4, '3087'),
(41, 7, 5, '1299'),
(42, 8, 1, '2956'),
(43, 8, 2, '2078'),
(44, 8, 3, '4062'),
(45, 8, 4, '489'),
(46, 8, 5, '3827'),
(47, 9, 1, '1846'),
(48, 9, 2, '3985'),
(49, 9, 3, '2922'),
(50, 9, 4, '2145'),
(51, 9, 5, '1579'),
(52, 10, 1, '3260'),
(53, 10, 2, '2890'),
(54, 10, 3, '1572'),
(55, 10, 4, '4048'),
(56, 10, 5, '3189');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  `id_followed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `id_follower`, `id_followed`) VALUES
(6, 1, 2),
(7, 2, 1),
(14, 1, 3),
(15, 1, 5),
(16, 2, 3),
(17, 3, 2),
(18, 3, 4),
(19, 4, 5),
(20, 5, 1),
(21, 6, 7),
(22, 7, 8),
(23, 8, 9),
(24, 9, 10),
(25, 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `id_profil1` int(11) NOT NULL,
  `id_profil2` int(11) NOT NULL,
  `accepter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `id_profil1`, `id_profil2`, `accepter`) VALUES
(2, 1, 3, 1),
(3, 1, 4, 1),
(4, 2, 4, 1),
(6, 2, 5, 1),
(10, 1, 5, 0),
(14, 2, 1, 0),
(15, 3, 5, 1),
(16, 3, 6, 0),
(17, 4, 6, 1),
(18, 4, 7, 1),
(19, 5, 7, 0),
(20, 5, 8, 1),
(21, 6, 8, 1),
(22, 6, 9, 0),
(23, 7, 9, 1),
(24, 7, 10, 1),
(25, 8, 10, 0),
(26, 9, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `nom`, `description`) VALUES
(1, 'Rocket League', 'Jeu de foot avec des voitures'),
(2, 'League Of Legends', 'Best game ever'),
(3, 'No game', 'No description'),
(4, 'Counter-Strike: Global Offensive', 'Jeu de tir à la première personne'),
(5, 'Minecraft', 'Jeu de survie et de création de monde ouvert'),
(6, 'Fortnite', 'Jeu de battle royale avec des éléments de construction'),
(7, 'Grand Theft Auto V', 'Jeu d\'action-aventure en monde ouvert'),
(8, 'Overwatch', 'Jeu de tir en équipe'),
(9, 'Valorant', 'Jeu de tir tactique en équipe'),
(10, 'FIFA 22', 'Jeu de simulation de football'),
(11, 'Assassin\'s Creed Valhalla', 'Jeu d\'action-aventure en monde ouvert'),
(12, 'Red Dead Redemption 2', 'Jeu d\'action-aventure en monde ouvert se déroulant dans le Far West'),
(13, 'The Witcher 3: Wild Hunt', 'Jeu de rôle en monde ouvert avec des éléments d\'action');

-- --------------------------------------------------------

--
-- Table structure for table `gamemode`
--

CREATE TABLE `gamemode` (
  `id` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gamemode`
--

INSERT INTO `gamemode` (`id`, `id_game`, `nom`, `description`) VALUES
(1, 1, 'Ranked 2v2', 'Ranked 2v2'),
(2, 1, 'Ranked 1v1', 'Ranked 1v1'),
(3, 1, 'Ranked 3v3', 'Ranked 3v3'),
(4, 2, 'Ranked ARAM', 'Ranked ARAM'),
(5, 2, 'Ranked Faille de l\'invocateur', 'Ranked Faille de l\'invocateur'),
(6, 2, 'Ranked TFT', 'Ranked TFT'),
(7, 3, 'Single Player', 'Single Player'),
(8, 3, 'Multiplayer', 'Multiplayer'),
(9, 4, 'Team Deathmatch', 'Team Deathmatch'),
(10, 4, 'Free For All', 'Free For All'),
(11, 4, 'Capture The Flag', 'Capture The Flag'),
(12, 5, 'Campaign', 'Campaign'),
(13, 5, 'Survival', 'Survival'),
(14, 6, 'Co-op', 'Co-op'),
(15, 6, 'Versus', 'Versus'),
(16, 7, 'Race', 'Race'),
(17, 7, 'Freestyle', 'Freestyle'),
(18, 8, 'Battle Royale', 'Battle Royale'),
(19, 8, 'Plunder', 'Plunder'),
(20, 9, 'Simulation', 'Simulation'),
(21, 9, 'Creative', 'Creative'),
(22, 10, 'Horde Mode', 'Horde Mode'),
(23, 10, 'PvP', 'PvP'),
(24, 11, 'Arena', 'Arena'),
(25, 11, 'Survival', 'Survival'),
(26, 12, 'Story Mode', 'Story Mode'),
(27, 12, 'Endless Mode', 'Endless Mode'),
(28, 13, 'Zombies', 'Zombies'),
(29, 13, 'Multiplayer', 'Multiplayer'),
(30, 14, 'Team Deathmatch', 'Team Deathmatch'),
(31, 14, 'Search and Destroy', 'Search and Destroy'),
(32, 15, 'Faction Wars', 'Faction Wars'),
(33, 15, 'Exploration', 'Exploration'),
(34, 16, 'King of the Hill', 'King of the Hill'),
(35, 16, 'Team Slayer', 'Team Slayer'),
(36, 17, 'Time Trial', 'Time Trial'),
(37, 17, 'Stunt Mode', 'Stunt Mode'),
(38, 18, 'Free Mode', 'Free Mode'),
(39, 18, 'Heists', 'Heists'),
(40, 19, 'Classic Mode', 'Classic Mode'),
(41, 19, 'Deathmatch', 'Deathmatch'),
(42, 20, 'Single Player', 'Single Player'),
(43, 20, 'Online Multiplayer', 'Online Multiplayer');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `vu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `id_sender`, `id_receiver`, `text`, `image`, `time`, `vu`) VALUES
(1, 1, 2, 'how are you ?', '', '2023-03-29 09:28:08', 1),
(2, 1, 2, 'how are you ?', 'images/messages/IMG-6423e8c9ed4c24.88204247.png', '2023-03-29 09:29:13', 1),
(3, 2, 1, 'lesgoo', '', '2023-03-29 09:31:44', 1),
(4, 2, 1, 'miel', 'images/messages/IMG-6423e9fe7916f5.53933861.png', '2023-03-29 09:34:22', 1),
(5, 2, 1, 'lesgoo', '', '2023-03-29 09:34:26', 1),
(6, 2, 4, 'ALISTARRR', 'images/messages/IMG-6423eb8a801f17.07142322.png', '2023-03-29 09:40:58', 1),
(7, 1, 2, 'how are you ?', 'images/messages/IMG-6423eba12d6868.87958194.png', '2023-03-29 09:41:21', 1),
(8, 2, 4, 'ALISTARRR', 'images/messages/IMG-6423ebb7299464.74528935.png', '2023-03-29 09:41:43', 1),
(9, 1, 4, 'j\'aime rl', 'images/messages/IMG-6423ebd2b7e812.74905521.png', '2023-03-29 09:42:10', 1),
(11, 4, 2, 'ALISTAAARRR', 'images/messages/IMG-6423ececd62814.77910953.png', '2023-03-29 09:46:52', 1),
(12, 4, 2, 'ALISTAAARRR', 'images/messages/IMG-6423ed31e47f15.15962387.png', '2023-03-29 09:48:01', 1),
(93, 1, 2, 'look at that', '../images/messages/IMG-6425592620d086.99912941.jpg', '2023-03-30 11:40:54', 1),
(94, 1, 2, 'here is rain', '../images/messages/IMG-64255a13d9dce9.66927899.jpg', '2023-03-30 11:44:51', 1),
(95, 1, 2, 'look', '../images/messages/IMG-64255a428325a1.18326709.jpg', '2023-03-30 11:45:38', 1),
(130, 2, 1, 'Regarde comme ca mache ien', '', '2023-03-30 16:28:25', 1),
(131, 2, 1, 'Look', '../images/messages/IMG-64259e2368d155.64735487.png', '2023-03-30 16:35:15', 1),
(132, 1, 2, 'brobro', '', '2023-03-31 07:59:11', 1),
(133, 1, 5, 'how are you ?', '', '2023-03-31 10:23:13', 1),
(134, 1, 5, 'yo', '', '2023-03-31 10:26:51', 0),
(135, 5, 1, 'salu', '', '2023-03-31 10:26:54', 1),
(136, 1, 5, 'yo', '', '2023-03-31 10:27:05', 0),
(137, 1, 2, 'yo', '', '2023-04-06 13:41:17', 1),
(138, 1, 2, 'regarde ça', '../images/messages/IMG-642eafef724a93.59185397.png', '2023-04-06 13:41:35', 1),
(139, 1, 2, 'hi', '', '2023-04-08 16:17:09', 1),
(140, 1, 2, 'jjo', '../images/messages/IMG-6431777b5e8329.42357981.png', '2023-04-08 16:17:31', 1),
(141, 2, 1, 'Yo bg', '../images/messages/IMG-6436c1a3ed26f4.16262322.png', '2023-04-12 16:35:15', 1),
(142, 1, 2, 'tfk ?', '', '2023-04-12 16:37:03', 1),
(143, 2, 1, 'encore', '', '2023-04-12 16:40:29', 1),
(144, 2, 1, 'yo', '', '2023-04-13 10:48:57', 1),
(145, 1, 2, 'yo', '../images/messages/IMG-643a7ae4cc3842.96276167.png', '2023-04-15 12:22:28', 0),
(146, 1, 5, 'tu fais quoi ?', '../images/messages/IMG-643a8c5e2b3fc0.57991748.jpg', '2023-04-15 13:37:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `texte` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_profil`, `texte`, `image`, `date`) VALUES
(21, 2, 'Je suis passé gc !!', 'images/posts/IMG-64378b33712410.85643959.png', '2023-04-13 06:55:15'),
(22, 1, 'mira', 'images/posts/IMG-643a41f3b0d630.47543830.jpg', '2023-04-15 08:19:31'),
(23, 1, 'look', 'images/posts/IMG-643a4235d93c58.42871431.png', '2023-04-15 08:20:37'),
(24, 1, '#LeagueOfLegends\r\nJe suis le meilleur', 'images/posts/IMG-643a4cdfe264e3.88253864.jpg', '2023-04-15 09:06:07'),
(25, 2, '#LeagueOfLegends Message 1 : je suis trop fort', '', '2023-04-15 09:19:08'),
(26, 2, '#LeagueOfLegends Message 2 : je suis diams', '', '2023-04-15 09:19:21'),
(27, 2, '#LeagueOfLegends Message 3 : personne ne peut me test sur lol', '', '2023-04-15 09:19:51'),
(28, 2, '#RocketLeague Message 1 : trop bien', '', '2023-04-15 09:20:32'),
(29, 2, '#RocketLeague Message 2 : trop dar', '', '2023-04-15 09:20:41'),
(30, 2, '#RocketLeague Message 3 : trop super', '', '2023-04-15 09:20:57'),
(31, 2, '#Fortnite Message 1 : pire jeu', '', '2023-04-15 09:21:44'),
(32, 2, '#Fortnite Message 2 : que des noobs', '', '2023-04-15 09:22:12'),
(33, 2, '#FallGuys marrant', '', '2023-04-15 09:22:41'),
(34, 1, '#RocketLeague best game', '', '2023-04-15 09:59:17'),
(35, 1, '#RocketLeague best game ever', '', '2023-04-15 09:59:24'),
(36, 1, '#LeagueOfLegends Je suis monté platine!', '', '2023-04-15 10:05:45'),
(37, 1, '#Fortnite Faites moi signe si vous voulez jouer ensemble!', '', '2023-04-15 10:06:20'),
(38, 1, '#Overwatch Je recherche des coéquipiers pour monter en classement.', '', '2023-04-15 10:07:05'),
(39, 1, '#Valorant Jadore ce jeu', '', '2023-04-15 10:08:10'),
(40, 2, '#FallGuys Je suis trop nul, qui peut maider?', '', '2023-04-15 10:09:15'),
(41, 2, '#RocketLeague Jai besoin de conseils pour améliorer mon jeu', '', '2023-04-15 10:10:20'),
(42, 3, '#LeagueOfLegends Je suis à la recherche dune équipe sérieuse pour jouer en compétition', '', '2023-04-15 10:11:25'),
(43, 3, '#Overwatch Je recherche des joueurs pour jouer en mode compétitif', '', '2023-04-15 10:12:30'),
(44, 4, '#Valorant Je suis en train de monter en classement et je cherche des joueurs pour maccompagner', '', '2023-04-15 10:13:35'),
(45, 4, '#Fortnite Je cherche des joueurs pour le nouveau mode de jeu', '', '2023-04-15 10:14:40'),
(46, 5, '#FallGuys Je suis accro à ce jeu', '', '2023-04-15 10:15:45'),
(47, 5, '#Overwatch Je suis à la recherche dune équipe pour jouer en compétition', '', '2023-04-15 10:16:50'),
(48, 6, '#LeagueOfLegends Je cherche des joueurs pour un tournoi amical', '', '2023-04-15 10:17:55'),
(49, 6, '#RocketLeague Je suis à la recherche dun coach pour maméliorer', '', '2023-04-15 10:19:00'),
(50, 7, '#Valorant Jai besoin de conseils pour améliorer mon aim', '', '2023-04-15 10:20:05'),
(51, 7, '#Fortnite Je suis à la recherche dun duo pour jouer ensemble', '', '2023-04-15 10:21:10'),
(52, 8, '#FallGuys Trop de fun !', '', '2023-04-15 10:22:15'),
(53, 8, '#Overwatch Je cherche une équipe pour jouer en mode arcade', '', '2023-04-15 10:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `datedenaissance` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `name`, `surname`, `pseudo`, `avatar`, `datedenaissance`, `email`, `description`, `password`) VALUES
(1, 'Victor', 'Goudal', 'Victrolles', 'images/avatars/IMG-6439783f4b3256.51808574.jpg', '2023-04-14', 'vi.goudal@gmail.com', 'aze', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Osman', 'Gaygusuz', 'jaime_le_miel', 'images/avatars/IMG-6423e6d41405b0.41037408.png', '2023-03-17', 'osman.gaygusuz@gmail.com', 'je suis osman', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Thomas', 'Forest', 'jaime_le_lait', 'images/avatars/IMG-6423e719065457.46313458.png', '2023-03-17', 'thomas.forest@utbm.fr', 'yo tout le monde c\'est jaime_le_lait', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Alb', 'C\'estpassafe', 'Raryn', 'images/avatars/IMG-6423eb3c595862.45921802.jpg', '2002-03-01', 'Uwu@gmail.com', 'UTBMED', '82233bce59652cf3cc0eb7a03f3109d1'),
(5, 'Marius', 'Diguat', 'sk8zen', 'images/avatars/IMG-6426983e069306.78056520.png', '2023-03-31', 'm@d', 'No Description', '242aa1a97769109065e3b4df359bcfc9'),
(6, 'Sophie', 'Lambert', 's0ph1e', 'images/avatars/IMG-643aa3367294d6.16471268.jpeg', '2000-01-01', 'sophie.lambert@gmail.com', 'Hello, I\'m Sophie!', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Kevin', 'Nguyen', 'kvn', 'images/avatars/IMG-643aa28200e3c8.57460457.jpeg', '2001-06-14', 'kevin.nguyen@gmail.com', 'Bonjour, je m\'appelle Kevin', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'Emilie', 'Dubois', 'em_dub', 'images/avatars/IMG-643aa361978293.38187037.jpeg', '1998-09-12', 'emilie.dubois@gmail.com', 'Je suis Emilie, ravie de vous rencontrer !', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'Lucas', 'Rousseau', 'lucasR', 'images/avatars/IMG-643aa2cac97a73.36393260.jpeg', '2002-08-05', 'lucas.rousseau@gmail.com', 'Salut tout le monde, c\'est Lucas', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'Alicia', 'Martin', 'alimartin', 'images/avatars/IMG-643aa2fc07dde0.02666742.jpeg', '1999-11-30', 'alicia.martin@gmail.com', 'Coucou, moi c\'est Alicia !', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `unlocked_badge`
--

CREATE TABLE `unlocked_badge` (
  `id` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_badge` int(11) NOT NULL,
  `selected` tinyint(1) NOT NULL,
  `date_obtention` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unlocked_badge`
--

INSERT INTO `unlocked_badge` (`id`, `id_profil`, `id_badge`, `selected`, `date_obtention`) VALUES
(1, 1, 36, 0, '2023-04-06 16:01:28'),
(2, 1, 37, 1, '2023-04-06 16:01:28'),
(3, 1, 38, 1, '2023-04-06 16:01:28'),
(4, 1, 39, 0, '2023-04-06 16:01:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classement`
--
ALTER TABLE `classement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamemode`
--
ALTER TABLE `gamemode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unlocked_badge`
--
ALTER TABLE `unlocked_badge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badge`
--
ALTER TABLE `badge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `classement`
--
ALTER TABLE `classement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gamemode`
--
ALTER TABLE `gamemode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unlocked_badge`
--
ALTER TABLE `unlocked_badge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
