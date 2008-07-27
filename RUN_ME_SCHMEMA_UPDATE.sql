-- ROUND ONE SCHEMA UPDATE - DO NOT RUN AGAIN IF YOU HAVE ONCE BEFORE
ALTER TABLE  `drops` CHANGE  `id`  `id` INT( 50 ) NOT NULL AUTO_INCREMENT ,
CHANGE  `summary`  `summary` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL ,
CHANGE  `date`  `date` DATETIME NOT NULL ,
CHANGE  `droptext`  `text` LONGTEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
CHANGE  `ip`  `ip` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL ,
CHANGE  `language`  `lang` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL ,
ADD  `private` TINYINT NOT NULL DEFAULT  '0',
ADD  `passkey` VARCHAR( 24 ) NULL DEFAULT NULL ;
ALTER TABLE  `drops` ENGINE = MYISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
ALTER DATABASE  `dropbin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
ALTER TABLE  `drops` ADD  `editable` TINYINT NOT NULL DEFAULT  '0';