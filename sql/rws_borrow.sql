-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 11, 2023 at 06:57 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rws_borrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow_computer`
--

CREATE TABLE `borrow_computer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `level` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `com_room` varchar(10) NOT NULL,
  `name_borrow` varchar(100) NOT NULL,
  `count_borrow` int(10) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `ckeck_accept` varchar(10) NOT NULL,
  `status` int(10) NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow_computer`
--

INSERT INTO `borrow_computer` (`id`, `name`, `student_id`, `level`, `room`, `telephone`, `com_room`, `name_borrow`, `count_borrow`, `start_time`, `end_time`, `ckeck_accept`, `status`, `time_create`) VALUES
(34, 'ทดสอบ ระบบ', '2222222222', 'ชั้นมัธยมศึกษาปีที่ 4', '4/12', '061-634-1757', 'com1', 'คอมพิวเตอร์', 1, '2023-02-11', '2023-02-12', '1', 2, '2023-02-11 06:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `computer_info`
--

CREATE TABLE `computer_info` (
  `name` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `count_com` int(100) DEFAULT NULL,
  `admin_by` varchar(100) DEFAULT NULL,
  `key_room` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `computer_info`
--

INSERT INTO `computer_info` (`name`, `status`, `count_com`, `admin_by`, `key_room`) VALUES
('ห้องคอมพิวเตอร์ที่ 1 ', 1, 40, '', 0),
('ห้องคอมพิวเตอร์ที่ 2', 1, 40, '', 0),
('ห้องคอมพิวเตอร์ที่ 3', 1, 40, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `student_id` varchar(100) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `room` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `student_id`, `password`, `firstname`, `lastname`, `level`, `room`, `telephone`) VALUES
(12, 'Student', '2222222222', 'b1017ab1177d72528be39841a24e2f9f459b2b36', 'ทดสอบ', 'ระบบ', 'ชั้นมัธยมศึกษาปีที่ 4', '4/12', '061-634-1757');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow_computer`
--
ALTER TABLE `borrow_computer`
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
-- AUTO_INCREMENT for table `borrow_computer`
--
ALTER TABLE `borrow_computer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
