CREATE DATABASE bigfoodforyou;
USE bigfoodforyou;

CREATE TABLE formularz_kontaktowy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(100),
    nazwisko VARCHAR(100),
    email VARCHAR(100),
    telefon VARCHAR(20),
    wiadomosc TEXT,
    prywatnosc TINYINT(1) DEFAULT 0,
    data_dodania TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


