DROP DATABASE IF EXISTS assessjobler;
CREATE DATABASE assessjobler;

USE assessjobler;

CREATE TABLE `customers` (
  `id` int(13) unsigned AUTO_INCREMENT NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `hphone` varchar(10) DEFAULT NULL,
  `mphone` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE INNODB;


CREATE TABLE `response_data` (
  `id` int(13) UNSIGNED AUTO_INCREMENT NOT NULL,
  `customer_id` int(13) UNSIGNED DEFAULT NULL,
  `score` int(13) DEFAULT NULL,
  `sub_score` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX idx_customerid (`customer_id`)
) ENGINE INNODB;