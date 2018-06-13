DROP TABLE IF EXISTS disciplines;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS user_informations;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS files;
DROP TABLE IF EXISTS support;
DROP TABLE IF EXISTS faq;

CREATE TABLE faq (
id INTEGER NOT NULL AUTO_INCREMENT,
PRIMARY KEY (ID),
question VARCHAR(255),
answer TEXT
);

CREATE TABLE support (
    name VARCHAR(255),
    email VARCHAR(255),
    subject VARCHAR(255)
);

CREATE TABLE users (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    roleId INTEGER
);

CREATE TABLE roles (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    name VARCHAR(255)
);

CREATE TABLE comments (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    user_id INTEGER,
    file_id INTEGER,
    discipline_id INTEGER,
    subject VARCHAR(255),
    content TEXT
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
    slug VARCHAR(255),
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
    content TEXT,
    date_time DATETIME
);

CREATE TABLE files (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    name VARCHAR(255)
);

INSERT INTO roles VALUES ( 1, 'member' );
INSERT INTO roles VALUES ( 2, 'admin' );

