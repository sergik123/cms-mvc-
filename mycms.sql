-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 01 2017 г., 13:37
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mycms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cms_menu`
--

CREATE TABLE IF NOT EXISTS `cms_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `name_menu` varchar(255) NOT NULL,
  `main_link` varchar(255) NOT NULL,
  `back_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id_menu`),
  UNIQUE KEY `name_menu` (`name_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(200) NOT NULL,
  `page_content` text NOT NULL,
  `visible` int(11) NOT NULL,
  `date_public` datetime NOT NULL,
  `main_file` varchar(200) NOT NULL,
  `page_password` varchar(255) NOT NULL,
  `pass_visible` int(11) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `template` varchar(100) NOT NULL,
  `page_include` varchar(255) NOT NULL,
  PRIMARY KEY (`id_page`),
  UNIQUE KEY `page_link` (`page_link`),
  UNIQUE KEY `page_include` (`page_include`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `cms_pages`
--

INSERT INTO `cms_pages` (`id_page`, `page_title`, `page_content`, `visible`, `date_public`, `main_file`, `page_password`, `pass_visible`, `page_link`, `template`, `page_include`) VALUES
(6, 'вавав', 'сайт', 0, '0000-00-00 00:00:00', 'test.php ', '', 0, '6912', 'land2', 'site');

-- --------------------------------------------------------

--
-- Структура таблицы `cms_posts`
--

CREATE TABLE IF NOT EXISTS `cms_posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `visible` int(11) NOT NULL,
  `date_public` datetime NOT NULL,
  `main_file` varchar(200) NOT NULL,
  `page_password` varchar(255) NOT NULL,
  `pass_visible` int(11) NOT NULL,
  `post_link` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  PRIMARY KEY (`id_post`),
  UNIQUE KEY `post_link` (`post_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `cms_posts`
--

INSERT INTO `cms_posts` (`id_post`, `post_title`, `post_content`, `visible`, `date_public`, `main_file`, `page_password`, `pass_visible`, `post_link`, `template`) VALUES
(1, 'test', 'проверка записи', 0, '0000-00-00 00:00:00', '', '', 0, '4551', ''),
(2, 'site', 'тестовая запись', 0, '0000-00-00 00:00:00', '', '', 0, '3020', ''),
(3, 'title_post2', 'проверка статьи с заголовком и текстом', 0, '0000-00-00 00:00:00', '', '', 0, '1430', ''),
(4, 'статья', 'какая-то статья под номером 4', 0, '0000-00-00 00:00:00', '', '', 0, '4', 'landing'),
(6, 'проверка', 'еще одна проверка записей', 0, '0000-00-00 00:00:00', '', '', 0, '1', 'landing'),
(10, 'Часы наручные', '<strong>содержимое статьи про часы наручные</strong>', 0, '0000-00-00 00:00:00', '', '', 0, '6398', ' land2'),
(11, 'заголовок статьи', 'проверка статьи', 0, '0000-00-00 00:00:00', '', '', 0, '6726', 'landing');

-- --------------------------------------------------------

--
-- Структура таблицы `cms_template`
--

CREATE TABLE IF NOT EXISTS `cms_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `cms_template`
--

INSERT INTO `cms_template` (`id`, `template_title`) VALUES
(1, 'landing');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
