CREATE TABLE IF NOT EXISTS `rentacar`.`location` (
	`id` INT NOT NULL ,
	`name` VARCHAR(255) NOT NULL ,
	`created_at` DATETIME NOT NULL ,
	`updated_at` DATETIME NOT NULL ,
	PRIMARY KEY (`id`) )
ENGINE = InnoDB;
