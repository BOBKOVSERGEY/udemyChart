-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 15 2018 г., 17:04
-- Версия сервера: 5.7.20
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `messenger`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `msg_type` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`msg_id`, `message`, `msg_type`, `user_id`, `msg_time`) VALUES
(1, 'gggg', 'text', 12, '2018-11-15 13:52:39'),
(2, '', 'text', 12, '2018-11-15 13:53:08'),
(3, 'ff', 'text', 12, '2018-11-15 13:54:34'),
(4, 'ууууууу', 'text', 12, '2018-11-15 13:57:02'),
(5, 'ffууу', 'text', 12, '2018-11-15 13:57:26'),
(6, 'кккккк', 'text', 12, '2018-11-15 13:57:48'),
(7, 'jj', 'text', 12, '2018-11-15 13:59:04'),
(8, 'hello brother what\'s ap?', 'text', 12, '2018-11-15 14:03:07');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `status`) VALUES
(12, 'Сергей', 'sergey_bobkov@inbox.ru', '$2y$10$77tyaDXm64AC/XKe5ZyFq.7sw9ogkCJKAHMrQJS3HfBgf8dRCw4Ka', 'logo.jpg', 1),
(13, 'Sergey Bobkov', 'pochta@pktitan.ru', '$2y$10$jdmY8hf.qI7nDqPT764a2.GJr7j43awrLwanj7L0zC4MUgoDDKnDG', 'about.jpg', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
