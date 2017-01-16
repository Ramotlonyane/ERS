-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 04:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `persal_number` int(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `bDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `persal_number`, `username`, `password`, `firstname`, `lastname`, `bDeleted`) VALUES
(1, 83792376, 'admin', 'admin', 'Gabriel', 'Modise', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `persal_number` int(8) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `directorate` varchar(50) NOT NULL,
  `component` varchar(50) NOT NULL,
  `bDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `persal_number`, `firstname`, `lastname`, `department`, `directorate`, `component`, `bDeleted`) VALUES
(1, 83792376, 'Ramotlonyane Gabriel', 'Modise', 'Treasury', 'CEO office', 'IT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `persal_number` int(8) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `date_in` date NOT NULL,
  `date_out` date DEFAULT NULL,
  `bDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `persal_number`, `employee_name`, `time_in`, `time_out`, `date_in`, `date_out`, `bDeleted`) VALUES
(83, 83792376, 'Gabriel Modise', '19:49:00', '19:52:00', '2017-01-13', '2017-01-13', 0),
(90, 83792376, 'Gabriel Modise', '19:59:00', '20:01:00', '2017-01-13', '2017-01-13', 0),
(91, 83792376, 'Gabriel Modise', '20:01:00', '20:02:00', '2017-01-13', '2017-01-13', 0),
(92, 83792376, 'Gabriel Modise', '20:03:00', '22:14:00', '2017-01-13', '2017-01-13', 0),
(93, 83792376, 'Gabriel Modise', '16:17:00', '16:18:00', '2017-01-14', '2017-01-14', 0),
(94, 83792376, 'Gabriel Modise', '22:51:00', '22:59:00', '2017-01-14', '2017-01-14', 0),
(95, 83792376, 'Gabriel Modise', '23:00:00', '23:00:00', '2017-01-14', '2017-01-14', 0),
(96, 83792376, 'Gabriel Modise', '23:06:00', '23:06:00', '2017-01-14', '2017-01-14', 0),
(97, 83792376, 'Gabriel Modise', '23:19:00', '23:20:00', '2017-01-14', '2017-01-14', 0),
(98, 83792376, 'Gabriel Modise', '03:53:00', '04:01:00', '2017-01-15', '2017-01-15', 0),
(99, 83792376, 'Ramotlonyane Gabriel Modise', '04:01:00', '12:59:00', '2017-01-15', '2017-01-15', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`persal_number`),
  ADD KEY `persal_number` (`persal_number`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`persal_number`),
  ADD KEY `persal_number` (`persal_number`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`persal_number`),
  ADD KEY `persal_number` (`persal_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
