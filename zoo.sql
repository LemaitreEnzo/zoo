CREATE TABLE IF NOT EXISTS `enclosure` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(50) NOT NULL,
	`description` varchar(100) NOT NULL,
	`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `animals` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(50) NOT NULL,
    `description` varchar(100) NOT NULL,
    `specie` varchar(50) NOT NULL,
    `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `id_enclosure` int NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;



ALTER TABLE `animals` ADD CONSTRAINT `animals_id_enclosure` FOREIGN KEY (`id_enclosure`) REFERENCES `enclosure`(`id`);

