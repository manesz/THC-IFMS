-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 03:55 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thc`
--

-- --------------------------------------------------------

--
-- Table structure for table `csr`
--

CREATE TABLE IF NOT EXISTS `csr` (
  `id` int(11) NOT NULL,
  `code_no` varchar(20) NOT NULL,
  `code_year` varchar(2) NOT NULL,
  `code_sale` varchar(5) NOT NULL,
  `quotation_no` varchar(50) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `cert_for` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL COMMENT '0=delete, 1=publish, 2=cancel',
  `customer_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `session_csr` varchar(50) NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=In-Lba, 2=On-Site',
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL,
  `item_code_prefix` varchar(10) NOT NULL,
  `item_code_day` varchar(2) NOT NULL,
  `item_code_month` varchar(2) NOT NULL,
  `item_code` varchar(30) NOT NULL,
  `item_code_year` varchar(2) NOT NULL,
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
  `publish` char(1) NOT NULL COMMENT '0=delete, 1=publish, 2=cancel',
  `customer_id` int(11) NOT NULL,
  `csr_id` int(11) NOT NULL,
  `session_csr` varchar(50) NOT NULL,
  `quotation_no` varchar(50) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_image`
--

CREATE TABLE IF NOT EXISTS `item_image` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csr`
--
ALTER TABLE `csr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_image`
--
ALTER TABLE `item_image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csr`
--
ALTER TABLE `csr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_image`
--
ALTER TABLE `item_image`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `customer` ADD `contact_name` VARCHAR(50) NOT NULL AFTER `email`;