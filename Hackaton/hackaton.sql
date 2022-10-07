-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2021 at 05:31 PM
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
-- Database: `hackaton`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'Mashapole', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `Book_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Tittle` varchar(200) NOT NULL,
  `ISBN` varchar(200) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(40) NOT NULL,
  `Publisher` varchar(200) NOT NULL,
  `Student_Number` bigint(20) NOT NULL,
  PRIMARY KEY (`Book_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_Id`, `Tittle`, `ISBN`, `author_name`, `Description`, `Image`, `Publisher`, `Student_Number`) VALUES
(4, 'hdhhdhdhdh', 'jndndj-jdhdh', 'jsdjsjsbhshshhs', 'ddddddddddddddddddddddddddddddddd\r\ndddddddddddddddddddddddddddddddddd\r\ndddddddddddddddddddddddddddddddddddd\r\nddddddddddddddddddddddddddddddddddddd\r\nddddddddddddddddddddddddddddddddddddddd\r\nddddddddddddddddddddddddddddddddd\r\ndddd\r\nddd\r\nddd\r\nddd', 'c#.jpg', 'hdshhdhdhh', 20210001),
(5, 'hsdhhjshshs', 'hnshshspnhsbshbsbh-jshshsh', 'dddddd', 'xddddddd\r\ndddddd', 'R.jpg', 'hdhdhhdhdhdh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

DROP TABLE IF EXISTS `book_request`;
CREATE TABLE IF NOT EXISTS `book_request` (
  `req_id` int(10) NOT NULL AUTO_INCREMENT,
  `Reason` text NOT NULL,
  `Period` text NOT NULL,
  `DateOfRequest` text NOT NULL,
  `Student_Number` bigint(20) NOT NULL,
  `Book_ID` int(10) NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_temp`
--

DROP TABLE IF EXISTS `book_temp`;
CREATE TABLE IF NOT EXISTS `book_temp` (
  `temp_id` int(10) NOT NULL AUTO_INCREMENT,
  `Tittle` varchar(200) NOT NULL,
  `ISBN` varchar(200) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(40) NOT NULL,
  `Publisher` varchar(200) NOT NULL,
  `Student_Number` bigint(20) NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_registry`
--

DROP TABLE IF EXISTS `student_registry`;
CREATE TABLE IF NOT EXISTS `student_registry` (
  `Student_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Student_Number` bigint(10) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `sName` varchar(200) NOT NULL,
  `pName` varchar(200) NOT NULL,
  `Nationality` varchar(200) NOT NULL,
  `Gender` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  PRIMARY KEY (`Student_ID`),
  UNIQUE KEY `Student_Reg` (`Student_Number`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registry`
--

INSERT INTO `student_registry` (`Student_ID`, `Student_Number`, `fName`, `sName`, `pName`, `Nationality`, `Gender`, `email_address`, `contact`, `Password`) VALUES
(1, 20210000, '', '', '', '', '', '', '', '3f65c8a347fd296a86627fe6ea336a0b'),
(14, 20210001, 'Mashapole', 'Raletsemo', 'Mashapole Raletsemo', 'RSA', '', 'ralezemoshake@gmail.com', '+27657296720', '27c24c27b029df0debb7650d8a1ad0b8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
