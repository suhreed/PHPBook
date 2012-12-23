CREATE TABLE `answers` (
  `aid` tinyint(3) unsigned NOT NULL auto_increment,
  `qid` tinyint(4) NOT NULL default '0',
  `atitle` varchar(255) NOT NULL default '',
  `acount` int(11) NOT NULL default '0',
  PRIMARY KEY  (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
