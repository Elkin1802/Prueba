-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema prueba/tecnica
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `prueba/tecnica` ;

-- -----------------------------------------------------
-- Schema prueba/tecnica
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prueba/tecnica` DEFAULT CHARACTER SET utf8mb4 ;
USE `prueba/tecnica` ;

-- -----------------------------------------------------
-- Table `prueba/tecnica`.`clasificador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba/tecnica`.`clasificador` (
  `codigo_segmento` INT(11) NOT NULL,
  `nombre_segmento` VARCHAR(50) NOT NULL,
  `codigo_familia` INT(11) NOT NULL,
  `nombre_familia` VARCHAR(50) NOT NULL,
  `codigo_clase` INT(11) NOT NULL,
  `nombre_clase` VARCHAR(45) NOT NULL,
  `codigo_producto` INT(11) NOT NULL,
  `nombre_producto` VARCHAR(45) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `prueba/tecnica`.`informacion_basica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba/tecnica`.`informacion_basica` (
  `id_informacion_basica` INT(11) NOT NULL AUTO_INCREMENT,
  `objeto` VARCHAR(45) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `moneda` VARCHAR(45) NOT NULL,
  `presupuesto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_informacion_basica`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `prueba/tecnica`.`cronograma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba/tecnica`.`cronograma` (
  `id_cronograma` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` DATE NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `Fecha_del_cierre` DATE NOT NULL,
  `hora_cierre` TIME NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `informacion_basica_id_informacion_basica` INT(11) NOT NULL,
  PRIMARY KEY (`id_cronograma`),
  CONSTRAINT `fk_cronograma_informacion_basica1`
    FOREIGN KEY (`informacion_basica_id_informacion_basica`)
    REFERENCES `prueba/tecnica`.`informacion_basica` (`id_informacion_basica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 60
DEFAULT CHARACTER SET = utf8mb4;

CREATE INDEX `fk_cronograma_informacion_basica1_idx` ON `prueba/tecnica`.`cronograma` (`informacion_basica_id_informacion_basica` ASC) ;


-- -----------------------------------------------------
-- Table `prueba/tecnica`.`documentacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba/tecnica`.`documentacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` TEXT NOT NULL,
  `titulo` TEXT NOT NULL,
  `contenido` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `prueba/tecnica`.`oferta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba/tecnica`.`oferta` (
  `idoferta` INT(11) NOT NULL AUTO_INCREMENT,
  `creador_oferta` VARCHAR(45) NOT NULL,
  `cronograma_id_cronograma` INT(11) NOT NULL,
  PRIMARY KEY (`idoferta`),
  CONSTRAINT `fk_oferta_cronograma`
    FOREIGN KEY (`cronograma_id_cronograma`)
    REFERENCES `prueba/tecnica`.`cronograma` (`id_cronograma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;

CREATE INDEX `fk_oferta_cronograma_idx` ON `prueba/tecnica`.`oferta` (`cronograma_id_cronograma` ASC) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;