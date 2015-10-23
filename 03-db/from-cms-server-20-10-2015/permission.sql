-- phpMyAdmin SQL Dump
-- version 4.0.10.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 20 ต.ค. 2015  21:49น.
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
-- โครงสร้างตาราง `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- dump ตาราง `permission`
--

INSERT INTO `permission` (`id`, `title`, `value`, `create_dttm`, `update_dttm`, `publish`, `create_person`) VALUES
(1, 'Administrator', '', '2015-08-29 10:18:45', '2015-08-29 10:18:48', '1', 0),
(2, 'Management', '', '2015-08-29 10:19:01', '2015-08-29 10:19:05', '1', 0),
(3, 'Accounting', '', '2015-08-29 10:20:04', '2015-08-29 10:20:07', '1', 0),
(4, 'Certificate', '', '2015-08-29 10:20:16', '2015-08-29 10:20:18', '1', 0),
(5, 'Lab', '', '2015-08-29 10:20:37', '2015-08-29 10:20:39', '1', 0),
(6, 'Store', '', '2015-08-29 10:20:54', '2015-08-29 10:20:58', '1', 0),
(7, 'Sale', '', '2015-08-29 10:21:16', '2015-08-29 10:21:19', '1', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
