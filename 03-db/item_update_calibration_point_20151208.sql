ALTER TABLE `item` DROP `calibration_point`;

ALTER TABLE `item` CHANGE `calibration_range` `calibration_point` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;