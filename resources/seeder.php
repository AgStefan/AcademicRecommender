DROP TABLE IF EXISTS disciplines;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS user_informations;
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

CREATE TABLE files (
    id INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    user_id INTEGER,
    discipline_id INTEGER,
    path VARCHAR(255)
);

INSERT INTO users
VALUES (111111, 'AgapeStefan', 'stefan.agape97@gmail.com', 'asdqweasd');
INSERT INTO users
VALUES (222222, 'BejinariuAnca', 'anca.bejinariu@gmail.com', 'qwerty123');
INSERT INTO users
VALUES (333333, 'BocsanAndrei', 'bocsan_andrei@yahoo.com', 'andrei01we');

INSERT INTO user_informations
VALUES ( 1, 111111, '0722842292', 'Str. Stefan Cel Mare Nr.22' );
INSERT INTO user_informations
VALUES ( 2, 222222, '0732832271', 'Str. Stefan Cel Mare Nr.50' );
INSERT INTO user_informations
VALUES ( 3, 333333, '0720042276', 'Str. Elena Doamna Nr.24' );

INSERT INTO messages
VALUES ( 11, 111111, 222222, 'Problema Logica', 'bla bla.bla' );
INSERT INTO messages
VALUES ( 19, 222222, 333333,  'Problema Matematica', 'bla bla.bla bla' );
INSERT INTO messages
VALUES ( 12, 111111, 333333, 'Proiect TW', 'bla bla.bla blablablaasd' );

INSERT INTO files
VALUES ( 1, 111111, 99991, 'temaPSGBD.pdf');
INSERT INTO files
VALUES ( 2, 222222, 99992, 'calcule.pdf');
INSERT INTO files
VALUES ( 3, 333333, 99993, 'sondaje.pdf');

INSERT INTO disciplines
VALUES ( 10, 'Logica pentru Informatica', 1, 'logica_pentru_informatica.png', '1. Logica in Informatica (introducere, motivatie)
2. Algebre booleene (spatii semantice)
3. Logica propozitională (LP)
4. Logica cu predicate de ordinul I (LP1)
5. Introducere în Sisteme deductive şi teorii logice
6. Introducere în Programarea logică ' );
INSERT INTO disciplines
VALUES ( 11, 'Matematica', 1, 'mate.jpg', 'Elemente de algebra, analiza (topologie) şi geometrie analitica legate de multimile R , R şi n R ( n ≥ 2).
Şiruri şi serii numerice reale. Functii reale, scalare şi vectoriale. ' );
INSERT INTO disciplines
VALUES ( 12, 'Grafica pe Calculator' ,3, 'grafica.png','.Initiere în domeniul graficii pe calculator. II.Deprinderea abilităţii de a concepe modele (simple) ale unui
univers (în sensul de mulţime de obiecte având o formă relativ simplă) static sau dinamic. ');
