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
