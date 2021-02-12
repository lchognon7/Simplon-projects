SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `interceptions` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `interceptions`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `user_enabled` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_enabled`) VALUES
(1,	'will-fitzgibbon@icij.org',	'$2y$10$iKZuaUlXMwNWUXGiUVBbju5wXxJTKoqskHPOvb8mrTS5V9uzSYzAm',	1);