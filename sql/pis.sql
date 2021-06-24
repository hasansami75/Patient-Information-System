-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2018 at 10:17 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
  `id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `assistant_image` varchar(255) NOT NULL,
  `facebook_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assistant`
--

INSERT INTO `assistant` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `assistant_image`, `facebook_id`) VALUES
(1, 'nahid', 'naim', 'nahid@gmail.com', '12345', '01680228823', 'IMG_20161222_165005.jpg', 'nahid naim');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `doctor_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `password`, `phone`, `facebook_id`, `doctor_image`) VALUES
(1, 'Dr. Prof. Mehedee Alam', 'mehedee@gmail.com', '12345', '01738332178', 'mehedee alam', 'IMG_20161222_014210.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `visit_no` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `symptom` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `visit_no`, `patient_id`, `symptom`, `date`) VALUES
(5, 1, 1, 'headache, backpain', '2018-01-25 12:13:17'),
(7, 1, 4, 'mentally imbalance', '2018-01-25 12:14:20'),
(8, 1, 5, 'cold, fever, headache', '2018-01-25 12:33:23'),
(9, 1, 3, 'broken leg, cuff injury.', '2018-01-25 13:13:47'),
(11, 2, 3, 'broken hand', '2018-01-28 00:55:55'),
(12, 2, 4, 'fever for 5 days', '2018-01-28 02:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `patient_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `age`, `gender`, `email`, `password`, `phone`, `patient_image`) VALUES
(1, 'abir', 'reza', 35, 'male', 'abir@gmail.com', '12345', '01681112231', 'IMG_20140309_172424.jpg'),
(3, 'finn', 'balor', 24, 'male', 'finn@gmail.com', '12345', '01680228824', 'finn.jpg'),
(4, 'jahir', 'hasan', 29, 'male', 'jahir@gmail.com', '12345', '01850557150', 'me_haircut.jpg'),
(5, 'arif', 'reza', 30, 'male', 'arif@gmail.com', '12345', '01791728336', 'IMG_20140310_081207.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `days` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `generic_name`, `instruction`, `days`, `patient_id`, `visit_no`) VALUES
(1, 'paracetamol 500mg', '1+0+1', 5, 1, 1),
(3, 'deslor 10mg', '1+0+1', 4, 5, 1),
(5, 'esomeprazol 20mg', '1+0+1', 7, 1, 1),
(6, 'terbinafine hcl 500mg', '0+1+1', 10, 3, 1),
(7, 'levocetrazine', '1+0+0', 11, 3, 1),
(8, 'paracetamol 500mg', '1+1+1', 28, 4, 1),
(9, 'ciprocine 500', '0+0+1', 4, 5, 1),
(11, 'paracetamol 500mg', '1+0+1', 25, 3, 1),
(14, 'levocetrazine', '1+0+0', 5, 1, 1),
(15, 'paracetamol 500mg', '1+0+1', 10, 4, 1),
(16, 'lepomaride hcl', '1+1+1', 4, 3, 2),
(17, 'paracetamol 500mg', '1+1+1', 5, 4, 2),
(18, 'alatrol 200mg', '1+0+!', 3, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `serial_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serial`
--
ALTER TABLE `serial`
  ADD PRIMARY KEY (`serial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistant`
--
ALTER TABLE `assistant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `serial`
--
ALTER TABLE `serial`
  MODIFY `serial_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
