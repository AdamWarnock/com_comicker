CREATE TABLE IF NOT EXISTS `#__comicker_comics` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`comictitle` VARCHAR(255)  NOT NULL ,
`comicdescription` TEXT NOT NULL ,
`comicimage` VARCHAR(255)  NOT NULL ,
`comictags` TEXT NOT NULL ,
`comicfirstnormal` VARCHAR(255)  NOT NULL ,
`comicfirsthover` VARCHAR(255)  NOT NULL ,
`comicfirstactive` VARCHAR(255)  NOT NULL ,
`comiclastnormal` VARCHAR(255)  NOT NULL ,
`comiclasthover` VARCHAR(255)  NOT NULL ,
`comiclastactive` VARCHAR(255)  NOT NULL ,
`comicpreviousnormal` VARCHAR(255)  NOT NULL ,
`comicprevioushover` VARCHAR(255)  NOT NULL ,
`comicpreviousactive` VARCHAR(255)  NOT NULL ,
`comicnextnormal` VARCHAR(255)  NOT NULL ,
`comicnexthover` VARCHAR(255)  NOT NULL ,
`comicnextactive` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__comicker_chapters` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`chaptertitle` VARCHAR(255)  NOT NULL ,
`chapterdescription` TEXT NOT NULL ,
`chapterimage` VARCHAR(255)  NOT NULL ,
`chaptertags` TEXT NOT NULL ,
`parentcomic` INT NOT NULL ,
`parentchapter` INT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__comicker_pages` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`pagetitle` VARCHAR(255)  NOT NULL ,
`pageimage` VARCHAR(255)  NOT NULL ,
`pagedescription` TEXT NOT NULL ,
`pagenotes` TEXT NOT NULL ,
`parentchapter` INT NOT NULL ,
`pagetranscript` TEXT NOT NULL ,
`pagemouseovertext` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

