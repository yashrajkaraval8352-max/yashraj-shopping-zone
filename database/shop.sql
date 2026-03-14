CREATE DATABASE shop_db;
USE shop_db;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(255)
);

CREATE TABLE products(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(200),
price DECIMAL(10,2),
image VARCHAR(200),
description TEXT
);

CREATE TABLE orders(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
total DECIMAL(10,2),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name,price,image,description) VALUES
('Laptop',50000,'laptop.jpg','High performance laptop'),
('Headphones',2000,'headphone.jpg','Noise cancelling headphones'),
('Smartphone',30000,'phone.jpg','Latest smartphone'),
('Shoes',1500,'shoes.jpg','Comfortable running shoes');