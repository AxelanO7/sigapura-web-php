-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2024 at 09:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigapura`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_access`
--

CREATE TABLE `content_access` (
  `caid` int(11) UNSIGNED NOT NULL,
  `modul` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dateaccess` int(11) DEFAULT NULL,
  `dateacess_end` int(11) DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Badung'),
(2, 'Denpasar'),
(3, 'Bangli'),
(4, 'Buleleng'),
(5, 'Gianyar'),
(6, 'Jembrana'),
(7, 'Tabanan'),
(8, 'Karangasam'),
(9, 'Klungkung');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `shrines`
--

CREATE TABLE `shrines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_object` varchar(255) NOT NULL,
  `description_detail` text NOT NULL,
  `description_visual` text NOT NULL,
  `year_of_creation` int(11) NOT NULL,
  `period_of_creation` varchar(255) NOT NULL,
  `name_creator` varchar(255) NOT NULL,
  `creator_style` varchar(255) NOT NULL,
  `main_material` varchar(255) NOT NULL,
  `additional_material` varchar(255) NOT NULL,
  `creation_technique` varchar(255) NOT NULL,
  `ornament` varchar(255) NOT NULL,
  `length` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `physical_condition` varchar(255) NOT NULL,
  `level_of_damage` varchar(255) NOT NULL,
  `country_location` varchar(255) NOT NULL,
  `district_location` varchar(255) NOT NULL,
  `subdistrict_location` varchar(255) NOT NULL,
  `village_location` varchar(255) NOT NULL,
  `functional` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `ownership_history` varchar(255) NOT NULL,
  `historical_value` varchar(255) NOT NULL,
  `cultural_value` varchar(255) NOT NULL,
  `aesthetic_value` varchar(255) NOT NULL,
  `economic_value` varchar(255) NOT NULL,
  `link_shrine` varchar(255) NOT NULL,
  `image_shrine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shrines`
--

INSERT INTO `shrines` (`id`, `created_at`, `updated_at`, `name_object`, `description_detail`, `description_visual`, `year_of_creation`, `period_of_creation`, `name_creator`, `creator_style`, `main_material`, `additional_material`, `creation_technique`, `ornament`, `length`, `height`, `width`, `weight`, `volume`, `physical_condition`, `level_of_damage`, `country_location`, `district_location`, `subdistrict_location`, `village_location`, `functional`, `ownership`, `ownership_history`, `historical_value`, `cultural_value`, `aesthetic_value`, `economic_value`, `link_shrine`, `image_shrine`) VALUES
(11, NULL, NULL, 'Nama', 'porttitor eget dolor morbi non arcu risus quis varius quam quisque id diam vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque mauris odio aenean sed adipiscing diam donec adipiscing tristique risus nec feugiat', '1', 2024, '2023', '1', '1', 'Batu', '1', '1', '1', 1, 1, 1, 1, 1, '1', '1', '', '3', '45', '188', '1', '1', '1', '1', '1', '1', '1', 'https://sketchfab.com/models/795a1df24ebf4f088f57d434db20b9e7/embed', 'LOGO.png'),
(12, NULL, NULL, '2', '2', '2', 2, '2', '2', '2', '2', '2', '2', '2', 2, 2, 2, 2, 2, '2', '2', '', '2', '8', '99', '2', '2', '2', '2', '2', '2', '2', 'https://sketchfab.com/models/a96b9a013bc44aa98c967a70c6b1d712/embed', 'LOGO.png'),
(13, NULL, NULL, '1', '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', 1, 1, 1, 1, 1, '1', '1', '', '9', '32', '635', '1', '1', '1', '1', '1', '1', '1', 'https://sketchfab.com/models/4259554d77174a108af3ab4163f8ea66/embed', 'code.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_district`
--

CREATE TABLE `sub_district` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext DEFAULT NULL,
  `id_district` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_district`
--

INSERT INTO `sub_district` (`id`, `name`, `id_district`) VALUES
(1, 'Kuta', 1),
(2, 'Denpasar Barat', 2),
(3, 'Abiansemal', 1),
(4, 'Kuta Selatan', 1),
(5, 'Kuta Utara', 1),
(6, 'Mengwi', 1),
(7, 'Petang', 1),
(8, 'Denpasar Selatan', 2),
(9, 'Denpasar Timur', 2),
(10, 'Denpasar Utara', 2),
(11, 'Blahbatuh', 5),
(12, 'Payangan', 5),
(13, 'Sukawati', 5),
(14, 'Tampaksiring', 5),
(15, 'Tegalalang', 5),
(16, 'Ubud', 5),
(17, 'Jembrana', 6),
(18, 'Melaya', 6),
(19, 'Mendoyo', 6),
(20, 'Negara', 6),
(21, 'Pekutatan', 6),
(22, 'Abang', 8),
(23, 'Bebandem', 8),
(24, 'Karangasem', 8),
(25, 'Kubu', 8),
(26, 'Manggis', 8),
(27, 'Rendang', 8),
(28, 'Selat', 8),
(29, 'Sidemen', 8),
(30, 'Susut', 8),
(31, 'Banjarangkan', 9),
(32, 'Dawan', 9),
(33, 'Klungkung', 9),
(34, 'Nusapenida', 9),
(35, 'Baturiti', 7),
(36, 'Kediri', 7),
(37, 'Kerambitan', 7),
(38, 'Marga', 7),
(39, 'Penebel', 7),
(40, 'Pupuan', 7),
(41, 'Selemadeg', 7),
(42, 'Selemadeg Barat', 7),
(43, 'Selemadeg Timur', 7),
(44, 'Bangli', 3),
(45, 'Kintamani', 3),
(46, 'Tembuku', 3),
(47, 'Banjar', 4),
(48, 'Buleleng', 4),
(49, 'Busung Biu', 4),
(50, 'Gerokgak', 4),
(51, 'Kubutambahan', 3),
(52, 'Sawan', 4),
(53, 'Seririt', 4),
(54, 'Sukasada', 4),
(55, 'Tejakula', 4),
(56, 'Gianyar', 5),
(57, 'Tabanan', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `status`, `ug_id`) VALUES
(1, 'Gusde Sarasvananda', 'gusde', '578fd4ac8999d2fec553852813a46745', 'Gusde@gmail.com', 1, 1),
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1, 0),
(4, 'Unud_0001', 'unud_0001', '293c5a0d3283f7f115fd15d36fabd7cb', 'admin@kamus.web.oss.id', 1, 0),
(5, 'Unud_0002', 'unud_0002', '293c5a0d3283f7f115fd15d36fabd7cb', 'admin@kamus.web.oss.id', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `ug_id` int(11) NOT NULL,
  `ug_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`ug_id`, `ug_name`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext DEFAULT NULL,
  `id_sub_district` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`id`, `name`, `id_sub_district`) VALUES
(1, 'Kedonganan', 1),
(26, 'Abiansemal', 3),
(27, 'Angantaka', 3),
(28, 'Ayunan', 3),
(29, 'Blahkiuh', 3),
(30, 'Bongkasa', 3),
(31, 'Bongkasa Pertiwi', 3),
(32, 'Darmasaba', 3),
(33, 'Dauh Yeh Cani', 3),
(34, 'Jagapati', 3),
(35, 'Mambal', 3),
(36, 'Mekar Bhuana', 3),
(37, 'Punggul', 3),
(38, 'Sangeh', 3),
(40, 'Sedang', 3),
(41, 'Selat', 3),
(42, 'Sibang Gede', 3),
(43, 'Sibang Kaja', 3),
(44, 'Taman', 3),
(45, 'Kedonganan', 1),
(46, 'Tuban', 1),
(47, 'Kuta', 1),
(48, 'Legian', 1),
(49, 'Seminyak', 1),
(50, 'Benoa', 4),
(51, 'Tanjung Benoa', 4),
(52, 'Jimbaran', 4),
(53, 'Pecatu', 4),
(54, 'Ungasan', 4),
(55, 'Kutuh', 4),
(56, 'Canggu', 5),
(57, 'Dalung', 5),
(58, 'Tibuneneng', 5),
(59, 'Kerobokan', 5),
(60, 'Kerobokan Kelod', 5),
(61, 'Kerobokan Kaja', 5),
(62, 'Abianbase', 6),
(63, 'Kapal', 5),
(64, 'Lukluk', 6),
(65, 'Sading', 6),
(66, 'Sempidi', 6),
(67, 'Baha', 6),
(68, 'Buduk', 6),
(69, 'Cemagi', 6),
(70, 'Gulingan', 6),
(71, 'Kekeran', 6),
(72, 'Kuwum', 6),
(73, 'Mengwi', 6),
(74, 'Mengwitani', 6),
(75, 'Munggu', 6),
(76, 'Penarungan', 6),
(77, 'Pererenan', 6),
(78, 'Sembung', 6),
(79, 'Sobangan', 6),
(80, 'Tumbak Bayuh', 6),
(81, 'Werdi Bhuwana', 6),
(82, 'Belok', 7),
(83, 'Carangsari', 7),
(84, 'Getasan', 7),
(85, 'Pangsan', 7),
(86, 'Pelaga', 7),
(87, 'Sulangai', 7),
(88, 'Dangin Puri Kaja', 2),
(89, 'Dangin Puri Kauh', 2),
(90, 'Dauh Puri Kaja', 2),
(91, 'Dauh Puri Kauh', 2),
(92, 'Dauh Puri Klod', 2),
(93, 'Padangsambian Kaja', 2),
(94, 'Padangsambian Kelod', 2),
(95, 'Pemecutan Kaja', 2),
(96, 'Pemecutan Kelod', 2),
(97, 'Tegal Harum', 2),
(98, 'Tegal Kerta', 2),
(99, 'Sanur Kaja', 8),
(100, 'Sanur Kauh', 8),
(101, 'Sidakarya', 8),
(102, 'Panjer', 8),
(103, 'Pedungan', 8),
(104, 'Renon', 8),
(105, 'Sanur', 8),
(106, 'Serangan', 8),
(107, 'Sesetan', 8),
(108, 'Dangin Puri Klod', 9),
(109, 'Kesiman Kertalangu', 9),
(110, 'Kesiman Petilan', 9),
(111, 'Penatih Dangin Puri', 9),
(112, 'Sumerta Kaja', 9),
(113, 'Sumerta Kauh', 9),
(114, 'Sumerta Klod/Kelod', 9),
(115, 'Dangin Puri', 9),
(116, 'Kesiman', 9),
(117, 'Penatih', 9),
(118, 'Sumerta', 9),
(119, 'Dauh Puri Kaja', 10),
(120, 'Dauh Puri Kangin', 10),
(121, 'Dauh Puri Kauh', 10),
(122, 'Peguyangan Kaja', 10),
(123, 'Peguyangan Kangin', 10),
(124, 'Pemecutan Kaja', 10),
(125, 'Ubung Kaja', 10),
(126, 'Peguyangan', 10),
(127, 'Tonja', 10),
(128, 'Ubung', 10),
(129, 'Bunutin', 44),
(130, 'Kayubihi', 44),
(131, 'Landih', 44),
(132, 'Pengotan', 44),
(133, 'Taman Bali', 44),
(134, 'Bebalang', 44),
(135, 'Cempaga', 44),
(136, 'Kawan', 44),
(137, 'Kubu', 44),
(188, 'Abangsongan', 45),
(189, 'Abuan', 45),
(190, 'Awan', 45),
(191, 'Bantang', 45),
(192, 'Banua', 45),
(193, 'Batudinding', 45),
(194, 'Batukaang', 45),
(195, 'Batur Selatan', 45),
(196, 'Batur Tengah', 45),
(197, 'Batur Utara', 45),
(198, 'Bayungcerik', 45),
(199, 'Bayung Gede', 45),
(200, 'Belancan', 45),
(201, 'Belandingan', 45),
(202, 'Belanga', 45),
(203, 'Belantih', 45),
(204, 'Binyan', 45),
(205, 'Bonyoh', 45),
(206, 'Buahan', 45),
(207, 'Bunutin', 45),
(208, 'Catur', 45),
(209, 'Daup', 45),
(210, 'Dausa', 45),
(211, 'Gunungbau', 45),
(212, 'Katung', 45),
(213, 'Kedisan', 45),
(214, 'Kintamani', 45),
(215, 'Kutuh', 45),
(216, 'Langgahan', 45),
(217, 'Lembean', 45),
(218, 'Mangguh', 45),
(219, 'Manikliyu', 45),
(220, 'Mengani', 45),
(221, 'Pengejaran', 45),
(222, 'Pinggan', 45),
(223, 'Satra', 45),
(224, 'Sekaan', 45),
(225, 'Sekardadi', 45),
(226, 'Selulung', 45),
(227, 'Serai', 45),
(228, 'Siakin', 45),
(229, 'Songan A', 45),
(230, 'Songan B', 45),
(231, 'Subaya', 45),
(232, 'Sukawana', 45),
(233, 'Suter', 45),
(234, 'Terunyan', 45),
(235, 'Ulian', 45),
(236, 'Apuan', 30),
(237, 'Demulih', 30),
(238, 'Pengiangan', 30),
(239, 'Penglumbaran', 30),
(240, 'Selat', 30),
(241, 'Sulahan', 30),
(242, 'Susut', 30),
(243, 'Tiga', 30),
(244, 'Bangbang', 46),
(245, 'Jehem', 46),
(246, 'Peninjoan', 46),
(247, 'Tembuku', 46),
(248, 'Undisan', 46),
(249, 'Undisan', 46),
(250, 'Yangapi', 46),
(251, 'Banjar Tegeha', 47),
(252, 'Banyuatis', 47),
(253, 'Banyuseri', 47),
(254, 'Cempaga', 47),
(255, 'Dencarik', 47),
(256, 'Gesing', 47),
(257, 'Gobleg', 47),
(258, 'Kaliasem', 47),
(259, 'Kayuputih', 47),
(260, 'Munduk', 47),
(261, 'Pedawa', 47),
(262, 'Sidetapa', 47),
(263, 'Tampekan', 47),
(264, 'Temukus', 47),
(265, 'Temukus', 47),
(266, 'Tigawasa', 47),
(267, 'Tirtasari', 47),
(268, 'Alasangker', 48),
(269, 'Anturan', 48),
(270, 'Bakti Seraga', 48),
(271, 'Jinengdalem', 48),
(272, 'Kalibukbuk', 48),
(273, 'Nagasepaha', 48),
(274, 'Pemaron', 48),
(275, 'Penglatan', 48),
(276, 'Petandakan', 48),
(277, 'Poh Bergong', 48),
(278, 'Sari Mekar', 48),
(279, 'Tukadmungga', 48),
(280, 'Astina', 48),
(281, 'Banjar Bali', 48),
(282, 'Banjar Jawa', 48),
(283, 'Banjar Tegal', 48),
(284, 'Banyuasri', 48),
(285, 'Banyuning', 48),
(286, 'Beratan', 48),
(287, 'Kaliuntu', 48),
(288, 'Kampung Anyar', 48),
(289, 'Kampung Baru', 48),
(290, 'Kampung Bugis', 48),
(291, 'Kampung Kajanan', 48),
(292, 'Kampung Singaraja', 48),
(293, 'Kendran', 48),
(294, 'Liligundi', 48),
(295, 'Paket Agung', 48),
(296, 'Penarukan', 48),
(297, 'Bengkel', 49),
(298, 'Bongancina', 49),
(299, 'Busung Biu', 49),
(300, 'Kedis', 49),
(301, 'Kekeran', 49),
(302, 'Pelapuan', 49),
(303, 'Pucuksari', 49),
(304, 'Sepang', 49),
(305, 'Sepang Kelod', 49),
(306, 'Subuk', 49),
(307, 'Telaga', 49),
(308, 'Tinggarsari', 49),
(309, 'Tista', 49),
(310, 'Titab', 49),
(311, 'Umejero', 49),
(312, 'Banyupoh', 50),
(313, 'Celukanbawang', 50),
(314, 'Gerokgak', 50),
(315, 'Musi', 50),
(316, 'Patas', 50),
(317, 'Pejarakan', 50),
(318, 'Pemuteran', 50),
(319, 'Pengulon', 50),
(320, 'Penyabangan', 50),
(321, 'Sanggalangit', 50),
(322, 'Sumberklampok', 50),
(323, 'Sumberklima', 50),
(324, 'Tinga-Tinga', 50),
(325, 'Tukadsumaga', 50),
(326, 'Bengkala', 51),
(327, 'Bila', 51),
(328, 'Bontihing', 51),
(329, 'Bukti', 51),
(330, 'Bulian', 51),
(331, 'Depeha', 51),
(332, 'Kubutambahan', 51),
(333, 'Mengening', 51),
(334, 'Pakisan', 51),
(335, 'Tajun', 51),
(336, 'Tambakan', 51),
(337, 'Tamblang', 51),
(338, 'Tunjung', 51),
(339, 'Bebetin', 52),
(340, 'Bungkulan', 52),
(341, 'Galungan', 52),
(342, 'Galungan', 52),
(343, 'Giri Emas', 52),
(344, 'Jagaraga', 52),
(345, 'Kerobakan', 52),
(346, 'Lemukih', 52),
(347, 'Menyali', 52),
(348, 'Sangsit', 52),
(349, 'Sawan', 52),
(350, 'Sekumpul', 52),
(351, 'Sinabun', 52),
(352, 'Sudaji', 52),
(353, 'Suwung', 52),
(354, 'Banjar Asem', 53),
(355, 'Bestala', 53),
(356, 'Bubunan', 53),
(357, 'Gunungsari', 53),
(358, 'Joanyar', 53),
(359, 'Kaliangel', 53),
(360, 'Kalisada', 53),
(361, 'Lokapaksa', 53),
(362, 'Mayong', 53),
(363, 'Munduk Bestala', 53),
(364, 'Pangkung Paruk', 53),
(365, 'Patemon', 53),
(366, 'Pengastulan', 53),
(367, 'Rangdu', 53),
(368, 'Ringdikit', 53),
(369, 'Sulanyah', 53),
(370, 'Tanggungwisia', 53),
(371, 'Ularan', 53),
(372, 'Umeanyar', 53),
(373, 'Unggahan', 53),
(374, 'Seririt', 53),
(375, 'Ambengan', 54),
(376, 'Git Git', 54),
(377, 'Kayu Putih', 54),
(378, 'Padang Bulia', 54),
(379, 'Pancasari', 54),
(380, 'Panji', 54),
(381, 'Panji Anom', 54),
(382, 'Pegadungan', 54),
(383, 'Pegayaman', 54),
(384, 'Sambangan', 54),
(385, 'Selat', 54),
(386, 'Silangiani', 54),
(387, 'Tegal Linggah', 54),
(388, 'Wanagiri', 54),
(389, 'Sukasada', 54),
(390, 'Bondalam', 55),
(391, 'Julah', 55),
(392, 'Les', 55),
(393, 'Medenan', 55),
(394, 'Pacung', 55),
(395, 'Penuktukan', 55),
(396, 'Sambirenteng', 55),
(397, 'Sembiran', 55),
(398, 'Tejakula', 55),
(399, 'Tembok', 55),
(400, 'Bakbakan', 56),
(401, 'Lebih', 56),
(402, 'Petak', 56),
(403, 'Petak Kaja', 56),
(404, 'Serongga', 56),
(405, 'Siangan', 56),
(406, 'Sidan', 56),
(407, 'Sumita', 56),
(408, 'Suwat', 56),
(409, 'Tegal Tugu', 56),
(410, 'Temesi', 56),
(411, 'Tulikup', 56),
(412, 'Abianbase', 56),
(413, 'Beng', 56),
(414, 'Bitera', 56),
(415, 'Gianyar', 56),
(416, 'Samplangan', 56),
(417, 'Bresela', 12),
(418, 'Buahan', 12),
(419, 'Buahan Kaja', 12),
(420, 'Bukian', 12),
(421, 'Kelusa', 12),
(422, 'Kerta', 12),
(423, 'Kerta', 12),
(424, 'Melinggih', 12),
(425, 'Melinggih Kelod', 12),
(426, 'Puhu', 12),
(427, 'Batuan', 13),
(428, 'Batuan Kaler', 13),
(429, 'Batubulan', 13),
(430, 'Batubulan Kangin', 13),
(431, 'Celuk', 13),
(432, 'Manukaya', 14),
(433, 'Pejeng', 14),
(434, 'Pejeng Kaja', 14),
(435, 'Pejeng Kangin', 14),
(436, 'Pajak Kawan', 14),
(437, 'Pejeng Kelod', 14),
(438, 'Sanding', 14),
(439, 'Tampaksiring', 14),
(440, 'Kedisan', 15),
(441, 'Keliki', 15),
(442, 'Kendran', 15),
(443, 'Pupuan', 15),
(444, 'Sebatu', 15),
(445, 'Taro', 15),
(446, 'Tegallalang', 15),
(447, 'Kedewatan', 16),
(448, 'Lodtunduh', 16),
(449, 'Mas', 16),
(450, 'Peliatan', 16),
(451, 'petulu', 16),
(452, 'Sayan', 16),
(453, 'Sungakerta', 16),
(454, 'Ubud', 16),
(455, 'Air Kuning', 17),
(456, 'Batuagung', 17),
(457, 'Budeg', 17),
(458, 'Dauhwaru', 17),
(459, 'Loloan Timur', 17),
(460, 'Pendem', 17),
(461, 'Sangkaragung', 17),
(462, 'Bimbing Sari', 18),
(463, 'Candikusuma', 18),
(464, 'Ekasari', 18),
(465, 'Manisputu', 18),
(466, 'Melaya', 18),
(467, 'Nusasari', 18),
(468, 'Tukadaya', 18),
(469, 'Tuwed', 18),
(470, 'Warnasari', 18),
(471, 'Gilimanuk', 18),
(472, 'Delod Berawah', 19),
(473, 'Mendoyo Dangin Tukad', 19),
(474, 'Mendoyo Dauh Tukad', 19),
(475, 'Penyaringan', 19),
(476, 'Pergung', 19),
(477, 'Pohsanten', 19),
(478, 'Yeh Embang', 19),
(479, 'Yeh Embang Kangin', 19),
(480, 'Yeh Embang Kauh', 19),
(481, 'Yeh Sumbul', 19),
(482, 'Tegal Cangkring', 19),
(483, 'Baluk', 20),
(484, 'Banyubiru', 20),
(485, 'Berangbang', 20),
(486, 'Cupel', 20),
(487, 'Kaliakah', 20),
(488, 'Pengambengan', 20),
(489, 'Tegal Badeng Barat', 20),
(490, 'Tegal Badeng Timur', 20),
(491, 'Banjar Bale Agung', 20),
(492, 'Banjar Tengah', 20),
(493, 'Lelateng', 20),
(494, 'Loloan Barat', 20),
(495, 'Asahduren', 21),
(496, 'Pengragoan', 21),
(497, 'Pulukan', 21),
(498, 'Gumbrih', 21),
(499, 'Manggissari', 21),
(500, 'Medewi', 21),
(501, 'Pangyangan', 21),
(502, 'Pekutatan', 21),
(503, 'Pengragoan', 21),
(504, 'Pulukan', 21),
(505, 'Ababi', 22),
(506, 'Abang', 22),
(507, 'Bunutan', 22),
(508, 'Culik', 22),
(509, 'Datah', 22),
(510, 'Kerta Mandala', 22),
(511, 'Kesimpar', 22),
(512, 'labasari', 22),
(513, 'Nawa Kerthi', 22),
(514, 'Pidpid', 22),
(515, 'Puewakerti', 22),
(516, 'Tista', 22),
(517, 'Tiyingtali', 22),
(518, 'Tri Bhuana', 22),
(519, 'Bebandem', 23),
(520, 'Buana Giri', 23),
(521, 'Budakeling', 23),
(522, 'Budakeling', 23),
(523, 'Bungaya', 23),
(524, 'Bungaya Kangin', 23),
(525, 'Jungutan', 23),
(526, 'Macang', 23),
(527, 'Sibetan', 23),
(528, 'Bugbug', 24),
(529, 'Bukit', 24),
(530, 'Pertima', 24),
(531, 'Seraya Barat', 24),
(532, 'Seraya Tengah', 24),
(533, 'Seraya Timur', 24),
(534, 'Tengallinggah', 24),
(535, 'Tumbu', 24),
(536, 'Subagan', 24),
(537, 'Padang Kerta', 24),
(538, 'Karangasem', 24),
(539, 'Ban', 25),
(540, 'Baturinggit', 25),
(541, 'Dukuh', 25),
(542, 'Kubu', 25),
(543, 'Sukadana', 25),
(544, 'Tianyar', 25),
(545, 'Tianyar Barat', 25),
(546, 'Tianyar Tengah', 25),
(547, 'Tulamben', 25),
(548, 'Antiga', 26),
(549, 'Antiga Kelod', 26),
(550, 'Gegelang', 26),
(551, 'Manggis', 26),
(552, 'Ngis', 26),
(553, 'Nyuhtebel', 26),
(554, 'Padangbai', 26),
(555, 'Pesedahan', 26),
(556, 'Selumbung', 26),
(557, 'Sengkidu', 26),
(558, 'Tenganan', 26),
(559, 'Ulakan', 26),
(560, 'Besakih', 27),
(561, 'Menanga', 27),
(562, 'Nongan', 27),
(563, 'Pempatan', 27),
(564, 'Pempatan', 27),
(565, 'Pesaban', 27),
(566, 'Rendang', 27),
(567, 'Amertha Buana', 28),
(568, 'Duda', 28),
(569, 'Duda Timur', 28),
(570, 'Duda Utara', 28),
(571, 'Muncan', 28),
(572, 'Santi', 28),
(573, 'Pering Sari', 28),
(574, 'Sebudi', 28),
(575, 'Selat', 28),
(576, 'Kertha Buana', 29),
(577, 'Lokasari', 29),
(578, 'Sangkan Gunung', 29),
(579, 'Sidemen', 29),
(580, 'Sindu Wati', 29),
(581, 'Talibeng', 29),
(582, 'Tangkup', 29),
(583, 'Telaga Tawang', 29),
(584, 'Tri Eka Buana', 29),
(585, 'Wisma Kerta', 29),
(631, 'Aan ', 31),
(632, 'Dawan Kaler', 32),
(633, 'Dawan Klod', 32),
(634, 'Gunakasa', 32),
(635, 'Kampung Kusamba', 32),
(636, 'Kusumba', 32),
(637, 'Paksebali', 32),
(638, 'Pesinggahan', 32),
(639, 'Pikat', 32),
(640, 'Sampalan Klod', 32),
(641, 'Sampalan Tengah', 32),
(642, 'Sulang', 32),
(643, 'Akah', 33),
(644, 'Gelgel', 33),
(645, 'Jumpai', 33),
(646, 'Kamasan', 33),
(647, 'Kampung Gelgel', 33),
(648, 'Manduang', 33),
(649, 'Satra', 33),
(650, 'Selat', 33),
(651, 'Selisihan', 33),
(652, 'Tangkas', 33),
(653, 'Tegak', 33),
(654, 'Tojan', 33),
(655, 'Semarapura Kaja', 33),
(656, 'Semarapura Kangin', 33),
(657, 'Semarapura Kauh', 33),
(658, 'Semarapura Klod', 33),
(659, 'Semarapura Klod Kangin', 33),
(660, 'Semarapura Tengah', 33),
(661, 'Batukandik', 34),
(662, 'Batumadeg', 34),
(663, 'Batununggul', 34),
(664, 'Bunga Mekar', 34),
(665, 'Jungutbatu', 34),
(666, 'Kampung Toyapakeh', 34),
(667, 'Klumpu', 34),
(668, 'Kutampi Kaler', 34),
(669, 'Lembongan', 34),
(670, 'Ped', 34),
(671, 'Pejukatan', 34),
(672, 'Sakti', 34),
(673, 'Sekartaji', 34),
(674, 'Suana', 34),
(675, 'Tanglad', 34),
(676, 'Angseri', 35),
(677, 'Antapan', 35),
(678, 'Apuan', 35),
(679, 'Bangli', 35),
(680, 'Batunya', 35),
(681, 'Baturiti', 35),
(682, 'Candikuning', 35),
(683, 'Luwus', 35),
(684, 'Mekarsari', 35),
(685, 'Perean', 35),
(686, 'Perean Kangin', 35),
(687, 'Perean Tengah', 35),
(688, 'Abian Tuwung', 36),
(689, 'Banjar Anyar', 36),
(690, 'Belalang', 36),
(691, 'Bengkel', 36),
(692, 'Beraban', 36),
(693, 'Buwit', 36),
(694, 'Cepaka', 36),
(695, 'Kaba-kaba', 36),
(696, 'Kediri', 36),
(697, 'Nyambu', 36),
(698, 'Nyitdah', 36),
(699, 'Pandak Bandung', 36),
(700, 'Pandak Gede', 36),
(701, 'Pangkung Tibah', 36),
(702, 'Pejaten', 36),
(703, 'Batuaji', 37),
(704, 'Baturiti', 37),
(705, 'Belumbang', 37),
(706, 'Kelating', 37),
(707, 'Kerambitan', 37),
(708, 'Kesiut', 37),
(709, 'Kukuh', 37),
(710, 'Meling', 37),
(711, 'Pangkung Karung', 37),
(712, 'Penarukan', 37),
(713, 'Samsam', 37),
(714, 'Sembung Gede', 37),
(715, 'Tibubiu', 37),
(716, 'Timpag', 37),
(717, 'Tista', 37),
(718, 'Baru', 38),
(719, 'Batannyuh', 38),
(720, 'Beringkit', 38),
(721, 'Cau Belayu', 38),
(722, 'Geluntung', 38),
(723, 'Kukuh', 38),
(724, 'Marga Dajan Puri', 38),
(725, 'Marga Dauh Puri', 38),
(726, 'Payangan', 38),
(727, 'Peken', 38),
(728, 'Petiga', 38),
(729, 'Selanbawak', 38),
(730, 'Tegaljadi', 38),
(731, 'Tua', 38),
(732, 'Babahan', 39),
(733, 'Biaung', 39),
(734, 'Buruan', 39),
(735, 'Jatiluwih', 39),
(736, 'Jegu', 39),
(737, 'Mengesta', 39),
(738, 'Penatahan', 39),
(739, 'Penebel', 39),
(740, 'Pesagi', 39),
(741, 'Pitra', 39),
(795, 'Rianggede', 39),
(796, 'Sangketan', 39),
(797, 'Senganan', 39),
(798, 'Tajen', 39),
(799, 'Tegallinggah', 39),
(800, 'Tengkudak', 39),
(801, 'Wongaya Gede', 39),
(802, 'Bantiran', 40),
(803, 'Batungsel', 40),
(804, 'Belatungan', 40),
(805, 'Belimbing', 40),
(806, 'Jelijih Punggang', 40),
(807, 'Karya Sari', 40),
(808, 'Kebon Padangan', 40),
(809, 'Munduk Temu', 40),
(810, 'Padangan', 40),
(811, 'Pajahan', 40),
(812, 'Pujungan', 40),
(813, 'Pupuan', 40),
(814, 'Sai', 40),
(815, 'Sanda', 40),
(816, 'Antap', 41),
(817, 'Bajera', 41),
(818, 'Bajera Utara', 41),
(819, 'Berembeng', 41),
(820, 'Manikyang', 41),
(821, 'Pupuan Sawah', 41),
(822, 'Selemadeg', 41),
(823, 'Serampingan', 41),
(824, 'Wanagiri', 41),
(825, 'Wanagiri Kauh', 41),
(826, 'Angkah', 42),
(827, 'Antosari', 42),
(828, 'Bengkel Sari', 42),
(829, 'Lajang Linggah', 42),
(830, 'Lumbung', 42),
(831, 'Lumbung Kauh', 42),
(832, 'Mundeh', 42),
(833, 'Mundeh Kangin', 42),
(834, 'Mundeh Kauh', 42),
(835, 'Selabih', 42),
(836, 'Tiying Gading', 42),
(837, 'Bantas', 43),
(838, 'Beraban', 43),
(839, 'Dalang', 43),
(840, 'Gadungan', 43),
(841, 'Gadung Sari', 43),
(842, 'Gunung Salak', 43),
(843, 'Mambang', 43),
(844, 'Megati', 43),
(845, 'Tangguntiti', 43),
(846, 'Tegal Mengkeb', 43),
(847, 'Bongan', 57),
(848, 'Buahan', 57),
(849, 'Dajan Peken', 57),
(850, 'Dauh Peken', 57),
(851, 'Delod Peken', 57),
(852, 'Denbantas', 57),
(853, 'Gubug', 57),
(854, 'Subamia', 57),
(855, 'Sudimara', 57),
(856, 'Tunjuk', 57),
(857, 'Wanasari', 57);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `country_region` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `created_at`, `updated_at`, `name`, `country_region`, `gender`) VALUES
(1, '2024-02-14 20:29:59', NULL, 'visitor1', 'indonesia', 'l'),
(2, '2024-07-08 20:32:20', NULL, 'test', 'test', 'test'),
(3, '2024-04-02 20:32:32', NULL, 'test2', 'test2', 'test2'),
(4, '2024-01-07 13:26:11', '2024-01-07 13:26:11', 'b', 'b', 'b'),
(5, '2024-01-07 13:34:00', '2024-01-07 13:34:00', 'test_register', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_access`
--
ALTER TABLE `content_access`
  ADD PRIMARY KEY (`caid`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shrines`
--
ALTER TABLE `shrines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_district`
--
ALTER TABLE `sub_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subdistrict_district` (`id_district`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`ug_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_village_subdistrict` (`id_sub_district`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_access`
--
ALTER TABLE `content_access`
  MODIFY `caid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shrines`
--
ALTER TABLE `shrines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_district`
--
ALTER TABLE `sub_district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=859;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_district`
--
ALTER TABLE `sub_district`
  ADD CONSTRAINT `fk_subdistrict_district` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`);

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `fk_village_subdistrict` FOREIGN KEY (`id_sub_district`) REFERENCES `sub_district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
