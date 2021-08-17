-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.13 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных ils-test5
CREATE DATABASE IF NOT EXISTS `ils-test5` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ils-test5`;

-- Дамп структуры для таблица ils-test5.dogs
DROP TABLE IF EXISTS `dogs`;
CREATE TABLE IF NOT EXISTS `dogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `foreign_user_id` (`user_id`),
  CONSTRAINT `foreign_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы ils-test5.dogs: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `dogs` DISABLE KEYS */;
INSERT INTO `dogs` (`id`, `user_id`, `name`) VALUES
	(1, 1, 'Барон'),
	(2, 2, 'Зойка'),
	(3, 2, 'Шарик');
/*!40000 ALTER TABLE `dogs` ENABLE KEYS */;

-- Дамп структуры для таблица ils-test5.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы ils-test5.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES
	(1, 'root', 'root@example.com', '2021-08-17 10:02:54'),
	(2, 'user2', 'user2@example.ru', '2021-08-17 10:03:56'),
	(3, 'Ivan Rusin', 'ivanrsn@gmail.com', '2021-08-17 10:04:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
