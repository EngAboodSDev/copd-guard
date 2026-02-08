-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 08:09 PM
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
-- Database: `copd_guard`
--
CREATE DATABASE IF NOT EXISTS `copd_guard` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `copd_guard`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_ID`, `Name`, `Email`, `Password`) VALUES
(123456789, 'Admin123', 'admin123@admin.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `healthcare_provider`
--

CREATE TABLE `healthcare_provider` (
  `Healthcare_Provider_ID` int(11) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Job_name` varchar(100) NOT NULL,
  `Hospital` varchar(100) NOT NULL,
  `Status` enum('rejected','accepted','registered') NOT NULL DEFAULT 'registered',
  `Register_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `healthcare_provider`
--

INSERT INTO `healthcare_provider` (`Healthcare_Provider_ID`, `First_name`, `Last_name`, `Email`, `Password`, `Phone`, `Job_name`, `Hospital`, `Status`, `Register_date`) VALUES
(11223344, 'sami', 'ali', 'samiali@gmail.com', '123123', 54789652, 'doctor', 'Alahsa2', 'accepted', '2024-02-28 04:28:39'),
(98765454, 'iukmjynhbg', 'jyuhtrgvfejhg', 'jynuhtgrvfed', '33', 8765432, 'umjnyhtbgvf', 'jnyhbtgvrfced', 'registered', '2024-02-23 18:04:32'),
(234234234, 'hfdy', 'fwfwefw', 'lak5874@gmail.com', '123', 858, 'fedsfwefg53', 'ergtrgrg', 'accepted', '2024-02-23 04:00:00'),
(698756476, 'likumjnyhtbgvf', 'kyjtrejeur', 'u6i68edujhddthyrt@rr.com', 'eyryuyh7654', 76543354, 'utyjhdhyhkjfjhm', 'koijubyv', 'accepted', '2024-02-23 18:04:32'),
(876545343, 'ikyujyhtfdgfd', 'ioukymijnuthbg', 'rytrjydhtdh', '12345', 89765453, 'kjhgbgfd', 'jbhfgvf', 'rejected', '2024-02-23 17:26:30'),
(987656443, 'ujgyfhdjryjt', 'jdtukustktumtgjh', 'lotujsnybtvtomjnhbgvfd', 'ukyjitunhbyg87654', 978676, 'hlkmjnhbgf', 'likujbyhgvfd', 'rejected', '2024-02-23 17:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `Notification_ID` int(11) NOT NULL,
  `PatientAlarm` varchar(100) NOT NULL,
  `HProviderAlarm` varchar(100) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `HProvider_id` int(11) NOT NULL,
  `Status` enum('new','old') NOT NULL DEFAULT 'new',
  `EnterTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`Notification_ID`, `PatientAlarm`, `HProviderAlarm`, `Patient_id`, `HProvider_id`, `Status`, `EnterTime`) VALUES
(1, 'yjghfd', 'yujhtgfvd', 7868546, 11223344, 'old', '2024-02-27 22:08:53'),
(3, 'ujyhtgrfedsw', 'umkjynhtbgvrfcd', 7868546, 11223344, 'old', '2024-02-27 22:12:26'),
(4, 'Your health state is risk state', 'You have patient at risk state', 887675645, 234234234, 'old', '2024-02-26 00:04:40'),
(5, 'You have patient at risk state', 'You have patient at risk state', 1965561, 11223344, 'old', '2024-02-28 04:52:21'),
(6, 'You are in risk state', 'You have patient at danger state', 1965561, 11223344, 'old', '2024-02-27 04:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `National_ID` int(11) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Birth_date` date NOT NULL,
  `Disease_start_date` date NOT NULL,
  `Disease_stage` varchar(100) NOT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Assign_HProvider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`National_ID`, `First_name`, `Last_name`, `Email`, `Password`, `Phone`, `City`, `Birth_date`, `Disease_start_date`, `Disease_stage`, `Gender`, `Assign_HProvider_id`) VALUES
(1965561, 'sara', 'ali', 'saraali@gamil.com', 'sara11', 549935, 'Makkah', '1990-04-13', '2018-02-19', 'Stage 2', 'Male', 11223344),
(7868546, 'kmjnbh', 'kumyjnh', 'ukmyjht', 'iyujth', 6765, 'kjnhgf', '2000-09-22', '2024-02-14', 'u7jyg', 'ugf', 11223344),
(11758365, 'ahmed', 'saleh', 'ahmed@h.com', '1234', 54895656, 'jaddah', '1980-02-08', '2013-12-25', 'Stage 1', 'Female', 11223344),
(887675645, 'yujt', 'tjdty', 'jtddddd', 'tttety', 4785, 'ty', '2015-02-12', '2024-02-21', 'j2', 'female', 234234234);

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_records`
--

CREATE TABLE `patient_health_records` (
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `CAT_questionnaire` int(11) NOT NULL,
  `Peak_flow` int(11) NOT NULL,
  `Heart_rate` int(11) NOT NULL,
  `Oxygen_sat` double NOT NULL,
  `Score` int(11) NOT NULL,
  `Health_status` enum('Good Health','At Risk','Danger') NOT NULL,
  `Patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient_health_records`
--

INSERT INTO `patient_health_records` (`Date`, `CAT_questionnaire`, `Peak_flow`, `Heart_rate`, `Oxygen_sat`, `Score`, `Health_status`, `Patient_id`) VALUES
('2024-01-14', 10, 654, 80, 97.56, 186, 'Danger', 1965561),
('2024-01-15', 32, 100, 77, 86, 545, 'At Risk', 1965561),
('2024-01-18', 34, 292, 89, 89.3, 400, 'Good Health', 1965561),
('2024-01-26', 20, 292, 95, 86.3, 200, 'At Risk', 1965561),
('2024-01-27', 32, 200, 79, 97.56, 200, 'At Risk', 7868546),
('2024-01-29', 39, 150, 84, 83.9, 110, 'Danger', 1965561),
('2024-02-02', 34, 292, 95, 86.3, 400, 'Danger', 1965561),
('2024-02-03', 33, 100, 63, 73.12, 212, 'Good Health', 1965561),
('2024-02-05', 28, 189, 76, 93.3, 896, 'Good Health', 1965561),
('2024-02-15', 34, 260, 97, 89.3, 100, 'At Risk', 1965561),
('2024-02-20', 10, 100, 63, 86, 186, 'Good Health', 1965561),
('2024-02-21', 20, 260, 89, 77.6, 200, 'At Risk', 1965561),
('2024-02-22', 25, 171, 80, 73.12, 545, 'At Risk', 1965561),
('2024-02-23', 33, 210, 20, 74.8, 212, 'At Risk', 7868546),
('2024-02-24', 45, 120, 54, 91.77, 255, 'Good Health', 7868546),
('2024-02-28', 63, 340, 77, 97.3, 5948, 'Danger', 1965561);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `Prescription_ID` int(11) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `Generic_Drug_name` varchar(100) NOT NULL,
  `Trade_Drug_name` varchar(100) NOT NULL,
  `Prescribed_Quantity` int(11) NOT NULL,
  `Prescribed_Dosage_unit` varchar(100) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Refills` int(11) NOT NULL,
  `Frequency_value` varchar(100) NOT NULL,
  `Unit_per_Frequency` varchar(100) NOT NULL,
  `Dispense_date` date NOT NULL,
  `Dispensed_Quantity_by_pack` varchar(100) NOT NULL,
  `Instructions` text NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `HProvider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`Prescription_ID`, `DateTime`, `Generic_Drug_name`, `Trade_Drug_name`, `Prescribed_Quantity`, `Prescribed_Dosage_unit`, `Duration`, `Refills`, `Frequency_value`, `Unit_per_Frequency`, `Dispense_date`, `Dispensed_Quantity_by_pack`, `Instructions`, `Patient_id`, `HProvider_id`) VALUES
(1, '2024-02-24 18:12:14', 'tttttt', 'gtrgr', 4, 'gtr', 4, 54, 'hgnn', 'gn', '2024-09-24', 'yrry', 'grtgrtrggrgrtgrgrtggtrgtrgrtgr', 7868546, 11223344),
(2, '2024-02-28 04:48:03', 'iuy', 'jhg', 55, 'nb', 5, 88, 'hg', 'gn', '2024-03-08', 'yrry', ';lkjhgfkoooooooooo', 1965561, 11223344);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `healthcare_provider`
--
ALTER TABLE `healthcare_provider`
  ADD PRIMARY KEY (`Healthcare_Provider_ID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`Notification_ID`),
  ADD KEY `HProvider_id` (`HProvider_id`),
  ADD KEY `Peatient_id` (`Patient_id`) USING BTREE;

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`National_ID`),
  ADD KEY `Assign_HProvider_id` (`Assign_HProvider_id`);

--
-- Indexes for table `patient_health_records`
--
ALTER TABLE `patient_health_records`
  ADD PRIMARY KEY (`Date`,`Patient_id`) USING BTREE,
  ADD KEY `Patient_id` (`Patient_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`Prescription_ID`),
  ADD KEY `Patient_id` (`Patient_id`),
  ADD KEY `HProvider_id` (`HProvider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `Notification_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `Prescription_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`HProvider_id`) REFERENCES `healthcare_provider` (`Healthcare_Provider_ID`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`Patient_id`) REFERENCES `patient` (`National_ID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Assign_HProvider_id`) REFERENCES `healthcare_provider` (`Healthcare_Provider_ID`);

--
-- Constraints for table `patient_health_records`
--
ALTER TABLE `patient_health_records`
  ADD CONSTRAINT `patient_health_records_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `patient` (`National_ID`);

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`HProvider_id`) REFERENCES `healthcare_provider` (`Healthcare_Provider_ID`),
  ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`Patient_id`) REFERENCES `patient` (`National_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
