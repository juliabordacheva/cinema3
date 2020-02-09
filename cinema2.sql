-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2020 г., 18:08
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addmovie`
--

CREATE TABLE `addmovie` (
  `id` int(11) UNSIGNED NOT NULL,
  `movie_title` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `addmovie`
--

INSERT INTO `addmovie` (`id`, `movie_title`) VALUES
(1, 'Фильм с Александром Петровым №369'),
(2, 'Фильм с Александром Петровым №2467');

-- --------------------------------------------------------

--
-- Структура таблицы `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `calendar`
--

INSERT INTO `calendar` (`id`, `day`, `number`) VALUES
(1, 'пн', 31),
(2, 'вт', 1),
(3, 'ср', 2),
(4, 'чт', 3),
(5, 'пт', 4),
(6, 'сб', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `hallconfig`
--

CREATE TABLE `hallconfig` (
  `id` int(11) UNSIGNED NOT NULL,
  `hall_number` tinyint(1) UNSIGNED DEFAULT NULL,
  `rows` int(11) UNSIGNED DEFAULT NULL,
  `places` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `hallconfig`
--

INSERT INTO `hallconfig` (`id`, `hall_number`, `rows`, `places`) VALUES
(1, 1, 2, 4),
(2, 1, 2, 4),
(3, 1, 2, 4),
(4, 1, 2, 4),
(5, 1, 2, 4),
(6, 1, 2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `halls`
--

CREATE TABLE `halls` (
  `id` int(11) UNSIGNED NOT NULL,
  `hall_name` int(11) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `halls`
--

INSERT INTO `halls` (`id`, `hall_name`, `status`) VALUES
(2, 2, 'closed'),
(7, 1, 'closed');

-- --------------------------------------------------------

--
-- Структура таблицы `hallschema`
--

CREATE TABLE `hallschema` (
  `id` int(10) UNSIGNED NOT NULL,
  `hallname` int(11) NOT NULL,
  `rows` int(11) NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `timing` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `priceconfig`
--

CREATE TABLE `priceconfig` (
  `id` int(11) UNSIGNED NOT NULL,
  `hall_number` int(11) UNSIGNED DEFAULT NULL,
  `standartprice` int(11) UNSIGNED DEFAULT NULL,
  `vipprice` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `priceconfig`
--

INSERT INTO `priceconfig` (`id`, `hall_number`, `standartprice`, `vipprice`) VALUES
(1, NULL, 788, 655),
(2, NULL, 678678, 34343),
(3, 2, 666, 35088),
(4, 2, 45, 35067),
(5, 1, 98888, 777777);

-- --------------------------------------------------------

--
-- Структура таблицы `seanses`
--

CREATE TABLE `seanses` (
  `id` int(11) UNSIGNED NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `hall_number` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `seanses`
--

INSERT INTO `seanses` (`id`, `time`, `hall_number`) VALUES
(1, '03:51', 1),
(3, '12:00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(30) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `address`, `role`) VALUES
(1, 'admin', '123', 'admin@mail.com', 'admin', '', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addmovie`
--
ALTER TABLE `addmovie`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hallconfig`
--
ALTER TABLE `hallconfig`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hallschema`
--
ALTER TABLE `hallschema`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `priceconfig`
--
ALTER TABLE `priceconfig`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `seanses`
--
ALTER TABLE `seanses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addmovie`
--
ALTER TABLE `addmovie`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `hallconfig`
--
ALTER TABLE `hallconfig`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `hallschema`
--
ALTER TABLE `hallschema`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `priceconfig`
--
ALTER TABLE `priceconfig`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `seanses`
--
ALTER TABLE `seanses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
