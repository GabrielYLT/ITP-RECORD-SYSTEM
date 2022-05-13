-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 06:29 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(255) NOT NULL,
  `AName` varchar(30) NOT NULL,
  `AFirst` varchar(50) NOT NULL,
  `ALast` varchar(50) NOT NULL,
  `AEmail` varchar(255) NOT NULL,
  `APassword` varchar(255) NOT NULL,
  `AStatus` varchar(255) NOT NULL DEFAULT 'Active',
  `ADate` date NOT NULL DEFAULT current_timestamp(),
  `Department` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `AName`, `AFirst`, `ALast`, `AEmail`, `APassword`, `AStatus`, `ADate`, `Department`) VALUES
(1, 'Matrix', 'Matt', 'Tan', 'Matrix@gmail.com', 'Qwer@1234', 'Active', '2022-05-09', 'All Department'),
(2, 'DAVID1122', 'David', 'Chan', 'DavidTeo@gmail.com', 'Qwer@1234', 'Active', '2022-05-11', 'Packing Material'),
(3, 'Charis453', 'Charis', 'Lee', 'CharisLeeeee@gmail.com', 'Qwer@1234', 'Blocked', '2022-05-11', 'General Use');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CID` int(11) NOT NULL,
  `CName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CID`, `CName`) VALUES
(1, 'New Year Cookies'),
(2, 'Raya Cookies'),
(3, 'Mooncakes'),
(4, 'Raw Material'),
(5, 'Packing Material'),
(6, 'General Use');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PCode` varchar(255) NOT NULL,
  `PName` varchar(255) NOT NULL,
  `PQty` int(255) NOT NULL,
  `QType` varchar(255) NOT NULL,
  `CID` int(30) NOT NULL,
  `PImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PCode`, `PName`, `PQty`, `QType`, `CID`, `PImage`) VALUES
('Vc8827B', 'Test', 0, '个', 4, '2..jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `SID` int(255) NOT NULL,
  `PCode` varchar(255) NOT NULL,
  `Qty` int(255) NOT NULL,
  `AID` int(255) NOT NULL,
  `DateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `Remarks` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`SID`, `PCode`, `Qty`, `AID`, `DateAdded`, `Remarks`, `Status`) VALUES
(6, 'Vc8827B', 3, 1, '2022-05-13 12:28:34', '-', 'Stock In');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PCode`),
  ADD KEY `product_ibfk_1` (`CID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `AID` (`AID`),
  ADD KEY `PCode` (`PCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `SID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `category` (`CID`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`),
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`PCode`) REFERENCES `product` (`PCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
