-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 14 2017 г., 15:47
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_ka`
--

CREATE TABLE `admin_ka` (
  `admin_id` int(11) NOT NULL,
  `login_a` varchar(255) NOT NULL,
  `parol_a` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_ka`
--

INSERT INTO `admin_ka` (`admin_id`, `login_a`, `parol_a`) VALUES
(1, 'bohdanuk', '0516');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `comment_parent_id` bigint(20) DEFAULT NULL,
  `comment_username` varchar(255) DEFAULT NULL,
  `comment_text` text,
  `comment_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `comment_parent_id`, `comment_username`, `comment_text`, `comment_datetime`) VALUES
(1, 1, NULL, 'имя того что сделал комент', 'рцДФУАЩУЦФПЦУП', '2017-02-15 05:06:00'),
(2, 1, 1, 'имя того что сделал комент', 'ЫПЫПЫП', '2017-02-21 14:17:24'),
(3, 1, 1, 'имя того что сделал комент', 'ЫПЫПФЫВПЫ', '2017-02-08 15:49:51'),
(4, 5, NULL, 'имя того что сделал комент', 'первый уровень', '2017-02-09 13:44:16'),
(5, 5, 4, 'имя того что сделал комент', 'второй уровень', '2017-02-09 13:44:30'),
(6, 5, 5, 'имя того что сделал комент', 'третий уровень', '2017-02-09 13:44:38'),
(7, 2, NULL, 'имя того что сделал комент', 'АИВАИВА', '2017-02-08 15:49:51'),
(8, 3, NULL, 'имя того что сделал комент', 'ЧАРИЧАИВЫ\r\n', '2017-02-08 15:49:51'),
(9, 3, 8, 'имя того что сделал комент', 'ВРВКРВК', '2017-02-08 15:49:51'),
(10, 3, NULL, 'имя того что сделал комент', 'ЫРЫРЫВАРЫР', '2017-02-08 15:49:51'),
(11, 5, NULL, 'пупрувр', 'первый уровень второй комент', '2017-02-10 14:35:41'),
(12, 5, NULL, 'вр', 'первый уроверь третий комент', '2017-02-10 14:35:41'),
(13, 5, 4, 'ыпкпы', 'второй уровень 2 комент', '2017-02-10 14:35:41'),
(14, 5, 5, 'ыпыупы', 'третий уровень второй комент', '2017-02-10 14:35:41'),
(15, 5, 5, 'ямывмыв', 'трутий уровень 3 комент', '2017-02-10 14:35:41'),
(16, 1, 0, 'xb', 'xb', '2017-02-23 13:38:33'),
(17, 1, 0, 'sgsg', 'sgs', '2017-02-23 13:38:50'),
(18, 1, 0, 'sgsg', 'sgs', '2017-02-23 13:38:55');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `post_id` bigint(20) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_text` text,
  `post_create_datetime` datetime DEFAULT NULL,
  `post_update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_text`, `post_create_datetime`, `post_update_datetime`) VALUES
(3, 'третий', 'полный трктий', '2017-02-02 19:22:59', '2017-02-02 17:22:59'),
(4, 'четвертый', 'полный четвертый', '2017-02-02 19:22:59', '2017-02-02 17:22:59'),
(5, 'пятый', 'полный пятый', '2017-02-02 19:22:59', '2017-03-03 14:23:29'),
(77, 'dvsdvs', 'sdvsdvs', '2017-03-03 03:38:26', '2017-03-03 01:38:26'),
(78, 'пятый', 'ыпффыодвпофывмащывопжавдпмжвадпрддчсаамижсчэждмжчс', '2017-03-03 16:13:45', '2017-03-03 14:13:45'),
(81, '49', '49', '2017-03-14 14:41:42', '2017-03-14 12:41:42');

-- --------------------------------------------------------

--
-- Структура таблицы `post_to_tag`
--

CREATE TABLE `post_to_tag` (
  `post_to_tag_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_to_tag`
--

INSERT INTO `post_to_tag` (`post_to_tag_id`, `post_id`, `tag_id`) VALUES
(5, 3, 1),
(6, 4, 1),
(7, 5, 2),
(8, 5, 3),
(9, 5, 1),
(10, 5, 4),
(32, 77, 19),
(33, 77, 18),
(34, 77, 17),
(35, 77, 16),
(36, 77, 15),
(37, 77, 14),
(38, 77, 13),
(39, 78, 1),
(40, 78, 2),
(41, 78, 3),
(89, 81, 34),
(91, 81, 38),
(93, 81, 40),
(94, 81, 39);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `tag_title` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_title`) VALUES
(13, '1'),
(14, '2'),
(15, '3'),
(16, '4'),
(39, '49'),
(40, '50'),
(37, '66'),
(34, '77'),
(17, '8'),
(33, '88'),
(38, 'uuuuu'),
(18, 'yytyt'),
(19, 'yyy'),
(2, 'ВТРОЙ ТЕГ'),
(1, 'ПЕРВЫЙ ТЕГ'),
(3, 'ТРЕТИЙ ТЕГ');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `login_u` varchar(255) NOT NULL,
  `parol_u` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `login_u`, `parol_u`) VALUES
(1, 'perviq', '111'),
(2, 'vtoroq', '111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_ka`
--
ALTER TABLE `admin_ka`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD UNIQUE KEY `post_id` (`post_id`),
  ADD UNIQUE KEY `post_id_2` (`post_id`);

--
-- Индексы таблицы `post_to_tag`
--
ALTER TABLE `post_to_tag`
  ADD PRIMARY KEY (`post_to_tag_id`) USING BTREE,
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD UNIQUE KEY `tag_id` (`tag_id`),
  ADD UNIQUE KEY `tag_title` (`tag_title`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_ka`
--
ALTER TABLE `admin_ka`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT для таблицы `post_to_tag`
--
ALTER TABLE `post_to_tag`
  MODIFY `post_to_tag_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
