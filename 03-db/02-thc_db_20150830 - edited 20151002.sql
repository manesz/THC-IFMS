-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 30, 2015 at 09:47 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `id3ac0rn3r_demothc`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `department`
-- 

CREATE TABLE `department` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `department`
-- 

INSERT INTO `department` VALUES (1, 'การตลาด', 'ทดสอบเพิ่มตำแหน่งการตลาด 2', '2015-08-29 12:21:17', '2015-08-29 12:45:56', '0', 1);
INSERT INTO `department` VALUES (2, 'การจัดการ', 'ทดสอบการจัดการ', '2015-08-29 12:29:04', '2015-08-29 12:29:04', '1', 1);
INSERT INTO `department` VALUES (3, 'การตลาด', 'นะครับ', '2015-08-29 12:54:58', '2015-08-29 12:54:58', '1', 1);
INSERT INTO `department` VALUES (4, 'ประชาสัมพันธ์', 'ทดสอบ', '2015-08-29 13:09:51', '2015-08-29 13:10:26', '1', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `item`
-- 

CREATE TABLE `item` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `model` varchar(255) NOT NULL,
  `maker` varchar(255) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `control_no` varchar(255) NOT NULL,
  `wo_no` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `calibration_point` varchar(255) NOT NULL,
  `cert_no` varchar(255) NOT NULL,
  `inv_no` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `status` char(1) NOT NULL,
  `qty` int(11) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `receive_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `item`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `lot_no`
-- 

CREATE TABLE `lot_no` (
  `id` int(11) NOT NULL auto_increment,
  `lot_no` varchar(50) NOT NULL,
  `receieve_dttm` datetime NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `lot_no`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `map_quotation_item_lotno`
-- 

CREATE TABLE `map_quotation_item_lotno` (
  `id` int(11) NOT NULL auto_increment,
  `receieve_dttm` datetime NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `lot_no_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `map_quotation_item_lotno`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `member`
-- 

CREATE TABLE `member` (
  `id` int(11) NOT NULL auto_increment,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image_profile` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `is_active` char(1) NOT NULL,
  `publish` char(1) NOT NULL,
  `department_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `member`
-- 

INSERT INTO `member` VALUES (1, 'Suwat', 'Redeemak', '029630127', '0818598538', 'suwat@cmscompact.com', 'administrator.jpg', 'administrator', '012300', '2015-08-29 10:27:37', '2015-08-29 22:03:52', '1', '1', 3, 1, 2, 1);
INSERT INTO `member` VALUES (2, 'สุวัฒน์', 'รีดีจังนะ', '029632222', '0818584854', 'ton_geng@hotmail.com', '', 'tongeng', '', '2015-08-29 15:52:46', '2015-08-29 16:44:50', '1', '0', 2, 2, 2, 1);
INSERT INTO `member` VALUES (3, 'สุวัฒน์', 'ตกถังดี', '029633321', '08181151515', 'ton_geng@hotmail.com', 'tongeng77', 'tongeng77', '119240', '2015-08-29 21:00:28', '2015-08-29 21:00:28', '1', '1', 3, 3, 2, 1);
INSERT INTO `member` VALUES (4, 'สมหมาย', 'สายหมอง', '039251524', '085454525', 'kapook@mthai.com', 'sssss.jpg', 'sssss', '119240', '2015-08-29 21:31:48', '2015-08-29 21:42:25', '1', '1', 4, 7, 2, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `permission`
-- 

CREATE TABLE `permission` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `permission`
-- 

INSERT INTO `permission` VALUES (1, 'Administrator', '', '2015-08-29 10:18:45', '2015-08-29 10:18:48', '1', 0);
INSERT INTO `permission` VALUES (2, 'Management', '', '2015-08-29 10:19:01', '2015-08-29 10:19:05', '1', 0);
INSERT INTO `permission` VALUES (3, 'Accounting', '', '2015-08-29 10:20:04', '2015-08-29 10:20:07', '1', 0);
INSERT INTO `permission` VALUES (4, 'Certificate', '', '2015-08-29 10:20:16', '2015-08-29 10:20:18', '1', 0);
INSERT INTO `permission` VALUES (5, 'Lab', '', '2015-08-29 10:20:37', '2015-08-29 10:20:39', '1', 0);
INSERT INTO `permission` VALUES (6, 'Store', '', '2015-08-29 10:20:54', '2015-08-29 10:20:58', '1', 0);
INSERT INTO `permission` VALUES (7, 'Sale', '', '2015-08-29 10:21:16', '2015-08-29 10:21:19', '1', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `position`
-- 

CREATE TABLE `position` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `position`
-- 

INSERT INTO `position` VALUES (1, 'ผู้จัดการฝ่ายการตลาด-', 'sdfsdfsdf-', '2015-08-29 13:13:55', '2015-08-29 13:14:20', '0', 1);
INSERT INTO `position` VALUES (2, 'พนักงานขาย', 'ทดสอบ', '2015-08-29 13:14:12', '2015-08-29 13:14:12', '1', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `quotation`
-- 

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL auto_increment,
  `quotation_no` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `quotation`
-- 

