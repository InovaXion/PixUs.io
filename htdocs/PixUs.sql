-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 26, 2019 at 02:04 PM
-- Server version: 10.3.13-MariaDB-1:10.3.13+maria~bionic
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PixUs`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `idPicture` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `userName` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `commentDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `idPicture`, `idUser`, `userName`, `comment`, `commentDate`) VALUES
(1, 53, 1, 'bob', 'Vraiment trop beau je suis fan !!', '2019-04-24 14:05:30'),
(2, 33, 1, 'bob', 'Trop belle cette ville', '2019-04-24 14:06:12'),
(3, 38, 2, 'test', 'Tu te la pète franchement !', '2019-04-25 07:47:38'),
(4, 33, 2, 'test', 'J\'avoue c\'est joli', '2019-04-25 08:08:03'),
(5, 39, 1, 'bob', 'Très belle photo!', '2019-04-25 09:53:27'),
(6, 33, 2, 'test', 'bjr', '2019-04-25 09:56:48'),
(7, 33, 2, 'test', 'Wala c bo', '2019-04-25 10:09:06'),
(8, 33, 2, 'test', 'GJ !!!', '2019-04-25 10:09:16'),
(9, 55, 2, 'test', 'Trop beau Saitama !!', '2019-04-25 10:20:25'),
(10, 46, 1, 'bob', 'Mais ils sont super ces cintres!!!!', '2019-04-25 11:47:18'),
(11, 46, 3, 'test2', 'Trop beau je veux les mêmes !!!', '2019-04-25 11:47:20'),
(12, 60, 5, 'Nico', 'tro for lololol mdrrrrrrrr cé moi le plu for bande de moules', '2019-04-25 14:55:14'),
(13, 60, 4, 'azer', 'Troooooooooop biiiiiiiiien !!!!!', '2019-04-25 14:57:59'),
(14, 53, 5, 'Nico', 'je t\'aime mika t\'es le plus beau <3 <3 <3', '2019-04-25 14:58:57'),
(15, 61, 4, 'azer', 'j\'aime pas.', '2019-04-25 15:01:10'),
(16, 61, 5, 'Nico', 'ahahah la tete d\'alex mdrrrrrr signé inconnu', '2019-04-25 15:02:05'),
(17, 61, 5, 'Nico', 'AH MERDE ON VOIT MON PSEUDO MDRRRRRR', '2019-04-25 15:02:13'),
(18, 61, 5, 'Nico', 'désolé je rigolais loooool', '2019-04-25 15:02:22'),
(21, 60, 4, 'azer', 'test', '2019-04-26 10:23:47'),
(22, 61, 4, 'azer', 'nul', '2019-04-26 10:25:43'),
(23, 60, 4, 'azer', 'c\'est joli !', '2019-04-26 10:29:28'),
(24, 60, 4, 'azer', 'lol', '2019-04-26 10:29:46'),
(25, 54, 2, 'test', 'salut', '2019-04-26 11:37:42'),
(26, 54, 2, 'test', 're salut', '2019-04-26 11:38:02'),
(27, 64, 2, 'test', 'miam miam du terminal !!!', '2019-04-26 11:43:47'),
(28, 54, 3, 'test2', 'lol', '2019-04-26 12:17:28'),
(30, 60, 2, 'test', '&lt;h1&gt;Saitam jtm !&lt;/h1&gt;', '2019-04-26 13:06:40'),
(31, 53, 6, 'Sp6M3N', 'Beau Gosse !!!', '2019-04-26 13:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `imgTitle` varchar(255) DEFAULT NULL,
  `imgFilePath` varchar(255) DEFAULT NULL,
  `imgDate` datetime DEFAULT NULL,
  `imgDescription` varchar(255) DEFAULT NULL,
  `imgLikes` int(4) NOT NULL DEFAULT 0,
  `imgLikesId` smallint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `idUser`, `imgTitle`, `imgFilePath`, `imgDate`, `imgDescription`, `imgLikes`, `imgLikesId`) VALUES
(5, 2, NULL, '../img/profilPictures/21.jpg', NULL, NULL, 0, NULL),
(6, 2, NULL, '../img/profilPictures/22.jpg', NULL, NULL, 0, NULL),
(7, 1, NULL, '../img/profilPictures/1Capture d’écran de 2019-03-20 15-41-43.png', NULL, NULL, 0, NULL),
(8, 1, NULL, '../img/profilPictures/1testbob.png', NULL, NULL, 0, NULL),
(9, 2, NULL, '../img/profilPictures/23.jpg', NULL, NULL, 0, NULL),
(10, 2, NULL, '../img/profilPictures/23.jpg', NULL, NULL, 0, NULL),
(11, 2, NULL, '../img/profilPictures/2', NULL, NULL, 0, NULL),
(12, 2, NULL, '../img/profilPictures/23.jpg', NULL, NULL, 0, NULL),
(13, 1, NULL, '../img/profilPictures/12.jpg', NULL, NULL, 0, NULL),
(14, 2, NULL, '../img/profilPictures/21.jpg', NULL, NULL, 0, NULL),
(15, 2, NULL, '../img/profilPictures/21.jpg', NULL, NULL, 0, NULL),
(16, 2, NULL, '../img/profilPictures/21.jpg', NULL, NULL, 0, NULL),
(17, 2, NULL, '../img/profilPictures/21.jpg', NULL, NULL, 0, NULL),
(18, 2, NULL, '../img/profilPictures/21.jpg', NULL, NULL, 0, NULL),
(19, 3, NULL, '../img/profilPictures/33.jpg', NULL, NULL, 0, NULL),
(20, 1, NULL, '../img/profilPictures/1', NULL, NULL, 0, NULL),
(21, 1, NULL, '../img/profilPictures/112.jpg', NULL, NULL, 0, NULL),
(22, 1, NULL, '../img/profilPictures/112.jpg', NULL, NULL, 0, NULL),
(23, 3, NULL, '../img/profilPictures/32.jpg', NULL, NULL, 0, NULL),
(24, 3, NULL, '../img/profilPictures/33.jpg', NULL, NULL, 0, NULL),
(25, 3, NULL, '../img/profilPictures/32.jpg', NULL, NULL, 0, NULL),
(26, 3, NULL, '../img/profilPictures/3924TsrDf.jpg', NULL, NULL, 0, NULL),
(27, 3, NULL, '../img/profilPictures/31.jpg', NULL, NULL, 0, NULL),
(28, 1, NULL, '../img/Pictures/11testbob.png', '2019-04-23 00:00:00', NULL, 0, NULL),
(29, 1, NULL, '../img/pictures/11testbob.png', '2019-04-23 00:00:00', NULL, 0, NULL),
(33, 3, 'Mes vaccances à Paname 2.0', '../img/pictures/306-full.jpg', '2019-04-24 08:13:01', 'C\'était mes vaccances à Paname avant l\'arrivée des Gilets Jaunes !! ', 1, 3214),
(34, 3, NULL, '../img/profilPictures/3exo 1-1', NULL, NULL, 0, NULL),
(35, 3, NULL, '../img/profilPictures/3exo 1-1', NULL, NULL, 0, NULL),
(38, 3, 'coucou', '../img/pictures/304-full.jpg', '2019-04-24 08:41:44', 'Coucou 2', 0, 2134),
(39, 3, 'test', '../img/pictures/303-full.jpg', '2019-04-24 08:42:22', 'test', 0, NULL),
(40, 3, NULL, '../img/profilPictures/333.jpg', NULL, NULL, 0, NULL),
(41, 3, NULL, '../img/profilPictures/3306-full.jpg', NULL, NULL, 0, NULL),
(42, 3, NULL, '../img/profilPictures/33.jpg', NULL, NULL, 0, NULL),
(43, 3, NULL, '../img/profilPictures/3mika.jpeg', NULL, NULL, 0, NULL),
(44, 3, NULL, '../img/profilPictures/3index.png', NULL, NULL, 0, NULL),
(45, 3, NULL, '../img/profilPictures/33.jpg', NULL, NULL, 0, NULL),
(46, 1, 'cintres', '../img/pictures/101-full.jpg', '2019-04-24 09:02:37', 'ma collection de cintres', 1, 2),
(47, 3, NULL, '../img/profilPictures/3mathis.jpeg', NULL, NULL, 0, NULL),
(49, 3, 'test4', '../img/pictures/3screen-0.jpg', '2019-04-24 09:38:27', 'test4', 2, 32),
(51, 3, NULL, '../img/profilPictures/3exo unix .png', '2019-04-24 09:48:32', NULL, 0, NULL),
(53, 1, 'Mon pote Micka', '../img/profilPictures/1mika.jpeg', '2019-04-24 10:15:10', 'Matez-moi ce bg', 3, 2546),
(54, 3, 'Salut', '../img/profilPictures/3302-thumbnail.jpg', '2019-04-24 10:17:47', 'C\'est une bien belle photo', 1, 2),
(55, 2, 'Hello', '../img/profilPictures/2614VmsFwoNL._SX425_.jpg', '2019-04-24 12:53:32', 'Yes ça marche!!!!!', 2, 234),
(56, 2, 'test', '../img/profilPictures/205-full.jpg', '2019-04-24 12:58:51', 'test', 1, 23),
(57, 4, NULL, '../img/profilPictures/4screen-0.jpg', NULL, NULL, 0, NULL),
(58, 4, NULL, '../img/profilPictures/4mathis.jpeg', NULL, NULL, 0, NULL),
(59, 5, NULL, '../img/profilPictures/5affiche_370x0.jpg', NULL, NULL, 0, NULL),
(60, 5, 'One Puuuuuuuuuuuuuunch', '../img/profilPictures/5viz-blog_saitama.jpg', '2019-04-25 14:53:59', 'One PUUUUUUUUUUUUUUUUUUUUUUUNCH', 3, 542),
(61, 5, 'Simplon Roanne Promo 2', '../img/profilPictures/520190405_122105.jpg', '2019-04-25 15:00:35', 'CHEEEEEEEESE !', 2, 52),
(64, 4, 'mon terminal', '../img/profilPictures/4Capture d’écran de 2019-03-20 15-58-18.png', '2019-04-26 11:40:37', 'mdr', 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `idProfilPicture` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `userPassword`, `email`, `bio`, `idProfilPicture`) VALUES
(1, 'bob', '$2y$10$NrOMtEIZavj8Q6kMA4F0lepGDZUp3dwHp3pUDSEummFqp8TZ4D9.S', 'bob@bob', '', 21),
(2, 'test', '$2y$10$JlNvunz7f6y90h/LVQR2.ee5zrvC7VkaYb0KKbRpsMNpikpklMoUi', 'test@test.test', '&lt;h2&gt;salut&lt;/h2&gt;', 5),
(3, 'test2', '$2y$10$buhOTBH0rr2ayQACgjpnI.BueFa3BBGa3ljmrpr/0JNNL5cFrKbC6', 'test2@test2', '', 47),
(4, 'azer', '$2y$10$DwBDZX.5w/0Xz/AsR7GDMuelHo2cduV97hUYexpUOviprn0Q7VR.y', 'azer@azer', 'voici l\'utilisateur que j\'utilise pour tester le site', 58),
(5, 'Nico', '$2y$10$r0wzKkrDDf0VMQkCpURzuO3uUJe/JMOZa3E0z5l39Ys8mJqcZaeG.', 'imeian@gmail.com', 'Simplonien', 59),
(6, 'Sp6M3N', '$2y$10$rnMbYebHVF.kHizbECKO4uOtlHl2t/El.gTt0W0MbDMds3yyPQ6iy', 'specimen@gmail.com', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPicture` (`idPicture`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProfilPicture` (`idProfilPicture`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idPicture`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idProfilPicture`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
