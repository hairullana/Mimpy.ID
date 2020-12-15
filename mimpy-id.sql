-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2020 pada 18.25
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
('admin@mimpy.id', '$2y$10$IVr3phknKlrxhmaKlrWbUuZDpHrYsomFKBZrcJr2tg0NzpxDIpgEi');

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
  `status` varchar(25) NOT NULL,
  `pesanPerusahaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lamaran`
--

INSERT INTO `lamaran` (`id`, `idPelamar`, `idLoker`, `tanggal`, `gaji`, `suratLamaran`, `status`, `pesanPerusahaan`) VALUES
(3, 2, 7, '2020-12-12', 5000000, 'Kepada Yth. Bapak/ Ibu Pimpinan PT. Arya Dwisada\r\nDengan hormat,\r\n\r\nDengan ini saya, Derwi Rainord ingin mengajukan lamaran kerja di PT. Arya Dwisada sebagai “Manager”.\r\nSaya memiliki semangat kerja yang tinggi dan ingin berkembang.\r\nSaya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.\r\nSebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).\r\nTerima Kasih.', 'Ditolak', ''),
(6, 3, 4, '2020-12-15', 2500000, 'Kepada Yth. Bapak/ Ibu Pimpinan PT. Hairul Lana\r\nDengan hormat,\r\n\r\nDengan ini saya, Febri Wira Pratama ingin mengajukan lamaran kerja di PT. Hairul Lana sebagai “Akunting”.\r\nSaya memiliki semangat kerja yang tinggi dan ingin berkembang.\r\nSaya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.\r\nSebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).\r\nTerima Kasih.', 'Diterima', 'Kepada yth.\r\nSaudara Febri Wira Pratama\r\nDi Jl. Danau Tempe, Medan, Sumatera Utara\r\n\r\nDengan hormat,\r\nSehubungan dengan lamaran yang telah diajukan saudari dan kami terima pada tanggal 2020-12-15 maka saudara dinyatakan memenuhi syarat administrasi sebagai pelamar kerja di perusahaan kami dan kami mengharapkan kedatangan saudari untuk melakukan tes wawancara kerja di perusahaan kami. Oleh karenanya diharapkan kedatangan saudari di Kantor Pusat pada:\r\n\r\nTanggal               : 01 Januari 2020\r\nWaktu                  : 12.00 WITA\r\nTempat                : Kantor Perusahaan\r\n\r\nDemikian surat ini kami sampaikan. Atas partisipasi dan kedatangan saudari kami mengucapkan terimakasih.\r\n'),
(8, 1, 10, '2020-12-15', 15000000, 'Kepada Yth. Bapak/ Ibu Pimpinan PT. Derwi Rainord\r\nDengan hormat,\r\n\r\nDengan ini saya, Hairul Lana ingin mengajukan lamaran kerja di PT. Derwi Rainord sebagai “Data Scientist”.\r\nSaya memiliki semangat kerja yang tinggi dan ingin berkembang.\r\nSaya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.\r\nSebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).\r\nTerima Kasih.', 'Diterima', 'Kepada yth.\r\nSaudara Hairul Lana\r\nDi Jl. Raya Sengkidu, Manggis, Karangasem, Bali\r\n\r\nDengan hormat,\r\nSehubungan dengan lamaran yang telah diajukan saudari dan kami terima pada tanggal 2020-12-15 maka saudara dinyatakan memenuhi syarat administrasi sebagai pelamar kerja di perusahaan kami dan kami mengharapkan kedatangan saudari untuk melakukan tes wawancara kerja di perusahaan kami. Oleh karenanya diharapkan kedatangan saudari di Kantor Pusat pada:\r\n\r\nHari dan tanggal : \r\nWaktu                  : \r\nTempat                : \r\n\r\nDemikian surat ini kami sampaikan. Atas partisipasi dan kedatangan saudari kami mengucapkan terimakasih.\r\n'),
(9, 4, 12, '2020-12-15', 2500000, 'Kepada Yth. Bapak/ Ibu Pimpinan PT. Derwi Rainord\r\nDengan hormat,\r\n\r\nDengan ini saya, Arya Dwisada ingin mengajukan lamaran kerja di PT. Derwi Rainord sebagai “Customer Service”.\r\nSaya memiliki semangat kerja yang tinggi dan ingin berkembang.\r\nSaya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.\r\nSebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).\r\nTerima Kasih.', 'Menunggu', ''),
(10, 4, 10, '2020-12-15', 5500000, 'Kepada Yth. Bapak/ Ibu Pimpinan PT. Derwi Rainord\r\nDengan hormat,\r\n\r\nDengan ini saya, Arya Dwisada ingin mengajukan lamaran kerja di PT. Derwi Rainord sebagai “Data Scientist”.\r\nSaya memiliki semangat kerja yang tinggi dan ingin berkembang.\r\nSaya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.\r\nSebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).\r\nTerima Kasih.', 'Menunggu', ''),
(11, 4, 7, '2020-12-15', 5000000, 'Kepada Yth. Bapak/ Ibu Pimpinan PT. Arya Dwisada\r\nDengan hormat,\r\n\r\nDengan ini saya, Arya Dwisada ingin mengajukan lamaran kerja di PT. Arya Dwisada sebagai “Manager”.\r\nSaya memiliki semangat kerja yang tinggi dan ingin berkembang.\r\nSaya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.\r\nSebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).\r\nTerima Kasih.', 'Menunggu', ''),
(12, 4, 2, '2020-12-15', 2500000, 'Kepada Yth. Bapak/ Ibu Pimpinan PT. Hairul Lana\r\nDengan hormat,\r\n\r\nDengan ini saya, Arya Dwisada ingin mengajukan lamaran kerja di PT. Hairul Lana sebagai “Cleaning Service”.\r\nSaya memiliki semangat kerja yang tinggi dan ingin berkembang.\r\nSaya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.\r\nSebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).\r\nTerima Kasih.', 'Menunggu', '');

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
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id`, `idPerusahaan`, `posisi`, `lulusan`, `jobdesk`, `keterangan`, `status`) VALUES
(2, 1, 'Cleaning Service', 'SMP', 'Membersihkan gedung perusahaan sampai bersih', 'DIbutuhkan cleaning service minimal lulusan SMP dengan sifat sopan dan jujur !', 'Aktif'),
(4, 1, 'Akunting', 'D3', 'Menghitung segala pengeluaran dan pemasukan perusahaan dan membuat laporan mingguan', 'Dicari seorang akunting lulusan minimal D3. Fresh Graduate welcome, diutamakan perempuan berdomisili Kota Surabaya\r\n', 'Tidak Aktif'),
(7, 4, 'Manager', 'S2', 'Menyelesaikan dan mengevaluasi kinerja staf dengan berkomunikasi, perencanaan, monitoring, dan menil', 'Dicari manager dengan minimal pendidikan S2 dengan pengalaman minimal 2 tahun. Diutamakan domisili Denpasar', 'Aktif'),
(8, 3, 'Koki', 'SMA', 'Memasak lah bambang', 'Diutamakan cewe karena kalau cowok kerjanya kotor dan males nyuci piring.\r\nDah gitu aja.', 'Aktif'),
(10, 2, 'Data Scientist', 'S3', 'Melakukan analisis data', 'Minimal S3 Informatika. Titik!', 'Tidak Aktif'),
(11, 2, 'Sales', 'SMA', 'Memasarkan Produk', 'Diutamakan perempuan gak perlu good looking, yang penting good attitude', 'Aktif'),
(12, 2, 'Customer Service', 'SMA', 'Melayani konsumen', 'Yang ramah aja yang boleh ngelamar ya beb', 'Aktif'),
(13, 2, 'Human Resources Development', 'S1', 'Ya pokoknya gitu lah', 'Minimal pengalaman 2 tahun', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `cv` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id`, `nama`, `email`, `telp`, `gender`, `alamat`, `cv`, `password`) VALUES
(1, 'Hairul Lana', 'hairul@gmail.com', '083119526456', 'pria', 'Jl. Raya Sengkidu, Manggis, Karangasem, Bali', 'cv1.jpg', '$2y$10$6ryeKJNcUmUklofGDha40ORU5ST1dk1DlNhyKA9Xbv.AgLpYQ5o2a'),
(2, 'Derwi Rainord', 'derwi@gmail.com', '087756432566', 'wanita', 'Jl. Merdeka, Bandung, Jawa Barat', 'cv2.jpeg', '$2y$10$n.SnHTgxlzI3h3aEKoy3m./GKGlm.pZhJoqFhOvxmtYmolRRVuoli'),
(3, 'Febri Wira Pratama', 'febri@gmail.com', '087756432566', 'pria', 'Jl. Danau Tempe, Medan, Sumatera Utara', 'cv3.jpeg', '$2y$10$6l5bXgBxlPAbjvSzWIepmuKsZLJ91uuCRLE6QRezld7eZf1/4sB5C'),
(4, 'Arya Dwisada', 'sada@gmail.com', '087756432566', 'pria', 'Jl. Miangas, Jakarta Selatan,  Jakarta', 'cv4.jpeg', '$2y$10$EX39yJhHv0nU8eDGnhkn..LQCH4JKuMvRMcuto9eS9ulkRvKTPlXe'),
(5, 'Farin Istighfarizky', 'farin@gmail.com', '087756432566', 'wanita', 'Jl. Madrasah, Yogyakarta, Yogyakarta', 'cv5.jpeg', '$2y$10$SGDTPOAxGcUfQ4ycwPIpWuCS/GUDnm3fOW3vanAm32Tagc9C3TlM6');

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
  `foto` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `email`, `telp`, `kota`, `alamat`, `deskripsi`, `foto`, `password`) VALUES
(1, 'PT. Hairul Lana', 'hairullana@gmail.com', '083119526456', 'Surabaya', 'Jl. Nusantara No 99, Surabaya', 'PT. Hairul Lana merupakan perusahaan yang bergerak di bidang Network Security', 'perusahaan1.jpg', '$2y$10$hyo/lbc0Kc3qAaUOfciRvOf2r7wSiyWq1zYeZVkxNGIu1Hsbu8M3W'),
(2, 'PT. Derwi Rainord', 'derwirainord@gmail.com', '087767894521', 'Rote', 'Jl. Mawar No 99, Rote, Nusa Tenggara Timur', 'PT. Derwi Rainord merupakan perusahaan yang bergerak di bidang fashion dalam pembuatan baju batik dengan skala pemasaran Internasional', 'perusahaan2.jpg', '$2y$10$UWsNGlGB/i0ci8x4Y56Zwe2Zqu4R9ml2kcpPCDSk/hy6UCE4wle8.'),
(3, 'PT. Farin', 'farinistighfarizky@gmail.com', '083213578424', 'Denpasar', 'Jl. Gatot Subroto No 99, Denpasar, Bali', 'PT. Farin merupakan perusahaan yang bergerak di bidang penjualan barang elektronik yang memiliki pusat di Denpasar, Bali', 'default.png', '$2y$10$KBFp5yKA25EgeZJsERaucOGOYe7h.Dz03d4YUys3TEZKfKpXzCYjS'),
(4, 'PT. Arya Dwisada', 'aryadwisada@gmail.com', '085234186537', 'Karangasem', 'Jl. Karangasem No 99, Karangasem, Bali', 'PT. Arya Dwisada merupakan sebuah perusahaan yang bergerak di bidang pariwisata di wilayah Bali. Memiliki rating 10/5 sehingga pelanggan dijamin puas bosku', 'default.png', '$2y$10$5RJ5ev71l5slU2E8J7uFMOHqfsLPVuW7Ht9wA/X5nwC0q.CS9bEjm'),
(5, 'PT. Febri Wira', 'febriwira@gmail.com', '089764627452', 'Badung', 'Jl. Melati No 99, Badung, Bali', 'PT. Febri Wira merupakan perusahaan yang bergerak di bidang Design Grafis seperti pembuatan logo, iklan, banner, dan sebagainya', 'default.png', '$2y$10$/.mWAnSzMaKJviq84RaTtO2bExdUv1dfJptxpgxVpYk2sVt.pixDu');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
