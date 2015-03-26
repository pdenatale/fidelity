CREATE DATABASE `fidelity`;
USE `fidelity`;
CREATE TABLE `brand` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `login` varchar(40),
    `email` varchar(32),
   `password` varchar(50),
   `name` varchar(50),
   PRIMARY KEY(id)
);
INSERT INTO brand(login,email,password, name) VALUES('gmaggiotti','gmaggiotti@gmail.com','tribilin78','fidelity');
INSERT INTO brand VALUES(2,'jcp','jcm@intersoft.com','Intersoft');

CREATE TABLE `end_user` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `id_brand` int NOT NULL,
   `login` varchar(40),
   `password` varchar(50),
   PRIMARY KEY(id)
);
INSERT INTO end_user VALUES(1,2,'gabe','pass');

CREATE TABLE `promotion` (
	`id` int UNIQUE NOT NULL AUTO_INCREMENT,
	`id_brand` int NOT NULL,
	`name` varchar(40),
	`logo_img` varchar(256),
	`address` varchar(256),
	`discount` varchar(5),
	`distanceKm` int DEFAULT '0' NOT NULL,
	`shortDesc` text,
	`longDesc` text,
	`dateFrom` date,
	`dateTo` date,
	PRIMARY KEY(id)
);

INSERT INTO promotion VALUES (2,2,'muza','muza.img','Colodrero 5000','%10',5,'la mejor muza al mejor precio',
		'la mejor','2008-3-02','2008-3-02');
		
INSERT INTO promotion(id_brand, name,logo_img,address,discount,distanceKm,shortDesc,longDesc,dateFrom,dateTo) 
VALUES(2,'lala','muza.img','Colodrero 5000','%10',5,'la mejor muza al mejor precio','la mejor','2008-3-02','2008-3-02');
		
		
