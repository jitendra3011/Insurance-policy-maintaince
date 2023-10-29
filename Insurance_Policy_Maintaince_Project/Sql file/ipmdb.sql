-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 11:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `CategoryName` varchar(45) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `CategoryName`, `CreationDate`) VALUES
(1, 'Health Insurance', '2023-02-09 18:30:00'),
(3, 'Life insurance', '2023-02-11 09:00:19'),
(4, 'Vehicle Insurance', '2023-02-14 07:03:05'),
(5, 'Crop Insurance', '2023-02-14 07:50:55'),
(6, 'Marine Insurance', '2023-02-14 10:43:46'),
(7, 'Test Demo', '2023-02-21 17:00:32'),
(8, 'Demo Cat', '2023-02-21 17:07:16'),
(9, 'test category', '2023-02-21 17:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_data`
--

CREATE TABLE `contact_data` (
  `c_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_data`
--

INSERT INTO `contact_data` (`c_id`, `name`, `email`, `subject`, `message`, `cdate`) VALUES
(1, 'dhiraj', 'dhirajphatake185@gmail.com', 'sub', 'msg', '2023-04-30'),
(4, 'Akash', 'akash@gmail.com', 'Demo Subject', 'Message here....', '2023-04-30'),
(6, 'Pawan ', 'pavan@gmail.com', 'sub', 'no query', '2023-04-30'),
(7, 'Gaurav', 'gaurav@gmail.com', 'gaurav sub', 'gaurav message', '2023-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `tblimsadmin`
--

CREATE TABLE `tblimsadmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminUsername` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblimsadmin`
--

INSERT INTO `tblimsadmin` (`ID`, `AdminName`, `AdminUsername`, `Password`, `AdminRegdate`) VALUES
(1, 'Dhiraj', 'Admin', 'Test@123', '2023-02-10 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolicy`
--

CREATE TABLE `tblpolicy` (
  `ID` int(11) NOT NULL,
  `SubcategoryId` varchar(50) NOT NULL,
  `CategoryId` varchar(25) DEFAULT NULL,
  `PolicyName` varchar(45) DEFAULT NULL,
  `Sumassured` int(11) DEFAULT NULL,
  `Premium` varchar(45) DEFAULT NULL,
  `Tenure` int(10) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpolicy`
--

INSERT INTO `tblpolicy` (`ID`, `SubcategoryId`, `CategoryId`, `PolicyName`, `Sumassured`, `Premium`, `Tenure`, `CreationDate`) VALUES
(8, '5', '1', 'Jeevan1.1 (AGE 18-45)', 500000, '500', 12, '2023-04-26 20:35:57'),
(9, '20', '3', 'Jeevan Dhara (AGE 18-60)', 800000, '500 p/m', 10, '2023-04-26 20:37:20'),
(10, '12', '4', 'Accidental Policy (AGE 18-17)', 200000, '100 p/m', 12, '2023-04-26 20:38:12'),
(11, '29', '6', 'Freight Damage', 700000, '800 p/m', 8, '2023-02-18 13:10:26'),
(12, '7', '1', 'test policy (AGE 18-40)', 500000, '4250', 15, '2023-04-26 20:40:48'),
(13, '17', '5', 'demo policy (AGE 18-50)', 1000000, '54244', 15, '2023-04-26 20:41:19'),
(14, '', NULL, NULL, NULL, NULL, NULL, '2023-04-27 06:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolicyholder`
--

CREATE TABLE `tblpolicyholder` (
  `ID` int(11) NOT NULL,
  `UserId` char(20) DEFAULT NULL,
  `PolicyId` char(20) DEFAULT NULL,
  `PolicyNumber` char(9) DEFAULT NULL,
  `PolicyApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `PolicyStatus` int(1) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpolicyholder`
--

INSERT INTO `tblpolicyholder` (`ID`, `UserId`, `PolicyId`, `PolicyNumber`, `PolicyApplyDate`, `PolicyStatus`, `UpdationDate`) VALUES
(2, '2', '8', '618412450', '2023-02-17 18:34:03', 2, '2023-04-26 20:56:22'),
(3, '2', '9', '772157660', '2023-02-18 16:33:44', 1, '2023-04-26 20:57:04'),
(5, '14', '13', '984815191', '2023-02-21 17:23:54', 1, '2023-04-26 20:56:58'),
(6, '16', '8', '280362164', '2023-04-04 05:53:42', 1, '2023-04-04 06:25:50'),
(7, '16', '9', '735112481', '2023-04-26 20:42:15', 0, '0000-00-00 00:00:00'),
(8, '16', '12', '902236784', '2023-04-27 07:06:43', 1, '2023-04-27 07:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `id` int(11) NOT NULL,
  `CategoryId` char(5) NOT NULL,
  `SubcategoryName` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`id`, `CategoryId`, `SubcategoryName`, `CreationDate`, `UpdationDate`) VALUES
(5, '1', 'Health Maintenance Organization (HMO) plans', '2023-02-14 06:58:18', '2023-04-26 19:53:10'),
(6, '1', 'Preferred Provider Organization (PPO) plans', '2023-02-14 06:58:52', '2023-04-26 19:53:15'),
(7, '1', 'Exclusive Provider Organization (EPO) plans', '2023-02-14 07:00:30', '2023-04-26 19:53:20'),
(8, '1', 'Point of Service (POS) plans', '2023-02-14 07:00:50', '2023-04-26 19:53:25'),
(9, '1', 'High Deductible Health Plan (HDHP) plans', '2023-02-14 07:02:11', '2023-04-26 19:53:33'),
(10, '4', 'Liability Coverage', '2023-02-14 07:11:06', '2023-04-26 19:53:37'),
(11, '4', 'Collision Coverage', '2023-02-14 07:11:30', '2023-04-26 19:53:42'),
(12, '4', 'Personal Injury Coverage', '2023-02-14 07:11:58', '2023-04-26 19:53:47'),
(13, '4', 'Uninsured Motorist Protection', '2023-02-14 07:12:19', '2023-04-26 19:53:52'),
(15, '5', 'Multiple Peril Crop Insurance', '2023-02-14 08:03:17', '2023-04-26 19:55:08'),
(16, '5', 'Actual Production History', '2023-02-14 08:04:10', '2023-04-26 19:55:03'),
(17, '5', 'Group Risk Plan', '2023-02-14 08:05:03', '2023-04-26 19:54:59'),
(18, '5', 'Crop Revenue Coverage', '2023-02-14 08:05:45', '2023-04-26 19:54:53'),
(19, '5', 'Actual Production History', '2023-02-14 10:35:25', '2023-04-26 19:54:49'),
(20, '3', 'Term Plan', '2023-02-14 10:37:03', '2023-04-26 19:54:45'),
(21, '3', 'Unit linked insurance plan(ULIP)', '2023-02-14 10:37:25', '2023-04-26 19:54:39'),
(22, '3', 'Endowment Plan', '2023-02-14 10:37:46', '2023-04-26 19:54:33'),
(23, '3', 'Money Back', '2023-02-14 10:38:13', '2023-04-26 19:54:29'),
(24, '3', 'Whole Life Insurance', '2023-02-14 10:38:29', '2023-04-26 19:54:21'),
(25, '6', 'Hull Insurance', '2023-02-14 10:44:21', '2023-04-26 19:54:17'),
(26, '6', 'Machinery Insurance', '2023-02-14 10:44:37', '2023-04-26 19:54:11'),
(27, '6', 'Protection & Indemnity (P&I) Insurance', '2023-02-14 10:44:54', '2023-04-26 19:54:06'),
(28, '6', 'Liability Insurance', '2023-02-14 10:45:17', '2023-04-26 19:54:01'),
(29, '6', 'Freight, Demurrage and Defense (FD&D) Insurance', '2023-02-14 10:45:33', '2023-04-26 19:53:57'),
(30, '6', 'Freight Insurance', '2023-02-14 10:45:49', '2023-04-26 20:32:58'),
(31, '6', 'Marine Cargo Insurance', '2019-02-14 10:46:00', NULL),
(32, '3', 'Test Subcat', '2019-02-21 17:01:07', '2019-02-21 17:04:19'),
(33, '5', 'Demo subcat test', '2019-02-21 17:07:54', '2019-02-21 17:08:09'),
(34, '9', 'test scatgry', '2019-02-21 17:20:48', '2019-02-21 17:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblticket`
--

CREATE TABLE `tblticket` (
  `ID` int(11) NOT NULL,
  `UserId` varchar(25) DEFAULT NULL,
  `Subject` varchar(45) DEFAULT NULL,
  `NatureofIssue` varchar(120) DEFAULT NULL,
  `Description` varchar(120) DEFAULT NULL,
  `AdminRemark` varchar(120) DEFAULT NULL,
  `TicketGenerationDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemarkdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblticket`
--

INSERT INTO `tblticket` (`ID`, `UserId`, `Subject`, `NatureofIssue`, `Description`, `AdminRemark`, `TicketGenerationDate`, `AdminRemarkdate`) VALUES
(3, '7', 'Claim Issue', 'claim  issue', 'Please go through my policy and tell me my claim amount.', 'Issue has been resolve soon.', '2023-02-16 15:39:58', '2023-04-26 19:55:40'),
(4, '5', 'Payment Issue', 'payment issue', 'Kindly tell me about my policy issue', NULL, '2023-02-16 15:42:38', '2023-04-26 19:55:46'),
(5, '2', 'Reactivate my policy', 'Other', 'Kindly reactivate my policy and tell me what are the procedure for this.', NULL, '2023-02-16 15:44:05', '2023-04-26 19:55:51'),
(6, '5', 'Claim Issue', 'claim  issue', 'bgjhgjkj', NULL, '2023-02-16 16:12:55', '2023-04-26 19:55:54'),
(7, '14', 'premium issue', 'Other', 'This is sample text for testing.', 'Your issue solved', '2023-02-21 17:29:52', '2023-04-26 19:55:58'),
(8, '16', 'Insurance policy ', 'profile wrong updation', 'I want to update my profile', NULL, '2023-04-04 06:30:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `ContactNo` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `ContactNo`, `Email`, `Gender`, `Password`, `CreationDate`) VALUES
(16, 'Dhiraj Phatake', 9370058101, 'dhirajphatake185@gmail.com', 'Male', 'pass@123', '2023-04-04 05:37:45'),
(17, 'Maddhusudan Ghule', 9876543210, 'madhusudan@gmail.com', 'Male', 'pass@123', '2023-04-30 18:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_docs`
--

CREATE TABLE `user_docs` (
  `u_id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `umobile` text NOT NULL,
  `uadhar` text NOT NULL,
  `upan` text NOT NULL,
  `uadddress` text NOT NULL,
  `udate` date NOT NULL,
  `umedical` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_docs`
--

INSERT INTO `user_docs` (`u_id`, `uname`, `umobile`, `uadhar`, `upan`, `uadddress`, `udate`, `umedical`) VALUES
(20, 'Phatake e', '8787878712', '676767673', '54545454', '343434d', '2013-04-30', '8141userData.jpg'),
(21, 'dada ﻿namaste ', '221212', '4242', '6464', '8684', '2023-04-30', '7349userData.jpg'),
(22, 'gfb', '4674', 'fggh', 'trtr', 'ewew', '2023-04-30', '9106userData.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact_data`
--
ALTER TABLE `contact_data`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tblimsadmin`
--
ALTER TABLE `tblimsadmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolicy`
--
ALTER TABLE `tblpolicy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolicyholder`
--
ALTER TABLE `tblpolicyholder`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblticket`
--
ALTER TABLE `tblticket`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_docs`
--
ALTER TABLE `user_docs`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_data`
--
ALTER TABLE `contact_data`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblimsadmin`
--
ALTER TABLE `tblimsadmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpolicy`
--
ALTER TABLE `tblpolicy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblpolicyholder`
--
ALTER TABLE `tblpolicyholder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblticket`
--
ALTER TABLE `tblticket`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_docs`
--
ALTER TABLE `user_docs`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
