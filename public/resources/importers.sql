-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 29 септ 2022 в 11:33
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
  `trade` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` tinyint(2) NOT NULL,
  `updated_by` tinyint(2) NOT NULL,
  `date_create` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `importers`
--

INSERT INTO `importers` (`id`, `name_bg`, `address_bg`, `vin`, `name_en`, `address_en`, `is_active`, `is_bulgarian`, `trade`, `created_by`, `updated_by`, `date_create`, `date_update`) VALUES
(1, 'Еми Фрут Еоод', 'гр. Асеновград, ул. Гоце Делчев 91', '200493997', 'Emi Frut Eood', 'ASENOVGRAD, UL. GOTCE DELCHEV 91', 1, 0, 0, 2, 0, '18.09.2022 22:07:05', ''),
(2, 'Форевър 9 Еоод', 'гр. София, р-н Искър, бл. 9, вх. 3, ет. 3', '203020031', 'Forever 9 Eood', 'BULGARIA, SOFIA, DRUJBA BL. 9, VH. J, AP. 11', 1, 0, 0, 2, 0, '18.09.2022 22:07:42', ''),
(3, '', '', 'EORI:DE2402149 VAT NO:BG 3074097765', 'Kolla Munchen Gbmh', 'MAISTRASSE 45 D-80337, MUNCHEN, GERMANY', 1, 1, 0, 2, 8, '18.09.2022 22:08:31', '19.09.2022 00:11:26'),
(4, 'Фруитлог Еоод', 'БЪЛГАРИЯ, гр. София, р-н Красно село, бл. 5, вх. А, ет. 5', '201946660', 'Fruitlog Ltd', 'BOROVO APT.5, ENTR. A, 5TH FLOOR APT 15 DISTRICT KRASNO SELO, STOLICHNA ', 1, 0, 0, 2, 0, '20.09.2022 12:28:19', ''),
(5, 'Голдън Фрутс - 2016 Еоод', 'БЪЛГАРИЯ, гр. Сливен, ул. Феликс Каниц, 7А', '203883835', 'Goldan Fruts 2016 Ltd ', 'Bulgaria, Sliven, ul. Felix Kanix 7A ', 1, 0, 0, 2, 0, '20.09.2022 12:37:18', ''),
(6, '', '', '', 'Lehmann & Troost B.v.', 'Transportweg 33 (DOELWIJK), 2742 RH Waddinxveen, Netherlands', 1, 1, 0, 2, 0, '20.09.2022 12:43:38', ''),
(7, '', '', 'ATU57056358', 'Ogl - Food Trade Lebensmittelvertrieb Gmbh', 'EICHENSTRASSE 11-A-D, DE-85445 OBERDING, GERMANY', 1, 1, 0, 2, 0, '20.09.2022 12:59:00', ''),
(8, 'Родопи Лес 65 Еоод', 'гр. Хасково, ул. \"Полковник Веселин Вълков\", 235', '204875574', 'Rodopi Les 65 Eood ', 'STR.POLKOVNIK VESELIN VALKOV 235, 6300 HASKOVO, BULGARIA', 1, 0, 0, 2, 0, '20.09.2022 13:02:01', ''),
(9, 'Родопи Агро Еоод ', 'БЪЛГАРИЯ, гр. Хасково, бул. \"Илинден\", 47А', '203227133', 'Rodopi Agro Ltd', 'BUL. ILINDEN 47A, 6300, HASKOVO, BULGARIA ', 1, 0, 0, 2, 0, '20.09.2022 13:05:35', ''),
(10, 'Лина-07 - Владимир Иванов Ет', 'с. Кирково, Д. БЛАГОЕВ, 23', '108015507', 'Et Lina 07- Vladimir Ivanov', 'STR DIMITAR BLAGOEV NO: 23, KIRKOVO', 1, 0, 0, 2, 0, '20.09.2022 13:11:35', ''),
(11, 'Балкан Фруит Еоод', 'гр. София, р-н Оборище, \"Георги Бенковски\", 14, ет. 2', '819411799', 'Balkan Fruit Ltd Michele Mastropasqua P.lva ', 'VIA G. BENCOVSKI N 14, SOFIA/ BULGARIA', 1, 0, 0, 10, 0, '29.09.2022 11:47:46', ''),
(12, 'Фреш Бан Еоод', 'гр. Пловдив, р-н Западен, ул. Битоля, 12', '115899821', 'Fresh Ban Ltd ', 'STR BITOLYA 12, PLOVDIV/BULGARIA', 1, 0, 0, 10, 0, '29.09.2022 11:50:45', ''),
(13, 'Г.м.г. България Оод', ' гр. София, р-н Изгрев, ЛОВЕН ПАРК, 3, вх. А, ет. 4', '201931548', 'G.m.g. Bulgaria', 'IZGREV DIANANABAD NO: 3, ENT. 3 FLOOR 4, SOFIA 1172', 1, 0, 0, 10, 0, '29.09.2022 11:54:34', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
