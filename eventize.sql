-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2015 at 04:00 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventize`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE IF NOT EXISTS `attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) NOT NULL,
  `member` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `event_id`, `member`) VALUES
(1, 1, 'Mifta Sintaha');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Arts and Culture'),
(2, 'Education and Learning'),
(3, 'Career and Business'),
(4, 'Fashion and Beauty'),
(5, 'Tech and IT'),
(6, 'Food and Drink'),
(7, 'Outdoors and Adventure'),
(8, 'Comicon'),
(9, 'Sports and Games'),
(10, 'Concerts and Music'),
(11, 'Conferences and Seminars');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` varchar(600) NOT NULL,
  `organizer` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date_posted` date NOT NULL,
  `category` varchar(40) NOT NULL,
  `city` varchar(700) NOT NULL,
  `contact` varchar(300) NOT NULL,
  `admin` varchar(40) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `organizer`, `location`, `date_posted`, `category`, `city`, `contact`, `admin`, `start`, `end`) VALUES
(1, 'Ether', 'Art Gallery', 'sdfdf', 'Dhanmondi', '2015-07-12', 'Arts & Culture', 'dsfd', 'sdfdf', '', '18:00:00', '21:00:00'),
(2, 'Dhaka Comicon', 'dfdfdg', 'dfgfg', 'Gulshan', '2015-07-05', 'Comicon', 'dgfg', 'dfgfg', '', '09:00:00', '00:00:00'),
(4, 'BUFC tournament', 'dfgfg', 'dfgf', 'Banani', '2015-07-23', 'Sports & Games', 'dfgfg', 'dfgdfg', '', '08:00:00', '12:00:00'),
(5, 'dfgfg', 'dfgfg', 'dfgf', 'Banani', '2015-06-23', 'Conferences & Seminar', 'dfgfg', 'dfgdfg', '', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `event`, `user`) VALUES
(1, '1', 'Mifta Sintaha'),
(2, '4', 'Mifta Sintaha');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL,
  `event_id` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user`, `event_id`, `path`, `image_name`) VALUES
(1, 'Mifta Sintaha', 1, 'assets/uploaded/74cd363ce0f2e3d285dfaec0f55ee384.jpg', 'e6b0c7065143e99070d87bbff5b44b62'),
(2, 'Mifta Sintaha', 1, 'assets/uploaded/bleh.PNG', 'e970442b6dad5aaa8c474d8eb6dbd959');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `name`) VALUES
(1, 'msintaha', 'msintaha94@gmail.com', 'nothing1234', 'Mifta Sintaha');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
