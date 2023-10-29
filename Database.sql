CREATE DATABASE BoutiqueSC;

USE BoutiqueSC;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(100),
    address VARCHAR(255),
    password VARCHAR(255),
    role INT
);
