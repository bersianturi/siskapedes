-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 07:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siskapedes`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(5) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `alamat_desa` varchar(250) NOT NULL,
  `id_kecamatan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `alamat_desa`, `id_kecamatan`) VALUES
(1, 'Desa A', '-', 1),
(2, 'Desa B', '-', 2),
(3, 'Desa C', '-', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `hak_akses` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'Admin', 1),
(2, 'Dinpermasdes', 2),
(3, 'Perangkat Desa', 3),
(4, 'Super Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Kepala Desa'),
(2, 'Sekretaris Desa'),
(3, 'Kasi Pemerintahan'),
(4, 'Kasi Kesejahteraan'),
(5, 'Kasi Pelayanan'),
(6, 'Kaur Tata Usaha dan Umum'),
(7, 'Kaur Keuangan'),
(8, 'Kaur Perencanaan'),
(9, 'Kepala Dusun I'),
(10, 'Kepala Dusun II'),
(11, 'Kepala Dusun III'),
(12, 'Kepala Dusun IV');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(5) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `alamat_kecamatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `alamat_kecamatan`) VALUES
(1, 'Kecamatan A', '-'),
(2, 'Kecamatan B', '-'),
(3, 'Kecamatan C', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(5) NOT NULL,
  `tingkat_pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `tingkat_pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA/SMK'),
(4, 'Diploma III'),
(5, 'Diploma IV'),
(6, 'Sarjana'),
(7, 'Magister'),
(8, 'Doktor');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desa`
--

CREATE TABLE `perangkat_desa` (
  `id_perangkat` int(100) NOT NULL,
  `nama_perangkat` varchar(250) NOT NULL,
  `gelar_depan` varchar(100) NOT NULL,
  `gelar_belakang` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya') NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `no_pengangkatan` int(200) NOT NULL,
  `tgl_pengangkatan` date NOT NULL,
  `no_pemberhentian` int(200) NOT NULL,
  `tgl_pemberhentian` date NOT NULL,
  `jabatan` enum('Badan Permusyawaratan Desa','Kepala Desa','Sekretaris Desa','Kasi Pemerintahan','Kasi Kesejahteraan','Kasi Pelayanan','Kaur Tata Usaha dan Umum','Kaur Keuangan','Kaur Perencanaan','Kepala Dusun I','Kepala Dusun II','Kepala Dusun III','Kepala Dusun IV','Lainnya') NOT NULL,
  `masa_jabatan` varchar(100) NOT NULL,
  `status` enum('Aktif','Non-Aktif') NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` int(2) NOT NULL,
  `id_desa` int(5) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `verifikasi_data` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perangkat_desa`
--

INSERT INTO `perangkat_desa` (`id_perangkat`, `nama_perangkat`, `gelar_depan`, `gelar_belakang`, `nik`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `pendidikan`, `agama`, `pangkat`, `no_pengangkatan`, `tgl_pengangkatan`, `no_pemberhentian`, `tgl_pemberhentian`, `jabatan`, `masa_jabatan`, `status`, `password`, `hak_akses`, `id_desa`, `photo`, `verifikasi_data`) VALUES
(1, 'Contoh Perangkat ', 'Ir. ', 'M.Kom', '1234567891098765', 'Purbalingga', '2002-12-07', 'Perempuan', 'Sarjana', 'Islam', 'tidak ada', 1, '2020-09-01', 1, '2023-09-01', 'Kaur Perencanaan', '5 tahun', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1, 'pegawai-231030-04ca6f84b1.png', 'belum_disetujui'),
(4, 'Admin Desa', 'none', 'none', '56789', 'Purbalingga', '2002-07-04', 'Laki-laki', 'SD', 'Islam', 'admin', 56789, '2023-08-16', 56789, '2023-09-08', 'Kasi Kesejahteraan', '5 tahun', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2, 'default.png', 'ditolak'),
(8, 'Lalila', 'Ir', 'M.Kom', '112233', 'Jakarta', '2002-09-07', 'Perempuan', 'SD', 'Islam', 'none', 2, '2023-09-20', 2, '2023-09-27', 'Kasi Pelayanan', '5 Tahun', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 2, 3, 'default.png', 'disetujui'),
(10, 'amalina', 'Test', 'Test', '9876', 'Padamara', '2003-10-07', 'Perempuan', 'SD', 'Islam', 'test', 1, '2023-10-12', 1, '2023-10-26', 'Kaur Tata Usaha dan Umum', '5 Tahun', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1, 'default.png', 'disetujui'),
(11, 'Ber', 'Test', 'Test', '2147483647', 'Purbalingga', '2023-10-03', 'Laki-laki', 'SD', 'Lainnya', '', 1, '2023-10-03', 1, '2023-10-11', 'Kasi Kesejahteraan', '5 Tahun', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(12, 'Bambang Wibowo', '', '', '3303041908680001', 'Purbalingga', '1967-08-19', 'Laki-laki', 'SMA/SMK', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kepala Desa', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(13, 'Suswati', '', '', '3303046110740001', 'Purbalingga', '1974-10-21', 'Perempuan', 'SMA/SMK', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Sekretaris Desa', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(14, 'Nur Hikmah', '', '', '3303046203920001', 'Purbalingga', '1992-03-22', 'Perempuan', 'Diploma IV', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kasi Pemerintahan', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(15, 'Irawan Adhi Nur Cahyo', '', '', '3303040901810001', 'Purbalingga', '1981-01-09', 'Laki-laki', 'SMA/SMK', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kasi Kesejahteraan', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(16, 'Khadiri', '', '', '3303042707690001', 'Purbalingga', '1969-11-14', 'Laki-laki', 'SMA/SMK', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kasi Pelayanan', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(17, 'Harlan Adi Supono', '', '', '3303040312830002', 'Purbalingga', '1983-12-03', 'Laki-laki', 'SMA/SMK', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kaur Perencanaan', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(18, 'Badriyah', '', '', '3303045603940001', 'Purbalingga', '1994-03-16', 'Perempuan', 'Diploma IV', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kaur Keuangan', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(19, 'Giri', '', '', '3303041712680003', 'Purbalingga', '1968-12-17', 'Laki-laki', 'SMA/SMK', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kaur Tata Usaha dan Umum', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(20, 'Feri Fajri', '', '', '3303042808870002', 'Purbalingga', '1987-08-28', 'Laki-laki', 'SMA/SMK', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kepala Dusun I', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(21, 'Windu Heri Wardoyo', '', '', '3303042001770002', 'Purbalingga', '1977-01-20', 'Laki-laki', 'SMA/SMK', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kepala Dusun III', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(22, 'Suwanto', '', '', '3303041204650001', 'Purbalingga', '1965-04-12', 'Laki-laki', 'SMP', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kepala Dusun II', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui'),
(23, 'Darsito', '', '', '3303041703670001', 'Purbalingga', '1967-03-17', 'Laki-laki', 'SMP', 'Islam', '', 0, '0000-00-00', 0, '0000-00-00', 'Kepala Dusun IV', '', 'Aktif', '827ccb0eea8a706c4c34a16891f84e7b', 3, 0, 'default.png', 'disetujui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  ADD PRIMARY KEY (`id_perangkat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  MODIFY `id_perangkat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
