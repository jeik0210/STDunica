-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2014 at 05:16 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grafica`
--

-- --------------------------------------------------------

--
-- Table structure for table `valores`
--

CREATE TABLE IF NOT EXISTS `valores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `valor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `valores`
--

INSERT INTO `valores` (`id`, `fecha`, `valor`) VALUES
(1, '2014-01-08', '20000'),
(2, '2014-02-11', '40000'),
(3, '2014-03-11', '23000'),
(4, '2014-04-16', '45000'),
(5, '2014-05-02', '36800'),
(6, '2014-06-19', '67000'),
(7, '2014-05-02', '26800'),
(8, '2014-06-19', '37000'),
(9, '2014-07-02', '20000'),
(10, '2014-08-19', '27000'),
(11, '2014-07-12', '22200'),
(12, '2014-08-29', '37000'),
(13, '2014-09-12', '62200'),
(14, '2014-10-29', '67000'),
(15, '2014-09-02', '12200'),
(16, '2014-10-09', '17000'),
(17, '2014-11-02', '10000'),
(18, '2014-11-09', '77000'),
(19, '2014-12-17', '60000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
