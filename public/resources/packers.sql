-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 20 окт 2022 в 14:23
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
-- Структура на таблица `packers`
--

DROP TABLE IF EXISTS `packers`;
CREATE TABLE IF NOT EXISTS `packers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `packer_name` varchar(500) NOT NULL,
  `packer_address` varchar(500) NOT NULL,
  `created_by` tinyint(2) NOT NULL,
  `updated_by` tinyint(2) NOT NULL,
  `date_create` varchar(30) NOT NULL,
  `date_update` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `packers`
--

INSERT INTO `packers` (`id`, `packer_name`, `packer_address`, `created_by`, `updated_by`, `date_create`, `date_update`) VALUES
(1, 'LIDER GIDA SANAYI VE DIS TICARET LTD STI.', 'CARSI MAH.DEREBOYU SOK.NO:18/1/ ORTAHISAR/ TRABZON/ TURKEY', 10, 10, '20.10.2022 10:25:26', '20.10.2022 14:21:43'),
(2, 'Degirmenciler Zirai Urun Isleme Paketleme Pazarlama Ve Tasimacilik Ticaret Ve San Ltd Sti', 'KULAK MAH.INONU  BLV NO. 7102  HUZURKENT-AKDENIZ/ TURKEY', 10, 0, '20.10.2022 14:21:19', ''),
(3, 'KOLLA TURKEY TARIM VE GIDA TICARET ANONIM SIRKETI', 'ATIFBEY MAH. 67 SOKAK NO.33, D.59 35410  GAZIEMIR/ IZMIR/ TURKEY', 10, 10, '20.10.2022 14:27:05', '20.10.2022 15:37:11'),
(4, 'HERG GOCTAR FROZAN ARAS TABZIR/ IRAN', '', 0, 0, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
