-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2023 pada 02.30
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(6, 'Admin1', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2022-12-18 20:21:58', '2022-12-18 20:21:58'),
(8, 'SuperAdmin', '$2y$10$VJzIPqm/nfDfO5woT1641OWU4hOAvhQXhB8.bxJmKkMx6j6x2WnVm', '2022-12-25 22:23:08', '2022-12-25 22:23:08'),
(9, 'Administrator', '$2y$10$atd/9vbRd8.xpASp5tUhdenyd8NpUnMjmgDUQhCVppyKQqj7qufJq', '2022-12-25 22:23:30', '2022-12-25 22:23:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `deskripsi_galeri` text NOT NULL,
  `foto_galeri` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `id_wisata`, `deskripsi_galeri`, `foto_galeri`, `created_at`, `updated_at`) VALUES
(12, 12, 'Pantai Wini', 'Pantai Wini TTU.jpg', '2022-10-06 19:06:26', '2022-10-06 19:06:26'),
(13, 13, 'Tanjung Bastian', 'TajungBastian.jpg', '2022-10-06 19:15:10', '2022-10-06 19:15:10'),
(15, 15, 'Bukit Tuamese', 'tuamese.jpg', '2022-10-06 19:27:30', '2022-10-08 02:03:11'),
(21, 21, 'Bukit Cinta Haumeni\'Ana', 'bukitcinta-haumeniana.jpg', '2022-10-06 20:00:07', '2022-10-06 20:00:07'),
(22, 22, 'Bukit Cinta Oelbinose', 'bukit-cinta-oelbinose.jpg', '2022-10-06 20:45:10', '2022-10-06 20:45:10'),
(23, 25, 'Bukit Manufonu', 'puncakmanufonu puncak-kemerdekaan.jpg', '2022-10-06 20:46:21', '2022-10-06 20:46:21'),
(24, 24, 'Pantai Oebubun', 'pantai-oebubun.jpg', '2022-10-06 20:47:39', '2022-10-06 20:47:39'),
(25, 26, 'Pantai Faularan', 'faularan.jpg', '2022-10-06 20:53:20', '2022-10-06 20:53:20'),
(26, 27, 'Gunung Mutis', 'gunung-mutis.jpg', '2022-10-06 20:57:59', '2022-10-06 20:57:59'),
(27, 28, 'Padang Popekano Mamsena', 'padang popekano mamsena 3.jpg', '2022-10-06 21:06:36', '2022-10-06 21:06:36'),
(28, 29, 'Air Terjun 5 Tingkat Bi\'Aki', 'Air-Terjun-5-Tingkat.jpg', '2022-10-06 22:11:37', '2022-10-08 01:55:44'),
(29, 30, 'Air Terjun Pahkoto', 'Air-terjun Pahkoto.jpg', '2022-10-06 23:07:15', '2022-10-06 23:07:15'),
(30, 32, 'Air Terjun Besin', 'Air-Terjun-Besin.jpg', '2022-10-07 00:10:20', '2022-10-07 13:45:36'),
(31, 31, 'Kolam Renang Oeluan', 'oeluan-3.jpg', '2022-10-07 00:11:51', '2022-10-07 00:11:51'),
(32, 33, 'Jembatan Gantung Noepesu', 'jmbtngntung-noepesu.jpg', '2022-10-07 11:11:11', '2022-10-07 11:11:11'),
(33, 34, 'Pos Lintas Wini', 'PLBN wini.jpg', '2022-10-07 11:51:50', '2022-10-07 11:51:50'),
(34, 35, 'Gua Maria Bitauni', 'gua-maria-bitauni.jpg', '2022-10-07 12:21:44', '2022-10-07 12:21:44'),
(35, 36, 'Kampung Adat Maslete', 'kampung adat maslete.jpg', '2022-10-07 12:43:18', '2022-10-07 12:43:18'),
(36, 37, 'Kampung Adat Tamkesi', 'kampung-tamksi.jpg', '2022-10-07 13:12:52', '2022-10-07 13:12:52'),
(37, 38, 'Istana Raja Oelolok', 'istana-raja-oelolok.jpg', '2022-10-07 15:40:13', '2022-10-07 15:40:13'),
(38, 39, 'Kure Noemuti', 'upacara-kure-noemuti-kote.jpg', '2022-10-07 16:13:53', '2022-10-07 17:18:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `id_hotel` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `nama_hotel` varchar(50) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `jumlah_tarif` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`id_hotel`, `img`, `nama_hotel`, `jumlah_kamar`, `jumlah_tarif`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '', 'H. Ariesta', 41, '65.000 s/d 250.000', 'Jl.Eltari', '2023-03-16 04:37:02', '2023-03-16 04:37:02'),
(4, '', 'H.Livero', 30, '250.000 s/d 600.000', 'Jl.Eltari', '2023-03-16 04:54:04', '2023-03-16 04:54:04'),
(5, '', 'H.Litani', 9, '250.000 s/d 530.000', 'Jl.Eltari', '2023-03-16 04:54:57', '2023-03-16 04:54:57'),
(6, '', 'H.Sederhana', 17, '50.000', 'Jl.Patimura', '2023-03-16 04:55:44', '2023-03-16 04:55:44'),
(7, '', 'H.Setangkai', 12, '50.000', 'Jl.Eltari', '2023-03-16 04:56:21', '2023-03-16 04:56:21'),
(8, '', 'H.Kasih', 15, '75.000', 'Jl.Eltari', '2023-03-16 04:57:07', '2023-03-16 04:57:07'),
(9, '', 'H.Grand Royal', 22, '250.000 s/d 400.000', 'Jl.Eltari', '2023-03-16 04:57:35', '2023-03-16 04:57:35'),
(10, '', 'H.Comfort Inn', 7, '550.000 s/d 850.000', 'Jl.Eltari', '2023-03-16 04:58:17', '2023-03-16 04:58:17'),
(12, 'http://127.0.0.1:1010/revisi/100140//assets/images/fasilitas/hotel/1169087216.jpg', 'tes', 1, 'Rp. 100.000', 'Jalan W.J. Lalamentik No.95', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(11, 'Wisata Alam', '2022-12-15 19:03:33', '2022-12-15 20:17:40'),
(12, 'Wisata Budaya', '2022-12-15 19:13:19', '2022-12-15 19:13:19'),
(14, 'Wisata Buatan', '2022-12-15 19:26:03', '2022-12-15 19:26:03'),
(45, 'Fasilitas', '2022-12-23 23:33:40', '2022-12-23 23:33:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_layanan_publik`
--

CREATE TABLE `tbl_layanan_publik` (
  `id_layanan` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `nama_layanan_publik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_layanan_publik`
--

INSERT INTO `tbl_layanan_publik` (`id_layanan`, `img`, `nama_layanan_publik`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '', 'RSUD Kefamenanu', 'Jl.Letjen Suprapto, Kefamenanu Tengah', '2023-03-16 05:05:22', '2023-03-16 05:05:22'),
(2, '', 'RSU Loena', 'Jl.Maubeli', '2023-03-16 05:07:21', '2023-03-16 05:07:21'),
(3, '', 'RS Kusta & Cacat Umum Bunda Pembantu Abadi', 'Jl. Eltari Mubeli', '2023-03-16 05:07:52', '2023-03-16 05:07:52'),
(4, '', 'Puskesmas Eban', 'Kel. Eban, Kec. Miomafo', '2023-03-16 05:08:50', '2023-03-16 05:08:50'),
(5, '', 'Puskesmas Oeolo', 'Desa Oeolo, Kec. Miomafo Barat', '2023-03-16 05:09:50', '2023-03-16 05:09:50'),
(6, '', 'Puskesmas Bijaepasu', 'Desa Bijaepasu, Kec.Miomafo', '2023-03-16 05:10:24', '2023-03-16 05:10:24'),
(7, '', 'Puskesmas Tasinifu', 'Desa Tasinifu, Kec. Musi', '2023-03-16 05:10:54', '2023-03-16 05:10:54'),
(8, '', 'Puskesmas Bitefa', 'Kel. Bitefa, Kec. Miomafo Timur', '2023-03-16 05:11:57', '2023-03-16 05:11:57'),
(9, '', 'Puskesmas Nunpene', 'Kel. Oesene, Kec. Miomafo Timur', '2023-03-16 05:12:37', '2023-03-16 05:12:37'),
(10, '', 'Puskesmas Tublopo', 'Desa Tuplopo, Kec. Bikomi Selatan', '2023-03-16 05:13:17', '2023-03-16 05:13:17'),
(11, '', 'Puskesmas Noemuti', 'Kel.Noemuti, Kec. Noemuti', '2023-03-16 05:17:31', '2023-03-16 05:17:31'),
(12, '', 'Puskesmas Nimasi', ' Desa Oenesu, Kec. Bikomi Tengah', '2023-03-16 05:18:00', '2023-03-16 05:18:00'),
(13, '', 'Puskesmas Inbate', 'Desa Sungkaen, Kec. Bikomi Nilulat', '2023-03-16 05:18:34', '2023-03-16 05:18:34'),
(14, '', 'Puskesmas Napan', 'Desa Napan, Bikomi Utara', '2023-03-16 05:19:31', '2023-03-16 05:19:31'),
(15, '', 'Puskesmas manamas', 'Desa Sunsea, Kec. Naibenu', '2023-03-16 05:19:55', '2023-03-16 05:19:55'),
(16, '', 'Puskesmas Oemeu', 'Desa Popnam, Kec. Noemuti Timur', '2023-03-16 05:20:28', '2023-03-16 05:20:28'),
(17, '', 'Puskesmas Haekto', 'Desa Haekto, Kec. Noemuti Timur', '2023-03-16 05:21:00', '2023-03-16 05:21:00'),
(18, '', 'Puskesmas Sasi', 'Kel. Sasi', '2023-03-16 05:21:37', '2023-03-16 05:21:37'),
(19, '', 'Puskesmas Oelolok', 'Kel. Ainiut, Kec. Insana', '2023-03-16 05:23:06', '2023-03-16 05:23:06'),
(20, '', 'Puskesmas Wini', 'Kel. Humusu C, Kec. Insana Barat', '2023-03-16 05:23:46', '2023-03-16 05:23:46'),
(21, '', 'Puskesmas Mamsena', 'Kel. Atmen, Kec. Insana Barat', '2023-03-16 05:24:23', '2023-03-16 05:24:23'),
(22, '', 'Puskesmas Maubesi', 'Kel. Maubesi, kec. Insana Tengah', '2023-03-16 05:25:07', '2023-03-16 05:25:07'),
(23, '', 'Puskesmas Manufui', 'Kel. Oepuah, Kec. Biboki Selatan', '2023-03-16 05:25:48', '2023-03-16 05:25:48'),
(24, '', 'Puskesmas Oenopu', 'Desa Oekopa, Kec. Biboki Tanpah', '2023-03-16 05:26:59', '2023-03-16 05:26:59'),
(25, '', 'Puskesmas Kaubele', 'Desa Oepuah, Kec. Biboki Meonleu', '2023-03-16 05:28:04', '2023-03-16 05:28:04'),
(26, '', 'Puskesmas Ponu', 'kel. Ponu, Kec. Biboki Anleu', '2023-03-16 05:28:54', '2023-03-16 05:28:54'),
(27, '', 'Puskesmas Lurasik', 'Kel.Boronubaen, Kec. Biboki Utara', '2023-03-16 05:29:29', '2023-03-16 05:29:29'),
(28, '', 'Rental Mobil Kefamenanu', 'Jl.Lingkungan Fatumnaon, Maubeli', '2023-03-16 05:32:51', '2023-03-16 05:32:51'),
(29, '', 'Rental Mobil Nyongki', 'Bansone', '2023-03-16 05:33:46', '2023-03-16 05:33:46'),
(30, '', 'Bank BRI KCP Unit Eban', 'Jl. Hati Suci, RT 001 RW 001', '2023-03-16 05:34:26', '2023-03-16 05:34:26'),
(31, '', 'Bank BRI KCP Unit Insana', 'Jl. Trans Atambua Kefamenanu', '2023-03-16 05:36:19', '2023-03-16 05:36:19'),
(32, '', 'Bank BRI Kantor Cabang KC BRI Kefamnenu', 'Meyjen, Eltari No.30 Kefamenanu', '2023-03-16 05:38:07', '2023-03-16 05:38:07'),
(33, '', 'Bank BRI ATM RSUD Kefamnenu', 'Jl.Letjen Suprapto, Kefamenanu Tengah', '2023-03-16 05:38:27', '2023-03-16 05:38:27'),
(34, '', 'Bank BRI Kantor Kas KK BRI UNIMOR', 'Jl.Unimor KM 10', '2023-03-16 05:39:24', '2023-03-16 05:39:24'),
(35, '', 'Bank BRI KCP Unit Noemuti', 'Desa Oenak, Kec. Noemuti', '2023-03-16 05:40:05', '2023-03-16 05:40:05'),
(36, '', 'Bank BRI KCP Unit Lurasik', 'Jl.Pahlawan, RT 001 RW 001', '2023-03-16 05:41:03', '2023-03-16 05:41:03'),
(37, '', 'Bank BRI KCP Unit Wini', 'Jl.Ikan Paus, Kel.Humusu C', '2023-03-16 05:45:15', '2023-03-16 05:45:15'),
(38, '', 'Bank Mandiri KCP Kefamenanu', 'Jl.Eltari Kefamenanu', '2023-03-16 05:45:54', '2023-03-16 05:45:54'),
(39, '', 'Bank Mandiri KCP Kefamenanu', 'Jl.Eltari Kefamenanu', '2023-03-16 05:46:56', '2023-03-16 05:46:56'),
(40, '', 'Bank NTT Kantor Kiupukan', 'Jalan Raya Kiupukan No.01, Kipukan Tengah', '2023-03-16 05:47:20', '2023-03-16 05:47:20'),
(41, '', 'Bank BTN Kantor Kas Kefamenanu', 'Jl.Imam Bonjol No.T Kefamenanu', '2023-03-16 05:48:17', '2023-03-16 05:48:17'),
(42, '', 'Bank BPD Kantor Fungsional Noemuti', 'JL.Raya Timor Raya, Kec.Noemuti', '2023-03-16 05:49:14', '2023-03-16 05:49:14'),
(43, '', 'Bank BPD KCP Oelolok', 'Jl.Timor Raya', '2023-03-16 05:50:13', '2023-03-16 05:50:13'),
(44, '', 'Bank BPD Kantor Fungsional Eban', 'Jl.Raya Eban', '2023-03-16 05:51:27', '2023-03-16 05:51:27'),
(45, '', 'Bank BPD ATM Kantor Bupati Kefamenanu', 'Jl.Jendral Sudirman', '2023-03-16 05:52:26', '2023-03-16 05:52:26'),
(46, '', 'Bank Danamon KCP', 'Jl.Kartini No.88', '2023-03-16 05:53:11', '2023-03-16 05:53:11'),
(47, '', 'Bank BTPN KCP Kefamenanu', 'Jl.Eltari KM 3, Kel. Kefa Selatan', '2023-03-16 05:54:00', '2023-03-16 05:54:00'),
(48, '', 'Bank BNI KC Kefamenanu', 'Jl.Kartini No.50', '2023-03-16 05:55:36', '2023-03-16 05:55:36'),
(49, '', 'Bank BRI Kantor Kas Teras Pasar Terminal Kota', 'Jl.Ring Road KM 10', '2023-03-16 05:56:16', '2023-03-16 05:56:16'),
(50, '', 'Terminal Kefamenanu', 'Jl.Eltari', '2023-03-16 05:57:11', '2023-03-16 05:57:11'),
(51, '', 'Terminal ALBN Kefa', 'Naiola, Kec.Bikomi Selatan', '2023-03-16 05:58:14', '2023-03-16 05:58:14'),
(54, 'http://127.0.0.1:1010/revisi/100140//assets/images/fasilitas/layanan/1169087216.jpg', 'tes', 'Jalan W.J. Lalamentik No.95', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(225) NOT NULL,
  `deskripsi_lokasi` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_lokasi`, `deskripsi_lokasi`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(12, 'Pantai Wini', 'Pantai Wini tempatnya. Pantai Wini ini berlokasi di Kecamatan Insana Utara, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur.Lokasi wisata ini dapat dijangkau dengan kendaraan umum maupun pribadi.', '-9.17983', '124.49681', '2022-10-06 19:00:38', '2023-01-12 03:54:34'),
(13, 'Tanjung Bastian', 'Wisata yang satu ini terletak di Wini, Kecamatan Insana Utara, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur. Pantai Tanjung Bastian ini memiliki akses jalan sempit dan berkelok-kelok. Pantai ini layak disebut sebagai surganya Desa Wini, karena masih terjaga kebersihannya dan pemandangn di pantai ini yang sangat indah. Selain menyuguhkan keindahan alamnya, Pantai Tanjung Bastian sering diadakan Pacuan Kuda Tanjung Bastian Wini. Jika ingin berkunjung ke pantai ini, kamu hanya perlu merogoh kocek 3000 rupiah saja untuk tiket masuk dan kamu sudah merasakan keindahan dari Pantai Tanjung Bastian.', '-9.17289', '124.55246', '2022-10-06 19:08:27', '2023-01-12 03:42:00'),
(14, 'Bukit Tuamese', 'Objek wisata ini berada di Desa Tuamese, Kecamatan Biboki Anleu, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur. Untuk mencapai lokasi Bukit Tuamese ini kamu akan melewati pantai yang sangat bersih, masyarakat sekitar menyebutnya Raja Ampat karena pemandangannya seperti disama, dengan gundukan bukit yang sangat indah. Untuk mencapai puncak bukit kamu perlu mendaki sekitar 200 meter, dengan tracking yang tidak terlalu susah. Selain dapat melihat pemandangan dari atas bukit kamu juga bisa foto foto karena di sesiakan spot foto yang menarik.', '-9.0577', '124.7025', '2022-10-06 19:19:17', '2023-01-12 03:45:20'),
(15, 'Bukit Cinta Haumeni Ana', 'Tempat ini merupakan perbatasan RI-RDTL, lalu di manfaatkan menjadi tempat wisata menarik yang ada di Nusa Tenggara Timur. Bukit Cinta ini berlokasi di Desa Haumeniana, Kecamatan Bikomi Ninulat, Taman Wisata Negri di Atas Awan menarik minat masyarakat untuk berkunjung ke tempat ini, kamu akan di suguhkan pemandangan indah serta tempat tempat unik yang bisa kamu jadikan spot foto.', '-9.4265', '124.0844', '2022-10-06 19:25:08', '2023-01-12 03:43:17'),
(16, 'Bukit Cinta Oelbinose', 'Bukit Cinta Oelbinose merupakan sebuah bukit yang terletak di kawasan pegunungan Mutis, tepatnya di Desa Tasinifu, Kecamatan Mutis, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur. Kamu akan menempuh jarak sekitar 52 kilometer untuk sampai ke bukit ini dari Kota Kefamenanu. Daerah ini berbatasan langsung dengan Distrik Amben, Timor Leste. Disebut dengan bukit cinta karena dibukit inilah warga sekitar bisa mendapatkan signal untuk bisa menghubungi pasangannya yang berkarak jauh. Selain itu, bagi para TNI yang bertugas untuk menjaga perbatasan yang berasal dari luar Nusa Tenggara Timur, sering mendatangi Bukit Cinta untuk mencari signal agar bisa menghubungi keluarga mereka.', '-9.4683', '124.2694', '2022-10-06 19:30:21', '2023-01-12 03:45:49'),
(17, 'Bukit Manufonu', 'Bukit Manufonu, terletak di Kecamatan Insana Utara, Kabupaten Timor Tengah Utara (TTU), Nusa Tenggara Timur, bersama anggota TNI dan Polri, menggelar kegiatan pengibaran bendera merah putih dalam rangka HUT ke-67 RI di bukit terjal yang berbatasan dengan Negara Timor Leste', '-9.1895', '124.4838', '2022-10-06 19:35:48', '2023-01-12 03:57:10'),
(18, 'Pantai Oebubun', 'Wisata pantai yang satu ini berada di Desa Oepuah, Kecamatan Biboki Moeleu, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur. Pantai ini memiliki pemandangan laut biru dengan pasir putih yang indah di bibir pantai, banyak terdapat ikan warna warni yang membuat kamu betah berada disini, kamu juga dapat melihat nelayan yamg sedang melaut secara tradisional di pantai ini. Selain menyuguhkan pemandangan laut, disini kamu juga dapat melihat indahnya pegunungan yang menghadap pantai.', '-9.15595', '124.60904', '2022-10-06 19:42:10', '2023-01-12 03:43:51'),
(19, 'Pantai Faularan', 'Lokasi pantai Faularan  obyek wisata ini sekitar 40 kilomater dari kota Atambua melalui jalan raya Atambua Sakato. Jika menggunakan kendaraan roda empat, membutuhkan sekitar satu jam untuk dapat mencapai objek wisata ini.', '-9.09421', '124.68644', '2022-10-06 19:46:50', '2023-01-12 03:52:58'),
(20, 'Gunung Mutis', 'Secara administrasi gunung Mutis Timau terletak di 2 (dua) wilayah pemerintahan yakni Kabupaten Timor Tengah Selatan (TTS) seluas 9.888,78 Ha (80,29 %) dan Kabupaten Timor Tengah Utara (TTU) seluas 2.426,83 Ha (19,71 %), Provinsi Nusa Tenggara Timur (NTT). Kawasan hutan ini tepatnya berada di Kecamatan Fatumnasi dan Tobu di TTS; Kecamatan Miomaffo Barat dan Mutis TTU. Ada 10 desa yang berada di dalam dan sekitar kawasan ini, yaitu: Desa Kuannoel, Fatumnasi, Nenas dan Nuapin di Kecamatan Fatumnasi; Desa Tutem, Tune dan Bonleu di Kecamatan Tobu; Desa Noepesu dan Fatuneno di Kecamatan Miomaffo Barat; Desa Tasinifu di Kecamatan Mutis.', '-9.5610', '124.2282', '2022-10-06 19:52:15', '2023-01-12 04:00:01'),
(21, 'Padang Popekano Mamsena', 'Selanjutnya adalah wisata Padang Rumput Popekano yang berlokasi di Desa Lerneo, Kecamatan Insana Barat, Kabupaten Timor Tengah Utara, Nusa Tenggara Timu. Untuk akses menuju objek wisata ini sudah Padang rumput ini memiliki luas belasan hektar, biasanya warga sekitar melepas hewan ternak mereka seperti sapi dan kambing di Padang Popekano untuk mencari makan, kamu bisa datang pagi pada pukul 06.00 WITA – 09.00 dan sore pada pukul 15.00 WITA – 17.00 WITA jika ingin melihat kawanan ternak tersebut.', '-9.48747', '124.60664', '2022-10-06 19:57:29', '2023-01-12 03:40:52'),
(22, 'Air Terjun 5 Tingkat Bi\'Aki', 'Air Terjun 5 Tingkat Bi’Aki merupakan sebuah air terjun yang terletak di Desa Naekake B, Kecamatan Mutis, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur. Air terjun ini masih cenderung sepi pengunjung karengga belum terlalu dikenal oleh para wisatawan. Kamu akan menempuh jarak sekitar kurang lebih 60 kilometer untuk sampai di air terjun ini dari Kota Kefamenanu, yakni ibukota Kabupaten Timor Tengah Utara. Untuk sampai ke air terjun ini kamu akan melalui jalur setapak karena masih belum ada akses jalan sehingga kamu tidak bisa mengendarai mobil atau sepeda motor untuk sampai kesana. Kamu akan berjalan kaki menempuh jarak sekitar 4 kilometer untuk sampai kesana dari pemukiman penduduk. Namun jangan khawatir, lelahmu akan terbayarkan oleh pemandangan yang disuguhkan saat kamu sampai di air terjun ini.', '-9.4257', '124.1749', '2022-10-06 21:40:56', '2023-01-12 03:46:15'),
(23, 'Air Terjun Pahkoto', 'Tempat wisata Air Terjun Pahkoto adalah salah satu tempat wisata air terjun yang terletak Dusun Oelmuke,  Desa Tasinifu, Kecamatan Mutis, Kabupaten Timor Tengah Utara, Provinsi Nusa Tenggara Timur. ', '-9.4604', '124.2555', '2022-10-06 22:40:56', '2023-01-12 03:39:33'),
(24, 'Air Terjun Besin', 'Air terjun besin terletak di Boni, desa Loeram, Kecamatan Insana.Lokasi air terjun tersebut berjarak sekitar 50 km dari kota Kefamenanu dan dapat ditempuh dengan menggunakan kendaraan roda dua dan empat selama kurang lebih 90 menit.  Akses jalan ke lokasi objek wisata yang berada di tengah hutan.', '-9.4579', '124.7766', '2022-10-06 23:25:29', '2023-01-12 03:38:31'),
(25, 'Kolam Renang Oeluan', 'Kolam Renang Oeluan, dalam bahasa Timor “Oe” memiliki arti Air, jadi Oeluan adalah air dari nenel Luan. Kolam ini dikelilingi dengan pepohonan tinggi, kamu akan merasa seperti berendam di tengah hutan. Kamu hanya perlu merogoh kocek sebesar 3.000 rupiah untuk tiket masuk, kamu juga akan dikenalan biaya parkir motor 3.000 rupiah, mobil 20.000 rupiah dan bus 30.000 rupiah. Kolam Renang Oeluan ini menuediakan wahana mainan anak-anak, berbeda dengan kolam renang lainnya, air di kolam renang ini tidak dicampur kaporit karena airnya masih di manfaatkan warga sekitar untuk mengairi persawahan mereka. Selain kolam renang disana juga terdapat sumber mata air yang alirannya membentuk air terjun kecil.', '-9.5766', '124.4883', '2022-10-06 23:58:40', '2023-01-12 03:44:41'),
(27, 'Jembatan Gantung Noepesu', 'Noepesu berada di Desa Noepesu, Kecamatan Miomafo Barat, Kabupaten TTU sementara disebelahnya ada Desa Bonleu Kecamatan Molo Tengah Kabupaten TTS.Berjarak kurang lebih 35 kilometer dari Kota Kefamenanu', '-9.5503', '124.2308', '2022-10-07 11:01:27', '2023-01-12 03:33:40'),
(28, 'Pos Lintas Wini', 'Pos Lintas Batas Negara (PLBN) Wini terletak di Desa Humusu C, Kecamatan Insana Utara, Kabupaten TTU, PLBN Wini terletak sekitar 48,4 km dari Kota Kefamenanu, atau sekitar 1-2 jam jika ditempuh dengan jalur darat.', '-9.17708', '124.47911', '2022-10-07 11:21:49', '2023-01-12 14:24:54'),
(29, 'Gua Maria Bitauni', 'Gua Maria di Bukit Bitauni yang berjarak kurang lebih 28 kilometer dari Kefamenanu, ibu kota Kabupaten Timor Tengah Utara,Terletak di sebuah bukit batu yang ditutupi hutan tropis dan di bawahnya pohon beringin dan pohon-pohon pelindung lainnya menambah suasana hening dan khidmat untuk berdoa. Untuk mencapai Gua Maria Bitauni, peziarah harus menaiki beberapa anak tangga', '-9.44904', '124.67174', '2022-10-07 12:06:09', '2023-01-12 03:24:43'),
(30, 'Kampung Adat Maslete', 'Rumah tradisional Suku Atoni yang keasliannya masih terpelihara dapat ditemukan di Desa Maslete, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur. Rumah tradisional Suku Atoni di pemukiman adat ini yang menjadi objek ada tiga jenis yakni Sonaf Nis None, Ume Kbubu dan Lopo.', '-9.3264', '124.746', '2022-10-07 12:31:35', '2023-01-12 03:22:09'),
(31, 'Kampung Adat Tamkesi', 'Secara administratif, kampung adat Tamkesi ini berada di Desa Tautpah, Kecamatan Biboki Selatan, Kabupaten Timor Tengah Utara.Dari kota Kefa yang menjadi ibu kota Kabupaten TTU membutuhkan 1 jam perjalanan', '-9.32674', '124.74614', '2022-10-07 12:52:27', '2023-01-12 03:17:42'),
(32, 'Istana Raja Oelolok', 'Makam Raja Taolin terletak tepat dibelakang Istana yang berada di Desa Oelolok,Kabupaten Timur Tengah Utara. Kerajaan Insana yang berpusat di daerah Oelolok pada masa kejayaannya dikenal dengan pemerintahan', '-9.47278', '124.69738', '2022-10-07 15:21:55', '2023-01-12 03:15:23'),
(33, 'Kure Noemuti', 'Kure noemuti terletak di Noemuti, Kote Kec. Noemuti, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur,Untuk menyambut Paskah, 18 pemangku suku adat di Noemuti Kote  selalu menyelenggarakan tradisi kure. Ke-18 suku adat tersebut adalah suku Salem, Meol, Neonbanu, Helo, Kosat, Silab, Mandosa, Meko, Oetkuni, Taesmuti, Menbam, Uskono, Vios, Woesala, Laot, Lopis, Nitjano, dan Manhitu.', '-9.57105', '124.48078', '2022-10-07 16:07:26', '2023-01-12 04:02:09'),
(44, 'Mercusuar Wini', 'Mercusuar, menara api, menara suar, atau menara angin adalah sebuah bangunan menara dengan sumber cahaya di puncaknya untuk membantu navigasi kapal laut. Sumber cahaya yang digunakan beragam mulai dari lampu sampai lensa dan (pada zaman dahulu) api.', '-9.17230', '124.48277', '2023-01-12 14:25:58', '2023-01-12 18:10:20'),
(45, 'Terminal Barang Internasional Wini', 'Terminal Barang adalah tempat untuk melakukan kegiatan bongkar muat barang, perpindahan intramoda dan antarmoda angkutan barang, konsolidasi barang/pusat kegiatan logistik, dan/atau tempat parkir mobil barang.', '-9.17400', '124.48721', '2023-01-12 14:26:38', '2023-01-12 18:09:30'),
(46, 'Gedung Serbaguna PLBN Wini', 'Gedung Serbaguna merupakan bangunan yang dapat dipergunakan oleh umum untuk berbagai macam kepentingan sesuai dengan kapasitas bangunannya. Gedung SerbaGuna dinilai sebagai salah satu kebutuhan yang perlu direncanakan. Hal ini untuk mendapatkan dampak-dampak yang positif secara intern maupun ekstern dari Gedung Serbaguna', '-9.17579', '124.48118', '2023-01-12 14:27:22', '2023-01-12 18:08:48'),
(47, 'Mes Pegawai PLBN Wini', 'Mes merupakan tempat penginapan bagi Pegawai yang bekerja di PLBN wini yang berbatasan langsung dengan Timor Leste, Motaain di Kabupaten Belu.', '-9.17670', '124.48203', '2023-01-12 14:27:59', '2023-01-12 18:07:58'),
(48, 'Kantor Pos Pelayanan Beacukai Wini', 'Kantor Pelayanan Utama Bea dan Cukai; atau Kantor Pengawasan dan Pelayanan Bea dan Cukai dalah Penyelenggara Pos pada suatu badan usaha yang menyelenggarakan pos. Barang dikirim melalui Penyelenggara Pos sesuai dengan peraturan perundang-undangan di bidang pos.', '-9.17579', '124.48843', '2023-01-12 17:23:17', '2023-01-12 18:06:49'),
(50, 'Puskesmas Oelolok', 'Salah satu layanan kesehatan yang paling mudah diakses masyarakat oelolok.', '-9.47228', '124.69958', '2023-01-12 17:25:03', '2023-01-12 18:04:25'),
(51, 'Pos Satgas Pamtas Oelbinose', 'Pos Satgas Pamtas Oelbinose merupakan pos jaga yang berada di desa oelbinose TTU.', '-9.46263', '124.27234', '2023-01-12 17:25:58', '2023-01-12 18:01:53'),
(53, 'Cagar Alam Gunung Mutis', 'Cagar Alam Gunung Mutis adalah sebuah cagar alam yang berada di pulau Timor barat, Provinsi Nusa Tenggara Timur, Indonesia. Cagar alam ini ditunjuk melalui surat keputusan Menteri Kehutanan', '-9.5828', '124.2360', '2023-01-12 17:27:28', '2023-01-12 18:00:32'),
(54, 'Nuaf Nefomasi', 'Nuaf adalah bukit menurut Atoen kuan atau antoen meto.', '-9.5351', '124.2322', '2023-01-12 17:28:06', '2023-01-12 17:59:44'),
(55, 'FLC Tamkesi TanganHarapan', 'belum isi', '-9.32760', '124.75165', '2023-01-12 17:29:02', '2023-01-12 17:29:02'),
(56, 'Apotik Deo Gratias Farma-Wini', 'Tempat meramu dan menjual obat berdasarkan resep dokter serta memperdagangkan barang medis', '-9.18426', '124.49010', '2023-01-12 17:30:04', '2023-01-12 17:58:50'),
(57, 'Kantor Pos Wini', 'Kantor pos adalah fasilitas fisik tidak bergerak untuk melayani penerimaan, pengumpulan, penyortiran, transmisi, dan pengantaran surat dan paket pos.', '-9.18255', '124.49090', '2023-01-12 17:30:36', '2023-01-12 17:57:55'),
(58, 'Gereja Paulus Wini', 'Gereja Paulus WIni  adalah gereja atau tempat berdoa untuk warga sekitaran wini', '-9.17975', '124.49901', '2023-01-12 17:31:14', '2023-01-12 17:57:03'),
(59, 'Paroki Fransiskus Xaverius', 'Paroki Fransiskus Xaverius adalah gereja atau tempat berdoa untuk warga sekitaran wini', '-9.18093', '124.49200', '2023-01-12 17:31:48', '2023-01-12 17:56:35'),
(60, 'Kios Arafah', 'Kios Arafat merupakan fasilitas penunjang objek wisata pantai wini jika hendak ingin berkunjung kesana.', '-9.18017', '124.49808', '2023-01-12 17:32:57', '2023-01-12 17:55:23'),
(61, 'RUMAH MAKAN SINAR WINI', 'Rumah makan sinar ini berada didekat pantai wini dan sekitaran wilayah wini', '-9.17975', '124.50078', '2023-01-12 17:33:27', '2023-01-12 17:54:18'),
(62, 'Resost Marjon', 'Penginapan di sekitar Pantai Wini dan sekitaran Wini', '-9.17975', '124.50078', '2023-01-12 17:34:28', '2023-01-12 17:34:28'),
(63, 'Kantor Desa Bitauni', 'Pusat pelayanan di desa yang menjadi central segala kegiatan yang ada di desa.', '-9.45077', '124.67493', '2023-01-12 17:36:27', '2023-01-12 17:36:27'),
(64, 'Toko Bulan Satu', 'Salah satu tokoh yag berada di Bitauni kabupaten TTU', '-9.44450', '124.68219', '2023-01-12 17:37:32', '2023-01-12 17:37:32'),
(65, 'Kios Timor Raya', 'Salah satu kios kecil yang berada dikabupaten TTU yang menunjang aktifitas atau kegiatan saat berkunjung ke Gua Maria Bitauni.', '-9.44907', '124.67035', '2023-01-12 17:38:36', '2023-01-12 17:38:36'),
(66, 'TPU Bitauni', 'TPU Bitauni merupakan tempat pemakaman umum bagi warga sekitaran Bitauni Kabupaten TTU', '-9.44988', '124.66792', '2023-01-12 17:39:37', '2023-01-12 17:39:37'),
(67, 'DHC Barbershop', 'DHC Barbershop merupakan salah satu tempat pangkas rambut yang berada tidak jauh dari kolam renang oeluan.', '-9.60953', '124.49176', '2023-01-12 17:41:12', '2023-01-12 17:41:12'),
(68, 'Loket Hutan Wisata', 'Loket Hitan Wisata Merupakan fasilitas pendukung yang ada di kolam renang oeluan, saat ingin berkunjung ke kolam renang oeluan maka wajib melapor dan membayar di loket tersebut.', '-9.60552', '124.49220', '2023-01-12 17:42:35', '2023-01-12 17:52:26'),
(69, 'Kapela Nunhala-Neobaun', 'Kapela Nunhala-Neobaun merupakan tempat religi atau tempat untuk berdoa setiap minggu bagi kepercayaan Katolik. Kapela ini di buka setiap  hari umumu ntuk semua orang yang ingin pergi berdoa. Letak kapela inni berada di sekitaran nunhala tidak jauh dari oeluan.', '-9.61515', '124.49175', '2023-01-12 17:44:59', '2023-01-12 17:44:59'),
(70, 'Kantor Desa Nunbaun', 'Kantro Desa Nunbaun adalah  pusat pelayanan di desa yang menjadi central segala kegiatan yang ada di desa nenobaun. kantor ini berada disekitaran nunbaun tidak jauh dari kolam renang oeluan.', '-9.62541', '124.49238', '2023-01-12 17:46:32', '2023-01-12 17:51:27'),
(71, 'Penguburan Umum', 'Penguburan umum merupakan tempat orang-orang meninggal disemayamkan.', '-9.63865', '124.49183', '2023-01-12 17:48:56', '2023-01-12 17:48:56'),
(72, 'Kantor desa Noemuti', 'kantor desa noemuti merupakan pusat pelayanan desa yang menjadi central segala kegiatan yang ada di desa.', '-9.63988', '124.49163', '2023-01-12 17:49:58', '2023-01-12 17:49:58'),
(73, 'Bank BRI', 'Bank BRI merupakan salah satu fasilitas penunjang yang berada di noemuti', '-9.6308', '124.4903', '2023-01-12 17:50:49', '2023-01-12 17:50:49'),
(74, 'PLBN WINI', 'hhhhhhhh', '-9.17708', '124.47911', '2023-01-15 13:55:05', '2023-01-15 13:55:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_restoran`
--

CREATE TABLE `tbl_restoran` (
  `id_restoran` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `nama_restoran` varchar(50) NOT NULL,
  `jumlah_meja` int(100) NOT NULL,
  `jumlah_kursi` int(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_restoran`
--

INSERT INTO `tbl_restoran` (`id_restoran`, `img`, `nama_restoran`, `jumlah_meja`, `jumlah_kursi`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'http://127.0.0.1:1010/revisi/100140//assets/images/fasilitas/restoran/1169087216.jpg', 'Restoran Livero', 13, 52, 'Jl.Eltari', '2023-03-16 04:25:35', '2023-03-16 04:25:35'),
(3, '', 'RM. Padang II a', 10, 40, 'Jl.Eltari', '2023-03-16 04:29:58', '2023-03-16 04:29:58'),
(4, '', 'RM. Padang II b', 9, 36, 'Jl.Eltari', '2023-03-16 04:30:45', '2023-03-16 04:30:45'),
(5, '', 'RM. Rana Minang', 7, 28, 'Jl.Eltari', '2023-03-16 04:31:33', '2023-03-16 04:31:33'),
(6, '', 'RM. Coto Makassar', 5, 30, 'Jl.Eltari', '2023-03-16 04:32:10', '2023-03-16 04:32:10'),
(7, '', 'RM. Padang Baru', 4, 20, 'Jl.Eltari', '2023-03-16 04:32:59', '2023-03-16 04:32:59'),
(8, '', 'RM. Santika Raya', 12, 66, 'Jl.Eltari', '2023-03-16 04:33:51', '2023-03-16 04:33:51'),
(9, '', 'RM. Pondok Dou', 6, 33, 'Jl.Eltari', '2023-03-16 04:34:32', '2023-03-16 04:34:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wisata`
--

CREATE TABLE `tbl_wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama_wisata` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_wisata` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_wisata`
--

INSERT INTO `tbl_wisata` (`id_wisata`, `id_kategori`, `id_lokasi`, `nama_wisata`, `deskripsi`, `foto_wisata`, `created_at`, `updated_at`) VALUES
(12, 11, 12, 'Pantai Wini', 'Pantai Wini merupakan satu-satunya pantai tempat wisata favorit masyarakat Timor Tengah Utara. Tempat wisata Pantai Wini adalah salah satu tempat wisata yang terletak di desa Humusu, Kecamatan Insana Utara, Kabupaten Timor Tengah Utara Provinsi Nusa Tenggara Timur. Berbatasan langsung dengan Distrik Oekusi, Timor Leste. Karena berada di pintu perbatasan Indonesia Timor Leste maka warga asing dari Timor leste pun sering berkunjung di Pantai Wini. Berdasarkan jenisnya, Wisata Pantai Wini ini termasuk ke dalam jenis wisata pantai. Pantai Wini merupakan objek wisata pantai andalan masyarakat Kabupaten Timor Tengah Utara karena memiliki keindahan pantai yang alami dengan hamparan pasir putih yang asri, udara pantai yang sejuk serta air lautnya yang dingin. Potensi Wisata Pantai Wini memiliki daya tarik yang sangat indah sehingga merupakan tujuan akhir pekan warga masyarakat untuk rekreasi. pemandangannya yang indah dengan pasir putihnya yang halus dan panjang di pesisir pantai menjadi daya tarik tersendiri bagi wisatawan untuk berkunjung di wisata Pantai Wini. Untuk sampai ke tempat wisata Pantai Wini kita akan sangat mudah dilalui dengan menggunakan kendaraan roda dua, kendaraan roda empat dan juga kendaraan roda enam. Bisa juga menggunakan kendaraan pribadi dan kendaraan umum. Kalau menggunakan ojek anda harus membayar Rp. 60.000 jika dari pusat ibu kota Kabupaten Timor Tengah Utara yaitu Kota Kefamenanu  dan jika menggunakan bus anda harus membayar Rp.25.000. Jika menggunkan mobil rental Anda akan membayar Rp.350.000 sehari. Untuk masuk ke lokasi Pantai Wini untuk sementara belum ada tiket atau karcis. \r\nartinya masuk gratis tanpa bayaran. Kondisi terkni di Pantai Wini memiliki fasilitas yang sudah sangat bagus. Ada spot foto di bibir pantai yang bertuliskan Pantai Wini membelakangi latar pantai sehingga pengunjung jadikan sebagai tempat berfoto. Ada juga pohon pohon besar sebagai tempat nongkrong serta tempat duduk. Di pohon-pohon besar ada tulisan-tulisan kecil yang menempel. Biasanya pengunjung suka berfoto dengan latar belakang tulisan-tulisan tersebut.\r\nMemiliki tempat mainan anak-anak seperti ayunan dan jungkit, jadi anak-anak kecil merasa terhibur selain mandi di laut dan bermain di pasir. Ada juga dua buah kamar mandi atau kamar ganti, dan WC yang bersih. Ada sebuah jembatan penghubung berukuran kecil, biasanya pengunjung suka berfoto-foto di jembatan ini ketika hendak memasuki area pantai ataupun saat keluar. Pengunjung atau wisatawan biasanya ramai pada hari sabtu dan minggu atau hari-hari libur. Mengapa hari sabtu karena sebagian pegawai ada yang bekerja hanya dari hari senin sampai jumat sehingga hari sabtu itu mereka memanfaatkan untuk berekreasi. Sedangkan pada hari minggu dan hari libur lainnya sangat ramai pengunjungnya karena aktifitas bekerja terhenti jadi pengunjung memanfaatkan waktu ini untuk berekreasi di Pantai Wini. Banyak orang  atau wisatawan yang selalu berkunjung ke pantai wini baik itu anak-anak maupun orang dewasa. Karena langsung berbatasan dengan Distrik Oekusi, Timor Leste maka pengunjung dari Timor Leste pun sering menikmati sajian alam Pantai Wini. Ada juga warga masyarakat dari Kabupaten tetangga Belu dan Malaka yang sering datang untuk berekreasi. Menjelang sore, wisatawan atau pengunjung akan berjalan-jalan di sepanjang bibir pantai untuk menikmati susana matahari terbenam yang eksotis. Jika Anda hendak berkunjung di Wisata Pantai Wini dan ingin bermalam di Wini maka ada salah satu hotel yang tersedia. Namanya adalah Resort Marjon. Jaraknya hanya sekitar 500m dari lokasi Pantai Wini.', 'Pantai Wini TTU.jpg', '2022-10-06 19:05:13', '2022-10-06 19:05:13'),
(13, 11, 13, 'Tanjung Bastian', 'Pantai Tanjung Bastian adalah nama yang disematkan sekitar abad ke-16 untuk sebuah tanjung di pantai, yang menyimpan sejuta cerita di masa lalu. Tempat ini menceritakan perjalanan manusia dengan latar belakang Pegunungan Kolboki dan Bastian di Pulau Timor, Nusa Tenggara Timur. Pantai Tanjung Bastian adalah pantai dengan hamparan pasir putih. Rentangan pasir mencapai sekitar seratus meter dengan air laut kristal. Bagi yang menyukai petualangan bisa mengunjungi Pantai Tanjung Bastian untuk menikmati panorama yang menakjubkan. Tak hanya memiliki alam yang bersahabat, pantai ini juga ditempati oleh penghuni yang ramah. Mereka menyambut semua wisatawan dan \nmeyakinkan mereka bahwa Pantai Tanjung Bastian adalah pantai yang aman.', 'TajungBastian.jpg', '2022-10-06 19:14:24', '2022-10-06 19:14:24'),
(15, 11, 14, 'Bukit Tuamese', 'Lokasi wisata di Pulau Timor Indonesia memang belum terlalu tekenal layaknya Bali, Yogyakarta, serta beberapa tempat yang lainnya. Padahal tersimpan kekayaan alam yang sungguh sangat luar biasa mengagumkan. Salah satunya ialah Bukit Tuamese yang berada di Desa Tuamese, Kecamatan Biboki Anleu. Warga sekitar menyebutnya dengan nama Raja Ampat karena memiliki hamparan alam seperti di sana dengan dihiasi beberapa pemandangan gundukan bukit yang sangat cantik. Pemandangan yang tersaji diantaranya sebuah danau yang berwarna kebiruan dipadupadankan dengan hijaunya perbukitan. Untuk menuju Puncak Bukit Tuamese memang harus mendaki sekitar 200 meter, namun trekking yang dilakukan tak begitu susah. Lokasi Bukit Wisata Tuamese terletak di Desa Tuamese, Kecamatan Biboki Anleu, Kabupaten Timor Tengah Utara, Provinsi Nusa Tenggara Timur.\nRute Menuju Bukit Wisata Tuamese Jika kamu bergerak dari luar kota dan menggunakan pesawat terbang dapat menuju Atambua, selanjutnya dengan melakukan perjalanan darat menuju Bukit Tuamese dengan estimasi waktu sekitar 1 jam perjalanan. Kondisi jalan menuju Bukit Wisata Tuamese dapat dilalui oleh kendaraan roda dua maupun roda empat. \nSesekali kamu akan menjumpai beberapa hewan ternak milik warga yang berlalu lalang di sepanjang jalan. Jika menggunakan kendaraan sendiri, baiknya jangan malu untuk bertanya pada warga sekitar yang kamu temui. Kamu akan menemukan persimpangan jalan, beloklah ke arah kanan menuju Manamas jika ke kiri akan menuju Timor Leste. Karena Atambua berada di perbatasan Negara Republik Demokratik Timor Leste. Setelah memakirkan kendaraan kamu harus melanjutkan menuju puncak bukit dengan menapaki beberapa anak tangga yang sudah disusun sedemikian rupa untuk memudahkan pengunjung. Namun, tangga tersebut tak akan membawamu hingga ke puncak bukit. Untuk selanjutnya kamu harus trekking mendaki bukit, meskipun tak terlalu tinggi tetapi cukup curam jadi kamu harus berhati-hati. Jam operasional Bukit Wisata Tuamese dibuka setiap hari Senin hingga Minggu selama 24 jam nonstop. Jadi kamu dapat datang kapan saja. Banyak pengunjung yang datang ketika sore hari, untuk dapat menikmati indahnya Sunset. Belum ada harga khusus untuk dapat menikmati keindahan di Bukit Wisata Tuamese alias gratis. Fasilitas umum yang ada di Bukit Wisata Tuamese terdiri dari Area parkir yang cukup luas dan Spot foto. Destinasi wisata yang satu ini memang belum begitu ramai dikunjungi wisatawan, namun pesona yang dihadirkan membuat siapa saja yang datang menjadi ketagihan. Berikut daya tarik yang dimiliki Bukit Wisata Tuamese yakni Menyaksikan Raja Ampat NTT Yang menjadi daya tarik pertama dari Bukit Wisata Tuamese ialah hamparan perbukitan yang menyerupai keindahan Raja Ampat di Papua. Perbukitan tersebut dihiasi dengan birunya air danau, serta terlihat bentangan laut lepas di ujung panorama alam. Terdapat beberapa bukit yang dapat kamu daki, view di setiap bukit akan berbeda-beda. Jika musim hujan tiba hijaunya pepohonan akan sangat tergambar jelas, sungguh indah sekali. Keindahan Bukit Tuamese pernah hadir dalam sebuah film garapan Ari Sihasale dengan dibintangi artis cantik Pevita Pearce. Sehingga membuat lokasi wisata yang satu ini semakin banyak dikunjungi para wisatawan. Indahnya Sunset Di salah satu puncak bukit kamu dapat bersantai sambil menunggu tenggelamnya matahari. Menyaksikan dengan mata kepala sendiri perubahan warna alam yang sangat menakjubkan. Hunting Spot Foto Di Bukit Wisata terdapat beberapa spot foto yang dapat kamu gunakan untuk berfoto, diantaranya Spot foto dengan lambang bentuk hatiSpot foto yang satu ini merupakan incaran pengunjung yang datang ke Bukit Tuamese, dengan bentuk hati yang cukup besar berwarna merah dihiasi latar belakang keindahan perbukitan serta birunya danau. Landmark Bukit Tuamese Spot selanjutnya berada di puncak bukit yang lainnya, dimana terdapat sebuah tulisan yang menjadi landmark destinasi wisata yang satu ini. Mengabadikan Sunset Agenda foto selanjutnya ialah mengabadikan keindahan sunset di Bukit Tuamese. Lokasi Bukit Wisata Tuamese sering juga digunakan untuk kegiatan pemotretan Prewedding, melihat keindahan alam selalu menjadi latar terbaik dari apapun juga. beberapa tips wisata untuk kamu yang hendak mengunjungi Bukit Wisata Tuamese yaitu Gunakan alas kaki yang nyaman dan tidak licin, Gunakan topi atau kacamata hitam untuk mengurangi paparan sinar matahari, Bawalah makanan atau minuman yang cukup sebagai bekal ketika berada di Bukit Tuamese, Berhati-hatilah ketika mendaki bukitnya,Jaga selalu kebersihan dan keasrian lokasi wisata yang satu ini,Hindari perbuatan yang dapat merugikan diri sendiri maupun orang lain,Siapkan gadget kamu untuk mengabadikan keindahan Bukit Wisata Tuamese. Bukit Tuamese merupakan salah satu destinasi wisata yang harus kamu kunjungi ketika berada di Nusa Tenggara Timur (NTT). Alamnya yang masih sangat asri membuat hati menjadi lebih damai dan tenang.', 'tuamese.jpg', '2022-10-06 19:27:00', '2022-10-06 19:27:00'),
(21, 14, 15, 'Bukit Cinta Huameni\'Ana', 'Taman Wisata Bukit Cinta Haumeniana, Satgas Pamtas RI-RDTL Yonif 132/BS, Berikan Untuk Masyarakat Perbatasan Wujud kecintaan TNI kepada masyarakat, anggota Pos Haumeniana Satgas Pamtas RI-RDTL Yonif 132/BS, resmikan Taman Wisata Bukit Cinta untuk di berikan kepada masyarakat perbatasan yang ada di desa Haumeniana, Kecamatan Bikomi Ninulat, Kabupaten Timor Tengah Utara (TTU), Tempat yang merupakan perbatasan RI-RDTL tersebut, Pos Haumeniana manfaatkan lahan tepat di depan Pos menjadi Taman Wisata Negeri di atas Awan yang menarik masyarakat NTT, sehingga menjadikan desa tersebut \nsebagai desa wisata yang menjadi salah satu tujuan bagi masyarakat NTT. Dilain tempat, Dan satgas Pamtas RI-RDTL Yonif 132/BS Letkol Inf Wisyudha Utama menyampaikan, peresmian taman wisata ini merupakan wujud kecintaan TNI Satgas Yonif 132/BS, kepada masyaraakat yang ada di perbatasan, untuk selalu menjalin silahturahmi yang baik, dan selalu harmonis. Ide ini berawal dari Danpos Haumeniana Letda Inf Zulkifli menyampaikan ke anggota untuk membuat taman untuk masyarakat, dan ide ini di respon langsung oleh anggota bahwa setuju membuat Taman Bukit Cinta di perbatasan Indonesia dan Timor Leste. Sementara itu juga, dengan adanya taman wisata ini, masyarakat yang ada di perbatasan dapat rekreasi menghilangkan penat dan menikmati ke indahan sebuah taman yang didirikan, banyak masyarakat sebut Taman Wisata Bukit Cinta Negeri di atas Awan. Danpos Haumeniana Letda Inf Zulkifli menyampaikan, baru hari ini kita resmikan banyak masyarakat yang penasaran, \nantusias untuk melihat dan menikmati pemandangan dan berfoto-foto di taman wisata ini. Tidak hanya masyarakat Indonesia yang mengunjungi taman wisata ini, masyarakat dari Timor Leste juga ikut berkunjung di taman wisata bukit cinta perbatasan RI-RDTL yang baru diresmikan. Pos Haumeniana yang telah memberikan taman wisata ini, dan membuat desa Haumeniana menjadi desa wisata yang indah.', 'bukitcinta-haumeniana.jpg', '2022-10-06 19:59:02', '2022-10-06 19:59:02'),
(22, 14, 16, 'Bukit Cinta Oelbinose', 'Menangkap Keindahan Alam Bukit Cinta Oelbinose, NTT Sebagai Potensi Wisata\r\nZaman Now” sinyal telepon menjadi salah satu hal yang paling dicari, apalagi saat singgah atau berjalan ke wilayah pedalaman atau pedesaan. Inilah salah satu tempat untuk mendapatkan sinyal bagi setiap orang yang hendak bepergian ke wilayah Kecamatan Mutis, Timor Tengah Utara, Nusa Tenggara Timur. Bukit Cinta Oelbinose namanya.Sebelumnya bukit ini bernama bukit Kael. Kemudian karena sering digunakan untuk mencari sinyal \r\nuntuk menelpon keluarga, kekasih, sahabat untuk sekedar melepas rindu dan lelah maka diberi nama“Bukit Cinta“. Letaknya di wilayah Desa Tasinifu, Dusun Oelbinose, Kecamatan Mutis-TTU. Jarak dari pusat kota Kefamenanu sekitar 50 km. Bagi pengguna hp wilayah aplal, Dusun oelmuke dan dan desa Tasinifu jika ingin menelpon maka harus pergi ke bukit ini untuk mencari sinyal dan melakukan telepon. Di bukit ini juga dihiasi tempat berlindung berupa sebuah lopo kecil yang dibangun oleh Personil TNI Satgas Pamtas RI-RDTL Sektor Barat Pos Oelbinose. Tujuan dibangun lopo tersebut adalah sebagai tempat persinggahan dan tempat melepas lelah. Posisi lopo yang strategis seringkali dipakai sebagai arena mengabadikan foto kerena latar belakang tempat itu adalah Gunung Mutis. Ada juga yang foto selfie ketika tiba di tempat tersebut. Apalagi bagi pendatang baru.\r\nTempat yang begitu indah, bagi warga luar jika melewati tempat itu maka selalu mengabadikan foto. Pemandangan nan indah bisa digunakan sebagai tempat foto prawedding bagi pasangan yang ingin menikah. Bukit cinta ini juga dipakai sebagai tempat perkemahan bagi komunitas pencinta alam. Salah satu komunitas pencinta alam yang giat mengunjungi tempat wisata alam yaitu KOMPAK (Komunitas Pencinta Alam Kefamenanu).\r\nMenurut cerita masyarakat yang tinggal di wilayah itu mengatakan bahwa yang memberi nama tempat itu adalah Pak Tentara Mereka, Karena mereka kesulitan berkomunikasi menggunakan hp karena tidak ada sinyal. Kenapa Bukit Cinta ? Karena melalui tempat itu Pasukan TNI yang bertugas di wilayah itu dapat melepas rindu dengan keluarga dengan hubungan telepon seluler. Tetapi bagi warga sekitar juga selalu memanfaatkan tempat itu untuk melepas rindu dengan Sahabat, keluarga, kenalan dan lain sebagainya.\r\nSeiring berkembangnya IPTEK, di wilayah Kecamatan Mutis sudah dipasang Pemancar Telekomunikasi sehingga memudahkan masyarakat untuk berkomunikasi. Kini masyarakat di wilayah tersebut sudah tidak pergi ke Bukit tersebut lantaran sudah dipasang pemancar Telkomsel di Kecamatan Mutis. Jadi di rumah sudah bisa mendapat sinyal dan bisa telepon, ungkap beberapa warga masyarakat desa.', 'bukit-cinta-oelbinose.jpg', '2022-10-06 20:19:01', '2022-10-06 20:19:01'),
(24, 11, 17, 'Bukit Manufonu', 'Bukit manufonu atau sering disebut dengan puncak bukit kemerdekaan. Sejumlah pemuda di Desa Manufonu, Kecamatan Insana Utara, \r\nKabupaten Timor Tengah Utara (TTU), Nusa Tenggara Timur (NTT), punya cara sendiri menggelar upacara bendera dalam rangka HUT ke-67 Republik Indonesia. Para pemuda yang tinggal berbatasan langsung dengan wilayah Distrik Oekusi, Timor Leste itu melangsungkan upacara di puncak bukit terjal. Tak mudah untuk sampai ke puncak bukit itu, karena harus melintasi jalan yang curam dan licin, Ketua Pemuda Desa Manufonu mengatakan, upacara itu digelar Selasa (17/8/2021) pagi sekitar pukul 09.00 Wita dan dihadiri 50 orang, dari gabungan pemuda, TNI dan Polri. Aurelius menuturkan, sebagai penggagas upacara itu dia bersama pemuda lainnya sudah melakukan persiapan selama dua pekan. \r\nPersiapan itu, kata dia, di antaranya menyurvei lokasi bukit dan juga mengumpulkan dana dari masyarakat sekitar. Awalnya mendaki beberapa bukit untuk lokasi pemasangan bendera, tapi ketika melihat, bukit ini pas, karena bisa terlihat di seluruh wilayah perbatasan, dengan menambal jalan yang berlubang menggunakan pasir untuk setiap mengendara yang melintas, memberi sumbangan, Dana iuran digunakan beli bendera Dana yang terkumpul sebesar Rp 2 juta, kemudian digunakan untuk membeli bendera dengan ukuran panjang 4 meter dan lebar 3 meter. Mereka juga membeli tiang penyangga untuk bendera. Termasuk juga untuk konsumsi makan dan minum, serta pita merah putih bagi peserta yang hadir. \r\ndi bukit itu, baru pertama digelar upacara bendera dan juga pengibaran bendera, sehingga mereka pun menyebut bukit itu sebagai \"Bukit Kemerdekaan\". Untuk jalan menuju puncak bukit cukup sulit, tetapi masih bisa didaki. Hanya ada beberapa titik yang curam. Antusias para pemuda untuk mengikuti acara itu sangat besar. Sedianya kata Aurelius, 80 orang akan hadir dalam upacara itu. Namun, karena saat ini pandemi Covid-19, sehingga Kapolsek setempat, hanya memberikan izin upacara itu dihadiri 50 orang. Selain itu, mereka juga ingin agar ada nuansa perjuangan, dengan pendakian ke arah bukit yang cukup sulit dijangkau. Dengan kegiatan itu, memupuk jiwa \r\ndan semangat patriot dalam menjaga dan membangun wilayah perbatasan. ', 'puncakmanufonu puncak-kemerdekaan.jpg', '2022-10-06 20:40:18', '2022-10-06 20:40:18'),
(25, 11, 18, 'Pantai Oebubun', 'Pantai Oebubun merupakan salah satu wisata pantai yang terletak di Desa Oepuah Utara, Kecamatan Biboki Moenleu, Kabupaten Timor Tengah Utara (TTU), Provinsi Nusa Tenggara Timur (NTT). Jarak dari pusat ibu kota Kabupaten sekitar kurang lebih 75 Km. Akses ke wisata pantai Oebubun memang sangat jauh, kita akan melewati jalan berkelok mulai dari Kota Kefamenanu hingga ke pantai Utara Wini. Ke Oebubun bisa menggunakan kendaraan roda dua, empat ataupun enam. Belum ada tiket atau karcis untuk masuk ke lokasi. Pengunjung yang sering berkunjung ke pantai oebubun itu mulai dari anak-anak sampai orang dewasa. Pantai dengan panorama pegunungan indah yang menghadap ke pantai menjadikan pantai ini  memiliki daya tarik tersendiri dan menjadi objek wisata yang sering dikunjungi oleh wisatawan baik lokal maupun mancanegara. Selain sebagai objek wisata, pantai ini juga memiliki potensi laut yang memiliki nilai ekonomi seperti ikan, tambak dan garam. Masyarakat yang tinggal di pesisir pantai masih melaut dengan cara yang tradisional untuk menangkap ikan dan membuat garam. Keelokan lautnya yang biru merona dengan pasir halus di tepian membentang sepanjang pantai menggoda penglihatan wisatawan. Pantai ini sangat menjanjikan dari sisi pariwisata baik pantainya, perikanannya, pemandangan bawah lautnya dan bukitnya. Pantauan media, setiap harinya masyarakat pesisir menghabiskan waktunya untuk melaut. Jenis transportasi untuk melaut yang mereka gunakan yaitu katiting dan lamparan. Para nelayanpun tidak perlu jauh-jauh harus ke kota untuk menjual hasil tangkapannya, tetapi para pembeli (papalele) baik dari Kefa maupun atambua langsung datang menemui nelayan di pantai untuk transaksi. Pemerintah Kabupaten TTU perlu mendukung pengembangan kawasan pariwisata dan dan peningkatan ekonomi masyarakat di pesisir pantai oebubun dengan membenahi infrastruktur jalan masuk dan menyediakan miniatur di lokasi wisata agar memperindah pantai sebagai objek wisata dan menarik wisatawa untuk masuk ke TTU baik lokal maupun mancanegara. ', 'pantai-oebubun.jpg', '2022-10-06 20:43:37', '2022-10-06 20:43:37'),
(26, 11, 19, 'Pantai Faularan', 'Pantai Faularan belum banyak yang mengetahui, bahkan mungkin bisa dibilang masih perawan. Hanya beberapa orang dari Atambua yang mengetahui tempat wisata ini. Pantai ini tidak jauh dari bukit Tuamese. Pantai yang indah ini sangat perawan, bahkan, saat saya ke sana, tidak ada wisatawan sama sekali yang sedang menikmati keindahannya. Pantainya berpasir abu-abu dengan ombak yang tidak terlalu besar. Tidak terlihat sampah di pantai Faularan. Saya hanya bisa sampaikan bahwa pantai ini sangat indah. Cuacanya hangat dengan hembusan angin yang sejuk, sangat cocok untuk menikmati pemandangan hingga matahari terbenam.', 'faularan.jpg', '2022-10-06 20:52:24', '2022-10-06 20:52:24'),
(27, 11, 20, 'Gunung Mutis', 'Bagi yang hobi bertualang, Gunung Mutis bisa menjadi alternatif pilihan wisatanya. Gunung ini memiliki panorama luar biasa indah sehingga membuat pengunjung betah menghabiskan waktu berlama-lama di puncak. Menurut Legenda yang berkembang, Puncak Mutis merupakan tempat dimana para raja-raja Timor membahas dan membagi wilayah kekuasaan. Ketika semua raja telah mendapat wilayahnya masing-masing maka berkatalah mereka Mutis yang berarti lengkap. Gunung Mutis sendiri memilki tiga puncak yakni Nuaf Muna, Nuaf Nefomasi dan Nuaf Nupala. Area sekitar gunung ini merupakan kawasan hutan yang banyak ditumbuhi tanaman ampupu dan cendana. Kemudian meskipun tak banyak, namun di area ini pun tumbuh tanaman lainnya semisal paku-pakuan serta bonsai. Secara administratif, Gunbung mutis berada di di Kecamatan Fatumnasi dan Kecamatan Tobu Kabupaten Timor Tengah Selatan, Provinsi Nusa Tenggara Timur. Lokasi gunung Mutis, dari kota kupang sekitar 150 km. Untuk mendaki Wisata Timor Tengah Selatan gunung Mutis ini, pengunjung tidak dikenakan Biaya tiket masuk. Bagi wisatawan yang hendak berkunjung ke gunung Mutis harus menjuju ke Kota Soe dulu. Jika dari Kupang perjalalan akan memakan waktu sekitar 3-4 jam. Jarak Kota Soe ke Fatumnasi (gunung Mutis) sekitar 40 km. Waktu tempuh kalau tanpa berhenti-berhenti sekitar 3 jam. Waktunya jadi lama, karena medan jalan yang belum baik. Untuk berwisata di kawasan wisata Alam Fatumnasi NTT ini pengunjung tidak perlu mengkhawatirkan soal jam buka. Lokasi indah ini terbuka 24 jam untuk dikunjungi. Apalagi di sana ada penginapan, yang dikelola oleh kepala adat/ juru kunci gunung. Untuk mendaki gunung Mutis, pengunjung tidak dikenakan Biaya tiket masuk. Fasilitas yang bisa dijumpai kala berkunjung ke gunung Mutis adalah Lopo Mutis, yaitu penginapan berupa rumah-rumah bulat dan di dalamnya ada ranjang-ranjang berkelambu. Penginapan ini berada di Desa Fatumnasi yang memiliki udara cukup dingin. Maka dari itu jangan lupa kenakan jaket, kaos kaki tebal dan kupluk sebagai pelindung. memiliki daya tarik seperti pendakian yang menyenangkan dengan Tingkat kesulitan pendakian Gunung mutis, tergolong  ringan hingga moderat. Siapa pun bisa mendaki Gunung Mutis asal berbadan sehat dan kondisi bugar. Latihan fisik standar sebelum berangkat tentu akan membuat lebih enjoy saat pendakian. Trekking pole tidak terlalu dibutuhkan. Sebelum mencapai puncak gunung, pendaki akan melalui dataran Leol Fui terlebih dahulu. Di wilayah ini terdapat tanah yang lapang serta padang rumput hijau yang luas. Dengan kondisi itu membuatnya sangat cocok untuk dijadikan sebagi tempat mendirikan tenda. Dan ternyata dari area padang Padang Leol Fui ini, pendaki bisa melihat puncak mutis dengan jelas. Kemudian, di kaki gunung mutis yakni di desa Nenas juga terdapat pemukiman warga yang bisa dijadikan sebagi tempat untuk bermalam. Terlebih warganya cukup ramah dan akan dengan senang hati menjadi guide pendakian. Selama, perjalanan menuju puncak Mutis, pendaki akan disuguhkan oleh pemandangan yang sangat eksotis, berselimutkan kabut. Perkebunan serta ladang-ladang penduduk yang tertata dengan apik akan membuat pendakian terasa menyenangkan. Sesampainya di Puncak pula, para pendaki juga bisa langsung menyaksikan pulau-pulau yang ada di sekitar Pulau Timor. Diantaranya Pulau Alor serta Oekusi Timor Leste. Dan yang paling spesial tentu saja panorama terbitnya matahari yang sungguh mempesona.', 'gunung-mutis.jpg', '2022-10-06 20:57:21', '2022-10-06 20:57:21'),
(28, 11, 21, 'Padang Popekano Mamsena', 'Padang Rumput Popekano atau sering disebut Padang Mamsena adalah salah satu tempat wisata alam yang berada di Kabupaten Timor Tengah Utara, Kefamenanu. \r\nKota Kefamenanu merupakan salah satu kota yang terletak di tengah Pulau Timor. Tempat wisata ini ramai wisatawan pada hari hari biasa maupun pada weekand \r\natau hari libur. Tempat sangat indah dan bisa memberikan suasana yang memberikan sensasi yang berbeda dengan aktivitas yang anda lakukan biasanya. Padang Rumput Mamsena ini membentuk hamparan rumput yang luas dan disebut dengan padang rumput semi alami. Padang Rumput Mamsena terletak  di  Desa Letneo Selatan, Kecamatan Insana Barat, Kabupaten TTU. Lokasi padang rumput yang berjarak kurang lebih 20 km dari kota Kefamenanu, ibu kota kabupaten TTU tersebut memiliki rerumputan yang hijau. Disekitarnya, dikelilingi oleh pepohonan yang rindang  sehingga pengunjung yang suka ber-selfi dijamin terpuaskan. Untuk mencapai lokasi tersebut, pengunjung tak perlu khwatir karena  Pemerintah Desa Letneo Selatan telah membuka akses jalan baru menuju lokasi tersebut. Kota Kefamenanu memiliki banyak beberapa tempat wisata alam salah satunya wisata Padang Rumput Popekano merupakan tempat wisata yang harus anda kunjungi karena pesona keindahannya tidak ada duanya. Padang Rumput atau savana Popekano adalah padang rumput dengan luas belasan hektar yang memiliki hamparan rumput yang luas. Padang Rumput Popekano merupakan lokasi yang dipilih dalam pengelolaan sebagai habitat bagi para satwa termasuk ternak sapi dan kambing milik warga desa setempat dalam merumput / mencari makan, dimana para pengunjung bisa menjumpai ataupun mengamati kawanan ternak tersebut diwaktu pagi sekitar pukul 06.00 WIB – 09.00 WIB atau sore hari sekitar pukul 15.30 WIB – 17.00WIB. Musim terbaik saat anda mengunjungi tempat ini adalah saat musim penghujan dimana rerumputan berwarna hijau segar dan udara yang sejuk. Untuk mengunjungi lokasi wisata Padang Rumput Popekano anda bisa menggunakan  mobil pribadi, atau kendaraan roda dua atau juga bisa menyewa jasa \'ojek\' dari kota Kefa. Anda bisa menyusuri jalanan menuju Mamsena dengan lebih mudah karena jalannya sudah diperbaiki pemerintah desa setempat.', 'padang popekano mamsena 3.jpg', '2022-10-06 21:06:02', '2022-10-06 21:06:02'),
(29, 11, 22, 'Air Terjun 5 Tingkat Bi\'Aki', 'Letak Air Terjun Bi’Aki di Desa Naekake B, Kecamatan Mutis, Kabupaten Timor Tengah Utara.Atau 60an kilometer arah barat Kota Kefamenanu, ibukota Kabupaten TTU.\r\nNamun sayang, untuk menuju ke lokasi air terjun Bi’Aki belum ada akses jalan, sehingga tidak bisa mengunakan kendaraan mobil ataupun sepeda motor. Jadi wisatawan yang ingin kesana harus berjalan kaki sekitar 4 kilo meter dari perumahan warga.', 'Air-Terjun-5-Tingkat.jpg', '2022-10-06 22:10:56', '2022-10-08 01:56:24'),
(30, 11, 23, 'Air Terjun Pahkoto', 'Air terjun Pahkoto terletak di dusun Oelmuke, Desa Tasinifu, Kecamatan Mutis Kabupaten Timor Tengah Utara (TTU) Nusa Tenggara Timur. Menggunakan kendaraan menuju arah Eban dengan akses jalan yang cukup baik. Dilanjutkan dengan melewati jalan yang berlubang dan tidak begitu baik. Perjalanan memakan waktu sekitar 60-90 menit dari Kota Kefamenanu. Karena tidak ada petunjuk, sebaiknya jangan sungkan untuk bertanya bila beremu orang di jalan. Tiba di sana, kendaraan harus diparkir di pinggir jalan. Kemudian berjalan kaki melewati SD Kecil Oelmuke menuju air terjun sekitar 60-70 menit berjalan kaki. Sumber air terjun Pahkoto berasal dari Gunung Babnain dan Bikekneno. Air terjun ini memiliki ketinggian balasan meter yang mengalir melewati dinding bebatuan keras berwarna hitam.', 'Air-terjun Pahkoto.jpg', '2022-10-06 23:04:59', '2022-10-06 23:04:59'),
(31, 11, 24, 'Air Terjun Besin', 'Lokasi air terjun tersebut berjarak sekitar 50 km dari kota Kefamenanu dan dapat ditempuh dengan menggunakan kendaraan roda dua dan empat selama kurang lebih 90 menit. Akses jalan ke lokasi objek wisata yang berada di tengah hutan tersebut masih berupa jalan yang berbatu. Air terjun 3 tingkat tersebut terdapat di Desa Loeram, Kecamatan Insana dengan tinggi tingkat yang pertama kurang lebih 5 meter dari permukaan tanah dan lebarnya 4 meter serta kedalamannya  sekitar 1 meter sehingga cocok buat anak– anak. Sedangkan tingkat yang kedua tinggi air terjun kurang lebih 5 meter dengan lebar 6 meter dan kedalaman hingga 2 meter. Tingkat ketiga tingginya bahkan mencapai 7 meter dan lebarnya hanya 3 meter serta kedalaman mencapai 3 meter. Untuk mencapai setiap tingkatan, pengunjung harus berhati-hati lantaran harus berjalan di atas bebatuan yang licin serta harus menuruni tangga yang dibuat oleh warga setempat. Bagi pengunjung yang lupa membawa bekal atau berkeinginan mencicipi pangan lokal, di sekitar lokasi air terjun terdapat jualan pangan lokal dan kelapa muda yang disiapkan warga.', 'Air-Terjun-Besin.jpg', '2022-10-07 00:08:17', '2022-10-07 00:08:17'),
(32, 14, 25, 'Kolam Renang Oeluan', 'Oeluan merupakan salah satu objek wisata yang terletak di Kefamenanu , khususnya di Bijeli ,kabupaten Timor Tengah Utara ,yang berjarak 20 km dari pusat kota. Oeluan sendiri memiliki banyak sekali view wisata yang sangat menarik dalam satu lokasi, mulai dari kolam renang, hutan wisata, sumber mata air, air terjun, rumah pohon dan sepeda gantung. Nama oeluan sendiri merupakan suatu istilah yang berasal dari 2 kata yang berbeda,yang dalam bahasa dawan yang artinya \"oe\" adalah air dan\"luan\" yang merupakan nama dari seorang nenek moyang dahulu kala,bernama Luan.Jadi secara sederhana oeluan merupakan air dari nenek luan. Untuk objek kolam renang sendiri terbagi menjadi 2 bagian,ada yang untuk anak-anak ( kedalaman 1m) dan untuk orang dewasa ( kedalaman 2 dan 3 m).Dalam kolam renang ini sendiri di lengkapi dengan beberapa fasilitas yang di sediakan oleh dinas pariwisata setempat seperti ayunan,lopo dan ada beberapa tempat penginapan serta wc umum yang bisa di gunakan oleh setiap pengunjung yang berkunjung ke tempat tersebut.Untuk spot hutan wisata,rumah pohon,mata air dan air terjun terletak di belakang kolam renang yang berjarak  2 km dari tempat tersebut.  Dalam kawasan tersebut, dipenuhi dengan pepohonan yang tinggi, terdapat rumah panggung yang di bangun pada 2019 yang lalu dan di resmikan pada tahun 2021 ini yang di hadiri oleh bapak gubernur NTT Victor Laiskodat bersama jajarannya dari kota Kupang.Untuk tiket masuk ke wisata oeluan sendiri di kenakan tarif Rp.3.000,00 per jiwa ( orang dewasa dan anak-anak) dan untuk ongkos masuk kendara di kenakan tarif yang berbeda.Sepeda motor di kenakan tarif Rp.3.000,00,mobil pribadi atau  angkutan umum ) di kenakan tarif Rp.20.000,00 sedangkan bus di kenakan tarif Rp.30.000,00 per jiwa. objek wisata oeluan sendiri sesungguhnya memberikan suatu sugguhan wisata yang sangat menarik bagi masyarakat di kabupaten Timor Tengah Utara dengan pesona wisata alam yang sangat indah dan mampu memukau para pengunjungnya untuk mau berkunjung lagi ke wisata ini karena sangat membantu masyarakat dalam menghadapi kepenakan ataupun kebosanan dalam melangsungkan aktivitas nya sehari-hari,sehingga dengan adanya objek wisata ini sendiri orang-orang bisa berdatangan dengan keluarga,sahabat,teman,pacar ataupun rekan kerja untuk sekedar berekreasi dan menghibur diri. Disisi lain, dengan adanya objek wisata ini, sesungguhnya menguntungkan masyarakat sekitar yang rumanya berada dalam satu lokasi yang sama, karena mereka akan lebih mudah untuk mendapatkan air untuk mengelola persawahan yang dimiliki tanpa membayar uang kepada dinas pariwisata terkait ( di berikan gratis).Selain itu pula, menurut saya ini merupakan suatu bentuk strategi dari pemerintah khusnya Pemda TTU dan Dinas Pariwisata untuk mengeksplor wisata alam oeluan agar semakin di kenal khalayak umum dan juga memberikan sebuah identitas tersendiri bagi masyarakat TTU bawasannya mereka memiliki suatu objek wisata yang layak untuk di kenal banyak pihak dari luar. Keindahan dan corak serta desain yang di bangun dari lokasi wisata ini membuat orang-orang ingin kembali dan menikmati pesonanya.Tidak jarang juga banyak orang yang berdatangan dan menggunakan objek wisata ini untuk melakukan preweding dan menjadikan ini sebaga suatu objek untuk berfotoria dan memuatnya di media sosial. Keanekaragaman dalam suatu objek wisata tertentu,pastinya selalu memiliki keunikan dan ciri khas nya tersendiri,sebab merupakan suatu identitas dari objek tersebut.Dengan demikian, objek wisata oeluan sebenarnya hadir di tengah masyarakat untuk membantu masyarakat dalam memenuhi atau melepaskan kepenatan bersama orang-orang yang di cintai seperti keluarga,pacar,saudara dll.Maka dari itu, sudah kewajiban kita untuk tetap menjaga,melestarikan dan melindungi wisata tersebut agar tidak di rusak ataupun di hacurkan keindahannya oleh pihak-pihak yang tidak bertanggung jawab terhadap keindahan alam dan sekitarnya. ', 'oeluan-3.jpg', '2022-10-07 00:09:38', '2022-10-07 00:09:38'),
(33, 14, 27, 'Jembatan Gantung  Noepesu', 'Mewujudkan mimpi warga perbatasan akan hadirnya jembatan untuk memperlancar akses transportasi, Satgas Yonif 132/BS membangun jembatan gantung yang menghubungkan dua kabupaten di NTT. kehadiran jembatan gantung yang diberi nama Jembatan Gantung Bima Sakti ini, merupakan wujud  pengabdian Satgas Yonif 132/BS bagi masyarakat perbatasan RI-RDTL, yang telah bertahun-tahun memimpikan keberadaan jembatan tersebut dan juga sebagai implementasi salah satu butir pada 8 Wajib TNI yaitu Menjadi Contoh dan Mempelopori Usaha-usaha Untuk Mengatasi Kesulitan Rakyat Sekelilingnya. Jembatan ini menghubungkan Desa Noepesu di Kabupaten Timor Tengah Utara dengan Desa Bonleu di Timor Tengah Selatan. Semoga dengan hadirnya jembatan ini, akan lebih memudahkan dan memperlancar  akses transportasi dan mewujudkan mimpi para warga selama ini,jembatan gantung dengan panjang antara 80 meter dan lebar 1,2 meter dan dibangun di atas Sungai Noebesi.', 'jmbtngntung-noepesu.jpg', '2022-10-07 11:10:32', '2022-10-07 11:10:32'),
(34, 14, 28, 'Pos Lintas Wini', 'Mengunjungi Kabupaten Timor Tengah Utara (TTU), belum lengkap rasanya jika tak singgah ke Pos Lintas Batas Negara (PLBN) Wini. Terletak di Desa Humusu C, Kecamatan Insana Utara, Kabupaten TTU, PLBN Wini terletak sekitar 48,4 km dari Kota Kefamenanu, atau sekitar 1-2 jam jika ditempuh dengan jalur darat. PLBN Wini diresmikan bersamaan dengan peresmian Bendungan Raknamo di Kupang dan PLBN Motamasin pada tanggal 18 Januari 2018. Jadi, dengan dibangunnya PLBN Wini menjadi ikon masyarakat Timor Tengah Utara (TTU), khususnya yang berada di Kecamatan Insana Utara, yang mana nilai jual dari daerah Insana Utara adalah pantai dan pegunungan sehingga dengan hadirnya PLBN Wini menjadi daya tarik bagi pencinta wisata, baik yang berada di dalam negeri maupun luar negeri, terutama negara Timor Leste. Memasuki pintu gerbang PLBN Wini, akan disambut dengan tulisan \'Wini Indonesia\' berwarna merah dan putih. Adapun tulisan ini menjadi ikon PLBN Wini, yang juga sering jadi spot selfie para pengunjung. Memiliki luas lahan sekitar 4,42 hektare dengan luas bangunan 5.025,68 meter persegi, PLBN Wini juga memiliki berbagai fasilitas mulai dari pelayanan imigrasi hingga pemeriksaan barang. Tak hanya itu, PLBN Wini dilengkapi dengan fasilitas wisma yang ditujukan untuk pengunjung hingga tamu yang ingin menginap.  Untuk fasilitas, di PLBN Wini ini sudah ada pelayanan untuk barang, pelayanan orang ada imigrasi, ada layanan pemeriksaan karantina yang didukung oleh Satgas Pamtas RI-RDTL, PLBN Wini juga menyediakan wisma yang dilengkapi kamar, kamar mandi dengan shower, hingga fasilitas rapat. Selama ini kita buka untuk umum, selama mau menginap bisa. Saat ini masih belum dikenakan biaya. Namun, untuk ke depannya akan kemungkinan akan dikenakan tarif sekitar Rp 300 ribu per malam. untuk melihat kecantikan PLBN Wini mulai beroperasi dari pukul 08.00-12.00 WITA, lalu dilanjutkan dari pukul 13.00-16.00 WINI. Biasanya, PLBN Wini ramai dikunjungi pada hari-hari libur dan weekend. Selain melihat kemegahan PLBN Wini, Anda juga bisa selfie di halaman PLBN Wini. Pasalnya, halaman PLBN Wini juga dilengkapi dengan pepohonan dan bunga-bunga yang juga bisa jadi spot selfie. Untuk wisata, syaratnya yaitu meminta izin kepada security yang bertugas, lalu wisatawan dapat berkeliling dan foto-foto. Untuk kunjungan, teman-teman yang wisata juga tidak ada waktu. Cuma kalau sudah jam 18.00 WITA, PLBN tutup. Kalau ramai wisatawan biasanya hari Sabtu dan Minggu, dan hari libur. Hadirnya PLBN Wini sebagai wisata memang dirasakan oleh masyarakat sekitar. Salah satunya seperti Wilhelmus dan keluarga yang berkunjung untuk sekadar selfie dan jalan-jalan. Tak hanya menjadi tempat selfie, kehadiran PLBN Wini juga mempermudah masyarakat dalam melakukan transaksi. Sebab, saat ini PLBN Wini telah dilengkapi dengan outlet money changer dan ATM dari BRI. Dengan demikian, masyarakat bisa dengan mudah menukar dollar dan melakukan transaksi perbankan seperti tarik tunai hingga transfer. Hingga saat ini, Kepala Unit BRI Wini Florianus Primus menyebut transaksi penukaran dollar di sana telah mencapai lebih dari US$ 5.000. ', 'PLBN wini.jpg', '2022-10-07 11:51:15', '2022-10-07 12:55:03'),
(35, 12, 29, 'Gua Maria Bitauni', 'Gua ini terletak di Kabupaten Kefamenanu. Tepatnya di sebuah bukit batu yang tertutup hutan tropis. Biasanya gua ini dikunjungi oleh Umat Kristiani yang ingin memanjatkan doa. Dikutip dari laman Tourism NTT, awalnya gua ini merupakan gua keramat Ustauni yang kemudian dijadikan benteng pertahanan oleh Suku Aplasi (Silab Aplasi), Taolin, Pakaenoni dan Tutpai. Gua ini digunakan sebagai tempat untuk melaksanakan berbagai adat di daerah tersebut. Hingga saat ini, gua ini begitu dikenal dan menjadi daya tarik wisatawan untuk berkunjung ke Kefamenanu. Di dalamnya terdapat patung Bunda Maria dan tempat lilin untuk memanjatkan doa. Sambil lebih dekat dengan alam, para wisatawan rela datang dari jauh untuk memanjatkan doa kepada Bunda Maria. Untuk mencapai gua ini, Anda perlu melewati jarak sekira 34 kilometer dari kota. Waktu terbaik untuk melakukan wisata religi di sini adalah pada Mei hingga Oktober. Karena pada rentang waktu tersebut dilakukan prosesi jalan salib di waktu Paskah dan rosario. ', 'gua-maria-bitauni.jpg', '2022-10-07 12:20:55', '2022-10-07 12:20:55'),
(36, 12, 30, 'Kampung Adat Maslete', 'Sonaf Bikomi-Sanak merupakan salah satu wujud hasil kebudayaan yang dimiliki oleh masyarakat  Maslete yang bertahan hingga saat ini. Arsitektur rumah adat  Sonaf Bikomi-Sanak dikatakan sebagai salah satu arsitektur tradisional sebab bentuknya ditularkan secara turun temurun dari generasi ke generasi, sebagaimana bentuk  arsitektur bangunannya sangat melekat dengan situasi masyarakat Maslete dan lingkungan sekitarnya. Di era globalisasi yang ditandai dengan perkembangan teknologi tidak menuntut masyarakat Maslete untuk merubah bentuk bangunan arsitektur rumah adatnya tetapi justru masyarakat tetap mempertahankan keaslian arsitektur bangunan rumah adat Sonaf Bikomi-Sanak. Metode yang digunakan dalam kajian ini adalah deskriptif kualitatif. Pengumpulan data diperoleh melalui proses wawancara dan observasi.', 'kampung adat maslete.jpg', '2022-10-07 12:42:26', '2022-10-07 12:42:26'),
(37, 12, 31, 'Kampung Adat Temkesi', 'Saat menjelajahi kawasan pulau Timor, selalu saja penuh kejutan karena ada banyak hal menarik yang bisa kita lihat dan kita pelajari. Salah satunya adalah Kampung Adat Tamkesi yang berlokasi diatas sebuah bukit yang cukup terjal. Secara administratif, kampung adat Tamkesi ini berada di Desa Tautpah, Kecamatan Biboki Selatan, Kabupaten Timor Tengah Utara (TTU), Provinsi Nusa Tenggara Timur, Indonesia. Masyarakat Kampung Adat Tamkesi merupakan Klan Usboko dari Suku Dawan atau dalam istilah setempat disebut Atoin Meto. Etnis Atoin Meto ini tinggal menyebar di wilayah Pulau Timor bagian Barat. Pada awalnya masyarakat disini adalah nomaden alias suka berpindah-pindah dari sekitar pantai Oepuah dan akhirnya menetap di daerah Gunung Kembar Tapenpah dan Oepuah. Oepuah merupakan simbol kesuburan dan kesejahteraan, sedangkan Tapenpah merupakan simbol kekuasaan dan kekuatan. Di kampung Tamkesi ini, timbangan keramat besi tnais menemukan titik imbangnya dan dianggap pusat bumi oleh masyarakat setempat. Karena itulah, lokasi ini dinamakan Tamkesi. alu Dalam bahasa Dawan, Tamkesi berarti sudah terikat kuat pada porosnya dan kokoh tidak tergoyahkan. Oleh karena itu, Tamkesi dijadikan pusat kerajaan Biboki.', 'kampung-tamksi.jpg', '2022-10-07 13:12:18', '2022-10-07 14:16:50'),
(38, 12, 32, 'Istana Raja Oelolok', 'Raja Taolin yang bernama Lorensius Aloysius Nobas Taolin lahir 10 Agustus 1914 dan mangkat 10 Februari 1991 memerintah Kerajaan Insana yang terletak di Kabupaten Timur Tengah Utara, Nusa Tenggara Timor hingga tahun 1970. Kerajaan Insana yang berpusat di daerah Oelolok pada masa kejayaannya dikenal dengan pemerintahan yang maju dibidang pendidikan karena prinsip dari Raja Taolin yang mengedepankan kemajuan bagi rakyatnya terutama dibidang pendidikan. Raja Taolin juga memiliki perhatian terhadap seni budaya terutama tarian dan seni pahat. Hal ini dibuktikan dengan beberapa tarian yang dimodifikasi baik gerakan maupun komponen pendukung tarian yang diberikan sentuhan baru oleh Raja. Sedangkan untuk seni pahat, Raja Taolin mempunyai kemampuan dalam mendesain pahatan. Hasil desain dari Raja Taolin ini masih dapat kita saksikan di panel-panel yang dipajang di dinding Istananya. Rasa hormat masyarakat akan kebesaran Kerajaan dan Raja Taolin masih berbekas hingga sekarang, hal ini ditunjukan dengan masih setianya masyarakat atau rakyat untuk datang ke Istana baik untuk berkunjung atau menyelesaikan masalah di Lopo yang terletak disamping istana. Simbol kerajaan yang masih tersisa hingga kini adalah adanya simbol Hitu, Taboy, Saijo dan Banusu yang terletak empat bagian di halaman depan istana yang melambangkan 4 amaf (marga) yang berada dibawah pemerintahan Kerajaan Insana. Makan Raja Taolin terletak tepat dibelakang Istana yang berada di Desa Oelolok Kabupaten Timur Tengah Utara. Terdapat juga makam orang tua Raja, istri dan beberapa anak Raja Taolin yang telah wafat. Saat ini Istana Raja Taolin ditempati dan juga dirawat oleh anak Raja Taolin yang pertama yaitu Th. L. Taolin.', 'istana-raja-oelolok.jpg', '2022-10-07 15:39:11', '2022-10-07 17:14:22'),
(39, 12, 33, 'Kure Noemuti', 'Upacara Kure’ sebenarnya bukan muncul dari suatu ritus tradisional asli tertentu masyarakat Atoni Meto Noemuti, \r\nmelainkan suatu upacara yang dihasilkan dari penyesuaian antara budaya lama (situasi adat-istiadat yang kuat Atoni Meto Noemuti) dan budaya baru (ajaran Iman Katolik yang diperkenalkan oleh para Dominikan Katolik). Dikisahkan bahwa pada waktu itu (Noemuti dalam situasi lama sebelum adanya agama Katolik dan asih menghidupi agama adat tradisonal), Atoni Meto Noemuti memandang rumah adat sebagai \r\nsesuatu yang sentral dalam berbagai kegiatan bersama. Rumah adat dipandang sebagai rumah sakral karena di dalamnya terdapat barang-barang pusaka peninggalan para leluhur dan alat-alat perang.\r\nUpacara Kure’ tercipta sebagai bukti dari perpaduan antara kedua budaya dan dijadikan oleh masyarakat setempat sebagai media tradisional untuk meningkatkan kepercayaan mereka akan Allah yang yang diajarkan para dominikan waktu itu. Penulis tertarik untuk menggulas tentang upacara Kure’ sebab dalam upcara tersebut memiliki simbol, nilai, sarana yang menampilkan relasi dengan teologi Gereja, khususnya ajaran tentang tiga tugas Gereja. upacara Kure’ Atoni Meto Noemuti menampilkan ilustrasi, pemaknaan dan penghayatan oleh Atoni Meto Noemuti akan peran dan tugas mereka sebagai anggota Gereja. Di dalamnya juga mereka turut memaknai berbagai nilai-nilai sakramen dan devosi yang ada dalam ajaran Katolik.', 'upacara-kure-noemuti-kote.jpg', '2022-10-07 16:13:17', '2022-10-07 16:13:17'),
(46, 45, 44, 'Mercusuar Wini', 'belum isi....', '3864422604.jpg', '2023-01-12 14:34:03', '2023-01-12 19:18:56'),
(47, 45, 45, 'Terminal Barang Internasional Wini', 'belum isi...', '3385973003.jpg', '2023-01-12 14:37:26', '2023-01-12 19:19:54'),
(48, 45, 46, 'Gedung Serbaguna PLBN Wini', 'belum isi', '1127831975.jpg', '2023-01-12 14:39:45', '2023-01-12 19:31:02'),
(49, 45, 47, 'Mes Pegawai PLBN Wini', 'Kementerian Pekerjaan Umum dan Perumahan Rakyat (PUPR) melalui Direktorat Jenderal (Ditjen) Cipta Karya sudah menyelesaikan pembangunan dua Pos Lintas Batas Negara (PLBN) di Provinsi Nusa Tenggara Timur (NTT). Adapun kedua PLBN tersebut adalah Wini di Kabupaten Timor Tengah Utara Provinsi NTT dan Motamasin di Kabupaten Malaka Provinsi NTT, ', '1127831975.jpg', '2023-01-12 14:58:07', '2023-01-12 19:30:40'),
(50, 45, 48, 'Kantor Pos Pelayanan Beacukai', 'Kantor pos ini melayani pengiriman barang, dokumen, Express Mail Service (EMS) dan paket dalam negeri dan pengiriman paket luar negeri melalui pos indonesia international. Customer pos dapat melakukan cek tarif pos Indonesia melalui situs resmi, selain itu tracking pos atau lacak kiriman pos juga dapat dilakukan via online melalui web resmi POS Indonesia. Untuk pos Indonesia tracking secara online dapat dilakukan dengan merujuk no. barcode yang tertera pada cek resi pos indonesia saat mengirim paket. Informasi lebih lanjut dapat diperoleh melalui kontak call center atau customer service PT. Pos Indonesia.lamat lokasi : perbatasan wini, Humusu C, Insana Utara, Kabupaten Timor Tengah Utara, Oecusse', '104565107.jpg', '2023-01-12 18:17:00', '2023-01-12 19:30:04'),
(51, 45, 50, 'Puskesmas Oelolok', 'Pusat Kesehatan Masyarakat, disingkat Puskesmas, adalah fasilitas pelayanan kesehatan yang menyelenggarakan upaya kesehatan masyarakat dan upaya kesehatan perseorangan tingkat pertama, dengan lebih mengutamakan upaya promotif dan preventif, untuk mencapai derajat kesehatan', '2669723447.jpg', '2023-01-12 18:22:45', '2023-01-12 19:29:00'),
(52, 45, 51, 'Pos Satgas Pamtas Oelbinose', 'Pos Satgas Pamtas Oelbinose merupakan pos jaga yang berada di desa oelbinose TTU.', '915454875.jpg', '2023-01-12 18:26:08', '2023-01-12 19:27:44'),
(53, 45, 53, 'Cagar Alam Gunung Mutis', 'Cagar Alam Gunung Mutis adalah sebuah cagar alam yang berada di pulau Timor barat, Provinsi Nusa Tenggara Timur, Indonesia. Cagar alam ini ditunjuk melalui surat keputusan Menteri Kehutanan', '1406210316.jpg', '2023-01-12 18:28:15', '2023-01-12 19:25:35'),
(54, 45, 54, 'Nuaf Nefomasi', 'nuaf nefomasi merupakan bukit nefomasi yang berada di dekat gunugn mutis', '2454314763.jpg', '2023-01-12 18:30:50', '2023-01-12 19:25:08'),
(55, 45, 55, 'FLC Tamkesi Harapan', 'Makanan bergizi diberikan untuk memperbaiki gizi anak-anak yang mengalami tanda-tanda gixi buruk. Apa aja sih tanda anak-anak mengalami gizi buruk? Anak akan terlihat pucat, lemas, bibir pecah dan kering, rambut kering, serta daya ingat anak yang lambat. Untuk mencegah hal itu terjadi, Tangan Pengharapan secara konsisten memberikan makanan bergizi 3 kali dalam seminggu secara gratis untuk 5.000 anak pedalaman di Indonesia ', '750191099.jpg', '2023-01-12 18:33:22', '2023-01-12 19:23:21'),
(56, 45, 56, 'Apotik Deo Gratias Farma-Wini', 'Pengadaan obat-obatan pada apotek menggunakan sistem salesman yang datang langsung ke apotek atau melakukan pemesanan melalui telepon untuk memenuhi pengadaan barang. Masalah yang sering di jumpai apotek dalam pengdaan barang yaitu, keterlambatan obat yang disebakan oleh kekosongan pabrik', '2590518719.jpg', '2023-01-12 18:35:52', '2023-01-12 19:22:17'),
(57, 45, 57, 'Kantor Pos Wini', 'Kantor pos adalah fasilitas fisik tidak bergerak untuk melayani penerimaan, pengumpulan, penyortiran, transmisi, dan pengantaran surat dan paket pos. Kantor pos menjual benda-benda pos dan filateli, seperti prangko, kartu pos, amplop, dan perlengkapan untuk membungkus paket. ', '2361452824.jpg', '2023-01-12 18:38:00', '2023-01-12 19:21:15'),
(58, 45, 58, 'Gereja Paulus Wini', 'Gereja adalah istilah eklesiologis yang digunakan berbagai denominasi Kristen untuk menyifatkan badan persekutuan umat Kristen yang sejati atau lembaga asali yang diasaskan Yesus. Istilah ', '1981405486.jpg', '2023-01-12 18:40:25', '2023-01-12 19:17:54'),
(59, 45, 59, 'Gereja Fransiskus Xaverius', 'Gereja adalah istilah eklesiologis yang digunakan berbagai denominasi Kristen untuk menyifatkan badan persekutuan umat Kristen yang sejati atau lembaga asali yang diasaskan Yesus. Istilah ', '3292071230.jpg', '2023-01-12 18:41:08', '2023-01-12 19:17:30'),
(60, 45, 60, 'Kios Arafah', 'Dari segi lokasi, kios yang berdekatan dengan pusat keramaian adalah salah satu ciri kios yang baik dan dapat menguntungkan. Pusat keramaian yang dimaksud bisa berupa pasar, alun-alun, taman kota, terminal bis, stasiun kereta, atau aktivitas perdagangan lainnya.', '3784230018.jpg', '2023-01-12 18:43:05', '2023-01-12 18:43:05'),
(61, 45, 61, 'RUMAH MAKAN SINAR WINI', 'Rumah makan merupakan suatu usaha penyediaan jasa makanan dan minuman dilengkapi dengan peralatan dan perlengkapan untuk proses pembuatan, penyimpanan dan penyajian di suatu tempat tetap yang tidak berpindah-pindah dengan tujuan memperoleh keuntungan atau laba.', '131274335.jpg', '2023-01-12 18:46:55', '2023-01-12 18:46:55'),
(62, 45, 62, 'Resort Marjon', 'Resort merupakan tempat penginapan yang banyak digunakan oleh wisatawan lokal saat berlibur keluar kota. Selain harganya untuk menginap yang sangat beragam, fitur yang ditawarkan resort juga tidak kalah dengan losment, hotel, ataupun villa', '70875189.jpg', '2023-01-12 18:49:17', '2023-01-12 18:49:17'),
(63, 45, 63, 'Kantor Desa Bitauni', ' pusat pelayanan di desa yang menjadi central segala kegiatan yang ada di desa.', '3099156715.jpg', '2023-01-12 18:53:33', '2023-01-12 18:53:33'),
(64, 45, 64, 'Toko Bulan Satu', 'Toko atau kedai adalah sebuah tempat tertutup yang di dalamnya terjadi kegiatan perdagangan dengan jenis benda atau barang yang khusus, misalnya toko buku, toko buah, dan sebagainya. Secara fungsi ekonomi, istilah \"toko\" sesungguhnya hampir sama dengan \"kedai\" atau \"warung\".', '2966649084.jpg', '2023-01-12 18:55:09', '2023-01-12 18:55:09'),
(65, 45, 65, 'Kios Timor Raya', 'kios : adalah bangunan permanen di area pasar yang beratap dan dipisahkan satu dengan yang lainnya dengan pemisah mulai dari lantai sampai dengan langit-langit yang dipergunakan untuk usaha berjualan.', '129494847.jpg', '2023-01-12 18:56:42', '2023-01-12 18:56:42'),
(66, 45, 66, 'TPU Bitauni', 'Tempat Pemakaman Umum', '2085559629.jpg', '2023-01-12 18:59:03', '2023-01-12 19:15:43'),
(67, 45, 67, 'DHC Barbershop', 'Barbershop adalah usaha yang menyediakan jasa perawatan seperti jasa pangkas rambut dan cukur brewok atau kumis.', '175557933.jpg', '2023-01-12 19:00:20', '2023-01-12 19:16:30');
INSERT INTO `tbl_wisata` (`id_wisata`, `id_kategori`, `id_lokasi`, `nama_wisata`, `deskripsi`, `foto_wisata`, `created_at`, `updated_at`) VALUES
(68, 45, 68, 'Loket Hutan Wisata', 'Loket Hitan Wisata Merupakan fasilitas pendukung yang ada di kolam renang oeluan, saat ingin berkunjung ke kolam renang oeluan maka wajib melapor dan membayar di loket tersebut.', '1896550150.jpg', '2023-01-12 19:03:07', '2023-01-12 19:03:07'),
(69, 45, 69, 'Kapela Nunhala-Neonbaun', 'kapel agak sulit bagi mereka yang bukan Kristen. Gereja adalah tempat ibadah Kristen; tidak ada keraguan tentang itu tetapi bagaimana dengan kapel? Bahkan kamus tidak membuat situasi menjadi jelas. Ini mendefinisikan sebuah gereja sebagai bangunan yang digunakan oleh orang Kristen untuk ibadah', '4183370894.jpg', '2023-01-12 19:05:09', '2023-01-12 19:14:39'),
(70, 45, 70, 'Kantor Desa Nunbaun', 'Kantor desa ialah pusat pelayanan di desa yang menjadi central segala kegiatan yang ada di desa. ', '1233180990.jpg', '2023-01-12 19:07:01', '2023-01-12 19:07:01'),
(71, 45, 71, 'Penguburan Umum', 'Tempat oorang-orang meninggal disemayamkan.', '94755826.jpg', '2023-01-12 19:08:24', '2023-01-12 19:08:24'),
(72, 45, 72, 'Kantor Desa Noemuti', ' kantor desa ialah pusat pelayanan di desa yang menjadi central segala kegiatan yang ada di desa. ', '2206630061.jpg', '2023-01-12 19:08:59', '2023-01-12 19:08:59'),
(73, 45, 73, 'Bank BRI', 'Bank Rakyat Indonesia (BRI) adalah salah satu bank milik pemerintah yang terbesar di Indonesia. terletak di noemuti kab.TTU', '2865307826.jpg', '2023-01-12 19:11:05', '2023-01-12 19:11:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `tbl_galeri_ibfk_1` (`id_wisata`);

--
-- Indeks untuk tabel `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_layanan_publik`
--
ALTER TABLE `tbl_layanan_publik`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tbl_restoran`
--
ALTER TABLE `tbl_restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indeks untuk tabel `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tbl_layanan_publik`
--
ALTER TABLE `tbl_layanan_publik`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `tbl_restoran`
--
ALTER TABLE `tbl_restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD CONSTRAINT `tbl_galeri_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `tbl_wisata` (`id_wisata`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  ADD CONSTRAINT `tbl_wisata_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_wisata_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `tbl_lokasi` (`id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
