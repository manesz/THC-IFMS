ALTER TABLE  `item` ADD  `item_code_day` VARCHAR( 2 ) NOT NULL AFTER  `item_code_prefix` ,
ADD  `item_code_month` VARCHAR( 2 ) NOT NULL AFTER  `item_code_day` ;

ALTER TABLE  `item` CHANGE  `item_code_postfix`  `item_code_year` VARCHAR( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;


CREATE TABLE `csr` (
  `id` int(11) NOT NULL auto_increment,
  `code_no` varchar(20) NOT NULL,
  `code_year` varchar(2) NOT NULL,
  `code_sale` varchar(5) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `cert_for` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



CREATE TABLE `csr_item` (
  `csr_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `is_status` char(1) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`csr_id`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
