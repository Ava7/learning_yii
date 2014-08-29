CREATE TABLE `post`(
    `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `email` varchar(32) NOT NULL,
    `website` varchar(128) NULL,
    `message` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) Engine=InnoDB;


CREATE TABLE `user`(
    `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(20) NOT NULL,
    `password` varchar(128) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) Engine=InnoDB;