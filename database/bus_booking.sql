-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 11:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(30) NOT NULL,
  `schedule_id` int(30) NOT NULL,
  `ref_no` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '1=Paid, 0- Unpaid',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `schedule_id`, `ref_no`, `user_id`, `name`, `qty`, `status`, `date_updated`) VALUES
(1, 1, '202009091727', 5, '', 2, 1, '2023-04-13 23:54:48'),
(2, 1, '202009091626', 6, 'Sample', 2, 1, '2023-03-31 14:10:59'),
(3, 1, '202009099953', 8, 'asdasd asdasd', 2, 1, '2023-03-31 16:39:43'),
(4, 1, '202303301415', 9, '', 3, 0, '2023-03-31 14:10:59'),
(6, 2, '20230330646', 4, 'rayan', 10, 0, '2023-03-31 02:30:35'),
(7, 2, '202303304322', 11, 'dlbrin', 15, 0, '2023-03-31 14:10:59'),
(8, 1, '202303303495', 12, 'narin', 2, 0, '2023-03-31 14:10:59'),
(32, 8, '202304133115', 3, '', 5, 0, '2023-04-13 23:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `bus_number` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `bus_number`, `status`, `date_updated`) VALUES
(3, 'Economy', '5001', 1, '2020-09-08 13:54:42'),
(4, 'VIP Bus', '6001', 1, '2023-03-30 23:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(30) NOT NULL,
  `terminal_name` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= inactive , 1= active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `terminal_name`, `city`, `state`, `status`, `date_updated`) VALUES
(1, 'Duhok International Terminal', 'Duhok', 'Kurdistan', 1, '2023-03-26 11:27:52'),
(2, 'Erbil International Terminal', 'Erbil', 'Kurdistan', 1, '2023-03-26 11:28:14'),
(3, 'kerkuk International Terminal', 'kerkuk', 'Kurdistan', 1, '2023-03-27 23:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `bus_id` int(30) NOT NULL,
  `from_location` int(30) NOT NULL,
  `to_location` int(30) NOT NULL,
  `departure_time` datetime NOT NULL,
  `eta` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `availability` int(11) NOT NULL,
  `price` text NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `bus_id`, `from_location`, `to_location`, `departure_time`, `eta`, `status`, `availability`, `price`, `date_updated`) VALUES
(1, 3, 1, 1, '2020-09-11 16:00:00', '2020-09-12 02:00:00', 1, 32, '250', '2023-03-30 23:10:36'),
(2, 3, 2, 1, '2020-09-12 02:45:00', '2020-09-12 05:00:00', 1, 32, '250', '2023-03-30 23:10:36'),
(3, 3, 1, 1, '2023-04-30 17:46:00', '2023-03-31 19:00:00', 1, 13, '10000', '2023-03-31 14:47:12'),
(4, 3, 1, 3, '2023-04-01 23:13:00', '2023-04-01 23:13:00', 1, 22, '32', '2023-03-30 20:14:14'),
(5, 0, 1, 2, '2023-04-03 17:48:00', '2023-03-31 19:50:00', 1, 15, '10000', '2023-03-31 14:48:59'),
(6, 4, 1, 2, '2023-04-20 17:49:00', '2023-03-31 20:00:00', 1, 17, '150000', '2023-03-31 14:50:13'),
(7, 4, 1, 2, '2023-04-15 11:00:00', '2023-04-15 14:00:00', 1, 15, '10000', '2023-04-13 19:34:35'),
(8, 4, 1, 3, '2023-04-14 10:00:00', '2023-04-14 11:00:00', 1, 20, '15000', '2023-04-13 19:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(150) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = admin, 2= faculty , 3 = student',
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `phone_2` varchar(45) DEFAULT NULL,
  `blood_type` varchar(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 0 = incative , 1 = active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `is_admin`, `username`, `password`, `phone`, `phone_2`, `blood_type`, `status`, `date_updated`) VALUES
(1, 'Administrator', 1, 1, 'admin', 'admin123', NULL, NULL, NULL, 1, '2023-03-26 23:01:01'),
(2, 'John Smith', 1, 1, 'jsmth', 'admin123', NULL, NULL, NULL, 1, '2023-03-26 23:01:01'),
(3, 'Araz Ibrahim', 1, 0, 'arazibrahim', '12345678', '0750702090', '07517052090', 'B+', 1, '2023-04-13 22:23:49'),
(5, 'Aurelia Toni', 1, 0, '', 'araz123', '07507052090', '91', 'AB+', 1, '2023-03-31 22:25:23'),
(8, 'dlbrin', 1, 0, 'dlbrin', 'admin123', '07507052090', '075139874', 'B-', 1, '2023-03-31 22:16:21'),
(11, 'Brendan Harmon', 1, 0, 'gusupywo', 'Pa$$w0rd!', '624', '268', 'B+', 1, '2023-03-27 10:47:11'),
(12, 'Homan Mohammad', 1, 0, 'homan', 'Pa$$w0rd!', '76', '19', 'AB+', 1, '2023-03-31 22:16:49'),
(13, 'sharmin ahmad', 1, 0, 'sharmin', '12345678', '07507502090', '07507502090', 'AB-', 1, '2023-03-31 22:09:27'),
(14, 'kaya', 1, 0, 'kaya', 'admin123', '0750', '0770', 'A+', 1, '2023-03-31 22:38:30'),
(15, 'system user', 1, 1, 'system', 'admin123', NULL, NULL, NULL, 1, '2023-03-31 22:41:15'),
(16, 'Hogir', 1, 0, 'hogir', '12345678', '07507052090', '07501234567', 'B+', 1, '2023-04-13 22:30:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
