-- MySQL Script generated by MySQL Workbench
-- Mon May 29 14:54:53 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema kokapstrade
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kokapstrade
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kokapstrade` DEFAULT CHARACTER SET utf8 ;
USE `kokapstrade` ;

-- -----------------------------------------------------
-- Table `kokapstrade`.`Lietotaji`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kokapstrade`.`Lietotaji` (
  `lietotaji_id` INT NOT NULL AUTO_INCREMENT,
  `lietotajvards` VARCHAR(45) NOT NULL,
  `parole` VARCHAR(60) NOT NULL,
  `emails` VARCHAR(45) NOT NULL,
  `admins` TINYINT NULL,
  `klients` TINYINT NULL,
  `viesis` TINYINT NULL,
  PRIMARY KEY (`lietotaji_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kokapstrade`.`Klienti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kokapstrade`.`Klienti` (
  `Klients_id` INT NOT NULL AUTO_INCREMENT,
  `Vards` VARCHAR(45) NOT NULL,
  `Uzvards` VARCHAR(45) NOT NULL,
  `numurs` INT(8) NOT NULL,
  `Adrese` VARCHAR(90) NOT NULL,
  PRIMARY KEY (`Klients_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kokapstrade`.`Produkti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kokapstrade`.`Produkti` (
  `Produktu_id` INT NOT NULL AUTO_INCREMENT,
  `Nosaukums` VARCHAR(60) NOT NULL,
  `Apraksts` VARCHAR(200) NOT NULL,
  `Preces_cena` DECIMAL(6,2) NOT NULL,
  `skaits` INT NOT NULL,
  PRIMARY KEY (`Produktu_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kokapstrade`.`Sutijumu_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kokapstrade`.`Sutijumu_info` (
  `Sutijumu_info_id` INT NOT NULL AUTO_INCREMENT,
  `Skaits` INT NULL,
  `Preces_cena` DECIMAL(6,2) NULL,
  `id_produkti` INT NOT NULL,
  PRIMARY KEY (`Sutijumu_info_id`, `id_produkti`),
  INDEX `fk_Sutijumu_info_Produkti1_idx` (`id_produkti` ASC),
  CONSTRAINT `fk_Sutijumu_info_Produkti1`
    FOREIGN KEY (`id_produkti`)
    REFERENCES `kokapstrade`.`Produkti` (`Produktu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kokapstrade`.`Sutijumi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kokapstrade`.`Sutijumi` (
  `Sutijumi_id` INT NOT NULL AUTO_INCREMENT,
  `Datums` DATE NOT NULL,
  `Cena` DECIMAL(10,2) NOT NULL,
  `id_klients` INT NOT NULL,
  `info_id` INT NOT NULL,
  PRIMARY KEY (`Sutijumi_id`, `id_klients`, `info_id`),
  INDEX `fk_Sutijumi_Klienti_idx` (`id_klients` ASC) ,
  INDEX `fk_Sutijumi_Sutijumu_info1_idx` (`info_id` ASC) ,
  CONSTRAINT `fk_Sutijumi_Klienti`
    FOREIGN KEY (`id_klients`)
    REFERENCES `kokapstrade`.`Klienti` (`Klients_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sutijumi_Sutijumu_info1`
    FOREIGN KEY (`info_id`)
    REFERENCES `kokapstrade`.`Sutijumu_info` (`Sutijumu_info_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kokapstrade`.`Maksajumi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kokapstrade`.`Maksajumi` (
  `Maksajumi_id` INT NOT NULL AUTO_INCREMENT,
  `Sutijuma_datums` DATE NOT NULL,
  `Gala_cena` DECIMAL(10,2) NOT NULL,
  `Statuss` ENUM("Iesākts", "Pabeigts", "Neiesākts") NOT NULL,
  `id_sutijumi` INT NOT NULL,
  PRIMARY KEY (`Maksajumi_id`, `id_sutijumi`),
  INDEX `fk_Maksajumi_Sutijumi1_idx` (`id_sutijumi` ASC) ,
  CONSTRAINT `fk_Maksajumi_Sutijumi1`
    FOREIGN KEY (`id_sutijumi`)
    REFERENCES `kokapstrade`.`Sutijumi` (`Sutijumi_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;