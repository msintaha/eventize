-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2015 at 07:26 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `event_id`, `member`) VALUES
(1, 1, 'Mifta Sintaha'),
(2, 5, 'meow'),
(3, 1, 'alexrivers'),
(4, 4, 'alexrivers');

-- --------------------------------------------------------

--
-- Table structure for table `cat_preference`
--

CREATE TABLE IF NOT EXISTS `cat_preference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `cat_event` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cat_preference`
--

INSERT INTO `cat_preference` (`id`, `username`, `cat_event`) VALUES
(11, 'meow', 'Conferences & Seminar'),
(12, 'meow', 'Arts & Culture'),
(13, 'meow', 'Education & Learning'),
(14, 'alexrivers', 'Arts & Culture'),
(15, 'alexrivers', 'Concerts & Music'),
(16, 'alexrivers', 'Sports & Games'),
(17, 'msintaha', 'Food & Drink'),
(18, 'msintaha', 'Sports & Games'),
(19, 'msintaha', 'Comicon');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `date_posted` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `event_id`, `username`, `comment`, `date_posted`) VALUES
(1, 1, 'meow', 'Hello, I wanted to know if I can bring 4-5 people with me. sorry for letting you know at the last minute!', '2015-07-14 13:07:06'),
(2, 1, 'msintaha', 'Yea it''s completely fine meow!', '2015-07-14 13:07:06'),
(8, 1, 'msintaha', 'what?', '2015-07-14 13:53:06'),
(10, 1, 'msintaha', 'Nothing I guess', '2015-07-14 13:54:39'),
(11, 1, 'msintaha', 'Nothing I guess', '2015-07-14 13:54:46'),
(12, 1, 'msintaha', 'Nothing I guess', '2015-07-14 13:55:21'),
(13, 1, 'msintaha', 'Where?', '2015-07-14 13:56:21'),
(14, 4, 'alexrivers', 'Hope to see you all there!', '2015-07-26 10:33:06'),
(15, 4, 'alexrivers', 'Hope to see you all there!', '2015-07-26 10:34:50'),
(16, 4, 'alexrivers', 'Hope to see you all there!', '2015-07-26 10:35:53');

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
  `ticket` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `organizer`, `location`, `date_posted`, `category`, `city`, `contact`, `admin`, `start`, `end`, `ticket`) VALUES
(1, 'Ether', 'Within our magnificent Grand Courts, you’ll find key names in art history.\r\n\r\nOur galleries of 19th- and 20th-century European art includes a special presentation of figurative paintings by Pablo Picasso, Francis Bacon, Lucian Freud and Chaïm Soutine on loan from the Lewis Collection. These are shown alongside works from the Gallery’s collection, including ones by Vincent van Gogh, Ernst Ludwig Kirchner and Alberto Giacometti.\r\n\r\nIn other rooms you’ll find luminaries such Claude Lorrain, John Constable, Eugène Delacroix and Edward Burne-Jones. There are fine examples of Victorian and Edwardian', 'Kenneth Reed Collection', 'Dhanmondi', '2015-08-26', 'Arts & Culture', 'Dhaka', 'For further queries, contact: artsy@gmail.com', 'msintaha', '18:00:00', '21:00:00', 90),
(2, 'Dhaka Comicon', 'DHAKA COMICON is Bangladesh''s first-ever comic book convention (or comic-con; we just chose to call it DHAKA COMICON instead of DHAKA COMIC CON). It was created by a group of die-hard fans for other fans to gather, have fun, and celebrate the things they love - comic books, movies, pop culture, video games, and anime.\r\n\r\nFor years Bangladeshis dreamed of a comic-con in their own country. Finally, the dream became reality. DHAKA COMICON 2012 was held on 28th and 29th December in Dhaka. Over 7000 fans attended, many of dressing up as their favorite characters (called cosplay). \r\n\r\nIt was a weeke', 'The Crazy kids', 'Gulshan', '2015-08-30', 'Comicon', 'Dhaka', 'For more queries: info@dhakacomicon.com', 'msintaha', '09:00:00', '00:00:00', 70),
(4, 'ESF Football tournament', 'The experience of being away together on tour is as important as the actual tournament itself for many teams – there’s no better way to boost team morale. ESF is staged exclusively at the UK’s very best holiday resorts at Butlins and Haven, and Europe’s No. 1 leisure destination, Disneyland® Paris.\r\n\r\nAll 6 resorts offer superb sports and leisure facilities, fantastic evening entertainment packages, and have a great range of quality accommodation and dining options available. Whatever the result on the pitch, your team are sure to have a fantastic time away together on tour.\r\n\r\nESF are proud t', 'ESF', 'Banani', '2015-08-16', 'Sports & Games', 'Dhaka', 'http://www.footballfestivals.co.uk/youth-football-tour-venues/', 'alexrivers', '08:00:00', '12:00:00', 20),
(5, 'BUGMUN', 'The Model United Nations scene in Bangladesh has seen some rapid growth over the last few years but BRAC University Global Model United Nations (BUGMUN) 2014, held from 17th to 21st January, 2014, had superseded all its predecessors. Attended by over 410 students and young professionals as delegates and executive board members from Bangladesh as well as other countries like Costa Rica, Nepal, Nigeria, Pakistan, Indonesia and India, BUGMUN 2014 was a vibrant conference that has become the new epitome of MUN-ing in Bangladesh. The theme of the conference was “POST 2015: Envisioning a better futu', 'BRAC University', 'Bashundhara', '2015-07-14', 'Conferences & Seminar', 'Dhaka', 'www.bracu.ac.bd', 'meow', '09:00:00', '01:00:00', 60),
(6, 'FoodFest 2015', 'A festival where all your favorite restaurants collaborate and organize food eating competitions, various offers etc.', 'Dhaka Foodies', 'Lalmatia', '2015-07-15', 'Food & Drink', 'Dhaka', 'http://thedhakafoodies.com/', 'alexrivers', '15:44:00', '14:43:00', 50),
(7, 'LAKME Fashion Week', 'The fashion week you have all been waiting for! Join us and buy the tickets to get an oppurtunity to check the latest dresses in style at the moment', 'LAKME', 'Gulshan', '2015-08-15', 'Fashion & Beauty', 'Dhaka', 'info@lakmefashionbd.com', 'msintaha', '03:45:00', '02:04:00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `event`, `user`) VALUES
(1, '1', 'Mifta Sintaha'),
(2, '4', 'Mifta Sintaha'),
(3, '5', 'meow'),
(4, '1', 'alexrivers'),
(5, '4', 'alexrivers'),
(6, '4', 'msintaha'),
(7, '1', 'msintaha');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL,
  `event_id` int(10) NOT NULL,
  `path` varchar(150) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user`, `event_id`, `path`, `image_name`) VALUES
(1, 'Mifta Sintaha', 1, 'assets/uploaded/74cd363ce0f2e3d285dfaec0f55ee384.jpg', 'e6b0c7065143e99070d87bbff5b44b62'),
(2, 'Mifta Sintaha', 1, 'assets/uploaded/bleh.PNG', 'e970442b6dad5aaa8c474d8eb6dbd959'),
(3, 'meow', 5, 'assets/uploaded/bug.jpg', '42462f061e1118a872c3eefcf1eb1154'),
(4, 'alexrivers', 4, 'assets/uploaded/nike-football.jpg', '6e9c0edc36db23426ae47d2ffdee478d'),
(5, 'alexrivers', 6, 'assets/uploaded/Foodfest_250.png', '154494b8bd4b2c8b1302a07539f20fc0'),
(6, 'msintaha', 7, 'assets/uploaded/lakme.jpg', 'f54ea18e8d89c3cc4ffee11560f760fe'),
(7, 'msintaha', 2, 'assets/uploaded/dhk.jpg', 'f1c5fe886823dc00b518c038e2e127c2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `name`) VALUES
(1, 'msintaha', 'msintaha94@gmail.com', '5bd68cdedb545efc492f3e20fbbacc4d', 'Mifta Sintaha'),
(4, 'meow', 'meow@hotmail.com', 'da6523a488577c99148969e5841908ae', 'Meow meow'),
(5, 'a', 'a@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'a'),
(6, 'aa', 'asa@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'ah'),
(7, 'aas', 'asadd@gmail.com', 'af15d5fdacd5fdfea300e88a8e253e82', 'ahs'),
(8, 'sd', 'asasdd@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'sdf'),
(9, 'alexrivers', 'alex@yahoo.com', 'b75bd008d5fecb1f50cf026532e8ae67', 'Alex Rivers');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
