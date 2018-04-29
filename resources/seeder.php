DROP TABLE IF EXISTS disciplines;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS user_infomations;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS files;

CREATE TABLE users (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE user_informations (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    user_id INTEGER,
    phone_number VARCHAR(255),
    address VARCHAR(255)
);

CREATE TABLE disciplines (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    nume VARCHAR(255),
    an INTEGER,
    image VARCHAR(255),
    description TEXT
);

CREATE TABLE messages (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    user_id_sender INTEGER,
    user_id_receiver INTEGER,
    subject VARCHAR(255),
    content TEXT
);

CREATE TABLES files (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    user_id_sender INTEGER,
    discipline_id INTEGER,
    path VARCHAR(255)
);

