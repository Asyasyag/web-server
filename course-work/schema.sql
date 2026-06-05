CREATE DATABASE IF NOT EXISTS `cookbook_siddikova` DEFAULT CHARSET=utf8mb4;
USE `cookbook_siddikova`;

DROP TABLE IF EXISTS `recipes`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`nickname`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `nickname`, `email`, `role`) VALUES
(1, 'siddikova', 'siddikova@example.local', 'admin'),
(2, 'guest', 'guest@example.local', 'user');

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `text` text NOT NULL,
  `servings` int(11) NOT NULL DEFAULT 1,
  `calories_per_serving` int(11) NOT NULL DEFAULT 0,
  `cook_time` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `recipes` (`author_id`, `name`, `ingredients`, `text`, `servings`, `calories_per_serving`, `cook_time`) VALUES
(1, 'Домашний борщ',
 'Свёкла — 2 шт\nКартофель — 4 шт\nКапуста — 300 г\nМорковь — 1 шт\nЛук — 1 шт\nГовядина — 400 г',
 'Сварить бульон, добавить овощи, соединить с зажаркой и дать настояться.',
 6, 180, 90),
(1, 'Сырники к завтраку',
 'Творог — 500 г\nЯйцо — 1 шт\nМука — 4 ст. л.\nСахар — 2 ст. л.',
 'Смешать продукты, сформировать сырники и обжарить до румяной корочки.',
 4, 250, 25);
