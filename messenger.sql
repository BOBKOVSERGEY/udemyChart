-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 24 2018 г., 12:41
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
-- Структура таблицы `clean`
--

CREATE TABLE `clean` (
  `id` int(11) UNSIGNED NOT NULL,
  `clean_message_id` int(11) NOT NULL,
  `clean_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clean`
--

INSERT INTO `clean` (`id`, `clean_message_id`, `clean_user_id`) VALUES
(4, 1, 14),
(5, 40, 15),
(6, 63, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `msg_type` varchar(50) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`msg_id`, `message`, `msg_type`, `user_id`, `msg_time`) VALUES
(38, 'hi, how are you&', 'text', 14, '2018-12-20 08:02:20'),
(39, 'paymentInstructions.pdf', 'pdf', 14, '2018-12-20 08:02:39'),
(40, 'hello', 'text', 15, '2018-12-20 08:04:19'),
(41, 'Б-1422566443-1.rtf', 'rtf', 14, '2018-12-20 08:11:01'),
(42, 'Презентация Microsoft PowerPoint.pptx', 'pptx', 14, '2018-12-20 08:12:27'),
(43, 'pres.pptx', 'pptx', 14, '2018-12-20 08:13:19'),
(44, 'xxxl', 'text', 15, '2018-12-20 08:22:19'),
(45, 'r-n-y-2.jpg', 'jpg', 15, '2018-12-20 08:44:04'),
(46, 'r-n-y-2.jpg', 'jpg', 14, '2018-12-20 08:44:48'),
(47, 's-b.png', 'png', 15, '2018-12-20 08:48:44'),
(48, 'some', 'text', 14, '2018-12-20 08:50:53'),
(49, 'how are you?', 'text', 15, '2018-12-20 08:51:57'),
(50, 'am fine', 'text', 14, '2018-12-20 08:52:15'),
(51, 'Social-Network-Part47.zip', 'zip', 15, '2018-12-20 08:55:48'),
(52, 'paymentInstructions.pdf', 'pdf', 15, '2018-12-20 08:57:55'),
(53, 'assets/emoji/emoji11.png', 'emojy', 15, '2018-12-20 09:03:10'),
(54, 'kira', 'text', 14, '2018-12-20 09:03:45'),
(55, 'assets/emoji/emoji8.png', 'emojy', 14, '2018-12-20 09:03:54'),
(56, 'assets/emoji/emoji9.png', 'emojy', 15, '2018-12-20 09:04:03'),
(57, 'new.xlsx', 'xlsx', 15, '2018-12-20 09:08:59'),
(58, 'Б-1422566443-1.rtf', 'rtf', 15, '2018-12-20 09:09:11'),
(59, 'some.docx', 'docx', 15, '2018-12-20 09:09:30'),
(60, 'pres.pptx', 'pptx', 15, '2018-12-20 09:09:42'),
(61, 'some', 'text', 14, '2018-12-20 09:11:14'),
(62, 'assets/emoji/emoji16.png', 'emojy', 14, '2018-12-20 09:11:36'),
(64, 'hi', 'text', 15, '2018-12-20 09:34:50'),
(65, 'hi', 'text', 14, '2018-12-20 09:49:54'),
(66, 'some', 'text', 14, '2018-12-20 10:25:55'),
(67, 'assets/emoji/emoji19.png', 'emojy', 14, '2018-12-24 07:33:53'),
(68, 'assets/emoji/emoji5.png', 'emojy', 14, '2018-12-24 07:38:41'),
(69, 'assets/emoji/emoji14.png', 'emojy', 15, '2018-12-24 07:45:43'),
(70, 'assets/emoji/emoji19.png', 'emojy', 15, '2018-12-24 07:45:55'),
(71, 'fireworks-3816694_1280.jpg', 'jpg', 15, '2018-12-24 07:46:06'),
(72, 'hello', 'text', 15, '2018-12-24 07:46:12'),
(73, 'some.docx', 'docx', 15, '2018-12-24 07:46:46'),
(74, 'assets/emoji/emoji10.png', 'emojy', 15, '2018-12-24 07:57:34'),
(75, 'assets/emoji/emoji16.png', 'emojy', 15, '2018-12-24 07:57:37'),
(76, 'assets/emoji/emoji17.png', 'emojy', 15, '2018-12-24 07:57:38'),
(77, 'assets/emoji/emoji11.png', 'emojy', 15, '2018-12-24 08:00:10'),
(78, 'assets/emoji/emoji18.png', 'emojy', 15, '2018-12-24 08:02:54'),
(79, 'hi', 'text', 15, '2018-12-24 08:03:05'),
(80, 'new', 'text', 15, '2018-12-24 08:03:09'),
(81, 'happy-year-3848864_1280.jpg', 'jpg', 15, '2018-12-24 08:03:24'),
(82, 'assets/emoji/emoji18.png', 'emojy', 15, '2018-12-24 08:05:47'),
(83, 'assets/emoji/emoji5.png', 'emojy', 15, '2018-12-24 08:05:52'),
(84, 'Depositphotos_37101985_original.jpg', 'jpg', 15, '2018-12-24 08:05:58'),
(85, 'assets/emoji/emoji5.png', 'emojy', 14, '2018-12-24 08:07:32'),
(86, 'assets/emoji/emoji19.png', 'emojy', 14, '2018-12-24 08:08:04'),
(87, 'оророр', 'text', 14, '2018-12-24 08:08:11'),
(88, 'vozdyhovody-v-ognezashite.jpg', 'jpg', 14, '2018-12-24 08:08:22'),
(89, 'new.xlsx', 'xlsx', 14, '2018-12-24 08:08:32'),
(90, 'hi serg', 'text', 15, '2018-12-24 08:12:42'),
(91, 'Depositphotos_37101985_original.jpg', 'jpg', 15, '2018-12-24 08:12:51'),
(92, 'assets/emoji/emoji18.png', 'emojy', 14, '2018-12-24 08:22:02'),
(93, 'assets/emoji/emoji19.png', 'emojy', 14, '2018-12-24 08:22:08'),
(94, 'assets/emoji/emoji9.png', 'emojy', 14, '2018-12-24 08:22:13'),
(95, 'assets/emoji/emoji3.png', 'emojy', 14, '2018-12-24 08:22:25'),
(96, 'assets/emoji/emoji14.png', 'emojy', 14, '2018-12-24 09:39:09'),
(97, 'ааа', 'text', 14, '2018-12-24 09:39:15'),
(98, 'assets/emoji/emoji5.png', 'emojy', 14, '2018-12-24 09:39:34');

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
  `status` int(11) NOT NULL,
  `clean_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `status`, `clean_status`) VALUES
(14, 'Сергей Бобков', 'sergey_bobkov@inbox.ru', '$2y$10$.XuBYsure4V4fPp70DGdzepDODWrPmC5Sqjn8a94z8AANRulEFqoy', 'r-n-y.jpg', 1, 1),
(15, 'Таран Кира', 'taran.kira@rambler.ru', '$2y$10$X9UmveLUlDFZPBFnXZjyP.ttPgi5ywetVaOtVh07lL/JfmP2BpaS6', 'happy-year-3848864_1280.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_activities`
--

CREATE TABLE `users_activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_activities`
--

INSERT INTO `users_activities` (`id`, `user_id`, `login_time`) VALUES
(1, 14, '1545644338');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clean`
--
ALTER TABLE `clean`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clean`
--
ALTER TABLE `clean`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
