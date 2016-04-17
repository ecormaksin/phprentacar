CREATE TABLE IF NOT EXISTS `rentacar`.`car_class` (
	`id` INT NOT NULL ,
	`name` VARCHAR(20) NOT NULL ,
	`car_types` VARCHAR(100) NOT NULL ,
	`seats` VARCHAR(20) NOT NULL ,
	`image` VARCHAR(255) NULL ,
	`price3` DECIMAL(9,3) NOT NULL ,
	`price6` DECIMAL(9,3) NOT NULL ,
	`price12` DECIMAL(9,3) NOT NULL ,
	`price24` DECIMAL(9,3) NOT NULL ,
	`insurance_price` DECIMAL(9,3) NOT NULL ,
	`created_at` DATETIME NOT NULL ,
	`updated_at` DATETIME NOT NULL ,
	PRIMARY KEY (`id`) )
ENGINE = InnoDB;
