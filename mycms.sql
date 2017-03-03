-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 03 2017 г., 12:33
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
  `main_link` varchar(255) NOT NULL,
  `back_link` varchar(255) NOT NULL,
  `name_menu` varchar(255) NOT NULL,
  `main_url` varchar(255) NOT NULL,
  `back_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `cms_menu`
--

INSERT INTO `cms_menu` (`id_menu`, `main_link`, `back_link`, `name_menu`, `main_url`, `back_url`) VALUES
(1, 'first', '', 'main', 'link/1', ''),
(2, 'second', '', 'main', 'link/2', ''),
(3, 'third', '', 'main', 'link/3', ''),
(4, 'Главная', '', 'link', '/page/single/index', ''),
(5, 'Все статьи', 'Последняя статья', 'link', '/page/single/all', '/page/single/last'),
(6, 'О нас', '', 'link', '/page/single/about', ''),
(7, 'Контакты', '', 'link', '/page/single/contacts', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `cms_pages`
--

INSERT INTO `cms_pages` (`id_page`, `page_title`, `page_content`, `visible`, `date_public`, `main_file`, `page_password`, `pass_visible`, `page_link`, `template`, `page_include`) VALUES
(6, 'Главная', '', 0, '0000-00-00 00:00:00', 'index.php ', '', 0, '6912', 'land2', 'index'),
(7, 'О нас', '<div id="contact-page" class="container" style="\r\n    line-height: 1.5;">\r\n<div class="bg">\r\n<div class="row">\r\n<div class="col-sm-12">\r\n<h2 class="title text-center" style="color: blue;">О нашем сайте</h2>\r\nИнтернет магазин timeonline.biz был создан в конце 2015 года. К сожалению мы пока не имеем своего склада, поэтому весь товар мы доставляем непосредственно после получения товара от поставщика. Время доставки товара покупателю как правило составляет 1-2 дня. Мы очень тщательно подходим к выбору поставщика и проверяем его продукцию, перед тем как отправить ее вам.За такое короткое время со дня открытия нашего сайта, у нас уже появились постоянные клиенты. Мы стараемся сделать все, чтобы наши клиенты были довольны работой нашего сайта.\r\n\r\nМы очень хотим чтобы наш интернет магазин стал лучшим интернет магазином в городе Харькове, и готовы работать чтобы достичь этой цели.\r\n\r\nЕсли у вас есть предложения или пожелания по работе нашего интернет магазина, вы всегда можете написать нам на почту timeforyou@mail.ua с темой письма "интернет-магазин". Мы обязательно прочтем ваше письмо и прислушаемся к вашим пожеланиям.\r\n\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 0, '0000-00-00 00:00:00', 'page2.php ', '', 0, '5151', 'land2', 'about'),
(8, 'Все статьи', '', 0, '0000-00-00 00:00:00', 'post.php ', '', 0, '4871', 'land2', 'all'),
(9, 'Последняя статья', '', 0, '0000-00-00 00:00:00', 'last.php ', '', 0, '6612', 'land2', 'last'),
(10, 'Контакты', '<div class="col-sm-12">\r\n<h2 class="title text-center" style="\r\n    color: blue;\r\n">Контакты</h2>\r\n<div id="gmap" class="contact-map">\r\n<div id="contacts">\r\n\r\n<b>Вы можете связаться с нами следующими способами:</b>\r\n<h3><strong>1.Скайп</strong></h3>\r\nЛогин: pringls3\r\n<h3><strong>2. Электронная почта</strong></h3>\r\ntimeforyou@mail.ua\r\n<h3><strong>3. Телефон</strong></h3>\r\n+380999212052. (Если мы не ответим на ваш звонок, то мы обязательно перезвоним вам позже)\r\n\r\n</div>\r\n</div>\r\n</div>', 0, '0000-00-00 00:00:00', 'page2.php ', '', 0, '1288', 'land2', 'contacts');

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
(1, 'test', 'проверка записи', 0, '0000-00-00 00:00:00', '', '', 0, '4551', 'land2'),
(2, 'site', 'тестовая запись', 1, '2017-12-03 11:24:25', '', '', 0, '3020', 'land2'),
(3, 'title_post2', 'проверка статьи с заголовком и текстом', 0, '0000-00-00 00:00:00', '', '', 0, '1430', 'land2'),
(4, 'статья', 'какая-то статья под номером 4', 0, '0000-00-00 00:00:00', '', '', 0, '4', 'landing'),
(6, 'проверка', 'еще одна проверка записей', 0, '0000-00-00 00:00:00', '', '', 0, '1', 'landing'),
(10, 'Часы наручные', '<strong>содержимое статьи про часы наручные</strong>', 0, '0000-00-00 00:00:00', '', '', 0, '6398', ' landing'),
(11, 'заголовок статьи', 'проверка статьи', 0, '0000-00-00 00:00:00', '', '', 0, '6726', 'land2');

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
(1, 'land2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
