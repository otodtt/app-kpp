-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 20 септ 2022 в 14:25
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
-- Структура на таблица `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL,
  `area_id` tinyint(2) NOT NULL,
  `odbh_city` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `index_in` varchar(5) NOT NULL,
  `in_second` varchar(5) NOT NULL,
  `index_out` varchar(5) NOT NULL,
  `out_second` varchar(5) NOT NULL,
  `lock_permit` tinyint(4) NOT NULL DEFAULT '0',
  `q_index` varchar(5) NOT NULL,
  `authority_bg` varchar(100) NOT NULL,
  `authority_en` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `settings`
--

INSERT INTO `settings` (`id`, `area`, `area_id`, `odbh_city`, `city`, `postal_code`, `address`, `mail`, `site`, `phone`, `fax`, `index_in`, `in_second`, `index_out`, `out_second`, `lock_permit`, `q_index`, `authority_bg`, `authority_en`, `updated_at`) VALUES
(1, 'Хасково', 26, 'Хасково', 'гр. Хасково', '6300', 'бул. \"Освобождение\" № 57', 'RVS_26@nvms.government.bg', 'bfsa.egov.bg', '38/66 10 49', '38/66 10 49', 'II', '', 'I', 'РЗ', 1, '', '', '', '2022-09-20 11:40:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
