-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2012 at 11:36 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `web` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `fname`, `lname`, `email`, `username`, `twitter`, `web`, `password`, `profile`, `photo`) VALUES
(1, 'Borhan', 'Uddin', 'borhan@suhreedsarkar.com', 'borhan', 'borhan', 'www.borhan.me', '', 'I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. \r\nI am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. \r\nI am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. \r\nI am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. I am a test writer. ', 'images/photo1.jpg'),
(2, 'Suhreeed', 'Sarkar', 'suhreed@suhreedsarkar.com', 'suhreed', 'suhreed', 'www.suhreedsarkar.com', '', 'I am a technical writer. I have published around 20 books. I am a technical writer. I have published around 20 books. I am a technical writer. I have published around 20 books. I am a technical writer. I have published around 20 books. I am a technical writer. I have published around 20 books.\r\n\r\nI am a technical writer. I have published around 20 books. I am a technical writer. I have published around 20 books. I am a technical writer. I have published around 20 books. I am a technical writer. I have published around 20 books. I am a technical writer. I have published around 20 books.', 'images/photo1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `categories_posts`
--

CREATE TABLE IF NOT EXISTS `categories_posts` (
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_posts`
--

INSERT INTO `categories_posts` (`category_id`, `post_id`) VALUES
(1, 2),
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `author_id`, `created`, `modified`) VALUES
(1, 'What is PHP?', 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.\r\n\r\nWhat distinguishes PHP from something like client-side JavaScript is that the code is executed on the server, generating HTML which is then sent to the client. The client would receive the results of running that script, but would not know what the underlying code was. You can even configure your web server to process all your HTML files with PHP, and then there''s really no way that users can tell what you have up your sleeve.\r\n\r\nThe best things in using PHP are that it is extremely simple for a newcomer, but offers many advanced features for a professional programmer. Don''t be afraid reading the long list of PHP''s features. You can jump in, in a short time, and start writing simple scripts in a few hours.', 2, '2012-08-25 05:05:15', '2012-08-25 00:00:00'),
(2, 'What is Joomla?', 'Joomla! is a award winning content management system. It is used for different types of web applications. Joomla! is highly extensible and you can extend its functionality by using extensions. There are five types of extensions - templates, components, modules, plugins and languages.\r\n\r\nYou can get a free copy of Joomla! from http://www.joomla.org', 1, '2012-08-21 06:04:14', '2012-08-23 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
