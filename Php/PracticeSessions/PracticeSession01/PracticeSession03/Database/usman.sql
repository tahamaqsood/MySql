-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 01:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usman`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `AGE` tinyint(4) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `IMAGE_PATH` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `AGE`, `GENDER`, `CITY`, `EMAIL`, `IMAGE_PATH`) VALUES
(3, 'Usman', 24, 'Male', 'Karachi', 'usman@gmail.com', 'images/QuxqGxX-assassins-creed-3-wallpapers.jpg'),
(14, 'Babar', 26, 'Male', 'Lahore', 'babar@gmail.com', 'images/img4.jpg'),
(16, 'Bia', 27, 'Female', 'Lahore', 'b@gmail.com', 'images/img3.jpg'),
(19, 'Zain', 24, 'Male', 'Karachi', 'zain123@gmail.com', 'images/img1.jpg'),
(20, 'Fahad', 24, 'Male', 'Karachi', 'fhd@gmail.com', 'images/img1.jpg'),
(24, 'Malik', 24, 'Male', 'Lahore', 'malik@gmail.com', 'images/img4.jpg'),
(25, 'samreen', 24, 'Female', 'Karachi', 'sam@gmail.com', 'images/img3.jpg'),
(26, 'Dice', 24, 'Male', 'Karachi', 'dice@gmail.com', 'images/img2.jpg'),
(27, 'Demo', 24, 'Female', 'Lahore', 'demo@gmail.com', 'images/img2.jpg'),
(28, 'Shahzaib', 24, 'Male', 'Karachi', 'sk@gmail.com', 'images/img1.jpg'),
(31, 'Sarim', 24, 'Male', 'Karachi', 'stwayneforlife@gmail.com', 'images/forest.jpg'),
(32, 'Dice2', 24, 'Female', 'Lahore', 'dice2@gmail.com', 'images/cube.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
