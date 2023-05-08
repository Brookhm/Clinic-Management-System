-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2023 at 07:30 PM
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
-- Database: `dbucms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinic_card`
--

CREATE TABLE `clinic_card` (
  `nof` varchar(50) NOT NULL DEFAULT 'DBUCL',
  `mrn` int(50) NOT NULL,
  `dor` date NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `gname` text NOT NULL,
  `sex` text NOT NULL,
  `dob` date NOT NULL,
  `age` int(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `sblock` varchar(50) NOT NULL,
  `dorm` varchar(50) NOT NULL,
  `sub_city` varchar(50) NOT NULL,
  `ketena` varchar(50) NOT NULL,
  `kebele` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `dep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinic_card`
--

INSERT INTO `clinic_card` (`nof`, `mrn`, `dor`, `fname`, `lname`, `gname`, `sex`, `dob`, `age`, `region`, `sblock`, `dorm`, `sub_city`, `ketena`, `kebele`, `id`, `phone`, `dep`) VALUES
('vbcm', 15, '2023-04-10', 'gf', 'fdgf', 'Tyrone Cameron', 'Female', '2023-04-20', 24, 'Et harum consequatur', '5', '53', 'dfg', '2', '3', 3356, 947891220, 'Ullamco illum qui e'),
('dghs', 16, '2023-04-05', 'dbvc', 'dghs', 'dv', 'Male', '2023-04-19', 25, 'Et harum consequatur', '25', '123', 'dgb', '2', '3', 1019, 934567654, 'ehrkj'),
('dddd', 17, '2023-05-16', 'fgdvfg', 'gfxc', 'gfcvbv', 'Male', '2023-05-11', 45, 'fg', '45', '5', 'hgfuy', '5', '3', 3362, 965453212, 'fgtd');

-- --------------------------------------------------------

--
-- Table structure for table `lab_request`
--

CREATE TABLE `lab_request` (
  `request_id` int(50) NOT NULL,
  `mrn` int(11) NOT NULL,
  `tests_requested` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_request`
--

INSERT INTO `lab_request` (`request_id`, `mrn`, `tests_requested`) VALUES
(1, 567, 'ghj'),
(2, 567, 'dfghj'),
(3, 567, 'dfghj'),
(4, 567, 'dfghj'),
(5, 567, 'dfghj'),
(6, 567, 'drfygh');

-- --------------------------------------------------------

--
-- Table structure for table `lab_result`
--

CREATE TABLE `lab_result` (
  `request_id` int(50) NOT NULL,
  `test_id` int(50) NOT NULL,
  `result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_result`
--

INSERT INTO `lab_result` (`request_id`, `test_id`, `result`) VALUES
(1, 1, 'esd'),
(1, 2, 'cv'),
(1, 3, 'cv'),
(2, 4, 'RGFEG'),
(3, 5, 'thdgf'),
(3, 6, 'RGFEG'),
(4, 7, 'gh'),
(5, 8, 't');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `pre_no` int(50) NOT NULL,
  `medication` varchar(50) NOT NULL,
  `dosage` varchar(50) NOT NULL,
  `prescribed_by` varchar(50) NOT NULL,
  `patient_mrn` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`pre_no`, `medication`, `dosage`, `prescribed_by`, `patient_mrn`) VALUES
(9, 'gf', 'fgv', 'diagnosis', 45),
(10, 'fdgh', 'rdgfc', 'diagnosis', 67);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(5, 'admin', 'admin', 'admin'),
(6, 'pharmacy', 'pharmacy', 'pharmacy'),
(7, 'card', 'card', 'card'),
(8, 'diagnosis', 'diagnosis', 'diagnosis'),
(9, 'laboratory', 'laboratory', 'laboratory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinic_card`
--
ALTER TABLE `clinic_card`
  ADD PRIMARY KEY (`mrn`);

--
-- Indexes for table `lab_request`
--
ALTER TABLE `lab_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `lab_result`
--
ALTER TABLE `lab_result`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`pre_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinic_card`
--
ALTER TABLE `clinic_card`
  MODIFY `mrn` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lab_request`
--
ALTER TABLE `lab_request`
  MODIFY `request_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lab_result`
--
ALTER TABLE `lab_result`
  MODIFY `test_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `pre_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
