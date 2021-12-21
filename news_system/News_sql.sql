CREATE TABLE `news` (
  `newsid` int(11) NOT NULL auto_increment,
  `dtime` datetime default NULL,
  `title` varchar(255) default NULL,
  `text1` text,
  `text2` text,
  PRIMARY KEY  (`newsid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;