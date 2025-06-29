CREATE DATABASE sports_management_system;

USE sports_management_system;

-- Admin Credentials Table
CREATE TABLE admin_credentials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert Default Admin Credentials
INSERT INTO admin_credentials (username, password) VALUES ('admin', 'admin123');

-- User Credentials Table
CREATE TABLE user_credentials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    mobilenumber VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL
);



-- Student Applications Table
CREATE TABLE student_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    branch VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mobilenumber VARCHAR(15) NOT NULL,
    sport VARCHAR(50) NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending'
);


