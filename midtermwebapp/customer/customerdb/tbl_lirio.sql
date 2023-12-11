-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 08:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liriomarketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lirio`
--

CREATE TABLE `tbl_lirio` (
  `Customer_ID` int(11) NOT NULL,
  `Customer_Fname` varchar(30) NOT NULL,
  `Customer_Lname` varchar(30) NOT NULL,
  `Customer_Birthdate` date NOT NULL,
  `Phone` int(11) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Order_Date` date NOT NULL,
  `Order_Time` time NOT NULL,
  `Order_Quantity` int(11) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Product_Type` varchar(20) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_lirio`
--
ALTER TABLE `tbl_lirio`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lirio`
--
ALTER TABLE `tbl_lirio`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;