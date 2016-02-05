-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 08:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kassa`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`) VALUES
(16, 'PÃ¼ksid'),
(17, 'Saapad'),
(19, 'SÃ¤rk'),
(20, 'Tossud'),
(21, 'MÃ¼ts');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `method` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `type`, `time`, `date`, `price`, `method`) VALUES
(1, 'PÃ¼ksid', '17:06:47', '2012-10-30', '10', 'cash'),
(2, 'PÃ¼ksid', '17:06:50', '2012-10-30', '20', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `method` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=566 ;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `type`, `time`, `date`, `price`, `method`) VALUES
(537, 'PÃ¼ksid', '12:48:22', '2012-09-22', 12, 'cash'),
(538, 'PÃ¼ksid', '12:48:26', '2012-09-22', 45, 'cash'),
(539, 'PÃ¼ksid', '12:48:28', '2012-09-22', 75, 'cash'),
(540, 'Saapad', '12:48:31', '2012-09-22', 234, 'cash'),
(541, 'Tossud', '12:48:33', '2012-09-22', 23, 'cash'),
(542, 'MÃ¼ts', '12:48:37', '2012-09-22', 678, 'cash'),
(543, 'SÃ¤rk', '12:48:41', '2012-09-22', 12, 'cash'),
(544, 'MÃ¼ts', '12:48:44', '2012-09-22', 67, 'cash'),
(545, 'Saapad', '12:48:47', '2012-09-22', 12, 'cash'),
(546, 'MÃ¼ts', '12:48:52', '2012-09-22', 56, 'card'),
(547, 'PÃ¼ksid', '12:51:12', '2012-10-12', 23, 'cash'),
(548, 'PÃ¼ksid', '12:51:14', '2012-10-12', 56, 'cash'),
(549, 'SÃ¤rk', '12:51:17', '2012-10-12', 67, 'cash'),
(550, 'PÃ¼ksid', '12:51:19', '2012-10-12', 12, 'card'),
(551, 'MÃ¼ts', '12:51:22', '2012-10-28', 56, 'cash'),
(552, 'PÃ¼ksid', '12:57:07', '2012-10-22', 35, 'cash'),
(553, 'PÃ¼ksid', '12:57:09', '2012-10-21', 789, 'cash'),
(554, 'SÃ¤rk', '12:57:11', '2012-10-18', 78, 'cash'),
(555, 'PÃ¼ksid', '12:57:13', '2012-10-18', 89, 'card'),
(556, 'PÃ¼ksid', '13:00:19', '2012-10-23', 56, 'cash'),
(557, 'SÃ¤rk', '13:00:25', '2012-10-23', 78, 'cash'),
(558, 'PÃ¼ksid', '13:00:30', '2012-10-24', 67, 'card'),
(559, 'Saapad', '13:00:46', '2012-10-23', 56, 'cash'),
(560, 'PÃ¼ksid', '23:50:32', '2012-10-24', 24, 'Sulas'),
(561, 'Saapad', '09:24:25', '2012-10-24', 45, 'Kaardiga'),
(562, 'PÃ¼ksid', '12:25:33', '2012-10-25', 10.1, 'Sulas'),
(563, 'PÃ¼ksid', '12:25:37', '2012-10-30', 10.1, 'Sulas'),
(564, 'PÃ¼ksid', '12:25:41', '2012-10-25', 16.34, 'Sulas'),
(565, 'PÃ¼ksid', '12:25:59', '2012-10-25', 10.23, 'Sulas');

-- --------------------------------------------------------

--
-- Table structure for table `stats_sum`
--

CREATE TABLE IF NOT EXISTS `stats_sum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cash_payment` float DEFAULT '0',
  `card_payment` float DEFAULT '0',
  `total_sum` float DEFAULT '0',
  `sum_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `stats_sum`
--

INSERT INTO `stats_sum` (`id`, `cash_payment`, `card_payment`, `total_sum`, `sum_date`) VALUES
(118, 1158, 56, 1214, '2012-09-22'),
(119, 202, 12, 214, '2012-10-12'),
(120, 902, 89, 991, '2012-10-18'),
(121, 190, 67, 257, '2012-10-23'),
(122, 24, 45, 69, '2012-10-24'),
(123, 46.44, 0, 46.44, '2012-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `type` enum('admin','user') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`) VALUES
(10, 'admin', '17a88849c225e65166096599dce8411a15222c1e9bf1b31f197000b65e953431', 'admin'),
(28, 'test', '976addd20cadf5bafdfc3f9adffd515e64208b3b84f7a6166a08cad92b5c0457', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
