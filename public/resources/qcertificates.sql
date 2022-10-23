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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `qcertificates`
--

INSERT INTO `qcertificates` (`id`, `certificate_id`, `import`, `export`, `internal`, `is_all`, `what_7`, `type_crops`, `importer_id`, `importer_name`, `importer_address`, `importer_vin`, `packer_id`, `packer_name`, `packer_address`, `stamp_number`, `authority_bg`, `authority_en`, `id_country`, `for_country_bg`, `for_country_en`, `observations`, `transport`, `from_country`, `customs_bg`, `customs_en`, `place_bg`, `place_en`, `date_issue`, `valid_until`, `invoice_id`, `invoice_number`, `invoice_date`, `sum`, `inspector_bg`, `inspector_en`, `date_add`, `date_update`, `added_by`, `updated_by`, `is_lock`) VALUES
(1, 0, 2001, 0, 0, 1, 2, 1, 1, 'Emi Frut Eood', 'ASENOVGRAD, UL. GOTCE DELCHEV 91', '200493997', 1, 'LIDER GIDA SANAYI VE DIS TICARET LTD STI.', 'CARSI MAH.DEREBOYU SOK.NO:18/1/ ORTAHISAR/ TRABZON/ TURKEY', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 1, 'Австрия', 'Austria', '', 'ass454/dfdf6453', 'Турция/ Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1581968664, '20.02.2020', 0, '', 0, 0, 'Мария Чанкова', 'Marya Chankova', '17.02.2020', '', 10, 0, 0),
(2, 0, 2002, 0, 0, 2, 2, 1, 2, 'Forever 9 Eood', 'BULGARIA, SOFIA, DRUJBA BL. 9, VH. J, AP. 11', '203020031', 1, 'LIDER GIDA SANAYI VE DIS TICARET LTD STI.', 'CARSI MAH.DEREBOYU SOK.NO:18/1/ ORTAHISAR/ TRABZON/ TURKEY', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 7, 'Белгия', 'Belgium', '', 'ass454/dfdf6453', 'Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1594925428, '29.10.2022', 0, '', 0, 0, 'Мария Чанкова', 'Marya Chankova', '16.07.2020', '', 10, 0, 0),
(3, 0, 2003, 0, 0, 3, 2, 1, 3, 'Kolla Munchen Gbmh', 'MAISTRASSE 45 D-80337, MUNCHEN, GERMANY', 'EORI:DE2402149 VAT NO:BG 3074097765', 2, 'Degirmenciler Zirai Urun Isleme Paketleme Pazarlama Ve Tasimacilik Ticaret Ve San Ltd Sti', 'KULAK MAH.INONU  BLV NO. 7102  HUZURKENT-AKDENIZ/ TURKEY', 'X-108', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 9, 'България', 'Bulgaria', '', 'as232/ sds333', 'Турция/ Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666465144, '28.10.2022', 0, '', 0, 0, 'Антон Тонев', 'Anton Tonev', '22.10.2022', '', 9, 0, 0),
(4, 0, 2004, 0, 0, 4, 2, 2, 3, 'Kolla Munchen Gbmh', 'MAISTRASSE 45 D-80337, MUNCHEN, GERMANY', 'EORI:DE2402149 VAT NO:BG 3074097765', 3, 'KOLLA TURKEY TARIM VE GIDA TICARET ANONIM SIRKETI', 'ATIFBEY MAH. 67 SOKAK NO.33, D.59 35410  GAZIEMIR/ IZMIR/ TURKEY', 'X-108', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 11, 'Великобритания', 'United Kingdom', '', 'as232/ sds333', 'България', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666465374, '28.10.2022', 0, '', 0, 0, 'Антон Тонев', 'Anton Tonev', '22.10.2022', '', 9, 0, 0),
(5, 0, 2005, 0, 0, 5, 2, 1, 8, 'Rodopi Les 65 Eood ', 'STR.POLKOVNIK VESELIN VALKOV 235, 6300 HASKOVO, BULGARIA', '204875574', 3, 'KOLLA TURKEY TARIM VE GIDA TICARET ANONIM SIRKETI', 'ATIFBEY MAH. 67 SOKAK NO.33, D.59 35410  GAZIEMIR/ IZMIR/ TURKEY', 'X-108', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 11, 'Великобритания', 'United Kingdom', '', '31AJN161/ 31 AJH166', 'България', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666465915, '26.10.2022', 0, '', 0, 0, 'Антон Тонев', 'Anton Tonev', '22.10.2022', '22.10.2022', 9, 9, 0),
(6, 0, 2006, 0, 0, 6, 2, 1, 7, 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 'EICHENSTRASSE 11-A-D, DE-85445 OBERDING, GERMANY', 'ATU57056358', 4, 'HERG GOCTAR FROZAN ARAS TABZIR/ IRAN', '', 'X-106', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 20, 'Италия', 'Italy', '', '31AJN161/ 31 AJH166', 'Турция/ Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666466141, '26.10.2022', 0, '', 0, 0, 'Владимир Наков', 'Vladimir Nakov', '22.10.2022', '', 8, 0, 0),
(7, 0, 2007, 0, 0, 7, 2, 2, 10, 'Et Lina 07- Vladimir Ivanov', 'STR DIMITAR BLAGOEV NO: 23, KIRKOVO', '108015507', 1, 'LIDER GIDA SANAYI VE DIS TICARET LTD STI.', 'CARSI MAH.DEREBOYU SOK.NO:18/1/ ORTAHISAR/ TRABZON/ TURKEY', 'X-106', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 16, 'Естония', 'Estonia', '', 'ass454/dfdf6453', 'Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', 1666466460, '27.10.2022', 0, '', 0, 0, 'Владимир Наков', 'Vladimir Nakov', '22.10.2022', '', 8, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
