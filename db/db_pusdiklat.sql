-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 02:23 AM
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
  `id_prodi` int(11) NOT NULL,
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
  `foto_identitas` varchar(500) NOT NULL,
  `role_id` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`id`, `id_jenis`, `id_prodi`, `id_institusi`, `no_identitas`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `email`, `password`, `no_hp`, `foto_profil`, `foto_identitas`, `role_id`, `is_active`, `date_created`) VALUES
(1, 1, 15, 4, '321234567654567', 'aderohmatmaulana', 'majalengka', '2020-05-15', 'Pria', 'aderohmatmaulana77@gmail.com', '$2y$10$F9te7soaxGRq4sn0XgBJe.ZBp5GsnDm28svKtmCHfiLLCUSPuqFgO', '089612664228', 'default.png', 'ijazah.jpg', 2, 1, 1590121062),
(2, 1, 3, 2, '321534278409', 'Rahmad Kurniadi', 'pekanbaru', '1999-08-12', 'Pria', 'rahmadkurniadi@gmail.com', '$2y$10$jqC/rMJRLo/YuDT60LMk9OQaTnupP.XUP4zY8MBapvlmS1dWZArLm', '089765432345', 'IMG-20170130-WA0001.jpg', 'IMG-20170202-WA00031.jpg', 3, 1, 1588565040),
(4, 2, 7, 4, '321567453212', 'Super Admin', 'majalengka', '2020-05-12', 'Wanita', 'superadmin@gmail.com', '$2y$10$4iCYb/IK692wgFIeHh6hiOJF6IG0.jS9lkNs/XuxjtmrkqsfkVMCO', '087654345653', 'default.png', 'ijazah1.jpg', 1, 1, 1590557037),
(15, 1, 7, 2, '312647584998', 'Diana Arifa', 'Aceh', '1998-07-09', 'Wanita', 'dianaarifa00@gmail.com', '$2y$10$0VN6CjITpREnT9d4DAdHs.b7HjtRGW2G.m2MBSmG/NMUbnCnSCUc.', '089765643234', 'default.png', 'default.png', 3, 1, 1597813863),
(18, 1, 2, 2, '321487564356', 'Agus Muhamad Gaostul Ibad', 'Majalengka', '1997-06-12', 'Pria', 'agus.ibad33@gmail.com', '$2y$10$OM89WmHLOJBujPL6tQWjA.vwBfQJ0cWypiyoUgJhlHUqicR4fpr/y', '089764534253', 'default.png', 'default.png', 3, 0, 1598371459),
(19, 1, 16, 2, '321490732438', 'hamdi abdul aziz', 'Tasikmalaya', '1998-08-21', 'Pria', 'hamdiabdulaziz1@gmail.com', '$2y$10$A6X1GpxGrxPq38mtBBjQQubH0xgO9KP0FYIhwue4fQXY.Pjt32dNy', '089612456852', 'IMG_5906.JPG', 'IMG_5906_copy.jpg', 3, 1, 1598441817),
(20, 1, 2, 2, '32134565', 'Akun 1', 'Yogyakarta', '1998-06-18', 'Pria', 'akun1@gmail.com', '$2y$10$LZyGx9IOqnxOluEsDr6UuOTXwrneRAfaHcqwumbI53HqaSaEnIXOi', '089754567889', 'default1.png', 'innput.PNG', 3, 1, 1598716747),
(21, 1, 6, 2, '321334343', 'Akun 2', 'Tasik', '1999-07-06', 'Wanita', 'akun2@gmail.com', '$2y$10$erpgFuhEwMXXyC0wio5RzeKKQyzQ6IXhsxX7e4igcOt30RMJgWul.', '089754567880', 'default2.png', 'innput1.PNG', 3, 1, 1598716896),
(22, 1, 6, 2, '3245675', 'Akun 3', 'Majalengka', '2000-02-15', 'Pria', 'akun3@gmail.com', '$2y$10$RLC2iuVKB.YqQaGjIpVqvOD1REoBd74JLhlWBD5qtBIQS9Xo5/aiO', '089754567885', 'default3.png', 'innput2.PNG', 3, 1, 1598717138),
(23, 1, 7, 2, '32134567', 'Akun 4', 'Jakarta', '1999-02-02', 'Pria', 'akun4@gmail.com', '$2y$10$4irhK3cHytejHtdLWXRPpO2N71FYIAAnRzGP5fVmBWpBBMhW53aOe', '089754567883', 'default4.png', 'innput3.PNG', 3, 1, 1598717353),
(24, 1, 13, 2, '32145876', 'Akun 5', 'Bantul', '1998-02-27', 'Pria', 'akun5@gmail.com', '$2y$10$LL.FI99IGQjLhdUWCF/Zv.O9v0CBVo3VjetE2krxnDw9We2YfdkG.', '089754567884', 'default5.png', 'innput4.PNG', 3, 1, 1598717490),
(25, 1, 13, 2, '321456987', 'Akun 6', 'Sleman', '1998-01-13', 'Pria', 'akun6@gmail.com', '$2y$10$q4YShmi8BxP34U/6iBclIuu4RD/.Jfmz5OjL0Q1DOhXQ7ks2ug/3i', '089754567885', 'default6.png', 'innput5.PNG', 3, 1, 1598717659),
(26, 1, 9, 2, '32145654', 'Akun 7', 'Kebumen', '1997-06-09', 'Pria', 'akun7@gmail.com', '$2y$10$3Nlqgnztok77ytl/0k/zV.T8WiI7woXjVk0hSYITaZn8f41fQq2bW', '089754567887', 'default7.png', 'innput6.PNG', 3, 1, 1598717779),
(27, 1, 12, 2, '321345654', 'Akun 8', 'Cilacap', '1999-02-03', 'Pria', 'akun8@gmail.com', '$2y$10$8GXCA009Yd6kJe3TpXTkOOCxPFw5s65kBhVVswh9etK/Wd3.VyC6O', '089754567887', 'default8.png', 'innput7.PNG', 3, 1, 1598717912),
(28, 1, 13, 2, '32134590', 'Akun 9', 'Karawang', '2020-08-05', 'Pria', 'akun9@gmail.com', '$2y$10$F7f8Hhx04.4DkDt3e1FVxOwPszJVsKu7Xf2m7.tecRVw1bGn5JINy', '089754567884', 'default9.png', 'innput8.PNG', 3, 1, 1598718048),
(29, 1, 2, 2, '32134566', 'Akun 10', 'Cikarang', '1998-02-13', 'Pria', 'akun10@gmail.com', '$2y$10$1YIAAcSvq9ixVJBLV.fMouOrUUnz3AAcDvoRtiwOAX7aMoP.S9EcW', '089754567880', 'default10.png', 'innput9.PNG', 3, 1, 1598718181),
(30, 1, 12, 2, '3213343', 'Akun 11', 'Purwokerto', '2000-08-02', 'Pria', 'akun11@gmail.com', '$2y$10$m9uhWusOoHlGWeYcWv046ujCKZ7hXlMvqfeKIUFTg3.VzSFGtZCWO', '089754567882', 'default11.png', 'innput10.PNG', 3, 1, 1598718333),
(31, 1, 13, 2, '32134563', 'Akun 12', 'Bogor', '1999-03-04', 'Pria', 'akun12@gmail.com', '$2y$10$2yRTUBl/k30B3bGnx4s1NOY/2D41HY2d9copwvJWqG4SWIY/Lvmdi', '089754567865', 'default12.png', 'innput11.PNG', 3, 1, 1598718491),
(32, 1, 8, 2, '3214564', 'Akun 13', 'Banyumas', '1999-03-03', 'Pria', 'akun13@gmail.com', '$2y$10$gGl1/38hz409VdBjQBe5nOYpjC.rvvJn7w1ytKmD6mP1QT7DoTx3y', '089754567832', 'default13.png', 'innput12.PNG', 3, 1, 1598718627),
(33, 1, 14, 2, '3245665', 'Akun 14', 'Jambi', '1999-07-02', 'Pria', 'akun14@gmail.com', '$2y$10$ATieA2qoAAmnAd/Duz1Ace.Z.VtnYsoaMYUMVvjp/L6GnOyS1TaJC', '089754567876', 'default14.png', 'innput13.PNG', 3, 1, 1598718787),
(34, 1, 10, 2, '3245654', 'Akun 15', 'Makasar', '1998-06-29', 'Pria', 'akun15@gmail.com', '$2y$10$aOtcPAnZ5ubczduXojD/DewfjbSormgALDAmfUcSXuT.xphLK4GbW', '0897545678776', 'default15.png', 'innput14.PNG', 3, 1, 1598718932),
(35, 1, 16, 2, '32134562', 'Akun 16', 'Medan', '1999-06-08', 'Pria', 'akun16@gmail.com', '$2y$10$ISSqsGmcfDt27t5zi1.KguQ627xx1nDS3SloVgc2XiLJNgj70hLvO', '089754567881', 'default16.png', 'innput15.PNG', 3, 1, 1598719157),
(36, 1, 15, 2, '32134567', 'Akun 17', 'Parung', '1999-02-10', 'Wanita', 'akun17@gmail.com', '$2y$10$wr/csbICYzhWftBn9pRwh.9Ul9hrgg51ilXsEvi/18K3ZmiwkSdIe', '089754567881', 'default17.png', 'innput16.PNG', 3, 1, 1598719471),
(37, 1, 16, 2, '32134562', 'Akun 18', 'Magelang', '1999-12-02', 'Wanita', 'akun18@gmail.com', '$2y$10$EyREVd5BaIxLtbx.xGonQu0NPsO1C1aSc7QgGDWYLAhVqgNAALhq2', '089754567882', 'default18.png', 'innput17.PNG', 3, 1, 1598719719),
(38, 1, 5, 2, '32134562', 'Akun 19', 'Kulon Progo', '1999-02-10', 'Pria', 'akun19@gmail.com', '$2y$10$Tk65MslZTIEhZcf0XFsjk.lJBWtGyP1nKtMXRUCqL8C2uOWSU20x.', '08975456784', 'default19.png', 'innput18.PNG', 3, 1, 1598719936),
(39, 1, 2, 2, '32134561', 'Akun 20', 'Palembang', '1999-01-29', 'Pria', 'akun20@gmail.com', '$2y$10$Cmh0Aa4/7GTg.ch9RDYkWO7QGxjP.mbR6o3zzR1N9RW48Ypwa6h9y', '089754567882', 'default20.png', 'innput19.PNG', 3, 1, 1598720311),
(40, 1, 12, 2, '32134562', 'Akun 21', 'Sleman', '2000-02-08', 'Pria', 'akun21@gmail.com', '$2y$10$BQ4arAMLg23Es7DLk/td8epXvZuNebc0o.OZ8Sw9A7Kw8LljT.Q.O', '089754567882', 'default21.png', 'innput20.PNG', 3, 1, 1598720649),
(41, 1, 6, 2, '32134562', 'Akun 22', 'Majalengka', '1999-02-11', 'Pria', 'akun22@gmail.com', '$2y$10$qXAyfp0kuhS/8x/6t.244uo92wANiXs7wBFBqQKKRFIAm7ldwhrnW', '089754567882', 'default22.png', 'innput21.PNG', 3, 1, 1598720771),
(42, 1, 7, 2, '32134567', 'Akun 23', 'Majalengka', '1998-02-28', 'Pria', 'akun23@gmail.com', '$2y$10$yN9X3yK3j1O72N9UzR5PTe6sLuRZ5ki3FCjFAM0P566kS6E0dqr6O', '089754567885', 'default23.png', 'innput22.PNG', 3, 1, 1598720936),
(43, 1, 14, 2, '32134562', 'Akun 24', 'Sleman', '1999-01-30', 'Pria', 'akun24@gmail.com', '$2y$10$6q9qeM/OCnNPNi2vGkpSZ.KTovIaEkns/LOMOH5clUHmGgZrqgwLe', '089754567885', 'default24.png', 'innput23.PNG', 3, 1, 1598721091),
(44, 1, 12, 2, '3213456221', 'Akun 25', 'Riau', '1999-10-10', 'Pria', 'akun25@gmail.com', '$2y$10$BONvrWDKPzy5VHOU61n7V.xiURMXXfKMd8KODtYPsm3gbuOI6gxuy', '089754567880', 'default25.png', 'innput24.PNG', 3, 1, 1598721531),
(45, 1, 4, 2, '32134523', 'Akun 26', 'Bandung', '1998-05-05', 'Pria', 'akun26@gmail.com', '$2y$10$woewbhkKgjGARRwODwnCyuWln5Krz..vEUfVLofe2dcHmhGqs3xsG', '089754567884', 'default26.png', 'innput25.PNG', 3, 1, 1598721913),
(46, 1, 7, 2, '32134568', 'Akun 27', 'Jambi', '1997-01-05', 'Pria', 'akun27@gmail.com', '$2y$10$Rcl25C5UvJ2uYIGmRGQUfOW3/Que2HqKfFFwOUZXLZrcSZCh6WPle', '089754567831', 'default27.png', 'innput26.PNG', 3, 1, 1598722251),
(47, 1, 8, 2, '32145875', 'Akun 28', 'Jakarta', '1999-06-30', 'Wanita', 'akun28@gmail.com', '$2y$10$MeTZbVmCJLnaqXM00evEr.LZ81v.VUOAfBTm3Hg0mpsWM0LanWEty', '089754567812', 'default28.png', 'innput27.PNG', 3, 1, 1598722487),
(48, 1, 4, 2, '3213456212', 'Akun 29', 'Depok', '1998-06-30', 'Pria', 'akun29@gmail.com', '$2y$10$lbR9nqnQktuzeZy4Q5fb0ezqUajjTSb1WL/r.vHD84jufL/9kpkxO', '089754567886', 'default29.png', 'innput28.PNG', 3, 1, 1598722599),
(49, 1, 17, 2, '32456752', 'Akun 30', 'Solo', '1997-06-26', 'Pria', 'akun30@gmail.com', '$2y$10$GAM/lJ2H.8vP51S6fS6O5esiHkMQeVen4Nkp42MYOhr.9YhV87PwC', '089754567887', 'default30.png', 'innput29.PNG', 3, 1, 1598722772);

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
(131, 2, 1, 1, '2020-08-25 18:27:12', 'Terboking', 0, 1598354832),
(132, 2, 4, 1, '2020-08-25 19:27:20', 'Terboking', 0, 1598358440),
(135, 19, 2, 1, '2020-08-29 11:56:05', 'Terboking', 0, 1598676965),
(153, 38, 4, 1, '2020-08-31 12:27:53', 'Terboking', 0, 1598851673),
(161, 2, 5, 1, '2020-10-20 14:19:41', 'Terboking', 0, 1603178381),
(162, 29, 1, 1, '2020-11-02 20:29:31', 'Terboking', 0, 1604323771),
(163, 29, 4, 1, '2020-11-02 20:34:49', 'Terboking', 0, 1604324089),
(165, 20, 5, 1, '2020-11-04 14:03:12', 'Terboking', 0, 1604473392),
(168, 20, 6, 1, '2020-11-12 15:51:40', 'Terboking', 0, 1605171100),
(169, 21, 6, 1, '2020-11-12 16:08:31', 'Terboking', 1, 1605172111),
(176, 57, 6, 1, '2020-11-13 01:51:34', 'Terboking', 0, 1605207094);

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
(1, 'A'),
(2, 'Unversitas Teknologi Yogyakarta'),
(3, 'C'),
(4, 'D'),
(5, 'E');

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
(1, 'Reguler I', 'E11', 'Kampus 1 UTY', 40, 26, '2020-11-11 00:00:00', 'Tutup'),
(2, 'Reguler II', 'D12', 'Kampus 3 UTY', 40, 4, '2020-11-05 00:00:00', 'Tutup'),
(4, 'Reguler III', 'Lab bahasa', 'Kampus 2 UTY', 40, 14, '2020-11-03 00:00:00', 'Tutup'),
(5, 'Reguler 4', 'Lab bahasa', 'Kampus 1 UTY', 40, 21, '2020-11-01 00:00:00', 'Tutup'),
(6, 'Reguler 5', 'E21', 'Kampus 1 UTY', 15, 14, '2020-11-30 08:30:00', 'Buka');

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
(24, 13, 108, '54353534', '2020-08-17 00:00:00', '43.jpg', 'Pending', 0),
(28, 2, 131, '56646646456', '2020-08-25 00:00:00', 'result3.jpg', 'Terverifikasi', 1598773787),
(29, 2, 132, '4343534', '2020-08-25 19:27:33', 'result4.jpg', 'Terverifikasi', 0),
(30, 19, 135, '43535353', '2020-08-29 16:16:05', '45.jpg', 'Terverifikasi', 0),
(31, 38, 153, '32424', '2020-08-31 12:28:17', '227.jpg', 'Pending', 0),
(32, 2, 161, '6756675', '2020-10-20 14:20:35', '35.jpg', 'Terverifikasi', 1604927073),
(33, 29, 162, '675667576', '2020-11-02 20:30:00', '228.jpg', 'Pending', 1604861220),
(34, 29, 163, '56464564', '2020-11-02 20:36:36', '46.jpg', 'Pending', 0),
(35, 20, 165, '45433454453', '2020-11-04 14:03:31', 'contoh2.jpg', 'Terverifikasi', 1604473463),
(36, 20, 168, '453435', '2020-11-12 16:06:15', '49.jpg', 'Pending', 1605171975),
(39, 57, 176, '4535354', '2020-11-13 01:52:55', 'result5.jpg', 'Terverifikasi', 1605207278);

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
(8, 1, 3),
(9, 3, 7),
(10, 3, 8);

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
(3, 3, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder-open', 1),
(5, 4, 'Submenu Management', 'menu/submenu', 'far fa-fw fa-folder', 1),
(8, 1, 'Role', 'superadmin/role', 'fas fa-fw fa-user-tie', 1),
(9, 3, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Buat Akun Admin', 'superadmin/buatakunadmin', 'fas fa-fw fa-plus-circle', 1),
(11, 7, 'Ujian Bahasa EPT', 'pelatihan_sertifikasi/ujian_bahasa', 'fas fa-fw fa-book', 1),
(12, 8, 'Ujian Bahasa EPT', 'sertifikasi/ujian_bahasa', 'fas fa-fw fa-book', 1),
(13, 2, 'Kelas', 'admin/kelas', 'fas fa-fw fa-door-open', 1),
(14, 2, 'Tarif', 'admin/tarif', 'fas fa-fw fa-money-bill-wave', 1),
(15, 8, 'Status Pendaftaran', 'sertifikasi/status_pendaftaran', 'fas fa-fw fa-user-check', 0),
(16, 2, 'Verifikasi Pembayaran', 'admin/verifikasi_pembayaran', 'fas fa-fw fa-database', 1),
(17, 2, 'Laporan', 'admin/laporan', 'fas fa-fw fa-clipboard-list', 1),
(18, 8, 'Prosedur Pendaftaran', 'sertifikasi/prosedur_pendaftaran', 'fas fa-fw fa-list-ul', 1),
(19, 8, 'Pengumuman', 'sertifikasi/pengumuman', 'far fa-fw fa-bell', 0);

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
(1, 'akun1@gmail.com', 'myrDzWoCO24ULEYFe1z0y+nUlnuxg8ZX9Bi6fwylppk=', 1598716747),
(2, 'akun2@gmail.com', 'uQVbmkpckCLmcUsaeUfFYhjo2Ik4LDPGYz201c4sBtA=', 1598716896),
(3, 'akun3@gmail.com', 'HQpig1DN1UYHM9+aM0Pl01oiKjqRH7xKnGWTRoxeXsQ=', 1598717138),
(4, 'akun4@gmail.com', '74FzrvCT29Ngu4kOv9jD4rbmyfutTyLWKe+0C2w5fj4=', 1598717353),
(5, 'akun5@gmail.com', 'TDhutkRxfygNzRiVh5KgQQGZOxtMTcVAgw9IiUEvl3Q=', 1598717490),
(6, 'akun6@gmail.com', 'ukETm4dQ5ARryR4S0qu4LrxZG32t586sbyy81wlRxF8=', 1598717659),
(7, 'akun7@gmail.com', 'lWfYPdzO3XIWbV30iBkX1MfMrUUzClHYKB/5QFE3b+g=', 1598717779),
(8, 'akun8@gmail.com', 'fl+HsfzJ2Hv2DH1ciQz5IIGaoc21qRZrkas1enhP+AE=', 1598717912),
(9, 'akun9@gmail.com', 'YwPvIf6GMj06o9F9Tktz/wrE/P8Wklw1JIdPyrk5Jko=', 1598718048),
(10, 'akun10@gmail.com', 'xH+2dNiFlNBTK7BrBRL/Jx1pfORr1nWf+b//VYBQzSw=', 1598718181),
(11, 'akun11@gmail.com', 'jjPXPLurG1BujPStzS0TWkoRSjHX3XXfOY5fACeMU6U=', 1598718333),
(12, 'akun12@gmail.com', '5WY5biHs6fWm+f1EETKejQtxn7eyFMF1ChAmwW4vnUU=', 1598718491),
(13, 'akun13@gmail.com', 'z2+LAHHl3r8vU9sewElJydyQ3iCbHy6qTeLmftaNMd0=', 1598718627),
(14, 'akun14@gmail.com', 'mEZ9sZ0ZnUS6TZo3IvDXn9cjFUYZcdvPyTev3Rv5TlE=', 1598718787),
(15, 'akun15@gmail.com', 'gom4DjIc5z2WvCczFefzfVmnwPq6U8I0LEY2jORMDI4=', 1598718932),
(16, 'akun16@gmail.com', 'iFEFGhw/56cdd4EarNAvGdShDdmtdDpAmQkyj04CBKc=', 1598719157),
(17, 'akun17@gmail.com', 'IcP9o8gTSr5lobnkmh0AA9ygwDNV+DfLat+5T7dPry8=', 1598719471),
(18, 'akun18@gmail.com', 'j5goBBKmRmR8YxBYWMIVHNt5bfXKNa7SFors3+lLcp8=', 1598719719),
(19, 'akun19@gmail.com', 'cx+aR9dhmIuscii/xWUy9bscM8+Vw4KkfMH/dpjgMCQ=', 1598719936),
(20, 'akun20@gmail.com', 'oBpJ/oiC7hhltUAD6d49V8deJlp+ZmJ8U7oI3gw/+PA=', 1598720311),
(21, 'akun21@gmail.com', 'DEC8VPORt7B85oIOB+7GhuOTVw2unxOc/D4Gm+Tq6zE=', 1598720649),
(22, 'akun22@gmail.com', 'OWmhyMVlNUchyULu1uHh1N9E2y1TmlaxYl0n9OBuUBk=', 1598720771),
(23, 'akun23@gmail.com', 'XsKQpOmbNrcIe+fMpP5/q8/mgzzd3vZRNB8K3DnSl5s=', 1598720936),
(24, 'akun24@gmail.com', '0jLf+nNBT6/iQU6EQpoRv/BKBrZNm0qFLvWnZqimNWI=', 1598721091),
(25, 'akun25@gmail.com', 'VYN3PYbb3Z1RoBIdYG7ckSAX4DwmFk5b07CSoIJ9xDg=', 1598721531),
(26, 'akun26@gmail.com', 'Hw5cnqWkJmXZQIep3qUSgP48x/Hn1pxlE2JlUGnXlJU=', 1598721913),
(27, 'akun27@gmail.com', 'k/wg3THbg1F5gNm3gZ8tW5+4LMzl23pgXEkTVnkP6Sk=', 1598722251),
(28, 'akun28@gmail.com', '6+z6mTp94bLiRl5ha5mCFtyyiSNSyY9QAIF4M9a8dtM=', 1598722487),
(29, 'akun29@gmail.com', 'mY5aiRO5pecufrW7Fu83LlF5JT3OB7/Ee8ERlIOjAuk=', 1598722599),
(30, 'akun30@gmail.com', 'gF3ZPmiseMyyoXfBUAOX1X5iSqoIVuVU+L7DUeidAV4=', 1598722772),
(31, 'aderohmatmaulana2@gmail.com', '5mtbh4vKH243OGeHPoii6FF3QgNp0kWj0C0fCqwDaLA=', 1604971505);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `boking_kelas`
--
ALTER TABLE `boking_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
