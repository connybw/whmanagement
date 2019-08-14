-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 01:01 PM
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
-- Table structure for table `aendern`
--

CREATE TABLE `aendern` (
  `id` int(11) NOT NULL,
  `artikelid` int(11) NOT NULL,
  `anzahl` int(11) NOT NULL,
  `plusminus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `id` int(11) NOT NULL,
  `farbe` varchar(64) NOT NULL,
  `farbid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `artikelid` int(11) NOT NULL,
  `anzahl` int(11) NOT NULL,
  `plusminus` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regal`
--

CREATE TABLE `regal` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(1) NOT NULL,
  `button` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `slogan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wagen`
--

CREATE TABLE `wagen` (
  `id` int(11) NOT NULL,
  `artikelid` int(11) NOT NULL,
  `anzahl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aendern`
--
ALTER TABLE `aendern`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `history`
--
ALTER TABLE `history`
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
-- Indexes for table `wagen`
--
ALTER TABLE `wagen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aendern`
--
ALTER TABLE `aendern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regal`
--
ALTER TABLE `regal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regaldev`
--
ALTER TABLE `regaldev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wagen`
--
ALTER TABLE `wagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
