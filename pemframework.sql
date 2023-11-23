-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Nov 2023 pada 16.22
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemframework`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `okky_genre_lagu`
--

CREATE TABLE `okky_genre_lagu` (
  `idGenre` int(11) NOT NULL,
  `namaGenre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `okky_genre_lagu`
--

INSERT INTO `okky_genre_lagu` (`idGenre`, `namaGenre`) VALUES
(1, 'Pop'),
(2, 'Pop Punk'),
(3, 'Dangdut'),
(4, 'Rock'),
(5, 'Reggae');

-- --------------------------------------------------------

--
-- Struktur dari tabel `okky_lagu`
--

CREATE TABLE `okky_lagu` (
  `idLagu` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penyanyi` varchar(255) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `genre` int(11) NOT NULL,
  `album` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `okky_lagu`
--

INSERT INTO `okky_lagu` (`idLagu`, `judul`, `penyanyi`, `tahun`, `genre`, `album`, `durasi`) VALUES
(1, 'Ada aku disini', 'Dhyo Haw', '2015', 5, 'Ada aku disini', '300'),
(2, 'Cobalah Mengerti', 'Noah', '2010', 1, 'Cobalah Mengerti', '297'),
(3, 'Kita Lawan Mereka', 'Stand Here Alone', '2017', 2, '-', '256');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `okky_genre_lagu`
--
ALTER TABLE `okky_genre_lagu`
  ADD PRIMARY KEY (`idGenre`),
  ADD UNIQUE KEY `idGenre` (`idGenre`);

--
-- Indeks untuk tabel `okky_lagu`
--
ALTER TABLE `okky_lagu`
  ADD PRIMARY KEY (`idLagu`),
  ADD KEY `genre` (`genre`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `okky_genre_lagu`
--
ALTER TABLE `okky_genre_lagu`
  MODIFY `idGenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `okky_lagu`
--
ALTER TABLE `okky_lagu`
  MODIFY `idLagu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `okky_lagu`
--
ALTER TABLE `okky_lagu`
  ADD CONSTRAINT `genreToid` FOREIGN KEY (`genre`) REFERENCES `okky_genre_lagu` (`idGenre`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
