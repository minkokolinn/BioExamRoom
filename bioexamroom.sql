-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 29, 2022 at 03:44 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioexamroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `answerpaper`
--

CREATE TABLE `answerpaper` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `class` varchar(5) NOT NULL,
  `question_title` varchar(50) NOT NULL,
  `truefalse_answer` varchar(80) NOT NULL,
  `multiplechoice_answer` varchar(80) NOT NULL,
  `completion_answer` text NOT NULL,
  `shortquestion_answer` text NOT NULL,
  `uploadeddatetime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ap`
--

CREATE TABLE `ap` (
  `secretid` int(11) NOT NULL,
  `secretkey` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap`
--

INSERT INTO `ap` (`secretid`, `secretkey`) VALUES
(1, '1111');

-- --------------------------------------------------------

--
-- Table structure for table `completion`
--

CREATE TABLE `completion` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exampaper`
--

CREATE TABLE `exampaper` (
  `question_title` varchar(50) NOT NULL,
  `truefalse` varchar(255) NOT NULL,
  `multiplechoice` varchar(255) NOT NULL,
  `completion` varchar(255) NOT NULL,
  `shortquestion` varchar(255) NOT NULL,
  `active` varchar(3) NOT NULL,
  `groups` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `multiplechoice`
--

CREATE TABLE `multiplechoice` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `a` varchar(50) NOT NULL,
  `b` varchar(50) NOT NULL,
  `c` varchar(50) NOT NULL,
  `d` varchar(50) NOT NULL,
  `right_answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `student_id` varchar(10) NOT NULL,
  `class` varchar(5) NOT NULL,
  `question_title` varchar(50) NOT NULL,
  `truefalse_mark` varchar(60) NOT NULL,
  `multiplechoice_mark` varchar(60) NOT NULL,
  `completion_mark` varchar(60) NOT NULL,
  `shortquestion_mark` varchar(60) NOT NULL,
  `truefalse_total` double NOT NULL,
  `multiplechoice_total` double NOT NULL,
  `completion_total` double NOT NULL,
  `shortquestion_total` double NOT NULL,
  `total` double NOT NULL,
  `showresult` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shortquestion`
--

CREATE TABLE `shortquestion` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code_number` varchar(10) NOT NULL,
  `class` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempexampaper`
--

CREATE TABLE `tempexampaper` (
  `question_title` varchar(50) NOT NULL,
  `truefalse` mediumtext NOT NULL,
  `ans_truefalse` text NOT NULL,
  `multiplechoice` mediumtext NOT NULL,
  `ans_multiplechoice` text NOT NULL,
  `completion` mediumtext NOT NULL,
  `shortquestion` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truefalse`
--

CREATE TABLE `truefalse` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answerpaper`
--
ALTER TABLE `answerpaper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap`
--
ALTER TABLE `ap`
  ADD PRIMARY KEY (`secretid`);

--
-- Indexes for table `completion`
--
ALTER TABLE `completion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exampaper`
--
ALTER TABLE `exampaper`
  ADD PRIMARY KEY (`question_title`);

--
-- Indexes for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortquestion`
--
ALTER TABLE `shortquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempexampaper`
--
ALTER TABLE `tempexampaper`
  ADD PRIMARY KEY (`question_title`);

--
-- Indexes for table `truefalse`
--
ALTER TABLE `truefalse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answerpaper`
--
ALTER TABLE `answerpaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ap`
--
ALTER TABLE `ap`
  MODIFY `secretid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `completion`
--
ALTER TABLE `completion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortquestion`
--
ALTER TABLE `shortquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truefalse`
--
ALTER TABLE `truefalse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
