-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 02:27 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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
  `space_id` int(11) NOT NULL,
  `lot_id` int(5) NOT NULL,
  `licence_plate` varchar(7) NOT NULL,
  `occupied_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_spot`
--

INSERT INTO `parking_spot` (`space_id`, `lot_id`, `licence_plate`, `occupied_flag`) VALUES
(1, 12345, '12343', 1),
(2, 12345, '12534d', 1),
(3, 12345, '12344', 1),
(4, 12345, '12344', 1),
(5, 12345, '', 0),
(6, 12345, '', 0),
(7, 12345, '', 0),
(8, 12345, '', 0),
(9, 12345, '', 0),
(10, 12345, '', 0),
(11, 56789, '12343', 1),
(12, 56789, '', 0),
(13, 56789, '', 0),
(14, 56789, '', 0),
(15, 56789, '', 0),
(16, 56789, '', 0),
(17, 56789, '', 0),
(18, 56789, '', 0),
(19, 56789, '', 0),
(20, 56789, '', 0),
(21, 2384, '', 0),
(22, 2384, '', 0),
(23, 2384, '', 0),
(24, 2384, '', 0),
(25, 2384, '', 0),
(26, 2384, '', 0),
(27, 2384, '', 0),
(28, 2384, '', 0),
(29, 2384, '', 0),
(30, 2384, '', 0),
(31, 2384, '', 0),
(32, 2384, '', 0),
(33, 2384, '', 0),
(34, 2384, '', 0),
(35, 2384, '', 0),
(36, 2384, '', 0),
(37, 21351, '', 0),
(38, 21351, '', 0),
(39, 21351, '', 0),
(40, 21351, '', 0),
(41, 21351, '', 0),
(42, 21351, '', 0),
(43, 21351, '', 0),
(44, 21351, '', 0),
(45, 21351, '', 0),
(46, 21351, '', 0),
(47, 21351, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `parktic`
--

CREATE TABLE `parktic` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `amount` float NOT NULL,
  `issued` date NOT NULL,
  `licence` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parktic`
--

INSERT INTO `parktic` (`ticket_id`, `amount`, `issued`, `licence`) VALUES
(1, 213.2, '2018-12-30', '1237814'),
(2, 124.2, '2018-12-30', '12394'),
(3, 47, '2019-01-30', 'weqjk4'),
(4, 47, '2019-01-30', 'AJITCAR'),
(5, 45, '2019-06-18', '111'),
(6, 13431, '2019-06-18', '11111'),
(7, 5555, '2019-06-18', '11111'),
(8, 4000, '2019-06-18', '11111'),
(9, 4444, '2019-06-18', '44'),
(10, 555, '2019-06-18', '44'),
(11, 5000, '2019-06-20', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Eric', '$2y$10$ZUGAPu57.hNSUeszmX0QfuO2.SzdCGHyuywO9EPx6RSuJEkmwOyW.', '2019-06-20 18:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `users_staff`
--

CREATE TABLE `users_staff` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_staff`
--

INSERT INTO `users_staff` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'eric', '$2y$10$ZUGAPu57.hNSUeszmX0QfuO2.SzdCGHyuywO9EPx6RSuJEkmwOyW.', '2019-06-20 18:22:38');

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
-- Indexes for table `parking_spot`
--
ALTER TABLE `parking_spot`
  ADD PRIMARY KEY (`space_id`);

--
-- Indexes for table `parktic`
--
ALTER TABLE `parktic`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_staff`
--
ALTER TABLE `users_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parking_spot`
--
ALTER TABLE `parking_spot`
  MODIFY `space_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `parktic`
--
ALTER TABLE `parktic`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_staff`
--
ALTER TABLE `users_staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parking_lot`
--
ALTER TABLE `parking_lot`
  ADD CONSTRAINT `fk_l_id` FOREIGN KEY (`lot_id`) REFERENCES `lot_location` (`lot_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
