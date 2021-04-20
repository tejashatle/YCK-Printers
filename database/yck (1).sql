-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2021 at 09:00 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yck`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `contact`, `email`, `address`, `post`) VALUES
(1, 'Chaitanya Karanjkar', 2147483647, 'tejashatle3@gmail.com', 'Room no 3,Rane Chawl,Navpada,Marol Naka,A.K Road,Andheri(E),Mumbai no.59', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(200) NOT NULL,
  `description` varchar(50) NOT NULL,
  `value` bigint(255) NOT NULL,
  `gross_amt` bigint(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `paid_or_not` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `description`, `value`, `gross_amt`, `datetime`, `paid_or_not`) VALUES
(17, 'banner', 1200, 1250, '2019-09-14 21:06:23', 'yes'),
(18, '', 0, 0, '2019-09-15 13:03:11', ''),
(19, '', 0, 0, '2019-09-15 13:10:09', ''),
(20, '', 0, 0, '2019-09-15 13:11:31', ''),
(21, '', 0, 0, '2019-09-15 13:14:01', ''),
(22, '', 0, 0, '2019-09-15 13:15:08', ''),
(23, '', 0, 0, '2019-09-15 14:13:08', ''),
(24, '', 0, 0, '2019-09-15 14:18:03', ''),
(25, '', 0, 0, '2019-09-16 16:47:14', ''),
(26, '', 0, 0, '2019-09-22 12:29:00', ''),
(27, '', 0, 0, '2019-09-23 10:04:20', '');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(10) NOT NULL,
  `cust_id` int(200) NOT NULL,
  `invoice_no` int(20) NOT NULL,
  `invoice_date` date NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_addr` varchar(100) NOT NULL,
  `customer_gstn` varchar(50) NOT NULL,
  `customer_statecode` varchar(100) NOT NULL,
  `customer_iocl` int(20) NOT NULL,
  `srno1` int(5) NOT NULL,
  `descr1` varchar(100) NOT NULL,
  `hsn1` int(10) NOT NULL,
  `size1` varchar(10) NOT NULL,
  `qty1` int(10) NOT NULL,
  `rate1` int(5) NOT NULL,
  `amount1` int(5) NOT NULL,
  `srno2` int(5) NOT NULL,
  `descr2` varchar(100) NOT NULL,
  `hsn2` varchar(20) NOT NULL,
  `size2` varchar(40) NOT NULL,
  `qty2` int(20) NOT NULL,
  `rate2` int(5) NOT NULL,
  `amount2` int(5) NOT NULL,
  `net_amt` int(5) NOT NULL,
  `sgst` int(5) NOT NULL,
  `cgst` int(5) NOT NULL,
  `totalwords` varchar(100) NOT NULL,
  `total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `work` varchar(20) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `contact`, `email`, `address`, `work`, `deadline`) VALUES
(1, 'tejas hatle', 76576576576, 'tejashatle2@gmail.com', 'marol naka,andheri', 'banner flex', '2019-10-03'),
(2, 'utkarsh hatle', 8652543046, 'utkarsh@gmail.com', 'marol naka', 'banner flex', '2019-09-15'),
(3, 'nishant Sandeep katalkar', 1234567890, 'Nishant.Katalkar68@gmail.com', 'tunga village', 'khade karne', '2019-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(200) NOT NULL,
  `A_id` int(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `A_id`, `username`, `password`) VALUES
(1, 1, 'tejas', 'tejas123');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(200) NOT NULL,
  `image` varchar(400) NOT NULL,
  `head` varchar(200) NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `image`, `head`, `descr`) VALUES
(1, 'Images/front2.png', 'World Environment Day', 'Banner On the occasion of World Environment Day'),
(3, 'Images/IMG-20190921-WA0015.jpg', 'Plastic Waste Management', 'Banner for Plastic Waste Management'),
(4, 'Images/house.png', 'hello', 'bye'),
(5, 'Images/T1.png', 'hjjk', 'kjhkj');

-- --------------------------------------------------------

--
-- Table structure for table `work_tracing_bar`
--

CREATE TABLE `work_tracing_bar` (
  `id` int(20) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `data_collection` varchar(10) NOT NULL,
  `designing` varchar(10) NOT NULL,
  `printing` varchar(10) NOT NULL,
  `delivery` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_tracing_bar`
--

INSERT INTO `work_tracing_bar` (`id`, `cust_id`, `data_collection`, `designing`, `printing`, `delivery`) VALUES
(4, 4, 'yes', 'yes', 'no', 'no'),
(11, 1, 'yes', 'yes', 'yes', 'no'),
(12, 3, 'yes', 'no', 'no', 'no'),
(14, 11, 'yes', 'no', 'yes', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign Key` (`cust_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_details_ibfk_1` (`A_id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_tracing_bar`
--
ALTER TABLE `work_tracing_bar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_tracing_bar`
--
ALTER TABLE `work_tracing_bar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `login_details_ibfk_1` FOREIGN KEY (`A_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
