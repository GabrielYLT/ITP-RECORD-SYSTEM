-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 09:48 AM
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
(2, 'DAVID1122', 'David', 'Chan', 'DavidTeo@gmail.com', 'Zxcv@1234', 'Active', '2022-05-11', 'Product'),
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
  `PImage` varchar(255) NOT NULL,
  `AID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PCode`, `PName`, `PQty`, `QType`, `CID`, `PImage`, `AID`) VALUES
('C1P1', 'Prod1.1', 88, '个', 1, 'Random-Pictures-of-Conceptual-and-Creative-Ideas-02.jpg', 1),
('C1P2', 'Prod1.2', 20, '张', 1, '5c799c56eb3ce834ad57b632.jpg', 1),
('C1P3', 'P1.3', 26, '盘', 1, 'animal_facts-e1396431549968.jpg', 1),
('Hp3671S', 'Handphone', 8, '个', 6, 'tomato.jpeg', 1),
('Prod 5', 'Packing', 5, '个', 5, 'pearl necklet.jpg', 1),
('Prod1', 'Grape', 10, '包', 1, '275700778_5461663953852727_5425294467274926032_n.jpg', 1),
('Prod2', 'Raya CC', 50, '张', 2, 'Randomness-random-5997130-1280-800.jpg', 1),
('Prod3', 'Moo', 16, '个', 3, 'animal_facts-e1396431549968.jpg', 1),
('QQQ1', 'test15', 0, '个', 6, '280260077_510707914113806_2720264296722589217_n.jpg', 1),
('test3', 'Test1123', 0, '个', 6, '280260077_510707914113806_2720264296722589217_n.jpg', 2),
('Vb7699K', 'Brocolli', 6, '包', 4, 'Random-Pictures-of-Conceptual-and-Creative-Ideas-02.jpg', 1),
('Vc8827B', 'Test', 8, '个', 4, 'download.jpg', 1);

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
(7, 'Vc8827B', 10, 3, '2022-05-14 09:14:36', 'test', 'Stock In'),
(8, 'Vc8827B', 13, 2, '2022-05-14 09:14:58', 'test 2', 'Stock In'),
(9, 'Hp3671S', 3, 3, '2022-05-14 09:16:44', '- Samsung', 'Stock In'),
(10, 'Vb7699K', 5, 2, '2022-05-14 09:17:09', '- Yellow brocolli', 'Stock In'),
(11, 'Vb7699K', 8, 2, '2022-05-14 09:17:25', 'Green ', 'Stock In'),
(12, 'Vc8827B', 5, 3, '2022-05-14 09:17:34', '-', 'Stock In'),
(13, 'Hp3671S', 5, 2, '2022-05-14 09:18:40', 'Huawei', 'Stock In'),
(14, 'Vb7699K', 3, 2, '2022-05-14 09:20:15', 'to king', 'Stock Out'),
(15, 'Vc8827B', 5, 2, '2022-05-14 09:20:31', 'To Tean', 'Stock Out'),
(16, 'Hp3671S', 1, 3, '2022-05-14 09:20:38', 'to Boss', 'Stock Out'),
(17, 'Hp3671S', 2, 3, '2022-05-14 09:21:18', 'to Katt', 'Stock Out'),
(18, 'Vc8827B', 13, 2, '2022-05-14 09:21:30', 'to Elyana', 'Stock Out'),
(19, 'Vc8827B', 2, 3, '2022-05-14 09:21:41', 'to Hisham', 'Stock Out'),
(20, 'Vb7699K', 4, 2, '2022-05-14 09:21:55', 'to Katty', 'Stock Out'),
(21, 'Hp3671S', 3, 1, '2022-05-16 14:22:35', '-', 'Stock In'),
(25, 'Prod1', 2, 1, '2022-05-17 09:55:41', '-', 'Stock In'),
(26, 'Prod1', 3, 1, '2022-05-17 09:55:50', '-', 'Stock In'),
(27, 'C1P1', 10, 1, '2022-05-17 10:37:28', '-', 'Stock In'),
(28, 'C1P2', 3, 1, '2022-05-17 10:37:56', '-', 'Stock In'),
(29, 'C1P1', 10, 1, '2022-05-17 10:38:19', '-', 'Stock In'),
(30, 'C1P1', 2, 1, '2022-05-17 10:38:26', '-', 'Stock Out'),
(31, 'C1P2', 5, 1, '2022-05-17 10:39:48', '-', 'Stock In'),
(32, 'C1P3', 4, 1, '2022-05-17 11:16:09', '-', 'Stock In'),
(33, 'Prod2', 33, 1, '2022-05-16 11:25:16', '-', 'Stock In'),
(34, 'Prod3', 16, 1, '2022-05-17 11:25:36', '-', 'Stock In'),
(36, 'Prod1', 5, 1, '2022-05-18 09:56:30', '', 'Stock In'),
(37, 'C1P2', 10, 1, '2022-05-18 09:57:25', '-', 'Stock In'),
(38, 'C1P3', 10, 1, '2022-05-18 09:58:40', '', 'Stock In'),
(39, 'C1P1', 10, 1, '2022-05-18 09:58:48', '', 'Stock In'),
(40, 'Prod2', 12, 1, '2022-05-18 10:03:52', '-', 'Stock In'),
(41, 'Prod2', 5, 1, '2022-05-18 10:04:00', '', 'Stock In'),
(42, 'C1P1', 50, 1, '2022-05-18 10:04:17', '', 'Stock In'),
(43, 'C1P1', 11, 2, '2022-05-18 14:43:40', '', 'Stock In'),
(44, 'C1P3', 12, 2, '2022-05-18 14:44:19', '', 'Stock In'),
(45, 'C1P2', 2, 1, '2022-05-18 14:51:20', '', 'Stock In'),
(46, 'C1P1', 3, 1, '2022-05-18 14:51:26', '', 'Stock Out'),
(47, 'C1P1', 15, 2, '2022-05-18 14:51:57', '', 'Stock In'),
(48, 'C1P1', 3, 2, '2022-05-18 14:52:24', '', 'Stock Out'),
(49, 'C1P1', 10, 2, '2022-05-18 14:52:50', '', 'Stock Out');

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
  ADD KEY `product_ibfk_1` (`CID`),
  ADD KEY `AID` (`AID`);

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
  MODIFY `SID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `category` (`CID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`);

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
