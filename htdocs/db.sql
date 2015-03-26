CREATE DATABASE `fidelity`;
USE `fidelity`;
CREATE TABLE `end_user` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `login` varchar(40),
   `password` varchar(50),
   PRIMARY KEY(id)
);
INSERT INTO end_user(login,password) VALUES('gmaggiotti','tribilin78');
INSERT INTO end_user VALUES(2,'BMW','2004');
INSERT INTO end_user VALUES(3,'Audi','2001');