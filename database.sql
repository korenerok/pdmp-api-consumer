CREATE SCHEMA `pdmp` ;


CREATE TABLE `pdmp`.`logs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `PatientID` VARCHAR(255) NOT NULL,
  `UserID` BIGINT NOT NULL,
  `Date` DATE NOT NULL DEFAULT (current_date()),
  `Time` TIME NOT NULL DEFAULT (current_time()),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);
