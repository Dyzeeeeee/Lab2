-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2023 at 01:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_music`
--

CREATE TABLE `tbl_music` (
  `ms_id` int NOT NULL,
  `ms_name` varchar(50) NOT NULL,
  `ms_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_music`
--

INSERT INTO `tbl_music` (`ms_id`, `ms_name`, `ms_path`) VALUES
(19, 'Desert', 'music_list/Desert.mp3'),
(20, 'Salamat Salamat', 'music_list/Salamat Salamat.mp3'),
(21, 'Ilaw sa Daan', 'music_list/Ilaw sa Daan.mp3'),
(22, 'The SUmmons', 'music_list/The SUmmons.mp3'),
(23, 'I can only imagine', 'music_list/I can only imagine.mp3'),
(24, 'Mundo', 'music_list/Mundo.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_playlist`
--

CREATE TABLE `tbl_playlist` (
  `pl_id` int NOT NULL,
  `pl_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_playlist`
--

INSERT INTO `tbl_playlist` (`pl_id`, `pl_name`) VALUES
(16, 'Church'),
(17, 'IVOS'),
(18, 'Favorites');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_playmusic`
--

CREATE TABLE `tbl_playmusic` (
  `id` int NOT NULL,
  `id_ms` int DEFAULT NULL,
  `id_pl` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_playmusic`
--

INSERT INTO `tbl_playmusic` (`id`, `id_ms`, `id_pl`) VALUES
(21, 19, 16),
(22, 22, 16),
(23, 23, 16),
(24, 21, 17),
(25, 24, 17),
(26, 23, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_music`
--
ALTER TABLE `tbl_music`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `tbl_playlist`
--
ALTER TABLE `tbl_playlist`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `tbl_playmusic`
--
ALTER TABLE `tbl_playmusic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_music` (`id_ms`),
  ADD KEY `fk_pl` (`id_pl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_music`
--
ALTER TABLE `tbl_music`
  MODIFY `ms_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_playlist`
--
ALTER TABLE `tbl_playlist`
  MODIFY `pl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_playmusic`
--
ALTER TABLE `tbl_playmusic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_playmusic`
--
ALTER TABLE `tbl_playmusic`
  ADD CONSTRAINT `fk_music` FOREIGN KEY (`id_ms`) REFERENCES `tbl_music` (`ms_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pl` FOREIGN KEY (`id_pl`) REFERENCES `tbl_playlist` (`pl_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
