-- Database: `mypoll`
--
-- --------------------------------------------------------
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` tinyint(3) unsigned NOT NULL auto_increment,
  `qid` tinyint(4) NOT NULL default '0',
  `atitle` varchar(255) NOT NULL default '',
  `acount` int(11) NOT NULL default '0',
  PRIMARY KEY  (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
--
-- Dumping data for table `answers`
--
INSERT INTO `answers` VALUES (1, 1, 'Excellent!', 0);
INSERT INTO `answers` VALUES (2, 1, 'Very Good!', 1);
INSERT INTO `answers` VALUES (3, 1, 'Satisfactory', 0);
INSERT INTO `answers` VALUES (4, 1, 'Not Bad', 1);
INSERT INTO `answers` VALUES (5, 1, 'What the hell is this', 0);
-- --------------------------------------------------------
--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` tinyint(3) unsigned NOT NULL auto_increment,
  `qtitle` varchar(255) NOT NULL default '',
  `qdate` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` VALUES (1, 'How do you rate this site?', '2005-10-15');
