-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema iwa_2015_zb_projekt
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema iwa_2015_zb_projekt
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `iwa_2015_zb_projekt` DEFAULT CHARACTER SET utf8 ;
USE `iwa_2015_zb_projekt` ;

CREATE USER 'iwa_2015' IDENTIFIED BY 'foi2015';
GRANT SELECT, INSERT, UPDATE, DELETE ON TABLE `iwa_2015_zb_projekt`.* 
TO 'iwa_2015'@'localhost' IDENTIFIED BY 'foi2015';

-- -----------------------------------------------------
-- Table `iwa_2015_zb_projekt`.`tip_korisnika`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2015_zb_projekt`.`tip_korisnika` (
  `tip_id` INT(10) NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`tip_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iwa_2015_zb_projekt`.`korisnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2015_zb_projekt`.`korisnik` (
  `korisnik_id` INT(10) NOT NULL AUTO_INCREMENT,
  `tip_id` INT(10) NOT NULL,
  `korisnicko_ime` VARCHAR(50) NOT NULL,
  `lozinka` VARCHAR(32) NOT NULL,
  `ime` VARCHAR(100) NOT NULL,
  `prezime` VARCHAR(100) NOT NULL,
  `email` VARCHAR(50) NULL,
  `slika` VARCHAR(200) NULL,
  PRIMARY KEY (`korisnik_id`),
  INDEX `fk_korisnik_tip_korisnika_idx` (`tip_id` ASC),
  CONSTRAINT `fk_korisnik_tip_korisnika`
    FOREIGN KEY (`tip_id`)
    REFERENCES `iwa_2015_zb_projekt`.`tip_korisnika` (`tip_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iwa_2015_zb_projekt`.`uzrast`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2015_zb_projekt`.`uzrast` (
  `uzrast_id` INT(10) NOT NULL AUTO_INCREMENT,
  `moderator_id` INT(10) NOT NULL,
  `naziv` VARCHAR(45) NOT NULL,
  `opis` VARCHAR(100) NULL,
  PRIMARY KEY (`uzrast_id`),
  INDEX `fk_uzrast_korisnik1_idx` (`moderator_id` ASC),
  CONSTRAINT `fk_uzrast_korisnik1`
    FOREIGN KEY (`moderator_id`)
    REFERENCES `iwa_2015_zb_projekt`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iwa_2015_zb_projekt`.`igra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2015_zb_projekt`.`igra` (
  `igra_id` INT(10) NOT NULL AUTO_INCREMENT,
  `uzrast_id` INT(10) NOT NULL,
  `naziv` VARCHAR(100) NOT NULL,
  `opis` TEXT NOT NULL,
  `datum` DATE NOT NULL,
  `vrijeme` TIME NOT NULL,
  `slika` TEXT NOT NULL,
  `video` TEXT NULL,
  INDEX `fk_igra_uzrast1_idx` (`uzrast_id` ASC),
  PRIMARY KEY (`igra_id`),
  CONSTRAINT `fk_igra_uzrast1`
    FOREIGN KEY (`uzrast_id`)
    REFERENCES `iwa_2015_zb_projekt`.`uzrast` (`uzrast_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iwa_2015_zb_projekt`.`pretplata`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2015_zb_projekt`.`pretplata` (
  `korisnik_id` INT(10) NOT NULL,
  `uzrast_id` INT(10) NOT NULL,
  `pretplacen` INT(1) NOT NULL,
  INDEX `fk_pretplata_korisnik1_idx` (`korisnik_id` ASC),
  INDEX `fk_pretplata_uzrast1_idx` (`uzrast_id` ASC),
  PRIMARY KEY (`korisnik_id`, `uzrast_id`),
  CONSTRAINT `fk_pretplata_korisnik1`
    FOREIGN KEY (`korisnik_id`)
    REFERENCES `iwa_2015_zb_projekt`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pretplata_uzrast1`
    FOREIGN KEY (`uzrast_id`)
    REFERENCES `iwa_2015_zb_projekt`.`uzrast` (`uzrast_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
