-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2021 at 04:37 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop_management`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `calculations_for_pets`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `calculations_for_pets` (IN `pid` VARCHAR(9), IN `sid` VARCHAR(9))  NO SQL
BEGIN
DECLARE 
 cpid ,csid int DEFAULT 0;
set cpid=(select cost from pets where pet_id=pid);
set csid=(select total from sales_details where sd_id=sid);
set csid=csid+cpid;
update sales_details set total=csid where sd_id=sid;
end$$

DROP PROCEDURE IF EXISTS `calculations_for_product`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `calculations_for_product` (IN `ppid` VARCHAR(9), IN `sid` VARCHAR(9), IN `qnty` INT(11))  NO SQL
BEGIN
DECLARE 
 cppid ,csid int DEFAULT 0;
set cppid=(select cost from pet_products where pp_id=ppid);
set csid=(select total from sales_details where sd_id=sid);
set csid=csid+qnty*cppid;
update sales_details set total=csid where sd_id=sid;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_type_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `weight` decimal(10,0) DEFAULT NULL,
  `age` decimal(10,0) NOT NULL DEFAULT '0',
  `comments` text COLLATE utf8mb4_unicode_520_ci,
  `props` text COLLATE utf8mb4_unicode_520_ci,
  `animal_pic` text COLLATE utf8mb4_unicode_520_ci,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `animal_type_id`, `name`, `color`, `cost`, `weight`, `age`, `comments`, `props`, `animal_pic`, `deleted`) VALUES
(1, 1, 'Sudalai', 'ash', '1500', '2', '11', '', NULL, 'img/entry/animals/sudalai.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `animal_cat`
--

DROP TABLE IF EXISTS `animal_cat`;
CREATE TABLE IF NOT EXISTS `animal_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `picfilepath` text COLLATE utf8mb4_unicode_520_ci,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `animal_cat`
--

INSERT INTO `animal_cat` (`id`, `name`, `description`, `picfilepath`, `deleted`) VALUES
(1, 'test', 'test', 'img/entry/animal_cat/test.jpg', 1),
(2, 'DOGS', '', 'img/entry/animal_cat/dogs.jpg', 0),
(3, 'CATS', '', 'img/entry/animal_cat/cats.jpg', 0),
(4, 'RABBITS', '', 'img/entry/animal_cat/rabbits.jpg', 0),
(5, 'HAMSTER', '', 'img/entry/animal_cat/hamster.jpg', 0),
(6, 'FERRETS', '', 'img/entry/animal_cat/ferrets.jpg', 0),
(7, 'FISHES', '', 'img/entry/animal_cat/fishes.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `animal_type`
--

DROP TABLE IF EXISTS `animal_type`;
CREATE TABLE IF NOT EXISTS `animal_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_cat_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `picfilepath` text COLLATE utf8mb4_unicode_520_ci,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `animal_type`
--

INSERT INTO `animal_type` (`id`, `animal_cat_id`, `name`, `description`, `picfilepath`, `deleted`) VALUES
(1, 2, 'LABRADOR', '', 'img/entry/animal_type/labrador.jpg', 0),
(2, 2, 'BULLDOG', '', 'img/entry/animal_type/bulldog.jpg', 0),
(3, 2, 'GERMAN SHEPHERD', '', 'img/entry/animal_type/german shepherd.jpeg', 0),
(4, 2, 'CHIPPIPAARAI', '', 'img/entry/animal_type/chippipaarai.jpg', 0),
(5, 2, 'KOMBAI', '', 'img/entry/animal_type/kombai.jpg', 0),
(6, 3, 'PERSIAN', '', 'img/entry/animal_type/persian.jpg', 0),
(7, 3, 'BENGAL', '', 'img/entry/animal_type/bengal.jpg', 0),
(8, 3, 'SIAMESE', '', 'img/entry/animal_type/siamese.jpg', 0),
(9, 3, 'MAINE COON', '', 'img/entry/animal_type/maine coon.jpg', 0),
(10, 3, 'BIRMAN', '', 'img/entry/animal_type/birman.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

DROP TABLE IF EXISTS `birds`;
CREATE TABLE IF NOT EXISTS `birds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bird_type_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci,
  `color` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `weight` decimal(10,0) DEFAULT NULL,
  `age` decimal(10,0) NOT NULL DEFAULT '0',
  `comments` text COLLATE utf8mb4_unicode_520_ci,
  `props` text COLLATE utf8mb4_unicode_520_ci,
  `bird_pic` text COLLATE utf8mb4_unicode_520_ci,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`id`, `bird_type_id`, `name`, `color`, `cost`, `weight`, `age`, `comments`, `props`, `bird_pic`, `deleted`) VALUES
(1, 1, 'Razeenaa', 'green', '500', '0', '3', '', NULL, 'img/entry/birds/razeenaa.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bird_cat`
--

DROP TABLE IF EXISTS `bird_cat`;
CREATE TABLE IF NOT EXISTS `bird_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `picfilepath` text COLLATE utf8mb4_unicode_520_ci,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `bird_cat`
--

INSERT INTO `bird_cat` (`id`, `name`, `description`, `picfilepath`, `deleted`) VALUES
(8, 'PARROTS', '', 'img/entry/bird_cat/parrots.jpg', 0),
(9, 'COCKATIEL', '', 'img/entry/bird_cat/cockatiel.jpg', 0),
(10, 'LOVEBIRDS', '', 'img/entry/bird_cat/lovebirds.jpg', 0),
(11, 'CANARIES', '', 'img/entry/bird_cat/canaries.jpg', 0),
(12, 'PARAKEET', '', 'img/entry/bird_cat/parakeet.jpg', 0),
(13, 'LORIKEET', '', 'img/entry/bird_cat/lorikeet.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bird_type`
--

DROP TABLE IF EXISTS `bird_type`;
CREATE TABLE IF NOT EXISTS `bird_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bird_cat_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `picfilepath` text COLLATE utf8mb4_unicode_520_ci,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `bird_type`
--

INSERT INTO `bird_type` (`id`, `bird_cat_id`, `name`, `description`, `picfilepath`, `deleted`) VALUES
(1, 8, 'Indian Parrot', '', 'img/entry/bird_type/indian parrot.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phno` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_products`
--

DROP TABLE IF EXISTS `pet_products`;
CREATE TABLE IF NOT EXISTS `pet_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `for_pet_id` int(11) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_entries`
--

DROP TABLE IF EXISTS `sales_entries`;
CREATE TABLE IF NOT EXISTS `sales_entries` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `purchase_type` int(11) NOT NULL,
  `purchase_item_id` int(11) NOT NULL,
  `selling_price` decimal(10,0) DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
