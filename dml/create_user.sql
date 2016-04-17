CREATE TABLE IF NOT EXISTS `rentacar`.`user` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`name` VARCHAR(100) NOT NULL ,
	`email` VARCHAR(100) NOT NULL ,
	`password` VARCHAR(100) NOT NULL ,
	`tel` VARCHAR(20) NULL ,
	`birth` DATE NULL ,
	`activation_key` VARCHAR(100) NULL ,
	`created_at` DATETIME NOT NULL ,
	`updated_at` DATETIME NOT NULL ,
	PRIMARY KEY (`id`) )
ENGINE = InnoDB;
