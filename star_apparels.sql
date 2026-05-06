-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 03:48 PM
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
-- Database: `star_apparels`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchName` varchar(255) NOT NULL,
  `BranchID` int(11) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchName`, `BranchID`, `PhoneNumber`) VALUES
('Colombo', 1, '0778787879'),
('Mathara', 3, '0787878789'),
('Nugegoda', 2, '0322222221');

-- --------------------------------------------------------

--
-- Table structure for table `dependent`
--

CREATE TABLE `dependent` (
  `DependentID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `Coverage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dependent`
--

INSERT INTO `dependent` (`DependentID`, `Name`, `DateOfBirth`, `Relationship`, `EmployeeID`, `Coverage`) VALUES
(0, 'Nike', '2023-09-14', 'Son', 1, 50000),
(1, 'Kathy', '2023-09-08', 'Wife', 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Residence` varchar(255) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `BranchID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Name`, `Residence`, `Salary`, `DateOfBirth`, `BranchID`) VALUES
(1, 'Jhons', 'Jaffna', 32000.00, '2023-02-15', 1),
(2, 'Sumanaweera', 'Galle', 22000.00, '2015-01-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_order`
--

CREATE TABLE `employee_order` (
  `EmployeeID` int(11) DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `HoursSpent` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_order`
--

INSERT INTO `employee_order` (`EmployeeID`, `OrderID`, `HoursSpent`) VALUES
(1, 1, 2.00),
(1, 1, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `employee_project`
--

CREATE TABLE `employee_project` (
  `EmployeeID` int(11) DEFAULT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `HoursSpent` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_project`
--

INSERT INTO `employee_project` (`EmployeeID`, `ProjectID`, `HoursSpent`) VALUES
(1, 1, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `hasdependent`
--

CREATE TABLE `hasdependent` (
  `EmployeeID` int(11) NOT NULL,
  `DependentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `BranchName` varchar(255) NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `OrderID` int(11) NOT NULL,
  `ClientName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`OrderID`, `ClientName`) VALUES
(1, 'SDE'),
(2, 'GER'),
(3, 'VE1');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `ProjectName`) VALUES
(1, 'ES2'),
(2, 'EC2'),
(3, 'RR1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchName`);

--
-- Indexes for table `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`DependentID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `hasdependent`
--
ALTER TABLE `hasdependent`
  ADD PRIMARY KEY (`EmployeeID`,`DependentID`),
  ADD KEY `DependentID` (`DependentID`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD PRIMARY KEY (`BranchName`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasdependent`
--
ALTER TABLE `hasdependent`
  ADD CONSTRAINT `hasdependent_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `hasdependent_ibfk_2` FOREIGN KEY (`DependentID`) REFERENCES `dependent` (`DependentID`);

--
-- Constraints for table `manages`
--
ALTER TABLE `manages`
  ADD CONSTRAINT `manages_ibfk_1` FOREIGN KEY (`BranchName`) REFERENCES `branch` (`BranchName`),
  ADD CONSTRAINT `manages_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
