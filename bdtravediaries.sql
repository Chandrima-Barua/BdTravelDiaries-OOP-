-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 05:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdtravediaries`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `articlenumber` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `articletitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `articletext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishtime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articlenumber`, `username`, `articletitle`, `articletext`, `publishtime`) VALUES
(1, 'anne', 'sports', 'Badminton', '17/8/2019-12:38:39GMT'),
(2, 'chandrima', 'Loream', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '17/8/2019-13:24:6GMT'),
(3, 'Tushita', 'Kayaking in Thanchi', 'On a bright February morning, we set off from Thanchi. it is common  route to meghla!', '18/8/2019-11:31:48GMT'),
(4, 'rank', 'wonder', 'that is wonderfull', '18/8/2019-11:33:24GMT'),
(5, 'yamin', 'sdsd', 'sadsd', '19/8/2019-15:25:2GMT'),
(6, 'rank', 'ffffrfr', 'frfrff', '19/8/2019-16:53:37GMT'),
(7, 'rank', 'dzff', 'fdsfsf', '24/8/2019-13:58:26GMT'),
(8, 'rank', 'tasnim', 'nooooo', '24/8/2019-14:1:15GMT'),
(9, 'tushi', 'hahahahahaha', 'hohohoho', '24/8/2019-14:6:30GMT'),
(10, 'tushi', 'hate', 'nope', '24/8/2019-14:8:7GMT'),
(11, 'tushi', 'cry', 'i am sad', '24/8/2019-14:8:35GMT'),
(12, 'dfdf', 'hey', 'no', '24/8/2019-14:46:42GMT'),
(13, 'rank', 'zccz', 'cccczc', '7/9/2019-10:34:36GMT'),
(14, 'tushita', 'passed', 'finally everything working well', '7/9/2019-11:58:27GMT');

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `flagnumber` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `articlenumber` int(10) NOT NULL,
  `flagabusive` tinyint(2) NOT NULL DEFAULT '0',
  `flagspam` tinyint(2) NOT NULL DEFAULT '0',
  `flagcopyright` tinyint(2) NOT NULL DEFAULT '0',
  `time` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recorded` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`flagnumber`, `username`, `articlenumber`, `flagabusive`, `flagspam`, `flagcopyright`, `time`, `recorded`) VALUES
(1, 'tushita', 1, 1, 0, 0, '7/9/2019-11:54:4GMT', 0),
(2, 'tushita', 1, -1, 0, 1, '7/9/2019-11:57:13GMT', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articlenumber`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`flagnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articlenumber` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `flagnumber` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;