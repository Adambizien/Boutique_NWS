CREATE DATABASE BoutiqueSC;

USE BoutiqueSC;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    role INT
);

CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    image LONGBLOB NOT NULL,
    first BOOLEAN NOT NULL,
    date DATETIME NOT NULL,
    online BOOLEAN NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id)
);
INSERT INTO category (id, name)
VALUES (1, 'Véhicule terrestre'), (2, 'Véhicule spatial');




CREATE TABLE statusCommande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO statusCommande (id, name)
VALUES (1, 'En attente de paiement'), (2, 'En attente de livraison'), (3, 'En cours de livraison'), (4, 'Livré');

CREATE TABLE commande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATETIME NOT NULL,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    status_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (status_id) REFERENCES statusCommande(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);