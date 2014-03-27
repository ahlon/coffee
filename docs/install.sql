create database coffee DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`nickname`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;