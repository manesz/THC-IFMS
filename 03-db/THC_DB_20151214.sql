-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 01:41 PM
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
  `invoice_no` varchar(50) NOT NULL,
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
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `tax_no` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `fax_no` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_in_lab` char(1) NOT NULL,
  `is_on_site` char(1) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
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
  `calibration_point` varchar(255) NOT NULL,
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
  `invoice_no` varchar(50) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_accessories`
--

CREATE TABLE IF NOT EXISTS `item_accessories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `require_data` enum('0','1') NOT NULL,
  `sort_order` int(3) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `lot_no`
--

CREATE TABLE IF NOT EXISTS `lot_no` (
  `id` int(11) NOT NULL,
  `lot_no` varchar(50) NOT NULL,
  `receieve_dttm` datetime NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `map_quotation_item_lotno`
--

CREATE TABLE IF NOT EXISTS `map_quotation_item_lotno` (
  `id` int(11) NOT NULL,
  `receieve_dttm` datetime NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `lot_no_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL,
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
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
  `id` int(11) NOT NULL,
  `code_sale` varchar(5) NOT NULL,
  `code_year` varchar(2) NOT NULL,
  `code_month` varchar(2) NOT NULL,
  `code_no` varchar(4) NOT NULL,
  `code_revise` varchar(5) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_item`
--

CREATE TABLE IF NOT EXISTS `quotation_item` (
  `quotation_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_status` char(1) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

CREATE TABLE IF NOT EXISTS `test1` (
  `id` varchar(2) NOT NULL,
  `title` varchar(50) NOT NULL
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
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_accessories`
--
ALTER TABLE `item_accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_image`
--
ALTER TABLE `item_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_no`
--
ALTER TABLE `lot_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_quotation_item_lotno`
--
ALTER TABLE `map_quotation_item_lotno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_item`
--
ALTER TABLE `quotation_item`
  ADD PRIMARY KEY (`quotation_id`,`item_id`);

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_accessories`
--
ALTER TABLE `item_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_image`
--
ALTER TABLE `item_image`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lot_no`
--
ALTER TABLE `lot_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `map_quotation_item_lotno`
--
ALTER TABLE `map_quotation_item_lotno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
