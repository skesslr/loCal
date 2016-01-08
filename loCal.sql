-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 10:14 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finalProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE IF NOT EXISTS `calendars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `calendar_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `calendar_name` (`calendar_name`),
  UNIQUE KEY `link_2` (`link`),
  FULLTEXT KEY `calendar_name_2` (`calendar_name`),
  FULLTEXT KEY `link` (`link`),
  FULLTEXT KEY `calendar_name_3` (`calendar_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `user_id`, `calendar_name`, `link`) VALUES
(46, 44, 'Test', 'college.harvard.edu_bbj48rrdrca7d9slp82f52oqio%40group.calendar.google.com'),
(48, 44, 'Applied Math 21a', 'apmth21a%2540gmail.com%26ctz%3DAmerica%2FChicago'),
(47, 54, 'Holidays', 'en.usa%2523holiday%2540group.v.calendar.google.com%26ctz%3DAmerica%2FNew_York'),
(52, 54, 'WhiteSox', 'mlb_4_%252543hicago%252B%252557hite%252B%252553ox%2523sports%2540group.v.calendar.google.com%26ctz%3DAmerica%2FChicago'),
(53, 54, 'Cubs', 'mlb_16_%252543hicago%252B%252543ubs%2523sports%2540group.v.calendar.google.com%26ctz%3DAmerica%2FChicago'),
(54, 54, 'Yankees', 'mlb_10_%25254eew%252B%252559ork%252B%252559ankees%2523sports%2540group.v.calendar.google.com%26ctz%3DAmerica%2FChicago'),
(55, 54, 'CardiffBlues', 'ec_8837_%252543ardiff%252B%252542lues%2523sports%2540group.v.calendar.google.com%26ctz%3DAmerica%2FChicago'),
(61, 54, 'Moon Phases', 'ht3jlfaac5lfd6263ulfh4tql8@group.calendar.google.com'),
(63, 54, 'Red Sox', 'bt11j9g0cs32an26hqbt7pf772ae440c%40import.calendar.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `calendar_id` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `user_id`, `calendar_id`, `folder_name`) VALUES
(20, 44, 0, 'School'),
(21, 44, 48, 'school'),
(23, 44, 46, 'school'),
(26, 54, 0, 'Misc.'),
(27, 54, 61, 'Misc.'),
(28, 54, 0, 'Sports'),
(29, 54, 54, 'Sports'),
(30, 54, 55, 'Sports'),
(31, 54, 55, 'Misc.');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `calendar_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `link`, `user_id`, `calendar_id`) VALUES
(35, '', 53, 33),
(54, '', 54, 47),
(56, '', 54, 61),
(58, '', 44, 47);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calendar_id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `calendar_id`, `tag`) VALUES
(72, 52, 'MLB'),
(73, 53, 'Chicago'),
(74, 53, 'Sports'),
(76, 54, 'Baseball'),
(78, 55, 'Rugby'),
(79, 52, 'Baseball'),
(80, 53, 'Baseball'),
(81, 61, 'Moon'),
(82, 61, 'New York'),
(83, 54, 'New York'),
(84, 54, 'NYC'),
(86, 63, 'Baseball'),
(87, 47, 'Fun'),
(88, 47, 'Religion'),
(89, 47, 'Gifts'),
(90, 54, 'sports'),
(91, 47, 'festive'),
(92, 47, 'home'),
(93, 47, 'US Holidays');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`) VALUES
(44, 'sam', '$2y$10$6NgjXGOfCEXdQ1nFA7XYyOSuCdroFJH87fCJC2tXPXDGp5SGZW3lW'),
(47, 'samuel', '$2y$10$D3t7iaUHUVgbZob54vIOSu9bCtGRmtUlD/5HWfN6pHPWac9ZlA7ke'),
(51, 'cpate', '$2y$10$.xBtTpTEcl6n8FZz.oTE/uzZX9lP3OKnoM9Iw2Y0iPgxg/GtAQzQW'),
(53, '1', '$2y$10$ppKhgnpza7JqKWTGxjUJTuJ3i9Bhxa6dXy2tJ4LlDTaPen.r.l5rS'),
(54, 'ayy', '$2y$10$Yi/eibyqS1BjNo19/sQ1YeLlj4voNiicXHr59mSk3itEvU8dh0jUi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
