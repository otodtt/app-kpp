-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 16 окт 2022 в 18:08
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
  `date_add` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `added_by` tinyint(2) NOT NULL,
  `updated_by` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `stocks`
--

INSERT INTO `stocks` (`id`, `certificate_id`, `date_issue`, `import`, `export`, `internal`, `type_pack`, `number_packages`, `different`, `crop_id`, `crops_name`, `crop_en`, `variety`, `quality_class`, `weight`, `date_add`, `date_update`, `added_by`, `updated_by`) VALUES
(2, 1, 1665858752, 2, 0, 0, 4, 5, '', 34, 'Праз', 'Leek', '', '3', 200, '15.10.2022', '', 10, 0),
(6, 2, 1665860361, 2, 0, 0, 1, 1456, '', 68, 'Корнишони', 'Cornichons', '', '3', 19900, '15.10.2022', '', 10, 0),
(7, 2, 1665860936, 2, 0, 0, 4, 3, '', 37, 'Безглавеста салата', 'Lettuce', '', '1', 333, '15.10.2022', '', 10, 0),
(8, 1, 1665866315, 2, 0, 0, 3, 100, '', 33, 'Чесън', 'Garlic', '', '1', 500, '15.10.2022', '16.10.2022', 10, 10),
(9, 1, 1665866544, 2, 0, 0, 4, 56, '', 19, 'Домати ', 'Tomato', 'Идеал', '2', 1200, '15.10.2022', '16.10.2022', 10, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
