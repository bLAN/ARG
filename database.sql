SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `ARG` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ARG`;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `task` int(10) NOT NULL,
  `poeng` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

