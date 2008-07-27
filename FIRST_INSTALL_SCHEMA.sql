-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 19, 2007 at 05:13 PM
-- Server version: 5.0.37
-- PHP Version: 5.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `dropbin`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `drops`
-- 

CREATE TABLE `drops` (
  `id` int(50) NOT NULL auto_increment,
  `summary` varchar(32) collate utf8_unicode_ci default NULL,
  `date` datetime NOT NULL,
  `text` longtext collate utf8_unicode_ci NOT NULL,
  `ip` varchar(50) collate utf8_unicode_ci default NULL,
  `lang` varchar(50) collate utf8_unicode_ci default NULL,
  `editable` tinyint(4) NOT NULL default '0',
  `private` tinyint(4) NOT NULL default '0',
  `passkey` varchar(24) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;