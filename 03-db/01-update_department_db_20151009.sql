ALTER TABLE  `department` ADD  `is_in_lab` CHAR( 1 ) NOT NULL AFTER  `description` ,
ADD  `is_on_site` CHAR( 1 ) NOT NULL AFTER  `is_in_lab` ;