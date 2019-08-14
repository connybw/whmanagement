-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 06:24 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lager`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `artikelNR` varchar(255) NOT NULL,
  `bestand` int(11) NOT NULL,
  `bild` varchar(64) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `name`, `barcode`, `artikelNR`, `bestand`, `bild`, `min`) VALUES
(0, 'nulli', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `id` int(11) NOT NULL,
  `farbe` varchar(64) NOT NULL,
  `farbid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buttons`
--

INSERT INTO `buttons` (`id`, `farbe`, `farbid`) VALUES
(1, 'grün', 'btn btn-success'),
(2, 'grün invertiert', 'btn btn-outline-success'),
(3, 'grau', 'btn btn-secondary'),
(4, 'grau invertiert', 'btn btn-outline-secondary'),
(5, 'blau', 'btn btn-primary'),
(6, 'blau invertiert', 'btn btn-outline-primary'),
(7, 'rot', 'btn btn-danger'),
(8, 'rot invertiert', 'btn btn-outline-danger');

-- --------------------------------------------------------

--
-- Table structure for table `regal`
--

CREATE TABLE `regal` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regal`

-- --------------------------------------------------------

--
-- Table structure for table `regaldev`
--

CREATE TABLE `regaldev` (
  `id` int(11) NOT NULL,
  `regalid` int(11) NOT NULL,
  `artikelid` int(11) NOT NULL,
  `reihe` int(11) NOT NULL,
  `spalte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regaldev`
--

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `item` varchar(64) NOT NULL,
  `objectid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`item`, `objectid`) VALUES
('button', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regal`
--
ALTER TABLE `regal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regaldev`
--
ALTER TABLE `regaldev`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regalid` (`regalid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regal`
--
ALTER TABLE `regal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regaldev`
--
ALTER TABLE `regaldev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `regaldev`
--
ALTER TABLE `regaldev`
  ADD CONSTRAINT `regaldev_ibfk_1` FOREIGN KEY (`regalid`) REFERENCES `regal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
