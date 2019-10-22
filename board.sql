-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 09:13 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `board`
--

-- --------------------------------------------------------

--
-- Table structure for table `board2`
--

CREATE TABLE `board2` (
  `id` int(11) NOT NULL,
  `fac_name` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `loop` int(11) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `size` int(4) DEFAULT NULL,
  `board_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board2`
--

INSERT INTO `board2` (`id`, `fac_name`, `message`, `color`, `time`, `loop`, `file`, `size`, `board_id`) VALUES
(486, 'Vikash Kumar', 'My Lappy', 'FFFFFF', 1, NULL, 'no', 22, 1701);

-- --------------------------------------------------------

--
-- Table structure for table `board_id`
--

CREATE TABLE `board_id` (
  `id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `board_name` varchar(20) NOT NULL,
  `board_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board_id`
--

INSERT INTO `board_id` (`id`, `board_id`, `board_name`, `board_remarks`) VALUES
(1, 1701, 'ASUS Laptop', ''),
(3, 1702, 'Tanmay', 'Kumar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board2`
--
ALTER TABLE `board2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_id`
--
ALTER TABLE `board_id`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `board_id` (`board_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board2`
--
ALTER TABLE `board2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487;

--
-- AUTO_INCREMENT for table `board_id`
--
ALTER TABLE `board_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
