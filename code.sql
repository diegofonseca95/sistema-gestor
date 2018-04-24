-- MySQL Script generated by MySQL Workbench
-- Mon Apr 16 22:45:18 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`EstadoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`EstadoUsuario` (
  `idEstadoUsuario` INT NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstadoUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellidoPaterno` VARCHAR(100) NOT NULL,
  `apellidoMaterno` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(256) NOT NULL,
  `estado` INT NOT NULL DEFAULT 2,
  PRIMARY KEY (`idUsuario`),
  INDEX `estado_idx` (`estado` ASC),
  CONSTRAINT `estado_`
    FOREIGN KEY (`estado`)
    REFERENCES `mydb`.`EstadoUsuario` (`idEstadoUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Grupo` (
  `idGrupo` INT NOT NULL AUTO_INCREMENT,
  `nombreGrupo` TEXT NOT NULL,
  `descripcion` TEXT NOT NULL,
  PRIMARY KEY (`idGrupo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Proyecto` (
  `idProyecto` INT NOT NULL AUTO_INCREMENT,
  `nombreProyecto` TEXT NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`idProyecto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`EstadoTarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`EstadoTarea` (
  `idEstadoTarea` INT NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstadoTarea`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Tarea` (
  `idTarea` INT NOT NULL AUTO_INCREMENT,
  `descripcion` TEXT NOT NULL,
  `estado` INT NOT NULL,
  `puntaje` INT NOT NULL,
  `numeroTarea` INT NOT NULL,
  `nombreTarea` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idTarea`),
  INDEX `estado_idx` (`estado` ASC),
  CONSTRAINT `estado_tarea`
    FOREIGN KEY (`estado`)
    REFERENCES `mydb`.`EstadoTarea` (`idEstadoTarea`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Sprint`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Sprint` (
  `idSprint` INT NOT NULL AUTO_INCREMENT,
  `numeroSprint` INT NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NULL,
  PRIMARY KEY (`idSprint`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Archivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Archivo` (
  `idArchivo` INT NOT NULL AUTO_INCREMENT,
  `nombreArchivo` VARCHAR(150) NOT NULL,
  `fechaSubida` DATE NOT NULL,
  PRIMARY KEY (`idArchivo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`UsuarioGrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`UsuarioGrupo` (
  `idGrupo` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idGrupo`, `idUsuario`),
  INDEX `idusuario_idx` (`idUsuario` ASC),
  CONSTRAINT `idusuario_`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idGrupo_`
    FOREIGN KEY (`idGrupo`)
    REFERENCES `mydb`.`Grupo` (`idGrupo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`AdministradorGrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`AdministradorGrupo` (
  `idUsuario` INT NOT NULL,
  `idGrupo` INT NOT NULL,
  PRIMARY KEY (`idUsuario`, `idGrupo`),
  INDEX `idGrupo_idx` (`idGrupo` ASC),
  CONSTRAINT `idUsuario_AdminGrupo`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idGrupo_AdminGrupo`
    FOREIGN KEY (`idGrupo`)
    REFERENCES `mydb`.`Grupo` (`idGrupo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ProyectoGrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ProyectoGrupo` (
  `idGrupo` INT NOT NULL,
  `idProyecto` INT NOT NULL,
  `idProyectoGrupo` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idProyectoGrupo`),
  INDEX `idGrupo_idx` (`idGrupo` ASC),
  INDEX `idProyecto_idx` (`idProyecto` ASC),
  CONSTRAINT `idGrupo_ProyectoGrupo`
    FOREIGN KEY (`idGrupo`)
    REFERENCES `mydb`.`Grupo` (`idGrupo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idProyecto_ProyectoGrupo`
    FOREIGN KEY (`idProyecto`)
    REFERENCES `mydb`.`Proyecto` (`idProyecto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`UsuarioProyectoGrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`UsuarioProyectoGrupo` (
  `idProyectoGrupo` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  `idUsuarioProyectoGrupo` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idUsuarioProyectoGrupo`),
  INDEX `idUsuario_idx` (`idUsuario` ASC),
  CONSTRAINT `idUsuario_`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idProyectoGrupo_`
    FOREIGN KEY (`idProyectoGrupo`)
    REFERENCES `mydb`.`ProyectoGrupo` (`idProyectoGrupo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ArchivoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ArchivoUsuario` (
  `idUsuarioProyectoGrupo` INT NOT NULL,
  `idArchivo` INT NOT NULL,
  PRIMARY KEY (`idUsuarioProyectoGrupo`, `idArchivo`),
  INDEX `idArchivo_idx` (`idArchivo` ASC),
  CONSTRAINT `idUsuarioProyectoGrupo_`
    FOREIGN KEY (`idUsuarioProyectoGrupo`)
    REFERENCES `mydb`.`UsuarioProyectoGrupo` (`idUsuarioProyectoGrupo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idArchivo_`
    FOREIGN KEY (`idArchivo`)
    REFERENCES `mydb`.`Archivo` (`idArchivo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TareaProyectoGrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TareaProyectoGrupo` (
  `idTareaProyectoGrupo` INT NOT NULL AUTO_INCREMENT,
  `idTarea` INT NOT NULL,
  `idProyectoGrupo` INT NOT NULL,
  PRIMARY KEY (`idTareaProyectoGrupo`),
  INDEX `idTarea_idx` (`idTarea` ASC),
  INDEX `idProyectoGrupo_idx` (`idProyectoGrupo` ASC),
  CONSTRAINT `idTarea_F`
    FOREIGN KEY (`idTarea`)
    REFERENCES `mydb`.`Tarea` (`idTarea`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idProyectoGrupo_F`
    FOREIGN KEY (`idProyectoGrupo`)
    REFERENCES `mydb`.`ProyectoGrupo` (`idProyectoGrupo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TareaUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TareaUsuario` (
  `idUsuario` INT NOT NULL,
  `idTareaProyectoGrupo` INT NOT NULL,
  PRIMARY KEY (`idUsuario`, `idTareaProyectoGrupo`),
  INDEX `idTareaProyectoGrupo_idx` (`idTareaProyectoGrupo` ASC),
  CONSTRAINT `idTareaProyectoGrupo_F`
    FOREIGN KEY (`idTareaProyectoGrupo`)
    REFERENCES `mydb`.`TareaProyectoGrupo` (`idTareaProyectoGrupo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idUsuario_F`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`SprintProyectoGrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`SprintProyectoGrupo` (
  `idSprint` INT NOT NULL,
  `idProyectoGrupo` INT NOT NULL,
  PRIMARY KEY (`idSprint`, `idProyectoGrupo`),
  INDEX `idProyectoGrupo_idx` (`idProyectoGrupo` ASC),
  CONSTRAINT `idSprint_FK`
    FOREIGN KEY (`idSprint`)
    REFERENCES `mydb`.`Sprint` (`idSprint`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idProyectoGrupo_FK`
    FOREIGN KEY (`idProyectoGrupo`)
    REFERENCES `mydb`.`ProyectoGrupo` (`idProyectoGrupo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;