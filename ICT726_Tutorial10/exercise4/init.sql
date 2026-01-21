CREATE DATABASE IF NOT EXISTS ict726_security;
USE ict726_security;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('student', 'password123'),
('admin', 'adminpass');
