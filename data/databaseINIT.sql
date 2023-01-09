-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for phonesireland
CREATE DATABASE IF NOT EXISTS `phonesireland` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `phonesireland`;

-- Dumping structure for table phonesireland.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table phonesireland.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`login`) VALUES
	('root');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table phonesireland.category
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phonesireland.category: ~3 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`category_id`, `name`) VALUES
	(1, 'Refurbished'),
	(2, 'New Phones'),
	(3, 'Used Phones');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table phonesireland.item
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float(9,2) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phonesireland.item: ~13 rows (approximately)
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`item_id`, `name`, `stock`, `price`, `cat_id`, `brand_id`) VALUES
	(1, 'iPhone 13', 1, 929.99, 2, 1),
	(2, 'iPhone 13 mini', 27, 829.00, 2, 1),
	(3, 'iPhone 13 Pro', 4, 1079.00, 2, 1),
	(4, 'iPhone 13 Pro Max', 4, 1179.00, 2, 1),
	(5, 'iPhone 12 Pro', 2, 749.00, 1, 1),
	(6, 'iPhone 11', 5, 449.00, 1, 1),
	(7, 'Galaxy S20', 2, 799.00, 2, 2),
	(8, '8T', 0, 379.00, 3, 7),
	(9, 'Galaxy Z Fold 3', 1, 1249.00, 1, 2),
	(10, 'Pixel 6 Pro', 2, 999.00, 2, 8),
	(11, 'iPhone 13 Pro Max', 1, 799.00, 3, 1),
	(12, 'Pixel 6', 4, 699.00, 2, 8),
	(13, 'Mi 11 5G', 3, 929.00, 1, 3);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Dumping structure for table phonesireland.item_brand
CREATE TABLE IF NOT EXISTS `item_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phonesireland.item_brand: ~11 rows (approximately)
/*!40000 ALTER TABLE `item_brand` DISABLE KEYS */;
INSERT INTO `item_brand` (`brand_id`, `name`) VALUES
	(1, 'Apple'),
	(2, 'Samsung'),
	(3, 'Xiamoi'),
	(4, 'Oppo'),
	(5, 'Sony'),
	(6, 'Huawei'),
	(7, 'Oneplus'),
	(8, 'Google'),
	(9, 'Redmi'),
	(10, 'Vivo'),
	(11, 'Other');
/*!40000 ALTER TABLE `item_brand` ENABLE KEYS */;

-- Dumping structure for table phonesireland.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `login` varchar(32) NOT NULL DEFAULT '',
  `item_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `payment_method` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phonesireland.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`login`, `item_id`, `address`, `payment_method`, `timestamp`) VALUES
	('root', 2, '1 the way', 'Paypal', '2022-05-06 06:01:50'),
	('root', 4, '1 the way', 'Paypal', '2022-05-06 06:01:50');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table phonesireland.seller
CREATE TABLE IF NOT EXISTS `seller` (
  `login` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phonesireland.seller: ~1 rows (approximately)
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` (`login`) VALUES
	('root'),
	('password');
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;

-- Dumping structure for table phonesireland.user
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_logged` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phonesireland.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`login`, `firstname`, `lastname`, `email`, `password`, `last_logged`) VALUES
	('May2ndForgotPassLol', 'Sam', 'Magee', 'samam.magee@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2022-05-02 23:32:59'),
	('password', 'testing', 'lul', 'agony@troll.ie', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2022-05-06 02:48:06'),
	('root', 'root', 'root', 'root@phonesireland.ie', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '2022-05-06 05:48:46'),
	('Sam', 'Sam', 'Magee', 'samam.magee@gmail.com', '114dfc855d9a9bea7d2ab917c1e38e2a915687f2', '2022-05-01 23:52:02'),
	('Test user', 'test', 'user', 'iAmSufferingLULW@despair.com', '7c222fb2927d828af22f592134e8932480637c0d', '2022-05-04 02:10:45'),
	('user', 'user', 'user', 'user@root.ie', '12DEA96FEC20593566AB75692C9949596833ADC9', '2022-04-03 23:46:47');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table phonesireland.user_carts
CREATE TABLE IF NOT EXISTS `user_carts` (
  `login` varchar(32) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phonesireland.user_carts: ~5 rows (approximately)
/*!40000 ALTER TABLE `user_carts` DISABLE KEYS */;
INSERT INTO `user_carts` (`login`, `item_id`, `amount`) VALUES
	('May2ndForgotPassLol', 2, 3);
    ('root', 1, 1);
    ('root', 2, 1)
/*!40000 ALTER TABLE `user_carts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
