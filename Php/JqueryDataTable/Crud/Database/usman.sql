-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 10:44 AM
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
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `AGE`, `GENDER`, `CITY`, `EMAIL`) VALUES
(1, 'Usman Hameed', 24, 'Male', 'Karachi', 'usman@gmail.com'),
(2, 'Fahad', 24, 'Male', 'Lahore', 'fhd12@gmail.com'),
(6, 'Babar', 29, 'Male', 'Islamabad', 'babar@gmail.com'),
(7, 'Usama Khan', 28, 'Male', 'Faisalabad', 'usama@gmail.com'),
(8, 'Rida', 28, 'Female', 'Lahore', 'rida@gmail.com'),
(9, 'Jawwad', 24, 'Male', 'Karachi', 'j@gmail.com'),
(10, 'Malik', 28, 'Male', 'Karachi', 'm@gmail.com'),
(11, 'sabir', 24, 'Male', 'Lahore', 's@gmail.com'),
(12, 'samreen', 24, 'Female', 'Karachi', 'sam@gmail.com'),
(13, 'Anas', 24, 'Male', 'Islamabad', 'an@gmail.com'),
(14, 'Sk', 24, 'Male', 'Lahore', 'sk@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
