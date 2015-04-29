-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2015 at 01:55 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cloudfile`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_title` varchar(255) NOT NULL,
  `cms_body` longtext NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_of_file` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `group_priviledge` varchar(50) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_name`, `group_priviledge`) VALUES
(1, 'superusers', 'root'),
(2, 'members', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE IF NOT EXISTS `shares` (
  `share_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` longtext NOT NULL,
  `download_count` int(11) NOT NULL,
  `date_shared` datetime NOT NULL,
  `file_path` longtext NOT NULL,
  PRIMARY KEY (`share_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`share_id`, `file_id`, `user_id`, `file_name`, `download_count`, `date_shared`, `file_path`) VALUES
(1, 0, 13, 'mainlogo.psd', 2, '2014-11-25 14:54:46', 'C:\\wamp\\www\\cloudfile\\userfile\\43dd64eb4e9e937667cc20eb032ac906\\folder\\mainlogo.psd'),
(2, 0, 13, 'Book2.xlsx', 0, '2014-11-25 15:09:51', 'C:\\wamp\\www\\cloudfile\\userfile\\43dd64eb4e9e937667cc20eb032ac906\\wicked\\Book2.xlsx'),
(7, 0, 13, 'Doc2.docx', 0, '2014-11-25 15:49:55', 'C:\\wamp\\www\\cloudfile\\userfile\\43dd64eb4e9e937667cc20eb032ac906\\folder\\Doc2.docx'),
(4, 0, 13, 'AJALA ADEBOWALE IYANUOLUWA.docx', 0, '2014-11-25 15:18:44', 'C:\\wamp\\www\\cloudfile\\userfile\\43dd64eb4e9e937667cc20eb032ac906\\folder\\truths\\AJALA ADEBOWALE IYANUOLUWA.docx'),
(8, 0, 13, 'Book1.xlsx', 1, '2014-11-26 13:45:47', 'C:\\wamp\\www\\cloudfile\\userfile\\43dd64eb4e9e937667cc20eb032ac906\\folder\\truths\\Book1.xlsx'),
(9, 0, 13, 'urban security.jpg', 0, '2014-11-27 08:59:28', 'C:\\wamp\\www\\cloudfile\\userfile\\43dd64eb4e9e937667cc20eb032ac906\\urban security.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_service_verifier`
--

CREATE TABLE IF NOT EXISTS `user_service_verifier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification_no` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL,
  `has_been_registered` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `user_service_verifier`
--

INSERT INTO `user_service_verifier` (`id`, `identification_no`, `token`, `has_been_registered`) VALUES
(41, 'user0', '32550', 'no'),
(42, 'user1', '72193', 'yes'),
(43, 'user2', '03666', 'yes'),
(44, 'user3', '40243', 'yes'),
(45, 'user4', '72476', 'no'),
(46, 'user5', '94734', 'no'),
(47, 'user6', '41382', 'no'),
(48, 'user7', '72860', 'yes'),
(49, 'user8', '15524', 'no'),
(50, 'user9', '38877', 'no'),
(51, 'user10', '75078', 'no'),
(52, 'user11', '05595', 'no'),
(53, 'user12', '37869', 'no'),
(54, 'user13', '67625', 'no'),
(55, 'user14', '03114', 'no'),
(56, 'user15', '27838', 'no'),
(57, 'user16', '58703', 'no'),
(58, 'user17', '83462', 'no'),
(59, 'user18', '14418', 'no'),
(60, 'user19', '50083', 'no'),
(81, 'user20', '02026', 'no'),
(82, 'user21', '35088', 'no'),
(83, 'user22', '70480', 'no'),
(84, 'user23', '95911', 'no'),
(85, 'user24', '25876', 'no'),
(86, 'user25', '62263', 'no'),
(87, 'user26', '17169', 'no'),
(88, 'user27', '47943', 'no'),
(89, 'user28', '72486', 'no'),
(90, 'user29', '03990', 'no'),
(91, 'user30', '38447', 'no'),
(92, 'user31', '70297', 'no'),
(93, 'user32', '94710', 'no'),
(94, 'user33', '25825', 'no'),
(95, 'user34', '50331', 'no'),
(96, 'user35', '86160', 'no'),
(97, 'user36', '06032', 'no'),
(98, 'user37', '36964', 'no'),
(99, 'user38', '61747', 'no'),
(100, 'user39', '94790', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `location` longtext NOT NULL,
  `folder_path` longtext NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_encode` longtext NOT NULL,
  `last_login` mediumtext NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `group_id`, `fullname`, `location`, `folder_path`, `password`, `password_encode`, `last_login`) VALUES
(13, 'cuteangel1281@gmail.com', 2, 'Adeola Eletta', 'Ilorin, Pipe line, kwara state', '43dd64eb4e9e937667cc20eb032ac906', 'ee0c248d5e51c0033e19a4605c252928', 'YWRlb2xh', '2015-01-04 16:27:40'),
(14, 'onimisionipe@gmail.com', 2, 'onipe matt', 'Ilorin, Nigeria', '5daef2107d365a78cf77da1365581a68', 'db150c4ece5c57bf984f835b25b7fa43', 'YXV0b2JvdA==', '2014-11-06 11:01:42'),
(16, 'sanmathieu@gmail.com', 2, 'mathieu', 'ilorin', '2f1cd624630ee9d5f3b61c8a68b2750bmathieu', 'db150c4ece5c57bf984f835b25b7fa43', 'YXV0b2JvdA==', '2015-03-01 11:34:51'),
(17, 'sanma@yyy.com', 2, 'bunmi', 'ilorin', '3cf2b4f5776d143f153a03633c5ca87dbunmi', 'db150c4ece5c57bf984f835b25b7fa43', 'YXV0b2JvdA==', '2015-03-01 14:46:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
