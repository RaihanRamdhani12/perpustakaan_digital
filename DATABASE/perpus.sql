-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 07:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` varchar(11) NOT NULL,
  `id_kategori_buku` varchar(11) NOT NULL,
  `id_sub_kategori` varchar(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `sampul_buku` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `sinopsis` varchar(10000) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_kategori_buku`, `id_sub_kategori`, `judul`, `sampul_buku`, `penulis`, `penerbit`, `sinopsis`, `tahun_terbit`, `stok`) VALUES
('KB-001', 'KK-002', 'KS-003', 'Babi Ngesot', 'Babi Ngesot_1709478221.png', 'Raditya Dika', 'Bukunee', 'Novel Babi Ngesot menceritakan tentang perjalanan hidup Raditya Dika yang yang lucu-lucu. Salah satu bagian ceritanya yang berjudul Asal Jangan Jadi Perkedel. Bagian cerita tersebut menceritakan tentang keseharian Raditya Dika saat ia mulai memasuki bangku SMA itu di SMA 70 Bulungan mulai dari saat awal Raditya memilih sekolah itu.', '2017', 10),
('KB-002', 'KK-002', 'KS-003', 'My Future Adventure', 'My Future Adventure_1709478258.png', 'Ruth Karyoko', 'Bukunee', 'Aaah…! Tiba tiba Meeta terperosok ke dalam lubang yang besar. Ternyata, itu membawanya ke dunia masa depan! Bingung, takut, juga takjub. Dunia masa depan dipenuhi alat-alat canggih. Syukurlah Meeta bertemu dengan Profesor Mong. Tapi, Meeta tetap ingin pulang. Mama dan Papa juga sahabatnya pasti kebingungan. Berhasilkah Meeta pulang? Siapa musuh Profesor Mong? Yuk kita sama sama ikuti cerita Meeta dalam seri KKPK kali ini.', '2005', 12),
('KB-003', 'KK-002', 'KS-003', 'Laskar Pelangi', 'Laskar Pelangi_1709478300.png', 'Andrea Hinata', 'Bentang Pustaka', 'Mereka bersekolah dan belajar pada kelas yang sama dari kelas 1 SD sampai kelas 3 SMP, dan menyebut diri mereka sebagai Laskar Pelangi. Pada bagian-bagian akhir cerita, anggota Laskar Pelangi bertambah satu anak perempuan yang bernama Flo, seorang murid pindahan. Keterbatasan yang ada bukan membuat mereka putus asa, tetapi malah membuat mereka terpacu untuk dapat melakukan sesuatu yang lebih baik.', '2005', 100),
('KB-004', 'KK-002', 'KS-003', 'Ashleys Adventure', 'Ashleys Adventure_1709478337.png', 'Alline', 'Alline', 'Ashley Veronica Yates, seorang penyanyi remaja yang tiba-tiba terjebak dalam petualangan tak terduga ketika bertemu dengan Benny Rosvelt, seorang penulis misterius yang menyamar sebagai seorang teman. Dengan pesona remaja yang memikat dan bakat musik yang memikat, Ashley harus menghadapi rahasia-rahasia keluarga, persahabatan yang dipertaruhkan, dan ketakutan akan ketenaran yang mendadak. Di tengah semua itu, dia menemukan keberanian untuk menerima dirinya sendiri dan menghadapi tantangan baru yang mengubah hidupnya, menuju tempat yang tidak pernah dia bayangkan sebelumnya dalam dunia hiburan.', '2005', 20),
('KB-005', 'KK-001', 'KS-002', 'Nicolas Spark', 'Nicolas Spark_1709478381.png', 'Nicolas', 'Nicolas', 'Ashley Veronica Yates, seorang penyanyi remaja yang tiba-tiba terjebak dalam petualangan tak terduga ketika bertemu dengan Benny Rosvelt, seorang penulis misterius yang menyamar sebagai seorang teman. Dengan pesona remaja yang memikat dan bakat musik yang memikat, Ashley harus menghadapi rahasia-rahasia keluarga, persahabatan yang dipertaruhkan, dan ketakutan akan ketenaran yang mendadak. Di tengah semua itu, dia menemukan keberanian untuk menerima dirinya sendiri dan menghadapi tantangan baru yang mengubah hidupnya, menuju tempat yang tidak pernah dia bayangkan sebelumnya dalam dunia hiburan.', '2007', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_buku`
--

CREATE TABLE `tb_kategori_buku` (
  `id_kategori_buku` varchar(11) NOT NULL,
  `nama_kategori_buku` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori_buku`
--

INSERT INTO `tb_kategori_buku` (`id_kategori_buku`, `nama_kategori_buku`) VALUES
('KK-001', 'Romance'),
('KK-002', 'Adventure'),
('KK-003', 'MeloDrama');

-- --------------------------------------------------------

--
-- Table structure for table `tb_koleksi_buku`
--

CREATE TABLE `tb_koleksi_buku` (
  `id_koleksi` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_kategori_buku` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_koleksi_buku`
--

INSERT INTO `tb_koleksi_buku` (`id_koleksi`, `id_member`, `id_buku`, `id_kategori_buku`) VALUES
(17, 1, '1', '2'),
(18, 15, 'KB-003', 'KK-001'),
(19, 15, 'KB-004', 'KK-001'),
(20, 1, 'KB-004', 'KK-001'),
(21, 1, 'KB-005', 'KK-001'),
(22, 1, 'KB-003', 'KK-001'),
(23, 1, 'KB-002', 'KK-001'),
(24, 2, 'KB-002', 'KK-001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `no_telpon` varchar(100) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `email`, `password`, `username`, `no_telpon`, `nama_lengkap`, `alamat`, `jenis_kelamin`) VALUES
(1, 'raihanramdhani229@gmail.com', '1', 'mekdi128', '12345678901121', 'Raihan Ramdhani', 'kemang', 'L'),
(2, 'aisyahhhh125@gmail.com', 'aisyy123', 'aisyyy098', '08964235781', 'Siti Aisyah', 'Jakarta ', 'P'),
(3, 'raihania21@gmail.com', '1', 'Hann', '08964235781', 'Mikey', 'Cibitung', 'L'),
(4, 'yakuzagg1@gmail.com', '1', 'Shafqi', '08964235781', 'Shafqi Darmawan', 'kemang', 'L'),
(5, 'raihanazami138@gmail.com', 'qwerty', 'azamikece', '0821547785624', 'Azami', 'Kampung Bulu', 'L'),
(6, 'asyaskirana@gmail.com', 'ajel', 'jelzz', '081293376322', 'Azlya Syaskirana', 'tambun', 'P'),
(7, 'raihania21@gmail.com', '1', 'velo', '08212546589', 'Velo', 'Jakarta', 'P'),
(8, 'Raihan@gmail.com', '1', 'raihan', '081218072672', 'fd', 'kemang', 'L'),
(9, 'raihanramdhani12@gmail.com', 'Raihania1', 'Hannn', '082125604700', 'Raihan Ramdhani', 'Papanmas Blok F54/1 Tambun Selatan', 'L'),
(10, 'faustino@gmail.com', '2007', 'Tinooo', '085173132007', 'Faustino', 'jl. Bekasi Timur', 'L'),
(11, 'safqi@gmail.com', '1', 'safqi', '08212546589', 'Shafqi Darmawan', 'kemang', 'P'),
(12, 'biona226@gmail.com', '1', 'Biona', '088882255664', 'Ramdhani', 'kemang', 'L'),
(13, 'aca@gmail.com', '1', 'aca', '08576543893', 'aca', 'margahayu', 'p'),
(14, 'biona2261@gmail.com', '123', 'Mikey Kun', '12345678901121', 'Mikey Kun Jarwo', 'Cibitung', 'L'),
(15, 'raihanazami1@gmail.com', '12345678', 'Azami Ganteng', '088865478665', 'Raihan Azami Rahman', 'Bekasi', 'P'),
(16, 'biona221@gmail.com', '123456789', 'Hann', '082125465812', 'Raihan Ramdhani', 'Bekasi', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjam` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` varchar(200) NOT NULL,
  `total_pinjam` int(11) NOT NULL,
  `total_pengembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjam`, `id_member`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `total_pinjam`, `total_pengembalian`) VALUES
(1, 1, '7', '2024-02-18', '2024-02-21', 'di-pinjam', 8, 0),
(2, 2, '9', '2024-02-19', '2024-02-20', 'di-kembalikan', 0, 0),
(3, 5, '6', '2024-02-19', '2024-02-21', 'di-kembalikan', 0, 0),
(4, 1, '9', '2024-02-19', '2024-02-21', 'di-kembalikan', 0, 0),
(5, 1, '6', '2024-02-21', '2024-02-24', 'di-kembalikan', 0, 0),
(6, 1, '7', '2024-02-21', '2024-02-24', 'di-kembalikan', 0, 0),
(7, 1, '9', '2024-02-21', '2024-02-24', 'di-kembalikan', 0, 0),
(8, 1, '8', '2024-02-21', '2024-02-23', 'di-kembalikan', 0, 0),
(10, 1, '6', '2024-02-24', '2024-02-24', 'di-kembalikan', 0, 0),
(11, 1, '9', '2024-02-26', '2024-02-28', 'di-kembalikan', 0, 0),
(12, 1, '9', '2024-02-26', '2024-02-26', 'di-kembalikan', 0, 0),
(13, 1, '8', '2024-02-26', '2024-02-26', 'di-kembalikan', 0, 0),
(14, 1, '1', '2024-02-26', '2024-02-29', 'di-kembalikan', 0, 0),
(15, 1, '3', '2024-02-27', '2024-02-29', 'di-kembalikan', 0, 0),
(16, 1, '4', '2024-02-27', '2024-02-29', 'di-kembalikan', 0, 0),
(17, 1, '1', '2024-02-27', '2024-02-29', 'di-kembalikan', 0, 0),
(18, 1, '2', '2024-02-27', '2024-02-29', 'di-kembalikan', 0, 0),
(19, 1, '3', '2024-02-27', '2024-03-02', 'di-kembalikan', 0, 0),
(20, 1, '6', '2024-02-27', '2024-02-29', 'di-kembalikan', 0, 0),
(21, 1, '1', '2024-02-28', '2024-02-29', 'di-pinjam', 1, 0),
(22, 1, 'KB-001', '2024-02-28', '2024-02-28', 'di-pinjam', 3, 0),
(23, 1, 'KB-002', '2024-02-29', '2024-03-01', 'di-pinjam', 1, 0),
(24, 1, 'KB-003', '2024-02-29', '2024-03-02', 'di-pinjam', 3, 0),
(25, 1, 'KB-004', '2024-02-29', '2024-03-01', 'di-pinjam', 2, 0),
(26, 1, 'KB-005', '2024-02-29', '2024-03-02', 'di-pinjam', 4, 0),
(27, 4, 'KB-001', '2024-02-29', '2024-03-02', 'di-pinjam', 1, 0),
(28, 4, 'KB-003', '2024-02-29', '2024-03-02', 'di-pinjam', 1, 0),
(29, 4, 'KB-005', '2024-02-29', '2024-03-02', 'di-pinjam', 2, 0),
(30, 4, 'KB-004', '2024-02-29', '2024-03-01', 'di-pinjam', 3, 0),
(31, 12, 'KB-003', '2024-02-29', '2024-03-02', 'di-pinjam', 3, 0),
(32, 12, 'KB-005', '2024-02-29', '2024-03-02', 'di-pinjam', 4, 0),
(33, 12, 'KB-001', '2024-02-29', '2024-03-03', 'di-pinjam', 4, 0),
(34, 15, 'KB-003', '2024-02-29', '2024-02-29', 'di-pinjam', 1, 0),
(35, 15, 'KB-001', '2024-02-29', '2024-02-29', 'di-pinjam', 1, 0),
(36, 2, 'KB-003', '2024-03-01', '2024-03-02', 'di-kembalikan', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `hari_keterlambatan` int(11) NOT NULL,
  `total_denda` varchar(10) NOT NULL,
  `uang_kembalian` varchar(10) NOT NULL,
  `uang_dibayarkan` varchar(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `total_pengembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_pengembalian`, `id_member`, `id_peminjaman`, `tanggal_pengembalian`, `hari_keterlambatan`, `total_denda`, `uang_kembalian`, `uang_dibayarkan`, `id_buku`, `total_pengembalian`) VALUES
(1, 1, 1, '2024-02-29', 8, '16000', '4000', '20000', 7, 1),
(2, 1, 1, '2024-02-22', 1, '2000', '3000', '5000', 7, 1),
(3, 2, 2, '2024-02-21', 1, '2000', '3000', '5000', 9, 9),
(4, 1, 4, '2024-02-21', 0, '-', '0', '-', 9, 5),
(5, 1, 4, '2024-02-21', 0, '-', '0', '-', 9, -2),
(6, 5, 3, '2024-02-21', 0, '-', '0', '-', 6, 1),
(7, 1, 5, '2024-02-21', 0, '-', '0', '-', 6, 1),
(8, 1, 10, '2024-02-25', 1, '2000', '2000', '4000', 6, 1),
(9, 1, 6, '2024-02-26', 2, '4000', '1000', '5000', 7, 1),
(10, 1, 7, '2024-03-04', 9, '18000', '2000', '20000', 9, 2),
(11, 1, 8, '2024-02-25', 2, '4000', '1000', '5000', 8, 1),
(12, 1, 8, '2024-02-25', 2, '4000', '1000', '5000', 8, 1),
(13, 1, 11, '2024-02-26', 0, '-', '0', '-', 9, 2),
(14, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(15, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(16, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(17, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(18, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(19, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(20, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(21, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(22, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(23, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(24, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(25, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(26, 1, 13, '2024-02-26', 0, '-', '0', '-', 8, 1),
(27, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(28, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(29, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(30, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(31, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(32, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(33, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(34, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(35, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(36, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(37, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(38, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(39, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(40, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(41, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(42, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(43, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(44, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(45, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(46, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(47, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(48, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(49, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(50, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(51, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(52, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(53, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(54, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(55, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(56, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(57, 1, 14, '2024-02-26', 0, '-', '0', '-', 1, 1),
(58, 1, 18, '2024-02-27', 0, '-', '0', '-', 2, 3),
(59, 1, 18, '2024-02-27', 0, '-', '0', '-', 2, 3),
(60, 1, 18, '2024-02-27', 0, '-', '0', '-', 2, 3),
(61, 1, 18, '2024-02-27', 0, '-', '0', '-', 2, 3),
(62, 1, 19, '2024-02-27', 0, '-', '0', '-', 3, 1),
(63, 1, 20, '2024-02-27', 0, '-', '0', '-', 6, 1),
(64, 1, 22, '2024-02-29', 1, '2000', '0', '-', 0, 1),
(65, 2, 36, '2024-03-01', 0, '-', '0', '-', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_lengkap`, `alamat`, `role`, `email`, `no_telpon`, `password`) VALUES
(1, 'Raihan Ramdhani', 'Jalan Baku Jaya', 'admin', 'raihanramdhani229@gmail.com', '082125604700', '123'),
(2, 'Raihan Ramdhani2', 'Gracia', 'petugas', 'raihanramdhani229@gmail.com', '088882255664', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kategori`
--

CREATE TABLE `tb_sub_kategori` (
  `id_sub_kategori` varchar(11) NOT NULL,
  `nama_sub_kategori` varchar(50) NOT NULL,
  `id_kategori_buku` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_kategori`
--

INSERT INTO `tb_sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`, `id_kategori_buku`) VALUES
('KS-001', 'Horor Comedy', 'KK-001'),
('KS-002', 'Romance Islam', 'KK-001'),
('KS-003', 'Horor Comedy', 'KK-002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ulasan_buku`
--

CREATE TABLE `tb_ulasan_buku` (
  `id_ulasan` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` float NOT NULL,
  `tanggal_ulasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ulasan_buku`
--

INSERT INTO `tb_ulasan_buku` (`id_ulasan`, `id_member`, `id_buku`, `ulasan`, `rating`, `tanggal_ulasan`) VALUES
(15, 15, 'KB-001', 'wibu', 1.3, '2024-02-29'),
(16, 15, 'KB-003', 'Sangar', 0.5, '2024-02-29'),
(17, 1, 'KB-003', 'wow', 4.5, '2024-03-01'),
(18, 1, 'KB-002', 'shafqi ganteng', 4.8, '2024-03-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_kategori_buku`
--
ALTER TABLE `tb_kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indexes for table `tb_koleksi_buku`
--
ALTER TABLE `tb_koleksi_buku`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_sub_kategori`
--
ALTER TABLE `tb_sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indexes for table `tb_ulasan_buku`
--
ALTER TABLE `tb_ulasan_buku`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_koleksi_buku`
--
ALTER TABLE `tb_koleksi_buku`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ulasan_buku`
--
ALTER TABLE `tb_ulasan_buku`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
