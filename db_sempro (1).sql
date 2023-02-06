-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 02:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(30) NOT NULL,
  `old_kode_mk1` varchar(30) NOT NULL,
  `old_kode_mk2` varchar(30) NOT NULL,
  `old_kode_mk3` varchar(30) NOT NULL,
  `old_kode_mk4` varchar(30) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `sks` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `kode_mk`, `old_kode_mk1`, `old_kode_mk2`, `old_kode_mk3`, `old_kode_mk4`, `nama`, `sks`, `is_deleted`) VALUES
(1, '11011002', '111101', '111102', '111104', '', 'Perhitungan Kefarmasian', 2, 0),
(2, '11011003', '111103', '', '', '', 'Bahasa Inggris', 2, 0),
(3, '11011101', '111341', '', '', '', 'Biomolekul dan Biologi Sel', 3, 0),
(4, '11011102', '111342', '', '', '', 'Botani Farmasi', 2, 0),
(5, '11011201', '111221', '', '', '', 'Kimia Umum', 3, 0),
(6, '11011202', '112222', '', '', '', 'Kimia Organik I', 3, 0),
(7, '11011401', '111342', '', '', '', 'Anatomi dan Fisiologi Manusia', 3, 0),
(8, '11011001', '112105', '112106', '114585', '', 'Profesi Farmasi', 2, 0),
(9, '11012301', '112581', '', '', '', 'Desain Sediaan Farmasi', 3, 0),
(10, '11012402', '112463', '', '', '', 'Farmakologi Dasar', 4, 0),
(11, '11012204', '113224', '', '', '', 'Kimia Analisis Kualitatif', 3, 0),
(12, '11012203', '113223', '', '', '', 'Kimia Organik II', 3, 0),
(13, '11012104', '112343', '', '', '', 'Farmakognosi', 2, 0),
(14, '11012103', '112462', '', '', '', 'Biokimia dan Biologi Molekuler', 3, 0),
(15, '11012004', '115468', '', '', '', 'Informatika Kefarmasian', 2, 0),
(16, '11013005', '', '', '', '', 'BAHASA INDONESIA', 2, 0),
(17, '11013105', '113344', '', '', '', 'Fitoterapi', 2, 0),
(18, '11013106', '114346', '', '', '', 'Teknologi Fitofarmasi', 3, 0),
(19, '11013205', '114225', '', '', '', 'Kimia Analisis Kuantitatif', 3, 0),
(20, '11013302', '114583', '113582', '', '', 'Pharmaceutical Physicochemistry', 0, 0),
(21, '11013403', '116470', '', '', '', 'Konsep Pelayanan Kefarmasian', 2, 0),
(22, '11013404', '117473', '', '', '', 'Pengobatan Berbasis Bukti', 2, 0),
(23, '11013405', '113364', '', '', '', 'Imunologi dan Hematologi', 2, 0),
(24, '115588', '', '', '', '', 'Teknologi Sediaan Steril', 3, 0),
(25, '115587', '', '', '', '', 'Teknologi Sed Semisolida-Likuida', 4, 0),
(26, '115586', '', '', '', '', 'Biofarmasi-Farmakokinetika I ', 3, 0),
(27, '115468', '', '', '', '', 'Informasi Obat I', 2, 0),
(28, '115347', '', '', '', '', 'Fitokimia', 3, 1),
(29, '115226', '', '', '', '', 'Analisis Fisiko-Kimia I', 4, 0),
(30, '115469', '', '', '', '', 'Farmasi Komunitas I', 2, 0),
(31, '116589', '', '', '', '', 'Formulasi & Teknologi Sediaan Solida', 3, 0),
(32, '116590', '', '', '', '', 'Biofarmasi-Farmakokinetika II', 3, 0),
(33, '116471', '', '', '', '', 'Farmasi Komunitas II', 3, 0),
(34, '116470', '', '', '', '', 'Farmasi Klinis I', 2, 0),
(35, '116229', '', '', '', '', 'Analisis Obat, Makanan & Kosmetika', 3, 0),
(36, '116228', '', '', '', '', 'Analisis Fisiko-Kimia II', 2, 0),
(37, '116227', '', '', '', '', 'Kimia Medisinal I', 2, 0),
(38, '117230', '', '', '', '', 'Kimia Medisinal II', 2, 0),
(39, '117591', '', '', '', '', 'Farmasi Industri I', 2, 0),
(40, '118108', '', '', '', '', 'Kewirausahaan', 3, 0),
(41, '118000', '', '', '', '', 'Skripsi ', 6, 0),
(42, '18476', '', '', '', '', 'FARMAKO-EKONOMI', 2, 0),
(43, '118594', '', '', '', '', 'Farmasi Industri II', 2, 0),
(44, '117593', '', '', '', '', 'Sistem Penghantaran Obat', 2, 0),
(45, '117592', '', '', '', '', 'Kosmetologi', 2, 0),
(46, '117535', '', '', '', '', 'Sistem Penghantaran Kosmetika', 2, 0),
(47, '117475', '', '', '', '', 'Informasi Obat II', 2, 0),
(48, '117474', '', '', '', '', 'Farmasi Klinis II', 3, 0),
(49, '117473', '', '', '', '', 'Pengobatan Berbasis Bukti', 2, 0),
(50, '117349', '', '', '', '', 'Obat Asli Indonesia', 2, 0),
(51, '117234', '', '', '', '', 'Pengemb & Penjaminan Mutu Produk Kosmetik', 4, 0),
(52, '117233', '', '', '', '', 'Kimia Lingkungan', 2, 0),
(53, '117232', '', '', '', '', 'Kimia Forensik', 2, 0),
(54, '117231', '', '', '', '', 'Analisis Fisiko-kimia III', 3, 0),
(55, '116593', '', '', '', '', 'Kosmetika Medik', 2, 0),
(56, '116592', '', '', '', '', 'Teknologi Kosmetika', 3, 0),
(57, '116472', '', '', '', '', 'Analisis Klinis', 2, 0),
(58, '116348', '', '', '', '', 'Teknologi Obat Herbal II', 2, 0),
(59, '115347', '', '', '', '', 'Fitokimia', 0, 0),
(60, '111101', '', '', '', '', 'Matematika', 0, 0),
(61, '111102', '', '', '', '', 'Fisika ', 0, 0),
(62, '111103', '', '', '', '', 'Bahasa Inggris', 0, 0),
(63, '111104', '', '', '', '', 'Pengantar Ilmu Farmasi', 0, 0),
(64, '111221', '', '', '', '', 'Kimia Umum', 0, 0),
(65, '111341', '', '', '', '', 'Biologi Sel', 0, 0),
(66, '111342', '', '', '', '', 'Botani Farmasi ', 0, 0),
(67, '111461', '', '', '', '', 'Anatomi-Fisiologi Manusia', 0, 0),
(68, '00111A', '', '', '', '', 'Pendidikan Agama Islam 2', 3, 0),
(69, '00112A', '', '', '', '', 'Pendidikan Agama Katolik', 3, 0),
(70, '00113A', '', '', '', '', 'Pendidikan Agama Protestan', 3, 0),
(71, '00114A', '', '', '', '', 'Pendidikan Agama Hindu', 3, 0),
(72, '00115A', '', '', '', '', 'Pendidikan Agama Budha', 3, 0),
(73, '00116A', '', '', '', '', 'Pendidikan Agama Khong Hu Cu', 3, 0),
(74, '112105', '', '', '', '', 'Kepemimpinan', 3, 0),
(75, '112106', '', '', '', '', 'Filsafat Ilmu & Etika', 0, 0),
(76, '112222', '', '', '', '', 'Kimia Organik I', 0, 0),
(77, '112343', '', '', '', '', 'Farmakognosi I', 0, 0),
(78, '112462', '', '', '', '', 'Biokimia', 0, 0),
(79, '112463', '', '', '', '', 'Farmakologi-Toksikologi I', 0, 0),
(80, '112581', '', '', '', '', 'Formulasi Dasar', 0, 0),
(81, '00141A', '', '', '', '', 'Pendidikan Pancasila & Kewarganegaraan', 3, 0),
(82, '113223', '', '', '', '', 'Kimia Organik II', 0, 0),
(83, '113224', '', '', '', '', 'Kimia Analisis Kualitatif', 0, 0),
(84, '113344', '', '', '', '', 'Farmakognosi II', 0, 0),
(85, '113345', '', '', '', '', 'Bioteknologi Farmasi', 0, 0),
(86, '113464', '', '', '', '', 'Imunologi', 0, 0),
(87, '113465', '', '', '', '', 'Farmakologi-Toksikologi II', 0, 0),
(88, '113582', '', '', '', '', 'Farmasi Fisika I', 0, 0),
(89, '114107', '', '', '', '', 'Metodologi Penelitian & Statistika', 3, 0),
(90, '114225', '', '', '', '', 'Kimia Analisis Kuantitatif', 0, 0),
(91, '114346', '', '', '', '', 'Teknologi Obat Herbal I', 0, 0),
(92, '114466', '', '', '', '', 'Mikrobiologi Farmasi', 0, 0),
(93, '114467', '', '', '', '', 'Farmasi Sosial', 0, 0),
(94, '114583', '', '', '', '', 'Farmasi Fisika II', 0, 0),
(95, '114584', '', '', '', '', 'Manajemen Farmasi', 0, 0),
(96, '114585', '', '', '', '', 'Undang-undang & Etika Kefarmasian ', 0, 0),
(97, '118476', '', '', '', '', 'Farmako-ekonomi', 0, 0),
(98, '11014006', '0011xA', '', '', '', 'Agama dan Etika', 3, 0),
(99, '11014206', '115226', '', '', '', 'Analisis Instrumental', 0, 0),
(100, '11014207', '116228', '', '', '', 'Elusidasi Struktur', 0, 0),
(101, '11014303', '116589', '', '', '', 'Manufaktur Sediaan Solida', 0, 0),
(102, '11014304', '115586', '', '', '', 'Biofarmasi', 0, 0),
(103, '11014406', '114466', '', '', '', 'Mikrobiologi Farmasi', 0, 0),
(104, '11014407', '116472', '117474', '117475', '113465', 'Integrated Course for Medication in Gastrointestinal System and HepaticDisorders', 0, 0),
(105, '11014408', '116472', '117474', '117475', '113465', 'Integrated Course for Medication in Central Nervous System (CNS)Disorders', 0, 0),
(106, '11015007', '00141A', '', '', '', 'Pancasila dan Kewarganegaraan', 3, 0),
(107, '11015208', '116227', '', '', '', 'Kimia Medisinal', 0, 0),
(108, '11015305', '115588', '', '', '', 'Manufaktur Sediaan Steril', 0, 0),
(109, '11015306', '115587', '', '', '', 'Manufaktur Sediaan Likuid Semisolid', 0, 0),
(110, '11015307', '116590', '', '', '', 'Farmakokinetika', 0, 0),
(111, '11015409', '114467', '', '', '', 'Kesehatan Masyarakat dan Sistem Kesehatan', 0, 0),
(112, '11015410', '115469', '', '', '', 'Menanggapi gejala penyakit', 0, 0),
(113, '11015411', '116472', '117474', '117475', '113465', 'Integrated Course for Medication in Infection and Respiratory Disorders', 0, 0),
(114, '11016008', '114107', '', '', '', 'Metodologi Penelitan dan Biostatistika', 3, 0),
(115, '11016107', '115347', '', '', '', 'Fitokimia', 0, 0),
(116, '11016108', '113345', '', '', '', 'Bioteknologi Farmasi', 0, 0),
(117, '11016209', '116229', '', '', '', 'Analisis Obat dan Makanan', 0, 0),
(118, '11016210', '117230', '', '', '', 'Penemuan dan Pengembangan Obat', 0, 0),
(119, '11016308', '117592', '', '', '', 'Kosmetologi', 0, 0),
(120, '11016309', '117591', '', '', '', 'Farmasi Industri', 0, 0),
(121, '11016310', '117593', '', '', '', 'Teknologi Penghantaran Obat', 0, 0),
(122, '11016311', '114584', '', '', '', 'IC Pharmaceutical Logistic and Managements', 0, 0),
(123, '11016412', '116472', '117474', '117475', '113465', 'Integrated Course for Medication in Cardiovascular and Endocrine Disorders', 0, 0),
(124, '11017009', '118108', '', '', '', 'Kewirausahaan dan Inovasi', 3, 0),
(125, '11017109', '117349', '', '', '', 'Nutrasetikal', 0, 0),
(126, '11017110', '117349', '', '', '', 'Aromaterapi', 0, 0),
(127, '11017211', '116348', '', '', '', 'IC Pharmaceutical Production and Process', 0, 0),
(128, '11017212', '118594', '', '', '', 'IC Pharmaceutical Quality Control and Quality Assurance', 0, 0),
(129, '11017213', '117234', '', '', '', 'Pengembangan dan Penjaminan Mutu Produk Kosmetika', 0, 0),
(130, '11017214', '117231', '', '', '', 'Validasi Metode Analisis', 0, 0),
(131, '11017215', '117233', '', '', '', 'Kimia Lingkungan', 0, 0),
(132, '11017216', '117232', '', '', '', 'Kimia Forensik', 0, 0),
(133, '11017312', '116593', '', '', '', 'Kosmetika Medik', 0, 0),
(134, '11017313', '116592', '117535', '', '', 'Sistem Penghantaran Kosmetik', 0, 0),
(135, '11017411', '118476', '', '', '', 'Farmakoekonomi dan Farmakoepidemiologi', 0, 0),
(136, '11017412', '116471', '', '', '', 'Pelayanan Resep', 0, 0),
(137, '11018000', '118000', '', '', '', 'Skripsi', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

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
-- Table structure for table `ijin_lab`
--

CREATE TABLE `ijin_lab` (
  `id` bigint(20) NOT NULL,
  `nrp` varchar(30) NOT NULL,
  `student_topik_id` bigint(11) NOT NULL,
  `submit_date` datetime NOT NULL,
  `pembimbing_validated_npk` varchar(30) DEFAULT NULL,
  `pembimbing_validated_date` datetime DEFAULT NULL,
  `kalab_validated_npk` varchar(30) DEFAULT NULL,
  `kalab_validated_date` datetime DEFAULT NULL,
  `wd_validated_npk` varchar(30) DEFAULT NULL,
  `wd_validated_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ijin_lab`
--

INSERT INTO `ijin_lab` (`id`, `nrp`, `student_topik_id`, `submit_date`, `pembimbing_validated_npk`, `pembimbing_validated_date`, `kalab_validated_npk`, `kalab_validated_date`, `wd_validated_npk`, `wd_validated_date`, `is_deleted`) VALUES
(1, '110118199', 1, '2023-01-25 10:44:30', '199003', '2023-01-25 15:19:38', '201037', '2023-01-25 16:18:16', '182018', '2023-01-31 03:42:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ijin_lab_detail`
--

CREATE TABLE `ijin_lab_detail` (
  `id` bigint(20) NOT NULL,
  `ijin_lab_id` bigint(20) NOT NULL,
  `ruang_lab_id` int(11) DEFAULT NULL,
  `nama_lab` varchar(100) NOT NULL,
  `alamat_lab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ijin_lab_detail`
--

INSERT INTO `ijin_lab_detail` (`id`, `ijin_lab_id`, `ruang_lab_id`, `nama_lab`, `alamat_lab`) VALUES
(1, 1, 3, 'Laboratorium Botani', ''),
(2, 1, 6, 'Laboratorium Farmakologi Toksikologi', ''),
(3, 1, NULL, 'twg', 'wrwhr');

-- --------------------------------------------------------

--
-- Table structure for table `kelulusan`
--

CREATE TABLE `kelulusan` (
  `id` bigint(20) NOT NULL,
  `nrp` varchar(30) NOT NULL,
  `student_topik_id` bigint(20) NOT NULL,
  `filekartuwali` text NOT NULL,
  `filebebaspakai` text NOT NULL,
  `filenaskahfinal` text NOT NULL,
  `submit_date` datetime NOT NULL,
  `dosbing_npk` varchar(30) DEFAULT NULL,
  `dosbing_validate_date` datetime DEFAULT NULL,
  `wd_npk` varchar(30) DEFAULT NULL,
  `wd_validate_date` datetime DEFAULT NULL,
  `sk_username_created` varchar(30) DEFAULT NULL,
  `sk_created_date` datetime DEFAULT NULL,
  `sk_filename` text DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

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
(1, 'Kimia Farmasi', 'KF', 0),
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
('187020', 'Dr. Drs. Antonius Adji Prayitno Setiadi, M.S., Apt.', 4),
('189005', 'Dr. Farida Suhud, M.Si., Apt.', 1),
('199003', 'Franciscus Cahyo Kristianto, S.Si., M.Farm-Klin., Apt.', 4),
('199014', 'Dr. Christina Avanti, M.Si., Apt.', 2),
('199015', 'Dr. Aguslina Kirtishanti, S.Si., M.Kes., Apt.', 4),
('200031', 'Dr. Ni Luh Dewi Aryani, S.Si., M.Si., Apt.', 2),
('200032', 'Alasen Sembiring M., S.Si., M.Si., Apt.', 2),
('201010', 'Dr. Dini Kesuma, S.Si., M.Si., Apt.', 1),
('201037', 'Dr. Rika Yulia, S.Si., Apt., Sp.FRS.', 4),
('202027', 'Dr. Agnes Nuniek Winantari, S.Si, M.Si., Apt.', 2),
('203006', 'Kusuma Hendrajaya, S.Si., M.Si., Apt.', 1),
('203007', 'Kartini, S.Si., M.Si.,P.hD.,Apt.', 3),
('204031', 'Dr. Dra. Azminah, M.Si.', 1),
('206023', 'Eko Setiawan, S.Farm., M.Sc., Apt.', 4),
('207011', 'Dr. Oeke Yunita, S.Si., M.Si., Apt.', 3),
('208019', 'Dr. Amelia Lorensia, S.Farm.,M.Farm-Klin.,Apt.', 4),
('210004', 'Dian Natasya Raharjo, S.Farm.,M.Farm-Klin.,Apt.', 4),
('210006', 'Dr. Lisa Aditama, S.Si., M.Farm-Klin, Apt.', 4),
('211002', 'Dr.rer.nat. Ratih, S.Farm., M.Farm., Apt.', 1),
('211017', 'Ike Dhiah Rochmawati, S.Farm., M.Farm.Klin.,Apt.', 4),
('211019', 'Endang Wahyu Fitriani, S.Farm.,M.Si., Apt.', 2),
('211020', 'Fauna Herawati, S.Si., M.Farm-Klin., Apt.', 4),
('211021', 'Sylvi Irawati, S.Farm., M.Farm-Klin.,Apt., Ph.D.', 4),
('211029', 'Dr. Yosi Irawati Wibowo, S.Si., M.Pharm., Apt.', 4),
('212003', 'Bobby Presley, S.Farm.,M.Farm-Klin.,Apt., Ph.D.', 4),
('212020', 'Aditya Trias Pradana, S.Farm., M.Si., Apt.', 2),
('213002', 'Dr. Krisyanti Budipramana, S.Farm., M.Farm., Apt.', 3),
('214011', 'Cynthia Marisca Muntu, S.Farm., M.Farm., Apt.', 2),
('214012', 'Ridho Islamie, S.Farm., M.Si., Apt.', 2),
('214031', 'Nina Dewi Oktaviyanti, S.Farm.,M.Farm., Apt.', 3),
('214032', 'Alfian Hendra Krisnawan, S.Farm.,M.Farm., Apt.', 3),
('215030', 'Dr. Marisca Evalina Gondokesumo, S.H., M.H., S.Farm., M.Farm-Klin., Apt.', 3),
('215039', 'Karina Citra Rani, S.Farm., M.Farm., Apt.', 2),
('215040', 'Nikmatul Ikhrom Eka Jayani, S.Farm., M.Farm-Klin., Apt.', 3),
('215041', 'Ika Mulyono Putri Wibowo, S.Farm.,M.Farm-Klin.,Apt.', 4),
('216060', 'Reine Risa Risthanti , S.Farm.,M.Farm-Klin.,Apt.', 1),
('217001', 'Dr. Finna Setiawan, S.Farm.,M.Si.', 3),
('217006', 'Roisah Nawatila, S.Farm.,M.Farm.,Apt.', 2),
('217058', 'Anita Purnamayanti, S.Si.,M.Farm-Klin.,Apt.', 2),
('217068', 'Devyani Diah Wulansari, S.Farm., M.Si., Apt.', 4),
('218024', 'Fawandi Fuad Alkindi, S.Farm., M.Farm., Apt.', 1),
('218025', 'Astridani Rizky Putranti, S.Farm., M.Farm., Apt.', 2),
('218026', 'Dr. Cecilia Brata, S.Si., M.Pharm., Apt.', 4),
('218027', 'Steven Victoria Halim, S.Farm., M.Farm., Apt.', 4),
('218036', 'Tegar Achsendo Yuniarta, S.Farm., M.Si.', 1),
('219065', 'I Gede Ari Sumartha, S.Farm., M.Farm., Apt.', 1),
('219066', 'Vendra Setiawan, S.Farm.,M.Farm.,Apt.', 1),
('221042', 'Citra Hayu Adi Makayasa, S.Farm., M.Farm., Apt.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `nama`, `tahun`, `semester`, `is_active`, `is_deleted`) VALUES
(1, 'GENAP 2021/2022', '', '', 0, 0),
(2, 'GASAL 2022/2023', '', '', 1, 0),
(4, 'GENAP 2022/2023', '', '', 0, 0),
(5, 'TES hapus', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `periode_sidang`
--

CREATE TABLE `periode_sidang` (
  `id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_sidang`
--

INSERT INTO `periode_sidang` (`id`, `date_start`, `date_end`, `is_active`, `is_deleted`) VALUES
(1, '2022-11-13', '2022-11-27', 0, 1),
(2, '2022-11-20', '2022-12-08', 0, 0),
(3, '2023-01-01', '2023-01-15', 0, 0),
(4, '2022-11-14', '2022-11-28', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `periode_sidang_skripsi`
--

CREATE TABLE `periode_sidang_skripsi` (
  `id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_sidang_skripsi`
--

INSERT INTO `periode_sidang_skripsi` (`id`, `date_start`, `date_end`, `is_active`, `is_deleted`) VALUES
(1, '2023-01-22', '2023-02-11', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `topik_id` int(11) NOT NULL,
  `nrp` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `label`, `is_deleted`) VALUES
(1, 'FF1.3', 0),
(2, 'FF2.3', 0),
(3, 'FE4.3', 0),
(4, 'FE3.1', 0),
(5, 'coba hapus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruang_lab`
--

CREATE TABLE `ruang_lab` (
  `id` int(11) NOT NULL,
  `ruang_lab` varchar(200) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang_lab`
--

INSERT INTO `ruang_lab` (`id`, `ruang_lab`, `is_deleted`) VALUES
(1, 'tes123', 1),
(2, 'Laboratorium Bioteknologi', 0),
(3, 'Laboratorium Botani', 0),
(4, 'Laboratorium TOH dan Fitokimia', 0),
(5, 'Laboratorium Analisis Fisiologi Manusia', 0),
(6, 'Laboratorium Farmakologi Toksikologi', 0),
(7, 'Laboratorium Biokimia', 0),
(8, 'Laboratorium Mikrobiologi', 0),
(9, 'Laboratorium CDEA-Mikrobologi', 0),
(10, 'Laboratorium Biofarmasi', 0),
(11, 'Laboratorium Farmasi Fisika', 0),
(12, 'Laboratorium Formulasi Dasar', 0),
(13, 'Laboratorium Teknologi Sediaan Solida', 0),
(14, 'Laboratorium Formulasi dan Teknologi Sediaan Steril', 0),
(15, 'Laboratorium CDEA', 0),
(16, 'Laboratorium Kualitatif', 0),
(17, 'Laboratorium Kuantitatif', 0),
(18, 'Laboratorium Kimia Organik', 0),
(19, 'Laboratorium Penelitian', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sempro`
--

CREATE TABLE `sempro` (
  `id` bigint(20) NOT NULL,
  `student_topik_id` bigint(20) DEFAULT NULL,
  `periode_sidang_id` int(11) DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `nrp` varchar(30) DEFAULT NULL,
  `sks_kum` int(11) DEFAULT NULL,
  `ipk_kum` double DEFAULT NULL,
  `kalab_verified_date` datetime DEFAULT NULL,
  `kalab_npk_verified` varchar(30) DEFAULT NULL,
  `sidang_date` date DEFAULT NULL,
  `sidang_time` int(11) DEFAULT NULL,
  `penguji1` varchar(30) NOT NULL,
  `penguji2` varchar(30) NOT NULL,
  `pembimbing1` varchar(32) DEFAULT NULL,
  `pembimbing2` varchar(32) DEFAULT NULL,
  `ruang_id` int(11) DEFAULT NULL,
  `admin_plotting_date` datetime DEFAULT NULL,
  `admin_plotting_username` varchar(30) DEFAULT NULL,
  `naskah_filename` text DEFAULT NULL,
  `naskah_upload_date` datetime DEFAULT NULL,
  `hasil` double DEFAULT NULL,
  `hasil_submited_date` datetime DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `kesimpulan` text DEFAULT NULL,
  `materi` text DEFAULT NULL,
  `rumusan` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `metodologi` text DEFAULT NULL,
  `analisis` text DEFAULT NULL,
  `revision_required` tinyint(1) DEFAULT NULL,
  `revision_judul_date` datetime DEFAULT NULL,
  `dosbing_validate_date` datetime DEFAULT NULL,
  `dosbing_validate_npk` varchar(30) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_done` tinyint(1) DEFAULT NULL,
  `sks_ks` int(11) DEFAULT NULL,
  `is_failed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sempro`
--

INSERT INTO `sempro` (`id`, `student_topik_id`, `periode_sidang_id`, `registered_date`, `nrp`, `sks_kum`, `ipk_kum`, `kalab_verified_date`, `kalab_npk_verified`, `sidang_date`, `sidang_time`, `penguji1`, `penguji2`, `pembimbing1`, `pembimbing2`, `ruang_id`, `admin_plotting_date`, `admin_plotting_username`, `naskah_filename`, `naskah_upload_date`, `hasil`, `hasil_submited_date`, `saran`, `kesimpulan`, `materi`, `rumusan`, `tujuan`, `metodologi`, `analisis`, `revision_required`, `revision_judul_date`, `dosbing_validate_date`, `dosbing_validate_npk`, `is_deleted`, `is_done`, `sks_ks`, `is_failed`) VALUES
(1, 1, 4, '2022-12-14 04:27:04', '110118199', 15, 3.9, NULL, NULL, NULL, NULL, '', '', '199003', '218025', NULL, '2023-01-04 08:40:04', 'admintu', 'naskah_120230126021903.pdf', '2023-01-26 02:19:03', NULL, '2023-01-04 08:43:09', 'Tolong judulnya direvisi', '', 'jfwe ij', '', '', '', '', 1, '2023-01-04 08:44:02', '2023-01-24 12:21:43', '218025', 0, 1, 24, 0),
(2, 2, 4, '2022-12-14 04:46:43', '110119001', 132, 4, '2022-12-14 04:57:05', '203007', '2022-11-17', 4, '199003', '218025', '214032', '210006', 3, '2022-12-14 06:04:01', 'admintu', 'naskah_220221214060522.pdf', '2022-12-14 06:05:22', 80, '2022-12-14 06:07:02', NULL, NULL, 'TES', '123', 'wgwr', 'gwpl', 't34t43', 1, '2022-12-14 06:08:52', '2022-12-14 06:09:29', '214032', 0, 1, 24, 0),
(3, 3, 4, '2022-12-28 07:31:23', '110119065', 12, 4, '2022-12-29 08:50:04', '201037', '2022-11-17', 5, '215039', '201010', '211021', '215030', 1, '2022-12-29 09:08:25', 'admintu', 'naskah_320221229090943.pdf', '2022-12-29 09:09:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting_eligibility`
--

CREATE TABLE `setting_eligibility` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `nama_alias` varchar(30) NOT NULL,
  `nilai` varchar(30) NOT NULL,
  `displayed_to_student` tinyint(1) NOT NULL,
  `display_value_in_postfix` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_eligibility`
--

INSERT INTO `setting_eligibility` (`id`, `nama`, `keterangan`, `nama_alias`, `nilai`, `displayed_to_student`, `display_value_in_postfix`) VALUES
(1, 'Skripsi tercantum dalam Kartu Studi', 'inputkan kode mk skripsi', 'skripsi', '11018000,118000', 1, 0),
(2, 'Total SKS tanpa nilai E >=  ', 'inputkan jumlah sks minimal tanpa nilai E', 'total_sks_tanpa_e_min', '120', 1, 1),
(3, 'Total SKS nilai D <=  ', 'Inputkan jumlah sks maksimal untuk mk nilai D', 'total_sks_nilai_d_max', '18', 1, 1),
(4, 'Nilai MK Metodologi Penelitian dan Bistatistika minimal memperoleh ', 'Inputkan nisbi nilai metpen minimal', 'nilai_metpen_min', 'C', 1, 1),
(5, 'Kode MK Metodologi Penelitian dan Bistatistika', 'Inputkan kode mk metpen statistik', 'kode_metpen', '11016008,114107', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting_nilai_minimal`
--

CREATE TABLE `setting_nilai_minimal` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(100) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_nilai_minimal`
--

INSERT INTO `setting_nilai_minimal` (`id`, `kode_mk`, `nama_mk`, `is_deleted`) VALUES
(1, '00141A, 11015007', 'Pendidikan Pancasila & Kewarganegaraan', 0),
(2, '112105', 'Kepemimpinan', 0),
(3, '11017009, 118108', 'Kewirausahaan dan Inovasi', 0),
(4, '11016008, 114107', 'Metodologi Penelitian & Statistika', 0),
(5, '00111A, 00112A, 00113A, 00114A, 00115A, 00116A, 11014006, 0011xA', 'Pendidikan Agama', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sidang_time`
--

CREATE TABLE `sidang_time` (
  `id` int(11) NOT NULL,
  `label` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sidang_time`
--

INSERT INTO `sidang_time` (`id`, `label`) VALUES
(1, '07.00'),
(2, '08.00'),
(3, '09.00'),
(4, '10.00'),
(5, '11.00'),
(6, '12.00'),
(7, '13.00'),
(8, '14.00'),
(9, '15.00'),
(10, '16.00'),
(11, '17.00');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id` bigint(20) NOT NULL,
  `student_topik_id` bigint(20) DEFAULT NULL,
  `periode_sidang_id` int(11) DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `nrp` varchar(30) DEFAULT NULL,
  `sks_kum` int(11) DEFAULT NULL,
  `ipk_kum` double DEFAULT NULL,
  `kalab_verified_date` datetime DEFAULT NULL,
  `kalab_npk_verified` varchar(30) DEFAULT NULL,
  `sidang_date` date DEFAULT NULL,
  `sidang_time` int(11) DEFAULT NULL,
  `penguji1` varchar(30) NOT NULL,
  `penguji2` varchar(30) NOT NULL,
  `pembimbing1` varchar(32) DEFAULT NULL,
  `pembimbing2` varchar(32) DEFAULT NULL,
  `ruang_id` int(11) DEFAULT NULL,
  `admin_plotting_date` datetime DEFAULT NULL,
  `admin_plotting_username` varchar(30) DEFAULT NULL,
  `naskah_filename` text DEFAULT NULL,
  `naskah_upload_date` datetime DEFAULT NULL,
  `kartu_bimbingan_filename` text DEFAULT NULL,
  `kartu_bimbingan_upload_date` datetime DEFAULT NULL,
  `hasil` double DEFAULT NULL,
  `hasil_submited_date` datetime DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `kesimpulan` text DEFAULT NULL,
  `materi` text DEFAULT NULL,
  `rumusan` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `metodologi` text DEFAULT NULL,
  `analisis` text DEFAULT NULL,
  `revision_required` tinyint(1) DEFAULT NULL,
  `revision_judul_date` datetime DEFAULT NULL,
  `dosbing_validate_date` datetime DEFAULT NULL,
  `dosbing_validate_npk` varchar(30) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_done` tinyint(1) DEFAULT NULL,
  `sks_ks` int(11) DEFAULT NULL,
  `is_failed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id`, `student_topik_id`, `periode_sidang_id`, `registered_date`, `nrp`, `sks_kum`, `ipk_kum`, `kalab_verified_date`, `kalab_npk_verified`, `sidang_date`, `sidang_time`, `penguji1`, `penguji2`, `pembimbing1`, `pembimbing2`, `ruang_id`, `admin_plotting_date`, `admin_plotting_username`, `naskah_filename`, `naskah_upload_date`, `kartu_bimbingan_filename`, `kartu_bimbingan_upload_date`, `hasil`, `hasil_submited_date`, `saran`, `kesimpulan`, `materi`, `rumusan`, `tujuan`, `metodologi`, `analisis`, `revision_required`, `revision_judul_date`, `dosbing_validate_date`, `dosbing_validate_npk`, `is_deleted`, `is_done`, `sks_ks`, `is_failed`) VALUES
(1, 1, 1, '2023-01-25 23:54:11', '110118199', NULL, NULL, '2023-01-26 00:20:54', '201037', '2023-01-25', 5, '214032', '201010', '199003', '218025', 4, '2023-01-26 02:01:46', 'admintu', 'naskah_120230126023957.pdf', '2023-01-26 02:39:57', 'kb_120230126021939.pdf', '2023-01-26 02:19:39', NULL, '2023-01-26 02:37:03', 'afrg', 'geger', ' wrge', 'e her', 'e rgte', ' erer', 'eheth ', 1, '2023-01-26 02:39:57', '2023-01-26 02:42:10', '199003', 0, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `nama`) VALUES
(1, 'ajeng', 'Ajeng'),
(2, 'admintu', 'Admin TU 2');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

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
('110118199', '', 'AKHMAD KASIM', 'Aktif', 2.386, 2.322, 2.41, 1, NULL, '2022-09-22 00:53:53'),
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
('110118419', '', 'NABILAH ALIFIYANI SHOFI', 'Aktif', 2.667, 2.858, 2.858, 1, NULL, '2022-10-21 02:51:22'),
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
('110119001', '', 'SEVERINA EFFENDI', 'Aktif', 4, 3.966, 3.966, 1, '', '2022-12-14 03:27:46'),
('110119003', '', 'I DEWA GEDE PUTRA SANJAYA', 'Aktif', 1.935, 2.684, 2.793, 0, '', '2022-09-25 00:15:04'),
('110119004', '', 'AUDREY WINAGA PUTERI', 'Aktif', 2.625, 3.414, 3.466, 0, '', '2022-09-25 00:15:04'),
('110119005', '', 'VERONIKA GERALDINE ANGELA', 'Aktif', 3.357, 3.664, 3.664, 0, '', '2022-09-25 00:15:04'),
('110119008', '', 'JESSICA CLAUDIA HERRI PUTRI', 'Aktif', 2.609, 3.267, 3.267, 0, '', '2022-09-25 00:15:04'),
('110119010', '', 'TAN, MARSELLA PUTRI AMELIA', 'Aktif', 3.826, 3.765, 3.765, 0, '', '2022-09-25 00:15:04'),
('110119011', '', 'ANABELLA DESTRIE IRAWAN', 'Aktif', 3.667, 3.711, 3.711, 0, '', '2022-09-25 00:15:04'),
('110119013', '', 'SANTIKO MEDHAKUMARA LAURENT', 'Aktif', 4, 3.916, 3.916, 0, '', '2022-09-25 00:15:04'),
('110119014', '', 'JESSLYN TRIXIE CHANDRA', 'Aktif', 3.429, 3.641, 3.641, 0, '', '2022-09-25 00:15:04'),
('110119015', '', 'FEBE FEBRILINA FERNANDA', 'Aktif', 3.543, 3.549, 3.549, 0, '', '2022-09-25 00:15:04'),
('110119016', '', 'ERIKA ANGGRAENI', 'Aktif', 3.476, 3.534, 3.534, 0, NULL, '2022-09-25 00:15:04'),
('110119017', '', 'AUDI GRACIA KOESWANDY', 'Aktif', 2.717, 3.338, 3.338, 0, NULL, '2022-09-25 00:15:04'),
('110119019', '', 'FELIX ALEXANDER', 'Aktif', 3.571, 3.626, 3.626, 0, NULL, '2022-09-25 00:15:04'),
('110119020', '', 'VIOLITA WIDJAJA', 'Aktif', 2.81, 3.336, 3.336, 0, NULL, '2022-09-25 00:15:04'),
('110119022', '', 'GABRIELLA IRENE KHORIANTO', 'Aktif', 3.13, 3.267, 3.267, 0, NULL, '2022-09-25 00:15:04'),
('110119023', '', 'SHERINA SUHARTO JO', 'Aktif', 3.524, 3.695, 3.695, 0, NULL, '2022-09-25 00:15:04'),
('110119024', '', 'CYNDY GRACELLYA HANS', 'Aktif', 3.543, 3.778, 3.778, 0, NULL, '2022-09-25 00:15:04'),
('110119025', '', 'EVELYN ANGELINA', 'Aktif', 2.786, 3.297, 3.297, 0, NULL, '2022-09-25 00:15:05'),
('110119026', '', 'PUTRI VALENSIA DHARMAWAN', 'Aktif', 3.5, 3.74, 3.74, 0, NULL, '2022-09-25 00:15:05'),
('110119027', '', 'SHIEREN HIZKIA', 'Aktif', 2.813, 3.172, 3.172, 0, NULL, '2022-09-25 00:15:05'),
('110119028', '', 'FELIX MARTINUS SETYONO', 'Aktif', 3.952, 3.916, 3.916, 0, NULL, '2022-09-25 00:15:05'),
('110119031', '', 'FLORIN SANTIKA DEWI', 'Aktif', 3.125, 3.47, 3.47, 0, NULL, '2022-09-25 00:15:05'),
('110119032', '', 'VICTORIA DASSMER', 'Aktif', 3.476, 3.679, 3.679, 0, NULL, '2022-09-25 00:15:05'),
('110119034', '', 'FIRDAUSI JAYA ANGGASTA', 'Aktif', 3.609, 3.621, 3.621, 0, NULL, '2022-09-25 00:15:05'),
('110119037', '', 'RON MANUEL SONHOTA', 'Aktif', 2.348, 2.941, 2.941, 0, NULL, '2022-09-25 00:15:05'),
('110119038', '', 'AORTA AGIS WARDANI', 'Aktif', 0.909, 2.326, 2.473, 0, NULL, '2022-09-25 00:15:05'),
('110119040', '', 'KEZIA FEBRIANA', 'Aktif', 3.31, 3.592, 3.592, 0, NULL, '2022-09-25 00:15:05'),
('110119041', '', 'SHERYL EVINA WAHJUDI', 'Aktif', 3.152, 3.363, 3.363, 0, NULL, '2022-09-25 00:15:05'),
('110119042', '', 'CYNTHIA NATALIE TJENDRA', 'Aktif', 3.283, 3.617, 3.617, 0, NULL, '2022-09-25 00:15:05'),
('110119044', '', 'ANNYSA DWI NURAINI', 'Aktif', 1.3, 2.235, 2.38, 0, NULL, '2022-09-25 00:15:05'),
('110119045', '', 'SHANDRA BELLA RIYANTO', 'Aktif', 3.571, 3.756, 3.756, 0, NULL, '2022-09-25 00:15:05'),
('110119046', '', 'TRIANA EFFIRADANI GUNAWAN', 'Aktif', 1.205, 2.387, 2.491, 0, NULL, '2022-09-25 00:15:06'),
('110119047', '', 'ELISSE WIJAYA', 'Aktif', 2.31, 3.289, 3.289, 0, NULL, '2022-09-25 00:15:06'),
('110119049', '', 'LIANI APRIATUS SALAMAH', 'Aktif', 1.575, 2.076, 2.207, 0, NULL, '2022-09-25 00:15:06'),
('110119050', '', 'ANGELA NOFVIANTI NUR CAHYO WATI', 'Aktif', 1.905, 2.651, 2.76, 0, NULL, '2022-09-25 00:15:06'),
('110119051', '', 'ZAHWA DHIBA', 'Aktif', 2.048, 2.706, 2.75, 0, NULL, '2022-09-25 00:15:06'),
('110119052', '', 'STEVANNY CATHARINA GOTAMA', 'Aktif', 3.024, 3.527, 3.527, 0, NULL, '2022-09-25 00:15:06'),
('110119053', '', 'JESSICA NATALIA KUSUMA', 'Aktif', 2.283, 3.192, 3.192, 0, NULL, '2022-09-25 00:15:06'),
('110119054', '', 'NURVINA YULIA', 'Aktif', 2.63, 2.977, 2.977, 0, NULL, '2022-09-25 00:15:06'),
('110119056', '', 'FARID AGENG PANGESTU', 'Aktif', 1.875, 2.577, 2.642, 0, NULL, '2022-09-25 00:15:06'),
('110119057', '', 'MELIANA SETIAWAN', 'Aktif', 2.69, 3.25, 3.25, 0, NULL, '2022-09-25 00:15:06'),
('110119059', '', 'FRISCA FELICIA WIDODO', 'Aktif', 2.652, 3.042, 3.042, 0, NULL, '2022-09-25 00:15:06'),
('110119060', '', 'ERICKO RICHIE RUDY TULUS', 'Aktif', 2.31, 2.985, 2.985, 0, NULL, '2022-09-25 00:15:06'),
('110119061', '', 'IVANA NOVITA', 'Aktif', 3.69, 3.809, 3.809, 0, NULL, '2022-09-25 00:15:06'),
('110119062', '', 'ALICIA CHANDRA PUTRI', 'Aktif', 3.19, 3.586, 3.586, 0, NULL, '2022-09-25 00:15:06'),
('110119063', '', 'VIORENT CLAUVEA YONATHAN', 'Aktif', 3.333, 3.594, 3.594, 0, NULL, '2022-09-25 00:15:07'),
('110119064', '', 'VIORELL CLAUDEA YONATHAN', 'Aktif', 3.31, 3.598, 3.598, 0, NULL, '2022-09-25 00:15:07'),
('110119065', '', 'AMELIA WIRANATA DAYAN', 'Aktif', 3.957, 3.935, 3.935, 1, NULL, '2022-12-28 05:09:56'),
('110119066', '', 'JONATHAN FELIX CAHYADI', 'Aktif', 3.286, 3.725, 3.725, 0, NULL, '2022-09-25 00:15:07'),
('110119067', '', 'VIOLINE EKAPUTRI SUWARDY', 'Aktif', 3.143, 3.538, 3.538, 0, NULL, '2022-09-25 00:15:07'),
('110119068', '', 'JESSICA PUTRI EFENDI', 'Aktif', 1.739, 2.942, 2.988, 0, NULL, '2022-09-25 00:15:07'),
('110119069', '', 'XANDRAMELA LIMALA ALICYA JUNAIDI LEE', 'Aktif', 3.022, 3.332, 3.332, 0, NULL, '2022-09-25 00:15:07'),
('110119070', '', 'QOTRUNNADA BENING NUR HANIFAH', 'Aktif', 2.595, 2.521, 2.611, 0, NULL, '2022-09-25 00:15:07'),
('110119072', '', 'NI WAYAN VALDA DIANITHA UTAMI', 'Aktif', 2.25, 2.713, 2.713, 0, NULL, '2022-09-25 00:15:07'),
('110119074', '', 'PRISCILIA REGITA SUNUR', 'Aktif', 2.521, 2.935, 2.981, 0, NULL, '2022-09-25 00:15:07'),
('110119075', '', 'FELICIA KOWE', 'Aktif', 3.826, 3.925, 3.925, 0, NULL, '2022-09-25 00:15:07'),
('110119078', '', 'RICHO YORDAN BUN', 'Aktif', 2.619, 3.183, 3.183, 0, NULL, '2022-09-25 00:15:07'),
('110119081', '', 'GRATCIA EMILIA ESAPURI', 'Aktif', 2.174, 2.862, 2.906, 0, NULL, '2022-09-25 00:15:07'),
('110119082', '', 'ERYKA NORMAWATI', 'Aktif', 2.262, 2.921, 3.041, 0, NULL, '2022-09-25 00:15:08'),
('110119083', '', 'CATHERINE CHEN', 'Aktif', 3.881, 3.863, 3.863, 0, NULL, '2022-09-25 00:15:08'),
('110119084', '', 'ACHMAD SAIPUL', 'Aktif', 0.55, 1.823, 2.124, 0, NULL, '2022-09-25 00:15:08'),
('110119085', '', 'JAYSON', 'Aktif', 1.762, 2.953, 3.073, 0, NULL, '2022-09-25 00:15:08'),
('110119086', '', 'VIONA GUNAWAN', 'Aktif', 1.826, 2.821, 2.887, 0, NULL, '2022-09-25 00:15:08'),
('110119088', '', 'AUFA KARIMA', 'Aktif', 2.261, 2.875, 2.875, 0, NULL, '2022-09-25 00:15:08'),
('110119089', '', 'NANCY VELLISIA', 'Aktif', 2.196, 3.027, 3.074, 0, NULL, '2022-09-25 00:15:08'),
('110119090', '', 'CHLARISSA NATALIE', 'Aktif', 2.619, 3.016, 3.016, 0, NULL, '2022-09-25 00:15:08'),
('110119092', '', 'ALFI MIFTAHUL ROHMAH', 'Aktif', 1.523, 2.34, 2.401, 0, NULL, '2022-09-25 00:15:08'),
('110119097', '', 'INGGIT KUSUMA WARDANI', 'Aktif', 2.478, 3.05, 3.05, 0, NULL, '2022-09-25 00:15:08'),
('110119098', '', 'HANSEN NGALIMAN', 'Aktif', 3.957, 3.902, 3.902, 0, NULL, '2022-09-25 00:15:08'),
('110119099', '', 'NIKITA FEBRIANI', 'Aktif', 1.69, 2.54, 2.602, 0, NULL, '2022-09-25 00:15:08'),
('110119101', '', 'CINDY JUNIAR', 'Aktif', 3.31, 3.286, 3.286, 0, NULL, '2022-09-25 00:15:08'),
('110119103', '', 'DIANA CANDRA NOVITASARI', 'Aktif', 1.143, 2.629, 2.736, 0, NULL, '2022-09-25 00:15:09'),
('110119104', '', 'LU\'LUIL MUNIROH', 'Aktif', 3.095, 3.477, 3.477, 0, NULL, '2022-09-25 00:15:09'),
('110119105', '', 'AGHNA KESYA MALLIKA AZZAHRA', 'Aktif', 1.786, 2.582, 2.644, 0, NULL, '2022-09-25 00:15:09'),
('110119106', '', 'NAOMI SHELMA MONICA JOEL', 'Aktif', 1.455, 2.456, 2.546, 0, NULL, '2022-09-25 00:15:09'),
('110119108', '', 'VINCENT CHANDRA KUSUMA', 'Aktif', 2.381, 3.289, 3.341, 0, NULL, '2022-09-25 00:15:09'),
('110119109', '', 'SEPTIA MONICA WULANDARI', 'Aktif', 2.978, 3.344, 3.344, 0, NULL, '2022-09-25 00:15:09'),
('110119110', '', 'TAN, ANGELA PUSPITA DEWI', 'Aktif', 3.391, 3.547, 3.547, 0, NULL, '2022-09-25 00:15:09'),
('110119111', '', 'IKE DELAVERA NASTITI', 'Aktif', 1.643, 2.537, 2.644, 0, NULL, '2022-09-25 00:15:09'),
('110119113', '', 'NATASHA KEZIA WIJAYA', 'Aktif', 2.435, 3.043, 3.043, 0, NULL, '2022-09-25 00:15:09'),
('110119114', '', 'NOOR HERLIYANA YANTI', 'Aktif', 1.587, 2.727, 2.837, 0, NULL, '2022-09-25 00:15:09'),
('110119115', '', 'INAYAH DWI CAHYA', 'Aktif', 3.087, 3.348, 3.348, 0, NULL, '2022-09-25 00:15:09'),
('110119116', '', 'NI NYOMAN LAILA NORDEWI YANI', 'Aktif', 1.705, 2.748, 2.815, 0, NULL, '2022-09-25 00:15:09'),
('110119119', '', 'ALBERT CENGNATA', 'Aktif', 2.952, 3.405, 3.405, 0, NULL, '2022-09-25 00:15:09'),
('110119121', '', 'KHOLYDA SALIM BAGIS', 'Aktif', 2.583, 2.736, 2.736, 0, NULL, '2022-09-25 00:15:09'),
('110119122', '', 'CHERYL MATULATAN', 'Aktif', 2.952, 3.435, 3.435, 0, NULL, '2022-09-25 00:15:09'),
('110119123', '', 'MICHAEL HANS CHRISTIAN', 'Aktif', 1.429, 2.786, 2.944, 0, NULL, '2022-09-25 00:15:10'),
('110119127', '', 'I KADEK ADI GUNA MAHENDRA', 'Aktif', 1.31, 2.597, 2.746, 0, NULL, '2022-09-25 00:15:10'),
('110119131', '', 'CATHRYN MONROE ANDRIANTO', 'Aktif', 3.429, 3.634, 3.634, 0, NULL, '2022-09-25 00:15:10'),
('110119132', '', 'EUNIKE YOSEMARY', 'Aktif', 2.913, 3.115, 3.164, 0, NULL, '2022-09-25 00:15:10'),
('110119134', '', 'NAHDYA SASTIKA', 'Aktif', 2.935, 3.148, 3.148, 0, NULL, '2022-09-25 00:15:10'),
('110119136', '', 'WIDYA NURHIDAYAH', 'Aktif', 1.025, 1.93, 2.094, 0, NULL, '2022-09-25 00:15:10'),
('110119137', '', 'IKA RIZQY AMALIA', 'Aktif', 2.357, 2.853, 2.853, 0, NULL, '2022-09-25 00:15:10'),
('110119139', '', 'KARINA BUDIANTO', 'Aktif', 1.636, 2.483, 2.594, 0, NULL, '2022-09-25 00:15:10'),
('110119140', '', 'PRIMA ROJAA YAAFI', 'Aktif', 2.273, 2.832, 2.832, 0, NULL, '2022-09-25 00:15:10'),
('110119143', '', 'BALQISH LAILIYA ZAHIRA AZZAHRAH', 'Aktif', 2.048, 2.567, 2.609, 0, NULL, '2022-09-25 00:15:10'),
('110119144', '', 'IMRO\'ATUS SHOLIHAH', 'Aktif', 2.075, 2.265, 2.325, 0, NULL, '2022-09-25 00:15:10'),
('110119146', '', 'ANGELINA HARIYONO', 'Aktif', 2.476, 3.027, 3.027, 0, NULL, '2022-09-25 00:15:10'),
('110119147', '', 'PUTU AYU SINTYA PRADNYA DEWI', 'Aktif', 1.7, 2.248, 2.305, 0, NULL, '2022-09-25 00:15:10'),
('110119148', '', 'ENDAH SEKAR SAFITRI', 'Aktif', 1.225, 2.178, 2.307, 0, NULL, '2022-09-25 00:15:10'),
('110119149', '', 'TAZKIYATUL ASMAI', 'Aktif', 2.119, 2.75, 2.794, 0, NULL, '2022-09-25 00:15:11'),
('110119152', '', 'SERLI WAHYUNINGSIH', 'Aktif', 1.591, 2.355, 2.397, 0, NULL, '2022-09-25 00:15:11'),
('110119154', '', 'DAMARIO FORTUNATO ISNAN', 'Aktif', 2.63, 2.985, 2.985, 0, NULL, '2022-09-25 00:15:11'),
('110119155', '', 'NI PUTU NADIA NATALI DEWI', 'Aktif', 3.688, 3.508, 3.508, 0, NULL, '2022-09-25 00:15:11'),
('110119156', '', 'ANGGUN EDITYA', 'Aktif', 2.667, 2.992, 2.992, 0, NULL, '2022-09-25 00:15:11'),
('110119158', '', 'UNIQ SETYANINGSARI', 'Aktif', 2.37, 2.772, 2.839, 0, NULL, '2022-09-25 00:15:11'),
('110119160', '', 'SHELLA SILVIA PUTRI', 'Aktif', 2.357, 2.679, 2.679, 0, NULL, '2022-09-25 00:15:11'),
('110119161', '', 'OCTAVIRA ANYUANI', 'Aktif', 2.238, 2.718, 2.785, 0, NULL, '2022-09-25 00:15:11'),
('110119163', '', 'NIMAS DYAH AJENG AULIA RAHMADHANI', 'Aktif', 2.205, 2.658, 2.728, 0, NULL, '2022-09-25 00:15:11'),
('110119166', '', 'ZEINETTA MIDYA HAYATI', 'Aktif', 2.739, 3.35, 3.35, 0, NULL, '2022-09-25 00:15:11'),
('110119168', '', 'AMALIA ELEANY', 'Aktif', 2.143, 2.647, 2.717, 0, NULL, '2022-09-25 00:15:11'),
('110119169', '', 'PUTRI AISYAH RACHMATIANI', 'Aktif', 1.4, 2.189, 2.32, 0, NULL, '2022-09-25 00:15:11'),
('110119170', '', 'EKA FITRI NATALIA', 'Aktif', 1.909, 2.47, 2.513, 0, NULL, '2022-09-25 00:15:11'),
('110119171', '', 'KEVIN ALFREDO WAHYUDI', 'Aktif', 1.643, 2.748, 2.813, 0, NULL, '2022-09-25 00:15:11'),
('110119172', '', 'KRISYA GIA CINTA MIMBA', 'Aktif', 2, 2.476, 2.525, 0, NULL, '2022-09-25 00:15:11'),
('110119174', '', 'LISA MAY DAMAYANTI', 'Aktif', 2.205, 2.697, 2.744, 0, NULL, '2022-09-25 00:15:12'),
('110119175', '', 'SUGENG HARYOKO', 'Aktif', 2.325, 2.414, 2.414, 0, NULL, '2022-09-25 00:15:12'),
('110119177', '', 'CATHERINA HUTAHAEAN', 'Aktif', 2.739, 3.188, 3.188, 0, NULL, '2022-09-25 00:15:12'),
('110119178', '', 'MUHAMMAD REZA APRILILO AKBAR', 'Aktif', 1.705, 2.874, 2.92, 0, NULL, '2022-09-25 00:15:12'),
('110119180', '', 'SYAYANDA YUKE SALSALITA', 'Aktif', 2.5, 2.837, 2.907, 0, NULL, '2022-09-25 00:15:12'),
('110119181', '', 'SITI MUTMAINAH', 'Aktif', 0, 2.442, 2.495, 0, NULL, '2022-09-25 00:15:12'),
('110119182', '', 'NURIYAH SULISTIAWATI', 'Aktif', 1.881, 2.69, 2.69, 0, NULL, '2022-09-25 00:15:12'),
('110119183', '', 'NOVITA SARI', 'Aktif', 1.674, 2.675, 2.785, 0, NULL, '2022-09-25 00:15:12'),
('110119186', '', 'IDA BAGUS OKA WISNU ANDHIKA', 'Aktif', 1.775, 2.565, 2.718, 0, NULL, '2022-09-25 00:15:12'),
('110119187', '', 'YUSRON ASSIDQY AW', 'Aktif', 2.024, 2.789, 2.902, 0, NULL, '2022-09-25 00:15:12'),
('110119188', '', 'NURUL HIDAYATI ISNAENI', 'Aktif', 2.227, 2.509, 2.552, 0, NULL, '2022-09-25 00:15:12'),
('110119189', '', 'AHMAD KEVIN NI\'MALMAULA', 'Aktif', 1.2, 1.963, 2.258, 0, NULL, '2022-09-25 00:15:12'),
('110119191', '', 'MICHAEL FAUSTINUS ADHITYA CHRISLY', 'Aktif', 1.5, 2.6, 2.708, 0, NULL, '2022-09-25 00:15:12'),
('110119193', '', 'LUH RISMA WARTINI', 'Aktif', 1.524, 2.711, 2.868, 0, NULL, '2022-09-25 00:15:12'),
('110119194', '', 'MELIA INDAH SABRINA', 'Aktif', 1.833, 2.524, 2.565, 0, NULL, '2022-09-25 00:15:13'),
('110119195', '', 'RICKY GONZALI MAGO', 'Aktif', 2.848, 3.281, 3.281, 0, NULL, '2022-09-25 00:15:13'),
('110119196', '', 'WAHYU YUSROY NABILAH', 'Aktif', 1.643, 2.722, 2.835, 0, NULL, '2022-09-25 00:15:13'),
('110119197', '', 'YOSY ATHAYA YORASAKI', 'Aktif', 2.119, 2.84, 2.885, 0, NULL, '2022-09-25 00:15:13'),
('110119198', '', 'ANNINDA WIDYA NILASARI', 'Aktif', 2.396, 2.719, 2.829, 0, NULL, '2022-09-25 00:15:13'),
('110119200', '', 'FRANSISCO CANDRA GONSALEZ', 'Aktif', 2.457, 3.199, 3.199, 0, NULL, '2022-09-25 00:15:13'),
('110119201', '', 'SAKDIYAH', 'Aktif', 2.238, 2.91, 2.956, 0, NULL, '2022-09-25 00:15:13'),
('110119202', '', 'WIKA WIRIANTI', 'Aktif', 2.524, 3.168, 3.168, 0, NULL, '2022-09-25 00:15:13'),
('110119205', '', 'NI KOMANG DIAN PURNAMITA SARI', 'Aktif', 2.674, 3.004, 3.004, 0, NULL, '2022-09-25 00:15:13'),
('110119206', '', 'LUH PUTU PRA ADINDRA SAVINE EUREKA KARTIKA', 'Aktif', 2.929, 3.355, 3.355, 0, NULL, '2022-09-25 00:15:13'),
('110119207', '', 'MAYRTA AYU WANTIKA', 'Aktif', 2.571, 2.889, 2.889, 0, NULL, '2022-09-25 00:15:13'),
('110119210', '', 'GABRIEL MARETHA BUDHI WIYONO', 'Aktif', 3.69, 3.75, 3.75, 0, NULL, '2022-09-25 00:15:13'),
('110119212', '', 'VANESA WIRAMAS', 'Aktif', 3.717, 3.771, 3.771, 0, NULL, '2022-09-25 00:15:13'),
('110119213', '', 'QORY SEPTIA EKSANTI', 'Aktif', 2.587, 3.212, 3.212, 0, NULL, '2022-09-25 00:15:13'),
('110119214', '', 'SYAFITRI', 'Aktif', 2.239, 2.876, 2.921, 0, NULL, '2022-09-25 00:15:14'),
('110119215', '', 'OCTAVIANNE MARIA MALONDA', 'Aktif', 3.104, 3.443, 3.443, 0, NULL, '2022-09-25 00:15:14'),
('110119216', '', 'NUR FITRIYAH', 'Aktif', 2.957, 3.415, 3.415, 0, NULL, '2022-09-25 00:15:14'),
('110119217', '', 'SALSABIILLA OKTARIZA PUTRI', 'Aktif', 2.184, 2.459, 2.564, 0, NULL, '2022-09-25 00:15:14'),
('110119218', '', 'JINAN NISRINA', 'Aktif', 1.69, 2.617, 2.774, 0, NULL, '2022-09-25 00:15:14'),
('110119220', '', 'I NYOMAN DODI SAPUTRA', 'Aktif', 2.262, 2.675, 2.675, 0, NULL, '2022-09-25 00:15:14'),
('110119221', '', 'MADE DESMANTA GIAN PUTRA', 'Aktif', 1.975, 2.642, 2.754, 0, NULL, '2022-09-25 00:15:14'),
('110119222', '', 'I GUSTI DIMAS PRAYUDHA', 'Aktif', 1.738, 2.591, 2.654, 0, NULL, '2022-09-25 00:15:14'),
('110119223', '', 'KOMANG MENTARI MUTIARA DEWI', 'Aktif', 1.87, 2.835, 2.948, 0, NULL, '2022-09-25 00:15:14'),
('110119224', '', 'PUTU APRILYA GITAPUTRI', 'Aktif', 1.717, 2.808, 2.918, 0, NULL, '2022-09-25 00:15:14'),
('110119225', '', 'KADEK DINDA YUNITADEWI', 'Aktif', 2.5, 3.015, 3.015, 0, NULL, '2022-09-25 00:15:14'),
('110119226', '', 'ZAHRA WINE FEBRIANDINI', 'Aktif', 2.595, 2.918, 2.918, 0, NULL, '2022-09-25 00:15:14'),
('110119227', '', 'NI PUTU ARDHIANI KENCANA PUTRI', 'Aktif', 2.804, 3.262, 3.262, 0, NULL, '2022-09-25 00:15:14'),
('110119228', '', 'YUSRIL BARRU SUKMA', 'Aktif', 0.932, 2.419, 2.67, 0, NULL, '2022-09-25 00:15:14'),
('110119229', '', 'TJO ANITA SURYA JAYA', 'Aktif', 3.286, 3.607, 3.607, 0, NULL, '2022-09-25 00:15:14'),
('110119230', '', 'BERTHAE NATALIA', 'Aktif', 1.455, 2.676, 2.676, 0, NULL, '2022-09-25 00:15:15'),
('110119234', '', 'IMELDA', 'Aktif', 1.31, 2.301, 2.446, 0, NULL, '2022-09-25 00:15:15'),
('110119235', '', 'YULISTIRA TRI AMELIA', 'Aktif', 1.477, 2.508, 2.615, 0, NULL, '2022-09-25 00:15:15'),
('110119236', '', 'ANGELIA ELGRACIA', 'Aktif', 3, 3.59, 3.59, 0, NULL, '2022-09-25 00:15:15'),
('110119237', '', 'SILVIANA AINUN PRATIWI', 'Aktif', 2.738, 3.129, 3.129, 0, NULL, '2022-09-25 00:15:15'),
('110119238', '', 'AUDREY VALENTIA', 'Aktif', 3.381, 3.703, 3.703, 0, NULL, '2022-09-25 00:15:15'),
('110119239', '', 'HAPPY NUR SHAFA HIDAYAHTULLAH', 'Aktif', 1.738, 2.64, 2.75, 0, NULL, '2022-09-25 00:15:15'),
('110119240', '', 'AMALIYAH R.Z.', 'Aktif', 3.174, 3.365, 3.365, 0, NULL, '2022-09-25 00:15:15'),
('110119241', '', 'ISABELLA CHARMELITAMUIS LAMANEPA', 'Aktif', 3.238, 3.629, 3.629, 0, NULL, '2022-09-25 00:15:15'),
('110119242', '', 'LATHIFATUR RIF\'AH', 'Aktif', 2.238, 2.953, 3, 0, NULL, '2022-09-25 00:15:15'),
('110119243', '', 'LISTIANI ANGGRAENI PALANG TUKAN', 'Aktif', 2.804, 3.297, 3.297, 0, NULL, '2022-09-25 00:15:15'),
('110119245', '', 'ROI ANDI SAPUTRO', 'Aktif', 1.225, 2.198, 2.361, 0, NULL, '2022-09-25 00:15:15'),
('110119246', '', 'ANDIKA WAHYU RAMADHAN', 'Aktif', 1.023, 2.102, 2.234, 0, NULL, '2022-09-25 00:15:15'),
('110119249', '', 'MAI FITASARI', 'Aktif', 2.091, 2.404, 2.449, 0, NULL, '2022-09-25 00:15:15'),
('110119250', '', 'OKTARINA EKA PUTRI CAHYANINGSIH', 'Aktif', 2.087, 3.026, 3.026, 0, NULL, '2022-09-25 00:15:16'),
('110119251', '', 'AVINNY SAUDIA RESTY', 'Aktif', 1.786, 2.496, 2.603, 0, NULL, '2022-09-25 00:15:16'),
('110119253', '', 'LAILI MUNADA', 'Aktif', 1.325, 2.524, 2.674, 0, NULL, '2022-09-25 00:15:16'),
('110119254', '', 'VERONICA VALENSIA', 'Aktif', 3.348, 3.383, 3.383, 0, NULL, '2022-09-25 00:15:16'),
('110119255', '', 'DEWI MASHITHAH', 'Aktif', 1.705, 2.665, 2.777, 0, NULL, '2022-09-25 00:15:16'),
('110119258', '', 'FAHMI MAULANA', 'Aktif', 1.864, 2.232, 2.294, 0, NULL, '2022-09-25 00:15:16'),
('110119259', '', 'VANIA HAPSARI', 'Aktif', 1.957, 2.934, 2.98, 0, NULL, '2022-09-25 00:15:16'),
('110119260', '', 'YOUMELIA ANASTASYA', 'Aktif', 2.563, 3.071, 3.071, 0, NULL, '2022-09-25 00:15:16'),
('110119262', '', 'SATRIANI PERNANDA BILI', 'Aktif', 2.075, 2.754, 2.754, 0, NULL, '2022-09-25 00:15:16'),
('110119263', '', 'HARITS ADLINA GUNIARDI', 'Aktif', 1.275, 2.241, 2.476, 0, NULL, '2022-09-25 00:15:16'),
('110119264', '', 'CAHYANI MA\'RUFI SARNO SUBEKTI', 'Aktif', 2, 2.724, 2.768, 0, NULL, '2022-09-25 00:15:16'),
('110119265', '', 'DHEA ORINTA APRIYANI', 'Aktif', 2.477, 2.688, 2.752, 0, NULL, '2022-09-25 00:15:16'),
('110119266', '', 'NAILA SHOLATIAH', 'Aktif', 1.325, 2.148, 2.284, 0, NULL, '2022-09-25 00:15:16'),
('110119267', '', 'DWIKY ZEIN RICHO PUTRA', 'Aktif', 1.45, 2.288, 2.396, 0, NULL, '2022-09-25 00:15:16'),
('110119268', '', 'PUTU DEA ANGELITA PUTRI', 'Aktif', 3.457, 3.446, 3.446, 0, NULL, '2022-09-25 00:15:16'),
('110119269', '', 'TIARA DENTA PERTIWI', 'Aktif', 1.318, 2.512, 2.593, 0, NULL, '2022-09-25 00:15:17'),
('110119271', '', 'ALFIANA VICA GALUH PRANANDARI', 'Aktif', 3.167, 3.586, 3.586, 0, NULL, '2022-09-25 00:15:17'),
('110119273', '', 'I NYOMAN GEDE ARI KUSUMA BENDESA', 'Aktif', 1.667, 2.746, 2.86, 0, NULL, '2022-09-25 00:15:17'),
('110119274', '', 'TRI HANDAYANI', 'Aktif', 2.271, 2.992, 2.992, 0, NULL, '2022-09-25 00:15:17'),
('110119275', '', 'AMIRAH DYANDRA SYBIL', 'Aktif', 1.659, 2.332, 2.37, 0, NULL, '2022-09-25 00:15:17'),
('110119276', '', 'ADITYA SAHENDRA CHANDRA', 'Aktif', 2.262, 3.088, 3.088, 0, NULL, '2022-09-25 00:15:17'),
('110119278', '', 'SHINDY MARGARETH WIJAYA', 'Aktif', 3.348, 3.435, 3.435, 0, NULL, '2022-09-25 00:15:17'),
('110119279', '', 'MAYLIN KARLINA AYU MASRURAH', 'Aktif', 2.087, 2.823, 2.823, 0, NULL, '2022-09-25 00:15:17'),
('110119281', '', 'NI PUTU DIAH NOPITA SARI', 'Aktif', 3, 3.336, 3.336, 0, NULL, '2022-09-25 00:15:17'),
('110119282', '', 'EVA AMILIA', 'Aktif', 1.571, 2.659, 2.769, 0, NULL, '2022-09-25 00:15:17'),
('110119283', '', 'SAFITA DEA LESTARI', 'Aktif', 2.476, 2.931, 2.931, 0, NULL, '2022-09-25 00:15:17'),
('110119284', '', 'KOMANG ANGGA KRISNA SUGANDI', 'Aktif', 2.457, 3.078, 3.127, 0, NULL, '2022-09-25 00:15:17'),
('110119288', '', 'KEMALA SA\'ADAH HARDAYANTI', 'Aktif', 2.214, 2.84, 2.84, 0, NULL, '2022-09-25 00:15:17'),
('110119289', '', 'EUKARISTIA PERMATA NUSLIA', 'Aktif', 3.048, 3.309, 3.309, 0, NULL, '2022-09-25 00:15:17'),
('110119290', '', 'DINI TRI OKTAVIRA', 'Aktif', 1.81, 2.583, 2.625, 0, NULL, '2022-09-25 00:15:18'),
('110119291', '', 'KARTIKA AVE MARIA TENDEAN', 'Aktif', 1.095, 2.189, 2.322, 0, NULL, '2022-09-25 00:15:18'),
('110119292', '', 'NOVITA ANGGRAINI PUSPITA SARI', 'Aktif', 2.587, 3.288, 3.34, 0, NULL, '2022-09-25 00:15:18'),
('110119294', '', 'GABRIEL NIKOLA FERISKO WENTHE', 'Aktif', 2.452, 2.877, 2.947, 0, NULL, '2022-09-25 00:15:18'),
('110119298', '', 'DITHA OCTAVIANY PUTRI', 'Aktif', 1.783, 2.832, 2.877, 0, NULL, '2022-09-25 00:15:18'),
('110119299', '', 'AKBAR MAULANA', 'Aktif', 1.714, 2.25, 2.397, 0, NULL, '2022-09-25 00:15:18'),
('110119300', '', 'NI PUTU ANJASWARI LARAS PRAMESTI', 'Aktif', 3, 3.378, 3.378, 0, NULL, '2022-09-25 00:15:18'),
('110119302', '', 'NI PUTU NILA SULISTIA DEWI', 'Aktif', 2.13, 2.925, 2.925, 0, NULL, '2022-09-25 00:15:18'),
('110119305', '', 'DEVILLA ANGELICA', 'Aktif', 2.429, 2.935, 2.935, 0, NULL, '2022-09-25 00:15:18'),
('110119308', '', 'SITI EKA NUR AISAH', 'Aktif', 1.952, 2.671, 2.671, 0, NULL, '2022-09-25 00:15:18'),
('110119309', '', 'DWI SUCI INDRIANI', 'Aktif', 1.429, 2.272, 2.374, 0, NULL, '2022-09-25 00:15:18'),
('110119310', '', 'MUHAMAD RIZKI SOFIUDIN', 'Aktif', 2.167, 2.817, 2.934, 0, NULL, '2022-09-25 00:15:18'),
('110119311', '', 'REIDY MORRISTA', 'Aktif', 1.833, 2.521, 2.632, 0, NULL, '2022-09-25 00:15:18'),
('110119313', '', 'MAURA ALYSA LAMBANG', 'Aktif', 2.375, 3.145, 3.145, 0, NULL, '2022-09-25 00:15:18'),
('110119314', '', 'ABRAHAM AJIE HANDARU', 'Aktif', 0.45, 1.505, 1.932, 0, NULL, '2022-09-25 00:15:19'),
('110119315', '', 'ADIVA HANAKO LAVENDER', 'Aktif', 2.429, 3.137, 3.264, 0, NULL, '2022-09-25 00:15:19'),
('110119316', '', 'AMALIA THALITA YOLANDA PUTRI', 'Aktif', 1.286, 2.2, 2.41, 0, NULL, '2022-09-25 00:15:19'),
('110119317', '', 'JAYA RISTI MAULINA', 'Aktif', 2.15, 2.412, 2.474, 0, NULL, '2022-09-25 00:15:19'),
('110119318', '', 'I GUSTI AYU PUTRI MAHARANI', 'Aktif', 1.143, 1.987, 2.079, 0, NULL, '2022-09-25 00:15:19'),
('110119319', '', 'OCTAVIO CRIESTY ANGGA', 'Aktif', 1.341, 2.31, 2.449, 0, NULL, '2022-09-25 00:15:19'),
('110119321', '', 'VINKA MASSUDI SIBIDANG', 'Aktif', 2.435, 2.82, 2.865, 0, NULL, '2022-09-25 00:15:19'),
('110119322', '', 'MELIANA ONGKODJOJO', 'Aktif', 3.381, 3.477, 3.477, 0, NULL, '2022-09-25 00:15:19'),
('110119323', '', 'NUR AFIFAH', 'Aktif', 1.238, 2.551, 2.7, 0, NULL, '2022-09-25 00:15:19'),
('110119325', '', 'CHRISTIANA THEODORA RAMBU RIDJA', 'Aktif', 1.19, 2.461, 2.561, 0, NULL, '2022-09-25 00:15:19'),
('110119326', '', 'ALBERTUS TANDIPADA', 'Aktif', 0.75, 1.639, 2.107, 0, NULL, '2022-09-25 00:15:19'),
('110119327', '', 'STEFANNY WIJAYA TANIPUTRA', 'Aktif', 2.739, 3.108, 3.108, 0, NULL, '2022-09-25 00:15:19'),
('110119328', '', 'MICHAEL DAVID MARCELINO', 'Aktif', 1.225, 2.248, 2.429, 0, NULL, '2022-09-25 00:15:19'),
('110119329', '', 'NURUL A\'FI RIZQIYAH', 'Aktif', 1.067, 2.053, 2.089, 0, NULL, '2022-09-25 00:15:19'),
('110119331', '', 'JULIETTA SALWA SABELLA', 'Aktif', 2.174, 2.862, 2.906, 0, NULL, '2022-09-25 00:15:20'),
('110119332', '', 'CHYNTIA AULIA SAFIRA', 'Aktif', 2.095, 2.762, 2.876, 0, NULL, '2022-09-25 00:15:20'),
('110119333', '', 'RIBKA SHERINA', 'Aktif', 1.068, 2.321, 2.509, 0, NULL, '2022-09-25 00:15:20'),
('110119334', '', 'AHMAD HANIF FIKRIYANTO', 'Aktif', 1.595, 2.532, 2.636, 0, NULL, '2022-09-25 00:15:20'),
('110119337', '', 'PANDE MADE DWI PRANAGARI KAYUN', 'Aktif', 1.318, 2.387, 2.619, 0, NULL, '2022-09-25 00:15:20'),
('110119338', '', 'BELLA INTAN SAFITRI', 'Aktif', 1.841, 2.772, 2.816, 0, NULL, '2022-09-25 00:15:20'),
('110119339', '', 'NATALIA NUGROHO SIMANJUNTAK', 'Aktif', 2.786, 3.387, 3.387, 0, NULL, '2022-09-25 00:15:20'),
('110119340', '', 'BERTI RATNA PALUPI', 'Aktif', 1.775, 2.377, 2.479, 0, NULL, '2022-09-25 00:15:20'),
('110119341', '', 'SAVINA GITA ANANDARI', 'Aktif', 1.69, 2.545, 2.632, 0, NULL, '2022-09-25 00:15:20'),
('110119342', '', 'HANDRE WIDODO', 'Aktif', 1.857, 2.563, 2.563, 0, NULL, '2022-09-25 00:15:20'),
('110119344', '', 'AYU ROHMATUN NIKMAH', 'Aktif', 1.476, 2.289, 2.451, 0, NULL, '2022-09-25 00:15:20'),
('110119346', '', 'KRISTINA MULYANI', 'Aktif', 2.262, 2.655, 2.655, 0, NULL, '2022-09-25 00:15:20'),
('110119347', '', 'AGNES VALENCIA', 'Aktif', 0.857, 1.665, 1.9, 0, NULL, '2022-09-25 00:15:20'),
('110119348', '', 'KARTIKA SINAGA', 'Aktif', 1.75, 2.293, 2.331, 0, NULL, '2022-09-25 00:15:20'),
('110119349', '', 'CLARA MARGARETA COSTAN', 'Aktif', 2.357, 2.92, 2.92, 0, NULL, '2022-09-25 00:15:20'),
('110119350', '', 'MONICA NUROL IZZA FARDANA', 'Aktif', 1.938, 2.782, 2.893, 0, NULL, '2022-09-25 00:15:21'),
('110119351', '', 'ROZANA NUR LAILY FARIDA', 'Aktif', 1.619, 2.74, 2.851, 0, NULL, '2022-09-25 00:15:21'),
('110119352', '', 'APRILIA DHYNAR PURBORINI', 'Aktif', 1.05, 1.918, 2.01, 0, NULL, '2022-09-25 00:15:21'),
('110119353', '', 'ANGELINE THERECIANY', 'Aktif', 2.857, 3.352, 3.352, 0, NULL, '2022-09-25 00:15:21'),
('110119354', '', 'AHMAD SONI ABIMANYU', 'Aktif', 1.286, 2.328, 2.432, 0, NULL, '2022-09-25 00:15:21'),
('110119355', '', 'QORY AINAVA KRISDA', 'Aktif', 1.159, 2.269, 2.411, 0, NULL, '2022-09-25 00:15:21'),
('110119356', '', 'RAMBU KUDU ATAJAWA PAREMADJANGGA', 'Aktif', 1.409, 2.425, 2.464, 0, NULL, '2022-09-25 00:15:21'),
('110119357', '', 'BELLA FIESTA', 'Aktif', 2.452, 2.707, 2.707, 0, NULL, '2022-09-25 00:15:21'),
('110119358', '', 'DIAN NAILINDAH', 'Aktif', 2.048, 2.738, 2.782, 0, NULL, '2022-09-25 00:15:21'),
('110119359', '', 'HANA ADHYTIA', 'Aktif', 0.55, 1.822, 1.995, 0, NULL, '2022-09-25 00:15:21'),
('110119360', '', 'NANIK ANGGRAINI', 'Aktif', 2.238, 2.595, 2.595, 0, NULL, '2022-09-25 00:15:21'),
('110119361', '', 'AIWIN GIACINTA LO', 'Aktif', 3.37, 3.431, 3.431, 0, NULL, '2022-09-25 00:15:21'),
('110119362', '', 'NUR NABILA ISTIQOMAH', 'Aktif', 2.19, 2.603, 2.645, 0, NULL, '2022-09-25 00:15:21'),
('110119363', '', 'DEWI PRIMA YOGA OKTAPRASASTIKA', 'Aktif', 1.619, 2.463, 2.568, 0, NULL, '2022-09-25 00:15:21'),
('110119364', '', 'PUTU PRISCILA DEVIYANTI', 'Aktif', 3.348, 3.447, 3.447, 0, NULL, '2022-09-25 00:15:22'),
('110119365', '', 'DELIA VENIDA RAHAYU', 'Aktif', 2.717, 3.031, 3.031, 0, NULL, '2022-09-25 00:15:22'),
('110119366', '', 'SITI AZHIMA FADILLAH MUSLIMIN', 'Aktif', 1.55, 2.319, 2.423, 0, NULL, '2022-09-25 00:15:22'),
('110119368', '', 'MAIMUNAH', 'Aktif', 1.381, 2.248, 2.432, 0, NULL, '2022-09-25 00:15:22'),
('110119372', '', 'MICHELLE CHANDY PRISCILIA SUSANTIO', 'Aktif', 1.125, 1.876, 2.016, 0, NULL, '2022-09-25 00:15:22'),
('110119373', '', 'LILI PURWATI', 'Aktif', 1.587, 2.316, 2.616, 0, NULL, '2022-09-25 00:15:22'),
('110119374', '', 'DESAK PUTU WIKANIA ANJANI', 'Aktif', 1.543, 2.66, 2.766, 0, NULL, '2022-09-25 00:15:22'),
('110119376', '', 'LELY SAGITA', 'Aktif', 1.864, 2.569, 2.609, 0, NULL, '2022-09-25 00:15:22'),
('110119377', '', 'PRINCE LAUN HAIRTAHEUW', 'Aktif', 2.095, 2.595, 2.707, 0, NULL, '2022-09-25 00:15:22'),
('110119381', '', 'DZIHNI RIHADATUL\'AISY RAMADANI', 'Aktif', 2.119, 2.801, 2.801, 0, NULL, '2022-09-25 00:15:22'),
('110119382', '', 'NUR SYIFA', 'Aktif', 1.568, 2.394, 2.583, 0, NULL, '2022-09-25 00:15:22'),
('110119385', '', 'LAILUL APRELIA DWI SAFITRI', 'Aktif', 2.5, 2.947, 2.947, 0, NULL, '2022-09-25 00:15:22'),
('110119388', '', 'NAFISATUL JANNAH', 'Aktif', 2.891, 3.177, 3.177, 0, NULL, '2022-09-25 00:15:22'),
('110119389', '', 'ABDULLAH ZAINUR RAHMAN', 'Aktif', 3.452, 3.626, 3.626, 0, NULL, '2022-09-25 00:15:23'),
('110119390', '', 'ARIF MAULANA AZIS', 'Aktif', 2.891, 3.215, 3.215, 0, NULL, '2022-09-25 00:15:23'),
('110119391', '', 'FREA WIDIA AULIA', 'Aktif', 2.381, 2.77, 2.837, 0, NULL, '2022-09-25 00:15:23'),
('110119392', '', 'FITRIA RAMADHANY', 'Aktif', 2.167, 2.816, 2.885, 0, NULL, '2022-09-25 00:15:23'),
('110119393', '', 'KHUSNITA AMALIA ROSYADI', 'Aktif', 1.636, 2.524, 2.677, 0, NULL, '2022-09-25 00:15:23'),
('110119394', '', 'NI PUTU IRMA MAYANI PUTRI KARDANA', 'Aktif', 3.587, 3.719, 3.719, 0, NULL, '2022-09-25 00:15:23'),
('110119395', '', 'FEBRIA SASHANTI', 'Aktif', 2.609, 3.23, 3.23, 0, NULL, '2022-09-25 00:15:23'),
('110119397', '', 'ANGELINE SONGGO PAKAANG', 'Aktif', 2.786, 3.012, 3.012, 0, NULL, '2022-09-25 00:15:23'),
('110119398', '', 'IDA AYU NANDA ISWARI PIDADA', 'Aktif', 2.717, 3.258, 3.258, 0, NULL, '2022-09-25 00:15:23'),
('110119399', '', 'TANTRI HISTIQA', 'Aktif', 1.804, 2.801, 2.845, 0, NULL, '2022-09-25 00:15:23'),
('110119400', '', 'BELLA DEFINA', 'Aktif', 3.935, 3.874, 3.874, 0, NULL, '2022-09-25 00:15:23'),
('110119402', '', 'IUS MILLIANDRI LATUCONSINA', 'Aktif', 1.262, 2.466, 2.575, 0, NULL, '2022-09-25 00:15:23'),
('110119404', '', 'EMILIANA PUSPA WANICA', 'Aktif', 1.609, 2.762, 2.874, 0, NULL, '2022-09-25 00:15:23'),
('110119405', '', 'ANISMA FARHANY', 'Aktif', 2.548, 2.922, 2.922, 0, NULL, '2022-09-25 00:15:24'),
('110119406', '', 'RAVENA SIDA LUTHVIA', 'Aktif', 2.429, 2.895, 2.895, 0, NULL, '2022-09-25 00:15:24'),
('110119407', '', 'I KOMANG AGUS YOGA UTAMA PUTRA', 'Aktif', 2.452, 2.899, 2.899, 0, NULL, '2022-09-25 00:15:24'),
('110119408', '', 'THEA MARELDA ALLO RENDENG', 'Aktif', 1.55, 2.311, 2.412, 0, NULL, '2022-09-25 00:15:24'),
('110119410', '', 'NI LUH PUTU CATHERINA ARYA DEWI', 'Aktif', 3.261, 3.496, 3.496, 0, NULL, '2022-09-25 00:15:24'),
('110119411', '', 'TESALONIKA AGNES SUSANTO', 'Aktif', 2.833, 2.81, 2.81, 0, NULL, '2022-09-25 00:15:24'),
('110119415', '', 'ELY HABIBATUZ ZAKIYAH', 'Aktif', 2.022, 2.641, 2.726, 0, NULL, '2022-09-25 00:15:24'),
('110119416', '', 'ADIFFA AZKA MUTHIAH', 'Aktif', 2.476, 3.082, 3.082, 0, NULL, '2022-09-25 00:15:24'),
('110119417', '', 'HIDAYATUL UMAMI', 'Aktif', 2.476, 2.905, 2.905, 0, NULL, '2022-09-25 00:15:24'),
('110119418', '', 'RIKA NOVITA', 'Aktif', 1.476, 2.444, 2.635, 0, NULL, '2022-09-25 00:15:24'),
('110119421', '', 'EKA AYU TRISNAWATI', 'Aktif', 2.239, 2.694, 2.738, 0, NULL, '2022-09-25 00:15:24'),
('110119422', '', 'MASHITA SHABRI MARDIATNA', 'Aktif', 3.435, 3.695, 3.695, 0, NULL, '2022-09-25 00:15:24');
INSERT INTO `student` (`nrp`, `username`, `nama`, `status`, `ips`, `ipk`, `ipkm`, `eligible`, `upload_ks`, `uploaded_date`) VALUES
('110119423', '', 'BAGUS HERMANSYACH', 'Aktif', 2.95, 2.862, 2.862, 0, NULL, '2022-09-25 00:15:24'),
('110119424', '', 'QORI ISTI AYU CAHYANI', 'Aktif', 1.636, 2.567, 2.717, 0, NULL, '2022-09-25 00:15:24'),
('110119425', '', 'WINDA MAULINA WANTI', 'Aktif', 2.522, 2.9, 2.9, 0, NULL, '2022-09-25 00:15:25'),
('110119426', '', 'DIVA AURELLIA FADILLAH', 'Aktif', 1.395, 2.022, 2.157, 0, NULL, '2022-09-25 00:15:25'),
('110119427', '', 'HANUM FIRDA TSABITALYA', 'Aktif', 2.022, 2.804, 2.848, 0, NULL, '2022-09-25 00:15:25'),
('110119428', '', 'KARIMATUL MUNAWAROH', 'Aktif', 2.609, 2.613, 2.613, 0, NULL, '2022-09-25 00:15:25'),
('110119429', '', 'KEVIN OLIVER', 'Aktif', 2.833, 2.963, 2.963, 0, NULL, '2022-09-25 00:15:25'),
('110119432', '', 'MOCH. FIRMANSYAH', 'Aktif', 3.457, 3.609, 3.609, 0, NULL, '2022-09-25 00:15:25'),
('110119433', '', 'NAHITA FEBRINDA AMENITYA', 'Aktif', 1.273, 1.992, 2.304, 0, NULL, '2022-09-25 00:15:25'),
('110119434', '', 'NI KETUT AYUNIA ISTIARI', 'Aktif', 2.643, 3.172, 3.172, 0, NULL, '2022-09-25 00:15:25'),
('110119435', '', 'ULFIASARI', 'Aktif', 1.158, 1.763, 1.994, 0, NULL, '2022-09-25 00:15:25'),
('110119436', '', 'ALDA PRILLANDREA HARIADI PUTRI', 'Aktif', 3, 3.145, 3.145, 0, NULL, '2022-09-25 00:15:25'),
('110119437', '', 'MARGARETH A.P. SIAGIAN', 'Aktif', 2.053, 2.192, 2.273, 0, NULL, '2022-09-25 00:15:25'),
('110119438', '', 'GRACIA VERONA PENNA', 'Aktif', 0.818, 2.037, 2.199, 0, NULL, '2022-09-25 00:15:25'),
('110119439', '', 'JYESTHA VARASVASTI', 'Aktif', 2.357, 2.589, 2.589, 0, NULL, '2022-09-25 00:15:25'),
('110119440', '', 'ALFIN ALIA ENJELINA', 'Aktif', 1.475, 1.96, 2.152, 0, NULL, '2022-09-25 00:15:25'),
('110119441', '', 'FERI IRWANSYAH', 'Aktif', 3, 3.133, 3.133, 0, NULL, '2022-09-25 00:15:25'),
('110119442', '', 'RIZKA WIDYA ANANDA', 'Aktif', 3.217, 3.23, 3.23, 0, NULL, '2022-09-25 00:15:26'),
('110119444', '', 'YOANNE REBECCA MANOPPO', 'Aktif', 2.174, 2.809, 2.853, 0, NULL, '2022-09-25 00:15:26'),
('110119446', '', 'ALYA AYU LASMINI', 'Aktif', 1.891, 2.59, 2.631, 0, NULL, '2022-09-25 00:15:26'),
('110119448', '', 'DINA QURROTU AINI', 'Aktif', 2.065, 2.863, 2.909, 0, NULL, '2022-09-25 00:15:26'),
('110119449', '', 'RESTUNING ANIFA HIDAYATI', 'Aktif', 1.875, 2.584, 2.626, 0, NULL, '2022-09-25 00:15:26'),
('110119450', '', 'INGE SEPTIANI SILITONGA', 'Aktif', 3.826, 3.672, 3.672, 0, NULL, '2022-09-25 00:15:26'),
('110119451', '', 'NANDA AYU SETYAWATI', 'Aktif', 3, 3.184, 3.184, 0, NULL, '2022-09-25 00:15:26'),
('110119452', '', 'NI PUTU INDAH PRATIWI', 'Aktif', 1.55, 2.103, 2.309, 0, NULL, '2022-09-25 00:15:26'),
('110119454', '', 'JANE RIZKY RAHMADANA', 'Aktif', 0.875, 1.797, 2.122, 0, NULL, '2022-09-25 00:15:26'),
('110119455', '', 'ASTRI AYU LATIFAH', 'Aktif', 2.152, 2.467, 2.686, 0, NULL, '2022-09-25 00:15:26'),
('110119456', '', 'HANZEL SUTEJA', 'Aktif', 2.571, 3.347, 3.347, 0, NULL, '2022-09-25 00:15:26'),
('110119458', '', 'LIYA IZZATI DIANA AFIFAH', 'Aktif', 2.152, 2.68, 2.68, 0, NULL, '2022-09-25 00:15:26'),
('110119459', '', 'AISIA NURUL JASMINE', 'Aktif', 1.262, 2.058, 2.154, 0, NULL, '2022-09-25 00:15:27'),
('110119464', '', 'DEWI MASFIYAH', 'Aktif', 2.761, 3.075, 3.075, 0, NULL, '2022-09-25 00:15:27'),
('110119465', '', 'VINCENSIA AVIONICA ANGELINA', 'Aktif', 2.217, 2.754, 2.754, 0, NULL, '2022-09-25 00:15:27'),
('110119466', '', 'VIRDA WAHYU NUZULIAH', 'Aktif', 2.048, 2.736, 2.847, 0, NULL, '2022-09-25 00:15:27'),
('110119467', '', 'YURIKO LIDIA GRATIA WATUNG', 'Aktif', 1.886, 2.712, 2.866, 0, NULL, '2022-09-25 00:15:27'),
('110119468', '', 'JENNIFER RUSKIM', 'Aktif', 3.667, 3.71, 3.71, 0, NULL, '2022-09-25 00:15:27'),
('110119469', '', 'APRILIAN MUFTILANA', 'Aktif', 2.31, 2.797, 2.797, 0, NULL, '2022-09-25 00:15:27'),
('110119472', '', 'NAWALUN NISAK', 'Aktif', 1.932, 2.5, 2.5, 0, NULL, '2022-09-25 00:15:27'),
('110119474', '', 'SONIA ROSENDA APRILLIA', 'Aktif', 1.425, 1.958, 2.067, 0, NULL, '2022-09-25 00:15:27'),
('110119475', '', 'WAHYU VINOVIA DEVI', 'Aktif', 3.174, 3.215, 3.215, 0, NULL, '2022-09-25 00:15:27'),
('110119478', '', 'IMRANDA NUGRESHILLA KARTIKA PUTRI', 'Aktif', 1.905, 2.742, 2.786, 0, NULL, '2022-09-25 00:15:27'),
('110119479', '', 'MARIA CRISTIN WANDUR', 'Aktif', 2.31, 2.77, 2.77, 0, NULL, '2022-09-25 00:15:27'),
('110119480', '', 'HILERY BOLISPI BENTANG', 'Aktif', 1.455, 2.547, 2.742, 0, NULL, '2022-09-25 00:15:27'),
('110119481', '', 'ERICHA LORENSHA ANGGRAINI', 'Aktif', 1.886, 2.352, 2.552, 0, NULL, '2022-09-25 00:15:28'),
('110119482', '', 'SHAFANIA INDAH BINTAN SURYANI', 'Aktif', 0.875, 1.961, 2.146, 0, NULL, '2022-09-25 00:15:28'),
('110119483', '', 'LIDYA OKTAVIANA', 'Aktif', 1.925, 2.37, 2.547, 0, NULL, '2022-09-25 00:15:28'),
('110119484', '', 'TIARA ALFISA', 'Aktif', 1.409, 2.672, 2.831, 0, NULL, '2022-09-25 00:15:28'),
('110119485', '', 'R MUHAMMAD ALIF AKBARI', 'Aktif', 1.25, 1.981, 2.217, 0, NULL, '2022-09-25 00:15:28'),
('110119487', '', 'JOEVANKA BERLIANA PERMATASARI', 'Aktif', 2.476, 3.118, 3.118, 0, NULL, '2022-09-25 00:15:28'),
('110119488', '', 'NADIA ALWIDA PARAMESTI', 'Aktif', 2.283, 2.96, 2.96, 0, NULL, '2022-09-25 00:15:28'),
('110119489', '', 'GREACE ANANDA PUTU BUDIANA', 'Aktif', 2.152, 2.95, 2.95, 0, NULL, '2022-09-25 00:15:28'),
('110119490', '', 'NURSYAHILLAH', 'Aktif', 1.957, 3.053, 3.053, 0, NULL, '2022-09-25 00:15:28'),
('110119491', '', 'NURINDAH SARVINA EF. RAUF', 'Aktif', 1.783, 2.934, 2.98, 0, NULL, '2022-09-25 00:15:28'),
('110119492', '', 'BERTHA LADESTA MILLINIA', 'Aktif', 2.783, 3.363, 3.363, 0, NULL, '2022-09-25 00:15:28'),
('110119494', '', 'FIKI HAFIZ FEBRIARTO', 'Aktif', 1.81, 2.39, 2.5, 0, NULL, '2022-09-25 00:15:28'),
('110119495', '', 'M. RANDYKA ILHAM FIRMANSAH', 'Aktif', 1.3, 2.074, 2.203, 0, NULL, '2022-09-25 00:15:28'),
('110119496', '', 'SITI ASIYA', 'Aktif', 2.804, 3.165, 3.165, 0, NULL, '2022-09-25 00:15:29'),
('110119497', '', 'ANNISA MAHDIA WATI', 'Aktif', 2.136, 2.469, 2.508, 0, NULL, '2022-09-25 00:15:29'),
('110119498', '', 'ANISA M', 'Aktif', 3.413, 3.273, 3.273, 0, NULL, '2022-09-25 00:15:29'),
('110119499', '', 'ZAINULLLAH SYAFI\'I', 'Aktif', 1.848, 2.641, 2.748, 0, NULL, '2022-09-25 00:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `student_topik`
--

CREATE TABLE `student_topik` (
  `id` bigint(20) NOT NULL,
  `topik_id` int(11) NOT NULL,
  `student_nrp` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `judul` text DEFAULT NULL,
  `judul_created` datetime DEFAULT NULL,
  `kk_filename` text DEFAULT NULL,
  `kalab_npk_verified_judul` varchar(32) DEFAULT NULL,
  `kalab_npk_verified_judul_date` datetime DEFAULT NULL,
  `kalab_npk_rejected_judul` varchar(32) DEFAULT NULL,
  `kalab_rejected_judul_date` datetime DEFAULT NULL,
  `kalab_reason_reject_judul` text DEFAULT NULL,
  `guardian_npk_verified` varchar(30) DEFAULT NULL,
  `guardian_verified_date` datetime DEFAULT NULL,
  `guardian_reason` text DEFAULT NULL,
  `kalab_verified_date` datetime DEFAULT NULL,
  `kalab_npk_verified` varchar(30) DEFAULT NULL,
  `wd_npk_verified` varchar(30) DEFAULT NULL,
  `wd_verified_date` datetime DEFAULT NULL,
  `wd_npk_rejected` varchar(30) DEFAULT NULL,
  `wd_rejected_date` datetime DEFAULT NULL,
  `wd_reason_reject` text DEFAULT NULL,
  `wd_npk_final_verified` varchar(20) DEFAULT NULL,
  `wd_final_npk_rejected` varchar(20) DEFAULT NULL,
  `wd_final_rejected_date` datetime DEFAULT NULL,
  `wd_final_verified_date` datetime DEFAULT NULL,
  `wd_final_reason_reject` text DEFAULT NULL,
  `lecturer1_npk` varchar(30) DEFAULT NULL,
  `lecturer2_npk` varchar(30) DEFAULT NULL,
  `lecturer_created` datetime DEFAULT NULL,
  `lecturer1_validate_title` varchar(30) DEFAULT NULL,
  `lecturer1_validate_date` datetime DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_st_created` tinyint(1) DEFAULT 0,
  `st_filename` text DEFAULT NULL,
  `st_created_date` datetime DEFAULT NULL,
  `is_rejected` tinyint(1) NOT NULL DEFAULT 0,
  `st_username_created` varchar(30) DEFAULT NULL,
  `lecturer1_npk_verified` varchar(32) DEFAULT NULL,
  `lecturer1_npk_rejected` varchar(32) DEFAULT NULL,
  `lecturer1_npk_verified_date` datetime DEFAULT NULL,
  `lecturer1_rejected_date` datetime DEFAULT NULL,
  `lecturer1_reason_reject` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_topik`
--

INSERT INTO `student_topik` (`id`, `topik_id`, `student_nrp`, `created_date`, `judul`, `judul_created`, `kk_filename`, `kalab_npk_verified_judul`, `kalab_npk_verified_judul_date`, `kalab_npk_rejected_judul`, `kalab_rejected_judul_date`, `kalab_reason_reject_judul`, `guardian_npk_verified`, `guardian_verified_date`, `guardian_reason`, `kalab_verified_date`, `kalab_npk_verified`, `wd_npk_verified`, `wd_verified_date`, `wd_npk_rejected`, `wd_rejected_date`, `wd_reason_reject`, `wd_npk_final_verified`, `wd_final_npk_rejected`, `wd_final_rejected_date`, `wd_final_verified_date`, `wd_final_reason_reject`, `lecturer1_npk`, `lecturer2_npk`, `lecturer_created`, `lecturer1_validate_title`, `lecturer1_validate_date`, `is_deleted`, `is_verified`, `is_st_created`, `st_filename`, `st_created_date`, `is_rejected`, `st_username_created`, `lecturer1_npk_verified`, `lecturer1_npk_rejected`, `lecturer1_npk_verified_date`, `lecturer1_rejected_date`, `lecturer1_reason_reject`) VALUES
(1, 2, '110118199', '2022-11-30 08:25:44', 'hk hj k', '2022-11-30 09:25:01', 'kk_120221130092501.pdf', '201037', '2022-11-30 09:40:53', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-30 08:55:39', '201037', '182018', '2022-11-30 09:23:43', NULL, NULL, NULL, '182018', NULL, NULL, '2022-11-30 09:41:48', NULL, '199003', '218025', '2022-11-30 09:24:19', NULL, NULL, 0, 1, 1, 'st_120221130094247.pdf', '2022-11-30 09:42:47', 0, 'admintu', '199003', NULL, '2022-11-30 08:55:02', NULL, NULL),
(2, 4, '110119001', '2022-12-14 04:34:26', ' Investigating the Role of Gene Regulation in Tumor Progression 2', '2022-12-14 04:44:01', 'kk_220221214044401.pdf', '203007', '2022-12-14 04:44:31', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-14 04:41:14', '203007', '182018', '2022-12-14 04:41:53', NULL, NULL, NULL, '182018', NULL, NULL, '2022-12-14 04:45:09', NULL, '214032', '210006', '2022-12-14 04:42:17', NULL, NULL, 0, 1, 1, 'st_220221214044558.pdf', '2022-12-14 04:45:58', 0, 'admintu', '214032', NULL, '2022-12-14 04:40:26', NULL, NULL),
(3, 2, '110119065', '2022-12-28 06:13:38', 'Exploring the Role of Community Clinics in the Management of Chronic Diseases: A Mixed-Methods Study', '2022-12-28 07:02:44', 'kk_320221228070244.pdf', '201037', '2022-12-28 07:16:36', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 06:32:57', '201037', '182018', '2022-12-28 06:40:15', NULL, NULL, NULL, '182018', NULL, NULL, '2022-12-28 07:20:46', NULL, '211021', '215030', '2022-12-28 06:41:26', NULL, NULL, 0, 1, 1, 'st_320221228072522.pdf', '2022-12-28 07:25:22', 0, 'admintu', '211021', NULL, '2022-12-28 06:32:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_transcript`
--

CREATE TABLE `student_transcript` (
  `student_nrp` varchar(30) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `nisbi` varchar(2) NOT NULL,
  `nisbi_value` double NOT NULL COMMENT 'A = 4\r\nAB =3.5\r\nB = 3\r\nBC = 2.5\r\nC = 2\r\nD = 1\r\nE = 0\r\n',
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_transcript`
--

INSERT INTO `student_transcript` (`student_nrp`, `kode_mk`, `academic_year`, `semester`, `nisbi`, `nisbi_value`, `sks`) VALUES
('110118198', '11016008', '', '', 'C', 2, 3),
('110118199', '11011102', '', '', 'AB', 3.5, 3),
('110118199', '11011201', '', '', 'A', 4, 3),
('110118199', '11012104', '', '', 'A', 4, 3),
('110118199', '11015007', '2021', '', 'BC', 3, 3),
('110118199', '114585', '', '', 'A', 4, 3),
('110118199', '116471', '2021', '3', 'A', 4, 3),
('110119001', '11012103', '', '', 'A', 4, 3),
('110119001', '111341', '', '', 'A', 4, 3),
('110119065', '11011001', '', '', 'A', 4, 3),
('110119065', '11011201', '', '', 'A', 4, 3),
('110119065', '11012104', '', '', 'A', 4, 3),
('110119065', '116471', '', '', 'A', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `lecturer_npk` varchar(30) NOT NULL,
  `kuota` int(11) NOT NULL,
  `kalab_verified_date` datetime DEFAULT NULL,
  `kalab_npk_verified` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id`, `nama`, `judul`, `id_lab`, `lecturer_npk`, `kuota`, `kalab_verified_date`, `kalab_npk_verified`, `is_deleted`, `is_active`) VALUES
(1, 'Klinis Komunitas I', '', 4, '199003', 10, NULL, '', 0, 0),
(2, 'Klinis Komunitas II', '', 4, '199003', 15, '2022-10-31 05:21:29', '201037', 0, 1),
(3, 'Klinis Komunitas III', '', 4, '199003', 10, NULL, '', 0, 1),
(4, 'The role of gene expression in the development of drug resistance in cancer cells', '', 3, '214032', 10, '2022-12-14 04:32:03', '203007', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topik_course`
--

CREATE TABLE `topik_course` (
  `id_topik` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `minimum_mark` enum('A','AB','B','BC','C') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik_course`
--

INSERT INTO `topik_course` (`id_topik`, `course_id`, `minimum_mark`) VALUES
(1, 48, 'C'),
(2, 8, 'C'),
(2, 33, 'C'),
(3, 33, 'C'),
(3, 48, 'C'),
(4, 14, 'C'),
(4, 65, 'C'),
(22, 5, 'C'),
(24, 15, 'C'),
(25, 17, 'BC'),
(26, 4, 'AB'),
(26, 5, 'AB'),
(27, 4, 'AB'),
(27, 8, 'BC'),
(28, 5, 'AB'),
(28, 14, 'A'),
(29, 22, 'AB'),
(29, 27, 'AB'),
(30, 10, 'AB'),
(30, 12, 'A'),
(31, 8, 'B'),
(31, 47, 'B'),
(32, 5, 'AB'),
(33, 12, 'BC'),
(33, 13, 'AB'),
(34, 4, 'A'),
(34, 12, 'AB'),
(35, 3, 'B'),
(35, 5, 'AB'),
(36, 4, 'C'),
(36, 13, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `topik_periode`
--

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
(25, 4),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(30, 4),
(31, 4),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(35, 4),
(36, 2),
(36, 4),
(37, 2),
(37, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

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
('110118193', '$2y$10$kCEKaz/WUys1.6V/jfYLD.wFN44/WnY5O0NQstiIEH.XrcVn6yxeq', 'student', '2022-09-10 11:50:58'),
('110118196', '$2y$10$Vltvz50UGtqjQ.H11AyfUebyem5fjFrbJ1pNnIMNYWzNyU41Uf3xy', 'student', '2022-09-10 09:40:37'),
('110118197', '$2y$10$oIVWGOSLrcXBCtUzFvJzV.fUo/H/ZBM5NEBr0pajD2brbHJd3Mrmi', 'student', NULL),
('110118198', '$2y$10$EwDLt4XnVyiQDSGxh3aj2OmvQIhjGIs7tEuMWfksYHZIkAOpOeyFu', 'student', '2022-09-10 10:10:15'),
('110118199', '$2y$10$rn2xTTEMqxZEVYh85ffAEeQQEbdTXOBVzSFXV5gSE.wcF17jdbAC6', 'student', '2023-02-01 00:42:43'),
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
('110118419', '$2y$10$XZeX1HP8dvNcCZ7p6h2xb.IEYuym3k685SlMxLRPRmqzk7TwKElvi', 'student', '2022-10-20 21:50:49'),
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
('110119001', '$2y$10$M/8brJbu/RGALAVFRd/CB.md/O6Ur4Af8M1EYMZ2bgaPuoLFY4JSq', 'student', '2022-12-13 23:08:24'),
('110119003', '$2y$10$c4uzjs20z.VfG.FV6QT9GuqSti3A2Pw.GQPwCzNp5KDp4WgCKOr4.', 'student', NULL),
('110119004', '$2y$10$E2si1WZCPgtKsyt3WEqfy.dvWbE.7ky0niYd7RaOrej6kVgGxpb.W', 'student', '2022-07-09 18:35:51'),
('110119005', '$2y$10$xA40Ftz1GZvnwqTqyoB0jOszFMelHqdgtFol84t/48x5B5HN6KL4O', 'student', NULL),
('110119008', '$2y$10$aleDcSRQ.qdBLIed0hemxesrg0vy38OQBoYtScbqjm18f1CJDeA7a', 'student', '2022-07-09 09:39:06'),
('110119010', '$2y$10$0qaTBl8vNT6z03qLw1nMbeFHfAO7c2dM.KEch6IH4o.vTHzDaRENe', 'student', NULL),
('110119011', '$2y$10$WHrlAyjHKkDcXKIQ6GlZ1urnjLPdiCAfjLBes00mqTWxr0z0iZmxu', 'student', NULL),
('110119013', '$2y$10$GlpQ/iHieLS6AkvGqLU1/.E/CoRI2NF1W83cUO.a3QSclTirA9FTi', 'student', NULL),
('110119014', '$2y$10$xgebQi2AbpfSpUFjGO51cetfXaxvhk41UR/RKhJyFd4j/9HS13wPG', 'student', NULL),
('110119015', '$2y$10$k75dJeqy4mPseg.RFElxaeziCin0uWaz.LH4ei/2irq8VXIVBTYce', 'student', NULL),
('110119016', '$2y$10$7r0iNxkHVvlo4yOcQHmtBOqIQnw5e7We3Ungh1WZhdD8DaNKavBt6', 'student', NULL),
('110119017', '$2y$10$BosHemXsCw2eCGkCgXRPiOF/w4QSqLLdlpi9HcUunmKGBDJYtt3Y6', 'student', NULL),
('110119019', '$2y$10$IvTR3d30XUMo3FK1bjo3/eGlpz8xJnQlxn5k.srhmNUcf9KCFQK8y', 'student', NULL),
('110119020', '$2y$10$pZxeL6yCzhTJjJASIfb/feNyq6BOm13MQRSKP0KEUGJZrS3OzaHFe', 'student', NULL),
('110119022', '$2y$10$x24zGjdqOw7u8dkW8PoYrO7pYYu4LwjdG7gHhGf/NtcsWR6VUWtQu', 'student', NULL),
('110119023', '$2y$10$tHo4O2/.hwpOyetHK3gI8ud0ebernGsUblF7WAaOkAfvxdaJfnffS', 'student', NULL),
('110119024', '$2y$10$kYB1j9ov5CiJNjTWWxPDO.a75JDsAjtGroGIa/Dwka5jXGtQ5xLz.', 'student', NULL),
('110119025', '$2y$10$JQiTMo1fhRDahn9K5jhfPu53j.feoDV8o6eCAKzcHtU8bgnBJbTlS', 'student', NULL),
('110119026', '$2y$10$kpWQuF3zVy0zBKd78khZNOY7gHavr6EKBq2Jnebll.7nI9IcCCGey', 'student', NULL),
('110119027', '$2y$10$GQ5YVIOO0Li.H.SKXHb9luv9MZTLZFSAC4GrVLP6WddwoT1lvtwBS', 'student', NULL),
('110119028', '$2y$10$9lEy.UNBc9WwvCoNYWtfu.Vzvv0Ujx5zvfA5Zg8pQ430g7NVrcQoy', 'student', NULL),
('110119031', '$2y$10$mVBIpC/v/T03UQ5Aygx4ouarQFtZTxuXfA2NjN3Cvzp3/7X9aAMF.', 'student', NULL),
('110119032', '$2y$10$0jj40/5qvFSFhQhbLebEYODsWqK54tzLNWd9OYaH5Z5u1iGs6ONsu', 'student', NULL),
('110119034', '$2y$10$4eSw3qrl.pnuFcsUehjQOOsfnDu1LzftJogvZhWWYkrwGxlh2O0ya', 'student', NULL),
('110119037', '$2y$10$iSjDnZYtLrgJ2qBLIFXul.wJzD5n8hyK4vxR.29ybdsvrpm8ltJr.', 'student', NULL),
('110119038', '$2y$10$8OdVpj3xKSCJpOVUpf6BFuuwwzNmlik1bU/cVLBLu0pr6FwLg.XP.', 'student', NULL),
('110119040', '$2y$10$HSWnmrUxZGqQjxJECaNuNOnmssMPaAsO9VLWhwm.0uGtyQkOljjg6', 'student', NULL),
('110119041', '$2y$10$SBsYpGdtZiH.NmTQc.xL8ORmNaBZQCj4pF2MqQOwwfNQ7qJeiDV5.', 'student', NULL),
('110119042', '$2y$10$FF8xRwzHD4i.QL.l/Dk8seC.yOW6OoOPFPTzeMbJIzEnsS4mpwpXG', 'student', NULL),
('110119044', '$2y$10$Sxsmx/.pB7wZhgUaVgEMHOlUsvMb/e5SRCiEtbbCjxbJMYHBVMxne', 'student', NULL),
('110119045', '$2y$10$rG6rjOwkt4cpzUGnikG.H.HWyBnj75HiuFdwvgpDWf5gQqjDS3fWm', 'student', NULL),
('110119046', '$2y$10$tRm2xq9Uaneqz/6PH79SSeCxj7anvSa1.xJfWQM3UBYJITAn2VJgy', 'student', NULL),
('110119047', '$2y$10$B8L66mudptiYxLPgFCQ8HelAjZdvz8Z5eqZGziTkNgWbhCLZ/Ic6q', 'student', NULL),
('110119049', '$2y$10$9lmichURHSYphxcthLKnAeJ.sRWR4f7u3tEGV3213knurIE.ZVi3e', 'student', NULL),
('110119050', '$2y$10$IdhdQ2yn9VJg0d8zFbx2PuZM.IIP4fw4NqLfhIcYq9s5q16MCsseS', 'student', NULL),
('110119051', '$2y$10$3oRaNEeTef5urR7BZeyB.eqEBSb8QrSKgI/dJmjN11NNGA5YYe9Vq', 'student', NULL),
('110119052', '$2y$10$vQN1MqlLvDe45wiEyFetxOuTpsPPiyttSn3Gi4y49VO2oHsDjK01G', 'student', NULL),
('110119053', '$2y$10$WECgjTfgdf/E8EdADhd1KOQY8GYMtTLtD39KTVEcN8UG998LcFDYe', 'student', NULL),
('110119054', '$2y$10$zYDWk//qSZU9OL7VVxtk.uWEPHHOVSVyjohrwsycomhDTdRAIW1xe', 'student', NULL),
('110119056', '$2y$10$KYXDBDYJH/qROrbh6.WW5ej5u0r.aux/uWSWMhYPCuzN0v2nrHtry', 'student', NULL),
('110119057', '$2y$10$f0aN0Tad8Cop8TGAfjxb1u0OtKNRrrQBBc2cOSWJBfL7187MpSfzO', 'student', NULL),
('110119059', '$2y$10$KmdagZSowJ0EK.DrSR87TOzQvhdjFHxs7Cf0SISmlPXnsv/lDMZpG', 'student', NULL),
('110119060', '$2y$10$VCwfvTVuiRkLofZ6bwqx.eBzBkdi3DQfeZCGwp0E7.JkH7V6Vlq8a', 'student', NULL),
('110119061', '$2y$10$gZM/9fjuMZvIYISFmjylP.iiow0k781haKtSm93XvjA/2iQWgzgPO', 'student', NULL),
('110119062', '$2y$10$xYGEkQg.KYI5LkLuAM3qMOql8arNOBtfY9Cj3PDCYq2Nhh42hcDHG', 'student', NULL),
('110119063', '$2y$10$qVHD065eb5nOwqHWDCGEYuP0X4Fov6iOurJzV54SnVHr2tlm03I3.', 'student', NULL),
('110119064', '$2y$10$M82DtsdHOc0HnYio2lQJIegG.IQLGhsReYYvMxc5X9M7SFjdm5d1a', 'student', NULL),
('110119065', '$2y$10$QiUrT7Ay2U8YgjfwdVZ4NOiODlg8YlcEzDmgQPdGXWT95R16JcXbu', 'student', '2022-12-29 02:09:20'),
('110119066', '$2y$10$9urqYfd5VL.rKuEJT1LFveEEFGOKxC0fw9Jy3t./N7YJm4wapIdw.', 'student', NULL),
('110119067', '$2y$10$7uRryytwgMCx9Ku4NSYU7.hKKpPtl0G4SyfZH3KSKzf54.EZyFND2', 'student', NULL),
('110119068', '$2y$10$GgDDDWUPbi8iJfhcmt7Q7erBjrl.eI.BzcH8XgeMbHEC/IFR2wpWO', 'student', NULL),
('110119069', '$2y$10$PpIZp9q5jp/EqcUX2PX2revHauNsSA30oEn2Jkzkl4Qyl.S7UBOSi', 'student', NULL),
('110119070', '$2y$10$Q0in3Nn0OCefgf9KE7PvvePxjWz7WdVO5XfXU4kHYDnGW/wYzC.e2', 'student', NULL),
('110119072', '$2y$10$NpvFIE4iR9ofo4/BxJdfC.y.k3zz0fZOYn0BNTGWtyDGfOMS9BOwm', 'student', NULL),
('110119074', '$2y$10$mYh.GVfTU1yqOZmc1MB00eNENfwf9W2eEQbUXrbRZyj4GcCQ8KBZK', 'student', NULL),
('110119075', '$2y$10$E5f4DAlx686Rw/VXcTBiLeJFWs.F2KMVinMq6DEks2i2XUnD4b5ga', 'student', NULL),
('110119078', '$2y$10$ENQujGrpplshGWAY0puM/ucaBK0d/n40kgJ1ZZ2pQUp63W9LgNrQ.', 'student', NULL),
('110119081', '$2y$10$ulhwDnuV39ELY90/boPEN.ktuSDh6Ymn./.DvnfHnC7F4AFzYxfpy', 'student', NULL),
('110119082', '$2y$10$2TlkXwwQfVSvl6RVo1F0EuYKfxF/EHcTDIcJOalffTo94Pl4wF0kW', 'student', NULL),
('110119083', '$2y$10$8//QuyXXTr26hTZ6f8hEze7vnGVFhE.T3ElyN/EBTgFSYpWcMDb8q', 'student', NULL),
('110119084', '$2y$10$fPgMpS92UYLHn2OcHjdF7ePSMf48AVcGAmyD7WYts526Fv2hWYLye', 'student', NULL),
('110119085', '$2y$10$eDeYmi/70PKzX7pHYEFViuNEJrxi6n3AOnZY.lXK0O.SjbMs31tXe', 'student', NULL),
('110119086', '$2y$10$3NGCQaJDtH43TM8iiykqbefNYpTJ1cji.dxHscQqsaYPsLXk0P/va', 'student', NULL),
('110119088', '$2y$10$a46KK7pOvut73kOWnl6dt.5y1WFeIdZliECy58HC7iPx6TcAEOQVy', 'student', NULL),
('110119089', '$2y$10$cPE1O6M4BHtl6j2PY.wej.yZmjd8wP/0/58Ollz/qpRN.ZriXFtRW', 'student', NULL),
('110119090', '$2y$10$QyMcOONUWGGo7L91jj3c4OiDylV0O23IcoJb1wkTmyBWyCSpZCuju', 'student', NULL),
('110119092', '$2y$10$c22XjaMHmiBiYEMl1bqJ6e2MYawtSTp5VEvaeoTA8ffQ9W/WTGYHK', 'student', NULL),
('110119097', '$2y$10$WS0o2r9WC4aEWZhdddLKTO59eaNCU0nIk2bBo6JqDgj087Y.L7q6m', 'student', NULL),
('110119098', '$2y$10$K/xi1Lk4mX7lwK4ftlMMk.DFl81Rv1NXrcOSxyPBGLfbuTzgZlZAS', 'student', NULL),
('110119099', '$2y$10$sGVJ40L9FOc25xZ5JXnuxOPCVWArE.wrrcCkQS9/TEL25.RzjwZCW', 'student', NULL),
('110119101', '$2y$10$w/RCgNqfxLxznTXM5xYAwemiYiuq7.FUzZrjPikVVwKKhRQuz24/q', 'student', NULL),
('110119103', '$2y$10$bP4yqvBEDdXwEjdakIQXjOjlbShLU0JWbiKeDcjAfzG/0yn8luS/O', 'student', NULL),
('110119104', '$2y$10$cGilyvgSUZB1K1nOsdPRguDCHPsAwMrXOvFAZLjfM/NgjJvvm.p4a', 'student', NULL),
('110119105', '$2y$10$OP5B01I8ORgPQPqcjrr.RO70CMxqaYChW3SZkM.SZOqGC/Cag5ArW', 'student', NULL),
('110119106', '$2y$10$DTYZHPvdY7UqFWsOXFE/GOKNOjVFaXaGBTCcbZXkLLrK9tHd0dEQi', 'student', NULL),
('110119108', '$2y$10$O038O.UOswSDl3ZqaOpXqeZZrxX.ZeywWg734Xxh6v8TZA/6vB2tO', 'student', NULL),
('110119109', '$2y$10$2OS.XodDMIt2kjnYRpHOfuJ8yDWbcELrLtV.DVuwgBlXD7nvKOa6y', 'student', NULL),
('110119110', '$2y$10$Wj2WPn39hXFCgudGa3oQfeTKcbFhrbtSMN99IrQAZZ7VNFI0Hqboq', 'student', NULL),
('110119111', '$2y$10$yuGcaf5wBejGqx5r4ySpzOF0t6Lb9BDzpkIrQmVXARXwp2DKdpUj.', 'student', NULL),
('110119113', '$2y$10$EKeg2RE.yPdOHMiwxqI4RuqTZkMRUYIr24e68Fw.1m9erFDPi9Li2', 'student', NULL),
('110119114', '$2y$10$Fnqfr13SOstSUIdAFB0UAeVB4A.xpvY.KqFI1ze8QmkRmTdRKbYy2', 'student', NULL),
('110119115', '$2y$10$AFZHPPVDHAAc99/v41kBxuZFPxKOETVib9Wm3CLZ1BFDZzO/LEIe6', 'student', NULL),
('110119116', '$2y$10$usBTPWJ9aRTiJkzALg.ZYu7wes.qAMjhMj86kafgmkIsGHb4GRGdC', 'student', NULL),
('110119119', '$2y$10$Ag/Pz2J0G2I.qeviRR70gOSOT/GnhgrSqP92gZeLoAfubuleYsAMK', 'student', NULL),
('110119121', '$2y$10$1Dri1rSb2zwhw5Wv39CdHOvs1vj8eBDcHrZKlq3WoxmclIh5psqCO', 'student', NULL),
('110119122', '$2y$10$Bb2u5X7RryNZfmY2jm36/OV2tR0IlKBsDwF0tjXjx0NYMmnMqhtYq', 'student', NULL),
('110119123', '$2y$10$Ap1DNfigpc1oAz5z/Oqxqevm4RmNAwbPi3.ZeLd52lWdGJ4ZIRUim', 'student', NULL),
('110119127', '$2y$10$o61BnT9iirn6PB.d3sWYB.9bpzBaorDCbDuWCScIExlqDHuQZxYhK', 'student', NULL),
('110119131', '$2y$10$vPuZfnfcn9nZXrtcLFPP/OemWBhxWHKPlRHeZqnoW3MeYjvQVmXtC', 'student', NULL),
('110119132', '$2y$10$j4.ZMTZVuA0G84n.o.PIpOEI4m2EIReCzOXErcOjXz2mpI/YNbJjq', 'student', NULL),
('110119134', '$2y$10$w8q6CABHQN6Dx6PUr6iNruQW6tO6.WKfWzsASsAV0OlZGNiDeaJ72', 'student', NULL),
('110119136', '$2y$10$XsrmHCQ7CVa8ouFYVJcBmO.Y/gBThZi8kuPkOylsppsSrSuxpEmwO', 'student', NULL),
('110119137', '$2y$10$R7HdcOjPY8lop2yePXHfuOPqU6pFucqkV9D2h7tpNV3lWqJe9TmvW', 'student', NULL),
('110119139', '$2y$10$aQOUnvm2rDwtKZDINKb5IO8azxHUpJwY/UQHPyXFma3js18ohUzE6', 'student', NULL),
('110119140', '$2y$10$BVbF76v7VaJqFUVBNo3ksuCgw5G6rsGO8R2FhQWNBJr8fufZAb.nq', 'student', NULL),
('110119143', '$2y$10$PUrG4xcbQXuzHthCUAdOHOpJ7cu/2RDtt9vDAkne1hhYdeBP0fd4S', 'student', NULL),
('110119144', '$2y$10$wsgQPUbz.cz4FLVwP94HaOEBEkXA9vq2BfUArQat4JAmnSprkyy8y', 'student', NULL),
('110119146', '$2y$10$/vwt8vM3/F7w53y8Fza6D.w2gsW/rChu9VmPdYaFH3e/cy2SjA3LC', 'student', NULL),
('110119147', '$2y$10$lyhWh/OnkToi4Q2JYFldcuij2pYJJkcEX2RqE6B0wH2Io8YJrgw7m', 'student', NULL),
('110119148', '$2y$10$P0RDl0g5ZN5cPy7SBUA7qeU5zJvLjUWUVUNxILDH7H/HoOo/kIZHm', 'student', NULL),
('110119149', '$2y$10$c22vXAGuMYb20Hc0r6.XPeh1prhicUhD/6ocgJc3LGNtCqwNDmh7y', 'student', NULL),
('110119152', '$2y$10$HHLhDJ7Zgp5lUTFV2pCOk.qey89HWLjGdthy5LWgjFFm05g6kNvGe', 'student', NULL),
('110119154', '$2y$10$S2xrhxcqFjegBJGEdQH9QuVwVm3JUkEfKgX2HrPwHZMpbXgzkYpKi', 'student', NULL),
('110119155', '$2y$10$kB69u3a8yvIyGW9E2JBQhOoWp4QSKfsYLY18Bskidw/SBC9D/QhmC', 'student', NULL),
('110119156', '$2y$10$jcL.MnLDiNA4ylz1HEkT5OGYivbDxoBNBVmb2VNIS/w8ubWesuH5q', 'student', NULL),
('110119158', '$2y$10$3Ee6b0kSGp17Z0sJYGRG2ONQ/rynGI1zF/B8hnO6SGTHAGMZkB/uO', 'student', NULL),
('110119160', '$2y$10$3.vqQNHG4Lfz7J142Nr8P.bzk5hQJVPyAIT1m66nhlHHSEDkcdKuW', 'student', NULL),
('110119161', '$2y$10$YNHj1VsIxz5y7QT5a1LtOer6J6mJtvkAzkU3ESn74m2CPvtOj2rnC', 'student', NULL),
('110119163', '$2y$10$94qEcPXD24mR4diCGnBL2.bSK43ddWuFg7WYfGgvFz2yIN8AQa..O', 'student', NULL),
('110119166', '$2y$10$Ft9FgMt/1jjgz73rYVkxA.MoXfP.OMWc/OxbjUtGB1bQh2Qys2Vb.', 'student', NULL),
('110119168', '$2y$10$XEmwQNHd8Dne6k69f5KmcOWU9SUWbr4bHj8qBB8iFF7TG8Gqfd48u', 'student', NULL),
('110119169', '$2y$10$jp3SLoaXciPZYQCwzlumouuo4OUGblKV5t9kgdjENUe.TRn3dzWCC', 'student', NULL),
('110119170', '$2y$10$qFR52ULy3qTRA/KTS20TJ.sGn1TldvTFKJuCPfKBdPXSybwzzLzqe', 'student', NULL),
('110119171', '$2y$10$vVCGNm.lxvo6KSK9Agu8fOBC1BCg.l0rsNcoHRBHgQO6v6932FB0u', 'student', NULL),
('110119172', '$2y$10$CHwmScw2kseiSXrfWl86VepfCpvq951d3qYueGXRrszlF9rpMrVa.', 'student', NULL),
('110119174', '$2y$10$NCJPUZaKSRa.6.keeCJXPueo9oKBIKYfUckwPdCQRcME1z9jPWMre', 'student', NULL),
('110119175', '$2y$10$m6Ux6jKoKPZfFfIbt1dr1u7k3./yC8RWNE8lofBZzf/6T4o0AgiES', 'student', NULL),
('110119177', '$2y$10$baHx5SwJd2FDLzwSndACVO2Bpw4D.XKEa9Qp1g/cLAROZ9D0tNp9u', 'student', NULL),
('110119178', '$2y$10$274yrtVEITq4FaAeBiKc0ulgOXssDNIF6iPxIOPK9PidZBF5Lib2.', 'student', NULL),
('110119180', '$2y$10$v5Kt8FYDA60ohy/qbUPR9..YpiNEXWKD.C3n3T18UoS4.OhfdOBVC', 'student', NULL),
('110119181', '$2y$10$XiZhFLIMBDVoNgxiFQ8h3OKYxrNNj5ouAFGNXULMYCqFOGXi/NRcq', 'student', NULL),
('110119182', '$2y$10$Wrq8aMo9bU3ZTxKRq7ZK1uMupXRSthx/as0IP7/RI3gi5dtC8DMsa', 'student', NULL),
('110119183', '$2y$10$vnfKFMakAMtXvIsALVePpOveNARRNGUXYQ3ewPrMt855UMOvbtn8S', 'student', NULL),
('110119186', '$2y$10$AH203Il90htx/Gvq6BszpeD9fvZBRM7gFgFZaKNopWEhQdZUmma9i', 'student', NULL),
('110119187', '$2y$10$OBmWoL6CvqwJa4mRXyNC6OLxqcWKXXXIZkd/s8wkFEEvevUlYArzy', 'student', NULL),
('110119188', '$2y$10$qyENrYJ86XhP0yXXZqoTaeQsLVP90kKmcV1Tli7rvSbUxw2BmqHVS', 'student', NULL),
('110119189', '$2y$10$ETp.Y3KYFzqmYu34yhNgp.XxqK9ihPBY9O7PoQtePYhIchiALR1rO', 'student', NULL),
('110119191', '$2y$10$DKe8pDtIz0EDEy9yMRv1eexD85gJQXrraUPJi0PJL6v1jr.qkSuS2', 'student', NULL),
('110119193', '$2y$10$lLPubk9AMN5DRdc.nWpARue44R6Ee0H1mm.SVlDNc7i6B7Y18k9ZK', 'student', NULL),
('110119194', '$2y$10$hXAWkYjvDlPLfJCUkrGG7eK2eC1OKp5mUrY.GeS/rfK.rQOrN5sfi', 'student', NULL),
('110119195', '$2y$10$tsH85GFKwF8x67ui.aLESeZCU/mvSeIEDuNKnGqrtep8q3mJzrQOW', 'student', NULL),
('110119196', '$2y$10$P.SlCWG1CPp/bXpsQV3mS.i9YJG.ayRdkKQUk/EVOnGOBZR6h/g7m', 'student', NULL),
('110119197', '$2y$10$IH7oHEc/eBf.78gWeFiu1.tV2T1T99OrUvUBxFhXadXLM7/1T467m', 'student', NULL),
('110119198', '$2y$10$ANYY36XYkA1xPVmt/0Y7gOSsoteESZsGq7mqf35BqXXlDlF9JoSQW', 'student', NULL),
('110119200', '$2y$10$09WcgLyPYHqc6u88wXc3w.dM8JeUqSaTfa34UM8xhZarvJAGXC/k.', 'student', NULL),
('110119201', '$2y$10$tb4tWOQLQWIul8rscP5azeOAY2UntVPQCAi6.xDeWjBANBhFpmSgO', 'student', NULL),
('110119202', '$2y$10$mQUbdADUb1JlNtWr.gJ.Su9mpWP2TOZhjFgEI2LxLh4R7qjbYn7hO', 'student', NULL),
('110119205', '$2y$10$XNMnKWejyUJ2uPxSRYILT.ivVNPux3TerN0cpdJCR7nMlXWZ20oVy', 'student', NULL),
('110119206', '$2y$10$fjuyvTH0nZEsxGziF8LwleruxEvDqsZPgasCkO8ziyRbJkSjFBT6O', 'student', NULL),
('110119207', '$2y$10$nL.yMG2WvofutqIrjMwCgegAsCuniQIiU7XRkyuJacRLHlvHhsQpm', 'student', NULL),
('110119210', '$2y$10$95vum64Xy0AMyH7Ya0B/sO.DvbtRoqIsM3sQTv8lFHPFvGiPSFDbO', 'student', NULL),
('110119212', '$2y$10$S.nkhEs5pr2RVnLCgdCHeOCT10UyjURaqIiy7/FF2Ja2OnMB9HOiy', 'student', NULL),
('110119213', '$2y$10$lpiWS1y8LtvCbo6mjh8RHeQSP7PjBeajewMpqjj3p7RM1Elj3.f8S', 'student', NULL),
('110119214', '$2y$10$8Ksi.5Yt6exOV8HWnBTchuXm8Z7x4Hq/Az50V6Blyp.yG/cvaCpyy', 'student', NULL),
('110119215', '$2y$10$fQRRh5Yw.cBXd5UAS9CmveoHeYgkHKN6UD0DCyP8vEBqQ2KQyQjia', 'student', NULL),
('110119216', '$2y$10$QgrCb0c9zR6ktncdIG3vsu6Hb9Iyz/CSqX/g/JK6pjU.xCRNTic/u', 'student', NULL),
('110119217', '$2y$10$kdL/NP3ES8dENYpOqTmmKuVKW3NUo9WJ331ONcKKfRJILb8TWf/o.', 'student', NULL),
('110119218', '$2y$10$jmk9yhQ.1oh6dq.QOJ3d3ORSdg2fa0vAwl0HwBW.bXZ7R3PUoa7ay', 'student', NULL),
('110119220', '$2y$10$1ga0oMYiaPFJ/vvhkchwyuYjV3u8sy9joSQ5XjPKgjv0brmtF65H.', 'student', NULL),
('110119221', '$2y$10$UgRZqFZwUzCQ1gy6PIFy1upDshZzHR3KkhM25bnrUNYv428mw.6He', 'student', NULL),
('110119222', '$2y$10$BNHkaeNxREUepG3k8gj58uiQsAudIQuq2.H24jpFHq.JckApS7EgC', 'student', NULL),
('110119223', '$2y$10$1B.OscY1OfG0G3FmuOo.HOyUWVVtD21cwggTOJVnByu4OqpTJn6JC', 'student', NULL),
('110119224', '$2y$10$lFiuyx/xgHmqhvioUM6dMu37dVYwkWxL7mfCMkjFZWbpgJCZmmeoC', 'student', NULL),
('110119225', '$2y$10$fGC9VMUAOW0ecoUKKPMD2uhvx/6hS7k3UEUlhfKhpyWHdz0QERI3W', 'student', NULL),
('110119226', '$2y$10$GHLIWSNzygOuy1XaY/PIR.I/Ugh7tkz3sLVkKM6yaTdJpQvN3hN0q', 'student', NULL),
('110119227', '$2y$10$m9IZyaTmTZhbkBDKGrsi3u1ut/GgBW2hPmXub.3mMCsMEKh/12H/e', 'student', NULL),
('110119228', '$2y$10$9AqlbJJ192m69ysZ5ce4luLqEfdwWi6m2qXz6oXUfFCZF1s4D3qP2', 'student', NULL),
('110119229', '$2y$10$Aotre57tB0hbpOAv5e7.eugVuQes0VH6LQrVWyYEdz1B3IsLf/KRG', 'student', NULL),
('110119230', '$2y$10$WaO/u4PFYxZ4zedbLl8Jf.R9VYxTzIy4AZrjrutSeniqOXV6gJKjq', 'student', NULL),
('110119234', '$2y$10$Npg99tPMrBDhyiag0xRQg.OvV6ImS9q93VbaRIvejEaVN5k0MEHr6', 'student', NULL),
('110119235', '$2y$10$RdZpdxApVfVurQGdNu0RHedI5SgvBiw0ffmLMlkDjJArLH68e18b6', 'student', NULL),
('110119236', '$2y$10$oR98AbTmtYp6.AXJd1UbJeYYdcLNsK5G5bi2nF79vbRh8oKJ7adrK', 'student', NULL),
('110119237', '$2y$10$wmpgeNQzsrbDxMVAOYfyV.MoG0Hj1Hl2dl3IzJszHaCXAvRi2DOiS', 'student', NULL),
('110119238', '$2y$10$1Jlz9j9iYGvpz0UMAQ2xs.2vr9dEdJI83hPhaxCaQMwMKfEl3G4XG', 'student', NULL),
('110119239', '$2y$10$j0MjLeX5h0tOq7c9LsPYhekwvQl50Y9VUR9YvHRjS.djev2cvk9fK', 'student', NULL),
('110119240', '$2y$10$.SuimWQrYjEKizuUfAyIKOnzahXu.O1ngXulieW1Il9HJSTtTsdF.', 'student', NULL),
('110119241', '$2y$10$sh/Z27uLCRJKDzRMFNpAPOPPc7VkWaR6qgh08W16qQfZwTMTEnZ1y', 'student', NULL),
('110119242', '$2y$10$446aHJUEqcao7aKW6ZhZs.neYzXBpUENbCB/IMsquptPpn96Qs1FG', 'student', NULL),
('110119243', '$2y$10$NzVL5HkccM8aV9gany/78.OY9w9tbObpO2W994r87TwNO7RlzTU0O', 'student', NULL),
('110119245', '$2y$10$vQdgkpUrRJuBP8N/HzcVDugucJiOU7p6P.2430qxHooXf/uHgvXqu', 'student', NULL),
('110119246', '$2y$10$H0P1XaAIj/oOt3kTMvtBJu3LYKAxOtIkEjZFlgK2SaDhD4VdBW6S6', 'student', NULL),
('110119249', '$2y$10$1/auD8.x.uByBHIAGKuCC.4JD1yb8kMUXYixxNPWi3pCo9K.U1mny', 'student', NULL),
('110119250', '$2y$10$dfBYeIhbGiBmeZXa1lBLTuFVaWclCFZTaDidRgcq7sAZ1KePM1FI2', 'student', NULL),
('110119251', '$2y$10$njp1uoO49PABpoqxxf3c5.jG3IW.mrD.QjiHM6Q1O2UuddJ17Yj6K', 'student', NULL),
('110119253', '$2y$10$E9XIgiq6A0fjUwkAtkNSJud3Ge0Ja/rqkJZ6G3k35pC2QFr9fHF.6', 'student', NULL),
('110119254', '$2y$10$Q2rseZeCOwAhFowoISLnoeFRSfViCtCQpxKSPqVtVtH9n5srxIZsC', 'student', NULL),
('110119255', '$2y$10$nVfwxkyZxNuDz1ilFjAuD.nLihruaXJwZAsL/ZMX1yZr7NldmFepC', 'student', NULL),
('110119258', '$2y$10$fNgOzuG5AYvKHgOOoRCrmex07cnMcG5/LjiI857SKHpPlUL/Vwnsq', 'student', NULL),
('110119259', '$2y$10$Q02lO1gZhXLRw6d/VZEr0efWbNTY03A1V8SBuKVRYZYSrnHzbdD6O', 'student', NULL),
('110119260', '$2y$10$So0BgxDK0hQnWsrhWP8ZfuSGfK80ls9gR2qhkh.DZSDLDvSXAA43y', 'student', NULL),
('110119262', '$2y$10$uEXGY6OclMACAgUpTiJgqOZpCPo9AEYRNF/yYUvBJWUYGvgOCeGiy', 'student', NULL),
('110119263', '$2y$10$EmNNtr0Gcfg94ItAToRWzOz/MMX2GMk9u2O89nmU6yrsoLNkw1Ph2', 'student', NULL),
('110119264', '$2y$10$IBTpsV02qxzfGLKObu3b5O3/SjkaEcPv5RSfkf0Ku6CRx9TrK5kgy', 'student', NULL),
('110119265', '$2y$10$JiLZL7cinKNXiXnJnPAZD.GsjZqiRF3x6AIgrsFNkTp4WE1.DXBfC', 'student', NULL),
('110119266', '$2y$10$r/HbAAYP5aQ10IV7CYktwOQrUt46smC8mCquKL/ooAWdBcj2qjJT6', 'student', NULL),
('110119267', '$2y$10$fFkbevzM9u7v.bkJMCm2xu9b/avOqK2oM9e3g.LRHjQ5mBZfcUF4i', 'student', NULL),
('110119268', '$2y$10$zRR03RQTK3G9YZSs1Md7veP5osXMCZZwg3mar95GUUTtOQLy7llOW', 'student', NULL),
('110119269', '$2y$10$DN4gXDZnpoCBF662nE0SqekzXTEZtnCErriHunC/JgyP/SGVdpAb6', 'student', NULL),
('110119271', '$2y$10$Oo5Pdq6HQM7hDEfsIzxn8uUeYSz1oKUW9HfftDF.HfNb0FCAwF5CO', 'student', NULL),
('110119273', '$2y$10$6n7.rMkcTlHSRgs0pFDBjOPKwH2CGOeTAtBD6syZe8UPt9tutdqSK', 'student', NULL),
('110119274', '$2y$10$8O3mXgmsQAx1LiALnXysFu.yrLMjTeqnwpxY6wBj57p4PqmTfc3Gu', 'student', NULL),
('110119275', '$2y$10$DP9RZ4WnSkhB8FVFkWWS2ui4FhqLhpKfcQwkKdFF74ZG/whe3rE2e', 'student', NULL),
('110119276', '$2y$10$GdiaM73jPdLTOzeCZtwAteRHdnX/7gzHXQcQZ59nfrbKSKWO3M1xK', 'student', NULL),
('110119278', '$2y$10$faUtZU0q8gNSLKiNgkg5/.Q17ZacUl7KVaSRlQshzA6KhOlgHQI.y', 'student', NULL),
('110119279', '$2y$10$4zL4.Ywx/puqm60UJ.uDv.u86FX/diwcoX6s1Ud1oASOY6zMY57GW', 'student', NULL),
('110119281', '$2y$10$OtGW01AIjA/Y4G7vLjP/7.ui1y9/k2y62KOClaF01ug3u9tziDFGa', 'student', NULL),
('110119282', '$2y$10$Pg8BtpdxuD69DCJNDO/wbe4eYHKKacQ16itXrgJCyHhdRXfrgbCT6', 'student', NULL),
('110119283', '$2y$10$JEQRJrhyF1.nsTNgnffD5uzRp3A8G0EOPxOswbeTeCwt5vvr2J.ui', 'student', NULL),
('110119284', '$2y$10$31KI8PZ3hNYJPPaLnFX9HuR161XfRApK9xehQV.eQa7bvckgD7FKG', 'student', NULL),
('110119288', '$2y$10$fUUjAxo7NWR6sBJshwjFnebVw9FKZg2hvV7435J9MGPROaVtjh3eK', 'student', NULL),
('110119289', '$2y$10$A/fqh5plKAr.dkGdsJIo4.M0.M9qLEZDDHwa8PWkpLWOoKLzcQ/A2', 'student', NULL),
('110119290', '$2y$10$.zRx6Ry5F9LqycUwqwDw9.G2uCVIA34LgubWB3HeAiWnmNhw.c7ke', 'student', NULL),
('110119291', '$2y$10$MpCr/Twy1SYa4ZVQLMWlneZvVSPkDNTAToETPvZgiArWn3KG73GOC', 'student', NULL),
('110119292', '$2y$10$312j5lBOwCFM2IDG.jNo9.EBbXPS6CTAHdn83qyAMwmLVvmVcsXFu', 'student', NULL),
('110119294', '$2y$10$B7HHHNQff40yorJeEK41/.126KAMJyzdC7mKUn0sMJkRHN/EXYYGS', 'student', NULL),
('110119298', '$2y$10$us4.TxTA0.NBwVoDt4CcxeqnIJ0gnQyXbV0kQMkJ.co6v5mA4wVJe', 'student', NULL),
('110119299', '$2y$10$fplkLUWqFIy3guif.rCzU.HdgI2DcjOoBAJIiPDTywpbYGBu0nfgK', 'student', NULL),
('110119300', '$2y$10$.O/yw8e8f8GpSxWrNEDLWOzTEcWdVEwKSEomcKqEZYtnvFu1WQGnq', 'student', NULL),
('110119302', '$2y$10$lbiniJYvPm/Kirr1l052Eejsk8naDwjcQWYtJ.T752vtsq.swGh.y', 'student', NULL),
('110119305', '$2y$10$gOOBfCLObshbefSLakSX0Ob7T6KBPeNKjUJxD3FZStyuQsSjjEXJW', 'student', NULL),
('110119308', '$2y$10$RVyzmCeAxrtOf9jOXQEBK.2w5c9p1.g/AuuIi6gm8Bwdg4yvp9DEq', 'student', NULL),
('110119309', '$2y$10$ADoqxW3zo/BcrxR9fhABQeG0STs/qysa1GuJ4uJAZMqDfqDdln7h6', 'student', NULL),
('110119310', '$2y$10$Z3Uz0tcl5OH7i3JXrjb/pOyNP.hppfNF28slVObdqql3QYw81.Q3q', 'student', NULL),
('110119311', '$2y$10$gw9FRFT.8ZAkCQMCAEL2vubbsw2JY8ZYR8VCq5.GSqRG0maW6AAl2', 'student', NULL),
('110119313', '$2y$10$q3ZtZhNbHGaU0cO32EYFG.xGQ2P9MDyUxXRqQOqwGlWBmsNlCaeuq', 'student', NULL),
('110119314', '$2y$10$1A02fR8WDxQu9uoMda/9JevJNJx/py8c6YlAcsGwjY9o2.UHlOygm', 'student', NULL),
('110119315', '$2y$10$8jlC2s1aRJJCzhBtjNpMtOQBXkrn46nJhpmcsZOZmXkSFIV22sZE6', 'student', NULL),
('110119316', '$2y$10$yv8EGSJpyleiAl7hc9sJcOjET1PIaSoLqb4bW5lWH244OH/3j3age', 'student', NULL),
('110119317', '$2y$10$GZ03rWw..Qr.WTf3pKIyMOxv4mHmPc7zb3yKNuldrppHSzhqonFMG', 'student', NULL),
('110119318', '$2y$10$GasP9qhy8PzkNZ3Un6wtdu6R.R02fGp93GuWKXgOj0GBt6TeD5Y5u', 'student', NULL),
('110119319', '$2y$10$OL/oGYnUunY7fZ9TH3Mup.L84HGg1sL.XHx9d4A5AgHWbLvBM8UmS', 'student', NULL),
('110119321', '$2y$10$Jvzsdbr6wrbs1YXEwQXA6.IgW5.bFvvDs.D/fe6ufLWCq3mZEaNuq', 'student', NULL),
('110119322', '$2y$10$ig9pQXP8.XuUheZkuO4TP.Sq.sqzp.V2MiydxlCGu3i1.L.GpeGQO', 'student', NULL),
('110119323', '$2y$10$5YejkZpd1kgoIVuVvU8KF.3IPqAx4xvEaatcLd3irpPHpJKdEq022', 'student', NULL),
('110119325', '$2y$10$UV9f6v2Wz17NpjVkJPM.jez5Kqs7W1hcYs8KnQBRWeOX0sFSN7eeS', 'student', NULL),
('110119326', '$2y$10$cMMqG/pgAFTHueiWO.M07e3C.OonNNW.Yq80EaLDXO6FhF2AETYdS', 'student', NULL),
('110119327', '$2y$10$qc6kWc/15m6HUF03xnQJm.0uusNcHlRwR164OfDh5ahIGhbVvvcIS', 'student', NULL),
('110119328', '$2y$10$ehFSe9js6U5X8HGI5lva0.yp4ICxwxcjG6OSpu5qLgwBetFJFcNny', 'student', NULL),
('110119329', '$2y$10$yAodt2u4TW/iP8DVEurIaeyzy1umMHfCHinbrP84n/7wfK/jEyioi', 'student', NULL),
('110119331', '$2y$10$Qrw6INV8SxjG3pS4Noi5juZuXcfa6selJQtQSMWosIGgVXvuQxVcy', 'student', NULL),
('110119332', '$2y$10$2fu.lj1F5zJAbc4kJKpgwOxfLvr4CJ1gW.eAYB9GVw.aJx36ZjimK', 'student', NULL),
('110119333', '$2y$10$B24csabC529/jQ.txbFjE.i6d4cT5ItsnjqX3JgkTwm/Eeole04na', 'student', NULL),
('110119334', '$2y$10$8Xd3syXZhfOfgFusE.Uv7e26e1aTtDtJCaLYO9v71SqPqQOQS9x6W', 'student', NULL),
('110119337', '$2y$10$462sOtb5K4.Kaz/gyFC9bOvV62YYK32aQPEI4sdFyZR9.kF.6UhK6', 'student', NULL),
('110119338', '$2y$10$uI2NyxypqYneRQ.4zDxG3OXLg235NqYSUx.cVOIYBWlMvAioTZGYm', 'student', NULL),
('110119339', '$2y$10$1i3vMvKuUVkA4kSNOZ3Qw.4c03ltdSDLKIZzBmwhYi2pOk0iPm.12', 'student', NULL),
('110119340', '$2y$10$ZQ6BWlJ4uTL19OT//hkB0ONZ0qWsaeI5tijCo12qRnVVClb0r831S', 'student', NULL),
('110119341', '$2y$10$eVjxosPWoI.wLatYGWXNUucpWs9RS/qMbc5Ihfy73ip39139lCBJe', 'student', NULL),
('110119342', '$2y$10$yxOCS0928k4r3HgY2aGSrOSulYEy.qmTYuANX0egcLUrEbn.6q4IG', 'student', NULL),
('110119344', '$2y$10$cu7iI90dCY4gM37guqKAmOb6g6RSFA/aVSXVNPtGuWVXnKGKaLuxy', 'student', NULL),
('110119346', '$2y$10$J9lpv9AUh.DDY4Uhhz0Lq.LIJ8NS3hyCzG4XNwxq0XCrBfI0vSGw2', 'student', NULL),
('110119347', '$2y$10$R1mABdYtyzErVI0BM7Wu5uSM27xM72F22VolHeh0ysqdbTHE7Ln7u', 'student', NULL),
('110119348', '$2y$10$IenfB.srdgDq2whb70oRu.41E9EvjwaXQuxyBeqeMEVmFhtvDYUju', 'student', NULL),
('110119349', '$2y$10$Aa38mEdQ943evrrZjPskI.LjihdPy5YerDEsN0gTK.Sd1EjkelRSm', 'student', NULL),
('110119350', '$2y$10$UX4OhEdC1uajXlcvNlgXUOyu6Kch2vGiM9mdZ4sJ.yueF9OlKgMSa', 'student', NULL),
('110119351', '$2y$10$lBpopFI9Pl19ZXgoTi/A6.4wX80DkNF2jgsmSimRxkuqkGb4Nb0ly', 'student', NULL),
('110119352', '$2y$10$I9t3zXUpSTJJ4p/j3KFZBOrgNav4.Ci/a.cNZc0UOBC66pyEuz/Hy', 'student', NULL),
('110119353', '$2y$10$6hJd5LJJWLiVIN/UNbF0j./x.31.K89rz/WWMdi/OMGYv/sy6c/Rm', 'student', NULL),
('110119354', '$2y$10$IgHsvrH8F/DY5U3CO/Nm.uNUkLSV3Ly.XZIbfpGluy5C3CJcOPJQu', 'student', NULL),
('110119355', '$2y$10$HyWKPZ/DGHbtls1YPJkdxehUqWdX5xglyOU3zWvOTGNsruKdZbX7m', 'student', NULL),
('110119356', '$2y$10$hD8Zi9udpbYvP7kaELo..ugR5JEIkPyYEluciPVMgNncp2pq.82FO', 'student', NULL),
('110119357', '$2y$10$wqR/.FfFIUQFYqudGCxx.O541WCAp/GcMWLRldIwleC8bWaFFz4gq', 'student', NULL),
('110119358', '$2y$10$uscVG60kBkjgb.p/itDeS.2JPta/.aV4F3N1/uAyF0Xfv37UVupne', 'student', NULL),
('110119359', '$2y$10$yXLq9UQeKxp3SRHqGZCFC.wYJyKes1DN9UabGuhoc2aB2gH.PD9JG', 'student', NULL),
('110119360', '$2y$10$pJ4V66OVGA2N2rgXuHmuN.Ykyj02Rgtv8ceCmHweVxC28Y3F.rmVO', 'student', NULL),
('110119361', '$2y$10$YaZvd2GvxdV7nQA9nxSrQeQs18acQ83Uls5REMhpXKABq4AfhjGnG', 'student', NULL),
('110119362', '$2y$10$AXSgFarkLk4V1xaJQIBmhOu6h4BzCTO8i3H.zbVRvk.xbNMjbfqLO', 'student', NULL),
('110119363', '$2y$10$oJPAqw0fy2Qc5f2BDLBQ1.ga8ulMPgBH2hNS0P2ypXxLC9pZMw3KO', 'student', NULL),
('110119364', '$2y$10$3uVp1V3FCYbIOO06yf3uuewo/eqYjx50.AFDqlLiTBpwf9H2C0gW2', 'student', NULL),
('110119365', '$2y$10$VuWVyEjqtelbiRhs1l7dPuhCW66Nnr7jCPm9zePDx4wGjr5bAKJ8i', 'student', NULL),
('110119366', '$2y$10$NsUxeKX2iAq3YyehxtcimuP4lkDUnzniA8LkPux.csLYqPDjReylu', 'student', NULL),
('110119368', '$2y$10$GWh/JoZ/w49WTgpYozbBp.hixUgpRh7dTaHd3W//UVvLWzAaytJk2', 'student', NULL),
('110119372', '$2y$10$.7UlBwIGdTpY3ljVGH6keOzbOoPOfyMCrBbsqS4wFrIMK4AwWcP72', 'student', NULL),
('110119373', '$2y$10$hgYpL6TWfVTjE8YRKur7TeWKkCkRQU6M0iLPZ7XZclV3bmZOsq1Jm', 'student', NULL),
('110119374', '$2y$10$efV.oCUGvVMW90kvzr4PS.mUPWeS34YlblxnkFKg0w8E3AgTowTdu', 'student', NULL),
('110119376', '$2y$10$.zJaUcDU/KVNdkdbR/ePoOicW0or2Mvc0QJ/n17or.mcBzYhbYNxO', 'student', NULL),
('110119377', '$2y$10$58nUgTFnH9aYn/P7HyS6j.8LoGcriy4wSwqRaqukB0viISoYH6PCy', 'student', NULL),
('110119381', '$2y$10$tVCKJsJNBMk6YMCyU6su/ewkl1WVzxQdlEl0hVLfy0GDRhqS4LJCq', 'student', NULL),
('110119382', '$2y$10$Ae/IoGn34KC3Wm9NCTxK2uK5G/kMAUWtvWCyf3ikTLXhGOJgY0Vwy', 'student', NULL),
('110119385', '$2y$10$UAWsUdjmQjDActq54sGWjuUYhWpPulj3nUhb0037wC9hVaZVuRS3e', 'student', NULL),
('110119388', '$2y$10$y7Bdpcy5rJQ5lk31qc7FR.rynVcTmrvPezO6aSqd8FKUeM2uyevm2', 'student', NULL),
('110119389', '$2y$10$7dNIQTCcE1oTr6FsEiqhlOetIt17agZIM.tW9FSLBC8RcYIGg5VHO', 'student', NULL),
('110119390', '$2y$10$oDD9U.tiwJsyN2Ujs2Dcv.2zBLXJaqbnZI9xPt4tUJ0VkHYGRUku6', 'student', NULL),
('110119391', '$2y$10$V7l.ZQCvdjtdV91mXcQvneSznjeSJb7wHYBlUSuSyBMdwB9O4T/M6', 'student', NULL),
('110119392', '$2y$10$JGXrpXKgswMrVnwXHUuoXeiYl175AhIZdt.zZQFZumAZ66w.gT0/O', 'student', NULL),
('110119393', '$2y$10$dMtNYGc3mWnIwi4jtiLNbOP90ytu3lR5cwJ0axxDShmQuLa63EzGi', 'student', NULL),
('110119394', '$2y$10$4LyDBK6T2gQIpMQKDadcq.LvXqF4hJ09zTgP4aNJc.Act0Xdm7TCm', 'student', NULL),
('110119395', '$2y$10$O.b7AydzRKTpF9PzwqW.HuEnLa/VE723myE6abywNb1Wbq2PqocjS', 'student', NULL),
('110119397', '$2y$10$OlGZoiMBSll/nPqKDZT0q.CPdUcna05Go5U9mxPyvvrQbYYiJAJWK', 'student', NULL),
('110119398', '$2y$10$KADNVFjIYPqhgMA7gOeu4ubQpSsEEOd23SKgsW/7vJuEc0.CgLyy2', 'student', NULL),
('110119399', '$2y$10$x9TXxyynkMmGjMlgFbtLwOJFmzhWp32.x7.arVqFOk9jK3OzjFUBS', 'student', NULL),
('110119400', '$2y$10$ke5LC9ZB6YIOEv0DfodrMeWcRJfWvPHZICbqvUxqLXqk/6Qp9togO', 'student', NULL),
('110119402', '$2y$10$VqRtiqHXP24.gimlNrFGmuLa9T1ckeKw6UV3CKCx/XpWYkPWIIkBW', 'student', NULL),
('110119404', '$2y$10$JNdPwRsvftn431S/R5UaCuXtXdlaxYf7goKWWvUtyGLKsW5G58CYe', 'student', NULL),
('110119405', '$2y$10$JAlpNjfCEFctCiAp360RFu4MHneaua8CWpVrbpS2RpkU4AURs1bsu', 'student', NULL),
('110119406', '$2y$10$d/G1dLfCKZtVRXrBeGfv3eOnsIhHEkG.M6qHsGLM3VPnqY4xDHMuO', 'student', NULL),
('110119407', '$2y$10$NhqFE6y6Xc8oI5jMwmYJFuFRW/lajAcgTvU30SBhw5MJ.5RX4ZvdS', 'student', NULL),
('110119408', '$2y$10$UEg76JOznCq10J690gvZz.fE2gT6L1VgkDz1KNt7VqmfAKdmGojaW', 'student', NULL),
('110119410', '$2y$10$4TmEA6Xxr2FcDnxtDHW4i.xFnPStHW2Ff3UG0My65cuinq4gcbMx6', 'student', NULL),
('110119411', '$2y$10$/ITtQ9SZUb3rXr7lXQvl/OdqpMWkI64vAXx0vY5x3aealzdgKGaUi', 'student', NULL),
('110119415', '$2y$10$b6X7YLVWg8rW4yTeUrshqOFnSq6I4D751dsvMzHwgS6bhtwAb7uhS', 'student', NULL),
('110119416', '$2y$10$k1p859wlsnktyDoiaDuCrOPtt2mEKTVDipk9yUlMOK1oevDDC72TG', 'student', NULL),
('110119417', '$2y$10$MI9ivCzlNA3lWEoUOI1ohO3tLqKL.0p3ERxCoQFzlMgjODMAFqRe2', 'student', NULL),
('110119418', '$2y$10$orpAIQyDYwia09JYp1JbiucwYnUsA4ADpYtDRdGCfuM/xkAoKtIlK', 'student', NULL),
('110119421', '$2y$10$g6u7eDe/NswviJtUnLiw.uIw6ro5w3tz/L.JRjnU04EXmNBnrC.ym', 'student', NULL),
('110119422', '$2y$10$X9IdOISl3EPv1/rig4xIe.VEIRuE60j78PWuS50JtvaZYGR.P6w/G', 'student', NULL),
('110119423', '$2y$10$lC5hilruX9mexzxFxY5ZaOFqnWxZXNLcFbWqgQSLXD4ktijTg3W0e', 'student', NULL),
('110119424', '$2y$10$LexlW8narfGdXF5c4/Hr8u1PYeXxgET2/EPlXhNMnUR5tKI0YvOjO', 'student', NULL),
('110119425', '$2y$10$wudQy9uXnF1h43YQrkhRjODjQQcQr4Y0tYPpdXoEHrEq08bYtmZrO', 'student', NULL),
('110119426', '$2y$10$jSAitZI.ymY9ywiHwGVk8upa3kZdxFyuVbxjcL1E3lk8AcebHk/12', 'student', NULL),
('110119427', '$2y$10$zpg3uLlqDt8yA1PiLP3wAOcGUz7DrJaxbPgHqIerso4nerRaRzvrW', 'student', NULL),
('110119428', '$2y$10$0VVFNZgauzJ4zs9dHjX87eTGnFTTJbQoe.LsbkJHy58SrND6UdPr.', 'student', NULL),
('110119429', '$2y$10$.IaNcHaMr1Z0e2nvc83yQOWmongGdgQ6LEbh5Lswtx7hPCOClwWoq', 'student', NULL),
('110119432', '$2y$10$qar0la1DzykBKhWMagIGS.7UFYshDOokrFNoiGF09pb0EGxb5/Pge', 'student', NULL),
('110119433', '$2y$10$HZ17Wnitj6GB1U3npX/ThejpHrI6oVMOqacTUPIkVw6RUxz6c5BYW', 'student', NULL),
('110119434', '$2y$10$Ge8KSMeNDT73Grh5jL2aIuTtERxweNyB1rbF/TxufnJ6kpXP5OHyG', 'student', NULL),
('110119435', '$2y$10$ixVOGDYh63KsKLnD5qQcwe.u7Krw15k8EbyXTYS9x08s53PAwW8xq', 'student', NULL),
('110119436', '$2y$10$Ib7NmueZmntVkNZ856Y2wOLopQiO0Hxe/hG9JwLuBX2Q13qCLdkT.', 'student', NULL),
('110119437', '$2y$10$jwSlAFEfJjU5gRCkh6IYM.n5JNNcGSeWCdEGFiJpzGHzOCGssF3Y6', 'student', NULL),
('110119438', '$2y$10$fNpLj2JxSH2dNXFdcfSDCebt/f92m9MFCmswTHqRXlnk1b9BplNpC', 'student', NULL),
('110119439', '$2y$10$MoQvbHM.vYF7MgrT8UVuKO8CDRaMpwSj2X76CE/xDOsDcQ.ADqXEa', 'student', NULL),
('110119440', '$2y$10$aJt159wcQRbrkondsJaloOMeSJnIhURRrLFU6EMfBrjRYatv3nnqC', 'student', NULL),
('110119441', '$2y$10$LSmi5MHPt.H3M7th0sHbzOEQ0PmcDUsmObduUllb9bpMyGxGy0/Zu', 'student', NULL),
('110119442', '$2y$10$S2l2VFHReKHyvRUxfMrvkuXHlueo9nnP5h1nyjMhZgTUcOAG4oU/q', 'student', NULL),
('110119444', '$2y$10$wymg300RPaP0GXyNRNkwUeRrqyWeto74.5x/.uBh05wdCo8TZ4jO.', 'student', NULL),
('110119446', '$2y$10$ZDqTVAZTqFtfQ5dw.w6h9e2cubwNGfFP2qgsRiLSEAm8gV1OXs9x2', 'student', NULL),
('110119448', '$2y$10$AN/RT0isOiwb2ghdOob/fue6LzABCOFZet8QWPsVRmzeQnbg8x6Mq', 'student', NULL),
('110119449', '$2y$10$b4vIrA9yk/HSRUXCmkPFZeJLpYcdVH71yxgahf/iGMkgUxP9Mmy8y', 'student', NULL),
('110119450', '$2y$10$QqQ2cjMY1oV.CkAsjSU9WeRuCeHoywUeiBegR3WlXv7xn94FaXavy', 'student', NULL),
('110119451', '$2y$10$XOQUbp9pmwKXxAt1TTu1MutdvgfA/x0GMRevLGoSfyKVnnfCNDsSm', 'student', NULL),
('110119452', '$2y$10$qg4UhJyQ2UV2j.QOPI6mZeLVq2lmyZy0LdhRsRrAnD8QLs2m6F6ai', 'student', NULL),
('110119454', '$2y$10$gPmfZkYGCy9nxDdf.3ikuePkKVvzNqoKcKzk5OVxfywCSZpE3QbNq', 'student', NULL),
('110119455', '$2y$10$k9/Pk7CXMtE8oOjyIiuZV.uhEli.K4K32Gv2eqQfxnYoAHWonkQ7.', 'student', NULL),
('110119456', '$2y$10$yzQcvmOl7IPURobH4p7nO.zTcmXbS12uh.SZmikg/UkMPXMlMANeS', 'student', NULL),
('110119458', '$2y$10$IuXzZBW8imkU176noKuaMu5p4D2xdWtJwhV8fhye77fWRPiU2oWSS', 'student', NULL),
('110119459', '$2y$10$zuwE15XvJIa89gLYlyvgruEAiGl3Hpy180N4o5rJY2d0nk2ND2Ix6', 'student', NULL),
('110119464', '$2y$10$pYJ3vR/WTYjenG5yvrcas.hk8vaGpEOau4U1t3NlCqjQ4tW6iWltq', 'student', NULL),
('110119465', '$2y$10$OX21EQgcSWB7P/Mp0566RunDmt6IdE6iGBi7ERR7CUh/tlroRzI0a', 'student', NULL),
('110119466', '$2y$10$Dyhkg9B0UBIINDgGDsMXsuUunKb272iJ1oCtisJSDBagPi6YKkDVW', 'student', NULL),
('110119467', '$2y$10$roJWU93zPfQAWL/nqZJQD.mR197ji9xGmwt1rfdmpg7vr287d2MyK', 'student', NULL),
('110119468', '$2y$10$2ZLx31KNxy6zBmXGq5/cxerOp/ihJqwQojeB3Oa1Ha4fUl64aciGa', 'student', NULL),
('110119469', '$2y$10$56A4oK6Ze.iUlYcZQ3095.2vmxiA26Cy9cnD/SOwnljZpspjZogbu', 'student', NULL),
('110119472', '$2y$10$8gziovKF5/r32qKmOX.xTOsjnNWH2ZOxGckXQloUr71bbHk3L.PHe', 'student', NULL),
('110119474', '$2y$10$3lXaIUxwVsFKUwZXsqLBnONuTnywsW1rsLq8kuK/hReLgiI90c6A.', 'student', NULL),
('110119475', '$2y$10$K/WpJFtqOi86CTircxjQC.7VBMU9iIiN.R1ZyCvl3C9EJYFSXSe7G', 'student', NULL),
('110119478', '$2y$10$AxAwX7vp0pBTup1X6aH/wOnwrs7twRUQNfFb4JD8kQuV80F5tFZzy', 'student', NULL),
('110119479', '$2y$10$EwHNSxqU0g72kLs/xBnFKeMcP5Zlho1hhoX6V6WbjVakEPE6jsmp2', 'student', NULL),
('110119480', '$2y$10$9bWIGpR.M2wNBabD.q4khuQ.ICPne09Qt2PPvGSSsarp/vhtvZIdO', 'student', NULL),
('110119481', '$2y$10$ipRKgkxdctLXS2ABwDe8XePume5kRZWmB9xx9ct/p214QY8gc9wZm', 'student', NULL);
INSERT INTO `user` (`username`, `password`, `user_type`, `last_login`) VALUES
('110119482', '$2y$10$uhHix6gLflfmRHsJD4dO3O6uwbqu5fq9FGzhx8/mVHWnnzRFyqXui', 'student', NULL),
('110119483', '$2y$10$KoiBB9ymWvtdxcmM0/m/8e372rQxzwk8Wui5pLFFsE1JmKqZFoXOq', 'student', NULL),
('110119484', '$2y$10$VaKYfzVPIxOYhTJThtQiouDZ13gEOpdHFn.kH.7gH8RhlAk5IydN.', 'student', NULL),
('110119485', '$2y$10$uYPQKpihPc0ug70gnE8Hpu8I.qqqLk7etXvAtEMoSjqL4.9pzPT.i', 'student', NULL),
('110119487', '$2y$10$mCsVKJn6IXiHweglltG2du26WeZaRhYioS0ggbdNeVPqVZnyjnwQW', 'student', NULL),
('110119488', '$2y$10$VnD2iUO48QhNGmcY.9ctGeW/7IoaPSzCFVrXk2Kdb4waKb79n2ILa', 'student', NULL),
('110119489', '$2y$10$/n4FikJ0NpWI/lzJC/Lhb.vtBpTQsMAcb3IB8QMpx89deX7GGnvnu', 'student', NULL),
('110119490', '$2y$10$.Rpmkp8.ukH/V0rt.wTPNOzXFy6Dm.wjHJwv.akM5u.vcigzzrPaS', 'student', NULL),
('110119491', '$2y$10$RNUF4EfT9RtRiOZoevI1cudfiz7GnbrJbHFQOueUh1gvSKFddPHbC', 'student', NULL),
('110119492', '$2y$10$1gtESydzGjvpfUhxG/2T4eF31yK/cNdblqdyrNPiDQ.pUATmHUCW6', 'student', NULL),
('110119494', '$2y$10$CpUtXnjN1W/q2qrHPntxYeZDljDRDX/jX0Zpj7/gQrJt/oYiV5xb6', 'student', NULL),
('110119495', '$2y$10$DiXNNV68ZOQhPB/cHxZYAujbC./phRdOEpM6K3vrn0izXSb.cSlQ6', 'student', NULL),
('110119496', '$2y$10$UiWjgfNBHieMYqGKetk.ueI9UEHt9sTCHI0EsLSd/.K34QHUQ04Ym', 'student', NULL),
('110119497', '$2y$10$rWBCcEDzN/9Q79SXn3MJ5uwSRkvYUKe6w84IRqqsdAZxTBhTSoNOG', 'student', NULL),
('110119498', '$2y$10$SYg0pBjaXJVsoz6bz9sPG.kni3LMk6yXqf1VMS7PZNon93iXQv0a.', 'student', NULL),
('110119499', '$2y$10$Xgr10t7g.H6pWLf5NiGJyeVqdBax1diVHJI2irzAtD.O53UE/Frfm', 'student', NULL),
('182018', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2023-01-30 20:36:10'),
('187020', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('189005', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('199003', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2023-01-28 09:12:52'),
('199014', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('199015', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2022-12-27 23:31:18'),
('200031', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2022-12-27 23:40:41'),
('200032', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('201010', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2022-12-13 09:17:07'),
('201037', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2023-01-25 17:02:05'),
('202027', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('203006', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('203007', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2022-12-13 21:55:28'),
('204031', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('206023', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('207011', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('208019', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('208020', '$2y$10$/AeHemhmEgwvJIOdWIsNo.B3fLXqT7/Imsspm8KNbgTy5vchXFMTy', 'lecturer', NULL),
('210004', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('210006', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('211002', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('211017', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('211019', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('211020', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('211021', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2022-12-29 02:10:09'),
('211029', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('212003', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('212020', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('213002', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('214011', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('214012', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('214031', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('214032', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2023-01-03 18:44:36'),
('215030', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('215039', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('215040', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('215041', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('216012', '$2y$10$pmVO09LO.hRKrzl8K6twDO/53VKOd0VeBjhcJOVhKtwqxdjT376m6', 'lecturer', '2022-10-24 05:08:32'),
('216013', '$2y$10$5YSNMZPW5yV34hTbI38PoO/VSMkFutuxOOJld86htG2wRUgDLliUO', 'lecturer', '2022-09-27 03:55:39'),
('216039', '$2y$10$L9zRKyppbe5eZIQj8q86P.RKN.rU.tV4qvnTmVpACKSlCyLMu6GTu', 'lecturer', NULL),
('216060', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('217001', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2022-12-13 09:48:49'),
('217006', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('217024', '$2y$10$xG2d/r2zr817TkS3RR2ELu3zHtjj45u3SCNFomfB0bDfN7FdbgiRO', 'lecturer', NULL),
('217058', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('217068', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('218008', '$2y$10$cc5h.H3XfP49HLsvLebyoeXWUo9NIPDDf33xevQ5Rkgq/jvBLYBYO', 'lecturer', '2022-10-20 21:52:47'),
('218024', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('218025', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', '2023-01-24 05:21:17'),
('218026', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('218027', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('218036', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('219032', '$2y$10$BlJdKLValBkF0mzTFXECKuGbG6O9HV//iOOTW8K7kt0F1QOZ41vQ6', 'lecturer', NULL),
('219038', '$2y$10$8Q7krGuwDfIsaUMjb35Rz.uiUa871nVKYCugTBnCxXFtkZnfJ7Gwm', 'lecturer', NULL),
('219065', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('219066', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('221011', '$2y$10$tkm12m7WQAoCK4jJJuZd9u/4JgIFKfSNzdS5I2.BI9QN/8q7By0W6', 'lecturer', NULL),
('221012', '$2y$10$.PyVAiqYXFsViHZmZ2M6ReL2yb1893L2FudmM7B.ZlJ7nSXC6BbjO', 'lecturer', NULL),
('221016', '$2y$10$M3dOMLsab7kURbDsQV9A.uZiKQ3xaO03/lP5zlSI3fbjlbCI115Tm', 'lecturer', NULL),
('221042', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'lecturer', NULL),
('221048', '$2y$10$O7VnYmaQo9P18mG0Hkf1bu4QNXzrj0G0wDArGhCR4t.VJamMytUGq', 'lecturer', NULL),
('admintu', '$2y$10$eg5NMSMoA4SEMq9uioiIxei/n5iIR58VlenBBi/CyXHvOiFk.yyBe', 'staff', '2023-01-28 19:24:34'),
('ajeng', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'staff', '2023-02-01 01:04:44'),
('laboran', '$2y$10$aYe.Du9UNxU4sHlzAencw.MWQXjmFqXZiFFfDGyNuwmu8CKx9mx7O', 'staff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_lab`
--

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
('203007', 3),
('218008', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `roles` enum('admin','student','lecturer','kalab','wd','adminst') NOT NULL
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
(64, 'ajeng', 'admin'),
(65, '200031', 'kalab'),
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
(258, '110118135', 'student'),
(260, '110119016', 'student'),
(261, '110119017', 'student'),
(262, '110119019', 'student'),
(263, '110119020', 'student'),
(264, '110119022', 'student'),
(265, '110119023', 'student'),
(266, '110119024', 'student'),
(267, '110119025', 'student'),
(268, '110119026', 'student'),
(269, '110119027', 'student'),
(270, '110119028', 'student'),
(271, '110119031', 'student'),
(272, '110119032', 'student'),
(273, '110119034', 'student'),
(274, '110119037', 'student'),
(275, '110119038', 'student'),
(276, '110119040', 'student'),
(277, '110119041', 'student'),
(278, '110119042', 'student'),
(279, '110119044', 'student'),
(280, '110119045', 'student'),
(281, '110119046', 'student'),
(282, '110119047', 'student'),
(283, '110119049', 'student'),
(284, '110119050', 'student'),
(285, '110119051', 'student'),
(286, '110119052', 'student'),
(287, '110119053', 'student'),
(288, '110119054', 'student'),
(289, '110119056', 'student'),
(290, '110119057', 'student'),
(291, '110119059', 'student'),
(292, '110119060', 'student'),
(293, '110119061', 'student'),
(294, '110119062', 'student'),
(295, '110119063', 'student'),
(296, '110119064', 'student'),
(297, '110119065', 'student'),
(298, '110119066', 'student'),
(299, '110119067', 'student'),
(300, '110119068', 'student'),
(301, '110119069', 'student'),
(302, '110119070', 'student'),
(303, '110119072', 'student'),
(304, '110119074', 'student'),
(305, '110119075', 'student'),
(306, '110119078', 'student'),
(307, '110119081', 'student'),
(308, '110119082', 'student'),
(309, '110119083', 'student'),
(310, '110119084', 'student'),
(311, '110119085', 'student'),
(312, '110119086', 'student'),
(313, '110119088', 'student'),
(314, '110119089', 'student'),
(315, '110119090', 'student'),
(316, '110119092', 'student'),
(317, '110119097', 'student'),
(318, '110119098', 'student'),
(319, '110119099', 'student'),
(320, '110119101', 'student'),
(321, '110119103', 'student'),
(322, '110119104', 'student'),
(323, '110119105', 'student'),
(324, '110119106', 'student'),
(325, '110119108', 'student'),
(326, '110119109', 'student'),
(327, '110119110', 'student'),
(328, '110119111', 'student'),
(329, '110119113', 'student'),
(330, '110119114', 'student'),
(331, '110119115', 'student'),
(332, '110119116', 'student'),
(333, '110119119', 'student'),
(334, '110119121', 'student'),
(335, '110119122', 'student'),
(336, '110119123', 'student'),
(337, '110119127', 'student'),
(338, '110119131', 'student'),
(339, '110119132', 'student'),
(340, '110119134', 'student'),
(341, '110119136', 'student'),
(342, '110119137', 'student'),
(343, '110119139', 'student'),
(344, '110119140', 'student'),
(345, '110119143', 'student'),
(346, '110119144', 'student'),
(347, '110119146', 'student'),
(348, '110119147', 'student'),
(349, '110119148', 'student'),
(350, '110119149', 'student'),
(351, '110119152', 'student'),
(352, '110119154', 'student'),
(353, '110119155', 'student'),
(354, '110119156', 'student'),
(355, '110119158', 'student'),
(356, '110119160', 'student'),
(357, '110119161', 'student'),
(358, '110119163', 'student'),
(359, '110119166', 'student'),
(360, '110119168', 'student'),
(361, '110119169', 'student'),
(362, '110119170', 'student'),
(363, '110119171', 'student'),
(364, '110119172', 'student'),
(365, '110119174', 'student'),
(366, '110119175', 'student'),
(367, '110119177', 'student'),
(368, '110119178', 'student'),
(369, '110119180', 'student'),
(370, '110119181', 'student'),
(371, '110119182', 'student'),
(372, '110119183', 'student'),
(373, '110119186', 'student'),
(374, '110119187', 'student'),
(375, '110119188', 'student'),
(376, '110119189', 'student'),
(377, '110119191', 'student'),
(378, '110119193', 'student'),
(379, '110119194', 'student'),
(380, '110119195', 'student'),
(381, '110119196', 'student'),
(382, '110119197', 'student'),
(383, '110119198', 'student'),
(384, '110119200', 'student'),
(385, '110119201', 'student'),
(386, '110119202', 'student'),
(387, '110119205', 'student'),
(388, '110119206', 'student'),
(389, '110119207', 'student'),
(390, '110119210', 'student'),
(391, '110119212', 'student'),
(392, '110119213', 'student'),
(393, '110119214', 'student'),
(394, '110119215', 'student'),
(395, '110119216', 'student'),
(396, '110119217', 'student'),
(397, '110119218', 'student'),
(398, '110119220', 'student'),
(399, '110119221', 'student'),
(400, '110119222', 'student'),
(401, '110119223', 'student'),
(402, '110119224', 'student'),
(403, '110119225', 'student'),
(404, '110119226', 'student'),
(405, '110119227', 'student'),
(406, '110119228', 'student'),
(407, '110119229', 'student'),
(408, '110119230', 'student'),
(409, '110119234', 'student'),
(410, '110119235', 'student'),
(411, '110119236', 'student'),
(412, '110119237', 'student'),
(413, '110119238', 'student'),
(414, '110119239', 'student'),
(415, '110119240', 'student'),
(416, '110119241', 'student'),
(417, '110119242', 'student'),
(418, '110119243', 'student'),
(419, '110119245', 'student'),
(420, '110119246', 'student'),
(421, '110119249', 'student'),
(422, '110119250', 'student'),
(423, '110119251', 'student'),
(424, '110119253', 'student'),
(425, '110119254', 'student'),
(426, '110119255', 'student'),
(427, '110119258', 'student'),
(428, '110119259', 'student'),
(429, '110119260', 'student'),
(430, '110119262', 'student'),
(431, '110119263', 'student'),
(432, '110119264', 'student'),
(433, '110119265', 'student'),
(434, '110119266', 'student'),
(435, '110119267', 'student'),
(436, '110119268', 'student'),
(437, '110119269', 'student'),
(438, '110119271', 'student'),
(439, '110119273', 'student'),
(440, '110119274', 'student'),
(441, '110119275', 'student'),
(442, '110119276', 'student'),
(443, '110119278', 'student'),
(444, '110119279', 'student'),
(445, '110119281', 'student'),
(446, '110119282', 'student'),
(447, '110119283', 'student'),
(448, '110119284', 'student'),
(449, '110119288', 'student'),
(450, '110119289', 'student'),
(451, '110119290', 'student'),
(452, '110119291', 'student'),
(453, '110119292', 'student'),
(454, '110119294', 'student'),
(455, '110119298', 'student'),
(456, '110119299', 'student'),
(457, '110119300', 'student'),
(458, '110119302', 'student'),
(459, '110119305', 'student'),
(460, '110119308', 'student'),
(461, '110119309', 'student'),
(462, '110119310', 'student'),
(463, '110119311', 'student'),
(464, '110119313', 'student'),
(465, '110119314', 'student'),
(466, '110119315', 'student'),
(467, '110119316', 'student'),
(468, '110119317', 'student'),
(469, '110119318', 'student'),
(470, '110119319', 'student'),
(471, '110119321', 'student'),
(472, '110119322', 'student'),
(473, '110119323', 'student'),
(474, '110119325', 'student'),
(475, '110119326', 'student'),
(476, '110119327', 'student'),
(477, '110119328', 'student'),
(478, '110119329', 'student'),
(479, '110119331', 'student'),
(480, '110119332', 'student'),
(481, '110119333', 'student'),
(482, '110119334', 'student'),
(483, '110119337', 'student'),
(484, '110119338', 'student'),
(485, '110119339', 'student'),
(486, '110119340', 'student'),
(487, '110119341', 'student'),
(488, '110119342', 'student'),
(489, '110119344', 'student'),
(490, '110119346', 'student'),
(491, '110119347', 'student'),
(492, '110119348', 'student'),
(493, '110119349', 'student'),
(494, '110119350', 'student'),
(495, '110119351', 'student'),
(496, '110119352', 'student'),
(497, '110119353', 'student'),
(498, '110119354', 'student'),
(499, '110119355', 'student'),
(500, '110119356', 'student'),
(501, '110119357', 'student'),
(502, '110119358', 'student'),
(503, '110119359', 'student'),
(504, '110119360', 'student'),
(505, '110119361', 'student'),
(506, '110119362', 'student'),
(507, '110119363', 'student'),
(508, '110119364', 'student'),
(509, '110119365', 'student'),
(510, '110119366', 'student'),
(511, '110119368', 'student'),
(512, '110119372', 'student'),
(513, '110119373', 'student'),
(514, '110119374', 'student'),
(515, '110119376', 'student'),
(516, '110119377', 'student'),
(517, '110119381', 'student'),
(518, '110119382', 'student'),
(519, '110119385', 'student'),
(520, '110119388', 'student'),
(521, '110119389', 'student'),
(522, '110119390', 'student'),
(523, '110119391', 'student'),
(524, '110119392', 'student'),
(525, '110119393', 'student'),
(526, '110119394', 'student'),
(527, '110119395', 'student'),
(528, '110119397', 'student'),
(529, '110119398', 'student'),
(530, '110119399', 'student'),
(531, '110119400', 'student'),
(532, '110119402', 'student'),
(533, '110119404', 'student'),
(534, '110119405', 'student'),
(535, '110119406', 'student'),
(536, '110119407', 'student'),
(537, '110119408', 'student'),
(538, '110119410', 'student'),
(539, '110119411', 'student'),
(540, '110119415', 'student'),
(541, '110119416', 'student'),
(542, '110119417', 'student'),
(543, '110119418', 'student'),
(544, '110119421', 'student'),
(545, '110119422', 'student'),
(546, '110119423', 'student'),
(547, '110119424', 'student'),
(548, '110119425', 'student'),
(549, '110119426', 'student'),
(550, '110119427', 'student'),
(551, '110119428', 'student'),
(552, '110119429', 'student'),
(553, '110119432', 'student'),
(554, '110119433', 'student'),
(555, '110119434', 'student'),
(556, '110119435', 'student'),
(557, '110119436', 'student'),
(558, '110119437', 'student'),
(559, '110119438', 'student'),
(560, '110119439', 'student'),
(561, '110119440', 'student'),
(562, '110119441', 'student'),
(563, '110119442', 'student'),
(564, '110119444', 'student'),
(565, '110119446', 'student'),
(566, '110119448', 'student'),
(567, '110119449', 'student'),
(568, '110119450', 'student'),
(569, '110119451', 'student'),
(570, '110119452', 'student'),
(571, '110119454', 'student'),
(572, '110119455', 'student'),
(573, '110119456', 'student'),
(574, '110119458', 'student'),
(575, '110119459', 'student'),
(576, '110119464', 'student'),
(577, '110119465', 'student'),
(578, '110119466', 'student'),
(579, '110119467', 'student'),
(580, '110119468', 'student'),
(581, '110119469', 'student'),
(582, '110119472', 'student'),
(583, '110119474', 'student'),
(584, '110119475', 'student'),
(585, '110119478', 'student'),
(586, '110119479', 'student'),
(587, '110119480', 'student'),
(588, '110119481', 'student'),
(589, '110119482', 'student'),
(590, '110119483', 'student'),
(591, '110119484', 'student'),
(592, '110119485', 'student'),
(593, '110119487', 'student'),
(594, '110119488', 'student'),
(595, '110119489', 'student'),
(596, '110119490', 'student'),
(597, '110119491', 'student'),
(598, '110119492', 'student'),
(599, '110119494', 'student'),
(600, '110119495', 'student'),
(601, '110119496', 'student'),
(602, '110119497', 'student'),
(603, '110119498', 'student'),
(604, '110119499', 'student'),
(605, 'admintu', 'adminst'),
(607, '218008', 'kalab'),
(658, '201037', 'kalab'),
(659, '182018', 'lecturer'),
(660, '187020', 'lecturer'),
(661, '189005', 'lecturer'),
(662, '199003', 'lecturer'),
(663, '199014', 'lecturer'),
(664, '199015', 'lecturer'),
(665, '200031', 'lecturer'),
(666, '200032', 'lecturer'),
(667, '201010', 'lecturer'),
(668, '201037', 'lecturer'),
(669, '202027', 'lecturer'),
(670, '203006', 'lecturer'),
(671, '203007', 'lecturer'),
(672, '204031', 'lecturer'),
(673, '206023', 'lecturer'),
(674, '207011', 'lecturer'),
(675, '208019', 'lecturer'),
(676, '210004', 'lecturer'),
(677, '210006', 'lecturer'),
(678, '211002', 'lecturer'),
(679, '211017', 'lecturer'),
(680, '211019', 'lecturer'),
(681, '211020', 'lecturer'),
(682, '211021', 'lecturer'),
(683, '211029', 'lecturer'),
(684, '212003', 'lecturer'),
(685, '212020', 'lecturer'),
(686, '213002', 'lecturer'),
(687, '214011', 'lecturer'),
(688, '214012', 'lecturer'),
(689, '214031', 'lecturer'),
(690, '214032', 'lecturer'),
(691, '215030', 'lecturer'),
(692, '215039', 'lecturer'),
(693, '215040', 'lecturer'),
(694, '215041', 'lecturer'),
(695, '216060', 'lecturer'),
(696, '217001', 'lecturer'),
(697, '217006', 'lecturer'),
(698, '217058', 'lecturer'),
(699, '217068', 'lecturer'),
(700, '218024', 'lecturer'),
(701, '218025', 'lecturer'),
(702, '218026', 'lecturer'),
(703, '218027', 'lecturer'),
(704, '218036', 'lecturer'),
(705, '219065', 'lecturer'),
(706, '219066', 'lecturer'),
(707, '221042', 'lecturer');

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
-- Indexes for table `ijin_lab`
--
ALTER TABLE `ijin_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ijin_lab_detail`
--
ALTER TABLE `ijin_lab_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelulusan`
--
ALTER TABLE `kelulusan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `periode_sidang`
--
ALTER TABLE `periode_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode_sidang_skripsi`
--
ALTER TABLE `periode_sidang_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang_lab`
--
ALTER TABLE `ruang_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sempro`
--
ALTER TABLE `sempro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_eligibility`
--
ALTER TABLE `setting_eligibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_nilai_minimal`
--
ALTER TABLE `setting_nilai_minimal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidang_time`
--
ALTER TABLE `sidang_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
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
-- Indexes for table `student_topik`
--
ALTER TABLE `student_topik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_transcript`
--
ALTER TABLE `student_transcript`
  ADD PRIMARY KEY (`student_nrp`,`kode_mk`,`academic_year`,`semester`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `ijin_lab`
--
ALTER TABLE `ijin_lab`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ijin_lab_detail`
--
ALTER TABLE `ijin_lab_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelulusan`
--
ALTER TABLE `kelulusan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `periode_sidang`
--
ALTER TABLE `periode_sidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periode_sidang_skripsi`
--
ALTER TABLE `periode_sidang_skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruang_lab`
--
ALTER TABLE `ruang_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sempro`
--
ALTER TABLE `sempro`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting_eligibility`
--
ALTER TABLE `setting_eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setting_nilai_minimal`
--
ALTER TABLE `setting_nilai_minimal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_topik`
--
ALTER TABLE `student_topik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_USERNAME` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
