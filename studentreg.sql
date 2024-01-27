-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 04:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile_photo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`email`, `password`, `first_name`, `last_name`, `profile_photo`) VALUES
('groot53@admin.in', '123', 'John', 'Groot', 0x313639303239303338325f33393134316330613738303966343032636236382e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`email`, `first_name`, `last_name`, `gender`, `address`, `password`, `profile_photo`) VALUES
('emma.davis@example.com', 'Emma', 'Davison', 'Female', '123 Maple St. Est.', '', 0x313639303232363436355f63616233373562383963336234363633336662372e6a7067),
('gaikwadaditya1121@gmail.com', 'Aditya', 'Gaikwad', 'Male', 'Pune', '12345', 0x313639303237343139385f39373365373761303437366433396464633663382e6a7067),
('isabella.thomas@example.com', 'Isabella', 'Thomas', 'Female', '888 Pine St', '', 0x313639303232353830365f33636436383961363865363662386533616533372e6a7067),
('liam.miller@example.com', 'Liam', 'Miller', 'Male', '555 Birch St', '', 0x313639303232363439325f65363538653336323235646638333534646238652e6a7067),
('mason.harris@example.com', 'Mason', 'Harris', 'Male', '999 Elm St', '', 0x313639303232363531325f66626439326162396565633664396530313432372e6a7067),
('noah.anderson@example.com', 'Noah', 'Anderson', 'Male', '777 Oak St', '', 0x313639303232343934375f63663732633232336164383937343036373263652e6a7067),
('oliver.williams@example.com', 'Oliver', 'Williams', 'Male', '333 Oak St', '', 0x313639303232343931385f31323630376262396462346364326536323565652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `course` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`email`, `first_name`, `last_name`, `gender`, `address`, `course`, `password`) VALUES
('john.doe@example.com', 'John', 'Doe', 'Male', '123 Main St', 'Math', ''),
('laura.anderson@example.com', 'Laura', 'Anderson', 'Female', '555 Oak St', 'Biology', ''),
('megan.harris@example.com', 'Megan', 'Harris', 'Female', '777 Elm St', 'Physics', ''),
('michael.johnson@example.com', 'Michael', 'Johnson', 'Male', '789 Oak St', 'History', ''),
('robert.brown@example.com', 'Robert', 'Brown', 'Male', '222 Pine St', 'Art', ''),
('sachin@gmail.com', 'sachin', 'kumar', 'Male', 'Delhi\r', 'DAA', ''),
('william.taylor@example.com', 'William', 'Taylor', 'Male', '444 Cedar St', 'Computer Science', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
