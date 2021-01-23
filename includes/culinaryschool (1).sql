-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 09:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `culinaryschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `course_code` int(11) NOT NULL,
  `student_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`course_code`, `student_Code`) VALUES
(100, 1),
(101, 1),
(200, 2),
(223, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `style` varchar(30) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_name`, `style`, `price`, `start_date`, `end_date`) VALUES
(100, 'Vivamus A Tellus', 'Italian', 134, '2021-01-21', '2021-01-21'),
(101, 'Voluptate Velit', 'Italian', 290, '2021-01-21', '2021-01-21'),
(105, 'Ut Enim Ad Minim Veniam', 'Italian', 400, '2021-01-21', '2021-01-21'),
(200, 'Sodales Ut Etiam', 'Asian', 134, '2021-01-23', '2021-01-23'),
(223, 'Mattis Molestie', 'Asian', 290, '2021-01-23', '2021-01-23'),
(225, 'Consectetur Adipiscing', 'Asian', 345, '2021-01-23', '2021-01-23'),
(301, 'Mauris Commodo', 'Eastern European', 290, '2021-01-23', '2021-01-23'),
(302, 'Ultrices Sagittis Orci', 'Eastern European', 134, '2021-01-23', '2021-01-23'),
(303, 'Voluptate Velit Esse', 'Eastern European', 134, '2021-01-23', '2021-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_Code` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `home_address` varchar(30) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `Town` varchar(30) NOT NULL,
  `telephone_number` int(11) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `users_name` varchar(30) NOT NULL,
  `student_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_Code`, `first_name`, `last_name`, `home_address`, `postal_code`, `Town`, `telephone_number`, `email_address`, `Date_of_birth`, `users_name`, `student_password`) VALUES
(1, 'James', 'Scott', 'stationstrat 90', '7811 GS', 'Emmen', 685135674, 'jamesscott16430@gmail.com', '2021-01-21', 'james123', '$2y$10$eOw0zL.iDYStdpSZ.IMUGuMNvvqEC42z8uXFoTrga7x4GrLV.sBIS'),
(2, 'Kelvin', 'Scott', 'stationstrat 73', '7811 GS', 'Zwolle', 685135674, 'jamesscott16430@gmail.com', '2021-01-23', 'Kelvin125', '$2y$10$ihswVJ0BJm2PngWLDI1yReX89HB38elAe./YanY.RswAuZmYse832');

-- --------------------------------------------------------

--
-- Table structure for table `theadmin`
--

CREATE TABLE `theadmin` (
  `admin_code` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `telephone_number` int(11) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `users_name` varchar(30) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theadmin`
--

INSERT INTO `theadmin` (`admin_code`, `first_name`, `last_name`, `telephone_number`, `email_address`, `users_name`, `admin_password`) VALUES
(1, 'James', 'Scott', 685135674, 'jamesscott16430@gmail.com', 'Admin', '$2y$10$Ds/vu8s.8Nij1.6MfGXtb.FpZ3rvDhlf7XNGTPNlsI0aFtQuyvPhq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD KEY `connection_course_fk` (`course_code`),
  ADD KEY `connection_student_fk` (`student_Code`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_Code`);

--
-- Indexes for table `theadmin`
--
ALTER TABLE `theadmin`
  ADD PRIMARY KEY (`admin_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `theadmin`
--
ALTER TABLE `theadmin`
  MODIFY `admin_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `connection_course_fk` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `connection_student_fk` FOREIGN KEY (`student_Code`) REFERENCES `student` (`student_Code`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
