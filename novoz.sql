-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Feb 2016 pada 23.34
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novoz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `ukuran_file` char(10) NOT NULL,
  `kategori_file` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id_image`, `id_user`, `tgl_upload`, `nama_file`, `tipe_file`, `file`, `ukuran_file`, `kategori_file`, `deskripsi`, `status`) VALUES
(151, '19', '2016-02-19 17:29:35', '2nd', 'jpg', 'file_karya/2nd_2016_02_19_17_29_35.jpg', '302133', 'popart', 'iini kedua gan 1!', 'sudah_vertifikasi'),
(150, '19', '2016-02-19 17:16:09', 'damkdmwak', 'jpg', 'file_karya/damkdmwak_2016_02_19_17_16_09.jpg', '252753', 'manipulation', 'awdaw', 'sudah_vertifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_komen` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_image`, `id_user`, `komentar`, `tanggal_komen`) VALUES
(42, 0, 0, 'adw', '2015-11-25 20:09:51'),
(40, 0, 0, 'dwadaw', '2015-11-25 20:02:26'),
(39, 0, 0, 'awd', '2015-11-25 20:02:00'),
(41, 0, 0, 'dion1', '2015-11-25 20:02:58'),
(43, 110, 17, 'wadaw', '2015-11-25 20:17:23'),
(44, 110, 17, 'wadaw', '2015-11-25 20:17:27'),
(45, 110, 17, 'adiawjdoawkdoakw', '2015-11-25 20:17:31'),
(46, 110, 17, 'jelek gan', '2015-11-25 20:17:39'),
(47, 110, 17, 'fak', '2015-11-25 20:17:42'),
(48, 110, 17, 'awdaiwkdoawkod lol', '2015-11-25 20:17:48'),
(49, 110, 19, 'jgn gitulah gan', '2015-11-25 20:18:13'),
(50, 110, 34, 'wadkoawkdaowk keren gan kawdokawodkaowk', '2015-11-25 20:21:24'),
(51, 110, 34, 'd', '2015-11-25 20:22:12'),
(52, 110, 34, 'da', '2015-11-25 20:22:16'),
(53, 110, 34, 'awdaw', '2015-11-25 20:22:18'),
(54, 108, 34, 'awodkawokdaowk keren gan', '2015-11-25 20:22:30'),
(55, 108, 34, 'aazzzzzzzzzzzzzz', '2015-11-25 20:22:34'),
(56, 107, 34, 'azxxxxxxxxxxxxxx', '2015-11-25 20:22:39'),
(57, 107, 34, 'daw', '2015-11-25 20:29:01'),
(58, 107, 34, 'yank', '2015-11-25 20:30:27'),
(59, 110, 34, 'kdoakwodkaw', '2015-11-25 20:30:35'),
(60, 110, 34, 'ca tik\r\n', '2015-11-25 20:34:12'),
(61, 110, 19, 'apa akwdkaw', '2015-11-25 20:34:26'),
(62, 107, 19, 'cantik cok', '2015-11-25 20:37:13'),
(63, 107, 19, 'apaan dah', '2015-11-25 20:39:30'),
(64, 108, 19, 'waodkaowkda', '2015-11-25 20:39:41'),
(65, 108, 19, '', '2015-11-25 20:39:43'),
(66, 109, 0, 'awdawld,a', '2015-11-25 20:39:58'),
(67, 109, 0, 'awd awm dawm', '2015-11-25 20:40:02'),
(68, 109, 0, '', '2015-11-25 20:41:13'),
(69, 109, 0, '', '2015-11-25 20:41:14'),
(70, 109, 0, '', '2015-11-25 20:41:14'),
(71, 109, 0, '', '2015-11-25 20:41:14'),
(72, 109, 0, '', '2015-11-25 20:41:15'),
(73, 108, 0, '', '2015-11-25 20:41:17'),
(74, 108, 0, '', '2015-11-25 20:41:17'),
(75, 108, 0, '', '2015-11-25 20:41:18'),
(76, 108, 0, '', '2015-11-25 20:41:18'),
(77, 108, 0, '', '2015-11-25 20:41:18'),
(78, 108, 0, '', '2015-11-25 20:41:18'),
(79, 107, 21, 'wow keren in igan', '2015-11-25 20:42:03'),
(80, 111, 21, 'ini baru mantap wakdakwdkawkdaw', '2015-11-25 20:54:23'),
(81, 111, 21, 'pertamax gan', '2015-11-25 20:54:32'),
(82, 108, 21, 'daowkdoawk mulute :V', '2015-11-25 20:54:46'),
(83, 109, 36, 'plur', '2015-11-25 21:02:52'),
(84, 111, 36, 'dwamdaw', '2015-11-25 21:03:41'),
(85, 112, 36, 'dal', '2015-11-25 21:07:16'),
(86, 111, 36, 'sssssssssssssssssssssssssssss', '2015-11-25 21:09:20'),
(87, 112, 36, 'ajib gan', '2015-11-25 21:11:46'),
(88, 113, 36, 'vvvvvvvvvvvvvvvvv', '2015-11-25 21:13:48'),
(89, 113, 36, 'vvvvvvvvvvvvv', '2015-11-25 21:13:52'),
(90, 113, 36, 'vvvvvvvvvvvvvvvvvv', '2015-11-25 21:13:56'),
(91, 109, 36, 'jypladwa', '2015-11-25 21:17:22'),
(92, 109, 36, '.........................?', '2015-11-25 21:17:36'),
(93, 109, 19, 'mdawkmdaw', '2015-11-25 21:17:55'),
(94, 109, 19, 'eafadawwwwww', '2015-11-25 21:17:59'),
(95, 113, 19, 'adwwwwwwwwzzzzzzzzzzzzzzz', '2015-11-25 21:18:07'),
(96, 107, 19, 'palalu lo peak1\r\n', '2015-11-25 21:22:49'),
(97, 107, 36, 'aaaaaaaa', '2015-11-25 21:23:46'),
(98, 107, 0, 'k', '2015-11-25 23:32:00'),
(99, 109, 0, '', '2015-11-29 14:35:10'),
(100, 109, 0, '', '2015-11-29 14:35:15'),
(101, 109, 0, '', '2015-11-29 14:35:16'),
(102, 109, 0, '', '2015-11-29 14:35:17'),
(103, 109, 0, '', '2015-11-29 14:35:18'),
(104, 109, 0, '', '2015-11-29 14:35:19'),
(105, 109, 0, '', '2015-11-29 14:35:20'),
(106, 109, 0, '', '2015-11-29 14:35:20'),
(107, 109, 0, '', '2015-11-29 14:35:21'),
(108, 109, 0, '', '2015-11-29 14:35:21'),
(109, 109, 0, '', '2015-11-29 14:35:22'),
(110, 109, 0, '', '2015-11-29 14:35:22'),
(111, 109, 0, '', '2015-11-29 14:35:22'),
(112, 109, 0, '', '2015-11-29 14:35:23'),
(113, 109, 0, '', '2015-11-29 14:35:23'),
(114, 109, 0, '', '2015-11-29 14:35:23'),
(115, 115, 19, 'dion', '2015-11-29 20:20:09'),
(116, 115, 19, 'kwkwk', '2015-11-29 20:20:25'),
(117, 116, 19, 'anjing !!', '2015-11-29 20:24:17'),
(118, 115, 25, '^_^', '2015-12-01 11:47:31'),
(119, 116, 25, 'wkwkkw\r\n', '2015-12-01 11:51:35'),
(120, 119, 18, '(y)', '2015-12-01 12:17:08'),
(121, 115, 18, 'ah ah', '2015-12-01 12:17:26'),
(122, 115, 0, '?', '2016-02-15 13:09:08'),
(123, 119, 19, 'faks', '2016-02-15 13:18:11'),
(124, 119, 19, 'fakk', '2016-02-15 13:18:23'),
(125, 120, 19, 'lololol', '2016-02-15 14:17:27'),
(126, 115, 19, 'lololol', '2016-02-15 14:17:45'),
(127, 120, 19, 'awd', '2016-02-15 14:51:25'),
(128, 120, 38, 'gaul kk', '2016-02-18 10:13:45'),
(129, 120, 38, 'adw', '2016-02-18 10:13:58'),
(130, 120, 38, '', '2016-02-18 10:13:59'),
(131, 127, 38, 'awda', '2016-02-18 10:18:01'),
(132, 120, 0, 'tes', '2016-02-18 13:43:50'),
(133, 134, 39, 'wow', '2016-02-18 14:57:19'),
(134, 132, 40, 'GG mad.. gue suka ', '2016-02-18 15:02:05'),
(135, 132, 0, 'ads', '2016-02-18 15:39:31'),
(136, 132, 0, 'asdsa', '2016-02-18 15:39:35'),
(137, 132, 0, 'asd', '2016-02-18 15:39:37'),
(138, 133, 19, 'waw', '2016-02-18 19:22:09'),
(139, 138, 19, 'yiha', '2016-02-18 20:03:41'),
(140, 132, 19, 'thx gan', '2016-02-18 20:04:06'),
(141, 141, 0, 'wadaw', '2016-02-19 10:38:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nama_profil` varchar(120) NOT NULL,
  `location` varchar(120) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(120) NOT NULL,
  `foto_profil` varchar(120) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `nama_profil`, `location`, `keterangan`, `status`, `foto_profil`) VALUES
(41, 'awdawmdk', 'makdmawk@gmail.com', 'mdkawdajwn', 'Mdkwamdaw', '', '', 'user', 'default.jpg'),
(42, 'awmdkawmdkwa', 'kmd,dal@gmail.com', 'kdm', 'Makmdwa', '', '', 'user', 'default.jpg'),
(16, 'awdmawm', 'dionreddys@gmail.com', 'simxdion', 'Dion Reddy', '', '', 'user', 'default.jpg'),
(17, 'dionreddy', 'dionreddys@gmail.com', 'simxdion', 'DDDDD', '', '', 'banned', 'animated1.png'),
(14, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin'),
(15, 'agungtoby', 'agungtoby4@gmail.com', 'simxdion', 'Agung Toby', '', '', 'user', 'default.jpg'),
(19, 'dionreddys', 'dionreddys@gmail.com', 'simxdion', 'Drdzz2', 'indonesia,jakarta', 'i Won', 'user', 'asdasd_2016_01_29_09_01_56.jpg'),
(21, 'iwan12345', 'iwan@gmail.com', 'simxdion', 'Iwan Kurniawan', '', '', 'user', 'IMG_9033.JPG'),
(22, 'afifah123', 'afifah123@gmail.com', 'simxdion', 'Afifah Coba', '', '', 'user', 'default.jpg'),
(23, 'eris1234', 'eris1234@gmail.com', 'simxdion', 'Eris Dwi Septiawan R', '', '', 'user', 'default.jpg'),
(24, 'gawatee123', 'gawat123@gmail.com', 'simxdion', 'Rheza B', '', '', 'belum', 'default.jpg'),
(25, 'Bondowocopz', 'bondowocopz@gmail.com', 'bondowocopz', 'Krisna Bayu', 'jepang', 'menjadi orang sukses !!', 'user', 'default.jpg'),
(26, 'saifur123', 'saifur@gmail.com', 'simxdion', 'Saifurahman', '', '', 'banned', '69-naruto-dan-jirayia.jpg'),
(27, 'surya1234', 'suryadharma@gmail.com', 'suryaganteng', 'Surya Dharma', '', '', 'user', 'IMG_9036.JPG'),
(28, 'robyantono', 'robyantono@gmail.com', 'simxdion', 'Robyantono', '', '', 'user', 'create_a_julian_opie_style_portrait_in_illustrator_by_tastytuts-d4fytlg.jpg'),
(29, 'angga123', 'angga123@gmail.com', 'simxdion', 'Angga L', '', '', 'user', 'default.jpg'),
(30, 'angga', 'welopes25@yahoocom', 'angga', 'Aswe', '', '', 'belum', 'default.jpg'),
(31, 'Test34', 'rusakbokep@yahoo.co.id', '123456', 'Test34', '', '', 'user', 'default.jpg'),
(32, 'dionnn123', 'dionreddyz@gmail.com', 'simxdion123', 'Diwaidiawidaw', '', '', 'user', 'default.jpg'),
(33, 'dion1st', 'dion1st@gmail.com', 'simxdion123', 'Dion 1st', 'Bondowoso,Indonesia', 'Aku newbie ingin belajar', 'banned', 'wamiwwaroo.jpg'),
(34, 'qiqik123', 'qiqik123@gmail.com', 'simxdion123', 'QQ', 'bondowoso', 'Qqi orang indonesia', 'user', 'kurt-cobain-suicide-note.jpg'),
(35, 'abdee', 'abdee@gmail.com', 'simxdion123', 'Abdee', '', '', 'user', 'default.jpg'),
(39, 'erisdsr', 'erisdsr@gmail.com', 'simxdion', 'Eris', 'bondowos,indonesia', 'hanya user awam gan !', 'user', 'adawd_2016_02_15_15_10_04.jpg'),
(37, 'thug280', 'razorblack28@gmail.com', 'kenari28', 'Thug280', '', '', 'user', 'default.jpg'),
(40, 're riski', 'asdjh@yahoo.com', 'dionganteng', 'Re Art', '', '', 'user', 'Asnsns_2016_02_15_13_19_23.jpg'),
(43, 'awdmawkmdawk', 'dwakmdaw@gmail.com', 'dmkwamdkawm', 'Dwamkdmaw', '', '', 'admin', 'default.jpg'),
(44, 'anggara', 'dmawkmdawk@gmail.com', 'awmdkwam', 'Mdwakmdaw', '', '', 'admin', 'default.jpg'),
(45, 'awdawndajawd', 'djnwjnda@gmail.com', 'ndawjdnawj', 'Mdwkamdw', '', '', 'user', 'default.jpg'),
(46, 'admwakmdakw', 'mdwkm@gmail.com', 'kmdk', 'Mdwakdmaw', '', '', 'user', 'default.jpg'),
(47, 'admin2', 'admin2@gmail.com', 'admin2', 'Admin2', '', '', 'admin', 'default.jpg'),
(48, 'surya123', 'surya', 'surya123', '', '', '', 'user', 'default.jpg'),
(49, 'makdmakw', 'dwmakdmaw', 'mdkwamkdwam', 'Wkmdkam', '', '', 'admin', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD UNIQUE KEY `id_image` (`id_image`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
