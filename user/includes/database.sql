-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 08:19 AM
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
-- Database: `entertainment`
--
CREATE DATABASE IF NOT EXISTS `entertainment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `entertainment`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Mar 10, 2024 at 03:33 PM
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data for table `admin`
--

INSERT DELAYED IGNORE INTO `admin` VALUES
('943792484', ' joshua', 'joshua@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `audio_files`
--
-- Creation: Mar 09, 2024 at 11:13 PM
--

DROP TABLE IF EXISTS `audio_files`;
CREATE TABLE IF NOT EXISTS `audio_files` (
  `user_id` varchar(40) NOT NULL,
  `audio_id` varchar(40) NOT NULL,
  `music_title` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `audio_name` varchar(500) NOT NULL,
  `audio_type` varchar(500) NOT NULL,
  `audio_content` varchar(500) NOT NULL,
  PRIMARY KEY (`audio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `audio_files`
--

TRUNCATE TABLE `audio_files`;
--
-- Dumping data for table `audio_files`
--

INSERT DELAYED IGNORE INTO `audio_files` VALUES
('642699987', 'audio_65edebe5e67ac2.29097328', 'KWANGWARU', 'SWAHILI SONGS', 'Harmonize Ft Diamond Platnumz - Kwangwaru (Prod. Lizer).mp3', 'audio/mpeg', ''),
('642699987', 'audio_65edf78c427391.82112180', 'SAMDEE BONGO MIX SHOW', 'SWAHILI SONGS', 'The showdown experience with Mc samdee x Djbboy _ ep1 _ best of bongo_ Diamond_ otile _ harmonize(MP3_160K) (hearthis.at).mp3', 'audio/mpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Mar 10, 2024 at 05:03 PM
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` varchar(40) NOT NULL,
  `cat` varchar(500) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `category`
--

TRUNCATE TABLE `category`;
--
-- Dumping data for table `category`
--

INSERT DELAYED IGNORE INTO `category` VALUES
('cat_65edde5210e109.02940087', 'Party'),
('cat_65edde60489600.34111793', 'Festive Nights'),
('cat_65edde95d46a67.45122679', 'Pictures'),
('cat_65edf9ff2c5b88.58382645', 'Music'),
('cat_65edfed1eed082.55875748', 'Technolgy'),
('cat_65edfeea746f75.93372089', 'Horror'),
('cat_65edff263c3bf3.41048830', 'Birthday'),
('cat_65edff2e488943.47264416', 'Wedding'),
('cat_65edff3549c763.88547716', 'Nature'),
('cat_65edff3d664ca4.27298241', 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--
-- Creation: Mar 10, 2024 at 03:04 PM
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `user_id` varchar(40) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `contact`
--

TRUNCATE TABLE `contact`;
--
-- Dumping data for table `contact`
--

INSERT DELAYED IGNORE INTO `contact` VALUES
('642699987', 'josh', 'josh@gmail.com', '6789', 'i like it', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--
-- Creation: Mar 09, 2024 at 10:59 PM
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `user_id` varchar(40) NOT NULL,
  `image_id` varchar(40) NOT NULL,
  `category` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `gallery`
--

TRUNCATE TABLE `gallery`;
--
-- Dumping data for table `gallery`
--

INSERT DELAYED IGNORE INTO `gallery` VALUES
('642699987', '1314999', 'Birthday', '1518877_3624322_party1.jpg'),
('642699987', '3200765', 'Pictures', '9260387_7810069_j13.jpg'),
('642699987', '4365080', 'Festive Nights', '2326269_culture.jpg'),
('642699987', '5367478', 'Wedding', '2005870_g-2.jpg'),
('642699987', '6584714', 'Party', '7307239_slide-6.jpg'),
('642699987', '9795672', 'Festive Nights', '5833078_event_concert3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--
-- Creation: Mar 10, 2024 at 12:23 PM
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `user_id` varchar(40) NOT NULL,
  `movie_id` varchar(40) NOT NULL,
  `movie_title` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `movie_name` varchar(500) NOT NULL,
  `movie_type` varchar(500) NOT NULL,
  `movie_size` varchar(500) NOT NULL,
  `movie_path` varchar(500) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `movies`
--

TRUNCATE TABLE `movies`;
-- --------------------------------------------------------

--
-- Table structure for table `music_cat`
--
-- Creation: Mar 10, 2024 at 05:02 PM
--

DROP TABLE IF EXISTS `music_cat`;
CREATE TABLE IF NOT EXISTS `music_cat` (
  `cat_id` varchar(40) NOT NULL,
  `cat` varchar(500) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `music_cat`
--

TRUNCATE TABLE `music_cat`;
--
-- Dumping data for table `music_cat`
--

INSERT DELAYED IGNORE INTO `music_cat` VALUES
('cat_65ede8365f0908.95860466', 'HIP HOP'),
('cat_65ede87475ed71.38122345', 'RIDDIM'),
('cat_65ede87ecea997.49683863', 'JAZZ'),
('cat_65ede8886486d9.87324634', 'AFRO BEATS'),
('cat_65ede8945c04e9.88875986', 'DANCEHALL'),
('cat_65ede8a27e87b4.15411317', 'ENGLISH SONGS'),
('cat_65ede8ae3e88c0.98910975', 'SWAHILI SONGS'),
('cat_65ede8be51ce66.17955138', 'GOSPEL'),
('cat_65ede8c86415c7.06958652', 'COUNTRY MUSIC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Mar 09, 2024 at 10:53 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT 'UNIQUE',
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT DELAYED IGNORE INTO `users` VALUES
('642699987', 'josh', 'josh@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `video_files`
--
-- Creation: Mar 10, 2024 at 03:13 AM
--

DROP TABLE IF EXISTS `video_files`;
CREATE TABLE IF NOT EXISTS `video_files` (
  `user_id` varchar(40) NOT NULL,
  `video_id` varchar(40) NOT NULL,
  `video_title` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `video_name` varchar(500) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `video_files`
--

TRUNCATE TABLE `video_files`;
--
-- Dumping data for table `video_files`
--

INSERT DELAYED IGNORE INTO `video_files` VALUES
('642699987', 'video_65edecc64d8ba0.21509219', 'DANCE CHALLENGE', 'Music', '8698635_6cda1c2e-62fc-466c-941e-b90d4e26fdf4-watermark.mp4'),
('642699987', 'video_65edecf3436292.49449187', 'VSPIN MIX', 'Music', '3105428_bc8d4bb1f50c082f5c11c101c91be649.mp4'),
('642699987', 'video_65eded5e28a051.38792621', 'VSPIN MIX', 'Festive Nights', '6272081_1760fe97fbe69e60b4804c71a35cb991.mp4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
