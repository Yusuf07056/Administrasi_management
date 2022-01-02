-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 05:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_loker`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_appointment`
--

CREATE TABLE `job_appointment` (
  `id_pelamar` int(11) NOT NULL,
  `id_regis` int(11) NOT NULL,
  `job_desk` varchar(20) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `porto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_appointment`
--

INSERT INTO `job_appointment` (`id_pelamar`, `id_regis`, `job_desk`, `perusahaan_id`, `porto`) VALUES
(3, 4, 'engineer', 1, 'KTP4.pdf'),
(4, 4, 'driver', 1, 'KK.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `list_role`
--

CREATE TABLE `list_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_role`
--

INSERT INTO `list_role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'kariyawan'),
(3, 'perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `post_information`
--

CREATE TABLE `post_information` (
  `id_post` int(11) NOT NULL,
  `judul_post` varchar(128) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `isi_post` varchar(128) NOT NULL,
  `status_post` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `jobdesk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_information`
--

INSERT INTO `post_information` (`id_post`, `judul_post`, `keyword`, `isi_post`, `status_post`, `foto`, `company_id`, `jobdesk`) VALUES
(9, 'dicari engineer', 'engineer', 'lowongan engineer gaji umr', 1, 'd5854d4d608e6e9933050686b1b997da11.jpg', 1, 'engineer'),
(10, 'cari driver barang', 'driver', 'dicari driver gaji UMR', 1, '101-1018261_stickman-sitting-on-chair-hd-png-download16.png', 1, 'driver'),
(11, 'dicari akuntan', 'akutansi', 'dicari akuntan gaji UMR', 1, '2055_U1RVRElPIFNNIDE5MjMtMDI4.jpg', 1, 'akutansi'),
(16, 'cari driver', 'driver', 'dicari driver kfc', 1, '1891585613.jpg', 1, 'driver'),
(17, 'wanted system analyst', 'system_analyst', 'dicari system analyst untuk merancang sistem koperasi', 1, 'd5854d4d608e6e9933050686b1b997da12.jpg', 888, 'system analyst');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id_registrasi` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `user_name`, `email`, `password`, `role_id`, `is_active`, `no_telp`, `gender`, `tgl_lahir`) VALUES
(1, 'yusuf krisna novanda', 'yukrinov123@gmail.com', '$2y$10$S0Y0/mfJoy853yCUqyjfQuqwsII1i/rYDfZbEdCOsYn8RhU36qqm.', 1, 1, '08883163120', 'MALE', '0000-00-00'),
(2, 'muhammad ihsan nugroho', 'mihsanugi@gmail.com', '$2y$10$2f99aooYaiW6eVnwMeflXO0C6b0ln3987i1NiGqqAEZ77YEITkEVm', 1, 1, '088831631222', 'MALE', '0000-00-00'),
(3, 'lala', 'lala@gmail.com', '$2y$10$LAa8Id/1g/GYtrTuscP9Se3uJjkg9dmOEPmCXO.ylrqRGQEmEa0mi', 2, 1, '08123456789', 'FEMALE', '0000-00-00'),
(4, 'M.ihsan', 'ihsan@gmail.com', '$2y$10$qkCmWwXGpWA4I3fgIEaJGe1.DNX5gsuUUG2ajV1cOyb9TdPUtmWcS', 2, 1, '088831631299', 'MALE', '0000-00-00'),
(5, 'root', 'admin@gmail.com', '$2y$10$HQYV0Um01H29.T2oC9GwNOgTbgLIBK5E5TOLiOpqOGepyXzGQm0Va', 1, 1, '088831631222', 'MALE', '0000-00-00'),
(6, 'Mihsan', 'Mihsan@gmail.com', '$2y$10$xiF8hQb/so.4xU0SV8x.5e/7pto7YH3G9lGmXU20Bp1LEf15wcGNW', 1, 1, '08883163210', 'MALE', '2000-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobdesk`
--

CREATE TABLE `tb_jobdesk` (
  `id` int(11) NOT NULL,
  `jobdesk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jobdesk`
--

INSERT INTO `tb_jobdesk` (`id`, `jobdesk`) VALUES
(1, 'kasir'),
(3, 'engineer'),
(5, 'kurir'),
(6, 'sekertaris'),
(7, 'driver'),
(8, 'waitress'),
(9, 'kru_kreatif'),
(10, 'AI programmer'),
(11, 'system analyst');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `nama_perusahaan`) VALUES
(1, 'unemployee'),
(888, 'infinity.inc'),
(999, 'Stan.inc');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `nama_menu`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_appointment`
--
ALTER TABLE `job_appointment`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `id_regis` (`id_regis`),
  ADD KEY `perusahaan_id` (`perusahaan_id`);

--
-- Indexes for table `list_role`
--
ALTER TABLE `list_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `post_information`
--
ALTER TABLE `post_information`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indexes for table `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_appointment`
--
ALTER TABLE `job_appointment`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_information`
--
ALTER TABLE `post_information`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_appointment`
--
ALTER TABLE `job_appointment`
  ADD CONSTRAINT `id_regis` FOREIGN KEY (`id_regis`) REFERENCES `registrasi` (`id_registrasi`),
  ADD CONSTRAINT `perusahaan_id` FOREIGN KEY (`perusahaan_id`) REFERENCES `tb_perusahaan` (`id_perusahaan`);

--
-- Constraints for table `post_information`
--
ALTER TABLE `post_information`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `tb_perusahaan` (`id_perusahaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
