-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2023 at 02:53 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rapot_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id` int NOT NULL,
  `id_siswa_kelas` int NOT NULL,
  `id_semester` int NOT NULL,
  `s` int NOT NULL,
  `i` int NOT NULL,
  `a` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id`, `id_siswa_kelas`, `id_semester`, `s`, `i`, `a`) VALUES
(1, 1, 1, 1, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 2, 1, 0, 0, 0),
(4, 2, 2, 0, 0, 0),
(5, 3, 1, 0, 0, 0),
(6, 3, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(55) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `username`, `password`, `nama_guru`, `token`) VALUES
(12312312, 'tes123', '220466675e31b9d20c051d5e57974150', 'tes123', NULL),
(66342364, 'gilang', '220466675e31b9d20c051d5e57974150', 'gilang', NULL),
(77777777, 'ivan', '220466675e31b9d20c051d5e57974150', 'ivan', NULL),
(12123242, 'ahmad', '25d55ad283aa400af464c76d713c07ad', 'Ahmadi', NULL),
(43123324, 'nurul', '220466675e31b9d20c051d5e57974150', 'Nurul', NULL),
(17090022, 'ilham', '57cf5ad49695e3adc1a29cf47a43bc06', 'ilham', 'NSrHOm8e3x1It'),
(11223311, 'rudi', '220466675e31b9d20c051d5e57974150', 'Rudi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru_mapel`
--

CREATE TABLE `tb_guru_mapel` (
  `id_guru_mapel` int NOT NULL,
  `nip` int NOT NULL,
  `id_mapel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_guru_mapel`
--

INSERT INTO `tb_guru_mapel` (`id_guru_mapel`, `nip`, `id_mapel`) VALUES
(21, 12123242, 2),
(22, 12123242, 3),
(23, 43123324, 1),
(26, 17090022, 8),
(27, 12312312, 6),
(30, 77777777, 4),
(31, 11223311, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int NOT NULL,
  `nama_ujian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_ujian`) VALUES
(1, 'UH 1'),
(2, 'UH 2'),
(3, 'UH 3'),
(4, 'UH 4'),
(5, 'UH 5 '),
(6, 'UH 6'),
(7, 'UH 7'),
(8, 'UH 8'),
(9, 'UTS GANJIL'),
(10, 'UAS GANJIL'),
(11, 'UTS GENAP'),
(12, 'UKK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisupd`
--

CREATE TABLE `tb_jenisupd` (
  `id_upd` int NOT NULL,
  `nama_upd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jenisupd`
--

INSERT INTO `tb_jenisupd` (`id_upd`, `nama_upd`) VALUES
(1, 'Paskibra'),
(2, 'Basket'),
(3, 'Voli'),
(4, 'Android'),
(5, 'Catur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenpel`
--

CREATE TABLE `tb_jenpel` (
  `id_jenpel` int NOT NULL,
  `jenpel` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jenpel`
--

INSERT INTO `tb_jenpel` (`id_jenpel`, `jenpel`) VALUES
(1, 'Normatif'),
(2, 'Adaptif'),
(3, 'Produktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pengetahuan'),
(2, 'Keterampilan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kepsek`
--

CREATE TABLE `tb_kepsek` (
  `id_kepsek` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_kepsek` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kepsek`
--

INSERT INTO `tb_kepsek` (`id_kepsek`, `username`, `password`, `nama_kepsek`, `token`) VALUES
(1, 'kepsek', 'a2ed32cae296647110b3dbbf60c3f445', 'Handayani', 'adS05I1fTqN8Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `id_jenpel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `mapel`, `id_jenpel`) VALUES
(1, 'Pendidikan Agama Islam', 2),
(2, 'PPKN', 1),
(3, 'B. Indonesia', 1),
(4, 'Matematika', 2),
(5, 'Kewirausahaan', 2),
(6, 'B. Inggris', 1),
(7, 'Rekayasa Perangkat Lunak', 3),
(8, 'Pemograman', 3),
(9, 'OOP', 3),
(10, 'tes', 1),
(11, 'perbankan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int NOT NULL,
  `id_mapel` int NOT NULL,
  `id_jenis` int NOT NULL,
  `id_kategori` int NOT NULL,
  `id_siswa_kelas` int NOT NULL,
  `nilai` float NOT NULL,
  `editable` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id`, `id_mapel`, `id_jenis`, `id_kategori`, `id_siswa_kelas`, `nilai`, `editable`) VALUES
(1, 1, 1, 1, 1, 0, NULL),
(2, 1, 1, 2, 1, 0, NULL),
(3, 1, 2, 1, 1, 0, NULL),
(4, 1, 2, 2, 1, 0, NULL),
(5, 1, 3, 1, 1, 0, NULL),
(6, 1, 3, 2, 1, 0, NULL),
(7, 1, 4, 1, 1, 0, NULL),
(8, 1, 4, 2, 1, 0, NULL),
(9, 1, 5, 1, 1, 0, NULL),
(10, 1, 5, 2, 1, 0, NULL),
(11, 1, 6, 1, 1, 0, NULL),
(12, 1, 6, 2, 1, 0, NULL),
(13, 1, 7, 1, 1, 0, NULL),
(14, 1, 7, 2, 1, 0, NULL),
(15, 1, 8, 1, 1, 0, NULL),
(16, 1, 8, 2, 1, 0, NULL),
(17, 1, 9, 1, 1, 0, NULL),
(18, 1, 9, 2, 1, 0, NULL),
(19, 1, 10, 1, 1, 0, NULL),
(20, 1, 10, 2, 1, 0, NULL),
(21, 1, 11, 1, 1, 0, NULL),
(22, 1, 11, 2, 1, 0, NULL),
(23, 1, 12, 1, 1, 0, NULL),
(24, 1, 12, 2, 1, 0, NULL),
(25, 2, 1, 1, 1, 0, NULL),
(26, 2, 1, 2, 1, 0, NULL),
(27, 2, 2, 1, 1, 0, NULL),
(28, 2, 2, 2, 1, 0, NULL),
(29, 2, 3, 1, 1, 0, NULL),
(30, 2, 3, 2, 1, 0, NULL),
(31, 2, 4, 1, 1, 0, NULL),
(32, 2, 4, 2, 1, 0, NULL),
(33, 2, 5, 1, 1, 0, NULL),
(34, 2, 5, 2, 1, 0, NULL),
(35, 2, 6, 1, 1, 0, NULL),
(36, 2, 6, 2, 1, 0, NULL),
(37, 2, 7, 1, 1, 0, NULL),
(38, 2, 7, 2, 1, 0, NULL),
(39, 2, 8, 1, 1, 0, NULL),
(40, 2, 8, 2, 1, 0, NULL),
(41, 2, 9, 1, 1, 0, NULL),
(42, 2, 9, 2, 1, 0, NULL),
(43, 2, 10, 1, 1, 0, NULL),
(44, 2, 10, 2, 1, 0, NULL),
(45, 2, 11, 1, 1, 0, NULL),
(46, 2, 11, 2, 1, 0, NULL),
(47, 2, 12, 1, 1, 0, NULL),
(48, 2, 12, 2, 1, 0, NULL),
(49, 3, 1, 1, 1, 0, NULL),
(50, 3, 1, 2, 1, 0, NULL),
(51, 3, 2, 1, 1, 0, NULL),
(52, 3, 2, 2, 1, 0, NULL),
(53, 3, 3, 1, 1, 0, NULL),
(54, 3, 3, 2, 1, 0, NULL),
(55, 3, 4, 1, 1, 0, NULL),
(56, 3, 4, 2, 1, 0, NULL),
(57, 3, 5, 1, 1, 0, NULL),
(58, 3, 5, 2, 1, 0, NULL),
(59, 3, 6, 1, 1, 0, NULL),
(60, 3, 6, 2, 1, 0, NULL),
(61, 3, 7, 1, 1, 0, NULL),
(62, 3, 7, 2, 1, 0, NULL),
(63, 3, 8, 1, 1, 0, NULL),
(64, 3, 8, 2, 1, 0, NULL),
(65, 3, 9, 1, 1, 0, NULL),
(66, 3, 9, 2, 1, 0, NULL),
(67, 3, 10, 1, 1, 0, NULL),
(68, 3, 10, 2, 1, 0, NULL),
(69, 3, 11, 1, 1, 0, NULL),
(70, 3, 11, 2, 1, 0, NULL),
(71, 3, 12, 1, 1, 0, NULL),
(72, 3, 12, 2, 1, 0, NULL),
(73, 4, 1, 1, 1, 0, NULL),
(74, 4, 1, 2, 1, 0, NULL),
(75, 4, 2, 1, 1, 0, NULL),
(76, 4, 2, 2, 1, 0, NULL),
(77, 4, 3, 1, 1, 0, NULL),
(78, 4, 3, 2, 1, 0, NULL),
(79, 4, 4, 1, 1, 0, NULL),
(80, 4, 4, 2, 1, 0, NULL),
(81, 4, 5, 1, 1, 0, NULL),
(82, 4, 5, 2, 1, 0, NULL),
(83, 4, 6, 1, 1, 0, NULL),
(84, 4, 6, 2, 1, 0, NULL),
(85, 4, 7, 1, 1, 0, NULL),
(86, 4, 7, 2, 1, 0, NULL),
(87, 4, 8, 1, 1, 0, NULL),
(88, 4, 8, 2, 1, 0, NULL),
(89, 4, 9, 1, 1, 0, NULL),
(90, 4, 9, 2, 1, 0, NULL),
(91, 4, 10, 1, 1, 0, NULL),
(92, 4, 10, 2, 1, 0, NULL),
(93, 4, 11, 1, 1, 0, NULL),
(94, 4, 11, 2, 1, 0, NULL),
(95, 4, 12, 1, 1, 0, NULL),
(96, 4, 12, 2, 1, 0, NULL),
(97, 5, 1, 1, 1, 0, NULL),
(98, 5, 1, 2, 1, 0, NULL),
(99, 5, 2, 1, 1, 0, NULL),
(100, 5, 2, 2, 1, 0, NULL),
(101, 5, 3, 1, 1, 0, NULL),
(102, 5, 3, 2, 1, 0, NULL),
(103, 5, 4, 1, 1, 0, NULL),
(104, 5, 4, 2, 1, 0, NULL),
(105, 5, 5, 1, 1, 0, NULL),
(106, 5, 5, 2, 1, 0, NULL),
(107, 5, 6, 1, 1, 0, NULL),
(108, 5, 6, 2, 1, 0, NULL),
(109, 5, 7, 1, 1, 0, NULL),
(110, 5, 7, 2, 1, 0, NULL),
(111, 5, 8, 1, 1, 0, NULL),
(112, 5, 8, 2, 1, 0, NULL),
(113, 5, 9, 1, 1, 0, NULL),
(114, 5, 9, 2, 1, 0, NULL),
(115, 5, 10, 1, 1, 0, NULL),
(116, 5, 10, 2, 1, 0, NULL),
(117, 5, 11, 1, 1, 0, NULL),
(118, 5, 11, 2, 1, 0, NULL),
(119, 5, 12, 1, 1, 0, NULL),
(120, 5, 12, 2, 1, 0, NULL),
(121, 6, 1, 1, 1, 0, NULL),
(122, 6, 1, 2, 1, 0, NULL),
(123, 6, 2, 1, 1, 0, NULL),
(124, 6, 2, 2, 1, 0, NULL),
(125, 6, 3, 1, 1, 0, NULL),
(126, 6, 3, 2, 1, 0, NULL),
(127, 6, 4, 1, 1, 0, NULL),
(128, 6, 4, 2, 1, 0, NULL),
(129, 6, 5, 1, 1, 0, NULL),
(130, 6, 5, 2, 1, 0, NULL),
(131, 6, 6, 1, 1, 0, NULL),
(132, 6, 6, 2, 1, 0, NULL),
(133, 6, 7, 1, 1, 0, NULL),
(134, 6, 7, 2, 1, 0, NULL),
(135, 6, 8, 1, 1, 0, NULL),
(136, 6, 8, 2, 1, 0, NULL),
(137, 6, 9, 1, 1, 0, NULL),
(138, 6, 9, 2, 1, 0, NULL),
(139, 6, 10, 1, 1, 0, NULL),
(140, 6, 10, 2, 1, 0, NULL),
(141, 6, 11, 1, 1, 0, NULL),
(142, 6, 11, 2, 1, 0, NULL),
(143, 6, 12, 1, 1, 0, NULL),
(144, 6, 12, 2, 1, 0, NULL),
(145, 7, 1, 1, 1, 0, NULL),
(146, 7, 1, 2, 1, 0, NULL),
(147, 7, 2, 1, 1, 0, NULL),
(148, 7, 2, 2, 1, 0, NULL),
(149, 7, 3, 1, 1, 0, NULL),
(150, 7, 3, 2, 1, 0, NULL),
(151, 7, 4, 1, 1, 0, NULL),
(152, 7, 4, 2, 1, 0, NULL),
(153, 7, 5, 1, 1, 0, NULL),
(154, 7, 5, 2, 1, 0, NULL),
(155, 7, 6, 1, 1, 0, NULL),
(156, 7, 6, 2, 1, 0, NULL),
(157, 7, 7, 1, 1, 0, NULL),
(158, 7, 7, 2, 1, 0, NULL),
(159, 7, 8, 1, 1, 0, NULL),
(160, 7, 8, 2, 1, 0, NULL),
(161, 7, 9, 1, 1, 0, NULL),
(162, 7, 9, 2, 1, 0, NULL),
(163, 7, 10, 1, 1, 0, NULL),
(164, 7, 10, 2, 1, 0, NULL),
(165, 7, 11, 1, 1, 0, NULL),
(166, 7, 11, 2, 1, 0, NULL),
(167, 7, 12, 1, 1, 0, NULL),
(168, 7, 12, 2, 1, 0, NULL),
(169, 8, 1, 1, 1, 80, '2023-09-06 00:30:37'),
(170, 8, 1, 2, 1, 0, NULL),
(171, 8, 2, 1, 1, 0, NULL),
(172, 8, 2, 2, 1, 0, NULL),
(173, 8, 3, 1, 1, 0, NULL),
(174, 8, 3, 2, 1, 0, NULL),
(175, 8, 4, 1, 1, 0, NULL),
(176, 8, 4, 2, 1, 0, NULL),
(177, 8, 5, 1, 1, 0, NULL),
(178, 8, 5, 2, 1, 0, NULL),
(179, 8, 6, 1, 1, 0, NULL),
(180, 8, 6, 2, 1, 0, NULL),
(181, 8, 7, 1, 1, 0, NULL),
(182, 8, 7, 2, 1, 0, NULL),
(183, 8, 8, 1, 1, 0, NULL),
(184, 8, 8, 2, 1, 0, NULL),
(185, 8, 9, 1, 1, 0, NULL),
(186, 8, 9, 2, 1, 0, NULL),
(187, 8, 10, 1, 1, 0, NULL),
(188, 8, 10, 2, 1, 0, NULL),
(189, 8, 11, 1, 1, 0, NULL),
(190, 8, 11, 2, 1, 0, NULL),
(191, 8, 12, 1, 1, 0, NULL),
(192, 8, 12, 2, 1, 0, NULL),
(193, 9, 1, 1, 1, 0, NULL),
(194, 9, 1, 2, 1, 0, NULL),
(195, 9, 2, 1, 1, 0, NULL),
(196, 9, 2, 2, 1, 0, NULL),
(197, 9, 3, 1, 1, 0, NULL),
(198, 9, 3, 2, 1, 0, NULL),
(199, 9, 4, 1, 1, 0, NULL),
(200, 9, 4, 2, 1, 0, NULL),
(201, 9, 5, 1, 1, 0, NULL),
(202, 9, 5, 2, 1, 0, NULL),
(203, 9, 6, 1, 1, 0, NULL),
(204, 9, 6, 2, 1, 0, NULL),
(205, 9, 7, 1, 1, 0, NULL),
(206, 9, 7, 2, 1, 0, NULL),
(207, 9, 8, 1, 1, 0, NULL),
(208, 9, 8, 2, 1, 0, NULL),
(209, 9, 9, 1, 1, 0, NULL),
(210, 9, 9, 2, 1, 0, NULL),
(211, 9, 10, 1, 1, 0, NULL),
(212, 9, 10, 2, 1, 0, NULL),
(213, 9, 11, 1, 1, 0, NULL),
(214, 9, 11, 2, 1, 0, NULL),
(215, 9, 12, 1, 1, 0, NULL),
(216, 9, 12, 2, 1, 0, NULL),
(217, 10, 1, 1, 1, 0, NULL),
(218, 10, 1, 2, 1, 0, NULL),
(219, 10, 2, 1, 1, 0, NULL),
(220, 10, 2, 2, 1, 0, NULL),
(221, 10, 3, 1, 1, 0, NULL),
(222, 10, 3, 2, 1, 0, NULL),
(223, 10, 4, 1, 1, 0, NULL),
(224, 10, 4, 2, 1, 0, NULL),
(225, 10, 5, 1, 1, 0, NULL),
(226, 10, 5, 2, 1, 0, NULL),
(227, 10, 6, 1, 1, 0, NULL),
(228, 10, 6, 2, 1, 0, NULL),
(229, 10, 7, 1, 1, 0, NULL),
(230, 10, 7, 2, 1, 0, NULL),
(231, 10, 8, 1, 1, 0, NULL),
(232, 10, 8, 2, 1, 0, NULL),
(233, 10, 9, 1, 1, 0, NULL),
(234, 10, 9, 2, 1, 0, NULL),
(235, 10, 10, 1, 1, 0, NULL),
(236, 10, 10, 2, 1, 0, NULL),
(237, 10, 11, 1, 1, 0, NULL),
(238, 10, 11, 2, 1, 0, NULL),
(239, 10, 12, 1, 1, 0, NULL),
(240, 10, 12, 2, 1, 0, NULL),
(241, 11, 1, 1, 1, 0, NULL),
(242, 11, 1, 2, 1, 0, NULL),
(243, 11, 2, 1, 1, 0, NULL),
(244, 11, 2, 2, 1, 0, NULL),
(245, 11, 3, 1, 1, 0, NULL),
(246, 11, 3, 2, 1, 0, NULL),
(247, 11, 4, 1, 1, 0, NULL),
(248, 11, 4, 2, 1, 0, NULL),
(249, 11, 5, 1, 1, 0, NULL),
(250, 11, 5, 2, 1, 0, NULL),
(251, 11, 6, 1, 1, 0, NULL),
(252, 11, 6, 2, 1, 0, NULL),
(253, 11, 7, 1, 1, 0, NULL),
(254, 11, 7, 2, 1, 0, NULL),
(255, 11, 8, 1, 1, 0, NULL),
(256, 11, 8, 2, 1, 0, NULL),
(257, 11, 9, 1, 1, 0, NULL),
(258, 11, 9, 2, 1, 0, NULL),
(259, 11, 10, 1, 1, 0, NULL),
(260, 11, 10, 2, 1, 0, NULL),
(261, 11, 11, 1, 1, 0, NULL),
(262, 11, 11, 2, 1, 0, NULL),
(263, 11, 12, 1, 1, 0, NULL),
(264, 11, 12, 2, 1, 0, NULL),
(265, 1, 1, 1, 2, 0, NULL),
(266, 1, 1, 2, 2, 0, NULL),
(267, 1, 2, 1, 2, 0, NULL),
(268, 1, 2, 2, 2, 0, NULL),
(269, 1, 3, 1, 2, 0, NULL),
(270, 1, 3, 2, 2, 0, NULL),
(271, 1, 4, 1, 2, 0, NULL),
(272, 1, 4, 2, 2, 0, NULL),
(273, 1, 5, 1, 2, 0, NULL),
(274, 1, 5, 2, 2, 0, NULL),
(275, 1, 6, 1, 2, 0, NULL),
(276, 1, 6, 2, 2, 0, NULL),
(277, 1, 7, 1, 2, 0, NULL),
(278, 1, 7, 2, 2, 0, NULL),
(279, 1, 8, 1, 2, 0, NULL),
(280, 1, 8, 2, 2, 0, NULL),
(281, 1, 9, 1, 2, 0, NULL),
(282, 1, 9, 2, 2, 0, NULL),
(283, 1, 10, 1, 2, 0, NULL),
(284, 1, 10, 2, 2, 0, NULL),
(285, 1, 11, 1, 2, 0, NULL),
(286, 1, 11, 2, 2, 0, NULL),
(287, 1, 12, 1, 2, 0, NULL),
(288, 1, 12, 2, 2, 0, NULL),
(289, 2, 1, 1, 2, 0, NULL),
(290, 2, 1, 2, 2, 0, NULL),
(291, 2, 2, 1, 2, 0, NULL),
(292, 2, 2, 2, 2, 0, NULL),
(293, 2, 3, 1, 2, 0, NULL),
(294, 2, 3, 2, 2, 0, NULL),
(295, 2, 4, 1, 2, 0, NULL),
(296, 2, 4, 2, 2, 0, NULL),
(297, 2, 5, 1, 2, 0, NULL),
(298, 2, 5, 2, 2, 0, NULL),
(299, 2, 6, 1, 2, 0, NULL),
(300, 2, 6, 2, 2, 0, NULL),
(301, 2, 7, 1, 2, 0, NULL),
(302, 2, 7, 2, 2, 0, NULL),
(303, 2, 8, 1, 2, 0, NULL),
(304, 2, 8, 2, 2, 0, NULL),
(305, 2, 9, 1, 2, 0, NULL),
(306, 2, 9, 2, 2, 0, NULL),
(307, 2, 10, 1, 2, 0, NULL),
(308, 2, 10, 2, 2, 0, NULL),
(309, 2, 11, 1, 2, 0, NULL),
(310, 2, 11, 2, 2, 0, NULL),
(311, 2, 12, 1, 2, 0, NULL),
(312, 2, 12, 2, 2, 0, NULL),
(313, 3, 1, 1, 2, 0, NULL),
(314, 3, 1, 2, 2, 0, NULL),
(315, 3, 2, 1, 2, 0, NULL),
(316, 3, 2, 2, 2, 0, NULL),
(317, 3, 3, 1, 2, 0, NULL),
(318, 3, 3, 2, 2, 0, NULL),
(319, 3, 4, 1, 2, 0, NULL),
(320, 3, 4, 2, 2, 0, NULL),
(321, 3, 5, 1, 2, 0, NULL),
(322, 3, 5, 2, 2, 0, NULL),
(323, 3, 6, 1, 2, 0, NULL),
(324, 3, 6, 2, 2, 0, NULL),
(325, 3, 7, 1, 2, 0, NULL),
(326, 3, 7, 2, 2, 0, NULL),
(327, 3, 8, 1, 2, 0, NULL),
(328, 3, 8, 2, 2, 0, NULL),
(329, 3, 9, 1, 2, 0, NULL),
(330, 3, 9, 2, 2, 0, NULL),
(331, 3, 10, 1, 2, 0, NULL),
(332, 3, 10, 2, 2, 0, NULL),
(333, 3, 11, 1, 2, 0, NULL),
(334, 3, 11, 2, 2, 0, NULL),
(335, 3, 12, 1, 2, 0, NULL),
(336, 3, 12, 2, 2, 0, NULL),
(337, 4, 1, 1, 2, 0, NULL),
(338, 4, 1, 2, 2, 0, NULL),
(339, 4, 2, 1, 2, 0, NULL),
(340, 4, 2, 2, 2, 0, NULL),
(341, 4, 3, 1, 2, 0, NULL),
(342, 4, 3, 2, 2, 0, NULL),
(343, 4, 4, 1, 2, 0, NULL),
(344, 4, 4, 2, 2, 0, NULL),
(345, 4, 5, 1, 2, 0, NULL),
(346, 4, 5, 2, 2, 0, NULL),
(347, 4, 6, 1, 2, 0, NULL),
(348, 4, 6, 2, 2, 0, NULL),
(349, 4, 7, 1, 2, 0, NULL),
(350, 4, 7, 2, 2, 0, NULL),
(351, 4, 8, 1, 2, 0, NULL),
(352, 4, 8, 2, 2, 0, NULL),
(353, 4, 9, 1, 2, 0, NULL),
(354, 4, 9, 2, 2, 0, NULL),
(355, 4, 10, 1, 2, 0, NULL),
(356, 4, 10, 2, 2, 0, NULL),
(357, 4, 11, 1, 2, 0, NULL),
(358, 4, 11, 2, 2, 0, NULL),
(359, 4, 12, 1, 2, 0, NULL),
(360, 4, 12, 2, 2, 0, NULL),
(361, 5, 1, 1, 2, 0, NULL),
(362, 5, 1, 2, 2, 0, NULL),
(363, 5, 2, 1, 2, 0, NULL),
(364, 5, 2, 2, 2, 0, NULL),
(365, 5, 3, 1, 2, 0, NULL),
(366, 5, 3, 2, 2, 0, NULL),
(367, 5, 4, 1, 2, 0, NULL),
(368, 5, 4, 2, 2, 0, NULL),
(369, 5, 5, 1, 2, 0, NULL),
(370, 5, 5, 2, 2, 0, NULL),
(371, 5, 6, 1, 2, 0, NULL),
(372, 5, 6, 2, 2, 0, NULL),
(373, 5, 7, 1, 2, 0, NULL),
(374, 5, 7, 2, 2, 0, NULL),
(375, 5, 8, 1, 2, 0, NULL),
(376, 5, 8, 2, 2, 0, NULL),
(377, 5, 9, 1, 2, 0, NULL),
(378, 5, 9, 2, 2, 0, NULL),
(379, 5, 10, 1, 2, 0, NULL),
(380, 5, 10, 2, 2, 0, NULL),
(381, 5, 11, 1, 2, 0, NULL),
(382, 5, 11, 2, 2, 0, NULL),
(383, 5, 12, 1, 2, 0, NULL),
(384, 5, 12, 2, 2, 0, NULL),
(385, 6, 1, 1, 2, 0, NULL),
(386, 6, 1, 2, 2, 0, NULL),
(387, 6, 2, 1, 2, 0, NULL),
(388, 6, 2, 2, 2, 0, NULL),
(389, 6, 3, 1, 2, 0, NULL),
(390, 6, 3, 2, 2, 0, NULL),
(391, 6, 4, 1, 2, 0, NULL),
(392, 6, 4, 2, 2, 0, NULL),
(393, 6, 5, 1, 2, 0, NULL),
(394, 6, 5, 2, 2, 0, NULL),
(395, 6, 6, 1, 2, 0, NULL),
(396, 6, 6, 2, 2, 0, NULL),
(397, 6, 7, 1, 2, 0, NULL),
(398, 6, 7, 2, 2, 0, NULL),
(399, 6, 8, 1, 2, 0, NULL),
(400, 6, 8, 2, 2, 0, NULL),
(401, 6, 9, 1, 2, 0, NULL),
(402, 6, 9, 2, 2, 0, NULL),
(403, 6, 10, 1, 2, 0, NULL),
(404, 6, 10, 2, 2, 0, NULL),
(405, 6, 11, 1, 2, 0, NULL),
(406, 6, 11, 2, 2, 0, NULL),
(407, 6, 12, 1, 2, 0, NULL),
(408, 6, 12, 2, 2, 0, NULL),
(409, 7, 1, 1, 2, 0, NULL),
(410, 7, 1, 2, 2, 0, NULL),
(411, 7, 2, 1, 2, 0, NULL),
(412, 7, 2, 2, 2, 0, NULL),
(413, 7, 3, 1, 2, 0, NULL),
(414, 7, 3, 2, 2, 0, NULL),
(415, 7, 4, 1, 2, 0, NULL),
(416, 7, 4, 2, 2, 0, NULL),
(417, 7, 5, 1, 2, 0, NULL),
(418, 7, 5, 2, 2, 0, NULL),
(419, 7, 6, 1, 2, 0, NULL),
(420, 7, 6, 2, 2, 0, NULL),
(421, 7, 7, 1, 2, 0, NULL),
(422, 7, 7, 2, 2, 0, NULL),
(423, 7, 8, 1, 2, 0, NULL),
(424, 7, 8, 2, 2, 0, NULL),
(425, 7, 9, 1, 2, 0, NULL),
(426, 7, 9, 2, 2, 0, NULL),
(427, 7, 10, 1, 2, 0, NULL),
(428, 7, 10, 2, 2, 0, NULL),
(429, 7, 11, 1, 2, 0, NULL),
(430, 7, 11, 2, 2, 0, NULL),
(431, 7, 12, 1, 2, 0, NULL),
(432, 7, 12, 2, 2, 0, NULL),
(433, 8, 1, 1, 2, 90, '2023-09-08 01:54:37'),
(434, 8, 1, 2, 2, 0, NULL),
(435, 8, 2, 1, 2, 0, NULL),
(436, 8, 2, 2, 2, 0, NULL),
(437, 8, 3, 1, 2, 0, NULL),
(438, 8, 3, 2, 2, 0, NULL),
(439, 8, 4, 1, 2, 0, NULL),
(440, 8, 4, 2, 2, 0, NULL),
(441, 8, 5, 1, 2, 0, NULL),
(442, 8, 5, 2, 2, 0, NULL),
(443, 8, 6, 1, 2, 0, NULL),
(444, 8, 6, 2, 2, 0, NULL),
(445, 8, 7, 1, 2, 0, NULL),
(446, 8, 7, 2, 2, 0, NULL),
(447, 8, 8, 1, 2, 0, NULL),
(448, 8, 8, 2, 2, 0, NULL),
(449, 8, 9, 1, 2, 0, NULL),
(450, 8, 9, 2, 2, 0, NULL),
(451, 8, 10, 1, 2, 0, NULL),
(452, 8, 10, 2, 2, 0, NULL),
(453, 8, 11, 1, 2, 0, NULL),
(454, 8, 11, 2, 2, 0, NULL),
(455, 8, 12, 1, 2, 0, NULL),
(456, 8, 12, 2, 2, 0, NULL),
(457, 9, 1, 1, 2, 0, NULL),
(458, 9, 1, 2, 2, 0, NULL),
(459, 9, 2, 1, 2, 0, NULL),
(460, 9, 2, 2, 2, 0, NULL),
(461, 9, 3, 1, 2, 0, NULL),
(462, 9, 3, 2, 2, 0, NULL),
(463, 9, 4, 1, 2, 0, NULL),
(464, 9, 4, 2, 2, 0, NULL),
(465, 9, 5, 1, 2, 0, NULL),
(466, 9, 5, 2, 2, 0, NULL),
(467, 9, 6, 1, 2, 0, NULL),
(468, 9, 6, 2, 2, 0, NULL),
(469, 9, 7, 1, 2, 0, NULL),
(470, 9, 7, 2, 2, 0, NULL),
(471, 9, 8, 1, 2, 0, NULL),
(472, 9, 8, 2, 2, 0, NULL),
(473, 9, 9, 1, 2, 0, NULL),
(474, 9, 9, 2, 2, 0, NULL),
(475, 9, 10, 1, 2, 0, NULL),
(476, 9, 10, 2, 2, 0, NULL),
(477, 9, 11, 1, 2, 0, NULL),
(478, 9, 11, 2, 2, 0, NULL),
(479, 9, 12, 1, 2, 0, NULL),
(480, 9, 12, 2, 2, 0, NULL),
(481, 10, 1, 1, 2, 0, NULL),
(482, 10, 1, 2, 2, 0, NULL),
(483, 10, 2, 1, 2, 0, NULL),
(484, 10, 2, 2, 2, 0, NULL),
(485, 10, 3, 1, 2, 0, NULL),
(486, 10, 3, 2, 2, 0, NULL),
(487, 10, 4, 1, 2, 0, NULL),
(488, 10, 4, 2, 2, 0, NULL),
(489, 10, 5, 1, 2, 0, NULL),
(490, 10, 5, 2, 2, 0, NULL),
(491, 10, 6, 1, 2, 0, NULL),
(492, 10, 6, 2, 2, 0, NULL),
(493, 10, 7, 1, 2, 0, NULL),
(494, 10, 7, 2, 2, 0, NULL),
(495, 10, 8, 1, 2, 0, NULL),
(496, 10, 8, 2, 2, 0, NULL),
(497, 10, 9, 1, 2, 0, NULL),
(498, 10, 9, 2, 2, 0, NULL),
(499, 10, 10, 1, 2, 0, NULL),
(500, 10, 10, 2, 2, 0, NULL),
(501, 10, 11, 1, 2, 0, NULL),
(502, 10, 11, 2, 2, 0, NULL),
(503, 10, 12, 1, 2, 0, NULL),
(504, 10, 12, 2, 2, 0, NULL),
(505, 11, 1, 1, 2, 0, NULL),
(506, 11, 1, 2, 2, 0, NULL),
(507, 11, 2, 1, 2, 0, NULL),
(508, 11, 2, 2, 2, 0, NULL),
(509, 11, 3, 1, 2, 0, NULL),
(510, 11, 3, 2, 2, 0, NULL),
(511, 11, 4, 1, 2, 0, NULL),
(512, 11, 4, 2, 2, 0, NULL),
(513, 11, 5, 1, 2, 0, NULL),
(514, 11, 5, 2, 2, 0, NULL),
(515, 11, 6, 1, 2, 0, NULL),
(516, 11, 6, 2, 2, 0, NULL),
(517, 11, 7, 1, 2, 0, NULL),
(518, 11, 7, 2, 2, 0, NULL),
(519, 11, 8, 1, 2, 0, NULL),
(520, 11, 8, 2, 2, 0, NULL),
(521, 11, 9, 1, 2, 0, NULL),
(522, 11, 9, 2, 2, 0, NULL),
(523, 11, 10, 1, 2, 0, NULL),
(524, 11, 10, 2, 2, 0, NULL),
(525, 11, 11, 1, 2, 0, NULL),
(526, 11, 11, 2, 2, 0, NULL),
(527, 11, 12, 1, 2, 0, NULL),
(528, 11, 12, 2, 2, 0, NULL),
(529, 1, 1, 1, 3, 0, NULL),
(530, 1, 1, 2, 3, 0, NULL),
(531, 1, 2, 1, 3, 0, NULL),
(532, 1, 2, 2, 3, 0, NULL),
(533, 1, 3, 1, 3, 0, NULL),
(534, 1, 3, 2, 3, 0, NULL),
(535, 1, 4, 1, 3, 0, NULL),
(536, 1, 4, 2, 3, 0, NULL),
(537, 1, 5, 1, 3, 0, NULL),
(538, 1, 5, 2, 3, 0, NULL),
(539, 1, 6, 1, 3, 0, NULL),
(540, 1, 6, 2, 3, 0, NULL),
(541, 1, 7, 1, 3, 0, NULL),
(542, 1, 7, 2, 3, 0, NULL),
(543, 1, 8, 1, 3, 0, NULL),
(544, 1, 8, 2, 3, 0, NULL),
(545, 1, 9, 1, 3, 0, NULL),
(546, 1, 9, 2, 3, 0, NULL),
(547, 1, 10, 1, 3, 0, NULL),
(548, 1, 10, 2, 3, 0, NULL),
(549, 1, 11, 1, 3, 0, NULL),
(550, 1, 11, 2, 3, 0, NULL),
(551, 1, 12, 1, 3, 0, NULL),
(552, 1, 12, 2, 3, 0, NULL),
(553, 2, 1, 1, 3, 0, NULL),
(554, 2, 1, 2, 3, 0, NULL),
(555, 2, 2, 1, 3, 0, NULL),
(556, 2, 2, 2, 3, 0, NULL),
(557, 2, 3, 1, 3, 0, NULL),
(558, 2, 3, 2, 3, 0, NULL),
(559, 2, 4, 1, 3, 0, NULL),
(560, 2, 4, 2, 3, 0, NULL),
(561, 2, 5, 1, 3, 0, NULL),
(562, 2, 5, 2, 3, 0, NULL),
(563, 2, 6, 1, 3, 0, NULL),
(564, 2, 6, 2, 3, 0, NULL),
(565, 2, 7, 1, 3, 0, NULL),
(566, 2, 7, 2, 3, 0, NULL),
(567, 2, 8, 1, 3, 0, NULL),
(568, 2, 8, 2, 3, 0, NULL),
(569, 2, 9, 1, 3, 0, NULL),
(570, 2, 9, 2, 3, 0, NULL),
(571, 2, 10, 1, 3, 0, NULL),
(572, 2, 10, 2, 3, 0, NULL),
(573, 2, 11, 1, 3, 0, NULL),
(574, 2, 11, 2, 3, 0, NULL),
(575, 2, 12, 1, 3, 0, NULL),
(576, 2, 12, 2, 3, 0, NULL),
(577, 3, 1, 1, 3, 0, NULL),
(578, 3, 1, 2, 3, 0, NULL),
(579, 3, 2, 1, 3, 0, NULL),
(580, 3, 2, 2, 3, 0, NULL),
(581, 3, 3, 1, 3, 0, NULL),
(582, 3, 3, 2, 3, 0, NULL),
(583, 3, 4, 1, 3, 0, NULL),
(584, 3, 4, 2, 3, 0, NULL),
(585, 3, 5, 1, 3, 0, NULL),
(586, 3, 5, 2, 3, 0, NULL),
(587, 3, 6, 1, 3, 0, NULL),
(588, 3, 6, 2, 3, 0, NULL),
(589, 3, 7, 1, 3, 0, NULL),
(590, 3, 7, 2, 3, 0, NULL),
(591, 3, 8, 1, 3, 0, NULL),
(592, 3, 8, 2, 3, 0, NULL),
(593, 3, 9, 1, 3, 0, NULL),
(594, 3, 9, 2, 3, 0, NULL),
(595, 3, 10, 1, 3, 0, NULL),
(596, 3, 10, 2, 3, 0, NULL),
(597, 3, 11, 1, 3, 0, NULL),
(598, 3, 11, 2, 3, 0, NULL),
(599, 3, 12, 1, 3, 0, NULL),
(600, 3, 12, 2, 3, 0, NULL),
(601, 4, 1, 1, 3, 0, NULL),
(602, 4, 1, 2, 3, 0, NULL),
(603, 4, 2, 1, 3, 0, NULL),
(604, 4, 2, 2, 3, 0, NULL),
(605, 4, 3, 1, 3, 0, NULL),
(606, 4, 3, 2, 3, 0, NULL),
(607, 4, 4, 1, 3, 0, NULL),
(608, 4, 4, 2, 3, 0, NULL),
(609, 4, 5, 1, 3, 0, NULL),
(610, 4, 5, 2, 3, 0, NULL),
(611, 4, 6, 1, 3, 0, NULL),
(612, 4, 6, 2, 3, 0, NULL),
(613, 4, 7, 1, 3, 0, NULL),
(614, 4, 7, 2, 3, 0, NULL),
(615, 4, 8, 1, 3, 0, NULL),
(616, 4, 8, 2, 3, 0, NULL),
(617, 4, 9, 1, 3, 0, NULL),
(618, 4, 9, 2, 3, 0, NULL),
(619, 4, 10, 1, 3, 0, NULL),
(620, 4, 10, 2, 3, 0, NULL),
(621, 4, 11, 1, 3, 0, NULL),
(622, 4, 11, 2, 3, 0, NULL),
(623, 4, 12, 1, 3, 0, NULL),
(624, 4, 12, 2, 3, 0, NULL),
(625, 5, 1, 1, 3, 0, NULL),
(626, 5, 1, 2, 3, 0, NULL),
(627, 5, 2, 1, 3, 0, NULL),
(628, 5, 2, 2, 3, 0, NULL),
(629, 5, 3, 1, 3, 0, NULL),
(630, 5, 3, 2, 3, 0, NULL),
(631, 5, 4, 1, 3, 0, NULL),
(632, 5, 4, 2, 3, 0, NULL),
(633, 5, 5, 1, 3, 0, NULL),
(634, 5, 5, 2, 3, 0, NULL),
(635, 5, 6, 1, 3, 0, NULL),
(636, 5, 6, 2, 3, 0, NULL),
(637, 5, 7, 1, 3, 0, NULL),
(638, 5, 7, 2, 3, 0, NULL),
(639, 5, 8, 1, 3, 0, NULL),
(640, 5, 8, 2, 3, 0, NULL),
(641, 5, 9, 1, 3, 0, NULL),
(642, 5, 9, 2, 3, 0, NULL),
(643, 5, 10, 1, 3, 0, NULL),
(644, 5, 10, 2, 3, 0, NULL),
(645, 5, 11, 1, 3, 0, NULL),
(646, 5, 11, 2, 3, 0, NULL),
(647, 5, 12, 1, 3, 0, NULL),
(648, 5, 12, 2, 3, 0, NULL),
(649, 6, 1, 1, 3, 0, NULL),
(650, 6, 1, 2, 3, 0, NULL),
(651, 6, 2, 1, 3, 0, NULL),
(652, 6, 2, 2, 3, 0, NULL),
(653, 6, 3, 1, 3, 0, NULL),
(654, 6, 3, 2, 3, 0, NULL),
(655, 6, 4, 1, 3, 0, NULL),
(656, 6, 4, 2, 3, 0, NULL),
(657, 6, 5, 1, 3, 0, NULL),
(658, 6, 5, 2, 3, 0, NULL),
(659, 6, 6, 1, 3, 0, NULL),
(660, 6, 6, 2, 3, 0, NULL),
(661, 6, 7, 1, 3, 0, NULL),
(662, 6, 7, 2, 3, 0, NULL),
(663, 6, 8, 1, 3, 0, NULL),
(664, 6, 8, 2, 3, 0, NULL),
(665, 6, 9, 1, 3, 0, NULL),
(666, 6, 9, 2, 3, 0, NULL),
(667, 6, 10, 1, 3, 0, NULL),
(668, 6, 10, 2, 3, 0, NULL),
(669, 6, 11, 1, 3, 0, NULL),
(670, 6, 11, 2, 3, 0, NULL),
(671, 6, 12, 1, 3, 0, NULL),
(672, 6, 12, 2, 3, 0, NULL),
(673, 7, 1, 1, 3, 0, NULL),
(674, 7, 1, 2, 3, 0, NULL),
(675, 7, 2, 1, 3, 0, NULL),
(676, 7, 2, 2, 3, 0, NULL),
(677, 7, 3, 1, 3, 0, NULL),
(678, 7, 3, 2, 3, 0, NULL),
(679, 7, 4, 1, 3, 0, NULL),
(680, 7, 4, 2, 3, 0, NULL),
(681, 7, 5, 1, 3, 0, NULL),
(682, 7, 5, 2, 3, 0, NULL),
(683, 7, 6, 1, 3, 0, NULL),
(684, 7, 6, 2, 3, 0, NULL),
(685, 7, 7, 1, 3, 0, NULL),
(686, 7, 7, 2, 3, 0, NULL),
(687, 7, 8, 1, 3, 0, NULL),
(688, 7, 8, 2, 3, 0, NULL),
(689, 7, 9, 1, 3, 0, NULL),
(690, 7, 9, 2, 3, 0, NULL),
(691, 7, 10, 1, 3, 0, NULL),
(692, 7, 10, 2, 3, 0, NULL),
(693, 7, 11, 1, 3, 0, NULL),
(694, 7, 11, 2, 3, 0, NULL),
(695, 7, 12, 1, 3, 0, NULL),
(696, 7, 12, 2, 3, 0, NULL),
(697, 8, 1, 1, 3, 0, NULL),
(698, 8, 1, 2, 3, 0, NULL),
(699, 8, 2, 1, 3, 0, NULL),
(700, 8, 2, 2, 3, 0, NULL),
(701, 8, 3, 1, 3, 0, NULL),
(702, 8, 3, 2, 3, 0, NULL),
(703, 8, 4, 1, 3, 0, NULL),
(704, 8, 4, 2, 3, 0, NULL),
(705, 8, 5, 1, 3, 0, NULL),
(706, 8, 5, 2, 3, 0, NULL),
(707, 8, 6, 1, 3, 0, NULL),
(708, 8, 6, 2, 3, 0, NULL),
(709, 8, 7, 1, 3, 0, NULL),
(710, 8, 7, 2, 3, 0, NULL),
(711, 8, 8, 1, 3, 0, NULL),
(712, 8, 8, 2, 3, 0, NULL),
(713, 8, 9, 1, 3, 0, NULL),
(714, 8, 9, 2, 3, 0, NULL),
(715, 8, 10, 1, 3, 0, NULL),
(716, 8, 10, 2, 3, 0, NULL),
(717, 8, 11, 1, 3, 0, NULL),
(718, 8, 11, 2, 3, 0, NULL),
(719, 8, 12, 1, 3, 0, NULL),
(720, 8, 12, 2, 3, 0, NULL),
(721, 9, 1, 1, 3, 0, NULL),
(722, 9, 1, 2, 3, 0, NULL),
(723, 9, 2, 1, 3, 0, NULL),
(724, 9, 2, 2, 3, 0, NULL),
(725, 9, 3, 1, 3, 0, NULL),
(726, 9, 3, 2, 3, 0, NULL),
(727, 9, 4, 1, 3, 0, NULL),
(728, 9, 4, 2, 3, 0, NULL),
(729, 9, 5, 1, 3, 0, NULL),
(730, 9, 5, 2, 3, 0, NULL),
(731, 9, 6, 1, 3, 0, NULL),
(732, 9, 6, 2, 3, 0, NULL),
(733, 9, 7, 1, 3, 0, NULL),
(734, 9, 7, 2, 3, 0, NULL),
(735, 9, 8, 1, 3, 0, NULL),
(736, 9, 8, 2, 3, 0, NULL),
(737, 9, 9, 1, 3, 0, NULL),
(738, 9, 9, 2, 3, 0, NULL),
(739, 9, 10, 1, 3, 0, NULL),
(740, 9, 10, 2, 3, 0, NULL),
(741, 9, 11, 1, 3, 0, NULL),
(742, 9, 11, 2, 3, 0, NULL),
(743, 9, 12, 1, 3, 0, NULL),
(744, 9, 12, 2, 3, 0, NULL),
(745, 10, 1, 1, 3, 0, NULL),
(746, 10, 1, 2, 3, 0, NULL),
(747, 10, 2, 1, 3, 0, NULL),
(748, 10, 2, 2, 3, 0, NULL),
(749, 10, 3, 1, 3, 0, NULL),
(750, 10, 3, 2, 3, 0, NULL),
(751, 10, 4, 1, 3, 0, NULL),
(752, 10, 4, 2, 3, 0, NULL),
(753, 10, 5, 1, 3, 0, NULL),
(754, 10, 5, 2, 3, 0, NULL),
(755, 10, 6, 1, 3, 0, NULL),
(756, 10, 6, 2, 3, 0, NULL),
(757, 10, 7, 1, 3, 0, NULL),
(758, 10, 7, 2, 3, 0, NULL),
(759, 10, 8, 1, 3, 0, NULL),
(760, 10, 8, 2, 3, 0, NULL),
(761, 10, 9, 1, 3, 0, NULL),
(762, 10, 9, 2, 3, 0, NULL),
(763, 10, 10, 1, 3, 0, NULL),
(764, 10, 10, 2, 3, 0, NULL),
(765, 10, 11, 1, 3, 0, NULL),
(766, 10, 11, 2, 3, 0, NULL),
(767, 10, 12, 1, 3, 0, NULL),
(768, 10, 12, 2, 3, 0, NULL),
(769, 11, 1, 1, 3, 0, NULL),
(770, 11, 1, 2, 3, 0, NULL),
(771, 11, 2, 1, 3, 0, NULL),
(772, 11, 2, 2, 3, 0, NULL),
(773, 11, 3, 1, 3, 0, NULL),
(774, 11, 3, 2, 3, 0, NULL),
(775, 11, 4, 1, 3, 0, NULL),
(776, 11, 4, 2, 3, 0, NULL),
(777, 11, 5, 1, 3, 0, NULL),
(778, 11, 5, 2, 3, 0, NULL),
(779, 11, 6, 1, 3, 0, NULL),
(780, 11, 6, 2, 3, 0, NULL),
(781, 11, 7, 1, 3, 0, NULL),
(782, 11, 7, 2, 3, 0, NULL),
(783, 11, 8, 1, 3, 0, NULL),
(784, 11, 8, 2, 3, 0, NULL),
(785, 11, 9, 1, 3, 0, NULL),
(786, 11, 9, 2, 3, 0, NULL),
(787, 11, 10, 1, 3, 0, NULL),
(788, 11, 10, 2, 3, 0, NULL),
(789, 11, 11, 1, 3, 0, NULL),
(790, 11, 11, 2, 3, 0, NULL),
(791, 11, 12, 1, 3, 0, NULL),
(792, 11, 12, 2, 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ortu`
--

CREATE TABLE `tb_ortu` (
  `nis` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_ortu`
--

INSERT INTO `tb_ortu` (`nis`, `username`, `password`, `nama`, `token`) VALUES
(23030002, 'ahmadi', '220466675e31b9d20c051d5e57974150', 'Ahmadi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id` int NOT NULL,
  `id_siswa_kelas` int NOT NULL,
  `semester` int NOT NULL,
  `prestasi1` varchar(50) NOT NULL,
  `prestasi2` varchar(50) NOT NULL,
  `prestasi3` varchar(50) NOT NULL,
  `keterangan1` varchar(50) NOT NULL,
  `keterangan2` varchar(50) NOT NULL,
  `keterangan3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id`, `id_siswa_kelas`, `semester`, `prestasi1`, `prestasi2`, `prestasi3`, `keterangan1`, `keterangan2`, `keterangan3`) VALUES
(1, 1, 1, 'MVP Gold Lane', '-', '-', '-', '-', '-'),
(2, 1, 2, '-', '-', '-', '-', '-', '-'),
(3, 2, 1, '-', '-', '-', '-', '-', '-'),
(4, 2, 2, '-', '-', '-', '-', '-', '-'),
(5, 3, 1, '-', '-', '-', '-', '-', '-'),
(6, 3, 2, '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ps`
--

CREATE TABLE `tb_ps` (
  `id_ps` int NOT NULL,
  `id_rombel` int NOT NULL,
  `nama_ps` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_ps`
--

INSERT INTO `tb_ps` (`id_ps`, `id_rombel`, `nama_ps`, `username`, `password`, `token`) VALUES
(7, 1, 'tes123', 'tes', '25d55ad283aa400af464c76d713c07ad', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rayon`
--

CREATE TABLE `tb_rayon` (
  `id_rayon` int NOT NULL,
  `rayon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_rayon`
--

INSERT INTO `tb_rayon` (`id_rayon`, `rayon`) VALUES
(1, 'Cisarua 1'),
(2, 'Cisarua 2'),
(3, 'Cisarua 3'),
(4, 'Cisarua 4'),
(5, 'Cibedug 1'),
(6, 'Cibedug 2'),
(7, 'Cibedug 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rombel`
--

CREATE TABLE `tb_rombel` (
  `id_rombel` int NOT NULL,
  `rombel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_rombel`
--

INSERT INTO `tb_rombel` (`id_rombel`, `rombel`) VALUES
(1, 'TKJ X - 1'),
(2, 'TKJ X - 2'),
(3, 'TKR X - 1'),
(4, 'TKR X - 2'),
(5, 'PBS X - 1'),
(6, 'PBS X - 2'),
(7, 'AK X - 1'),
(9, 'AK X - 2'),
(10, 'TKJ XI - 1'),
(11, 'TKJ XII - 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int NOT NULL,
  `semester` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `username`, `password`, `token`) VALUES
(23030001, 'Adi Hidayat', '23030001', '220466675e31b9d20c051d5e57974150', NULL),
(23030002, 'Agung Sahrul', '23030002', '220466675e31b9d20c051d5e57974150', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa_kelas`
--

CREATE TABLE `tb_siswa_kelas` (
  `id_siswa_kelas` int NOT NULL,
  `nis` int NOT NULL,
  `id_rombel` int NOT NULL,
  `tahun_ajaran` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_siswa_kelas`
--

INSERT INTO `tb_siswa_kelas` (`id_siswa_kelas`, `nis`, `id_rombel`, `tahun_ajaran`) VALUES
(1, 23030001, 1, '2023-2024'),
(2, 23030002, 2, '2023-2024'),
(3, 23030001, 10, '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_ta` int NOT NULL,
  `tahun` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`id_ta`, `tahun`) VALUES
(5, '2023'),
(6, '2024'),
(7, '2025'),
(8, '2026'),
(9, '2027');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tu`
--

CREATE TABLE `tb_tu` (
  `id_tu` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tu`
--

INSERT INTO `tb_tu` (`id_tu`, `username`, `password`, `nama`, `token`, `created`) VALUES
(1, 'tu', '6eea9b7ef19179a06954edd0f6c05ceb', 'Ikbal', 'O7gwaNToy9zR0', NULL),
(2, 'reza', '25d55ad283aa400af464c76d713c07ad', 'reza', '1QNh3ugEFjxln', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_upd`
--

CREATE TABLE `tb_upd` (
  `id` int NOT NULL,
  `id_siswa_kelas` int NOT NULL,
  `semester` int NOT NULL,
  `upd1` varchar(50) NOT NULL,
  `upd2` varchar(50) NOT NULL,
  `nilai1` varchar(1) NOT NULL,
  `nilai2` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_upd`
--

INSERT INTO `tb_upd` (`id`, `id_siswa_kelas`, `semester`, `upd1`, `upd2`, `nilai1`, `nilai2`) VALUES
(1, 1, 1, 'Paskibra', '-', '-', '-'),
(2, 1, 2, '-', '-', '-', '-'),
(3, 2, 1, '-', '-', '-', '-'),
(4, 2, 2, '-', '-', '-', '-'),
(5, 3, 1, '-', '-', '-', '-'),
(6, 3, 2, '-', '-', '-', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_guru_mapel`
--
ALTER TABLE `tb_guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_jenisupd`
--
ALTER TABLE `tb_jenisupd`
  ADD PRIMARY KEY (`id_upd`);

--
-- Indexes for table `tb_jenpel`
--
ALTER TABLE `tb_jenpel`
  ADD PRIMARY KEY (`id_jenpel`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ortu`
--
ALTER TABLE `tb_ortu`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ps`
--
ALTER TABLE `tb_ps`
  ADD PRIMARY KEY (`id_ps`);

--
-- Indexes for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Indexes for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_siswa_kelas`
--
ALTER TABLE `tb_siswa_kelas`
  ADD PRIMARY KEY (`id_siswa_kelas`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tb_tu`
--
ALTER TABLE `tb_tu`
  ADD PRIMARY KEY (`id_tu`);

--
-- Indexes for table `tb_upd`
--
ALTER TABLE `tb_upd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_guru_mapel`
--
ALTER TABLE `tb_guru_mapel`
  MODIFY `id_guru_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_jenisupd`
--
ALTER TABLE `tb_jenisupd`
  MODIFY `id_upd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jenpel`
--
ALTER TABLE `tb_jenpel`
  MODIFY `id_jenpel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  MODIFY `id_kepsek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=793;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_ps`
--
ALTER TABLE `tb_ps`
  MODIFY `id_ps` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  MODIFY `id_rayon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  MODIFY `id_rombel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_siswa_kelas`
--
ALTER TABLE `tb_siswa_kelas`
  MODIFY `id_siswa_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_ta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_tu`
--
ALTER TABLE `tb_tu`
  MODIFY `id_tu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_upd`
--
ALTER TABLE `tb_upd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
