-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 05:13 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(11) NOT NULL,
  `nik_anak` varchar(16) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `ibu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `nik_anak`, `nama_anak`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `ibu_id`) VALUES
(1, '', 'Audrey Nixie Aribah Santoso', 'Karawang', '2012-06-06', 'Perempuan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bidan`
--

CREATE TABLE `bidan` (
  `id_bidan` int(11) NOT NULL,
  `nama_bidan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `pendidikan_terakhir` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidan`
--

INSERT INTO `bidan` (`id_bidan`, `nama_bidan`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `pendidikan_terakhir`, `user_id`) VALUES
(1, 'Lutfiana', 'Jakarta', '1999-01-01', '0812000011213', 'SMA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ibu`
--

CREATE TABLE `ibu` (
  `id_ibu` int(11) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol_dar` varchar(2) NOT NULL,
  `pendidikan` enum('Tidak Sekolah','SD','SMP','SMA','SMK','Perguruan Tinggi') NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `nama_suami` varchar(50) NOT NULL,
  `tempat_lahir_suami` varchar(30) NOT NULL,
  `tgl_lahir_suami` date NOT NULL,
  `pendidikan_suami` enum('Tidak Sekolah','SD','SMP','SMA','SMK','Perguruan Tinggi') NOT NULL,
  `pekerjaan_suami` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibu`
--

INSERT INTO `ibu` (`id_ibu`, `nama_ibu`, `tempat_lahir`, `tgl_lahir`, `gol_dar`, `pendidikan`, `pekerjaan`, `nama_suami`, `tempat_lahir_suami`, `tgl_lahir_suami`, `pendidikan_suami`, `pekerjaan_suami`, `alamat`, `kecamatan`, `kota`, `no_tlp`) VALUES
(2, 'Linda', 'Karawang', '1987-09-20', 'O', 'SMA', 'Ibu Rumah Tangga', 'Waluyu Santoso', 'Blora', '1985-03-08', 'SMK', 'Karyawan Swasta', 'Jl. Sukapura Jaya RT 04/010', 'Cilincing', 'Jakarta Utara', '');

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `ibu_id` int(11) NOT NULL,
  `tgl_skrng` date NOT NULL,
  `usia` int(11) NOT NULL,
  `imunisasi` varchar(30) NOT NULL,
  `vit_a` enum('Merah','Biru') NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id_imunisasi`, `anak_id`, `tgl_lahir`, `jenis_kelamin`, `ibu_id`, `tgl_skrng`, `usia`, `imunisasi`, `vit_a`, `ket`) VALUES
(1, 1, '2012-06-06', 'Perempuan', 2, '2019-02-12', 84, 'flu', 'Merah', ''),
(3, 1, '2012-06-06', 'Perempuan', 2, '2021-02-12', 108, 'flu', 'Merah', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `date_time`) VALUES
(1, '2021-01-30 10:23:29'),
(1, '2021-01-30 10:34:46'),
(1, '2021-01-30 10:43:56'),
(1, '2021-01-31 02:28:21'),
(1, '2021-01-31 03:22:35'),
(1, '2021-01-31 09:10:44'),
(1, '2021-01-31 09:26:10'),
(1, '2021-01-31 09:29:54'),
(1, '2021-01-31 09:30:32'),
(1, '2021-02-03 01:44:40'),
(1, '2021-02-05 07:31:28'),
(2, '2021-02-07 11:30:13'),
(1, '2021-02-07 12:51:05'),
(2, '2021-02-07 01:55:44'),
(1, '2021-02-07 01:56:42'),
(1, '2021-02-07 02:20:01'),
(2, '2021-02-07 02:26:00'),
(2, '2021-02-07 05:10:55'),
(1, '2021-02-07 05:12:08'),
(2, '2021-02-07 05:20:27'),
(1, '2021-02-07 05:21:00'),
(1, '2021-02-07 08:28:31'),
(1, '2021-02-07 09:37:56'),
(1, '2021-02-11 03:17:12'),
(1, '2021-02-11 03:21:59'),
(1, '2021-02-11 09:34:17'),
(1, '2021-02-11 09:50:11'),
(1, '2021-02-12 07:32:48'),
(1, '2021-02-12 10:15:28'),
(1, '2021-02-12 10:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `penimbangan`
--

CREATE TABLE `penimbangan` (
  `id_penimbangan` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `ibu_id` int(11) NOT NULL,
  `tgl_skrng` date NOT NULL,
  `usia` int(11) NOT NULL,
  `bb` double NOT NULL,
  `tb` double NOT NULL,
  `deteksi` enum('Sesuai','Tidak Sesuai') NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penimbangan`
--

INSERT INTO `penimbangan` (`id_penimbangan`, `anak_id`, `tgl_lahir`, `jenis_kelamin`, `ibu_id`, `tgl_skrng`, `usia`, `bb`, `tb`, `deteksi`, `ket`) VALUES
(1, 1, '2012-06-06', 'Perempuan', 2, '2021-02-05', 106, 4, 4, 'Sesuai', ''),
(3, 1, '2012-06-06', 'Perempuan', 2, '2019-01-11', 84, -4, 5, 'Sesuai', ''),
(4, 1, '2012-06-06', 'Perempuan', 2, '2019-01-11', 84, -4, 5, 'Sesuai', ''),
(5, 1, '2012-06-06', 'Perempuan', 2, '2021-02-12', 108, 9.5, 64, 'Sesuai', '');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jabatan` enum('Ketua','Bendahara','Sekretaris','Anggota') NOT NULL,
  `pendidikan_terakhir` varchar(30) NOT NULL,
  `lama_kerja` int(11) NOT NULL,
  `tugas_pokok` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `jabatan`, `pendidikan_terakhir`, `lama_kerja`, `tugas_pokok`, `user_id`) VALUES
(1, 'Putri Nugraheni', 'Jakarta', '1999-07-09', '0831300091232', 'Ketua', 'SMA', 5, 'Mengkoordinir semua kegiatan dan organisasi dalam posyandu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_users`, `name`, `username`, `image`, `password`, `level_id`, `is_active`, `date_created`) VALUES
(1, 'Putri Nugraheni', 'punug', 'Fine-Day-Press-Wallpaper3A.jpg', 'qwerty', 1, 1, 0),
(2, 'Lutfiana', 'fia', 'icon-02.png', 'qwerty', 2, 1, 111);

-- --------------------------------------------------------

--
-- Table structure for table `users_level`
--

CREATE TABLE `users_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_level`
--

INSERT INTO `users_level` (`id_level`, `level`) VALUES
(1, 'Petugas'),
(2, 'Bidan'),
(3, 'Ibu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`),
  ADD UNIQUE KEY `ibu_id` (`ibu_id`);

--
-- Indexes for table `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`id_bidan`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `ibu`
--
ALTER TABLE `ibu`
  ADD PRIMARY KEY (`id_ibu`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`);

--
-- Indexes for table `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD PRIMARY KEY (`id_penimbangan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `level_id` (`level_id`);

--
-- Indexes for table `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidan`
--
ALTER TABLE `bidan`
  MODIFY `id_bidan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ibu`
--
ALTER TABLE `ibu`
  MODIFY `id_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penimbangan`
--
ALTER TABLE `penimbangan`
  MODIFY `id_penimbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_level`
--
ALTER TABLE `users_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
