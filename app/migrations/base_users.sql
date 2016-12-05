CREATE TABLE IF NOT EXISTS `comments`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `username` VARCHAR(50) NOT NULL COMMENT '',
  `password` VARCHAR(255) NOT NULL COMMENT '',
  `create_date` TIMESTAMP NOT NULL DEFAULT NOW() COMMENT '',
  `update_date` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW() COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `idx_username` (`username` ASC)  COMMENT '')
  ENGINE = InnoDB;