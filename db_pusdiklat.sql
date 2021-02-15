-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 08:52 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pusdiklat`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_user`
--

CREATE TABLE `akun_user` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `id_institusi` int(11) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `foto_profil` varchar(500) NOT NULL,
  `foto_identitas` varchar(500) DEFAULT NULL,
  `role_id` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`id`, `id_jenis`, `id_prodi`, `id_institusi`, `no_identitas`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `email`, `password`, `no_hp`, `foto_profil`, `foto_identitas`, `role_id`, `is_active`, `date_created`) VALUES
(1, 1, 0, 0, '321234567654567', 'Admin Pusdiklat', 'Majalengka', '2020-05-15', 'Pria', 'aderohmatmaulana77@gmail.com', '$2y$10$F9te7soaxGRq4sn0XgBJe.ZBp5GsnDm28svKtmCHfiLLCUSPuqFgO', '089612664228', 'default.png', 'ijazah.jpg', 2, 1, 1590121062),
(4, 2, 7, 4, '321567453212', 'Super Admin', 'Majalengka', '2020-05-12', 'Wanita', 'superadmin@gmail.com', '$2y$10$4iCYb/IK692wgFIeHh6hiOJF6IG0.jS9lkNs/XuxjtmrkqsfkVMCO', '087654345653', 'default.png', 'ijazah1.jpg', 1, 1, 1590557037),
(50, 1, 16, 2, '5170411330', 'Ade Rohmat Maulana', 'Majalengka', '1998-08-04', 'Pria', 'aderohmatmaulana22@gmail.com', '$2y$10$4dgBTDIhZoS/8Qur4rIAee2CjYysNZ2JP.358XqRIFW5EyKTCGxf2', '089612664228', 'rsz_ade_rohmat_maulana1.jpg', NULL, 3, 1, 1607852672),
(51, 1, 16, 2, '5170411331', 'Ade Rohmat', 'Majalengka', '1998-08-04', 'Pria', 'aderohmatmaulana44@gmail.com', '$2y$10$4gn7lqtA1EE2RpWPm3frHe.uwQrMQuIYTXVQWWrDhURDNCSURwbuu', '089612664228', 'rsz_ade_rohmat_maulana2.jpg', NULL, 3, 1, 1611716210);

-- --------------------------------------------------------

--
-- Table structure for table `boking_kelas`
--

CREATE TABLE `boking_kelas` (
  `id` int(11) NOT NULL,
  `id_akun_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `status_boking` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boking_kelas`
--

INSERT INTO `boking_kelas` (`id`, `id_akun_user`, `id_kelas`, `id_tarif`, `tanggal_pesan`, `status_boking`, `is_active`, `date_created`) VALUES
(1, 51, 6, 1, '2021-01-27 10:00:33', 'Terboking', 0, 1611716433);

-- --------------------------------------------------------

--
-- Table structure for table `institusi`
--

CREATE TABLE `institusi` (
  `id` int(11) NOT NULL,
  `nama_institusi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institusi`
--

INSERT INTO `institusi` (`id`, `nama_institusi`) VALUES
(1, 'SMAN 1 Yogyakarta'),
(2, 'Unversitas Teknologi Yogyakarta'),
(3, 'SMKN 2 Yogyakarta'),
(4, 'MAN 1 Yogyakarta'),
(5, 'SMKN 4 Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pendaftar`
--

CREATE TABLE `jenis_pendaftar` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pendaftar`
--

INSERT INTO `jenis_pendaftar` (`id`, `nama_jenis`) VALUES
(1, 'S1/D3 Mahasiswa UTY'),
(2, 'S2 Mahasiswa UTY'),
(3, 'S3 Mahasiswa UTY'),
(4, 'Umum'),
(5, 'Partner');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kuota` int(11) NOT NULL,
  `sisa_kuota` int(11) NOT NULL,
  `tanggal_ujian` datetime NOT NULL,
  `status_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `nama_ruangan`, `lokasi`, `kuota`, `sisa_kuota`, `tanggal_ujian`, `status_kelas`) VALUES
(1, 'Reguler I', 'E11', 'Kampus 1 UTY', 40, 24, '2021-01-16 08:30:00', 'Tutup'),
(2, 'Reguler II', 'D12', 'Kampus 3 UTY', 40, 0, '2021-01-18 10:00:00', 'Tutup'),
(4, 'Reguler III', 'Lab bahasa', 'Kampus 2 UTY', 40, 14, '2020-11-03 00:00:00', 'Tutup'),
(6, 'Reguler 5', 'E21', 'Kampus 1 UTY', 15, 12, '2021-01-31 08:30:00', 'Tutup'),
(7, 'Reguler 6', 'E21', 'Kampus 2 UTY', 15, 13, '2021-01-30 08:39:00', 'Tutup'),
(8, 'Reguler 4', 'Lab Bahasa', 'Kampus 3 UTY', 15, 15, '2021-01-29 10:21:00', 'Tutup');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `id_akun_user` int(11) NOT NULL,
  `id_boking` int(11) NOT NULL,
  `no_slip` varchar(100) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `bukti_bayar` varchar(500) NOT NULL,
  `status` enum('Pending','Terverifikasi','','') NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `id_akun_user`, `id_boking`, `no_slip`, `tanggal_bayar`, `bukti_bayar`, `status`, `update_at`) VALUES
(1, 51, 1, 'KRS-00534', '2021-01-27 10:03:26', 'Bukti_Pembayaran_gelombang_21.jpeg', 'Terverifikasi', 1611716909);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`) VALUES
(1, 'D3 Akuntansi'),
(2, 'S1 Hubungan Internasional'),
(3, 'S1 Psikologi'),
(4, 'S1 Manajemen'),
(5, 'S1 Akuntansi'),
(6, 'S1 Ilmu Komunikasi'),
(7, 'D3 Bahasa Inggris'),
(8, 'D3 Bahasa Jepang'),
(9, 'S1 Sastra Inggris'),
(10, 'S1 Bimbingan dan Konseling'),
(11, 'S1 Pendidikan Bahasa Inggris'),
(12, 'S1 Pendidikan Teknologi Informasi'),
(13, 'D4 Destinasi Pariwisata'),
(14, 'D3 Manajemen Informatika'),
(15, 'S1 Teknik Komputer'),
(16, 'S1 Informatika'),
(17, 'S1 Sistem Informasi'),
(18, 'S1 Data Science'),
(19, 'S1 Informatika Medis'),
(20, 'S1 Teknik Elektro'),
(21, 'S1 Teknik Industri'),
(22, 'S1 Arsitektur'),
(23, 'S1 Teknik Sipil'),
(24, 'S1 Perencanaan Wilayah Kota'),
(25, 'S3 Doktor Ilmu Manajemen'),
(31, 'S2 Magister Manajemen'),
(32, 'S2 Magister Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `tarif`, `id_jenis`) VALUES
(1, 30000, 1),
(2, 50000, 2),
(3, 75000, 3),
(4, 75000, 4),
(5, 75000, 5);

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
(1, 2, 2),
(2, 2, 3),
(3, 3, 3),
(4, 1, 4),
(5, 1, 1),
(9, 3, 7),
(10, 3, 8),
(12, 1, 3);

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
(1, 'SuperAdmin'),
(2, 'Admin'),
(3, 'User'),
(4, 'Menu'),
(8, 'Sertifikasi');

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
(1, 'super admin'),
(2, 'admin ujian EPT'),
(3, 'member');

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
(1, 2, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 0),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder-open', 1),
(5, 4, 'Submenu Management', 'menu/submenu', 'far fa-fw fa-folder', 1),
(8, 1, 'Role', 'superadmin/role', 'fas fa-fw fa-user-tie', 1),
(9, 3, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Buat Akun Admin', 'superadmin/buatakunadmin', 'fas fa-fw fa-plus-circle', 1),
(11, 7, 'Ujian Bahasa EPT', 'pelatihan_sertifikasi/ujian_bahasa', 'fas fa-fw fa-book', 1),
(12, 8, 'Ujian Bahasa EPT', 'sertifikasi/ujian_bahasa', 'fas fa-fw fa-book', 1),
(13, 2, 'Kelas', 'admin/kelas', 'fas fa-fw fa-door-open', 1),
(14, 2, 'Biaya', 'admin/tarif', 'fas fa-fw fa-money-bill-wave', 1),
(15, 8, 'Status Pendaftaran', 'sertifikasi/status_pendaftaran', 'fas fa-fw fa-user-check', 0),
(16, 2, 'Verifikasi Pembayaran', 'admin/verifikasi_pembayaran', 'fas fa-fw fa-database', 1),
(17, 2, 'Laporan', 'admin/laporan', 'fas fa-fw fa-clipboard-list', 1),
(18, 8, 'Prosedur Pendaftaran', 'sertifikasi/prosedur_pendaftaran', 'fas fa-fw fa-list-ul', 1),
(19, 8, 'Pengumuman', 'sertifikasi/pengumuman', 'far fa-fw fa-bell', 0),
(20, 2, 'Jenis Pendaftar', 'admin/jenispendaftar', 'fas fa-fw fa-user-plus', 1);

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
(76, 'zfdfsf@ggdg.com', 'iecFulj1Ts6PZyBuZgrij0K1zo+1SZrqT6jSsQXp+Fk=', 1611809542),
(77, 'zfdfsf@ggdg.com', 'jn+FuiOsS68sLSTznaGbRFkiyuA3cJ4C7fbfGWCqgY0=', 1611809797);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boking_kelas`
--
ALTER TABLE `boking_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institusi`
--
ALTER TABLE `institusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pendaftar`
--
ALTER TABLE `jenis_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
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
-- AUTO_INCREMENT for table `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `boking_kelas`
--
ALTER TABLE `boking_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institusi`
--
ALTER TABLE `institusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_pendaftar`
--
ALTER TABLE `jenis_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
