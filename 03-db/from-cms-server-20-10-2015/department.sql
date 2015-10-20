-- phpMyAdmin SQL Dump
-- version 4.0.10.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 20 ต.ค. 2015  21:51น.
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.1.73
-- รุ่นของ PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `cmscompact_thc`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_in_lab` char(1) NOT NULL,
  `is_on_site` char(1) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- dump ตาราง `department`
--

INSERT INTO `department` (`id`, `code`, `title`, `description`, `is_in_lab`, `is_on_site`, `create_dttm`, `update_dttm`, `publish`, `create_person`) VALUES
(1, '', 'การตลาด', 'ทดสอบเพิ่มตำแหน่งการตลาด 2', '', '', '2015-08-29 12:21:17', '2015-08-29 12:45:56', '0', 1),
(2, '', 'การตลาด / marketing', '', '', '', '2015-08-29 12:29:04', '2015-10-10 15:07:17', '1', 5),
(3, '', 'บัญชี / accounting', '', '', '', '2015-08-29 12:54:58', '2015-10-10 15:08:01', '1', 5),
(4, '', 'admin / certification', '', '', '', '2015-08-29 13:09:51', '2015-10-10 15:08:49', '1', 5),
(5, '', 'LAB : torque force', 'THF', '1', '', '2015-10-10 12:59:32', '2015-10-10 15:10:17', '1', 5),
(6, '', 'LAB : pressure', 'THP', '1', '', '2015-10-10 12:59:40', '2015-10-10 15:11:34', '1', 5),
(7, '', 'LAB : mass & balance', 'THM', '1', '', '2015-10-10 12:59:47', '2015-10-10 15:11:53', '1', 5),
(8, '', 'LAB : electric', 'THE', '1', '', '2015-10-10 15:12:20', '2015-10-10 15:12:20', '1', 5),
(9, '', 'LAB : dimension', 'THD', '1', '', '2015-10-10 15:12:35', '2015-10-10 15:12:35', '1', 5),
(10, '', 'LAB : temperature & huminity', 'THT', '1', '', '2015-10-10 15:13:02', '2015-10-10 15:13:19', '1', 5),
(11, '', 'LAB : chemical', 'THC', '1', '', '2015-10-10 15:13:47', '2015-10-10 15:13:47', '1', 5),
(12, '', 'LAB : glassware', 'THG', '1', '', '2015-10-10 15:14:05', '2015-10-10 15:14:05', '1', 5),
(13, '', 'internal calibration', 'THI - สอบเทียบภายใน', '1', '', '2015-10-10 17:03:52', '2015-10-10 17:04:49', '1', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
