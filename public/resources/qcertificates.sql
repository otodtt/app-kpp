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
-- Структура на таблица `qcertificates`
--

DROP TABLE IF EXISTS `qcertificates`;
CREATE TABLE IF NOT EXISTS `qcertificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_id` int(11) NOT NULL,
  `import` int(11) NOT NULL,
  `is_all` tinyint(1) NOT NULL DEFAULT '0',
  `what_7` tinyint(2) NOT NULL,
  `type_crops` tinyint(2) NOT NULL,
  `importer_id` tinyint(3) NOT NULL,
  `importer_name` varchar(300) NOT NULL,
  `importer_address` varchar(300) NOT NULL,
  `importer_vin` varchar(100) NOT NULL,
  `packer_name` varchar(300) NOT NULL,
  `packer_address` varchar(500) NOT NULL,
  `stamp_number` varchar(10) NOT NULL,
  `authority_bg` varchar(50) NOT NULL,
  `authority_en` varchar(50) NOT NULL,
  `id_country` tinyint(1) NOT NULL,
  `for_country_bg` varchar(300) NOT NULL,
  `for_country_en` varchar(300) NOT NULL,
  `observations` varchar(500) NOT NULL,
  `transport` varchar(100) NOT NULL,
  `from_country` varchar(300) NOT NULL,
  `customs_bg` varchar(100) NOT NULL,
  `customs_en` varchar(100) NOT NULL,
  `place_bg` varchar(100) NOT NULL,
  `place_en` varchar(100) NOT NULL,
  `date_issue` int(11) NOT NULL,
  `valid_until` varchar(20) NOT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT '0',
  `inspector_bg` varchar(50) NOT NULL,
  `inspector_en` varchar(50) NOT NULL,
  `date_add` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `added_by` tinyint(2) NOT NULL,
  `updated_by` tinyint(2) NOT NULL,
  `is_lock` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `qcertificates`
--

INSERT INTO `qcertificates` (`id`, `certificate_id`, `import`, `is_all`, `what_7`, `type_crops`, `importer_id`, `importer_name`, `importer_address`, `importer_vin`, `packer_name`, `packer_address`, `stamp_number`, `authority_bg`, `authority_en`, `id_country`, `for_country_bg`, `for_country_en`, `observations`, `transport`, `from_country`, `customs_bg`, `customs_en`, `place_bg`, `place_en`, `date_issue`, `valid_until`, `invoice_id`, `inspector_bg`, `inspector_en`, `date_add`, `date_update`, `added_by`, `updated_by`, `is_lock`) VALUES
(1, 0, 2001, 1, 2, 1, 7, 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 'EICHENSTRASSE 11-A-D, DE-85445 OBERDING, GERMANY', 'ATU57056358', 'LIDER GIDA SANAYI VE DIS TICARET LTD', 'STI. CARSI MAH.DEREBOYU SOK.NO:18/1/ ORTAHISAR/TRABZON/TURKEY', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 49, 'Чехия', 'Czech Republic', '', '31AJN161/ 31 AJH167', 'България/ Bulgaria', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1665858752, '17.10.2022', 0, 'Мария Чанкова', 'Marya Chankova', '15.10.2022', '16.10.2022', 10, 10, 1),
(2, 0, 2002, 2, 2, 2, 9, 'Rodopi Agro Ltd', 'BUL. ILINDEN 47A, 6300, HASKOVO, BULGARIA ', '203227133', 'SENOL HOCAOGLU KORUK ORGANIK TARIM ', 'URUNLERI HURRIET MAH 1058 SK NO:43/2/ GAZIEMIR/IZMIR/TURKEY', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 9, 'България', 'Bulgaria', '', '07AAG455/ 15AAS175', 'Турция/Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1665860361, '16.10.2022', 0, 'Мария Чанкова', 'Marya Chankova', '15.10.2022', '17.10.2022', 10, 10, 0),
(3, 0, 2003, 3, 2, 1, 3, 'Kolla Munchen Gbmh', 'MAISTRASSE 45 D-80337, MUNCHEN, GERMANY', 'EORI:DE2402149 VAT NO:BG 3074097765', 'ADSS OOD', 'Addres 454', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 24, 'Латвия', 'Latvia', '', 'AS54/AD876', 'Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666001449, '20.10.2022', 0, 'Мария Чанкова', 'Marya Chankova', '17.10.2022', '17.10.2022', 10, 10, 1),
(4, 0, 2004, 4, 2, 2, 8, 'Rodopi Les 65 Eood ', 'STR.POLKOVNIK VESELIN VALKOV 235, 6300 HASKOVO, BULGARIA', '204875574', 'SHENOL OOD', 'Address 12', 'X-106', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 9, 'България', 'Bulgaria', '', 'as213/dsd212', 'Турция/Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666004261, '18.10.2022', 0, 'Владимир Наков', 'Vladimir Nakov', '17.10.2022', '', 8, 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
