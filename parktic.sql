-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 02:27 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `parktic`
--

CREATE TABLE `parktic` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `ticket_amount` float NOT NULL,
  `ticket_due_date` date NOT NULL,
  `ticket_issued_date` date NOT NULL,
  `licence_plate` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parktic`
--

INSERT INTO `parktic` (`ticket_id`, `ticket_amount`, `ticket_due_date`, `ticket_issued_date`, `licence_plate`) VALUES
(1, 213.2, '2019-02-14', '2018-12-30', '1237814'),
(2, 124.2, '2019-02-23', '2018-12-30', '12394'),
(3, 47, '2019-06-23', '2019-01-30', 'weqjk4'),
(4, 47, '2019-06-23', '2019-01-30', 'AJITCAR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parktic`
--
ALTER TABLE `parktic`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parktic`
--
ALTER TABLE `parktic`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
