-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2019 pada 10.06
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basasunda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `color` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `label`, `color`) VALUES
(1, 'Numbers', 'FD8E09'),
(2, 'Family Members', '379237'),
(3, 'Colors', '8800A0'),
(4, 'Phrases', '16AFCA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `word`
--

CREATE TABLE `word` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `sunda` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `word`
--

INSERT INTO `word` (`id`, `cat_id`, `label`, `sunda`, `image`) VALUES
(1, 1, 'one', 'hiji', 'number_one.png'),
(2, 1, 'two', 'dua', 'number_two.png'),
(3, 1, 'three', 'tilu', 'number_three.png'),
(4, 1, 'four', 'opat', 'number_four.png'),
(5, 1, 'five', 'lima', 'number_five.png'),
(6, 1, 'six', 'genep', 'number_six.png'),
(7, 1, 'seven', 'tujuh', 'number_seven.png'),
(8, 1, 'eight', 'dalapan', 'number_eight.png'),
(9, 1, 'nine', 'salapan', 'number_nine.png'),
(10, 1, 'ten', 'sapuluh', 'number_ten.png'),
(11, 2, 'father', 'bapa', 'family_father.png'),
(12, 2, 'mother', 'ema', 'family_mother.png'),
(13, 2, 'son', 'putra', 'family_son.png'),
(14, 2, 'daughter', 'putri', 'family_daughter.png'),
(15, 2, 'older brother', 'lanceuk pamegeut', 'family_older_brother.png'),
(16, 2, 'younger brother', 'adi pamegeut', 'family_younger_brother.png'),
(17, 2, 'older sister', 'lanceuk isteri', 'family_older_sister.png'),
(18, 2, 'younger sister', 'adi isteri', 'family_younger_sister.png'),
(19, 2, 'grandmother', 'aki', 'family_grandmother.png'),
(20, 2, 'grandfather', 'nini', 'family_grandfather.png'),
(21, 3, 'red', 'beureum', 'color_red.png'),
(22, 3, 'green', 'hejo', 'color_green.png'),
(23, 3, 'brown', 'coklat', 'color_brown.png'),
(24, 3, 'gray', 'kulawu', 'color_gray.png'),
(25, 3, 'black', 'hideung', 'color_black.png'),
(26, 3, 'white', 'bodas', 'color_white.png'),
(27, 3, 'dusty yellow', 'koneng ngora', 'color_dusty_yellow.png'),
(28, 3, 'mustard yellow', 'koneng kolot', 'color_mustard_yellow.png'),
(29, 4, 'Where are you going?', 'Bade angkat kamana?', ''),
(30, 4, 'What is your name?', 'Saha nami anjeun?', ''),
(31, 4, 'My name is...', 'Nami abdi...', ''),
(32, 4, 'How are you feeling?', 'Kumaha karaosna ku anjeun?', ''),
(33, 4, 'I\'m feeling good.', 'Abdi ngaraos sae.', ''),
(34, 4, 'Are you coming?', 'Anjeun bade dongkap?', ''),
(35, 4, 'Yes, I\'m coming.', 'Sumuhun, abdi bade dongkap.', ''),
(36, 4, 'I\'m coming.', 'Abdi dongkap.', ''),
(37, 4, 'Let\'s go.', 'Hayu.', ''),
(38, 4, 'Come here.', 'Kadieu.', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `word`
--
ALTER TABLE `word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
