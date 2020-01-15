-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 09:43 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capture_the_flag`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `browserfingerprint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `browserfingerprint`) VALUES
('CruSieg', 'CruSieg3096', 'f2664adf0d9a05d17cec8aee84e6502c');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `username` varchar(244) NOT NULL,
  `message` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`username`, `message`) VALUES
('pragyan1800121', 'p_ctf{ab53_304cf_d87d71}'),
('CruSieg', 'p_ctf{438_cf17f12_76185b10a_eb86c86062}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('pragyan1001', 'saddvf;klkwedv'),
('pragyan121', 'efuiehgfoierws'),
('pragyan123123', 'dswfjuwfwefef'),
('pragyan12341', 'dfwgrqrikhgkq3'),
('pragyan123419', 'dsovufuweoevgbre'),
('pragyan145126', 'wedfjuiowerfowre'),
('pragyan18', 'asfgwsrehertaeag'),
('pragyan1800121', 'qwesfujwefwefoweefd'),
('pragyan45', 'pragyan45'),
('pragyan57', 'ejuifbweower'),
('pragyan77', 'qewfgjhwehoew'),
('pragyan77979', 'weddfvoiujui'),
('pragyan8555', 'aflkijehigrgf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
