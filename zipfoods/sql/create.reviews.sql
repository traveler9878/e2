CREATE TABLE `reviews` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(255) NOT NULL , 
    `sku` VARCHAR(255) NOT NULL , 
    `review` TEXT NOT NULL , 
    PRIMARY KEY (`id`)
    );