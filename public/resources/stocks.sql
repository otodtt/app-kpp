-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 23 окт 2022 в 17:40
-- Версия на сървъра: 5.7.36
-- Версия на PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `kppz`
--

-- --------------------------------------------------------

--
-- Структура на таблица `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_id` int(11) NOT NULL,
  `certificate_number` int(11) NOT NULL,
  `firm_id` int(11) NOT NULL,
  `firm_name` varchar(200) NOT NULL,
  `date_issue` int(11) NOT NULL,
  `import` int(11) NOT NULL,
  `export` int(11) NOT NULL,
  `internal` int(11) NOT NULL,
  `type_pack` int(11) NOT NULL,
  `number_packages` int(11) NOT NULL,
  `different` varchar(100) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crops_name` varchar(200) NOT NULL,
  `crop_en` varchar(200) NOT NULL,
  `variety` varchar(200) NOT NULL,
  `quality_class` varchar(100) NOT NULL,
  `weight` int(11) NOT NULL,
  `inspector_name` varchar(100) NOT NULL,
  `date_add` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `added_by` tinyint(2) NOT NULL,
  `updated_by` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `stocks`
--

INSERT INTO `stocks` (`id`, `certificate_id`, `certificate_number`, `firm_id`, `firm_name`, `date_issue`, `import`, `export`, `internal`, `type_pack`, `number_packages`, `different`, `crop_id`, `crops_name`, `crop_en`, `variety`, `quality_class`, `weight`, `inspector_name`, `date_add`, `date_update`, `added_by`, `updated_by`) VALUES
(1, 1, 2001, 1, 'Emi Frut Eood', 1581968682, 2, 0, 0, 4, 111, '', 18, 'Картофи', 'Potato', '', '1', 100, 'М. Чанкова', '17.02.2020', '', 10, 0),
(2, 1, 2001, 1, 'Emi Frut Eood', 1581968702, 2, 0, 0, 4, 22, '', 19, 'Домати ', 'Tomato', 'Идеал', '1', 220, 'М. Чанкова', '17.02.2020', '', 10, 0),
(3, 1, 2001, 1, 'Emi Frut Eood', 1581968720, 2, 0, 0, 4, 33, '', 20, 'Патладжан', 'Eggplant', '', '1', 300, 'М. Чанкова', '17.02.2020', '', 10, 0),
(4, 2, 2002, 2, 'Forever 9 Eood', 1594925444, 2, 0, 0, 4, 22, '', 21, 'Пипер ', 'Pepper', '', '1', 200, 'М. Чанкова', '16.07.2020', '', 10, 0),
(5, 4, 2004, 3, 'Kolla Munchen Gbmh', 1666465466, 2, 0, 0, 4, 44, '', 22, 'Зеле', 'Cabbage', '', '3', 440, 'А. Тонев', '22.10.2022', '', 9, 0),
(6, 4, 2004, 3, 'Kolla Munchen Gbmh', 1666465482, 2, 0, 0, 1, 55, '', 27, 'Броколи ', 'Broccoli', '', '3', 500, 'А. Тонев', '22.10.2022', '', 9, 0),
(7, 3, 2003, 3, 'Kolla Munchen Gbmh', 1666465516, 2, 0, 0, 3, 33, '', 30, 'Пъпеши', 'Melons', '', '2', 300, 'А. Тонев', '22.10.2022', '', 9, 0),
(8, 3, 2003, 3, 'Kolla Munchen Gbmh', 1666465535, 2, 0, 0, 999, 1, 'Насипно', 32, 'Лук', 'Onion', '', '1', 501, 'А. Тонев', '22.10.2022', '', 9, 0),
(9, 5, 2005, 8, 'Rodopi Les 65 Eood ', 1666465928, 2, 0, 0, 1, 66, '', 30, 'Пъпеши', 'Melons', '', '3', 600, 'А. Тонев', '22.10.2022', '22.10.2022', 9, 9),
(10, 5, 2005, 8, 'Rodopi Les 65 Eood ', 1666465943, 2, 0, 0, 4, 77, '', 27, 'Броколи ', 'Broccoli', '', '1', 700, 'А. Тонев', '22.10.2022', '22.10.2022', 9, 9),
(11, 6, 2006, 7, 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 1666466158, 2, 0, 0, 4, 33, '', 32, 'Лук', 'Onion', '', '1', 19900, 'В. Наков', '22.10.2022', '', 8, 0),
(12, 6, 2006, 7, 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 1666466175, 2, 0, 0, 2, 2, '', 65, 'Лимони', 'Lemons', '', '1', 500, 'В. Наков', '22.10.2022', '', 8, 0),
(13, 7, 2007, 10, 'Et Lina 07- Vladimir Ivanov', 1666466478, 2, 0, 0, 2, 7, '', 35, 'Шалот', 'Shallot', '', '1', 24300, 'В. Наков', '22.10.2022', '', 8, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
