-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 09:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pinjam_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `konten` varchar(1000) NOT NULL,
  `status` enum('terima','tolak') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `username`, `konten`, `status`, `timestamp`) VALUES
(15, 'budi_kun', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah LCD. Username: budi_kun. Silahkan ke bagian Sarpras untuk mengampil barang', 'terima', '2018-11-10 15:13:01'),
(17, 'adlubagus94', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah LCD. Username: adlubagus94. Silahkan ke bagian Sarpras untuk mengampil barang', 'terima', '2018-11-11 01:42:05'),
(19, 'adlubagus94', 'Permintaan Peminjaman Barang Anda Telah di Terima. 2 buah Speaker kecil. Username: adlubagus94. Silahkan ke bagian Sarpras untuk mengampil barang', 'terima', '2018-11-11 01:55:54'),
(20, 'adlubagus94', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2018-11-11 01:56:40'),
(21, 'usertest123', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah LCD. Username: usertest123. Silahkan ke bagian Sarpras untuk mengampil barang', 'terima', '2018-11-11 05:30:46'),
(22, 'usertest123', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2018-11-11 05:31:51'),
(23, 'yung', 'Maaf! Permintaan Peminjaman Barang Anda di Tolak. 1 buah LCD. Username: yung', 'tolak', '2024-06-03 11:19:05'),
(24, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 2 buah Lapangan Voli. Username: can. Silahkan ke bagian Sarpras untuk mengampil barang', 'terima', '2024-06-04 16:41:12'),
(25, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-05 08:34:17'),
(26, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah Lapangan Futsal. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-05 09:41:22'),
(27, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 2 buah Lapangan Voli. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-05 09:41:30'),
(28, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-05 09:42:02'),
(29, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima.  buah lapangan tali. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 06:31:28'),
(30, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima.  buah lapangan tali. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 06:31:31'),
(31, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 3 buah lapangan tali. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 06:44:17'),
(32, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 3 buah lapangan tali. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 06:44:24'),
(33, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 3 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 06:44:29'),
(34, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 3 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 06:50:27'),
(35, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 3 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 06:50:30'),
(36, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 3 buah lapangan tali. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 06:50:40'),
(37, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 4 buah lapangan tali. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 06:50:44'),
(38, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 06:51:07'),
(39, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 06:54:36'),
(40, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 06:54:46'),
(41, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 06:54:51'),
(42, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 06:58:26'),
(43, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 07:03:59'),
(44, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 10 buah lapangan tali. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 07:09:35'),
(45, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 07:10:05'),
(46, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 1 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 07:12:16'),
(47, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 3 buah lapangan tali. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 11:10:27'),
(48, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 11:10:58'),
(49, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah Lapangan Apa. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 14:15:35'),
(50, 'chan', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah Lapangan Apa. Username: chan. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 14:17:49'),
(51, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 4 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:35'),
(52, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 4 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:38'),
(53, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 4 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:39'),
(54, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 4 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:41'),
(55, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 4 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:42'),
(56, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 4 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:43'),
(57, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 4 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:45'),
(58, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 3 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:46'),
(59, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 10 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:48'),
(60, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 10 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:49'),
(61, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 10 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:50'),
(62, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 10 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:52'),
(63, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 3 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:53'),
(64, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 3 buah lapangan tali. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-06 16:56:54'),
(65, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah Lapangan Alex. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 17:10:06'),
(66, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah Lapangan Alex. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 17:15:29'),
(67, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 17:22:21'),
(68, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-06 22:24:38'),
(69, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah Lapangan ck. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-06 22:25:41'),
(70, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-08 00:19:26'),
(71, 'can', 'Permintaan Peminjaman Barang Anda Ditolak. 2 buah Lapangan Voli. Username: can. Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut', 'tolak', '2024-06-08 00:22:34'),
(72, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 2 buah Lapangan Voli. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-08 00:22:38'),
(73, 'can', 'Permintaan Pengembalian Barang Anda Telah di Terima.  buah . Username: ', '', '2024-06-08 00:23:06'),
(74, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah Lapangan ck. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-08 05:52:34'),
(75, 'can', 'Permintaan Peminjaman Barang Anda Telah di Terima. 1 buah Lapangan Alex. Username: can. Silahkan ke bagian Sarpras untuk mengambil barang', 'terima', '2024-06-08 05:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  `stok_barang` int(10) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama_barang`, `gambar_barang`, `stok_barang`, `harga`) VALUES
(21, 'Sepeda Statis', '8513342.jpg', 10, 300000.00),
(22, 'Barbel', 'sa.jpg', 30, 50000.00),
(23, 'Skipping', '8513336.jpg', 20, 20000.00),
(24, 'Dumbbell', '9360377.jpg', 20, 500000.00),
(25, 'Shuttlecock', '2149006298.jpg', 90, 10000.00),
(26, 'Bet Ping Pong', '2149006309.jpg', 40, 60000.00),
(27, 'Raket Batminton', '2149006322.jpg', 20, 30000.00),
(28, 'Bola Kaki', 'bolasepk.jpg', 30, 70000.00),
(29, 'Sepeda Gunung', 'sepeda.jpg', 5, 200000.00),
(30, 'Matras', 'matras.jpg', 30, 70000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `jml_hari` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id`, `nama_barang`, `peminjam`, `level`, `jml_hari`, `created_at`, `updated_at`) VALUES
(12, 'Lapangan Apa', 'chan', '', 1, '2024-06-06 09:17:29', '2024-06-06 14:17:48'),
(17, 'Lapangan ck', 'can', '', 1, '2024-06-08 00:52:09', '2024-06-08 05:52:34'),
(18, 'Lapangan Alex', 'can', '', 1, '2024-06-08 00:06:34', '2024-06-08 05:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id`, `nama_barang`, `peminjam`, `jml_hari`, `harga`, `created_at`, `updated_at`) VALUES
(94, 'Lapangan Alex', 'can', 1, 300, '2024-06-08 01:07:32', '2024-06-08 06:07:32'),
(95, 'Lapangan Alex', 'can', 1, 300, '2024-06-08 01:08:45', '2024-06-08 06:08:45'),
(96, 'Lapangan Alex', 'can', 1, 300, '2024-06-08 01:09:29', '2024-06-08 06:09:29'),
(97, 'Lapangan Alex', 'can', 1, 300, '2024-06-08 01:10:09', '2024-06-08 06:10:09'),
(98, 'Lapangan Alex', 'can', 1, 300, '2024-06-08 01:10:26', '2024-06-08 06:10:26'),
(99, 'Lapangan Alex', 'apai', 1, 300, '2024-06-08 08:09:17', '2024-06-08 13:09:17'),
(100, 'Lapangan Alex', 'apai', 1, 300, '2024-06-08 08:12:14', '2024-06-08 13:12:14'),
(101, 'Lapangan Alex', 'apai', 1, 300, '2024-06-08 08:12:35', '2024-06-08 13:12:35'),
(102, 'Lapangan Alex', 'apai', 1, 300, '2024-06-08 08:12:45', '2024-06-08 13:12:45'),
(103, 'Lapangan Alex', 'apai', 1, 300, '2024-06-08 08:12:51', '2024-06-08 13:12:51'),
(104, 'Lapangan Alex', 'apai', 1, 300, '2024-06-08 08:13:03', '2024-06-08 13:13:03'),
(105, 'Lapangan Alex', 'apai', 1, 300, '2024-06-08 13:14:13', '2024-06-08 13:14:14'),
(106, 'Sepeda Statis', 'can', 1, 300, '2024-06-10 06:13:36', '2024-06-10 06:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_req_kembali`
--

CREATE TABLE `tbl_req_kembali` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `nama_barang`, `peminjam`, `level`, `jml_hari`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Terminal', 'budi_kun', 'XI RPL 2', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Terminal', 'adlubagus94', 'XII RPL 1', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'Terminal', 'bagusi', 'X TKJ 3', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'LCD', 'bagusi', 'X TKJ 3', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'LCD', 'budi_kun', 'XI RPL 2', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'LCD', 'adlubagus94', 'XII RPL 1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 'Speaker kecil', 'adlubagus94', 'XII RPL 1', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 'LCD', 'usertest123', 'xii rpl', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 'Lapangan Voli', 'can', '10', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 'Lapangan Futsal', 'can', '12', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 'lapangan tali', 'can', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(12, 'lapangan tali', 'can', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(13, 'lapangan tali', 'can', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, 'lapangan tali', 'can', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(15, 'lapangan tali', 'can', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(16, 'lapangan tali', 'can', '', 3, '2024-06-06 04:45:26', '2024-06-06 07:03:59', NULL),
(17, 'lapangan tali', 'can', '', 10, '2024-06-06 04:35:19', '2024-06-06 07:10:05', NULL),
(18, 'lapangan tali', 'can', '', 3, '2024-06-06 06:10:02', '2024-06-06 11:10:58', NULL),
(19, 'Lapangan Alex', 'can', '', 1, '2024-06-06 12:11:02', '2024-06-06 17:22:21', NULL),
(20, 'Lapangan Alex', 'can', '', 1, '2024-06-06 11:57:00', '2024-06-06 22:24:38', NULL),
(21, 'Lapangan ck', 'can', '', 1, '2024-06-06 17:25:27', '2024-06-08 00:19:26', NULL),
(22, 'Lapangan Voli', 'can', '', 2, '2024-06-07 19:22:01', '2024-06-08 00:23:06', NULL);

--
-- Triggers `tbl_transaksi`
--
DELIMITER $$
CREATE TRIGGER `check_admin_role` BEFORE UPDATE ON `tbl_transaksi` FOR EACH ROW BEGIN
    IF NOT EXISTS (SELECT 1 FROM user WHERE username = NEW.peminjam AND level = 'admin') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Only admins are allowed to update transaction data';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
(7, 'candra', 'candra', '', '$2y$10$VEjNGL4DvdbpO5SlsKC7IO0IBfM8x58yXtj4vFnVy7X', '10'),
(8, 'kirana', 'kirana', '', '$2y$10$ZFIGxfFggoKYpvcHOo2r4.LgxKZorrvWtui3CYlIIoL', '9'),
(10, 'yung', 'yung', '', '$2y$10$lKF2Urx3JTGC019eIHDiLOqyPoawq7INBgxaI0H2uhB', '11'),
(11, 'bener', 'bener', '', '$2y$10$Qkztjz3gA93AXflPzCv2h.JplKbqUv/LEVub5lInASx7uAupLK9te', 'admin'),
(12, 'can', 'can', '', '$2y$10$BindFTv0i5LDSztZP5ZfKulyKi8FTbYFKVuaGeNjzfZELA1QmO2Q.', '12'),
(13, 'chan', 'chan', '', '$2y$10$Pm0BbmSkMMoqjUs875rGo.8v/ZWcQMenXzb1nCazn7aifQSBGZp/i', 'chan'),
(14, 'candra kirana', 'kir', '', '$2y$10$vvF74CxfKS8FLMl1bCGN2.l4sbca/LdA.l7iPYo0nX7ayKD1VbKFG', ''),
(15, 'ananda', 'ananda', '', '$2y$10$joyxNBsA0xQKOkmqec4RAOypdvN4nRO538HVNJOi9EVPBng/.rsJ2', ''),
(16, 'apai', 'apai', '', '$2y$10$EAKNdOoeqX8xUQyUAVv4TO22VEmm4wLvH8cV1TlQkqCt4SEpDS8ia', ''),
(17, 'lang', 'lang', 'lang@gmail.com', '$2y$10$d8t3XJKWNFkzuJetsAXIG.69MzUDRb8Nx88g3T6bPuwiR9tBS28dK', ''),
(18, 'anadan yaw', 'anada', 'anada@gmail.com', '$2y$10$eo1uewLDITpRKFr9Kry3wuvJgrNifN4eCH8h02iLnPO.8dGSdqGnC', ''),
(19, 'again', 'again', 'againlost49@gmail.com', '$2y$10$DuanPT0MnTQncIB3qYzuResNbThU0QhTyQ/12MO0FYLIcMxVIz52W', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_req_kembali`
--
ALTER TABLE `tbl_req_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_transaksi` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_req_kembali`
--
ALTER TABLE `tbl_req_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `fk_user_transaksi` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
