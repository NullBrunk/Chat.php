CREATE DATABASE webchat;
USE webchat;

CREATE TABLE users(
  `id` INT AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL UNIQUE,
  `password` VARCHAR(130) NOT NULL,
  `isadmin` BOOLEAN DEFAULT 0,

  PRIMARY KEY(`id`)
);

CREATE TABLE chat(
  `id` INT AUTO_INCREMENT,
  `author` VARCHAR(30) NOT NULL,
  `msg` TEXT NOT NULL,

  PRIMARY KEY(`id`)
);
