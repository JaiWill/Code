-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2018 at 12:07 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nova`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_db`
--

DROP TABLE IF EXISTS `item_db`;
CREATE TABLE IF NOT EXISTS `item_db` (
  `itemsid` int(11) NOT NULL AUTO_INCREMENT,
  `itemselect` varchar(30) NOT NULL,
  PRIMARY KEY (`itemsid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_db`
--

INSERT INTO `item_db` (`itemsid`, `itemselect`) VALUES
(1, 'Chair'),
(2, 'Car'),
(5, 'M16'),
(7, 'Computer'),
(8, 'Desk');

-- --------------------------------------------------------

--
-- Table structure for table `item_tb`
--

DROP TABLE IF EXISTS `item_tb`;
CREATE TABLE IF NOT EXISTS `item_tb` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(25) NOT NULL,
  `item_quantity` int(4) NOT NULL,
  `item_description` text NOT NULL,
  `request_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `request_id` (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_tb`
--

INSERT INTO `item_tb` (`item_id`, `item_name`, `item_quantity`, `item_description`, `request_id`) VALUES
(1, 'Car', 5, 'Toyota Corolla', 23),
(3, 'Desk', 2, 'Junior Exec', 23),
(4, 'Guns', 15, 'M16 Assault Rifles', 23),
(5, 'Door', 1, 'Glass Panel', 23),
(6, 'Chair', 7, 'Junior Executive', 30),
(7, 'Desk', 7, 'Junior Executive with pedestal', 30),
(8, 'Computer', 7, 'Dell Desktop', 30),
(16, 'File Cabinet', 3, 'Black', 31),
(17, 'Door', 43, 'Broad', 31);

-- --------------------------------------------------------

--
-- Table structure for table `request_tb`
--

DROP TABLE IF EXISTS `request_tb`;
CREATE TABLE IF NOT EXISTS `request_tb` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `requester` varchar(40) NOT NULL,
  `division_section` varchar(50) NOT NULL,
  `station` varchar(30) NOT NULL,
  `stores` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Logged',
  PRIMARY KEY (`request_id`),
  KEY `requester` (`requester`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_tb`
--

INSERT INTO `request_tb` (`request_id`, `request_date`, `requester`, `division_section`, `station`, `stores`, `status`) VALUES
(1, '2018-08-07 19:11:07', 'kenroy.harrow@jcf.gov.jm', 'Moca', 'None', 'Armoury', 'Logged'),
(23, '2018-08-23 18:32:09', 'jane.brown@jcf.gov.jm', 'St. Andrew West', 'Denham Town', 'Armoury', 'Logged'),
(30, '2018-08-27 18:39:50', 'denton.smith@jcf.gov.jm', 'St. Thomas', 'Morant Bay', 'HQ', 'Procurement Process'),
(31, '2018-08-27 18:39:59', 'denton.smith@jcf.gov.jm', 'St. Thomas', 'Morant Bay', 'HQ', 'Sent for Purchase Order');

-- --------------------------------------------------------

--
-- Table structure for table `state_tb`
--

DROP TABLE IF EXISTS `state_tb`;
CREATE TABLE IF NOT EXISTS `state_tb` (
  `state_id` int(11) NOT NULL,
  `state_status` varchar(30) NOT NULL,
  `state_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_tb`
--

INSERT INTO `state_tb` (`state_id`, `state_status`, `state_description`) VALUES
(1, 'Logged', 'Request logged to database.'),
(2, 'Sent Finance', 'Sent to FInance Committee.');

-- --------------------------------------------------------

--
-- Table structure for table `station_db`
--

DROP TABLE IF EXISTS `station_db`;
CREATE TABLE IF NOT EXISTS `station_db` (
  `station_id` int(11) NOT NULL AUTO_INCREMENT,
  `station_select` varchar(30) NOT NULL,
  PRIMARY KEY (`station_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station_db`
--

INSERT INTO `station_db` (`station_id`, `station_select`) VALUES
(1, ''),
(2, 'Morant Bay'),
(3, 'Port Morant'),
(4, 'Yallahs'),
(5, 'Cedar Valley'),
(6, 'Golden Grove'),
(7, 'Port Royal'),
(8, 'Franklyn Town'),
(9, 'Bull Bay'),
(10, 'Half-Way-Tree'),
(11, 'Stadium'),
(12, 'Cross Roads'),
(13, 'Papine'),
(14, 'King’s House Police Post'),
(15, 'City Centre'),
(16, 'Denham Town'),
(17, 'Hannah Town'),
(18, 'Darling Street');

-- --------------------------------------------------------

--
-- Table structure for table `stores_db`
--

DROP TABLE IF EXISTS `stores_db`;
CREATE TABLE IF NOT EXISTS `stores_db` (
  `stores_id` int(11) NOT NULL AUTO_INCREMENT,
  `stores_select` varchar(13) NOT NULL,
  PRIMARY KEY (`stores_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores_db`
--

INSERT INTO `stores_db` (`stores_id`, `stores_select`) VALUES
(1, 'HQ'),
(2, 'Armoury'),
(4, 'Establishment'),
(6, 'ICTD');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
CREATE TABLE IF NOT EXISTS `user_tb` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(9) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`userid`, `fname`, `lname`, `username`, `password`, `usertype`, `date_created`, `last_log`) VALUES
(1, 'Kenroy', 'Harrow', 'kenroy.harrow@jcf.gov.jm', '0f0236704f97f52e8d76cc72f276f159', 'ReadOnly', '2018-08-08 00:05:55', '2018-08-07 19:05:55'),
(3, 'Jamhi', 'Williamson', 'jaiwill@jcf.gov.jm', '1d9d9229f978bb987f95f48278a116c9', 'Admin', '2018-08-14 18:48:25', '2018-08-14 13:48:25'),
(5, 'Denton', 'Smith', 'denton.smith@jcf.gov.jm', '9ffb46a29fcc0c23f943795a9d7f06c8', 'ReadOnly', '2018-08-16 13:47:00', '2018-08-16 08:47:00'),
(7, 'Jane', 'Brown', 'jane.brown@jcf.gov.jm', '5a2eae373b821c8a6078fea9405f6ecb', 'ReadOnly', '2018-08-23 23:20:52', '2018-08-23 18:20:52'),
(14, 'Royon', 'Nunes', 'royon.nunes@jcf.gov.jm', '178fc58b3dc28a9d1c74b97411ee5861', 'Admin', '2018-08-28 01:35:08', '2018-08-27 20:35:08'),
(17, 'Khadia', 'Satchell', 'khadia.satchell@jcf.gov.jm', 'acf387c77de0ebe61b5b91c310a10d75', 'SuperUser', '2018-08-28 16:21:44', '2018-08-28 11:21:44');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_tb`
--
ALTER TABLE `request_tb`
  ADD CONSTRAINT `request_tb_ibfk_1` FOREIGN KEY (`requester`) REFERENCES `user_tb` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
