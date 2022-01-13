-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 05:43 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourist_room_booking_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `room_type` varchar(20) NOT NULL,
  `bed_type` varchar(20) NOT NULL,
  `num_rooms` varchar(20) NOT NULL,
  `meals` varchar(10) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `booking_date` date NOT NULL DEFAULT current_timestamp(),
  `bill_total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `email`, `phone`, `room_type`, `bed_type`, `num_rooms`, `meals`, `check_in`, `check_out`, `booking_date`, `bill_total`) VALUES
(7, 'abhi@gmail.com', '6361599901', 'Deluxe Room', 'Quad', '3', 'Room only', '2020-12-26', '2020-12-29', '2020-12-26', '10800');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(25) NOT NULL,
  `phno` varchar(12) NOT NULL,
  `create-date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `password`, `phno`, `create-date`) VALUES
(1, 'abhishek', 'test@mail.com', '2020-12-09', '123', '+91636159990', '2020-12-13'),
(2, 'abhishek', 'abhi@gmail.com', '2020-12-31', '123', '+91636159990', '2020-12-13'),
(3, 'jon', 'jon@mail.com', '2018-01-18', '123', '+91936156990', '2020-12-16'),
(4, 'ram', 'ram@mail.com', '2020-12-02', '123', '9456456121', '2020-12-16'),
(5, 'ben', 'ben@mail.com', '2020-12-15', '123', '+91789546451', '2020-12-16'),
(6, 'ron', 'ron@mail.com', '2000-12-16', '123', '+91987599901', '2020-12-16'),
(7, 'parkour', 'parkour@mail.com', '2014-01-16', '123', '+91634569901', '2020-12-16'),
(8, 'frank', 'frank@mail.com', '2014-02-16', '123', '8797864541', '2020-12-16'),
(9, 'nick', 'nick@mail.com', '2012-05-16', '123', '8945645612', '2020-12-16')

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
