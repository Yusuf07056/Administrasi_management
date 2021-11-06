-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 06.38
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_kariyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_role`
--

CREATE TABLE `list_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_role`
--

INSERT INTO `list_role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'kariyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
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
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `user_name`, `email`, `password`, `role_id`, `is_active`, `no_telp`, `gender`, `umur`) VALUES
(1, 'yusuf krisna novanda', 'yukrinov123@gmail.com', '$2y$10$S0Y0/mfJoy853yCUqyjfQuqwsII1i/rYDfZbEdCOsYn8RhU36qqm.', 1, 1, '08883163120', 'MALE', 21),
(2, 'muhammad ihsan nugroho', 'mihsanugi@gmail.com', '$2y$10$2f99aooYaiW6eVnwMeflXO0C6b0ln3987i1NiGqqAEZ77YEITkEVm', 1, 1, '088831631222', 'MALE', 21);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `list_role`
--
ALTER TABLE `list_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
