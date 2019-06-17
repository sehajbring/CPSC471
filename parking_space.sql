-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 05:39 PM
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
-- Database: `parking_space`
--

-- --------------------------------------------------------

--
-- Table structure for table `lot_location`
--

CREATE TABLE `lot_location` (
  `lot_id` int(5) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lot_location`
--

INSERT INTO `lot_location` (`lot_id`, `location`) VALUES
(2384, '142 Edmonton Trail, N.E.'),
(12345, '123 Elm Street, Calgary AB'),
(21351, '18 Street S.W., Calgary AB'),
(56789, '321 Elm Street, Calgary AB');

-- --------------------------------------------------------

--
-- Table structure for table `parking_lot`
--

CREATE TABLE `parking_lot` (
  `lot_id` int(5) NOT NULL,
  `num_floors` int(2) NOT NULL,
  `num_available` int(4) NOT NULL,
  `num_total` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_lot`
--

INSERT INTO `parking_lot` (`lot_id`, `num_floors`, `num_available`, `num_total`) VALUES
(2384, 1, 12, 12),
(12345, 1, 10, 10),
(21351, 1, 11, 11),
(56789, 1, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `parking_spot`
--

CREATE TABLE `parking_spot` (
  `lot_id` int(5) NOT NULL,
  `space_id` varchar(5) NOT NULL,
  `occupied_flag` tinyint(1) NOT NULL,
  `licence_plate` varchar(7) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_spot`
--

INSERT INTO `parking_spot` (`lot_id`, `space_id`, `occupied_flag`, `licence_plate`, `size`) VALUES
(12345, '00001', 0, '', 'regular'),
(12345, '00002', 0, '', 'regular'),
(12345, '00003', 0, '', 'regular'),
(12345, '00004', 0, '', 'regular'),
(12345, '00005', 0, '', 'regular'),
(12345, '00006', 0, '', 'regular'),
(12345, '00007', 0, '', 'small'),
(12345, '00008', 0, '', 'small'),
(12345, '00009', 0, '', 'oversized'),
(12345, '00010', 0, '', 'oversized'),
(56789, '00001', 0, '', 'regular'),
(56789, '00002', 0, '', 'regular'),
(56789, '00003', 0, '', 'regular'),
(56789, '00004', 0, '', 'regular'),
(56789, '00005', 0, '', 'regular'),
(56789, '00006', 0, '', 'regular'),
(56789, '00007', 0, '', 'small'),
(56789, '00008', 0, '', 'small'),
(56789, '00009', 0, '', 'oversized'),
(56789, '00010', 0, '', 'oversized');

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
-- Indexes for table `lot_location`
--
ALTER TABLE `lot_location`
  ADD PRIMARY KEY (`lot_id`);

--
-- Indexes for table `parking_lot`
--
ALTER TABLE `parking_lot`
  ADD PRIMARY KEY (`lot_id`);

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
