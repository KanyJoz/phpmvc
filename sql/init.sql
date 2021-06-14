-- Drop the whole database if it's already exits on the host computer
DROP DATABASE IF EXISTS php_mvc_example;

-- Create the database after it got dropped (or it's a first time)
CREATE DATABASE php_mvc_example;

-- Switch to the database
USE php_mvc_example;

-- Create users table first, because advertisements table references this table
CREATE TABLE IF NOT EXISTS users (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

-- Create the advertisement table
CREATE TABLE IF NOT EXISTS advertisements (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid INTEGER NOT NULL,
    title VARCHAR(255) NOT NULL,
    FOREIGN KEY (userid) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

-- Fill in some dummy users
INSERT INTO users(name) VALUES
    ('Trippier'), -- id: 1
    ('Mings'),    -- id: 2
    ('Stones'),
    ('Walker'),
    ('Rice'),
    ('Phillips'),
    ('Foden'),
    ('Mount'),
    ('Sterling'),
    ('Kane');    -- id: 10


-- Fill in some dummy advertisements
INSERT INTO advertisements(userid, title) VALUES
    (1, 'Prosthetic legs for sale if you have only a right foot'),
    (2, 'Click here to create a CV so maybe somdebody will know your name'),
    (3, 'Stay fit, back after 700 days'),
    (3, 'Could have been worse'),
    (4, 'Free real estate for tatoo'),
    (4, 'Really fast, oh my'),
    (5, 'Getting hungry'),
    (6, 'Hard work pays off'),
    (7, 'Get a free hair cut'),
    (8, 'Blue is the color'),
    (8, 'Football is the game'),
    (9, 'Nice goal, keep going'),
    (10, 'It\'s coming home'),
    (10, 'Maybe next year');