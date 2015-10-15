ALTER TABLE item DROP equipment_name;
ALTER TABLE  `item` CHANGE  `name`  `equipment_name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE  `item` ADD  `department_id` INT NOT NULL AFTER  `description` ;
ALTER TABLE  `item` ADD  `resolution` VARCHAR( 255 ) NOT NULL AFTER  `model` ;
ALTER TABLE  `item` ADD  `calibration_range` VARCHAR( 255 ) NOT NULL AFTER  `resolution` ;

ALTER TABLE  `item` ADD  `attb1_1` CHAR( 1 ) NOT NULL AFTER  `id_no` ,
ADD  `attb1_2` CHAR( 1 ) NOT NULL AFTER  `attb1_1` ,
ADD  `attb1_3` CHAR( 1 ) NOT NULL AFTER  `attb1_2` ,
ADD  `attb1_4` CHAR( 1 ) NOT NULL AFTER  `attb1_3` ,
ADD  `attb1_5` CHAR( 1 ) NOT NULL AFTER  `attb1_4` ,
ADD  `attb1_6` CHAR( 1 ) NOT NULL AFTER  `attb1_5` ,
ADD  `attb1_6_other` CHAR( 1 ) NOT NULL AFTER  `attb1_6` ,
ADD  `attb2_1` CHAR( 1 ) NOT NULL AFTER  `attb1_6_other` ,
ADD  `attb2_2` CHAR( 1 ) NOT NULL AFTER  `attb2_1` ,
ADD  `attb2_3` CHAR( 1 ) NOT NULL AFTER  `attb2_2` ,
ADD  `attb2_4` CHAR( 1 ) NOT NULL AFTER  `attb2_3` ,
ADD  `attb2_4_other` CHAR( 1 ) NOT NULL AFTER  `attb2_4` ;

ALTER TABLE  `item` ADD  `calibrate_result` CHAR( 1 ) NOT NULL AFTER  `attb2_4_other` ;
ALTER TABLE  `item` ADD  `iso017025` CHAR( 1 ) NOT NULL AFTER  `calibrate_result` ;
ALTER TABLE  `item` ADD  `cer_pdf` VARCHAR( 255 ) NOT NULL AFTER  `cert_no` ;

ALTER TABLE  `item` ADD  `item_code` VARCHAR( 30 ) NOT NULL AFTER  `id` ;
ALTER TABLE  `item` ADD  `item_code_prefix` VARCHAR( 10 ) NOT NULL AFTER  `id` ;
ALTER TABLE  `item` ADD  `item_code_postfix` VARCHAR( 2 ) NOT NULL AFTER  `item_code` ;

ALTER TABLE  `item` CHANGE  `attb1_6_other`  `attb1_6_other` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE  `attb2_4_other`  `attb2_4_other` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL