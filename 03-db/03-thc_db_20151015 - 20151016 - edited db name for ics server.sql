-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `thc`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `customer`
-- 

CREATE TABLE `customer` (
  `id` int(11) NOT NULL auto_increment,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `tax_no` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `fax_no` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `customer`
-- 

INSERT INTO `customer` VALUES (1, 'บริษัท ซีเอ็มเอส คอมแพค จำกัด', '9/4 หมู่ 2 ถ.สุขาประชาสรรค์ 2 ซ.พระอินทร์ 4 ต.บางพูด อ.ปากเกร็ด จ.นนทบุรี 11120', '3220300623177', '029630127', '029630128', 'suwat@cmscompact.com', '2015-10-09 19:13:02', '2015-10-09 19:31:37', '1', 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `department`
-- 

CREATE TABLE `department` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_in_lab` char(1) NOT NULL,
  `is_on_site` char(1) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `department`
-- 

INSERT INTO `department` VALUES (1, 'การตลาด', 'ทดสอบเพิ่มตำแหน่งการตลาด 2', '', '', '2015-08-29 12:21:17', '2015-08-29 12:45:56', '0', 1);
INSERT INTO `department` VALUES (2, 'การจัดการ', 'ทดสอบการจัดการ', '1', '1', '2015-08-29 12:29:04', '2015-10-10 00:10:00', '1', 1);
INSERT INTO `department` VALUES (3, 'การตลาด', 'นะครับ', '', '', '2015-08-29 12:54:58', '2015-08-29 12:54:58', '1', 1);
INSERT INTO `department` VALUES (4, 'ประชาสัมพันธ์', 'ทดสอบ', '1', '1', '2015-08-29 13:09:51', '2015-10-10 00:10:07', '1', 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `item`
-- 

CREATE TABLE `item` (
  `id` int(11) NOT NULL auto_increment,
  `item_code_prefix` varchar(10) NOT NULL,
  `item_code` varchar(30) NOT NULL,
  `item_code_postfix` varchar(2) NOT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `resolution` varchar(255) NOT NULL,
  `calibration_range` varchar(255) NOT NULL,
  `maker` varchar(255) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `control_no` varchar(255) NOT NULL,
  `wo_no` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `item_accessories` text NOT NULL,
  `calibrate_result` char(1) NOT NULL,
  `iso017025` char(1) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `calibration_point` varchar(255) NOT NULL,
  `cert_no` varchar(255) NOT NULL,
  `cer_pdf` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `item`
-- 

INSERT INTO `item` VALUES (1, 'THD', '000001', '15', 'Test ITEM 01', '', 4, 'test Model', 'tes Resolution', 'testCalibration Range', '', '', 'Tes Serial No.', '', '', 'test ID No.', '7|9|13:ทดสอบอันอื่นๆ ข้อ  2.4|', 'B', '1', 'test Manufacturer', '', '12123', '', '12123', 'TEST NOTE \nnotset notes  sss', '', 250, '2015-10-10 01:34:42', '2015-10-10 01:34:42', '2015-10-15 19:48:15', '1', 1, 0);
INSERT INTO `item` VALUES (2, 'THD', '000002', '15', 'Test 2', '', 2, '', '', '', '', '', '', '', '', '', '', 'R', '0', '', '', '', '', '', '', '', 444, '2015-10-10 02:11:00', '2015-10-10 02:11:00', '2015-10-10 05:39:48', '1', 1, 0);
INSERT INTO `item` VALUES (3, 'THD', '000003', '15', 'fasfasf', '', 2, '', '', '', '', '', '', '', '', '', '', '', '1', 'dsfdsf', '', '', '', '', '', '', 0, '2015-10-15 19:18:20', '2015-10-15 19:18:20', '2015-10-15 19:18:20', '1', 1, 1);
INSERT INTO `item` VALUES (4, 'THD', '000004', '15', 'sdfsdf', '', 2, 'sdfsdf', '', '', '', '', '', '', '', '', '5|12:LERT|9|13:sdfsdf|', '', '0', 'asfdsfsdf', '', '', '', '', '', '', 55555, '2015-10-15 19:21:03', '2015-10-15 19:21:03', '2015-10-15 19:23:44', '1', 1, 0);
INSERT INTO `item` VALUES (5, 'THD', '000005', '15', 'dfsdf', '', 4, '', '', '', '', '', '', '', '', '', '7|12:TSE SDSFdf54|10|13:STSUS DEE|', '', '0', 'sdfdsfsdf', '', '', '', '', '', '', 0, '2015-10-15 19:24:24', '2015-10-15 19:24:24', '2015-10-15 19:24:24', '1', 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `item_accessories`
-- 

CREATE TABLE `item_accessories` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `require_data` enum('0','1') NOT NULL,
  `sort_order` int(3) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- dump ตาราง `item_accessories`
-- 

INSERT INTO `item_accessories` VALUES (1, 'อุปกรณ์เสริมของเครื่อง', '2015-10-15 09:32:00', '2015-10-15 10:10:13', '1', 0, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (2, 'การบรรจุหีบห่อเครื่องมือจากลูกค้า', '2015-10-15 09:32:32', '2015-10-15 09:32:32', '1', 0, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (3, 'สายไฟ Probe/Sensor, Data link', '2015-10-15 09:32:54', '2015-10-15 09:32:54', '1', 1, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (4, 'สาย Adapter, หม้อแปลงไฟฟ้า', '2015-10-15 09:33:08', '2015-10-15 09:33:08', '1', 1, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (5, 'ขั้วต่อเครื่องมือ', '2015-10-15 09:33:20', '2015-10-15 09:33:20', '1', 1, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (6, 'คู่มือการใช้งาน', '2015-10-15 09:33:34', '2015-10-15 09:33:34', '1', 1, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (7, 'Battery Charger', '2015-10-15 09:33:47', '2015-10-15 09:33:47', '1', 1, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (8, 'กล่องเครื่องมือ/ซองใส่เครื่อง', '2015-10-15 09:33:59', '2015-10-15 09:33:59', '1', 2, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (9, 'หุ้มด้วยพลาสติกกันกระแทกเครื่องมือ', '2015-10-15 09:34:12', '2015-10-15 09:34:12', '1', 2, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (10, 'กล่องกระดาษเครื่องมือ', '2015-10-15 09:34:44', '2015-10-15 09:34:44', '1', 2, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (11, 'wrwerdf', '2015-10-15 10:21:25', '2015-10-15 10:21:25', '0', 2, '0', 0, 1);
INSERT INTO `item_accessories` VALUES (12, 'อื่นๆ', '2015-10-15 10:44:56', '2015-10-15 10:48:56', '1', 1, '1', 0, 1);
INSERT INTO `item_accessories` VALUES (13, 'อื่นๆ', '2015-10-15 10:56:01', '2015-10-15 10:56:01', '1', 2, '1', 0, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `item_image`
-- 

CREATE TABLE `item_image` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `size` int(11) default NULL,
  `type` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `item_id` int(11) default NULL,
  `description` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `item_image`
-- 

INSERT INTO `item_image` VALUES (1, 'e (2).jpg', 47740, 'image/jpeg', NULL, 2, NULL);
INSERT INTO `item_image` VALUES (2, 'e (3).jpg', 47740, 'image/jpeg', NULL, 2, NULL);
INSERT INTO `item_image` VALUES (3, 'a (1).jpg', 55987, 'image/jpeg', NULL, 2, NULL);
INSERT INTO `item_image` VALUES (4, 'b (4).jpg', 58450, 'image/jpeg', NULL, 2, NULL);
INSERT INTO `item_image` VALUES (5, 'h (2).jpg', 34237, 'image/jpeg', NULL, 2, NULL);
INSERT INTO `item_image` VALUES (6, 'k (1).jpg', 79744, 'image/jpeg', NULL, 2, NULL);
INSERT INTO `item_image` VALUES (7, 'a (2).jpg', 55987, 'image/jpeg', NULL, 2, NULL);
INSERT INTO `item_image` VALUES (8, 'h (3).jpg', 34237, 'image/jpeg', NULL, 1, NULL);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `lot_no`
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
-- dump ตาราง `lot_no`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `map_quotation_item_lotno`
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
-- dump ตาราง `map_quotation_item_lotno`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `member`
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
-- dump ตาราง `member`
-- 

INSERT INTO `member` VALUES (1, 'Suwat', 'Redeemak', '029630127', '0818598538', 'suwat@cmscompact.com', 'administrator.jpg', 'administrator', '012300', '2015-08-29 10:27:37', '2015-08-29 22:03:52', '1', '1', 3, 1, 2, 1);
INSERT INTO `member` VALUES (2, 'สุวัฒน์', 'รีดีจังนะ', '029632222', '0818584854', 'ton_geng@hotmail.com', '', 'tongeng', '', '2015-08-29 15:52:46', '2015-08-29 16:44:50', '1', '0', 2, 2, 2, 1);
INSERT INTO `member` VALUES (3, 'สุวัฒน์', 'ตกถังดี', '029633321', '08181151515', 'ton_geng@hotmail.com', 'tongeng77', 'tongeng77', '119240', '2015-08-29 21:00:28', '2015-08-29 21:00:28', '1', '1', 3, 3, 2, 1);
INSERT INTO `member` VALUES (4, 'สมหมาย', 'สายหมอง', '039251524', '085454525', 'kapook@mthai.com', 'sssss.jpg', 'sssss', '119240', '2015-08-29 21:31:48', '2015-08-29 21:42:25', '1', '1', 4, 7, 2, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `permission`
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
-- dump ตาราง `permission`
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
-- โครงสร้างตาราง `position`
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
-- dump ตาราง `position`
-- 

INSERT INTO `position` VALUES (1, 'ผู้จัดการฝ่ายการตลาด-', 'sdfsdfsdf-', '2015-08-29 13:13:55', '2015-08-29 13:14:20', '0', 1);
INSERT INTO `position` VALUES (2, 'พนักงานขาย1', 'ทดสอบ', '2015-08-29 13:14:12', '2015-10-13 20:10:44', '1', 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `quotation`
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
-- dump ตาราง `quotation`
-- 

