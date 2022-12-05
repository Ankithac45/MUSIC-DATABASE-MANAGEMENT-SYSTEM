-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 07:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmis`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `latest_release`
-- (See below for the actual view)
--
CREATE TABLE `latest_release` (
`id` int(100)
,`albumgen` int(100)
,`albumname` varchar(60)
,`albumsinger` varchar(100)
,`albumwriter` varchar(100)
,`albumdesc` varchar(250)
,`albumimage` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `tblalbum`
--

CREATE TABLE `tblalbum` (
  `id` int(100) NOT NULL,
  `albumgen` int(100) DEFAULT NULL,
  `albumname` varchar(60) DEFAULT NULL,
  `albumsinger` varchar(100) DEFAULT NULL,
  `albumwriter` varchar(100) DEFAULT NULL,
  `albumdesc` varchar(250) DEFAULT NULL,
  `albumimage` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblalbum`
--

INSERT INTO `tblalbum` (`id`, `albumgen`, `albumname`, `albumsinger`, `albumwriter`, `albumdesc`, `albumimage`) VALUES
(117, 30, 'Flute', 'Suhan', 'Suhan', 'Instrumental Flute', 'flute.jpeg'),
(118, 30, 'Piano', 'Anu', 'Anu', 'Instrumental Piano', 'piano.jpeg'),
(120, 32, 'Indian', 'Anvitha', 'Anvitha', 'Indian Patriotic', 'patriotic.jpeg'),
(121, 29, 'Carnatic', 'Ram', 'Ram', 'Carnatic Classical', 'classical.jpeg'),
(122, 29, 'Hindustani', 'Tom', 'Tom', 'Hindustani Classical', 'classical.jpeg'),
(123, 32, 'National', 'Nation', 'Nation', 'National Patriotic', 'patriotic.jpeg'),
(124, 33, 'Kannada Melody', 'Kannada', 'Kannada', 'Kannada Melody', 'Melody.png'),
(125, 33, 'Hindi Melody', 'Hindi', 'Hindi', 'Hindi Melody', 'Melody.png'),
(126, 28, 'South India', 'Kannada', 'Kannada', 'Southern Popular', 'popular.jpeg'),
(127, 28, 'English Popular', 'English', 'English', 'English Popular', 'popular.jpeg'),
(128, 28, 'North India', 'Hindi', 'Hindi', 'Northern Popular', 'popular.jpeg'),
(130, 33, 'fqfg', 'wkrwr', 'fqg4g4', '3q4g', 'background.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblgenre`
--

CREATE TABLE `tblgenre` (
  `id` int(10) NOT NULL,
  `genname` varchar(50) DEFAULT NULL,
  `gendesc` varchar(250) DEFAULT NULL,
  `genimage` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgenre`
--

INSERT INTO `tblgenre` (`id`, `genname`, `gendesc`, `genimage`) VALUES
(33, 'Melody', 'Melody Music', 'Melody.png'),
(32, 'Patriotic', 'Patriotic Music', 'patriotic.jpeg'),
(28, 'Popular', 'Popular Music', 'popular.jpeg'),
(29, 'Classical', 'Classical Music', 'classical.jpeg'),
(30, 'Instrument', 'Instrumental Music', 'instrumental.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsongs`
--

CREATE TABLE `tblsongs` (
  `id` int(100) NOT NULL,
  `songgen` varchar(10) DEFAULT NULL,
  `songalbum` varchar(50) DEFAULT NULL,
  `songsinger` varchar(100) DEFAULT NULL,
  `songdesc` varchar(250) DEFAULT NULL,
  `songfile` varchar(50) DEFAULT NULL,
  `songwriter` varchar(100) NOT NULL,
  `songpoints` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsongs`
--

INSERT INTO `tblsongs` (`id`, `songgen`, `songalbum`, `songsinger`, `songdesc`, `songfile`, `songwriter`, `songpoints`) VALUES
(59, 'Instrument', '118', 'Anu', 'piano 4', 'piano4.mp3', 'Anu', 0),
(57, 'Instrument', '118', 'Anu', 'piano 2', 'piano2.mp3', 'Anu', 0),
(56, 'Instrument', '118', 'Anu', 'piano1', 'piano1.mp3', 'Anu', 0),
(68, 'Patriotic', '120', 'Anvitha', 'Indian 1', 'Indian1.mp3', 'Anvitha', 0),
(63, 'Instrument', '117', 'Suhan', 'Flute 3', 'flute3.mp3', 'Suhan', 1),
(60, 'Instrument', '118', 'Anu', 'piano 5', 'piano5.mp3', 'Anu', 0),
(58, 'Instrument', '118', 'Anu', 'piano 3', 'piano3.mp3', 'Anu', 6),
(61, 'Instrument', '117', 'Suhan', 'Flute 1', 'flute1.mp3', 'Suhan', 29),
(62, 'Instrument', '117', 'Suhan', 'Flute 2', 'flute2.mp3', 'Suhan', 2),
(71, 'Patriotic', '120', 'Anvitha', 'Indian 4', 'Indian4.mp3', 'Anvitha', 1),
(70, 'Patriotic', '120', 'Anvitha', 'Indian 3', 'Indian3.mp3', 'Anvitha', 0),
(69, 'Patriotic', '120', 'Anvitha', 'Indian 2', 'indian2.mp3', 'Anvitha', 1),
(72, 'Classical', '121', 'Ram', 'Carnatic1', 'carnatic1.mp3', 'Ram', 1),
(73, 'Classical', '122', 'Tom', 'hindustani 1', 'hindustani1.mp3', 'Tom', 1),
(74, 'Melody', '124', 'Kannada', 'Kannada Melody1', 'KannadaMelody1.mp3', 'Kannada', 3),
(75, 'Melody', '124', 'Kannada', 'Kannada Melody2', 'KannadaMelody2.mp3', 'Kannada', 1),
(76, 'Melody', '125', 'Hindi', 'Hindi Melody1', 'HindiMelody1.mp3', 'Hindi', 0),
(77, 'Melody', '125', 'Hindi', 'Hindi Melody2', 'Hindi Melody2.mp3', 'Hindi', 1),
(78, 'Melody', '125', 'Hindi', 'Hindi Melody3', 'Hindi Melody3.mp3', 'Hindi', 1),
(79, 'Popular', '126', 'Kannada', 'South India1', 'South India1.mp3', 'Kannada', 2),
(80, 'Popular', '126', 'Kannada', 'South India3', 'South India3.mp3', 'Kannada', 0),
(81, 'Popular', '127', 'English', 'English Popular3', 'English Popular3.mp3', 'English', 0),
(82, 'Popular', '127', 'English', 'English Popular1', 'English Popular1.mp3', 'English', 1),
(83, 'Popular', '127', 'English', 'English Popular2', 'English Popular2.mp3', 'English', 1),
(84, 'Popular', '128', 'Hindi', 'North India1', 'North India1.mp3', 'Hindi', 1),
(85, 'Popular', '128', 'Hindi', 'North India2', 'North India2.mp3', 'Hindi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(100) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `name`, `username`, `password`) VALUES
(15, 'Ramya', 'Ramya', 'Ramyaabc'),
(3, 'Ankitha', 'Ankitha', 'Ankithaabc'),
(4, 'Suman', 'Suman', 'Suman@pass');

--
-- Triggers `tblusers`
--
DELIMITER $$
CREATE TRIGGER `password_error` BEFORE INSERT ON `tblusers` FOR EACH ROW BEGIN 
declare ERROR_MSG varchar(100); 
declare val varchar(100); 
set ERROR_MSG =("Password length must be atleast of length 8"); 
set val = length(new.password); 
if (val < 8) then 
signal sqlstate '45000' 
set message_text = ERROR_MSG; 
end if; 
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblvotes`
--

CREATE TABLE `tblvotes` (
  `vid` int(10) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `vpoints` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvotes`
--

INSERT INTO `tblvotes` (`vid`, `vname`, `vpoints`) VALUES
(7, 'Melody', 5),
(6, 'Patriotic', 0),
(5, 'Popular', 1),
(8, 'Classical', 2),
(9, 'Instrument', 3);

-- --------------------------------------------------------

--
-- Structure for view `latest_release`
--
DROP TABLE IF EXISTS `latest_release`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `latest_release`  AS SELECT `tblalbum`.`id` AS `id`, `tblalbum`.`albumgen` AS `albumgen`, `tblalbum`.`albumname` AS `albumname`, `tblalbum`.`albumsinger` AS `albumsinger`, `tblalbum`.`albumwriter` AS `albumwriter`, `tblalbum`.`albumdesc` AS `albumdesc`, `tblalbum`.`albumimage` AS `albumimage` FROM `tblalbum` ORDER BY `tblalbum`.`id` DESC LIMIT 0, 77  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblalbum`
--
ALTER TABLE `tblalbum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgenre`
--
ALTER TABLE `tblgenre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsongs`
--
ALTER TABLE `tblsongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblalbum`
--
ALTER TABLE `tblalbum`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tblgenre`
--
ALTER TABLE `tblgenre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblsongs`
--
ALTER TABLE `tblsongs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
