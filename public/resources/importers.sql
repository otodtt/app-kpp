-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 18 септ 2022 в 21:16
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
-- Структура на таблица `importers`
--

DROP TABLE IF EXISTS `importers`;
CREATE TABLE IF NOT EXISTS `importers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_bg` varchar(300) NOT NULL,
  `address_bg` varchar(500) NOT NULL,
  `vin` varchar(40) NOT NULL,
  `name_en` varchar(300) NOT NULL,
  `address_en` varchar(500) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_bulgarian` tinyint(2) NOT NULL DEFAULT '0',
  `created_by` tinyint(2) NOT NULL,
  `updated_by` tinyint(2) NOT NULL,
  `date_create` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `importers`
--

INSERT INTO `importers` (`id`, `name_bg`, `address_bg`, `vin`, `name_en`, `address_en`, `is_active`, `is_bulgarian`, `created_by`, `updated_by`, `date_create`, `date_update`) VALUES
(1, 'Еми Фрут Еоод', 'гр. Асеновград, ул. Гоце Делчев 91', '200493997', 'Emi Frut Eood', 'ASENOVGRAD, UL. GOTCE DELCHEV 91', 1, 0, 2, 0, '18.09.2022 22:07:05', ''),
(2, 'Форевър 9 Еоод', 'гр. София, р-н Искър, бл. 9, вх. 3, ет. 3', '203020031', 'Forever 9 Eood', 'BULGARIA, SOFIA, DRUJBA BL. 9, VH. J, AP. 11', 1, 0, 2, 0, '18.09.2022 22:07:42', ''),
(3, '', '', 'EORI:DE2402149 VAT NO:BG 3074097765', 'Kolla Munchen Gbmh', 'MAISTRASSE 45 D-80337, MUNCHEN, GERMANY', 1, 1, 2, 8, '18.09.2022 22:08:31', '19.09.2022 00:11:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
