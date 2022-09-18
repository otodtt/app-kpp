-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 18 септ 2022 в 21:17
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
-- Структура на таблица `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `all_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_all_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `full_short_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `karta` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dlaznost` tinyint(4) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `admin` int(1) NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position_short` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rz` tinyint(1) NOT NULL DEFAULT '0',
  `orz` tinyint(1) NOT NULL DEFAULT '0',
  `fsk` tinyint(1) NOT NULL DEFAULT '0',
  `ppz` tinyint(1) NOT NULL DEFAULT '0',
  `lab` tinyint(1) NOT NULL DEFAULT '0',
  `stamp_number` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `all_name`, `short_name`, `full_all_name`, `full_short_name`, `password`, `remember_token`, `created_at`, `updated_at`, `karta`, `dlaznost`, `active`, `admin`, `position`, `position_short`, `rz`, `orz`, `fsk`, `ppz`, `lab`, `stamp_number`) VALUES
(1, 'angel', 'Ангел Михайлов Христов', 'А. Христов', 'Началник отдел Ангел Михайлов Христов', 'Н-к отдел А. Христов', '$2y$10$0LifJpgCWVarFVoGQOk7zuF0q1tUiec1RAwvzVp0ACuFSI1cHGxjy', 'mU2J0wylIjTlKbtjwzHuxRGrO9pK1RmC1kDAi91vPv6nDHZ1AYel8oiR9yip', '2016-10-04 15:35:15', '2017-08-29 06:32:26', '26059', 1, 2, 1, 'Началник отдел', 'Н-к отдел', 1, 1, 1, 1, 1, NULL),
(2, 'admin', 'Делчо Тенчев Тенев', 'Д. Тенев', 'Главен инспектор Делчо Тенчев Тенев', 'Гл. инспектор Д. Тенев', '$2y$10$dCFChsrdM.Ln5AT3KDRvB.rqrNlLPfJkvHzsCjrTKeHXAIVtG9GoG', 'KWTpVbjTT9Oy4JPa9ZDjQ48pGgQJ5ET41rByZvIyqyWl5sRiFfrKUDXZTtt1', '2016-10-04 15:36:24', '2022-09-18 21:03:58', '26062', 2, 1, 2, 'Главен инспектор', 'Гл. инспектор', 1, 1, 1, 1, 1, NULL),
(3, 'juls_07', 'Юлиана Д. Василева-Пенева', 'Ю. Василева', 'Главен инспектор Юлиана Д. Василева-Пенева', 'Гл. инспектор Ю. Василева', '$2y$10$c6.jTORU9Nw8qYhchLRhB.XCDPbXR9/gOirLOVKErTBrsoTWqZRb6', 'A4hQjz728p1gCjGUKfZkzZgTBJnDcxPLCUh8SBfFI7I5GJKUwqXy9hQZElnx', '2016-10-04 15:38:05', '2021-11-29 09:35:25', '26063', 2, 1, 1, 'Главен инспектор', 'Гл. инспектор', 1, 0, 0, 0, 0, NULL),
(4, 'petar', 'Петър Димитров Петров', 'П. Петров', 'Главен инспектор Петър Димитров Петров', 'Гл. инспектор П. Петров', '$2y$10$OONdUe4WoItuEG7qwg3xwOaNr9wqFH3EYpepMJvoctDPEmZhYZeRW', 'YCYC27OWJvOFp0X5zyfKwhUAMnSKTPaJjsNUMF6fd3Q0bAL9H41ApRM2q64o', '2016-10-04 15:39:52', '2021-08-05 13:19:18', '26162', 2, 1, 1, 'Главен инспектор', 'Гл. инспектор', 1, 1, 0, 0, 0, NULL),
(5, '', 'Марин Георгиев Филипов', 'М. Филипов', 'Главен инспектор Марин Георгиев Филипов', 'Гл. инспектор М. Филипов', '', NULL, '2016-10-04 15:41:11', '2016-10-04 15:41:11', '', 2, 2, 1, 'Главен инспектор', 'Гл. инспектор', 1, 0, 0, 0, 0, NULL),
(6, '', 'Димитрийка Михайлова Иванова', 'Д. Иванова', 'Началник отдел Димитрийка Михайлова Иванова', 'Н-к отдел Д. Иванова', '', NULL, '2016-10-04 15:42:12', '2016-10-04 15:42:12', '', 1, 2, 1, 'Началник отдел', 'Н-к отдел', 1, 1, 1, 1, 1, NULL),
(7, '', 'Елена Странджалиева', 'Е. Странджалиева', 'Главен инспектор Елена Странджалиева', 'Гл. инспектор Е. Странджалиева', '', NULL, '2016-10-04 15:43:01', '2016-10-04 15:43:01', '', 2, 2, 1, 'Главен инспектор', 'Гл. инспектор', 1, 0, 0, 0, 0, NULL),
(8, 'vlado', 'Владимир Данев Наков', 'В. Наков', 'Инспектор Владимир Данев Наков', 'Инспектор В. Наков', '$2y$10$dJMJR0pM.m5bcd46b76zHeJFHG1oeCypBzbv7pRC86J76ZxTKMiTO', 'zMXgs6ytZfN3zSN4lIFQ4cO06Qd8UjuU0ATmEwPPLV6xYoaqs8uogHhJMfgY', '2016-10-21 10:35:09', '2022-09-17 14:27:45', '260146', 4, 1, 1, 'Инспектор', 'Инспектор', 0, 0, 1, 1, 0, '106'),
(9, 'atonev', 'Антон Александров Тонев', 'А. Тонев', 'Инспектор Антон Александров Тонев', 'Инспектор А. Тонев', '$2y$10$dUtSZKL7oCVlZlEa.a.VFO5i5P3RjXauC77ODdAKP6hetQme47Dc2', NULL, '2020-05-01 10:37:15', '2020-05-01 10:37:15', '26099', 4, 1, 1, 'Инспектор', 'Инспектор', 1, 1, 1, 1, 0, NULL),
(10, 'maria', 'Мария Чанкова', 'М. Чанкова', 'Началник отдел Мария Чанкова', 'Н-к отдел М. Чанкова', '$2y$10$TP5Hop/oY/jwaMGZ7xNbI.mImPAm.f4UT/bj4nfrFIxlv9SqVhDLy', 'FhXgMUnr7bYro5FSdvJpbHr12D9OWhOfReuw9Ql8KfRykxU0d6poqxRrHDHi', '2021-09-03 07:53:21', '2022-09-15 07:46:47', '26015', 1, 1, 2, 'Началник отдел', 'Н-к отдел', 1, 1, 1, 1, 1, '103'),
(11, 'ivan', 'Иван Петров Петров', 'И. Петров', 'Инспектор Иван Петров Петров', 'Инспектор И. Петров', '$2y$10$imsiUMG4DX1FSyY9D3ssMu9kWZqnT6MXtspJUlpxkpRXuPr3J/0oK', NULL, '2022-09-14 17:55:51', '2022-09-14 18:18:51', '26002', 4, 1, 1, 'Инспектор', 'Инспектор', 0, 0, 0, 1, 0, '107'),
(12, 'ivan_gg', 'Иван Петров Петров', 'Е. Петров', 'Инспектор Иван Петров Петров', 'Инспектор Е. Петров', '$2y$10$sJI6OiIxMzIuMjRe5fTWkudHq5H0s2EvzQfn0WtekJ6pgJWwah50G', NULL, '2022-09-15 17:17:18', '2022-09-15 17:17:55', '260147', 4, 1, 1, 'Инспектор', 'Инспектор', 0, 0, 1, 1, 0, '108');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
