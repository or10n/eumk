-- phpMyAdmin SQL Dump
-- version 3.3.7deb2build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 09 2010 г., 16:19
-- Версия сервера: 5.1.49
-- Версия PHP: 5.3.3-1ubuntu9.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `eumk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db1_article`
--

CREATE TABLE IF NOT EXISTS `db1_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `text` longtext,
  PRIMARY KEY (`id`),
  KEY `FK_content_id` (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `db1_article`
--

INSERT INTO `db1_article` (`id`, `content_id`, `text`) VALUES
(2, 1, 'test article'),
(3, 1, 'gss sdf sfsd\r\nafs\r\naf\r\nsaf\r\nsda\r\nf \r\nsaf\r\ndsafsafsadfdsafsadfsadfsaf'),
(6, 1, 'sdfdsafasfsdaf'),
(7, 5, 'ыаыфаыфваыва раздела 1\r\n'),
(8, 1, '<p>Untitled document</p>\r\n<h2>Initialization of TinyMCE</h2>\r\n<p>In order to initialize the TinyMCE the following code must be placed  within HEAD element of a document. The following example is configured  to convert all TEXTAREA elements into editors when the page loads.   There are other <a title="TinyMCE:Configuration/mode" href="http://wiki.moxiecode.com/index.php/TinyMCE:Configuration/mode">modes</a> as well.</p>'),
(9, 1, '<p>sadfsdafsafdasfasf</p>\r\n<p>asdf</p>\r\n<p>dsf</p>\r\n<p>asd</p>\r\n<p>fas</p>\r\n<p>f</p>\r\n<p>asf</p>\r\n<p>af</p>\r\n<p>aaaaaaaaaaaaaaaaaaaa</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_contents`
--

CREATE TABLE IF NOT EXISTS `db1_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `db1_contents`
--

INSERT INTO `db1_contents` (`id`, `parent`, `position`, `title`) VALUES
(1, 0, 0, '/'),
(2, 0, 1, 'Введение'),
(3, 1, 3, 'Глава 1'),
(4, 1, 4, 'Глава 2'),
(5, 3, 4, 'Раздел 1');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_user`
--

CREATE TABLE IF NOT EXISTS `db1_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db1_user`
--

INSERT INTO `db1_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@mail.com');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `db1_article`
--
ALTER TABLE `db1_article`
  ADD CONSTRAINT `FK_content_id` FOREIGN KEY (`content_id`) REFERENCES `db1_contents` (`id`);
