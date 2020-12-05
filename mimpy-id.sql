-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2020 pada 17.14
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mimpy-id`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@mimpy.id', '$2y$10$88LAJDLu0YWSugo507D.S.r1joSpTktUrfh2fuEL/dPduj.86tZzW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `id` int(11) NOT NULL,
  `idPelamar` int(11) NOT NULL,
  `idLoker` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji` int(11) NOT NULL,
  `suratLamaran` text NOT NULL,
  `status` int(11) NOT NULL,
  `pesanPerusahaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `idPerusahaan` int(11) NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `lulusan` varchar(50) NOT NULL,
  `jobdesk` varchar(100) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `idPelamar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`idPelamar`, `nama`, `email`, `telp`, `gender`, `alamat`, `password`) VALUES
(1, 'Hairul Lana', 'hairul@gmail.com', '083119526456', '', 'Jl. Raya Sengkidu, Manggis, Karangasem, Bali', '$2y$10$6ryeKJNcUmUklofGDha40ORU5ST1dk1DlNhyKA9Xbv.AgLpYQ5o2a'),
(2, 'Derwi Rainord', 'derwi@gmail.com', '087756432566', 'wanita', 'Jl. Merdeka, Bandung, Jawa Barat', '$2y$10$n.SnHTgxlzI3h3aEKoy3m./GKGlm.pZhJoqFhOvxmtYmolRRVuoli'),
(3, 'Febri Wira Pratama', 'febri@gmail.com', '087756432566', 'pria', 'Jl. Danau Tempe, Medan, Sumatera Utara', '$2y$10$6l5bXgBxlPAbjvSzWIepmuKsZLJ91uuCRLE6QRezld7eZf1/4sB5C'),
(4, 'Arya Dwisada', 'sada@gmail.com', '087756432566', 'pria', 'Jl. Miangas, Jakarta Selatan,  Jakarta', '$2y$10$EX39yJhHv0nU8eDGnhkn..LQCH4JKuMvRMcuto9eS9ulkRvKTPlXe'),
(5, 'Farin Istighfarizky', 'farin@gmail.com', '087756432566', 'wanita', 'Jl. Madrasah, Yogyakarta, Yogyakarta', '$2y$10$SGDTPOAxGcUfQ4ycwPIpWuCS/GUDnm3fOW3vanAm32Tagc9C3TlM6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `email`, `telp`, `kota`, `alamat`, `deskripsi`, `password`) VALUES
(1, 'PT. Hairul Lana', 'hairullana@gmail.com', '082215215399', 'Surabaya', '', '', '$2y$10$sEKoaBS8uNnUNGlbpjWi0.VPe.xWN6Un4OyKYRrXremC9lbW9r7HS'),
(2, 'PT. Derwi Rainord', 'derwirainord@gmail.com', '087767894521', 'Rote', 'Jl. Mawar No 99, Rote, Nusa Tenggara Timur', 'PT. Derwi Rainord merupakan perusahaan yang bergerak di bidang fashion dalam pembuatan baju batik dengan skala pemasaran Internasional', '$2y$10$UWsNGlGB/i0ci8x4Y56Zwe2Zqu4R9ml2kcpPCDSk/hy6UCE4wle8.'),
(3, 'PT. Farin', 'farinistighfarizky@gmail.com', '083213578424', 'Denpasar', 'Jl. Gatot Subroto No 99, Denpasar, Bali', 'PT. Farin merupakan perusahaan yang bergerak di bidang penjualan barang elektronik yang memiliki pusat di Denpasar, Bali', '$2y$10$KBFp5yKA25EgeZJsERaucOGOYe7h.Dz03d4YUys3TEZKfKpXzCYjS'),
(4, 'PT. Arya Dwisada', 'aryadwisada@gmail.com', '085234186537', 'Karangasem', 'Jl. Karangasem No 99, Karangasem, Bali', 'PT. Arya Dwisada merupakan sebuah perusahaan yang bergerak di bidang pariwisata di wilayah Bali. Memiliki rating 10/5 sehingga pelanggan dijamin puas bosku', '$2y$10$5RJ5ev71l5slU2E8J7uFMOHqfsLPVuW7Ht9wA/X5nwC0q.CS9bEjm'),
(5, 'PT. Febri Wira', 'febriwira@gmail.com', '089764627452', 'Badung', 'Jl. Melati No 99, Badung, Bali', 'PT. Febri Wira merupakan perusahaan yang bergerak di bidang Design Grafis seperti pembuatan logo, iklan, banner, dan sebagainya', '$2y$10$/.mWAnSzMaKJviq84RaTtO2bExdUv1dfJptxpgxVpYk2sVt.pixDu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`idPelamar`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `idPelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
