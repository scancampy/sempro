-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 05:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sempro`
--
DROP DATABASE IF EXISTS `sempro`;
CREATE DATABASE IF NOT EXISTS `sempro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sempro`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(30) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `kode_mk`, `nama`, `is_deleted`) VALUES
(1, '11011002', 'PERHITUNGAN KEFARMASIAN', 0),
(2, '11011003', 'BAHASA INGGRIS', 0),
(3, '11011101', 'BIOMOLEKUL DAN BIOLOGI SEL', 0),
(4, '11011102', 'BOTANI FARMASI', 0),
(5, '11011201', 'KIMIA UMUM', 0),
(6, '11011202', 'KIMIA ORGANIK I', 0),
(7, '11011401', 'ANATOMI & FISIOLOGI MANUSIA', 0),
(8, '11011001', 'PROFESI FARMASI', 0),
(9, '11012301', 'DESAIN SEDIAAN FARMASI', 0),
(10, '11012402', 'FARMAKOLOGI DASAR', 0),
(11, '11012204', 'KIMIA ANALISIS KUALITATIF', 0),
(12, '11012203', 'KIMIA ORGANIK II', 0),
(13, '11012104', 'FARMAKOGNOSI', 0),
(14, '11012103', 'BIOKIMIA DAN BIOLOGI MOLEKULER', 0),
(15, '11012004', 'INFORMATIKA KEFARMASIAN', 0),
(16, '11013005', 'BAHASA INDONESIA', 0),
(17, '11013105', 'FITOTERAPI', 0),
(18, '11013106', 'TEKNOLOGI FITOFARMASI', 0),
(19, '11013205', 'KIMIA ANALISIS KUANTITATIF', 0),
(20, '11013302', 'KIMIA FISIKA FARMASI', 0),
(21, '11013403', 'KONSEP LAYANAN KEFARMASIAN', 0),
(22, '11013404', 'PENGOBATAN BERBASIS BUKTI', 0),
(23, '11013405', 'IMUNOLOGI DAN HEMATOLOGI', 0),
(24, '115588', 'TEKNOLOGI SEDIAAN STERIL', 0),
(25, '115587', 'TEKNOLOGI SEDIAAN SEMISOLIDA-LIKUIDA', 0),
(26, '115586', 'BIOFARMASI-FARMAKOKINETIKA I', 0),
(27, '115468', 'INFORMASI OBAT I', 0),
(28, '115347', 'FITOKIMIA', 1),
(29, '115226', 'ANALISIS FISIKO-KIMIA I', 0),
(30, '115469', 'FARMASI KOMUNITAS I', 0),
(31, '116589', 'FORMULASI & TEKNOLOGI SEDIAAN SOLIDA', 0),
(32, '116590', 'BIOFARMASI-FARMAKOKINETIKA II', 0),
(33, '116471', 'FARMASI KOMUNITAS II', 0),
(34, '116470', 'FARMASI KLINIS I', 0),
(35, '116229', 'ANALISIS OBAT', 0),
(36, '116228', 'ANALISIS FISIKO-KIMIA II', 0),
(37, '116227', 'KIMIA MEDISINAL I', 0),
(38, '117230', 'KIMIA MEDISINAL II', 0),
(39, '117591', 'FARMASI INDUSTRI I', 0),
(40, '118108', 'KEWIRAUSAHAAN', 0),
(41, '118000', 'SKRIPSI', 0),
(42, '18476', 'FARMAKO-EKONOMI', 0),
(43, '118594', 'FARMASI INDUSTRI II', 0),
(44, '117593', 'SISTEM PENGHANTARAN OBAT', 0),
(45, '117592', 'KOSMETOLOGI', 0),
(46, '117535', 'SISTEM PENGHANTARAN KOSMETIKA', 0),
(47, '117475', 'INFORMASI OBAT II', 0),
(48, '117474', 'FARMASI KLINIS II', 0),
(49, '117473', 'PENGOBATAN BERBASIS BUKTI', 0),
(50, '117349', 'OBAT ASLI INDONESIA', 0),
(51, '117234', 'PENGEM&PENJAMINAN MUTU PRODUK KOSMETIK', 0),
(52, '117233', 'KIMIA LINGKUNGAN', 0),
(53, '117232', 'KIMIA FORENSIK', 0),
(54, '117231', 'ANALISIS FISIKO-KIMIA III', 0),
(55, '116593', 'KOSMETIKA MEDIK', 0),
(56, '116592', 'TEKNOLOGI KOSMETIKA', 0),
(57, '116472', 'ANALISIS KLINIS', 0),
(58, '116348', 'TEKNOLOGI OBAT HERBAL II', 0),
(59, '115347', 'FITOKIMIA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

DROP TABLE IF EXISTS `guardian`;
CREATE TABLE `guardian` (
  `nrp` varchar(30) NOT NULL,
  `npk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`nrp`, `npk`) VALUES
('110118001', '215039'),
('110118002', '216039'),
('110118005', '215039'),
('110118008', '214032'),
('110118009', '217006'),
('110118010', '218024'),
('110118014', '217001'),
('110118015', '214031'),
('110118017', '214031'),
('110118019', '214031'),
('110118020', '215039'),
('110118021', '215039'),
('110118022', '217001'),
('110118025', '214032'),
('110118027', '214032'),
('110118031', '215039'),
('110118032', '215040'),
('110118033', '215039'),
('110118034', '214031'),
('110118045', '214031'),
('110118046', '214031'),
('110118062', '215040'),
('110118068', '217001'),
('110118075', '218024'),
('110118078', '218027'),
('110118082', '218027'),
('110118084', '217006'),
('110118087', '218024'),
('110118088', '217001'),
('110118092', '215040'),
('110118093', '217006'),
('110118095', '215040'),
('110118100', '214031'),
('110118101', '215040'),
('110118102', '215039'),
('110118104', '216039'),
('110118107', '214032'),
('110118112', '219038'),
('110118113', '218027'),
('110118114', '219038'),
('110118122', '218027'),
('110118127', '204031'),
('110118129', '215039'),
('110118134', '218024'),
('110118135', '219038'),
('110118136', '214032'),
('110118138', '217006'),
('110118149', '217006'),
('110118151', '217006'),
('110118152', '217006'),
('110118155', '216039'),
('110118158', '217006'),
('110118162', '218024'),
('110118164', '214031'),
('110118165', '217006'),
('110118170', '216039'),
('110118171', '218024'),
('110118174', '215039'),
('110118175', '216039'),
('110118176', '217001'),
('110118177', '217001'),
('110118178', '215040'),
('110118179', '215039'),
('110118180', '215040'),
('110118181', '217006'),
('110118182', '217006'),
('110118183', '214032'),
('110118184', '215039'),
('110118185', '214032'),
('110118189', '216039'),
('110118190', '215040'),
('110118191', '214032'),
('110118193', '218024'),
('110118196', '217001'),
('110118197', '218027'),
('110118198', '214031'),
('110118199', '214031'),
('110118202', '215039'),
('110118204', '215040'),
('110118212', '216039'),
('110118213', '217006'),
('110118214', '215040'),
('110118216', '218027'),
('110118220', '218024'),
('110118223', '216039'),
('110118224', '218024'),
('110118225', '214032'),
('110118227', '217006'),
('110118228', '214032'),
('110118230', '214032'),
('110118232', '215039'),
('110118233', '217001'),
('110118236', '217001'),
('110118237', '218024'),
('110118238', '217001'),
('110118241', '214032'),
('110118243', '217001'),
('110118248', '218024'),
('110118249', '217001'),
('110118250', '218024'),
('110118251', '217001'),
('110118252', '214031'),
('110118253', '216039'),
('110118256', '214031'),
('110118259', '218024'),
('110118261', '215039'),
('110118262', '218027'),
('110118263', '215039'),
('110118269', '217006'),
('110118270', '218024'),
('110118273', '218027'),
('110118279', '218027'),
('110118280', '215039'),
('110118281', '215040'),
('110118282', '214032'),
('110118283', '214031'),
('110118284', '219038'),
('110118285', '219038'),
('110118288', '214031'),
('110118291', '218027'),
('110118293', '218024'),
('110118294', '218027'),
('110118295', '214031'),
('110118304', '218027'),
('110118311', '215039'),
('110118316', '219038'),
('110118319', '216039'),
('110118320', '215040'),
('110118321', '214031'),
('110118324', '215040'),
('110118325', '218027'),
('110118326', '214032'),
('110118327', '215039'),
('110118330', '217001'),
('110118333', '216039'),
('110118334', '215040'),
('110118336', '218027'),
('110118337', '215039'),
('110118342', '216039'),
('110118343', '216039'),
('110118345', '215039'),
('110118346', '217006'),
('110118350', '216039'),
('110118355', '217006'),
('110118357', '217006'),
('110118360', '218024'),
('110118361', '219038'),
('110118362', '219038'),
('110118364', '217006'),
('110118368', '218024'),
('110118373', '216039'),
('110118374', '217006'),
('110118376', '216039'),
('110118377', '214032'),
('110118378', '218024'),
('110118382', '219038'),
('110118384', '218027'),
('110118385', '217001'),
('110118386', '214031'),
('110118390', '219038'),
('110118391', '217001'),
('110118393', '214032'),
('110118397', '216039'),
('110118401', '217001'),
('110118402', '218027'),
('110118405', '214032'),
('110118406', '218027'),
('110118407', '218027'),
('110118409', '218027'),
('110118410', '215040'),
('110118415', '215040'),
('110118418', '218024'),
('110118419', '217001'),
('110118423', '217006'),
('110118424', '214031'),
('110118425', '217001'),
('110118426', '214032'),
('110118428', '216039'),
('110118430', '214031'),
('110118432', '216039'),
('110118433', '214032'),
('110118438', '219038'),
('110118440', '218027'),
('110118441', '215040'),
('110118442', '215040'),
('110118445', '215040'),
('110118446', '218024'),
('110118447', '217001'),
('110118448', '216039'),
('110118454', '215040');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

DROP TABLE IF EXISTS `lab`;
CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `nama_pendek` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `nama`, `nama_pendek`, `is_deleted`) VALUES
(1, 'Ilmu Kedokteran', 'IK', 0),
(2, 'Farmasetika', 'FAR', 0),
(3, 'Biologi Farmasi', 'BIO', 0),
(4, 'Farmasi Klinis Komunitas', 'FKK', 0),
(5, 'Ngawur', 'NG', 1),
(6, 'asdad', 'geg', 1),
(7, 'gwegw', 'wgwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
CREATE TABLE `lecturer` (
  `npk` varchar(30) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `lab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`npk`, `nama`, `lab_id`) VALUES
('182018', 'Drs. Ryanto Budiono, M.Si.', 1),
('189005', 'Dr. Farida Suhud, M.Si., Apt.', 1),
('199014', 'Dr. Dra. Christina Avanti, M.Si., Apt.', 2),
('199015', 'Dr. Aguslina Kirtishanti, S.Si., M.Kes., Apt', 4),
('200031', 'Dr. Ni Luh Dewi Aryani, S.Si., M.Si., Apt.', 2),
('200032', 'Alasen Sembiring Milala, S.Si., M.Si., Apt.', 2),
('201010', 'Dr. Dini Kesuma, S.Si., M.Si., Apt.', 1),
('201037', 'Dr. Rika Yulia, S.Si., Sp.FRS., Apt.', 4),
('203007', 'Kartini, S.Si., M.Si., Apt., Ph.D.', 3),
('204031', 'Dr. Dra. Azminah, M.Si.', 1),
('206023', 'Eko Setiawan, S.Farm., M.Sc., Apt.', 4),
('207011', 'Dr. Oeke Yunita, S.Si., M.Si., Apt.', 3),
('208019', 'Dr. Amelia Lorensia, S.Farm.,M.Farm-Klin.,Apt.', 4),
('208020', 'Andre', 0),
('211002', 'Dr.rer.nat. Ratih, S.Farm., M.Farm., Apt.', 1),
('211019', 'Endang Wahyu Fitriani, S.Farm., Apt., M.Farm.', 2),
('212003', 'Bobby Presley, S.Farm., M.Farm-Klin., Apt.', 4),
('212020', 'Aditya Trias Pradana, S.Farm., M.Si., Apt.', 2),
('213002', 'Dr. Krisyanti Budipramana, S.Farm., M.Farm., Apt.', 3),
('214011', 'Cynthia Marisca Muntu, S.Farm., M.Farm., Apt.', 2),
('214012', 'Ridho Islamie, S.Farm., M.Si., Apt.', 4),
('214031', 'Nina Dewi Oktaviyanti, S.Farm., M.Farm., Apt.', 3),
('214032', 'Alfian Hendra Krisnawan, S.Farm., M.Farm., Apt.', 3),
('215039', 'Karina Citra Rani, S.Farm., M.Farm., Apt.', 2),
('215040', 'Nikmatul Ikhrom Eka Jayani, S.Farm., M.Farm-Klin., Apt.', 3),
('216012', 'Dr. Magdalena Sri Handajani, M.Si., DFM., Apt.', 1),
('216013', 'Dr. Drs. Husin Rayesh Mallaleng, M.Kes., Apt.', 3),
('216039', 'Hanny Cahyadi, S.Farm., M.Farm-Klin., Apt.', 4),
('216060', 'Reine Risa Risthanti, S.Farm., M.Farm.Klin., Apt.', 1),
('217001', 'Dr. Finna Setiawan, S.Farm., M.Si.', 3),
('217006', 'Roisah Nawatila, S.Farm., M.Farm., Apt.', 2),
('217024', 'Prof. Dra. Indrajati Kohar, Ph.D.', 1),
('217068', 'Devyani Diah Wulansari, S.Farm., M.Si., Apt.', 4),
('218008', 'Dr. Dra. Ririn Sumiyani, M.Si., Apt.', 1),
('218024', 'Fawandi Fuad Alkindi, S.Farm., M.Farm., Apt.', 1),
('218025', 'Astridani Rizky Putranti, S.Farm., M.Farm., Apt.', 2),
('218027', 'Steven Victoria Halim, S.Farm., M.Farm., Apt.', 4),
('218036', 'Tegar Achsendo Yuniarta, S.Farm., M.Si.', 1),
('219032', 'Dra. Nani Parfati, M.S., Apt.', 2),
('219038', 'Dra. Lucia Endang Wuryaningsih, M.Si., Apt.', 4),
('219065', 'I Gede Ari Sumartha, S.Farm., M.Farm., Apt.', 0),
('219066', 'Vendra Setiawan, S.Farm., M.Farm., Apt.', 1),
('221011', 'Silvia, S.Farm., M.Farm-Klin., Apt.', 0),
('221012', 'Susilo Ari Wardani, S.Si., M.Kes., Apt.', 0),
('221016', 'Halim Priyahau Jaya, S.Farm., M.Farm-Klin., Apt.', 0),
('221042', 'Citra Hayu Adi Makayasa, S.Farm., M.Farm., Apt.', 2),
('221048', 'Drs. Harry Santosa, M.Si., Apt.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `nama`, `is_active`, `is_deleted`) VALUES
(1, 'GENAP 2021/2022', 0, 0),
(2, 'GASAL 2022/2023', 1, 0),
(4, 'GENAP 2022/2023', 0, 0),
(5, 'TES hapus', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `topik_id` int(11) NOT NULL,
  `nrp` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_eligibility`
--

DROP TABLE IF EXISTS `setting_eligibility`;
CREATE TABLE `setting_eligibility` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_alias` varchar(30) NOT NULL,
  `nilai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_eligibility`
--

INSERT INTO `setting_eligibility` (`id`, `nama`, `nama_alias`, `nilai`) VALUES
(1, 'IPK Minimal (batas bawah)', 'ipk_min_bawah', '2.00'),
(2, 'IPK Minimal (batas atas)', 'ipk_min_atas', '2.5'),
(3, 'IPK Minimal jika ada 1 nilai E untuk ikut Tugas Akhir', 'ipk_min_nilai_e', '2.75'),
(4, 'Kode MK Metpen & Statistika (pisahkan dengan koma jika lebih dari satu)', 'kode_mk', '114107'),
(5, 'Nilai Metpen minimal', 'nilai_metpen_min', 'C'),
(6, 'Total nilai D maksimum (dalam %)', 'total_d_max', '20'),
(7, 'Jumlah nilai E maksimum (batas bawah)', 'jumlah_nilai_e_max_bawah', '2'),
(8, 'Jumlah nilai E maksimum (batas atas)', 'jumlah_nilai_e_max_atas', '3');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `nama`) VALUES
(1, 'ajeng', 'Ajeng');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `nrp` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `ips` double DEFAULT NULL,
  `ipk` double DEFAULT NULL,
  `ipkm` double DEFAULT NULL,
  `eligible` tinyint(1) NOT NULL DEFAULT 0,
  `upload_ks` text DEFAULT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`nrp`, `username`, `nama`, `status`, `ips`, `ipk`, `ipkm`, `eligible`, `upload_ks`, `uploaded_date`) VALUES
('110118001', '', 'DEWI ROSALATUN NASHIHAH', 'Aktif', 2.75, 3.032, 3.032, 0, NULL, '2022-07-12 04:27:01'),
('110118002', '', 'JEANNY NATHALIA KRENS', 'Aktif', 2.413, 2.712, 2.712, 0, NULL, '2022-07-12 04:27:06'),
('110118005', '', 'ERIC INDRAWAN', 'Aktif', 3, 3.143, 3.143, 0, NULL, '2022-07-12 04:27:02'),
('110118008', '', 'CORNELIA ISYAI HARYANTI', 'Aktif', 1.6, 1.973, 2.017, 0, NULL, '2022-07-12 04:27:00'),
('110118009', '', 'NUR KHOFIFAH', 'Aktif', 2.159, 2.319, 2.319, 0, NULL, '2022-07-12 04:27:10'),
('110118010', '', 'RAHAYU DWI KUSUMANING AYU HARTANTO', 'Aktif', 2.841, 2.605, 2.605, 0, NULL, '2022-07-12 04:27:11'),
('110118014', '', 'MICHAEL WILLSON DARMAWAN', 'Aktif', 3.591, 3.391, 3.391, 0, NULL, '2022-07-12 04:27:08'),
('110118015', '', 'ALIFIA PUTRI FHATIMAH', 'Aktif', 3.333, 2.792, 2.792, 0, NULL, '2022-07-12 04:26:58'),
('110118017', '', 'ALFIANI DAMAYANTI SUHERTO', 'Aktif', 2.556, 2.466, 2.466, 0, NULL, '2022-07-12 04:26:57'),
('110118019', '', 'ANNISA FAHIRA PARYANTO', 'Aktif', 2.395, 2.168, 2.208, 0, NULL, '2022-07-12 04:26:58'),
('110118020', '', 'DEVINA WINY YOVITA', 'Aktif', 3.395, 3.205, 3.205, 0, NULL, '2022-07-12 04:27:01'),
('110118021', '', 'CORNELIUS ARIEL KRISTANTO', 'Aktif', 3.375, 3.442, 3.442, 0, NULL, '2022-07-12 04:27:01'),
('110118022', '', 'LARAS KUSUMADIANTI', 'Aktif', 2.977, 2.523, 2.523, 0, NULL, '2022-07-12 04:27:07'),
('110118025', '', 'AVY GENTA FAISAL', 'Aktif', 3.444, 3.003, 3.003, 0, NULL, '2022-07-12 04:26:59'),
('110118027', '', 'BAMBANG GUNAWAN', 'Aktif', 3.5, 3.229, 3.229, 0, NULL, '2022-07-12 04:26:59'),
('110118031', '', 'DEBORAH FELINDA HARI WIJAYA', 'Aktif', 3.853, 3.755, 3.755, 0, NULL, '2022-07-12 04:27:01'),
('110118032', '', 'GRACIA DEBORA SUSANTI', 'Aktif', 3.765, 3.79, 3.79, 0, NULL, '2022-07-12 04:27:04'),
('110118033', '', 'FATIMAH LIVIA CITRA', 'Aktif', 1.553, 2.104, 2.104, 0, NULL, '2022-07-12 04:27:03'),
('110118034', '', 'JESSICA PUTRI ANDHIKA', 'Aktif', 3.026, 3.297, 3.341, 0, NULL, '2022-07-12 04:26:57'),
('110118045', '', 'CHILSYA THAMARA HANDONO', 'Aktif', 3.045, 2.919, 2.919, 0, NULL, '2022-07-12 04:26:57'),
('110118046', '', 'DEVINA VERINA', 'Aktif', 2.563, 2.98, 2.98, 0, NULL, '2022-07-12 04:26:57'),
('110118062', '', 'FENNY JULIET SUSWANTO', 'Aktif', 3.762, 3.554, 3.554, 0, NULL, '2022-07-12 04:27:03'),
('110118068', '', 'MUHAMAT BAHRUL HUDA', 'Aktif', 3.318, 3.555, 3.555, 0, NULL, '2022-07-12 04:27:08'),
('110118075', '', 'RUT GUNAWAN', 'Aktif', 2.7, 2.993, 3.035, 0, NULL, '2022-07-12 04:27:12'),
('110118078', '', 'UMMIL FARAH', 'Aktif', 3, 2.698, 2.698, 0, NULL, '2022-07-12 04:27:14'),
('110118082', '', 'SANDRA BENITA ASTRIANI', 'Aktif', 2.205, 2.734, 2.734, 0, NULL, '2022-07-12 04:27:12'),
('110118084', '', 'NATASHA ANGELINA', 'Aktif', 3.182, 3.255, 3.255, 0, NULL, '2022-07-12 04:27:09'),
('110118087', '', 'PRAMESTY AFIFAH FADILLAH', 'Aktif', 2.87, 2.57, 2.629, 0, NULL, '2022-07-12 04:27:10'),
('110118088', '', 'MICHELLE ANGELIA', 'Aktif', 2.55, 2.791, 2.791, 0, NULL, '2022-07-12 04:27:08'),
('110118092', '', 'GEOFANNY DEANOVENA HERRY ADI', 'Aktif', 3.619, 3.269, 3.337, 0, NULL, '2022-07-12 04:27:04'),
('110118093', '', 'NUR AZIZAH FIRDAUS', 'Aktif', 1.905, 2.514, 2.551, 0, NULL, '2022-07-12 04:27:10'),
('110118095', '', 'FLORENSIA ANJELA WELLANAKA TAT', 'Aktif', 2.341, 2.762, 2.762, 0, NULL, '2022-07-12 04:27:04'),
('110118100', '', 'ALIF DANI ADHAM', 'Aktif', 2.65, 2.579, 2.579, 0, NULL, '2022-07-12 04:26:58'),
('110118101', '', 'FERRY RANKO SOEGIARTO', 'Aktif', 3.184, 2.926, 2.926, 0, NULL, '2022-07-12 04:27:03'),
('110118102', '', 'DINA CORY BELINDA LEIWAKABESSY', 'Aktif', 2.929, 2.615, 2.615, 0, NULL, '2022-07-12 04:27:02'),
('110118104', '', 'KEVIN RICHARD WINARDI', 'Aktif', 3.188, 2.698, 2.698, 0, NULL, '2022-07-12 04:27:06'),
('110118107', '', 'ARSANDAVA YUDHA SUTAMTO', 'Aktif', 2.688, 2.697, 2.697, 0, NULL, '2022-07-12 04:26:59'),
('110118112', '', 'WINDY ANG', 'Aktif', 3.304, 3.571, 3.571, 0, NULL, '2022-07-12 04:27:14'),
('110118113', '', 'TITA MELINIA SARI', 'Aktif', 2.75, 2.721, 2.721, 0, NULL, '2022-07-12 04:27:14'),
('110118114', '', 'YENI AROFAH', 'Aktif', 3, 2.827, 2.827, 0, NULL, '2022-07-12 04:27:15'),
('110118122', '', 'SIGIT PRAMONO', 'Aktif', 2.781, 3.09, 3.09, 0, NULL, '2022-07-12 04:27:13'),
('110118129', '', 'ELLEN PUSPITASARI', 'Aktif', 3.696, 3.639, 3.639, 0, NULL, '2022-07-12 04:27:02'),
('110118134', '', 'RIFA SABRINA SALSABILA', 'Aktif', 2.548, 2.596, 2.652, 0, NULL, '2022-07-12 04:27:12'),
('110118135', '', 'ZULVIARA PUSPITA DIAN NATASYA', 'Aktif', 2.464, 3.007, 3.007, 0, NULL, '2022-07-12 04:27:15'),
('110118136', '', 'CAKRA ADI WICAKSONO', 'Aktif', 2.75, 2.703, 2.703, 0, NULL, '2022-07-12 04:27:00'),
('110118138', '', 'NI LUH WASTI NATALIA PARAMAHITA', 'Aktif', 2.214, 2.82, 2.82, 0, NULL, '2022-07-12 04:27:09'),
('110118149', '', 'NADIAH TASYA FIRA', 'Aktif', 2.476, 2.766, 2.766, 0, NULL, '2022-07-12 04:27:08'),
('110118151', '', 'NI MADE AYU WULANDARI', 'Aktif', 2.3, 2.266, 2.266, 0, NULL, '2022-07-12 04:27:09'),
('110118152', '', 'NI PUTU WINDA PUSPAYANTI', 'Aktif', 2.85, 2.312, 2.352, 0, NULL, '2022-07-12 04:27:09'),
('110118155', '', 'IKA RUSLAMI APRILIA', 'Aktif', 1.5, 1.904, 1.904, 0, NULL, '2022-07-12 04:27:05'),
('110118158', '', 'NUR RAHMAH', 'Aktif', 2.565, 2.511, 2.511, 0, NULL, '2022-07-12 04:27:10'),
('110118162', '', 'PARAMITHA PRAMESWARI PUTRI HERMAWAN', 'Aktif', 2.3, 2.368, 2.439, 0, NULL, '2022-07-12 04:27:10'),
('110118164', '', 'ALIYA RACHMA CHAMILLA', 'Aktif', 3, 3.135, 3.135, 0, NULL, '2022-07-12 04:26:58'),
('110118165', '', 'NATHALIA WIDJAJA', 'Aktif', 2.295, 2.428, 2.428, 0, NULL, '2022-07-12 04:27:09'),
('110118170', '', 'KARTIKA NURUL YULIANDA SETYAWAN', 'Aktif', 3.095, 3.014, 3.014, 0, NULL, '2022-07-12 04:27:06'),
('110118171', '', 'PUSPA NURINDAH FIRDAUSI', 'Aktif', 2.75, 2.508, 2.55, 0, NULL, '2022-07-12 04:27:11'),
('110118174', '', 'ELOK SUTRA MELLFIONI', 'Aktif', 3.156, 3.378, 3.378, 0, NULL, '2022-07-12 04:27:02'),
('110118175', '', 'JESSICA RATNA YUNI ASTUTI', 'Aktif', 1.719, 1.792, 1.929, 0, NULL, '2022-07-12 04:27:06'),
('110118176', '', 'LILIANA AURELIA PANG', 'Aktif', 3.35, 2.842, 2.842, 0, NULL, '2022-07-12 04:27:07'),
('110118177', '', 'LIDIANA HISKIATI', 'Aktif', 2.364, 2.467, 2.467, 0, NULL, '2022-07-12 04:27:07'),
('110118178', '', 'HAMRYADI', 'Aktif', 3.042, 3.111, 3.111, 0, NULL, '2022-07-12 04:27:04'),
('110118179', '', 'DIANA PUTRI MANDASARI', 'Aktif', 3.568, 3.35, 3.35, 0, NULL, '2022-07-12 04:27:01'),
('110118180', '', 'FEBRIANTI PHANLIANA', 'Aktif', 3.605, 3.556, 3.556, 0, NULL, '2022-07-12 04:27:03'),
('110118181', '', 'NOVIANA SETIANUR', 'Aktif', 2.972, 2.872, 2.872, 0, NULL, '2022-07-12 04:27:10'),
('110118182', '', 'NIKEN WIDYA AZKA FIRDHAUSI', 'Aktif', 3, 3.059, 3.059, 0, NULL, '2022-07-12 04:27:09'),
('110118183', '', 'AQILLA FEBRIA HAYA', 'Aktif', 2.386, 2.382, 2.423, 0, NULL, '2022-07-12 04:26:58'),
('110118184', '', 'DAHLIA KOLINA', 'Aktif', 2.857, 2.867, 2.867, 0, NULL, '2022-07-12 04:27:01'),
('110118185', '', 'ARCHANJELA AURELIA FANNY AILET', 'Aktif', 2.479, 2.681, 2.681, 0, NULL, '2022-07-12 04:26:58'),
('110118189', '', 'KINANAH FEBRIANTI', 'Aktif', 2.179, 3.17, 3.17, 0, NULL, '2022-07-12 04:27:06'),
('110118190', '', 'FIKRI NUR AL-ISLAMI', 'Aktif', 2.977, 2.75, 2.75, 0, NULL, '2022-07-12 04:27:03'),
('110118191', '', 'BEBYL NAVELIUR WALADYHAMKA', 'Aktif', 1.75, 1.845, 2.038, 0, NULL, '2022-07-12 04:27:00'),
('110118193', '', 'RISKA FEBRIYANTI', 'Aktif', 3.409, 3.31, 3.31, 0, NULL, '2022-07-12 04:27:12'),
('110118196', '', 'MUHAMMAD DIAN WARDANA PUTRA', 'Aktif', 2.913, 2.921, 2.921, 0, NULL, '2022-07-12 04:27:08'),
('110118197', '', 'SILVIA DEWI S. PUTRI', 'Aktif', 1.7, 2.438, 2.516, 0, NULL, '2022-07-12 04:27:13'),
('110118198', '', 'ANDRIANOR', 'Aktif', 3.5, 3.333, 3.333, 0, NULL, '2022-07-12 04:26:58'),
('110118199', '', 'AKHMAD KASIM', 'Aktif', 2.386, 2.322, 2.41, 0, NULL, '2022-07-12 04:26:57'),
('110118202', '', 'EMA RACHMI MITHA ASTARI', 'Aktif', 3.205, 2.682, 2.721, 0, NULL, '2022-07-12 04:27:02'),
('110118204', '', 'I GUSTI NYOMAN ASTI MELYANTI', 'Aktif', 3.136, 2.439, 2.439, 0, NULL, '2022-07-12 04:27:05'),
('110118212', '', 'JOANNE NATALIE LEIWAKABESSY', 'Aktif', 2.75, 2.268, 2.268, 0, NULL, '2022-07-12 04:27:06'),
('110118213', '', 'NITA OKTAVIANI PERMATASARI', 'Aktif', 2.341, 2.631, 2.631, 0, NULL, '2022-07-12 04:27:09'),
('110118214', '', 'FENNY VERANITTA SANTA LUCIA', 'Aktif', 3.342, 3.118, 3.118, 0, NULL, '2022-07-12 04:27:03'),
('110118216', '', 'VIONA MEILINDA', 'Aktif', 2.682, 2.858, 2.858, 0, NULL, '2022-07-12 04:27:14'),
('110118220', '', 'QURROTUL AINI', 'Aktif', 3.174, 2.983, 2.983, 0, NULL, '2022-07-12 04:27:11'),
('110118223', '', 'JOSEPHINE', 'Aktif', 2.4, 2.093, 2.093, 0, NULL, '2022-07-12 04:27:06'),
('110118224', '', 'RIANDI FIYELEX SELMURY', 'Aktif', 2.292, 2.351, 2.351, 0, NULL, '2022-07-12 04:27:11'),
('110118225', '', 'BAGUS NGURAH ARDA PARAHITA RAHARJA', 'Aktif', 3.531, 3.191, 3.191, 0, NULL, '2022-07-12 04:26:59'),
('110118227', '', 'NUR AINA', 'Aktif', 3.688, 3.55, 3.55, 0, NULL, '2022-07-12 04:27:10'),
('110118228', '', 'AS-SYIFA DILUT TRI ANTOPO', 'Aktif', 2.786, 2.485, 2.485, 0, NULL, '2022-07-12 04:26:59'),
('110118230', '', 'AVRIETA PRAMAISSELLA', 'Aktif', 3.342, 3.299, 3.299, 0, NULL, '2022-07-12 04:26:59'),
('110118232', '', 'FEBRIANA PUAN MAHARANI', 'Aktif', 3.705, 3.548, 3.548, 0, NULL, '2022-07-12 04:27:03'),
('110118233', '', 'MELANIA DWI SAVITRI', 'Aktif', 2.595, 2.738, 2.738, 0, NULL, '2022-07-12 04:27:07'),
('110118236', '', 'MENTARI SUKMO AJI', 'Aktif', 3.263, 3.194, 3.194, 0, NULL, '2022-07-12 04:27:07'),
('110118237', '', 'PUTRIYATUL ULYA', 'Aktif', 1.25, 1.659, 1.793, 0, NULL, '2022-07-12 04:27:11'),
('110118238', '', 'MUKHAMMAD AWWALUL MASRURI', 'Aktif', 1.158, 1.992, 2.279, 0, NULL, '2022-07-12 04:27:08'),
('110118241', '', 'AUDY AMALIA', 'Aktif', 3.313, 3.124, 3.124, 0, NULL, '2022-07-12 04:26:59'),
('110118243', '', 'LORENSIA JESSICA KOSASIH', 'Aktif', 3.395, 3.188, 3.188, 0, NULL, '2022-07-12 04:27:07'),
('110118248', '', 'RIZKA NUR HANDAYANI', 'Aktif', 3, 2.753, 2.753, 0, NULL, '2022-07-12 04:27:12'),
('110118249', '', 'MILAWATI', 'Aktif', 2.225, 2.191, 2.227, 0, NULL, '2022-07-12 04:27:08'),
('110118250', '', 'REVANI FIRDAUSI ANDIKA PUTRI', 'Aktif', 3.278, 2.883, 2.883, 0, NULL, '2022-07-12 04:27:11'),
('110118251', '', 'LIA IVALDA NAMOTEMO', 'Aktif', 2.432, 2.489, 2.489, 0, NULL, '2022-07-12 04:27:07'),
('110118252', '', 'ADRIAN DEWANTARA', 'Aktif', 3.619, 2.972, 2.972, 0, NULL, '2022-07-12 04:26:57'),
('110118253', '', 'JOVITA CALISTA', 'Aktif', 2.614, 2.706, 2.706, 0, NULL, '2022-07-12 04:27:06'),
('110118256', '', 'ALSITA SALSABILA YULNANDA', 'Aktif', 2.857, 2.868, 2.868, 0, NULL, '2022-07-12 04:26:58'),
('110118259', '', 'PUTU AYU ALDEA CEMPAKA PARAMESWARI', 'Aktif', 3.174, 3, 3, 0, NULL, '2022-07-12 04:27:11'),
('110118261', '', 'ERLIN THETERISSA', 'Aktif', 2.976, 3.238, 3.238, 0, NULL, '2022-07-12 04:27:02'),
('110118262', '', 'VANESSA AULIA RAMADHANI', 'Aktif', 3.438, 3.17, 3.17, 0, NULL, '2022-07-12 04:27:14'),
('110118263', '', 'DENITA RIZKA FITRIANA', 'Aktif', 3.143, 2.975, 2.975, 0, NULL, '2022-07-12 04:27:01'),
('110118269', '', 'NINING PURNAMA SARI', 'Aktif', 2.795, 2.746, 2.746, 0, NULL, '2022-07-12 04:27:09'),
('110118270', '', 'PUTU DIAH DAMITASARI', 'Aktif', 3.325, 3.111, 3.111, 0, NULL, '2022-07-12 04:27:11'),
('110118273', '', 'TIARA NINDYA KIRANA', 'Aktif', 1.25, 2.096, 2.28, 0, NULL, '2022-07-12 04:27:14'),
('110118279', '', 'SEMARTY YUSTISIANI NESIMNASI', 'Aktif', 2.675, 2.34, 2.34, 0, NULL, '2022-07-12 04:27:12'),
('110118280', '', 'EMANUELA ALICIA CHRISTY', 'Aktif', 2.068, 2.577, 2.577, 0, NULL, '2022-07-12 04:27:02'),
('110118281', '', 'FINNY ALIFIYATUR ROOSYIDAH', 'Aktif', 2.875, 3.291, 3.291, 0, NULL, '2022-07-12 04:27:04'),
('110118282', '', 'BHUJANGGA AGUNG AYU SRI KARTIKA DEWI', 'Aktif', 2.786, 2.906, 2.906, 0, NULL, '2022-07-12 04:27:00'),
('110118283', '', 'ADILAH FATIN AMIR', 'Aktif', 1.875, 2.21, 2.248, 0, NULL, '2022-07-12 04:26:57'),
('110118284', '', 'YENITHA CIUNIADI', 'Aktif', 2.405, 2.384, 2.384, 0, NULL, '2022-07-12 04:27:15'),
('110118285', '', 'XILVA MARETI FERNANDA', 'Aktif', 2, 2.652, 2.652, 0, NULL, '2022-07-12 04:27:15'),
('110118288', '', 'ANISA ANGGRAINI NINGGAR', 'Aktif', 3.583, 3.22, 3.22, 0, NULL, '2022-07-12 04:26:58'),
('110118291', '', 'SUNIA', 'Aktif', 3.114, 2.972, 2.972, 0, NULL, '2022-07-12 04:27:13'),
('110118293', '', 'SALSABELLA NADYASARI SUCIPTO', 'Aktif', 2.895, 3.177, 3.177, 0, NULL, '2022-07-12 04:27:12'),
('110118294', '', 'SEPTA NOERYANA ADE CHANDRA', 'Aktif', 3.667, 3.122, 3.122, 0, NULL, '2022-07-12 04:27:13'),
('110118295', '', 'AKBAR NUGRAHA', 'Aktif', 2.789, 3.066, 3.066, 0, NULL, '2022-07-12 04:26:57'),
('110118304', '', 'SITI FIRJATUL KARIMAH AFRIANA', 'Aktif', 2.95, 2.713, 2.713, 0, NULL, '2022-07-12 04:27:13'),
('110118311', '', 'EFRIANI PURBA', 'Aktif', 2.182, 2.311, 2.311, 0, NULL, '2022-07-12 04:27:02'),
('110118316', '', 'YOAN CORNELIA TJANDRA', 'Aktif', 3.614, 3.861, 3.861, 0, NULL, '2022-07-12 04:27:15'),
('110118319', '', 'JERNI ARROYA MIRANDA MUNTHE', 'Aktif', 2.684, 2.337, 2.337, 0, NULL, '2022-07-12 04:27:06'),
('110118320', '', 'FIDA SHAFI\' ANIZZALATI', 'Aktif', 2.523, 2.404, 2.468, 0, NULL, '2022-07-12 04:27:03'),
('110118321', '', 'AMIRAH NABILA RAHMADINAR', 'Aktif', 3.261, 3.537, 3.537, 0, NULL, '2022-07-12 04:26:58'),
('110118324', '', 'FITRIYATUL FIRDAUS', 'Aktif', 3.341, 3.65, 3.65, 0, NULL, '2022-07-12 04:27:04'),
('110118325', '', 'TRIA MONIKA', 'Aktif', 2.455, 2.373, 2.373, 0, NULL, '2022-07-12 04:27:14'),
('110118326', '', 'BILLAH IZZAH DIAH APRILIANINTA', 'Aktif', 2.725, 2.875, 2.875, 0, NULL, '2022-07-12 04:27:00'),
('110118327', '', 'EMILIA ALVIRA BRATAMIJAYA WU', 'Aktif', 3.435, 3.27, 3.27, 0, NULL, '2022-07-12 04:27:02'),
('110118330', '', 'MADE AGUS FEBRIYANA PUTRA', 'Aktif', 0.727, 2.314, 2.596, 0, NULL, '2022-07-12 04:27:07'),
('110118333', '', 'INE WAHYUNI', 'Aktif', 2.432, 2.459, 2.496, 0, NULL, '2022-07-12 04:27:05'),
('110118334', '', 'I GST. AYU LAKSMI DWI PUTRI', 'Aktif', 3.568, 3.612, 3.612, 0, NULL, '2022-07-12 04:27:05'),
('110118336', '', 'SITI MU\'AWANAH', 'Aktif', 2.795, 3.068, 3.068, 0, NULL, '2022-07-12 04:27:13'),
('110118337', '', 'DEWI SANTIKA OKTAVIANA', 'Aktif', 2.143, 2.612, 2.612, 0, NULL, '2022-07-12 04:27:01'),
('110118342', '', 'ILHAM SYAHRIAL BRILIANTO', 'Aktif', 2.913, 2.809, 2.809, 0, NULL, '2022-07-12 04:27:05'),
('110118343', '', 'I PUTU RAMA EKA KURNIAWAN KUMALA PATRA', 'Aktif', 3.421, 3.33, 3.33, 0, NULL, '2022-07-12 04:27:05'),
('110118345', '', 'FANESA NUR AISYAH PUTRI', 'Aktif', 2.524, 2.714, 2.752, 0, NULL, '2022-07-12 04:27:03'),
('110118346', '', 'NURUL HIDAYAH', 'Aktif', 3.636, 3.293, 3.293, 0, NULL, '2022-07-12 04:27:10'),
('110118350', '', 'IVONN ELSA AULIA PUSPITA', 'Aktif', 2.406, 2.862, 2.862, 0, NULL, '2022-07-12 04:27:05'),
('110118355', '', 'NI LUH PUTU WINDA SARI', 'Aktif', 3.045, 2.811, 2.811, 0, NULL, '2022-07-12 04:27:09'),
('110118357', '', 'NADILA SULEMAN', 'Aktif', 2.806, 3.09, 3.09, 0, NULL, '2022-07-12 04:27:09'),
('110118360', '', 'RAHAYU HARDIANTI RINDIANTIKA', 'Aktif', 2.806, 3.309, 3.309, 0, NULL, '2022-07-12 04:27:11'),
('110118361', '', 'VIRDA MARTHA ARIYANI', 'Aktif', 3.217, 2.955, 2.955, 0, NULL, '2022-07-12 04:27:14'),
('110118362', '', 'YUYUN MEILANI', 'Aktif', 3.396, 3.137, 3.137, 0, NULL, '2022-07-12 04:27:15'),
('110118364', '', 'OKTA SEPTIAN PUSPITASARI', 'Aktif', 2.475, 2.395, 2.395, 0, NULL, '2022-07-12 04:27:10'),
('110118368', '', 'RADIF HELMY', 'Aktif', 2.2, 2.385, 2.46, 0, NULL, '2022-07-12 04:27:11'),
('110118373', '', 'IBNU ABIDDUNYA', 'Aktif', 3.333, 2.993, 2.993, 0, NULL, '2022-07-12 04:27:05'),
('110118374', '', 'NUR LAILATUL AWALIYAH', 'Aktif', 2.318, 2.122, 2.212, 0, NULL, '2022-07-12 04:27:10'),
('110118376', '', 'JACQLIN M.Q. RAPAR', 'Aktif', 2.476, 2.753, 2.753, 0, NULL, '2022-07-12 04:27:06'),
('110118377', '', 'CINDY GRACENDA DEOFANI', 'Aktif', 2.548, 2.872, 2.872, 0, NULL, '2022-07-12 04:27:00'),
('110118378', '', 'PANCRATIA CLAUDIA NOVELIN NGANTU', 'Aktif', 2.881, 2.493, 2.568, 0, NULL, '2022-07-12 04:27:10'),
('110118382', '', 'WARENDA MAY LATIFAH', 'Aktif', 2.75, 2.678, 2.678, 0, NULL, '2022-07-12 04:27:14'),
('110118384', '', 'SIFA ARUM HAFIFATUR RIZQIYAH', 'Aktif', 2.854, 2.71, 2.71, 0, NULL, '2022-07-12 04:27:13'),
('110118385', '', 'LIETA ALFIAH', 'Aktif', 2.854, 2.562, 2.639, 0, NULL, '2022-07-12 04:27:07'),
('110118386', '', 'ABDUL AZIS', 'Aktif', 3.25, 2.816, 2.816, 0, NULL, '2022-07-12 04:26:57'),
('110118390', '', 'WAHYU MIFTAKHUR ROHMAWATI', 'Aktif', 3.175, 2.798, 2.838, 0, NULL, '2022-07-12 04:27:14'),
('110118391', '', 'MUHAMMAD RIFQI AL\' AFUW', 'Aktif', 3.119, 2.594, 2.669, 0, NULL, '2022-07-12 04:27:08'),
('110118393', '', 'CLAUDIA FABIOLA SONDAKH', 'Aktif', 2.474, 2.896, 2.896, 0, NULL, '2022-07-12 04:27:00'),
('110118397', '', 'I KADEK SUMERTA JAYA', 'Aktif', 2.762, 2.986, 2.986, 0, NULL, '2022-07-12 04:27:05'),
('110118401', '', 'MOH. SUUD', 'Aktif', 2.545, 2.331, 2.367, 0, NULL, '2022-07-12 04:27:08'),
('110118402', '', 'TALITHA ZHAFIRAH', 'Aktif', 2.444, 2.857, 2.857, 0, NULL, '2022-07-12 04:27:13'),
('110118405', '', 'ATIKA HANNA NUR AZIZAH', 'Aktif', 2.526, 2.94, 2.94, 0, NULL, '2022-07-12 04:26:59'),
('110118406', '', 'SINDI SALSABILA CARENA', 'Aktif', 2.875, 2.659, 2.659, 0, NULL, '2022-07-12 04:27:13'),
('110118407', '', 'THYSA VIRANTI', 'Aktif', 3.095, 3.003, 3.068, 0, NULL, '2022-07-12 04:27:13'),
('110118409', '', 'TIA ANTIKA PRAMESTI', 'Aktif', 3.159, 3.145, 3.145, 0, NULL, '2022-07-12 04:27:14'),
('110118410', '', 'HERLINA', 'Aktif', 2.5, 2.621, 2.621, 0, NULL, '2022-07-12 04:27:04'),
('110118415', '', 'HANDY HANGGODA UNTORO', 'Aktif', 3.727, 3.058, 3.058, 0, NULL, '2022-07-12 04:27:04'),
('110118418', '', 'SALSABILA VANIA CLARISSA', 'Aktif', 2.841, 2.699, 2.699, 0, NULL, '2022-07-12 04:27:12'),
('110118419', '', 'NABILAH ALIFIYANI SHOFI', 'Aktif', 2.667, 2.858, 2.858, 0, NULL, '2022-07-12 04:27:08'),
('110118423', '', 'NINDI DWI CAHYANTI', 'Aktif', 2.857, 3.014, 3.014, 0, NULL, '2022-07-12 04:27:09'),
('110118424', '', 'ALIVIA SALSABIELA', 'Aktif', 2.406, 2.83, 2.83, 0, NULL, '2022-07-12 04:26:58'),
('110118425', '', 'NABILLA ADHANIA NENTO', 'Aktif', 3.341, 2.811, 2.811, 0, NULL, '2022-07-12 04:27:08'),
('110118426', '', 'BAYU ANGGARA PUTRA', 'Aktif', 2.478, 2.563, 2.675, 0, NULL, '2022-07-12 04:26:59'),
('110118428', '', 'KARUNIA SEKAR KINANTI DYAH PITONO', 'Aktif', 3.318, 2.794, 2.794, 0, NULL, '2022-07-12 04:27:06'),
('110118430', '', 'ALGADISKA MILLENIA VANDANADA', 'Aktif', 3.021, 2.704, 2.704, 0, NULL, '2022-07-12 04:26:57'),
('110118432', '', 'ISTI WINDA PERMATASARI', 'Aktif', 3.531, 3.507, 3.507, 0, NULL, '2022-07-12 04:27:05'),
('110118433', '', 'BERLIANA DWI NOVITA', 'Aktif', 2.844, 3.326, 3.326, 0, NULL, '2022-07-12 04:27:00'),
('110118438', '', 'YUNI MAULINA PRIHANTINI', 'Aktif', 3.25, 3.245, 3.245, 0, NULL, '2022-07-12 04:27:15'),
('110118440', '', 'SARAH SALSABILA', 'Aktif', 3.1, 2.915, 2.915, 0, NULL, '2022-07-12 04:27:12'),
('110118441', '', 'HERNITA SEPTIANDARI', 'Aktif', 2.636, 2.754, 2.754, 0, NULL, '2022-07-12 04:27:04'),
('110118442', '', 'HIKMATUN NAZILA', 'Aktif', 2.818, 2.905, 2.905, 0, NULL, '2022-07-12 04:27:05'),
('110118445', '', 'HENNI MATUL KHAMILA', 'Aktif', 2.727, 2.82, 2.82, 0, NULL, '2022-07-12 04:27:04'),
('110118446', '', 'SABILA RADLIYATAN RABBINA', 'Aktif', 3.261, 3.27, 3.27, 0, NULL, '2022-07-12 04:27:12'),
('110118447', '', 'MEVIN NURELITA', 'Aktif', 2.479, 2.458, 2.458, 0, NULL, '2022-07-12 04:27:07'),
('110118448', '', 'LAFIA LAILATUL FADIK', 'Aktif', 2.714, 2.458, 2.5, 0, NULL, '2022-07-12 04:27:07'),
('110118454', '', 'FIRDAYATUL JUWARIYA', 'Aktif', 2.886, 2.552, 2.552, 0, NULL, '2022-07-12 04:27:04'),
('110119001', '', 'SEVERINA EFFENDI', 'Aktif', 4, 3.959, 3.959, 0, '', '2022-07-05 14:21:11'),
('110119003', '', 'I DEWA GEDE PUTRA SANJAYA', 'Aktif', 3.295, 2.848, 2.848, 0, '', '2022-07-05 15:28:03'),
('110119004', '', 'AUDREY WINAGA PUTERI', 'Aktif', 3.396, 3.587, 3.587, 0, '', '2022-07-05 14:21:11'),
('110119005', '', 'VERONIKA GERALDINE ANGELA', 'Aktif', 3.479, 3.724, 3.724, 0, '', '2022-07-05 14:21:11'),
('110119008', '', 'JESSICA CLAUDIA HERRI PUTRI', 'Aktif', 3.229, 3.405, 3.405, 0, '', '2022-07-05 14:21:11'),
('110119010', '', 'TAN, MARSELLA PUTRI AMELIA', 'Aktif', 3.792, 3.752, 3.752, 0, '', '2022-07-05 14:21:11'),
('110119011', '', 'ANABELLA DESTRIE IRAWAN', 'Aktif', 3.667, 3.72, 3.72, 0, '', '2022-07-05 14:21:11'),
('110119013', '', 'SANTIKO MEDHAKUMARA LAURENT', 'Aktif', 3.833, 3.9, 3.9, 0, '', '2022-07-05 15:28:03'),
('110119014', '', 'JESSLYN TRIXIE CHANDRA', 'Aktif', 3.75, 3.682, 3.682, 0, '', '2022-07-05 14:21:11'),
('110119015', '', 'FEBE FEBRILINA FERNANDA', 'Aktif', 3.604, 3.55, 3.55, 0, '', '2022-07-05 14:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

DROP TABLE IF EXISTS `topik`;
CREATE TABLE `topik` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `kuota` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id`, `nama`, `judul`, `id_lab`, `kuota`, `is_deleted`) VALUES
(1, 'Satu', '', 4, 1, 1),
(2, 'Dua', '', 4, 10, 0),
(3, 'Tes', '', 4, 10, 1),
(4, 'Memodifikasi Polimer Karbohidrat sebagai Eksipien Pengatur Pelepasan Obat', '', 3, 5, 0),
(5, 'Produksi Marker Tanaman Obat Unggulan', '', 3, 10, 0),
(6, 'In Silico Screening Menggunakan High Performance Computing Berbasis Cluster/Grid', '', 3, 10, 0),
(7, 'Deteksi Dini Risiko Kanker Sekunder Akibat Penggunaan Siklofosfamid pada Pasien Kanker Payudara di Jakarta dengan DNA-Adduct sebagai Biomarker', '', 3, 10, 0),
(22, 'A', '', 3, 10, 0),
(23, 'B', '', 3, 15, 0),
(24, 'D', '', 3, 25, 0),
(25, 'F', '', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `topik_course`
--

DROP TABLE IF EXISTS `topik_course`;
CREATE TABLE `topik_course` (
  `id_topik` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `minimum_mark` enum('A','AB','B','BC','C') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik_course`
--

INSERT INTO `topik_course` (`id_topik`, `course_id`, `minimum_mark`) VALUES
(22, 5, 'C'),
(24, 0, 'C'),
(25, 17, 'BC');

-- --------------------------------------------------------

--
-- Table structure for table `topik_periode`
--

DROP TABLE IF EXISTS `topik_periode`;
CREATE TABLE `topik_periode` (
  `id_topik` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik_periode`
--

INSERT INTO `topik_periode` (`id_topik`, `id_periode`) VALUES
(22, 2),
(22, 4),
(24, 2),
(24, 4),
(25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(30) NOT NULL COMMENT 'npk or nrp',
  `password` varchar(300) NOT NULL,
  `user_type` enum('student','lecturer','staff','') NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `user_type`, `last_login`) VALUES
('110118001', '$2y$10$NEgz5dVG3m585vmT42yHAuGXWa7Wm7.dFsDFMPwalqOsjohv4CULq', 'student', NULL),
('110118002', '$2y$10$PnZ.XRpp4E/RwKrP4623heEh11gjxht3r41NfjQlksTM1gALvIaUS', 'student', NULL),
('110118005', '$2y$10$Ku7dehUGF2EkMx6IZj8tFes1l3tzIyDg7Z3U9StH1BdW4VOfcw0eW', 'student', NULL),
('110118008', '$2y$10$INBRyoAlyi2HylJDp48dnO3h2XY/H86UtR4CXDfMcWHy/clloyRe6', 'student', '2022-07-12 05:35:34'),
('110118009', '$2y$10$o9ClQM5aiwUjHu4U4fhApOmME2cS7J1RAvovhAStUXedq4lapRtmG', 'student', '2022-07-14 20:47:11'),
('110118010', '$2y$10$K03bfAUhxV6mZhbAkvya7eIVvvovF66kojMlCtIZ0DDG.3Dp/mI4a', 'student', NULL),
('110118014', '$2y$10$b6Uav0uuiUd8GI4bUDGnsOhigyZ5xJiWkZBT7VUh/iQxjUozAaiBK', 'student', NULL),
('110118015', '$2y$10$JLUOvQpt8yxWz//07PbJTeNDkaGZVweWuFJj2Er8Ak902Opad8GgK', 'student', NULL),
('110118017', '$2y$10$LMyx7BfKuWEatMjFMtZj6u0w3ON2XWt4DeGr93fP2vMR22R7v2MF6', 'student', NULL),
('110118019', '$2y$10$VMu96sVomcxQoMA.alGPZeQOdQI9ErXdW.K5oQbfzDBxJeiV19sYq', 'student', NULL),
('110118020', '$2y$10$xHQMVoy0ADzg5.bqapFw6OdDPTGlW9441CSvgFMF225fKyG/LNEtq', 'student', NULL),
('110118021', '$2y$10$cOwXUbk1LgxOzCshtKMaRuYr.FDIBdv81HQ3uGAZYjJIOH/ZZXL0i', 'student', NULL),
('110118022', '$2y$10$qd6I7T5E06glP7LUj.FXp.GEAboXrHh798nDbzqFLKmVzgJPHgqiO', 'student', NULL),
('110118025', '$2y$10$0mvgiiM5jMIUZIW2tDwaQOUaA8ttl21m7q21gctrkQ5SpLQj0EawC', 'student', NULL),
('110118027', '$2y$10$gzSoChfPIFqAL0kbM4RV9utxWT04JHvknh4yeibBTwcjZC/jNWt/a', 'student', NULL),
('110118031', '$2y$10$Q/4JA8zhJkS6Av6XhFaYEOi2pim7nXXb7ACPZJKuzjegDAKfCjjTO', 'student', NULL),
('110118032', '$2y$10$D2S42lPzxgPtV7NmNDehTu2CQAm8ma3gzCjYcoUpGzl2oCYWPzqy6', 'student', NULL),
('110118033', '$2y$10$5MhE2yRMTvNR1H7R7dx08u94DYVO75Ke5pZ7SE9IS0oBxG4hdaupq', 'student', NULL),
('110118034', '$2y$10$v/TryQXQI.D0Gcf.hZeln.b0R4pMqW1n.4cgDEfg4SYmKp1zhGoLO', 'student', NULL),
('110118045', '$2y$10$Dk3mxE9t.wxgX4RpKAd1w.cwzj2.bbPNTchR1fuG6CTCGXGl7WkkW', 'student', NULL),
('110118046', '$2y$10$S8CXIFUFGgRT1RHHQVmZ/.LuAIv7sVSKTwdcZMq5dONwNv6Nc3ErS', 'student', NULL),
('110118062', '$2y$10$dbMg8MxxUzqDUbehy7z3DebNVh8JZSR06OMJbJcHm.xaZbmSMZnm.', 'student', NULL),
('110118068', '$2y$10$SUX0ws5z8fMsSnGIRvEON.B1TokROh897aVEJCmTM4g9vTzZ8v72S', 'student', NULL),
('110118075', '$2y$10$h45ENeNuB23GOtvYW7eqLOOWxLCFFGfVC1ztbVWGQg6fqPG2lHbum', 'student', NULL),
('110118078', '$2y$10$F.edMc7MP/JA2NFNLfCrtusXx9Q5ed1fYpwCzqwhwCRwlMp8uqbCm', 'student', NULL),
('110118082', '$2y$10$96klnTpnPLUh4w7cdlTWz.QvXewAwRN/nS4xYq5rldNULK.WiBirG', 'student', NULL),
('110118084', '$2y$10$5PMI2RRl5ftaY.qinPJxQOmMJNluab6J.5w7YOTeV/I.fNog07tSS', 'student', NULL),
('110118087', '$2y$10$bWz4/gbal3YXWKLslHY8Ze5qdJhTHAbjXknckrDV9JP8xEqe8KpkC', 'student', NULL),
('110118088', '$2y$10$MIKSHEwahndJwo5YgD8A.eaYibNapwOZxhxkgYm8rkraiV/4wg2JO', 'student', NULL),
('110118092', '$2y$10$SLLW4gxIYOrXa5A8UCPC6u0GWFLylMWIqAhSt7ConhCmlvV0mJaxO', 'student', NULL),
('110118093', '$2y$10$K4umPTkWsaf3o7g2LzBIJujtozLh.COTCmrlaffKGuu0d6V8LvYhS', 'student', NULL),
('110118095', '$2y$10$A3AEuHyWW/5ny/Jysv6H9epH9mjPUa5ZDHRWJum9H2yStg9/cP7EK', 'student', NULL),
('110118100', '$2y$10$W3FU6arz41ytnTdFGB/OP.cJQO57BGT4AU5.DFpzir5T9dWSeYpG.', 'student', NULL),
('110118101', '$2y$10$1jUg3o5Y/KJE2c6oStP9Musi0c4EcG3ilfc8LJbQXtTrGw/Us7oFy', 'student', NULL),
('110118102', '$2y$10$ytBiMCMjwClbBqRGgbSSUuxA4h/6QAo6uXiZqCvJuI6ejSD9dYa/W', 'student', NULL),
('110118104', '$2y$10$dLuhT0ncWOf98P80eINWLexG0fSO0ksD3TgdNMwHMXV8n90yWNtT2', 'student', NULL),
('110118107', '$2y$10$R1CHvwyTjPozjJdF7wS0wuIMdBGUzpKNLO1br5RlhIgj0uLdBQMUq', 'student', NULL),
('110118112', '$2y$10$nSRlQ4n9OwfXciGAuBGq7.zl3WG.efwd3WMkq2BSHCJNif1xPP/ia', 'student', NULL),
('110118113', '$2y$10$GdFHBZM/75pf3IjAUBQEaeXAv9xvcDRae7F0KkdUygcG887EylF/6', 'student', NULL),
('110118114', '$2y$10$3tywr.FKHz1aeJE/4hcI5ehgzl8XDgceffyrTFtx1fKgi/AYZSjSC', 'student', NULL),
('110118122', '$2y$10$6CSFhcpe.rMGg9YzZEa3XeyK90ChOxekdsav06Ia5O0qbfNOvkZlq', 'student', NULL),
('110118129', '$2y$10$ludbpcajURtAHM/DWn24Fe6FRpJo5aCiXmI1a7krtUZv7Y1z57IR6', 'student', NULL),
('110118134', '$2y$10$yPtsT10jJu/iknmHVCAiX.jdSjW.hms9MPxStrp7ygUfUDml0HWPy', 'student', NULL),
('110118135', '$2y$10$4zRuF5W.2v9GfsH7b0U4eumqj.pXMAuvdCbu2o/d97WtfNPhdDC7W', 'student', NULL),
('110118136', '$2y$10$LZKzyTGjypXmC9xOYKTDgeQEmDhEV4o1O/GjqJcrnyIVPaOitNRTW', 'student', NULL),
('110118138', '$2y$10$f5hqqQzgPyJK2F0bcGpxU.hE5fVesfi2UDqJhbgDYJWjz4zP4yT2K', 'student', NULL),
('110118149', '$2y$10$qaF6Mp28t09VjR5idIG//uyJ.ps0RS0IZJY3cOJJuUHQY5jL5QThy', 'student', NULL),
('110118151', '$2y$10$wuolcO5j72W5P8ttg4G8uOi0YSyPUKXMqgYWpBz.uzVkCYLfvOFuG', 'student', NULL),
('110118152', '$2y$10$BGVFp4VywONQz6MZ4zOrDu3EaJCks8WyCPp0KFH6BIHAKSrab1Vme', 'student', NULL),
('110118155', '$2y$10$2EdwBPN3YHloQr8nGKWDdOVKPRlJOVNsJAVhH/CBZhZTgGSxc3Lpm', 'student', NULL),
('110118158', '$2y$10$ihndxn3RHdL22zp.CpeGq.WT7fvYOlveBTfMpmNlX4ofcjJKAk0AG', 'student', NULL),
('110118162', '$2y$10$XHyEKcG8a43buC1XcTHyROuQxg4icSuuoleHz6/whncFtAjyxHvJO', 'student', NULL),
('110118164', '$2y$10$m9LWi2NiOQGepVCpcZLmauqYptjPafQJR1VXE.xY.u2I.8hFNy1ty', 'student', NULL),
('110118165', '$2y$10$77YqujXQckcgIsHv9a4..uxmOxiUr.SZnu4Jes6lKR8yj9qX5xtly', 'student', NULL),
('110118170', '$2y$10$NlwAPI2uT7d496nfM.rMVu9xuqdZePw.ETOv4Zc5WPbgZe.LfDzSe', 'student', NULL),
('110118171', '$2y$10$dHEDjDdqkp9vutNgw4s3tOUbOve08PoZPdIte2N9876h1qMObKOwS', 'student', NULL),
('110118174', '$2y$10$kAwcIyK51osoy2mrithEFOJN5L8dKeo8m/K7t.J3IeRJ.eZU6bPRC', 'student', NULL),
('110118175', '$2y$10$CErt7hpE666twA6l.YmnF.xTnM45OJ2jXDjlrBHrNdDGG1uKfcbXi', 'student', NULL),
('110118176', '$2y$10$ZUJSdX9jZILmiELl7S/dDOw/yGRWOpiPDfGqOXlsBUarZMoc5yTDG', 'student', NULL),
('110118177', '$2y$10$1bn1y3dsLfENzbiRxiiaiu6JWEWI5NyEkVkqkFVPvCVu9deTHU5ca', 'student', NULL),
('110118178', '$2y$10$zz9.nzaneCKKiUH3nkSG.OE9pMYuusHMPG1GwfLI19OTxeILeP4Nu', 'student', NULL),
('110118179', '$2y$10$BQvHqHGfk0DVOOMCavfNPuV.H7L7bEjVGxpbCvWJEc2e0vZFfZlc6', 'student', NULL),
('110118180', '$2y$10$xfXtR.g60yz.dbZVDoR7YeclGRNOEJdwQ7BZKh8dWs0ICrLQiKHga', 'student', NULL),
('110118181', '$2y$10$rTo0Z2sfjt9dOG8Twg12sun/k1dluf.Otef6WxSo0XMzePM0KRHqW', 'student', NULL),
('110118182', '$2y$10$A5u6K10eOKOZj6DBCbyzg.nlaQXwO.eGoWNZAj8ptLGvBdcx8Dgz6', 'student', NULL),
('110118183', '$2y$10$iHGTOmOEDVlTKbnA5sDy2eX2EQUknSIAwMmJg6QmqEtIxBg5tDO0W', 'student', NULL),
('110118184', '$2y$10$Ly4eI1q3/XiU8tovt2ONGOjPLeTg7c9snqR.JsmWwalKvvU6MquG2', 'student', NULL),
('110118185', '$2y$10$merWlJbiDJ6Pgpj5XrWjEOKWk8aHVvt81fm8kSUH6tVU83NpvOtcG', 'student', NULL),
('110118189', '$2y$10$S0iQ/3To6o31c1PFbI453.i0AtxYCu487PwoZ6Pejzqy8/usWWHqO', 'student', NULL),
('110118190', '$2y$10$C16jTOpypboZWgiLcYCud.OG/5RyUbeqk6MaAtbs/cmJ4ovaa61EG', 'student', NULL),
('110118191', '$2y$10$kPYIp7AcRAOu5kJs7ogwt.ozbA4E6jkAoU3CDMu2O0kNIFawR082K', 'student', NULL),
('110118193', '$2y$10$kCEKaz/WUys1.6V/jfYLD.wFN44/WnY5O0NQstiIEH.XrcVn6yxeq', 'student', NULL),
('110118196', '$2y$10$Vltvz50UGtqjQ.H11AyfUebyem5fjFrbJ1pNnIMNYWzNyU41Uf3xy', 'student', NULL),
('110118197', '$2y$10$oIVWGOSLrcXBCtUzFvJzV.fUo/H/ZBM5NEBr0pajD2brbHJd3Mrmi', 'student', NULL),
('110118198', '$2y$10$EwDLt4XnVyiQDSGxh3aj2OmvQIhjGIs7tEuMWfksYHZIkAOpOeyFu', 'student', NULL),
('110118199', '$2y$10$rn2xTTEMqxZEVYh85ffAEeQQEbdTXOBVzSFXV5gSE.wcF17jdbAC6', 'student', NULL),
('110118202', '$2y$10$/eWMh4Ce96IDy1AecfXb.Oyevg2WXQY8P8vRLGitECGqMYv1hlkAa', 'student', NULL),
('110118204', '$2y$10$iC6WHosv8G2kGdbBOPRFluyO0Q4wU7nwYYE.zYSI/C3fkc6RNHP12', 'student', NULL),
('110118212', '$2y$10$W5edeGfPgnpLM/t/foW7Tu4wcmKwWAFngdCgOxsvkOdRAxHEz3rcS', 'student', NULL),
('110118213', '$2y$10$Ab1P27rISQY39ZjXCSvfj.PEEkBbcLDbT.Vixn1VDfbIHLXuonm3u', 'student', NULL),
('110118214', '$2y$10$nspU9kAulHJtK6T/sWl8geUu7DRPxTiC2/q/AeAMEFtxdQV82Ze66', 'student', NULL),
('110118216', '$2y$10$tSuLxCSzptwmQDWGf6HSyuWbNYQD1N2wN7/WzB//BnhZm9lafmquq', 'student', NULL),
('110118220', '$2y$10$gY8SAA7dYBq2DPPGSVduA.kqQ6AW1keT04OzXVgXIMkxU542UGySG', 'student', NULL),
('110118223', '$2y$10$ef392UJ7ep/INh/aDzXn7utFVIG9pZShaznjpdz8R9DGLq1X6kYlK', 'student', NULL),
('110118224', '$2y$10$7GHOh7zGAQCNXg4f7/qAs.GfYZg6q9SvVtO2nxzEM/vrZfq3Qdt52', 'student', NULL),
('110118225', '$2y$10$TUj0ZOQIC1qhdT3W/ep85OU9p6K0htKYsUfGshFg/fBKKysd4D6tG', 'student', NULL),
('110118227', '$2y$10$WbDUzsYaLgiXGVSH1fmQuumS7kc/GmPJ/OrMGuJpym/t7krjSkhVS', 'student', NULL),
('110118228', '$2y$10$RUAysTzxm23dE5PGlbj.6.giNaguMzDGkAKe9niN6Ia3KFjJJy1Ga', 'student', NULL),
('110118230', '$2y$10$bmK1YIRxsJpqOvUXUVOCO.YyCU21phSY73Bblr7NyDaFFWXrQVPyi', 'student', NULL),
('110118232', '$2y$10$QPfEjIxWkqzIIQQiEodqFeMKEipS0zPM64iFFGjk.eOLpetcSv7.m', 'student', NULL),
('110118233', '$2y$10$vq8YqqmN6AvXGEz/.xQRVeNSgQmjiNHrmsfMcjc6Ak4y12d6Jkrp.', 'student', NULL),
('110118236', '$2y$10$nYWIuWnduLlx.hndFro6sOfNwUAZE4lS0crZNA0uD9B7aaz859V.e', 'student', NULL),
('110118237', '$2y$10$7k/QZ6nBVQfXeIIslP/giu9.eIxNv8wO9mHBA5TEsQN3rJYX6UOzm', 'student', NULL),
('110118238', '$2y$10$BsvqvKMLjy9SQvn/xi26Ue9MLx/W.DmI7P6XWsj/GiAXbH2pSue.q', 'student', NULL),
('110118241', '$2y$10$q6ug9uwbIq/l5pmO3IYSNODOsv3f40Md54FtUIVNgzWw0M2ONuzUK', 'student', NULL),
('110118243', '$2y$10$R955gY4w.wN7AN2Y6jvabOf/gSztMronkLVKNTLuAg9l111OgdYvq', 'student', NULL),
('110118248', '$2y$10$E1U9z7pv/tLEsF1fmts8mufnuOORjqNxbgITWPW3ZM1olkaowLhEe', 'student', NULL),
('110118249', '$2y$10$DAmpbYl8bdX1DmuA0hjUiOsHdVZmZO9tjIFKNKUsP.VWW/2qTCI6G', 'student', NULL),
('110118250', '$2y$10$HnG961wyljOiSkG0PNdwSubWfwSWqKWPU5LsxhH7bakYg8J76zJUa', 'student', NULL),
('110118251', '$2y$10$yRdw.RYZ1S6MsaVNvKYqiu3kF1nnkIrEpI2w0nmGyd9CdP785sVNe', 'student', NULL),
('110118252', '$2y$10$YsSqZ8rQY6MiNqHKm03LWuMsJr0Cf.j6QKr3ng.SRzY9TJdK9IQpe', 'student', NULL),
('110118253', '$2y$10$LmCi0yi4CPx8FdLY/mbJqu3LcanaA5gQ8vHDUwBjy70JryVvk/6fq', 'student', NULL),
('110118256', '$2y$10$UbY2pLnmIZI6.UV88lAUwO8P2RbiuFrgqwfAwBrEqg0urFKLncHEi', 'student', NULL),
('110118259', '$2y$10$TjKKNjrMkeUuTOtbBJBb4eE2FUj/uP5leWE.3DlRsol3JSEKNE88q', 'student', NULL),
('110118261', '$2y$10$Q/q9lmXbOT/yK00mxqQvqutXmEYmEItwplSbUvO6QaPGJ529RT4lO', 'student', NULL),
('110118262', '$2y$10$c91z9d3sAKyKZ/tWibzaeedfLVNpuhkF4.1tXWL699dmh.4oDtos6', 'student', NULL),
('110118263', '$2y$10$9idtzIerbE4/v/Yf3vd9gONKJiTnzd/Ss0FVWYGCy/Mr2tbGuImN2', 'student', NULL),
('110118269', '$2y$10$H9dOJFiJQn4Th0G/23SSwuMpZLNWMZUP5JGXrAxg59xiHenxLyRcC', 'student', NULL),
('110118270', '$2y$10$PYoOL60kj.F6bKw5WBKAX.eCTm8.IiCkTB8r42/pFidIqR1PKSWMu', 'student', NULL),
('110118273', '$2y$10$qsp6ftgCQtQeGir2ntYHKunXoyXrsZ03rS5Aw7nWUpowlXLyq9njm', 'student', NULL),
('110118279', '$2y$10$ZP.OH3qQIhUqNPmBL2X8ROl6v2l1HgsVCxgSza2O9DeJ97dfdus/2', 'student', NULL),
('110118280', '$2y$10$ehbiWHQ7BG93R1FVbBFQEuoN8lXcXNpJrGbgoPqz57AvIWBEUbZHe', 'student', NULL),
('110118281', '$2y$10$ud9npQIVicyWzwqav54iQuk8q3GKgUNgljNW/hQWxfelKuPSYI3uO', 'student', NULL),
('110118282', '$2y$10$ijNIe10QbcSZdQboZg..Su/0nCij9pKUq3PxnEhlaWRDEVl4eLZ6y', 'student', NULL),
('110118283', '$2y$10$x.9kxkkbFrIimUAMwvBCW.iYy9NcyVqhSOpMaCkLYoKUAJAfmLjBO', 'student', NULL),
('110118284', '$2y$10$fs8YR.BLBGR4dFcYCTmdcOyPke1z54mOaEeJmZhR1HL4HaE7mNUJC', 'student', NULL),
('110118285', '$2y$10$t2hLKINXltJMMW99oP9D9eJaqOJKF5wbeLltPlwkAMAr18gzubbSS', 'student', NULL),
('110118288', '$2y$10$3IpfaGXlJNCkhGAzKa8mpezy9yruWHVgle1KS52qukn/Eavw2y63i', 'student', NULL),
('110118291', '$2y$10$PDzfI4ACmFfM/mRsyV9A9enyvf1eUPoF2Tc0cS0PNtMcSzALqF5/2', 'student', NULL),
('110118293', '$2y$10$.lBVI8cFl0cbx9lH6A9FfOITJjOx2arH40FfTzmO4gWyOq9I9pI2S', 'student', NULL),
('110118294', '$2y$10$BgXYlvs84cn9Yyq.ameeG.rH/wpqiY4jtHFQt28mIq00GehNXP8lK', 'student', NULL),
('110118295', '$2y$10$3D79Nu4NE5iTknRZHAmuzuMNmflvniCaUMUM05ZkPi7JzTgFiC8oS', 'student', NULL),
('110118304', '$2y$10$qYHbkC4boPcJPQgWqiXXAuC9eZJAE1LmQC8LMXKDEq1NH/OtkUkIG', 'student', NULL),
('110118311', '$2y$10$aKRHxySo5rZSIRv00L/GWeumfV92R8u8ysAMokI.qvnWZK6Rt/5FK', 'student', NULL),
('110118316', '$2y$10$fYqANda6W5JUbcqG1NvMce7O3BEYOM1Nh9KR3wSWnB2NqNPtIWe4S', 'student', NULL),
('110118319', '$2y$10$Z4er9om2h0FdkmeHTNwyq.s9AheE4I.t0xPBmPdPcbP.fV1P/Sc0e', 'student', NULL),
('110118320', '$2y$10$kDakwS.N4Ug5BReud3mQ/.lvKU2BdAPaoSpjWgPCnyQyM8Sy01pvq', 'student', NULL),
('110118321', '$2y$10$PO7I9IYYcwvW7VsKtaoZ6OhCPpiPsPjWikiyTgK0x3/sr83qxONNa', 'student', NULL),
('110118324', '$2y$10$NIJP8qTzPPeOsLDQWMcL3.lnmDueFsQARbW29/d/o0X0UAQnKUoQS', 'student', NULL),
('110118325', '$2y$10$AKZjezHRpwJ5vil7AZf1YuuBqVtcwIe9CAHbeV6cLnQ5Ti8QXGN8m', 'student', NULL),
('110118326', '$2y$10$.euGC012Fz343phqYrSz9uSJdkp5DUHL7fF6oh5xOjpnDz96Q5SpG', 'student', NULL),
('110118327', '$2y$10$QC8Gwz//IKM1VPHx32t6bOSdG/BD/dXZGRvPR1v.Q4N3Z5qoCz22O', 'student', NULL),
('110118330', '$2y$10$FI/8AnghuixcU/To.5iU/.wBM59bP5OXQJ.EyFE78DrqwYnGzC2Ci', 'student', NULL),
('110118333', '$2y$10$DD1BNdutUvN01jTWPsL4BuvdALGJ6VbXY0hwFkM/nlrK7xrJf93Um', 'student', NULL),
('110118334', '$2y$10$97jI7C./5o7iLJ0tywY86OIeWowpXAtT8i69RozsX98Yf3TnyMCyi', 'student', NULL),
('110118336', '$2y$10$ULm1o5D6W80faMB20IG5Ge/RpGBWYvFfQqAcAdWqtpM2XFqBnkYUC', 'student', NULL),
('110118337', '$2y$10$zRb9cLnhA/TdHaC37xvKEuDxHlRH3UorRzlaWbwYo68N3Ecwhb5My', 'student', NULL),
('110118342', '$2y$10$3dcPSK.lG6wdp5khA5HT7.adlZ3daQWfKTVSQn0I9DCqSyCPvNxN2', 'student', NULL),
('110118343', '$2y$10$dmuRZWtvq4Ys/FSbW3XC1.EyWfK06a6uQYKJSygPlWg2tvfyDRuMa', 'student', NULL),
('110118345', '$2y$10$G8LHomQ/9cQEI8nDCdiBjexYeMcFhWhto0BKuBH5kVE28bIdUIcMy', 'student', NULL),
('110118346', '$2y$10$3wkeQ23aCvcY/22JxuVq1OPc9/VtuuKTHAmdpvEO/XlYILurZ1XY.', 'student', NULL),
('110118350', '$2y$10$3IkSQdew0TfntJZEtZKWEO.VoIBtU.jIgk5jwh/7fdSkWXTM4DZ9C', 'student', NULL),
('110118355', '$2y$10$NXb/IV2b8P0nDraXDZ4FKOGpe8LJm1WZzOhoAtSGa6FQjE0GyBXIu', 'student', NULL),
('110118357', '$2y$10$gMdgMaUAvTtxI2E1htuCiurQUQcEGzFgIYEPH/N.k0QVCwVbW42Nq', 'student', NULL),
('110118360', '$2y$10$pzHkg3/kgBbOYBbWY8xPL.GWWWBu7wwGvR0.paM1iQ0/kRWNOjJO2', 'student', NULL),
('110118361', '$2y$10$5cmk8UQqJlAGTH7QY.ruvuoPDuRFgwPiyPt/6XYf/t5a8PAm8pX/6', 'student', NULL),
('110118362', '$2y$10$NqlDik7hcR0vP8cGpjhj3OedTjgr9Vmvrjkj3ShR2R.Lpep..vY0.', 'student', NULL),
('110118364', '$2y$10$KPUVeV8naufyIaWWLCKss.OL4CPGaOd0Q8vFsI.mAvwhTBlWd/4FK', 'student', NULL),
('110118368', '$2y$10$d1pPx5wtRkKxV9f6B5jbQOaCduQoKsQlpYrREBuceu9BCUKB9HQ/q', 'student', NULL),
('110118373', '$2y$10$YPjB8du50XZpfrmYqidJYuZ/Bghc63HXm0UCWHkFtDXQoMTBdRz4u', 'student', NULL),
('110118374', '$2y$10$MwDCqAtcUZ7sgbfwGcBzfO.LnKFRTBNwJaz4pX2/Cmh7qozP3XqsC', 'student', NULL),
('110118376', '$2y$10$dWkd1td/s6jWNmj5Fx8I2OUp2EFRqd.5L6rGAs.SyUIsR0wIK14dS', 'student', NULL),
('110118377', '$2y$10$yRAkJIo3VemoZG1H.zpb6eDpS1TBua4G5WFwsdaqM3mx.yBgXWQzS', 'student', '2022-07-12 04:03:22'),
('110118378', '$2y$10$Xyv.NsUoha57oDNFLxuEIe38h54dL60SsZqiGQdBaa2DcdiGhARVm', 'student', NULL),
('110118382', '$2y$10$akSFKXN4znCBcFAhLS7e3uGlrwo1CB28WuZ0AM8a6V0dpEYJMAbP.', 'student', NULL),
('110118384', '$2y$10$o.xZQ0zUztqtTHw2BYHnsuum9rtTIUuZOVl/.7SWxJ1CjcaC21DFu', 'student', NULL),
('110118385', '$2y$10$zAFWereTHuoP8t2RrAkdrubbpVB4v1Dji2dTLSv5xXONqsY7hwS8u', 'student', NULL),
('110118386', '$2y$10$ZeH.tymmEksZRsiAjl0vmuh/1tgl5uJ3EIfmydXkkLGZ4H9YZoFbe', 'student', NULL),
('110118390', '$2y$10$hED/0sOdu8oHZrxG5QU5ieOMQaH/lZZQtLam7hUZMW9cpRDHNsORG', 'student', NULL),
('110118391', '$2y$10$uVJXsqNjJND0T.On2fSyOObTOD8X3WR/PkG8QWDGHByHFkfS4.LhW', 'student', NULL),
('110118393', '$2y$10$FTE1ZrBiZBO3j9T8Fe3OOu76D4swsv3Fkn8y5Xq/YBOc0JX3Od9Wq', 'student', NULL),
('110118397', '$2y$10$kZpXex1COrlR3DKH/EwIDebuZ4b57NV8w/U.OtDoBY0Ff3GAXXgYa', 'student', NULL),
('110118401', '$2y$10$kOIbEkO7PZ5ZdWPb143y9uPYjrdZ0/lBNDAmnOi2j2fPf97Mu.xnG', 'student', NULL),
('110118402', '$2y$10$SJmKdtIKwnJe76iDuCF21u7.ZIvsQ3Ea4o0vMwy9kE9OUfalkZub6', 'student', NULL),
('110118405', '$2y$10$6HgdXypRnwsb8IjwjYVw7uaJyljQIEK5Db8YeAe7YIf8BWbCEAXk2', 'student', NULL),
('110118406', '$2y$10$DWn6Tz1BETeT36f2NghvweAHfv6RhlAmt41Bm8v1qNps3ORHEDEtu', 'student', NULL),
('110118407', '$2y$10$3a7fQOLdxtEjCVrClwl0qOpAMj/lN9cVoQz7Knuor62Ugycd76MhC', 'student', NULL),
('110118409', '$2y$10$Urc4YKz4o6KTbpSGYLz0MOrH9VCt33I7R3dJh2WPPFsLnXrsPVaxS', 'student', NULL),
('110118410', '$2y$10$jv3pJtTIHc4M46rbmD8YnecW2U5TOKkh1gqImYK4U4mLzZgU3zUU6', 'student', NULL),
('110118415', '$2y$10$qxj/VY7v7adutEBeuqrWW..EtCuS8jTt9Kt8eJl0khVMGr8QQCKm2', 'student', NULL),
('110118418', '$2y$10$bjeGQfKy5SjmSYe/NqUSju3WZQcGpSz8x3vfdqbOcxUwQWJmAkmoS', 'student', NULL),
('110118419', '$2y$10$XZeX1HP8dvNcCZ7p6h2xb.IEYuym3k685SlMxLRPRmqzk7TwKElvi', 'student', NULL),
('110118423', '$2y$10$ifhyWiUnsnP7Lc3AntsUBeeWgCfCB1i8vKjlLGUW/KQr6U9EVwami', 'student', NULL),
('110118424', '$2y$10$Uz9SGGLDTdlz7MPnqELeTOvBX9XXlYgFvXSJ8O6RhzdZDsb78alHa', 'student', NULL),
('110118425', '$2y$10$xoTefvtOcyiV/upKmqM6qeHOEeHLR6raLxdczYdnZ.amO.cCyqpba', 'student', NULL),
('110118426', '$2y$10$BPugo4zpwfAslZWLDPq5OeqHwdwW1tHXcOdEZdtnZMF4yC.794VbK', 'student', NULL),
('110118428', '$2y$10$YO1MJKPnne2jmcPg0LChi.VYXVDy7ae/LLx1iJH6xqyQrIoXlRbGu', 'student', NULL),
('110118430', '$2y$10$Kj.CpuCz1CuikAiACPYnneGRfjslDU0GOHc9Y/eY4ZGr5af2wv7TK', 'student', NULL),
('110118432', '$2y$10$E7952cVsFGciHCbcVzX3UOG5gvyEfIGj9iTBgaGfnLy3OSIibD/Sa', 'student', NULL),
('110118433', '$2y$10$vcjCwLz0OEHMl0.S/lKPg.8BkoXT6P.Movct6.lkfE72m5KQl3Msi', 'student', NULL),
('110118438', '$2y$10$Sl/YLqDiq1LDAaFn3TLFM.N5v8RpsQViVfCFQFtNYDdEFyGQi9DXi', 'student', NULL),
('110118440', '$2y$10$NWoBPFsG1hYvs/eT9WDmYOz9ZNAQWnBe/bemDzJ5m1Z/pgWGMuhpK', 'student', NULL),
('110118441', '$2y$10$X9cn.zDPn3XNduQEvoxJXOPqWdUH.aSuLSuZuSOIuaZ4cH2IkyiVS', 'student', NULL),
('110118442', '$2y$10$3L.JW.w7hH09AkkZkH1YS.oWIo6ewZyPwJz13euQ3ssnhrgfoTdw6', 'student', NULL),
('110118445', '$2y$10$gflcTkSMx/0YH6dBluNhEuxe61P0CJsl.MfAVoZnz9PNzANWbdhV6', 'student', NULL),
('110118446', '$2y$10$1qqtUA7Ukyz2RuP2W1u9eOW7liRm/MBbOAp7JLZOJb3XgXh.ozTRm', 'student', NULL),
('110118447', '$2y$10$Yo5xArLKECiWzlg2BcNH0egIAP5B.VikI0pYz5EqriUg9ERdu0Zum', 'student', NULL),
('110118448', '$2y$10$GuYRGcHiC0nSOEfNVw.uFO8lpIEPSh1a/hGChVh3kJxwPni7m89ZG', 'student', NULL),
('110118454', '$2y$10$hDmwN6rAkXcIDe9zM6Xs9eL77LD/x4RjCa8SpBo./cRZSK6IOplnK', 'student', NULL),
('110119001', '$2y$10$M/8brJbu/RGALAVFRd/CB.md/O6Ur4Af8M1EYMZ2bgaPuoLFY4JSq', 'student', NULL),
('110119003', '$2y$10$c4uzjs20z.VfG.FV6QT9GuqSti3A2Pw.GQPwCzNp5KDp4WgCKOr4.', 'student', NULL),
('110119004', '$2y$10$E2si1WZCPgtKsyt3WEqfy.dvWbE.7ky0niYd7RaOrej6kVgGxpb.W', 'student', '2022-07-09 18:35:51'),
('110119005', '$2y$10$xA40Ftz1GZvnwqTqyoB0jOszFMelHqdgtFol84t/48x5B5HN6KL4O', 'student', NULL),
('110119008', '$2y$10$aleDcSRQ.qdBLIed0hemxesrg0vy38OQBoYtScbqjm18f1CJDeA7a', 'student', '2022-07-09 09:39:06'),
('110119010', '$2y$10$0qaTBl8vNT6z03qLw1nMbeFHfAO7c2dM.KEch6IH4o.vTHzDaRENe', 'student', NULL),
('110119011', '$2y$10$WHrlAyjHKkDcXKIQ6GlZ1urnjLPdiCAfjLBes00mqTWxr0z0iZmxu', 'student', NULL),
('110119013', '$2y$10$GlpQ/iHieLS6AkvGqLU1/.E/CoRI2NF1W83cUO.a3QSclTirA9FTi', 'student', NULL),
('110119014', '$2y$10$xgebQi2AbpfSpUFjGO51cetfXaxvhk41UR/RKhJyFd4j/9HS13wPG', 'student', NULL),
('110119015', '$2y$10$k75dJeqy4mPseg.RFElxaeziCin0uWaz.LH4ei/2irq8VXIVBTYce', 'student', NULL),
('182018', '$2y$10$ZNAAHaEf0fVSL4J.uyfyL./dpvzE.JBBUhGj3TWL61htwBbHpfGZ6', 'lecturer', '2022-07-12 05:37:50'),
('189005', '$2y$10$8WG7PkhmVb9CaEBs7eiboeUqH4Hf04x7d/k/UePuVtHrgt4kOF0G6', 'lecturer', NULL),
('199014', '$2y$10$cbJiyXIdz70X9v/Tvxv/d.McuCeD2FDUpSrhnReuHhna1iBkolKQq', 'lecturer', NULL),
('199015', '$2y$10$ZWNJRTpLgYp7V9.8Aoo1ru5SjilcGafg9rQC0MIdH1MkY3XljVEgi', 'lecturer', NULL),
('200031', '$2y$10$O7agnX..U8OsCrIcHuzhou/OMNEJRVQEGKd7qPGuEcQKZba3/KGW.', 'lecturer', '2022-07-14 20:44:35'),
('200032', '$2y$10$Z7yQBk1D6B.arGCA4YQ/9u6iXcPXws2ZZT1YLBqvnQmpyNkvykPrO', 'lecturer', NULL),
('201010', '$2y$10$6ZGsGaybvyVmcp9LOAZqNuc8K7o5HcLexRz.DlxBmlk1PicVRLTe.', 'lecturer', NULL),
('201037', '$2y$10$FyFWsXTcpD5CE4bEBnznIutp/piS/0gwtQuan2LBHUtbRX/8KehAy', 'lecturer', '2022-07-12 05:36:58'),
('203007', '$2y$10$A9AXZz58FJvDpM3cr1pg/OvocvSzUwzsFSl6soj/V6BESRQQ0aXqq', 'lecturer', '2022-07-17 00:12:23'),
('204031', '$2y$10$73UKEo2g6JuBFiTc/qeFO.LkcRcTbzXGgZC5fdmWiMa4c/EN3npKC', 'lecturer', NULL),
('206023', '$2y$10$ypo75jFJdGsNXlTttK6zweyFpI8G5jUkYJkT3I2RK3qd4mB65p4.O', 'lecturer', NULL),
('207011', '$2y$10$bHZy0HDw0pSy7vsbYqNA7uKGuW5H6B6/C01NX2WkecwfiLoIQSQMW', 'lecturer', NULL),
('208019', '$2y$10$0UlarSGhjBjgGblaIpe03ub2igOMaVQFawLH6Rjt4C2ITYZWZ/k1S', 'lecturer', NULL),
('208020', '$2y$10$/AeHemhmEgwvJIOdWIsNo.B3fLXqT7/Imsspm8KNbgTy5vchXFMTy', 'lecturer', NULL),
('211002', '$2y$10$jN9imDKGs5Z/d7hkmCok4.L7IuhXBs1rW.vfSnKvWwxsI/2osyXM6', 'lecturer', NULL),
('211019', '$2y$10$Sr4FElbste5rRh3/I6Laqe89sBTWiTHUR9Fdx7XY9UHa.fOBeyBzW', 'lecturer', NULL),
('212003', '$2y$10$Jm.LNCQJNFHAUlwGWDvT2OUGUVpo21rBsiY2n6fGYMNsTjKRlfCIa', 'lecturer', NULL),
('212020', '$2y$10$s8EadGWy.sG7QNHadQ3BBOZRG1UDZwTu7zQIpbfvwCyxZSd1cOheC', 'lecturer', NULL),
('213002', '$2y$10$4az60KuhV1ft/zhNpwXx6OhaVjEJDMdYZryCql2oJZciIncRI3uVK', 'lecturer', NULL),
('214011', '$2y$10$DDejrp7lT0OPzJa1u3UDsOwMs0//15w2VXromaUzQfP/fImfC4jpi', 'lecturer', NULL),
('214012', '$2y$10$K7FHngUxc89xlhzIm9Fw0ebfPjdWl467v.rVfjRp7DMXiBpoG3CUm', 'lecturer', NULL),
('214031', '$2y$10$Cj2AIvR0yZ0Di7R.CKb4iuxbNSpcRAc7CFfyXLTkUzMohF9/CZxKe', 'lecturer', NULL),
('214032', '$2y$10$3vuHLg2E4ayaZG417nWujOQhpP2FlkmM9kQIjsGGe2ohIfhnrXztq', 'lecturer', NULL),
('215039', '$2y$10$0NZhLC4NUHAKJoYEirhWQeKS3OHNf3N4rqFPMpzNFFgeeiyZSPyGm', 'lecturer', NULL),
('215040', '$2y$10$KMVQYvtAqFLKQ.S3TqSi3.iF0Q4EI0t8vkAoUgsMpdVx2i4RoJpr6', 'lecturer', NULL),
('216012', '$2y$10$pmVO09LO.hRKrzl8K6twDO/53VKOd0VeBjhcJOVhKtwqxdjT376m6', 'lecturer', NULL),
('216013', '$2y$10$5YSNMZPW5yV34hTbI38PoO/VSMkFutuxOOJld86htG2wRUgDLliUO', 'lecturer', NULL),
('216039', '$2y$10$L9zRKyppbe5eZIQj8q86P.RKN.rU.tV4qvnTmVpACKSlCyLMu6GTu', 'lecturer', NULL),
('216060', '$2y$10$udcYUNq3vEm89Kr1ih8F1uv0CEIOqQIpTtDPAL9ZHx4zVkmYuanVK', 'lecturer', NULL),
('217001', '$2y$10$MSW41DYuDA5BnI.dXDou5eoLkjxdw.H6ufMnB3i4Xtdm03YnGxbqK', 'lecturer', NULL),
('217006', '$2y$10$e.nkY.ntX3qmXJiRawaSXOV2QFLXeLX1mYY02vy3Rak/FNcZV4Y5G', 'lecturer', NULL),
('217024', '$2y$10$xG2d/r2zr817TkS3RR2ELu3zHtjj45u3SCNFomfB0bDfN7FdbgiRO', 'lecturer', NULL),
('217068', '$2y$10$o8LY.KuocaJL8BxwBEswDOH7dTNuKKGAQB0K3dVQ6Q9o3qvHrGUx6', 'lecturer', NULL),
('218008', '$2y$10$cc5h.H3XfP49HLsvLebyoeXWUo9NIPDDf33xevQ5Rkgq/jvBLYBYO', 'lecturer', NULL),
('218024', '$2y$10$K2J6Ccu/jKnqqTDLtVOHc.GcAM.s311J0M7L4E5T1CwiLW40MVuMC', 'lecturer', NULL),
('218025', '$2y$10$cDhxXDnx6E5RdFC0bgBEkuxZRPEtsbJlrojEqpaZVnYTvGBzaSgAa', 'lecturer', NULL),
('218027', '$2y$10$eD89v43Q/CiLIO5kfe4Wpe8saI9HE93IiqG0ojeymwlESO1x/nmym', 'lecturer', NULL),
('218036', '$2y$10$ok3P0EdS8t.kuq8fGhR9e.nM3vhDrouxhN5WFoak1p0/cdQtbBAau', 'lecturer', NULL),
('219032', '$2y$10$BlJdKLValBkF0mzTFXECKuGbG6O9HV//iOOTW8K7kt0F1QOZ41vQ6', 'lecturer', NULL),
('219038', '$2y$10$8Q7krGuwDfIsaUMjb35Rz.uiUa871nVKYCugTBnCxXFtkZnfJ7Gwm', 'lecturer', NULL),
('219065', '$2y$10$.ow2uOkmSSlRSGNq0KWCfey1iTFL11xIyOUNyU5jFctH2XXfwo71e', 'lecturer', NULL),
('219066', '$2y$10$iUdFugvaG.QujVPbyw8UdOvpEKghGLb3S16T5XefmXJhw.9eJqq0S', 'lecturer', NULL),
('221011', '$2y$10$tkm12m7WQAoCK4jJJuZd9u/4JgIFKfSNzdS5I2.BI9QN/8q7By0W6', 'lecturer', NULL),
('221012', '$2y$10$.PyVAiqYXFsViHZmZ2M6ReL2yb1893L2FudmM7B.ZlJ7nSXC6BbjO', 'lecturer', NULL),
('221016', '$2y$10$M3dOMLsab7kURbDsQV9A.uZiKQ3xaO03/lP5zlSI3fbjlbCI115Tm', 'lecturer', NULL),
('221042', '$2y$10$E9ltN0NMikK3zze8jVRzGetG8eIxOwIul674Lbh5XP4JUgLOtOYlK', 'lecturer', NULL),
('221048', '$2y$10$O7VnYmaQo9P18mG0Hkf1bu4QNXzrj0G0wDArGhCR4t.VJamMytUGq', 'lecturer', NULL),
('ajeng', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'staff', '2022-09-08 08:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_lab`
--

DROP TABLE IF EXISTS `user_lab`;
CREATE TABLE `user_lab` (
  `npk` varchar(30) NOT NULL,
  `id_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_lab`
--

INSERT INTO `user_lab` (`npk`, `id_lab`) VALUES
('182018', 1),
('200031', 2),
('201037', 4),
('203007', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `roles` enum('admin','student','lecturer','kalab','wd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `username`, `roles`) VALUES
(1, '110119001', 'student'),
(3, '110119004', 'student'),
(4, '110119005', 'student'),
(5, '110119008', 'student'),
(6, '110119010', 'student'),
(7, '110119011', 'student'),
(9, '110119014', 'student'),
(10, '110119015', 'student'),
(11, '110119003', 'student'),
(12, '110119013', 'student'),
(13, '182018', 'lecturer'),
(14, '189005', 'lecturer'),
(17, '200031', 'lecturer'),
(18, '200032', 'lecturer'),
(19, '201010', 'lecturer'),
(20, '201037', 'lecturer'),
(21, '203007', 'lecturer'),
(22, '204031', 'lecturer'),
(23, '206023', 'lecturer'),
(24, '207011', 'lecturer'),
(25, '208019', 'lecturer'),
(26, '211002', 'lecturer'),
(27, '211019', 'lecturer'),
(28, '212003', 'lecturer'),
(29, '212020', 'lecturer'),
(30, '213002', 'lecturer'),
(31, '214011', 'lecturer'),
(32, '214012', 'lecturer'),
(33, '214031', 'lecturer'),
(34, '214032', 'lecturer'),
(35, '215039', 'lecturer'),
(36, '215040', 'lecturer'),
(37, '216012', 'lecturer'),
(38, '216013', 'lecturer'),
(39, '216039', 'lecturer'),
(40, '216060', 'lecturer'),
(41, '217001', 'lecturer'),
(42, '217006', 'lecturer'),
(43, '217024', 'lecturer'),
(44, '217068', 'lecturer'),
(45, '218008', 'lecturer'),
(46, '218024', 'lecturer'),
(47, '218025', 'lecturer'),
(48, '218027', 'lecturer'),
(49, '218036', 'lecturer'),
(50, '219032', 'lecturer'),
(51, '219038', 'lecturer'),
(52, '219065', 'lecturer'),
(53, '219066', 'lecturer'),
(54, '221011', 'lecturer'),
(55, '221012', 'lecturer'),
(56, '221016', 'lecturer'),
(57, '221042', 'lecturer'),
(58, '221048', 'lecturer'),
(59, '199014', 'lecturer'),
(60, '199015', 'lecturer'),
(62, '208020', 'lecturer'),
(64, 'ajeng', 'admin'),
(65, '200031', 'kalab'),
(66, '201037', 'kalab'),
(67, '203007', 'kalab'),
(68, '182018', 'wd'),
(69, '110118045', 'student'),
(70, '110118046', 'student'),
(71, '110118034', 'student'),
(72, '110118386', 'student'),
(73, '110118283', 'student'),
(74, '110118252', 'student'),
(75, '110118295', 'student'),
(76, '110118199', 'student'),
(77, '110118017', 'student'),
(78, '110118430', 'student'),
(79, '110118100', 'student'),
(80, '110118015', 'student'),
(81, '110118424', 'student'),
(82, '110118164', 'student'),
(83, '110118256', 'student'),
(84, '110118321', 'student'),
(85, '110118198', 'student'),
(86, '110118288', 'student'),
(87, '110118019', 'student'),
(88, '110118183', 'student'),
(89, '110118185', 'student'),
(90, '110118107', 'student'),
(91, '110118228', 'student'),
(92, '110118405', 'student'),
(93, '110118241', 'student'),
(94, '110118230', 'student'),
(95, '110118025', 'student'),
(96, '110118225', 'student'),
(97, '110118027', 'student'),
(98, '110118426', 'student'),
(99, '110118191', 'student'),
(100, '110118433', 'student'),
(101, '110118282', 'student'),
(102, '110118326', 'student'),
(103, '110118136', 'student'),
(104, '110118377', 'student'),
(106, '110118393', 'student'),
(107, '110118008', 'student'),
(108, '110118021', 'student'),
(109, '110118184', 'student'),
(110, '110118031', 'student'),
(111, '110118263', 'student'),
(112, '110118020', 'student'),
(113, '110118001', 'student'),
(114, '110118337', 'student'),
(115, '110118179', 'student'),
(116, '110118102', 'student'),
(117, '110118311', 'student'),
(118, '110118129', 'student'),
(119, '110118174', 'student'),
(120, '110118202', 'student'),
(121, '110118280', 'student'),
(122, '110118327', 'student'),
(123, '110118005', 'student'),
(124, '110118261', 'student'),
(125, '110118345', 'student'),
(126, '110118033', 'student'),
(127, '110118232', 'student'),
(128, '110118180', 'student'),
(129, '110118062', 'student'),
(130, '110118214', 'student'),
(131, '110118101', 'student'),
(132, '110118320', 'student'),
(133, '110118190', 'student'),
(134, '110118281', 'student'),
(135, '110118454', 'student'),
(136, '110118324', 'student'),
(137, '110118095', 'student'),
(138, '110118092', 'student'),
(139, '110118032', 'student'),
(140, '110118178', 'student'),
(141, '110118415', 'student'),
(142, '110118445', 'student'),
(143, '110118410', 'student'),
(144, '110118441', 'student'),
(145, '110118442', 'student'),
(146, '110118334', 'student'),
(147, '110118204', 'student'),
(148, '110118397', 'student'),
(149, '110118343', 'student'),
(150, '110118373', 'student'),
(151, '110118155', 'student'),
(152, '110118342', 'student'),
(153, '110118333', 'student'),
(154, '110118432', 'student'),
(155, '110118350', 'student'),
(156, '110118376', 'student'),
(157, '110118002', 'student'),
(158, '110118319', 'student'),
(159, '110118175', 'student'),
(160, '110118212', 'student'),
(161, '110118223', 'student'),
(162, '110118253', 'student'),
(163, '110118170', 'student'),
(164, '110118428', 'student'),
(165, '110118104', 'student'),
(166, '110118189', 'student'),
(167, '110118448', 'student'),
(168, '110118022', 'student'),
(169, '110118251', 'student'),
(170, '110118177', 'student'),
(171, '110118385', 'student'),
(172, '110118176', 'student'),
(173, '110118243', 'student'),
(174, '110118330', 'student'),
(175, '110118233', 'student'),
(176, '110118236', 'student'),
(177, '110118447', 'student'),
(178, '110118014', 'student'),
(179, '110118088', 'student'),
(180, '110118249', 'student'),
(181, '110118401', 'student'),
(182, '110118068', 'student'),
(183, '110118196', 'student'),
(184, '110118391', 'student'),
(185, '110118238', 'student'),
(186, '110118419', 'student'),
(187, '110118425', 'student'),
(188, '110118149', 'student'),
(189, '110118357', 'student'),
(190, '110118084', 'student'),
(191, '110118165', 'student'),
(192, '110118355', 'student'),
(193, '110118138', 'student'),
(194, '110118151', 'student'),
(195, '110118152', 'student'),
(196, '110118182', 'student'),
(197, '110118423', 'student'),
(198, '110118269', 'student'),
(199, '110118213', 'student'),
(200, '110118181', 'student'),
(201, '110118227', 'student'),
(202, '110118093', 'student'),
(203, '110118009', 'student'),
(204, '110118374', 'student'),
(205, '110118158', 'student'),
(206, '110118346', 'student'),
(207, '110118364', 'student'),
(208, '110118378', 'student'),
(209, '110118162', 'student'),
(210, '110118087', 'student'),
(211, '110118171', 'student'),
(212, '110118237', 'student'),
(213, '110118259', 'student'),
(214, '110118270', 'student'),
(215, '110118220', 'student'),
(216, '110118368', 'student'),
(217, '110118010', 'student'),
(218, '110118360', 'student'),
(219, '110118250', 'student'),
(220, '110118224', 'student'),
(221, '110118134', 'student'),
(222, '110118193', 'student'),
(223, '110118248', 'student'),
(224, '110118075', 'student'),
(225, '110118446', 'student'),
(226, '110118293', 'student'),
(227, '110118418', 'student'),
(228, '110118082', 'student'),
(229, '110118440', 'student'),
(230, '110118279', 'student'),
(231, '110118294', 'student'),
(232, '110118384', 'student'),
(233, '110118122', 'student'),
(234, '110118197', 'student'),
(235, '110118406', 'student'),
(236, '110118304', 'student'),
(237, '110118336', 'student'),
(238, '110118291', 'student'),
(239, '110118402', 'student'),
(240, '110118407', 'student'),
(241, '110118409', 'student'),
(242, '110118273', 'student'),
(243, '110118113', 'student'),
(244, '110118325', 'student'),
(245, '110118078', 'student'),
(246, '110118262', 'student'),
(247, '110118216', 'student'),
(248, '110118361', 'student'),
(249, '110118390', 'student'),
(250, '110118382', 'student'),
(251, '110118112', 'student'),
(252, '110118285', 'student'),
(253, '110118114', 'student'),
(254, '110118284', 'student'),
(255, '110118316', 'student'),
(256, '110118438', 'student'),
(257, '110118362', 'student'),
(258, '110118135', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`npk`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_eligibility`
--
ALTER TABLE `setting_eligibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`nrp`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topik_course`
--
ALTER TABLE `topik_course`
  ADD PRIMARY KEY (`id_topik`,`course_id`);

--
-- Indexes for table `topik_periode`
--
ALTER TABLE `topik_periode`
  ADD PRIMARY KEY (`id_topik`,`id_periode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_lab`
--
ALTER TABLE `user_lab`
  ADD PRIMARY KEY (`npk`) USING BTREE;

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_eligibility`
--
ALTER TABLE `setting_eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_USERNAME` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
