
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- Content
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Content`;


CREATE TABLE `Content`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`content` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Professor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Professor`;


CREATE TABLE `Professor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256),
	`resumo` TEXT,
	`linkPersonalPage` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ResearchLineProfessor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ResearchLineProfessor`;


CREATE TABLE `ResearchLineProfessor`
(
	`professor_id` INTEGER,
	`researchline_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `ResearchLineProfessor_FI_1` (`professor_id`),
	CONSTRAINT `ResearchLineProfessor_FK_1`
		FOREIGN KEY (`professor_id`)
		REFERENCES `Professor` (`id`)
		ON DELETE SET NULL,
	INDEX `ResearchLineProfessor_FI_2` (`researchline_id`),
	CONSTRAINT `ResearchLineProfessor_FK_2`
		FOREIGN KEY (`researchline_id`)
		REFERENCES `ResearchLine` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ResearchLine
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ResearchLine`;


CREATE TABLE `ResearchLine`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Grade
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Grade`;


CREATE TABLE `Grade`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`published` TINYINT,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Periodo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Periodo`;


CREATE TABLE `Periodo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255),
	`grade_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `Periodo_FI_1` (`grade_id`),
	CONSTRAINT `Periodo_FK_1`
		FOREIGN KEY (`grade_id`)
		REFERENCES `Grade` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- GradeUnit
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `GradeUnit`;


CREATE TABLE `GradeUnit`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`horario_id` INTEGER,
	`disciplina_id` INTEGER,
	`professor_id` INTEGER,
	`periodo_id` INTEGER,
	`local_id` INTEGER,
	`weekDay_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `GradeUnit_FI_1` (`horario_id`),
	CONSTRAINT `GradeUnit_FK_1`
		FOREIGN KEY (`horario_id`)
		REFERENCES `Horario` (`id`)
		ON DELETE SET NULL,
	INDEX `GradeUnit_FI_2` (`disciplina_id`),
	CONSTRAINT `GradeUnit_FK_2`
		FOREIGN KEY (`disciplina_id`)
		REFERENCES `Disciplina` (`id`)
		ON DELETE SET NULL,
	INDEX `GradeUnit_FI_3` (`professor_id`),
	CONSTRAINT `GradeUnit_FK_3`
		FOREIGN KEY (`professor_id`)
		REFERENCES `Professor` (`id`)
		ON DELETE SET NULL,
	INDEX `GradeUnit_FI_4` (`periodo_id`),
	CONSTRAINT `GradeUnit_FK_4`
		FOREIGN KEY (`periodo_id`)
		REFERENCES `Periodo` (`id`)
		ON DELETE SET NULL,
	INDEX `GradeUnit_FI_5` (`local_id`),
	CONSTRAINT `GradeUnit_FK_5`
		FOREIGN KEY (`local_id`)
		REFERENCES `Local` (`id`)
		ON DELETE SET NULL,
	INDEX `GradeUnit_FI_6` (`weekDay_id`),
	CONSTRAINT `GradeUnit_FK_6`
		FOREIGN KEY (`weekDay_id`)
		REFERENCES `Week` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Disciplina
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Disciplina`;


CREATE TABLE `Disciplina`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255),
	`ch` INTEGER default 60,
	`content_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `Disciplina_FI_1` (`content_id`),
	CONSTRAINT `Disciplina_FK_1`
		FOREIGN KEY (`content_id`)
		REFERENCES `Content` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Horario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Horario`;


CREATE TABLE `Horario`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`inicio` TIME,
	`fim` TIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Week
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Week`;


CREATE TABLE `Week`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Local
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Local`;


CREATE TABLE `Local`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(256),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- CMSGroupContent
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `CMSGroupContent`;


CREATE TABLE `CMSGroupContent`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(256),
	`title` VARCHAR(256),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- CMSPage
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `CMSPage`;


CREATE TABLE `CMSPage`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(255)  NOT NULL,
	`content_id` INTEGER,
	`CMSGroupContent_id` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `CMSPage_U_1` (`url`),
	INDEX `CMSPage_FI_1` (`content_id`),
	CONSTRAINT `CMSPage_FK_1`
		FOREIGN KEY (`content_id`)
		REFERENCES `Content` (`id`)
		ON DELETE SET NULL,
	INDEX `CMSPage_FI_2` (`CMSGroupContent_id`),
	CONSTRAINT `CMSPage_FK_2`
		FOREIGN KEY (`CMSGroupContent_id`)
		REFERENCES `CMSGroupContent` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- CMSMenu
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `CMSMenu`;


CREATE TABLE `CMSMenu`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`ordem` INTEGER,
	`CMSGroupContent_id` INTEGER,
	`parent` INTEGER,
	`caption` VARCHAR(255)  NOT NULL,
	`link` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `CMSMenu_FI_1` (`CMSGroupContent_id`),
	CONSTRAINT `CMSMenu_FK_1`
		FOREIGN KEY (`CMSGroupContent_id`)
		REFERENCES `CMSGroupContent` (`id`)
		ON DELETE SET NULL,
	INDEX `CMSMenu_FI_2` (`parent`),
	CONSTRAINT `CMSMenu_FK_2`
		FOREIGN KEY (`parent`)
		REFERENCES `CMSMenu` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
