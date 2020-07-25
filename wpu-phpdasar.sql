-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Jul 2020 pada 09.50
-- Versi server: 10.5.4-MariaDB-log
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu-phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` char(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `gambar`, `nama`, `nis`, `email`, `jurusan`) VALUES
(20, '5f1bdc77bc110.JPG', 'Achmad Rifqi', '10235', 'rifqi@gmail.com', 'Rekayasa Perangkat Lunak'),
(21, '5f1bdce24c2a4.JPG', 'Adi Pratama', '10236', 'adi@gmail.com', 'Rekayasa Perangkat Lunak'),
(22, '5f1bdcf9e1319.JPG', 'Ahmad Romadhoni', '10238', 'gayem@gmail.com', 'Rekayasa Perangkat Lunak'),
(23, '5f1bdd11e4498.JPG', 'Ammar Abdullah', '10239', 'amar@gmail.com', 'Rekayasa Perangkat Lunak'),
(24, '5f1bdd330da8d.JPG', 'Ariefin Nugroho', '10241', 'aripin@gmai.com', 'Rekayasa Perangkat Lunak'),
(25, '5f1bdd4d44feb.JPG', 'Bayu Aji', '10243', 'bayu@gmail.com', 'Rekayasa Perangkat Lunak'),
(26, '5f1bdd6e37231.JPG', 'Edo Yudha Waskita', '10244', 'edo@gmail.com', 'Rekayasa Perangkat Lunak'),
(27, '5f1bdd8b61222.JPG', 'Fadhli Fadillah', '10246', 'fadhli12er@gmail.com', 'Rekayasa Perangkat Lunak'),
(28, '5f1bddb4c7f78.JPG', 'Muhamad Akhsin Prasetyo', '10249', 'aksin@gmail.com', 'Rekayasa Perangkat Lunak'),
(29, '5f1bddcc67aa3.JPG', 'Matius', '10250', 'matius@gmail.com', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` char(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$N./hd5.ABKBVQWc.p.wtUeWilzsNCVQ2LbLSpy4ZXJxR0eWnlJoXS'),
(3, 'kiko', '$2y$10$3WxxHB786wJ/IQ3uagmIZ.MqbzIh9ys.Jv.gXD4FQB8wIlqiMMGgu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
