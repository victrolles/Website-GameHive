-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 12:02 PM
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
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(96, 1, 2, 'comment ça va ?', '', '2023-03-30 11:49:33', 1),
(97, 1, 2, 'et toi ?', '', '2023-03-30 11:56:48', 1);

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
(4, 'Alb', 'C\'estpassafe', 'Raryn', 'images/avatars/IMG-6423eb3c595862.45921802.jpg', '2002-03-01', 'Uwu@gmail.com', 'UTBMED', '82233bce59652cf3cc0eb7a03f3109d1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classement`
--
ALTER TABLE `classement`
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
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classement`
--
ALTER TABLE `classement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gamemode`
--
ALTER TABLE `gamemode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
