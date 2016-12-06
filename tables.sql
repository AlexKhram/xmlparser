CREATE DATABASE  IF NOT EXISTS `xmlparse` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `xmlparse`;

DROP TABLE IF EXISTS `pays`;

CREATE TABLE `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `count_pays` int(11) DEFAULT NULL,
  `success_pays` int(11) DEFAULT NULL,
  `error_pays` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  CONSTRAINT `fk_pays_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `surname` varchar(120) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullname` (`name`,`surname`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

