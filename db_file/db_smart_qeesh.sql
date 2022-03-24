-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2022 pada 05.00
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smart_qeesh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `link_menu` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `color` varchar(50) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `editable` enum('N/A','YES','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `link_menu`, `type`, `color`, `icon`, `is_active`, `editable`) VALUES
(1, 'DASHBOARD', 'dashboard', 'statis', '2B7B70', '<i class=\"fas fa-tachometer-alt\"></i>', 0, 'YES'),
(2, 'MANAGEMENT', 'manajemen', 'statis', '', '<i class=\"fas fa-columns\"></i>', 1, 'N/A'),
(3, 'RISK MANAGEMENT', 'risk_management', 'statis', 'FFF', '<i class=\"fas fa-columns\"></i>', 1, 'YES'),
(4, 'LEGAL COMPLIANCE', 'legal_compliance', 'statis', '', '<i class=\"fas fa-columns\"></i>', 1, 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_submenu` varchar(26) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL COMMENT 'untuk status menu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Menu', 'manajemen/menu', '<i class=\"fas fa-sitemap\"></i>', 1),
(2, 3, 'Home', 'risk_management/home', '<i class=\"fas fa-home\"></i>', 1),
(3, 2, 'Sub Menu', 'manajemen/sub_menu', '<i class=\"fas fa-sitemap\"></i>', 1),
(4, 2, 'User', 'manajemen/user', '<i class=\"fas fa-users\"></i>', 1),
(5, 2, 'Role Access', 'manajemen/role_access', '<i class=\"fas fa-users-cog\"></i>', 1),
(6, 3, 'Input New Risk Register', 'risk_management/input_new_risk_register', '<i class=\"fas fa-pen\"></i>', 1),
(7, 3, 'Risk Manj Performance', 'risk_management/risk_manj_performance', '<i class=\"fas fa-chart-pie\"></i>', 1),
(8, 4, 'Legal Compliance Home', 'legal_compliance/legal_compliance_home', '<i class=\"fas fa-clipboard\"></i>', 1),
(9, 4, 'Input New Regulation', 'legal_compliance/input_new_regulation', '<i class=\"fas fa-pen\"></i>', 1),
(10, 4, 'Masterlist Regulation', 'legal_compliance/masterlist_regulation', '<i class=\"fas fa-list-alt\"></i>', 1),
(11, 4, 'Regulation Compliance', 'legal_compliance/regulation_compliance', '<i class=\"fas fa-chart-pie\"></i>', 1),
(12, 4, 'Action Plan', 'legal_compliance/action_plan', '<i class=\"fas fa-list\"></i>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `date_created` int(20) NOT NULL,
  `is_active` int(1) NOT NULL,
  `last_login` int(20) NOT NULL,
  `ip_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role_id`, `user_detail_id`, `date_created`, `is_active`, `last_login`, `ip_address`) VALUES
(1, 'administrator', '202cb962ac59075b964b07152d234b70', 1, 1, 1643410800, 1, 0, 0),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, 2, 1643410800, 1, 0, 0),
(5, 'Bay95', 'e9335e177b288c7af4af8f1225c3f938', 2, 5, 1644447600, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 3, 1),
(4, 1, 4),
(5, 1, 2),
(6, 2, 3),
(7, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `user_detail_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(60) NOT NULL,
  `divisi` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `tlp` int(13) NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`user_detail_id`, `nama`, `email`, `divisi`, `jabatan`, `tlp`, `img`) VALUES
(1, 'Administrator System', 'rz.oktan@gmail.com', 'IT', '-', 62, 'default.jpg'),
(2, 'RICHO MAULAND', 'richo@gmail.com', 'HSE', 'CT', 62, 'default.jpg'),
(5, 'Bayu Prasetyo', 'bayu@gmail.com', 'Divisi IT', 'Programmer', 62, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_type` varchar(128) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_type`, `description`) VALUES
(1, 'Administrator', 'This is account for system administrator.'),
(2, 'Admin', 'This is account for regular admin.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_menu` (`id_menu`,`is_active`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `id_submenu` (`id_submenu`,`id_menu`,`is_active`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`,`role_id`,`user_detail_id`,`is_active`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`role_id`,`id_menu`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_detail_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_id` (`role_id`,`role_type`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
