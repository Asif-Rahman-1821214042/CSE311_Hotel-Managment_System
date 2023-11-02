-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 05:43 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest_info`
--

CREATE TABLE `guest_info` (
  `NID` varchar(8) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phn_number` varchar(11) NOT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `conf_pass` varchar(15) DEFAULT NULL,
  `choice` int(6) DEFAULT NULL,
  `c_ans` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_info`
--

INSERT INTO `guest_info` (`NID`, `first_name`, `last_name`, `email`, `phn_number`, `pass`, `conf_pass`, `choice`, `c_ans`) VALUES
('123', 'Micro', 'Bots', 'microbots@email.com', '01777076628', 'stkC5H6Vo7aBM', 'stkC5H6Vo7aBM', 2, 'sweden'),
('124', 'm', 'Rahman', 'm_rahman@email.com', '01711703098', 'stETX4M7te3.g', 'stETX4M7te3.g', 1, 'rck'),
('125', 'rk', 'fahim', 'fk@gmail.com', '01711703099', 'sttsve.aO6LvA', 'sttsve.aO6LvA', 1, 'nov');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `guest_id` int(10) DEFAULT NULL,
  `nroom` int(11) DEFAULT NULL,
  `num_of_day` int(11) DEFAULT NULL,
  `room_mrp` int(15) DEFAULT NULL,
  `Amount` int(15) DEFAULT NULL,
  `Status` int(15) DEFAULT NULL,
  `rsv_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay_status`
--

CREATE TABLE `pay_status` (
  `id` int(1) NOT NULL,
  `p_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_status`
--

INSERT INTO `pay_status` (`id`, `p_status`) VALUES
(1, 'Done'),
(2, 'Not Done');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `bedding` varchar(10) DEFAULT NULL,
  `price` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `bedding`, `price`) VALUES
(1, 'Luxury Room', 'Single', 10000),
(2, 'Luxury Room', 'Double', 11000),
(3, 'Luxury Room', 'Triple', 11500),
(4, 'Luxury Room', 'Quad', 12000),
(5, 'Deluxe Room', 'Single', 5000),
(6, 'Deluxe Room', 'Double', 6000),
(7, 'Deluxe Room', 'Triple', 6500),
(8, 'Deluxe Room', 'Quad', 7000),
(9, 'Single Room', 'Single', 2500),
(10, 'Single Room', 'Double', 3500),
(11, 'Single Room', 'Triple', 4000),
(12, 'Single Room', 'Quad', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) NOT NULL,
  `guest_id` int(10) NOT NULL,
  `Room` varchar(15) DEFAULT NULL,
  `bedding` varchar(15) DEFAULT NULL,
  `rdate` date DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `adult` int(10) DEFAULT NULL,
  `children` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_num`
--

CREATE TABLE `room_num` (
  `id` int(6) NOT NULL,
  `t_id` int(10) NOT NULL,
  `cusid` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_num`
--

INSERT INTO `room_num` (`id`, `t_id`, `cusid`) VALUES
(101, 4, NULL),
(102, 3, NULL),
(103, 6, NULL),
(104, 8, NULL),
(105, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` varchar(7) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `conf_pass` varchar(10) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `email`, `pass`, `conf_pass`, `first_name`, `last_name`) VALUES
('182', 'cs@email.com', 'st3X.AckN/', 'st3X.AckN/', 'CS', 'Dojo'),
('183', 'micro@email.com', 'st8SwWggeF', 'st8SwWggeF', 'mic', 'photon'),
('185', 'ms@email.com', 'stKucYvpgX', 'stKucYvpgX', 'ms', 'soft'),
('186', 'hin18@email.com', 'stncP43Inm', 'stncP43Inm', 'Md.Asif', 'Rahman'),
('187', 'dt@email.com', 'st/jvJ03mc', 'st/jvJ03mc', 'Doc', 'Ton'),
('188', 'sol@email.com', 'stwscEZO7D', 'stwscEZO7D', 'sol', 'morgan'),
('189', 'pm@email.com', 'studM40PNQ', 'studM40PNQ', 'Poke', 'master'),
('190', 'km@email.com', 'st24oMOc8F', 'st24oMOc8F', 'k', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest_info`
--
ALTER TABLE `guest_info`
  ADD PRIMARY KEY (`NID`),
  ADD UNIQUE KEY `phn_number` (`phn_number`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_status`
--
ALTER TABLE `pay_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_num`
--
ALTER TABLE `room_num`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD UNIQUE KEY `id_3` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
