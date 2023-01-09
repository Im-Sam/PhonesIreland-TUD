SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admin` (
  `login` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `admin` (`login`) VALUES
('root');


CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Refurbished'),
(2, 'New Phones'),
(3, 'Used Phones');


CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float(9,2) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `item` (`item_id`, `name`, `stock`, `price`, `cat_id`, `brand_id`) VALUES
(1, 'iPhone 13', 12, 929.00, 2, 1),
(2, 'iPhone 13 mini', 41, 829.00, 2, 1),
(3, 'iPhone 13 Pro', 4, 1079.00, 2, 1),
(4, 'iPhone 13 Pro Max', 5, 1179.00, 2, 1),
(5, 'iPhone 12 Pro', 2, 749.00, 1, 1),
(6, 'iPhone 11', 4, 449.00, 1, 1),
(7, 'Galaxy S20', 2, 799.00, 2, 2),
(8, '8T', 1, 379.00, 3, 7),
(9, 'Galaxy Z Fold 3', 1, 1249.00, 1, 2),
(10, 'Pixel 6 Pro', 2, 999.00, 2, 8),
(11, '13 Pro Max', 1, 799.00, 3, 1),
(12, 'Pixel 6', 5, 699.00, 2, 8);


CREATE TABLE `item_brand` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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


CREATE TABLE `seller` (
  `login` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `user` (
  `login` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_logged` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`login`, `firstname`, `lastname`, `email`, `password`, `last_logged`) VALUES
('root', 'root', 'root', 'root@phonesireland.ie', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '2022-04-06 20:56:07'),
('user', 'user', 'user', 'user@root.ie', '12DEA96FEC20593566AB75692C9949596833ADC9', '2022-04-03 22:46:47');


CREATE TABLE `user_carts` (
  `login` varchar(32) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

ALTER TABLE `item_brand`
  ADD PRIMARY KEY (`brand_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`login`);

ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `item_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

