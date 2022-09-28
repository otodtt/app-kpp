-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 28 септ 2022 в 14:20
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
  `packer_name` varchar(300) NOT NULL,
  `packer_address` varchar(500) NOT NULL,
  `stamp_number` varchar(10) NOT NULL,
  `authority_bg` varchar(50) NOT NULL,
  `authority_en` varchar(50) NOT NULL,
  `id_country` tinyint(1) NOT NULL,
  `for_country_bg` varchar(300) NOT NULL,
  `for_country_en` varchar(300) NOT NULL,
  `for_country_more` varchar(300) NOT NULL,
  `transport` varchar(100) NOT NULL,
  `from_country` varchar(300) NOT NULL,
  `customs_bg` varchar(100) NOT NULL,
  `customs_en` varchar(100) NOT NULL,
  `place_bg` varchar(100) NOT NULL,
  `place_en` varchar(100) NOT NULL,
  `date_issue` varchar(20) NOT NULL,
  `valid_until` varchar(20) NOT NULL,
  `invoice` varchar(11) NOT NULL,
  `date_invoice` varchar(20) NOT NULL,
  `inspector_bg` varchar(50) NOT NULL,
  `inspector_en` varchar(50) NOT NULL,
  `date_add` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `added_by` tinyint(2) NOT NULL,
  `updated_by` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `qcertificates`
--

INSERT INTO `qcertificates` (`id`, `import`, `export`, `internal`, `is_all`, `what_7`, `type_crops`, `importer_id`, `importer_name`, `importer_address`, `importer_vin`, `packer_name`, `packer_address`, `stamp_number`, `authority_bg`, `authority_en`, `id_country`, `for_country_bg`, `for_country_en`, `for_country_more`, `transport`, `from_country`, `customs_bg`, `customs_en`, `place_bg`, `place_en`, `date_issue`, `valid_until`, `invoice`, `date_invoice`, `inspector_bg`, `inspector_en`, `date_add`, `date_update`, `added_by`, `updated_by`) VALUES
(1, 2001, 0, 0, 0, 2, 1, 1, 'Emi Frut Eood', 'ASENOVGRAD, UL. GOTCE DELCHEV 91', '200493997', 'Daxascasc', 'Addddd', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 1, 'Австрия', 'Austria', 'Аввв', 'ass454/dfdf6453', 'Турция/ Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '234533', '28.09.2022', 'Мария Чанкова', 'Мария Чанкова-en', '28.09.2022', '', 10, 0),
(2, 2002, 0, 0, 0, 2, 2, 2, 'Forever 9 Eood', 'BULGARIA, SOFIA, DRUJBA BL. 9, VH. J, AP. 11', '203020031', 'Daxascasc', 'AAAAAADDDDD', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 7, 'Белгия', 'Belgium', 'belll', 'ass454/dfdf6453', 'Турция/ Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '0003243234', '28.09.2022', 'Мария Чанкова', 'Мария Чанкова-en', '28.09.2022', '', 10, 0),
(3, 2003, 0, 0, 0, 2, 1, 3, 'Kolla Munchen Gbmh', 'MAISTRASSE 45 D-80337, MUNCHEN, GERMANY', 'EORI:DE2402149 VAT NO:BG 3074097765', 'Daxascasc', 'Addsasadasd', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 12, 'Германия', 'Germany', 'герррр', 'ass454/dfdf6453', 'България', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '00032432333', '28.09.2022', 'Мария Чанкова', 'Мария Чанкова-en', '28.09.2022', '', 10, 0),
(4, 2004, 0, 0, 0, 2, 2, 4, 'Fruitlog Ltd', 'BOROVO APT.5, ENTR. A, 5TH FLOOR APT 15 DISTRICT KRASNO SELO, STOLICHNA ', '201946660', 'Daxascasc', 'vsdvdsvsd', 'X-103', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 7, 'Белгия', 'Belgium', 'сацса', 'ass454/dfdf6453', 'България', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '43244', '28.09.2022', 'Мария Чанкова', 'Мария Чанкова-en', '28.09.2022', '', 10, 0),
(5, 2005, 0, 0, 0, 2, 2, 7, 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 'EICHENSTRASSE 11-A-D, DE-85445 OBERDING, GERMANY', 'ATU57056358', 'Daxascasc', 'dsvsvsdvds', 'X-106', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 9, 'България', 'Bulgaria', 'bul', 'ass454/dfdf6453', 'България', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '234533', '28.09.2022', 'Владимир Данев Наков', 'Владимир Данев Наков-en', '28.09.2022', '', 8, 0),
(6, 0, 0, 1001, 0, 1, 1, 1, 'Emi Frut Eood', 'ASENOVGRAD, UL. GOTCE DELCHEV 91', '200493997', 'Daxascasc', 'dsvdsvsdv', 'X-106', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 7, 'Белгия', 'Belgium', 'bel', 'ass454/dfdf6453', 'Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '11111', '28.09.2022', 'Владимир Данев Наков', 'Владимир Данев Наков-en', '28.09.2022', '', 8, 0),
(7, 0, 0, 1002, 0, 1, 1, 1, 'Emi Frut Eood', 'ASENOVGRAD, UL. GOTCE DELCHEV 91', '200493997', 'Daxascasc', 'sdfdsfsd', 'X-106', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 1, 'Австрия', 'Austria', 'deeee', 'ass454/dfdf6453', 'Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '2222', '28.09.2022', 'Владимир Данев Наков', 'Владимир Данев Наков-en', '28.09.2022', '', 8, 0),
(8, 0, 0, 1003, 0, 1, 2, 3, 'Kolla Munchen Gbmh', 'MAISTRASSE 45 D-80337, MUNCHEN, GERMANY', 'EORI:DE2402149 VAT NO:BG 3074097765', 'Daxascasc', 'dsvsdv', 'X-106', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 12, 'Германия', 'Germany', 'ger', 'ass454/dfdf6453', 'Turkey', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '222222', '28.09.2022', 'Владимир Данев Наков', 'Владимир Данев Наков-en', '28.09.2022', '', 8, 0),
(9, 0, 3001, 0, 0, 3, 1, 5, 'Goldan Fruts 2016 Ltd ', 'Bulgaria, Sliven, ul. Felix Kanix 7A ', '203883835', 'Daxascasc', 'vsdvdsvs', 'X-106', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 22, 'Кипър', 'Cyprus', 'kip', 'as232/ sds333', 'България', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '30.09.2022', '33333', '28.09.2022', 'Владимир Данев Наков', 'Владимир Данев Наков-en', '28.09.2022', '', 8, 0),
(10, 0, 3002, 0, 0, 3, 1, 10, 'Et Lina 07- Vladimir Ivanov', 'STR DIMITAR BLAGOEV NO: 23, KIRKOVO', '108015507', 'Daxascasc', 'sdcdscsd', 'X-', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 32, 'Нидерландия', 'Netherlands', 'nid', 'as232/ sds333', 'Turkv', 'МБ Свиленград', 'CP Svilengrad', 'Свиленград', 'Svilengrad', '28.09.2022', '05.10.2022', '55555', '28.09.2022', 'Делчо Тенчев Тенев', 'Делчо Тенчев Тенев-en', '28.09.2022', '', 2, 0),
(11, 0, 3003, 0, 0, 3, 1, 7, 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 'EICHENSTRASSE 11-A-D, DE-85445 OBERDING, GERMANY', 'ATU57056358', 'Daxascasc', 'dsvvdsv', 'X-', 'БАБХ: ОДБХ-Хасково', 'BFSA: RDFS-Haskovo', 19, 'Испания', 'Spain', 'isp', 'ass454/dfdf6453', 'България', 'МБ Свиленград', 'CP Svilengrad,.', 'Свиленград ./234', 'Svilengrad 345./', '28.09.2022', '30.09.2022', '666666', '28.09.2022', 'Делчо Тенчев Тенев', 'Делчо Тенчев Тенев-en', '28.09.2022', '', 2, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
