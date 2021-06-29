CREATE DATABASE smsdb;

USE smsdb;

CREATE TABLE `admin` (
    `id` int(11) AUTO_INCREMENT, 
    `name` varchar(255) NOT NULL, 
    `email` varchar(255) NOT NULL, 
    `password` varchar(255) NOT NULL, 
    PRIMARY KEY(id)
);

INSERT INTO admin (name, email, password)
VALUES ('Admin', 'admin@nomail.com', 'admin@123');

CREATE TABLE `student` (
    `id` int(11) AUTO_INCREMENT, 
    `name` varchar(255) NOT NULL,
    `rollno` int(11) NOT NULL,
    `class` int(11) NOT NULL,
    `email` varchar(255), 
    `username` varchar(255) NOT NULL, 
    `password` varchar(255) NOT NULL, 
    PRIMARY KEY(id)
);

CREATE TABLE `teacher` (
    `id` int(11) AUTO_INCREMENT, 
    `name` varchar(255) NOT NULL, 
    `email` varchar(255) NOT NULL, 
    `password` varchar(255) NOT NULL, 
    `subject` varchar(255), 
    PRIMARY KEY(id)
);

INSERT INTO student (name, rollno, class, email, username, password)
VALUES ('Godsy', 21, 8, 'godson@nomail.com','godsy_07','godsy@123');
INSERT INTO student (name, rollno, class, email, username, password)
VALUES ('raj', 22, 9, 'raj@nomail.com','raj_22','raj@123');

