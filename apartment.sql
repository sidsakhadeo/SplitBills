-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2012 at 07:14 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `billNo` int(11) NOT NULL AUTO_INCREMENT,
  `billName` varchar(250) NOT NULL,
  `ankit` float DEFAULT NULL,
  `aseem` float DEFAULT NULL,
  `siddharth` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `date` date NOT NULL,
  `whoPaid` varchar(250) NOT NULL,
  PRIMARY KEY (`billNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`billNo`, `billName`, `ankit`, `aseem`, `siddharth`, `total`, `date`, `whoPaid`) VALUES
(1, 'Target', 8.27, 10.62, 6.88, 25.77, '2012-11-12', 'Siddharth');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemNo` int(11) NOT NULL AUTO_INCREMENT,
  `billNo` int(11) NOT NULL,
  `itemName` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `ankit` int(11) NOT NULL,
  `aseem` int(11) NOT NULL,
  `siddharth` int(11) NOT NULL,
  PRIMARY KEY (`itemNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemNo`, `billNo`, `itemName`, `price`, `ankit`, `aseem`, `siddharth`) VALUES
(1, 1, 'Tide ', 7.59, 1, 1, 1),
(2, 1, 'Ferrero Rocher', 1.09, 0, 1, 1),
(3, 1, 'Lays Ranch', 3.69, 1, 1, 1),
(4, 1, 'Tomatoes', 3.5, 1, 1, 1),
(5, 1, 'Brown Rice', 3.74, 0, 1, 0),
(6, 1, 'Suave', 1.94, 1, 0, 0),
(7, 1, 'Bounty Kitchen Wipes', 3.09, 1, 1, 1),
(8, 1, 'Tax', 1.13, 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
