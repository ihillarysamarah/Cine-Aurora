-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_cinema
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_cinema
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_cinema` DEFAULT CHARACTER SET utf8 ;
USE `bd_cinema` ;

-- -----------------------------------------------------
-- Table `bd_cinema`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_cinema`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `dt_nascimento` DATE NULL,
  `vendedor_id_vendedor` INT NOT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cinema`.`sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_cinema`.`sala` (
  `id_sala` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id_sala`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cinema`.`classificacaoIndicativa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_cinema`.`classificacaoIndicativa` (
  `idclassificacaoIndicativa` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idclassificacaoIndicativa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cinema`.`filme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_cinema`.`filme` (
  `id_filme` INT NOT NULL AUTO_INCREMENT,
  `nomefilme` VARCHAR(45) NULL,
  `duracao` INT NULL,
  `sala_id_sala` INT NOT NULL,
  `classificacaoIndicativa_idclassificacaoIndicativa` INT NOT NULL,
  PRIMARY KEY (`id_filme`),
  INDEX `fk_filme_sala1_idx` (`sala_id_sala` ASC) VISIBLE,
  INDEX `fk_filme_classificacaoIndicativa1_idx` (`classificacaoIndicativa_idclassificacaoIndicativa` ASC) VISIBLE,
  CONSTRAINT `fk_filme_sala1`
    FOREIGN KEY (`sala_id_sala`)
    REFERENCES `bd_cinema`.`sala` (`id_sala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_filme_classificacaoIndicativa1`
    FOREIGN KEY (`classificacaoIndicativa_idclassificacaoIndicativa`)
    REFERENCES `bd_cinema`.`classificacaoIndicativa` (`idclassificacaoIndicativa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cinema`.`compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_cinema`.`compra` (
  `id_compra` INT NOT NULL AUTO_INCREMENT,
  `filme_id_filme` INT NOT NULL,
  `cliente_id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_compra`),
  INDEX `fk_compra_filme1_idx` (`filme_id_filme` ASC) VISIBLE,
  INDEX `fk_compra_cliente1_idx` (`cliente_id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_compra_filme1`
    FOREIGN KEY (`filme_id_filme`)
    REFERENCES `bd_cinema`.`filme` (`id_filme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_cliente1`
    FOREIGN KEY (`cliente_id_cliente`)
    REFERENCES `bd_cinema`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cinema`.`poltrona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_cinema`.`poltrona` (
  `id_poltrona` INT NOT NULL AUTO_INCREMENT,
  `num_poltrona` INT NOT NULL,
  `sala_id_sala` INT NOT NULL,
  PRIMARY KEY (`id_poltrona`),
  INDEX `fk_poltrona_sala_idx` (`sala_id_sala` ASC) VISIBLE,
  CONSTRAINT `fk_poltrona_sala`
    FOREIGN KEY (`sala_id_sala`)
    REFERENCES `bd_cinema`.`sala` (`id_sala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cinema`.`alimenticios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_cinema`.`alimenticios` (
  `idalimenticios` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `valor` VARCHAR(45) NULL,
  PRIMARY KEY (`idalimenticios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cinema`.`compra_has_alimenticios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_cinema`.`compra_has_alimenticios` (
  `compra_id_compra` INT NOT NULL,
  `alimenticios_idalimenticios` INT NOT NULL,
  PRIMARY KEY (`compra_id_compra`, `alimenticios_idalimenticios`),
  INDEX `fk_compra_has_alimenticios_alimenticios1_idx` (`alimenticios_idalimenticios` ASC) VISIBLE,
  INDEX `fk_compra_has_alimenticios_compra1_idx` (`compra_id_compra` ASC) VISIBLE,
  CONSTRAINT `fk_compra_has_alimenticios_compra1`
    FOREIGN KEY (`compra_id_compra`)
    REFERENCES `bd_cinema`.`compra` (`id_compra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_has_alimenticios_alimenticios1`
    FOREIGN KEY (`alimenticios_idalimenticios`)
    REFERENCES `bd_cinema`.`alimenticios` (`idalimenticios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
