-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 02:21 PM
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
-- Database: `customer_new`
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
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Order_Date` date NOT NULL,
  `Order_Time` time NOT NULL,
  `Order_Quantity` int(11) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Product_Type` varchar(20) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lirio`
--

INSERT INTO `tbl_lirio` (`Customer_ID`, `Customer_Fname`, `Customer_Lname`, `Customer_Birthdate`, `Phone`, `Address`, `Order_Date`, `Order_Time`, `Order_Quantity`, `Product_Name`, `Product_Type`, `Price`) VALUES
(5, 'Gideon', 'calderon', '2023-03-22', '0939-145-1511', 'asfasf', '2023-03-30', '11:40:00', 11, 'Chick booster', 'Pellets', '47'),
(6, 'Gideon', 'something', '2023-03-22', '0969-134-6969', 'bcd', '2023-03-10', '09:40:00', 25, 'White rose', 'Rice', '47'),
(7, 'Gerard Fritz', 'Chuatico', '2002-01-14', '0961-905-5020', 'Purok Tapulanga, Marhil Subdivision, Barangay Poblacion, Bag', '2023-03-06', '10:42:00', 12, 'Chick booster', 'Pellets', '47'),
(8, 'John Goblin', 'gulmatico', '2023-03-17', '0914-010-2069', 'saohfjosafh, ajoisajfoija, aokfhoa oiahfsaf, oaijsfoiajsfo, ', '2023-03-17', '08:45:00', 10, 'Chick booster', 'Pellets', '47'),
(9, 'gerrarrddd', 'chu', '2023-03-30', '0961-690-6969', 'philippines usa canada japan korea china thailand mexico spa', '2023-03-24', '11:19:00', 9, 'Chick booster', 'Pellets', '47');

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
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;