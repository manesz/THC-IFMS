CREATE TABLE `quotation` (
  `id` int(11) NOT NULL auto_increment,
  `code_sale` varchar(5) NOT NULL,
  `code_year` varchar(2) NOT NULL,
  `code_month` varchar(2) NOT NULL,
  `code_no` varchar(4) NOT NULL,
  `code_revise` varchar(5) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;


CREATE TABLE `quotation_item` (
  `quotation_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `create_dttm` datetime NOT NULL,
  `update_dttm` datetime NOT NULL,
  `publish` char(1) NOT NULL,
  `create_person` int(11) NOT NULL,
  PRIMARY KEY  (`quotation_id`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; 
