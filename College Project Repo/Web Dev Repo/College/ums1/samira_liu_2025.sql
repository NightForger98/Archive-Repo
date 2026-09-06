-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 02:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samira_liu_2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cID` int(11) NOT NULL,
  `courseTitle` varchar(50) NOT NULL,
  `courseCode` text NOT NULL,
  `NumberofCredits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cID`, `courseTitle`, `courseCode`, `NumberofCredits`) VALUES
(1, 'intro. to computer', 'csci200', 3),
(2, 'advanced english', 'eng205', 2),
(3, 'database', 'data100', 3),
(4, 'probability math', 'eng205', 3),
(5, 'web advanced', 'cweb150', 3),
(7, 'Business Math', '567', 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `roleId`) VALUES
(1, 'maher', '12', 'maher@gmail.com', 1),
(2, 'Mahmoud', '1234', 'mahmoud.samad@gmail.com', 1),
(3, 'waleed', '1234', 'wm@gmail.com', 2),
(4, 'Akram', '0000', 'akram@gmail.com', 2),
(6, 'rayan', '1234', 'rayan@gmail.com', 2),
(7, 'm samad', '12', 'm@gmail.com', 2),
(9, 'majd', '1234', 'm@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `description`) VALUES
(1, 'Admin Full Access'),
(2, 'User Read Only');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sID` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `major` text NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sID`, `fname`, `lname`, `dob`, `address`, `email`, `major`, `photo`) VALUES
(1, 'ahmad', 'mousa', '2002-11-07', 'Beirut, Hamra.', 'ahmad.moussa121@gmail.com', 'nursing', ''),
(2, 'malek', 'karam', '2001-03-07', 'Beirut, mar Elias.', 'malekk122121@yahoo.com', 'electrical engineering', ''),
(3, 'maya', 'soubra', '2002-02-21', 'beriut, achrafieh.', 'mayasoubra327@gmail.com', 'Engineering', ''),
(14, 'samira', 'soubra eee', '2013-01-21', 'test', '101440@s.stirlingschools.co.uk', 'Engineering', 'WhatsApp Image 2024-11-13 at 10.26.52_f3a0fce7.jpg'),
(17, 'maya', 'ehhhhhh', '2024-12-03', 'weqe', '1001440@s.stirlingschools.co.uk', 'Computer Science', 's1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
