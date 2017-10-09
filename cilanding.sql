-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 09 2017 г., 00:45
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cilanding`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`id`, `login`, `password`, `salt`) VALUES
(4, 'admin', '54f3fb3d4b97040f772abcc6d6a05c8d', 'd207bc9df1e48d62f59ce28402148ee9'),
(5, 'Mihairu', '8b065226932f77ced99232598c6d36f4', '95cd79689403166bb41f6151c63700b0');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL DEFAULT 'news',
  `title` varchar(500) NOT NULL,
  `seodescription` varchar(1000) NOT NULL,
  `seokeywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `module`, `title`, `seodescription`, `seokeywords`) VALUES
(6, 'news', 'test', '<p>tes</p>\r\n', 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `message`) VALUES
(21, 'Михаил', 'mis507@yandex.ru', '', '(Тема:test) undefined'),
(22, 'Михаил', 'mis507@yandex.ru', '', '(Тема:test) undefined'),
(23, 'Михаил', 'mis507@yandex.ru', '', '(Тема:test) undefined'),
(24, 'Михаил', 'mis507@yandex.ru', '', '<b>(Тема:test)</b> undefined'),
(25, 'Михаил', 'mis507@yandex.ru', '+7(981)-965-69-68', NULL),
(26, 'Михаил', 'mis507@yandex.ru', '+7(981)-965-69-68', NULL),
(27, 'Михаил', 'mis507@yandex.ru', '+7(981)-965-69-68', NULL),
(28, 'Михаил', 'mis507@yandex.ru', '+7(981)-965-69-68', NULL),
(29, 'Михаил', 'mis507@yandex.ru', NULL, '<b>(Тема:test)</b> undefined'),
(30, 'test', 'mis507@yandex.ru', '+7(981)-965-69-68', NULL),
(31, 'Михаил', 'mis507@yandex.ru', '+7(981)-965-69-68', NULL),
(32, 'Михаил', 'mis507@yandex.ru', '+7(981)-965-69-68', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(500) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `content`, `add_date`, `image`, `category_id`, `views`) VALUES
(1, 'test', '<p>testset</p>\r\n', '<p>etsstesetsette</p>\r\n', '2017-09-16 20:45:00', '/public/filemanager/1.png', 6, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `alias` varchar(500) NOT NULL,
  `metadescription` varchar(500) NOT NULL,
  `metakeywords` varchar(500) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `alias`, `metadescription`, `metakeywords`, `content`) VALUES
(1, 'О проекте', 'about', '', '', '<p>Социальный ресурс, где собираются активные люди, неравнодушные к чужим страданиям. Люди выкладывают фото и видео совершенных благих дел, выкладывают свои идеи, как помочь нуждающимся людям, объединяются в группы для реализации совместных проектов.</p>\r\n\r\n<p>Принцип-нужна помощь-зайди на ЛДЛ- должен уложиться в головах людей.</p>\r\n\r\n<p>В разделе&nbsp;<strong>Люди</strong>&nbsp;отображены все пользователи ресурса. В&nbsp;<strong>Делах</strong>&nbsp;можно найти все дела пользователей и присоединиться к тем, какие вызывают симпатию. Люди размещают объявления о дарении предметов, бесплатной помощи в разделе&nbsp;<strong>Услуги</strong>. Оставляйте отзывы в разделе&nbsp;<strong>Отзывы</strong>&nbsp;на других людей, предприятия и фирмы, если вы хотите поблагодарить их за что-то или указать на их недоработки.</p>\r\n\r\n<p><strong>Дневник проекта</strong>- раздел, в котором можно ознакомиться с наиболее значимыми событиями в развитии ЛДЛ.</p>\r\n\r\n<p><strong>Интервью</strong>- раздел, в котором публикуются интервью с людьми, которые делают много на благо других людей, являются примером для подражания.</p>\r\n\r\n<p><strong>Взаимопомощь</strong>- раздел, в котором люди выкладывают сообщения о своих находках, так же размещают объявления о пропаже людей.</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `image`, `title`, `caption`, `link`) VALUES
(4, '/public/filemanager/1.png', 'test', '32452', '23234');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_ibfk_1` (`category_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
