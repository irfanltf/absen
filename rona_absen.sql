-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2020 pada 22.56
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

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
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `nama` varchar(258) NOT NULL,
  `email` varchar(256) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `jam_absen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jam_jadwal` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nama`, `email`, `lokasi`, `latitude`, `longitude`, `jam_absen`, `jam_jadwal`) VALUES
(10, 'rona', 'Rona@gmail.com', 'Ancolmekar, Jawa Barat, 40381, Indonesia', -7.090910999999999, 107.668887, '2020-09-05 14:26:40', '14:49:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `waktu`, `status`) VALUES
(1, '06:00:00', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `tgl_lahir`, `jabatan`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'admin', 'admin@gmail.com', '2000-03-09', 'System Enginer', 'WhatsApp_Image_2019-04-13_at_09_25_36.jpg', '$2y$10$7epJkvb3dV4QHbQoYDT38eKOMhIx0OloFsn0oCx47looqen8xeHPK', 1, 1, 1552725364),
(10, 'junior', 'junior@gmail.com', '1978-09-10', 'System Enginer', 'default.jpg', '$2y$10$P6dbm4XcP2tZuF3wwuGxeOHmAmzEsX8xoZRCizRfheyeSyRFNMioy', 3, 1, 1556113386),
(11, 'joni panggabean', 'mega@gmail.com', '2020-08-14', 'System Enginer', 'default.jpg', '$2y$10$hoEoHA4eC8gqE47uV0aba.TgC080/LCG9pHCgT/8mjF60tf2j9PHm', 2, 1, 1596967892),
(21, 'irfan', 'iluthfi469@gmail.com', '2020-09-18', 'Network Security', 'B5Y-Ww7m.jpg', '$2y$10$7epJkvb3dV4QHbQoYDT38eKOMhIx0OloFsn0oCx47looqen8xeHPK', 2, 1, 1599022052),
(23, 'rona', 'Rona@gmail.com', '2020-09-12', 'Network Security', 'chris-lee-70l1tDAI6rM-unsplash.jpg', '$2y$10$eYyC4ZNyW226hJewF4l3guYTYfhdtRFh5YiUoOz8S/kk4wz8TzOyq', 2, 1, 1599286987);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
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
(11, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Absen'),
(5, 'Absen_admin'),
(6, 'Laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'karyawan'),
(3, 'pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
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
(15, 1, 'Jadwal', 'admin/jadwal', 'fa fa-fw fa-cog', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
