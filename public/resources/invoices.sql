-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 19 окт 2022 в 14:17
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
  `sum` float NOT NULL,
  `certificate_id` int(11) NOT NULL,
  `certificate_number` int(11) NOT NULL,
  `importer_id` int(11) NOT NULL,
  `importer_name` varchar(100) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `invoice_for` tinyint(2) NOT NULL,
  `date_create` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `created_by` tinyint(2) NOT NULL,
  `updated_at` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `invoices`
--

INSERT INTO `invoices` (`id`, `number_invoice`, `date_invoice`, `sum`, `certificate_id`, `certificate_number`, `importer_id`, `importer_name`, `identifier`, `invoice_for`, `date_create`, `date_update`, `created_by`, `updated_at`) VALUES
(1, '6571020601', 1665349200, 11.11, 1, 2001, 7, 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 'X-103/2001', 1, '19.10.2022', '', 10, 0),
(2, '6571020602', 1665522000, 12, 3, 2003, 3, 'Kolla Munchen Gbmh', 'X-103/2003', 1, '19.10.2022', '', 10, 0),
(3, '6571020603', 1665608400, 33, 2, 2002, 1, 'Emi Frut Eood', 'X-103/2002', 1, '19.10.2022', '', 10, 0),
(4, '6571020604', 1665694800, 40, 4, 2004, 8, 'Rodopi Les 65 Eood ', 'X-103/2004', 1, '19.10.2022', '19.10.2022', 10, 10),
(5, '6571020605', 1665781200, 60.6, 5, 2005, 13, 'G.m.g. Bulgaria', 'X-103/2005', 1, '19.10.2022', '', 10, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
