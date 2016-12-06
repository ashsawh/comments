CREATE TABLE IF NOT EXISTS `comments`.`users_comments` (
`id` INT NOT NULL AUTO_INCREMENT COMMENT '',
`user_id` INT NOT NULL COMMENT '',
`comment_id` INT NOT NULL COMMENT '',
`read` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '',
`product_id` INT NOT NULL COMMENT '',
PRIMARY KEY (`id`)  COMMENT '',
UNIQUE INDEX `idx_user_comment` (`user_id` ASC, `comment_id` ASC, `product_id` ASC)  COMMENT '',
INDEX `idx_products` (`product_id` ASC)  COMMENT '',
CONSTRAINT `fk_users`
FOREIGN KEY (`user_id`)
REFERENCES `comments`.`users` (`id`)
ON DELETE CASCADE
ON UPDATE CASCADE,
CONSTRAINT `fk_comments`
FOREIGN KEY (`comment_id`)
REFERENCES `comments`.`comments` (`id`)
ON DELETE CASCADE
ON UPDATE CASCADE,
CONSTRAINT `fk_products`
FOREIGN KEY (`product_id`)
REFERENCES `comments`.`products` (`id`)
ON DELETE CASCADE
ON UPDATE CASCADE)
ENGINE = InnoDB;