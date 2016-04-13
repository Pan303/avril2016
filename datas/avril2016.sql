-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema avril2016
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `avril2016` ;

-- -----------------------------------------------------
-- Schema avril2016
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `avril2016` DEFAULT CHARACTER SET utf8 ;
USE `avril2016` ;

-- -----------------------------------------------------
-- Table `avril2016`.`droit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `avril2016`.`droit` ;

CREATE TABLE IF NOT EXISTS `avril2016`.`droit` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lintitule` VARCHAR(80) NULL,
  `ecrit` TINYINT(1) NULL DEFAULT 0,
  `modifie` TINYINT(1) NULL DEFAULT 0,
  `modifie_tous` TINYINT(1) NULL DEFAULT 0,
  `sup` TINYINT(1) NULL DEFAULT 0,
  `sup_tous` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `lintitule_UNIQUE` ON `avril2016`.`droit` (`lintitule` ASC);


-- -----------------------------------------------------
-- Table `avril2016`.`util`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `avril2016`.`util` ;

CREATE TABLE IF NOT EXISTS `avril2016`.`util` (
  `‪id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lelogin` VARCHAR(60) NULL,
  `lepass` VARCHAR(45) NULL,
  `lemail` VARCHAR(150) NULL,
  `droit_id` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`‪id`),
  CONSTRAINT `fk_util_droit`
    FOREIGN KEY (`droit_id`)
    REFERENCES `avril2016`.`droit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `lelogin_UNIQUE` ON `avril2016`.`util` (`lelogin` ASC);

CREATE INDEX `fk_util_droit_idx` ON `avril2016`.`util` (`droit_id` ASC);


-- -----------------------------------------------------
-- Table `avril2016`.`article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `avril2016`.`article` ;

CREATE TABLE IF NOT EXISTS `avril2016`.`article` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `letitre` VARCHAR(200) NULL,
  `ladesc` TEXT NULL,
  `ladate` TIMESTAMP NULL,
  `util_‪id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_article_util1`
    FOREIGN KEY (`util_‪id`)
    REFERENCES `avril2016`.`util` (`‪id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_article_util1_idx` ON `avril2016`.`article` (`util_‪id` ASC);


-- -----------------------------------------------------
-- Table `avril2016`.`rubrique`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `avril2016`.`rubrique` ;

CREATE TABLE IF NOT EXISTS `avril2016`.`rubrique` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lintitule` VARCHAR(80) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `lintitule_UNIQUE` ON `avril2016`.`rubrique` (`lintitule` ASC);


-- -----------------------------------------------------
-- Table `avril2016`.`article_has_rubrique`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `avril2016`.`article_has_rubrique` ;

CREATE TABLE IF NOT EXISTS `avril2016`.`article_has_rubrique` (
  `article_id` INT UNSIGNED NOT NULL,
  `rubrique_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`article_id`, `rubrique_id`),
  CONSTRAINT `fk_article_has_rubrique_article1`
    FOREIGN KEY (`article_id`)
    REFERENCES `avril2016`.`article` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_article_has_rubrique_rubrique1`
    FOREIGN KEY (`rubrique_id`)
    REFERENCES `avril2016`.`rubrique` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_article_has_rubrique_rubrique1_idx` ON `avril2016`.`article_has_rubrique` (`rubrique_id` ASC);

CREATE INDEX `fk_article_has_rubrique_article1_idx` ON `avril2016`.`article_has_rubrique` (`article_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
