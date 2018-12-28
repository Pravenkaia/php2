-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 26 2018 г., 18:05
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id_author` int(11) NOT NULL,
  `rights` int(11) NOT NULL DEFAULT '3',
  `author_name` varchar(100) NOT NULL,
  `author_family` varchar(100) NOT NULL,
  `author_login` varchar(100) NOT NULL,
  `author_pass` varchar(100) NOT NULL,
  `author_email` varchar(100) NOT NULL,
  `date_reg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id_author`, `rights`, `author_name`, `author_family`, `author_login`, `author_pass`, `author_email`, `date_reg`) VALUES
(6, 3, 'Имя', 'Фамилия', 'login', '$2y$10$H8A8Enk3LsKsOQMEOWfC5u7pxzFg7VW/Cx0KXNfwi5VWWh2kAZkPO', 'user@email.ru', 1539601055),
(7, 1, 'Администратор', 'Фамилия2', 'adm', '$2y$10$ONksAfWEyqSpDzHA83wNa.ByQ.f5YlqSCgCQu0P68vCZHuXv8OQ9q', 'adm@mail.t', 1540806039);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `user_cookie` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `num_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `comm` text NOT NULL,
  `order_date` int(11) NOT NULL,
  `order_state` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `phone_number`, `comm`, `order_date`, `order_state`) VALUES
(24, 6, 123456, 'Привезите по адресу Городу, улица, дом', 1540802310, 'finished'),
(25, 6, 123456, 'Привезите утром!!!', 1540802323, 'start'),
(26, 6, 888888, '', 1544534869, 'start');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) NOT NULL,
  `photo_big` varchar(50) NOT NULL,
  `photo_thumb` varchar(50) NOT NULL,
  `photo_alt` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id_photo`, `photo_big`, `photo_thumb`, `photo_alt`, `likes`) VALUES
(1, '/img/big/bear_4569.jpg', '/img/thumb/bear_4569.jpg', 'Такой медвежонок', 16),
(5, '/img/big/_8809.jpg', '/img/thumb/_8809.jpg', 'Здравствуйте, товарищи участники!', 2),
(6, '/img/big/1_5897.jpg', '/img/thumb/1_5897.jpg', '', 6),
(7, '/img/big/2_5347.jpg', '/img/thumb/2_5347.jpg', 'Новый этап! Бегом на остров!', 1),
(8, '/img/big/3_6405.jpg', '/img/thumb/3_6405.jpg', 'КП в водопаде', 0),
(9, '/img/big/4_8149.jpg', '/img/thumb/4_8149.jpg', 'КП на разрушенной мельнице', 0),
(10, '/img/big/6_8688.jpg', '/img/thumb/6_8688.jpg', 'Каньонинг! КП в водопаде \"Белые мосты\"', 1),
(11, '/img/big/5_4905.jpg', '/img/thumb/5_4905.jpg', 'КП на разрушенной мельнице. Водопад, однако!', 0),
(12, '/img/big/7_8905.jpg', '/img/thumb/7_8905.jpg', 'Финиш!', 0),
(13, '/img/big/dog_2453.jpg', '/img/thumb/dog_2453.jpg', 'Собака!', 2),
(14, '/img/big/haer_9944.jpg', '/img/thumb/haer_9944.jpg', 'Заяц', 1),
(15, '/img/big/sesame_537.jpg', '/img/thumb/sesame_537.jpg', 'Cooky!', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `product_text` text NOT NULL,
  `price` int(11) NOT NULL,
  `photo_big` varchar(100) NOT NULL,
  `photo_thumb` varchar(100) NOT NULL,
  `product_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `product_text`, `price`, `photo_big`, `photo_thumb`, `product_time`) VALUES
(3, 'Медведь белый', 'Мягкая игрушка засыпающий мишка', 1000, '/img/big/medved_beliy.jpg', '/img/thumb/medved_beliy.jpg', 1539252910),
(5, 'Собака Жулька', 'Весёлая собака', 800, '/img/big/sobaka_julka.jpg', '/img/thumb/sobaka_julka.jpg', 1539255628),
(6, 'Заяц', 'Заяц. Это заяц', 700, '', '', 1539255716),
(7, 'Бисквитный монстр', 'Мягкая игрушка', 2000, '/img/big/biskvitniy_monstr.jpg', '/img/thumb/biskvitniy_monstr.jpg', 1539255787),
(18, 'Игрушка0', 'Подробно: 0', 100, '', '', 1543756512),
(19, 'Игрушка1', 'Подробно: 1', 101, '', '', 1543756513),
(20, 'Игрушка2', 'Подробно: 2', 102, '', '', 1543756514),
(21, 'Игрушка3', 'Подробно: 3', 103, '', '', 1543756515),
(22, 'Игрушка4', 'Подробно: 4', 104, '', '', 1543756516),
(23, 'Игрушка5', 'Подробно: 5', 105, '', '', 1543756517),
(24, 'Игрушка6', 'Подробно: 6', 106, '', '', 1543756518),
(25, 'Игрушка7', 'Подробно: 7', 107, '', '', 1543756519),
(26, 'Игрушка8', 'Подробно: 8', 108, '', '', 1543756520),
(27, 'Игрушка9', 'Подробно: 9', 109, '', '', 1543756521),
(28, 'Игрушка10', 'Подробно: 10', 110, '', '', 1543756522),
(29, 'Игрушка11', 'Подробно: 11', 111, '', '', 1543756523),
(30, 'Игрушка12', 'Подробно: 12', 112, '', '', 1543756524),
(31, 'Игрушка13', 'Подробно: 13', 113, '', '', 1543756525),
(32, 'Игрушка14', 'Подробно: 14', 114, '', '', 1543756526),
(33, 'Игрушка15', 'Подробно: 15', 115, '', '', 1543756527),
(34, 'Игрушка16', 'Подробно: 16', 116, '', '', 1543756528),
(35, 'Игрушка17', 'Подробно: 17', 117, '', '', 1543756529),
(36, 'Игрушка18', 'Подробно: 18', 118, '', '', 1543756530),
(37, 'Игрушка19', 'Подробно: 19', 119, '', '', 1543756531),
(38, 'Игрушка38', 'Подробно: 38', 138, '', '', 1543756625),
(39, 'Игрушка39', 'Подробно: 39', 139, '', '', 1543756626),
(40, 'Игрушка40', 'Подробно: 40', 140, '', '', 1543756627),
(41, 'Игрушка41', 'Подробно: 41', 141, '', '', 1543756628),
(42, 'Игрушка42', 'Подробно: 42', 142, '', '', 1543756629),
(43, 'Игрушка43', 'Подробно: 43', 143, '', '', 1543756630),
(44, 'Игрушка44', 'Подробно: 44', 144, '', '', 1543756631),
(45, 'Игрушка45', 'Подробно: 45', 145, '', '', 1543756632),
(46, 'Игрушка46', 'Подробно: 46', 146, '', '', 1543756633),
(47, 'Игрушка47', 'Подробно: 47', 147, '', '', 1543756634),
(48, 'Игрушка48', 'Подробно: 48', 148, '', '', 1543756635),
(49, 'Игрушка49', 'Подробно: 49', 149, '', '', 1543756636),
(50, 'Игрушка50', 'Подробно: 50', 150, '', '', 1543756637),
(51, 'Игрушка51', 'Подробно: 51', 151, '', '', 1543756638),
(52, 'Игрушка52', 'Подробно: 52', 152, '', '', 1543756639),
(53, 'Игрушка53', 'Подробно: 53', 153, '', '', 1543756640),
(54, 'Игрушка54', 'Подробно: 54', 154, '', '', 1543756641),
(55, 'Игрушка55', 'Подробно: 55', 155, '', '', 1543756642),
(56, 'Игрушка56', 'Подробно: 56', 156, '', '', 1543756643),
(57, 'Игрушка57', 'Подробно: 57', 157, '', '', 1543756644),
(58, 'Игрушка58', 'Подробно: 58', 158, '', '', 1543756645),
(59, 'Игрушка59', 'Подробно: 59', 159, '', '', 1543756646),
(60, 'Игрушка60', 'Подробно: 60', 160, '', '', 1543756647),
(61, 'Игрушка61', 'Подробно: 61', 161, '', '', 1543756648),
(62, 'Игрушка62', 'Подробно: 62', 162, '', '', 1543756649),
(63, 'Игрушка63', 'Подробно: 63', 163, '', '', 1543756650),
(64, 'Игрушка64', 'Подробно: 64', 164, '', '', 1543756651),
(65, 'Игрушка65', 'Подробно: 65', 165, '', '', 1543756652),
(66, 'Игрушка66', 'Подробно: 66', 166, '', '', 1543756653),
(67, 'Игрушка67', 'Подробно: 67', 167, '', '', 1543756654),
(68, 'Игрушка68', 'Подробно: 68', 168, '', '', 1543756655),
(69, 'Игрушка69', 'Подробно: 69', 169, '', '', 1543756656),
(70, 'Игрушка70', 'Подробно: 70', 170, '', '', 1543756657),
(71, 'Игрушка71', 'Подробно: 71', 171, '', '', 1543756658),
(72, 'Игрушка72', 'Подробно: 72', 172, '', '', 1543756659),
(73, 'Игрушка73', 'Подробно: 73', 173, '', '', 1543756660),
(74, 'Игрушка74', 'Подробно: 74', 174, '', '', 1543756661),
(75, 'Игрушка75', 'Подробно: 75', 175, '', '', 1543756662),
(76, 'Игрушка76', 'Подробно: 76', 176, '', '', 1543756663),
(77, 'Игрушка77', 'Подробно: 77', 177, '', '', 1543756664),
(78, 'Игрушка78', 'Подробно: 78', 178, '', '', 1543756665),
(79, 'Игрушка79', 'Подробно: 79', 179, '', '', 1543756666),
(80, 'Игрушка80', 'Подробно: 80', 180, '', '', 1543756667),
(81, 'Игрушка81', 'Подробно: 81', 181, '', '', 1543756668),
(82, 'Игрушка82', 'Подробно: 82', 182, '', '', 1543756669),
(83, 'Игрушка83', 'Подробно: 83', 183, '', '', 1543756670),
(84, 'Игрушка84', 'Подробно: 84', 184, '', '', 1543756671),
(85, 'Игрушка85', 'Подробно: 85', 185, '', '', 1543756672),
(86, 'Игрушка86', 'Подробно: 86', 186, '', '', 1543756673),
(87, 'Игрушка87', 'Подробно: 87', 187, '', '', 1543756674),
(88, 'Игрушка88', 'Подробно: 88', 188, '', '', 1543756675),
(89, 'Игрушка89', 'Подробно: 89', 189, '', '', 1543756676),
(90, 'Игрушка90', 'Подробно: 90', 190, '', '', 1543756677),
(91, 'Игрушка91', 'Подробно: 91', 191, '', '', 1543756678),
(92, 'Игрушка92', 'Подробно: 92', 192, '', '', 1543756679),
(93, 'Игрушка93', 'Подробно: 93', 193, '', '', 1543756680),
(94, 'Игрушка94', 'Подробно: 94', 194, '', '', 1543756681),
(95, 'Игрушка95', 'Подробно: 95', 195, '', '', 1543756682),
(96, 'Игрушка96', 'Подробно: 96', 196, '', '', 1543756683),
(97, 'Игрушка97', 'Подробно: 97', 197, '', '', 1543756684),
(98, 'Игрушка98', 'Подробно: 98', 198, '', '', 1543756685),
(99, 'Игрушка99', 'Подробно: 99', 199, '', '', 1543756686),
(100, 'Игрушка100', 'Подробно: 100', 200, '', '', 1543756823);

-- --------------------------------------------------------

--
-- Структура таблицы `products_groups`
--

CREATE TABLE `products_groups` (
  `id_group` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `id_group_parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_groups`
--

INSERT INTO `products_groups` (`id_group`, `group_name`, `id_group_parent`) VALUES
(1, 'Игрушки', 0),
(2, 'Медведи', 1),
(3, 'Собаки', 1),
(4, 'Книги', 0),
(5, 'Программирование', 4),
(6, 'Математика', 4),
(7, 'Зайцы', 1),
(8, 'Персонажи', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products_in_order`
--

CREATE TABLE `products_in_order` (
  `id_product_in_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `ammount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_in_order`
--

INSERT INTO `products_in_order` (`id_product_in_order`, `id_order`, `id_product`, `ammount`) VALUES
(12, 24, 7, 1),
(13, 24, 3, 2),
(14, 24, 6, 1),
(15, 25, 6, 1),
(16, 26, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products_photos`
--

CREATE TABLE `products_photos` (
  `id_photo` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `photo_thumb` varchar(100) NOT NULL,
  `photo_big` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `temp_orders`
--

CREATE TABLE `temp_orders` (
  `id_temp_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `num_of product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `uid_groups`
--

CREATE TABLE `uid_groups` (
  `uid_groups` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uid_groups`
--

INSERT INTO `uid_groups` (`uid_groups`, `id_group`, `id_product`) VALUES
(10, 1, 7),
(11, 8, 7),
(12, 1, 6),
(13, 7, 6),
(14, 1, 3),
(15, 2, 3),
(22, 1, 18),
(23, 2, 19),
(24, 3, 20),
(25, 4, 21),
(26, 5, 22),
(27, 6, 23),
(28, 7, 24),
(29, 8, 25),
(30, 1, 26),
(31, 2, 27),
(32, 3, 28),
(33, 4, 29),
(34, 5, 30),
(35, 6, 31),
(36, 7, 32),
(37, 8, 33),
(38, 1, 34),
(39, 2, 35),
(40, 3, 36),
(41, 4, 37),
(42, 5, 38),
(43, 6, 39),
(44, 7, 40),
(45, 8, 41),
(46, 1, 42),
(47, 2, 43),
(48, 3, 44),
(49, 4, 45),
(50, 5, 46),
(51, 6, 47),
(52, 7, 48),
(53, 8, 49),
(54, 1, 50),
(55, 2, 51),
(56, 3, 52),
(57, 4, 53),
(58, 5, 54),
(59, 6, 55),
(60, 7, 56),
(61, 8, 57),
(62, 1, 58),
(63, 2, 59),
(64, 3, 60),
(65, 4, 61),
(66, 5, 62),
(67, 6, 63),
(68, 7, 64),
(69, 8, 65),
(70, 1, 66),
(71, 2, 67),
(72, 3, 68),
(73, 4, 69),
(74, 5, 70),
(75, 6, 71),
(76, 7, 72),
(77, 8, 73),
(78, 1, 74),
(79, 2, 75),
(80, 3, 76),
(81, 4, 77),
(82, 5, 78),
(83, 6, 79),
(84, 7, 80),
(85, 8, 81),
(86, 1, 82),
(87, 2, 83),
(88, 3, 84),
(89, 4, 85),
(90, 5, 86),
(91, 6, 87),
(92, 7, 88),
(93, 8, 89),
(94, 1, 90),
(95, 2, 91),
(96, 3, 92),
(97, 4, 93),
(98, 5, 94),
(99, 6, 95),
(100, 7, 96),
(101, 8, 97),
(102, 1, 98),
(103, 2, 99),
(104, 3, 100);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id_author`),
  ADD KEY `rights` (`rights`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `order_date` (`order_date`),
  ADD KEY `order_state` (`order_state`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `like` (`likes`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_time` (`product_time`);

--
-- Индексы таблицы `products_groups`
--
ALTER TABLE `products_groups`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `id_group_parent` (`id_group_parent`);

--
-- Индексы таблицы `products_in_order`
--
ALTER TABLE `products_in_order`
  ADD PRIMARY KEY (`id_product_in_order`);

--
-- Индексы таблицы `products_photos`
--
ALTER TABLE `products_photos`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `temp_orders`
--
ALTER TABLE `temp_orders`
  ADD PRIMARY KEY (`id_temp_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `num_of product` (`num_of product`);

--
-- Индексы таблицы `uid_groups`
--
ALTER TABLE `uid_groups`
  ADD PRIMARY KEY (`uid_groups`),
  ADD KEY `id_group` (`id_group`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `products_groups`
--
ALTER TABLE `products_groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products_in_order`
--
ALTER TABLE `products_in_order`
  MODIFY `id_product_in_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `products_photos`
--
ALTER TABLE `products_photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `temp_orders`
--
ALTER TABLE `temp_orders`
  MODIFY `id_temp_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `uid_groups`
--
ALTER TABLE `uid_groups`
  MODIFY `uid_groups` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
