-- phpMyAdmin SQL Dump
-- version 4.0.10.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 20 ต.ค. 2015  21:47น.
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
-- โครงสร้างตาราง `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- dump ตาราง `position`
--

INSERT INTO `position` (`id`, `title`, `description`, `create_dttm`, `update_dttm`, `publish`, `create_person`) VALUES
(1, 'ผู้จัดการฝ่ายการตลาด-', 'sdfsdfsdf-', '2015-08-29 13:13:55', '2015-08-29 13:14:20', '0', 1),
(2, 'Managing Director', '', '2015-08-29 13:14:12', '2015-10-10 15:16:04', '1', 5),
(3, 'QA Manager', '', '2015-10-10 15:17:02', '2015-10-10 15:17:02', '1', 5),
(4, 'Marketing Manager', '', '2015-10-10 15:17:21', '2015-10-10 15:17:28', '1', 5),
(5, 'Head of Support Sale', '', '2015-10-10 15:17:57', '2015-10-10 15:17:57', '1', 5),
(6, 'Head of Accounting', '', '2015-10-10 15:18:07', '2015-10-10 15:18:07', '1', 5),
(7, 'Head of Certification', '', '2015-10-10 15:18:27', '2015-10-10 15:18:27', '1', 5),
(8, 'Technical Manager', '', '2015-10-10 15:19:47', '2015-10-10 15:19:55', '1', 5),
(9, 'Technical', '', '2015-10-10 15:20:07', '2015-10-10 15:20:07', '1', 5),
(10, 'Admin of Certification', '', '2015-10-10 15:20:37', '2015-10-10 15:20:37', '1', 5),
(11, 'Admin of Marketing', '', '2015-10-10 15:20:48', '2015-10-10 15:20:48', '1', 5),
(12, 'Admin of Accounting', '', '2015-10-10 15:21:22', '2015-10-10 15:21:22', '1', 5),
(13, 'Admin of Store', '', '2015-10-10 15:21:51', '2015-10-10 15:21:51', '1', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
