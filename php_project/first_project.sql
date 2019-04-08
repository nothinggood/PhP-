-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 01 2019 г., 05:39
-- Версия сервера: 5.7.21
-- Версия PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `first_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles_content`
--

DROP TABLE IF EXISTS `articles_content`;
CREATE TABLE IF NOT EXISTS `articles_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `text_block` text,
  `image` text,
  `id_prev` int(11) NOT NULL DEFAULT '0',
  `id_next` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles_content`
--

INSERT INTO `articles_content` (`id`, `article_id`, `text_block`, `image`, `id_prev`, `id_next`) VALUES
(1, 1, 'Решим систему из 3-х линейных алгебраических уравнений с помощью обратной матрицы(матричным методом.', NULL, 0, 2),
(2, 1, NULL, 'excel2007_img1.png', 1, 3),
(3, 1, 'Запишем в ячейки основную матрицу системы и столбец свободных членов.', NULL, 2, 4),
(4, 1, NULL, 'excel2007_img2.png', 3, 5),
(5, 1, 'Систему n линейных алгебраических уравнений с n неизвестными можно решать матричным методом только тогда, когда определитель основной матрицы системы отличен от нуля (в противном случае мы имеем линейно зависимые уравнения и соответственно решение систем не единственное). В нашем случае определитель =12.', NULL, 4, 6),
(6, 1, 'Вычислим обратную матрицу с помощью формулы массива МОБР().', NULL, 5, 7),
(7, 1, 'Для этого выделите ячейки A18:C20, а в Строке формул введите =МОБР(A11:C13), затем нажмите CTRL+SHIFT+ENTER.', NULL, 6, 8),
(8, 1, 'Решение системы уравнений получим умножением обратной матрицы и столбца свободных членов. Перемножить матрицы можно с помощью формулы массива =МУМНОЖ().', NULL, 7, 9),
(9, 1, 'Для этого выделите ячейки F18:F20, а в Строке формул введите =МУМНОЖ(A18:C20;F11:F13), затем нажмите CTRL+SHIFT+ENTER.', NULL, 8, 10),
(10, 1, 'В файле примера также приведено решение системы 4-х и 5-и уравнений.', NULL, 9, 11),
(11, 1, NULL, 'excel2007_img3.png', 10, 12),
(12, 2, 'Найдем матрицу, обратную матрице А. Для этого в ячейку А9 введем формулу =МОБР(A2:C4). После этого выделим диапазон А9:С11, начиная с ячейки, содержащей формулу. Нажмем клавишу F2, а затем нажмем клавиши CTRL+SHIFT+ENTER. Формула вставится как формула массива. =МОБР(A2:C4). \r\n', NULL, 0, 2),
(13, 2, 'Найдем произведение матриц A-1 * b. В ячейки F9:F11 введем формулу: =МУМНОЖ(A9:C11;D2:D4) как формулу массива. Получим в ячейках F9:F11 корни уравнения:\r\n\r\n', NULL, 1, 3),
(14, 2, NULL, 'excel2010_img1.png', 2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_info`
--

DROP TABLE IF EXISTS `articles_info`;
CREATE TABLE IF NOT EXISTS `articles_info` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_name` text NOT NULL,
  `excel_version` int(6) NOT NULL COMMENT 'в годах (2012/2018)',
  `example_file` text NOT NULL COMMENT 'ссылка на файл в папке',
  `exercise_file` text NOT NULL COMMENT 'ссылка на файл в папке',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles_info`
--

INSERT INTO `articles_info` (`article_id`, `article_name`, `excel_version`, `example_file`, `exercise_file`) VALUES
(1, 'Решение уравнений матричным методом в Excel 2007', 2007, 'example_2007.xlsx', 'exercise_2007.docx'),
(2, 'Решение уравнений матричным методом в Excel 2010', 2010, 'example_2010.xlsx', 'exercise_2010.docx');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text CHARACTER SET utf32 NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `date`, `article_id`) VALUES
(12, 'добрый вечер', 3, '2019-04-01 02:27:22', 1),
(13, 'я очень хочу спать, а ты?', 3, '2019-04-01 02:27:31', 1),
(20, 'кажется, и мне уже пора спать, вставать завтра рано совсем(((((', 13, '2019-04-01 03:00:23', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `statistics`
--

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE IF NOT EXISTS `statistics` (
  `test_id` int(11) NOT NULL,
  `note` int(2) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `test_id` (`test_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statistics`
--

INSERT INTO `statistics` (`test_id`, `note`, `user_id`, `date`) VALUES
(1, 3, 3, '2019-03-31 15:56:58'),
(1, 8, 3, '2019-03-31 16:28:30'),
(1, 5, 12, '2019-03-31 19:50:07'),
(1, 5, 12, '2019-03-31 19:51:03'),
(1, 5, 13, '2019-04-01 02:58:31'),
(1, 5, 3, '2019-04-01 08:11:25'),
(1, 5, 14, '2019-04-01 08:28:21');

-- --------------------------------------------------------

--
-- Структура таблицы `testing`
--

DROP TABLE IF EXISTS `testing`;
CREATE TABLE IF NOT EXISTS `testing` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) NOT NULL,
  `test_url` text NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `testing`
--

INSERT INTO `testing` (`test_id`, `test_name`, `test_url`) VALUES
(1, 'Решение систем уравнений матричным методом в Excel 2007', 'test_excel_2007.php');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `validation_code` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `role` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `validation_code`, `active`, `role`) VALUES
(2, 'Алина', 'Кондрашова', 'admin', 'admin@gmail.com', '4297f44b13955235245b2497399d7a93', '0', 1, 1),
(3, 'Милашка', 'Бубу', 'mi_bu', 'mi@gmail.com', '4297f44b13955235245b2497399d7a93', '0', 1, 0),
(12, 'Нина', 'Кондрашова', 'nina', 'nina@gmail.com', '4297f44b13955235245b2497399d7a93', '0', 1, 0),
(13, 'Илья', 'Илич', 'ilich', 'il@gmail.com', '4297f44b13955235245b2497399d7a93', '0', 1, 0),
(14, 'Key', 'Key', 'key', 'key@gmail.com', '4297f44b13955235245b2497399d7a93', '0', 1, 0);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles_content`
--
ALTER TABLE `articles_content`
  ADD CONSTRAINT `articles_content_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles_info` (`article_id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles_info` (`article_id`);

--
-- Ограничения внешнего ключа таблицы `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `testing` (`test_id`),
  ADD CONSTRAINT `statistics_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
