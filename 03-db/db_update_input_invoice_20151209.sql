ALTER TABLE `csr` ADD `invoice_no` VARCHAR(50) NOT NULL AFTER `quotation_no`;

ALTER TABLE `item` ADD `invoice_no` VARCHAR(50) NOT NULL AFTER `quotation_no`;