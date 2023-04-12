-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 01:48 PM
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
(5, 1, 5),
(6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `id_profil1` int(11) NOT NULL,
  `id_profil2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `id_profil1`, `id_profil2`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 4),
(6, 2, 5);

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
(3, 'No game', 'No description');

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
(132, 1, 2, 'brobro', '', '2023-03-31 07:59:11', 0),
(133, 1, 5, 'how are you ?', '', '2023-03-31 10:23:13', 1),
(134, 1, 5, 'yo', '', '2023-03-31 10:26:51', 0),
(135, 5, 1, 'salu', '', '2023-03-31 10:26:54', 1),
(136, 1, 5, 'yo', '', '2023-03-31 10:27:05', 0),
(137, 1, 2, 'yo', '', '2023-04-06 13:41:17', 0),
(138, 1, 2, 'regarde ça', '../images/messages/IMG-642eafef724a93.59185397.png', '2023-04-06 13:41:35', 0),
(139, 1, 2, 'hi', '', '2023-04-08 16:17:09', 0),
(140, 1, 2, 'jjo', '../images/messages/IMG-6431777b5e8329.42357981.png', '2023-04-08 16:17:31', 0);

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
(10, 1, 'Look', 'images/posts/IMG-642ebc1ac61976.38724835.png', '2023-04-06 14:33:30'),
(11, 1, 'yo tout le monde', 'images/posts/IMG-643177a5d72829.95178604.png', '2023-04-08 16:18:13');

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
(1, 'Victor', 'Goudal', 'Victrolles', 'images/avatars/IMG-6423e67eab2bc3.11749603.jpg', '2023-03-11', 'vi.goudal@gmail.com', 'je suis victor', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Osman', 'Gaygusuz', 'jaime_le_miel', 'images/avatars/IMG-6423e6d41405b0.41037408.png', '2023-03-17', 'osman.gaygusuz@gmail.com', 'je suis osman', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Thomas', 'Forest', 'jaime_le_lait', 'images/avatars/IMG-6423e719065457.46313458.png', '2023-03-17', 'thomas.forest@utbm.fr', 'yo tout le monde c\'est jaime_le_lait', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Alb', 'C\'estpassafe', 'Raryn', 'images/avatars/IMG-6423eb3c595862.45921802.jpg', '2002-03-01', 'Uwu@gmail.com', 'UTBMED', '82233bce59652cf3cc0eb7a03f3109d1'),
(5, 'Marius', 'Diguat', 'sk8zen', 'images/avatars/IMG-6426983e069306.78056520.png', '2023-03-31', 'm@d', 'No Description', '242aa1a97769109065e3b4df359bcfc9');

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
(1, 1, 36, 1, '2023-04-06 16:01:28'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gamemode`
--
ALTER TABLE `gamemode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unlocked_badge`
--
ALTER TABLE `unlocked_badge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
