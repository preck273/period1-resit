-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 07:13 PM
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
  `student_Code` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Raymond', 'Scott', 123456789, 'raymond@gmail.com', 'Admin', '$2y$10$88o5v1NU20ANw7t7IaCoS.ZcC9LVVp3K2cPantJ6upqRSv5iosaEy');

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
  MODIFY `course_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_Code` int(11) NOT NULL AUTO_INCREMENT;

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
