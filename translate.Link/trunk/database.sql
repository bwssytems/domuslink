--
-- translate.Link MySQL Database
--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(24) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `org_name` varchar(128) collate latin1_general_ci NOT NULL,
  `int_name` varchar(128) collate latin1_general_ci NOT NULL,
  `filename` varchar(32) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `org_name`, `int_name`, `filename`) VALUES
(1, 'Português', 'Portuguese', 'Portuguese'),
(2, 'Italiano', 'Italian', 'Italian'),
(3, 'Français', 'French', 'French'),
(4, 'Deutsch', 'German', 'German'),
(5, 'Svenska', 'Swedish', 'Swedish'),
(6, 'Español', 'Spanish', 'Spanish'),
(11, 'Magyar', 'Hungarian', 'Hungarian'),
(8, 'Suomi', 'Finnish', 'Finnish'),
(9, 'Norsk', 'Norwegian', 'Norwegian'),
(10, 'Polski', 'Polish', 'Polish');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `user_id` tinyint(3) unsigned NOT NULL,
  `action` varchar(64) collate latin1_general_ci NOT NULL,
  `language` varchar(128) collate latin1_general_ci default NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(128) collate latin1_general_ci NOT NULL,
  `email` varchar(128) collate latin1_general_ci NOT NULL,
  `username` varchar(128) collate latin1_general_ci NOT NULL,
  `password` varchar(32) collate latin1_general_ci NOT NULL,
  `status` varchar(2) collate latin1_general_ci NOT NULL,
  `group_id` tinyint(3) unsigned NOT NULL,
  `dt_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `notes` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `status`, `group_id`, `dt_added`, `notes`) VALUES
(1, 'admin', 'admin@email.com', 'admin', 'admin', 'AC', 1, '2008-07-21 22:58:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_lang`
--

CREATE TABLE IF NOT EXISTS `user_lang` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `user_id` tinyint(3) unsigned NOT NULL,
  `lang_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_lang`
--

INSERT INTO `user_lang` (`id`, `user_id`, `lang_id`) VALUES
(1, 1, 1);

