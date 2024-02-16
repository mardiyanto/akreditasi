-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2024 pada 16.58
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
-- Database: `db_akreditasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buktidokumen`
--

CREATE TABLE `buktidokumen` (
  `id_buktidokumen` int(100) NOT NULL,
  `id_kriteriadokumen` int(100) NOT NULL,
  `nama_buktidokumen` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'baru'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buktidokumen`
--

INSERT INTO `buktidokumen` (`id_buktidokumen`, `id_kriteriadokumen`, `nama_buktidokumen`, `status`) VALUES
(1, 1, 'Statuta atau pedoman dasar penyelenggaraan kegiatan', 'baru'),
(2, 1, 'Dokumen profil dan kebijakan Perguruan Tinggi.', 'baru'),
(3, 1, 'Dokumen Rencana Induk Pengembangan (RIP).', 'baru'),
(4, 1, 'Rencana Strategis UPPS.', 'baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteriadukumen`
--

CREATE TABLE `kriteriadukumen` (
  `id_kriteriadukumen` int(100) NOT NULL,
  `nama_kriteriadukumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteriadukumen`
--

INSERT INTO `kriteriadukumen` (`id_kriteriadukumen`, `nama_kriteriadukumen`) VALUES
(1, 'Kriteria 1 Visi, Misi, Tujuan dan Strategi'),
(2, 'Kriteria 2 Tata Kelola, Tata Pamong dan Kerjasama'),
(3, 'Kriteria 3 Mahasiswa'),
(4, 'Kriteria 4 Sumber Daya Manusia '),
(5, 'Kriteria 5 Keuangan, Sarana dan Prasarana'),
(6, 'Kriteria 6 Pendidikan'),
(7, 'Kriteria 7 Penelitian'),
(8, 'Kriteria 8 Pengabdian kepada Masyarakat'),
(9, 'Kriteria 9 Luaran dan Capaian Tridharma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(250) NOT NULL,
  `link` varchar(520) NOT NULL,
  `link_b` varchar(100) NOT NULL,
  `icon_menu` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `aktif` varchar(11) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `link`, `link_b`, `icon_menu`, `status`, `aktif`) VALUES
(1, 'SETTING', 'index.php?aksi=profil', '', 'fa-bar-chart-o', 'admin', 'Y'),
(6, 'KRITERIADOKUMEN', 'index.php?aksi=kriteriadukumen', '', 'fa-calendar', 'admin', 'Y'),
(11, 'BUKTIDOKUMEN', 'index.php?aksi=buktidokumen', '', 'fa-table', 'admin', 'Y'),
(14, 'MENU', 'index.php?aksi=menu', '', 'fa-file-text', 'admin', 'Y'),
(18, 'SUB MENU', 'index.php?aksi=submenu', '', 'fa-calendar-minus-o', 'admin', 'Y'),
(19, 'TEMUAN', 'index.php?aksi=temuan', 'index.php?aksi=temuan', 'fa-map-signs', 'admin', 'Y'),
(20, 'ADMIN', 'index.php?aksi=admin', '', 'fa-users', 'admin', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(20) NOT NULL,
  `nama_app` varchar(100) NOT NULL,
  `tahun` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alias` varchar(350) NOT NULL,
  `alamat` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `akabest` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_app`, `tahun`, `nama`, `alias`, `alamat`, `isi`, `gambar`, `akabest`) VALUES
(1, 'LAMEMBA', '2022/2023', 'AKREDITASI LAMEMBA', 'DPRD PRINGSEWU', 'JL Wismarini No 09 Pringsewu Lampung', '<p>LAMEMBA menetapkan fokus penilaian ke dalam kriteria dan dimensi yang mencakup komitmen perguruan tinggi dan unit pengelola program studi terhadap kapasitas dan keefektifan pendidikan yang terdiri atas sembilan (9) kriteria sebagai berikut. 1. Kriteria 1 Visi, Misi, Tujuan dan Strategi</p>\r\n\r\n<p>2. Kriteria 2 Tata Kelola, Tata Pamong dan Kerjasama</p>\r\n\r\n<p>3. Kriteria 3 Mahasiswa</p>\r\n\r\n<p>4. Kriteria 4 Sumber Daya Manusia</p>\r\n\r\n<p>5. Kriteria 5 Keuangan, Sarana dan Prasarana</p>\r\n\r\n<p>6. Kriteria 6 Pendidikan</p>\r\n\r\n<p>7. Kriteria 7 Penelitian</p>\r\n\r\n<p>8. Kriteria 8 Pengabdian kepada Masyarakat</p>\r\n\r\n<p>9. Kriteria 9 Luaran dan Capaian Tridharma</p>\r\n', '26122022051024.jpg', 'mardybest@gmail.com'),
(2, 're', '', 'MARDIYANTO', '19081989578978975', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(100) NOT NULL,
  `id_menu` int(100) NOT NULL,
  `nama_sub` varchar(100) NOT NULL,
  `link_sub` text NOT NULL,
  `icon_sub` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_sub`, `link_sub`, `icon_sub`) VALUES
(1, 10, 'KABUPATEN', 'index.php?aksi=kabupaten', 'fa-exchange'),
(2, 10, 'KECAMATAN', 'index.php?aksi=kecamatan', 'fa-exchange'),
(3, 10, 'DESA', 'index.php?aksi=desa', 'fa-exchange'),
(4, 10, 'TPS', 'index.php?aksi=tps', 'fa-exchange');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploaddokumen`
--

CREATE TABLE `uploaddokumen` (
  `id_uploaddokumen` int(100) NOT NULL,
  `id_buktidokumen` int(100) NOT NULL,
  `dokumen` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `uploaddokumen`
--

INSERT INTO `uploaddokumen` (`id_uploaddokumen`, `id_buktidokumen`, `dokumen`, `keterangan`) VALUES
(1, 1, '65cf7dde3ae95_c06b2641-da9e-4a0f-9b1c-cd10de61bd1f.pdf', 'xbxb'),
(2, 1, '65cf7e14000ec_DAFTAR KABUPATEN KOTA SE-INDONESIA BY ANDREAS AGUNG.xlsx', 'xbxb'),
(3, 2, '65cf8165ab581_WhatsApp Image 2024-02-16 at 20.05.21.pdf', 'cuma coba aj'),
(4, 1, '65cf83e331d07_', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`) VALUES
(1, 'Adminatun Jhony', 'admin', '21232f297a57a5a743894a0e4a801fc3', '482937136_avatar.png'),
(10, 'aka', 'aka', 'c4ca4238a0b923820dcc509a6f75849b', '1869563217_ilustrasi-ikan-lele-1_169.jpeg'),
(11, 'tes', '123', '202cb962ac59075b964b07152d234b70', ''),
(12, 'bangsat', 'bangsat', '528f980649c80a7269402447b51e815a', '1638032220_17-52-06-IMG-20221008-WA0001.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buktidokumen`
--
ALTER TABLE `buktidokumen`
  ADD PRIMARY KEY (`id_buktidokumen`);

--
-- Indeks untuk tabel `kriteriadukumen`
--
ALTER TABLE `kriteriadukumen`
  ADD PRIMARY KEY (`id_kriteriadukumen`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `uploaddokumen`
--
ALTER TABLE `uploaddokumen`
  ADD PRIMARY KEY (`id_uploaddokumen`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buktidokumen`
--
ALTER TABLE `buktidokumen`
  MODIFY `id_buktidokumen` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteriadukumen`
--
ALTER TABLE `kriteriadukumen`
  MODIFY `id_kriteriadukumen` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `uploaddokumen`
--
ALTER TABLE `uploaddokumen`
  MODIFY `id_uploaddokumen` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
