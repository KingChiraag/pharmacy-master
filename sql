-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 06:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `invoice_no` int(5) NOT NULL,
  `medicine_id` int(5) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`invoice_no`, `medicine_id`, `quantity`) VALUES
(3, 3, 2),
(3, 4, 2),
(4, 3, 2),
(4, 4, 3),
(5, 3, 1),
(5, 4, 2),
(6, 5, 3),
(6, 6, 3),
(8, 5, 2),
(9, 5, 1),
(10, 3, 10),
(10, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `c_id` int(5) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `branch` varchar(25) NOT NULL,
  `sales_ex` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `s_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `company_name`, `branch`, `sales_ex`, `email`, `phone`, `s_id`) VALUES
(1, 'cipla', 'Vijaynagar', 'Abhishta V', 'abc@gmail.com', 9380362701, 2),
(2, 'Himalayas', 'Basvangudi', 'Pavan', 'pavan11@gmail.com', 9456783902, 3),
(3, 'Bicon', 'Jaynagar', 'Anagha', 'abc@gmail.com', 9380362702, 4),
(4, 'Lupine', 'Vijaynagar', 'Gagan', 'gagan123@gmail.com', 9845830416, 4),
(5, 'Dr Reddy\'s lab', 'Devanhalli', 'Harish', 'abcd@gmail.com', 7892267567, 4),
(6, 'Biomed', 'Vijaynagar', 'Chiraag', 'chiraags@gmailcom', 9876567576, 1),
(7, 'MediCare', 'Vijaynagar', 'Pavan', 'abcd@gmail.com', 9380362701, 8);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_name` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_name`, `phone`, `email`) VALUES
('Anagha V', 8880802922, 'ama@gmail.com'),
('Abhishta V', 9380362701, '0'),
('Amodha', 9845830415, 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `finalbill`
--

CREATE TABLE `finalbill` (
  `invoice_no` int(5) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `s_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finalbill`
--

INSERT INTO `finalbill` (`invoice_no`, `total_amount`, `s_id`) VALUES
(3, 60, 2),
(4, 360, 2),
(5, 230, 2),
(6, 825, 4),
(8, 500, 1),
(9, 250, 1),
(10, 800, 8);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(5) NOT NULL,
  `invoice_date` date NOT NULL,
  `phone_number` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `invoice_date`, `phone_number`) VALUES
(1, '2024-03-04', 9380362701),
(2, '2024-03-05', 6362968644),
(3, '2024-03-04', 9845123879),
(4, '2024-03-04', 8880802922),
(5, '2024-03-05', 8880802922),
(6, '2024-03-05', 9845393019),
(7, '2024-03-05', 9845393019),
(8, '2024-03-05', 9876541234),
(9, '2024-03-05', 9871234567),
(10, '2024-03-05', 9845830415);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(5) NOT NULL,
  `medicine_name` varchar(25) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `company_id` int(5) NOT NULL,
  `mfg_date` date NOT NULL,
  `expiry` date NOT NULL,
  `mrp` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `category_name`, `company_id`, `mfg_date`, `expiry`, `mrp`, `quantity`) VALUES
(3, 'Paracetamol', 'Tablets', 1, '2024-03-01', '2024-07-08', 30, 39),
(4, 'Himalaya Cough Syrup ', 'Syrup', 2, '2024-02-07', '2024-03-21', 100, 48),
(5, 'Moov', 'Spray', 3, '2024-02-15', '2026-02-15', 250, 2),
(6, 'Flagyl', 'Tablets', 4, '2024-02-28', '2025-02-05', 25, 7),
(7, 'Himalaya Handwash', 'Handwash', 2, '2024-02-21', '2024-07-21', 80, 10);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `name`, `phone`, `dob`, `email`, `password`) VALUES
(1, 'Abhishta V', 9380362701, '2024-03-04', 'abc@gmail.com', '1234'),
(2, 'abcs', 9380362701, '2024-03-04', 'abc@gmail.com', '12345'),
(3, 'Anagha', 6362968634, '2001-01-19', 'anaghav@gmail.com', '1912'),
(4, 'Vishwanath', 9845393018, '1990-01-19', 'vishwa05@gmail.com', '4321'),
(5, 'Pavan B', 9380362703, '1999-01-22', 'pavanb@gmail.com', '4567'),
(6, 'Gagan', 9876567576, '1998-02-03', 'abv@gmail.com', '3456'),
(7, 'Pavan', 9876567576, '2024-03-06', 'abv@gmail.com', '1234'),
(8, 'Amoda', 9856789565, '2024-02-06', 'amodha@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`invoice_no`,`medicine_id`),
  ADD KEY `medicine_id` (`medicine_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`phone`);

--
-- Indexes for table `finalbill`
--
ALTER TABLE `finalbill`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`,`medicine_name`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `staff` (`s_id`) ON DELETE CASCADE;

--
-- Constraints for table `finalbill`
--
ALTER TABLE `finalbill`
  ADD CONSTRAINT `finalbill_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `staff` (`s_id`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
