-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 06:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `rponline`
--
CREATE DATABASE IF NOT EXISTS `rponline` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rponline`;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `summary` text NOT NULL,
  `text` text NOT NULL,
  `picture` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `summary`, `text`, `picture`, `category`, `archive`) VALUES
(26, '19.06.2022.', 'Once Upon a Time In Hollywood', 'A faded television actor strives to achieve fame in the final years of Hollywoods Golden Age', 'Quentin Tarantinos Once Upon a Time... in Hollywood visits 1969 Los Angeles, where everything is changing, as TV star Rick Dalton (Leonardo DiCaprio) and his longtime stunt double Cliff Booth (Brad Pitt) make their way around an industry they hardly recognize anymore. The ninth film from the writer-director features a large ensemble cast and multiple storylines in a tribute to the final moments of Hollywoods golden age.', 'Once_Upon_a_Time_in_Hollywood_poster.png', 'Movies', 0),
(27, '19.06.2022.', 'Howls Moving Castle', 'Sophie got old, can she be young again, or is there something to learn?', 'Believe it or not, this castle moves, but despite the misleading title, it does not howl. There is an eccentric guy and a cursed young woman, and they try to set her free or smth.', 'cGyqa5PxiWSsG7NSw3ufCj0JW9k.jpg', 'Movies', 0),
(29, '19.06.2022.', 'Ancient Sculptures in Color ', 'Ancient Greek and Roman Sculptures in All Their Original Technicolor Glory', 'The Metropolitan Museum of Art in New York has announced an exhibition exploring the use of color in ancient Greek and Roman sculpture, presenting pieces from the Met’s collection as they would have originally been seen in antiquity.', 'caligula.jpg', 'Arts', 0),
(30, '19.06.2022.', 'Hyperactive Smoliv', 'Pokemon Scarlet and Violet Fan Makes Animation of Smoliv', 'Following the reveal of Smoliv for Pokemon Scarlet and Violet, one excited fan decides to make an impressive animation featuring the new Pokemon. In a post on Reddit, a user known as M_Squarec shared a post featuring a unique animation they created based on the Pokemon series. Specifically, this brief clip made by the Reddit user starred Smoliv from the upcoming Pokemon Scarlet and Violet. However, this animation stood out because the artist redesigned the Pokemon to have a pixelated 2D art style instead of its 3D design seen in the Switch game.', 'smoliv.jpg', 'Gaming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `rank`) VALUES
(3, 'John', 'Doe', 'johnDoe', '$2y$10$4vLw1dNEFIsKO./KXykJDe36iGqlzo9vafNqMMofVf3FadRSM0Ri2', 0),
(4, 'John', 'Doe', 'jd', '$2y$10$y3KtEqXUgZyYOZ8JFttFHuKCUwXYUAJl8dbqHvCJaARNKIsJc78wG', 0),
(5, 'Admin', 'Admin', 'admin', '$2y$10$1QivtSYGbjjOjWv3b9GYMO0Hq1Qv/eVQJ1.Sg.J5SJLSPIFOigR1m', 1),
(6, 'Anna', 'Nicole', 'Smith', '$2y$10$5d05mGuK.kwpL4nkx2kwouxTAn/ldJEt462KXDwABVUSQTJjWmrlG', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
