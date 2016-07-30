-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 30 2016 г., 15:22
-- Версия сервера: 5.7.11
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, 1469812634, '127.0.0.1', 'vmBnJdFP'),
(2, 1469812702, '127.0.0.1', 'MT6lkgHe'),
(3, 1469812707, '127.0.0.1', 'IyWHGJOF'),
(4, 1469812710, '127.0.0.1', '3d2zJjiX'),
(5, 1469812855, '127.0.0.1', 'EZwDHNXr'),
(6, 1469812856, '127.0.0.1', 'sONx4Fm6'),
(7, 1469812861, '127.0.0.1', 'g6Vp3FMY'),
(8, 1469812896, '127.0.0.1', 'ztEhpivb'),
(9, 1469812897, '127.0.0.1', 's8yvtA2I'),
(10, 1469812916, '127.0.0.1', 'Z1BLmIYk'),
(11, 1469812916, '127.0.0.1', '0ejXy4Sz'),
(12, 1469812999, '127.0.0.1', 'qEoZLcx5'),
(13, 1469813013, '127.0.0.1', 'rosdAl4m'),
(14, 1469813014, '127.0.0.1', 'bzsUqaKG'),
(15, 1469813022, '127.0.0.1', 'jFfXk8al'),
(16, 1469813036, '127.0.0.1', 'g4Bw5vMP'),
(17, 1469813040, '127.0.0.1', 'B43Wxvwo'),
(18, 1469813061, '127.0.0.1', 'Dbc9JH0y'),
(19, 1469881248, '127.0.0.1', 'nkygWBrm');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) unsigned NOT NULL,
  `category` varchar(300) NOT NULL,
  `category_name` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`, `category_name`) VALUES
(1, 'Статьи', 'Article'),
(2, 'Сниппеты', 'Snippets');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(500) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `img`, `category_id`) VALUES
(65, 'Проверка', 'Использовалось ООП и MVC', '1.jpg', 1),
(66, 'Проверка 2', '2', '2.jpg', 2),
(68, 'Проверка вывода', 'sad', 'MoGo_FREE_Template_by_Laaqiq.jpg', 1),
(70, 'Проверка загрузки', 'Использовалось ООП и MVC', 'N3fDxVD4FgY.jpg', 1),
(85, 'qwe', 'qwe', '11.jpg', 2),
(86, 'asd', 'dsa', 'css.jpg', 1),
(87, 'Lol', 'ogk', 'sql1.jpg', 1),
(88, 'fff', 'fff', 'flex.jpg', 2),
(89, 'wewq', 'ewqq', 'start.jpg', 2),
(90, 'eqwe', 'qweqwe', 'patt.jpg', 2),
(92, '321', '312', 'end1.jpg', 2),
(94, '312', '123', 'patt1.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(300) NOT NULL,
  `age` int(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `age`) VALUES
(1, 'QW', 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
