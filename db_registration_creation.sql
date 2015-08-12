
CREATE SCHEMA IF NOT EXISTS `challenge_fixeads`;
USE `challenge_fixeads`;

-- -----------------------------------------------------
-- Table `challenge_fixeads`.`registration`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `challenge_fixeads`.`registration` ;

CREATE TABLE IF NOT EXISTS `challenge_fixeads`.`registration` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  `postcode` VARCHAR(255) NULL DEFAULT NULL,
  `city` VARCHAR(255) NULL DEFAULT NULL,
  `country` VARCHAR(255) NULL DEFAULT NULL,
  `nif` INT(11) NULL DEFAULT NULL COMMENT '',
  `telephone` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;

