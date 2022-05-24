-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2022 at 07:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

DROP TABLE IF EXISTS `clothes`;
CREATE TABLE IF NOT EXISTS `clothes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `brand` text,
  `gender` text,
  `size` text,
  `price` decimal(10,2) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `image` blob,
  `color` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `name`, `brand`, `gender`, `size`, `price`, `amount`, `image`, `color`) VALUES
(1, 't-shirt', 'nike', 'male', 'medium', '200.00', 50, 0x30, 'red'),
(2, 'pant', 'adidas', 'male', 'medium', '300.00', 20, 0x30, 'black'),
(3, 't-shirt', 'adidas', 'male', 'large', '150.00', 0, 0x30, 'black'),
(4, 'shirt', 'nike', 'male', 'large', '400.00', 10, 0x30, 'red'),
(5, 't-shirt', 'nike', 'male', 'small', '100.00', 5, 0x30, 'blue'),
(6, 't-shirt', 'nike', 'female', 'small', '112.00', 42, 0x30, 'black'),
(7, 't-shirt', 'nike', 'female', 'medium', '142.00', 2, 0x30, 'green'),
(8, 'jean', 'mavi', 'male', 'medium', '400.00', 0, 0x30, 'blue'),
(9, 'jean', 'mavi', 'female', 'small', '254.00', 21, 0x30, 'black'),
(10, 'jean', 'mavi', 'female', 'large', '420.00', 10, 0x30, 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'adf', 'wqe@email.com', '12312'),
(14, 'adf', 'adf@email', 'qwertyuiA1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
