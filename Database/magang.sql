-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 06:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '158141045_download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `arsip_id` int(11) NOT NULL,
  `arsip_waktu_upload` datetime NOT NULL,
  `arsip_petugas` int(11) NOT NULL,
  `arsip_kode` varchar(255) NOT NULL,
  `arsip_nama` varchar(255) NOT NULL,
  `arsip_jenis` varchar(255) NOT NULL,
  `arsip_kategori` int(11) NOT NULL,
  `jenis_surat` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `jumlah` int(100) NOT NULL,
  `keterangan_jumlah` text NOT NULL,
  `aktif_tahun` text NOT NULL,
  `aktif_sampai` text NOT NULL,
  `arsip_keterangan` text NOT NULL,
  `arsip_file` varchar(255) DEFAULT NULL,
  `aktif_tahun_rc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `arsip_waktu_upload`, `arsip_petugas`, `arsip_kode`, `arsip_nama`, `arsip_jenis`, `arsip_kategori`, `jenis_surat`, `tanggal_surat`, `jumlah`, `keterangan_jumlah`, `aktif_tahun`, `aktif_sampai`, `arsip_keterangan`, `arsip_file`, `aktif_tahun_rc`) VALUES
(58, '2022-03-02 04:35:47', 7, '032/BPKAD-ASET/141/2014', 'SURAT SEKRETARIAT DAERAH PERIHAL PEMINDAH TANGANAN DENGAN CARA PENJUALAN UNTUK KENDARAAN DINAS', 'pdf', 32, 'masuk', '2021-12-02', 2, 'Lembar', '2', '2023-12-02', 'Tekstual', '324511257_SURAT SEKRETARIAT DAERAH PERIHAL PEMINDAH TANGANAN DENGAN CARA PENJUALAN UNTUK KENDARAAN DINAS.docx.pdf', 1),
(59, '2022-03-02 04:39:56', 7, '005/PLK-PMK/02', 'UNDANGAN', 'pdf', 5, 'masuk', '2022-01-17', 5, 'Lembar', '1', '2023-01-17', 'Tekstual', '243321046_SURAT SEKRETARIAT DAERAH PERIHAL PEMINDAH TANGANAN DENGAN CARA PENJUALAN UNTUK KENDARAAN DINAS.docx.pdf', 2),
(60, '2022-03-02 04:43:28', 7, '446/073/2017', 'Undangan Rapat', 'pdf', 446, 'keluar', '2017-01-01', 1, 'Lembar', '1', '2018-01-01', 'Tekstual', '287032205_SURAT SEKRETARIAT DAERAH PERIHAL PEMINDAH TANGANAN DENGAN CARA PENJUALAN UNTUK KENDARAAN DINAS.docx.pdf', 0),
(61, '2022-03-02 04:45:58', 7, '000/123/2022', 'Surat test', 'pdf', 0, 'masuk', '2022-02-08', 4, 'Lembar', '3', '2025-02-08', 'Tekstual', '1788517748_SURAT SEKRETARIAT DAERAH PERIHAL PEMINDAH TANGANAN DENGAN CARA PENJUALAN UNTUK KENDARAAN DINAS.docx.pdf', 2),
(62, '2022-03-02 04:47:08', 7, '123/123/123', 'test 123', 'pdf', 123, 'keluar', '2018-01-01', 1, 'Lembar', '1', '2019-01-01', 'Tekstual', '1618113163_SURAT SEKRETARIAT DAERAH PERIHAL PEMINDAH TANGANAN DENGAN CARA PENJUALAN UNTUK KENDARAAN DINAS.docx.pdf', 2),
(63, '2022-04-27 05:40:11', 8, '23asd', 'test', 'pdf', 0, 'masuk', '2022-04-27', 1, 'Lembar', '2022', '4044-04-27', 'Tekstual', '1571422999_PENGENALAN DELPHI 7.0 SISTEM CARA MENGINSTAL DELPHI.pdf', 0),
(64, '2022-04-29 05:16:35', 8, '12', 'asdasd', 'pdf', 0, 'keluar', '2022-04-29', 12, 'Lembar', '2200', '4222-04-29', 'Tekstual', '2145755577_PENGENALAN DELPHI 7.0 SISTEM CARA MENGINSTAL DELPHI.pdf', 0),
(66, '2022-04-29 06:11:18', 8, '2', 'test', 'xlsx', 1, 'keluar', '2022-04-29', 1, 'Lembar', '1233', '3255-04-29', 'Tekstual', '929746944_DATA SURAT-1.xlsx', 0),
(67, '2022-04-29 06:14:15', 8, '12', 'trest', 'xlsx', 1, 'keluar', '2022-04-29', 21, 'Lembar', '2099', '4121-04-29', 'Tekstual', '98104360_DATA SURAT-1.xlsx', 0),
(68, '2022-04-30 22:18:42', 10, 'test123', 'tst', 'pptx', 1, 'keluar', '2022-04-30', 12, 'Lembar', '2022', '4044-04-30', 'Tekstual', '1786098421_1 KULIAH PERDANA PL-SQL.pptx', 0),
(69, '2022-05-01 08:04:34', 8, '23asd', 'Surat Keterangan Sakit Keras macam batu', 'pdf', 1, 'keluar', '2022-05-01', 2, 'Berkas', '2022', '4044-05-01', 'Tekstual', '780967633_2019 Format Article Tugas (Reference Tidak Boleh Dirubah).pdf', 0),
(72, '2022-05-01 10:16:30', 8, 'testing saja', 'testing pertama surat', 'pdf', 1, 'keluar', '2022-05-01', 12, 'Lembar', '2022', '4044-05-01', 'Tekstual', '196325992_2019 Format Article Tugas (Reference Tidak Boleh Dirubah).pdf', 0),
(74, '2022-05-01 10:19:22', 8, '12', 'asdadafsdgfsdg', 'pdf', 1, 'masuk', '2022-05-01', 2, 'Lembar', '2022', '4044-05-01', 'Tekstual', '1058235376_2019 Format Article Tugas (Reference Tidak Boleh Dirubah).pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `disposisi_id` int(11) NOT NULL,
  `arsip_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`disposisi_id`, `arsip_id`, `petugas_id`, `create_date`) VALUES
(22, 74, 8, '0000-00-00 00:00:00'),
(23, 68, 8, '0000-00-00 00:00:00'),
(24, 67, 8, '0000-00-00 00:00:00'),
(25, 63, 11, '0000-00-00 00:00:00'),
(26, 62, 8, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_keterangan`) VALUES
(1, 'jangan_dihapus', 'pokok');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int(11) NOT NULL,
  `petugas_nama` varchar(255) NOT NULL,
  `petugas_username` varchar(255) NOT NULL,
  `petugas_password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `jabatan` varchar(45) NOT NULL,
  `petugas_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `petugas_nama`, `petugas_username`, `petugas_password`, `email`, `jabatan`, `petugas_foto`) VALUES
(7, 'Deni Virnando', 'deni', '43f41d127a81c54d4c8f5f93daeb7118', 'fitraarrafiq@gmail.com', 'pimpinan', ''),
(8, 'petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'fitraarrafiq@gmail.com', 'petugas', ''),
(10, 'fitra', 'fitra123', '06719b92a71ed5e601ca66a1f1984fec', '', 'pimpinan', ''),
(11, 'abdi', 'abdi123', '9e8a6110afe75f3a2458b0d99a62626f', 'abdi@gmail.com', 'petugas', '');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `riwayat_id` int(11) NOT NULL,
  `riwayat_waktu` datetime NOT NULL,
  `riwayat_user` int(11) NOT NULL,
  `riwayat_arsip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`riwayat_id`, `riwayat_waktu`, `riwayat_user`, `riwayat_arsip`) VALUES
(1, '2019-10-11 15:32:29', 8, 3),
(2, '2019-10-12 17:09:31', 8, 10),
(3, '2019-10-12 17:09:45', 8, 9),
(4, '2019-10-12 17:09:50', 8, 8),
(5, '2019-10-12 17:09:53', 8, 3),
(6, '2019-10-12 17:10:07', 9, 10),
(7, '2019-10-12 17:10:16', 9, 9),
(8, '2019-10-12 17:10:19', 9, 8),
(9, '2019-10-12 17:10:22', 9, 6),
(10, '2019-10-12 17:10:26', 9, 2),
(11, '2022-02-12 22:01:28', 12, 38);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`) VALUES
(13, 'RC', 'RC', '5f4dcc3b5aa765d61d8327deb882cf99', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`disposisi_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `disposisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
