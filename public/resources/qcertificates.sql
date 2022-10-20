-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 20 окт 2022 в 14:22
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
  `export` int(11) NOT NULL,
  `internal` int(11) NOT NULL,
  `is_all` tinyint(1) NOT NULL DEFAULT '0',
  `what_7` tinyint(2) NOT NULL,
  `type_crops` tinyint(2) NOT NULL,
  `importer_id` tinyint(3) NOT NULL,
  `importer_name` varchar(300) NOT NULL,
  `importer_address` varchar(300) NOT NULL,
  `importer_vin` varchar(100) NOT NULL,
  `packer_id` int(11) NOT NULL DEFAULT '0',
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
  `invoice_number` varchar(20) NOT NULL,
  `invoice_date` int(11) NOT NULL,
  `sum` float NOT NULL,
  `inspector_bg` varchar(50) NOT NULL,
  `inspector_en` varchar(50) NOT NULL,
  `date_add` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `added_by` tinyint(2) NOT NULL,
  `updated_by` tinyint(2) NOT NULL,
  `is_lock` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `qcertificates`
--

INSERT INTO `qcertificates` (`id`, `certificate_id`, `import`, `export`, `internal`, `is_all`, `what_7`, `type_crops`, `importer_id`, `importer_name`, `importer_address`, `importer_vin`, `packer_id`, `packer_name`, `packer_address`, `stamp_number`, `authority_bg`, `authority_en`, `id_country`, `for_country_bg`, `for_country_en`, `observations`, `transport`, `from_country`, `customs_bg`, `customs_en`, `place_bg`, `place_en`, `date_issue`, `valid_until`, `invoice_id`, `invoice_number`, `invoice_date`, `sum`, `inspector_bg`, `inspector_en`, `date_add`, `date_update`, `added_by`, `updated_by`, `is_lock`) VALUES
(1, 0, 2001, 0, 0, 1, 2, 1, 7, 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 'EICHENSTRASSE 11-A-D, DE-85445 OBERDING, GERMANY', 'ATU57056358', 1, 'LIDER GIDA SANAYI VE DIS TICARET LTD', ' TICARET LTD 111', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 49, 'Чехия', 'Czech Republic', '', '31AJN161/ 31 AJH166', 'България/Bulgaria', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666177584, '22.10.2022', 1, '6571020601', 1665349200, 11.11, 'Мария Чанкова', 'Marya Chankova', '19.10.2022', '', 10, 0, 1),
(2, 0, 2002, 0, 0, 2, 2, 2, 1, 'Emi Frut Eood', 'ASENOVGRAD, UL. GOTCE DELCHEV 91', '200493997', 1, 'LIDER GIDA SANAYI VE DIS TICARET LTD STI.', 'CARSI MAH.DEREBOYU SOK.NO:18/1/ ORTAHISAR/ TRABZON/ TURKEY', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 19, 'Испания', 'Spain', '', '31AJN161/ 31 AJH166', 'Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666177665, '21.10.2022', 3, '6571020603', 1665608400, 33, 'Мария Чанкова', 'Marya Chankova', '19.10.2022', '20.10.2022', 10, 10, 0),
(3, 0, 2003, 0, 0, 3, 2, 1, 3, 'Kolla Munchen Gbmh', 'MAISTRASSE 45 D-80337, MUNCHEN, GERMANY', 'EORI:DE2402149 VAT NO:BG 3074097765', 1, 'LIDER GIDA SANAYI VE DIS TICARET LTD', 'DIS TICARET LTD 333', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 11, 'Великобритания', 'United Kingdom', '', '31AJN161/ 31 AJH166', 'Турция/Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666177807, '21.10.2022', 2, '6571020602', 1665522000, 12, 'Мария Чанкова', 'Marya Chankova', '19.10.2022', '', 10, 0, 0),
(4, 0, 2004, 0, 0, 4, 2, 1, 8, 'Rodopi Les 65 Eood ', 'STR.POLKOVNIK VESELIN VALKOV 235, 6300 HASKOVO, BULGARIA', '204875574', 1, 'LIDER GIDA SANAYI VE DIS TICARET LTD', ' VE DIS TICARET LTD 44', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 15, 'Дания', 'Denmark', '', '31AJN161/ 31 AJH166', 'Турция/ Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666181342, '21.10.2022', 4, '6571020604', 1665694800, 40, 'Мария Чанкова', 'Marya Chankova', '19.10.2022', '19.10.2022', 10, 10, 1),
(5, 0, 2005, 0, 0, 5, 2, 1, 13, 'G.m.g. Bulgaria', 'IZGREV DIANANABAD NO: 3, ENT. 3 FLOOR 4, SOFIA 1172', '201931548', 1, 'LIDER GIDA SANAYI VE DIS TICARET LTD', 'DIS TICARET LTD', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 36, 'Румъния', 'Romania', '', '31AJN161/ 31 AJH166', 'Турция/ Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666184593, '21.10.2022', 5, '6571020605', 1665781200, 60.6, 'Мария Чанкова', 'Marya Chankova', '19.10.2022', '', 10, 0, 1),
(6, 0, 2006, 0, 0, 6, 2, 1, 1, 'Emi Frut Eood', 'ASENOVGRAD, UL. GOTCE DELCHEV 91', '200493997', 2, 'Degirmenciler Zirai Urun Isleme Paketleme Pazarlama Ve Tasimacilik Ticaret Ve San Ltd Sti', 'KULAK MAH.INONU  BLV NO. 7102  HUZURKENT-AKDENIZ/ TURKEY', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 9, 'България', 'Bulgaria', '', '31AJN161/ 31 AJH166', 'България', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666265325, '22.10.2022', 0, '', 0, 0, 'Мария Чанкова', 'Marya Chankova', '20.10.2022', '', 10, 0, 0),
(7, 0, 2007, 0, 0, 7, 2, 1, 11, 'Balkan Fruit Ltd Michele Mastropasqua P.lva ', 'VIA G. BENCOVSKI N 14, SOFIA/ BULGARIA', '819411799', 2, 'Degirmenciler Zirai Urun Isleme Paketleme Pazarlama Ve Tasimacilik Ticaret Ve San Ltd Sti', 'KULAK MAH.INONU  BLV NO. 7102  HUZURKENT-AKDENIZ/ TURKEY', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 11, 'Великобритания', 'United Kingdom', '', ' 33CHD17/33AL966', 'България/ Bulgaria', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666266109, '23.10.2022', 0, '', 0, 0, 'Мария Чанкова', 'Marya Chankova', '20.10.2022', '20.10.2022', 10, 10, 0),
(8, 0, 2008, 0, 0, 8, 2, 1, 2, 'Forever 9 Eood', 'BULGARIA, SOFIA, DRUJBA BL. 9, VH. J, AP. 11', '203020031', 4, 'HERG GOCTAR FROZAN ARAS TABZIR/ IRAN', '', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 25, 'Литва', 'Lithuania', '', '31AJN161/ 31 AJH166', 'България', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666267761, '22.10.2022', 0, '', 0, 0, 'Мария Чанкова', 'Marya Chankova', '20.10.2022', '', 10, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
