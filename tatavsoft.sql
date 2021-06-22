-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 01:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatavsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `tite` varchar(255) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `span` varchar(255) NOT NULL,
  `occurence` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `tite`, `sdate`, `edate`, `span`, `occurence`, `created_date`) VALUES
(3, 'pulkit1329232', '2021-06-11', '2021-06-09', '2', '2', '2021-06-22 10:46:11'),
(4, 'pulkit232', '2021-06-24', '2021-06-25', '1', '1', '2021-06-22 10:46:54'),
(5, 'pulkit2322', '2021-06-26', '2021-06-27', '1', '1', '2021-06-22 10:48:21'),
(6, 'pulkit23226', '2021-06-29', '2021-06-29', '1', '1', '2021-06-22 10:49:55'),
(7, 'test', '2021-07-01', '2021-07-02', '1', '1', '2021-06-22 10:50:14'),
(8, 'test12', '2021-08-04', '2021-08-05', '1', '1', '2021-06-22 11:25:01'),
(9, 'test127', '2021-09-07', '2021-09-07', '1', '1', '2021-06-22 12:15:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
