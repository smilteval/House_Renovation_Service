-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 11:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renovation`
--

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `contractor_id` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `cost_for_hire` decimal(8,2) DEFAULT NULL,
  `zipcode` varchar(5) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`contractor_id`, `company_name`, `specialization`, `cost_for_hire`, `zipcode`, `phone`, `email`, `website`, `city`, `state`) VALUES
(1, 'Your Home Inc.', 'Plumbing', '10000.00', '11111', '1112223333', 'yourhome@gmail.com', 'www.yourhome.com', 'New York City', 'New York'),
(2, 'The Best in Town', 'Cleaning', '5000.00', '67891', '6460002334', 'bestintown@gmail.com', 'www.bestintown.com', 'Brooklyn', 'New York'),
(3, 'Make Magic Happen', 'Flooring', '7000.00', '50214', '1542227849', 'magichome@gmail.com', 'www.makemagichappen.org', 'Staten Island', 'New York'),
(4, 'Interni Lucidi', 'Decoration', '6000.00', '11111', '6461239876', 'internilucidi@gmail.com', 'www.internilucidi.com', 'New York City', 'New York'),
(5, 'Brush Brothers', 'Painting', '5000.00', '67891', '3471239876', 'brushbrothers@gmail.com', 'www.brushbrothers.com', 'Brooklyn', 'New York'),
(6, 'Amogus', 'Electrical', '4000.00', '50214', '2019873456', 'amogus@gmail.com', 'www.amogus.com', 'Staten Island', 'New York');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `zipcode` varchar(5) DEFAULT NULL,
  `budget` decimal(8,2) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `first_name`, `last_name`, `address`, `zipcode`, `budget`, `city`, `state`) VALUES
(1, 'user', '$2y$10$JJHhSNz9LFtjLWGvqQXVOuLt6tabaE..jYJR2thiFcdXjQxdIWnx.', 'user', 'name', 'somewhere', '11111', '123.00', 'somewhere', NULL),
(2, 'name', '$2y$10$h0r1fwv7NMD/c.6wW9yHguStNnoL4TDgn96NaHhuT9DhXRENAU9Ie', 'fdsfa', 'dsfda', 'sadfas', '11111', '111.00', 'fdsaf', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL,
  `customer_id_fk` int(11) DEFAULT NULL,
  `contractor_id_fk` int(11) DEFAULT NULL,
  `total_price` decimal(8,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `project_duration` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `customer_id_fk`, `contractor_id_fk`, `total_price`, `order_date`, `project_duration`) VALUES
(9, 1, 5, '8000.00', '2021-05-14', '3'),
(10, 1, 3, '10000.00', '2021-05-14', '3'),
(11, 2, 5, '9000.00', '2021-05-14', '4'),
(12, 2, 1, '11000.00', '2021-05-14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(20) DEFAULT NULL,
  `service_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `service_id_fk`) VALUES
(10, 'Office', 8),
(11, 'Basement', 8),
(12, 'Nursery', 8),
(13, 'Dining Room', 9),
(14, 'Kitchen', 9),
(15, 'Bathroom', 9),
(16, 'Living Room', 10),
(17, 'Bedroom', 10),
(18, 'Dining Room', 10),
(19, 'Kitchen', 10),
(20, 'Gym', 11);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(20) DEFAULT NULL,
  `order_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `order_id_fk`) VALUES
(8, 'Painting', 9),
(9, 'Flooring', 10),
(10, 'Painting', 11),
(11, 'Plumbing', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`contractor_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id_fk` (`customer_id_fk`),
  ADD KEY `contractor_id_fk` (`contractor_id_fk`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `service_id_fk` (`service_id_fk`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `order_id_fk` (`order_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contractor`
--
ALTER TABLE `contractor`
  MODIFY `contractor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_ibfk_1` FOREIGN KEY (`customer_id_fk`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `order_info_ibfk_2` FOREIGN KEY (`contractor_id_fk`) REFERENCES `contractor` (`contractor_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`service_id_fk`) REFERENCES `service` (`service_id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`order_id_fk`) REFERENCES `order_info` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
