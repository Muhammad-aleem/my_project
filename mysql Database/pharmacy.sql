-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 05:56 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryname`) VALUES
(1, 'Antipyretics'),
(2, 'Antibiotics'),
(3, 'Mood stabilizers');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `companyname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `companyname`) VALUES
(1, 'Getz Pharma'),
(2, 'Abbott Laboratories'),
(3, 'Pfizer'),
(4, 'Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `medicon`
--

CREATE TABLE `medicon` (
  `medicon_id` int(11) NOT NULL,
  `drugname` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `Manufacturedate` date NOT NULL,
  `expirydate` date NOT NULL,
  `price` varchar(255) NOT NULL,
  `retailsprice` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `remaning` varchar(222) NOT NULL,
  `sold` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicon`
--

INSERT INTO `medicon` (`medicon_id`, `drugname`, `category`, `company`, `Manufacturedate`, `expirydate`, `price`, `retailsprice`, `quantity`, `remaning`, `sold`) VALUES
(1, 'Aleem', 2, 1, '2019-11-08', '2019-11-30', '200', '210', '100', '200', '200'),
(2, 'Acetaminophen', 3, 1, '2019-11-09', '2019-12-31', '200', '210', '100', '588', '588'),
(3, 'Adderall.', 1, 2, '2019-11-16', '2019-11-30', '100', '109', '400', '', ''),
(4, 'Ativan', 3, 4, '2019-11-09', '2019-11-23', '200', '210', '160', '600', '-160');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `pos_id` int(11) NOT NULL,
  `medicine` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`pos_id`, `medicine`, `quantity`, `price`, `total`, `date`) VALUES
(1, 1, '300', '120', '36000', '2019-11-08'),
(2, 2, '12', '150', '1800', '2019-11-09'),
(3, 4, '160', '120', '19200', '2019-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `medicon_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `medicon_id`, `quantity`, `date`) VALUES
(1, 1, '100', '2019-11-08'),
(2, 1, '400', '2019-11-08'),
(3, 2, '400', '2019-11-16'),
(4, 4, '400', '2019-11-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `medicon`
--
ALTER TABLE `medicon`
  ADD PRIMARY KEY (`medicon_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicon`
--
ALTER TABLE `medicon`
  MODIFY `medicon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
