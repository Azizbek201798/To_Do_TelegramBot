CREATE TABLE todos (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` text,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int DEFAULT NULL);

CREATE TABLE users (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `chat_id` int DEFAULT NULL,
  `status` text,
  `created_at` datetime DEFAULT NULL,
);