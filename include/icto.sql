-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 01:54 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icto`
--

-- --------------------------------------------------------

--
-- Table structure for table `idp`
--

CREATE TABLE `idp` (
  `id_key` int(11) NOT NULL,
  `id_id` varchar(50) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_firstname` varchar(100) NOT NULL,
  `id_middlename` varchar(100) NOT NULL,
  `id_lastname` varchar(100) NOT NULL,
  `id_address` varchar(250) NOT NULL,
  `id_bloodtype` varchar(5) NOT NULL,
  `id_sex` varchar(10) NOT NULL,
  `id_birthdate` date NOT NULL,
  `id_number` varchar(15) NOT NULL,
  `id_position` varchar(30) NOT NULL,
  `id_parent` varchar(200) NOT NULL,
  `id_contact` varchar(11) NOT NULL,
  `id_appdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idp`
--

INSERT INTO `idp` (`id_key`, `id_id`, `id_type`, `id_firstname`, `id_middlename`, `id_lastname`, `id_address`, `id_bloodtype`, `id_sex`, `id_birthdate`, `id_number`, `id_position`, `id_parent`, `id_contact`, `id_appdate`) VALUES
(1, 'IDP1182022_001', 'NEW', 'JOHN MICHAEL', 'NAVANES', 'GADOT', 'SAN ISIDRO, BUENAVISTA, GUIMARAS', 'B+', 'MALE', '0000-00-00', 'A-07112022-001', 'ADMIN AIDE III', 'EMCY NAVANES GADOT', '09650647123', '2022-11-08 09:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `idp_history`
--

CREATE TABLE `idp_history` (
  `idh_id` int(11) NOT NULL,
  `id_id` varchar(50) NOT NULL,
  `idh_img` text NOT NULL,
  `idh_sig` text NOT NULL,
  `idh_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idp_history`
--

INSERT INTO `idp_history` (`idh_id`, `id_id`, `idh_img`, `idh_sig`, `idh_date`) VALUES
(1, 'IDP1182022_001', 'asset/profile-img/0001_ZCR-LOGO-NO-BG-304dc013.png', 'asset/signature/636a5e2e0e352.png', '2022-11-08 09:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `idp_id`
--

CREATE TABLE `idp_id` (
  `idp_key` int(11) NOT NULL,
  `id_id` varchar(50) NOT NULL,
  `idp_sss` varchar(50) NOT NULL,
  `idp_tin` varchar(50) NOT NULL,
  `idp_gsis` varchar(50) NOT NULL,
  `idp_philhealth` varchar(50) NOT NULL,
  `idp_pagibig` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idp_id`
--

INSERT INTO `idp_id` (`idp_key`, `id_id`, `idp_sss`, `idp_tin`, `idp_gsis`, `idp_philhealth`, `idp_pagibig`) VALUES
(1, 'IDP1182022_001', '', '', '', '12-123456789-1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idp`
--
ALTER TABLE `idp`
  ADD PRIMARY KEY (`id_key`);

--
-- Indexes for table `idp_history`
--
ALTER TABLE `idp_history`
  ADD PRIMARY KEY (`idh_id`);

--
-- Indexes for table `idp_id`
--
ALTER TABLE `idp_id`
  ADD PRIMARY KEY (`idp_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idp`
--
ALTER TABLE `idp`
  MODIFY `id_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `idp_history`
--
ALTER TABLE `idp_history`
  MODIFY `idh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `idp_id`
--
ALTER TABLE `idp_id`
  MODIFY `idp_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
