-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Mar 2022 pada 19.59
-- Versi server: 10.5.13-MariaDB-cll-lve
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1121502_smart_qeesh`
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
(1, 'DASHBOARD', 'dashboard', 'statis', '2B7B70', '<i class=\"fas fa-tachometer-alt\"></i>', 1, 'YES'),
(2, 'MANAGEMENT', 'manajemen', 'statis', '', '<i class=\"fas fa-columns\"></i>', 1, 'N/A'),
(3, 'RISK MANAGEMENT', 'risk_management', 'statis', 'FFF', '<i class=\"fas fa-columns\"></i>', 1, 'YES'),
(4, 'LEGAL COMPLIANCE', 'legal_compliance', 'statis', '', '<i class=\"fas fa-columns\"></i>', 1, 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(3) NOT NULL,
  `owner_name` varchar(150) NOT NULL,
  `level` int(2) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `owner`
--

INSERT INTO `owner` (`owner_id`, `owner_name`, `level`, `description`) VALUES
(1, 'Manager / GM', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `risk_category`
--

CREATE TABLE `risk_category` (
  `id` int(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `risk_category`
--

INSERT INTO `risk_category` (`id`, `name`, `description`) VALUES
(1, 'Organization Risk', ''),
(2, 'Business Risk', ''),
(3, 'Legal Risk', ''),
(4, 'Social Risk', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `risk_condition`
--

CREATE TABLE `risk_condition` (
  `id` int(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `risk_condition`
--

INSERT INTO `risk_condition` (`id`, `name`, `description`) VALUES
(1, 'Normal', ''),
(2, 'Abnormal', ''),
(3, 'Start-Up', ''),
(4, 'Shut Down', ''),
(5, 'Emergency', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `risk_management`
--

CREATE TABLE `risk_management` (
  `id_rm` int(255) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `tahapan` varchar(100) NOT NULL,
  `risk_source_id` varchar(100) NOT NULL,
  `risk_context` varchar(100) NOT NULL,
  `risk_analysis` varchar(100) NOT NULL,
  `risk_type` int(2) NOT NULL,
  `risk_category` int(2) NOT NULL,
  `risk_condition` int(2) NOT NULL,
  `risk_treatment` text NOT NULL,
  `consequences` int(11) NOT NULL,
  `likelihood` int(11) NOT NULL,
  `risk_level` int(2) NOT NULL,
  `risk_status` int(2) NOT NULL,
  `risk_owner` int(3) NOT NULL,
  `id_user` int(4) NOT NULL COMMENT 'for log'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `risk_management`
--

INSERT INTO `risk_management` (`id_rm`, `activity`, `tahapan`, `risk_source_id`, `risk_context`, `risk_analysis`, `risk_type`, `risk_category`, `risk_condition`, `risk_treatment`, `consequences`, `likelihood`, `risk_level`, `risk_status`, `risk_owner`, `id_user`) VALUES
(1, 'cdcz', 'cdcvvv', 'cdzz', 'cd', 'cdggg', 2, 2, 2, 'nhnhnh', 1, 1, 7, 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `risk_status`
--

CREATE TABLE `risk_status` (
  `id` int(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `risk_status`
--

INSERT INTO `risk_status` (`id`, `name`, `description`) VALUES
(1, 'Accepted', ''),
(2, 'Not Accepted', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `risk_type`
--

CREATE TABLE `risk_type` (
  `id` int(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `risk_type`
--

INSERT INTO `risk_type` (`id`, `name`, `description`) VALUES
(1, 'Quality Risk', ''),
(2, 'Energy Risk', ''),
(3, 'Environmental Risk', ''),
(4, 'Safety Risk', ''),
(5, 'Security Risk', ''),
(6, 'Social Risk', ''),
(7, 'Health Risk', '');

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
-- Struktur dari tabel `trActivityRiskRegister`
--

CREATE TABLE `trActivityRiskRegister` (
  `intIdActivityRisk` int(11) NOT NULL,
  `txtActivity` text NOT NULL,
  `intIdDokRiskRegister` int(11) NOT NULL,
  `intInsertedBy` int(11) NOT NULL,
  `dtmInsertedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trDokRiskRegister`
--

CREATE TABLE `trDokRiskRegister` (
  `intIdDokRiskRegister` int(11) NOT NULL,
  `txtDocNumber` varchar(50) NOT NULL,
  `txtStatus` varchar(50) NOT NULL,
  `intInsertedBy` int(11) NOT NULL,
  `dtmInsertedBy` date NOT NULL,
  `intInspectedBy` int(11) NOT NULL,
  `dtmInspectedDate` date NOT NULL,
  `intValidateBy` int(11) NOT NULL,
  `dtmValidatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trTahapanProsesRisk`
--

CREATE TABLE `trTahapanProsesRisk` (
  `intIdTahapanProses` int(11) NOT NULL,
  `intIdActivityRisk` int(11) NOT NULL,
  `txtTahapanProses` text NOT NULL,
  `txtRiskContext` text NOT NULL,
  `txtSourceRiskIden` text NOT NULL,
  `txtRiskAnalysis` text NOT NULL,
  `txtRiskCategory` varchar(70) NOT NULL,
  `txtRiskCondition` varchar(70) NOT NULL,
  `intConsequence` int(11) NOT NULL,
  `intLikelihood` int(11) NOT NULL,
  `intRiskLevel` int(11) NOT NULL,
  `charRiskLevel` varchar(1) NOT NULL,
  `txtLegalCompliance` varchar(255) NOT NULL,
  `bitStatusKepentingan` tinyint(1) NOT NULL,
  `txtRiskOwner` varchar(80) NOT NULL,
  `txtRiskTreatmentCurrent` text NOT NULL,
  `txtRiskTreatmentFuture` text NOT NULL,
  `charRiskPriority` varchar(1) NOT NULL,
  `txtImprovement` text NOT NULL,
  `intConsequenceEvaluation` int(11) NOT NULL,
  `intLikelihoodEvaluation` int(11) NOT NULL,
  `intRiskLevelEvaluation` int(11) NOT NULL,
  `chrRiskLevelEvaluation` varchar(1) NOT NULL,
  `txtResidualRisk` text NOT NULL,
  `txtInsertedBy` varchar(80) NOT NULL,
  `dtmInsertedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'admintest', '202cb962ac59075b964b07152d234b70', 2, 3, 1643583600, 0, 0, 0);

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
(2, 1, 3),
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
(1, 'Admin System', 'rz.oktan@gmail.com', 'IT', '-', 62, 'default.jpg'),
(2, 'RICHO MAULAND', 'richo@gmail.com', 'HSE', 'CT', 62, 'default.jpg'),
(3, 'admintest', 'admintest@gmail.com', 'HSE', '-', 62, 'default.jpg');

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
-- Indeks untuk tabel `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indeks untuk tabel `risk_category`
--
ALTER TABLE `risk_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `risk_condition`
--
ALTER TABLE `risk_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `risk_management`
--
ALTER TABLE `risk_management`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `indexing_relation` (`risk_owner`,`risk_level`,`risk_type`,`risk_category`,`risk_condition`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `risk_status`
--
ALTER TABLE `risk_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `risk_type`
--
ALTER TABLE `risk_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `id_submenu` (`id_submenu`,`id_menu`,`is_active`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `trActivityRiskRegister`
--
ALTER TABLE `trActivityRiskRegister`
  ADD PRIMARY KEY (`intIdActivityRisk`);

--
-- Indeks untuk tabel `trDokRiskRegister`
--
ALTER TABLE `trDokRiskRegister`
  ADD PRIMARY KEY (`intIdDokRiskRegister`);

--
-- Indeks untuk tabel `trTahapanProsesRisk`
--
ALTER TABLE `trTahapanProsesRisk`
  ADD PRIMARY KEY (`intIdTahapanProses`);

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
-- AUTO_INCREMENT untuk tabel `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `risk_category`
--
ALTER TABLE `risk_category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `risk_condition`
--
ALTER TABLE `risk_condition`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `risk_management`
--
ALTER TABLE `risk_management`
  MODIFY `id_rm` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `risk_status`
--
ALTER TABLE `risk_status`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `risk_type`
--
ALTER TABLE `risk_type`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `trActivityRiskRegister`
--
ALTER TABLE `trActivityRiskRegister`
  MODIFY `intIdActivityRisk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `trDokRiskRegister`
--
ALTER TABLE `trDokRiskRegister`
  MODIFY `intIdDokRiskRegister` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `trTahapanProsesRisk`
--
ALTER TABLE `trTahapanProsesRisk`
  MODIFY `intIdTahapanProses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
