DROP SCHEMA IF EXISTS `blog_php`;
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema blog_php
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blog_php
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog_php` DEFAULT CHARACTER SET utf8 ;
USE `blog_php` ;

-- -----------------------------------------------------
-- Table `blog_php`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_php`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog_php`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_php`.`post` (
  `idpost` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(120) NOT NULL,
  `texto` TEXT NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`idpost`),
  INDEX `fk_post_usuario_idx` (`idusuario` ASC),
  CONSTRAINT `fk_post_usuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `blog_php`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

