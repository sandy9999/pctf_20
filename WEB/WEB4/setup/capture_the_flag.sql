-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2020 at 08:43 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

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
('CruSieg', 'CruSieg3096', 'f2664adf0d9a05d17cec8aee84e6502c'),
('hello', 'hello', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `hello`
--

CREATE TABLE `hello` (
  `namae` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instabook`
--

CREATE TABLE `instabook` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilepic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instabook`
--

INSERT INTO `instabook` (`username`, `password`, `profilepic`) VALUES
('hello', 'hello', 'includes/picture/5e41a8ed346bd.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kimimsg`
--

CREATE TABLE `kimimsg` (
  `username` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reciever` varchar(255) NOT NULL DEFAULT 'boss'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kimimsg`
--

INSERT INTO `kimimsg` (`username`, `message`, `reciever`) VALUES
('frnd1', 'p', 'boss'),
('frnd2', '_', 'boss'),
('frnd3', 'c', 'boss'),
('frnd4', 't', 'boss'),
('frnd5', 'f', 'boss'),
('frnd6', '{', 'boss'),
('frnd7', 'w', 'boss'),
('frnd8', 'e', 'boss'),
('frnd9', '_', 'boss'),
('frnd10', 'r', 'boss'),
('frnd11', '_', 'boss'),
('frnd12', '7', 'boss'),
('frnd13', 'e', 'boss'),
('frnd13', 'r', 'boss'),
('frnd14', 'e', 'boss'),
('frnd15', '_', 'boss'),
('friend16', '4', 'boss'),
('friend17', '_', 'boss'),
('friend16', 'u', 'boss'),
('friend17', '}', 'boss');

-- --------------------------------------------------------

--
-- Table structure for table `kimiusers`
--

CREATE TABLE `kimiusers` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('CruSieg', 'p_ctf{438_cf17f12_76185b10a_eb86c86062}'),
('JohnWick', 'p_ctf{h3_k1113d_my_d09_ju57_91v3_m3_4_9un}');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `username` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('kimi \' OR 1=1 --', 'hello'),
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
('pragyan8555', 'aflkijehigrgf'),
('test1', 'test1test1');

-- --------------------------------------------------------

--
-- Table structure for table `web3users`
--

CREATE TABLE `web3users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web3users`
--

INSERT INTO `web3users` (`username`, `password`) VALUES
('JohnWick', 'rgvhjbr4_erh3ea_a3etrsn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instabook`
--
ALTER TABLE `instabook`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `web3users`
--
ALTER TABLE `web3users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
