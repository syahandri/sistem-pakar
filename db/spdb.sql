-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Feb 2021 pada 07.23
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblaturan`
--

CREATE TABLE `tblaturan` (
  `id_aturan` int(11) NOT NULL,
  `id_penyakit` varchar(5) NOT NULL,
  `id_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblaturan`
--

INSERT INTO `tblaturan` (`id_aturan`, `id_penyakit`, `id_gejala`) VALUES
(1, 'P01', 'G01'),
(2, 'P01', 'G02'),
(3, 'P01', 'G03'),
(4, 'P01', 'G04'),
(5, 'P02', 'G03'),
(6, 'P02', 'G05'),
(7, 'P03', 'G06'),
(8, 'P03', 'G07'),
(9, 'P03', 'G08'),
(10, 'P03', 'G09'),
(11, 'P04', 'G10'),
(12, 'P05', 'G11'),
(13, 'P05', 'G12'),
(14, 'P05', 'G13'),
(15, 'P05', 'G14'),
(16, 'P06', 'G13'),
(17, 'P06', 'G15'),
(18, 'P06', 'G16'),
(19, 'P06', 'G17'),
(20, 'P06', 'G18'),
(21, 'P07', 'G01'),
(22, 'P07', 'G19'),
(23, 'P07', 'G20'),
(24, 'P08', 'G09'),
(25, 'P08', 'G21'),
(26, 'P08', 'G22'),
(27, 'P08', 'G23'),
(28, 'P08', 'G24'),
(29, 'P09', 'G23'),
(30, 'P09', 'G25'),
(31, 'P09', 'G26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblgejala`
--

CREATE TABLE `tblgejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `cf_rule` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblgejala`
--

INSERT INTO `tblgejala` (`id_gejala`, `nama_gejala`, `cf_rule`) VALUES
('G01', 'Terdapat bercak putih pada daun', 0.2),
('G02', 'Terdapat liang kerokan larva yang berkelok pada daun', 0.6),
('G03', 'Daun mengering', 0.4),
('G04', 'Daun berwarna cokelat sepeti terbakar', 0.2),
('G05', 'Terdapat bercak putih transparan pada daun', 0.2),
('G06', 'Daun terkulai', 0.8),
('G07', 'Daun berwarna putih perak', 0.2),
('G08', 'Daun berubah kecoklatan dan berbintik hitam', 0.4),
('G09', 'Umbi bawang kecil', 0.6),
('G10', 'Leher batang terpotong-potong', 1),
('G11', 'Daun menguning', 0.2),
('G12', 'Daun terpelintir dan mudah tercabut', 0.6),
('G13', 'Umbi membusuk', 0.2),
('G14', 'Tanaman mati dimulai dari ujung daun menjalar hingga ke bagian bawah\r\n', 0.8),
('G15', 'Terdapat bercak melekuk pada daun berwarna putih atau kelabu', 0.2),
('G16', 'Terdapat bercak seperti cincin berwarna ungu kemerah-merahan', 0.4),
('G17', 'Ujung daun mengering bahkan patah', 0.2),
('G18', 'Umbi kering berwarna gelap', 0.4),
('G19', 'Pangkal daun bawang mengecil', 0.6),
('G20', 'Terdapat spora berwarna merah muda', 0.4),
('G21', 'Tanaman tumbuh kerdil', 0.2),
('G22', 'Daun bawang kecil', 0.2),
('G23', 'Warna daun belang', 0.6),
('G24', 'Pertumbuhan daun terpilin', 0.8),
('G25', 'Banyak bercak pada ujung daun', 0.2),
('G26', 'Terdapat bercak berwarna cokelat pada daun', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpenyakit`
--

CREATE TABLE `tblpenyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblpenyakit`
--

INSERT INTO `tblpenyakit` (`id_penyakit`, `nama_penyakit`, `solusi`) VALUES
('P01', 'Lalat Penggorok Daun', 'Saat hama masih dalam tahap larva dapat menggunakan insektisida berbahan aktif Abamectin (demolish,agrimec) dengan dosis 1/2 sendok teh untuk 17 liter air.\r\n\r\nSaat hama telah berupa lalat buatlah jebakan lalat hama grandong dengan memasang botol bekas air mineral yang telah diolesi lem pada permukaannya, letakkan botol-botol plastik tersebut di sekitar lahan bawang merah.\r\n\r\nUntuk penggunaan pestisida, pilihlah jenis pestisida yang berbahan aktif Imidakloprit dengan dosis pemberian 25 gr / 2 sendok makan pestisida dicampur dengan 17 liter air. Atau dapat juga menggunakan Abamectin dengan dosis 1/2 sendok teh untuk ukuran air 17 liter. '),
('P02', 'Ulat Bawang', 'Solusi Ulat Bawang'),
('P03', 'Trips', ''),
('P04', 'Ulat Tanah', ''),
('P05', 'Layu Fusarium', ''),
('P06', 'Bercak Ungu', ''),
('P07', 'Antraknosa', ''),
('P08', 'Virus Mozaik Bawang', ''),
('P09', 'Bercak Daun', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblriwayat`
--

CREATE TABLE `tblriwayat` (
  `id_riwayat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `solusi` text NOT NULL,
  `faktor_kepastian` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblriwayat`
--

INSERT INTO `tblriwayat` (`id_riwayat`, `tanggal`, `nama_penyakit`, `solusi`, `faktor_kepastian`) VALUES
(21, '2021-02-01', 'Lalat Penggorok Daun', 'Saat hama masih dalam tahap larva dapat menggunakan insektisida berbahan aktif Abamectin (demolish,agrimec) dengan dosis 1/2 sendok teh untuk 17 liter air.\r\n\r\nSaat hama telah berupa lalat buatlah jebakan lalat hama grandong dengan memasang botol bekas air mineral yang telah diolesi lem pada permukaannya, letakkan botol-botol plastik tersebut di sekitar lahan bawang merah.\r\n\r\nUntuk penggunaan pestisida, pilihlah jenis pestisida yang berbahan aktif Imidakloprit dengan dosis pemberian 25 gr / 2 sendok makan pestisida dicampur dengan 17 liter air. Atau dapat juga menggunakan Abamectin dengan dosis 1/2 sendok teh untuk ukuran air 17 liter. ', 58.454);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vdetailaturan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vdetailaturan` (
`id_penyakit` varchar(5)
,`nama_penyakit` varchar(50)
,`id_gejala` varchar(5)
,`nama_gejala` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vdetailaturan`
--
DROP TABLE IF EXISTS `vdetailaturan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetailaturan`  AS  select `tblaturan`.`id_penyakit` AS `id_penyakit`,`tblpenyakit`.`nama_penyakit` AS `nama_penyakit`,`tblaturan`.`id_gejala` AS `id_gejala`,`tblgejala`.`nama_gejala` AS `nama_gejala` from ((`tblaturan` left join `tblpenyakit` on(`tblaturan`.`id_penyakit` = `tblpenyakit`.`id_penyakit`)) left join `tblgejala` on(`tblaturan`.`id_gejala` = `tblgejala`.`id_gejala`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblaturan`
--
ALTER TABLE `tblaturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `fk_id_penyakit` (`id_penyakit`),
  ADD KEY `fk_id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `tblgejala`
--
ALTER TABLE `tblgejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `tblpenyakit`
--
ALTER TABLE `tblpenyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `tblriwayat`
--
ALTER TABLE `tblriwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tblaturan`
--
ALTER TABLE `tblaturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tblriwayat`
--
ALTER TABLE `tblriwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tblaturan`
--
ALTER TABLE `tblaturan`
  ADD CONSTRAINT `fk_id_gejala` FOREIGN KEY (`id_gejala`) REFERENCES `tblgejala` (`id_gejala`),
  ADD CONSTRAINT `fk_id_penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `tblpenyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
