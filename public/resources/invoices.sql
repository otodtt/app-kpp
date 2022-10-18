-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 18 окт 2022 в 14:26
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
-- Структура на таблица `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_invoice` varchar(20) NOT NULL,
  `date_invoice` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `certificate_id` int(11) NOT NULL,
  `importer_id` int(11) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `date_create` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `created_by` tinyint(2) NOT NULL,
  `updated_at` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
