CREATE TABLE IF NOT EXISTS `rentacar`.`reservation` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`user_id` INT NOT NULL ,
	`car_class_id` INT NOT NULL ,
	`departure_location_id` INT NOT NULL ,
	`return_location_id` INT NOT NULL ,
	`departure_at` DATETIME NOT NULL ,
	`return_at` DATETIME NOT NULL ,
	`use_insurance` TINYINT NOT NULL ,
	`car_subtotal` DECIMAL(9,3) NULL ,
	`option_subtotal` DECIMAL(9,3) NULL ,
	`total_amount` DECIMAL(9,3) NULL ,
	`note` TEXT NULL ,
	`created_at` DATETIME NOT NULL ,
	`updated_at` DATETIME NOT NULL ,
	PRIMARY KEY (`id`),
	INDEX `fk_reservation_user` (`user_id` ASC) ,
	INDEX `fk_reservation_car_type1` (`car_class_id` ASC) ,
	INDEX `fk_reservation_location1` (`departure_location_id` ASC) ,
	INDEX `fk_reservation_location2` (`return_location_id` ASC) ,
	CONSTRAINT `fk_reservation_user`
		FOREIGN KEY (`user_id`)
		REFERENCES `rentacar`.`user` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_reservation_car_type1`
		FOREIGN KEY (`car_class_id`)
		REFERENCES `rentacar`.`car_class` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_reservation_location1`
		FOREIGN KEY (`departure_location_id`)
		REFERENCES `rentacar`.`location` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_reservation_location2`
		FOREIGN KEY (`return_location_id`)
		REFERENCES `rentacar`.`location` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;
