-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` tinyint(3) unsigned NOT NULL auto_increment,
  `qtitle` varchar(255) NOT NULL default '',
  `qdate` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
