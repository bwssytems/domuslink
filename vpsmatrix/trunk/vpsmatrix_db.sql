-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2008 at 12:01 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vpsmatrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(128) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`id`, `name`) VALUES
(1, 'North America'),
(2, 'South America'),
(3, 'Europe'),
(4, 'Asia'),
(5, 'Africa'),
(6, 'Oceania');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `continent_id` tinyint(3) unsigned NOT NULL,
  `name` varchar(128) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `continent_id`, `name`) VALUES
(1, 1, 'Canada'),
(2, 1, 'USA'),
(3, 2, 'Brazil'),
(4, 3, 'Portugal'),
(5, 3, 'Spain'),
(6, 3, 'France'),
(7, 3, 'Holland'),
(8, 3, 'Italy'),
(9, 3, 'UK'),
(10, 4, 'China'),
(11, 4, 'Japan'),
(12, 6, 'Australia'),
(13, 6, 'New Zeland');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `abbr` varchar(4) collate latin1_general_ci NOT NULL,
  `desc` varchar(128) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `abbr`, `desc`) VALUES
(1, 'USD', 'United States Dollars'),
(2, 'EUR', 'Euro'),
(3, 'GBP', 'Great British Pound');

-- --------------------------------------------------------

--
-- Table structure for table `datacenter`
--

CREATE TABLE IF NOT EXISTS `datacenter` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `provider_id` tinyint(3) unsigned NOT NULL,
  `location` varchar(128) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `datacenter`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` tinyint(4) unsigned NOT NULL auto_increment,
  `provider_id` tinyint(3) unsigned NOT NULL,
  `reference` varchar(128) collate latin1_general_ci NOT NULL,
  `hd` varchar(32) collate latin1_general_ci default NULL,
  `bandwidth` varchar(32) collate latin1_general_ci default NULL,
  `ram` varchar(32) collate latin1_general_ci default NULL,
  `pc` varchar(255) collate latin1_general_ci default NULL,
  `os` varchar(255) collate latin1_general_ci default NULL,
  `ips` tinyint(4) unsigned default NULL,
  `domains` tinyint(4) unsigned default NULL,
  `backup` varchar(64) collate latin1_general_ci default NULL,
  `ctrl_panel` varchar(255) collate latin1_general_ci default NULL,
  `dns` varchar(128) collate latin1_general_ci default NULL,
  `currency_id` tinyint(4) unsigned NOT NULL,
  `setup_fee` decimal(10,0) default NULL,
  `monthly_fee` decimal(10,0) default NULL,
  `yearly_fee` decimal(10,0) default NULL,
  `add_date` datetime NOT NULL,
  `upd_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `chg_who` tinyint(4) unsigned NOT NULL,
  `notes` blob,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `provider_id`, `reference`, `hd`, `bandwidth`, `ram`, `pc`, `os`, `ips`, `domains`, `backup`, `ctrl_panel`, `dns`, `currency_id`, `setup_fee`, `monthly_fee`, `yearly_fee`, `add_date`, `upd_date`, `chg_who`, `notes`) VALUES
(4, 1, 'test', '10', '10', '10', 'also', 'os', NULL, NULL, 'various', NULL, NULL, 1, '10', '10', '10', '2007-01-01 00:00:00', '2008-05-10 03:44:06', 0, 0x6e6f6e65);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(256) collate latin1_general_ci NOT NULL,
  `country_id` tinyint(3) unsigned NOT NULL,
  `url` varchar(128) collate latin1_general_ci NOT NULL,
  `views` mediumint(8) unsigned NOT NULL default '0',
  `compares` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `name`, `country_id`, `url`, `views`, `compares`) VALUES
(1, 'Slicehost', 2, 'slicehost.com', 0, 0),
(2, 'Vexxhost', 2, 'vexxhost.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `xchg_rate`
--

CREATE TABLE IF NOT EXISTS `xchg_rate` (
  `id` tinyint(4) NOT NULL auto_increment,
  `from` tinyint(3) unsigned NOT NULL,
  `to` tinyint(3) unsigned NOT NULL,
  `rate` decimal(3,2) NOT NULL,
  `upd_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `xchg_rate`
--

INSERT INTO `xchg_rate` (`id`, `from`, `to`, `rate`, `upd_date`) VALUES
(1, 1, 2, '0.65', '2008-05-09 00:23:00'),
(2, 1, 3, '0.51', '2008-05-09 00:33:21'),
(3, 2, 1, '0.51', '2008-05-09 00:34:51'),
(4, 2, 3, '0.78', '2008-05-09 00:35:15'),
(5, 3, 1, '1.95', '2008-05-09 00:38:02'),
(6, 3, 2, '1.26', '2008-05-09 00:38:02');
