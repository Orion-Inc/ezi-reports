-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 08:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezi_reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `ezi_admin`
--

CREATE TABLE `ezi_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ezi_admin`
--

INSERT INTO `ezi_admin` (`id`, `username`, `password`, `token`, `created_at`, `updated_at`) VALUES
(1, 'eziAdmin', '8cb2237d0679ca88db6464eac60da96345513964', '5467218fc625bccbfbafac8971ba819020c16501868a89016900798e3991', '2018-01-06 12:32:45', '2018-02-11 19:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_course`
--

CREATE TABLE `ezi_course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_type` enum('basic','secondary') NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_prefix` varchar(3) NOT NULL,
  `course_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_course`
--

INSERT INTO `ezi_course` (`course_id`, `course_code`, `course_type`, `course_name`, `course_prefix`, `course_description`) VALUES
(6, 'CSGEA3640', 'secondary', 'General Arts', 'GEA', 'The Arts'),
(7, 'CSGES8093', 'secondary', 'General Science', 'GES', 'Science it is'),
(8, 'CSVIA4496', 'secondary', 'Visual Arts', 'VIA', 'Drawings and such'),
(9, 'CSBUS9397', 'secondary', 'Business', 'BUS', 'Accounting and such'),
(10, 'CSJHS3493', 'basic', 'JHS', 'JHS', 'Junior High School Course'),
(11, 'CSPRI6070', 'basic', 'Primary', 'PRI', 'Primary'),
(12, 'CSHOE7220', 'secondary', 'Home Economics', 'HOE', 'Cooking and stuff');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_school`
--

CREATE TABLE `ezi_school` (
  `school_id` int(11) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `school_prefix` varchar(3) NOT NULL,
  `school_type` enum('basic','secondary') DEFAULT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_motto` text,
  `school_location` text NOT NULL,
  `school_address` text,
  `school_email` varchar(255) DEFAULT NULL,
  `school_telephone` text NOT NULL,
  `school_website` varchar(200) DEFAULT NULL,
  `school_crest` longblob,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_school`
--

INSERT INTO `ezi_school` (`school_id`, `school_code`, `school_prefix`, `school_type`, `school_name`, `school_motto`, `school_location`, `school_address`, `school_email`, `school_telephone`, `school_website`, `school_crest`, `created_at`, `updated_at`) VALUES
(3, 'SCH00317', '', 'basic', 'A M E ZION EDUCATIONAL UNIT', '', '69A/17 11TH STREET SEKONDI , Sekondi-Takoradi', '', '', '', 'http://amezion.com', NULL, '0000-00-00 00:00:00', '2017-12-31 12:33:47'),
(4, 'SCH00417', '', 'basic', 'A.M.A. ANNE HEALTH ACADEMY', NULL, 'OFORIKROM, Atwima Kwanwoma', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'SCH00517', '', 'basic', 'ABIBIMAN INTERNATIONAL SCHOOL', NULL, 'KWADASO, Kwabre', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'SCH00617', '', 'basic', 'ABOABOMAN PREPARATOY &JSS', NULL, 'Dormaa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'SCH00717', '', 'basic', 'ABOASO HOLY QURAN PRIMARY & JHS', NULL, 'Kwabre', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'SCH00817', '', 'basic', 'ACCRA GRAMMAR SCHOOL', NULL, 'GA', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'SCH00917', '', 'basic', 'ACCRA INSTITUTE OF TECHNOLOGY', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'SCH01017', '', 'basic', 'ACHIMOTA PRIMARY/JSS', NULL, 'Achimota, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'SCH01117', '', 'basic', 'ACROPOLIS MARANATHA', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'SCH01217', '', 'basic', 'ADOM PREP - KOKUA', NULL, 'Jaman North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'SCH01317', '', 'basic', 'ADUNA INTERNATIONAL SCHOOL', NULL, 'Asante Akim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'SCH01417', '', 'basic', 'ADVENT REFORMED INSTITUTE', NULL, 'Kwaebibirem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'SCH01517', '', 'basic', 'ADVENTIST PREPARATORY SCHOOL', NULL, 'OLD TAFO, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'SCH01617', '', 'basic', 'AIPORT POLICE SCHOOLS', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'SCH01717', '', 'basic', 'ALBERT SAM MEMORAIL PREPARATORY SCHOOL', NULL, 'F73/4, INNDER RING ROAD CAPE , Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'SCH01817', '', 'basic', 'ALL SAINTS ACADEMY', NULL, 'ASANKRAGWA, Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'SCH01917', '', 'basic', 'ALL SAINTS ANGLICAN PREP.', NULL, 'ASOKWA , Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'SCH02017', '', 'basic', 'ALL SAINTS PREPARATORY SCHOOL', NULL, 'ADIEMBRA, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'SCH02117', '', 'basic', 'AMANPENE SERWA JUBILEE INTERNATIONAL SCHOOL', NULL, 'AYIGYA, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'SCH02217', '', 'basic', 'AMAZING GRACE PREP', NULL, 'KOTEI DEDUAKO, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'SCH02317', '', 'basic', 'AMAZING LOVE SCHOOL', NULL, 'DENU, Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'SCH02417', '', 'basic', 'AMBASSADOR INTERNATIONAL/JSS', NULL, 'SUSANSO, Amansie Central', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'SCH02517', '', 'basic', 'ANGELS ACADEMY', NULL, 'GA', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'SCH02617', '', 'basic', 'ANGELS SPECIALIST SCHOOL', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'SCH02717', '', 'basic', 'ANGLICAN EDUCATION UNIT', NULL, 'CAPE COAST, Cape Coast Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'SCH02817', '', 'basic', 'ANGLICAN EDUCATION UNIT', NULL, 'SEKONDI, Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'SCH02917', '', 'basic', 'ANNOR ADJAYE', NULL, 'Ahanta West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'SCH03017', '', 'basic', 'APOSTOLIC GOLDEN JUBILEE PREP/SCHOOL', NULL, 'ASH-TOWN , Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'SCH03117', '', 'basic', 'ASCENSION EXPERIMENTAL SCHOOL', NULL, 'ATONSU, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'SCH03217', '', 'basic', 'ASHAIMAN NO. 3 JHS', NULL, 'Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'SCH03317', '', 'basic', 'ASHALLEY BOTWE ST. PAUL\'S', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'SCH03417', '', 'basic', 'ASPIRE INTERNATIONAL SCHOOL', NULL, 'Ashiaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'SCH03517', '', 'basic', 'ASSIN ASAMANKESE D/A', NULL, 'Assin South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'SCH03617', '', 'basic', 'ASSOCIATION INTERNATIONAL SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'SCH03717', '', 'basic', 'AWUSCO MODEL J.H.S', NULL, 'Ho Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'SCH03817', '', 'basic', 'AWUSCO MODEL J.H.S', NULL, 'Ho Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'SCH03917', '', 'basic', 'BELIEVERS INTERNATIONAL SCHOOL', NULL, 'BREMAN NKOTWEMA, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'SCH04017', '', 'basic', 'BEST WAY INTERNATIONAL/JSS', NULL, 'KWADASO , Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'SCH04117', '', 'basic', 'BETHEL METHODIST PREP/JSS', NULL, 'KWADASO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'SCH04217', '', 'basic', 'BETHEL METHODIST PREPARATORY/JSS', NULL, 'TAKORADI , Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'SCH04317', '', 'basic', 'BETHEL PREP SCHOOL', NULL, 'NORTH SUNTRESO, Adansi North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'SCH04417', '', 'basic', 'BISHOP BOWERS', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'SCH04517', '', 'basic', 'BISHOP SARPONG INTERNATIONAL/JSS', NULL, 'MAAKRO, Bosom/Atwima/Kwaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'SCH04617', '', 'basic', 'BLESSED SCHOOL COMPLEX', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'SCH04717', '', 'basic', 'BREMAN BAPTIST PREP', NULL, 'BREMAN, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'SCH04817', '', 'basic', 'CALL OF HOPE PREP. SCHOOL', NULL, 'NYINYAWASO, Kwabere East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'SCH04917', '', 'basic', 'CALVARY A/G TEMPLE SCHOOL', NULL, 'TIKESE , Kwabere East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'SCH05017', '', 'basic', 'CALVARY INTERNATIONAL SCHOOL', NULL, 'OLD TAFO, Kwabere East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'SCH05117', '', 'basic', 'CAMBRIDGE ACADEMY', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'SCH05217', '', 'basic', 'CAMBRIDGE INTERNATIONAL SCHOOL', NULL, 'OLD SITE 18 BLOCK 2 KWADASO, Mampong', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'SCH05317', '', 'basic', 'CANADIAN INDEPENDENT COLLEGE OF GHANA', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'SCH05417', '', 'basic', 'CENTRAL INTERNATIONAL SCHOOL', NULL, 'Kumasi, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'SCH05517', '', 'basic', 'CHAPEL HILL PREPARATORY SCHOOL', NULL, 'TAKORADI , Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'SCH05617', '', 'basic', 'CHRIST PREPARATORY SCHOOL', NULL, 'PLOT 14, BLOCK C BOMSO, Bosom/Atwima/Kwaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'SCH05717', '', 'basic', 'CHRIST STANDARD INTERNATIONAL', NULL, 'MPATASE, Mampong', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'SCH05817', '', 'basic', 'CHRIST THE KING', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'SCH05917', '', 'basic', 'CHRIST THE KING', NULL, 'Jomoro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'SCH06017', '', 'basic', 'CHRISTIAN SCHOLARS INTERNATIONL/JSS', NULL, 'KWADASO, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'SCH06117', '', 'basic', 'CHURCH OF CHRIST EXPERIMENTAL', NULL, 'NORTH SUNTRESO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'SCH06217', '', 'basic', 'CHURCH OF CHRIST INTERNATIONAL', NULL, 'AHINSAN, Amansie Central', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'SCH06317', '', 'basic', 'CITY EDUCATIONAL COMPLEX', NULL, 'BOHYEN NEAR ABREPO KUMASI, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'SCH06417', '', 'basic', 'CORPUS CHRISTI', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'SCH06517', '', 'basic', 'COSMOS', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'SCH06617', '', 'basic', 'COSMOS BASIC SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'SCH06717', '', 'basic', 'CREATIVE INTERNATIONAL SCHOOL', NULL, 'KENTINKRONO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'SCH06817', '', 'basic', 'CROWN PRINCE ACADEMY', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'SCH06917', '', 'basic', 'DAM LYCEUM', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'SCH07017', '', 'basic', 'DAN-IBU INTERNATIONAL SCHOOL', NULL, 'KAMBALI SECTION , Wa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'SCH07117', '', 'basic', 'DATANO METHODIST JUNIOR HIGH SCHOOL', NULL, 'Amansie West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'SCH07217', '', 'basic', 'DATUS COMPLEX SCHOOLS', NULL, 'Bubuashie Near Cable & Wireless, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'SCH07317', '', 'basic', 'DAYSPRING MONTESSORI', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'SCH07417', '', 'basic', 'DAYSPRING MONTESSORI INTERNATIONAL SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'SCH07517', '', 'basic', 'DINASHIE PREPARATORY AND JHS', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'SCH07617', '', 'basic', 'DIVINE INTERNATIONAL SCHOOL', NULL, 'PLOT 43, BLOCK A ATIMATIM, Wa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'SCH07717', '', 'basic', 'DORSH INTERNATIONAL/JSS', NULL, 'AIRPORT BASE, Afigya Sekyere', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'SCH07817', '', 'basic', 'EBEN INTERNATIONAL/JSS', NULL, 'MAAKRO, Sekyere South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'SCH07917', '', 'basic', 'EDEN ROYAL INTERNATIONAL SCHOOL', NULL, 'OLD TAFO, Sekyere South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'SCH08017', '', 'basic', 'ELLEN WHITE INTERNATIONAL/JSS', NULL, 'CENTRAL POLICE STATION, Sekyere South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'SCH08117', '', 'basic', 'EMMANUEL INTERNATIONAL SCHOOL', NULL, 'Dangbe West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'SCH08217', '', 'basic', 'EUNISETH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'SCH08317', '', 'basic', 'FAITH CHRISTIAN ACADEMY', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'SCH08417', '', 'basic', 'FAITH MONTESSORI', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'SCH08517', '', 'basic', 'FALSYD FOUNDATION SCHOOL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'SCH08617', '', 'basic', 'FIRST STAR ACADEMY', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'SCH08717', '', 'basic', 'FLOWERS GAY', NULL, 'Cape Coast Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'SCH08817', '', 'basic', 'FOUNDATION PREP. SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'SCH08917', '', 'basic', 'FOUNTAIN OF LIFE INTERNATIONAL/JSS', NULL, 'ATONSU-BOKRO, Sekyere South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'SCH09017', '', 'basic', 'FROEBEL EDUC. CENTRE', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'SCH09117', '', 'basic', 'FULL GOSPEL BAPTIST INTERNATIONAL/JSS', NULL, 'ASOKORE-MAMPONG, Atwima Kwanwoma', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'SCH09217', '', 'basic', 'FULL GOSPEL INTERNATIONAL/JSS', NULL, 'AFRANCHO, Sekyere South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'SCH09317', '', 'basic', 'FUTURE ACADEMY', NULL, 'Asunafo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'SCH09417', '', 'basic', 'GARDEN CITY SPECIAL SCHOOL', NULL, 'PLOT 7, PAAKOSO ROAD ASOKORE MAMPONG, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'SCH09517', '', 'basic', 'GHANA AIRFORCE COMPLEX SCHOOL', NULL, 'TAKORADI, Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'SCH09617', '', 'basic', 'GHANA HEADSHIP SCHOOL', NULL, 'Gomoa East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'SCH09717', '', 'basic', 'GILEAD SCH. LTD.', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'SCH09817', '', 'basic', 'GLORY OF GOD INTERNATIONAL SCHOOL', NULL, 'PLOT 17/18, BLOCK 4 SUAME EXTENSION , Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'SCH09917', '', 'basic', 'GLORY SCHOOL', NULL, 'ATONSU-AGOGO, Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'SCH10017', '', 'basic', 'GLOW-LAMP INTERNATIONAL', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'SCH10117', '', 'basic', 'GODBLESSED EXPERIMENTAL/JSS', NULL, 'NEW SUAME, Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'SCH10217', '', 'basic', 'GOD\'S CHURCH OF PEACE PREP/JSS', NULL, 'ABOABO ESTATE, Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'SCH10317', '', 'basic', 'GOD\'S TIME PREP. SCHOOL', NULL, 'GHANA LEGION , Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'SCH10417', '', 'basic', 'GOLDEN AGE', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'SCH10517', '', 'basic', 'GONU R.C./D.A BASIC', NULL, 'South Tongu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'SCH10617', '', 'basic', 'GOOD HOPE SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'SCH10717', '', 'basic', 'GOOD SHEPHERD CATHOLIC SCHOOL', NULL, 'AHINSAN ESTATE, Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'SCH10817', '', 'basic', 'GOOD SHEPHERD INT.', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'SCH10917', '', 'basic', 'GRACE BAPTIST PREP/SCHOOL', NULL, 'AMAKOM, Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'SCH11017', '', 'basic', 'GRACE INTERNATIONAL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'SCH11117', '', 'basic', 'GRACE MEMORIAL SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'SCH11217', '', 'basic', 'GREAT ALLIANCE', NULL, 'Jaman North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'SCH11317', '', 'basic', 'GREAT GOD SHEPHERD INTERNATIONAL', NULL, 'MPATASE, Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'SCH11417', '', 'basic', 'GREAT VICTORY ACADEMY', NULL, 'Bolgatanga', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'SCH11517', '', 'basic', 'GREENLAND BUSINESS HIGH SCHOOL', NULL, 'Asunafo North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'SCH11617', '', 'basic', 'HAMBURG INT. SCHOOL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'SCH11717', '', 'basic', 'HARVESTERS PREPARETORY', NULL, 'Aowinsuaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'SCH11817', '', 'basic', 'HE REIGNS COMPLEX', NULL, 'Awutu Senya', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'SCH11917', '', 'basic', 'HIGH ACADEMY', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'SCH12017', '', 'basic', 'HILL TOP SCHOOL', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'SCH12117', '', 'basic', 'HILLTOP PREP. SCHOOL', NULL, 'DABAN, Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'SCH12217', '', 'basic', 'HOLY CHILD', NULL, 'Obuasi Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'SCH12317', '', 'basic', 'HOLY CROSS HIGH SCHOOL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'SCH12417', '', 'basic', 'HOLY INTERNATIONAL/PREP. SCHOOL', NULL, 'DICHEMSO, Donkorkrom', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'SCH12517', '', 'basic', 'HOLY SPIRIT', NULL, 'Sunyani Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'SCH12617', '', 'basic', 'HOLY TRINITY LUTHERAN', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'SCH12717', '', 'basic', 'HOPE CHRIST ACADEMY FETTER', NULL, 'Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'SCH12817', '', 'basic', 'HOPFA EDUC. CENTRE', NULL, 'Atwima', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'SCH12917', '', 'basic', 'ISLAMIC EDUCATION COMPLEX', NULL, 'NEW SUAME , Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'SCH13017', '', 'basic', 'JACOB`S PREP. SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'SCH13117', '', 'basic', 'JCOB\'S JUNIOR HIGH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'SCH13217', '', 'basic', 'JESUS THE KING INTERNATIONAL SCHOOL', NULL, 'PLOT E.E.32, BLOCK L KWADASO ESTATES, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'SCH13317', '', 'basic', 'JESUS THE SAVIOUR', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'SCH13417', '', 'basic', 'JOY STANDARD JSS', NULL, 'ATONSU, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'SCH13517', '', 'basic', 'JUBILEE PREP/SCHOOL', NULL, 'OFORIKROM, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'SCH13617', '', 'basic', 'JUMBO JUNOR HIGH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'SCH13717', '', 'basic', 'K. DEL PREP. SCHOOL', NULL, 'ALONGA, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'SCH13817', '', 'basic', 'K.E.C. INTERNATIONAL', NULL, 'DAMONGO, Bawku East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'SCH13917', '', 'basic', 'KALVARY INT. JSS', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'SCH14017', '', 'basic', 'KAY-BILLIE-KLAER ACADEMY', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'SCH14117', '', 'basic', 'K\'DUA WESLEY INT.', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'SCH14217', '', 'basic', 'KIDDIECARE', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'SCH14317', '', 'basic', 'KING ARTHUR INTERNATIONAL SCHOOL', NULL, 'ASOKWA, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'SCH14417', '', 'basic', 'KOTOBABI 4 J.H.S', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'SCH14517', '', 'basic', 'KWAGYIR AGGREY MEMORIAL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'SCH14617', '', 'basic', 'L & A MEMORIAL ACADEMY', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'SCH14717', '', 'basic', 'LA FONTAINE INTERNATIONAL SCHOOL', NULL, 'AHWIAA , Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'SCH14817', '', 'basic', 'LIBERT PREPARATORY & JHS', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'SCH14917', '', 'basic', 'LIFE PREPARATORY SCHOOL', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'SCH15017', '', 'basic', 'LIGHT OF THE WORLD', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'SCH15117', '', 'basic', 'LITTLE FLOWER MONT. SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'SCH15217', '', 'basic', 'LOVER PREP. SCHOOL', NULL, 'BOHYEN, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'SCH15317', '', 'basic', 'MANDELA PREP. SCHOOL', NULL, 'DICHEMSO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'SCH15417', '', 'basic', 'MANYE ACADEMY', NULL, 'NSEIN ROAD AXIM , Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'SCH15517', '', 'basic', 'MARANATHA PREP. & JUNIOR HIGH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'SCH15617', '', 'basic', 'MARIST', NULL, 'Bosom/Atwima/Kwaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'SCH15717', '', 'basic', 'MARTIN LUTHER KING JUNIOR', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'SCH15817', '', 'basic', 'MARTYRS OF UGANDA PREPARATORY SCHOOL', NULL, 'SCHOOL PREMISES SANTASI, Abura/Asebu/Kwamank', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'SCH15917', '', 'basic', 'MARY QUEEN OF PEACH SCHOOL', NULL, 'Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'SCH16017', '', 'basic', 'MARY STAR OF THE SEA', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'SCH16117', '', 'basic', 'MATER ECCLESIAE', NULL, 'Ho Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'SCH16217', '', 'basic', 'MAWULI SCHOOL', NULL, 'HO-ADAKLU ROAD HEVE, Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'SCH16317', '', 'basic', 'MAXWELL RABB INTERNATIONAL', NULL, 'KAASI, Afigya Sekyere', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'SCH16417', '', 'basic', 'MAYFLOWER PREP.', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'SCH16517', '', 'basic', 'MAYFLOWER PREPARATORY AND JUNIOR HIGH SCHOOL', NULL, 'Ellembele', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'SCH16617', '', 'basic', 'MAYS JINGLE BELLS PREP SCHOOL', NULL, 'Ga East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'SCH16717', '', 'basic', 'MC NEILUS PREP/JSS', NULL, 'OLD TAFO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'SCH16817', '', 'basic', 'MERCY BAPTIST PREP. SCHOOL', NULL, 'OFORIKROM, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'SCH16917', '', 'basic', 'METHODIST HIGH SCHOOL', NULL, 'HEADMASTER SALTPOND, Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'SCH17017', '', 'basic', 'MIZPAH INTERNATIONAL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'SCH17117', '', 'basic', 'MMOFRATURO PREP.', NULL, 'WESCO , Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'SCH17217', '', 'basic', 'MODERN INTERNATIONAL/JSS', NULL, 'ASOKWA, Amansie Central', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'SCH17317', '', 'basic', 'MONA LISA SCHOOL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'SCH17417', '', 'basic', 'MORNING GLORY MCDC', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'SCH17517', '', 'basic', 'MORNING STAR', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'SCH17617', '', 'basic', 'MOST HOLY HEART', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'SCH17717', '', 'basic', 'MOTHER SMITH INTERNATIONAL/JSS', NULL, 'CHIRAPETRA ESTATE , Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'SCH17817', '', 'basic', 'MOTHERCARE', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'SCH17917', '', 'basic', 'MOUNT OLIVET PRE. SCHOOL', NULL, 'ODENEHO-KWADASO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'SCH18017', '', 'basic', 'MOUNT ZION INTERNATIONAL', NULL, 'AHINSAN, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'SCH18117', '', 'basic', 'MT. OLIVET METH.', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'SCH18217', '', 'basic', 'MUSTAPHIAT ISLAMIC SCHOOL', NULL, 'BAWKU, Bawku East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'SCH18317', '', 'basic', 'MYSTICAL ROSE', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'SCH18417', '', 'basic', 'NAZARETH SCHOOL', NULL, 'KWESIMINTSIM ROAD TAKORADI , Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'SCH18517', '', 'basic', 'NEW ERA INTERNATIONAL SCHOOL', NULL, 'AWOMASO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'SCH18617', '', 'basic', 'NEW GENERATION COMPLEX', NULL, 'Jomoro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'SCH18717', '', 'basic', 'NEW LIFE INTERNATIONAL/JSS', NULL, 'KRONUM, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'SCH18817', '', 'basic', 'NEW OXFORD INTERNATIONAL/JSS', NULL, 'NEW AMAKOM BRAMPRAMSO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'SCH18917', '', 'basic', 'NEW TAFO BAPTIST INTERNATIONAL/JSS', NULL, 'NEW TAFO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'SCH19017', '', 'basic', 'NEW TAFO R/C J.H.S', NULL, 'East Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'SCH19117', '', 'basic', 'NEWLIFE ADVENT INTERNATIONAL SCHOOL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'SCH19217', '', 'basic', 'NIGRITIAN INTERNATIONAL/JSS', NULL, 'DICHEMSO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'SCH19317', '', 'basic', 'NOBLE PRINCE PREP/SCHOOL', NULL, 'TAFO NHYIAESO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'SCH19417', '', 'basic', 'NZIMAMAN COMPLEX', NULL, 'Jomoro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'SCH19517', '', 'basic', 'OASIS CHRISTIAN ACADEMY', NULL, 'AHODWO , Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'SCH19617', '', 'basic', 'OBEFOS INTERNATIONAL SCHOOL', NULL, 'OHWIM, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'SCH19717', '', 'basic', 'ODA HECTA INT. \'B\'', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'SCH19817', '', 'basic', 'OKORASE ST. MARY\'S PREP. SCH.', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'SCH19917', '', 'basic', 'ONIWAA MEMORIAL JSS', NULL, 'TAFO NHYIAESO, Offinso North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'SCH20017', '', 'basic', 'OPEN HEAVENS PREPARATORY SCHOOL', NULL, 'ADUKROM, Offinso North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'SCH20117', '', 'basic', 'OSEI ASIBEY SEKYERE INTERNATIONAL SCHOOL', NULL, 'ATONSU, Offinso North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'SCH20217', '', 'basic', 'OSEI TUTU INTERNATIONAL', NULL, 'GYINYASE, Offinso North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'SCH20317', '', 'basic', 'OUR LADY INTERNATIONAL/JSS', NULL, 'AHINSAN ESTATE, Offinso North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'SCH20417', '', 'basic', 'OUR LANDY OF APOSTLES', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'SCH20517', '', 'basic', 'PALMAR INTERNATIONAL SCHOOL', NULL, 'NORTH PATASI, Offinso North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'SCH20617', '', 'basic', 'PAT. DORAMA INTERNATIONAL SCHOOL', NULL, 'KWADASO ESTATE , Offinso North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'SCH20717', '', 'basic', 'PEACE INTERNATIONAL', NULL, 'Jomoro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'SCH20817', '', 'basic', 'PENTECOST PREPARATORY SCHOOL', NULL, 'EFFIA KUMA NEW SITE TAKORADI, Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'SCH20917', '', 'basic', 'PENTECOST SCHOOL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'SCH21017', '', 'basic', 'PENTECOSTAL HOLY PREP.', NULL, 'OLD TAFO, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'SCH21117', '', 'basic', 'PERE PLANGUE MEMORIAL PREPARATORY SCH.', NULL, 'OLA TRAINING COLLEGE CAPE COAST , Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'SCH21217', '', 'basic', 'PERE PLANQUE', NULL, 'Cape Coast Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'SCH21317', '', 'basic', 'PRESBY INTERNATIONAL COMPLEX', NULL, 'BOHYEN, Amansie Central', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'SCH21417', '', 'basic', 'PRESBYTERIAN JUNIOR SECONDARY SCHOOL', NULL, 'MAMPONG-ASHANTI, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'SCH21517', '', 'basic', 'PRIMA ACADEMY', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'SCH21617', '', 'basic', 'PRINCE OF PEACE', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'SCH21717', '', 'basic', 'PSALMS PREP.', NULL, 'Jomoro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'SCH21817', '', 'basic', 'QUEEN EGYIMA', NULL, 'Obuasi Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'SCH21917', '', 'basic', 'QUEENSLAND', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'SCH22017', '', 'basic', 'RAPID PREPARATORY SCHOOL', NULL, 'SUNYANI, Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'SCH22117', '', 'basic', 'RECT ACADEMY', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'SCH22217', '', 'basic', 'REGAL INTERNATIONAL/JSS', NULL, 'BUOKROM ESTATE , Atwima Kwanwoma', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'SCH22317', '', 'basic', 'RIDGE CHURCH SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'SCH22417', '', 'basic', 'RIDGE INTERNATIONAL SCHOOL', NULL, 'TAKORADI, Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'SCH22517', '', 'basic', 'RIDGE PRIMARY SCHOOL', NULL, 'HO, Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'SCH22617', '', 'basic', 'RISING STAR INTERNATIONAL SCHOOL', NULL, 'GYINYASE, Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'SCH22717', '', 'basic', 'ROKANJE PRESBY EXPERIMENTAL SCHOOL', NULL, 'MILE 3 OLD TAFO, Afigya Sekyere', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'SCH22817', '', 'basic', 'ROSANT VINE YARD PREP.', NULL, 'ANOMANYE, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'SCH22917', '', 'basic', 'ROSE OF SHARON PRESBY/INTERNATIONAL SCHOOL', NULL, 'ANOMANYE, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'SCH23017', '', 'basic', 'ROYAL INTERNATIONAL/PREP/ SCHOOL', NULL, 'ASOKWA NEAR T.I. AHM, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'SCH23117', '', 'basic', 'SACRED SITE PREP.', NULL, 'BREMAN, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'SCH23217', '', 'basic', 'SAINT AUGUSTINE PREPARATORY SCHOOLP.', NULL, 'AXIM, Abura/Asebu/Kwamank', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'SCH23317', '', 'basic', 'SAINT MARY\'S PREPARATORY SCHOOL', NULL, 'ODUMASI ROAD SUNYANI, Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'SCH23417', '', 'basic', 'SAINT PREPARATORY SCHOOL', NULL, 'PLOT 23, BLOCK 1 NEW SUAME , Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'SCH23517', '', 'basic', 'SALAGA JUNIOR SECONDARY SCHOOL', NULL, 'SALAGA , Bole', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'SCH23617', '', 'basic', 'SALVATION ACADEMY', NULL, 'NORTH PATASI , Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'SCH23717', '', 'basic', 'SALVATION INTERNATIONAL SCHOOL', NULL, 'ASUOYEBOA 85, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'SCH23817', '', 'basic', 'SEVEN GREAT PRINCESS ACADEMY', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'SCH23917', '', 'basic', 'SHALIDARITY', NULL, 'Ga East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'SCH24017', '', 'basic', 'SOLIDARITY', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'SCH24117', '', 'basic', 'SSNIT PRESBY MODEL', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'SCH24217', '', 'basic', 'ST. ANN\'S INT.', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'SCH24317', '', 'basic', 'ST. AUGUSTINE\'S', NULL, 'Obuasi Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'SCH24417', '', 'basic', 'ST. ELIZABETH JSS', NULL, 'Haatso, Ga East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'SCH24517', '', 'basic', 'ST. FRANCIS OF ASISI', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'SCH24617', '', 'basic', 'ST. GINA SCHOOL COMPLEX', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'SCH24717', '', 'basic', 'ST. MARY\'S INTERNATIONAL', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'SCH24817', '', 'basic', 'ST. PAUL\'S LUTHERAN SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'SCH24917', '', 'basic', 'ST. PETER\'S INTERNATIONAL', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'SCH25017', '', 'basic', 'ST. PHILIP\'S', NULL, 'Obuasi Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'SCH25117', '', 'basic', 'STAR AVENUE', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'SCH25217', '', 'basic', 'STAR OF THE EAST', NULL, 'Ga East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'SCH25317', '', 'basic', 'SUNBEAM MONTESSORI', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 'SCH25417', '', 'basic', 'SUPREME ACADEMY', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'SCH25517', '', 'basic', 'TAKORADI INT. SCH.', NULL, 'takoradi, Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 'SCH25617', '', 'basic', 'TANOSO S.D.A. BASIC SCHOOLS', NULL, 'Tano North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 'SCH25717', '', 'basic', 'TEMA FIRST', NULL, 'Jaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'SCH25817', '', 'basic', 'TEMA FIRST BAPTIST', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'SCH25917', '', 'basic', 'THE LIGHT ACADEMY', NULL, 'Tema Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 'SCH26017', '', 'basic', 'TIMOSKAY SCHOOL COMPLEX', NULL, 'Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 'SCH26117', '', 'basic', 'TOT TO TEEN', NULL, 'Ga East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 'SCH26217', '', 'basic', 'VICANDE', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 'SCH26317', '', 'basic', 'VICTORIA GRAMMAR SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 'SCH26417', '', 'basic', 'VRA INTERNATIONAL SCHOOL', NULL, 'Takoradi, Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 'SCH26517', '', 'basic', 'WEST END INTERNATIONAL', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 'SCH26617', '', 'basic', 'WESTERN INTERNATIONAL', NULL, 'Ahanta West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'SCH26717', '', 'basic', 'WOODBRIDGE INTERNATIONAL SCHOOL', NULL, 'Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 'SCH26817', '', 'basic', 'ABETIFI PRESBY SEC', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 'SCH26917', '', 'basic', 'ABETIFI PRESEC', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 'SCH27017', '', 'basic', 'ABOR SEC', NULL, 'Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 'SCH27117', '', 'basic', 'ABUAKWA STATE COLLEGE', NULL, 'East Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 'SCH27217', '', 'basic', 'ABURAMAN SEC', NULL, 'Abura/Asebu/Kwamank', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'SCH27317', '', 'basic', 'ABURI GIRLS', NULL, 'Akwapim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 'SCH27417', '', 'basic', 'ABUTIA SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 'SCH27517', '', 'basic', 'ACADEMY OF CHRIST THE KING', NULL, 'Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 'SCH27617', '', 'basic', 'ACCRA ACADEMY', NULL, 'Bubuashie, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 'SCH27717', '', 'basic', 'ACCRA GIRLS SEC', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 'SCH27817', '', 'basic', 'ACCRA HIGH', NULL, 'Asylum Down, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 'SCH27917', '', 'basic', 'ACHERENSUA SEC', NULL, 'Asutifi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 'SCH28017', '', 'basic', 'ACHIASE SEC', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 'SCH28117', '', 'basic', 'ACHIMOTA BUSINESS COLLEGE', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 'SCH28217', 'ACH', 'secondary', 'ACHIMOTA SEC', 'Ut Omnes Unum Sint', 'Near Achimota Police Station, Accra Metro', 'P. O. Box AH 11, Achimota, Accra, Greater Accra, Ghana ', '', '030 2400554', 'www.achimota.edu.gh', NULL, '0000-00-00 00:00:00', '2017-11-18 21:28:10'),
(283, 'SCH28317', '', 'basic', 'ACHINAKROM SEC', NULL, 'Ejisu/Juabeng', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 'SCH28417', '', 'basic', 'ADA SEC', NULL, 'Dangbe East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 'SCH28517', '', 'basic', 'ADA SENIOR HIGH SCHOOL', NULL, 'Dangbe East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 'SCH28617', '', 'basic', 'ADABIE COMM INST', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 'SCH28717', '', 'basic', 'ADABIE EDUCATIONAL COMPLEX', NULL, 'Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 'SCH28817', '', 'basic', 'ADAKLU COMM SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 'SCH28917', '', 'basic', 'ADANSI AKROFUOM SENIOR HIGH SCHOOL', NULL, 'Adansi South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 'SCH29017', '', 'basic', 'ADANWOMASE SEC', NULL, 'Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 'SCH29117', '', 'basic', 'ADEISO SEC', NULL, 'West Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 'SCH29217', '', 'basic', 'ADENKWAMAN SEC/COMM', NULL, 'Assin Fosu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 'SCH29317', '', 'basic', 'ADIDOME SEC', NULL, 'North Tongu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 'SCH29417', '', 'basic', 'ADIEMBRA SEC', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 'SCH29517', '', 'basic', 'ADISADEL COLLEGE', NULL, 'Adisadel Village, Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 'SCH29617', '', 'basic', 'ADONTEN SEC', NULL, 'Akwapim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 'SCH29717', '', 'basic', 'ADU GYAMFI SEC', NULL, 'Afigya Sekyere', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 'SCH29817', '', 'basic', 'ADUMAN SEC', NULL, 'Kwabre', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 'SCH29917', '', 'basic', 'ADVENTIST SENIOR HIGH', NULL, 'KUMASI, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 'SCH30017', '', 'basic', 'AFUA KOBI AMPEM GIRLS SEC', NULL, 'Bosom/Atwima/Kwaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'SCH30117', '', 'basic', 'AGATE COMM/SEC', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 'SCH30217', '', 'basic', 'AGGREY MEM SECONDARY SCHOOL', NULL, 'CAPE COAST, Abura/Asebu/Kwamank', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 'SCH30317', '', 'basic', 'AGOGO STATE COLLEGE', NULL, 'AGOGO, Asante Akim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 'SCH30417', '', 'basic', 'AGOTIME SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 'SCH30517', '', 'basic', 'AHANTAMAN SECONDARY SCHOOL', NULL, 'TAKORADI, Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 'SCH30617', '', 'basic', 'AIRPORT POLICE POLICE JHS', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 'SCH30717', '', 'basic', 'AKIM STATE COLLEGE', NULL, 'Near Hecta JSS, Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 'SCH30817', '', 'basic', 'AKIM SWEDRU SEC', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 'SCH30917', '', 'basic', 'AKONTOMBRA SNR. SEC', NULL, 'Sefwi Wiawso', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 'SCH31017', '', 'basic', 'AKROSO SEC', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 'SCH31117', '', 'basic', 'AKUMDAN SEC', NULL, 'Offinso', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 'SCH31217', '', 'basic', 'AKWAMUMAN SEC', NULL, 'Asuogyaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 'SCH31317', '', 'basic', 'AMANIAMPONG SECONDARY SCHOOL', NULL, 'MAMPONG-ASHANTI, Amansie West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 'SCH31417', '', 'basic', 'AMANTEM SEC', NULL, 'Atebubu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 'SCH31517', '', 'basic', 'AMENFIMAN SEC', NULL, 'Wassa Amenfi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 'SCH31617', '', 'basic', 'ANFOEGA SECONDARY', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 'SCH31717', '', 'basic', 'ANGLICAN SENIOR HIGH SCHOOL', NULL, 'KUMASI, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 'SCH31817', '', 'basic', 'ANGLICAN UNIVERSITY COLLEGE OF TECHNOLOGY', NULL, 'House No. 3 Oak Street, Teshie-Nungua Estate, Accra, Ghana, Adenta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 'SCH31917', '', 'basic', 'ANLO AFIADENYIGHA SEC', NULL, 'Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 'SCH32017', '', 'basic', 'ANLO AVOMEFIA SNR SEC', NULL, 'Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 'SCH32117', '', 'basic', 'ANLO SEC', NULL, 'Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 'SCH32217', '', 'basic', 'ANNOR ADJEYE SEC', NULL, 'Jomoro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 'SCH32317', '', 'basic', 'ANTOA SEC', NULL, 'Kwabre', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ezi_school` (`school_id`, `school_code`, `school_prefix`, `school_type`, `school_name`, `school_motto`, `school_location`, `school_address`, `school_email`, `school_telephone`, `school_website`, `school_crest`, `created_at`, `updated_at`) VALUES
(324, 'SCH32417', '', 'basic', 'ANUM PRESBY SEC', NULL, 'Asuogyaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 'SCH32517', '', 'basic', 'APAM SEC', NULL, 'Gomoa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 'SCH32617', '', 'basic', 'APEGUSO COMM/SEC', NULL, 'Asuogyaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 'SCH32717', '', 'basic', 'AQUINAS SECONDARY', NULL, 'Cantonments, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 'SCH32817', '', 'basic', 'ARCHBISHOP PORTER GIRLS SEC', NULL, 'FIJAI, Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 'SCH32917', '', 'basic', 'ARHIN BUSINESS COLLEGE', NULL, 'SANTASI, Ejisu/Juabeng', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 'SCH33017', '', 'basic', 'ARMED FORCE SEC/TECH', NULL, 'Burma Camp, Accra., Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 'SCH33117', '', 'basic', 'ARMED FORCES SEC/TECH', NULL, 'UADDARA BARRACKS BANTAMA , Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 'SCH33217', '', 'basic', 'ASAMANKESE SEC', NULL, 'West Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 'SCH33317', '', 'basic', 'ASANKRANGWA SEC', NULL, 'ADMINISTRATION BLOCK ASANKRAGWA, Wassa Amenfi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 'SCH33417', '', 'basic', 'ASANKRANGWA SEC/TECH', NULL, 'ASANKRAGWA, Wassa Amenfi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 'SCH33517', '', 'basic', 'ASANTEMAN SECONDARY SCHOOL', NULL, 'KUMASI, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 'SCH33617', '', 'basic', 'ASARE BEDIAKO SEC', NULL, 'Adansi North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 'SCH33717', '', 'basic', 'ASAWINSO SEC', NULL, 'Sefwi Wiawso', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 'SCH33817', '', 'basic', 'ASESEWA AGRIC DAY SEC/TECH', NULL, 'Manya Krobo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 'SCH33917', '', 'basic', 'ASHIAMAN SECONDARY', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 'SCH34017', '', 'basic', 'ASSEMBLIES OF GOD SENIOR HIGH SCHOOL', NULL, 'Kwadaso Nbusm-Kumasi, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 'SCH34117', '', 'basic', 'ASSIN MANSO SEC', NULL, 'Assin Fosu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 'SCH34217', '', 'basic', 'ASSIN NORTH SEC/TECH', NULL, 'Assin Fosu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 'SCH34317', '', 'basic', 'ASSIN NSUTA SEC', NULL, 'Assin Fosu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 'SCH34417', '', 'basic', 'ASUKAWKAW SEC', NULL, 'Kete-Kratchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 'SCH34517', '', 'basic', 'ASUOGYAMAN SEC/TECH', NULL, 'Techiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 'SCH34617', '', 'basic', 'ASUOM SEC', NULL, 'Kwaebibirem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 'SCH34717', '', 'basic', 'ATEBUBU SEC', NULL, 'ATEBUBU, Atebubu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 'SCH34817', '', 'basic', 'ATIAVI SEC/TECH', NULL, 'Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 'SCH34917', '', 'basic', 'ATWEAMAN SEC', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 'SCH35017', '', 'basic', 'AVATIME SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 'SCH35117', '', 'basic', 'AVE-DAKPA SEC', NULL, 'Akatsi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 'SCH35217', '', 'basic', 'AVEYIME BATTOR SEC/TECH', NULL, 'North Tongu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 'SCH35317', '', 'basic', 'AWE SEC/TECH', NULL, 'Kasena Nankani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 'SCH35417', '', 'basic', 'AWUDOME SECONDARY SCHOOL', NULL, 'TSITO , Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 'SCH35517', '', 'basic', 'AWUTU-WINTON SENIOR HIGH SCHOOL', NULL, 'Awutu/Efutu/Senya', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 'SCH35617', '', 'basic', 'AYIREBI SEC', NULL, 'Birim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 'SCH35717', '', 'basic', 'BADU SEC/TECH', NULL, 'Wenchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 'SCH35817', '', 'basic', 'BAGLO SEC/TECH', NULL, 'Buem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 'SCH35917', '', 'basic', 'BAIDOO BONSO SEC/TECH', NULL, 'Ahanta West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 'SCH36017', '', 'basic', 'BAPTIST UNIVERSITY COLLEGE', NULL, 'Abuakwa-Kumasi , Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 'SCH36117', '', 'basic', 'BATTOR SENIOR HIGH', NULL, 'Ho Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, 'SCH36217', '', 'basic', 'BAWKU SEC/TECH', NULL, 'Bawku East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 'SCH36317', '', 'basic', 'BAWKU SECONDARY', NULL, 'MAIN LINE BAWKU, Bawku East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 'SCH36417', '', 'basic', 'BEGORO SEC', NULL, 'Fanteakwa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 'SCH36517', '', 'basic', 'BENKUM SEC', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 'SCH36617', '', 'basic', 'BENSO SEC/TECH', NULL, 'Wassa West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 'SCH36717', '', 'basic', 'BEPONG SEC/TECH', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 'SCH36817', '', 'basic', 'BEPOSO SEC', NULL, 'Bosom/Atwima/Kwaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 'SCH36917', '', 'basic', 'BEREKUM SEC', NULL, 'Berekum', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 'SCH37017', '', 'basic', 'BESEASE SEC/COMM', NULL, 'Ajumako/Enyan/Esiam', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 'SCH37117', '', 'basic', 'BIBIANI SEC/TECH', NULL, 'Bibiani/Anh/Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 'SCH37217', '', 'basic', 'BIMBILA SECONDARY', NULL, 'Nanumba', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 'SCH37317', '', 'basic', 'BISHOP HERMAN SEC', NULL, 'AMEDZOFE , Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 'SCH37417', '', 'basic', 'BOA-AMPONSEM SEC', NULL, 'MAIN LINE DUNKWA-ON-OFFIN , Upper Denkyira', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 'SCH37517', '', 'basic', 'BOAKYE TROMO SEC/TECH', NULL, 'Tano', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 'SCH37617', '', 'basic', 'BODWESANGO SEC', NULL, 'Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 'SCH37717', '', 'basic', 'BOLE SECONDARY', NULL, 'Bole', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 'SCH37817', '', 'basic', 'BOLGA GIRLS SEC', NULL, 'Bolgatanga', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 'SCH37917', '', 'basic', 'BOLGA SECONDARY', NULL, 'Bolgatanga', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 'SCH38017', '', 'basic', 'BOMAA COMM SEC', NULL, 'Tano', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 'SCH38117', '', 'basic', 'BOMPEH DAY SEC/TECH', NULL, 'TAKORADI, Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 'SCH38217', '', 'basic', 'BONGO SECONDARY', NULL, 'Bongo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 'SCH38317', '', 'basic', 'BONWIRE SEC/TECH', NULL, 'Ejisu/Juabeng', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 'SCH38417', '', 'basic', 'BONZO-KAKU SEC', NULL, 'Nzema East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 'SCH38517', '', 'basic', 'BOSO SEC/TECH', NULL, 'Asuogyaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 'SCH38617', '', 'basic', 'BREMAN ASIKUMA SEC', NULL, 'Asikuma/Od/Brakwa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 'SCH38717', '', 'basic', 'BUEMAN SECONDARY', NULL, 'Buem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 'SCH38817', '', 'basic', 'BUNKPURUGU SEC/TECH', NULL, 'East Mamprusi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 'SCH38917', '', 'basic', 'BUOYEM SEC', NULL, 'Techiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 'SCH39017', '', 'basic', 'BUSINESS SECONDARY', NULL, 'NYANKPALA ROAD TAMALE, Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 'SCH39117', '', 'basic', 'BUSUNYA SEC', NULL, 'Nkoranza', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 'SCH39217', '', 'basic', 'CAMBRIDGE SEN SEC SCH', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 'SCH39317', '', 'basic', 'CANADIAN INDEPENDENT COLLEGE OF GHANA', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 'SCH39417', '', 'basic', 'CATHOLIC SOCIAL ADVANCE INSTITUTE', NULL, 'Adabraka, Next To GNAT Hall Complex, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 'SCH39517', '', 'basic', 'CATHOLIC TECH INST', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 'SCH39617', '', 'basic', 'CHARITY COMM SCH', NULL, 'Twifo Hemang', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 'SCH39717', '', 'basic', 'CHARITY INTERNATIONAL SENIOR SECONDARY SCHOOL', NULL, 'Gomoa Manso, Abura/Asebu/Kwamank', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 'SCH39817', '', 'basic', 'CHEMU SEC', NULL, 'Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 'SCH39917', '', 'basic', 'CHEREPONI SEC/TECH', NULL, 'Chereponi-Saboba', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 'SCH40017', '', 'basic', 'CHIANA SECONDARY', NULL, 'Kasena Nankani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 'SCH40117', '', 'basic', 'CHIRAA SEC', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 'SCH40217', '', 'basic', 'CHRIST THE KING CATH', NULL, 'Obuasi Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 'SCH40317', '', 'basic', 'CHRISTIAN METHODIST', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 'SCH40417', '', 'basic', 'CITY SECONDARY / BUSINESS COLLEGE', NULL, 'Near Caprice Hotel, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 'SCH40517', '', 'basic', 'COLLINS SEC/COMMERCIAL', NULL, 'Asante Akim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 'SCH40617', '', 'basic', 'DABALA SEC/TECH', NULL, 'South Tongu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 'SCH40717', '', 'basic', 'DABALA SENIOR HIGH/TECH', NULL, 'Ho Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 'SCH40817', '', 'basic', 'DABOASE SEC/TECH', NULL, 'Mpohor Wassa East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 'SCH40917', '', 'basic', 'DADEASE AGRIC SEC', NULL, 'Sekyere East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 'SCH41017', '', 'basic', 'DADIESO SEC', NULL, 'Aowinsuaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 'SCH41117', '', 'basic', 'DAFFIAMAH SEC', NULL, 'Nadawli', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 'SCH41217', '', 'basic', 'DAGBON STATE SEC/TECH', NULL, 'East Dagomba', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, 'SCH41317', '', 'basic', 'DAMONGO SEC', NULL, 'HEADMASTER DAMONGO, West Gonja', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 'SCH41417', '', 'basic', 'DANIES SENIOR HIGH SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 'SCH41517', '', 'basic', 'DANSOMAN SENIOR HIGH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 'SCH41617', '', 'basic', 'DATA LINK INSTITUTE', NULL, 'New Rd. Comm. 10 , Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 'SCH41717', '', 'basic', 'DATUS SECONDARY/BUSINESS COLLEGE', NULL, 'Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 'SCH41817', '', 'basic', 'DATUS SENIOR HIGH SCHOOL', NULL, 'Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 'SCH41917', '', 'basic', 'DEBISO ESSIAM SEC/TECH', NULL, 'Juabeso Bia', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 'SCH42017', '', 'basic', 'DEKS SENIOR SECONDARY SCHOOL', NULL, 'Tema (Comm. 8), Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 'SCH42117', '', 'basic', 'DIABENE SEC/TECH', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 'SCH42217', '', 'basic', 'DIASO SEC', NULL, 'Upper Denkyira', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 'SCH42317', '', 'basic', 'DODI-PAPASE COMM SEC', NULL, 'Kadjebi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 'SCH42417', '', 'basic', 'DOFOR COMM AGRIC SEC', NULL, 'North Tongu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 'SCH42517', '', 'basic', 'DOFOR SENIOR HIGH', NULL, 'Ho Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 'SCH42617', '', 'basic', 'DOMPOASE SEC', NULL, 'Adansi North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 'SCH42717', '', 'basic', 'DONKORKROM AGRIC SEC', NULL, 'Kwahu North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 'SCH42817', '', 'basic', 'DORMAA SECONDARY', NULL, 'HEADMASTER DORMAA-AHENKRO, Dormaa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 'SCH42917', '', 'basic', 'DROBO SEC', NULL, 'Jaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 'SCH43017', '', 'basic', 'DUAYAW NKWANTA SEC', NULL, 'Tano', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 'SCH43117', '', 'basic', 'DUNKWA SEC/TECH', NULL, 'Upper Denkyira', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 'SCH43217', '', 'basic', 'DWAMENA AKENTEN SEC', NULL, 'Offinso', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 'SCH43317', '', 'basic', 'DZODZE PENYI SEC', NULL, 'Ketu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 'SCH43417', '', 'basic', 'DZOLO SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 'SCH43517', '', 'basic', 'E. P. C. MAWUKO GIRLS SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 'SCH43617', '', 'basic', 'E. P. SECONDARY', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(437, 'SCH43717', '', 'basic', 'EBENEZER SECONDARY', NULL, 'Dansoman, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 'SCH43817', '', 'basic', 'EDINAMAN DAY SECONDARY', NULL, 'CAPE COAST, Edin/Kom/Eguafo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 'SCH43917', '', 'basic', 'EFFIDUASE SEC/COMM', NULL, 'Sekyere East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 'SCH44017', '', 'basic', 'EFFUTU SEC/TECH', NULL, 'Cape Coast Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 'SCH44117', '', 'basic', 'EFUMFI T.I AHMADIYYA', NULL, 'Mfantsiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 'SCH44217', '', 'basic', 'EGUAFO-ABREM SEC', NULL, 'Edin/Kom/Eguafo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 'SCH44317', '', 'basic', 'EJISU SEC/TECH', NULL, 'Ejisu/Juabeng', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 'SCH44417', '', 'basic', 'EJISUMAN SEC', NULL, 'Ejisu/Juabeng', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 'SCH44517', '', 'basic', 'EJURAMAN SEC', NULL, 'Ejura Sekyedum', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 'SCH44617', '', 'basic', 'ELIM SECONDARY SCHOOL', NULL, 'Rit Junction Adenta-Medina, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, 'SCH44717', '', 'basic', 'ENYAN DENKYIRA SENIOR HIGH', NULL, 'Abura/Asebu/Kwamank', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, 'SCH44817', '', 'basic', 'EP UNIVERSITY', NULL, 'Ho, Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, 'SCH44917', '', 'basic', 'EREMON SEC/TECH', NULL, 'Lawra', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, 'SCH45017', '', 'basic', 'ESASE BONTEFUFUO SEC', NULL, 'Amansie West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, 'SCH45117', '', 'basic', 'ESIAMA SEC/TECH', NULL, 'Nzema East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, 'SCH45317', '', 'basic', 'EYAN DENKYIRA SEC', NULL, 'Ajumako/Enyan/Esiam', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, 'SCH45417', '', 'basic', 'FAITH SECONDARY/COMMERCIAL SCHOOL', NULL, 'Ayigya, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, 'SCH45517', '', 'basic', 'FIASEMAN SEC', NULL, 'Wassa West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, 'SCH45617', '', 'basic', 'FIJAI SECONDARY', NULL, 'ADIEMBRA ROAD SEKONDI, Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, 'SCH45717', '', 'basic', 'FUMBISI SECONDARY', NULL, 'Builsa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(458, 'SCH45817', '', 'basic', 'GARDEN CITY COMM COLLEGE', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(459, 'SCH45917', '', 'basic', 'GARDEN CITY SENIOR HIGH SCHOOL', NULL, 'Buokrom Estae B\'line Asorekwanta, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(460, 'SCH46017', '', 'basic', 'GHANA NATIONAL ACADEMY', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(461, 'SCH46117', '', 'basic', 'GHANA NATIONAL COLLEGE', NULL, 'CAPE COAST , Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(462, 'SCH46217', '', 'basic', 'GHANA SEC', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(463, 'SCH46317', '', 'basic', 'GHANA SEC/TECH', NULL, 'TAKORADI, Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(464, 'SCH46417', '', 'basic', 'GHANA SECONDARY', NULL, 'HEADMASTER TAMALE, Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(465, 'SCH46517', '', 'basic', 'GHANA-LEBANON ISLAMIC SEC SCH', NULL, 'Opp. Odaw Railway Station, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(466, 'SCH46617', '', 'basic', 'GHANATA SEC', NULL, 'Dangbe West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(467, 'SCH46717', '', 'basic', 'GOKA SEC/TECH', NULL, 'Jaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(468, 'SCH46817', '', 'basic', 'GOMOA SEC/TECH', NULL, 'Gomoa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(469, 'SCH46917', '', 'basic', 'GOWRIE SEC/TECH', NULL, 'Bongo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(470, 'SCH47017', '', 'basic', 'GUAKRO EFFAH SEC', NULL, 'Techiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(471, 'SCH47117', '', 'basic', 'GUSHIEGU SECONDARY', NULL, 'Gushiegu-Karaga', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(472, 'SCH47217', '', 'basic', 'GYAAMA PENSAN SEC/TECH', NULL, 'Kwabre', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(473, 'SCH47317', '', 'basic', 'GYAMFI KUMANINI SEC/TECH', NULL, 'Asutifi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(474, 'SCH47417', '', 'basic', 'HAAVARD COLLEGE', NULL, 'Kokomlemle and Amrahia, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(475, 'SCH47517', '', 'basic', 'HALF ASSINI SEC', NULL, 'Jomoro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(476, 'SCH47617', '', 'basic', 'H\'MT. SINAI DAY SEC', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(477, 'SCH47717', '', 'basic', 'HOLY CHILD SEC', NULL, 'Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(478, 'SCH47817', '', 'basic', 'HOLY SPIRIT SCHOOL LTD', NULL, 'Sarpeman, Accra-Nsawam RD, Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(479, 'SCH47917', '', 'basic', 'HOLY TRINITY SECONDARY', NULL, 'High Street, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(480, 'SCH48017', '', 'basic', 'HUNI VALLEY SEC', NULL, 'Wassa West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(481, 'SCH48117', '', 'basic', 'HWIDIEM SEC', NULL, 'Asutifi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(482, 'SCH48217', '', 'basic', 'INSAANYYA SECONDARY BUSINESS SCHOOL', NULL, 'Kasoa New Market Road, Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(483, 'SCH48317', '', 'basic', 'ISLAMIC SCIENCE SENIOR SEC', NULL, 'Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(484, 'SCH48417', '', 'basic', 'ISLAMIC SEC SCH', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(485, 'SCH48517', '', 'basic', 'ISLAMIC SENIOR SEC', NULL, 'Wa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(486, 'SCH48617', '', 'basic', 'JACHIE PRAMSO SEC', NULL, 'Bosom/Atwima/Kwaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(487, 'SCH48717', '', 'basic', 'JACOBU SEC/TECH', NULL, 'Amansie East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(488, 'SCH48817', '', 'basic', 'JEMA SEC', NULL, 'Kintampo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(489, 'SCH48917', '', 'basic', 'JIM BOURTON MEM AGRIC SEC', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(490, 'SCH49017', '', 'basic', 'JINJINI SEC', NULL, 'Berekum', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(491, 'SCH49117', '', 'basic', 'JIRAPA SNR SEC DAY', NULL, 'Jirapa/Lambushie', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(492, 'SCH49217', '', 'basic', 'JITA SENIOR HIGH SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(493, 'SCH49317', '', 'basic', 'JOY STANDARD COLLEGE', NULL, 'Behind Ahinsan SDA Churhc, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(494, 'SCH49417', '', 'basic', 'JUABEN/SEC', NULL, 'Ejisu/Juabeng', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(495, 'SCH49517', '', 'basic', 'JUABESO BIA SEC', NULL, 'Juabeso Bia', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(496, 'SCH49617', '', 'basic', 'JUASO DAY SEC/TECH', NULL, 'Asante Akim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(497, 'SCH49717', '', 'basic', 'JUKWA SEC', NULL, 'Twifo Hemang', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(498, 'SCH49817', '', 'basic', 'KADE DAY SEC/TECH', NULL, 'Kwaebibirem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(499, 'SCH49917', '', 'basic', 'KAJAJI SEC', NULL, 'Sene', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(500, 'SCH50017', '', 'basic', 'KALEO SEC/TECH', NULL, 'Nadawli', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(501, 'SCH50117', '', 'basic', 'KALPOHIN SECONDARY', NULL, 'Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(502, 'SCH50217', '', 'basic', 'KANESHIE SEC/TECH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(503, 'SCH50317', '', 'basic', 'KANTON SECONDARY', NULL, 'Sisala/Tumu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(504, 'SCH50417', '', 'basic', 'KEDJEBI-ASAFO SEC', NULL, 'Kadjebi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(505, 'SCH50517', '', 'basic', 'KETA BUSINESS SEC', NULL, 'Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(506, 'SCH50617', '', 'basic', 'KETA SEC', NULL, 'Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(507, 'SCH50717', '', 'basic', 'KETE-KRACHI SEC/TECH', NULL, 'Kete-Kratchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(508, 'SCH50817', '', 'basic', 'KIBI SEC/TECH', NULL, 'East Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(509, 'SCH50917', '', 'basic', 'KINBU SEC/TEC', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(510, 'SCH51017', '', 'basic', 'KING DAVID COMM/TECH SCH', NULL, 'Manya Krobo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(511, 'SCH51117', '', 'basic', 'KING HIGH COLLEGE', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(512, 'SCH51217', '', 'basic', 'KINTAMPO SEC', NULL, 'Kintampo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(513, 'SCH51317', '', 'basic', 'KLIKOR SEC/TECH', NULL, 'Ketu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(514, 'SCH51417', '', 'basic', 'KLO-AGOGO SECONDARY', NULL, 'Yilo Krobo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(515, 'SCH51517', '', 'basic', 'KO SNR SECONDARY', NULL, 'Lawra', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(516, 'SCH51617', '', 'basic', 'KOASE SEC/TECH', NULL, 'Wenchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(517, 'SCH51717', '', 'basic', 'KOFI ADJEI SEC/TECH', NULL, 'Kwabre', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(518, 'SCH51817', '', 'basic', 'KOFORIDUA SEC', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(519, 'SCH51917', '', 'basic', 'KOFORIDUA SEC/TECH', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(520, 'SCH52017', '', 'basic', 'KOFORIDUA SEC/TECH', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(521, 'SCH52117', '', 'basic', 'KOMENDA SEC', NULL, 'Edin/Kom/Eguafo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(522, 'SCH52217', '', 'basic', 'KONADU YIADOM SEC', NULL, 'Afigya Sekyere', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(523, 'SCH52317', '', 'basic', 'KONGO SECONDARY', NULL, 'Bolgatanga', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(524, 'SCH52417', '', 'basic', 'KONONGO ODUMASE SEC', NULL, 'Asante Akim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(525, 'SCH52517', '', 'basic', 'KPADZE SC.', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(526, 'SCH52617', '', 'basic', 'KPANDAI SECONDARY', NULL, 'East Gonja', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(527, 'SCH52717', '', 'basic', 'KPANDU SEC', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(528, 'SCH52817', '', 'basic', 'KPASSA SEC', NULL, 'Nkwanta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(529, 'SCH52917', '', 'basic', 'KPEDZE SENIOR HIGH', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(530, 'SCH53017', '', 'basic', 'KPEVE SEC/TECH', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(531, 'SCH53117', '', 'basic', 'KRABOA-COALTER SEC', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(532, 'SCH53217', '', 'basic', 'KRACHI SEC', NULL, 'Kete-Kratchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(533, 'SCH53317', '', 'basic', 'KROBO GIRLS SEC', NULL, 'Manya Krobo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(534, 'SCH53417', '', 'basic', 'KUKUOM AGRIC SEC', NULL, 'Asunafo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(535, 'SCH53517', '', 'basic', 'KUMASI ACADEMY', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(536, 'SCH53617', '', 'basic', 'KUMASI GIRLS SECONDARY', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(537, 'SCH53717', '', 'basic', 'KUMASI SEC/TECH', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(538, 'SCH53817', '', 'basic', 'KUMASI SENIOR HIGH SCHOOL', NULL, 'GYINYASE, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(539, 'SCH53917', '', 'basic', 'KUMBUNGU SECONDARY', NULL, 'Tolon-Kumbungu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(540, 'SCH54017', '', 'basic', 'KUMFI T. I AHMADIIYYA SENIO HIGH', NULL, 'Abura/Asebu/Kwamank', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(541, 'SCH54117', '', 'basic', 'KUSANABA SECONDARY', NULL, 'Bawku West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(542, 'SCH54217', '', 'basic', 'KWABENG ANGLICAN SEC/TECH', NULL, 'Atiwa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(543, 'SCH54317', '', 'basic', 'KWAHU RIDGE SEC', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(544, 'SCH54417', '', 'basic', 'KWAHU TAFO SENIOR HIGH', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(545, 'SCH54517', '', 'basic', 'KWAME DANSO SEC/TECH', NULL, 'Sene', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(546, 'SCH54617', '', 'basic', 'KWANYAKO SEC', NULL, 'Agona Swedru', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(547, 'SCH54717', '', 'basic', 'KWASI OPPONG SENIOR HIGH SCHOOL', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(548, 'SCH54817', '', 'basic', 'KWEGYIR AGGREY SEC', NULL, 'Mfantsiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(549, 'SCH54917', '', 'basic', 'LA PRESBY SNR SEC', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(550, 'SCH55017', '', 'basic', 'LABONE SENIOR HIGH SCHOOL', NULL, 'Labone, Near The Coffee Shop, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(551, 'SCH55117', '', 'basic', 'LARTEH PRESBY DAY SEC/TECH', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(552, 'SCH55217', '', 'basic', 'LAWRA SECONDARY', NULL, 'Lawra', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(553, 'SCH55317', '', 'basic', 'LEKLEBI SECONDARY', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(554, 'SCH55417', '', 'basic', 'LESSIE-TUOLU SNR SEC', NULL, 'Wa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(555, 'SCH55517', '', 'basic', 'LIKPE SECONDARY', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(556, 'SCH55617', '', 'basic', 'MAABANG SEC/TECH', NULL, 'Ahafo-Ano North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(557, 'SCH55717', '', 'basic', 'MAFIA-KUMASI COMM/SEC', NULL, 'North Tongu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(558, 'SCH55817', '', 'basic', 'MAMGOASE SEC', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(559, 'SCH55917', '', 'basic', 'MAMPONG PRESBY SEC/TECH', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(560, 'SCH56017', '', 'basic', 'MAMPONG/AKWAPIM SEC/TECH FOR THE DEAF', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(561, 'SCH56117', '', 'basic', 'MANDO SEC DAY', NULL, 'Ajumako/Enyan/Esiam', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(562, 'SCH56217', '', 'basic', 'MANHEAN SEC/TECH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(563, 'SCH56317', '', 'basic', 'MANKESIM SEC/TECH', NULL, 'Mfantsiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(564, 'SCH56417', '', 'basic', 'MANKRANSO SEC', NULL, 'Ahafo-Ano South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(565, 'SCH56517', '', 'basic', 'MANSEN COMM DAY SEC', NULL, 'Dormaa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(566, 'SCH56617', '', 'basic', 'MANSO-ADUBIA SEC', NULL, 'Amansie West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(567, 'SCH56717', '', 'basic', 'MANSOMAN SEC', NULL, 'Amansie West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(568, 'SCH56817', '', 'basic', 'MANYA KROBO SEC', NULL, 'Manya Krobo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(569, 'SCH56917', '', 'basic', 'MARS BUSINESS SEC SCH', NULL, 'Mataheko-Mars Road,Dansoman, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(570, 'SCH57017', '', 'basic', 'MAWULI SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(571, 'SCH57117', '', 'basic', 'MCKEOWN SENIOR HIGH SCHOOL', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(572, 'SCH57217', '', 'basic', 'MENJI SEC', NULL, 'Wenchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(573, 'SCH57317', '', 'basic', 'MEPE ST. KIZITO SENIOR HIGH/TECH', NULL, 'Ho Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(574, 'SCH57417', '', 'basic', 'METH AGRIC SEC', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(575, 'SCH57517', '', 'basic', 'METH. GIRLS HIGH', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(576, 'SCH57617', '', 'basic', 'METHODIST SEC/TECH', NULL, 'Berekum', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(577, 'SCH57717', '', 'basic', 'METHODIST SEC/VOC', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(578, 'SCH57817', '', 'basic', 'MFANTSIMAN GIRLS SEC', NULL, 'Mfantsiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(579, 'SCH57917', '', 'basic', 'MFANTSIPIM', NULL, 'Cape Coast, Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(580, 'SCH58017', '', 'basic', 'MIM SEC', NULL, 'Asunafo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(581, 'SCH58117', '', 'basic', 'MMOFRATURO GIRLS SEC', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(582, 'SCH58217', '', 'basic', 'MMOFRATURO GIRLS SEC', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(583, 'SCH58317', '', 'basic', 'MOBUSCO', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(584, 'SCH58417', '', 'basic', 'MOSECO', NULL, 'Kasoa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(585, 'SCH58517', '', 'basic', 'MPASATIA SEC/TECH', NULL, 'Atwima', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(586, 'SCH58617', '', 'basic', 'MPOHOR SEC', NULL, 'Mpohor Wassa East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(587, 'SCH58717', '', 'basic', 'MPRAESO SEC', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(588, 'SCH58817', '', 'basic', 'MPUASUMAN T.I AHMADIYYA SENIOR HIGH.', NULL, 'Jaman South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(589, 'SCH58917', '', 'basic', 'NAFANA SEC', NULL, 'Jaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(590, 'SCH59017', '', 'basic', 'NAKPANDURI SNR. SEC', NULL, 'East Mamprusi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(591, 'SCH59117', '', 'basic', 'NALERIGU SECONDARY', NULL, 'East Mamprusi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(592, 'SCH59217', '', 'basic', 'NAMONG SEC', NULL, 'Offinso', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(593, 'SCH59317', '', 'basic', 'NANA BRENTU SEC/TECH', NULL, 'Aowinsuaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(594, 'SCH59417', '', 'basic', 'NANDOM SEC', NULL, 'Lawra', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(595, 'SCH59517', '', 'basic', 'NANDOM SECONDARY', NULL, 'Lawra', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(596, 'SCH59617', '', 'basic', 'NAVRONGO SECONDARY', NULL, 'Kasena Nankani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(597, 'SCH59717', '', 'basic', 'NDEWURA JAKPA SEC/TECH', NULL, 'West Gonja', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(598, 'SCH59817', '', 'basic', 'NEW ABIREM SEC', NULL, 'Birim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(599, 'SCH59917', '', 'basic', 'NEW EDUBIASE SEC', NULL, 'Adansi South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(600, 'SCH60017', '', 'basic', 'NEW JUAB', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(601, 'SCH60117', '', 'basic', 'NEW JUAB SEC/COMM', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(602, 'SCH60217', '', 'basic', 'NEW JUABENG COLLEGE OF COMMERCE', NULL, 'Nsawam, New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(603, 'SCH60317', '', 'basic', 'NEW NSUTAM SEC/TECH', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(604, 'SCH60417', '', 'basic', 'NGLESHIE AMANFRO SEC', NULL, 'GA', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(605, 'SCH60517', '', 'basic', 'NIFA SEC', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(606, 'SCH60617', '', 'basic', 'NINGO SEC', NULL, 'Dangbe West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(607, 'SCH60717', '', 'basic', 'NKAWIE SEC/TECH', NULL, 'Atwima', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(608, 'SCH60817', '', 'basic', 'NKAWKAW SEC', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(609, 'SCH60917', '', 'basic', 'NKONYA SECONDARY', NULL, 'Buem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(610, 'SCH61017', '', 'basic', 'NKORANMAN SENIOR SEC', NULL, 'Wenchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(611, 'SCH61117', '', 'basic', 'NKORANZA SEC/TECH', NULL, 'Nkoranza', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(612, 'SCH61217', '', 'basic', 'NKRANKWANTA COMM SEC', NULL, 'Dormaa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(613, 'SCH61317', '', 'basic', 'NKROFUL AGRIC SEC', NULL, 'Nzema East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(614, 'SCH61417', '', 'basic', 'NKTRUBOMAN SEC', NULL, 'Nkwanta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(615, 'SCH61517', '', 'basic', 'NKWANTA SEC', NULL, 'Nkwanta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(616, 'SCH61617', '', 'basic', 'NKWATIA SEC COMM', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(617, 'SCH61717', '', 'basic', 'NOHUMURUMAN PENTECOST SEC SCH', NULL, 'Kete-Kratchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(618, 'SCH61817', '', 'basic', 'NORTHERN SCHOOL OF BUSINESS', NULL, 'Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(619, 'SCH61917', '', 'basic', 'NOTRE DAME GIRLS SEC', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(620, 'SCH62017', '', 'basic', 'NOTRE DAME SEM SEC', NULL, 'Kasena Nankani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(621, 'SCH62117', '', 'basic', 'NSABA PRESBY SENIOR HIGH', NULL, 'Abura/Asebu/Kwamank', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(622, 'SCH62217', '', 'basic', 'NSAWAM SEC', NULL, 'Akwapim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(623, 'SCH62317', '', 'basic', 'NSEIN SEC', NULL, 'Nzema East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(624, 'SCH62417', '', 'basic', 'NSUTAMAN CATH SEC', NULL, 'Sekyere West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(625, 'SCH62517', '', 'basic', 'NUNGUA SEC', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(626, 'SCH62617', '', 'basic', 'NYAKROM DAY SEC', NULL, 'Agona Swedru', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(627, 'SCH62717', '', 'basic', 'NYANKUMASE AHENKRO SEC', NULL, 'Assin Fosu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(628, 'SCH62817', '', 'basic', 'NYINAHIN CATH. SEC', NULL, 'Atwima Mponua', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(629, 'SCH62917', '', 'basic', 'O. L. L. SEC/TECH', NULL, 'Kasena Nankani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(630, 'SCH63017', '', 'basic', 'OBAMA COLLEGE', NULL, 'Mfantsiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(631, 'SCH63117', '', 'basic', 'OBIRI YEBOAH SEC', NULL, 'Assin Fosu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(632, 'SCH63217', '', 'basic', 'OBRAKYERE SEC/TECH', NULL, 'Awutu/Efutu/Senya', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(633, 'SCH63317', '', 'basic', 'OBUASI SEC/TECH', NULL, 'Obuasi Municipality', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(634, 'SCH63417', '', 'basic', 'ODA ATTAFUAH SEC/TECH', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(635, 'SCH63517', '', 'basic', 'ODA SEC', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(636, 'SCH63617', '', 'basic', 'ODOBEN SEC', NULL, 'Asikuma/Od/Brakwa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(637, 'SCH63717', '', 'basic', 'ODOMASEMAN DAY SEC', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(638, 'SCH63817', '', 'basic', 'ODORGONNO SEC', NULL, 'Awoshie, GA', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(639, 'SCH63917', '', 'basic', 'OFOASE SEC/TECH', NULL, 'Asante Akim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(640, 'SCH64017', '', 'basic', 'OFORI PANIN SEC', NULL, 'East Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(641, 'SCH64117', '', 'basic', 'OGUAA SEC/TECH', NULL, 'Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(642, 'SCH64217', '', 'basic', 'OKADJAKROM SEC/TECH', NULL, 'Buem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(643, 'SCH64317', '', 'basic', 'OKOMFO ANOKYE SEC', NULL, 'Afigya Sekyere', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(644, 'SCH64417', '', 'basic', 'OKOYO METHODIST SENIOR HIGH', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(645, 'SCH64517', '', 'basic', 'OKUAPEMAN SEC', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(646, 'SCH64617', '', 'basic', 'OLA GIRLS SEC', NULL, 'Asutifi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(647, 'SCH64717', '', 'basic', 'OLA GIRLS SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(648, 'SCH64817', '', 'basic', 'OPOKU WARE SENIOR HIGH', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(649, 'SCH64917', '', 'basic', 'OPPONG MEM SEC', NULL, 'Amansie East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(650, 'SCH65017', '', 'basic', 'O\'REILLY SENIOR HIGH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(651, 'SCH65117', '', 'basic', 'OSEI KYERETWIE SEC', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(652, 'SCH65217', '', 'basic', 'OSEI TUTU SEC', NULL, 'Atwima', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(653, 'SCH65317', '', 'basic', 'OSINO SEC', NULL, 'Fanteakwa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(654, 'SCH65417', '', 'basic', 'OSUDOKU SEC/TECH', NULL, 'Dangbe West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(655, 'SCH65517', '', 'basic', 'OTI SEC/TECH SCH', NULL, 'Kete-Kratchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(656, 'SCH65617', '', 'basic', 'OTOO SENIOR HIGH SCHOOL', NULL, 'Bibiani, Ahanta West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(657, 'SCH65717', '', 'basic', 'OUR LADY OF MARY SEC', NULL, 'Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(658, 'SCH65817', '', 'basic', 'OUR LADY OF PROVIDENCE GIRLS\' SENIOR HIGH SCHOOL', NULL, 'Jaman South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(659, 'SCH65917', '', 'basic', 'OUR LADY OF PROVIDENCE SEC', NULL, 'Jaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(660, 'SCH66017', '', 'basic', 'OWERRIMAN SEC', NULL, 'Asante Akim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(661, 'SCH66117', '', 'basic', 'PANK SECONDARY BUSINESS COLLEGE', NULL, 'Awutu Bawjiase, Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(662, 'SCH66217', '', 'basic', 'PANK SECONDARY BUSINESS COLLEGE', NULL, 'Awoshie-Accra and Awutu Bawjiase, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(663, 'SCH66317', '', 'basic', 'PEKI SEC/TECH', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(664, 'SCH66417', '', 'basic', 'PEKI SECONDARY', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ezi_school` (`school_id`, `school_code`, `school_prefix`, `school_type`, `school_name`, `school_motto`, `school_location`, `school_address`, `school_email`, `school_telephone`, `school_website`, `school_crest`, `created_at`, `updated_at`) VALUES
(665, 'SCH66517', '', 'basic', 'PENTECOST SENIOR HIGH SCHOOL', NULL, 'Koforidua, Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(666, 'SCH66617', '', 'basic', 'PHILIPS COMM COLLEGE', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(667, 'SCH66717', '', 'basic', 'PIINA SECONDARY', NULL, 'Jirapa/Lambushie', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(668, 'SCH66817', '', 'basic', 'PONG-TAMALE SEC', NULL, 'Savelugu-Nanton', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(669, 'SCH66917', '', 'basic', 'PONG-TAMALE SENIOR HIGH SCHOOL', NULL, 'Savelugu/Talale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(670, 'SCH67017', '', 'secondary', 'POPE JOHN SEC', NULL, 'New Juaben', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '2017-12-29 19:13:36'),
(671, 'SCH67117', '', 'basic', 'POSTIN T.I AHM SEC', NULL, 'Gomoa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(672, 'SCH67217', '', 'basic', 'PRANG SEC', NULL, 'Atebubu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(673, 'SCH67317', '', 'basic', 'PREMPEH COLLEGE', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(674, 'SCH67417', 'PSB', 'secondary', 'PRESBYTERIAN BOYS\' SENIOR HIGH SCHOOL', 'In Lumine Tuo Videbimus Lumen', 'GA', 'P. O. Box LG 98 Legon, Ghana', 'admin@odadee.net', '0302500945', 'https://www.odadee.net', NULL, '0000-00-00 00:00:00', '2018-01-01 11:47:23'),
(675, 'SCH67517', '', 'basic', 'PRESBY SEC', NULL, 'Asante Akim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(676, 'SCH67617', '', 'basic', 'PRESBY SEC', NULL, 'Tano', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(677, 'SCH67717', '', 'basic', 'PRESBY SEC', NULL, 'Berekum', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(678, 'SCH67817', '', 'basic', 'PRESBY SEC/COMM', NULL, 'Tano', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(679, 'SCH67917', '', 'basic', 'PRESBY SEC/COMM SCH', NULL, 'Nungua-Accra, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(680, 'SCH68017', '', 'basic', 'PRESBY SEC/TECH', NULL, 'Akwapim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(681, 'SCH68117', '', 'basic', 'PRESBY SNR. SEC', NULL, 'Legon, Accra , Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(682, 'SCH68217', '', 'basic', 'PRESDEL COLLEGE', NULL, 'Danane-Kumasi, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(683, 'SCH68317', '', 'basic', 'PRESET PACESETTERS SENIOR HIGH SCHOOL', NULL, 'Medina Firestone, Ga East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(684, 'SCH68417', '', 'basic', 'PRESTEA SEC/TECH', NULL, 'Wassa West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(685, 'SCH68517', '', 'basic', 'PRINCE OF PEACE GIRLS\' SCH', NULL, 'Kumasi, South-Suntreso, Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(686, 'SCH68617', '', 'basic', 'QUEEN OF PEACE SEC', NULL, 'Nadawli', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(687, 'SCH68717', '', 'basic', 'QUEEN OF PEACE SENIOR HIGH SCHOOL', NULL, 'Nadawli', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(688, 'SCH68817', '', 'basic', 'S.D.A SEC', NULL, 'Afigya Sekyere', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(689, 'SCH68917', '', 'basic', 'S.D.A SENIOR HIGH SCHOOL', NULL, 'Kenyase, Kumasi, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(690, 'SCH69017', '', 'basic', 'S.D.A SENIOR HIGH SCHOOL', NULL, 'Gomoa Manso Via Agona Swedru, Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(691, 'SCH69117', '', 'basic', 'S.D.A SENIOR HIGH SCHOOL', NULL, 'Koforidua, Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(692, 'SCH69217', '', 'basic', 'SABOBA E. P. SECONDARY', NULL, 'Chereponi-Saboba', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(693, 'SCH69317', '', 'basic', 'SACRED HEART SEC', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(694, 'SCH69417', '', 'basic', 'SAL ARMY SEC/TECH', NULL, 'Kwaebibirem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(695, 'SCH69517', '', 'basic', 'SALAGA SECONDARY', NULL, 'East Gonja', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(696, 'SCH69617', '', 'basic', 'SALAGA T.I. AHMED SEC', NULL, 'East Gonja', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(697, 'SCH69717', '', 'basic', 'SALEM SENIOR HIGH SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(698, 'SCH69817', '', 'basic', 'SALTPOND METH. SEC', NULL, 'Mfantsiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(699, 'SCH69917', '', 'basic', 'SALVATION ARMY SEC SCH', NULL, 'Dormaa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(700, 'SCH70017', '', 'basic', 'SALVATION ARMY SENIOR HIGH SCHOOL', NULL, 'Kwaebibirem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(701, 'SCH70117', '', 'basic', 'SANDEMA SEC/TECH', NULL, 'Builsa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(702, 'SCH70217', '', 'basic', 'SANDEMA SNR. SEC', NULL, 'Builsa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(703, 'SCH70317', '', 'basic', 'SAVELUGU-NANTON SEC', NULL, 'Savelugu-Nanton', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(704, 'SCH70417', '', 'basic', 'SEFWI BEKWAI SEC', NULL, 'Bibiani/Anh/Bekwai', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(705, 'SCH70517', '', 'basic', 'SEFWI-WIAWSO SEC', NULL, 'Sefwi Wiawso', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(706, 'SCH70617', '', 'basic', 'SEFWI-WIAWSO SEC/TECH', NULL, 'Sefwi Wiawso', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(707, 'SCH70717', '', 'basic', 'SEKONDI COLLEGE', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(708, 'SCH70817', '', 'basic', 'SEKYEDUMASE SEC', NULL, 'Ejura Sekyedum', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(709, 'SCH70917', '', 'basic', 'SENYA SEC', NULL, 'Awutu/Efutu/Senya', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(710, 'SCH71017', '', 'basic', 'SHAMA SEC', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(711, 'SCH71117', '', 'basic', 'SHAMA SEC', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(712, 'SCH71217', '', 'basic', 'SHAMA SENIOR HIGH', NULL, 'Akwapim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(713, 'SCH71317', '', 'basic', 'SIDDIQ SEN SEC SCH', NULL, 'Agona Swedru', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(714, 'SCH71417', '', 'basic', 'SIMMS SEC/COMM', NULL, 'Kwabre', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(715, 'SCH71517', '', 'basic', 'SNAPS COLLEGE OF ACCT/SEC SCH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(716, 'SCH71617', '', 'basic', 'SOGAKOPE SECONDARY', NULL, 'South Tongu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(717, 'SCH71717', '', 'basic', 'SOKODE SEC/TECH', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(718, 'SCH71817', '', 'basic', 'SOMANYA SECONDARY /TECH SCH', NULL, 'Yilo Krobo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(719, 'SCH71917', '', 'basic', 'SOME SECONDARY', NULL, 'Ketu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(720, 'SCH72017', '', 'basic', 'ST AUGUSTINE\'S SEC', NULL, 'Ahanta West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(721, 'SCH72117', '', 'basic', 'ST CHARLES SEC', NULL, 'Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(722, 'SCH72217', '', 'basic', 'ST CHARLES SECONDARY', NULL, 'Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(723, 'SCH72317', '', 'basic', 'ST DOMINIC\'S SEC', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(724, 'SCH72417', '', 'basic', 'ST FRANCIS DAY SEC/TECH', NULL, 'Birim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(725, 'SCH72517', '', 'basic', 'ST FRANCIS GIRLS SEC', NULL, 'Jirapa/Lambushie', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(726, 'SCH72617', '', 'basic', 'ST FRANCIS GIRLS SEC', NULL, 'Jirapa/Lambushie', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(727, 'SCH72717', '', 'basic', 'ST FRANCIS XAVIER JNR SEMINARY', NULL, 'Wa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(728, 'SCH72817', '', 'basic', 'ST HUBERT SEM/SEC SCH', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(729, 'SCH72917', '', 'basic', 'ST JAMES SEM & SEC', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(730, 'SCH73017', '', 'basic', 'ST JOHN\'S SEC', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(731, 'SCH73117', '', 'basic', 'ST JOSEPH TECH COMM SCH', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(732, 'SCH73217', '', 'basic', 'ST KIZITO SEC/TECH', NULL, 'North Tongu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(733, 'SCH73317', '', 'basic', 'ST MARTIN\'S SEC', NULL, 'Akwapim South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(734, 'SCH73417', '', 'basic', 'ST MARY\'S BOYS SEC', NULL, 'Ahanta West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(735, 'SCH73517', '', 'basic', 'ST MARY\'S SEM SEC', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(736, 'SCH73617', '', 'basic', 'ST PAUL\'S SEC', NULL, 'East Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(737, 'SCH73717', '', 'basic', 'ST PROSPER\'S COLLEGE', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(738, 'SCH73817', '', 'basic', 'ST ROSE\'S GIRLS SEC', NULL, 'Kwaebibirem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(739, 'SCH73917', '', 'basic', 'ST STEPHEN DAY SEC/TECH', NULL, 'East Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(740, 'SCH74017', '', 'basic', 'ST. AUGESTINE\'S COLLEGE', NULL, 'Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(741, 'SCH74117', '', 'basic', 'ST. FIDELIS SEC', NULL, 'Kwahu North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(742, 'SCH74217', '', 'basic', 'ST. FRANCIS XAVIER SENIOR HIGH SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(743, 'SCH74317', '', 'basic', 'ST. IGNATIOUS OF LOYOLA SENIOR HIGH SCHOOL', NULL, 'Wa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(744, 'SCH74417', '', 'basic', 'ST. JEROME SEC', NULL, 'Offinso', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(745, 'SCH74517', '', 'basic', 'ST. JOHN\'S GRAMMAR', NULL, 'Ga West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(746, 'SCH74617', '', 'basic', 'ST. JOSEPH SEC/TECH', NULL, 'Amansie East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(747, 'SCH74717', '', 'basic', 'ST. JOSEPH SEM/COMM', NULL, 'Amansie West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(748, 'SCH74817', '', 'basic', 'ST. JOSEPH\'S SCHOOL', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(749, 'SCH74917', '', 'basic', 'ST. JUDE SENIOR HIGH SCHOOL', NULL, 'Teshie, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(750, 'SCH75017', '', 'basic', 'ST. LOUIS SEC', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(751, 'SCH75117', '', 'basic', 'ST. MARY\'S SECONDARY', NULL, 'Korle Gonno, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(752, 'SCH75217', '', 'basic', 'ST. MARY\'S SENIOR HIGH', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(753, 'SCH75317', '', 'basic', 'ST. MICHAEL\'S SEC', NULL, 'Birim North', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(754, 'SCH75417', '', 'basic', 'ST. MONICA\'S SEC', NULL, 'Sekyere Central', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(755, 'SCH75517', '', 'basic', 'ST. PAUL\'S SEC', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(756, 'SCH75617', '', 'basic', 'ST. PAUL\'S SEC', NULL, 'Ketu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(757, 'SCH75717', '', 'basic', 'ST. PAUL\'S SENIOR HIGH SCHOOL', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(758, 'SCH75817', '', 'basic', 'ST. PETER\'S MISSION SENIOR HIGH SCHOOL', NULL, 'Medina-Accra, Ga East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(759, 'SCH75917', '', 'basic', 'ST. PETER\'S SEC', NULL, 'Kwahu South', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(760, 'SCH76017', '', 'basic', 'ST. THOMAS AQUINAS SENIOR HIGH SCHOOL', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(761, 'SCH76117', '', 'basic', 'ST. THOMAS SEC/TECH', NULL, 'West Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(762, 'SCH76217', '', 'basic', 'ST.MARY\"S SEM SEC', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(763, 'SCH76317', '', 'basic', 'SUHUM PRESBY SEC', NULL, 'Suhum-Kraboa Coaltar', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(764, 'SCH76417', '', 'basic', 'SUHUM SEC/TECH', NULL, 'Suhum-Kraboa Coaltar', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(765, 'SCH76517', '', 'basic', 'SUMAMAN SEC', NULL, 'Jaman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(766, 'SCH76617', '', 'basic', 'SUNYANI BUSINESS SEC SCH', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(767, 'SCH76717', '', 'basic', 'SUNYANI SEC', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(768, 'SCH76817', '', 'basic', 'SWEDRU SCH. OF BUSINESS', NULL, 'Agona Swedru', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(769, 'SCH76917', '', 'basic', 'SWEDU SEC', NULL, 'Agona Swedru', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(770, 'SCH77017', '', 'basic', 'T. I. AHMADIYYA SEC', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(771, 'SCH77117', '', 'basic', 'T.I AHMADIYYA SEC', NULL, 'Sekyere East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(772, 'SCH77217', '', 'basic', 'T.I AHMED MUSLIM SEC', NULL, 'Adansi West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(773, 'SCH77317', '', 'basic', 'TAKORADI HIGH SCHOOL', NULL, 'takoradi, Sekondi-Takoradi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(774, 'SCH77417', '', 'basic', 'TAKORADI SEC', NULL, 'Shama Ahanta East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(775, 'SCH77517', '', 'basic', 'TAMALE GIRLS SEC', NULL, 'Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(776, 'SCH77617', '', 'basic', 'TAMALE SECONDARY', NULL, 'Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(777, 'SCH77717', '', 'basic', 'TANYIGBE SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(778, 'SCH77817', '', 'basic', 'TARKWA SEC', NULL, 'Wassa West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(779, 'SCH77917', '', 'basic', 'TAVIEFE COMM SEC', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(780, 'SCH78017', '', 'basic', 'TECHIMAN SEC', NULL, 'Techiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(781, 'SCH78117', '', 'basic', 'TECHNOLOGY SEC', NULL, 'Kumasi Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(782, 'SCH78217', '', 'basic', 'TEMA HIGH SCH', NULL, 'Tema (Comm. 10), Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(783, 'SCH78317', '', 'basic', 'TEMA METH DAY SEC', NULL, 'Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(784, 'SCH78417', '', 'basic', 'TEMA SEC', NULL, 'Tema', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(785, 'SCH78517', '', 'basic', 'TEMPANE SNR SEC', NULL, 'Bawku East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(786, 'SCH78617', '', 'basic', 'TEPA SEC', NULL, 'Ahafo-Ano', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(787, 'SCH78717', '', 'basic', 'TESHIE PRESBY SECONDARY', NULL, 'Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(788, 'SCH78817', '', 'basic', 'TETREM SEC', NULL, 'Afigya Sekyere', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(789, 'SCH78917', '', 'basic', 'THREE TOWN SEC', NULL, 'Ketu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(790, 'SCH79017', '', 'basic', 'TOASE SEC', NULL, 'Atwima', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(791, 'SCH79117', '', 'basic', 'TOLON SECONDARY', NULL, 'Tolon-Kumbungu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(792, 'SCH79217', '', 'basic', 'TONGOR SECONDARY TECHNICAL', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(793, 'SCH79317', '', 'basic', 'TOP ACCOUNTANCY & SECRETARYSHIP', NULL, 'Caprice, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(794, 'SCH79417', '', 'basic', 'TSITO SEC/TECH', NULL, 'Ho', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(795, 'SCH79517', '', 'basic', 'TUMU SEC/TECH', NULL, 'Sisala/Tumu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(796, 'SCH79617', '', 'basic', 'TUNA SEC/TECH', NULL, 'Bole', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(797, 'SCH79717', '', 'basic', 'TUOBODOM SEC/TECH', NULL, 'Techiman', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(798, 'SCH79817', '', 'basic', 'TWENE AMANFO SEC/TECH', NULL, 'Sunyani', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(799, 'SCH79917', '', 'basic', 'TWENWBOA KODUA SEC', NULL, 'Sekyere East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(800, 'SCH80017', '', 'basic', 'TWIFO PRASO SEC', NULL, 'Twifo Hemang', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(801, 'SCH80117', '', 'basic', 'ULO SECONDARY', NULL, 'Jirapa/Lambushie', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(802, 'SCH80217', '', 'basic', 'UNIVERSITY PRACTICE SEC', NULL, 'Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(803, 'SCH80317', '', 'basic', 'VAKPO SEC/TECH', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(804, 'SCH80417', '', 'basic', 'VAKPO SECONDARY', NULL, 'Kpando', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(805, 'SCH80517', '', 'basic', 'VE COMM. SENIOR HIGH', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(806, 'SCH80617', '', 'basic', 'VE VOMM SECONDARY', NULL, 'Hohoe', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(807, 'SCH80717', '', 'basic', 'VICTORY SENIOR HIGH SCHOOL', NULL, '21, Asokwa, Off staduim hotel road Kumasi, Adansi East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(808, 'SCH80817', '', 'basic', 'VITTING SEC/TECH', NULL, 'Tamale', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(809, 'SCH80917', '', 'basic', 'W.B.M ZION SEC', NULL, 'East Akim', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(810, 'SCH81017', '', 'basic', 'WA SEC/TECH', NULL, 'Wa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(811, 'SCH81117', '', 'basic', 'WA SECONDARY', NULL, 'Wa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(812, 'SCH81217', '', 'basic', 'WALEWALE SECONDARY', NULL, 'West Mamprusi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(813, 'SCH81317', '', 'basic', 'WAMANAFO COMM DAY SEC/TECH', NULL, 'Dormaa', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(814, 'SCH81417', '', 'basic', 'WENCHI METH SEC', NULL, 'Wenchi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(815, 'SCH81517', '', 'basic', 'WESLEY GIRLS HIGH', NULL, 'Cape Coast', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(816, 'SCH81617', '', 'basic', 'WESLEY GRAMMAR', NULL, 'Dansoman, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(817, 'SCH81717', '', 'basic', 'WESLEY HIGH SCHOOL', NULL, 'Amansie East', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(818, 'SCH81817', '', 'basic', 'WEST AFRICA SEC', NULL, 'GA', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(819, 'SCH81917', '', 'basic', 'WINNEBA SCH OF BUSINESS', NULL, 'Awutu/Efutu/Senya', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(820, 'SCH82017', '', 'basic', 'WINNEBA SEC', NULL, 'Awutu/Efutu/Senya', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(821, 'SCH82117', '', 'basic', 'WITSAND SENIOR HIGH SCHOOL', NULL, 'Michel Camp, Accra Metro', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(822, 'SCH82217', '', 'basic', 'WORAWORA SECONDARY', NULL, 'Buem', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(823, 'SCH82317', '', 'basic', 'WOVENU SEC SCH', NULL, 'Akatsi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(824, 'SCH82417', '', 'basic', 'WOVENU SENIOR SEC', NULL, 'Akatsi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(825, 'SCH82517', '', 'basic', 'WULENI SECONDARY', NULL, 'Nanumba', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(826, 'SCH82617', '', 'basic', 'WULUGU SECONDARY', NULL, 'West Mamprusi', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(827, 'SCH82717', '', 'basic', 'YAA ASANTEWAA GIRLS', NULL, 'Atwima', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(828, 'SCH82817', '', 'basic', 'YAMFO ANG COMM', NULL, 'Tano', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(829, 'SCH82917', '', 'basic', 'YEJI SEC/TECH', NULL, 'Atebubu', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(830, 'SCH83017', '', 'basic', 'YENDI SECONDARY', NULL, 'East Dagomba', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(831, 'SCH83117', '', 'basic', 'YILO KROBO SEC/COM', NULL, 'Yilo Krobo', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(832, 'SCH83217', '', 'basic', 'ZABZUGU SECONDARY', NULL, 'Zabzugu-Tatali', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(833, 'SCH83317', '', 'basic', 'ZAMSE SEC/TECH', NULL, 'Bolgatanga', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(834, 'SCH83417', '', 'basic', 'ZEBILLA SEC/TECH', NULL, 'Bawku West', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(835, 'SCH83517', '', 'basic', 'ZION SEC', NULL, 'Keta', NULL, '', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(860, 'SCHTE7384', 'TES', 'secondary', 'Test', 'Test', 'Kaneshie', 'Accra', 'test@gmail.com', '0000000000', 'https://Test.com', NULL, '2017-12-31 12:53:00', '2017-12-31 12:53:00'),
(861, 'SCHTL0714', 'TEL', 'basic', 'Test Last', 'Testing', 'Accra', 'Testing Again', 'fdf@fdf.com', '0000000000', 'https://www.vv.om', NULL, '2017-12-31 12:57:08', '2017-12-31 13:02:22'),
(862, 'SCHAF2011', 'ADF', 'secondary', 'Adam Farid', 'ewew', 'ewew', 'wjewke', 'ewe@ewe.com', '0000000000', 'https://rere.com', NULL, '2017-12-31 12:59:01', '2017-12-31 12:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_school_academic_year`
--

CREATE TABLE `ezi_school_academic_year` (
  `id` int(11) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `school_current_academic_year` varchar(11) DEFAULT NULL,
  `school_academic_term` enum('1st Term','2nd Term','3rd Term','Vacation') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_school_academic_year`
--

INSERT INTO `ezi_school_academic_year` (`id`, `school_code`, `school_current_academic_year`, `school_academic_term`, `created_at`, `updated_at`) VALUES
(1, 'SCH67417', '2017 - 2018', '1st Term', '2017-10-22 21:39:03', '2017-11-04 18:18:14'),
(2, 'SCH28217', '2017 - 2018', '1st Term', '2017-10-28 19:15:51', '2017-10-28 19:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_school_administration`
--

CREATE TABLE `ezi_school_administration` (
  `id` int(11) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `school_head_title` varchar(100) DEFAULT NULL,
  `school_head_fullname` text,
  `school_ass_head_title` varchar(100) DEFAULT NULL,
  `school_ass_head_fullname` text,
  `school_accountant_title` varchar(100) DEFAULT NULL,
  `school_accountant_fullname` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_school_administration`
--

INSERT INTO `ezi_school_administration` (`id`, `school_code`, `school_head_title`, `school_head_fullname`, `school_ass_head_title`, `school_ass_head_fullname`, `school_accountant_title`, `school_accountant_fullname`, `created_at`, `updated_at`) VALUES
(1, 'SCH67417', 'Prof.', 'Ankomah Nana Yaw', 'Mr.', 'Adetunji Salako AbdulHaq', 'Dr.', 'Dwamena-Asare Enoch', '2017-10-22 21:07:29', '2017-10-28 18:38:06'),
(2, 'SCH28217', 'Mr.', 'Adam Hamza', 'Ms.', 'Adam Hamidatu', 'Ms.', 'Adam Zaratu', '2017-10-28 19:16:12', '2017-10-28 19:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_school_class`
--

CREATE TABLE `ezi_school_class` (
  `id` int(11) NOT NULL,
  `class_code` varchar(20) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_teacher` varchar(100) DEFAULT NULL,
  `class_course` varchar(20) DEFAULT NULL,
  `school_code` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ezi_school_class`
--

INSERT INTO `ezi_school_class` (`id`, `class_code`, `class_name`, `class_teacher`, `class_course`, `school_code`, `created_at`, `updated_at`) VALUES
(29, 'CL17PSB7032', 'Form 1A1', 'Adjeity Annan', 'CSGEA3640', 'SCH67417', '2017-12-31 00:38:00', '2018-01-24 14:33:35'),
(30, 'CL18PSB8946', 'Form 1S1', 'Godfred Mintim', 'CSGES8093', 'SCH67417', '2018-01-04 09:35:29', '2018-01-24 14:33:41'),
(31, 'CL18PSB5265', 'Form 2A1', 'Quavo Huncho', 'CSGEA3640', 'SCH67417', '2018-01-11 22:27:40', '2018-01-24 14:33:50'),
(32, 'CL18PSB6809', 'Form 3A1', 'Goat Boss', 'CSGEA3640', 'SCH67417', '2018-01-23 22:16:01', '2018-01-23 22:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_school_class_subject`
--

CREATE TABLE `ezi_school_class_subject` (
  `class_subject_id` int(11) NOT NULL,
  `class_code` varchar(20) NOT NULL,
  `class_subjects` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_school_class_subject`
--

INSERT INTO `ezi_school_class_subject` (`class_subject_id`, `class_code`, `class_subjects`, `created_at`, `updated_at`) VALUES
(5, 'CL17PSB7032', 'SJECO9520,SJELM7073,SJENL6788,SJGOV0762', '2017-12-31 00:38:00', '2018-02-07 20:33:07'),
(6, 'CL18PSB8946', 'SJELM4428,SJBIO8297', '2018-01-04 09:35:29', '2018-01-22 17:48:19'),
(7, 'CL18PSB5265', 'SJECO9520,SJELM7073,SJENL6788', '2018-01-11 22:27:40', '2018-01-22 17:35:20'),
(8, 'CL18PSB6809', 'SJECO9520,SJELM7073,SJENL6788', '2018-01-23 22:16:02', '2018-01-23 22:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_school_signatories`
--

CREATE TABLE `ezi_school_signatories` (
  `id` int(11) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `school_head` longblob,
  `school_ass_head` longblob,
  `school_accountant` longblob,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ezi_school_signatories`
--

INSERT INTO `ezi_school_signatories` (`id`, `school_code`, `school_head`, `school_ass_head`, `school_accountant`, `created_at`, `updated_at`) VALUES
(1, 'SCH67417', 0x89504e470d0a1a0a0000000d4948445200000140000000a60806000000abfa56810000001974455874536f6674776172650041646f626520496d616765526561647971c9653c00002a4f4944415478daec5d07b81445d6bdf044440c984170055111c51c30a1281850d78439b0c65544943507504c6b445605c59cc32aa888115010c4352bea82047320990341d25f67fbd6dfb7ebf5ccf4ccf4f4f4ccdcf37df7d3c79b37dd5d5d75eae6225228140a8542a15028140a8542a1502814d58c063a048a8858c6483b23eb1859df4873238b9ccf3434f2a7912946be3732c3c834238b75f8144a808a4a433323c71a39c6c86646962bf07bbe3632dec8c746261879c7c85c1d5e8512a0222d58cfc8ce46da1ad9c8c83646d63552c7bf87b637d9c8cf46a61af9dcc8f246be32329d7fbfd4c8b2ac29ae696405fe8eed8db414d79a67e40d23838d8c60ad51a150281201486d6b23bd8c3c686436931764a1914f8cdc61e4742307b3b95b2c563172a891e78ccc17d7fbd1c819ba192b148a52a28d91938c3c6de4574140338d0c35d2d3c856469a24702fab1be96f648eb88f91ac852a140a45d158c9c8ee466e242f186189e633d6ee8e66222a275a187944dc1bfc841df4d529148a42009fdbbe468619f99d4905e4f7b891d38c6c405ea4366d8029be80eff75d23dbe9ab542814510042dbd1c8bf8dfcc124f207935e67238d2ae43924093ec3daa142a1506434713b1979559890ff35722e7911d84a03a2c7378967b94a5fb142a108c329e4052f6400a12b79c9ca950c44a6dfe2677acf48477dd50a850226ee20239f1a59427e30e36a236b57d9b3f615c4de575fbd4251bbe86e64a22084a5ac211d42c9a4ab94035d99e8f1ac4892565fa0425163f8ab918f04e9fd465e90638b1a78f6b5c8cb4b543358a1a83120fd6314f96565d084aeaa412de8627e7e246cf7d069a15054375a1bb98d353d2c7cd4c91e5cc5666e2ef4243f9d470950a1a842b422cf973786bc765158f0c8dd43c0a3518d8fcd61e4758b99af04a850541fd062ca96a7a162e376f23ab0289400158aaa055a43a1f675112fee1b8caca1c392d104461fc17d7438148aca471f233f91d7fbee7a25beac18481a055628aa02f0f37dc20bfa1e8aa7b75e35a3b591e7c9f789aeac43a250541e10cc18cb0b7912795d9115b9811c485be6a795200a4585a10d6b2eb6b309525a36d061c9dbfcfd82d4ffa750540c706010ea75e7f202462507caba1aead044866c86a0e6af425101c05916471af996172ea2bb384b63791d9abc710ef9e57f67e9702814e93777d18a4a26326b3e5f61686de4051e479403b6d5215128d28bc3c94f669ec35a60231d96827189d0fefae8702814e9c595e4d7ed42ebd3964dc501bebfb785f6a7a7c3291429037c7d28cb9a22b4bec355eb8b05b615fe2fe495092a148a14017df8de13261a7af36942733c388a89cf268aeb86a250a408171af99917e86cf20af57591c6836d8cbcc3638bff6eab43a250a403e84cfc0479b5bb58a0cf1a69afc3121b70aa9d3d141d49e367e8902814e9c096143c8be302f20e1d57c487cbc4f8aae9ab50a404a845fd8efc40c71ee4054014f1e10cf24b05c719d9448744a1283fa0e9fd2216e63a3a24b1636f239ff318238ff2401d1285a2fcb88ebceecc5898d792e7a352c48b6e82fca001f6d6215128ca0fa4b5d872b653c86b6ca08817486e1e45bedf0fb97fcbeab02814e5031a16e00c5a7b0ce5114696d161891d6d1df2bb43c759a1282fd6a46072f3d1ba284b467ea3c538a3e1416b1d1685223de4871e74fba849163bd0cfef7131ce638d6cacc3a250a487fca420e9f945f222954a86c5a1317987bddbb1fd94bc06b10a85a24c406bfa0f33909f2bd79276242e86fc6e1763395dc94fa1281f9068fba891790ec9c11f75829196c264432fba1ff9f75be8d015847f39e4d7458744a1481ecd8c5c417eef3e2ba8f43880c2cbaf5623ff18cb6d7408f306dada2f50f25328ca0744734f129a9c94a7c8f30366c260f21b20a806981f7016ca421ebb694a7e0a45f2400003ad951687901fb4c16c4d0d70c6c7a7a4a570850035d45f0af2db5d8744a1480e7f21afbdd27c5e840876489fdfe594bba3cb33e2f307e8904606824b6394fc148af298bbe71af99517e012f2fc5020307b6811caae7245747731f20d7f7e04e9391f51b12cf97dfd407e9d7548148a6480e8ee9bc2dc7d83bc9ad3b58439369a7fce05abfd7d4fda99382ae02218467ec043c94fa14808d0f27e135a1f1cf08df97736d1191ae06611be6b7f23b348eb81f3c14ee4e7540e67178442a12831b0d05e223fdaf8b1918e461af2ef0792ef073c302299bdce9fbf86b40d5614c0bdf095929f42912c70f8f84f14ec2a2209eb10233ff0ef064624b36b58831c4f7e42b422332e149bcfdd943da548a150c4006877b709cdce766f91f5ba686d65cff1981291cc0e60c204a96ea0c39c17f95d4d7a8e87425172b43632522c3c446adb857cee3ef22b10908691eb1c0f90df1cfefcdea4e77e64031ac4decf63f58791f3499bc62aaa006977f66f4a5ee5465bfe19b5bbc79057e121b1a7917d5923c4096336089209f83ea4c6ac4ede3920e3727cbed6c90f8d0d7a905721d38b379b4a471d6faed0fc5b919704bfd0b13a40f69fb1653155a7822249ec47417f1f7c754d337cf603fecc5c8a16f57d893f3fc8c82a3ad419d15e8c15dc0a9d2af85990078a9e8f03c80b7afd42d1ba0259994d5e2591067c1425075a51d92a0eb4ab3f95fc1417174887b149d0976621498bebc90b7a8c254d76ce868d8c4ce0717dd7c8d615fa1c3b9017a99e9b27e16592f7d83251284a4e7e20aabdd85c0903021f5f939ff3d72ac7771fc83bffc4089f55f2f3c67558058ed58a460ee54d2e8cc44086a817bfcbc88946b6cbf08c30ffd1100339a6e3c5df3fa05344113740724f90df8905c72776cd427ec0cd822cff46d9bb38afc96489a8ef963adc59c9cfe6450ead20f2c3bbc721f64f87687b9823ff3172257901b2150af87ef80aedc14eaf1a5943a78a224ef21b45fee96c28636b9be36fe09f9ac99fff248239fb0a7f76bb2c9f59d5c871bc50d028b5d63a421f23346a905f25e445c21c855fef5b87f4e633519dc8efb5586c457ee50be66a135db68ab8c86f749ee497aff637943f8744e9b0c83712a6e13ffc592c20dc4f871a7907d08eef17cf3e24e51ace0abc51bdcb6e1297f44e8889f4a4abe53a719d81ba6c15a520bf2f22925f53a1a97c974353e9c79f3b2764d7aee38534474c6e94d65d445e37e95a00a2edb60722d23efe9ee27b5d8fc9f96747dbc3fdffa3441a2b92bdcf17d742c38d36ba74cb8e86ac95ef66e4602397b1128374ad5d8dac5b090f019fdf42417eeb45fcbbab78b1e2effaf20e1d86eee425475f49f5fd3e1b9297ffb7582c7e984bb594e07b1ef90d25dea674fa4611fddf9382670bdb13fcd0c167e7125e1be477a1b826f24f4f53ee298ba2b427af7bb4aafb8a7247eb97f0c68840572a1b1b9f2948ecf33cc88f84f687bfcfe4a4efca8b1b2910ab3b3b07ae2d730cafa0da6a8250c79af11f297e7e98e548ba9ee44cec6f58436f5ee2ebaf4d5eadb324dc6b948b12d3eea0a0a048e1792a3e75091666ef343de000f2cbd63ecfd3a4384290d71d19162efaff2171750c057b01b660adc1469a910ad1a1c626d7beaced59adbb5bcaee0f131f553a339c49fc11bb2b92a83fde944d5d7beddf8d5cacbc5472d26bc7e33c398b56877e9da37803efcde6ee2e8207e0fbdd9dad39d9e17d715a4870a0203fdc14126cf3a9c31d47bee37bf390df83e410159e49c184d5839914ed809c95c574ae46c0b73a543cff6047334ec3fd3d2c5c2256c653722df61bf322f9555c1f25707b283f95040d5893ef47fe498c4b1dd242051272838fa2fc53b2f0fdebf3e66935c1b2fa0625f961a277a1ec797e2e5a0acd00795d6b6420bf190ef9e1ba36370cdacf263566eef6178b1a1af7de29ba3fece0639d898fb9f1186b834901dac72b148c28a3547245e5a9d8818c0da45c8dce60ae626d23f0d43ea6eb61a3ff9015a77bcaf5d0c7533041f58402cc99f3d91c59ca3bb51bb0b035c1070842941a2352676a29b7af2b6b304bc5f3af96927beb4c5eca8a4b7c38c03ec9d664d0face74b4be29a4477a9642db6bc19bf1ac104d0fbede73a834e5a9b87677bed667e578789830f270f2cba8b068eb6be23bdca2f4114c74076658fc30816ba5d57d73d6a02cf1cf6413220d2dbf3211df23947c4f46b4f57fc3d1fa6e56ad2f56c0b78706254f390ad0129e973725a4e9d789eb26eedb9161eb27a9b052a496e4577ebce06832d6d9d99f7fbe54688a33295a87986a0136802fc578ff9bd291b7b61bf96dc7ca4d7c984b0f38f7f20e6f9a8af8cc5c9cb5f334d54f5f1ac10a49d2aea0af9800374f72105e253fd7ee532abc9d10dae1db04d85ee4577e8ce07febc75ae553e43bd2112d5aab46261c76da7f91ef63fd85c7a97199ef0bdafff810e243c063fd84ef65659e27b215d6affc6f75a4886bcd83dc3e70b43df8e591fd518e0aa33ad6ec6d379fc4703905831e5b1461860d26bf25fe3a0ef9c16f84c0c6440a962bd5526e9fd468300ebb94f97edab1192ea3baf0fd5c43c927a662cea15c52660160537e9cf2cb3f556427beee21c4879cdd33cab811e3ddef21def901495d781b618642fa50f67add5cb0a1ec493c98f7927f2ad951e43b5631e87d0b34b32b156819368d9fff752a6f941bae892114acd145a9211cdc49a71dd5b14be06347037d9b924bada905cb036bfd35678c417cbd8b5cf3716019f20b27462779e1896211bc5c2421e16fbfe3efba93bcf4843ff981865030827700d54eb003beac7b58cb5accda55b9a2bcd869cfa66085cd6c362f93be2710df4146fe1bb2288f51ce8a0dadd9fa72c7b8570a88cf92f39542fb4bac91edd9c25cc5e22c36f9701361be7cc10f8392a8e9c2c4c2c0ef5323e4b70efb34ac2feb05762f940b68a820b3f717f1c6548e8edbe800fd92b328314e17917f76b4a238204a7e9de3de4059e5d5295a7fd8903710e4d72fa90baf29544edbaaaad84139d5d1f25c412fb88d6b60e26dcd8bdb76cf81567c28952fbd05443ccc79174826deaa0c664ef7108d0fcd0b5045d09c147101c9c9b23e1b24f822a5efac14e418dbe0db5b495ef816f26b6d11856d1ac377662340683f6dab7cd2b564a2917eb521655cd8d0a4cea5605b2ad468fe3d6132b6c4372984f8ae51e28b7dac0f08d1acd3d83e0d2e90f3c8f73f2756ef8f10b70c7c6c16c382c0df3f2fb41e29d87956abf2898768ee14f1cc482bdab6cc5ae818e73dc00f9964ba11e6594faa1fdcf891cd3025bed2921f4c4a04dbd2785c02f8623be18a49d4e77b8bf00b20e7a7710c0ff36206f2c3e96ed51ce985df74b0d07cb1b8cf2ae33343eb3bdfd1fa90589a64422b3461f484733bc5e09c977f52ede47c264d7e073a26ef3329bedfb558090349df99e485d714da1f4ce03872bd60c6cca3fac5d2e81356cd9d5c8e252fc8639ff9392a6fbe1afc3bc39df7f068827e1f68bcc8d95b40f57dbf689fa4c79b960e5b51b02d58ff94de2794a58ee49f0df366d237709e98a071687feec1e856d250dd502a346373d28e2348f0202a6f0dafcc31b4474a9e9ec075116944c30c64ee2f71e6004c5f34d768448a52621de17e4933f959cdcfd61ae39e9b267d035663591083f607cd623a85073d8ea9d2890f2d4716e63f40e53f95ad2ff9012d5b46b44d89af09bff1ed142c57b38d0a4692f6e64b0aab905f6c00abebc994939f0d84a12022f14280c3c8cffbbb21060dedcd905dbf9a091019f3f66026f433ec54e6fb598eea370b78b88426ef5a3c0661da1e26347ca11bd71801c1d7bb2379dd73cae1fed846bc8377534e7e93c55c695f8e9b7898fc404587224c36742d799982410fe495fd95fc446824b456cb99ac76975dcc9ad66554fed3e8407e0f39247465c44d07b5d73bf00e9cabb9001a131ccbef7b6ec84687dc2d1c63ba2cd51630760f5230ed6b52c21b80d4fe402a69ed92d342901fd6cf91e5b809687bf6709d9154f8a96ad07adce30e91d260831db61618797fab56c144c7e2b66dab4002a5aae40071a1fd4f17d626baf0b5c28248883c8f10e38f00548f3cae753cf981b0339cdf35e4c58d00d66b62ce4841b7eaeb6a50dbb3ef09e7582c0c1917b897ba27782fb28262688ac9cfb6d15f502ef273cd5f98a785547db426ff6c5a3bf0873a5ac73fc98f087748e1e445734d94db0ce709bbd899c4a852b88dbc965553c4ae7536c51fd1469e1c92c72750fdc8a96c507090f89b268ee6378f35b47c70bdf87ba4aa8ce34df15dca9cc88efb4392f76e55a4d9e70bbcff3e59de158250db27742fd0b84f22bf9766d70a20bfc3cb79330ff3625f4085e5a881fc3ea360326bd710134ad603df4ee96875858e22a8c8f8298336837ca9b1144c0eb732ba045a1f9294ff9d41bb0a1390f296e23d16437ec4dae52711af8d44daa3a9b68e280803825f6f8a71f98de7d421e49f95f27c82f7b3aa307fa7a66cac1ab2a261f340e7979bfc88fce8ef4b0598bf782074e2b58eef2f287b599b3c350c267339d2431ab059f87688b9022de7662622003ecd3b3310e019145fe138a2c57753fd9cc979fcef889cda36ef1bb37fcd96afc13c3e4d3ccb3c26a66216d051bc8846f3221ec3662fcca9b3281d1daacb0d10ff558ed58335d48e35e141c2fc4d3ad9fc1dbef6e32924bff982fc0e2bf74d6d44be03fbb43c17f432bc406cc0e303d606b3015aa0edfb07e767d299ff20dd89216486949d131c53f624f25bf85b93730c930e7eee1b93c977166bcd6eca0822a76b67f0f3d922717bfad6dbe26fcf536e2a3976a260f71c34b5389e7fb78a203f6c46491fc62e53d0ee4cc978c1c574bae09a54901f708af05bec44d1db0d81fc5e11e4373c0f937690d805922a876bcb64edfaf5c63129d63904f382f82cccd1ebc80fdc8c8d89009bf3755c32be8b325746346113d97ef60636afeccfd0da56537e2aa9d677b5f3be26b02261d7456ff24bceca414069234004590750b0faa75d5a5ee8adc274ca27f35a92c970caff14aed784d9bc3f95f63c87d384d6261b12ec1c72ddcb29e8ec7f9282c9ccf0f74c89810077763408ab85663bcab1099b34d20787fbb5d17544a4772be13882580fe24deb291e07bb01ce622d14beaff6549dd88a82e70edbfe79727c068bdf3f5ba6fbc4c6fa724a4c605830a31cf2db304d2fd56a0f70e246f5ffc9c3d10b213feba7b099df8b58c38afb28c3f5792248ad6f1afb63dcdc341c342e3b937c61a45b88462c030d8592cd0954ff5cd501943d356813c7cc8529d1d9c825144c398abb9925721a7bf0c29f47d18223575619f161ae20bd4506cabee48d3b13f9bd42e50b0ee1ba375179832075bcc9db636d17b3b595ba1258dba6fea5883727c9ef3e2aae5e4f92a08d1e5f44f1d400c2893fdb218c534248be13bf1899b83d2c83ef0df7fb3e7f064705ae1303f9a15cecd41c63df2184fc6ce4ec4ef1ef71fa54366273fad788a427a3d2bb5611f935631f9e7cc6971dab603da1192e61ed789532de33c8e7502a5f1a0c368c33c586090bf3012a3cbfb8a4b04e4968608df220bfb3289e0c7f90c88b148cc65a222cd43738c4d1560687f8c5da32d1c9bc2d90db8139c8e82dbed72e31901fb4d15c07fb1cc0da6818f9017793df4e6aaf18de4717aa7f384e144180a8bf91d5ab88fc36a4e039c878efb7389f8116fe8df8fd6d29b9f7f5c4dc1e95b0c93bcc99af27a6f5052f970701caf36afb50fce54d88b8ba5524b62b309cba51d265d0ce6b34f9be4568807b387fdb8427a92cddc224efc85acf1dec37699345332ac4b439d1213f44cc378bf037df3993e950e73377c7a001e2bd1f4ff59b9346113cc7c9547dc79782d86413dbd9fc9c16c816b8c07937d7a5e8fea13c5c4ec995c2d5f198cd119af04794fcb9d1790199e9f3231020c8efcf12929fc5aa3ca9bea26041fd2236f5b2e59ec141fda1436ab2db2dfc8b173b7e1ca492d813e6f7e4ebdadfc5d9b1d9ed08fd7e0ef20361dfe868a720a76d3290e40f5458cfc10ebc19ccce83f0e6b2bbe44caade5cc0231cd3ff630a9e91b225f941065b3173740a9f436a81a56c8680cde026a1058fa0f2763c8f95004f14da5229c9cf05fc4857f0604a6d0deafc76148cdee2b3df523018b09220bebe0ef1b9116014ff7f1ac10758089a3a6614c82fdbd17ec88b7cd6211d94b7654a8b81693f9282d529fb517840a98e8917ee858979901e4c750469f62fb36fabd4c0fcff87f3eca3c4d8e35d9e43c1f6626ff27c8cfafdf8eca5e49dc752ea7a6959120722bcb7445a9f5d3bdf929f0b49954680b787905b77413e6752f9bb7a34676daabd20ebce0ef99d22eef322c7acc6423ec8798e951dcdf127be465cb89e7cff26d25cb6cef259b44e92a7a2214012a579ec7e0e815b99c2e4389282292bb9042702a2a9ebdfa8763a3563e319e28cc3636223c15a798782f5cff746dc10e017edef580156632f3556e17769b5f79b63f8ce06ac20dc24ccdd0fa8bc1dcf0b269479149e0623c9ef524a674ba38b85a93297ef79595eb8b203f2efbc73af106272bfe6905f9c7dfcf6a56000235b39d459c2945dcaf7d5318f6b2198f276013ebcc5bcb01f62b31b8d1d505972192fdaab9884b7a33274e84d90fceea560b0e346fe1d16badb57f167de5ca398863d855fcc95f1093ddf9ae4e7e25913b5d094b3463c8fbf17ee29581d157b96b725b959e497819d2334c3a194ceb33b24f9cd66ad7017aa7fae2cf2f63608f9fbd6142c608f9bfc8027c4f79f9b619240c37a5cf83c31a1fa51e111f08d2998781a4678eff102878b0151cdb114decfcf15cc89e759ebae16b47736c1596c363666abe7c79071f88282398061d8c0995f8b59e3db88bfd75a5d9420094a57c964ca2f611df9b09bb3fb48ce871b2a7d023c4f7ea2305eda2061b281fcd2d8dea8af20bf6f59d31ae6f866a6f1426d98c1d4fcdc99d4c7c7bc8bc1696ea3aa209cb0f65fc855fcd2d108b6cbf33af0c3a023cd25ecd77b8f35b857a9fef9afd0e8902a83b6645f6521ba857cef2052d43ebfe4dca7ad9059afc2e7fee614f485ce60f2434968b68e3830f7b255336ce890df0fec5bb456d770d60a7748f879d77048109a6cae338161eeb662d3793e053bdef4a02a80ac057e5f90615ac9afb7f0eb7dca9acc2ce7c5643b7a1211be9954bff6768d98eff312a155f5747eb7366b874b04e1e49bf7d89eaf912b7505f7f0088fdb980c1ae144dec90fcfe1f36be6988a20d938ce6e4045cd09946c0e6127f293da6dc230b21dee0e1923b808ee149beec82cdfeb5684cc62978cbcee22418830298f116bf0a9029f6739f65362d3cf5667db945d5ad297095f67d851094dd81a9ce3cc97f7a974cd7f13c74621e60f9cb52d5378af5da8fe79b2f2c5dc9f83c80651fd72aeafa834b5abcf905f8a6453289665d35d9a55d0aedae631c9b198b2354995a55a57f3f5a63abffb83af7b441ebe20689a275330e0f4241577803916ffb5e2fb0626348f0ea460bf456c40df856c8c13d9d45d4e90c69c1c5ad35114ec02edfa7d57223ffabb0a6fe0f29aef53f48624f6fb2ea1e00154d3287be00c960eca3cbf76e604dec5aafcae0f664dd7fe7e093fcf195485273afeeeec08ad524a7e33332cf6577290581b0a46f0a4f4a7f8bbd1341726d0045e141738e481057708e54ef06ec026fb1d19fc51aefcc8be3d0433a6872ce853f3d4b496610dc58d32e3e7624e776bcd9a87d4dc4f4e601e1d4cb99bcd62e1cb4edbfb8bdf8dc9f2dd9b08d319666faf2c9f5d85354eb79ae6a488cfd194b5c8df42ee3fea79ba2bf226f9bda348b80509bfb105519547d9ca6e3036a090b668df99212fc5e6bc75a4ec9d64642798df78077b52f833762cc1fd36777c40ae7fed8208a4bb0993f3248a1ed1bd9717d038c7041e5e80bf09dad9b1149e5e532cf97577b48f3f794c4a8d1e1908435a034787f8f35e156b2393f6d784dd18f61d0fca721ff09dbeee5cfb2776dd44c1a6eceb75efff4fb63cf24d5d6a41c18a237743dd89aa14b752786e581cc762c601980a2f5030b881c9857e78dbe420bead9808ac4ff351f29baf0e6495feeb1299bf1750788bfd877268d76bb04ff643ca2f95055a3bca9eee13ef7301fb36ff52c062e843c134a2b8c8af19cfad2531901fdeefc3fc7db94c4690f9f939c61091e02d4348ed72f1992772dc8fd5f0dfcae05a8036bf1f05d39df2213f2826e766792fc715308ecb32e9e7f223df40d555e7fdbfa4cf45c257d18782c184de54beb37b919c3c98c253334ea6ec39892d5813b2bebe596c6aca67291501ba07a34be999c1bcdc9a35bdc95926e047bc405e8f48882f527e398456e31c4cd9cbe2c616315e5d1c9f9295ebf3f88e3a364de5110c209d6c674a40d3be2ac7783d9481b03a0973197ed45db268fcf630aaefd9ea70d1ca31f9e5910703229014321dc2f23c7f611f60beb0d9038f387ee33eacf11d1f42d456c33ca89ac86fb25099db397eaa01096b829bb1af6b1e4fbcf72918b4184d999dee70065fea98ca78b96b867c5676b529b648bc013b945f755c09bff362b0daebafbc002e66cd6c1c051dd7ae80886ee777b2162fb0253916f2674c06f938d151033d8aea0755fe7036a03105921ffcaf4333dcefc4882e88d55833fe20c3f73c13324fd165e85aaa9fbee32ee8ebb368ab03c5678764f191f6a460dd703b3137dab09f2d93df3153a796c6fc6e1ecbe0fbfd9937ce7c9b50401140d2fc730ef1f50c5178ec4977ef3ad75ec226737f4afe488ba2718d20bf19218482973741988e9fb0da5eaa8ecdf087f4632dc7de1708625dfefddd62719e14a2fd21bfee9f0ef161e11e4699f3fa401236a0f2381556eeb5159b47334388e376b1087a52fde6a7d948ef5626057bef788ecf23fc2daa155ae6b1088ecbf0bd93f87d9f2e165eae4ed561c0e24120664e967bcea5fdb5e031fe36a2d68b9a7074cb1941e1875849c17bfb5b966b6f2ddc006e330469a9b8da25d6cb89fc6c6f86686bc3c8cf1058487e7d6e63d6384138cf53f8d9c296b487537e5d95f1be77e339323b02f18591fcce8e6525efe7594af6cce3827194e34fdb81c2a3904d78b0163a2ff674d6a88a39c9ad05ef6c973ba4679b696eef68302788857813ef787821fbb04fc635931fa4dc6925cdc86f231f350fb011dfdb95bc309684f860e09f09ebeabc229be137b14f13dae2785e0c88041ec9beba3ac7ac7accb9ce6426ae5b9ce7be24a2bb0263df3783c37ba4f0edade8686dffc8e3fde2dd1c41f5536f2633210e131af18959361768eff3297320e9d3881b439840fbde3cc7731ce46898ae597d6a1ed79fc19f5f4190eb9202ee7b21fbb2a358256bb319fbb4b3012fe200ca515458792b88fa58b6c6c2b4c27328a5f5e3473984763ee5ae7cd883358225215ac2605ef030213bf37f1bb1a37627feb74eec0fb98877b5a90ee1cde581eccb3b4cd822868afd85a3fa87056e40d0fbe7e1b71ce8ec663ff1e4eac1bbe5aebc41f4622df4fb906bfeca84bb23c55b45b2871384982e76d86dc9af5e98cb64930b0d39d0f04b0613cc354377203f49f839a18de722be2343880f44758c782f07939f507c995854b8e615217f1fd678f554a181f50ed948b395f20d8e6836ee4bc17cbe6bf9fe9041f095b3f0a7b376e41e708539731ed52f255d86c929d37d625ebec296117cde2f917f4ef5161948096bee0cdeb8a665f8ce27597188030d786df6a2faa597b0d80615e0872e198e71c8eff93c031c87b0037e1115b6e34ac21bc9e641a73cee21531a8ced5cd29b0a4bddb93f8ba991497ee209d983e23fc364253681e70bb23f5f2cd8e52878025c2ecdaf116b595f46243e8be30549dd9fe33957e26b4c0919a73e21d642b788266da64867b71c638879702385d7efe67300f7d69439126e09e529b60a241175e00d0c84be7a8e204467361f5fe375016be0af14ec5ede9415046b42dfc3c4783bbbaaa664b9c725fcee31874ad9c6ac21bb7cfa51b05061113f5f598970bf10adab50c7657bde7d1fe39d7a31653f1be235de39ffce13a298a83276b8fb78677c8dffbf2b15d7a5a601abf36fe5f0b94c605f4f172a5d6388bd9c05f75888e68571b491398cc346199ea9233bedbf0f791698fbb9fad049020cd3009bf0583c18b2314da5ec1da297e50d305ff29b90e179c3d04d68f7dfb29f2bdf60def2144c8191bec3be14bd7a270eb4a7fa11d96ca4070d75005b5549a38e37d6a10e113e570e22ec10e284de9bf28b1246414b361bd3d8322b2ad6e017b71befcc7bb05fae6189afdb907d830b84b99b29cfee2ce1dc875faa8df0d9edce0b362c87f01b5e10513b3877213f2d672193da2d4caa1f52fd83926c97987d23128d6da9f4346f66e3f8efaf60f2da8582e9198f53fe671db78ae0e78b1a3c18c0ee9eeda97c6d9f366177d19f54bf047406cf87de949e2eddd644be5e68fc8bf83d6f9fc40dac18427ee75169cfdf55e40724de8e17ef07a65bb6a3313b527e49d2afb2cfa710cdfb5f11dc19a359835eb944633382c967459d2a0152de988979c30abae75ec23cfe932daa92569cdde598a80f5305372dac422022faa330abba45fc3ba905ba82322fe4eb2112576c4b7f68f347b266319e353554e0207071500ea25628b26984d6549f5c4ab3f806418057aae6971ad863036d643d9f6e30169b32815ec13b29fcb270da37d1e155a41c70f9ec285c2c70fd9c52aa8bb5a6ea3ec4a6d2002def33f27d6b1752fc9d68148a4a00b4415b1a08dfe0ad3a24d50d686bb2ae74371d12458da331f9398ef00bf6d421a93e40c39375978868b6d2615128fe07b8846cca12b2095ae890540f76a160650312979beab02814ff0fd94c62a16a81d5039400dac273240b8735725028149ed627fde28a0ac72de45796a040bcab0e894291114d9400ab0348d87d5198bce8bab1890e8b421189001108e9a6c35199409716d9ff0d45e0ad7558148aac407ef291e407413497b502812464d9d21e9d3ad6d061512822697f686587c280c774382a0f38504636181da4e4a75044026a84af13dadf0e3a24950584ec65cb29147c6bbdb542911b2889b34d675109f2880e4965e134253f85a260f2433db04d809e44eafb53f253286a84fc7612e407f7d1463a2c954b7ee878bd920e8b429113756cf64af26ba7c35239e8e5901fda8cadacc3a250e404aaa0fa91df0b70926a7e95053401fd4690dfa95564f6e2b025e462a159e556faaa1531028d50d1c1fa2d0a1e94a43ebf0a02bad64ead42f2833f06675da071eedb54fc191a0a8504da5da101883dc31a9dcf4fd661a92cc0bff7ae203f9c2bbb5a853f134e3c437d32ceb145a3868b590b5428e20094031cef3945687d38df652d1d9aca833c8717d51e955cdbbb9991dbc83f2c6b02ff9b421117f1ed27cc5df8fa3e26af4c545181b886fc88155ee69e15fa1cf0c13c49fef9d02040b4e76aa0af581193a97b3af9b5f070a9e05cf04374682a17dd2918f4b8a002cd4494e4dd4bfe014c1064dcff455fafa248c07f8c03db7194eb4cf2db593da7c457f980dfef7d411a6f18d9a0c226e745467e11cf8020c72efa6a154500164373d6f64689b9853ade9ba872ce2956e4c010f21b9a422aa94719ccf48fc5bdcfe209ab69078a4249af05cfa1d1625e617dc0877c82ceadea023a524c172ffa66aa8c43c0db907770b93d0b1ae7addea5e6aea2002098b1339bb732fd0b730b09cc97579845a4c80323c50b870f70d30a3077fb39e6ee18d2c89b223ad0960af5b97dd9b49deb901e021a9729e9553fe0bc95bdfd7a52ba139e11a8f954dc2f0e5d3f9c4951a1c8a4dd2178612b7fde11f367a9b01e9e212f5340fd7a35aafdfdc7c8fa29bdcfaecec4fdd6c839469ae92b54083466cdee54263b04c2fe0821bc45ace52190b13ba94faf26b183a34ded95c27bdc89497aa1d8a9d17e5f0f5aaf6df3151d55d065e53c263ae4e3cd08213a97f06e662ba2a22b34b40f5d3c388efc800192863f4ad1bd210ad7df480ff27311871a399fcd5e4575a221bf7b744d413795cd58cb6fcdd2260ff2c2896b48e77ac2c8a3467ea8269b5e511cd0d2aaa318cb3bc8f305961b2d8d9c4d5eaa816dbbf51c93e13b35fcbed0576e3d2601e4a0ad4e5eb50b4cbe25fc99a5fcb9d6fcd985110907018069e455cbd445b88f396c5a36cee3fe718f2b32a135618d0cc4b63d79954778d75b17313eb00c90c7fa397975ecafb2c637af1a278312603ce6efaa42b32ab7f607e23b87896fa51a243e349b589f65331e0fc8da948c537eef148d05c86cb69175f86710f974dea091a33793c9ed079eb7f8ef945a5abc4a80c5630ff24f7283ffe4c732dd075257e0b03e98fc80c6b34c7cef56e9d8afc5848333229066810865f398befb27f2f2d616503032be94d7cdba54da3cc9df9994e6f1f51bf23dbd19a23136e0fbb4e4b6028fcd44231fe81255024c0a6fb059953401c39fb7ab789f2398f8deaba2b10501b4e3e7ed6ca4139bafb9805c34f83a11ed9ec1a4069fd654deac96b2b9f74d01f7d48435cd16ac65ae5f80b98c6a9b463c6ff0f3f7ba8c14958401e4777dd939a16b62e19f4dc1bc43c870aaaeaecc08da20b5e23626b0a55904291af0a7ddc19a304a10dbeaf454289223c0234a7cadbd99e4643e1634875b580ba91620a8f4009b7c99086f267fe678f27c7b6acd281465c0614213439ac0da319b7d306d917335db21802fc8ebdab27a158d259a314ccc4078e83e8d20d371a4b98b0a456a0007b4acac38b4c8ef6bc64400d29b1342042fb159586d1a0f34b93f4348fe6af2fc7d4d75aa2914e9041a0afc264c52b4ff593ee2df82c890c3752179951abf87901eb4a24b63d62ed304a4eb3c249e17a66f1fd2aed38a04b417453c8079d65dfcfcb591b1e439e6915bb580359cedc84f64ed405e467e58b7e8596c528318dee7bfad66206f7100155e938c8e36e38c0c24afa38d42a1049820506e841e7a0884342af03bde632d10810ee4ee2dacb13184d6bc2dcbaabc39ac13320e754c78d3585b445e1c8222a8c79ecaff552814654067f2d2367ea4ec691b3fb086085f1fda50adac43a750a806584d401d692bd658407a88eac247f82179be3e8542a15028140a8542a15028140a8542a150281425c2ff093000fd22ed9bea9b2bab0000000049454e44ae426082, 0x89504e470d0a1a0a0000000d4948445200000140000000a60806000000abfa56810000001974455874536f6674776172650041646f626520496d616765526561647971c9653c00002a4f4944415478daec5d07b81445d6bdf044440c984170055111c51c30a1281850d78439b0c65544943507504c6b445605c59cc32aa888115010c4352bea82047320990341d25f67fbd6dfb7ebf5ccf4ccf4f4f4ccdcf37df7d3c79b37dd5d5d75eae6225228140a8542a15028140a8542a1502814d58c063a048a8858c6483b23eb1859df4873238b9ccf3434f2a7912946be3732c3c834238b75f8144a808a4a433323c71a39c6c86646962bf07bbe3632dec8c746261879c7c85c1d5e8512a0222d58cfc8ce46da1ad9c8c83646d63552c7bf87b637d9c8cf46a61af9dcc8f246be32329d7fbfd4c8b2ac29ae696405fe8eed8db414d79a67e40d23838d8c60ad51a150281201486d6b23bd8c3c686436931764a1914f8cdc61e4742307b3b95b2c563172a891e78ccc17d7fbd1c819ba192b148a52a28d91938c3c6de4574140338d0c35d2d3c856469a24702fab1be96f648eb88f91ac852a140a45d158c9c8ee466e242f186189e633d6ee8e66222a275a187944dc1bfc841df4d529148a42009fdbbe468619f99d4905e4f7b891d38c6c405ea4366d8029be80eff75d23dbe9ab542814510042dbd1c8bf8dfcc124f207935e67238d2ae43924093ec3daa142a1506434713b1979559890ff35722e7911d84a03a2c7378967b94a5fb142a108c329e4052f6400a12b79c9ca950c44a6dfe2677acf48477dd50a850226ee20239f1a59427e30e36a236b57d9b3f615c4de575fbd4251bbe86e64a22084a5ac211d42c9a4ab94035d99e8f1ac4892565fa0425163f8ab918f04e9fd465e90638b1a78f6b5c8cb4b543358a1a83120fd6314f96565d084aeaa412de8627e7e246cf7d069a15054375a1bb98d353d2c7cd4c91e5cc5666e2ef4243f9d470950a1a842b422cf973786bc765158f0c8dd43c0a3518d8fcd61e4758b99af04a850541fd062ca96a7a162e376f23ab0289400158aaa055a43a1f675112fee1b8caca1c392d104461fc17d7438148aca471f233f91d7fbee7a25beac18481a055628aa02f0f37dc20bfa1e8aa7b75e35a3b591e7c9f789aeac43a250541e10cc18cb0b7912795d9115b9811c485be6a795200a4585a10d6b2eb6b309525a36d061c9dbfcfd82d4ffa750540c706010ea75e7f202462507caba1aead044866c86a0e6af425101c05916471af996172ea2bb384b63791d9abc710ef9e57f67e9702814e93777d18a4a26326b3e5f61686de4051e479403b6d5215128d28bc3c94f669ec35a60231d96827189d0fefae8702814e9c595e4d7ed42ebd3964dc501bebfb785f6a7a7c3291429037c7d28cb9a22b4bec355eb8b05b615fe2fe495092a148a14017df8de13261a7af36942733c388a89cf268aeb86a250a408171af99917e86cf20af57591c6836d8cbcc3638bff6eab43a250a403e84cfc0479b5bb58a0cf1a69afc3121b70aa9d3d141d49e367e8902814e9c096143c8be302f20e1d57c487cbc4f8aae9ab50a404a845fd8efc40c71ee4054014f1e10cf24b05c719d9448744a1283fa0e9fd2216e63a3a24b1636f239ff318238ff2401d1285a2fcb88ebceecc5898d792e7a352c48b6e82fca001f6d6215128ca0fa4b5d872b653c86b6ca08817486e1e45bedf0fb97fcbeab02814e5031a16e00c5a7b0ce5114696d161891d6d1df2bb43c759a1282fd6a46072f3d1ba284b467ea3c538a3e1416b1d1685223de4871e74fba849163bd0cfef7131ce638d6cacc3a250a487fca420e9f945f222954a86c5a1317987bddbb1fd94bc06b10a85a24c406bfa0f33909f2bd79276242e86fc6e1763395dc94fa1281f9068fba891790ec9c11f75829196c264432fba1ff9f75be8d015847f39e4d7458744a1481ecd8c5c417eef3e2ba8f43880c2cbaf5623ff18cb6d7408f306dada2f50f25328ca0744734f129a9c94a7c8f30366c260f21b20a806981f7016ca421ebb694a7e0a45f2400003ad951687901fb4c16c4d0d70c6c7a7a4a570850035d45f0af2db5d8744a1480e7f21afbdd27c5e840876489fdfe594bba3cb33e2f307e8904606824b6394fc148af298bbe71af99517e012f2fc5020307b6811caae7245747731f20d7f7e04e9391f51b12cf97dfd407e9d7548148a6480e8ee9bc2dc7d83bc9ad3b58439369a7fce05abfd7d4fda99382ae02218467ec043c94fa14808d0f27e135a1f1cf08df97736d1191ae06611be6b7f23b348eb81f3c14ee4e7540e67178442a12831b0d05e223fdaf8b1918e461af2ef0792ef073c302299bdce9fbf86b40d5614c0bdf095929f42912c70f8f84f14ec2a2209eb10233ff0ef064624b36b58831c4f7e42b422332e149bcfdd943da548a150c4006877b709cdce766f91f5ba686d65cff1981291cc0e60c204a96ea0c39c17f95d4d7a8e87425172b43632522c3c446adb857cee3ef22b10908691eb1c0f90df1cfefcdea4e77e64031ac4decf63f58791f3499bc62aaa006977f66f4a5ee5465bfe19b5bbc79057e121b1a7917d5923c4096336089209f83ea4c6ac4ede3920e3727cbed6c90f8d0d7a905721d38b379b4a471d6faed0fc5b919704bfd0b13a40f69fb1653155a7822249ec47417f1f7c754d337cf603fecc5c8a16f57d893f3fc8c82a3ad419d15e8c15dc0a9d2af85990078a9e8f03c80b7afd42d1ba0259994d5e2591067c1425075a51d92a0eb4ab3f95fc1417174887b149d0976621498bebc90b7a8c254d76ce868d8c4ce0717dd7c8d615fa1c3b9017a99e9b27e16592f7d83251284a4e7e20aabdd85c0903021f5f939ff3d72ac7771fc83bffc4089f55f2f3c67558058ed58a460ee54d2e8cc44086a817bfcbc88946b6cbf08c30ffd1100339a6e3c5df3fa05344113740724f90df8905c72776cd427ec0cd822cff46d9bb38afc96489a8ef963adc59c9cfe6450ead20f2c3bbc721f64f87687b9823ff3172257901b2150af87ef80aedc14eaf1a5943a78a224ef21b45fee96c28636b9be36fe09f9ac99fff248239fb0a7f76bb2c9f59d5c871bc50d028b5d63a421f23346a905f25e445c21c855fef5b87f4e633519dc8efb5586c457ee50be66a135db68ab8c86f749ee497aff637943f8744e9b0c83712a6e13ffc592c20dc4f871a7907d08eef17cf3e24e51ace0abc51bdcb6e1297f44e8889f4a4abe53a719d81ba6c15a520bf2f22925f53a1a97c974353e9c79f3b2764d7aee38534474c6e94d65d445e37e95a00a2edb60722d23efe9ee27b5d8fc9f96747dbc3fdffa3441a2b92bdcf17d742c38d36ba74cb8e86ac95ef66e4602397b1128374ad5d8dac5b090f019fdf42417eeb45fcbbab78b1e2effaf20e1d86eee425475f49f5fd3e1b9297ffb7582c7e984bb594e07b1ef90d25dea674fa4611fddf9382670bdb13fcd0c167e7125e1be477a1b826f24f4f53ee298ba2b427af7bb4aafb8a7247eb97f0c68840572a1b1b9f2948ecf33cc88f84f687bfcfe4a4efca8b1b2910ab3b3b07ae2d730cafa0da6a8250c79af11f297e7e98e548ba9ee44cec6f58436f5ee2ebaf4d5eadb324dc6b948b12d3eea0a0a048e1792a3e75091666ef343de000f2cbd63ecfd3a4384290d71d19162efaff2171750c057b01b660adc1469a910ad1a1c626d7beaced59adbb5bcaee0f131f553a339c49fc11bb2b92a83fde944d5d7beddf8d5cacbc5472d26bc7e33c398b56877e9da37803efcde6ee2e8207e0fbdd9dad39d9e17d715a4870a0203fdc14126cf3a9c31d47bee37bf390df83e410159e49c184d5839914ed809c95c574ae46c0b73a543cff6047334ec3fd3d2c5c2256c653722df61bf322f9555c1f25707b283f95040d5893ef47fe498c4b1dd242051272838fa2fc53b2f0fdebf3e66935c1b2fa0625f961a277a1ec797e2e5a0acd00795d6b6420bf190ef9e1ba36370cdacf263566eef6178b1a1af7de29ba3fece0639d898fb9f1186b834901dac72b148c28a3547245e5a9d8818c0da45c8dce60ae626d23f0d43ea6eb61a3ff9015a77bcaf5d0c7533041f58402cc99f3d91c59ca3bb51bb0b035c1070842941a2352676a29b7af2b6b304bc5f3af96927beb4c5eca8a4b7c38c03ec9d664d0face74b4be29a4477a9642db6bc19bf1ac104d0fbede73a834e5a9b87677bed667e578789830f270f2cba8b068eb6be23bdca2f4114c74076658fc30816ba5d57d73d6a02cf1cf6413220d2dbf3211df23947c4f46b4f57fc3d1fa6e56ad2f56c0b78706254f390ad0129e973725a4e9d789eb26eedb9161eb27a9b052a496e4577ebce06832d6d9d99f7fbe54688a33295a87986a0136802fc578ff9bd291b7b61bf96dc7ca4d7c984b0f38f7f20e6f9a8af8cc5c9cb5f334d54f5f1ac10a49d2aea0af9800374f72105e253fd7ee532abc9d10dae1db04d85ee4577e8ce07febc75ae553e43bd2112d5aab46261c76da7f91ef63fd85c7a97199ef0bdafff810e243c063fd84ef65659e27b215d6affc6f75a4886bcd83dc3e70b43df8e591fd518e0aa33ad6ec6d379fc4703905831e5b1461860d26bf25fe3a0ef9c16f84c0c6440a962bd5526e9fd468300ebb94f97edab1192ea3baf0fd5c43c927a662cea15c52660160537e9cf2cb3f556427beee21c4879cdd33cab811e3ddef21def901495d781b618642fa50f67add5cb0a1ec493c98f7927f2ad951e43b5631e87d0b34b32b156819368d9fff752a6f941bae892114acd145a9211cdc49a71dd5b14be06347037d9b924bada905cb036bfd35678c417cbd8b5cf3716019f20b27462779e1896211bc5c2421e16fbfe3efba93bcf4843ff981865030827700d54eb003beac7b58cb5accda55b9a2bcd869cfa66085cd6c362f93be2710df4146fe1bb2288f51ce8a0dadd9fa72c7b8570a88cf92f39542fb4bac91edd9c25cc5e22c36f9701361be7cc10f8392a8e9c2c4c2c0ef5323e4b70efb34ac2feb05762f940b68a820b3f717f1c6548e8edbe800fd92b328314e17917f76b4a238204a7e9de3de4059e5d5295a7fd8903710e4d72fa90baf29544edbaaaad84139d5d1f25c412fb88d6b60e26dcd8bdb76cf81567c28952fbd05443ccc79174826deaa0c664ef7108d0fcd0b5045d09c147101c9c9b23e1b24f822a5efac14e418dbe0db5b495ef816f26b6d11856d1ac377662340683f6dab7cd2b564a2917eb521655cd8d0a4cea5605b2ad468fe3d6132b6c4372984f8ae51e28b7dac0f08d1acd3d83e0d2e90f3c8f73f2756ef8f10b70c7c6c16c382c0df3f2fb41e29d87956abf2898768ee14f1cc482bdab6cc5ae818e73dc00f9964ba11e6594faa1fdcf891cd3025bed2921f4c4a04dbd2785c02f8623be18a49d4e77b8bf00b20e7a7710c0ff36206f2c3e96ed51ce985df74b0d07cb1b8cf2ae33343eb3bdfd1fa90589a64422b3461f484733bc5e09c977f52ede47c264d7e073a26ef3329bedfb558090349df99e485d714da1f4ce03872bd60c6cca3fac5d2e81356cd9d5c8e252fc8639ff9392a6fbe1afc3bc39df7f068827e1f68bcc8d95b40f57dbf689fa4c79b960e5b51b02d58ff94de2794a58ee49f0df366d237709e98a071687feec1e856d250dd502a346373d28e2348f0202a6f0dafcc31b4474a9e9ec075116944c30c64ee2f71e6004c5f34d768448a52621de17e4933f959cdcfd61ae39e9b267d035663591083f607cd623a85073d8ea9d2890f2d4716e63f40e53f95ad2ff9012d5b46b44d89af09bff1ed142c57b38d0a4692f6e64b0aab905f6c00abebc994939f0d84a12022f14280c3c8cffbbb21060dedcd905dbf9a091019f3f66026f433ec54e6fb598eea370b78b88426ef5a3c0661da1e26347ca11bd71801c1d7bb2379dd73cae1fed846bc8377534e7e93c55c695f8e9b7898fc404587224c36742d799982410fe495fd95fc446824b456cb99ac76975dcc9ad66554fed3e8407e0f39247465c44d07b5d73bf00e9cabb9001a131ccbef7b6ec84687dc2d1c63ba2cd51630760f5230ed6b52c21b80d4fe402a69ed92d342901fd6cf91e5b809687bf6709d9154f8a96ad07adce30e91d260831db61618797fab56c144c7e2b66dab4002a5aae40071a1fd4f17d626baf0b5c28248883c8f10e38f00548f3cae753cf981b0339cdf35e4c58d00d66b62ce4841b7eaeb6a50dbb3ef09e7582c0c1917b897ba27782fb28262688ac9cfb6d15f502ef273cd5f98a785547db426ff6c5a3bf0873a5ac73fc98f087748e1e445734d94db0ce709bbd899c4a852b88dbc965553c4ae7536c51fd1469e1c92c72750fdc8a96c507090f89b268ee6378f35b47c70bdf87ba4aa8ce34df15dca9cc88efb4392f76e55a4d9e70bbcff3e59de158250db27742fd0b84f22bf9766d70a20bfc3cb79330ff3625f4085e5a881fc3ea360326bd710134ad603df4ee96875858e22a8c8f8298336837ca9b1144c0eb732ba045a1f9294ff9d41bb0a1390f296e23d16437ec4dae52711af8d44daa3a9b68e280803825f6f8a71f98de7d421e49f95f27c82f7b3aa307fa7a66cac1ab2a261f340e7979bfc88fce8ef4b0598bf782074e2b58eef2f287b599b3c350c267339d2431ab059f87688b9022de7662622003ecd3b3310e019145fe138a2c57753fd9cc979fcef889cda36ef1bb37fcd96afc13c3e4d3ccb3c26a66216d051bc8846f3221ec3662fcca9b3281d1daacb0d10ff558ed58335d48e35e141c2fc4d3ad9fc1dbef6e32924bff982fc0e2bf74d6d44be03fbb43c17f432bc406cc0e303d606b3015aa0edfb07e767d299ff20dd89216486949d131c53f624f25bf85b93730c930e7eee1b93c977166bcd6eca0822a76b67f0f3d922717bfad6dbe26fcf536e2a3976a260f71c34b5389e7fb78a203f6c46491fc62e53d0ee4cc978c1c574bae09a54901f708af05bec44d1db0d81fc5e11e4373c0f937690d805922a876bcb64edfaf5c63129d63904f382f82cccd1ebc80fdc8c8d89009bf3755c32be8b325746346113d97ef60636afeccfd0da56537e2aa9d677b5f3be26b02261d7456ff24bceca414069234004590750b0faa75d5a5ee8adc274ca27f35a92c970caff14aed784d9bc3f95f63c87d384d6261b12ec1c72ddcb29e8ec7f9282c9ccf0f74c89810077763408ab85663bcab1099b34d20787fbb5d17544a4772be13882580fe24deb291e07bb01ce622d14beaff6549dd88a82e70edbfe79727c068bdf3f5ba6fbc4c6fa724a4c605830a31cf2db304d2fd56a0f70e246f5ffc9c3d10b213feba7b099df8b58c38afb28c3f5792248ad6f1afb63dcdc341c342e3b937c61a45b88462c030d8592cd0954ff5cd501943d356813c7cc8529d1d9c825144c398abb9925721a7bf0c29f47d18223575619f161ae20bd4506cabee48d3b13f9bd42e50b0ee1ba375179832075bcc9db636d17b3b595ba1258dba6fea5883727c9ef3e2aae5e4f92a08d1e5f44f1d400c2893fdb218c534248be13bf1899b83d2c83ef0df7fb3e7f064705ae1303f9a15cecd41c63df2184fc6ce4ec4ef1ef71fa54366273fad788a427a3d2bb5611f935631f9e7cc6971dab603da1192e61ed789532de33c8e7502a5f1a0c368c33c586090bf3012a3cbfb8a4b04e4968608df220bfb3289e0c7f90c88b148cc65a222cd43738c4d1560687f8c5da32d1c9bc2d90db8139c8e82dbed72e31901fb4d15c07fb1cc0da6818f9017793df4e6aaf18de4717aa7f384e144180a8bf91d5ab88fc36a4e039c878efb7389f8116fe8df8fd6d29b9f7f5c4dc1e95b0c93bcc99af27a6f5052f970701caf36afb50fce54d88b8ba5524b62b309cba51d265d0ce6b34f9be4568807b387fdb8427a92cddc224efc85acf1dec37699345332ac4b439d1213f44cc378bf037df3993e950e73377c7a001e2bd1f4ff59b9346113cc7c9547dc79782d86413dbd9fc9c16c816b8c07937d7a5e8fea13c5c4ec995c2d5f198cd119af04794fcb9d1790199e9f3231020c8efcf12929fc5aa3ca9bea26041fd2236f5b2e59ec141fda1436ab2db2dfc8b173b7e1ca492d813e6f7e4ebdadfc5d9b1d9ed08fd7e0ef20361dfe868a720a76d3290e40f5458cfc10ebc19ccce83f0e6b2bbe44caade5cc0231cd3ff630a9e91b225f941065b3173740a9f436a81a56c8680cde026a1058fa0f2763c8f95004f14da5229c9cf05fc4857f0604a6d0deafc76148cdee2b3df523018b09220bebe0ef1b9116014ff7f1ac10758089a3a6614c82fdbd17ec88b7cd6211d94b7654a8b81693f9282d529fb517840a98e8917ee858979901e4c750469f62fb36fabd4c0fcff87f3eca3c4d8e35d9e43c1f6626ff27c8cfafdf8eca5e49dc752ea7a6959120722bcb7445a9f5d3bdf929f0b49954680b787905b77413e6752f9bb7a34676daabd20ebce0ef99d22eef322c7acc6423ec8798e951dcdf127be465cb89e7cff26d25cb6cef259b44e92a7a2214012a579ec7e0e815b99c2e4389282292bb9042702a2a9ebdfa8763a3563e319e28cc3636223c15a798782f5cff746dc10e017edef580156632f3556e17769b5f79b63f8ce06ac20dc24ccdd0fa8bc1dcf0b269479149e0623c9ef524a674ba38b85a93297ef79595eb8b203f2efbc73af106272bfe6905f9c7dfcf6a56000235b39d459c2945dcaf7d5318f6b2198f276013ebcc5bcb01f62b31b8d1d505972192fdaab9884b7a33274e84d90fceea560b0e346fe1d16badb57f167de5ca398863d855fcc95f1093ddf9ae4e7e25913b5d094b3463c8fbf17ee29581d157b96b725b959e497819d2334c3a194ceb33b24f9cd66ad7017aa7fae2cf2f63608f9fbd6142c608f9bfc8027c4f79f9b619240c37a5cf83c31a1fa51e111f08d2998781a4678eff102878b0151cdb114decfcf15cc89e759ebae16b47736c1596c363666abe7c79071f88282398061d8c0995f8b59e3db88bfd75a5d9420094a57c964ca2f611df9b09bb3fb48ce871b2a7d023c4f7ea2305eda2061b281fcd2d8dea8af20bf6f59d31ae6f866a6f1426d98c1d4fcdc99d4c7c7bc8bc1696ea3aa209cb0f65fc855fcd2d108b6cbf33af0c3a023cd25ecd77b8f35b857a9fef9afd0e8902a83b6645f6521ba857cef2052d43ebfe4dca7ad9059afc2e7fee614f485ce60f2434968b68e3830f7b255336ce890df0fec5bb456d770d60a7748f879d77048109a6cae338161eeb662d3793e053bdef4a02a80ac057e5f90615ac9afb7f0eb7dca9acc2ce7c5643b7a1211be9954bff6768d98eff312a155f5747eb7366b874b04e1e49bf7d89eaf912b7505f7f0088fdb980c1ae144dec90fcfe1f36be6988a20d938ce6e4045cd09946c0e6127f293da6dc230b21dee0e1923b808ee149beec82cdfeb5684cc62978cbcee22418830298f116bf0a9029f6739f65362d3cf5667db945d5ad297095f67d851094dd81a9ce3cc97f7a974cd7f13c74621e60f9cb52d5378af5da8fe79b2f2c5dc9f83c80651fd72aeafa834b5abcf905f8a6453289665d35d9a55d0aedae631c9b198b2354995a55a57f3f5a63abffb83af7b441ebe20689a275330e0f4241577803916ffb5e2fb0626348f0ea460bf456c40df856c8c13d9d45d4e90c69c1c5ad35114ec02edfa7d57223ffabb0a6fe0f29aef53f48624f6fb2ea1e00154d3287be00c960eca3cbf76e604dec5aafcae0f664dd7fe7e093fcf195485273afeeeec08ad524a7e33332cf6577290581b0a46f0a4f4a7f8bbd1341726d0045e141738e481057708e54ef06ec026fb1d19fc51aefcc8be3d0433a6872ce853f3d4b496610dc58d32e3e7624e776bcd9a87d4dc4f4e601e1d4cb99bcd62e1cb4edbfb8bdf8dc9f2dd9b08d319666faf2c9f5d85354eb79ae6a488cfd194b5c8df42ee3fea79ba2bf226f9bda348b80509bfb105519547d9ca6e3036a090b668df99212fc5e6bc75a4ec9d64642798df78077b52f833762cc1fd36777c40ae7fed8208a4bb0993f3248a1ed1bd9717d038c7041e5e80bf09dad9b1149e5e532cf97577b48f3f794c4a8d1e1908435a034787f8f35e156b2393f6d784dd18f61d0fca721ff09dbeee5cfb2776dd44c1a6eceb75efff4fb63cf24d5d6a41c18a237743dd89aa14b752786e581cc762c601980a2f5030b881c9857e78dbe420bead9808ac4ff351f29baf0e6495feeb1299bf1750788bfd877268d76bb04ff643ca2f95055a3bca9eee13ef7301fb36ff52c062e843c134a2b8c8af19cfad2531901fdeefc3fc7db94c4690f9f939c61091e02d4348ed72f1992772dc8fd5f0dfcae05a8036bf1f05d39df2213f2826e766792fc715308ecb32e9e7f223df40d555e7fdbfa4cf45c257d18782c184de54beb37b919c3c98c253334ea6ec39892d5813b2bebe596c6aca67291501ba07a34be999c1bcdc9a35bdc95926e047bc405e8f48882f527e398456e31c4cd9cbe2c616315e5d1c9f9295ebf3f88e3a364de5110c209d6c674a40d3be2ac7783d9481b03a0973197ed45db268fcf630aaefd9ea70d1ca31f9e5910703229014321dc2f23c7f611f60beb0d9038f387ee33eacf11d1f42d456c33ca89ac86fb25099db397eaa01096b829bb1af6b1e4fbcf72918b4184d999dee70065fea98ca78b96b867c5676b529b648bc013b945f755c09bff362b0daebafbc002e66cd6c1c051dd7ae80886ee777b2162fb0253916f2674c06f938d151033d8aea0755fe7036a03105921ffcaf4333dcefc4882e88d55833fe20c3f73c13324fd165e85aaa9fbee32ee8ebb368ab03c5678764f191f6a460dd703b3137dab09f2d93df3153a796c6fc6e1ecbe0fbfd9937ce7c9b50401140d2fc730ef1f50c5178ec4977ef3ad75ec226737f4afe488ba2718d20bf19218482973741988e9fb0da5eaa8ecdf087f4632dc7de1708625dfefddd62719e14a2fd21bfee9f0ef161e11e4699f3fa401236a0f2381556eeb5159b47334388e376b1087a52fde6a7d948ef5626057bef788ecf23fc2daa155ae6b1088ecbf0bd93f87d9f2e165eae4ed561c0e24120664e967bcea5fdb5e031fe36a2d68b9a7074cb1941e1875849c17bfb5b966b6f2ddc006e330469a9b8da25d6cb89fc6c6f86686bc3c8cf1058487e7d6e63d6384138cf53f8d9c296b487537e5d95f1be77e339323b02f18591fcce8e6525efe7594af6cce3827194e34fdb81c2a3904d78b0163a2ff674d6a88a39c9ad05ef6c973ba4679b696eef68302788857813ef787821fbb04fc635931fa4dc6925cdc86f231f350fb011dfdb95bc309684f860e09f09ebeabc229be137b14f13dae2785e0c88041ec9beba3ac7ac7accb9ce6426ae5b9ce7be24a2bb0263df3783c37ba4f0edade8686dffc8e3fde2dd1c41f5536f2633210e131af18959361768eff3297320e9d3881b439840fbde3cc7731ce46898ae597d6a1ed79fc19f5f4190eb9202ee7b21fbb2a358256bb319fbb4b3012fe200ca515458792b88fa58b6c6c2b4c27328a5f5e3473984763ee5ae7cd883358225215ac2605ef030213bf37f1bb1a37627feb74eec0fb98877b5a90ee1cde581eccb3b4cd822868afd85a3fa87056e40d0fbe7e1b71ce8ec663ff1e4eac1bbe5aebc41f4622df4fb906bfeca84bb23c55b45b2871384982e76d86dc9af5e98cb64930b0d39d0f04b0613cc354377203f49f839a18de722be2343880f44758c782f07939f507c995854b8e615217f1fd678f554a181f50ed948b395f20d8e6836ee4bc17cbe6bf9fe9041f095b3f0a7b376e41e708539731ed52f255d86c929d37d625ebec296117cde2f917f4ef5161948096bee0cdeb8a665f8ce27597188030d786df6a2faa597b0d80615e0872e198e71c8eff93c031c87b0037e1115b6e34ac21bc9e641a73cee21531a8ced5cd29b0a4bddb93f8ba991497ee209d983e23fc364253681e70bb23f5f2cd8e52878025c2ecdaf116b595f46243e8be30549dd9fe33957e26b4c0919a73e21d642b788266da64867b71c638879702385d7efe67300f7d69439126e09e529b60a241175e00d0c84be7a8e204467361f5fe375016be0af14ec5ede9415046b42dfc3c4783bbbaaa664b9c725fcee31874ad9c6ac21bb7cfa51b05061113f5f598970bf10adab50c7657bde7d1fe39d7a31653f1be235de39ffce13a298a83276b8fb78677c8dffbf2b15d7a5a601abf36fe5f0b94c605f4f172a5d6388bd9c05f75888e68571b491398cc346199ea9233bedbf0f791698fbb9fad049020cd3009bf0583c18b2314da5ec1da297e50d305ff29b90e179c3d04d68f7dfb29f2bdf60def2144c8191bec3be14bd7a270eb4a7fa11d96ca4070d75005b5549a38e37d6a10e113e570e22ec10e284de9bf28b1246414b361bd3d8322b2ad6e017b71befcc7bb05fae6189afdb907d830b84b99b29cfee2ce1dc875faa8df0d9edce0b362c87f01b5e10513b3877213f2d672193da2d4caa1f52fd83926c97987d23128d6da9f4346f66e3f8efaf60f2da8582e9198f53fe671db78ae0e78b1a3c18c0ee9eeda97c6d9f366177d19f54bf047406cf87de949e2eddd644be5e68fc8bf83d6f9fc40dac18427ee75169cfdf55e40724de8e17ef07a65bb6a3313b527e49d2afb2cfa710cdfb5f11dc19a359835eb944633382c967459d2a0152de988979c30abae75ec23cfe932daa92569cdde598a80f5305372dac422022faa330abba45fc3ba905ba82322fe4eb2112576c4b7f68f347b266319e353554e0207071500ea25628b26984d6549f5c4ab3f806418057aae6971ad863036d643d9f6e30169b32815ec13b29fcb270da37d1e155a41c70f9ec285c2c70fd9c52aa8bb5a6ea3ec4a6d2002def33f27d6b1752fc9d68148a4a00b4415b1a08dfe0ad3a24d50d686bb2ae74371d12458da331f9398ef00bf6d421a93e40c39375978868b6d2615128fe07b8846cca12b2095ae890540f76a160650312979beab02814ff0fd94c62a16a81d5039400dac273240b8735725028149ed627fde28a0ac72de45796a040bcab0e894291114d9400ab0348d87d5198bce8bab1890e8b421189001108e9a6c35199409716d9ff0d45e0ad7558148aac407ef291e407413497b502812464d9d21e9d3ad6d061512822697f686587c280c774382a0f38504636181da4e4a75044026a84af13dadf0e3a24950584ec65cb29147c6bbdb542911b2889b34d675109f2880e4965e134253f85a260f2433db04d809e44eafb53f253286a84fc7612e407f7d1463a2c954b7ee878bd920e8b429113756cf64af26ba7c35239e8e5901fda8cadacc3a250e404aaa0fa91df0b70926a7e95053401fd4690dfa95564f6e2b025e462a159e556faaa1531028d50d1c1fa2d0a1e94a43ebf0a02bad64ead42f2833f06675da071eedb54fc191a0a8504da5da101883dc31a9dcf4fd661a92cc0bff7ae203f9c2bbb5a853f134e3c437d32ceb145a3868b590b5428e20094031cef3945687d38df652d1d9aca833c8717d51e955cdbbb9991dbc83f2c6b02ff9b421117f1ed27cc5df8fa3e26af4c545181b886fc88155ee69e15fa1cf0c13c49fef9d02040b4e76aa0af581193a97b3af9b5f070a9e05cf04374682a17dd2918f4b8a002cd4494e4dd4bfe014c1064dcff455fafa248c07f8c03db7194eb4cf2db593da7c457f980dfef7d411a6f18d9a0c226e745467e11cf8020c72efa6a154500164373d6f64689b9853ade9ba872ce2956e4c010f21b9a422aa94719ccf48fc5bdcfe209ab69078a4249af05cfa1d1625e617dc0877c82ceadea023a524c172ffa66aa8c43c0db907770b93d0b1ae7addea5e6aea2002098b1339bb732fd0b730b09cc97579845a4c80323c50b870f70d30a3077fb39e6ee18d2c89b223ad0960af5b97dd9b49deb901e021a9729e9553fe0bc95bdfd7a52ba139e11a8f954dc2f0e5d3f9c4951a1c8a4dd2178612b7fde11f367a9b01e9e212f5340fd7a35aafdfdc7c8fa29bdcfaecec4fdd6c839469ae92b54083466cdee54263b04c2fe0821bc45ace52190b13ba94faf26b183a34ded95c27bdc89497aa1d8a9d17e5f0f5aaf6df3151d55d065e53c263ae4e3cd08213a97f06e662ba2a22b34b40f5d3c388efc800192863f4ad1bd210ad7df480ff27311871a399fcd5e4575a221bf7b744d413795cd58cb6fcdd2260ff2c2896b48e77ac2c8a3467ea8269b5e511cd0d2aaa318cb3bc8f305961b2d8d9c4d5eaa816dbbf51c93e13b35fcbed0576e3d2601e4a0ad4e5eb50b4cbe25fc99a5fcb9d6fcd985110907018069e455cbd445b88f396c5a36cee3fe718f2b32a135618d0cc4b63d79954778d75b17313eb00c90c7fa397975ecafb2c637af1a278312603ce6efaa42b32ab7f607e23b87896fa51a243e349b589f65331e0fc8da948c537eef148d05c86cb69175f86710f974dea091a33793c9ed079eb7f8ef945a5abc4a80c5630ff24f7283ffe4c732dd075257e0b03e98fc80c6b34c7cef56e9d8afc5848333229066810865f398befb27f2f2d616503032be94d7cdba54da3cc9df9994e6f1f51bf23dbd19a23136e0fbb4e4b6028fcd44231fe81255024c0a6fb059953401c39fb7ab789f2398f8deaba2b10501b4e3e7ed6ca4139bafb9805c34f83a11ed9ec1a4069fd654deac96b2b9f74d01f7d48435cd16ac65ae5f80b98c6a9b463c6ff0f3f7ba8c14958401e4777dd939a16b62e19f4dc1bc43c870aaaeaecc08da20b5e23626b0a55904291af0a7ddc19a304a10dbeaf454289223c0234a7cadbd99e4643e1634875b580ba91620a8f4009b7c99086f267fe678f27c7b6acd281465c0614213439ac0da319b7d306d917335db21802fc8ebdab27a158d259a314ccc4078e83e8d20d371a4b98b0a456a0007b4acac38b4c8ef6bc64400d29b1342042fb159586d1a0f34b93f4348fe6af2fc7d4d75aa2914e9041a0afc264c52b4ff593ee2df82c890c3752179951abf87901eb4a24b63d62ed304a4eb3c249e17a66f1fd2aed38a04b417453c8079d65dfcfcb591b1e439e6915bb580359cedc84f64ed405e467e58b7e8596c528318dee7bfad66206f7100155e938c8e36e38c0c24afa38d42a1049820506e841e7a0884342af03bde632d10810ee4ee2dacb13184d6bc2dcbaabc39ac13320e754c78d3585b445e1c8222a8c79ecaff552814654067f2d2367ea4ec691b3fb086085f1fda50adac43a750a806584d401d692bd658407a88eac247f82179be3e8542a15028140a8542a15028140a8542a150281425c2ff093000fd22ed9bea9b2bab0000000049454e44ae426082, 0x89504e470d0a1a0a0000000d4948445200000140000000a60806000000abfa56810000001974455874536f6674776172650041646f626520496d616765526561647971c9653c00002a4f4944415478daec5d07b81445d6bdf044440c984170055111c51c30a1281850d78439b0c65544943507504c6b445605c59cc32aa888115010c4352bea82047320990341d25f67fbd6dfb7ebf5ccf4ccf4f4f4ccdcf37df7d3c79b37dd5d5d75eae6225228140a8542a15028140a8542a1502814d58c063a048a8858c6483b23eb1859df4873238b9ccf3434f2a7912946be3732c3c834238b75f8144a808a4a433323c71a39c6c86646962bf07bbe3632dec8c746261879c7c85c1d5e8512a0222d58cfc8ce46da1ad9c8c83646d63552c7bf87b637d9c8cf46a61af9dcc8f246be32329d7fbfd4c8b2ac29ae696405fe8eed8db414d79a67e40d23838d8c60ad51a150281201486d6b23bd8c3c686436931764a1914f8cdc61e4742307b3b95b2c563172a891e78ccc17d7fbd1c819ba192b148a52a28d91938c3c6de4574140338d0c35d2d3c856469a24702fab1be96f648eb88f91ac852a140a45d158c9c8ee466e242f186189e633d6ee8e66222a275a187944dc1bfc841df4d529148a42009fdbbe468619f99d4905e4f7b891d38c6c405ea4366d8029be80eff75d23dbe9ab542814510042dbd1c8bf8dfcc124f207935e67238d2ae43924093ec3daa142a1506434713b1979559890ff35722e7911d84a03a2c7378967b94a5fb142a108c329e4052f6400a12b79c9ca950c44a6dfe2677acf48477dd50a850226ee20239f1a59427e30e36a236b57d9b3f615c4de575fbd4251bbe86e64a22084a5ac211d42c9a4ab94035d99e8f1ac4892565fa0425163f8ab918f04e9fd465e90638b1a78f6b5c8cb4b543358a1a83120fd6314f96565d084aeaa412de8627e7e246cf7d069a15054375a1bb98d353d2c7cd4c91e5cc5666e2ef4243f9d470950a1a842b422cf973786bc765158f0c8dd43c0a3518d8fcd61e4758b99af04a850541fd062ca96a7a162e376f23ab0289400158aaa055a43a1f675112fee1b8caca1c392d104461fc17d7438148aca471f233f91d7fbee7a25beac18481a055628aa02f0f37dc20bfa1e8aa7b75e35a3b591e7c9f789aeac43a250541e10cc18cb0b7912795d9115b9811c485be6a795200a4585a10d6b2eb6b309525a36d061c9dbfcfd82d4ffa750540c706010ea75e7f202462507caba1aead044866c86a0e6af425101c05916471af996172ea2bb384b63791d9abc710ef9e57f67e9702814e93777d18a4a26326b3e5f61686de4051e479403b6d5215128d28bc3c94f669ec35a60231d96827189d0fefae8702814e9c595e4d7ed42ebd3964dc501bebfb785f6a7a7c3291429037c7d28cb9a22b4bec355eb8b05b615fe2fe495092a148a14017df8de13261a7af36942733c388a89cf268aeb86a250a408171af99917e86cf20af57591c6836d8cbcc3638bff6eab43a250a403e84cfc0479b5bb58a0cf1a69afc3121b70aa9d3d141d49e367e8902814e9c096143c8be302f20e1d57c487cbc4f8aae9ab50a404a845fd8efc40c71ee4054014f1e10cf24b05c719d9448744a1283fa0e9fd2216e63a3a24b1636f239ff318238ff2401d1285a2fcb88ebceecc5898d792e7a352c48b6e82fca001f6d6215128ca0fa4b5d872b653c86b6ca08817486e1e45bedf0fb97fcbeab02814e5031a16e00c5a7b0ce5114696d161891d6d1df2bb43c759a1282fd6a46072f3d1ba284b467ea3c538a3e1416b1d1685223de4871e74fba849163bd0cfef7131ce638d6cacc3a250a487fca420e9f945f222954a86c5a1317987bddbb1fd94bc06b10a85a24c406bfa0f33909f2bd79276242e86fc6e1763395dc94fa1281f9068fba891790ec9c11f75829196c264432fba1ff9f75be8d015847f39e4d7458744a1481ecd8c5c417eef3e2ba8f43880c2cbaf5623ff18cb6d7408f306dada2f50f25328ca0744734f129a9c94a7c8f30366c260f21b20a806981f7016ca421ebb694a7e0a45f2400003ad951687901fb4c16c4d0d70c6c7a7a4a570850035d45f0af2db5d8744a1480e7f21afbdd27c5e840876489fdfe594bba3cb33e2f307e8904606824b6394fc148af298bbe71af99517e012f2fc5020307b6811caae7245747731f20d7f7e04e9391f51b12cf97dfd407e9d7548148a6480e8ee9bc2dc7d83bc9ad3b58439369a7fce05abfd7d4fda99382ae02218467ec043c94fa14808d0f27e135a1f1cf08df97736d1191ae06611be6b7f23b348eb81f3c14ee4e7540e67178442a12831b0d05e223fdaf8b1918e461af2ef0792ef073c302299bdce9fbf86b40d5614c0bdf095929f42912c70f8f84f14ec2a2209eb10233ff0ef064624b36b58831c4f7e42b422332e149bcfdd943da548a150c4006877b709cdce766f91f5ba686d65cff1981291cc0e60c204a96ea0c39c17f95d4d7a8e87425172b43632522c3c446adb857cee3ef22b10908691eb1c0f90df1cfefcdea4e77e64031ac4decf63f58791f3499bc62aaa006977f66f4a5ee5465bfe19b5bbc79057e121b1a7917d5923c4096336089209f83ea4c6ac4ede3920e3727cbed6c90f8d0d7a905721d38b379b4a471d6faed0fc5b919704bfd0b13a40f69fb1653155a7822249ec47417f1f7c754d337cf603fecc5c8a16f57d893f3fc8c82a3ad419d15e8c15dc0a9d2af85990078a9e8f03c80b7afd42d1ba0259994d5e2591067c1425075a51d92a0eb4ab3f95fc1417174887b149d0976621498bebc90b7a8c254d76ce868d8c4ce0717dd7c8d615fa1c3b9017a99e9b27e16592f7d83251284a4e7e20aabdd85c0903021f5f939ff3d72ac7771fc83bffc4089f55f2f3c67558058ed58a460ee54d2e8cc44086a817bfcbc88946b6cbf08c30ffd1100339a6e3c5df3fa05344113740724f90df8905c72776cd427ec0cd822cff46d9bb38afc96489a8ef963adc59c9cfe6450ead20f2c3bbc721f64f87687b9823ff3172257901b2150af87ef80aedc14eaf1a5943a78a224ef21b45fee96c28636b9be36fe09f9ac99fff248239fb0a7f76bb2c9f59d5c871bc50d028b5d63a421f23346a905f25e445c21c855fef5b87f4e633519dc8efb5586c457ee50be66a135db68ab8c86f749ee497aff637943f8744e9b0c83712a6e13ffc592c20dc4f871a7907d08eef17cf3e24e51ace0abc51bdcb6e1297f44e8889f4a4abe53a719d81ba6c15a520bf2f22925f53a1a97c974353e9c79f3b2764d7aee38534474c6e94d65d445e37e95a00a2edb60722d23efe9ee27b5d8fc9f96747dbc3fdffa3441a2b92bdcf17d742c38d36ba74cb8e86ac95ef66e4602397b1128374ad5d8dac5b090f019fdf42417eeb45fcbbab78b1e2effaf20e1d86eee425475f49f5fd3e1b9297ffb7582c7e984bb594e07b1ef90d25dea674fa4611fddf9382670bdb13fcd0c167e7125e1be477a1b826f24f4f53ee298ba2b427af7bb4aafb8a7247eb97f0c68840572a1b1b9f2948ecf33cc88f84f687bfcfe4a4efca8b1b2910ab3b3b07ae2d730cafa0da6a8250c79af11f297e7e98e548ba9ee44cec6f58436f5ee2ebaf4d5eadb324dc6b948b12d3eea0a0a048e1792a3e75091666ef343de000f2cbd63ecfd3a4384290d71d19162efaff2171750c057b01b660adc1469a910ad1a1c626d7beaced59adbb5bcaee0f131f553a339c49fc11bb2b92a83fde944d5d7beddf8d5cacbc5472d26bc7e33c398b56877e9da37803efcde6ee2e8207e0fbdd9dad39d9e17d715a4870a0203fdc14126cf3a9c31d47bee37bf390df83e410159e49c184d5839914ed809c95c574ae46c0b73a543cff6047334ec3fd3d2c5c2256c653722df61bf322f9555c1f25707b283f95040d5893ef47fe498c4b1dd242051272838fa2fc53b2f0fdebf3e66935c1b2fa0625f961a277a1ec797e2e5a0acd00795d6b6420bf190ef9e1ba36370cdacf263566eef6178b1a1af7de29ba3fece0639d898fb9f1186b834901dac72b148c28a3547245e5a9d8818c0da45c8dce60ae626d23f0d43ea6eb61a3ff9015a77bcaf5d0c7533041f58402cc99f3d91c59ca3bb51bb0b035c1070842941a2352676a29b7af2b6b304bc5f3af96927beb4c5eca8a4b7c38c03ec9d664d0face74b4be29a4477a9642db6bc19bf1ac104d0fbede73a834e5a9b87677bed667e578789830f270f2cba8b068eb6be23bdca2f4114c74076658fc30816ba5d57d73d6a02cf1cf6413220d2dbf3211df23947c4f46b4f57fc3d1fa6e56ad2f56c0b78706254f390ad0129e973725a4e9d789eb26eedb9161eb27a9b052a496e4577ebce06832d6d9d99f7fbe54688a33295a87986a0136802fc578ff9bd291b7b61bf96dc7ca4d7c984b0f38f7f20e6f9a8af8cc5c9cb5f334d54f5f1ac10a49d2aea0af9800374f72105e253fd7ee532abc9d10dae1db04d85ee4577e8ce07febc75ae553e43bd2112d5aab46261c76da7f91ef63fd85c7a97199ef0bdafff810e243c063fd84ef65659e27b215d6affc6f75a4886bcd83dc3e70b43df8e591fd518e0aa33ad6ec6d379fc4703905831e5b1461860d26bf25fe3a0ef9c16f84c0c6440a962bd5526e9fd468300ebb94f97edab1192ea3baf0fd5c43c927a662cea15c52660160537e9cf2cb3f556427beee21c4879cdd33cab811e3ddef21def901495d781b618642fa50f67add5cb0a1ec493c98f7927f2ad951e43b5631e87d0b34b32b156819368d9fff752a6f941bae892114acd145a9211cdc49a71dd5b14be06347037d9b924bada905cb036bfd35678c417cbd8b5cf3716019f20b27462779e1896211bc5c2421e16fbfe3efba93bcf4843ff981865030827700d54eb003beac7b58cb5accda55b9a2bcd869cfa66085cd6c362f93be2710df4146fe1bb2288f51ce8a0dadd9fa72c7b8570a88cf92f39542fb4bac91edd9c25cc5e22c36f9701361be7cc10f8392a8e9c2c4c2c0ef5323e4b70efb34ac2feb05762f940b68a820b3f717f1c6548e8edbe800fd92b328314e17917f76b4a238204a7e9de3de4059e5d5295a7fd8903710e4d72fa90baf29544edbaaaad84139d5d1f25c412fb88d6b60e26dcd8bdb76cf81567c28952fbd05443ccc79174826deaa0c664ef7108d0fcd0b5045d09c147101c9c9b23e1b24f822a5efac14e418dbe0db5b495ef816f26b6d11856d1ac377662340683f6dab7cd2b564a2917eb521655cd8d0a4cea5605b2ad468fe3d6132b6c4372984f8ae51e28b7dac0f08d1acd3d83e0d2e90f3c8f73f2756ef8f10b70c7c6c16c382c0df3f2fb41e29d87956abf2898768ee14f1cc482bdab6cc5ae818e73dc00f9964ba11e6594faa1fdcf891cd3025bed2921f4c4a04dbd2785c02f8623be18a49d4e77b8bf00b20e7a7710c0ff36206f2c3e96ed51ce985df74b0d07cb1b8cf2ae33343eb3bdfd1fa90589a64422b3461f484733bc5e09c977f52ede47c264d7e073a26ef3329bedfb558090349df99e485d714da1f4ce03872bd60c6cca3fac5d2e81356cd9d5c8e252fc8639ff9392a6fbe1afc3bc39df7f068827e1f68bcc8d95b40f57dbf689fa4c79b960e5b51b02d58ff94de2794a58ee49f0df366d237709e98a071687feec1e856d250dd502a346373d28e2348f0202a6f0dafcc31b4474a9e9ec075116944c30c64ee2f71e6004c5f34d768448a52621de17e4933f959cdcfd61ae39e9b267d035663591083f607cd623a85073d8ea9d2890f2d4716e63f40e53f95ad2ff9012d5b46b44d89af09bff1ed142c57b38d0a4692f6e64b0aab905f6c00abebc994939f0d84a12022f14280c3c8cffbbb21060dedcd905dbf9a091019f3f66026f433ec54e6fb598eea370b78b88426ef5a3c0661da1e26347ca11bd71801c1d7bb2379dd73cae1fed846bc8377534e7e93c55c695f8e9b7898fc404587224c36742d799982410fe495fd95fc446824b456cb99ac76975dcc9ad66554fed3e8407e0f39247465c44d07b5d73bf00e9cabb9001a131ccbef7b6ec84687dc2d1c63ba2cd51630760f5230ed6b52c21b80d4fe402a69ed92d342901fd6cf91e5b809687bf6709d9154f8a96ad07adce30e91d260831db61618797fab56c144c7e2b66dab4002a5aae40071a1fd4f17d626baf0b5c28248883c8f10e38f00548f3cae753cf981b0339cdf35e4c58d00d66b62ce4841b7eaeb6a50dbb3ef09e7582c0c1917b897ba27782fb28262688ac9cfb6d15f502ef273cd5f98a785547db426ff6c5a3bf0873a5ac73fc98f087748e1e445734d94db0ce709bbd899c4a852b88dbc965553c4ae7536c51fd1469e1c92c72750fdc8a96c507090f89b268ee6378f35b47c70bdf87ba4aa8ce34df15dca9cc88efb4392f76e55a4d9e70bbcff3e59de158250db27742fd0b84f22bf9766d70a20bfc3cb79330ff3625f4085e5a881fc3ea360326bd710134ad603df4ee96875858e22a8c8f8298336837ca9b1144c0eb732ba045a1f9294ff9d41bb0a1390f296e23d16437ec4dae52711af8d44daa3a9b68e280803825f6f8a71f98de7d421e49f95f27c82f7b3aa307fa7a66cac1ab2a261f340e7979bfc88fce8ef4b0598bf782074e2b58eef2f287b599b3c350c267339d2431ab059f87688b9022de7662622003ecd3b3310e019145fe138a2c57753fd9cc979fcef889cda36ef1bb37fcd96afc13c3e4d3ccb3c26a66216d051bc8846f3221ec3662fcca9b3281d1daacb0d10ff558ed58335d48e35e141c2fc4d3ad9fc1dbef6e32924bff982fc0e2bf74d6d44be03fbb43c17f432bc406cc0e303d606b3015aa0edfb07e767d299ff20dd89216486949d131c53f624f25bf85b93730c930e7eee1b93c977166bcd6eca0822a76b67f0f3d922717bfad6dbe26fcf536e2a3976a260f71c34b5389e7fb78a203f6c46491fc62e53d0ee4cc978c1c574bae09a54901f708af05bec44d1db0d81fc5e11e4373c0f937690d805922a876bcb64edfaf5c63129d63904f382f82cccd1ebc80fdc8c8d89009bf3755c32be8b325746346113d97ef60636afeccfd0da56537e2aa9d677b5f3be26b02261d7456ff24bceca414069234004590750b0faa75d5a5ee8adc274ca27f35a92c970caff14aed784d9bc3f95f63c87d384d6261b12ec1c72ddcb29e8ec7f9282c9ccf0f74c89810077763408ab85663bcab1099b34d20787fbb5d17544a4772be13882580fe24deb291e07bb01ce622d14beaff6549dd88a82e70edbfe79727c068bdf3f5ba6fbc4c6fa724a4c605830a31cf2db304d2fd56a0f70e246f5ffc9c3d10b213feba7b099df8b58c38afb28c3f5792248ad6f1afb63dcdc341c342e3b937c61a45b88462c030d8592cd0954ff5cd501943d356813c7cc8529d1d9c825144c398abb9925721a7bf0c29f47d18223575619f161ae20bd4506cabee48d3b13f9bd42e50b0ee1ba375179832075bcc9db636d17b3b595ba1258dba6fea5883727c9ef3e2aae5e4f92a08d1e5f44f1d400c2893fdb218c534248be13bf1899b83d2c83ef0df7fb3e7f064705ae1303f9a15cecd41c63df2184fc6ce4ec4ef1ef71fa54366273fad788a427a3d2bb5611f935631f9e7cc6971dab603da1192e61ed789532de33c8e7502a5f1a0c368c33c586090bf3012a3cbfb8a4b04e4968608df220bfb3289e0c7f90c88b148cc65a222cd43738c4d1560687f8c5da32d1c9bc2d90db8139c8e82dbed72e31901fb4d15c07fb1cc0da6818f9017793df4e6aaf18de4717aa7f384e144180a8bf91d5ab88fc36a4e039c878efb7389f8116fe8df8fd6d29b9f7f5c4dc1e95b0c93bcc99af27a6f5052f970701caf36afb50fce54d88b8ba5524b62b309cba51d265d0ce6b34f9be4568807b387fdb8427a92cddc224efc85acf1dec37699345332ac4b439d1213f44cc378bf037df3993e950e73377c7a001e2bd1f4ff59b9346113cc7c9547dc79782d86413dbd9fc9c16c816b8c07937d7a5e8fea13c5c4ec995c2d5f198cd119af04794fcb9d1790199e9f3231020c8efcf12929fc5aa3ca9bea26041fd2236f5b2e59ec141fda1436ab2db2dfc8b173b7e1ca492d813e6f7e4ebdadfc5d9b1d9ed08fd7e0ef20361dfe868a720a76d3290e40f5458cfc10ebc19ccce83f0e6b2bbe44caade5cc0231cd3ff630a9e91b225f941065b3173740a9f436a81a56c8680cde026a1058fa0f2763c8f95004f14da5229c9cf05fc4857f0604a6d0deafc76148cdee2b3df523018b09220bebe0ef1b9116014ff7f1ac10758089a3a6614c82fdbd17ec88b7cd6211d94b7654a8b81693f9282d529fb517840a98e8917ee858979901e4c750469f62fb36fabd4c0fcff87f3eca3c4d8e35d9e43c1f6626ff27c8cfafdf8eca5e49dc752ea7a6959120722bcb7445a9f5d3bdf929f0b49954680b787905b77413e6752f9bb7a34676daabd20ebce0ef99d22eef322c7acc6423ec8798e951dcdf127be465cb89e7cff26d25cb6cef259b44e92a7a2214012a579ec7e0e815b99c2e4389282292bb9042702a2a9ebdfa8763a3563e319e28cc3636223c15a798782f5cff746dc10e017edef580156632f3556e17769b5f79b63f8ce06ac20dc24ccdd0fa8bc1dcf0b269479149e0623c9ef524a674ba38b85a93297ef79595eb8b203f2efbc73af106272bfe6905f9c7dfcf6a56000235b39d459c2945dcaf7d5318f6b2198f276013ebcc5bcb01f62b31b8d1d505972192fdaab9884b7a33274e84d90fceea560b0e346fe1d16badb57f167de5ca398863d855fcc95f1093ddf9ae4e7e25913b5d094b3463c8fbf17ee29581d157b96b725b959e497819d2334c3a194ceb33b24f9cd66ad7017aa7fae2cf2f63608f9fbd6142c608f9bfc8027c4f79f9b619240c37a5cf83c31a1fa51e111f08d2998781a4678eff102878b0151cdb114decfcf15cc89e759ebae16b47736c1596c363666abe7c79071f88282398061d8c0995f8b59e3db88bfd75a5d9420094a57c964ca2f611df9b09bb3fb48ce871b2a7d023c4f7ea2305eda2061b281fcd2d8dea8af20bf6f59d31ae6f866a6f1426d98c1d4fcdc99d4c7c7bc8bc1696ea3aa209cb0f65fc855fcd2d108b6cbf33af0c3a023cd25ecd77b8f35b857a9fef9afd0e8902a83b6645f6521ba857cef2052d43ebfe4dca7ad9059afc2e7fee614f485ce60f2434968b68e3830f7b255336ce890df0fec5bb456d770d60a7748f879d77048109a6cae338161eeb662d3793e053bdef4a02a80ac057e5f90615ac9afb7f0eb7dca9acc2ce7c5643b7a1211be9954bff6768d98eff312a155f5747eb7366b874b04e1e49bf7d89eaf912b7505f7f0088fdb980c1ae144dec90fcfe1f36be6988a20d938ce6e4045cd09946c0e6127f293da6dc230b21dee0e1923b808ee149beec82cdfeb5684cc62978cbcee22418830298f116bf0a9029f6739f65362d3cf5667db945d5ad297095f67d851094dd81a9ce3cc97f7a974cd7f13c74621e60f9cb52d5378af5da8fe79b2f2c5dc9f83c80651fd72aeafa834b5abcf905f8a6453289665d35d9a55d0aedae631c9b198b2354995a55a57f3f5a63abffb83af7b441ebe20689a275330e0f4241577803916ffb5e2fb0626348f0ea460bf456c40df856c8c13d9d45d4e90c69c1c5ad35114ec02edfa7d57223ffabb0a6fe0f29aef53f48624f6fb2ea1e00154d3287be00c960eca3cbf76e604dec5aafcae0f664dd7fe7e093fcf195485273afeeeec08ad524a7e33332cf6577290581b0a46f0a4f4a7f8bbd1341726d0045e141738e481057708e54ef06ec026fb1d19fc51aefcc8be3d0433a6872ce853f3d4b496610dc58d32e3e7624e776bcd9a87d4dc4f4e601e1d4cb99bcd62e1cb4edbfb8bdf8dc9f2dd9b08d319666faf2c9f5d85354eb79ae6a488cfd194b5c8df42ee3fea79ba2bf226f9bda348b80509bfb105519547d9ca6e3036a090b668df99212fc5e6bc75a4ec9d64642798df78077b52f833762cc1fd36777c40ae7fed8208a4bb0993f3248a1ed1bd9717d038c7041e5e80bf09dad9b1149e5e532cf97577b48f3f794c4a8d1e1908435a034787f8f35e156b2393f6d784dd18f61d0fca721ff09dbeee5cfb2776dd44c1a6eceb75efff4fb63cf24d5d6a41c18a237743dd89aa14b752786e581cc762c601980a2f5030b881c9857e78dbe420bead9808ac4ff351f29baf0e6495feeb1299bf1750788bfd877268d76bb04ff643ca2f95055a3bca9eee13ef7301fb36ff52c062e843c134a2b8c8af19cfad2531901fdeefc3fc7db94c4690f9f939c61091e02d4348ed72f1992772dc8fd5f0dfcae05a8036bf1f05d39df2213f2826e766792fc715308ecb32e9e7f223df40d555e7fdbfa4cf45c257d18782c184de54beb37b919c3c98c253334ea6ec39892d5813b2bebe596c6aca67291501ba07a34be999c1bcdc9a35bdc95926e047bc405e8f48882f527e398456e31c4cd9cbe2c616315e5d1c9f9295ebf3f88e3a364de5110c209d6c674a40d3be2ac7783d9481b03a0973197ed45db268fcf630aaefd9ea70d1ca31f9e5910703229014321dc2f23c7f611f60beb0d9038f387ee33eacf11d1f42d456c33ca89ac86fb25099db397eaa01096b829bb1af6b1e4fbcf72918b4184d999dee70065fea98ca78b96b867c5676b529b648bc013b945f755c09bff362b0daebafbc002e66cd6c1c051dd7ae80886ee777b2162fb0253916f2674c06f938d151033d8aea0755fe7036a03105921ffcaf4333dcefc4882e88d55833fe20c3f73c13324fd165e85aaa9fbee32ee8ebb368ab03c5678764f191f6a460dd703b3137dab09f2d93df3153a796c6fc6e1ecbe0fbfd9937ce7c9b50401140d2fc730ef1f50c5178ec4977ef3ad75ec226737f4afe488ba2718d20bf19218482973741988e9fb0da5eaa8ecdf087f4632dc7de1708625dfefddd62719e14a2fd21bfee9f0ef161e11e4699f3fa401236a0f2381556eeb5159b47334388e376b1087a52fde6a7d948ef5626057bef788ecf23fc2daa155ae6b1088ecbf0bd93f87d9f2e165eae4ed561c0e24120664e967bcea5fdb5e031fe36a2d68b9a7074cb1941e1875849c17bfb5b966b6f2ddc006e330469a9b8da25d6cb89fc6c6f86686bc3c8cf1058487e7d6e63d6384138cf53f8d9c296b487537e5d95f1be77e339323b02f18591fcce8e6525efe7594af6cce3827194e34fdb81c2a3904d78b0163a2ff674d6a88a39c9ad05ef6c973ba4679b696eef68302788857813ef787821fbb04fc635931fa4dc6925cdc86f231f350fb011dfdb95bc309684f860e09f09ebeabc229be137b14f13dae2785e0c88041ec9beba3ac7ac7accb9ce6426ae5b9ce7be24a2bb0263df3783c37ba4f0edade8686dffc8e3fde2dd1c41f5536f2633210e131af18959361768eff3297320e9d3881b439840fbde3cc7731ce46898ae597d6a1ed79fc19f5f4190eb9202ee7b21fbb2a358256bb319fbb4b3012fe200ca515458792b88fa58b6c6c2b4c27328a5f5e3473984763ee5ae7cd883358225215ac2605ef030213bf37f1bb1a37627feb74eec0fb98877b5a90ee1cde581eccb3b4cd822868afd85a3fa87056e40d0fbe7e1b71ce8ec663ff1e4eac1bbe5aebc41f4622df4fb906bfeca84bb23c55b45b2871384982e76d86dc9af5e98cb64930b0d39d0f04b0613cc354377203f49f839a18de722be2343880f44758c782f07939f507c995854b8e615217f1fd678f554a181f50ed948b395f20d8e6836ee4bc17cbe6bf9fe9041f095b3f0a7b376e41e708539731ed52f255d86c929d37d625ebec296117cde2f917f4ef5161948096bee0cdeb8a665f8ce27597188030d786df6a2faa597b0d80615e0872e198e71c8eff93c031c87b0037e1115b6e34ac21bc9e641a73cee21531a8ced5cd29b0a4bddb93f8ba991497ee209d983e23fc364253681e70bb23f5f2cd8e52878025c2ecdaf116b595f46243e8be30549dd9fe33957e26b4c0919a73e21d642b788266da64867b71c638879702385d7efe67300f7d69439126e09e529b60a241175e00d0c84be7a8e204467361f5fe375016be0af14ec5ede9415046b42dfc3c4783bbbaaa664b9c725fcee31874ad9c6ac21bb7cfa51b05061113f5f598970bf10adab50c7657bde7d1fe39d7a31653f1be235de39ffce13a298a83276b8fb78677c8dffbf2b15d7a5a601abf36fe5f0b94c605f4f172a5d6388bd9c05f75888e68571b491398cc346199ea9233bedbf0f791698fbb9fad049020cd3009bf0583c18b2314da5ec1da297e50d305ff29b90e179c3d04d68f7dfb29f2bdf60def2144c8191bec3be14bd7a270eb4a7fa11d96ca4070d75005b5549a38e37d6a10e113e570e22ec10e284de9bf28b1246414b361bd3d8322b2ad6e017b71befcc7bb05fae6189afdb907d830b84b99b29cfee2ce1dc875faa8df0d9edce0b362c87f01b5e10513b3877213f2d672193da2d4caa1f52fd83926c97987d23128d6da9f4346f66e3f8efaf60f2da8582e9198f53fe671db78ae0e78b1a3c18c0ee9eeda97c6d9f366177d19f54bf047406cf87de949e2eddd644be5e68fc8bf83d6f9fc40dac18427ee75169cfdf55e40724de8e17ef07a65bb6a3313b527e49d2afb2cfa710cdfb5f11dc19a359835eb944633382c967459d2a0152de988979c30abae75ec23cfe932daa92569cdde598a80f5305372dac422022faa330abba45fc3ba905ba82322fe4eb2112576c4b7f68f347b266319e353554e0207071500ea25628b26984d6549f5c4ab3f806418057aae6971ad863036d643d9f6e30169b32815ec13b29fcb270da37d1e155a41c70f9ec285c2c70fd9c52aa8bb5a6ea3ec4a6d2002def33f27d6b1752fc9d68148a4a00b4415b1a08dfe0ad3a24d50d686bb2ae74371d12458da331f9398ef00bf6d421a93e40c39375978868b6d2615128fe07b8846cca12b2095ae890540f76a160650312979beab02814ff0fd94c62a16a81d5039400dac273240b8735725028149ed627fde28a0ac72de45796a040bcab0e894291114d9400ab0348d87d5198bce8bab1890e8b421189001108e9a6c35199409716d9ff0d45e0ad7558148aac407ef291e407413497b502812464d9d21e9d3ad6d061512822697f686587c280c774382a0f38504636181da4e4a75044026a84af13dadf0e3a24950584ec65cb29147c6bbdb542911b2889b34d675109f2880e4965e134253f85a260f2433db04d809e44eafb53f253286a84fc7612e407f7d1463a2c954b7ee878bd920e8b429113756cf64af26ba7c35239e8e5901fda8cadacc3a250e404aaa0fa91df0b70926a7e95053401fd4690dfa95564f6e2b025e462a159e556faaa1531028d50d1c1fa2d0a1e94a43ebf0a02bad64ead42f2833f06675da071eedb54fc191a0a8504da5da101883dc31a9dcf4fd661a92cc0bff7ae203f9c2bbb5a853f134e3c437d32ceb145a3868b590b5428e20094031cef3945687d38df652d1d9aca833c8717d51e955cdbbb9991dbc83f2c6b02ff9b421117f1ed27cc5df8fa3e26af4c545181b886fc88155ee69e15fa1cf0c13c49fef9d02040b4e76aa0af581193a97b3af9b5f070a9e05cf04374682a17dd2918f4b8a002cd4494e4dd4bfe014c1064dcff455fafa248c07f8c03db7194eb4cf2db593da7c457f980dfef7d411a6f18d9a0c226e745467e11cf8020c72efa6a154500164373d6f64689b9853ade9ba872ce2956e4c010f21b9a422aa94719ccf48fc5bdcfe209ab69078a4249af05cfa1d1625e617dc0877c82ceadea023a524c172ffa66aa8c43c0db907770b93d0b1ae7addea5e6aea2002098b1339bb732fd0b730b09cc97579845a4c80323c50b870f70d30a3077fb39e6ee18d2c89b223ad0960af5b97dd9b49deb901e021a9729e9553fe0bc95bdfd7a52ba139e11a8f954dc2f0e5d3f9c4951a1c8a4dd2178612b7fde11f367a9b01e9e212f5340fd7a35aafdfdc7c8fa29bdcfaecec4fdd6c839469ae92b54083466cdee54263b04c2fe0821bc45ace52190b13ba94faf26b183a34ded95c27bdc89497aa1d8a9d17e5f0f5aaf6df3151d55d065e53c263ae4e3cd08213a97f06e662ba2a22b34b40f5d3c388efc800192863f4ad1bd210ad7df480ff27311871a399fcd5e4575a221bf7b744d413795cd58cb6fcdd2260ff2c2896b48e77ac2c8a3467ea8269b5e511cd0d2aaa318cb3bc8f305961b2d8d9c4d5eaa816dbbf51c93e13b35fcbed0576e3d2601e4a0ad4e5eb50b4cbe25fc99a5fcb9d6fcd985110907018069e455cbd445b88f396c5a36cee3fe718f2b32a135618d0cc4b63d79954778d75b17313eb00c90c7fa397975ecafb2c637af1a278312603ce6efaa42b32ab7f607e23b87896fa51a243e349b589f65331e0fc8da948c537eef148d05c86cb69175f86710f974dea091a33793c9ed079eb7f8ef945a5abc4a80c5630ff24f7283ffe4c732dd075257e0b03e98fc80c6b34c7cef56e9d8afc5848333229066810865f398befb27f2f2d616503032be94d7cdba54da3cc9df9994e6f1f51bf23dbd19a23136e0fbb4e4b6028fcd44231fe81255024c0a6fb059953401c39fb7ab789f2398f8deaba2b10501b4e3e7ed6ca4139bafb9805c34f83a11ed9ec1a4069fd654deac96b2b9f74d01f7d48435cd16ac65ae5f80b98c6a9b463c6ff0f3f7ba8c14958401e4777dd939a16b62e19f4dc1bc43c870aaaeaecc08da20b5e23626b0a55904291af0a7ddc19a304a10dbeaf454289223c0234a7cadbd99e4643e1634875b580ba91620a8f4009b7c99086f267fe678f27c7b6acd281465c0614213439ac0da319b7d306d917335db21802fc8ebdab27a158d259a314ccc4078e83e8d20d371a4b98b0a456a0007b4acac38b4c8ef6bc64400d29b1342042fb159586d1a0f34b93f4348fe6af2fc7d4d75aa2914e9041a0afc264c52b4ff593ee2df82c890c3752179951abf87901eb4a24b63d62ed304a4eb3c249e17a66f1fd2aed38a04b417453c8079d65dfcfcb591b1e439e6915bb580359cedc84f64ed405e467e58b7e8596c528318dee7bfad66206f7100155e938c8e36e38c0c24afa38d42a1049820506e841e7a0884342af03bde632d10810ee4ee2dacb13184d6bc2dcbaabc39ac13320e754c78d3585b445e1c8222a8c79ecaff552814654067f2d2367ea4ec691b3fb086085f1fda50adac43a750a806584d401d692bd658407a88eac247f82179be3e8542a15028140a8542a15028140a8542a150281425c2ff093000fd22ed9bea9b2bab0000000049454e44ae426082, '2017-10-27 21:33:48', '2017-11-03 20:33:27');
INSERT INTO `ezi_school_signatories` (`id`, `school_code`, `school_head`, `school_ass_head`, `school_accountant`, `created_at`, `updated_at`) VALUES
(2, 'SCH28217', 0x89504e470d0a1a0a0000000d4948445200000140000000a60806000000abfa56810000001974455874536f6674776172650041646f626520496d616765526561647971c9653c00002a4f4944415478daec5d07b81445d6bdf044440c984170055111c51c30a1281850d78439b0c65544943507504c6b445605c59cc32aa888115010c4352bea82047320990341d25f67fbd6dfb7ebf5ccf4ccf4f4f4ccdcf37df7d3c79b37dd5d5d75eae6225228140a8542a15028140a8542a1502814d58c063a048a8858c6483b23eb1859df4873238b9ccf3434f2a7912946be3732c3c834238b75f8144a808a4a433323c71a39c6c86646962bf07bbe3632dec8c746261879c7c85c1d5e8512a0222d58cfc8ce46da1ad9c8c83646d63552c7bf87b637d9c8cf46a61af9dcc8f246be32329d7fbfd4c8b2ac29ae696405fe8eed8db414d79a67e40d23838d8c60ad51a150281201486d6b23bd8c3c686436931764a1914f8cdc61e4742307b3b95b2c563172a891e78ccc17d7fbd1c819ba192b148a52a28d91938c3c6de4574140338d0c35d2d3c856469a24702fab1be96f648eb88f91ac852a140a45d158c9c8ee466e242f186189e633d6ee8e66222a275a187944dc1bfc841df4d529148a42009fdbbe468619f99d4905e4f7b891d38c6c405ea4366d8029be80eff75d23dbe9ab542814510042dbd1c8bf8dfcc124f207935e67238d2ae43924093ec3daa142a1506434713b1979559890ff35722e7911d84a03a2c7378967b94a5fb142a108c329e4052f6400a12b79c9ca950c44a6dfe2677acf48477dd50a850226ee20239f1a59427e30e36a236b57d9b3f615c4de575fbd4251bbe86e64a22084a5ac211d42c9a4ab94035d99e8f1ac4892565fa0425163f8ab918f04e9fd465e90638b1a78f6b5c8cb4b543358a1a83120fd6314f96565d084aeaa412de8627e7e246cf7d069a15054375a1bb98d353d2c7cd4c91e5cc5666e2ef4243f9d470950a1a842b422cf973786bc765158f0c8dd43c0a3518d8fcd61e4758b99af04a850541fd062ca96a7a162e376f23ab0289400158aaa055a43a1f675112fee1b8caca1c392d104461fc17d7438148aca471f233f91d7fbee7a25beac18481a055628aa02f0f37dc20bfa1e8aa7b75e35a3b591e7c9f789aeac43a250541e10cc18cb0b7912795d9115b9811c485be6a795200a4585a10d6b2eb6b309525a36d061c9dbfcfd82d4ffa750540c706010ea75e7f202462507caba1aead044866c86a0e6af425101c05916471af996172ea2bb384b63791d9abc710ef9e57f67e9702814e93777d18a4a26326b3e5f61686de4051e479403b6d5215128d28bc3c94f669ec35a60231d96827189d0fefae8702814e9c595e4d7ed42ebd3964dc501bebfb785f6a7a7c3291429037c7d28cb9a22b4bec355eb8b05b615fe2fe495092a148a14017df8de13261a7af36942733c388a89cf268aeb86a250a408171af99917e86cf20af57591c6836d8cbcc3638bff6eab43a250a403e84cfc0479b5bb58a0cf1a69afc3121b70aa9d3d141d49e367e8902814e9c096143c8be302f20e1d57c487cbc4f8aae9ab50a404a845fd8efc40c71ee4054014f1e10cf24b05c719d9448744a1283fa0e9fd2216e63a3a24b1636f239ff318238ff2401d1285a2fcb88ebceecc5898d792e7a352c48b6e82fca001f6d6215128ca0fa4b5d872b653c86b6ca08817486e1e45bedf0fb97fcbeab02814e5031a16e00c5a7b0ce5114696d161891d6d1df2bb43c759a1282fd6a46072f3d1ba284b467ea3c538a3e1416b1d1685223de4871e74fba849163bd0cfef7131ce638d6cacc3a250a487fca420e9f945f222954a86c5a1317987bddbb1fd94bc06b10a85a24c406bfa0f33909f2bd79276242e86fc6e1763395dc94fa1281f9068fba891790ec9c11f75829196c264432fba1ff9f75be8d015847f39e4d7458744a1481ecd8c5c417eef3e2ba8f43880c2cbaf5623ff18cb6d7408f306dada2f50f25328ca0744734f129a9c94a7c8f30366c260f21b20a806981f7016ca421ebb694a7e0a45f2400003ad951687901fb4c16c4d0d70c6c7a7a4a570850035d45f0af2db5d8744a1480e7f21afbdd27c5e840876489fdfe594bba3cb33e2f307e8904606824b6394fc148af298bbe71af99517e012f2fc5020307b6811caae7245747731f20d7f7e04e9391f51b12cf97dfd407e9d7548148a6480e8ee9bc2dc7d83bc9ad3b58439369a7fce05abfd7d4fda99382ae02218467ec043c94fa14808d0f27e135a1f1cf08df97736d1191ae06611be6b7f23b348eb81f3c14ee4e7540e67178442a12831b0d05e223fdaf8b1918e461af2ef0792ef073c302299bdce9fbf86b40d5614c0bdf095929f42912c70f8f84f14ec2a2209eb10233ff0ef064624b36b58831c4f7e42b422332e149bcfdd943da548a150c4006877b709cdce766f91f5ba686d65cff1981291cc0e60c204a96ea0c39c17f95d4d7a8e87425172b43632522c3c446adb857cee3ef22b10908691eb1c0f90df1cfefcdea4e77e64031ac4decf63f58791f3499bc62aaa006977f66f4a5ee5465bfe19b5bbc79057e121b1a7917d5923c4096336089209f83ea4c6ac4ede3920e3727cbed6c90f8d0d7a905721d38b379b4a471d6faed0fc5b919704bfd0b13a40f69fb1653155a7822249ec47417f1f7c754d337cf603fecc5c8a16f57d893f3fc8c82a3ad419d15e8c15dc0a9d2af85990078a9e8f03c80b7afd42d1ba0259994d5e2591067c1425075a51d92a0eb4ab3f95fc1417174887b149d0976621498bebc90b7a8c254d76ce868d8c4ce0717dd7c8d615fa1c3b9017a99e9b27e16592f7d83251284a4e7e20aabdd85c0903021f5f939ff3d72ac7771fc83bffc4089f55f2f3c67558058ed58a460ee54d2e8cc44086a817bfcbc88946b6cbf08c30ffd1100339a6e3c5df3fa05344113740724f90df8905c72776cd427ec0cd822cff46d9bb38afc96489a8ef963adc59c9cfe6450ead20f2c3bbc721f64f87687b9823ff3172257901b2150af87ef80aedc14eaf1a5943a78a224ef21b45fee96c28636b9be36fe09f9ac99fff248239fb0a7f76bb2c9f59d5c871bc50d028b5d63a421f23346a905f25e445c21c855fef5b87f4e633519dc8efb5586c457ee50be66a135db68ab8c86f749ee497aff637943f8744e9b0c83712a6e13ffc592c20dc4f871a7907d08eef17cf3e24e51ace0abc51bdcb6e1297f44e8889f4a4abe53a719d81ba6c15a520bf2f22925f53a1a97c974353e9c79f3b2764d7aee38534474c6e94d65d445e37e95a00a2edb60722d23efe9ee27b5d8fc9f96747dbc3fdffa3441a2b92bdcf17d742c38d36ba74cb8e86ac95ef66e4602397b1128374ad5d8dac5b090f019fdf42417eeb45fcbbab78b1e2effaf20e1d86eee425475f49f5fd3e1b9297ffb7582c7e984bb594e07b1ef90d25dea674fa4611fddf9382670bdb13fcd0c167e7125e1be477a1b826f24f4f53ee298ba2b427af7bb4aafb8a7247eb97f0c68840572a1b1b9f2948ecf33cc88f84f687bfcfe4a4efca8b1b2910ab3b3b07ae2d730cafa0da6a8250c79af11f297e7e98e548ba9ee44cec6f58436f5ee2ebaf4d5eadb324dc6b948b12d3eea0a0a048e1792a3e75091666ef343de000f2cbd63ecfd3a4384290d71d19162efaff2171750c057b01b660adc1469a910ad1a1c626d7beaced59adbb5bcaee0f131f553a339c49fc11bb2b92a83fde944d5d7beddf8d5cacbc5472d26bc7e33c398b56877e9da37803efcde6ee2e8207e0fbdd9dad39d9e17d715a4870a0203fdc14126cf3a9c31d47bee37bf390df83e410159e49c184d5839914ed809c95c574ae46c0b73a543cff6047334ec3fd3d2c5c2256c653722df61bf322f9555c1f25707b283f95040d5893ef47fe498c4b1dd242051272838fa2fc53b2f0fdebf3e66935c1b2fa0625f961a277a1ec797e2e5a0acd00795d6b6420bf190ef9e1ba36370cdacf263566eef6178b1a1af7de29ba3fece0639d898fb9f1186b834901dac72b148c28a3547245e5a9d8818c0da45c8dce60ae626d23f0d43ea6eb61a3ff9015a77bcaf5d0c7533041f58402cc99f3d91c59ca3bb51bb0b035c1070842941a2352676a29b7af2b6b304bc5f3af96927beb4c5eca8a4b7c38c03ec9d664d0face74b4be29a4477a9642db6bc19bf1ac104d0fbede73a834e5a9b87677bed667e578789830f270f2cba8b068eb6be23bdca2f4114c74076658fc30816ba5d57d73d6a02cf1cf6413220d2dbf3211df23947c4f46b4f57fc3d1fa6e56ad2f56c0b78706254f390ad0129e973725a4e9d789eb26eedb9161eb27a9b052a496e4577ebce06832d6d9d99f7fbe54688a33295a87986a0136802fc578ff9bd291b7b61bf96dc7ca4d7c984b0f38f7f20e6f9a8af8cc5c9cb5f334d54f5f1ac10a49d2aea0af9800374f72105e253fd7ee532abc9d10dae1db04d85ee4577e8ce07febc75ae553e43bd2112d5aab46261c76da7f91ef63fd85c7a97199ef0bdafff810e243c063fd84ef65659e27b215d6affc6f75a4886bcd83dc3e70b43df8e591fd518e0aa33ad6ec6d379fc4703905831e5b1461860d26bf25fe3a0ef9c16f84c0c6440a962bd5526e9fd468300ebb94f97edab1192ea3baf0fd5c43c927a662cea15c52660160537e9cf2cb3f556427beee21c4879cdd33cab811e3ddef21def901495d781b618642fa50f67add5cb0a1ec493c98f7927f2ad951e43b5631e87d0b34b32b156819368d9fff752a6f941bae892114acd145a9211cdc49a71dd5b14be06347037d9b924bada905cb036bfd35678c417cbd8b5cf3716019f20b27462779e1896211bc5c2421e16fbfe3efba93bcf4843ff981865030827700d54eb003beac7b58cb5accda55b9a2bcd869cfa66085cd6c362f93be2710df4146fe1bb2288f51ce8a0dadd9fa72c7b8570a88cf92f39542fb4bac91edd9c25cc5e22c36f9701361be7cc10f8392a8e9c2c4c2c0ef5323e4b70efb34ac2feb05762f940b68a820b3f717f1c6548e8edbe800fd92b328314e17917f76b4a238204a7e9de3de4059e5d5295a7fd8903710e4d72fa90baf29544edbaaaad84139d5d1f25c412fb88d6b60e26dcd8bdb76cf81567c28952fbd05443ccc79174826deaa0c664ef7108d0fcd0b5045d09c147101c9c9b23e1b24f822a5efac14e418dbe0db5b495ef816f26b6d11856d1ac377662340683f6dab7cd2b564a2917eb521655cd8d0a4cea5605b2ad468fe3d6132b6c4372984f8ae51e28b7dac0f08d1acd3d83e0d2e90f3c8f73f2756ef8f10b70c7c6c16c382c0df3f2fb41e29d87956abf2898768ee14f1cc482bdab6cc5ae818e73dc00f9964ba11e6594faa1fdcf891cd3025bed2921f4c4a04dbd2785c02f8623be18a49d4e77b8bf00b20e7a7710c0ff36206f2c3e96ed51ce985df74b0d07cb1b8cf2ae33343eb3bdfd1fa90589a64422b3461f484733bc5e09c977f52ede47c264d7e073a26ef3329bedfb558090349df99e485d714da1f4ce03872bd60c6cca3fac5d2e81356cd9d5c8e252fc8639ff9392a6fbe1afc3bc39df7f068827e1f68bcc8d95b40f57dbf689fa4c79b960e5b51b02d58ff94de2794a58ee49f0df366d237709e98a071687feec1e856d250dd502a346373d28e2348f0202a6f0dafcc31b4474a9e9ec075116944c30c64ee2f71e6004c5f34d768448a52621de17e4933f959cdcfd61ae39e9b267d035663591083f607cd623a85073d8ea9d2890f2d4716e63f40e53f95ad2ff9012d5b46b44d89af09bff1ed142c57b38d0a4692f6e64b0aab905f6c00abebc994939f0d84a12022f14280c3c8cffbbb21060dedcd905dbf9a091019f3f66026f433ec54e6fb598eea370b78b88426ef5a3c0661da1e26347ca11bd71801c1d7bb2379dd73cae1fed846bc8377534e7e93c55c695f8e9b7898fc404587224c36742d799982410fe495fd95fc446824b456cb99ac76975dcc9ad66554fed3e8407e0f39247465c44d07b5d73bf00e9cabb9001a131ccbef7b6ec84687dc2d1c63ba2cd51630760f5230ed6b52c21b80d4fe402a69ed92d342901fd6cf91e5b809687bf6709d9154f8a96ad07adce30e91d260831db61618797fab56c144c7e2b66dab4002a5aae40071a1fd4f17d626baf0b5c28248883c8f10e38f00548f3cae753cf981b0339cdf35e4c58d00d66b62ce4841b7eaeb6a50dbb3ef09e7582c0c1917b897ba27782fb28262688ac9cfb6d15f502ef273cd5f98a785547db426ff6c5a3bf0873a5ac73fc98f087748e1e445734d94db0ce709bbd899c4a852b88dbc965553c4ae7536c51fd1469e1c92c72750fdc8a96c507090f89b268ee6378f35b47c70bdf87ba4aa8ce34df15dca9cc88efb4392f76e55a4d9e70bbcff3e59de158250db27742fd0b84f22bf9766d70a20bfc3cb79330ff3625f4085e5a881fc3ea360326bd710134ad603df4ee96875858e22a8c8f8298336837ca9b1144c0eb732ba045a1f9294ff9d41bb0a1390f296e23d16437ec4dae52711af8d44daa3a9b68e280803825f6f8a71f98de7d421e49f95f27c82f7b3aa307fa7a66cac1ab2a261f340e7979bfc88fce8ef4b0598bf782074e2b58eef2f287b599b3c350c267339d2431ab059f87688b9022de7662622003ecd3b3310e019145fe138a2c57753fd9cc979fcef889cda36ef1bb37fcd96afc13c3e4d3ccb3c26a66216d051bc8846f3221ec3662fcca9b3281d1daacb0d10ff558ed58335d48e35e141c2fc4d3ad9fc1dbef6e32924bff982fc0e2bf74d6d44be03fbb43c17f432bc406cc0e303d606b3015aa0edfb07e767d299ff20dd89216486949d131c53f624f25bf85b93730c930e7eee1b93c977166bcd6eca0822a76b67f0f3d922717bfad6dbe26fcf536e2a3976a260f71c34b5389e7fb78a203f6c46491fc62e53d0ee4cc978c1c574bae09a54901f708af05bec44d1db0d81fc5e11e4373c0f937690d805922a876bcb64edfaf5c63129d63904f382f82cccd1ebc80fdc8c8d89009bf3755c32be8b325746346113d97ef60636afeccfd0da56537e2aa9d677b5f3be26b02261d7456ff24bceca414069234004590750b0faa75d5a5ee8adc274ca27f35a92c970caff14aed784d9bc3f95f63c87d384d6261b12ec1c72ddcb29e8ec7f9282c9ccf0f74c89810077763408ab85663bcab1099b34d20787fbb5d17544a4772be13882580fe24deb291e07bb01ce622d14beaff6549dd88a82e70edbfe79727c068bdf3f5ba6fbc4c6fa724a4c605830a31cf2db304d2fd56a0f70e246f5ffc9c3d10b213feba7b099df8b58c38afb28c3f5792248ad6f1afb63dcdc341c342e3b937c61a45b88462c030d8592cd0954ff5cd501943d356813c7cc8529d1d9c825144c398abb9925721a7bf0c29f47d18223575619f161ae20bd4506cabee48d3b13f9bd42e50b0ee1ba375179832075bcc9db636d17b3b595ba1258dba6fea5883727c9ef3e2aae5e4f92a08d1e5f44f1d400c2893fdb218c534248be13bf1899b83d2c83ef0df7fb3e7f064705ae1303f9a15cecd41c63df2184fc6ce4ec4ef1ef71fa54366273fad788a427a3d2bb5611f935631f9e7cc6971dab603da1192e61ed789532de33c8e7502a5f1a0c368c33c586090bf3012a3cbfb8a4b04e4968608df220bfb3289e0c7f90c88b148cc65a222cd43738c4d1560687f8c5da32d1c9bc2d90db8139c8e82dbed72e31901fb4d15c07fb1cc0da6818f9017793df4e6aaf18de4717aa7f384e144180a8bf91d5ab88fc36a4e039c878efb7389f8116fe8df8fd6d29b9f7f5c4dc1e95b0c93bcc99af27a6f5052f970701caf36afb50fce54d88b8ba5524b62b309cba51d265d0ce6b34f9be4568807b387fdb8427a92cddc224efc85acf1dec37699345332ac4b439d1213f44cc378bf037df3993e950e73377c7a001e2bd1f4ff59b9346113cc7c9547dc79782d86413dbd9fc9c16c816b8c07937d7a5e8fea13c5c4ec995c2d5f198cd119af04794fcb9d1790199e9f3231020c8efcf12929fc5aa3ca9bea26041fd2236f5b2e59ec141fda1436ab2db2dfc8b173b7e1ca492d813e6f7e4ebdadfc5d9b1d9ed08fd7e0ef20361dfe868a720a76d3290e40f5458cfc10ebc19ccce83f0e6b2bbe44caade5cc0231cd3ff630a9e91b225f941065b3173740a9f436a81a56c8680cde026a1058fa0f2763c8f95004f14da5229c9cf05fc4857f0604a6d0deafc76148cdee2b3df523018b09220bebe0ef1b9116014ff7f1ac10758089a3a6614c82fdbd17ec88b7cd6211d94b7654a8b81693f9282d529fb517840a98e8917ee858979901e4c750469f62fb36fabd4c0fcff87f3eca3c4d8e35d9e43c1f6626ff27c8cfafdf8eca5e49dc752ea7a6959120722bcb7445a9f5d3bdf929f0b49954680b787905b77413e6752f9bb7a34676daabd20ebce0ef99d22eef322c7acc6423ec8798e951dcdf127be465cb89e7cff26d25cb6cef259b44e92a7a2214012a579ec7e0e815b99c2e4389282292bb9042702a2a9ebdfa8763a3563e319e28cc3636223c15a798782f5cff746dc10e017edef580156632f3556e17769b5f79b63f8ce06ac20dc24ccdd0fa8bc1dcf0b269479149e0623c9ef524a674ba38b85a93297ef79595eb8b203f2efbc73af106272bfe6905f9c7dfcf6a56000235b39d459c2945dcaf7d5318f6b2198f276013ebcc5bcb01f62b31b8d1d505972192fdaab9884b7a33274e84d90fceea560b0e346fe1d16badb57f167de5ca398863d855fcc95f1093ddf9ae4e7e25913b5d094b3463c8fbf17ee29581d157b96b725b959e497819d2334c3a194ceb33b24f9cd66ad7017aa7fae2cf2f63608f9fbd6142c608f9bfc8027c4f79f9b619240c37a5cf83c31a1fa51e111f08d2998781a4678eff102878b0151cdb114decfcf15cc89e759ebae16b47736c1596c363666abe7c79071f88282398061d8c0995f8b59e3db88bfd75a5d9420094a57c964ca2f611df9b09bb3fb48ce871b2a7d023c4f7ea2305eda2061b281fcd2d8dea8af20bf6f59d31ae6f866a6f1426d98c1d4fcdc99d4c7c7bc8bc1696ea3aa209cb0f65fc855fcd2d108b6cbf33af0c3a023cd25ecd77b8f35b857a9fef9afd0e8902a83b6645f6521ba857cef2052d43ebfe4dca7ad9059afc2e7fee614f485ce60f2434968b68e3830f7b255336ce890df0fec5bb456d770d60a7748f879d77048109a6cae338161eeb662d3793e053bdef4a02a80ac057e5f90615ac9afb7f0eb7dca9acc2ce7c5643b7a1211be9954bff6768d98eff312a155f5747eb7366b874b04e1e49bf7d89eaf912b7505f7f0088fdb980c1ae144dec90fcfe1f36be6988a20d938ce6e4045cd09946c0e6127f293da6dc230b21dee0e1923b808ee149beec82cdfeb5684cc62978cbcee22418830298f116bf0a9029f6739f65362d3cf5667db945d5ad297095f67d851094dd81a9ce3cc97f7a974cd7f13c74621e60f9cb52d5378af5da8fe79b2f2c5dc9f83c80651fd72aeafa834b5abcf905f8a6453289665d35d9a55d0aedae631c9b198b2354995a55a57f3f5a63abffb83af7b441ebe20689a275330e0f4241577803916ffb5e2fb0626348f0ea460bf456c40df856c8c13d9d45d4e90c69c1c5ad35114ec02edfa7d57223ffabb0a6fe0f29aef53f48624f6fb2ea1e00154d3287be00c960eca3cbf76e604dec5aafcae0f664dd7fe7e093fcf195485273afeeeec08ad524a7e33332cf6577290581b0a46f0a4f4a7f8bbd1341726d0045e141738e481057708e54ef06ec026fb1d19fc51aefcc8be3d0433a6872ce853f3d4b496610dc58d32e3e7624e776bcd9a87d4dc4f4e601e1d4cb99bcd62e1cb4edbfb8bdf8dc9f2dd9b08d319666faf2c9f5d85354eb79ae6a488cfd194b5c8df42ee3fea79ba2bf226f9bda348b80509bfb105519547d9ca6e3036a090b668df99212fc5e6bc75a4ec9d64642798df78077b52f833762cc1fd36777c40ae7fed8208a4bb0993f3248a1ed1bd9717d038c7041e5e80bf09dad9b1149e5e532cf97577b48f3f794c4a8d1e1908435a034787f8f35e156b2393f6d784dd18f61d0fca721ff09dbeee5cfb2776dd44c1a6eceb75efff4fb63cf24d5d6a41c18a237743dd89aa14b752786e581cc762c601980a2f5030b881c9857e78dbe420bead9808ac4ff351f29baf0e6495feeb1299bf1750788bfd877268d76bb04ff643ca2f95055a3bca9eee13ef7301fb36ff52c062e843c134a2b8c8af19cfad2531901fdeefc3fc7db94c4690f9f939c61091e02d4348ed72f1992772dc8fd5f0dfcae05a8036bf1f05d39df2213f2826e766792fc715308ecb32e9e7f223df40d555e7fdbfa4cf45c257d18782c184de54beb37b919c3c98c253334ea6ec39892d5813b2bebe596c6aca67291501ba07a34be999c1bcdc9a35bdc95926e047bc405e8f48882f527e398456e31c4cd9cbe2c616315e5d1c9f9295ebf3f88e3a364de5110c209d6c674a40d3be2ac7783d9481b03a0973197ed45db268fcf630aaefd9ea70d1ca31f9e5910703229014321dc2f23c7f611f60beb0d9038f387ee33eacf11d1f42d456c33ca89ac86fb25099db397eaa01096b829bb1af6b1e4fbcf72918b4184d999dee70065fea98ca78b96b867c5676b529b648bc013b945f755c09bff362b0daebafbc002e66cd6c1c051dd7ae80886ee777b2162fb0253916f2674c06f938d151033d8aea0755fe7036a03105921ffcaf4333dcefc4882e88d55833fe20c3f73c13324fd165e85aaa9fbee32ee8ebb368ab03c5678764f191f6a460dd703b3137dab09f2d93df3153a796c6fc6e1ecbe0fbfd9937ce7c9b50401140d2fc730ef1f50c5178ec4977ef3ad75ec226737f4afe488ba2718d20bf19218482973741988e9fb0da5eaa8ecdf087f4632dc7de1708625dfefddd62719e14a2fd21bfee9f0ef161e11e4699f3fa401236a0f2381556eeb5159b47334388e376b1087a52fde6a7d948ef5626057bef788ecf23fc2daa155ae6b1088ecbf0bd93f87d9f2e165eae4ed561c0e24120664e967bcea5fdb5e031fe36a2d68b9a7074cb1941e1875849c17bfb5b966b6f2ddc006e330469a9b8da25d6cb89fc6c6f86686bc3c8cf1058487e7d6e63d6384138cf53f8d9c296b487537e5d95f1be77e339323b02f18591fcce8e6525efe7594af6cce3827194e34fdb81c2a3904d78b0163a2ff674d6a88a39c9ad05ef6c973ba4679b696eef68302788857813ef787821fbb04fc635931fa4dc6925cdc86f231f350fb011dfdb95bc309684f860e09f09ebeabc229be137b14f13dae2785e0c88041ec9beba3ac7ac7accb9ce6426ae5b9ce7be24a2bb0263df3783c37ba4f0edade8686dffc8e3fde2dd1c41f5536f2633210e131af18959361768eff3297320e9d3881b439840fbde3cc7731ce46898ae597d6a1ed79fc19f5f4190eb9202ee7b21fbb2a358256bb319fbb4b3012fe200ca515458792b88fa58b6c6c2b4c27328a5f5e3473984763ee5ae7cd883358225215ac2605ef030213bf37f1bb1a37627feb74eec0fb98877b5a90ee1cde581eccb3b4cd822868afd85a3fa87056e40d0fbe7e1b71ce8ec663ff1e4eac1bbe5aebc41f4622df4fb906bfeca84bb23c55b45b2871384982e76d86dc9af5e98cb64930b0d39d0f04b0613cc354377203f49f839a18de722be2343880f44758c782f07939f507c995854b8e615217f1fd678f554a181f50ed948b395f20d8e6836ee4bc17cbe6bf9fe9041f095b3f0a7b376e41e708539731ed52f255d86c929d37d625ebec296117cde2f917f4ef5161948096bee0cdeb8a665f8ce27597188030d786df6a2faa597b0d80615e0872e198e71c8eff93c031c87b0037e1115b6e34ac21bc9e641a73cee21531a8ced5cd29b0a4bddb93f8ba991497ee209d983e23fc364253681e70bb23f5f2cd8e52878025c2ecdaf116b595f46243e8be30549dd9fe33957e26b4c0919a73e21d642b788266da64867b71c638879702385d7efe67300f7d69439126e09e529b60a241175e00d0c84be7a8e204467361f5fe375016be0af14ec5ede9415046b42dfc3c4783bbbaaa664b9c725fcee31874ad9c6ac21bb7cfa51b05061113f5f598970bf10adab50c7657bde7d1fe39d7a31653f1be235de39ffce13a298a83276b8fb78677c8dffbf2b15d7a5a601abf36fe5f0b94c605f4f172a5d6388bd9c05f75888e68571b491398cc346199ea9233bedbf0f791698fbb9fad049020cd3009bf0583c18b2314da5ec1da297e50d305ff29b90e179c3d04d68f7dfb29f2bdf60def2144c8191bec3be14bd7a270eb4a7fa11d96ca4070d75005b5549a38e37d6a10e113e570e22ec10e284de9bf28b1246414b361bd3d8322b2ad6e017b71befcc7bb05fae6189afdb907d830b84b99b29cfee2ce1dc875faa8df0d9edce0b362c87f01b5e10513b3877213f2d672193da2d4caa1f52fd83926c97987d23128d6da9f4346f66e3f8efaf60f2da8582e9198f53fe671db78ae0e78b1a3c18c0ee9eeda97c6d9f366177d19f54bf047406cf87de949e2eddd644be5e68fc8bf83d6f9fc40dac18427ee75169cfdf55e40724de8e17ef07a65bb6a3313b527e49d2afb2cfa710cdfb5f11dc19a359835eb944633382c967459d2a0152de988979c30abae75ec23cfe932daa92569cdde598a80f5305372dac422022faa330abba45fc3ba905ba82322fe4eb2112576c4b7f68f347b266319e353554e0207071500ea25628b26984d6549f5c4ab3f806418057aae6971ad863036d643d9f6e30169b32815ec13b29fcb270da37d1e155a41c70f9ec285c2c70fd9c52aa8bb5a6ea3ec4a6d2002def33f27d6b1752fc9d68148a4a00b4415b1a08dfe0ad3a24d50d686bb2ae74371d12458da331f9398ef00bf6d421a93e40c39375978868b6d2615128fe07b8846cca12b2095ae890540f76a160650312979beab02814ff0fd94c62a16a81d5039400dac273240b8735725028149ed627fde28a0ac72de45796a040bcab0e894291114d9400ab0348d87d5198bce8bab1890e8b421189001108e9a6c35199409716d9ff0d45e0ad7558148aac407ef291e407413497b502812464d9d21e9d3ad6d061512822697f686587c280c774382a0f38504636181da4e4a75044026a84af13dadf0e3a24950584ec65cb29147c6bbdb542911b2889b34d675109f2880e4965e134253f85a260f2433db04d809e44eafb53f253286a84fc7612e407f7d1463a2c954b7ee878bd920e8b429113756cf64af26ba7c35239e8e5901fda8cadacc3a250e404aaa0fa91df0b70926a7e95053401fd4690dfa95564f6e2b025e462a159e556faaa1531028d50d1c1fa2d0a1e94a43ebf0a02bad64ead42f2833f06675da071eedb54fc191a0a8504da5da101883dc31a9dcf4fd661a92cc0bff7ae203f9c2bbb5a853f134e3c437d32ceb145a3868b590b5428e20094031cef3945687d38df652d1d9aca833c8717d51e955cdbbb9991dbc83f2c6b02ff9b421117f1ed27cc5df8fa3e26af4c545181b886fc88155ee69e15fa1cf0c13c49fef9d02040b4e76aa0af581193a97b3af9b5f070a9e05cf04374682a17dd2918f4b8a002cd4494e4dd4bfe014c1064dcff455fafa248c07f8c03db7194eb4cf2db593da7c457f980dfef7d411a6f18d9a0c226e745467e11cf8020c72efa6a154500164373d6f64689b9853ade9ba872ce2956e4c010f21b9a422aa94719ccf48fc5bdcfe209ab69078a4249af05cfa1d1625e617dc0877c82ceadea023a524c172ffa66aa8c43c0db907770b93d0b1ae7addea5e6aea2002098b1339bb732fd0b730b09cc97579845a4c80323c50b870f70d30a3077fb39e6ee18d2c89b223ad0960af5b97dd9b49deb901e021a9729e9553fe0bc95bdfd7a52ba139e11a8f954dc2f0e5d3f9c4951a1c8a4dd2178612b7fde11f367a9b01e9e212f5340fd7a35aafdfdc7c8fa29bdcfaecec4fdd6c839469ae92b54083466cdee54263b04c2fe0821bc45ace52190b13ba94faf26b183a34ded95c27bdc89497aa1d8a9d17e5f0f5aaf6df3151d55d065e53c263ae4e3cd08213a97f06e662ba2a22b34b40f5d3c388efc800192863f4ad1bd210ad7df480ff27311871a399fcd5e4575a221bf7b744d413795cd58cb6fcdd2260ff2c2896b48e77ac2c8a3467ea8269b5e511cd0d2aaa318cb3bc8f305961b2d8d9c4d5eaa816dbbf51c93e13b35fcbed0576e3d2601e4a0ad4e5eb50b4cbe25fc99a5fcb9d6fcd985110907018069e455cbd445b88f396c5a36cee3fe718f2b32a135618d0cc4b63d79954778d75b17313eb00c90c7fa397975ecafb2c637af1a278312603ce6efaa42b32ab7f607e23b87896fa51a243e349b589f65331e0fc8da948c537eef148d05c86cb69175f86710f974dea091a33793c9ed079eb7f8ef945a5abc4a80c5630ff24f7283ffe4c732dd075257e0b03e98fc80c6b34c7cef56e9d8afc5848333229066810865f398befb27f2f2d616503032be94d7cdba54da3cc9df9994e6f1f51bf23dbd19a23136e0fbb4e4b6028fcd44231fe81255024c0a6fb059953401c39fb7ab789f2398f8deaba2b10501b4e3e7ed6ca4139bafb9805c34f83a11ed9ec1a4069fd654deac96b2b9f74d01f7d48435cd16ac65ae5f80b98c6a9b463c6ff0f3f7ba8c14958401e4777dd939a16b62e19f4dc1bc43c870aaaeaecc08da20b5e23626b0a55904291af0a7ddc19a304a10dbeaf454289223c0234a7cadbd99e4643e1634875b580ba91620a8f4009b7c99086f267fe678f27c7b6acd281465c0614213439ac0da319b7d306d917335db21802fc8ebdab27a158d259a314ccc4078e83e8d20d371a4b98b0a456a0007b4acac38b4c8ef6bc64400d29b1342042fb159586d1a0f34b93f4348fe6af2fc7d4d75aa2914e9041a0afc264c52b4ff593ee2df82c890c3752179951abf87901eb4a24b63d62ed304a4eb3c249e17a66f1fd2aed38a04b417453c8079d65dfcfcb591b1e439e6915bb580359cedc84f64ed405e467e58b7e8596c528318dee7bfad66206f7100155e938c8e36e38c0c24afa38d42a1049820506e841e7a0884342af03bde632d10810ee4ee2dacb13184d6bc2dcbaabc39ac13320e754c78d3585b445e1c8222a8c79ecaff552814654067f2d2367ea4ec691b3fb086085f1fda50adac43a750a806584d401d692bd658407a88eac247f82179be3e8542a15028140a8542a15028140a8542a150281425c2ff093000fd22ed9bea9b2bab0000000049454e44ae426082, 0x89504e470d0a1a0a0000000d4948445200000140000000a60806000000abfa56810000001974455874536f6674776172650041646f626520496d616765526561647971c9653c00002a4f4944415478daec5d07b81445d6bdf044440c984170055111c51c30a1281850d78439b0c65544943507504c6b445605c59cc32aa888115010c4352bea82047320990341d25f67fbd6dfb7ebf5ccf4ccf4f4f4ccdcf37df7d3c79b37dd5d5d75eae6225228140a8542a15028140a8542a1502814d58c063a048a8858c6483b23eb1859df4873238b9ccf3434f2a7912946be3732c3c834238b75f8144a808a4a433323c71a39c6c86646962bf07bbe3632dec8c746261879c7c85c1d5e8512a0222d58cfc8ce46da1ad9c8c83646d63552c7bf87b637d9c8cf46a61af9dcc8f246be32329d7fbfd4c8b2ac29ae696405fe8eed8db414d79a67e40d23838d8c60ad51a150281201486d6b23bd8c3c686436931764a1914f8cdc61e4742307b3b95b2c563172a891e78ccc17d7fbd1c819ba192b148a52a28d91938c3c6de4574140338d0c35d2d3c856469a24702fab1be96f648eb88f91ac852a140a45d158c9c8ee466e242f186189e633d6ee8e66222a275a187944dc1bfc841df4d529148a42009fdbbe468619f99d4905e4f7b891d38c6c405ea4366d8029be80eff75d23dbe9ab542814510042dbd1c8bf8dfcc124f207935e67238d2ae43924093ec3daa142a1506434713b1979559890ff35722e7911d84a03a2c7378967b94a5fb142a108c329e4052f6400a12b79c9ca950c44a6dfe2677acf48477dd50a850226ee20239f1a59427e30e36a236b57d9b3f615c4de575fbd4251bbe86e64a22084a5ac211d42c9a4ab94035d99e8f1ac4892565fa0425163f8ab918f04e9fd465e90638b1a78f6b5c8cb4b543358a1a83120fd6314f96565d084aeaa412de8627e7e246cf7d069a15054375a1bb98d353d2c7cd4c91e5cc5666e2ef4243f9d470950a1a842b422cf973786bc765158f0c8dd43c0a3518d8fcd61e4758b99af04a850541fd062ca96a7a162e376f23ab0289400158aaa055a43a1f675112fee1b8caca1c392d104461fc17d7438148aca471f233f91d7fbee7a25beac18481a055628aa02f0f37dc20bfa1e8aa7b75e35a3b591e7c9f789aeac43a250541e10cc18cb0b7912795d9115b9811c485be6a795200a4585a10d6b2eb6b309525a36d061c9dbfcfd82d4ffa750540c706010ea75e7f202462507caba1aead044866c86a0e6af425101c05916471af996172ea2bb384b63791d9abc710ef9e57f67e9702814e93777d18a4a26326b3e5f61686de4051e479403b6d5215128d28bc3c94f669ec35a60231d96827189d0fefae8702814e9c595e4d7ed42ebd3964dc501bebfb785f6a7a7c3291429037c7d28cb9a22b4bec355eb8b05b615fe2fe495092a148a14017df8de13261a7af36942733c388a89cf268aeb86a250a408171af99917e86cf20af57591c6836d8cbcc3638bff6eab43a250a403e84cfc0479b5bb58a0cf1a69afc3121b70aa9d3d141d49e367e8902814e9c096143c8be302f20e1d57c487cbc4f8aae9ab50a404a845fd8efc40c71ee4054014f1e10cf24b05c719d9448744a1283fa0e9fd2216e63a3a24b1636f239ff318238ff2401d1285a2fcb88ebceecc5898d792e7a352c48b6e82fca001f6d6215128ca0fa4b5d872b653c86b6ca08817486e1e45bedf0fb97fcbeab02814e5031a16e00c5a7b0ce5114696d161891d6d1df2bb43c759a1282fd6a46072f3d1ba284b467ea3c538a3e1416b1d1685223de4871e74fba849163bd0cfef7131ce638d6cacc3a250a487fca420e9f945f222954a86c5a1317987bddbb1fd94bc06b10a85a24c406bfa0f33909f2bd79276242e86fc6e1763395dc94fa1281f9068fba891790ec9c11f75829196c264432fba1ff9f75be8d015847f39e4d7458744a1481ecd8c5c417eef3e2ba8f43880c2cbaf5623ff18cb6d7408f306dada2f50f25328ca0744734f129a9c94a7c8f30366c260f21b20a806981f7016ca421ebb694a7e0a45f2400003ad951687901fb4c16c4d0d70c6c7a7a4a570850035d45f0af2db5d8744a1480e7f21afbdd27c5e840876489fdfe594bba3cb33e2f307e8904606824b6394fc148af298bbe71af99517e012f2fc5020307b6811caae7245747731f20d7f7e04e9391f51b12cf97dfd407e9d7548148a6480e8ee9bc2dc7d83bc9ad3b58439369a7fce05abfd7d4fda99382ae02218467ec043c94fa14808d0f27e135a1f1cf08df97736d1191ae06611be6b7f23b348eb81f3c14ee4e7540e67178442a12831b0d05e223fdaf8b1918e461af2ef0792ef073c302299bdce9fbf86b40d5614c0bdf095929f42912c70f8f84f14ec2a2209eb10233ff0ef064624b36b58831c4f7e42b422332e149bcfdd943da548a150c4006877b709cdce766f91f5ba686d65cff1981291cc0e60c204a96ea0c39c17f95d4d7a8e87425172b43632522c3c446adb857cee3ef22b10908691eb1c0f90df1cfefcdea4e77e64031ac4decf63f58791f3499bc62aaa006977f66f4a5ee5465bfe19b5bbc79057e121b1a7917d5923c4096336089209f83ea4c6ac4ede3920e3727cbed6c90f8d0d7a905721d38b379b4a471d6faed0fc5b919704bfd0b13a40f69fb1653155a7822249ec47417f1f7c754d337cf603fecc5c8a16f57d893f3fc8c82a3ad419d15e8c15dc0a9d2af85990078a9e8f03c80b7afd42d1ba0259994d5e2591067c1425075a51d92a0eb4ab3f95fc1417174887b149d0976621498bebc90b7a8c254d76ce868d8c4ce0717dd7c8d615fa1c3b9017a99e9b27e16592f7d83251284a4e7e20aabdd85c0903021f5f939ff3d72ac7771fc83bffc4089f55f2f3c67558058ed58a460ee54d2e8cc44086a817bfcbc88946b6cbf08c30ffd1100339a6e3c5df3fa05344113740724f90df8905c72776cd427ec0cd822cff46d9bb38afc96489a8ef963adc59c9cfe6450ead20f2c3bbc721f64f87687b9823ff3172257901b2150af87ef80aedc14eaf1a5943a78a224ef21b45fee96c28636b9be36fe09f9ac99fff248239fb0a7f76bb2c9f59d5c871bc50d028b5d63a421f23346a905f25e445c21c855fef5b87f4e633519dc8efb5586c457ee50be66a135db68ab8c86f749ee497aff637943f8744e9b0c83712a6e13ffc592c20dc4f871a7907d08eef17cf3e24e51ace0abc51bdcb6e1297f44e8889f4a4abe53a719d81ba6c15a520bf2f22925f53a1a97c974353e9c79f3b2764d7aee38534474c6e94d65d445e37e95a00a2edb60722d23efe9ee27b5d8fc9f96747dbc3fdffa3441a2b92bdcf17d742c38d36ba74cb8e86ac95ef66e4602397b1128374ad5d8dac5b090f019fdf42417eeb45fcbbab78b1e2effaf20e1d86eee425475f49f5fd3e1b9297ffb7582c7e984bb594e07b1ef90d25dea674fa4611fddf9382670bdb13fcd0c167e7125e1be477a1b826f24f4f53ee298ba2b427af7bb4aafb8a7247eb97f0c68840572a1b1b9f2948ecf33cc88f84f687bfcfe4a4efca8b1b2910ab3b3b07ae2d730cafa0da6a8250c79af11f297e7e98e548ba9ee44cec6f58436f5ee2ebaf4d5eadb324dc6b948b12d3eea0a0a048e1792a3e75091666ef343de000f2cbd63ecfd3a4384290d71d19162efaff2171750c057b01b660adc1469a910ad1a1c626d7beaced59adbb5bcaee0f131f553a339c49fc11bb2b92a83fde944d5d7beddf8d5cacbc5472d26bc7e33c398b56877e9da37803efcde6ee2e8207e0fbdd9dad39d9e17d715a4870a0203fdc14126cf3a9c31d47bee37bf390df83e410159e49c184d5839914ed809c95c574ae46c0b73a543cff6047334ec3fd3d2c5c2256c653722df61bf322f9555c1f25707b283f95040d5893ef47fe498c4b1dd242051272838fa2fc53b2f0fdebf3e66935c1b2fa0625f961a277a1ec797e2e5a0acd00795d6b6420bf190ef9e1ba36370cdacf263566eef6178b1a1af7de29ba3fece0639d898fb9f1186b834901dac72b148c28a3547245e5a9d8818c0da45c8dce60ae626d23f0d43ea6eb61a3ff9015a77bcaf5d0c7533041f58402cc99f3d91c59ca3bb51bb0b035c1070842941a2352676a29b7af2b6b304bc5f3af96927beb4c5eca8a4b7c38c03ec9d664d0face74b4be29a4477a9642db6bc19bf1ac104d0fbede73a834e5a9b87677bed667e578789830f270f2cba8b068eb6be23bdca2f4114c74076658fc30816ba5d57d73d6a02cf1cf6413220d2dbf3211df23947c4f46b4f57fc3d1fa6e56ad2f56c0b78706254f390ad0129e973725a4e9d789eb26eedb9161eb27a9b052a496e4577ebce06832d6d9d99f7fbe54688a33295a87986a0136802fc578ff9bd291b7b61bf96dc7ca4d7c984b0f38f7f20e6f9a8af8cc5c9cb5f334d54f5f1ac10a49d2aea0af9800374f72105e253fd7ee532abc9d10dae1db04d85ee4577e8ce07febc75ae553e43bd2112d5aab46261c76da7f91ef63fd85c7a97199ef0bdafff810e243c063fd84ef65659e27b215d6affc6f75a4886bcd83dc3e70b43df8e591fd518e0aa33ad6ec6d379fc4703905831e5b1461860d26bf25fe3a0ef9c16f84c0c6440a962bd5526e9fd468300ebb94f97edab1192ea3baf0fd5c43c927a662cea15c52660160537e9cf2cb3f556427beee21c4879cdd33cab811e3ddef21def901495d781b618642fa50f67add5cb0a1ec493c98f7927f2ad951e43b5631e87d0b34b32b156819368d9fff752a6f941bae892114acd145a9211cdc49a71dd5b14be06347037d9b924bada905cb036bfd35678c417cbd8b5cf3716019f20b27462779e1896211bc5c2421e16fbfe3efba93bcf4843ff981865030827700d54eb003beac7b58cb5accda55b9a2bcd869cfa66085cd6c362f93be2710df4146fe1bb2288f51ce8a0dadd9fa72c7b8570a88cf92f39542fb4bac91edd9c25cc5e22c36f9701361be7cc10f8392a8e9c2c4c2c0ef5323e4b70efb34ac2feb05762f940b68a820b3f717f1c6548e8edbe800fd92b328314e17917f76b4a238204a7e9de3de4059e5d5295a7fd8903710e4d72fa90baf29544edbaaaad84139d5d1f25c412fb88d6b60e26dcd8bdb76cf81567c28952fbd05443ccc79174826deaa0c664ef7108d0fcd0b5045d09c147101c9c9b23e1b24f822a5efac14e418dbe0db5b495ef816f26b6d11856d1ac377662340683f6dab7cd2b564a2917eb521655cd8d0a4cea5605b2ad468fe3d6132b6c4372984f8ae51e28b7dac0f08d1acd3d83e0d2e90f3c8f73f2756ef8f10b70c7c6c16c382c0df3f2fb41e29d87956abf2898768ee14f1cc482bdab6cc5ae818e73dc00f9964ba11e6594faa1fdcf891cd3025bed2921f4c4a04dbd2785c02f8623be18a49d4e77b8bf00b20e7a7710c0ff36206f2c3e96ed51ce985df74b0d07cb1b8cf2ae33343eb3bdfd1fa90589a64422b3461f484733bc5e09c977f52ede47c264d7e073a26ef3329bedfb558090349df99e485d714da1f4ce03872bd60c6cca3fac5d2e81356cd9d5c8e252fc8639ff9392a6fbe1afc3bc39df7f068827e1f68bcc8d95b40f57dbf689fa4c79b960e5b51b02d58ff94de2794a58ee49f0df366d237709e98a071687feec1e856d250dd502a346373d28e2348f0202a6f0dafcc31b4474a9e9ec075116944c30c64ee2f71e6004c5f34d768448a52621de17e4933f959cdcfd61ae39e9b267d035663591083f607cd623a85073d8ea9d2890f2d4716e63f40e53f95ad2ff9012d5b46b44d89af09bff1ed142c57b38d0a4692f6e64b0aab905f6c00abebc994939f0d84a12022f14280c3c8cffbbb21060dedcd905dbf9a091019f3f66026f433ec54e6fb598eea370b78b88426ef5a3c0661da1e26347ca11bd71801c1d7bb2379dd73cae1fed846bc8377534e7e93c55c695f8e9b7898fc404587224c36742d799982410fe495fd95fc446824b456cb99ac76975dcc9ad66554fed3e8407e0f39247465c44d07b5d73bf00e9cabb9001a131ccbef7b6ec84687dc2d1c63ba2cd51630760f5230ed6b52c21b80d4fe402a69ed92d342901fd6cf91e5b809687bf6709d9154f8a96ad07adce30e91d260831db61618797fab56c144c7e2b66dab4002a5aae40071a1fd4f17d626baf0b5c28248883c8f10e38f00548f3cae753cf981b0339cdf35e4c58d00d66b62ce4841b7eaeb6a50dbb3ef09e7582c0c1917b897ba27782fb28262688ac9cfb6d15f502ef273cd5f98a785547db426ff6c5a3bf0873a5ac73fc98f087748e1e445734d94db0ce709bbd899c4a852b88dbc965553c4ae7536c51fd1469e1c92c72750fdc8a96c507090f89b268ee6378f35b47c70bdf87ba4aa8ce34df15dca9cc88efb4392f76e55a4d9e70bbcff3e59de158250db27742fd0b84f22bf9766d70a20bfc3cb79330ff3625f4085e5a881fc3ea360326bd710134ad603df4ee96875858e22a8c8f8298336837ca9b1144c0eb732ba045a1f9294ff9d41bb0a1390f296e23d16437ec4dae52711af8d44daa3a9b68e280803825f6f8a71f98de7d421e49f95f27c82f7b3aa307fa7a66cac1ab2a261f340e7979bfc88fce8ef4b0598bf782074e2b58eef2f287b599b3c350c267339d2431ab059f87688b9022de7662622003ecd3b3310e019145fe138a2c57753fd9cc979fcef889cda36ef1bb37fcd96afc13c3e4d3ccb3c26a66216d051bc8846f3221ec3662fcca9b3281d1daacb0d10ff558ed58335d48e35e141c2fc4d3ad9fc1dbef6e32924bff982fc0e2bf74d6d44be03fbb43c17f432bc406cc0e303d606b3015aa0edfb07e767d299ff20dd89216486949d131c53f624f25bf85b93730c930e7eee1b93c977166bcd6eca0822a76b67f0f3d922717bfad6dbe26fcf536e2a3976a260f71c34b5389e7fb78a203f6c46491fc62e53d0ee4cc978c1c574bae09a54901f708af05bec44d1db0d81fc5e11e4373c0f937690d805922a876bcb64edfaf5c63129d63904f382f82cccd1ebc80fdc8c8d89009bf3755c32be8b325746346113d97ef60636afeccfd0da56537e2aa9d677b5f3be26b02261d7456ff24bceca414069234004590750b0faa75d5a5ee8adc274ca27f35a92c970caff14aed784d9bc3f95f63c87d384d6261b12ec1c72ddcb29e8ec7f9282c9ccf0f74c89810077763408ab85663bcab1099b34d20787fbb5d17544a4772be13882580fe24deb291e07bb01ce622d14beaff6549dd88a82e70edbfe79727c068bdf3f5ba6fbc4c6fa724a4c605830a31cf2db304d2fd56a0f70e246f5ffc9c3d10b213feba7b099df8b58c38afb28c3f5792248ad6f1afb63dcdc341c342e3b937c61a45b88462c030d8592cd0954ff5cd501943d356813c7cc8529d1d9c825144c398abb9925721a7bf0c29f47d18223575619f161ae20bd4506cabee48d3b13f9bd42e50b0ee1ba375179832075bcc9db636d17b3b595ba1258dba6fea5883727c9ef3e2aae5e4f92a08d1e5f44f1d400c2893fdb218c534248be13bf1899b83d2c83ef0df7fb3e7f064705ae1303f9a15cecd41c63df2184fc6ce4ec4ef1ef71fa54366273fad788a427a3d2bb5611f935631f9e7cc6971dab603da1192e61ed789532de33c8e7502a5f1a0c368c33c586090bf3012a3cbfb8a4b04e4968608df220bfb3289e0c7f90c88b148cc65a222cd43738c4d1560687f8c5da32d1c9bc2d90db8139c8e82dbed72e31901fb4d15c07fb1cc0da6818f9017793df4e6aaf18de4717aa7f384e144180a8bf91d5ab88fc36a4e039c878efb7389f8116fe8df8fd6d29b9f7f5c4dc1e95b0c93bcc99af27a6f5052f970701caf36afb50fce54d88b8ba5524b62b309cba51d265d0ce6b34f9be4568807b387fdb8427a92cddc224efc85acf1dec37699345332ac4b439d1213f44cc378bf037df3993e950e73377c7a001e2bd1f4ff59b9346113cc7c9547dc79782d86413dbd9fc9c16c816b8c07937d7a5e8fea13c5c4ec995c2d5f198cd119af04794fcb9d1790199e9f3231020c8efcf12929fc5aa3ca9bea26041fd2236f5b2e59ec141fda1436ab2db2dfc8b173b7e1ca492d813e6f7e4ebdadfc5d9b1d9ed08fd7e0ef20361dfe868a720a76d3290e40f5458cfc10ebc19ccce83f0e6b2bbe44caade5cc0231cd3ff630a9e91b225f941065b3173740a9f436a81a56c8680cde026a1058fa0f2763c8f95004f14da5229c9cf05fc4857f0604a6d0deafc76148cdee2b3df523018b09220bebe0ef1b9116014ff7f1ac10758089a3a6614c82fdbd17ec88b7cd6211d94b7654a8b81693f9282d529fb517840a98e8917ee858979901e4c750469f62fb36fabd4c0fcff87f3eca3c4d8e35d9e43c1f6626ff27c8cfafdf8eca5e49dc752ea7a6959120722bcb7445a9f5d3bdf929f0b49954680b787905b77413e6752f9bb7a34676daabd20ebce0ef99d22eef322c7acc6423ec8798e951dcdf127be465cb89e7cff26d25cb6cef259b44e92a7a2214012a579ec7e0e815b99c2e4389282292bb9042702a2a9ebdfa8763a3563e319e28cc3636223c15a798782f5cff746dc10e017edef580156632f3556e17769b5f79b63f8ce06ac20dc24ccdd0fa8bc1dcf0b269479149e0623c9ef524a674ba38b85a93297ef79595eb8b203f2efbc73af106272bfe6905f9c7dfcf6a56000235b39d459c2945dcaf7d5318f6b2198f276013ebcc5bcb01f62b31b8d1d505972192fdaab9884b7a33274e84d90fceea560b0e346fe1d16badb57f167de5ca398863d855fcc95f1093ddf9ae4e7e25913b5d094b3463c8fbf17ee29581d157b96b725b959e497819d2334c3a194ceb33b24f9cd66ad7017aa7fae2cf2f63608f9fbd6142c608f9bfc8027c4f79f9b619240c37a5cf83c31a1fa51e111f08d2998781a4678eff102878b0151cdb114decfcf15cc89e759ebae16b47736c1596c363666abe7c79071f88282398061d8c0995f8b59e3db88bfd75a5d9420094a57c964ca2f611df9b09bb3fb48ce871b2a7d023c4f7ea2305eda2061b281fcd2d8dea8af20bf6f59d31ae6f866a6f1426d98c1d4fcdc99d4c7c7bc8bc1696ea3aa209cb0f65fc855fcd2d108b6cbf33af0c3a023cd25ecd77b8f35b857a9fef9afd0e8902a83b6645f6521ba857cef2052d43ebfe4dca7ad9059afc2e7fee614f485ce60f2434968b68e3830f7b255336ce890df0fec5bb456d770d60a7748f879d77048109a6cae338161eeb662d3793e053bdef4a02a80ac057e5f90615ac9afb7f0eb7dca9acc2ce7c5643b7a1211be9954bff6768d98eff312a155f5747eb7366b874b04e1e49bf7d89eaf912b7505f7f0088fdb980c1ae144dec90fcfe1f36be6988a20d938ce6e4045cd09946c0e6127f293da6dc230b21dee0e1923b808ee149beec82cdfeb5684cc62978cbcee22418830298f116bf0a9029f6739f65362d3cf5667db945d5ad297095f67d851094dd81a9ce3cc97f7a974cd7f13c74621e60f9cb52d5378af5da8fe79b2f2c5dc9f83c80651fd72aeafa834b5abcf905f8a6453289665d35d9a55d0aedae631c9b198b2354995a55a57f3f5a63abffb83af7b441ebe20689a275330e0f4241577803916ffb5e2fb0626348f0ea460bf456c40df856c8c13d9d45d4e90c69c1c5ad35114ec02edfa7d57223ffabb0a6fe0f29aef53f48624f6fb2ea1e00154d3287be00c960eca3cbf76e604dec5aafcae0f664dd7fe7e093fcf195485273afeeeec08ad524a7e33332cf6577290581b0a46f0a4f4a7f8bbd1341726d0045e141738e481057708e54ef06ec026fb1d19fc51aefcc8be3d0433a6872ce853f3d4b496610dc58d32e3e7624e776bcd9a87d4dc4f4e601e1d4cb99bcd62e1cb4edbfb8bdf8dc9f2dd9b08d319666faf2c9f5d85354eb79ae6a488cfd194b5c8df42ee3fea79ba2bf226f9bda348b80509bfb105519547d9ca6e3036a090b668df99212fc5e6bc75a4ec9d64642798df78077b52f833762cc1fd36777c40ae7fed8208a4bb0993f3248a1ed1bd9717d038c7041e5e80bf09dad9b1149e5e532cf97577b48f3f794c4a8d1e1908435a034787f8f35e156b2393f6d784dd18f61d0fca721ff09dbeee5cfb2776dd44c1a6eceb75efff4fb63cf24d5d6a41c18a237743dd89aa14b752786e581cc762c601980a2f5030b881c9857e78dbe420bead9808ac4ff351f29baf0e6495feeb1299bf1750788bfd877268d76bb04ff643ca2f95055a3bca9eee13ef7301fb36ff52c062e843c134a2b8c8af19cfad2531901fdeefc3fc7db94c4690f9f939c61091e02d4348ed72f1992772dc8fd5f0dfcae05a8036bf1f05d39df2213f2826e766792fc715308ecb32e9e7f223df40d555e7fdbfa4cf45c257d18782c184de54beb37b919c3c98c253334ea6ec39892d5813b2bebe596c6aca67291501ba07a34be999c1bcdc9a35bdc95926e047bc405e8f48882f527e398456e31c4cd9cbe2c616315e5d1c9f9295ebf3f88e3a364de5110c209d6c674a40d3be2ac7783d9481b03a0973197ed45db268fcf630aaefd9ea70d1ca31f9e5910703229014321dc2f23c7f611f60beb0d9038f387ee33eacf11d1f42d456c33ca89ac86fb25099db397eaa01096b829bb1af6b1e4fbcf72918b4184d999dee70065fea98ca78b96b867c5676b529b648bc013b945f755c09bff362b0daebafbc002e66cd6c1c051dd7ae80886ee777b2162fb0253916f2674c06f938d151033d8aea0755fe7036a03105921ffcaf4333dcefc4882e88d55833fe20c3f73c13324fd165e85aaa9fbee32ee8ebb368ab03c5678764f191f6a460dd703b3137dab09f2d93df3153a796c6fc6e1ecbe0fbfd9937ce7c9b50401140d2fc730ef1f50c5178ec4977ef3ad75ec226737f4afe488ba2718d20bf19218482973741988e9fb0da5eaa8ecdf087f4632dc7de1708625dfefddd62719e14a2fd21bfee9f0ef161e11e4699f3fa401236a0f2381556eeb5159b47334388e376b1087a52fde6a7d948ef5626057bef788ecf23fc2daa155ae6b1088ecbf0bd93f87d9f2e165eae4ed561c0e24120664e967bcea5fdb5e031fe36a2d68b9a7074cb1941e1875849c17bfb5b966b6f2ddc006e330469a9b8da25d6cb89fc6c6f86686bc3c8cf1058487e7d6e63d6384138cf53f8d9c296b487537e5d95f1be77e339323b02f18591fcce8e6525efe7594af6cce3827194e34fdb81c2a3904d78b0163a2ff674d6a88a39c9ad05ef6c973ba4679b696eef68302788857813ef787821fbb04fc635931fa4dc6925cdc86f231f350fb011dfdb95bc309684f860e09f09ebeabc229be137b14f13dae2785e0c88041ec9beba3ac7ac7accb9ce6426ae5b9ce7be24a2bb0263df3783c37ba4f0edade8686dffc8e3fde2dd1c41f5536f2633210e131af18959361768eff3297320e9d3881b439840fbde3cc7731ce46898ae597d6a1ed79fc19f5f4190eb9202ee7b21fbb2a358256bb319fbb4b3012fe200ca515458792b88fa58b6c6c2b4c27328a5f5e3473984763ee5ae7cd883358225215ac2605ef030213bf37f1bb1a37627feb74eec0fb98877b5a90ee1cde581eccb3b4cd822868afd85a3fa87056e40d0fbe7e1b71ce8ec663ff1e4eac1bbe5aebc41f4622df4fb906bfeca84bb23c55b45b2871384982e76d86dc9af5e98cb64930b0d39d0f04b0613cc354377203f49f839a18de722be2343880f44758c782f07939f507c995854b8e615217f1fd678f554a181f50ed948b395f20d8e6836ee4bc17cbe6bf9fe9041f095b3f0a7b376e41e708539731ed52f255d86c929d37d625ebec296117cde2f917f4ef5161948096bee0cdeb8a665f8ce27597188030d786df6a2faa597b0d80615e0872e198e71c8eff93c031c87b0037e1115b6e34ac21bc9e641a73cee21531a8ced5cd29b0a4bddb93f8ba991497ee209d983e23fc364253681e70bb23f5f2cd8e52878025c2ecdaf116b595f46243e8be30549dd9fe33957e26b4c0919a73e21d642b788266da64867b71c638879702385d7efe67300f7d69439126e09e529b60a241175e00d0c84be7a8e204467361f5fe375016be0af14ec5ede9415046b42dfc3c4783bbbaaa664b9c725fcee31874ad9c6ac21bb7cfa51b05061113f5f598970bf10adab50c7657bde7d1fe39d7a31653f1be235de39ffce13a298a83276b8fb78677c8dffbf2b15d7a5a601abf36fe5f0b94c605f4f172a5d6388bd9c05f75888e68571b491398cc346199ea9233bedbf0f791698fbb9fad049020cd3009bf0583c18b2314da5ec1da297e50d305ff29b90e179c3d04d68f7dfb29f2bdf60def2144c8191bec3be14bd7a270eb4a7fa11d96ca4070d75005b5549a38e37d6a10e113e570e22ec10e284de9bf28b1246414b361bd3d8322b2ad6e017b71befcc7bb05fae6189afdb907d830b84b99b29cfee2ce1dc875faa8df0d9edce0b362c87f01b5e10513b3877213f2d672193da2d4caa1f52fd83926c97987d23128d6da9f4346f66e3f8efaf60f2da8582e9198f53fe671db78ae0e78b1a3c18c0ee9eeda97c6d9f366177d19f54bf047406cf87de949e2eddd644be5e68fc8bf83d6f9fc40dac18427ee75169cfdf55e40724de8e17ef07a65bb6a3313b527e49d2afb2cfa710cdfb5f11dc19a359835eb944633382c967459d2a0152de988979c30abae75ec23cfe932daa92569cdde598a80f5305372dac422022faa330abba45fc3ba905ba82322fe4eb2112576c4b7f68f347b266319e353554e0207071500ea25628b26984d6549f5c4ab3f806418057aae6971ad863036d643d9f6e30169b32815ec13b29fcb270da37d1e155a41c70f9ec285c2c70fd9c52aa8bb5a6ea3ec4a6d2002def33f27d6b1752fc9d68148a4a00b4415b1a08dfe0ad3a24d50d686bb2ae74371d12458da331f9398ef00bf6d421a93e40c39375978868b6d2615128fe07b8846cca12b2095ae890540f76a160650312979beab02814ff0fd94c62a16a81d5039400dac273240b8735725028149ed627fde28a0ac72de45796a040bcab0e894291114d9400ab0348d87d5198bce8bab1890e8b421189001108e9a6c35199409716d9ff0d45e0ad7558148aac407ef291e407413497b502812464d9d21e9d3ad6d061512822697f686587c280c774382a0f38504636181da4e4a75044026a84af13dadf0e3a24950584ec65cb29147c6bbdb542911b2889b34d675109f2880e4965e134253f85a260f2433db04d809e44eafb53f253286a84fc7612e407f7d1463a2c954b7ee878bd920e8b429113756cf64af26ba7c35239e8e5901fda8cadacc3a250e404aaa0fa91df0b70926a7e95053401fd4690dfa95564f6e2b025e462a159e556faaa1531028d50d1c1fa2d0a1e94a43ebf0a02bad64ead42f2833f06675da071eedb54fc191a0a8504da5da101883dc31a9dcf4fd661a92cc0bff7ae203f9c2bbb5a853f134e3c437d32ceb145a3868b590b5428e20094031cef3945687d38df652d1d9aca833c8717d51e955cdbbb9991dbc83f2c6b02ff9b421117f1ed27cc5df8fa3e26af4c545181b886fc88155ee69e15fa1cf0c13c49fef9d02040b4e76aa0af581193a97b3af9b5f070a9e05cf04374682a17dd2918f4b8a002cd4494e4dd4bfe014c1064dcff455fafa248c07f8c03db7194eb4cf2db593da7c457f980dfef7d411a6f18d9a0c226e745467e11cf8020c72efa6a154500164373d6f64689b9853ade9ba872ce2956e4c010f21b9a422aa94719ccf48fc5bdcfe209ab69078a4249af05cfa1d1625e617dc0877c82ceadea023a524c172ffa66aa8c43c0db907770b93d0b1ae7addea5e6aea2002098b1339bb732fd0b730b09cc97579845a4c80323c50b870f70d30a3077fb39e6ee18d2c89b223ad0960af5b97dd9b49deb901e021a9729e9553fe0bc95bdfd7a52ba139e11a8f954dc2f0e5d3f9c4951a1c8a4dd2178612b7fde11f367a9b01e9e212f5340fd7a35aafdfdc7c8fa29bdcfaecec4fdd6c839469ae92b54083466cdee54263b04c2fe0821bc45ace52190b13ba94faf26b183a34ded95c27bdc89497aa1d8a9d17e5f0f5aaf6df3151d55d065e53c263ae4e3cd08213a97f06e662ba2a22b34b40f5d3c388efc800192863f4ad1bd210ad7df480ff27311871a399fcd5e4575a221bf7b744d413795cd58cb6fcdd2260ff2c2896b48e77ac2c8a3467ea8269b5e511cd0d2aaa318cb3bc8f305961b2d8d9c4d5eaa816dbbf51c93e13b35fcbed0576e3d2601e4a0ad4e5eb50b4cbe25fc99a5fcb9d6fcd985110907018069e455cbd445b88f396c5a36cee3fe718f2b32a135618d0cc4b63d79954778d75b17313eb00c90c7fa397975ecafb2c637af1a278312603ce6efaa42b32ab7f607e23b87896fa51a243e349b589f65331e0fc8da948c537eef148d05c86cb69175f86710f974dea091a33793c9ed079eb7f8ef945a5abc4a80c5630ff24f7283ffe4c732dd075257e0b03e98fc80c6b34c7cef56e9d8afc5848333229066810865f398befb27f2f2d616503032be94d7cdba54da3cc9df9994e6f1f51bf23dbd19a23136e0fbb4e4b6028fcd44231fe81255024c0a6fb059953401c39fb7ab789f2398f8deaba2b10501b4e3e7ed6ca4139bafb9805c34f83a11ed9ec1a4069fd654deac96b2b9f74d01f7d48435cd16ac65ae5f80b98c6a9b463c6ff0f3f7ba8c14958401e4777dd939a16b62e19f4dc1bc43c870aaaeaecc08da20b5e23626b0a55904291af0a7ddc19a304a10dbeaf454289223c0234a7cadbd99e4643e1634875b580ba91620a8f4009b7c99086f267fe678f27c7b6acd281465c0614213439ac0da319b7d306d917335db21802fc8ebdab27a158d259a314ccc4078e83e8d20d371a4b98b0a456a0007b4acac38b4c8ef6bc64400d29b1342042fb159586d1a0f34b93f4348fe6af2fc7d4d75aa2914e9041a0afc264c52b4ff593ee2df82c890c3752179951abf87901eb4a24b63d62ed304a4eb3c249e17a66f1fd2aed38a04b417453c8079d65dfcfcb591b1e439e6915bb580359cedc84f64ed405e467e58b7e8596c528318dee7bfad66206f7100155e938c8e36e38c0c24afa38d42a1049820506e841e7a0884342af03bde632d10810ee4ee2dacb13184d6bc2dcbaabc39ac13320e754c78d3585b445e1c8222a8c79ecaff552814654067f2d2367ea4ec691b3fb086085f1fda50adac43a750a806584d401d692bd658407a88eac247f82179be3e8542a15028140a8542a15028140a8542a150281425c2ff093000fd22ed9bea9b2bab0000000049454e44ae426082, 0x89504e470d0a1a0a0000000d4948445200000140000000a60806000000abfa56810000001974455874536f6674776172650041646f626520496d616765526561647971c9653c00002a4f4944415478daec5d07b81445d6bdf044440c984170055111c51c30a1281850d78439b0c65544943507504c6b445605c59cc32aa888115010c4352bea82047320990341d25f67fbd6dfb7ebf5ccf4ccf4f4f4ccdcf37df7d3c79b37dd5d5d75eae6225228140a8542a15028140a8542a1502814d58c063a048a8858c6483b23eb1859df4873238b9ccf3434f2a7912946be3732c3c834238b75f8144a808a4a433323c71a39c6c86646962bf07bbe3632dec8c746261879c7c85c1d5e8512a0222d58cfc8ce46da1ad9c8c83646d63552c7bf87b637d9c8cf46a61af9dcc8f246be32329d7fbfd4c8b2ac29ae696405fe8eed8db414d79a67e40d23838d8c60ad51a150281201486d6b23bd8c3c686436931764a1914f8cdc61e4742307b3b95b2c563172a891e78ccc17d7fbd1c819ba192b148a52a28d91938c3c6de4574140338d0c35d2d3c856469a24702fab1be96f648eb88f91ac852a140a45d158c9c8ee466e242f186189e633d6ee8e66222a275a187944dc1bfc841df4d529148a42009fdbbe468619f99d4905e4f7b891d38c6c405ea4366d8029be80eff75d23dbe9ab542814510042dbd1c8bf8dfcc124f207935e67238d2ae43924093ec3daa142a1506434713b1979559890ff35722e7911d84a03a2c7378967b94a5fb142a108c329e4052f6400a12b79c9ca950c44a6dfe2677acf48477dd50a850226ee20239f1a59427e30e36a236b57d9b3f615c4de575fbd4251bbe86e64a22084a5ac211d42c9a4ab94035d99e8f1ac4892565fa0425163f8ab918f04e9fd465e90638b1a78f6b5c8cb4b543358a1a83120fd6314f96565d084aeaa412de8627e7e246cf7d069a15054375a1bb98d353d2c7cd4c91e5cc5666e2ef4243f9d470950a1a842b422cf973786bc765158f0c8dd43c0a3518d8fcd61e4758b99af04a850541fd062ca96a7a162e376f23ab0289400158aaa055a43a1f675112fee1b8caca1c392d104461fc17d7438148aca471f233f91d7fbee7a25beac18481a055628aa02f0f37dc20bfa1e8aa7b75e35a3b591e7c9f789aeac43a250541e10cc18cb0b7912795d9115b9811c485be6a795200a4585a10d6b2eb6b309525a36d061c9dbfcfd82d4ffa750540c706010ea75e7f202462507caba1aead044866c86a0e6af425101c05916471af996172ea2bb384b63791d9abc710ef9e57f67e9702814e93777d18a4a26326b3e5f61686de4051e479403b6d5215128d28bc3c94f669ec35a60231d96827189d0fefae8702814e9c595e4d7ed42ebd3964dc501bebfb785f6a7a7c3291429037c7d28cb9a22b4bec355eb8b05b615fe2fe495092a148a14017df8de13261a7af36942733c388a89cf268aeb86a250a408171af99917e86cf20af57591c6836d8cbcc3638bff6eab43a250a403e84cfc0479b5bb58a0cf1a69afc3121b70aa9d3d141d49e367e8902814e9c096143c8be302f20e1d57c487cbc4f8aae9ab50a404a845fd8efc40c71ee4054014f1e10cf24b05c719d9448744a1283fa0e9fd2216e63a3a24b1636f239ff318238ff2401d1285a2fcb88ebceecc5898d792e7a352c48b6e82fca001f6d6215128ca0fa4b5d872b653c86b6ca08817486e1e45bedf0fb97fcbeab02814e5031a16e00c5a7b0ce5114696d161891d6d1df2bb43c759a1282fd6a46072f3d1ba284b467ea3c538a3e1416b1d1685223de4871e74fba849163bd0cfef7131ce638d6cacc3a250a487fca420e9f945f222954a86c5a1317987bddbb1fd94bc06b10a85a24c406bfa0f33909f2bd79276242e86fc6e1763395dc94fa1281f9068fba891790ec9c11f75829196c264432fba1ff9f75be8d015847f39e4d7458744a1481ecd8c5c417eef3e2ba8f43880c2cbaf5623ff18cb6d7408f306dada2f50f25328ca0744734f129a9c94a7c8f30366c260f21b20a806981f7016ca421ebb694a7e0a45f2400003ad951687901fb4c16c4d0d70c6c7a7a4a570850035d45f0af2db5d8744a1480e7f21afbdd27c5e840876489fdfe594bba3cb33e2f307e8904606824b6394fc148af298bbe71af99517e012f2fc5020307b6811caae7245747731f20d7f7e04e9391f51b12cf97dfd407e9d7548148a6480e8ee9bc2dc7d83bc9ad3b58439369a7fce05abfd7d4fda99382ae02218467ec043c94fa14808d0f27e135a1f1cf08df97736d1191ae06611be6b7f23b348eb81f3c14ee4e7540e67178442a12831b0d05e223fdaf8b1918e461af2ef0792ef073c302299bdce9fbf86b40d5614c0bdf095929f42912c70f8f84f14ec2a2209eb10233ff0ef064624b36b58831c4f7e42b422332e149bcfdd943da548a150c4006877b709cdce766f91f5ba686d65cff1981291cc0e60c204a96ea0c39c17f95d4d7a8e87425172b43632522c3c446adb857cee3ef22b10908691eb1c0f90df1cfefcdea4e77e64031ac4decf63f58791f3499bc62aaa006977f66f4a5ee5465bfe19b5bbc79057e121b1a7917d5923c4096336089209f83ea4c6ac4ede3920e3727cbed6c90f8d0d7a905721d38b379b4a471d6faed0fc5b919704bfd0b13a40f69fb1653155a7822249ec47417f1f7c754d337cf603fecc5c8a16f57d893f3fc8c82a3ad419d15e8c15dc0a9d2af85990078a9e8f03c80b7afd42d1ba0259994d5e2591067c1425075a51d92a0eb4ab3f95fc1417174887b149d0976621498bebc90b7a8c254d76ce868d8c4ce0717dd7c8d615fa1c3b9017a99e9b27e16592f7d83251284a4e7e20aabdd85c0903021f5f939ff3d72ac7771fc83bffc4089f55f2f3c67558058ed58a460ee54d2e8cc44086a817bfcbc88946b6cbf08c30ffd1100339a6e3c5df3fa05344113740724f90df8905c72776cd427ec0cd822cff46d9bb38afc96489a8ef963adc59c9cfe6450ead20f2c3bbc721f64f87687b9823ff3172257901b2150af87ef80aedc14eaf1a5943a78a224ef21b45fee96c28636b9be36fe09f9ac99fff248239fb0a7f76bb2c9f59d5c871bc50d028b5d63a421f23346a905f25e445c21c855fef5b87f4e633519dc8efb5586c457ee50be66a135db68ab8c86f749ee497aff637943f8744e9b0c83712a6e13ffc592c20dc4f871a7907d08eef17cf3e24e51ace0abc51bdcb6e1297f44e8889f4a4abe53a719d81ba6c15a520bf2f22925f53a1a97c974353e9c79f3b2764d7aee38534474c6e94d65d445e37e95a00a2edb60722d23efe9ee27b5d8fc9f96747dbc3fdffa3441a2b92bdcf17d742c38d36ba74cb8e86ac95ef66e4602397b1128374ad5d8dac5b090f019fdf42417eeb45fcbbab78b1e2effaf20e1d86eee425475f49f5fd3e1b9297ffb7582c7e984bb594e07b1ef90d25dea674fa4611fddf9382670bdb13fcd0c167e7125e1be477a1b826f24f4f53ee298ba2b427af7bb4aafb8a7247eb97f0c68840572a1b1b9f2948ecf33cc88f84f687bfcfe4a4efca8b1b2910ab3b3b07ae2d730cafa0da6a8250c79af11f297e7e98e548ba9ee44cec6f58436f5ee2ebaf4d5eadb324dc6b948b12d3eea0a0a048e1792a3e75091666ef343de000f2cbd63ecfd3a4384290d71d19162efaff2171750c057b01b660adc1469a910ad1a1c626d7beaced59adbb5bcaee0f131f553a339c49fc11bb2b92a83fde944d5d7beddf8d5cacbc5472d26bc7e33c398b56877e9da37803efcde6ee2e8207e0fbdd9dad39d9e17d715a4870a0203fdc14126cf3a9c31d47bee37bf390df83e410159e49c184d5839914ed809c95c574ae46c0b73a543cff6047334ec3fd3d2c5c2256c653722df61bf322f9555c1f25707b283f95040d5893ef47fe498c4b1dd242051272838fa2fc53b2f0fdebf3e66935c1b2fa0625f961a277a1ec797e2e5a0acd00795d6b6420bf190ef9e1ba36370cdacf263566eef6178b1a1af7de29ba3fece0639d898fb9f1186b834901dac72b148c28a3547245e5a9d8818c0da45c8dce60ae626d23f0d43ea6eb61a3ff9015a77bcaf5d0c7533041f58402cc99f3d91c59ca3bb51bb0b035c1070842941a2352676a29b7af2b6b304bc5f3af96927beb4c5eca8a4b7c38c03ec9d664d0face74b4be29a4477a9642db6bc19bf1ac104d0fbede73a834e5a9b87677bed667e578789830f270f2cba8b068eb6be23bdca2f4114c74076658fc30816ba5d57d73d6a02cf1cf6413220d2dbf3211df23947c4f46b4f57fc3d1fa6e56ad2f56c0b78706254f390ad0129e973725a4e9d789eb26eedb9161eb27a9b052a496e4577ebce06832d6d9d99f7fbe54688a33295a87986a0136802fc578ff9bd291b7b61bf96dc7ca4d7c984b0f38f7f20e6f9a8af8cc5c9cb5f334d54f5f1ac10a49d2aea0af9800374f72105e253fd7ee532abc9d10dae1db04d85ee4577e8ce07febc75ae553e43bd2112d5aab46261c76da7f91ef63fd85c7a97199ef0bdafff810e243c063fd84ef65659e27b215d6affc6f75a4886bcd83dc3e70b43df8e591fd518e0aa33ad6ec6d379fc4703905831e5b1461860d26bf25fe3a0ef9c16f84c0c6440a962bd5526e9fd468300ebb94f97edab1192ea3baf0fd5c43c927a662cea15c52660160537e9cf2cb3f556427beee21c4879cdd33cab811e3ddef21def901495d781b618642fa50f67add5cb0a1ec493c98f7927f2ad951e43b5631e87d0b34b32b156819368d9fff752a6f941bae892114acd145a9211cdc49a71dd5b14be06347037d9b924bada905cb036bfd35678c417cbd8b5cf3716019f20b27462779e1896211bc5c2421e16fbfe3efba93bcf4843ff981865030827700d54eb003beac7b58cb5accda55b9a2bcd869cfa66085cd6c362f93be2710df4146fe1bb2288f51ce8a0dadd9fa72c7b8570a88cf92f39542fb4bac91edd9c25cc5e22c36f9701361be7cc10f8392a8e9c2c4c2c0ef5323e4b70efb34ac2feb05762f940b68a820b3f717f1c6548e8edbe800fd92b328314e17917f76b4a238204a7e9de3de4059e5d5295a7fd8903710e4d72fa90baf29544edbaaaad84139d5d1f25c412fb88d6b60e26dcd8bdb76cf81567c28952fbd05443ccc79174826deaa0c664ef7108d0fcd0b5045d09c147101c9c9b23e1b24f822a5efac14e418dbe0db5b495ef816f26b6d11856d1ac377662340683f6dab7cd2b564a2917eb521655cd8d0a4cea5605b2ad468fe3d6132b6c4372984f8ae51e28b7dac0f08d1acd3d83e0d2e90f3c8f73f2756ef8f10b70c7c6c16c382c0df3f2fb41e29d87956abf2898768ee14f1cc482bdab6cc5ae818e73dc00f9964ba11e6594faa1fdcf891cd3025bed2921f4c4a04dbd2785c02f8623be18a49d4e77b8bf00b20e7a7710c0ff36206f2c3e96ed51ce985df74b0d07cb1b8cf2ae33343eb3bdfd1fa90589a64422b3461f484733bc5e09c977f52ede47c264d7e073a26ef3329bedfb558090349df99e485d714da1f4ce03872bd60c6cca3fac5d2e81356cd9d5c8e252fc8639ff9392a6fbe1afc3bc39df7f068827e1f68bcc8d95b40f57dbf689fa4c79b960e5b51b02d58ff94de2794a58ee49f0df366d237709e98a071687feec1e856d250dd502a346373d28e2348f0202a6f0dafcc31b4474a9e9ec075116944c30c64ee2f71e6004c5f34d768448a52621de17e4933f959cdcfd61ae39e9b267d035663591083f607cd623a85073d8ea9d2890f2d4716e63f40e53f95ad2ff9012d5b46b44d89af09bff1ed142c57b38d0a4692f6e64b0aab905f6c00abebc994939f0d84a12022f14280c3c8cffbbb21060dedcd905dbf9a091019f3f66026f433ec54e6fb598eea370b78b88426ef5a3c0661da1e26347ca11bd71801c1d7bb2379dd73cae1fed846bc8377534e7e93c55c695f8e9b7898fc404587224c36742d799982410fe495fd95fc446824b456cb99ac76975dcc9ad66554fed3e8407e0f39247465c44d07b5d73bf00e9cabb9001a131ccbef7b6ec84687dc2d1c63ba2cd51630760f5230ed6b52c21b80d4fe402a69ed92d342901fd6cf91e5b809687bf6709d9154f8a96ad07adce30e91d260831db61618797fab56c144c7e2b66dab4002a5aae40071a1fd4f17d626baf0b5c28248883c8f10e38f00548f3cae753cf981b0339cdf35e4c58d00d66b62ce4841b7eaeb6a50dbb3ef09e7582c0c1917b897ba27782fb28262688ac9cfb6d15f502ef273cd5f98a785547db426ff6c5a3bf0873a5ac73fc98f087748e1e445734d94db0ce709bbd899c4a852b88dbc965553c4ae7536c51fd1469e1c92c72750fdc8a96c507090f89b268ee6378f35b47c70bdf87ba4aa8ce34df15dca9cc88efb4392f76e55a4d9e70bbcff3e59de158250db27742fd0b84f22bf9766d70a20bfc3cb79330ff3625f4085e5a881fc3ea360326bd710134ad603df4ee96875858e22a8c8f8298336837ca9b1144c0eb732ba045a1f9294ff9d41bb0a1390f296e23d16437ec4dae52711af8d44daa3a9b68e280803825f6f8a71f98de7d421e49f95f27c82f7b3aa307fa7a66cac1ab2a261f340e7979bfc88fce8ef4b0598bf782074e2b58eef2f287b599b3c350c267339d2431ab059f87688b9022de7662622003ecd3b3310e019145fe138a2c57753fd9cc979fcef889cda36ef1bb37fcd96afc13c3e4d3ccb3c26a66216d051bc8846f3221ec3662fcca9b3281d1daacb0d10ff558ed58335d48e35e141c2fc4d3ad9fc1dbef6e32924bff982fc0e2bf74d6d44be03fbb43c17f432bc406cc0e303d606b3015aa0edfb07e767d299ff20dd89216486949d131c53f624f25bf85b93730c930e7eee1b93c977166bcd6eca0822a76b67f0f3d922717bfad6dbe26fcf536e2a3976a260f71c34b5389e7fb78a203f6c46491fc62e53d0ee4cc978c1c574bae09a54901f708af05bec44d1db0d81fc5e11e4373c0f937690d805922a876bcb64edfaf5c63129d63904f382f82cccd1ebc80fdc8c8d89009bf3755c32be8b325746346113d97ef60636afeccfd0da56537e2aa9d677b5f3be26b02261d7456ff24bceca414069234004590750b0faa75d5a5ee8adc274ca27f35a92c970caff14aed784d9bc3f95f63c87d384d6261b12ec1c72ddcb29e8ec7f9282c9ccf0f74c89810077763408ab85663bcab1099b34d20787fbb5d17544a4772be13882580fe24deb291e07bb01ce622d14beaff6549dd88a82e70edbfe79727c068bdf3f5ba6fbc4c6fa724a4c605830a31cf2db304d2fd56a0f70e246f5ffc9c3d10b213feba7b099df8b58c38afb28c3f5792248ad6f1afb63dcdc341c342e3b937c61a45b88462c030d8592cd0954ff5cd501943d356813c7cc8529d1d9c825144c398abb9925721a7bf0c29f47d18223575619f161ae20bd4506cabee48d3b13f9bd42e50b0ee1ba375179832075bcc9db636d17b3b595ba1258dba6fea5883727c9ef3e2aae5e4f92a08d1e5f44f1d400c2893fdb218c534248be13bf1899b83d2c83ef0df7fb3e7f064705ae1303f9a15cecd41c63df2184fc6ce4ec4ef1ef71fa54366273fad788a427a3d2bb5611f935631f9e7cc6971dab603da1192e61ed789532de33c8e7502a5f1a0c368c33c586090bf3012a3cbfb8a4b04e4968608df220bfb3289e0c7f90c88b148cc65a222cd43738c4d1560687f8c5da32d1c9bc2d90db8139c8e82dbed72e31901fb4d15c07fb1cc0da6818f9017793df4e6aaf18de4717aa7f384e144180a8bf91d5ab88fc36a4e039c878efb7389f8116fe8df8fd6d29b9f7f5c4dc1e95b0c93bcc99af27a6f5052f970701caf36afb50fce54d88b8ba5524b62b309cba51d265d0ce6b34f9be4568807b387fdb8427a92cddc224efc85acf1dec37699345332ac4b439d1213f44cc378bf037df3993e950e73377c7a001e2bd1f4ff59b9346113cc7c9547dc79782d86413dbd9fc9c16c816b8c07937d7a5e8fea13c5c4ec995c2d5f198cd119af04794fcb9d1790199e9f3231020c8efcf12929fc5aa3ca9bea26041fd2236f5b2e59ec141fda1436ab2db2dfc8b173b7e1ca492d813e6f7e4ebdadfc5d9b1d9ed08fd7e0ef20361dfe868a720a76d3290e40f5458cfc10ebc19ccce83f0e6b2bbe44caade5cc0231cd3ff630a9e91b225f941065b3173740a9f436a81a56c8680cde026a1058fa0f2763c8f95004f14da5229c9cf05fc4857f0604a6d0deafc76148cdee2b3df523018b09220bebe0ef1b9116014ff7f1ac10758089a3a6614c82fdbd17ec88b7cd6211d94b7654a8b81693f9282d529fb517840a98e8917ee858979901e4c750469f62fb36fabd4c0fcff87f3eca3c4d8e35d9e43c1f6626ff27c8cfafdf8eca5e49dc752ea7a6959120722bcb7445a9f5d3bdf929f0b49954680b787905b77413e6752f9bb7a34676daabd20ebce0ef99d22eef322c7acc6423ec8798e951dcdf127be465cb89e7cff26d25cb6cef259b44e92a7a2214012a579ec7e0e815b99c2e4389282292bb9042702a2a9ebdfa8763a3563e319e28cc3636223c15a798782f5cff746dc10e017edef580156632f3556e17769b5f79b63f8ce06ac20dc24ccdd0fa8bc1dcf0b269479149e0623c9ef524a674ba38b85a93297ef79595eb8b203f2efbc73af106272bfe6905f9c7dfcf6a56000235b39d459c2945dcaf7d5318f6b2198f276013ebcc5bcb01f62b31b8d1d505972192fdaab9884b7a33274e84d90fceea560b0e346fe1d16badb57f167de5ca398863d855fcc95f1093ddf9ae4e7e25913b5d094b3463c8fbf17ee29581d157b96b725b959e497819d2334c3a194ceb33b24f9cd66ad7017aa7fae2cf2f63608f9fbd6142c608f9bfc8027c4f79f9b619240c37a5cf83c31a1fa51e111f08d2998781a4678eff102878b0151cdb114decfcf15cc89e759ebae16b47736c1596c363666abe7c79071f88282398061d8c0995f8b59e3db88bfd75a5d9420094a57c964ca2f611df9b09bb3fb48ce871b2a7d023c4f7ea2305eda2061b281fcd2d8dea8af20bf6f59d31ae6f866a6f1426d98c1d4fcdc99d4c7c7bc8bc1696ea3aa209cb0f65fc855fcd2d108b6cbf33af0c3a023cd25ecd77b8f35b857a9fef9afd0e8902a83b6645f6521ba857cef2052d43ebfe4dca7ad9059afc2e7fee614f485ce60f2434968b68e3830f7b255336ce890df0fec5bb456d770d60a7748f879d77048109a6cae338161eeb662d3793e053bdef4a02a80ac057e5f90615ac9afb7f0eb7dca9acc2ce7c5643b7a1211be9954bff6768d98eff312a155f5747eb7366b874b04e1e49bf7d89eaf912b7505f7f0088fdb980c1ae144dec90fcfe1f36be6988a20d938ce6e4045cd09946c0e6127f293da6dc230b21dee0e1923b808ee149beec82cdfeb5684cc62978cbcee22418830298f116bf0a9029f6739f65362d3cf5667db945d5ad297095f67d851094dd81a9ce3cc97f7a974cd7f13c74621e60f9cb52d5378af5da8fe79b2f2c5dc9f83c80651fd72aeafa834b5abcf905f8a6453289665d35d9a55d0aedae631c9b198b2354995a55a57f3f5a63abffb83af7b441ebe20689a275330e0f4241577803916ffb5e2fb0626348f0ea460bf456c40df856c8c13d9d45d4e90c69c1c5ad35114ec02edfa7d57223ffabb0a6fe0f29aef53f48624f6fb2ea1e00154d3287be00c960eca3cbf76e604dec5aafcae0f664dd7fe7e093fcf195485273afeeeec08ad524a7e33332cf6577290581b0a46f0a4f4a7f8bbd1341726d0045e141738e481057708e54ef06ec026fb1d19fc51aefcc8be3d0433a6872ce853f3d4b496610dc58d32e3e7624e776bcd9a87d4dc4f4e601e1d4cb99bcd62e1cb4edbfb8bdf8dc9f2dd9b08d319666faf2c9f5d85354eb79ae6a488cfd194b5c8df42ee3fea79ba2bf226f9bda348b80509bfb105519547d9ca6e3036a090b668df99212fc5e6bc75a4ec9d64642798df78077b52f833762cc1fd36777c40ae7fed8208a4bb0993f3248a1ed1bd9717d038c7041e5e80bf09dad9b1149e5e532cf97577b48f3f794c4a8d1e1908435a034787f8f35e156b2393f6d784dd18f61d0fca721ff09dbeee5cfb2776dd44c1a6eceb75efff4fb63cf24d5d6a41c18a237743dd89aa14b752786e581cc762c601980a2f5030b881c9857e78dbe420bead9808ac4ff351f29baf0e6495feeb1299bf1750788bfd877268d76bb04ff643ca2f95055a3bca9eee13ef7301fb36ff52c062e843c134a2b8c8af19cfad2531901fdeefc3fc7db94c4690f9f939c61091e02d4348ed72f1992772dc8fd5f0dfcae05a8036bf1f05d39df2213f2826e766792fc715308ecb32e9e7f223df40d555e7fdbfa4cf45c257d18782c184de54beb37b919c3c98c253334ea6ec39892d5813b2bebe596c6aca67291501ba07a34be999c1bcdc9a35bdc95926e047bc405e8f48882f527e398456e31c4cd9cbe2c616315e5d1c9f9295ebf3f88e3a364de5110c209d6c674a40d3be2ac7783d9481b03a0973197ed45db268fcf630aaefd9ea70d1ca31f9e5910703229014321dc2f23c7f611f60beb0d9038f387ee33eacf11d1f42d456c33ca89ac86fb25099db397eaa01096b829bb1af6b1e4fbcf72918b4184d999dee70065fea98ca78b96b867c5676b529b648bc013b945f755c09bff362b0daebafbc002e66cd6c1c051dd7ae80886ee777b2162fb0253916f2674c06f938d151033d8aea0755fe7036a03105921ffcaf4333dcefc4882e88d55833fe20c3f73c13324fd165e85aaa9fbee32ee8ebb368ab03c5678764f191f6a460dd703b3137dab09f2d93df3153a796c6fc6e1ecbe0fbfd9937ce7c9b50401140d2fc730ef1f50c5178ec4977ef3ad75ec226737f4afe488ba2718d20bf19218482973741988e9fb0da5eaa8ecdf087f4632dc7de1708625dfefddd62719e14a2fd21bfee9f0ef161e11e4699f3fa401236a0f2381556eeb5159b47334388e376b1087a52fde6a7d948ef5626057bef788ecf23fc2daa155ae6b1088ecbf0bd93f87d9f2e165eae4ed561c0e24120664e967bcea5fdb5e031fe36a2d68b9a7074cb1941e1875849c17bfb5b966b6f2ddc006e330469a9b8da25d6cb89fc6c6f86686bc3c8cf1058487e7d6e63d6384138cf53f8d9c296b487537e5d95f1be77e339323b02f18591fcce8e6525efe7594af6cce3827194e34fdb81c2a3904d78b0163a2ff674d6a88a39c9ad05ef6c973ba4679b696eef68302788857813ef787821fbb04fc635931fa4dc6925cdc86f231f350fb011dfdb95bc309684f860e09f09ebeabc229be137b14f13dae2785e0c88041ec9beba3ac7ac7accb9ce6426ae5b9ce7be24a2bb0263df3783c37ba4f0edade8686dffc8e3fde2dd1c41f5536f2633210e131af18959361768eff3297320e9d3881b439840fbde3cc7731ce46898ae597d6a1ed79fc19f5f4190eb9202ee7b21fbb2a358256bb319fbb4b3012fe200ca515458792b88fa58b6c6c2b4c27328a5f5e3473984763ee5ae7cd883358225215ac2605ef030213bf37f1bb1a37627feb74eec0fb98877b5a90ee1cde581eccb3b4cd822868afd85a3fa87056e40d0fbe7e1b71ce8ec663ff1e4eac1bbe5aebc41f4622df4fb906bfeca84bb23c55b45b2871384982e76d86dc9af5e98cb64930b0d39d0f04b0613cc354377203f49f839a18de722be2343880f44758c782f07939f507c995854b8e615217f1fd678f554a181f50ed948b395f20d8e6836ee4bc17cbe6bf9fe9041f095b3f0a7b376e41e708539731ed52f255d86c929d37d625ebec296117cde2f917f4ef5161948096bee0cdeb8a665f8ce27597188030d786df6a2faa597b0d80615e0872e198e71c8eff93c031c87b0037e1115b6e34ac21bc9e641a73cee21531a8ced5cd29b0a4bddb93f8ba991497ee209d983e23fc364253681e70bb23f5f2cd8e52878025c2ecdaf116b595f46243e8be30549dd9fe33957e26b4c0919a73e21d642b788266da64867b71c638879702385d7efe67300f7d69439126e09e529b60a241175e00d0c84be7a8e204467361f5fe375016be0af14ec5ede9415046b42dfc3c4783bbbaaa664b9c725fcee31874ad9c6ac21bb7cfa51b05061113f5f598970bf10adab50c7657bde7d1fe39d7a31653f1be235de39ffce13a298a83276b8fb78677c8dffbf2b15d7a5a601abf36fe5f0b94c605f4f172a5d6388bd9c05f75888e68571b491398cc346199ea9233bedbf0f791698fbb9fad049020cd3009bf0583c18b2314da5ec1da297e50d305ff29b90e179c3d04d68f7dfb29f2bdf60def2144c8191bec3be14bd7a270eb4a7fa11d96ca4070d75005b5549a38e37d6a10e113e570e22ec10e284de9bf28b1246414b361bd3d8322b2ad6e017b71befcc7bb05fae6189afdb907d830b84b99b29cfee2ce1dc875faa8df0d9edce0b362c87f01b5e10513b3877213f2d672193da2d4caa1f52fd83926c97987d23128d6da9f4346f66e3f8efaf60f2da8582e9198f53fe671db78ae0e78b1a3c18c0ee9eeda97c6d9f366177d19f54bf047406cf87de949e2eddd644be5e68fc8bf83d6f9fc40dac18427ee75169cfdf55e40724de8e17ef07a65bb6a3313b527e49d2afb2cfa710cdfb5f11dc19a359835eb944633382c967459d2a0152de988979c30abae75ec23cfe932daa92569cdde598a80f5305372dac422022faa330abba45fc3ba905ba82322fe4eb2112576c4b7f68f347b266319e353554e0207071500ea25628b26984d6549f5c4ab3f806418057aae6971ad863036d643d9f6e30169b32815ec13b29fcb270da37d1e155a41c70f9ec285c2c70fd9c52aa8bb5a6ea3ec4a6d2002def33f27d6b1752fc9d68148a4a00b4415b1a08dfe0ad3a24d50d686bb2ae74371d12458da331f9398ef00bf6d421a93e40c39375978868b6d2615128fe07b8846cca12b2095ae890540f76a160650312979beab02814ff0fd94c62a16a81d5039400dac273240b8735725028149ed627fde28a0ac72de45796a040bcab0e894291114d9400ab0348d87d5198bce8bab1890e8b421189001108e9a6c35199409716d9ff0d45e0ad7558148aac407ef291e407413497b502812464d9d21e9d3ad6d061512822697f686587c280c774382a0f38504636181da4e4a75044026a84af13dadf0e3a24950584ec65cb29147c6bbdb542911b2889b34d675109f2880e4965e134253f85a260f2433db04d809e44eafb53f253286a84fc7612e407f7d1463a2c954b7ee878bd920e8b429113756cf64af26ba7c35239e8e5901fda8cadacc3a250e404aaa0fa91df0b70926a7e95053401fd4690dfa95564f6e2b025e462a159e556faaa1531028d50d1c1fa2d0a1e94a43ebf0a02bad64ead42f2833f06675da071eedb54fc191a0a8504da5da101883dc31a9dcf4fd661a92cc0bff7ae203f9c2bbb5a853f134e3c437d32ceb145a3868b590b5428e20094031cef3945687d38df652d1d9aca833c8717d51e955cdbbb9991dbc83f2c6b02ff9b421117f1ed27cc5df8fa3e26af4c545181b886fc88155ee69e15fa1cf0c13c49fef9d02040b4e76aa0af581193a97b3af9b5f070a9e05cf04374682a17dd2918f4b8a002cd4494e4dd4bfe014c1064dcff455fafa248c07f8c03db7194eb4cf2db593da7c457f980dfef7d411a6f18d9a0c226e745467e11cf8020c72efa6a154500164373d6f64689b9853ade9ba872ce2956e4c010f21b9a422aa94719ccf48fc5bdcfe209ab69078a4249af05cfa1d1625e617dc0877c82ceadea023a524c172ffa66aa8c43c0db907770b93d0b1ae7addea5e6aea2002098b1339bb732fd0b730b09cc97579845a4c80323c50b870f70d30a3077fb39e6ee18d2c89b223ad0960af5b97dd9b49deb901e021a9729e9553fe0bc95bdfd7a52ba139e11a8f954dc2f0e5d3f9c4951a1c8a4dd2178612b7fde11f367a9b01e9e212f5340fd7a35aafdfdc7c8fa29bdcfaecec4fdd6c839469ae92b54083466cdee54263b04c2fe0821bc45ace52190b13ba94faf26b183a34ded95c27bdc89497aa1d8a9d17e5f0f5aaf6df3151d55d065e53c263ae4e3cd08213a97f06e662ba2a22b34b40f5d3c388efc800192863f4ad1bd210ad7df480ff27311871a399fcd5e4575a221bf7b744d413795cd58cb6fcdd2260ff2c2896b48e77ac2c8a3467ea8269b5e511cd0d2aaa318cb3bc8f305961b2d8d9c4d5eaa816dbbf51c93e13b35fcbed0576e3d2601e4a0ad4e5eb50b4cbe25fc99a5fcb9d6fcd985110907018069e455cbd445b88f396c5a36cee3fe718f2b32a135618d0cc4b63d79954778d75b17313eb00c90c7fa397975ecafb2c637af1a278312603ce6efaa42b32ab7f607e23b87896fa51a243e349b589f65331e0fc8da948c537eef148d05c86cb69175f86710f974dea091a33793c9ed079eb7f8ef945a5abc4a80c5630ff24f7283ffe4c732dd075257e0b03e98fc80c6b34c7cef56e9d8afc5848333229066810865f398befb27f2f2d616503032be94d7cdba54da3cc9df9994e6f1f51bf23dbd19a23136e0fbb4e4b6028fcd44231fe81255024c0a6fb059953401c39fb7ab789f2398f8deaba2b10501b4e3e7ed6ca4139bafb9805c34f83a11ed9ec1a4069fd654deac96b2b9f74d01f7d48435cd16ac65ae5f80b98c6a9b463c6ff0f3f7ba8c14958401e4777dd939a16b62e19f4dc1bc43c870aaaeaecc08da20b5e23626b0a55904291af0a7ddc19a304a10dbeaf454289223c0234a7cadbd99e4643e1634875b580ba91620a8f4009b7c99086f267fe678f27c7b6acd281465c0614213439ac0da319b7d306d917335db21802fc8ebdab27a158d259a314ccc4078e83e8d20d371a4b98b0a456a0007b4acac38b4c8ef6bc64400d29b1342042fb159586d1a0f34b93f4348fe6af2fc7d4d75aa2914e9041a0afc264c52b4ff593ee2df82c890c3752179951abf87901eb4a24b63d62ed304a4eb3c249e17a66f1fd2aed38a04b417453c8079d65dfcfcb591b1e439e6915bb580359cedc84f64ed405e467e58b7e8596c528318dee7bfad66206f7100155e938c8e36e38c0c24afa38d42a1049820506e841e7a0884342af03bde632d10810ee4ee2dacb13184d6bc2dcbaabc39ac13320e754c78d3585b445e1c8222a8c79ecaff552814654067f2d2367ea4ec691b3fb086085f1fda50adac43a750a806584d401d692bd658407a88eac247f82179be3e8542a15028140a8542a15028140a8542a150281425c2ff093000fd22ed9bea9b2bab0000000049454e44ae426082, '2017-10-28 19:16:34', '2017-11-04 19:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_student`
--

CREATE TABLE `ezi_student` (
  `student_id` int(11) NOT NULL,
  `student_code` varchar(20) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `school_code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_student`
--

INSERT INTO `ezi_student` (`student_id`, `student_code`, `student_name`, `school_code`, `created_at`, `updated_at`) VALUES
(32, 'S17PSBAF9267', 'Adam Farid', 'SCH67417', '2017-12-31 00:39:37', '2018-01-30 18:08:21'),
(33, 'S17PSBAN3327', 'Adjoa Nti', 'SCH67417', '2017-12-31 00:41:35', '2018-01-30 18:08:28'),
(34, 'S17PSBHA6558', 'Hamza Adam', 'SCH67417', '2017-12-31 00:47:14', '2018-01-30 18:08:52'),
(35, 'S18PSBJH5756', 'James Hokpi', 'SCH67417', '2018-01-16 21:33:05', '2018-01-30 18:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_student_details`
--

CREATE TABLE `ezi_student_details` (
  `id` int(11) NOT NULL,
  `student_code` varchar(20) NOT NULL,
  `student_dob` date NOT NULL,
  `student_gender` enum('male','female') NOT NULL,
  `student_class` varchar(20) DEFAULT NULL,
  `student_status` enum('none','day','boarding') NOT NULL DEFAULT 'none',
  `student_house` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_student_details`
--

INSERT INTO `ezi_student_details` (`id`, `student_code`, `student_dob`, `student_gender`, `student_class`, `student_status`, `student_house`, `created_at`, `updated_at`) VALUES
(32, 'S17PSBAF9267', '1995-11-27', 'male', 'CL17PSB7032', 'day', '', '2017-12-31 00:39:37', '2017-12-31 00:39:37'),
(33, 'S17PSBAN3327', '2017-12-31', 'female', 'CL17PSB7032', 'day', '', '2017-12-31 00:41:35', '2017-12-31 00:41:35'),
(34, 'S17PSBHA6558', '2017-12-31', 'male', 'CL17PSB7032', 'day', '', '2017-12-31 00:47:14', '2017-12-31 00:47:14'),
(35, 'S18PSBJH5756', '2018-01-16', 'male', 'CL18PSB8946', 'day', '', '2018-01-16 21:33:06', '2018-01-16 21:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_student_guardian`
--

CREATE TABLE `ezi_student_guardian` (
  `guardian_id` int(11) NOT NULL,
  `student_code` varchar(20) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `guardian_relationship` varchar(30) NOT NULL,
  `guardian_occupation` varchar(100) NOT NULL,
  `guardian_email` varchar(255) NOT NULL,
  `guardian_telephone` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ezi_student_guardian`
--

INSERT INTO `ezi_student_guardian` (`guardian_id`, `student_code`, `guardian_name`, `guardian_relationship`, `guardian_occupation`, `guardian_email`, `guardian_telephone`, `created_at`, `updated_at`) VALUES
(32, 'S17PSBAF9267', 'Iklimatu Adam', 'Mother', 'Trader', 'phobaike@gmail.com', '0243002444', '2017-12-31 00:39:37', '2017-12-31 00:39:37'),
(33, 'S17PSBAN3327', 'Rita Nti', 'Sibling', 'Banker', 'ritanit@gmail.com', '0573849384', '2017-12-31 00:41:35', '2017-12-31 00:41:35'),
(34, 'S17PSBHA6558', 'Iklimatu Adam', 'Mother', 'Trader', 'phobaike@gmail.com', '0243002444', '2017-12-31 00:47:14', '2017-12-31 00:47:14'),
(35, 'S18PSBJH5756', 'Kodjo Hokpi', 'Father', 'Doctor', 'kjhopki@gmail.com', '0245654356', '2018-01-16 21:33:06', '2018-01-16 21:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_subjects`
--

CREATE TABLE `ezi_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `subject_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ezi_subjects`
--

INSERT INTO `ezi_subjects` (`subject_id`, `subject_code`, `subject_name`, `course_code`, `subject_description`, `created_at`, `updated_at`) VALUES
(9, 'SJECO9520', 'Economics', 'CSGEA3640', 'Chisel People', '2017-12-31 00:31:28', '2017-12-31 06:21:25'),
(10, 'SJELM7073', 'Elective Mathematics', 'CSGEA3640', 'Ashikas', '2017-12-31 00:37:29', '2017-12-31 00:37:29'),
(11, 'SJENL6788', 'English Literature', 'CSGEA3640', 'Shakes Spear Stuff', '2018-01-04 08:41:29', '2018-01-04 08:41:29'),
(12, 'SJBIO8297', 'Biology', 'CSGES8093', 'Nature Stuff', '2018-01-04 09:34:43', '2018-01-04 09:34:43'),
(13, 'SJELM4428', 'Elective Mathematics', 'CSGES8093', 'Calculatioins', '2018-01-04 09:35:09', '2018-01-04 09:35:09'),
(14, 'SJGOV0762', 'Government', 'CSGEA3640', 'Government', '2018-02-07 20:32:49', '2018-02-07 20:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_terminal_reports`
--

CREATE TABLE `ezi_terminal_reports` (
  `terminal_report_id` int(11) NOT NULL,
  `terminal_report_code` varchar(20) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `class_code` varchar(20) NOT NULL,
  `student_code` varchar(20) NOT NULL,
  `terminal_report_grades` longtext NOT NULL,
  `academic_year` varchar(11) NOT NULL,
  `academic_term` enum('1st Term','2nd Term','3rd Term','Vacation') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_terminal_reports`
--

INSERT INTO `ezi_terminal_reports` (`terminal_report_id`, `terminal_report_code`, `school_code`, `class_code`, `student_code`, `terminal_report_grades`, `academic_year`, `academic_term`, `created_at`, `updated_at`) VALUES
(1, 'REPPSB9479', 'SCH67417', 'CL17PSB7032', 'S17PSBAF9267', 'SJCMA0000:70,SJCEN0000:32,SJCIN0000:32,SJCSS0000:52,SJECO9520:53,SJELM7073:43,SJENL6788:79,SJGOV0762:23', '2017 - 2018', '1st Term', '2018-02-26 19:55:15', '2018-02-26 19:55:15'),
(2, 'REPPSB1426', 'SCH67417', 'CL17PSB7032', 'S17PSBAN3327', 'SJCMA0000:67,SJCEN0000:65,SJCIN0000:67,SJCSS0000:80,SJECO9520:89,SJELM7073:89,SJENL6788:90,SJGOV0762:89', '2017 - 2018', '1st Term', '2018-02-26 19:55:15', '2018-02-26 19:55:15'),
(3, 'REPPSB9826', 'SCH67417', 'CL17PSB7032', 'S17PSBHA6558', 'SJCMA0000:23,SJCEN0000:75,SJCIN0000:76,SJCSS0000:78,SJECO9520:89,SJELM7073:89,SJENL6788:67,SJGOV0762:60', '2017 - 2018', '1st Term', '2018-02-26 19:55:15', '2018-02-26 19:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_users`
--

CREATE TABLE `ezi_users` (
  `access_key_id` int(11) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `access_key` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ezi_users`
--

INSERT INTO `ezi_users` (`access_key_id`, `user_code`, `access_key`, `token`, `created_at`, `updated_at`) VALUES
(1, 'SCH67417', '8cb2237d0679ca88db6464eac60da96345513964', '1d320e05503e20b247a131c0ac8abc91f4107f61e1d21d7336120d94cb79', '2017-11-25 08:17:35', '2018-02-26 19:17:41'),
(2, 'SCH28217', '8cb2237d0679ca88db6464eac60da96345513964', NULL, '2017-11-25 08:17:35', '2018-02-13 19:44:31'),
(3, 'S17PSBAF9267', '8cb2237d0679ca88db6464eac60da96345513964', 'fac97b9702127b0042f23e0a6aeea88fee4ae8fddb2f674a1cf40d9bdb3f', '2018-01-04 11:21:09', '2018-02-11 19:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `ezi_user_password_resets`
--

CREATE TABLE `ezi_user_password_resets` (
  `user_code` varchar(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verification_code` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ezi_admin`
--
ALTER TABLE `ezi_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ezi_course`
--
ALTER TABLE `ezi_course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `ezi_school`
--
ALTER TABLE `ezi_school`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `school_code` (`school_code`);

--
-- Indexes for table `ezi_school_academic_year`
--
ALTER TABLE `ezi_school_academic_year`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_code` (`school_code`);

--
-- Indexes for table `ezi_school_administration`
--
ALTER TABLE `ezi_school_administration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_code` (`school_code`);

--
-- Indexes for table `ezi_school_class`
--
ALTER TABLE `ezi_school_class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_code` (`class_code`),
  ADD KEY `ezi_school_class_ibfk_1` (`class_course`),
  ADD KEY `school_code` (`school_code`);

--
-- Indexes for table `ezi_school_class_subject`
--
ALTER TABLE `ezi_school_class_subject`
  ADD PRIMARY KEY (`class_subject_id`),
  ADD KEY `class_code` (`class_code`);

--
-- Indexes for table `ezi_school_signatories`
--
ALTER TABLE `ezi_school_signatories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_code` (`school_code`);

--
-- Indexes for table `ezi_student`
--
ALTER TABLE `ezi_student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_code` (`student_code`),
  ADD KEY `school_code` (`school_code`);

--
-- Indexes for table `ezi_student_details`
--
ALTER TABLE `ezi_student_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_code` (`student_code`),
  ADD KEY `ezi_student_details_ibfk_3` (`student_class`);

--
-- Indexes for table `ezi_student_guardian`
--
ALTER TABLE `ezi_student_guardian`
  ADD PRIMARY KEY (`guardian_id`),
  ADD KEY `ezi_student_guardian_ibfk_1` (`student_code`);

--
-- Indexes for table `ezi_subjects`
--
ALTER TABLE `ezi_subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_code` (`subject_code`,`course_code`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `ezi_terminal_reports`
--
ALTER TABLE `ezi_terminal_reports`
  ADD PRIMARY KEY (`terminal_report_id`),
  ADD UNIQUE KEY `terminal_report_code` (`terminal_report_code`),
  ADD KEY `ezi_terminal_reports_ibfk_1` (`student_code`),
  ADD KEY `ezi_terminal_reports_ibfk_2` (`school_code`),
  ADD KEY `ezi_terminal_reports_ibfk_3` (`class_code`);

--
-- Indexes for table `ezi_users`
--
ALTER TABLE `ezi_users`
  ADD PRIMARY KEY (`access_key_id`),
  ADD KEY `school_code` (`user_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ezi_admin`
--
ALTER TABLE `ezi_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ezi_course`
--
ALTER TABLE `ezi_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ezi_school`
--
ALTER TABLE `ezi_school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=863;

--
-- AUTO_INCREMENT for table `ezi_school_academic_year`
--
ALTER TABLE `ezi_school_academic_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ezi_school_administration`
--
ALTER TABLE `ezi_school_administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ezi_school_class`
--
ALTER TABLE `ezi_school_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ezi_school_class_subject`
--
ALTER TABLE `ezi_school_class_subject`
  MODIFY `class_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ezi_school_signatories`
--
ALTER TABLE `ezi_school_signatories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ezi_student`
--
ALTER TABLE `ezi_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ezi_student_details`
--
ALTER TABLE `ezi_student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ezi_student_guardian`
--
ALTER TABLE `ezi_student_guardian`
  MODIFY `guardian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ezi_subjects`
--
ALTER TABLE `ezi_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ezi_terminal_reports`
--
ALTER TABLE `ezi_terminal_reports`
  MODIFY `terminal_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ezi_users`
--
ALTER TABLE `ezi_users`
  MODIFY `access_key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ezi_school_academic_year`
--
ALTER TABLE `ezi_school_academic_year`
  ADD CONSTRAINT `ezi_school_academic_year_ibfk_1` FOREIGN KEY (`school_code`) REFERENCES `ezi_school` (`school_code`) ON UPDATE CASCADE;

--
-- Constraints for table `ezi_school_administration`
--
ALTER TABLE `ezi_school_administration`
  ADD CONSTRAINT `ezi_school_administration_ibfk_1` FOREIGN KEY (`school_code`) REFERENCES `ezi_school` (`school_code`) ON UPDATE CASCADE;

--
-- Constraints for table `ezi_school_class`
--
ALTER TABLE `ezi_school_class`
  ADD CONSTRAINT `ezi_school_class_ibfk_1` FOREIGN KEY (`class_course`) REFERENCES `ezi_course` (`course_code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ezi_school_class_ibfk_2` FOREIGN KEY (`school_code`) REFERENCES `ezi_school` (`school_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ezi_school_class_subject`
--
ALTER TABLE `ezi_school_class_subject`
  ADD CONSTRAINT `ezi_school_class_subject_ibfk_1` FOREIGN KEY (`class_code`) REFERENCES `ezi_school_class` (`class_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ezi_school_signatories`
--
ALTER TABLE `ezi_school_signatories`
  ADD CONSTRAINT `ezi_school_signatories_ibfk_1` FOREIGN KEY (`school_code`) REFERENCES `ezi_school` (`school_code`) ON UPDATE CASCADE;

--
-- Constraints for table `ezi_student`
--
ALTER TABLE `ezi_student`
  ADD CONSTRAINT `ezi_student_ibfk_1` FOREIGN KEY (`school_code`) REFERENCES `ezi_school` (`school_code`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ezi_student_details`
--
ALTER TABLE `ezi_student_details`
  ADD CONSTRAINT `ezi_student_details_ibfk_1` FOREIGN KEY (`student_code`) REFERENCES `ezi_student` (`student_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ezi_student_details_ibfk_3` FOREIGN KEY (`student_class`) REFERENCES `ezi_school_class` (`class_code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ezi_student_guardian`
--
ALTER TABLE `ezi_student_guardian`
  ADD CONSTRAINT `ezi_student_guardian_ibfk_1` FOREIGN KEY (`student_code`) REFERENCES `ezi_student` (`student_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ezi_subjects`
--
ALTER TABLE `ezi_subjects`
  ADD CONSTRAINT `ezi_subjects_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `ezi_course` (`course_code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ezi_terminal_reports`
--
ALTER TABLE `ezi_terminal_reports`
  ADD CONSTRAINT `ezi_terminal_reports_ibfk_1` FOREIGN KEY (`student_code`) REFERENCES `ezi_student` (`student_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ezi_terminal_reports_ibfk_2` FOREIGN KEY (`school_code`) REFERENCES `ezi_school` (`school_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ezi_terminal_reports_ibfk_3` FOREIGN KEY (`class_code`) REFERENCES `ezi_school_class` (`class_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
