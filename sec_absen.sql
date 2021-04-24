-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 08:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rona_absen`
--

-- --------------------------------------------------------

--
-- Structure for view `sec_absen`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sec_absen`  AS  select time_to_sec(timediff(cast(`absensi`.`jam_absen` as time),cast(`absensi`.`jam_jadwal` as time))) AS `rentan`,`absensi`.`id_absensi` AS `id_absensi`,`absensi`.`nama` AS `nama`,`absensi`.`email` AS `email`,`absensi`.`lokasi` AS `lokasi`,`absensi`.`latitude` AS `latitude`,`absensi`.`longitude` AS `longitude`,`absensi`.`jam_absen` AS `jam_absen`,`absensi`.`jam_jadwal` AS `jam_jadwal` from `absensi` ;

--
-- VIEW  `sec_absen`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
