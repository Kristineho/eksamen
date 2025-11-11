-- Opprett database
CREATE DATABASE IF NOT EXISTS min_app
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- Bruk databasen
USE min_app;

-- Slå av foreign key checks midlertidig (for enklere import)
SET FOREIGN_KEY_CHECKS = 0;

-- Slett tabeller hvis de finnes fra før (valgfritt)
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS users;

-- Opprett tabell for brukere
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Opprett tabell for innlegg/artikler
CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Foreign key: kobler innlegg til bruker
    CONSTRAINT fk_posts_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Skru på foreign key checks igjen
SET FOREIGN_KEY_CHECKS = 1;

-- Sett inn noen eksempeldata i users
INSERT INTO users (name, email, password_hash) VALUES
('Ola Nordmann', 'ola@example.com', 'hash_her'),
('Kari Nordmann', 'kari@example.com', 'hash_her');

-- Sett inn noen eksempeldata i posts
INSERT INTO posts (user_id, title, content) VALUES
(1, 'Mitt første innlegg', 'Hei, dette er mitt første innlegg!'),
(2, 'Hei fra Kari', 'Her er et innlegg skrevet av Kari.');
