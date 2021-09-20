-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 07:27 AM
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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `nama` varchar(258) NOT NULL,
  `email` varchar(256) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `jam_absen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jam_jadwal` time NOT NULL,
  `jenis_absen` enum('masuk','pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nama`, `email`, `lokasi`, `latitude`, `longitude`, `jam_absen`, `jam_jadwal`, `jenis_absen`) VALUES
(10, 'vina', 'vina@gmail.com', 'Ancolmekar, Jawa Barat, 40381, Indonesia', -7.090910999999999, 107.668887, '2020-09-05 14:26:40', '14:49:00', 'masuk'),
(11, 'vina', 'vina@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-01-12 13:08:56', '06:00:00', 'masuk'),
(12, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-02-11 23:15:00', '06:00:00', 'masuk'),
(13, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-03-11 23:19:56', '06:00:00', 'masuk'),
(14, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-04-12 13:08:56', '06:00:00', 'masuk'),
(15, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-05-12 13:08:56', '06:00:00', 'masuk'),
(16, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-06-12 13:08:56', '06:00:00', 'masuk'),
(17, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-07-12 13:08:56', '06:00:00', 'masuk'),
(18, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-08-12 13:08:56', '06:00:00', 'masuk'),
(19, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-09-12 13:08:56', '06:00:00', 'masuk'),
(20, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-10-12 13:08:56', '06:00:00', 'masuk'),
(21, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-11-12 13:08:56', '06:00:00', 'masuk'),
(22, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-12-12 13:08:56', '06:00:00', 'masuk'),
(23, 'rona', 'Rona@gmail.com', 'Ancolmekar, Jawa Barat, 40381, Indonesia', -7.090910999999999, 107.668887, '2020-09-05 00:26:40', '14:49:00', 'masuk'),
(24, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-01-12 00:08:56', '06:00:00', 'masuk'),
(25, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-02-12 00:08:56', '06:00:00', 'masuk'),
(26, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-03-11 22:08:56', '06:00:00', 'masuk'),
(27, 'rona', 'Rona@gmail.com', 'Rajabasa, Bandar Lampung, Lampung, 35362, Indonesia', -5.362836020296001, 105.23069858551027, '2021-11-12 00:08:56', '06:00:00', 'masuk'),
(28, 'rona', 'Rona@gmail.com', 'Putra Aji Dua, Lampung Timur, Lampung, Indonesia', -5.196336190631172, 105.59337411328904, '2021-07-21 03:04:02', '08:00:00', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `waktu_pulang` time NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `waktu`, `waktu_pulang`, `status`) VALUES
(1, '08:00:00', '16:00:00', 'aktif');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sec_absen`
-- (See below for the actual view)
--
CREATE TABLE `sec_absen` (
`jenis_absen` enum('masuk','pulang')
,`rentan` bigint(17)
,`id_absensi` int(11)
,`nama` varchar(258)
,`email` varchar(256)
,`lokasi` varchar(128)
,`latitude` double
,`longitude` double
,`jam_absen` timestamp
,`jam_jadwal` time
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(1218) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `tgl_lahir`, `jabatan`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'admin', 'admin@gmail.com', '2000-03-09', 'System Enginer', 'WhatsApp_Image_2019-04-13_at_09_25_36.jpg', '$2y$10$7epJkvb3dV4QHbQoYDT38eKOMhIx0OloFsn0oCx47looqen8xeHPK', 1, 1, 1552725364),
(10, 'junior', 'junior@gmail.com', '1978-09-10', 'System Enginer', 'chris-lee-70l1tDAI6rM-unsplash.jpg', '$2y$10$7epJkvb3dV4QHbQoYDT38eKOMhIx0OloFsn0oCx47looqen8xeHPK', 3, 1, 1556113386),
(11, 'joni panggabeana', 'mega@gmail.com', '2020-08-14', 'System Enginer', 'default.jpg', '$2y$10$7epJkvb3dV4QHbQoYDT38eKOMhIx0OloFsn0oCx47looqen8xeHPK', 2, 1, 1596967892),
(23, 'rona', 'Rona@gmail.com', '2020-09-12', 'Network Security', 'chris-lee-70l1tDAI6rM-unsplash.jpg', '$2y$10$7epJkvb3dV4QHbQoYDT38eKOMhIx0OloFsn0oCx47looqen8xeHPK', 2, 1, 1599286987),
(24, 'Vina', 'vina@gmail.com', '2021-01-15', 'Network Enginer', 'default.png', '$2y$10$BQ15p7EonuE3EFfX7JoxMOAHzwpLbP0U580N2bSsDJfdF8eIPLZRy', 2, 1, 1610544863);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 2, 4),
(7, 1, 6),
(8, 3, 6),
(9, 3, 2),
(10, 1, 5),
(11, 3, 5),
(12, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Absen'),
(5, 'Absen_admin'),
(6, 'Laporan'),
(7, 'Menubaru');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'karyawan'),
(3, 'pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'User/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Manajemen', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Isi Absen', 'absen', 'fas fa-fw fa-atlas', 1),
(10, 5, 'Lihat Absen', 'absen_admin', 'fas fa-fw fa-atlas', 1),
(12, 1, 'Akun', 'admin/akun', 'fas fa-fw fa-user-tie', 1),
(14, 6, 'Laporan', 'laporan', 'fas fa-fw fa-book', 1),
(15, 1, 'Jadwal', 'admin/jadwal', 'fa fa-fw fa-cog', 1),
(16, 7, 'Menu barulah pokoknya', 'Menubaru', 'fas fa-fw fa-user-tie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(6, 'iluthfi919@gmail.com', 'rukroYSGJ1ici8i8s1EkH/VxFqdVo49IwMfojhbKW9Y=', 1556115300),
(7, 'iluthfi919@gmail.com', 'XfcC0O1w3x5U0kOYpWFH0PyVHDobGfVaGOCP39AJK/Q=', 1561636665),
(8, 'iluthfi919@gmail.com', 'ATkZ5MMT8kLW0QymE4GgiRCShx5iJWLCE8H1K31wBKc=', 1561636700),
(10, 'iluthfi919@gmail.com', 'nQrJ9ahuH9YV9NKe2/H16rkuZi0Fck2tC8l81or0v08=', 1595292264),
(11, 'iluthfi919@gmail.com', '5wuZTXfQILBYMmjZHhZXCuA3k3viwNtRbmx3sbUoXRc=', 1595292296),
(12, 'iluthfi919@gmail.com', 'NnxZN5aTxigxpe11PT8rGzD5XTKnfTEsSd5r6S0lP0w=', 1595293072),
(13, 'iluthfi919@gmail.com', 'USHDz5i6+G4qThtY5eHWLG3r9+dezNGRPg+UO7eR5kU=', 1595293248),
(14, 'iluthfi919@gmail.com', 'Vb9eanpMNK5XRgi53BdGWideTh5i7CmUlMN+u4caQzE=', 1595293421),
(15, 'iluthfi919@gmail.com', 'sRKc+NTdhofsTbsX2v9aGxXJH0BslCdcJ6dy89lKH6w=', 1595293613),
(16, 'iluthfi919@gmail.com', 'JeWAxGMs8oRJjuXHhiqPUXK7DW+B3CU1mNrrvvgSccQ=', 1595293643),
(17, 'w.novyanto17@gmail.com', 'NHgz8turaVHDKXc12TMHnshRdu/kUvYBXibPuXQSzYA=', 1596973769),
(19, 'iluthfias469@gmail.com', 'cSj5pYlx5mz9qxygHhnWNTnUR9YCrh0VNLxEMLszi3E=', 1599017893),
(20, 'iluthfi919@gmail.com', 'lZznZ00Q1CCuD1f+OI5YKDjJcnGRfb32gEvD+rcdbLg=', 1599179286);

-- --------------------------------------------------------

--
-- Structure for view `sec_absen`
--
DROP TABLE IF EXISTS `sec_absen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sec_absen`  AS  select `absensi`.`jenis_absen` AS `jenis_absen`,time_to_sec(timediff(cast(`absensi`.`jam_absen` as time),cast(`absensi`.`jam_jadwal` as time))) AS `rentan`,`absensi`.`id_absensi` AS `id_absensi`,`absensi`.`nama` AS `nama`,`absensi`.`email` AS `email`,`absensi`.`lokasi` AS `lokasi`,`absensi`.`latitude` AS `latitude`,`absensi`.`longitude` AS `longitude`,`absensi`.`jam_absen` AS `jam_absen`,`absensi`.`jam_jadwal` AS `jam_jadwal` from `absensi` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
