-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Feb 2021 pada 03.57
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
(7, 'P03', 'G06'),
(8, 'P03', 'G07'),
(9, 'P03', 'G08'),
(10, 'P03', 'G09'),
(12, 'P05', 'G11'),
(13, 'P05', 'G12'),
(14, 'P05', 'G13'),
(15, 'P05', 'G14'),
(16, 'P06', 'G13'),
(17, 'P06', 'G15'),
(18, 'P06', 'G16'),
(19, 'P06', 'G17'),
(20, 'P06', 'G18'),
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
('G06', 'Daun terkulai', 0.8),
('G07', 'Daun berwarna putih perak', 0.2),
('G08', 'Daun berubah kecoklatan dan berbintik hitam', 0.4),
('G09', 'Umbi bawang kecil', 0.6),
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
('P03', 'Trips', 'Dapat menggunakan insektisida dengan berbahan aktif Abamektin, Imidakloprid, Fipronil, Profenofos.'),
('P05', 'Layu Fusarium', 'Gunakan pupuk organik dengan penambahan agens hayati Gliocladium sp atau Thricoderma sp pada setiap lubang tanam serta perlakuan benih sebelum tanam dengan mencelupkan benih umbi maksimal 3 menit dalam larutan PGPR dosis 10 ml/liter air.'),
('P06', 'Bercak Ungu', 'Gunakan fungisida yang berbahan aktif klorotalonil, mankoseb, promineb dan difenokonazol.'),
('P07', 'Antraknosa', 'Menggunakan fungisida, misalnya Bion M, Czeb, Sorento, Score, Dakonil, atau Karibu.'),
('P08', 'Virus Mozaik Bawang', 'Memusnahkan semua tanaman yang terserang ataupun tumbuhan inang dengan cara membakarnya.'),
('P09', 'Bercak Daun', 'Dapat diatasi dengan cara sanitasi dan pembakaran sisa-sisa tanamana sakit, eradikasi selektif terhadap tanaman terserang, atau dapat menggunakan fungisida.');

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
(26, '2021-02-21', 'Bercak Ungu', 'Gunakan fungisida yang berbahan aktif klorotalonil, mankoseb, promineb dan difenokonazol.', 40.16),
(27, '2021-02-24', 'Trips', 'Dapat menggunakan insektisida dengan berbahan aktif Abamektin, Imidakloprid, Fipronil, Profenofos.', 82.74),
(28, '2021-02-24', 'Virus Mozaik Bawang', 'Memusnahkan semua tanaman yang terserang ataupun tumbuhan inang dengan cara membakarnya.', 59.04);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempgejala`
--

CREATE TABLE `tempgejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nilai_cf` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempgejala`
--

INSERT INTO `tempgejala` (`id_gejala`, `nilai_cf`) VALUES
('G20', 0.60),
('G23', 0.60),
('G25', 0.20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temphasil`
--

CREATE TABLE `temphasil` (
  `id_penyakit` varchar(5) NOT NULL,
  `nilai_cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temphasil`
--

INSERT INTO `temphasil` (`id_penyakit`, `nilai_cf`) VALUES
('P07', 42.24),
('P08', 59.04),
('P09', 38.56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temppenyakit`
--

CREATE TABLE `temppenyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `cf_rule` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temppenyakit`
--

INSERT INTO `temppenyakit` (`id_penyakit`, `id_gejala`, `cf_rule`) VALUES
('P07', 'G20', 0.40),
('P08', 'G23', 0.60),
('P09', 'G23', 0.60),
('P09', 'G25', 0.20);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vcfkombinasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vcfkombinasi` (
`id_penyakit` varchar(5)
,`id_gejala` varchar(5)
,`cf_rule` float(5,2)
,`nilai_cf` float(5,2)
,`cf_kombinasi` double(19,2)
);

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
-- Struktur untuk view `vcfkombinasi`
--
DROP TABLE IF EXISTS `vcfkombinasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcfkombinasi`  AS  select `temppenyakit`.`id_penyakit` AS `id_penyakit`,`temppenyakit`.`id_gejala` AS `id_gejala`,`temppenyakit`.`cf_rule` AS `cf_rule`,`tempgejala`.`nilai_cf` AS `nilai_cf`,`temppenyakit`.`cf_rule` * `tempgejala`.`nilai_cf` AS `cf_kombinasi` from (`temppenyakit` join `tempgejala` on(`temppenyakit`.`id_gejala` = `tempgejala`.`id_gejala`)) where `temppenyakit`.`id_gejala` = `temppenyakit`.`id_gejala` ;

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
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
