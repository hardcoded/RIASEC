CREATE TABLE `Answer` (
	`ID_Answer` INT NOT NULL,
	`Degree` INT NOT NULL,
	`ID_Question` INT NOT NULL,
	`ID_Student` INT NOT NULL,
	PRIMARY KEY (`ID_Answer`)
);

CREATE TABLE `Question` (
	`ID_Question` INT NOT NULL,
	`Label` varchar(100) NOT NULL,
	`Group` INT NOT NULL,
	PRIMARY KEY (`ID_Question`)
);

CREATE TABLE `Student` (
	`ID_Student` INT NOT NULL,
	`first_name` varchar(30) NOT NULL,
	`last_name` varchar(30) NOT NULL,
	`login` varchar(30) NOT NULL,
	`password` varchar(50) NOT NULL,
	`ID_Prom` INT NOT NULL,
	`ID_Profile` INT NOT NULL,
	PRIMARY KEY (`ID_Student`)
);

CREATE TABLE `Prom` (
	`ID_Prom` INT NOT NULL,
	`label` INT NOT NULL,
	PRIMARY KEY (`ID_Prom`)
);

CREATE TABLE `Session` (
	`ID_Session` INT NOT NULL,
	`code` varchar(50) NOT NULL,
	`year` char(4) NOT NULL,
	`ID_Prom` INT NOT NULL,
	PRIMARY KEY (`ID_Session`)
);

CREATE TABLE `Admin` (
	`ID_Admin` INT NOT NULL,
	`login` varchar(30) NOT NULL,
	`password` varchar(50) NOT NULL,
	PRIMARY KEY (`ID_Admin`)
);

CREATE TABLE `Profile` (
	`ID_Profile` INT NOT NULL,
	`type` char(1) NOT NULL,
	`url_description` varchar(50) NOT NULL,
	PRIMARY KEY (`ID_Profile`)
);

ALTER TABLE `Answer` ADD CONSTRAINT `Answer_fk0` FOREIGN KEY (`ID_Question`) REFERENCES `Question`(`ID_Question`);

ALTER TABLE `Answer` ADD CONSTRAINT `Answer_fk1` FOREIGN KEY (`ID_Student`) REFERENCES `Student`(`ID_Student`);

ALTER TABLE `Student` ADD CONSTRAINT `Student_fk0` FOREIGN KEY (`ID_Prom`) REFERENCES `Prom`(`ID_Prom`);

ALTER TABLE `Student` ADD CONSTRAINT `Student_fk1` FOREIGN KEY (`ID_Profile`) REFERENCES `Profile`(`ID_Profile`);

ALTER TABLE `Session` ADD CONSTRAINT `Session_fk0` FOREIGN KEY (`ID_Prom`) REFERENCES `Prom`(`ID_Prom`);

