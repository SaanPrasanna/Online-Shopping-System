-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 02:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- C3
-- Database: `oss`
--
CREATE DATABASE oss;
-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `remove` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`username`, `password`, `fname`, `lname`, `address`, `remove`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Sandun', 'Prasanna', 'Ihala Pallewela, Kithalawa', 0),
('test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'fname', 'lname', 'test', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `administrator_view`
-- (See below for the actual view)
--
CREATE TABLE `administrator_view` (
`username` varchar(50)
,`fname` varchar(50)
,`lname` varchar(50)
,`address` varchar(250)
,`number` char(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

CREATE TABLE `admin_contact` (
  `username` varchar(50) NOT NULL,
  `number` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_contact`
--

INSERT INTO `admin_contact` (`username`, `number`) VALUES
('admin', '0766664117'),
('test', 'test');

-- --------------------------------------------------------

--
-- Stand-in structure for view `chart_category_view`
-- (See below for the actual view)
--
CREATE TABLE `chart_category_view` (
`p_id` varchar(10)
,`category` varchar(30)
,`amount` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `chart_qty_view`
-- (See below for the actual view)
--
CREATE TABLE `chart_qty_view` (
`category` varchar(30)
,`qty` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `co_id` char(5) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `remove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`co_id`, `fname`, `lname`, `address`, `remove`) VALUES
('C0002', 'Sandun', 'Prasanna', 'Ihala Pallewela,', 1),
('C0003', 'Janaka', 'Perera', 'Kegalle', 0),
('C0004', 'Nilnaga', 'Bandara', 'Kurunegala', 0),
('C0005', 'Ashen', 'Rohana', 'Kuliyapitiya', 0),
('CO001', 'Deshan', 'Chamara', 'Kurunegala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courier_contact`
--

CREATE TABLE `courier_contact` (
  `co_id` char(5) NOT NULL,
  `number` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_contact`
--

INSERT INTO `courier_contact` (`co_id`, `number`) VALUES
('C0002', '0123456789'),
('C0003', '0779856598'),
('C0004', '0774125487'),
('C0005', '0714521454'),
('CO001', '0123456789');

-- --------------------------------------------------------

--
-- Stand-in structure for view `courier_view`
-- (See below for the actual view)
--
CREATE TABLE `courier_view` (
`co_id` char(5)
,`fname` varchar(50)
,`lname` varchar(50)
,`number` char(10)
,`address` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` char(5) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `fname`, `lname`, `email`, `password`) VALUES
('C0001', 'Nimesh', 'Saranga', 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
('C0002', 'Kasun', 'Thilakerathne', 'kasun@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

CREATE TABLE `customer_contact` (
  `cid` char(5) NOT NULL,
  `number` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_contact`
--

INSERT INTO `customer_contact` (`cid`, `number`) VALUES
('C0001', '0123456780'),
('C0002', '0123456789');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_view`
-- (See below for the actual view)
--
CREATE TABLE `customer_view` (
`cid` char(5)
,`fname` varchar(50)
,`lname` varchar(50)
,`email` varchar(100)
,`number` char(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `category` varchar(30) NOT NULL,
  `rating` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`category`, `rating`) VALUES
('accessorie', 0),
('desktop', 0),
('laptop', 3),
('monitor', 0),
('printer', 0),
('software', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loyalty`
--

CREATE TABLE `loyalty` (
  `redeem_id` varchar(6) NOT NULL,
  `points` decimal(10,2) DEFAULT NULL,
  `cid` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `makes_order`
--

CREATE TABLE `makes_order` (
  `cid` char(5) NOT NULL,
  `order_id` varchar(12) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postal_code` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makes_order`
--

INSERT INTO `makes_order` (`cid`, `order_id`, `address`, `city`, `postal_code`) VALUES
('C0001', '2019122618B1', 'Ihala Pallewela, Kithalawa, undefined', 'Kuliyapitiya, undefined', '60000'),
('C0001', '2019122629D7', 'Ihala Pallewela, Kithalawa, none', 'Kuliyapitiya, ', '60000'),
('C0001', '201912263BB2', 'Ihala Pallewela, Kithalawa, undefined', 'Kuliyapitiya, undefined', '60000'),
('C0001', '201912264C14', 'Ihala Pallewela, Kithalawa, undefined', 'Kuliyapitiya, undefined', '60000'),
('C0001', '201912266FD3', 'Ihala Pallewela, Kithalawa, undefined', 'Kuliyapitiya, undefined', '60000'),
('C0001', '20191226A116', '1 Main St, ', 'San Jose, CA', '95131'),
('C0001', '20191226D625', 'Ihala Pallewela, Kithalawa, none', 'Kuliyapitiya, ', '60000'),
('C0001', '20191229D458', 'Ihala Pallewela, Kithalawa, ', 'Kuliyapitiya, ', '60000'),
('C0001', '201912304829', 'Ihala Pallewela, Kithalawa, ', 'Kuliyapitiya, ', '60000'),
('C0001', '201912311610', 'Ihala Pallewela, Kithalawa, ', 'Kuliyapitiya, ', '60000'),
('C0001', '201912318412', 'Ihala Pallewela, Kithalawa, ', 'Kuliyapitiya, ', '60000'),
('C0001', '20191231B511', 'Ihala Pallewela, Kithalawa, ', 'Kuliyapitiya, ', '60000'),
('C0001', '202001010515', 'Ihala Pallewela, Kithalawa, ', 'Kuliyapitiya, ', '60000'),
('C0001', '202001012713', 'Ihala Pallewela, Kithalawa, ', 'Kuliyapitiya, ', '60000'),
('C0001', '202001013614', 'Kuliyapitiya, Kuliyapitiya', 'Kuliyapitiya, ', '60000'),
('C0001', '202001025116', 'Ihala Pallewela, Kithalawa, ', 'Kuliyapitiya, ', '60000');

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `manage_id` char(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `supplier_id` char(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`manage_id`, `username`, `p_id`, `supplier_id`, `qty`, `date`, `time`) VALUES
('M0001', 'admin', 'P00001', 'S0001', 5, '2019-12-17', '24:11:11'),
('M0002', 'admin', 'P00002', 'S0001', 3, '2019-12-18', '60:29:26'),
('M0003', 'admin', 'P00003', 'S0001', 3, '2019-12-19', '12:11:10'),
('M0004', 'admin', 'P00001', 'S0001', 1, '2019-12-31', '09:50:24'),
('M0005', 'admin', 'P00002', 'S0002', 2, '2019-12-31', '09:51:40'),
('M0006', 'admin', 'P00002', 'S0002', 2, '2019-12-31', '09:52:14'),
('M0007', 'admin', 'P00003', 'S0001', 1, '2019-12-31', '09:52:27'),
('M0008', 'admin', 'P00002', 'S0004', 2, '2019-12-31', '10:06:19'),
('M0009', 'admin', 'P000010', 'S0001', 10, '2020-01-02', '01:56:09'),
('M0010', 'admin', 'P000011', 'S0002', 10, '2020-01-02', '01:56:18'),
('M0011', 'admin', 'P00004', 'S0002', 5, '2020-01-02', '01:56:29'),
('M0012', 'admin', 'P00005', 'S0002', 2, '2020-01-02', '01:56:40'),
('M0013', 'admin', 'P00006', 'S0001', 5, '2020-01-02', '01:56:48'),
('M0014', 'admin', 'P00007', 'S0002', 2, '2020-01-02', '01:56:57'),
('M0015', 'admin', 'P00008', 'S0002', 1, '2020-01-02', '01:57:05'),
('M0016', 'admin', 'P00009', 'S0001', 5, '2020-01-02', '01:57:15');

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderdetails_view`
-- (See below for the actual view)
--
CREATE TABLE `orderdetails_view` (
`order_id` varchar(12)
,`p_id` varchar(10)
,`qty` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(12) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `finishing_date` date NOT NULL,
  `transaction_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `amount`, `time`, `date`, `finishing_date`, `transaction_id`) VALUES
('2019122618B1', '15000.40', '17:12:10', '2019-12-26', '2020-01-01', ''),
('2019122629D7', '157000.00', '18:32:21', '2019-12-29', '0000-00-00', ''),
('201912263BB2', '19600.40', '17:15:26', '2019-12-26', '2019-12-27', ''),
('201912264C14', '299390.00', '17:26:08', '2019-12-27', '2019-12-31', ''),
('201912266FD3', '19600.40', '17:18:55', '2019-12-27', '0000-00-00', ''),
('20191226A116', '97217.02', '18:28:38', '2019-12-29', '2019-12-31', ''),
('20191226D625', '142390.00', '18:22:36', '2019-12-28', '0000-00-00', ''),
('20191229D458', '142390.00', '12:37:40', '2019-12-29', '2020-01-01', ''),
('201912304829', '97217.02', '09:55:49', '2019-12-30', '0000-00-00', ''),
('201912311610', '157000.00', '16:50:48', '2019-12-31', '0000-00-00', ''),
('201912318412', '236679.03', '18:22:13', '2019-12-31', '0000-00-00', '3VD796883E817223S'),
('20191231B511', '96029.03', '17:05:41', '2019-12-31', '0000-00-00', '9A771298PX434303J'),
('202001010515', '393679.03', '10:55:24', '2020-01-01', '0000-00-00', '81H70154BJ9405849'),
('202001012713', '96029.03', '09:27:55', '2020-01-01', '0000-00-00', '83X32178214964625'),
('202001013614', '140650.00', '09:54:17', '2020-01-01', '0000-00-00', '3XF68789VE460603R'),
('202001025116', '172000.00', '01:59:12', '2020-01-02', '0000-00-00', '5X5395894H2156212');

-- --------------------------------------------------------

--
-- Table structure for table `order_include`
--

CREATE TABLE `order_include` (
  `order_id` varchar(12) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `u_price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_include`
--

INSERT INTO `order_include` (`order_id`, `p_id`, `u_price`, `qty`) VALUES
('2019122618B1', 'P00001', '196.40', 1),
('2019122629D7', 'P00003', '157000.00', 1),
('201912263BB2', 'P00001', '196.40', 1),
('201912264C14', 'P00002', '142390.00', 1),
('201912264C14', 'P00003', '157000.00', 1),
('201912266FD3', 'P00001', '196.40', 1),
('20191226A116', 'P00001', '97217.02', 1),
('20191226D625', 'P00002', '142390.00', 1),
('20191229D458', 'P00002', '142390.00', 1),
('201912304829', 'P00001', '97217.02', 1),
('201912311610', 'P00003', '157000.00', 1),
('201912318412', 'P00001', '96029.03', 1),
('201912318412', 'P00002', '140650.00', 1),
('20191231B511', 'P00001', '96029.03', 1),
('202001010515', 'P00001', '96029.03', 1),
('202001010515', 'P00002', '140650.00', 1),
('202001010515', 'P00003', '157000.00', 1),
('202001012713', 'P00001', '96029.03', 1),
('202001013614', 'P00002', '140650.00', 1),
('202001025116', 'P000011', '15000.00', 1),
('202001025116', 'P00003', '157000.00', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_view`
-- (See below for the actual view)
--
CREATE TABLE `order_view` (
`order_id` varchar(12)
,`cid` char(5)
,`co_id` char(5)
,`amount` decimal(10,2)
,`date` date
,`time` time
,`finishing_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(120) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `s_price` decimal(10,2) DEFAULT NULL,
  `u_price` decimal(10,2) DEFAULT NULL,
  `re_order` int(11) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  `norp` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `remove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `name`, `image`, `category`, `description`, `warranty`, `s_price`, `u_price`, `re_order`, `rating`, `norp`, `qty`, `remove`) VALUES
('P00001', 'ASUS Laptop X407UB', 'img/products/666984994.jpg', 'laptop', 'Intel Core i5 8250U Processor, 1.6 GHz (up to 3.4 GHz)<br>Windows 10 Pros<br>DDR4 2400MHz SDRAM, 1 x SO-DIMM socket , up to 8 GB SDRAM<br>1TB 7200 rpm SATA HDD', 12, '94000.00', '98999.00', 4, 0, 0, 1, 0),
('P000010', 'Mega Pixel HD Camera', 'img/products/328671198.jpg', 'accessorie', '12.0M pixels, high definition and true color images.<br>Designed for both laptop and desktop.<br>Left & right 360 degrees and up & down 30 degrees rotatable<br>Built-in sound absorption microphone, your voice can be heard clearly in 10 meters.', 12, '1800.00', '2000.00', 5, 0, 0, 10, 0),
('P000011', 'LG Monitor 22FW', 'img/products/203421873.jpg', 'monitor', 'Actual performance might vary.<br>47.6 x 26.8 cm (18.7 x 10.5 in)<br>IPS with LED backlight, anti-glare<br>54.6 cm (21.5 in) diagonal', 12, '14500.00', '15000.00', 5, 0, 0, 9, 0),
('P00002', 'Asus Vivobook S532fl - Bq205t', 'img/products/lap2.jpg', 'laptop', 'Intel Core i5 1.6 / 4.10GHz \'10210U\'<br>\r\n1TB SSD NVME 8GB DDR4 <br>\r\n2GB GeForce MX250<br>\r\nWindows 10 Home', 24, '135000.00', '145000.00', 2, 2, 3, 2, 0),
('P00003', ' Hp Prodesk 600 G4 3', 'img/products/desk1.jpg', 'desktop', 'Intel Core i7 3.2GHz / 4.6GHz<br>\r\n\'8700\'1TB 8GB DDR4<br>\r\n18.5\" LED<br>\r\nIntel HD Graphics<br>\r\n3 Year<br>\r\n', 24, '145000.00', '157000.00', 2, 0, 0, 5, 0),
('P00004', 'Sandberg Gaming Keyboard', 'img/products/78361463.jpg', 'accessorie', 'RGB backlighting<br>104 mechanical keys<br>heavy metal plate<br>for the serious gamer!', 12, '7500.00', '8500.00', 2, 0, 0, 5, 0),
('P00005', 'Sandberg Normal Keyboard', 'img/products/934872905.jpg', 'accessorie', 'Soft Low Noise Keys.<br>Just insert the keyboard to a USB port on your computer<br>Save the cost of batteries.<br>LIght weight', 12, '3200.00', '4000.00', 5, 0, 0, 2, 0),
('P00006', 'EPSON XP-970', 'img/products/576639469.jpg', 'printer', '6-color Claria Photo HD inks<br>Black: 8.5 ISO ppm; Color: 8.0 ISO ppm<br>Wireless | Wide Format | Print | Copy | Scan | Photo | Ethernet<br>This printer is designed for use with Epson cartridges only', 12, '50000.00', '55000.00', 2, 0, 0, 5, 0),
('P00007', 'NUMWO - D455', 'img/products/572151115.jpg', 'accessorie', '7 button mechanical thumb wheel<br>Total of 14 MOBA optimized programmable buttons<br>True 16,000 DPI 5G laser sensor<br>Up to 210 inches per second / 50 G acceleration', 12, '14500.00', '15000.00', 5, 0, 0, 2, 0),
('P00008', 'Sundisk 16GB pendrive', 'img/products/138730185.jpg', 'accessorie', 'Compact Design for Maximum Portability.<br>High-Capacity Drive Accommodates Your Favorite Media Files<br>Store more with capacities up to 16gb 5-year limited warranty.<br>SanDisk SecureAccess Software Protects Drive from Unauthorized Access', 12, '1200.00', '1500.00', 10, 0, 0, 0, 0),
('P00009', 'Kespersky Antivirus 2020', 'img/products/691756062.jpg', 'software', 'Blocks ransomware, cryptolockers & more<br>Prevents cryptomining malware infections<br>Delivers real-time antivirus protection<br>Lets your PC perform as itâ€™s designed to', 12, '1500.00', '2000.00', 5, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_view`
-- (See below for the actual view)
--
CREATE TABLE `product_view` (
`p_id` varchar(10)
,`name` varchar(50)
,`image` varchar(120)
,`category` varchar(30)
,`description` varchar(400)
,`warranty` int(11)
,`s_price` decimal(10,2)
,`u_price` decimal(10,2)
,`re_order` int(11)
,`rating` tinyint(1)
,`norp` int(11)
,`qty` int(11)
,`remove` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `ships_orders`
--

CREATE TABLE `ships_orders` (
  `co_id` char(5) NOT NULL,
  `order_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ships_orders`
--

INSERT INTO `ships_orders` (`co_id`, `order_id`) VALUES
('C0002', '20191226A116'),
('C0002', '20191231B511'),
('C0003', '20191229D458'),
('C0003', '202001010515'),
('C0003', '202001012713'),
('C0003', '202001013614'),
('C0004', '201912263BB2'),
('C0004', '201912266FD3'),
('C0004', '201912311610'),
('C0005', '20191226D625'),
('C0005', '202001025116'),
('CO001', '2019122618B1'),
('CO001', '2019122629D7'),
('CO001', '201912264C14'),
('CO001', '201912304829'),
('CO001', '201912318412');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` char(5) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `remove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company`, `address`, `remove`) VALUES
('S0001', 'Softlogic', 'Colombo 7,Waththala', 0),
('S0002', 'Acer Head Office', 'Colombo 7, Ja Ela', 0),
('S0003', 'test', 'test', 1),
('S0004', 'tet', 'ttt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contacts`
--

CREATE TABLE `supplier_contacts` (
  `supplier_id` char(5) NOT NULL,
  `number` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_contacts`
--

INSERT INTO `supplier_contacts` (`supplier_id`, `number`) VALUES
('S0001', '0123456787'),
('S0002', '0112586988'),
('S0003', 'test'),
('S0004', 'tete');

-- --------------------------------------------------------

--
-- Stand-in structure for view `supplier_view`
-- (See below for the actual view)
--
CREATE TABLE `supplier_view` (
`supplier_id` char(5)
,`company` varchar(50)
,`number` char(10)
,`address` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `administrator_view`
--
DROP TABLE IF EXISTS `administrator_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `administrator_view`  AS  select `a`.`username` AS `username`,`a`.`fname` AS `fname`,`a`.`lname` AS `lname`,`a`.`address` AS `address`,`ac`.`number` AS `number` from (`administrator` `a` join `admin_contact` `ac`) where ((`a`.`username` = `ac`.`username`) and (`a`.`remove` = 0)) ;

-- --------------------------------------------------------

--
-- Structure for view `chart_category_view`
--
DROP TABLE IF EXISTS `chart_category_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `chart_category_view`  AS  select `product`.`p_id` AS `p_id`,`product`.`category` AS `category`,sum(`orders`.`amount`) AS `amount` from ((`orders` join `product`) join `order_include`) where ((`orders`.`order_id` = `order_include`.`order_id`) and (`order_include`.`p_id` = `product`.`p_id`)) group by `product`.`category` ;

-- --------------------------------------------------------

--
-- Structure for view `chart_qty_view`
--
DROP TABLE IF EXISTS `chart_qty_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `chart_qty_view`  AS  select `product`.`category` AS `category`,sum(`product`.`qty`) AS `qty` from `product` where (`product`.`remove` = 0) group by `product`.`category` ;

-- --------------------------------------------------------

--
-- Structure for view `courier_view`
--
DROP TABLE IF EXISTS `courier_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `courier_view`  AS  select `c`.`co_id` AS `co_id`,`c`.`fname` AS `fname`,`c`.`lname` AS `lname`,`cc`.`number` AS `number`,`c`.`address` AS `address` from (`courier` `c` join `courier_contact` `cc`) where ((`c`.`co_id` = `cc`.`co_id`) and (`c`.`remove` = 0)) ;

-- --------------------------------------------------------

--
-- Structure for view `customer_view`
--
DROP TABLE IF EXISTS `customer_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_view`  AS  select `c`.`cid` AS `cid`,`c`.`fname` AS `fname`,`c`.`lname` AS `lname`,`c`.`email` AS `email`,`cc`.`number` AS `number` from (`customer` `c` join `customer_contact` `cc`) where (`c`.`cid` = `cc`.`cid`) ;

-- --------------------------------------------------------

--
-- Structure for view `orderdetails_view`
--
DROP TABLE IF EXISTS `orderdetails_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderdetails_view`  AS  select `o`.`order_id` AS `order_id`,`oi`.`p_id` AS `p_id`,`oi`.`qty` AS `qty` from (`orders` `o` join `order_include` `oi`) where (`o`.`order_id` = `oi`.`order_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `order_view`
--
DROP TABLE IF EXISTS `order_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_view`  AS  select distinct `o`.`order_id` AS `order_id`,`mo`.`cid` AS `cid`,`so`.`co_id` AS `co_id`,`o`.`amount` AS `amount`,`o`.`date` AS `date`,`o`.`time` AS `time`,`o`.`finishing_date` AS `finishing_date` from (((`orders` `o` join `makes_order` `mo`) join `order_include` `oi`) join `ships_orders` `so`) where ((`o`.`order_id` = `mo`.`order_id`) and (`o`.`order_id` = `so`.`order_id`)) order by `o`.`date`,`o`.`time` ;

-- --------------------------------------------------------

--
-- Structure for view `product_view`
--
DROP TABLE IF EXISTS `product_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_view`  AS  select `product`.`p_id` AS `p_id`,`product`.`name` AS `name`,`product`.`image` AS `image`,`product`.`category` AS `category`,`product`.`description` AS `description`,`product`.`warranty` AS `warranty`,`product`.`s_price` AS `s_price`,`product`.`u_price` AS `u_price`,`product`.`re_order` AS `re_order`,`product`.`rating` AS `rating`,`product`.`norp` AS `norp`,`product`.`qty` AS `qty`,`product`.`remove` AS `remove` from `product` where (`product`.`remove` = 0) ;

-- --------------------------------------------------------

--
-- Structure for view `supplier_view`
--
DROP TABLE IF EXISTS `supplier_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `supplier_view`  AS  select `s`.`supplier_id` AS `supplier_id`,`s`.`company` AS `company`,`sc`.`number` AS `number`,`s`.`address` AS `address` from (`supplier` `s` join `supplier_contacts` `sc`) where ((`s`.`supplier_id` = `sc`.`supplier_id`) and (`s`.`remove` = 0)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `admin_contact`
--
ALTER TABLE `admin_contact`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `courier_contact`
--
ALTER TABLE `courier_contact`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `loyalty`
--
ALTER TABLE `loyalty`
  ADD PRIMARY KEY (`redeem_id`,`cid`),
  ADD KEY `fk_loyalty_cid` (`cid`);

--
-- Indexes for table `makes_order`
--
ALTER TABLE `makes_order`
  ADD PRIMARY KEY (`cid`,`order_id`),
  ADD KEY `fk_o_order_id` (`order_id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`manage_id`),
  ADD KEY `fk_m_p_id` (`p_id`),
  ADD KEY `fk_m_supplier_id` (`supplier_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_include`
--
ALTER TABLE `order_include`
  ADD PRIMARY KEY (`order_id`,`p_id`),
  ADD KEY `fk_oi_p_id` (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fk_p_category` (`category`);

--
-- Indexes for table `ships_orders`
--
ALTER TABLE `ships_orders`
  ADD PRIMARY KEY (`co_id`,`order_id`),
  ADD KEY `fk_so_order_id` (`order_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_contacts`
--
ALTER TABLE `supplier_contacts`
  ADD PRIMARY KEY (`supplier_id`,`number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_contact`
--
ALTER TABLE `admin_contact`
  ADD CONSTRAINT `fk_ac_username` FOREIGN KEY (`username`) REFERENCES `administrator` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courier_contact`
--
ALTER TABLE `courier_contact`
  ADD CONSTRAINT `fk_cc_co_id` FOREIGN KEY (`co_id`) REFERENCES `courier` (`co_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD CONSTRAINT `customer_contact_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loyalty`
--
ALTER TABLE `loyalty`
  ADD CONSTRAINT `fk_loyalty_cid` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `makes_order`
--
ALTER TABLE `makes_order`
  ADD CONSTRAINT `fk_mo_cid` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_o_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `fk_m_p_id` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_m_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_m_username` FOREIGN KEY (`username`) REFERENCES `administrator` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`username`) REFERENCES `administrator` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `order_include`
--
ALTER TABLE `order_include`
  ADD CONSTRAINT `fk_oi_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oi_p_id` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_p_category` FOREIGN KEY (`category`) REFERENCES `discount` (`category`) ON UPDATE CASCADE;

--
-- Constraints for table `ships_orders`
--
ALTER TABLE `ships_orders`
  ADD CONSTRAINT `fk_so_co_id` FOREIGN KEY (`co_id`) REFERENCES `courier` (`co_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_so_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_contacts`
--
ALTER TABLE `supplier_contacts`
  ADD CONSTRAINT `fk_sc_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
